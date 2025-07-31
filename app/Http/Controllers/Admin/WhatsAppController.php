<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhatsAppController extends Controller
{
    /**
     * Display WhatsApp settings form.
     */
    public function index()
    {
        return view('admin.whatsapp.index');
    }

    /**
     * Update WhatsApp settings.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:20',
            'default_message' => 'required|string|max:500',
            'admin_name' => 'required|string|max:100',
            'popup_message' => 'required|string|max:200',
            'popup_delay' => 'required|integer|min:1|max:60',
            'enabled' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Update .env file
            $this->updateEnvFile('WHATSAPP_PHONE_NUMBER', $request->phone_number);
            $this->updateEnvFile('WHATSAPP_DEFAULT_MESSAGE', $request->default_message);
            $this->updateEnvFile('WHATSAPP_ADMIN_NAME', $request->admin_name);
            $this->updateEnvFile('WHATSAPP_POPUP_MESSAGE', $request->popup_message);
            $this->updateEnvFile('WHATSAPP_POPUP_DELAY', $request->popup_delay);
            $this->updateEnvFile('WHATSAPP_ENABLED', $request->has('enabled') ? 'true' : 'false');

            return redirect()->route('admin.whatsapp.index')
                ->with('success', 'Pengaturan WhatsApp berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Update .env file
     */
    private function updateEnvFile($key, $value)
    {
        $path = base_path('.env');
        
        if (file_exists($path)) {
            $content = file_get_contents($path);
            
            // Escape special characters in value
            $value = str_replace('"', '\"', $value);
            
            // Check if key exists
            if (strpos($content, $key . '=') !== false) {
                // Update existing key
                $content = preg_replace(
                    '/^' . $key . '=.*/m',
                    $key . '="' . $value . '"',
                    $content
                );
            } else {
                // Add new key
                $content .= "\n" . $key . '="' . $value . '"';
            }
            
            file_put_contents($path, $content);
        }
    }
} 