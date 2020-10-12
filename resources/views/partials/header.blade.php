<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand border-bottom border-dark navbar-white navbar-light o-nav-adminLite">
    <div class="collapse navbar-collapse flex-column" id="navbar" style="margin-bottom: -0.5em !important;">
        <ul class="navbar-nav nav w-100">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <span class="o-titulo-sistema">TRIVIA</span><br>
                <span class="o-titulo-unidad">Organismo Público Local Electoral del Estado de Veracruz</span>
            </li>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <div id="repEmail"></div>
                <!---------------------------------------------------- ALERTA 1 ----------------------------------------------------->
                {{-- <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title=""
                    data-original-title="Observaciones contestadas">
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
                        <a href="#" class="dropdown-item dropdown-footer o-alerta-footer">Ir a la Revisión de
                            Actividades</a>
                    </div>
                </li> --}}
                <!----------------------------------------------------- ALERTA 2 ------------------------------------------------------>
                {{-- <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title=""
                    data-original-title="Observaciones enviadas">
                    <a class="nav-link" id="iconAlertObs" data-toggle="dropdown" href="#">
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
                        <a href="#" class="dropdown-item dropdown-footer o-alerta-footer">Ir a la Revisión de
                            Actividades
                        </a>
                    </div>
                </li> --}}
                <!----------------------------------------------------- ALERTA 3 ------------------------------------------------------>
                {{-- <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title=""
                    data-original-title="Notificación mensual">
                    <a class="nav-link" id="iconAlertfin" data-toggle="dropdown" href="#">
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
                        <a href="#" class="dropdown-item dropdown-footer o-alerta-footer">Ver todas las
                            notificaciones</a>
                    </div>
                </li> --}}
                <!------------------------------------------------------- ALERTA 4 ------------------------------------------------------->
                <li class="nav-item dropdown dropdown-notifications">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true" onclick="limpiarNotificaciones()">
                        <i data-count="0" class="far fa-bell"></i>
                        <span class="badge badge-oplever navbar-badge" id="marcoCountNotificaciones"  style="{{ $countNotificaciones == '0' ? 'display: none' : '' }}" ><span class="notif-count" id="alertIcon">{{ $countNotificaciones }}</span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width: 400px !important">
                        <span class="dropdown-item dropdown-header">Notificaciones (<span
                                class="notif-count" id="alertIcon2">{{ $countNotificaciones }}</span>)</span>
                        <div class="test">
                            <div class="dropdown-divider"></div>

                        </div>
                        <div class="dropdown-divider"></div>
                        <div id="addNotify" class="" style="height:450px;overflow-y: scroll;">
                            @foreach ($notificaciones as $notificacion)
                                <div>
                                    <a class="dropdown-item" style="padding: .1em !important;background:#efefef;">
                                        <div class="media" style="margin: 0.5em 0;">
                                            <div style="position: relative;text-align: center;" class="col-md-3">
                                                <img src="{{ asset("images/logoople.png") }}" width="50" height="50" style="border-radius: 90px;border: solid 1px #DCDCDC;">
                                            </div>
                                            <div class="media-body">
                                                <b class="dropdown-item-title" style="font-size: 13px !important;">
                                                    {{ $notificacion->mensaje }}
                                                </b>
                                                <p style="font-size: 12px !important;" class="text-sm">
                                                    {{ $notificacion->nombre }}
                                                </p>
                                                <p style="font-size: 10px !important;" class="text-sm text-muted">
                                                    {{  $notificacion->estado == 'VERACRUZ' ? 'Mpio: '.$notificacion->municipio : 'Ent. Fed.: '.$notificacion->estado}}
                                                </p>
                                                <p style="font-size: 10px !important;" class="text-sm text-muted">
                                                    {{ \Carbon\Carbon::parse($notificacion->created_at)->format('l, d \d\e F \d\e\l Y \| g:i A') }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>                                
                            @endforeach    
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('notificaciones') }}" class="dropdown-item dropdown-footer" style="color:#594b57;">Ver Todas las
                            Notificaciones</a>
                    </div>
                    
                </li>
                <!-- logout -->
                <li class="nav-item dropdown" data-placement="left" data-toggle="tooltip" title=""
                    data-original-title="Cerrar sesión">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-tie"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                            class="o-salir"><i class="fa fa-power-off" aria-hidden="true"></i> Salir</a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </ul>
        <ul class="navbar-nav navbar-dark navbar-darkgrey"
            style="width: 102% !important; padding-left: 2.8em !important; height: 30px !important;">
            <li class="nav-item">
                <a class="nav-link active"
                    style="color: #fff !important; margin-top: -5px !important; font-weight:bold !important;">{{ $nombreModulo }}
                    </a>
            </li>
        </ul>
    </div>
</nav>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://js.pusher.com/5.1/pusher.min.js"></script>