<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{asset('dist/images/logo.svg')}}" rel="shortcut icon">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
    <title>Royal</title>
    @yield('styles')
</head>
<body class="login">
@yield('content')
<scripts src="{{asset('dist/js/app.js')}}"></scripts>
@yield('scripts')
</body>
</html>
