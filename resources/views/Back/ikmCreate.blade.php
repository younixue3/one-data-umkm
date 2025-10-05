@extends('Back.master')

@section('title', 'Tambah Data IKM')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Industri Kecil dan Menengah</h3>
                    <div class="card-tools">
                        <a href="{{ route('dashboard.ikm.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('dashboard.ikm.store') }}" method="POST">
                        @csrf
                        
                        <!-- Section: Informasi Perusahaan -->
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Perusahaan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_perusahaan">Nama Perusahaan</label>
                                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_pemilik">Nama Pemilik</label>
                                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kontak_person">Kontak Person</label>
                                            <input type="text" class="form-control" id="kontak_person" name="kontak_person" value="{{ old('kontak_person') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">Nomor HP</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_usaha_id">Jenis Usaha</label>
                                            <select class="form-control select2" id="jenis_usaha_id" name="jenis_usaha_id[]" multiple>
                                                @foreach($jenis_usahas as $jenis_usaha)
                                                <option value="{{ $jenis_usaha->id }}" {{ (is_array(old('jenis_usaha_id')) && in_array($jenis_usaha->id, old('jenis_usaha_id'))) ? 'selected' : '' }}>{{ $jenis_usaha->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_produk_id">Jenis Produk</label>
                                            <select class="form-control select2" id="jenis_produk_id" name="jenis_produk_id[]" multiple>
                                                @foreach($jenis_produks as $jenis_produk)
                                                <option value="{{ $jenis_produk->id }}" {{ (is_array(old('jenis_produk_id')) && in_array($jenis_produk->id, old('jenis_produk_id'))) ? 'selected' : '' }}>{{ $jenis_produk->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section: Lokasi -->
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Lokasi</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="provinsi_id">Provinsi</label>
                                            <select class="form-control" id="provinsi_id" name="provinsi_id">   
                                                <option value="">Pilih Provinsi</option>
                                                @foreach($provinsis as $provinsi)
                                                <option value="{{ $provinsi->id }}" {{ old('provinsi_id') == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kabupaten_id">Kabupaten/Kota</label>
                                            <select class="form-control" id="kabupaten_id" name="kabupaten_id">
                                                <option value="">Pilih Kabupaten/Kota</option>
                                                @foreach($kabupatens as $kabupaten)
                                                <option value="{{ $kabupaten->id }}" {{ old('kabupaten_id') == $kabupaten->id ? 'selected' : '' }}>{{ $kabupaten->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kecamatan_id">Kecamatan</label>
                                            <select class="form-control" id="kecamatan_id" name="kecamatan_id">
                                                <option value="">Pilih Kecamatan</option>
                                                @foreach($kecamatans as $kecamatan)
                                                <option value="{{ $kecamatan->id }}" {{ old('kecamatan_id') == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelurahan_id">Kelurahan/Desa</label>
                                            <select class="form-control" id="kelurahan_id" name="kelurahan_id">
                                                <option value="">Pilih Kelurahan/Desa</option>
                                                @foreach($kelurahans as $kelurahan)
                                                <option value="{{ $kelurahan->id }}" {{ old('kelurahan_id') == $kelurahan->id ? 'selected' : '' }}>{{ $kelurahan->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section: Informasi Perizinan -->
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Perizinan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nomor_izin">Nomor Izin</label>
                                            <input type="text" class="form-control" id="nomor_izin" name="nomor_izin" value="{{ old('nomor_izin') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tahun_izin">Tahun Izin</label>
                                            <input type="number" class="form-control" id="tahun_izin" name="tahun_izin" value="{{ old('tahun_izin') }}" min="1900" max="{{ date('Y') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun_data">Tahun Data</label>
                                            <input type="number" class="form-control" id="tahun_data" name="tahun_data" value="{{ old('tahun_data', date('Y')) }}" min="1900" max="{{ date('Y') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section: Tenaga Kerja -->
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Tenaga Kerja</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tenaga_kerja_pria">Tenaga Kerja Pria</label>
                                            <input type="number" class="form-control" id="tenaga_kerja_pria" name="tenaga_kerja_pria" value="{{ old('tenaga_kerja_pria', 0) }}" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tenaga_kerja_wanita">Tenaga Kerja Wanita</label>
                                            <input type="number" class="form-control" id="tenaga_kerja_wanita" name="tenaga_kerja_wanita" value="{{ old('tenaga_kerja_wanita', 0) }}" min="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section: Informasi Produksi dan Investasi -->
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Produksi dan Investasi</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nilai_investasi">Nilai Investasi (Rp)</label>
                                            <input type="number" class="form-control" id="nilai_investasi" name="nilai_investasi" value="{{ old('nilai_investasi', 0) }}" min="0" step="0.01">
                                        </div>
                                        <div class="form-group">
                                            <label for="nilai_kapasitas">Nilai Kapasitas</label>
                                            <input type="number" class="form-control" id="nilai_kapasitas" name="nilai_kapasitas" value="{{ old('nilai_kapasitas', 0) }}" min="0" step="0.01">
                                        </div>
                                        <div class="form-group">
                                            <label for="satuan_kapasitas">Satuan Kapasitas</label>
                                            <input type="text" class="form-control" id="satuan_kapasitas" name="satuan_kapasitas" value="{{ old('satuan_kapasitas') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nilai_produksi">Nilai Produksi (Rp)</label>
                                            <input type="number" class="form-control" id="nilai_produksi" name="nilai_produksi" value="{{ old('nilai_produksi', 0) }}" min="0" step="0.01">
                                        </div>
                                        <div class="form-group">
                                            <label for="nilai_bahan_baku">Nilai Bahan Baku (Rp)</label>
                                            <input type="number" class="form-control" id="nilai_bahan_baku" name="nilai_bahan_baku" value="{{ old('nilai_bahan_baku', 0) }}" min="0" step="0.01">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section: Informasi Ekspor -->
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Ekspor</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status_ekspor">Status Ekspor</label>
                                            <select class="form-control" id="status_ekspor" name="status_ekspor">
                                                <option value="">Pilih Status</option>
                                                <option value="Ya" {{ old('status_ekspor') == 'Ya' ? 'selected' : '' }}>Ya</option>
                                                <option value="Tidak" {{ old('status_ekspor') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="negara_tujuan_ekspor">Negara Tujuan Ekspor</label>
                                            <input type="text" class="form-control" id="negara_tujuan_ekspor" name="negara_tujuan_ekspor" value="{{ old('negara_tujuan_ekspor') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Section: Status dan Pembiayaan -->
                        <div class="card card-primary card-outline mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Status dan Pembiayaan</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status_aktif">Status Aktif</label>
                                            <select class="form-control" id="status_aktif" name="status_aktif">
                                                <option value="">Pilih Status</option>
                                                <option value="Aktif" {{ old('status_aktif') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="Tidak Aktif" {{ old('status_aktif') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jenis_pembiayaan">Jenis Pembiayaan</label>
                                            <input type="text" class="form-control" id="jenis_pembiayaan" name="jenis_pembiayaan" value="{{ old('jenis_pembiayaan') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        // Validasi form
        $('form').submit(function(e) {
            let valid = true;
            
            // Validasi nama perusahaan
            if ($('#nama_perusahaan').val().trim() === '') {
                alert('Nama perusahaan tidak boleh kosong');
                valid = false;
            }
            
            // Validasi nama pemilik
            if ($('#nama_pemilik').val().trim() === '') {
                alert('Nama pemilik tidak boleh kosong');
                valid = false;
            }
            
            // Validasi email
            const email = $('#email').val().trim();
            if (email !== '' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                alert('Format email tidak valid');
                valid = false;
            }
            
            if (!valid) {
                e.preventDefault();
            }
        });
    });
</script>
@endsection
