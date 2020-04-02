<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
  .test {
   max-height:400px;
   overflow-y:scroll;
 } 

 .scrollbar-juicy-peach::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

  .scrollbar-juicy-peach::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5; }

    .scrollbar-juicy-peach::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
      background-image: -webkit-gradient(linear, left top, right top, from(#ffcce6), to(#ff0080));
      background-image: -webkit-linear-gradient(left, #ffcce6 0%, #ff0080 100%);
      background-image: linear-gradient(to right, #ffcce6 0%, #ff0080 100%); }

    }
  </style>


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom o-nav-adminLite">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="o-titulo-sistema">Este dato es una variable global {{global_function_example()}}</span><br>
        <span class="o-titulo-unidad">Tempor incididunt ut labore et dolore</span>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <div id="repEmail"></div>
      <!---------------------------------------------------- ALERTA PUSHER----------------------------------------------------->
      <li class="nav-item dropdown dropdown-notifications">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i data-count="" class="fas fa-satellite"></i>
          <span class="badge badge-oplever navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notificaciones (<span class="notif-count"></span>)</span>
          <div class="test scrollbar-juicy-peach" >
            <div class="dropdown-divider"></div>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" style="color:#594b57;">
              <i class="fas fa-user-astronaut"></i>
              <strong style="padding-left:5px;">Usuario de Ejemplo</strong>
              <br>
              <span>Esto es un mensaje</span>
              <span class="float-right text-muted text-sm">Hace 1 segundo</span>
            </a>
          </div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer" style="color:#594b57;">Ver Todas las Notificaciones</a>
        </div>
      </li>

      <!----------------------------------------------------- ALERTA 2 ------------------------------------------------------>
      <!---------------------------------------------------- ALERTA 1 ----------------------------------------------------->
      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Observaciones contestadas">
        <a class="nav-link" id="iconAlertObs" data-toggle="dropdown" href="#">
          <i class="fas fa-reply-all" aria-hidden="true"></i>
          <span id="campanaAlertObsR" class="badge badge-oplever navbar-badge">2</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header o-titulo-alertas">Observaciones contestadas</span>
          <div class="dropdown-divider"></div>
          <div id="obsDesA">
            <a href="#" class="dropdown-item texto-negro o-alerta-texto">
              <div class="o-alerta-vista">UTSI - Act.- 2 - 23</div>
              <div class="o-alerta-vista-fecha">17/03/2020</div>
            </a>
          </div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer o-alerta-footer">Ir a la Revisión de Actividades</a>
        </div>
      </li>  
      <!----------------------------------------------------- ALERTA 2 ------------------------------------------------------>
      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Observaciones enviadas">
        <a class="nav-link o-alerta-obs" id="iconAlertObs" data-toggle="dropdown" href="#">
          <i class="fas fa-paper-plane"></i>       
          <span id="campanaAlertObs" class="badge badge-oplever navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header o-titulo-alertas">Observaciones enviadas</span>
          <div class="dropdown-divider"></div>
          <div id="obsDesB">
            <a href="#" class="dropdown-item texto-negro o-alerta-texto">
              <div class="o-alerta-vista">UTP - Act.- 103 - AVC</div>
              <div class="o-alerta-vista-fecha">19/05/2020</div>
            </a>
            <a href="#" class="dropdown-item texto-negro o-alerta-texto">
              <div class="o-alerta-vista">UTP - Act.- 103 - AVC</div>
              <div class="o-alerta-vista-fecha">19/05/2020</div>
            </a>
          </div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer o-alerta-footer">Ir a la Revisión de Actividades
          </a>
        </div>
      </li>  
      <!----------------------------------------------------- ALERTA 3 ------------------------------------------------------>
      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Notificación mensual">
        <a class="nav-link o-alerta-final" id="iconAlertfin" data-toggle="dropdown" href="#">
          <i class="fas fa-exclamation-triangle"></i>  
          <span class="badge badge-oplever navbar-badge">2</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header o-titulo-alertas">Notificación mensual</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item texto-negro o-alerta-texto o-nueva-alerta">
            <div class="o-alerta-vista">UTSI - 12</div>
            <div class="o-alerta-vista-fecha">03/07/2020</div>
          </a>
          <a href="#" class="dropdown-item texto-negro o-alerta-texto no">
            <div class="o-alerta-vista">UTSI - 12</div>
            <div class="o-alerta-vista-fecha">03/07/2020</div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer o-alerta-footer">Ver todas las notificaciones</a>
        </div>
      </li>  
      <!------------------------------------------------------- ALERTA 4 ------------------------------------------------------->
      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Notificación de actividad">
        <a class="nav-link o-alerta-edit" id="iconAlert" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>      
          <span class="badge badge-oplever navbar-badge">2</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header o-titulo-alertas">Notificación de actividad</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item texto-negro o-alerta-texto o-nueva-alerta }}">
            <div class="o-alerta-vista o-tiempo-fuera" >UTP - 101 - 13</div>
            <div class="o-alerta-vista-fecha">20/04/2020</div>
          </a>
          <a href="#" class="dropdown-item texto-negro o-alerta-texto no">
            <div class="o-alerta-vista">UTP - 101 - 13</div>
            <div class="o-alerta-vista-fecha">20/04/2020</div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer o-alerta-footer">Ver todas las notificaciones</a>
        </div>
      </li>  
      <!-- logout -->
      <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title="" data-original-title="Cerrar sesión">
        <a class="nav-link o-alerta-logout" data-toggle="dropdown" href="#">
          <i class="fas fa-user-tie"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="o-salir"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</a>
          <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c298b7f80f6c55437712', {
      cluster: 'us2',
      forceTLS: true
    });

    var channel = pusher.subscribe('example');
    channel.bind('example', function(data) {
      alert(JSON.stringify(data));
    });
  </script>

