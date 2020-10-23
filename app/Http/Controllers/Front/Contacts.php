<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use App\Mail\contactMail;
use App\Model\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Contacts extends Controller
{


    public function getContact() {

        return view('front.contact');
    }



    public function postContact(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',

        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );


        Mail::send('front.emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to(setting()->email);
            $message->subject($data['subject']);
        });


        session()->flash('success','Thanks To Contact Us');
        return back();
    }




}