@extends('Back.master')

@section('title', 'Tambah Pelatihan')

@section('page-title', 'Tambah Pelatihan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.pelatihan.index') }}">Pelatihan</a></li>
    <li class="breadcrumb-item active">Tambah Pelatihan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-mortarboard me-2"></i>Tambah Pelatihan Baru</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.pelatihan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Pelatihan</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="number" min="2000" max="2099" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun', date('Y')) }}" required>
                            @error('tahun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="aspek produksi" {{ old('kategori') == 'aspek produksi' ? 'selected' : '' }}>Aspek Produksi</option>
                                <option value="aspek sdm" {{ old('kategori') == 'aspek sdm' ? 'selected' : '' }}>Aspek SDM</option>
                                <option value="aspek kelembagaan" {{ old('kategori') == 'aspek kelembagaan' ? 'selected' : '' }}>Aspek Kelembagaan</option>
                                <option value="aspek pemasaran" {{ old('kategori') == 'aspek pemasaran' ? 'selected' : '' }}>Aspek Pemasaran</option>
                                <option value="aspek keuangan" {{ old('kategori') == 'aspek keuangan' ? 'selected' : '' }}>Aspek Keuangan</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="peserta" class="form-label">Peserta</label>
                            <input type="number" class="form-control @error('peserta') is-invalid @enderror" id="peserta" name="peserta" value="{{ old('peserta') }}" required>
                            @error('peserta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="provinsi_id" class="form-label">Provinsi</label>
                            <select class="form-select @error('provinsi_id') is-invalid @enderror" id="provinsi_id" name="provinsi_id">
                                <option value="">Pilih Provinsi</option>
                                @foreach($provinsis as $provinsi)
                                    <option value="{{ $provinsi->id }}" {{ old('provinsi_id') == $provinsi->id ? 'selected' : '' }}>
                                        {{ $provinsi->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('provinsi_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kabupaten_id" class="form-label">Kabupaten</label>
                            <select class="form-select @error('kabupaten_id') is-invalid @enderror" id="kabupaten_id" name="kabupaten_id">
                                <option value="">Pilih Kabupaten</option>
                                @foreach($kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten->id }}" {{ old('kabupaten_id') == $kabupaten->id ? 'selected' : '' }}>
                                        {{ $kabupaten->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kabupaten_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kecamatan_id" class="form-label">Kecamatan</label>
                            <select class="form-select @error('kecamatan_id') is-invalid @enderror" id="kecamatan_id" name="kecamatan_id">
                                <option value="">Pilih Kecamatan</option>
                                @foreach($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}" {{ old('kecamatan_id') == $kecamatan->id ? 'selected' : '' }}>
                                        {{ $kecamatan->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kecamatan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kelurahan_id" class="form-label">Kelurahan</label>
                            <select class="form-select @error('kelurahan_id') is-invalid @enderror" id="kelurahan_id" name="kelurahan_id">
                                <option value="">Pilih Kelurahan</option>
                                @foreach($kelurahans as $kelurahan)
                                    <option value="{{ $kelurahan->id }}" {{ old('kelurahan_id') == $kelurahan->id ? 'selected' : '' }}>
                                        {{ $kelurahan->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kelurahan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dashboard.pelatihan.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan Pelatihan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$(function() {
    // Cascade dropdowns for location
    $('#provinsi_id').on('change', function() {
        let provinsiId = $(this).val();
        if(provinsiId) {
            $.ajax({
                url: '/api/kabupatens/' + provinsiId,
                type: 'GET',
                success: function(data) {
                    $('#kabupaten_id').empty();
                    $('#kabupaten_id').append('<option value="">Pilih Kabupaten</option>');
                    data.forEach(function(item) {
                        $('#kabupaten_id').append(`<option value="${item.id}">${item.nama}</option>`);
                    });
                }
            });
        }
    });

    $('#kabupaten_id').on('change', function() {
        let kabupatenId = $(this).val();
        if(kabupatenId) {
            $.ajax({
                url: '/api/kecamatans/' + kabupatenId,
                type: 'GET',
                success: function(data) {
                    $('#kecamatan_id').empty();
                    $('#kecamatan_id').append('<option value="">Pilih Kecamatan</option>');
                    data.forEach(function(item) {
                        $('#kecamatan_id').append(`<option value="${item.id}">${item.nama}</option>`);
                    });
                }
            });
        }
    });

    $('#kecamatan_id').on('change', function() {
        let kecamatanId = $(this).val();
        if(kecamatanId) {
            $.ajax({
                url: '/api/kelurahans/' + kecamatanId,
                type: 'GET',
                success: function(data) {
                    $('#kelurahan_id').empty();
                    $('#kelurahan_id').append('<option value="">Pilih Kelurahan</option>');
                    data.forEach(function(item) {
                        $('#kelurahan_id').append(`<option value="${item.id}">${item.nama}</option>`);
                    });
                }
            });
        }
    });
});
</script>
@endsection
