
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
    <a href="/" class="brand-link o-logo-center">
      <img src="{{ asset('images/logosipseir.png') }}" width="80%" alt="Proyecto Logo" class=""><br>
      <div class="brand-text o-titulo-sistema-aside">Lorem ipsum dolor sit<br>consectetur adipiscing elit<br>ut labore et dolore</div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/usuario.png') }}" class="img-circle elevation-2 o-pading-logo" alt="User Image">
        </div>
        <div class="info nav-header">
          Lorem ipsum dolor
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <!----------------------------------------------------------------------------------->

          <li class="nav-item has-treeview menuClose">
            <a href="#" class="nav-link o-menu-principal">
              <i class="nav-icon fa fa-tasks o-color-menu" aria-hidden="true"></i>
              <p class="o-color-menu">
                DASHBOARD
                <i class="right fa fa-chevron-left" aria-hidden="true"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

          <li class="nav-item has-treeview">
                <a href="{{ route('front.loader') }}" class="textSideOption nav-link {!! Request::is('loader') ? 'active activeOn' : '' !!}">
                  <i class="fa fa-database" aria-hidden="true"></i>
                  <p>Loader</p>
                </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('programa.index') }}" class="textSideOption nav-link {!! Request::is('programa') ? 'active activeOn' : '' !!}">
              <i class="fa fa-calendar-check-o"></i> <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="textSideOption nav-link">
              <i class="fa fa-clone"></i> <p>Formularios</p>
            </a>
          </li>

          </ul>
          </li>

          <!----------------------------------------------------------------------------------->

          <li class="nav-item has-treeview menuClose">
            <a href="#" class="nav-link o-menu-seis">
              <i class="nav-icon fa fa-tasks o-color-menu" aria-hidden="true"></i>
              <p class="o-color-menu">
                Lorem ipsum dolor
                <i class="right fa fa-chevron-left" aria-hidden="true"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


          <li class="nav-item has-treeview">
            <a href="#" class="textSideOption nav-link">
              <i class="fa fa-file-o" aria-hidden="true"></i> <p>Lorem ipsum</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="textSideOption nav-link">
              <i class="fa fa-clone"></i> <p>Lorem ipsum</p>
            </a>
          </li>

          </ul>
          </li>


          <!----------------------------------------------------------------------------------->

          <li class="nav-item has-treeview menuClose">
            <a href="#" class="nav-link o-menu-tres">
              <i class="nav-icon fa fa-tasks o-color-menu" aria-hidden="true"></i>
              <p class="o-color-menu">
                Lorem ipsum dolor
                <i class="right fa fa-chevron-left" aria-hidden="true"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


          <li class="nav-item has-treeview">
            <a href="#" class="textSideOption nav-link">
              <i class="fa fa-calendar" aria-hidden="true"></i> <p>Lorem ipsum</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="textSideOption nav-link">
              <i class="fa fa-calendar" aria-hidden="true"></i> <p>Lorem ipsum</p>
            </a>
          </li>

          </ul>
          </li>


          <!----------------------------------------------------------------------------------->

          <li class="nav-item has-treeview menuClose">
            <a href="#" class="nav-link o-menu-sinco">
              <i class="nav-icon fa fa-tasks o-color-menu" aria-hidden="true"></i>
              <p class="o-color-menu">
                Lorem ipsum dolor
                <i class="right fa fa-chevron-left" aria-hidden="true"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


          <li class="nav-item has-treeview">
            <a href="#" class="textSideOption nav-link">
              <i class="fa fa-calendar" aria-hidden="true"></i> <p>Lorem ipsum</p>
            </a>
          </li>

          </ul>
          </li>


          <!----------------------------------------------------------------------------------->

          <li class="nav-item has-treeview menuClose">
            <a href="#" class="nav-link o-menu-cuatro">
              <i class="nav-icon fa fa-tasks o-color-menu" aria-hidden="true"></i>
              <p class="o-color-menu">
                Lorem ipsum dolor
                <i class="right fa fa-chevron-left" aria-hidden="true"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


          <li class="nav-item has-treeview">
            <a href="#" class="textSideOption nav-link">
              <i class="fa fa-calendar" aria-hidden="true"></i> <p>Lorem ipsum</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="textSideOption nav-link">
              <i class="fa fa-calendar" aria-hidden="true"></i> <p>Lorem ipsum</p>
            </a>
          </li>

          </ul>
          </li>


          <!----------------------------------------------------------------------------------->


          <li class="nav-item has-treeview menuClose">
            <a href="#" class="nav-link o-menu-secundario">
              <i class="fa fa-flag o-color-menu" aria-hidden="true"></i>
              <p class="o-color-menu">
                Lorem ipsum dolor
                <i class="right fa fa-chevron-left" aria-hidden="true"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

          <li class="nav-item has-treeview">
            <a href="#" class="textSideOption o-color-sub-menu nav-link">
              <i class="fa fa-list-alt"></i> <p>Lorem ipsum</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="textSideOption o-color-sub-menu nav-link">
              <i class="fa fa-list-alt"></i> <p>Lorem ipsum</p>
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


