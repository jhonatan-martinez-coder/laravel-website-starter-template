<?php

namespace App\Http\Controllers;

use App\Mail\NotifyClientEmailReceivedSuccessfully;
use App\Mail\ClientRequestEmail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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

        if (count($form_data ) != 0) {
            // Send mail to business administration
            Mail::send(new ClientRequestEmail($_POST));

            // Send response to client
            Mail::to($_POST['client_email'])->send(new NotifyClientEmailReceivedSuccessfully($_POST));

            // take user to same contact form
            return redirect('/contact/form');
        }else {
            // take user to same contact form but include form inputs data
            return redirect('/contact/form')->withInput($form_data);
        }
    }
}
