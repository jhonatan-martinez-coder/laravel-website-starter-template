<?php

namespace App\Http\Controllers;

use App\Mail\NotifyClientEmailReceivedSuccessfully;
use App\Mail\ClientRequestEmail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\IpUtils;
use Illuminate\Support\Facades\Http;

class EmailController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendClientContactEmail(Request $request)
    {
        // validate form inputs and store successfully validated results in the variable
        $form_data = $request->validate([
            'client_name' => ['required'],
            'client_email' => ['required'],
            'subject' => ['required'],
            'message' => ['required']
        ]);

        $recaptcha_response = $request->input('g-recaptcha-response');

        if (is_null($recaptcha_response)) {
            // take user to same contact form but include form inputs data
            return redirect('/contact/form')->with('error', 'Porfavor complete el recaptcha para proceder')->withInput($form_data);
        };

        $url = "https://www.google.com/recaptcha/api/siteverify";

        $body = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptcha_response,
            'remoteip' => IpUtils::anonymize($request->ip())
        ];

        // the options set to this form are a workaround, this must not be use in production
        $response = Http::asForm()->withOptions([
            'verify' => false,
        ])->post($url, $body);

        $result = json_decode($response);

        if ($response->successful() && $result->success == true) {
            // Send mail to business administration
            Mail::send(new ClientRequestEmail($_POST));

            // Send response to client
            Mail::to($_POST['client_email'])->send(new NotifyClientEmailReceivedSuccessfully($_POST));

            // take user to same contact form
            return redirect('/contact/form')->with('success', 'Formulario enviado correctamente!');
        }else {
            // take user to same contact form but include form inputs data
            return redirect('/contact/form')->with('error', 'Porfavor complete el recaptcha para proceder')->withInput($form_data);
        }
    }
}
