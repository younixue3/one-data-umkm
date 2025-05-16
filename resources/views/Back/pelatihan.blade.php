@extends('Back.master')

@section('title', 'Pelatihan')

@section('page-title', 'Manajemen Pelatihan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pelatihan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-mortarboard me-2"></i>Daftar Pelatihan</h3>
                    <div class="card-tools">
                        <a href="{{ route('dashboard.pelatihan.create') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-lg"></i> Tambah Pelatihan
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="pelatihanTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Judul</th>
                                <th width="10%">Tahun</th>
                                <th width="10%">Kategori</th>
                                <th width="10%">Peserta</th>
                                <th width="10%">Kelurahan</th>
                                <th width="10%">Kecamatan</th>
                                <th width="10%">Kabupaten</th>
                                <th width="10%">Provinsi</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pelatihan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ ucwords($item->kategori) }}</td>
                                <td>{{ $item->peserta }}</td>
                                <td>{{ $item->kelurahan->nama ?? '-' }}</td>
                                <td>{{ $item->kecamatan->nama ?? '-' }}</td>
                                <td>{{ $item->kabupaten->nama ?? '-' }}</td>
                                <td>{{ $item->provinsi->nama ?? '-' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-gear"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('dashboard.pelatihan.edit', $item->id) }}"><i class="bi bi-pencil-square me-2"></i>Edit</a></li>
                                            <li>
                                                <form action="{{ route('dashboard.pelatihan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger"><i class="bi bi-trash me-2"></i>Hapus</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data yang tersedia</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(function () {
        $("#pelatihanTable").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
@endsection
