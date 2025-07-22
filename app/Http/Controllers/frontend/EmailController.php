<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Custommail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendCustomMail()
    {
        $details = [
            'subject' => 'Custom Email Subject',
            'title' => 'Welcome to My Website',
            'body' => 'Thank you for signing up!'
        ];
    
        Mail::to('gk790521@gmail.com')->send(new Custommail($details));
    
        return "Email Sent Successfully!";
    }
}
