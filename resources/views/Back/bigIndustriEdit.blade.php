@extends('Back.master')

@section('title', 'Edit Industri Besar')

@section('page-title', 'Edit Industri Besar')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.bigindustri.index') }}">Industri Besar</a></li>
    <li class="breadcrumb-item active">Edit Industri Besar</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="bi bi-building me-2"></i>Edit Industri Besar</h3>
                    <a href="{{ route('dashboard.bigindustri.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.bigindustri.update', $bigindustri->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $bigindustri->id }}">
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="nama_perusahaan" class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" 
                                id="nama_perusahaan" name="nama_perusahaan" 
                                value="{{ old('nama_perusahaan', $bigindustri->nama_perusahaan) }}" required>
                            @error('nama_perusahaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="alamat_pabrik" class="form-label">Alamat Pabrik <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('alamat_pabrik') is-invalid @enderror" 
                                id="alamat_pabrik" name="alamat_pabrik" rows="3" required>{{ old('alamat_pabrik', $bigindustri->alamat_pabrik) }}</textarea>
                            @error('alamat_pabrik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="sektor_industri" class="form-label">Sektor Industri <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('sektor_industri') is-invalid @enderror" 
                                id="sektor_industri" name="sektor_industri" rows="3" required>{{ old('sektor_industri', $bigindustri->sektor_industri) }}</textarea>
                            @error('sektor_industri')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('dashboard.bigindustri.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Industri Besar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
