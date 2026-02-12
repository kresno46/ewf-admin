@extends('layouts.admin')

@section('namaPage', 'Pengaturan Website')

@section('main-content')
    @if(session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Pengaturan Informasi Website</h5>
        </div>
        <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 pl-3">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form id="profileForm" action="{{ route('profileWeb.storeOrUpdate') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="website_name">Nama Website <span class="text-danger">*</span></label>
                <input type="text" name="website_name" id="website_name" class="form-control"
                    value="{{ old('website_name', $profile->website_name ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $profile->description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea name="address" id="address" class="form-control" rows="3">{{ old('address', $profile->address ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="map_link">Link Map</label>
                <input type="url" name="map_link" id="map_link" class="form-control"
                    value="{{ old('map_link', $profile->map_link ?? '') }}" placeholder="https://...">
            </div>

            <div class="form-group">
                <label for="complaint_link">Link Pengaduan</label>
                <input type="url" name="complaint_link" id="complaint_link" class="form-control"
                    value="{{ old('complaint_link', $profile->complaint_link ?? '') }}" placeholder="https://...">
            </div>

            <div class="form-group">
                <label for="phone">Telepon</label>
                <input type="text" name="phone" id="phone" class="form-control"
                    value="{{ old('phone', $profile->phone ?? '') }}" maxlength="50">
            </div>

            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" name="fax" id="fax" class="form-control"
                    value="{{ old('fax', $profile->fax ?? '') }}" maxlength="50">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $profile->email ?? '') }}">
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            </div>
        </form>
        </div>
    </div>
@endsection
