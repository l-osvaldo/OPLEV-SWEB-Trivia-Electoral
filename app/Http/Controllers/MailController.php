<?php
namespace App\Http\Controllers;
 
use Alert;
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use Auth;
use Illuminate\Http\Request;
use App\Alerta;
use DB;

/**
* Funcionalidad: Registra un reporte de termino mensual y envia un email al area utp con los valores del reporte
* Parametros: $request
* Respuesta: alerta de envio
*
*/
 
class MailController extends Controller
{
    public function send(Request $request)
    {
        $user   = auth()->user();
        $usu_clave = $user->usu_clave;

        $send_clave = $request->clave;
        $send_mes = $request->mes;
        $send_mesEmail = $request->mesc;

        if ($send_clave === $usu_clave) {

            $userId = $user->id;
            $userName = $user->name;
            $acronimo = $user->usu_acronimo;

            $id_programa = 0;
            $num_actividad = 0;

            $alerta = new Alerta();
            $alerta->ale_actividad = $userName;

            $alerta->ale_acronimo = $acronimo;
            $alerta->ale_id_programa = $id_programa;
            $alerta->ale_num_actividad = $num_actividad;
            $alerta->ale_desc_actividad = '---';

            $alerta->ale_tipo = 1;
            $alerta->ale_clase = 'final';
            $alerta->ale_id_usuario = $userId;
            $alerta->ale_tiempo = '---';
            $alerta->ale_mes = $send_mesEmail;
            $alerta->ale_date = date('Y-m-d H:i:s');
            $alerta->save();


            $alertasmes = DB::table('alertas')->where('ale_id_usuario', $userId)->where('ale_clase', 'edicion')->where('ale_mes', $send_mes)->orderBy('ale_date', 'desc')->take(10)->get();

            $horayfecha = DB::table('alertas')->where('ale_id_usuario', $userId)->where('ale_clase', 'final')->where('ale_mes', $send_mes)->take(1)->get();



            $objDemo = new \stdClass();
            $objDemo->demo_one = $acronimo;
            $objDemo->demo_two = $send_mesEmail;
            $objDemo->sender = $userName;
            $objDemo->receiver = $alertasmes;
            $objDemo->horayfecha = $horayfecha;

            //print_r($horayfecha);exit;


        //Mail::to("utp.seguimiento@outlook.com")->send(new DemoEmail($objDemo));
        Mail::to("planeaople18@gmail.com")->cc('utp.seguimiento@outlook.com')->bcc('carlos.reducindo@oplever.org.mx')->send(new DemoEmail($objDemo));


            Alert::success('', 'Notificación mensual enviada')->autoclose(3500);
        } else {
            Alert::error('', 'La clave de confirmación es errónea')->autoclose(3500);
        }

        

        return response()->json('hola');

    }
}
