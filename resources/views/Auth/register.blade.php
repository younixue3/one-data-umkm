@extends('Auth.master')

@section('title', 'Registrasi')

@section('logo-text', 'Registrasi')

@section('page-message', 'Daftar akun baru')

@section('content')
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

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nama</label>
            <div class="input-group mb-3">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="form-control">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group mb-3">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="form-control">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group mb-3">
                <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <div class="input-group mb-3">
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <a href="{{ route('login') }}" class="text-secondary">
                    Sudah punya akun?
                </a>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
        </div>
    </form>
@endsection