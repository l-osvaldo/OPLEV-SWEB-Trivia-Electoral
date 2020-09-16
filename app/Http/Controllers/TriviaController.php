<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\Distrito;
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

            $porcentajeMujeres = round($porcentajeMujeres, 2);
            $porcentajeHombres = round($porcentajeHombres, 2);

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

            $estadisticas = array(array('rango' => '18 a 30', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0),
                array('rango' => '31 a 40', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0),
                array('rango' => '41 a 50', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0),
                array('rango' => '51 a 60', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0),
                array('rango' => '61 a 70', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0),
                array('rango' => '71 a 80', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0));

            // print_r($estadisticas[0]['rango']);exit;

            foreach ($usuariosApp as $value) {
                if ($value->sexo === 'M') {
                    $hombres++;

                    if ($value->edad >= 18 && $value->edad <= 30) {
                        $estadisticas[0]['Usuarios']++;
                        $estadisticas[0]['hombres']++;
                    }
                    if ($value->edad >= 31 && $value->edad <= 40) {
                        $estadisticas[1]['Usuarios']++;
                        $estadisticas[1]['hombres']++;
                    }
                    if ($value->edad >= 41 && $value->edad <= 50) {
                        $estadisticas[2]['Usuarios']++;
                        $estadisticas[2]['hombres']++;
                    }
                    if ($value->edad >= 51 && $value->edad <= 60) {
                        $estadisticas[3]['Usuarios']++;
                        $estadisticas[3]['hombres']++;
                    }
                    if ($value->edad >= 61 && $value->edad <= 70) {
                        $estadisticas[4]['Usuarios']++;
                        $estadisticas[4]['hombres']++;
                    }
                    if ($value->edad >= 71 && $value->edad <= 80) {
                        $estadisticas[5]['Usuarios']++;
                        $estadisticas[5]['hombres']++;
                    }

                }
                if ($value->sexo === 'F') {
                    $mujeres++;

                    if ($value->edad >= 18 && $value->edad <= 30) {
                        $estadisticas[0]['Usuarios']++;
                        $estadisticas[0]['mujeres']++;
                    }
                    if ($value->edad >= 31 && $value->edad <= 40) {
                        $estadisticas[1]['Usuarios']++;
                        $estadisticas[1]['mujeres']++;
                    }
                    if ($value->edad >= 41 && $value->edad <= 50) {
                        $estadisticas[2]['Usuarios']++;
                        $estadisticas[2]['mujeres']++;
                    }
                    if ($value->edad >= 51 && $value->edad <= 60) {
                        $estadisticas[3]['Usuarios']++;
                        $estadisticas[3]['mujeres']++;
                    }
                    if ($value->edad >= 61 && $value->edad <= 70) {
                        $estadisticas[4]['Usuarios']++;
                        $estadisticas[4]['mujeres']++;
                    }
                    if ($value->edad >= 71 && $value->edad <= 80) {
                        $estadisticas[5]['Usuarios']++;
                        $estadisticas[5]['mujeres']++;
                    }
                }

            }

            for ($i = 0; $i < count($estadisticas); $i++) {
                $estadisticas[$i]['porcentaje'] = $estadisticas[$i]['Usuarios'] * 100 / $numeroUsuarios;
                $estadisticas[$i]['porcentaje'] = round($estadisticas[$i]['porcentaje'], 2);
            }

            if ($mujeres > 0) {
                $porcentajeMujeres = $mujeres * 100 / $numeroUsuarios;
            }
            if ($hombres > 0) {
                $porcentajeHombres = $hombres * 100 / $numeroUsuarios;
            }

            $porcentajeMujeres = round($porcentajeMujeres, 2);
            $porcentajeHombres = round($porcentajeHombres, 2);

            $vista = view('trivia.usuariosDeLaApp', compact('usuario', 'nombreModulo', 'numeroUsuarios', 'mujeres', 'hombres', 'porcentajeMujeres', 'porcentajeHombres', 'estadisticas'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function distritos()
    {
        if (Auth::check()) {

            $usuario        = auth()->user();
            $nombreModulo   = "Estadísticas - Distritos";
            $usuariosApp    = AppUser::all();
            $numeroUsuarios = count($usuariosApp);
            $distritos      = Distrito::all();

            $hombres = 0;
            $mujeres = 0;

            $porcentajeMujeres = 0;
            $porcentajeHombres = 0;

            foreach ($distritos as $distrito) {
                array_add($distrito, 'totalUsuarios', 0);
                array_add($distrito, 'mujeres', 0);
                array_add($distrito, 'porcentajeMujeres', 0);
                array_add($distrito, 'hombres', 0);
                array_add($distrito, 'porcentajeHombres', 0);
            }

            foreach ($usuariosApp as $value) {
                $distritoUsuario = Municipio::where('nombrempio', $value->municipio)->first();
                foreach ($distritos as $distrito) {

                    if ($distrito->numdto == $distritoUsuario->numdto) {

                        $distrito->totalUsuarios++;

                        if ($value->sexo === 'M') {
                            $hombres++;
                            $distrito->hombres++;

                        }
                        if ($value->sexo === 'F') {
                            $mujeres++;
                            $distrito->mujeres++;
                        }
                        break;
                    }
                }

            }

            foreach ($distritos as $distrito) {
                if ($distrito->totalUsuarios != 0) {
                    $distrito->porcentajeMujeres = $distrito->mujeres * 100 / $distrito->totalUsuarios;
                    $distrito->porcentajeHombres = $distrito->hombres * 100 / $distrito->totalUsuarios;

                    $distrito->porcentajeMujeres = round($distrito->porcentajeMujeres, 2);
                    $distrito->porcentajeHombres = round($distrito->porcentajeHombres, 2);
                }
            }

            if ($mujeres > 0) {
                $porcentajeMujeres = $mujeres * 100 / $numeroUsuarios;
            }
            if ($hombres > 0) {
                $porcentajeHombres = $hombres * 100 / $numeroUsuarios;
            }

            $porcentajeMujeres = round($porcentajeMujeres, 2);
            $porcentajeHombres = round($porcentajeHombres, 2);

            $vista = view('trivia.distritos', compact('usuario', 'nombreModulo', 'numeroUsuarios', 'mujeres', 'hombres', 'porcentajeHombres', 'porcentajeMujeres', 'distritos'));

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

    public function HabilitarDeshabilitarUsuario(Request $resquest)
    {
        $id     = encrypt_decrypt('decrypt', $resquest->id);
        $status = $resquest->status;

        $status === '1' ? $newstatus = 0 : $newstatus = 1;

        $updateUsuarioAPP = AppUser::find($id);

        $updateUsuarioAPP->status = $newstatus;
        $updateUsuarioAPP->save();

        return response()->json($updateUsuarioAPP);
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

    public function graficaUsuariosApp()
    {
        $usuariosApp    = AppUser::all();
        $numeroUsuarios = count($usuariosApp);

        $estadisticas = array(array('rango' => '18 a 30', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '31 a 40', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '41 a 50', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '51 a 60', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '61 a 70', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '71 a 80', 'Usuarios' => 0, 'porcentaje' => 0));

        // print_r($estadisticas[0]['rango']);exit;

        foreach ($usuariosApp as $value) {

            if ($value->edad >= 18 && $value->edad <= 30) {
                $estadisticas[0]['Usuarios']++;
            }
            if ($value->edad >= 31 && $value->edad <= 40) {
                $estadisticas[1]['Usuarios']++;
            }
            if ($value->edad >= 41 && $value->edad <= 50) {
                $estadisticas[2]['Usuarios']++;
            }
            if ($value->edad >= 51 && $value->edad <= 60) {
                $estadisticas[3]['Usuarios']++;
            }
            if ($value->edad >= 61 && $value->edad <= 70) {
                $estadisticas[4]['Usuarios']++;
            }
            if ($value->edad >= 71 && $value->edad <= 80) {
                $estadisticas[5]['Usuarios']++;
            }

        }

        for ($i = 0; $i < count($estadisticas); $i++) {
            $estadisticas[$i]['porcentaje'] = $estadisticas[$i]['Usuarios'] * 100 / $numeroUsuarios;
            $estadisticas[$i]['porcentaje'] = round($estadisticas[$i]['porcentaje'], 2);
        }

        return response()->json($estadisticas);
    }

    public function graficaDistritos()
    {
        $usuariosApp    = AppUser::all();
        $numeroUsuarios = count($usuariosApp);
        $distritos      = Distrito::all();

        foreach ($distritos as $distrito) {
            array_add($distrito, 'totalUsuarios', 0);
            array_add($distrito, 'porcentaje', 0);
        }

        foreach ($usuariosApp as $value) {
            $distritoUsuario = Municipio::where('nombrempio', $value->municipio)->first();
            foreach ($distritos as $distrito) {

                if ($distrito->numdto == $distritoUsuario->numdto) {

                    $distrito->totalUsuarios++;
                    break;
                }
            }
        }

        foreach ($distritos as $distrito) {
            if ($distrito->totalUsuarios != 0) {
                $distrito->porcentaje = $distrito->totalUsuarios * 100 / $numeroUsuarios;
                $distrito->porcentaje = round($distrito->porcentaje, 2);
            }
        }
        return response()->json($distritos);
    }
}
