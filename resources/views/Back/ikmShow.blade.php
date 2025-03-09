@extends('Back.master')

@section('title', 'Detail IKM')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Industri Kecil dan Menengah</h3>
                    <div class="card-tools">
                        <a href="{{ route('dashboard.ikm.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <a href="{{ route('dashboard.ikm.edit', $ikm->id) }}" class="btn btn-primary btn-sm ms-2">
                            <i class="bi bi-pencil-square me-1"></i> Edit IKM
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="mb-4">Detail IKM</h4>

                    <div class="row">
                        <!-- Informasi Perusahaan -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">Informasi Perusahaan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Nama Perusahaan</p>
                                        <p class="fw-medium">{{ $ikm->nama_perusahaan }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Nama Pemilik</p>
                                        <p class="fw-medium">{{ $ikm->nama_pemilik }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Status</p>
                                        <span class="badge bg-success">{{ $ikm->status_aktif }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Nomor Izin</p>
                                        <p class="fw-medium">{{ $ikm->nomor_izin }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Tahun Izin</p>
                                        <p class="fw-medium">{{ $ikm->tahun_izin }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kontak & Lokasi -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">Kontak & Lokasi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Kontak Person</p>
                                        <p class="fw-medium">{{ $ikm->kontak_person }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Email</p>
                                        <p class="fw-medium">{{ $ikm->email }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">No. HP</p>
                                        <p class="fw-medium">{{ $ikm->no_hp }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Alamat</p>
                                        <p class="fw-medium">{{ $ikm->alamat }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Kelurahan</p>
                                        <p class="fw-medium">{{ $ikm->kelurahan->name ?? '-' }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Kecamatan</p>
                                        <p class="fw-medium">{{ $ikm->kecamatan->name ?? '-' }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Kabupaten</p>
                                        <p class="fw-medium">{{ $ikm->kabupaten->name ?? '-' }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Provinsi</p>
                                        <p class="fw-medium">{{ $ikm->provinsi->name ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jenis Industri & Produk -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">Jenis Industri & Produk</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Jenis Industri</p>
                                        <p class="fw-medium">
                                            @if(isset($ikm->typeindustries) && count($ikm->typeindustries) > 0)
                                                {{ collect($ikm->typeindustries)->pluck('name')->join(', ') }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Jenis Produk</p>
                                        <p class="fw-medium">
                                            @if(isset($ikm->typeproducts) && count($ikm->typeproducts) > 0)
                                                {{ collect($ikm->typeproducts)->pluck('name')->join(', ') }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Ekspor & Pembiayaan -->
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">Status Ekspor & Pembiayaan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Status Ekspor</p>
                                        <p class="fw-medium">{{ $ikm->status_ekspor ?? '-' }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Negara Tujuan Ekspor</p>
                                        <p class="fw-medium">{{ $ikm->negara_tujuan_ekspor ?? '-' }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted mb-1">Jenis Pembiayaan</p>
                                        <p class="fw-medium">{{ $ikm->jenis_pembiayaan ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Operasional -->
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">Data Operasional</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <p class="text-muted mb-1">Tahun Data</p>
                                            <p class="fw-medium">{{ $ikm->tahun_data ?? '-' }}</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p class="text-muted mb-1">Tenaga Kerja Pria</p>
                                            <p class="fw-medium">{{ $ikm->tenaga_kerja_pria ?? '0' }}</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p class="text-muted mb-1">Tenaga Kerja Wanita</p>
                                            <p class="fw-medium">{{ $ikm->tenaga_kerja_wanita ?? '0' }}</p>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <p class="text-muted mb-1">Nilai Investasi</p>
                                            <p class="fw-medium">Rp {{ number_format($ikm->nilai_investasi ?? 0, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <p class="text-muted mb-1">Nilai Kapasitas</p>
                                            <p class="fw-medium">{{ number_format($ikm->nilai_kapasitas ?? 0, 0, ',', '.') }} {{ $ikm->satuan_kapasitas ?? '' }}</p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <p class="text-muted mb-1">Nilai Produksi</p>
                                            <p class="fw-medium">Rp {{ number_format($ikm->nilai_produksi ?? 0, 0, ',', '.') }}</p>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <p class="text-muted mb-1">Nilai Bahan Baku</p>
                                            <p class="fw-medium">Rp {{ number_format($ikm->nilai_bahan_baku ?? 0, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
