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
            $alerta->save();


            $objDemo = new \stdClass();
            $objDemo->demo_one = $acronimo;
            $objDemo->demo_two = $send_mes;
            $objDemo->sender = $userName;
            $objDemo->receiver = $userName;
     
            //Mail::to("aligutman1@gmail.com")->send(new DemoEmail($objDemo));






$correo = 'sipsei@oplever.org.mx'; //Recupera el correo.
$comentario = 'Hola'; //Recupera el comentario.
//La función "nl2br" sirve para que el texto respete los saltos de línea y los espacios, si lo quitas todo el mensaje se eenvia en una sola línea.  
//Enviar email.
$from = $correo; //Correo del formulario
$to = 'ali.gutierrez@oplever.org.mx'; //Aqui va el correo del buzon de quejas
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
        
        <link rel="stylesheet" type="text/css" src="css/normalize.css">
      <style type="text/css">
        *{
          font-family: Arial, Helvetica, sans-serif;
        }
        body {
          font-size: 14px;
        }
        .row:after {
          content: "";
          display: table;
          clear: both;
        }
        .column {
          float: left;
          width: 50%;
        }
        table{
          width: 100%;
          margin: 0 0 20px 0;
          border-spacing: 0;
        }
        td {
          border: none;
          text-align: center;
          height: 25px;
        }
        td.border {
          border: solid 1px #fff;
        }
        .logo {
          width: 120px;
        }
        .text-center {
          text-align: center;
        }
        .text-justify {
          text-align: justify;
        }
            </style>
            

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #fff;">
    <center style="width: 100%; background-color: #fff;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
        <!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        <tr>
          <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td class="logo" style="text-align: center;">
                        <h1><img class="logo" src="http://sistemas.oplever.org.mx/buzon/images/logoople.png" alt="" width="100" height="100"></h1>
                      </td>
                            </tr>
                            <tr>
                            <td>
                                <div class="text" style="padding: 0 2.5em; text-align: center;">
                                    <h2><b>Organismo Público Local Electoral</b></h2>
                                        <header class="section-header">
                                            <h3>Buzón de Ideas y Sugerencias</h3>
                                            <p><b> Unidad Técnica de Vinculación con ODES y OSC </b></p>
                                        </header>
                                </div>
                            </td>
                        </tr>
            </table>
          </td>
          </tr><!-- end tr -->
          <tr>
              <td class="bg_white">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                  <tr>
                    <td class="bg_light email-section" style="padding: 0; width: 100%;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                      <td valign="middle" width="50%">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td class="text-services" style="text-align: left; padding: 20px 30px;">
                                <div class="heading-section">
                                                <h2 style="font-size: 22px;">Remitente: </h2>
                                                <p>'.$correo.'</p>
                                                </div>
                            </td>
                                                    </tr>
                                                    <tr>
                            <td class="text-services" style="text-align: left; padding: 20px 30px;">
                                <div class="heading-section">
                                                <h2 style="font-size: 22px;">Comentario :</h2>
                                                <p class="text" style="padding: 0 2.5em; text-align: center;">'.$comentario.'</p>
                                                </div>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                        </table>
                    </td>
                  </tr><!-- end: tr -->
                </table>
              </td>
            </tr><!-- end:tr -->
            </table>
          </td>
          </tr><!-- end tr -->
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
        
        <tr>
          <td class="bg_light" style="text-align: center;">
                        <p>Unidad Técnica de Vinculación con ODES y OSC. <br>
                     Calle Benito Juárez No. 69 <br> Xalapa, Ver. 91000 <br> México <br> Teléfono: 01 228 841 94 10 <br>
                Email:odes@oplever.org.mx</p>
          </td>
        </tr>
      </table>

    </div>
    </center>
</body>
</html>
        ';

$headers = "From:" . $from . "\r\n";
$headers .= "Reply-To: " .$from . "\r\n";
//$headers .= 'CC: creducindo@hotmail.com' . " \r\n";
$headers .= 'CC: livan.ibanez@gmail.com' . " \r\n";
$headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

mail($to, $subject, $message, $headers);











            Alert::success('', 'Notificación mensual enviada')->autoclose(3500);
        } else {
            Alert::error('Su clave no coincide', '¡Error!')->autoclose(3500);
        }

        

        return response()->json('hola');

    }
}
