<?php

namespace App\Http\Controllers\WS;

use App\AppUser;
use App\Http\Controllers\Controller;
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
}
