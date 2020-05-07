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
    href="{{ request()->getSchemeAndHttpHost()=='dashboard.test'?asset('public/images/favicon.ico'):asset('images/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-prefix" content="{{ url('/') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div id="app"></div>
    <div class="wrapper">
        <!-- Aside -->
        @include('partials.header')
        @include('partials.aside')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- LOADER OPLE SE CARGA EN LA ESTRUCTURA GENERAL PARA SER APLICADO EN CUALQUIER MOMENTO -->
    <div id="loader" class="o-hidden-loader">
        <div class="cubes">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
        </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer o-footer-adminLite">
        Copyright <i class="fa fa-copyright" aria-hidden="true"></i> Todos los derechos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>OPLE</b> VERACRUZ
        </div>
    </footer>
    <!-- PROJECT JAVASCRIPT -->
    <script src="js/all.js"></script>

</body>

</html>
