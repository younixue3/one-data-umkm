@extends('Auth.master')

@section('title', 'Login')

@section('logo-text', 'Login')

@section('page-message', 'Selamat Datang Kembali')

@section('content')
    @if (session('status'))
        <div class="alert alert-success mb-4 rounded-lg shadow-sm">
            <i class="fas fa-check-circle mr-2"></i>{{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mb-4 rounded-lg shadow-sm">
            <div class="font-weight-bold"><i class="fas fa-exclamation-circle mr-2"></i>Oops! Ada yang salah.</div>
            <ul class="mb-0 pl-4 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="email-addon">
                    <span class="fas fa-envelope text-secondary"></span>
                </span>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control" placeholder="Masukkan email Anda" aria-label="Email" aria-describedby="email-addon">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="password-addon">
                    <span class="fas fa-lock text-secondary"></span>
                </span>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control" placeholder="Masukkan password Anda" aria-label="Password" aria-describedby="password-addon">
            </div>
        </div>

        <div class="row mb-4 align-items-center">
            <div class="col-7">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" id="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="custom-control-label text-muted">
                        Ingat Saya
                    </label>
                </div>
            </div>
            <div class="col-5">
                <button type="submit" class="btn btn-gradient btn-block font-weight-bold">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </button>
            </div>
        </div>
    </form>

    <div class="text-center auth-footer">
        @if (Route::has('password.request'))
            <p class="mb-3">
                <a href="{{ route('password.request') }}" class="text-muted hover-link">
                    <i class="fas fa-key mr-1"></i>Lupa password?
                </a>
            </p>
        @endif
        <p class="mb-0">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="register-link font-weight-bold">
                <i class="fas fa-user-plus mr-1"></i>Daftar sekarang
            </a>
        </p>
    </div>
@endsection

@section('styles')
<style>
    .login-card-body {
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        padding: 2.5rem;
        background: #ffffff;
    }
    
    .form-control {
        border-radius: 8px;
        border: 1px solid #eaeaea;
        padding: 12px 15px;
        height: auto;
        font-size: 15px;
        background-color: #f9f9f9;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        background-color: #fff;
        box-shadow: 0 0 0 3px rgba(66,133,244,0.15);
        border-color: #4285f4;
    }
    
    .form-label {
        font-weight: 600;
        color: #444;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .input-group-text {
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        border-right: none;
        padding: 12px 15px;
    }
    
    .btn-gradient {
        background: linear-gradient(135deg, #4285f4, #34a853);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px;
        transition: all 0.3s;
    }
    
    .btn-gradient:hover {
        background: linear-gradient(135deg, #5294ff, #3cb15e);
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(66,133,244,0.3);
        color: white;
    }
    
    .auth-footer {
        border-top: 1px solid #f0f0f0;
        padding-top: 20px;
        margin-top: 25px;
    }
    
    .hover-link:hover {
        color: #4285f4 !important;
        text-decoration: none;
    }
    
    .register-link {
        color: #34a853;
        transition: all 0.3s;
    }
    
    .register-link:hover {
        color: #4285f4;
        text-decoration: none;
    }
    
    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #4285f4;
        border-color: #4285f4;
    }
    
    .alert {
        border: none;
    }
    
    .login-form {
        margin-top: 10px;
    }
</style>
@endsection
