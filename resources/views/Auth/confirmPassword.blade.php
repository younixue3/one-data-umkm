@extends('Auth.master')

@section('title', 'Konfirmasi Password')

@section('logo-text', 'Konfirmasi Password')

@section('page-message', 'Ini adalah area aplikasi yang aman. Mohon konfirmasi password Anda sebelum melanjutkan.')

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

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group mb-3">
                <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <a href="{{ route('password.request') }}" class="text-secondary">
                    Lupa password?
                </a>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Konfirmasi</button>
            </div>
        </div>
    </form>
@endsection
