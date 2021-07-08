<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;

use Mail;
use App\Mail\ContactMail;
class ContactController extends Controller
{
    public function contact(){
        return view('home');
    }
    //
    public function sendEmail(Request $request){

        $details=[
          'name'=>$request->name,
          'email'=> $request->email,
          'subject'=>$request->subject,
          'message'=> $request->message
        ];
        $d=new ContactMail($details);
        Mail::to('fatimetouahmed682@gmail.com')->send($d);
        return back()->with('message_sent','Votre message a été avec succés');
        
    }
}
