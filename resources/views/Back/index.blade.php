@extends('Back.master')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="bi bi-newspaper"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Berita</span>
                    <span class="info-box-number">{{ $newsCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="bi bi-calendar-event"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Agenda</span>
                    <span class="info-box-number">{{ $newsCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="bi bi-images"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Galeri</span>
                    <span class="info-box-number">{{ $galleryCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="bi bi-people-fill"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pengguna</span>
                    <span class="info-box-number">{{ $userCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Welcome Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/logo.png') }}" alt="Disperindagkop Logo" class="mr-4" style="height: 80px;">
                        <div>
                            <h2 class="text-white mb-2">Selamat Datang di Dashboard Admin</h2>
                            <p class="text-white mb-0">Dinas Perindustrian, Perdagangan, Koperasi dan UKM Provinsi Kalimantan Utara</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <!-- Berita Terbaru -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-newspaper me-2"></i>Berita Terbaru</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="bi bi-dash"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                     <ul class="products-list product-list-in-card pl-2 pr-2">
                        @foreach ($news as $item)
                        <li class="item">
                            <div class="product-img">
                                <img src="{{ asset('storage/'.$item->image) }}" alt="Berita" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">
                                    {{ $item->title }}
                                    <span class="badge bg-info float-end">{{ $item->created_at->format('d/m/Y') }}</span>
                                </a>
                                <span class="product-description">
                                    {!! Str::limit(strip_tags($item->content), 150) !!}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="{{ route('dashboard.news.index') }}" class="text-primary">Lihat Semua Berita</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
            <div class="col-md-8">
            <!-- Statistik -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-bar-chart-fill me-2"></i>Statistik Industri & UKM</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="bi bi-dash"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="statistikChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Tautan Cepat -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-link-45deg me-2"></i>Tautan Cepat</h3>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('dashboard.news.create') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="bi bi-plus-circle me-3 text-success"></i>Tambah Berita Baru
                        </a>
                        <a href="{{ route('dashboard.ikm.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="bi bi-building me-3 text-primary"></i>Kelola Data UKM
                        </a>
                        <a href="{{ route('dashboard.bigindustri.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="bi bi-building-fill me-3 text-info"></i>Kelola Industri Besar
                        </a>
                        <a href="{{ route('profile.edit') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                            <i class="bi bi-person-fill me-3 text-warning"></i>Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection

@section('styles')
<style>
    .event-date span {
        min-width: 100px;
    }
    .product-list-in-card > .item {
        padding: 15px;
    }
    .product-list-in-card > .item:not(:last-child) {
        border-bottom: 1px solid rgba(0,0,0,.125);
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        // Statistik Chart
        const ctx = document.getElementById('statistikChart').getContext('2d');
        const statistikChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['UKM', 'Industri Besar', 'Koperasi', 'Pasar'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $ukmCount }}, {{ $bigIndustriCount }}, 0, 0],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.7)',
                        'rgba(16, 185, 129, 0.7)',
                        'rgba(245, 158, 11, 0.7)',
                        'rgba(239, 68, 68, 0.7)'
                    ],
                    borderColor: [
                        'rgb(59, 130, 246)',
                        'rgb(16, 185, 129)',
                        'rgb(245, 158, 11)',
                        'rgb(239, 68, 68)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Data Statistik 2024'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
