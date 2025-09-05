<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\ContactSetting;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;

class ContactController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(10);
        $contactSettings = ContactSetting::getSettings();
        
        $stats = [
            'total' => ContactMessage::count(),
            'unread' => ContactMessage::unread()->count(),
            'read' => ContactMessage::read()->count(),
            'replied' => ContactMessage::replied()->count(),
        ];
        
        return view('admin.contact.index', compact('messages', 'contactSettings', 'stats'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        // Mark as read if still unread
        if ($message->status === 'unread') {
            $message->markAsRead();
        }
        
        return view('admin.contact.show', compact('message'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'admin_reply' => 'required|string|max:2000'
        ]);

        $message = ContactMessage::findOrFail($id);

        // Build the mailable
        $mailable = new ContactReplyMail(
            $request->input('admin_reply'),
            $message->subject ?? 'Pesan Anda',
            $message->name ?? 'Pengguna'
        );

        // Determine from address
        $settings = ContactSetting::getSettings();
        $fromAddress = $settings->email ?? config('mail.from.address');
        $fromName = config('mail.from.name') ?? config('app.name');

        try {
            if ($fromAddress) {
                Mail::to($message->email)->send($mailable->from($fromAddress, $fromName));
            } else {
                // fallback without explicit from
                Mail::to($message->email)->send($mailable);
            }

            // Update status and store reply text
            $message->markAsReplied($request->admin_reply);

            return redirect()->route('admin.contact.index')->with('success', 'Balasan email berhasil dikirim dan status pesan diperbarui.');
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'office_hours' => 'nullable|string',
        ]);

        $settings = ContactSetting::getSettings();
        $payload = $request->only([
            'address','phone','email','whatsapp','facebook','instagram','tiktok','youtube','latitude','longitude','office_hours'
        ]);

        if ($settings) {
            $settings->update($payload);
        } else {
            // Ensure there is only one active settings row
            $payload['is_active'] = true;
            ContactSetting::create($payload);
        }

        // Sync to WebsiteSetting footer socials so both stay consistent
        try {
            $website = \App\Models\WebsiteSetting::getSettings();
            if ($website) {
                $website->update([
                    'footer_facebook'  => $request->input('facebook'),
                    'footer_instagram' => $request->input('instagram'),
                    'footer_tiktok'    => $request->input('tiktok'),
                ]);
                // Clear cache if any
                try { \Cache::forget('website_settings'); } catch (\Throwable $e) {}
            }
        } catch (\Throwable $e) {
            // do not fail the request if syncing fails; just log silently
            try { \Log::warning('Footer social sync failed: '.$e->getMessage()); } catch (\Throwable $e2) {}
        }

        return redirect()->route('admin.contact.index')->with('success', 'Pengaturan kontak berhasil diperbarui dan disinkronkan ke footer.');
    }

    public function delete($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Pesan berhasil dihapus.');
    }

    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->markAsRead();

        return redirect()->back()->with('success', 'Pesan ditandai sebagai telah dibaca.');
    }

    public function markAsReplied($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->markAsReplied();

        return redirect()->back()->with('success', 'Pesan ditandai sebagai telah dibalas.');
    }
} 