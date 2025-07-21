@extends('layouts.err')

@section('namaPage', '403 Forbidden')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center">
        <!-- Gambar Error 403 -->
        <img src="{{ asset('img/svg/403.svg') }}" alt="403 Error" class="img-fluid mb-4" style="max-width: 500px;">

        <h1 class="display-1 font-weight-bold text-warning">403</h1>
        <h2 class="h3">Akses Ditolak</h2>
        <p class="lead text-muted">Anda tidak memiliki izin untuk mengakses halaman ini. Pastikan Anda sudah login
            dengan akun yang sesuai.</p>

        <!-- Button to go back to home page -->
        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</div>
@endsection