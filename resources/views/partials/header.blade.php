
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom navAdminLite">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block textoPrincipal">
        <!--Programa Operativo Anual 2019 <span class="textoSecundario">/ Perfil de Trabajo - {{ Auth::user()->name }}</span-->
        <span class="textoSecundario">Perfil de Trabajo: {{ Auth::user()->name }}</span>
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
  .alerta-final{background: #90a4ae;border-right:solid 1px #fff; }
  .alerta-obsR{background: #cfd8dc;border-right:solid 1px #fff; }
  .alerta-obs{background: #b0bec5;border-right:solid 1px #fff; }
  .alerta-edit{background: #78909c;border-right:solid 1px #fff; }
  .alerta-logout{background:#607d8b;border-right:solid 1px #fff; }
  .navbar-light .navbar-nav .nav-link{color: #EA0D94;}
  .tiempofuera:after {
    content: "\00a0 \f071";
    font-family: FontAwesome;
    color: #EA0D94;
</style>

  <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div id="repEmail"></div>

      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Manual de Usuario - Reprogramación" style="background: #060;margin-right:50px;border-radius: 5px;">
        <a class="nav-link" href="http://sistemas.oplever.org.mx/sipseiv2/manual/Manual_SIPSEI2020_Reprogramacion.pdf" target="_blank" style="color: #fff;">
          <i class="fa fa-question-circle" aria-hidden="true"></i>
        </a>
      </li>


      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Observaciones contestadas" style="{!!global_function_example()===2 ? 'display: none' : "" !!}">
        <a class="nav-link alerta-obsR" id="iconAlertObs" data-toggle="dropdown" href="#">
          <i class="fa fa-reply" aria-hidden="true"></i>
          @if(count($observacionesR) > 0)         
            <span id="campanaAlertObsR" class="badge badge-warning navbar-badge">{{count($observacionesR)}}</span>
            @else
            <span id="campanaAlertObsR" class="badge badge-warning navbar-badge" ></span>               
          @endif
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="text-transform: uppercase;background: #eceff1; color: #EA0D94;">
            Observaciones contestadas
          </span>
          <div class="dropdown-divider"></div>
          <!--a href="#" class="dropdown-item texto-negro">
            <i class="fa fa-file"></i>  4 nuevos documentos
            <span class="float-right text-muted text-sm">3 min</span>
          </a-->
          <div id="obsDesA">
          @foreach( $observacionesR as $obs )
            <a href="#" class="dropdown-item texto-negro alerta-texto">
            <div style="display: inline-block;float: left;">{{$obs->obs_acronimo}} - Act.- {{$obs->numactividad}} - {{$obs->obs_clave}}</div> <div style="display: inline-block;float: right;background: #EA0D94; color: #fff; border-radius: 5px; padding: 1% 2%;">{{ date('d/m/Y', strtotime($obs->obs_date)) }}</div>
            </a>
          @endforeach
          </div>

          <div class="dropdown-divider"></div>
          <a href="{{ route('elaboracion') }}" class="dropdown-item dropdown-footer" style="background: #eceff1;color: #000;">
          {!! count($observacionesR)>0 ? 'Ir a la Revisión de Actividades' : 'Sin notificaciones' !!}
          </a>
        </div>
      </li>  


      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Observaciones enviadas" style="{!!global_function_example()===2 ? 'display: none' : "" !!}">
        <a class="nav-link alerta-obs" id="iconAlertObs" data-toggle="dropdown" href="#">
          <i class="fa fa-paper-plane-o"></i>
          @if(count($observaciones) > 0)         
            <span id="campanaAlertObs" class="badge badge-warning navbar-badge">{{count($observaciones)}}</span>
            @else
            <span id="campanaAlertObs" class="badge badge-warning navbar-badge" ></span>               
          @endif
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header" style="text-transform: uppercase;background: #eceff1; color: #EA0D94;">Observaciones enviadas</span>
          <div class="dropdown-divider"></div>
          <!--a href="#" class="dropdown-item texto-negro">
            <i class="fa fa-file"></i>  4 nuevos documentos
            <span class="float-right text-muted text-sm">3 min</span>
          </a-->

          <div id="obsDesB">
          @foreach( $observaciones as $obs )
            <a href="#" class="dropdown-item texto-negro alerta-texto">
            <div style="display: inline-block;float: left;">{{$obs->usu_acronimo}} - Act.- {{$obs->obs_idactividad}} - {{$obs->obs_clave}}</div> <div style="display: inline-block;float: right;background: #EA0D94; color: #fff; border-radius: 5px; padding: 1% 2%;">{{ date('d/m/Y', strtotime($obs->obs_date)) }}</div>
            </a>
          @endforeach
          </div>

          <div class="dropdown-divider"></div>
          <a href="{{ route('elaboracion') }}" class="dropdown-item dropdown-footer" style="background: #eceff1;color: #000;">{!! count($observaciones)>0 ? 'Ir a la Revisión de Actividades' : 'Sin observaciones' !!}</a>
        </div>
      </li>  

    
       <!--Termina el if de la variable global del sistema-->




      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Notificación mensual">
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
            <div style="display: inline-block;float: left;">{{$alertafin->ale_acronimo}} - {{$alertafin->ale_mes}}</div> <div style="display: inline-block;float: right;background: #EA0D94; color: #fff; border-radius: 5px; padding: 1% 2%;">{{ date('d/m/Y', strtotime($alertafin->ale_date)) }}</div>
            </a>
          @endforeach

          <div class="dropdown-divider"></div>
          <a href="{{ route('bitacorames') }}" class="dropdown-item dropdown-footer" style="background: #eceff1;color: #000;">Ver todas las notificaciones</a>
        </div>
      </li>  


      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Notificación de actividad">
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
              <div class=" tiempo{{ $alerta->ale_tiempo }}" style="display: inline-block;float: left;">{{$alerta->ale_acronimo}} - {{$alerta->ale_id_programa}} - {{$alerta->ale_num_actividad}}</div> <div style="display: inline-block;float: right;background: #EA0D94; color: #fff; border-radius: 5px; padding: 1% 2%;">{{ date('d/m/Y', strtotime($alerta->ale_date)) }}</div>
            </a>
          @endforeach

          <div class="dropdown-divider"></div>
          <a href="{{ route('bitacora') }}" class="dropdown-item dropdown-footer" style="background: #eceff1;color: #000;">Ver todas las notificaciones</a>
        </div>
      </li>  

      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Salir del Sistema">
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
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="salir"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        </div>
      </li>

    </ul>

  </nav>