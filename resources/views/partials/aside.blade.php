<!--aside class="main-sidebar">

  <section class="sidebar">

    <div class="user-panel">
      <div class="ulogo">
        <a href="index.html">

          <span><b>SIPSEI</b></span>
        </a>
      </div>
      <div class="image">
      
        <img src="{{ asset('images/usuario.png') }}" class="rounded-circle" alt="User Image">           
      </div>      
      <div class="info">   

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ion ion-power"></i></a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="nav-devider"></li>
      
      <li class="active">
        <a href="{{ route('programa.index') }}">
          <i class="fa fa-calendar-check-o"></i> <span>Programa Operativo Anual</span>
        </a>
      </li>
      <li class="active">
        <a href="{{ route('reppoa') }}">
          <i class="fa fa-calendar"></i> <span>Reportes POA</span>
        </a>
      </li>   
      
      <li class="active">
        <a href="{{ route('repindicadores') }}">
          <i class="fa fa-clone"></i> <span>Reportes Indicadores</span>
        </a>
      </li>       
    
      <br>
      <br>
      <br>
      <li class="active">
        <a href="{{ route('adicionales.index') }}">
          <i class="fa fa-calendar-plus-o"></i> <span>Actividades Adicionales</span>
        </a>
      </li>     


    </ul>
  </section>
</aside-->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
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

          <li class="nav-item has-treeview">
            <a href="{{ route('programa.index') }}" class="textSideOption nav-link {!! Request::is('programa') ? 'active activeOn' : '' !!}">
              <i class="fa fa-calendar-check-o"></i> <p>Programa Operativo Anual</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('reppoa') }}" class="textSideOption nav-link {!! Request::is('reppoa') ? 'active activeOn' : '' !!}">
              <i class="fa fa-calendar"></i> <p>Reportes POA</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('repindicadores') }}" class="textSideOption nav-link {!! Request::is('repindicadores') ? 'active activeOn' : '' !!}">
              <i class="fa fa-clone"></i> <p>Reportes Indicadores</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('adicionales.index') }}" class="textSideOption nav-link {!! Request::is('adicionales') ? 'active activeOn' : '' !!}">
              <i class="fa fa-calendar-plus-o"></i> <p>Actividades Adicionales</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <!--a href="{{ route('emailsend') }}" class="textSideOption nav-link"-->
            <a href="{{ route('alertames') }}" class="textSideOption nav-link {!! Request::is('alertames') ? 'active activeOn' : '' !!}">
              <i class="fa fa-envelope" aria-hidden="true"></i> <p>Notificación Mensual</p>
            </a>
          </li>

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b>Sweet Alert</b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Sweet Alert</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



</aside>
