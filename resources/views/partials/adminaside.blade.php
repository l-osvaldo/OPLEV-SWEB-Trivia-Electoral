<!--aside class="main-sidebar sidebar-dark-primary elevation-4">

  <section class="sidebar">

    <div class="user-panel">
      <div class="ulogo">

          <img src="{{ asset('images/logosipsei.png') }}" alt="SIPSEI" class="panelImgLogo"><br>

           <div class="panelUserName">Sistema Integral de<br>Planeación, Seguimiento y<br>Evaluación Institucional</div>
      </div>
      
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="nav-devider"></li>

      <li class="{!! Request::is('programa') ? 'active activeOn' : '' !!}">
        <a href="{{ route('programa.index') }}">
          <i class="fa fa-calendar-check-o"></i> <span>Programa Operativo Anual</span>
        </a>
      </li>


      <li class="{!! Request::is('repindicadores') ? 'active activeOn' : '' !!}">
        <a href="{{ route('repindicadores') }}">
          <i class="fa fa-clone"></i> <span>Reportes Indicadores</span>
        </a>
      </li>

      <br>
      <li class="{!! Request::is('poatrimestral') ? 'active activeOn' : '' !!}">
        <a href="{{ route('admin.poa.trimestral') }}">
          <i class="fa fa-calendar-o"></i> <span>Reporte Trimestral</span>
        </a>
      </li>
    </ul>
  </section-->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
    <a href="{{ route('programa.index') }}" class="brand-link">
      <img src="{{ asset('images/logosipsei.png') }}" width="100%" alt="SIPSEI Logo" class="elevation-3"><br>
      <div class="brand-text" style="font-size: .9rem;letter-spacing: 2px;line-height: 1 !important;text-align: center;padding: .5rem 0 0 0;">Sistema Integral de<br>Planeación, Seguimiento y<br>Evaluación Institucional</div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/usuario.png') }}" class="img-circle elevation-2" style="background: #ccc;padding: .1rem;" alt="User Image">
        </div>
        <div class="info nav-header">
          {{ Auth::user()->username }}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link" style="background-color: #EA0D94;color: #FFF;">
              <i class="nav-icon fa fa-tasks" aria-hidden="true"></i>
              <p>
                SEGUIMIENTO POA
                <i class="right fa fa-chevron-left" aria-hidden="true"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

          <li class="nav-item has-treeview">
            <a href="{{ route('programa.index') }}" class="textSideOption nav-link {!! Request::is('programa') ? 'active activeOn' : '' !!}">
              <i class="fa fa-calendar-check-o"></i> <p>Programa Operativo Anual</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('repindicadores') }}" class="textSideOption nav-link {!! Request::is('repindicadores') ? 'active activeOn' : '' !!}">
              <i class="fa fa-clone"></i> <p>Reportes Indicadores</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('admin.poa.trimestral') }}" class="textSideOption nav-link {!! Request::is('poatrimestral') ? 'active activeOn' : '' !!}">
              <i class="fa fa-calendar-plus-o"></i> <p>Reporte Trimestral</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('bitacorames') }}" class="textSideOption nav-link {!! Request::is('bitacorames') ? 'active activeOn' : '' !!}">
              <i class="fa fa-list-alt"></i> <p>Bitacora de actividades</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('bitacora') }}" class="textSideOption nav-link {!! Request::is('bitacora') ? 'active activeOn' : '' !!}">
              <i class="fa fa-list-alt"></i> <p>Acciones por actividad</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('tablames') }}" class="textSideOption nav-link {!! Request::is('tablames') ? 'active activeOn' : '' !!}">
              <i class="fa fa-list-alt"></i> <p>Reporte mensual</p>
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


