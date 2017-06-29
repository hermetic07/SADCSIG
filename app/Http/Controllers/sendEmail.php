<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
class sendEmail extends Controller
{
    public function send()
    {
      Mail::send(['text'=>'mail'],['name','Infant Jesus Academy CORM'], function($message){
         $message->to('ejmaskarino05@gmail.com','To ernest')->subject('Test Email');
         $message->to('ijacorentalmanagement@gmail.com','IJACORM');
      });
    }
}
