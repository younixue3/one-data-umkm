@extends('Back.master')

@section('title', 'Detail Industri Besar')

@section('page-title', 'Detail Industri Besar')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.bigindustri.index') }}">Industri Besar</a></li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="bi bi-building me-2"></i>Detail Industri Besar</h3>
                    <div>
                        <a href="{{ route('dashboard.bigindustri.edit', $bigindustri->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <a href="{{ route('dashboard.bigindustri.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="card-title mb-0">Informasi Perusahaan</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 200px">Nama Perusahaan</th>
                                        <td>{{ $bigindustri->nama_perusahaan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Pabrik</th>
                                        <td>{{ $bigindustri->alamat_pabrik }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sektor Industri</th>
                                        <td>{{ $bigindustri->sektor_industri }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Dibuat</th>
                                        <td>{{ $bigindustri->created_at->format('d F Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Terakhir Diperbarui</th>
                                        <td>{{ $bigindustri->updated_at->format('d F Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-danger delete-btn" data-id="{{ $bigindustri->id }}" data-nama="{{ $bigindustri->nama_perusahaan }}">
                        <i class="bi bi-trash me-1"></i> Hapus Industri Besar
                    </button>
                    <a href="{{ route('dashboard.bigindustri.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus industri besar <strong id="delete-item-name"></strong>?</p>
                <p class="text-danger">Tindakan ini tidak dapat dibatalkan!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        // Modal hapus data
        const deleteModal = document.getElementById('deleteModal');
        const deleteItemName = document.getElementById('delete-item-name');
        const deleteForm = document.getElementById('deleteForm');
        
        // Event listener untuk tombol hapus
        $('.delete-btn').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            
            // Set nama item yang akan dihapus
            deleteItemName.textContent = nama;
            
            // Set action form
            deleteForm.setAttribute('action', `{{ route('dashboard.bigindustri.destroy', '') }}/${id}`);
            
            // Tampilkan modal
            const modal = new bootstrap.Modal(deleteModal);
            modal.show();
        });
    });
</script>
@endsection
