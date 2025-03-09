@extends('Back.master')

@section('title', 'Industri Kecil dan Menengah')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Industri Kecil dan Menengah</h3>
                    <div class="card-tools">
                        <a href="{{ route('dashboard.ikm.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-lg"></i> Tambah Data
                        </a>
                        <button type="button" class="btn btn-success btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#importModal">
                            <i class="bi bi-file-earmark-excel"></i> Import Excel
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <h5><i class="bi bi-check-circle-fill me-1"></i> Sukses!</h5>
                        {{ session('success') }}
                    </div>
                    @endif

                    <table id="ikm-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Nama Pemilik</th>
                                <th>Alamat</th>
                                <th>Kontak</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ikms ?? [] as $index => $ikm)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $ikm->nama_perusahaan }}</td>
                                <td>{{ $ikm->nama_pemilik }}</td>
                                <td>{{ $ikm->alamat }}</td>
                                <td>{{ $ikm->no_hp }}</td>
                                <td>{{ $ikm->email }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-gear"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('dashboard.ikm.show', $ikm->id) }}"><i class="bi bi-eye me-2"></i>Detail</a></li>
                                            <li><a class="dropdown-item" href="{{ route('dashboard.ikm.edit', $ikm->id) }}"><i class="bi bi-pencil-square me-2"></i>Edit</a></li>
                                            <li>
                                                <button type="button" class="dropdown-item text-danger delete-btn" data-id="{{ $ikm->id }}" data-nama="{{ $ikm->nama_perusahaan }}">
                                                    <i class="bi bi-trash me-2"></i>Hapus
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                <p>Apakah Anda yakin ingin menghapus data <strong id="delete-item-name"></strong>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Import Excel -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data IKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.ikm.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file" class="form-label">Pilih File Excel</label>
                        <input type="file" class="form-control" id="file" name="file" required>
                        <small class="text-muted">Format file: .xlsx, .xls</small>
                    </div>
                    <div class="mb-3">
                        {{-- <a href="{{ route('dashboard.ikm.template') }}" class="btn btn-outline-info btn-sm">
                            <i class="bi bi-download"></i> Download Template
                        </a> --}}
                    </div>
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle-fill me-1"></i> Perhatian:
                        <ul class="mb-0 mt-1">
                            <li>Pastikan format data sesuai dengan template</li>
                            <li>Ukuran file maksimal 2MB</li>
                            <li>Data yang sudah ada tidak akan ditimpa</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-upload me-1"></i> Import
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        // Inisialisasi DataTable
        $('#ikm-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
            }
        });

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
            deleteForm.setAttribute('action', `{{ route('dashboard.ikm.destroy', '') }}/${id}`);
            
            // Tampilkan modal
            const modal = new bootstrap.Modal(deleteModal);
            modal.show();
        });
    });
</script>
@endsection
