@extends('Auth.master')

@section('title', 'Verifikasi Email')

@section('logo-text', 'Verifikasi Email')

@section('page-message', 'Silakan verifikasi alamat email Anda')

@section('content')
    @if (session('resent'))
        <div class="alert alert-success">
            Tautan verifikasi baru telah dikirim ke alamat email Anda.
        </div>
    @endif

    <div class="mb-4">
        Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.
        Jika Anda tidak menerima email tersebut,
    </div>

    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <div class="row">
            <div class="col-8">
                <a href="{{ route('login') }}" class="text-secondary">
                    Kembali ke login
                </a>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Kirim Ulang</button>
            </div>
        </div>
    </form>
@endsection
