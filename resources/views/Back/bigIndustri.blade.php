@extends('Back.master')

@section('title', 'Industri Besar')

@section('page-title', 'Industri Besar')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Industri Besar</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="bi bi-building me-2"></i>Daftar Industri Besar</h3>
                    <div>
                        <a href="{{ route('dashboard.bigindustri.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Industri Besar
                        </a>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
                            <i class="bi bi-file-earmark-excel me-1"></i> Import Excel
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div>
                    <table id="big-industri-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat Pabrik</th>
                                <th>Sektor Industri</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bigindustris as $index => $industri)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $industri->nama_perusahaan }}</td>
                                <td>{{ $industri->alamat_pabrik }}</td>
                                <td>{{ $industri->sektor_industri }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-gear"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('dashboard.bigindustri.show', $industri->id) }}"><i class="bi bi-eye me-2"></i>Detail</a></li>
                                            <li><a class="dropdown-item" href="{{ route('dashboard.bigindustri.edit', $industri->id) }}"><i class="bi bi-pencil-square me-2"></i>Edit</a></li>
                                            <li>
                                                <button type="button" class="dropdown-item text-danger delete-btn" data-id="{{ $industri->id }}" data-nama="{{ $industri->nama_perusahaan }}">
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- Modal Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus industri besar <strong id="delete-item-name"></strong>?</p>
                <p class="text-danger">Tindakan ini tidak dapat dibatalkan.</p>
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

<!-- Modal Import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Import Data Industri Besar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.bigindustri.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file" class="form-label">File Excel</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".xlsx, .xls, .csv" required>
                        <div class="form-text">Format file: .xlsx, .xls, .csv</div>
                    </div>
                    {{-- <div class="mb-3">
                        <a href="{{ route('dashboard.big-industri.template') }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-download me-1"></i> Download Template
                        </a>
                    </div> --}}
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
        $('#big-industri-table').DataTable({
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
            deleteForm.setAttribute('action', `{{ route('dashboard.bigindustri.destroy', '') }}/${id}`);
            
            // Tampilkan modal
            const modal = new bootstrap.Modal(deleteModal);
            modal.show();
        });
    });
</script>
@endsection
