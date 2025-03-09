@extends('Auth.master')

@section('title', 'Lupa Password')

@section('logo-text', 'Lupa Password')

@section('page-message', 'Masukkan alamat email Anda dan kami akan mengirimkan tautan untuk mengatur ulang password.')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <div class="font-weight-bold">Oops! Ada yang salah.</div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group mb-3">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <a href="{{ route('login') }}" class="text-secondary">
                    Kembali ke login
                </a>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Kirim</button>
            </div>
        </div>
    </form>
@endsection
