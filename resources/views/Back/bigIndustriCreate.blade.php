@extends('Back.master')

@section('title', 'Tambah Industri Besar')

@section('page-title', 'Tambah Industri Besar')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.bigindustri.index') }}">Industri Besar</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="bi bi-building-add me-2"></i>Tambah Industri Besar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ route('dashboard.bigindustri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <!-- Informasi Perusahaan -->
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">Informasi Perusahaan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required>
                                        @error('nama_perusahaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="alamat_pabrik" class="form-label">Alamat Pabrik <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('alamat_pabrik') is-invalid @enderror" id="alamat_pabrik" name="alamat_pabrik" rows="3" required>{{ old('alamat_pabrik') }}</textarea>
                                        @error('alamat_pabrik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="sektor_industri" class="form-label">Sektor Industri <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('sektor_industri') is-invalid @enderror" id="sektor_industri" name="sektor_industri" rows="3" required>{{ old('sektor_industri') }}</textarea>
                                        @error('sektor_industri')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('dashboard.bigindustri.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Industri Besar
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection
