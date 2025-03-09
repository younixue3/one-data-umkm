@extends('Back.master')

@section('title', 'Manajemen Pengguna')

@section('page-title', 'Manajemen Pengguna')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Pengguna</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="bi bi-person-gear me-2"></i>Daftar Pengguna</h3>
                <div class="card-tools">
                    <a href="{{ route('dashboard.user.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg"></i> Tambah Pengguna
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="userTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Nama</th>
                            <th width="20%">Email</th>
                            <th width="15%">Peran</th>
                            <th width="15%">Bidang</th>
                            <th width="15%">Tanggal Dibuat</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($userss as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role == 'admin')
                                    <span class="badge bg-danger">Admin</span>
                                @elseif($user->role == 'editor')
                                    <span class="badge bg-warning">Editor</span>
                                @else
                                    <span class="badge bg-info">Pengguna</span>
                                @endif
                            </td>
                            <td>
                                @if($user->bidang)
                                    {{ ucwords($user->bidang) }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-gear"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('dashboard.user.edit', $user->id) }}"><i class="bi bi-pencil-square me-2"></i>Edit</a></li>
                                        <li>
                                            <form action="{{ route('dashboard.user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
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
                            <td colspan="7" class="text-center">Tidak ada data pengguna yang tersedia</td>
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
        $('#userTable').DataTable({
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
