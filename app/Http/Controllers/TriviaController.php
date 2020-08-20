<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\Municipio;
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

            $usuario        = auth()->user();
            $nombreModulo   = "Gestión de Usuarios";
            $usuariosApp    = AppUser::all();
            $municipios     = Municipio::distinct()->orderBy('nombrempio', 'asc')->get(['nombrempio']);
            $numeroUsuarios = count($usuariosApp);

            $hombres = 0;
            $mujeres = 0;

            $promedioMujeres = 0;
            $promedioHombres = 0;

            $porcentajeMujeres = 0;
            $porcentajeHombres = 0;

            foreach ($usuariosApp as $value) {
                if ($value->sexo === 'M') {
                    $hombres++;
                    $promedioHombres += $value->edad;
                }
                if ($value->sexo === 'F') {
                    $mujeres++;
                    $promedioMujeres += $value->edad;
                }
            }

            if ($mujeres > 0) {
                $promedioMujeres   = $promedioMujeres / $mujeres;
                $porcentajeMujeres = $mujeres * 100 / $numeroUsuarios;
            }
            if ($hombres > 0) {
                $promedioHombres   = $promedioHombres / $hombres;
                $porcentajeHombres = $hombres * 100 / $numeroUsuarios;
            }

            $porcentajeMujeres = bcdiv($porcentajeMujeres, '1', 2);
            $porcentajeHombres = bcdiv($porcentajeHombres, '1', 2);

            $vista = view('trivia.gestionUsuarios', compact('usuario', 'nombreModulo', 'usuariosApp', 'numeroUsuarios', 'mujeres', 'hombres', 'promedioMujeres', 'promedioHombres', 'porcentajeMujeres', 'porcentajeHombres', 'municipios'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function usuariosAPP()
    {
        if (Auth::check()) {

            $usuario        = auth()->user();
            $nombreModulo   = "Estadísticas - Usuarios de la APP";
            $usuariosApp    = AppUser::all();
            $numeroUsuarios = count($usuariosApp);

            $hombres = 0;
            $mujeres = 0;

            $porcentajeMujeres = 0;
            $porcentajeHombres = 0;

            foreach ($usuariosApp as $value) {
                if ($value->sexo === 'M') {
                    $hombres++;
                }
                if ($value->sexo === 'F') {
                    $mujeres++;
                }

            }

            if ($mujeres > 0) {
                $porcentajeMujeres = $mujeres * 100 / $numeroUsuarios;
            }
            if ($hombres > 0) {
                $porcentajeHombres = $hombres * 100 / $numeroUsuarios;
            }

            $porcentajeMujeres = bcdiv($porcentajeMujeres, '1', 2);
            $porcentajeHombres = bcdiv($porcentajeHombres, '1', 2);

            $vista = view('trivia.usuariosDelaAPP', compact('usuario', 'nombreModulo', 'numeroUsuarios', 'mujeres', 'hombres', 'porcentajeMujeres', 'porcentajeHombres'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function distritos()
    {
        if (Auth::check()) {

            $usuario      = auth()->user();
            $nombreModulo = "Estadísticas - Distritos";

            $vista = view('trivia.distritos', compact('usuario', 'nombreModulo'));

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

    public function editarPregunta(Request $resquest)
    {
        $id = encrypt_decrypt('decrypt', $resquest->id);

        $updatePregunta            = Pregunta::find($id);
        $updatePregunta->pregunta  = $resquest->pregunta;
        $updatePregunta->opcion_a  = $resquest->opcion_a;
        $updatePregunta->opcion_b  = $resquest->opcion_b;
        $updatePregunta->opcion_c  = $resquest->opcion_c;
        $updatePregunta->opcion_d  = $resquest->opcion_d;
        $updatePregunta->respuesta = $resquest->respuesta;
        $updatePregunta->save();

        return response()->json($updatePregunta);
    }

    public function eliminarPregunta(Request $resquest)
    {
        $id = encrypt_decrypt('decrypt', $resquest->id);

        $deletePregunta = Pregunta::destroy($id);

        return response()->json(['success']);
    }

    public function HabilitarDeshabilitarPregunta(Request $resquest)
    {
        $id     = encrypt_decrypt('decrypt', $resquest->id);
        $status = $resquest->status;

        $status === '1' ? $newstatus = 0 : $newstatus = 1;

        $updatePregunta = Pregunta::find($id);

        $updatePregunta->status = $newstatus;
        $updatePregunta->save();

        return response()->json($updatePregunta);
    }

    public function EditarInformacionUsuarioAPP(Request $resquest)
    {
        $id = encrypt_decrypt('decrypt', $resquest->id);

        $updateUsuarioAPP = AppUser::find($id);

        $updateUsuarioAPP->nombre    = $resquest->nombre;
        $updateUsuarioAPP->edad      = $resquest->edad;
        $updateUsuarioAPP->sexo      = $resquest->genero;
        $updateUsuarioAPP->municipio = $resquest->municipio;
        $updateUsuarioAPP->save();

        return response()->json($updateUsuarioAPP);
    }

    public function eliminarUsuarioApp(Request $resquest)
    {
        $id = encrypt_decrypt('decrypt', $resquest->id);

        $deleteUsuarioApp = AppUser::destroy($id);

        return response()->json(['success']);
    }
}
