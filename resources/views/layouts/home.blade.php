<!doctype html>
<html lang="es-MX">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'SIPSEIV2') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--COMBIAR NOMBRE DE PROYECTO Y VINCULAR LA RUTA CON EL FABICON-->
    <link rel="icon"
        href="{{ request()->getSchemeAndHttpHost()=='trivia.test'?asset('public/images/favicon.ico'):asset('../images/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-prefix" content="{{ url('/') }}">
    <!-- LARAVEL JAVASCRIPT -->
    <!--script src="{{ asset('js/app.js') }}"></script-->
    <!-- CSS's DE LARAVEL -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100 login">
    @yield('content')
</body>

</html>
