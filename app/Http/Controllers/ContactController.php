<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ?? '',
            'subject' => $request->subject,
            'message' => $request->message
        ];

        // Email to site admin
        $recipient = "contac@luqmanalhakim.sch.id";
        
        // Build the email content
        $email_content = "Full Name: " . $data['name'] . "\n";
        $email_content .= "Phone: " . $data['phone'] . "\n";
        $email_content .= "Email: " . $data['email'] . "\n\n";
        $email_content .= "Subject: " . $data['subject'] . "\n\n";
        $email_content .= "Message:\n" . $data['message'] . "\n";
        
        // Build the email headers
        $email_headers = "From: " . $data['name'] . " <" . $data['email'] . ">";
        
        // Send the email
        mail($recipient, $data['subject'], $email_content, $email_headers);

        return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah dikirim.');
    }
}
