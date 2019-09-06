<?php

namespace App\Http\Controllers;

use App\FooterContact;
use Illuminate\Http\Request;

class FooterContactController extends Controller
{
    public function addContact(){

        return view('front.footer-contact.footer-contact');
    }

    public function saveFooter(Request $request){

        $footerContact = new FooterContact();
        $footerContact->address = $request->address;
        $footerContact->email = $request->email;
        $footerContact->number = $request->number;
        $footerContact->save();

        return redirect('/FooterContact/AddContact');
    }
}
