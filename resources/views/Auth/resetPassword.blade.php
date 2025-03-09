@extends('Auth.master')

@section('title', 'Reset Password')

@section('logo-text', 'Reset Password')

@section('page-message', 'Silakan masukkan password baru Anda')

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

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group mb-3">
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus class="form-control" readonly>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password Baru</label>
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
            <label for="password_confirmation">Konfirmasi Password Baru</label>
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
                    Kembali ke login
                </a>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Reset</button>
            </div>
        </div>
    </form>
@endsection
