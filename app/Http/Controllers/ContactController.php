<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
//            'email' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

//        return redirect()->back();

        return redirect('/contact')->with('message','Thanks for your Valuable Opinion..Your opinion will be considered on highest priority');


    }
}
