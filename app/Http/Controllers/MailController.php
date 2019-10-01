<?php
namespace App\Http\Controllers;
 
use Alert;
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
//use Illuminate\Support\Facades\Mail;
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
            //$alerta->save();


            $objDemo = new \stdClass();
            $objDemo->demo_one = $acronimo;
            $objDemo->demo_two = $send_mes;
            $objDemo->sender = $userName;
            $objDemo->receiver = $userName;
     
            //Mail::to("contacto.odes@oplever.org.mx")->send(new DemoEmail($objDemo));



$from = 'sipsei@oplever.org.mx'; //Correo del formulario
$to = 'ali.gutierrez@oplever.org.mx'; //Aqui va el correo del buzon de quejas
//contacto.odes@oplever.org.mx
//$to = 'aligutman1@gmail.com'; //Aqui va el correo del buzon de quejas
//$to = 'javier24viper@gmail.com'; //Aqui va el correo del buzon de quejas

$subject = 'Buzon de Quejas ODES'; //El asunto del correo
$message = '
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="x-apple-disable-message-reformatting">  
<title></title> 
</head><body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #fff;">
hola</body></html>
        ';

$headers = "From:" . $from . "\r\n";
$headers .= "Reply-To: " .$from . "\r\n";
//$headers .= 'CC: creducindo@hotmail.com' . " \r\n";
$headers .= 'CC: aligutman1@gmail.com' . " \r\n";
$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";


//$para      = 'aligutman1@gmail.com';
//$titulo    = 'El título';
//$mensaje   = 'Hola';
//$cabeceras = 'From: webmaster@example.com' . "\r\n" .
//    'Reply-To: webmaster@example.com' . "\r\n" .
//    'X-Mailer: PHP/' . phpversion();

//mail($para, $titulo, $mensaje, $headers);

mail($to, $subject, $message, $headers);


            Alert::success('', 'Notificación mensual enviada')->autoclose(3500);
        } else {
            Alert::error('Su clave no coincide', '¡Error!')->autoclose(3500);
        }

        

        return response()->json('hola');

    }
}
