<!DOCTYPE html>
<html>
<head>
    <title>Lamaran Baru - {{ $position }}</title>
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
            background-color: #4C4C4C;
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
        .highlight {
            color: #F2AC59;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Lamaran Baru Diterima</h1>
        <p>Posisi: {{ $position }}</p>
    </div>
    
    <div class="content">
        <div class="section">
            <p>Halo Tim Rekrutmen,</p>
            <p>Terdapat lamaran baru untuk posisi <span class="highlight">{{ $position }}</span> yang perlu ditinjau.</p>
        </div>

        <div class="section">
            <h2>Informasi Pelamar</h2>
            <p><span class="label">Nama Lengkap:</span> <span class="value">{{ $fullName }}</span></p>
            <p><span class="label">Email:</span> <span class="value">{{ $email }}</span></p>
            <p><span class="label">Nomor Telepon:</span> <span class="value">{{ $phone }}</span></p>
            <p><span class="label">Pengalaman Kerja:</span> <span class="value">{{ $experience }} tahun</span></p>
            <p><span class="label">Dapat Bergabung:</span> <span class="value">{{ $noticePeriod }}</span></p>
            @if(isset($referral) && $referral)
            <p><span class="label">Referensi:</span> <span class="value">{{ $referral }}</span></p>
            @endif
        </div>

        <div class="section">
            <h2>Surat Lamaran</h2>
            <p>{{ $motivation }}</p>
        </div>

        <div class="section">
            <p>CV pelamar telah dilampirkan dalam email ini.</p>
        </div>
        
        <div class="section">
            <p>Tanggal Lamar: <strong>{{ $applicationDate }}</strong></p>
            <p>Silakan tinjau lamaran ini sesegera mungkin dan hubungi pelamar untuk langkah selanjutnya.</p>
        </div>
    </div>
    
    <div class="footer">
        <p>Email ini dikirim secara otomatis dari sistem rekrutmen PT EWF.</p>
        <p>&copy; {{ date('Y') }} PT EWF. Semua hak dilindungi.</p>
    </div>
</body>
</html>
