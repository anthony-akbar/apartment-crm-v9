<!DOCTYPE html>
<html class="theme-4">
<head>
    <meta charset="utf-8">
    <link href="{{asset('individual/main-black-cut.png')}}" rel="shortcut icon">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
    <title>Business House</title>
    @yield('styles')
</head>
<body class="login">
@yield('content')
<script src="{{asset('dist/js/app.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@yield('scripts')
</body>
</html>
