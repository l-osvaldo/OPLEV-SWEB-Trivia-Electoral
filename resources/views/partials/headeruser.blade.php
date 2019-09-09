
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


  <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <!-- Notifications Dropdown Menu -->

      <!--li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notificaciones</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item texto-negro">
            <i class="fa fa-file"></i>  4 nuevos documentos
            <span class="float-right text-muted text-sm">3 min</span>
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
        </div>
      </li-->

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
        <div class="hidden" id="iconAlert"></div>
        <div class="hidden" id="iconAlertfin"></div>
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