<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.form');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max: 255',
            'subject' => 'required|string|max: 255',
            'message' => 'required|string|max: 500',

        ]);

        Mail::to(Auth::user()->email)->send(new ContactMail());
        return view('frontend.contact-confirm');
    }
}
