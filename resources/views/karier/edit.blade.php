@extends('layouts.admin')

@section('namaPage', 'Edit Lowongan Kerja')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Lowongan Kerja</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('karier.update', $lowongan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_kota">Nama Kota <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_kota') is-invalid @enderror" 
                                       id="nama_kota" name="nama_kota" value="{{ old('nama_kota', $lowongan->nama_kota) }}" 
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
                                       id="posisi" name="posisi" value="{{ old('posisi', $lowongan->posisi) }}" 
                                       placeholder="Contoh: Web Developer, Marketing, dll" required>
                                @error('posisi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email', $lowongan->email) }}" 
                                       placeholder="Email untuk menerima lamaran" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Responsibilities <span class="text-danger">*</span></label>
                        <textarea class="form-control tinymce-editor @error('deskripsi') is-invalid @enderror" 
                                 id="deskripsi" name="deskripsi" rows="10" 
                                 placeholder="Tuliskan tanggung jawab pekerjaan" required>{{ old('deskripsi', $lowongan->responsibilities) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="persyaratan">Qualification <span class="text-danger">*</span></label>
                        <textarea class="form-control tinymce-editor @error('persyaratan') is-invalid @enderror" 
                                 id="persyaratan" name="persyaratan" rows="10" 
                                 placeholder="Tuliskan kualifikasi yang dibutuhkan" required>{{ old('persyaratan', $lowongan->requirements) }}</textarea>
                        @error('persyaratan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('karier.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
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
    <script src="https://cdn.tiny.cloud/1/rijrac2uxn06a1q296snq7j1fi420fd29r3lc1o12yzq6fwv/tinymce/8/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.tinymce-editor',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            content_style: 'img{max-width:100%;height:auto;}',
            document_base_url: "{{ config('app.url') }}/",
            relative_urls: false,
            remove_script_host: false,
            automatic_uploads: true,
            image_uploadtab: true,
            file_picker_types: 'image',
            image_class_list: [{
                title: 'Responsive',
                value: 'img-fluid'
            }],
            setup: (editor) => {
                const sync = () => editor.save();
                editor.on('change input undo redo', sync);
            },
            images_upload_handler: (blobInfo, progress) => new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();

                xhr.open('POST', '{{ route('tinymce.upload') }}');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                xhr.withCredentials = true;

                xhr.upload.onprogress = (e) => {
                    progress(e.loaded / e.total * 100);
                };

                xhr.onload = () => {
                    if (xhr.status !== 200) {
                        reject('HTTP Error: ' + xhr.status);
                        return;
                    }

                    let json;
                    try {
                        json = JSON.parse(xhr.responseText);
                    } catch (e) {
                        reject('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    if (!json || typeof json.location !== 'string') {
                        reject('Invalid response: ' + xhr.responseText);
                        return;
                    }

                    resolve(json.location);
                };

                xhr.onerror = () => {
                    reject('Image upload failed due to a network error.');
                };

                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            }),
        });
    </script>
@endpush

