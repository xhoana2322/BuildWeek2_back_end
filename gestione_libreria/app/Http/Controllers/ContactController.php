<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        
        Mail::to('fenixinsky@gmail.com')->send(new ContactMessage($data));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
