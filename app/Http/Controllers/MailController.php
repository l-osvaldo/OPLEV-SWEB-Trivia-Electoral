<?php
namespace App\Http\Controllers;
 
use Alert;
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use Auth;
use Illuminate\Http\Request;
use App\Alerta;
 
class MailController extends Controller
{
    public function send(Request $request)
    {
        $user   = auth()->user();
        $usu_clave = $user->usu_clave;

        $send_clave = $request->clave;
        $send_mes = $request->mes;

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

            $alerta->ale_tipo = 1;
            $alerta->ale_clase = 'final';
            $alerta->ale_id_usuario = $userId;
            $alerta->ale_tiempo = '---';
            $alerta->ale_mes = $send_mes;
             $alerta->ale_date = date('Y-m-d H:i:s');
            $alerta->save();


            $objDemo = new \stdClass();
            $objDemo->demo_one = $acronimo;
            $objDemo->demo_two = $send_mes;
            $objDemo->sender = $userName;
            $objDemo->receiver = $userName;
     
            Mail::to("aligutman1@gmail.com")->send(new DemoEmail($objDemo));

            Alert::success('', 'Notificación mensual enviada')->autoclose(3500);
        } else {
            Alert::error('Su clave no coincide', '¡Error!')->autoclose(3500);
        }

        

        return response()->json('hola');

    }
}
