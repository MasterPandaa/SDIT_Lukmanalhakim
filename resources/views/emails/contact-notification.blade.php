<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan Baru dari Website</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #007bff; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background: #f8f9fa; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 5px; }
        .message-box { background: white; padding: 15px; border-left: 4px solid #007bff; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Pesan Baru dari Website SDIT Lukmanalhakim</h2>
        </div>
        
        <div class="content">
            <div class="field">
                <div class="label">Nama:</div>
                <div class="value">{{ $name }}</div>
            </div>
            
            <div class="field">
                <div class="label">Email:</div>
                <div class="value">{{ $email }}</div>
            </div>
            
            @if($phone)
            <div class="field">
                <div class="label">Telepon:</div>
                <div class="value">{{ $phone }}</div>
            </div>
            @endif
            
            <div class="field">
                <div class="label">Subjek:</div>
                <div class="value">{{ $subject }}</div>
            </div>
            
            <div class="field">
                <div class="label">Pesan:</div>
                <div class="message-box">{{ $message }}</div>
            </div>
            
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 12px; color: #666;">
                <p>Pesan ini dikirim dari form kontak website SDIT Lukmanalhakim.</p>
                <p>Waktu: {{ now()->format('d/m/Y H:i:s') }}</p>
            </div>
        </div>
    </div>
</body>
</html> 