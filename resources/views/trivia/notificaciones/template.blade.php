@foreach ($notificaciones as $notificacion)
    <div>
        <a class="dropdown-item" style="padding: .1em !important;background:#efefef;">
            <div class="media" style="margin: 0.5em 0;">
                <div style="position: relative;text-align: center;" class="col-md-3">
                    <img src="../images/logoople.png" width="50" height="50" style="border-radius: 90px;border: solid 1px #DCDCDC;">
                </div>
                <div class="media-body">
                    <b class="dropdown-item-title" style="font-size: 13px !important;">
                        {{ $notificacion->mensaje }}
                    </b>
                    <p style="font-size: 12px !important;" class="text-sm">
                        {{ $notificacion->email }}
                    </p>
                    <p style="font-size: 10px !important;" class="text-sm text-muted">
                        {{  $notificacion->nombre }}
                    </p>
                    <p style="font-size: 10px !important;" class="text-sm text-muted">
                        {{ \Carbon\Carbon::parse($notificacion->created_at)->format('l, d \d\e F \d\e\l Y \| g:i A') }}
                    </p>
                </div>
            </div>
        </a>
    </div>                                
@endforeach