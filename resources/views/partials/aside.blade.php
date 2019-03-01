<aside class="main-sidebar">
  <!-- sidebar -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="ulogo">
        <a href="index.html">
        <!-- logo for regular state and mobile devices -->
          <span><b>SIPSEI</b></span>
        </a>
      </div>
      <div class="image">
        <!--<img src="../images/user2-160x160.jpg" class="rounded-circle" alt="User Image">     -->
        <img src="/images/usuario.png" class="rounded-circle" alt="User Image">           
      </div>      
      <div class="info">   

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ion ion-power"></i></a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

      </div>
    </div>
    <!-- sidebar menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="nav-devider"></li>

      <!--<li class="header nav-small-cap">POA</li> -->
      
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
      <!--
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>App</span>
        </a>
      </li>
    -->
      


    </ul>
  </section>
</aside>
