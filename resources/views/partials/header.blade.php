
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom navAdminLite">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block textoPrincipal">
        Programa Operativo Anual 2019. <span class="textoSecundario">/ Perfil de Trabajo - {{ Auth::user()->name }}</span>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!--form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form-->

    <!-- Right navbar links -->
    <!--ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fa fa-user-circle" aria-hidden="true"></i>
        </a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="salir" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
    </ul-->
  
  <!-- /.navbar -->

<style type="text/css">
  .alerta-texto{white-space: nowrap; overflow: hidden;text-overflow: ellipsis;text-transform: uppercase;border-bottom: 1px solid #fff;cursor: inherit;font-size: 12px;}
  .nueva-alerta{font-weight:bolder;}
  .alerta-final{background: #cfd8dc;border-right:solid 1px #fff; }
  .alerta-edit{background: #b0bec5;border-right:solid 1px #fff; }
  .alerta-logout{background:#90a4ae;border-right:solid 1px #fff; }
  .navbar-light .navbar-nav .nav-link{color: #EA0D94;}
  .tiempofuera:after {
    content: "\00a0 \f071";
    font-family: FontAwesome;
    color: #EA0D94;
</style>

  <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div id="repEmail"></div>

      <!-- Notifications Dropdown Menu -->

      <li class="nav-item dropdown">
        <a class="nav-link alerta-final" id="iconAlertfin" data-toggle="dropdown" href="#">
          <i class="fa fa-exclamation-circle" ></i>
          @if(count($nfin) > 0)         
            <span id="campanaAlertfin" class="badge badge-warning navbar-badge">{{count($nfin)}}</span>
            @else
            <span id="campanaAlertfin" ></span>               
          @endif
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="text-transform: uppercase;background: #eceff1; color: #EA0D94;">Notificación mensual</span>
          <div class="dropdown-divider"></div>
          <!--a href="#" class="dropdown-item texto-negro">
            <i class="fa fa-file"></i>  4 nuevos documentos
            <span class="float-right text-muted text-sm">3 min</span>
          </a-->

          @foreach( $alertasfin as $alertafin )
            <a href="#" class="dropdown-item texto-negro alerta-texto {{ $alertafin->ale_tipo === 1 ? 'nueva-alerta' : 'no' }}">
            <div style="display: inline-block;float: left;">{{$alertafin->ale_acronimo}} - {{$alertafin->ale_mes}}</div> <div style="display: inline-block;float: right;background: #EA0D94; color: #fff; border-radius: 5px; padding: 1% 2%;">{{ date('d/m/Y', strtotime($alertafin->created_at)) }}</div>
            </a>
          @endforeach

          <div class="dropdown-divider"></div>
          <a href="/bitacorames" class="dropdown-item dropdown-footer" style="background: #eceff1;color: #000;">Ver todas las notificaciones</a>
        </div>
      </li>  


      <li class="nav-item dropdown">
        <a class="nav-link alerta-edit" id="iconAlert" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          @if(count($nalertas) > 0)         
            <span id="campanaAlert" class="badge badge-warning navbar-badge">{{count($nalertas)}}</span>
            @else
            <span id="campanaAlert" ></span>               
          @endif
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="text-transform: uppercase;background: #eceff1; color: #EA0D94;">Notificación de actividad</span>
          <div class="dropdown-divider"></div>
          <!--a href="#" class="dropdown-item texto-negro">
            <i class="fa fa-file"></i>  4 nuevos documentos
            <span class="float-right text-muted text-sm">3 min</span>
          </a-->

          @foreach( $alertas as $alerta )
            <a href="#" class="dropdown-item texto-negro alerta-texto {{ $alerta->ale_tipo === 1 ? 'nueva-alerta' : 'no' }}">
              <div class=" tiempo{{ $alerta->ale_tiempo }}" style="display: inline-block;float: left;">{{$alerta->ale_acronimo}} - {{$alerta->ale_id_programa}} - {{$alerta->ale_num_actividad}}</div> <div style="display: inline-block;float: right;background: #EA0D94; color: #fff; border-radius: 5px; padding: 1% 2%;">{{ date('d/m/Y', strtotime($alerta->created_at)) }}</div>
            </a>
          @endforeach

          <div class="dropdown-divider"></div>
          <a href="/bitacora" class="dropdown-item dropdown-footer" style="background: #eceff1;color: #000;">Ver todas las notificaciones</a>
        </div>
      </li>  

      <li class="nav-item dropdown">
        <a class="nav-link alerta-logout" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!--a href="#" class="dropdown-item">Datos personales</a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">Agregar firma</a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">Delegar cuenta</a>
          <div class="dropdown-divider"></div-->
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="salir" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        </div>
      </li>

    </ul>

  </nav>