<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\ContactSetting;

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
        $message->markAsReplied($request->admin_reply);

        return redirect()->route('admin.contact.index')->with('success', 'Balasan telah dikirim.');
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
            'youtube' => 'nullable|url|max:255',
            'google_maps_embed' => 'nullable|string',
            'office_hours' => 'nullable|string',
        ]);

        $settings = ContactSetting::getSettings();
        
        if ($settings) {
            $settings->update($request->all());
        } else {
            ContactSetting::create($request->all());
        }

        return redirect()->route('admin.contact.index')->with('success', 'Pengaturan kontak berhasil diperbarui.');
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