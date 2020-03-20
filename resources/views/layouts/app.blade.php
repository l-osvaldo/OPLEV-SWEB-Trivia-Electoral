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
  <link rel="icon" href="{{ request()->getSchemeAndHttpHost()=='dashboard.test'?asset('public/images/favicon.ico'):asset('images/favicon.ico') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="app-prefix" content="{{ url('/') }}">
  <!-- LARAVEL JAVASCRIPT -->
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- ADMINLITE style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- ICONS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> 
  <!-- OPLE style --> 
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <!-- CSS's DE LARAVEL -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- DATATABLES -->
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div id="app"></div>
  <div class="wrapper o-wrapper-pading">
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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- jQuery UI-->
<script src="{{ asset('js/jQueryUI/jquery-ui.min.js') }}"></script> 
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<!-- Scripts -->
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- DESARROLLO -->
<script src="{{ asset('js/dashboard.js') }}"></script>     
<script src="{{ asset('js/validainput.js') }}"></script>
<script src="{{ asset('js/datatables.js') }}"></script>
</body>
</html>
