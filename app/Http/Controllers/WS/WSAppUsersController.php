<?php

namespace App\Http\Controllers\WS;

use App\AppUser;
use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use App\Municipio;
use App\Notify;
use App\Pregunta;
use App\Resultado;
use Hash;
use Illuminate\Http\Request;

class WSAppUsersController extends Controller
{
    public function registrarUsuarioApp(Request $request)
    {
        $ExisteEmail = AppUser::where('email', $request->email)->count();

        if ($ExisteEmail > 0) {

            $usuario = AppUser::where('email', $request->email)->first();

            // echo $status->status;exit;

            if ($usuario->status == 1) {
                $data = array('done' => false, 'message' => "El email ya esta registrado",
                    'id'                 => 0,
                    'nombre'             => '',
                    'email'              => $request->email,
                    'edad'               => 0,
                    'sexo'               => '',
                    'municipio'          => '',
                    'estado'             => '',
                    'password'           => '',
                    'score'              => 0,
                    'status'             => 0);
            } else {
                $data = array('done' => false, 'message' => "Status 0",
                    'id'                 => $usuario->id,
                    'nombre'             => $usuario->nombre,
                    'email'              => $usuario->email,
                    'edad'               => $usuario->edad,
                    'sexo'               => $usuario->sexo,
                    'municipio'          => $usuario->municipio,
                    'estado'             => $usuario->estado,
                    'password'           => $usuario->password,
                    'score'              => $usuario->score,
                    'status'             => $usuario->status);
            }

        } else {
            $usuario            = new AppUser();
            $usuario->nombre    = $request->nombre;
            $usuario->email     = $request->email;
            $usuario->edad      = $request->edad;
            $usuario->sexo      = $request->sexo;
            $usuario->municipio = $request->municipio;
            $usuario->estado    = $request->estado;
            $usuario->password  = bcrypt($request->password);
            $usuario->score     = $request->score;
            $usuario->save();

            $data = array('done' => true, 'message' => "Usuario Registrado",
                'id'                 => $usuario->id,
                'nombre'             => $usuario->nombre,
                'email'              => $usuario->email,
                'edad'               => $usuario->edad,
                'sexo'               => $usuario->sexo,
                'municipio'          => $usuario->municipio,
                'estado'             => $usuario->estado,
                'password'           => $usuario->password,
                'score'              => $usuario->score,
                'status'             => $usuario->status);

            $notify            = new Notify();
            $notify->idUser    = $usuario->id;
            $notify->mensaje   = "Nuevo usuario registrado";
            $notify->email     = $usuario->email;
            $notify->nombre    = $usuario->nombre;
            $notify->municipio = $usuario->municipio;
            $notify->estado    = $usuario->estado;
            $notify->save();

            event(new MyEvent($notify));

        }

        return response()->json($data);
    }

    public function loginUserApp(Request $request)
    {
        $password = $request->password;
        $email    = $request->email;
        $user     = AppUser::where('email', $email)->first();

        if (!empty($user)) {

            if ($user->status == 1) {
                if (Hash::check($password, $user->password)) {
                    $data = array('done' => true, 'message' => "Logueado",
                        'id'                 => $user->id,
                        'nombre'             => $user->nombre,
                        'email'              => $user->email,
                        'edad'               => $user->edad,
                        'sexo'               => $user->sexo,
                        'municipio'          => $user->municipio,
                        'estado'             => $user->estado,
                        'password'           => $user->password,
                        'score'              => $user->score,
                        'status'             => $user->status);
                } else {
                    $data = array('done' => false, 'message' => "Contraseña Incorrecta",
                        'id'                 => 0,
                        'nombre'             => '',
                        'email'              => $email,
                        'edad'               => 0,
                        'sexo'               => '',
                        'municipio'          => '',
                        'estado'             => '',
                        'password'           => '',
                        'score'              => 0,
                        'status'             => 0);
                }
            } else {
                $data = array('done' => false, 'message' => "Status 0",
                    'id'                 => $user->id,
                    'nombre'             => $user->nombre,
                    'email'              => $user->email,
                    'edad'               => $user->edad,
                    'sexo'               => $user->sexo,
                    'municipio'          => $user->municipio,
                    'estado'             => $user->estado,
                    'password'           => $user->password,
                    'score'              => $user->score,
                    'status'             => $user->status);
            }

        } else {
            $data = array('done' => false, 'message' => "El email no esta registrado",
                'id'                 => 0,
                'nombre'             => '',
                'email'              => $email,
                'edad'               => 0,
                'sexo'               => '',
                'municipio'          => '',
                'estado'             => '',
                'password'           => '',
                'score'              => 0,
                'status'             => 0);
        }

        return response()->json($data);
    }

    public function allPreguntas()
    {
        $allPreguntas = Pregunta::where('status', 1)->get();
        return response()->json($allPreguntas);
    }

    public function saveResultados(Request $request)
    {
        $id        = $request->id_user_app;
        $resultado = Resultado::where('id_user_app', $id)->first();

        if (empty($resultado)) {
            $new = new Resultado();

            $new->id_user_app = $request->id_user_app;
            $new->aciertos    = $request->aciertos;
            $new->errores     = $request->errores;
            $new->detalle     = $request->detalle;
            $new->save();

            return response()->json($new);

        } else {
            $update = Resultado::where('id_user_app', $id)
                ->update([
                    'aciertos' => $request->aciertos,
                    'errores'  => $request->errores,
                    'detalle'  => $request->detalle]);

            if ($update == 1) {
                $resultado = Resultado::where('id_user_app', $id)->get();

                return response()->json($resultado);
            } else {
                return response()->json($update);
            }
        }

    }

    public function AllMunicipios()
    {
        $AllMunicipios = Municipio::select('numdto', 'nombredto', 'nummpio', 'nombrempio')->get();

        return response()->json($AllMunicipios);
    }

    public function UpdateScoreAppUser(Request $request)
    {
        $id = $request->id;

        $updateScore = AppUser::find($id);

        $updateScore->score = $request->score;
        $updateScore->save();

        return response()->json($updateScore);
    }

    public function notificarErrorPregunta(Request $request)
    {
        $id = $request->id;

        $updateError = Pregunta::find($id);

        $updateError->status_error = 1;
        $updateError->save();

        return response()->json($updateError);
    }

    public function temas()
    {
        $p = Pregunta::select('etiquetas')->get();

        $pruena = [
        ];
        $bandera = true;
        foreach ($p as $value) {
            $temas = explode(",", $value->etiquetas);

            for ($i = 0; $i < count($temas); $i++) {
                // if ($bandera == false) {
                //     return array_search($temas[$i], $pruena);
                // }
                // if ($bandera) {
                //     $id   = count($pruena) + 1;
                //     $name = [
                //         'id' => $id, 'tema' => $temas[$i],
                //     ];
                //     array_push($pruena, $name);
                //     $bandera = false;
                // }

                $temas[$i] = mb_strtoupper($temas[$i]);

                if (!in_array($temas[$i], $pruena)) {
                    //return response()->json($temas[$i]);

                    array_push($pruena, $temas[$i]);

                }

            }
        }
        $pruena2 = [
        ];
        foreach ($pruena as $value) {
            $id   = count($pruena2) + 1;
            $name = [
                'id' => $id, 'tema' => $value,
            ];

            array_push($pruena2, $name);
        }

        return response()->json($pruena2);
    }

    public function cambiarPass(Request $request)
    {
        $email = $request->email;
        $pass  = bcrypt($request->pass);

        $updatePass = AppUser::where('email', $email)->update(['password' => $pass]);

        return response()->json($updatePass);

    }
}
