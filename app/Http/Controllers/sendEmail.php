<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
class sendEmail extends Controller
{
    public function send()
    {
    

      Mail::send([],['name','Infant Jesus Academy CORM'], function($message){
        $MailBody = 'Your Custom Body';
          $message->setBody($MailBody, 'text/html');
         $message->to('ejmaskarino05@gmail.com','To ernest')->subject('Test Email');
         $message->to('ijacorentalmanagement@gmail.com','IJACORM');
      });
    }
}
