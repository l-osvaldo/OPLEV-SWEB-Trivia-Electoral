<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom o-nav-adminLite">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <span class="o-titulo-sistema">Aquí se coloca el nombre completo del {{global_function_example()}}</span><br>
      <span class="o-titulo-unidad">Característica adicional del sistema</span>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <div id="repEmail"></div>
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
           <a href="#" class="dropdown-item texto-negro o-alerta-texto">
            <div class="o-alerta-vista">Harry Jackson</div>
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
     <li class="nav-item dropdown dropdown-notifications">
      <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
        <i data-count="0" class="far fa-bell"></i>
        <span class="badge badge-oplever navbar-badge"><span class="notif-count"></span></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">Notificaciones (<span class="notif-count"></span>)</span>
        <div class="test" >
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

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
<script type="text/javascript">
  var notificationsWrapper   = $('.dropdown-notifications');
  var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
  var notificationsCountElem = notificationsToggle.find('i[data-count]');
  var notificationsCount     = parseInt(notificationsCountElem.data('count'));
  var notifications          = notificationsWrapper.find('div.test');
  if (notificationsCount <= 0) {
    notificationsWrapper.hide();
  }
  var key = "c298b7f80f6c55437712";
  var pusher = new Pusher(key, {
    authEndpoint:'/authchannel',
    auth: {
      headers: {
        'X-CSRF-Token': $("[name='csrf-token']").attr('content')
      }
    },
    cluster: 'us2',
    forceTLS: true
  });

  Pusher.logToConsole = true;

  var privateChannel = pusher.subscribe('private-example');
  privateChannel.bind('example', function(data) {
    var existingNotifications = notifications.html();
    var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
    var newNotificationHtml = `
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item">
    <i class="fas fa-user-astronaut"></i><strong style="padding-left:5px;">Usuario de Ejemplo</strong>
    <br>
    <span>`+data.message+`</span>
    <span class="float-right text-muted text-sm">Hace 1 segundo</span>
    </a>
    `;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
  });
</script>
