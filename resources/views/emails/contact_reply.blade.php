<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Balasan dari Admin</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; background:#f6f9fc; margin:0; padding:24px; }
        .container { max-width:640px; margin:0 auto; background:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.06); }
        .header { background:linear-gradient(135deg,#0ea5e9,#22c55e); color:#fff; padding:20px 24px; }
        .content { padding:24px; color:#111827; line-height:1.6; }
        .blockquote { background:#f1f5f9; border-left:4px solid #0ea5e9; padding:12px 16px; border-radius:6px; color:#334155; }
        .footer { color:#6b7280; font-size:12px; padding:16px 24px 24px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2 style="margin:0;">Balasan dari Admin</h2>
        <p style="margin:6px 0 0 0; opacity:.95;">Re: {{ $originalSubject }}</p>
    </div>
    <div class="content">
        <p>Halo {{ $recipientName }},</p>
        <p>Terima kasih telah menghubungi kami. Berikut adalah balasan dari tim admin:</p>
        <div class="blockquote">
            {!! nl2br(e($adminReply)) !!}
        </div>
        <p style="margin-top:18px;">Jika masih ada pertanyaan, silakan balas email ini.</p>
        <p>Hormat kami,<br/>Admin {{ config('app.name') }}</p>
    </div>
    <div class="footer">
        Email ini dikirim otomatis dari sistem {{ config('app.name') }}. Mohon tidak membalas ke alamat yang tidak memantau pesan masuk.
    </div>
</div>
</body>
</html>
