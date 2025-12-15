@extends('layouts.admin')

@section('namaPage', 'Manajemen Karier')

@section('main-content')

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

<!-- Daftar Lowongan Kerja -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="m-0 text-gray-800 font-weight-bold">
                Daftar Karier
            </h5>

            <a href="{{ route('karier.create') }}" class="btn btn-primary btn-sm shadow">
                <i class="fas fa-plus"></i> Tambah Lowongan
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive rounded overflow-hidden m-0 border shadow">
            <table class="table table-striped table-hover mb-0" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center align-middle">No</th>
                        <th class="text-center align-middle">Kota</th>
                        <th class="align-middle">Posisi</th>
                        <th class="align-middle">Email</th>
                        <th class="text-center align-middle" style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lowongans as $index => $lowongan)
                    <tr>
                        <td class="text-center align-middle">{{ $lowongans->firstItem() + $index }}</td>
                        <td class="text-center align-middle">
                            {{ $lowongan->nama_kota }}
                        </td>
                        <td class="align-middle">
                            <div class="font-weight-bold">{{ $lowongan->posisi }}</div>
                        </td>
                        <td class="align-middle">
                            {{ $lowongan->email }}
                        </td>
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center" style="gap: 8px;">
                                <a href="{{ route('karier.edit', $lowongan->id) }}" class="btn btn-sm btn-primary" title="Edit" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('karier.destroy', $lowongan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')"
                                            title="Hapus"
                                            style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <div class="text-muted">
                                <i class="fas fa-briefcase fa-3x mb-3"></i>
                                <p class="mb-0">Belum ada lowongan kerja yang tersedia</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-muted">
                Menampilkan {{ $lowongans->firstItem() }} - {{ $lowongans->lastItem() }} dari {{ $lowongans->total() }} lowongan
            </div>
            {{ $lowongans->links() }}
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
