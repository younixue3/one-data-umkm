@extends('Back.master')

@section('title', 'Tambah Pengguna')

@section('page-title', 'Tambah Pengguna')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.user.index') }}">Pengguna</a></li>
    <li class="breadcrumb-item active">Tambah Pengguna</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('dashboard.user.store') }}" method="POST">
            @csrf
            
            <!-- Profil Pengguna -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-person me-2"></i>Profil Pengguna</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Keamanan -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-shield-lock me-2"></i>Keamanan</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="form-label">Kata Sandi <span class="text-danger">*</span></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Peran dan Bidang -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-person-badge me-2"></i>Peran dan Bidang</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role" class="form-label">Peran <span class="text-danger">*</span></label>
                                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                    <option value="" selected disabled>Pilih Peran</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>Editor</option>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Pengguna</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bidang" class="form-label">Bidang</label>
                                <select class="form-select @error('bidang') is-invalid @enderror" id="bidang" name="bidang">
                                    <option value="" selected disabled>Pilih Bidang</option>
                                    <option value="perindustrian" {{ old('bidang') == 'perindustrian' ? 'selected' : '' }}>Perindustrian</option>
                                    <option value="perdagangan dalam negeri" {{ old('bidang') == 'perdagangan dalam negeri' ? 'selected' : '' }}>Perdagangan Dalam Negeri</option>
                                    <option value="perdagangan luar negeri" {{ old('bidang') == 'perdagangan luar negeri' ? 'selected' : '' }}>Perdagangan Luar Negeri</option>
                                    <option value="koperasi" {{ old('bidang') == 'koperasi' ? 'selected' : '' }}>Koperasi</option>
                                </select>
                                @error('bidang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tombol Aksi -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('dashboard.user.index') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
