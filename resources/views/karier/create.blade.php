@extends('layouts.admin')

@section('namaPage', 'Tambah Lowongan Kerja')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Lowongan Kerja</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('karier.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_kota">Nama Kota <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_kota') is-invalid @enderror" 
                                       id="nama_kota" name="nama_kota" value="{{ old('nama_kota') }}" 
                                       placeholder="Contoh: Jakarta, Bandung, dll" required>
                                @error('nama_kota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="posisi">Posisi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('posisi') is-invalid @enderror" 
                                       id="posisi" name="posisi" value="{{ old('posisi') }}" 
                                       placeholder="Contoh: Web Developer, Marketing, dll" required>
                                @error('posisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="Email untuk menerima lamaran" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Responsibilities <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                 id="deskripsi" name="deskripsi" rows="10" 
                                 placeholder="Tuliskan tanggung jawab pekerjaan" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="persyaratan">Qualification<span class="text-danger">*</span></label>
                        <textarea class="form-control @error('persyaratan') is-invalid @enderror" 
                                 id="persyaratan" name="persyaratan" rows="10" 
                                 placeholder="Tuliskan kualifikasi yang dibutuhkan" required>{{ old('persyaratan') }}</textarea>
                        @error('persyaratan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('karier.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/tinymce@5.10.0/build/skins/ui/oxide/content.min.css" rel="stylesheet">
    <style>
        .tox-tinymce {
            border-radius: 0.35rem !important;
        }
        .tox .tox-toolbar__primary {
            background: #f8f9fc !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.0/tinymce.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi TinyMCE untuk deskripsi
            tinymce.init({
                selector: '#deskripsi',
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family: "Nunito", sans-serif; font-size: 14px }',
                skin: 'oxide',
                content_css: 'default',
                setup: function(editor) {
                    editor.on('change', function() {
                        editor.save();
                    });
                }
            });

            // Inisialisasi TinyMCE untuk persyaratan
            tinymce.init({
                selector: '#persyaratan',
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family: "Nunito", sans-serif; font-size: 14px }',
                skin: 'oxide',
                content_css: 'default',
                setup: function(editor) {
                    editor.on('change', function() {
                        editor.save();
                    });
                }
            });

            // Validasi form
            $('form').on('submit', function(e) {
                // Trigger save untuk memastikan konten tersimpan sebelum submit
                tinymce.triggerSave();
                
                // Validasi manual jika diperlukan
                const deskripsi = $('#deskripsi').val();
                const persyaratan = $('#persyaratan').val();
                
                if (!deskripsi.trim()) {
                    e.preventDefault();
                    alert('Silakan isi field Responsibilities');
                    return false;
                }
                
                if (!persyaratan.trim()) {
                    e.preventDefault();
                    alert('Silakan isi field Requirements');
                    return false;
                }
            });
        });
    </script>
@endpush
