@extends('Back.master')

@section('title', 'Manajemen Bidang')

@section('page-title', 'Manajemen Bidang')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Bidang</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="bi bi-building me-2"></i>Daftar Bidang</h3>
                <div class="card-tools">
                    <a href="{{ route('dashboard.bidang.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg"></i> Tambah Konten Bidang
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="bidangTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Gambar</th>
                            <th width="15%">Kategori</th>
                            <th width="30%">Deskripsi</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bidangs as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->category }}" class="img-thumbnail" style="max-height: 100px;">
                                @else
                                    <span class="text-muted">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                @if($item->category == 'perindustrian')
                                    Perindustrian
                                @elseif($item->category == 'perdagangan dalam negeri')
                                    Perdagangan Dalam Negeri
                                @elseif($item->category == 'perdagangan luar negeri')
                                    Perdagangan Luar Negeri
                                @elseif($item->category == 'koperasi')
                                    Koperasi
                                @else
                                    {{ $item->category }}
                                @endif
                            </td>
                            <td>{!! Str::limit(strip_tags($item->description), 150) !!}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-gear"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('dashboard.bidang.edit', $item->id) }}"><i class="bi bi-pencil-square me-2"></i>Edit</a></li>
                                        <li>
                                            <form action="{{ route('dashboard.bidang.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus bidang ini?')">
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
                            <td colspan="5" class="text-center">Tidak ada data bidang yang tersedia</td>
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
        $('#bidangTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection
