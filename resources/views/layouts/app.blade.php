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
    <!--link rel="stylesheet" href="{{ asset('vendor_components/bootstrap/dist/css/bootstrap.css') }}"-->

    <!-- Bootstrap extend-->
    <!--link rel="stylesheet" href="{{ asset('css/bootstrap-extend.css') }}"-->

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Lion_admin skins -->
    <!--link rel="stylesheet" href="{{ asset('css/skins/_all-skins.css') }}"-->

    <!-- theme style -->
    <!--link rel="stylesheet" href="{{ asset('css/master_style.css') }}"-->

    <!-- Personal css -->
    <!--link rel="stylesheet" href="{{ asset('css/app.css') }}"-->
    <!--link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}"-->   
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    @yield('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper wrapperPading">

      <!-- Aside -->
      @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        @include('partials.header')
        @include('partials.adminaside')
      @else
        @include('partials.headeruser')
        @include('partials.aside')
      @endif

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
        <!-- Include this after the sweet alert js file -->
        @include('sweet::alert')

        <!--
        <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block"></div> &copy; 2019 POA
        </footer>
    -->

      </div>
      <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->

    <!-- begin cubes modal -->
 <div id="loader" class="hidden">
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
  <footer class="main-footer footerAdminLite">
    <strong>Ople Veracruz<a href="http://www.oplever.org.mx/"> Más info.</a></strong> Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>OPLE</b> VERACRUZ
    </div>
  </footer>

          <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

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
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>

        @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        <script src="{{ URL::asset('js/resourcesadm.js') }}"></script>
        @else
        <script src="{{ URL::asset('js/recursos.js') }}"></script>
        @endif        
        
    <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        document.getElementById("iconAlert").addEventListener("click", hiddenAlerta);
        function hiddenAlerta () {
            $.ajax({
             type:'POST',
             url:"clickalertas",
             success:function(data){ 
                console.log(data);
                document.getElementById('campanaAlert').classList.add("hidden");
            }
          });
        }

        document.getElementById("iconAlertfin").addEventListener("click", hiddenAlertafin);
        function hiddenAlertafin () {
            $.ajax({
             type:'POST',
             url:"clickalertasfin",
             success:function(data){ 
                console.log(data);
                document.getElementById('campanaAlertfin').classList.add("hidden");
            }
          });
        }

        document.getElementById("repEmail").addEventListener("click", sendMail);
        function sendMail () {
            document.getElementById("loader").classList.remove('hidden');
            var mes = this.getAttribute('data-mes');
            var clave = document.getElementById("clave").value;
            if(clave !== null && clave !== '') {

                document.getElementById("errorEmail").classList.add('hidden');
                $.ajax({
                     type:'POST',
                     url:"mail/send",
                     data:{mes:mes,clave:clave},
                     success:function(data){ 
                        location.reload();
                    }
                });

            } else {

            document.getElementById("errorEmail").classList.remove('hidden');
            document.getElementById("loader").classList.add('hidden');
            document.getElementById("errorEmail").innerHTML = 'Inserte su clave!';

            }
        }

        document.getElementById("buscarMes").addEventListener("click", busquedames);
        function busquedames () {

          document.getElementById("loader").classList.remove('hidden');
          var mes = document.getElementById('mesbusqueda').value;
          var acr = document.getElementById('acronimo').value;
          console.log(mes,acr);

          $.ajax({
               type:'POST',
               url:"buscarmes",
               data:{mes:mes,acr:acr},
               success:function(data){ 
                //console.log(data)

                  document.getElementById('resultMes').innerHTML ='';
                  if (data[0].length>0) {

                  document.getElementById('resultMes').innerHTML ='<tr><th>Unidad</th><th>Acronimo</th><th>Programa</th><th>Actividad</th><th>Fecha</th></tr>';

                    for (var i = 0; i < data[0].length; i++) {
                      var x = document.createElement("TR");
                      document.getElementById('resultMes').appendChild(x);
                      x.innerHTML='<td>'+data[0][i].ale_actividad+'</td><td>'+data[0][i].ale_acronimo+'</td><td>---</td><td>---</td><td>'+data[0][i].created_at+'</th>';
                    }

                  } else {
                     document.getElementById('resultMes').innerHTML ='<tr><th>No se encontraron resultados</th></tr>';
                  }

                  document.getElementById("loader").classList.add('hidden');
              }
          });
          
        }

        document.getElementById("buscarEntre").addEventListener("click", busquedaentre);
        function busquedaentre () {

          document.getElementById("loader").classList.remove('hidden');
          var datep = document.getElementById('datep').value;
          var dates = document.getElementById('dates').value;
          var acr = document.getElementById('acronimoentre').value;
          console.log(datep,dates,acr);

          $.ajax({
               type:'POST',
               url:"buscaentre",
               data:{datep:datep,dates:dates,acr:acr},
               success:function(data){ 

                //console.log(data)
                  document.getElementById('resultEntre').innerHTML ='';
                  if (data[0].length>0) {

                  document.getElementById('resultEntre').innerHTML ='<tr><th>Unidad</th><th>Acronimo</th><th>Programa</th><th>Actividad</th><th>Fecha</th></tr>';

                    for (var i = 0; i < data[0].length; i++) {
                      var x = document.createElement("TR");
                      document.getElementById('resultEntre').appendChild(x);
                      x.innerHTML='<td class="'+data[0][i].ale_tiempo+'">'+data[0][i].ale_actividad+'</td><td>'+data[0][i].ale_acronimo+'</td><td>'+data[0][i].ale_id_programa+'</td><td>'+data[0][i].ale_num_actividad+'</td><td>'+data[0][i].created_at+'</th>';
                    }

                  } else {
                     document.getElementById('resultEntre').innerHTML ='<tr><th>No se encontraron resultados</th></tr>';
                  }

                  document.getElementById("loader").classList.add('hidden');
              }
          });
          
        }

         document.getElementById("datep").addEventListener("change", changedatep);
        function changedatep (){
          var datep = document.getElementById('datep').value;
          document.getElementById('dates').setAttribute("min", datep);
          document.getElementById('dates').disabled = false;
        }
        document.getElementById("dates").addEventListener("change", changedates);
        function changedates(){
          document.getElementById('buscarEntre').disabled = false;
        }

    </script>

  </body>
</html>
