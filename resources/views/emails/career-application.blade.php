<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Lamaran Kerja - {{ $position }}</title>
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
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #F2AC59;
            color: white !important;
            text-decoration: none;
            border-radius: 4px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Konfirmasi Lamaran Diterima</h1>
        <p>Terima kasih telah melamar di PT EWF</p>
    </div>
    
    <div class="content">
        <div class="section">
            <p>Halo <strong>{{ $fullName }}</strong>,</p>
            <p>Terima kasih telah melamar untuk posisi <strong>{{ $position }}</strong> di PT EWF. Kami telah menerima dokumen lamaran Anda dan akan segera memprosesnya.</p>
        </div>

        <div class="section">
            <h2>Detail Lamaran Anda</h2>
            <p><span class="label">Posisi:</span> <span class="value">{{ $position }}</span></p>
            <p><span class="label">Lokasi:</span> <span class="value">{{ $location }}</span></p>
            <p><span class="label">Tanggal Lamar:</span> <span class="value">{{ $applicationDate }}</span></p>
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
            <h2>Lampiran</h2>
            <p>CV Anda telah kami terima dengan baik.</p>
        </div>
        
        <div class="section">
            <p>Kami akan menghubungi Anda melalui email atau nomor telepon yang terdaftar untuk tahap selanjutnya.</p>
            <p>Hormat kami,<br><strong>Tim Rekrutmen PT EWF</strong></p>
        </div>
    </div>
    
    <div class="footer">
        <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
        <p>&copy; {{ date('Y') }} PT EWF. Semua hak dilindungi.</p>
    </div>
</body>
</html>
