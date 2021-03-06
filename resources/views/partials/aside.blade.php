<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link brand-ople o-logo-center">
    <h2 style="color: #fff;">Trivia</h2>
    <!--img src="{{ asset('images/tuimagen.png') }}" width="70%" alt="Proyecto Logo" class=""-->
    <!--span class="brand-text font-weight-light">AdminLTE 3</span-->
  </a>

      <!-- Sidebar user panel (optional) -->
    <div class="user-panel d-flex text-center o-img-fondo mb-3" style="background: url('{{ asset('images/backu.png') }}')   !important; background-size: cover !important; background-repeat: no-repeat !important; background-position-y: bottom !important;">
      
      <div class="nav-header col-md-12 o-nombre-usuario">
       <i class="fas fa-user-circle o-icon-usuario"></i><br>
        {{ $usuario->email }}
      </div>
    </div>

  <!-- Sidebar -->
  <div class="sidebar" style="margin-top: 0;">


    <!-- Sidebar Menu -->
    <nav>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!----------------------------------------------------------------------------------->

        {{-- <li class="nav-item has-treeview menuClose">
          <a href="#" class="nav-link o-menu-principal">
            <i class="nav-icon fas fa-tachometer-alt o-color-menu" aria-hidden="true"></i>
            <p class="o-color-menu">
              Panel
              <i class="right fa fa-chevron-left" aria-hidden="true"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item has-treeview">
              <a href="{{ route('front.loader') }}" class="textSideOption nav-link {!! Request::is('loader') ? 'active activeOn' : '' !!}">
                <i class="far fa-clock" aria-hidden="true"></i>
                <p>Loader</p>
              </a>
            </li>

            <!--li class="nav-item has-treeview">
              <a href="{{ route('programa.index') }}" class="textSideOption nav-link {!! Request::is('programa') ? 'active activeOn' : '' !!}">
                <i class="fas fa-tachometer-alt"></i> <p>Dashboard</p>
              </a>
            </li-->

            <li class="nav-item has-treeview">
              <a href="{{ route('front.formulario') }}" class="textSideOption nav-link {!! Request::is('formulario') ? 'active activeOn' : '' !!}">
                <i class="fab fa-wpforms"></i> <p>Formularios</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('front.email') }}" class="textSideOption nav-link {!! Request::is('email') ? 'active activeOn' : '' !!}">
                <i class="far fa-envelope"></i> <p>Email</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('front.fechas') }}" class="textSideOption nav-link {!! Request::is('fechas') ? 'active activeOn' : '' !!}">
                <i class="far fa-calendar"></i> <p>Fechas</p>
              </a>
            </li>
          </ul>
        </li> --}}

        <!----------------------------------------------------------------------------------->

        {{-- <li class="nav-item has-treeview menuClose">
          <a href="#" class="nav-link o-menu-secundario">
            <i class="nav-icon fas fa-list-ol o-color-menu" aria-hidden="true"></i>
            <p class="o-color-menu">
              UI Elements
              <i class="right fa fa-chevron-left" aria-hidden="true"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item has-treeview">
              <a href="{{ route('front.widgets') }}" class="textSideOption nav-link {!! Request::is('programa') || Request::is('widgets') ||  Request::is('/') ? 'active activeOn' : '' !!}">
                <i class="far fa-star"></i> <p>Widgets</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('front.cuadros') }}" class="textSideOption nav-link {!! Request::is('cuadros') ? 'active activeOn' : '' !!}">
                <i class="fas fa-window-restore"></i> <p>Cuadros</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="{{ route('front.cuadros_dos') }}" class="textSideOption nav-link {!! Request::is('cuadros') ? 'active activeOn' : '' !!}">
                <i class="fas fa-th-large"></i> <p>Cuadros 2</p>
              </a>
            </li> --}}





























































































































































































































































































































































































































            {{-- <li class="nav-item has-treeview">
              <a href="{{ route('front.visorpdf') }}" class="textSideOption nav-link {!! Request::is('visorpdf') ? 'active activeOn' : '' !!}">
                <i class="far fa-file-pdf"></i> <p>Visor PDF</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('front.highcharts') }}" class="textSideOption nav-link {!! Request::is('highcharts') ? 'active activeOn' : '' !!}">
                <i class="far fa-chart-bar"></i> <p>Highcharts</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('front.tables') }}" class="textSideOption nav-link {!! Request::is('tables') ? 'active activeOn' : '' !!}">
                <i class="fas fa-table"></i> <p>Tablas</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('front.tabs') }}" class="textSideOption nav-link {!! Request::is('tabs') ? 'active activeOn' : '' !!}">
                <i class="far fa-address-card"></i> <p>Tabs</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('front.general') }}" class="textSideOption nav-link {!! Request::is('general') ? 'active activeOn' : '' !!}">
                <i class="fab fa-adn"></i> <p>Alertas y modales</p>
              </a>
            </li>

            <!--li class="nav-item has-treeview">
              <a href="{{ route('front.modals') }}" class="textSideOption nav-link {!! Request::is('modals') ? 'active activeOn' : '' !!}">
                <i class="far fa-window-maximize"></i> <p>Modals</p>
              </a>
            </li-->

            <li class="nav-item has-treeview">
              <a href="{{ route('front.timeline') }}" class="textSideOption nav-link {!! Request::is('timeline') ? 'active activeOn' : '' !!}">
                <i class="fab fa-algolia"></i> <p>Timeline</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="{{ route('front.ribbons') }}" class="textSideOption nav-link {!! Request::is('ribbons') ? 'active activeOn' : '' !!}">
                <i class="fas fa-project-diagram"></i> <p>Ribbons</p>
              </a>
            </li>

            

          </ul>
        </li> --}}


        <!----------------------------------------------------------------------------------->

        {{-- <li class="nav-item has-treeview menuClose">
          <a href="#" class="nav-link o-menu-tres">
            <i class="nav-icon fas fa-list-ol o-color-menu" aria-hidden="true"></i>
            <p class="o-color-menu">
              Validaci??n OPLE
              <i class="right fa fa-chevron-left" aria-hidden="true"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">


            <li class="nav-item has-treeview">
             <a href="{{ route('front.validacion') }}" class="textSideOption nav-link {!! Request::is('validacion') ? 'active activeOn' : '' !!}">
                <i class="fas fa-exclamation-triangle"></i> <p>Validaciones</p>
              </a>
            </li>

            <li class="nav-item has-treeview">
             <a href="{{ route('front.encrypt') }}" class="textSideOption nav-link {!! Request::is('encrypt') ? 'active activeOn' : '' !!}">
                <i class="fas fa-code"></i> <p>Encrypt</p>
              </a>
            </li>

          </ul>
        </li> --}}


        <!----------------------------------------------------------------------------------->

        {{-- <li class="nav-item has-treeview menuClose">
          <a href="#" class="nav-link o-menu-cuatro">
            <i class="nav-icon fas fa-qrcode o-color-menu" aria-hidden="true"></i>
            <p class="o-color-menu">
              Sello Digital OPLE
              <i class="right fa fa-chevron-left" aria-hidden="true"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
             <a href="{{ route('front.sello-digital') }}" class="textSideOption nav-link {!! Request::is('sello-digital') ? 'active activeOn' : '' !!}">
                <i class="fas fa-bolt"></i> <p>Validador de Reportes</p>
              </a>
            </li>
          </ul>
        </li> --}}
        <!----------------------------------------------------------------------------------->

        <li class="nav-item has-treeview menuClose">
          <a href="#" class="nav-link o-menu-principal">
            <i class="nav-icon fas fa-mobile-alt o-color-menu" aria-hidden="true"></i>
            <p class="o-color-menu">
              Trivia
              <i class="right fa fa-chevron-left" aria-hidden="true"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item has-treeview">
              <a href="{{ route('gestionUsuarios') }}" class="textSideOption nav-link {!! Request::is('gestionUsuarios') ||  Request::is('/') ? 'active activeOn' : '' !!}">
                <i class="fas fa-users" aria-hidden="true"></i>
                <p>Gesti??n de usuarios</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="{{ route('notificaciones') }}" class="textSideOption nav-link {!! Request::is('notificaciones') ? 'active activeOn' : '' !!}">
                <i class="fas fa-bell" aria-hidden="true"></i>
                <p>Notificaciones</p>
              </a>
            </li>
            <li class="nav-item has-treeview {!! Request::is('estadisticas/usuariosAPP') || Request::is('estadisticas/distritos') || Request::is('estadisticas/municipios') || Request::is('estadisticas/estados') ? 'menuOpen menu-open' : '' !!}">
              <a href="#" class="textSideOption nav-link {!! Request::is('estadisticas/usuariosAPP') || Request::is('estadisticas/distritos') || Request::is('estadisticas/municipios') || Request::is('estadisticas/estados')  ? 'active activeOn' : '' !!}">
                <i class="far fa-chart-bar"></i> 
                <p>
                  Estad??sticas
                  <i class="right fa fa-chevron-left" aria-hidden="true"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item has-treeview">
                  <a href="{{ route('estadisticas.usuariosAPP') }}" class="textSideOption nav-link {!! Request::is('estadisticas/usuariosAPP') ? 'active activeOn' : '' !!}">
                    <i class="fas fa-mobile-alt"></i>
                    <p>Usuarios de la App</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ route('estadisticas.distritos') }}" class="textSideOption nav-link {!! Request::is('estadisticas/distritos') ? 'active activeOn' : '' !!}">
                    <i class="fas fa-cubes"></i>
                    <p>Distritos</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ route('estadisticas.municipios') }}" class="textSideOption nav-link {!! Request::is('estadisticas/municipios') ? 'active activeOn' : '' !!}">
                    <i class="fas fa-puzzle-piece"></i>
                    <p>Municipios</p>
                  </a>
                </li>
                <li class="nav-item has-treeview">
                  <a href="{{ route('estadisticas.estados') }}" class="textSideOption nav-link {!! Request::is('estadisticas/estados') ? 'active activeOn' : '' !!}">
                    <i class="fas fa-cubes"></i>
                    <p>Otras Entidades Federativas</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="{{ route('gestionPreguntas') }}" class="textSideOption nav-link {!! Request::is('gestionPreguntas') ? 'active activeOn' : '' !!}">
                <i class="far fa-question-circle"></i> 
                <p>Gesti??n de preguntas</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


