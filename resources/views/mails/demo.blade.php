
<div style="width: 600px;margin: auto;min-height: 380px; height: 380px; height: auto !important; background: #e8e8e8; margin-bottom: 30px;padding:0 0 15px 0;">
<div style="width: 560px; height: 80px;background-color: #f5f5f5;padding:10px 20px;">
<!--img class="logo" src="http://sistemas.oplever.org.mx/buzon/images/logoople.png" alt="Logo Ople" title="logo ople correo" width="97" height="75"-->
<div style="width: 97px; height: 75px;float: left;">
<img class="logo" src="{{ asset('images/logoople.png') }}" alt="Logo Ople" title="logo ople correo" width="97" height="75">
</div>
<div style="width: 420px; height: 55px;float: right;webkit-box-shadow: 0 10px 6px -6px #777;-moz-box-shadow: 0 10px 6px -6px #777;box-shadow: 0 10px 6px -6px #777;background-color: #fff;text-align: center;font-size: 25px;vertical-align: middle;color: #EA0D94;padding-top: 20px;font-family: sans-serif; border-radius: 10px;">
Unidad Técnica de Planeación
</div>
</div>
<p style="text-align: center;">
<!--img class="logo" src="http://sistemas.oplever.org.mx/sipsei/images/logosipsei.png" alt="SIPSEI" title="logo SIPSEI" width="85" height="30" style="background-color: #343a40; border-radius: 5px;margin-top: 10px;"-->
<img class="logo" src="{{ asset('images/logosipseir.png') }}" alt="SIPSEI" title="logo SIPSEI" width="85" height="30" style="background-color: #343a40; border-radius: 5px;margin-top: 10px;"></p>
<div style="width: 300px;background-color: #fff;padding: 10px 5px;margin: auto; text-align: center;font-size: 20px;font-family: sans-serif;color: #EA0D94;border-radius: 10px; webkit-box-shadow: 0 10px 6px -6px #777;-moz-box-shadow: 0 10px 6px -6px #777;box-shadow: 0 10px 6px -6px #777;">Notificación Mensual</div>
<div style="background: #f9f9f9; height: auto;padding: 5px;margin: 30px 0;">
<p style="text-align: justify; padding: 0 20px; font-family: sans-serif;font-size: 17px;color: #555;">El área <span style="text-decoration: underline;font-weight: bold;text-transform: uppercase;">{{ $demo->sender }} - ({{ $demo->demo_one }})</span> ha concluido la captura del avance en sus actividades correspondientes al mes de <span style="text-decoration: underline;font-weight: bold;text-transform: uppercase;">{{ $demo->demo_two }}.</span></p>
<p style="text-align: left;font-family: sans-serif; padding: 0 20px; font-size: 17px;color: #555;">
 @foreach( $demo->horayfecha as $hf )

   Fecha: <span style="text-decoration: underline;font-weight: bold;text-transform: uppercase;">{{ date('d/m/Y H:i:s', strtotime($hf->ale_date)) }}</span>
            
@endforeach

</p>
</div>

<!--h4 style="font-family: sans-serif;font-size: 17px;font-weight: bold;padding-left: 20px;color: #555;">Actividades Realizadas en el mes.</h4>
 @foreach( $demo->receiver as $alerta )
            
    <div style="color: #EA0D94; padding: 0 20px;margin: 10px 0;font-family: sans-serif;font-size: 17px;font-weight: bold;">{{$alerta->ale_acronimo}} - {{$alerta->ale_id_programa}} - {{$alerta->ale_num_actividad}} <span style="color: #555;margin-left:20px;">{{ date('d/m/Y', strtotime($alerta->ale_date)) }}</span></div>
            
@endforeach-->

</div>
 
