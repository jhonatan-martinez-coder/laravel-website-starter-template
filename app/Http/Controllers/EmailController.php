<?php

namespace App\Http\Controllers;

use App\Mail\NotifyClientEmailReceivedSuccessfully;
use App\Mail\ClientRequestEmail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class EmailController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendClientContactEmail()
    {
         // Send mail to business administration
        Mail::send(new ClientRequestEmail($_POST));

        // Send response to client
        Mail::to($_POST['client_email'])->send(new NotifyClientEmailReceivedSuccessfully($_POST));

        // take user to same contact form
        return redirect('/contact/form');
    }
}

