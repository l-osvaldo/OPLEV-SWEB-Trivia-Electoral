<?php

namespace App\Http\Controllers\WS;

use App\AppUser;
use App\Http\Controllers\Controller;
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

            $data = array('done' => false, 'message' => "El email ya esta registrado", 'id' => 0);

        } else {
            $usuario            = new AppUser();
            $usuario->nombre    = $request->nombre;
            $usuario->email     = $request->email;
            $usuario->edad      = $request->edad;
            $usuario->sexo      = $request->sexo;
            $usuario->municipio = $request->municipio;
            $usuario->password  = bcrypt($request->password);
            $usuario->save();

            $data = array('done' => true, 'message' => "Usuario Registrado", 'id' => $usuario->id);
        }

        return response()->json($data);
    }

    public function loginUserApp(Request $request)
    {
        $password = $request->password;
        $email    = $request->email;
        $user     = AppUser::where('email', $email)->first();

        if (!empty($user)) {

            if (Hash::check($password, $user->password)) {
                $data = array('done' => true, 'message' => "Logueado", 'id' => $user->id);
            } else {
                $data = array('done' => false, 'message' => "Contraseña Incorrecta", 'id' => 0);
            }
        } else {
            $data = array('done' => false, 'message' => "El email no esta registrado", 'id' => 0);
        }

        return response()->json($data);
    }

    public function allPreguntas()
    {
        $allPreguntas = Pregunta::select('id', 'pregunta', 'opcion_a', 'opcion_b', 'opcion_c', 'opcion_d', 'respuesta')->get();
        return response()->json($allPreguntas);
    }

    public function pruebaPregunta()
    {
        $allPreguntas = Pregunta::select('id', 'pregunta', 'opcion_a', 'opcion_b', 'opcion_c', 'opcion_d', 'respuesta')->first();
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

            return response()->json($update);

        }

    }
}
