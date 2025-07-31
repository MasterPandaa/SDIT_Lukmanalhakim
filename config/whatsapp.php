<?php

return [
    /*
    |--------------------------------------------------------------------------
    | WhatsApp Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk fitur WhatsApp popup dan chat
    |
    */

    // Nomor WhatsApp default (format: 6281234567890)
    'phone_number' => env('WHATSAPP_PHONE_NUMBER', '6281234567890'),
    
    // Pesan default yang akan dikirim
    'default_message' => env('WHATSAPP_DEFAULT_MESSAGE', 'Assalamualikum, saya ingin bertanya tentang SDIT Luqman Al Hakim'),
    
    // Nama admin yang ditampilkan di popup
    'admin_name' => env('WHATSAPP_ADMIN_NAME', 'Admin eLHaeS'),
    
    // Pesan yang ditampilkan di popup
    'popup_message' => env('WHATSAPP_POPUP_MESSAGE', 'Assalamualikum, ada yang bisa kami bantu?'),
    
    // Delay sebelum popup muncul (dalam detik)
    'popup_delay' => env('WHATSAPP_POPUP_DELAY', 3),
    
    // Apakah fitur WhatsApp aktif
    'enabled' => env('WHATSAPP_ENABLED', true),
]; 