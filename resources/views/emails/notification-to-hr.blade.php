<!DOCTYPE html>
<html>
<head>
    <title>Lamaran Baru - {{ $position }} - {{ $fullName }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #F2AC59;
            padding: 25px;
            text-align: center;
            color: white;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 25px;
            border: 1px solid #e0e0e0;
            border-top: none;
            border-radius: 0 0 5px 5px;
            background-color: #fff;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
            padding: 15px;
        }
        .section {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }
        .section:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: 600;
            color: #4C4C4C;
            display: inline-block;
            min-width: 150px;
        }
        .value {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Lamaran Baru Diterima</h1>
    </div>
    
    <div class="content">
        <div class="section">
            <h2>Detail Posisi</h2>
            <p><span class="label">Posisi:</span> <span class="value">{{ $position }}</span></p>
            <p><span class="label">Lokasi:</span> <span class="value">{{ $location }}</span></p>
        </div>
        
        <div class="section">
            <h2>Data Pelamar</h2>
            <p><span class="label">Nama Lengkap:</span> <span class="value">{{ $fullName }}</span></p>
            <p><span class="label">Email:</span> <span class="value">{{ $email }}</span></p>
            <p><span class="label">Telepon:</span> <span class="value">{{ $phone }}</span></p>
            <p><span class="label">Pengalaman Kerja:</span> <span class="value">{{ $experience }}</span></p>
            <p><span class="label">Notice Period:</span> <span class="value">{{ $noticePeriod }}</span></p>
            @if($referral)
                <p><span class="label">Referensi:</span> <span class="value">{{ $referral }}</span></p>
            @endif
        </div>
        
        <div class="section">
            <h2>Motivasi</h2>
            <p>{{ $motivation }}</p>
        </div>
        
        <div class="section">
            <p>CV pelamar terlampir dalam email ini.</p>
        </div>
    </div>
    
    <div class="footer">
        <p>Email ini dikirim secara otomatis pada {{ $applicationDate }}. Harap jangan membalas email ini.</p>
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </div>
</body>
</html>
