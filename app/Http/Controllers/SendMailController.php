<?php

namespace App\Http\Controllers;

use App\Mail\AlertMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendTest(){
        $email = request()->input('email');
        $details = [
            'title'=>'Hello, test send mail title!',
            'body'=> 'this is content of mail'
        ];
        Mail::to($email)->send(new AlertMail($details));     
    }
}
