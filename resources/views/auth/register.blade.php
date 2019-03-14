<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>{{ config('app.name', 'POA2019') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="app-prefix" content="{{config('app.app-prefix')}}">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{ asset('vendor_components/bootstrap/dist/css/bootstrap.css') }}">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-extend.css') }}">

    <!-- theme style -->
    <link rel="stylesheet" href="{{ asset('css/master_style.css') }}">

    <!-- Lion_admin skins -->
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.css') }}">

    <!-- Personal css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @yield('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper" id="app">

      @include('partials.header')




      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Usuario:') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



        <!--
        <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block"></div> &copy; 2019 POA
        </footer>
    -->

      </div>
      <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->


        <script src="{{ asset('js/app.js') }}"></script>

        <!-- jQuery 3 -->
        <script src="{{ URL::asset('vendor_components/jquery/dist/jquery.js') }}"></script>

        <!-- jQuery UI 1.11.4 -->
        <script src="{{ URL::asset('vendor_components/jquery-ui/jquery-ui.js') }}"></script>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>

        <!-- popper  Lo comente por que la librería no se encuentra
        <script src="{{ URL::asset('vendor_components/popper/dist/popper.min.js') }}"></script>-->

        <!-- Bootstrap 4.0-->
        <script src="{{ URL::asset('vendor_components/bootstrap/dist/js/bootstrap.js') }}"></script>

        <!-- Morris.js charts -->
        <script src="{{ URL::asset('vendor_components/raphael/raphael.min.js') }}"></script>
        <script src="{{ URL::asset('vendor_components/morris.js/morris.min.js') }}"></script>

        <!-- ChartJS -->
        <script src="{{ URL::asset('vendor_components/chart.js-master/Chart.min.js') }}"></script>

        <!-- Chartist  -->
        <script src="{{ URL::asset('vendor_components/chartist-js-develop/chartist.min.js') }}"></script>

        <!-- Slimscroll -->
        <script src="{{ URL::asset('vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

        <!-- FastClick -->
        <script src="{{ URL::asset('vendor_components/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.validate.js') }}"></script>        
        <script src="{{ URL::asset('js/jquery.redirect.js') }}"></script>        
        <script src="{{ URL::asset('js/jquery.jeditable.js') }}"></script>        
        <script src="{{ URL::asset('js/jquery.jeditable.checkbox.js') }}"></script>


  </body>
</html>

