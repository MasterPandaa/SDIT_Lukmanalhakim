<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;
use App\Models\ContactSetting;

class ContactController extends Controller
{
    public function index()
    {
        $contactSettings = ContactSetting::getSettings();
        return view('contact.index', compact('contactSettings'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000'
        ]);

        // Simpan pesan ke database
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'unread'
        ]);

        // Kirim email notifikasi ke admin (opsional)
        $contactSettings = ContactSetting::getSettings();
        if ($contactSettings && $contactSettings->email) {
            try {
                Mail::send('emails.contact-notification', [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'subject' => $request->subject,
                    'message' => $request->message
                ], function($message) use ($contactSettings, $request) {
                    $message->to($contactSettings->email)
                            ->subject('Pesan Baru dari Website: ' . $request->subject)
                            ->replyTo($request->email, $request->name);
                });
            } catch (\Exception $e) {
                // Log error jika email gagal dikirim
                \Log::error('Failed to send contact email: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah dikirim dan akan segera kami balas.');
    }
}
