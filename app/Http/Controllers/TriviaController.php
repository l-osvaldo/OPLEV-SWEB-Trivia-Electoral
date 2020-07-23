<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\Pregunta;
use Auth;
use Illuminate\Http\Request;

class TriviaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {

            $usuario      = auth()->user();
            $nombreModulo = "Gestión de Usuarios";
            $usuariosApp  = AppUser::all();

            $vista = view('trivia.gestionUsuarios', compact('usuario', 'nombreModulo', 'usuariosApp'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function estadisticas()
    {
        if (Auth::check()) {

            $usuario      = auth()->user();
            $nombreModulo = "Estadísticas";

            $vista = view('trivia.estadisticas', compact('usuario', 'nombreModulo'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function gestionPreguntas()
    {
        if (Auth::check()) {

            $usuario      = auth()->user();
            $nombreModulo = "Gestión de Preguntas";
            $preguntas    = Pregunta::all();

            $vista = view('trivia.gestionDePreguntas', compact('usuario', 'nombreModulo', 'preguntas'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function registrarPregunta(Request $resquest)
    {
        $nuevaPregunta = new Pregunta();

        $nuevaPregunta->pregunta  = $resquest->pregunta;
        $nuevaPregunta->opcion_a  = $resquest->opcion_a;
        $nuevaPregunta->opcion_b  = $resquest->opcion_b;
        $nuevaPregunta->opcion_c  = $resquest->opcion_c;
        $nuevaPregunta->opcion_d  = $resquest->opcion_d;
        $nuevaPregunta->respuesta = $resquest->respuesta;
        $nuevaPregunta->save();

        return response()->json($nuevaPregunta);
    }
}
