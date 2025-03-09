<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Autentikasi')</title>
    
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin-lte/adminlte.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    @yield('styles')
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">@yield('logo-text', 'Aplikasi')</a>
        </div>
        
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">@yield('page-message')</p>
                
                @yield('content')
            </div>
        </div>
        
        @yield('additional-content')
    </div>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/admin-lte/adminlte.min.js') }}"></script>
    
    @yield('scripts')
</body>
</html>
