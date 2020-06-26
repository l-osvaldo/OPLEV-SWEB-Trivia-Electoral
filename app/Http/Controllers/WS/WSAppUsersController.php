<?php

namespace App\Http\Controllers\WS;

use App\AppUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WSAppUsersController extends Controller
{
    public function registrarUsuarioApp(Request $request)
    {
        $usuario            = new AppUser();
        $usuario->nombre    = $request->nombre;
        $usuario->email     = $request->email;
        $usuario->edad      = $request->edad;
        $usuario->sexo      = $request->sexo;
        $usuario->municipio = $request->municipio;
        $usuario->password  = $request->password;
        $usuario->save();

        return response()->json($usuario);
    }
}
