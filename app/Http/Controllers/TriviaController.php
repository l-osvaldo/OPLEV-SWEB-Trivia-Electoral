<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\Distrito;
use App\Estado;
use App\Municipio;
use App\Notify;
use App\Pregunta;
use Auth;
use Illuminate\Http\Request;
use PDFS;

class TriviaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {

            $usuario             = auth()->user();
            $nombreModulo        = "Gestión de usuarios de la aplicación móvil";
            $notificaciones      = Notify::orderBy('id', 'DESC')->paginate(10);
            $countNotificaciones = Notify::where('status', 1)->count();

            /* Veracruz */

            $usuariosApp    = AppUser::where('estado', 'VERACRUZ')->get();
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

            /* Otras Entidades Federativas */

            $usuariosAppOEF    = AppUser::where('estado', '!=', 'VERACRUZ')->get();
            $numeroUsuariosOEF = count($usuariosAppOEF);
            $estados           = Estado::all();

            $hombresOEF = 0;
            $mujeresOEF = 0;

            $promedioMujeresOEF = 0;
            $promedioHombresOEF = 0;

            $porcentajeMujeresOEF = 0;
            $porcentajeHombresOEF = 0;

            foreach ($usuariosAppOEF as $value) {
                if ($value->sexo === 'M') {
                    $hombresOEF++;
                    $promedioHombresOEF += $value->edad;
                }
                if ($value->sexo === 'F') {
                    $mujeresOEF++;
                    $promedioMujeresOEF += $value->edad;
                }
            }

            if ($mujeresOEF > 0) {
                $promedioMujeresOEF   = $promedioMujeresOEF / $mujeresOEF;
                $porcentajeMujeresOEF = $mujeresOEF * 100 / $numeroUsuariosOEF;
            }
            if ($hombresOEF > 0) {
                $promedioHombresOEF   = $promedioHombresOEF / $hombresOEF;
                $porcentajeHombresOEF = $hombresOEF * 100 / $numeroUsuariosOEF;
            }

            $porcentajeMujeresOEF = round($porcentajeMujeresOEF, 2);
            $porcentajeHombresOEF = round($porcentajeHombresOEF, 2);

            $vista = view('trivia.gestionUsuarios', compact('usuario', 'nombreModulo', 'usuariosApp', 'numeroUsuarios', 'mujeres', 'hombres', 'promedioMujeres', 'promedioHombres', 'porcentajeMujeres', 'porcentajeHombres', 'municipios', 'usuariosAppOEF', 'numeroUsuariosOEF', 'mujeresOEF', 'hombresOEF', 'promedioMujeresOEF', 'promedioHombresOEF', 'porcentajeMujeresOEF', 'porcentajeHombresOEF', 'estados', 'notificaciones', 'countNotificaciones'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function notificaciones()
    {
        if (Auth::check()) {

            $usuario             = auth()->user();
            $nombreModulo        = "Notificaciones";
            $notificaciones      = Notify::orderBy('id', 'DESC')->paginate(10);
            $countNotificaciones = Notify::where('status', 1)->count();
            $allNotificaciones   = Notify::orderBy('id', 'DESC')->get();
            $numeroUsuarios      = AppUser::count();

            $vista = view('trivia.notificaciones', compact('usuario', 'nombreModulo', 'notificaciones', 'countNotificaciones', 'allNotificaciones', 'numeroUsuarios'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function usuariosAPP()
    {
        if (Auth::check()) {

            $usuario             = auth()->user();
            $nombreModulo        = "Estadísticas de los usuarios de la aplicación móvil";
            $notificaciones      = Notify::orderBy('id', 'DESC')->paginate(10);
            $countNotificaciones = Notify::where('status', 1)->count();

            /* Veracruz  */

            $usuariosApp    = AppUser::where('estado', 'VERACRUZ')->get();
            $numeroUsuarios = count($usuariosApp);

            $hombres = 0;
            $mujeres = 0;

            $porcentajeMujeres = 0;
            $porcentajeHombres = 0;

            $validarPorcentaje = 0;

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
                if ($estadisticas[$i]['Usuarios'] > 0){
			$estadisticas[$i]['porcentaje'] = $estadisticas[$i]['Usuarios'] * 100 / $numeroUsuarios;
		}
                if ($estadisticas[$i]['porcentaje'] > 0) {
                    $estadisticas[$i]['porcentaje'] = round($estadisticas[$i]['porcentaje'], 2);
                }

                $validarPorcentaje += $estadisticas[$i]['porcentaje'];
            }

            if ($validarPorcentaje > 100) {
                $decimalesRestantes = $validarPorcentaje - 100;
                $decimalesRestantes = round($decimalesRestantes, 2);
                for ($i = (count($estadisticas) - 1); $i >= 0; $i--) {
                    if (is_float($estadisticas[$i]['porcentaje'])) {
                        $estadisticas[$i]['porcentaje'] -= $decimalesRestantes;
                        break;
                    }
                }
            }

            if ($mujeres > 0) {
                $porcentajeMujeres = $mujeres * 100 / $numeroUsuarios;
            }
            if ($hombres > 0) {
                $porcentajeHombres = $hombres * 100 / $numeroUsuarios;
            }

            $porcentajeMujeres = round($porcentajeMujeres, 3);
            $porcentajeHombres = round($porcentajeHombres, 3);

            /* Otras Entidades Federativas */

            $usuariosAppOEF    = AppUser::where('estado', '!=', 'VERACRUZ')->get();
            $numeroUsuariosOEF = count($usuariosAppOEF);

            $hombresOEF = 0;
            $mujeresOEF = 0;

            $porcentajeMujeresOEF = 0;
            $porcentajeHombresOEF = 0;

            $validarPorcentajeOEF = 0;

            $estadisticasOEF = array(array('rango' => '18 a 30', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0),
                array('rango' => '31 a 40', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0),
                array('rango' => '41 a 50', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0),
                array('rango' => '51 a 60', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0),
                array('rango' => '61 a 70', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0),
                array('rango' => '71 a 80', 'Usuarios' => 0, 'porcentaje' => 0, 'mujeres' => 0, 'hombres' => 0));

            // print_r($estadisticas[0]['rango']);exit;

            foreach ($usuariosAppOEF as $value) {
                if ($value->sexo === 'M') {
                    $hombresOEF++;

                    if ($value->edad >= 18 && $value->edad <= 30) {
                        $estadisticasOEF[0]['Usuarios']++;
                        $estadisticasOEF[0]['hombres']++;
                    }
                    if ($value->edad >= 31 && $value->edad <= 40) {
                        $estadisticasOEF[1]['Usuarios']++;
                        $estadisticasOEF[1]['hombres']++;
                    }
                    if ($value->edad >= 41 && $value->edad <= 50) {
                        $estadisticasOEF[2]['Usuarios']++;
                        $estadisticasOEF[2]['hombres']++;
                    }
                    if ($value->edad >= 51 && $value->edad <= 60) {
                        $estadisticasOEF[3]['Usuarios']++;
                        $estadisticasOEF[3]['hombres']++;
                    }
                    if ($value->edad >= 61 && $value->edad <= 70) {
                        $estadisticasOEF[4]['Usuarios']++;
                        $estadisticasOEF[4]['hombres']++;
                    }
                    if ($value->edad >= 71 && $value->edad <= 80) {
                        $estadisticasOEF[5]['Usuarios']++;
                        $estadisticasOEF[5]['hombres']++;
                    }

                }
                if ($value->sexo === 'F') {
                    $mujeresOEF++;

                    if ($value->edad >= 18 && $value->edad <= 30) {
                        $estadisticas[0]['Usuarios']++;
                        $estadisticas[0]['mujeres']++;
                    }
                    if ($value->edad >= 31 && $value->edad <= 40) {
                        $estadisticasOEF[1]['Usuarios']++;
                        $estadisticasOEF[1]['mujeres']++;
                    }
                    if ($value->edad >= 41 && $value->edad <= 50) {
                        $estadisticasOEF[2]['Usuarios']++;
                        $estadisticasOEF[2]['mujeres']++;
                    }
                    if ($value->edad >= 51 && $value->edad <= 60) {
                        $estadisticasOEF[3]['Usuarios']++;
                        $estadisticasOEF[3]['mujeres']++;
                    }
                    if ($value->edad >= 61 && $value->edad <= 70) {
                        $estadisticasOEF[4]['Usuarios']++;
                        $estadisticasOEF[4]['mujeres']++;
                    }
                    if ($value->edad >= 71 && $value->edad <= 80) {
                        $estadisticasOEF[5]['Usuarios']++;
                        $estadisticasOEF[5]['mujeres']++;
                    }
                }

            }

            for ($i = 0; $i < count($estadisticasOEF); $i++) {
		if ($estadisticasOEF[$i]['Usuarios'] > 0){
                	$estadisticasOEF[$i]['porcentaje'] = $estadisticasOEF[$i]['Usuarios'] * 100 / $numeroUsuariosOEF;
		}
                if ($estadisticasOEF[$i]['porcentaje'] > 0) {
                    $estadisticasOEF[$i]['porcentaje'] = round($estadisticasOEF[$i]['porcentaje'], 2);
                }

                $validarPorcentajeOEF += $estadisticasOEF[$i]['porcentaje'];
            }

            if ($validarPorcentajeOEF > 100) {
                $decimalesRestantesOEF = $validarPorcentajeOEF - 100;
                $decimalesRestantesOEF = round($decimalesRestantesOEF, 2);
                for ($i = (count($estadisticasOEF) - 1); $i >= 0; $i--) {
                    if (is_float($estadisticasOEF[$i]['porcentaje'])) {
                        $estadisticasOEF[$i]['porcentaje'] -= $decimalesRestantesOEF;
                        break;
                    }
                }
            }

            if ($mujeresOEF > 0) {
                $porcentajeMujeresOEF = $mujeresOEF * 100 / $numeroUsuariosOEF;
            }
            if ($hombresOEF > 0) {
                $porcentajeHombresOEF = $hombresOEF * 100 / $numeroUsuariosOEF;
            }

            $porcentajeMujeresOEF = round($porcentajeMujeresOEF, 3);
            $porcentajeHombresOEF = round($porcentajeHombresOEF, 3);

            $vista = view('trivia.usuariosDeLaApp', compact('usuario', 'nombreModulo', 'numeroUsuarios', 'mujeres', 'hombres', 'porcentajeMujeres', 'porcentajeHombres', 'estadisticas', 'numeroUsuariosOEF', 'mujeresOEF', 'hombresOEF', 'porcentajeMujeresOEF', 'porcentajeHombresOEF', 'estadisticasOEF', 'notificaciones', 'countNotificaciones'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function distritos()
    {
        if (Auth::check()) {

            $usuario             = auth()->user();
            $nombreModulo        = "Estadísticas de los distritos electorales de la aplicación móvil";
            $usuariosApp         = AppUser::where('estado', 'VERACRUZ')->get();
            $numeroUsuarios      = count($usuariosApp);
            $distritos           = Distrito::whereNotIn('numdto', [11, 15, 30])->get();
            $notificaciones      = Notify::orderBy('id', 'DESC')->paginate(10);
            $countNotificaciones = Notify::where('status', 1)->count();

            $hombres = 0;
            $mujeres = 0;

            $porcentajeMujeres = 0;
            $porcentajeHombres = 0;

            $validarPorcentajeTotal   = 0;
            $validarPorcentajeMujeres = 0;
            $validarPorcentajeHombres = 0;

            foreach ($distritos as $distrito) {
                array_add($distrito, 'totalUsuarios', 0);
                array_add($distrito, 'porcentajeDistrital', 0);
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
                    $distrito->porcentajeDistrital = $distrito->totalUsuarios * 100 / $numeroUsuarios;
                    $distrito->porcentajeMujeres   = $distrito->mujeres * $distrito->porcentajeDistrital / $distrito->totalUsuarios;
                    $distrito->porcentajeHombres   = $distrito->hombres * $distrito->porcentajeDistrital / $distrito->totalUsuarios;

                    if ($distrito->porcentajeMujeres > 0) {
                        $distrito->porcentajeMujeres = round($distrito->porcentajeMujeres, 2);
                    }
                    if ($distrito->porcentajeHombres > 0) {
                        $distrito->porcentajeHombres = round($distrito->porcentajeHombres, 2);
                    }
                    if ($distrito->porcentajeDistrital > 0) {
                        $distrito->porcentajeDistrital = round($distrito->porcentajeDistrital, 2);
                    }

                    $validarPorcentajeTotal += $distrito->porcentajeDistrital;
                    $validarPorcentajeMujeres += $distrito->porcentajeMujeres;
                    $validarPorcentajeHombres += $distrito->porcentajeHombres;
                }
            }

            if ($validarPorcentajeTotal > 100) {
                $decimalesRestantes = $validarPorcentajeTotal - 100;
                $decimalesRestantes = round($decimalesRestantes, 2);

                for ($i = (count($distritos) - 1); $i >= 0; $i--) {
                    if (is_float($distritos[$i]->porcentajeDistrital)) {
                        $distritos[$i]->porcentajeDistrital -= $decimalesRestantes;
                        break;
                    }
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

            $vista = view('trivia.distritos', compact('usuario', 'nombreModulo', 'numeroUsuarios', 'mujeres', 'hombres', 'porcentajeHombres', 'porcentajeMujeres', 'distritos', 'notificaciones', 'countNotificaciones'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function municipios()
    {
        if (Auth::check()) {

            $usuario             = auth()->user();
            $nombreModulo        = "Estadísticas de los municipios de la aplicación móvil";
            $usuariosApp         = AppUser::where('estado', 'VERACRUZ')->get();
            $numeroUsuarios      = count($usuariosApp);
            $distritos           = Distrito::whereNotIn('numdto', [11, 15, 30])->get();
            $notificaciones      = Notify::orderBy('id', 'DESC')->paginate(10);
            $countNotificaciones = Notify::where('status', 1)->count();

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

            $porcentajeMujeres = round($porcentajeMujeres, 2);
            $porcentajeHombres = round($porcentajeHombres, 2);

            $vista = view('trivia.estadisticaPorMunicipios', compact('usuario', 'nombreModulo', 'numeroUsuarios', 'mujeres', 'hombres', 'porcentajeHombres', 'porcentajeMujeres', 'distritos', 'notificaciones', 'countNotificaciones'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;

    }

    public function municipiosPorDistrito(Request $request)
    {
        $municipios = Municipio::where('numdto', $request->numeroDistrito)->orderBy('nombrempio', 'ASC')->get();

        foreach ($municipios as $municipio) {
            array_add($municipio, 'totalUsuarios', 0);
            array_add($municipio, 'porcentajeMunicipal', 0);
            array_add($municipio, 'mujeres', 0);
            array_add($municipio, 'porcentajeMujeres', 0);
            array_add($municipio, 'hombres', 0);
            array_add($municipio, 'porcentajeHombres', 0);
        }

        $totalUsuariosPorMunicipio = 0;

        $validarPorcentajeTotal   = 0;
        $validarPorcentajeMujeres = 0;
        $validarPorcentajeHombres = 0;

        foreach ($municipios as $municipio) {
            $usuariosApp = AppUser::where('municipio', $municipio->nombrempio)->get();

            foreach ($usuariosApp as $usuarioApp) {
                $municipio->totalUsuarios++;
                $totalUsuariosPorMunicipio++;
                if ($usuarioApp->sexo === 'M') {
                    $municipio->hombres++;
                }
                if ($usuarioApp->sexo === 'F') {
                    $municipio->mujeres++;
                }
            }
        }

        foreach ($municipios as $municipio) {
            if ($municipio->totalUsuarios != 0) {
                $municipio->porcentajeMunicipal = $municipio->totalUsuarios * 100 / $totalUsuariosPorMunicipio;
                $municipio->porcentajeMujeres   = $municipio->mujeres * $municipio->porcentajeMunicipal / $municipio->totalUsuarios;
                $municipio->porcentajeHombres   = $municipio->hombres * $municipio->porcentajeMunicipal / $municipio->totalUsuarios;

                if ($municipio->porcentajeMujeres > 0) {
                    $municipio->porcentajeMujeres = round($municipio->porcentajeMujeres, 2);
                }
                if ($municipio->porcentajeHombres > 0) {
                    $municipio->porcentajeHombres = round($municipio->porcentajeHombres, 2);
                }
                if ($municipio->porcentajeMunicipal > 0) {
                    $municipio->porcentajeMunicipal = round($municipio->porcentajeMunicipal, 2);
                }

                $validarPorcentajeTotal += $municipio->porcentajeMunicipal;
                $validarPorcentajeMujeres += $municipio->porcentajeMujeres;
                $validarPorcentajeHombres += $municipio->porcentajeHombres;
            }
        }

        if ($validarPorcentajeTotal > 100) {
            $decimalesRestantes = $validarPorcentajeTotal - 100;
            $decimalesRestantes = round($decimalesRestantes, 2);

            for ($i = (count($municipios) - 1); $i >= 0; $i--) {
                if (is_float($municipios[$i]->porcentajeMunicipal)) {
                    $municipios[$i]->porcentajeMunicipal -= $decimalesRestantes;
                    break;
                }
            }
        }

        return response()->json($municipios);
    }

    public function estados()
    {
        if (Auth::check()) {

            $usuario             = auth()->user();
            $nombreModulo        = "Estadísticas de las entidades federativas de la aplicación móvil";
            $usuariosApp         = AppUser::where('estado', '!=', 'VERACRUZ')->get();
            $numeroUsuarios      = count($usuariosApp);
            $estados             = Estado::all();
            $notificaciones      = Notify::orderBy('id', 'DESC')->paginate(10);
            $countNotificaciones = Notify::where('status', 1)->count();

            $hombres = 0;
            $mujeres = 0;

            $porcentajeMujeres = 0;
            $porcentajeHombres = 0;

            $validarPorcentajeTotal   = 0;
            $validarPorcentajeMujeres = 0;
            $validarPorcentajeHombres = 0;

            foreach ($estados as $estado) {
                array_add($estado, 'totalUsuarios', 0);
                array_add($estado, 'porcentajeEstatal', 0);
                array_add($estado, 'mujeres', 0);
                array_add($estado, 'porcentajeMujeres', 0);
                array_add($estado, 'hombres', 0);
                array_add($estado, 'porcentajeHombres', 0);
            }

            foreach ($usuariosApp as $value) {

                foreach ($estados as $estado) {

                    if ($estado->nombre == $value->estado) {

                        $estado->totalUsuarios++;

                        if ($value->sexo === 'M') {
                            $hombres++;
                            $estado->hombres++;

                        }
                        if ($value->sexo === 'F') {
                            $mujeres++;
                            $estado->mujeres++;
                        }
                        break;
                    }
                }
            }

            foreach ($estados as $estado) {
                if ($estado->totalUsuarios != 0) {
                    $estado->porcentajeEstatal = $estado->totalUsuarios * 100 / $numeroUsuarios;
                    $estado->porcentajeMujeres = $estado->mujeres * $estado->porcentajeEstatal / $estado->totalUsuarios;
                    $estado->porcentajeHombres = $estado->hombres * $estado->porcentajeEstatal / $estado->totalUsuarios;

                    if ($estado->porcentajeMujeres > 0) {
                        $estado->porcentajeMujeres = round($estado->porcentajeMujeres, 2);
                    }
                    if ($estado->porcentajeHombres > 0) {
                        $estado->porcentajeHombres = round($estado->porcentajeHombres, 2);
                    }
                    if ($estado->porcentajeEstatal > 0) {
                        $estado->porcentajeEstatal = round($estado->porcentajeEstatal, 2);
                    }

                    $validarPorcentajeTotal += $estado->porcentajeEstatal;
                    $validarPorcentajeMujeres += $estado->porcentajeMujeres;
                    $validarPorcentajeHombres += $estado->porcentajeHombres;
                }
            }

            if ($validarPorcentajeTotal > 100) {
                $decimalesRestantes = $validarPorcentajeTotal - 100;
                $decimalesRestantes = round($decimalesRestantes, 2);

                for ($i = (count($estados) - 1); $i >= 0; $i--) {
                    if (is_float($estados[$i]->porcentajeEstatal)) {
                        $estados[$i]->porcentajeEstatal -= $decimalesRestantes;
                        break;
                    }
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

            $vista = view('trivia.estadisticaPorEstados', compact('usuario', 'nombreModulo', 'numeroUsuarios', 'hombres', 'mujeres', 'porcentajeHombres', 'porcentajeMujeres', 'estados', 'notificaciones', 'countNotificaciones'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function gestionPreguntas()
    {
        if (Auth::check()) {

            $usuario             = auth()->user();
            $nombreModulo        = "Gestión de preguntas de la aplicación móvil";
            $preguntas           = Pregunta::all();
            $notificaciones      = Notify::orderBy('id', 'DESC')->paginate(10);
            $countNotificaciones = Notify::where('status', 1)->count();

            $actualizar_banco = Pregunta::where('actualizar_banco',1)->count();

            $vista = view('trivia.gestionDePreguntas', compact('usuario', 'nombreModulo', 'preguntas', 'notificaciones', 'countNotificaciones','actualizar_banco'));

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
        $updatePregunta->complemento_error  = $resquest->complemento;
        $updatePregunta->respuesta = $resquest->respuesta;
        $updatePregunta->actualizar_banco = 1;

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

    public function EditarInformacionUsuarioAPPOEF(Request $resquest)
    {
        $id = encrypt_decrypt('decrypt', $resquest->id);

        $updateUsuarioAPP = AppUser::find($id);

        $updateUsuarioAPP->nombre = $resquest->nombre;
        $updateUsuarioAPP->edad   = $resquest->edad;
        $updateUsuarioAPP->sexo   = $resquest->genero;
        $updateUsuarioAPP->estado = $resquest->estado;
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
        $usuariosApp    = AppUser::where('estado', 'VERACRUZ')->get();
        $numeroUsuarios = count($usuariosApp);

        $estadisticas = array(array('rango' => '18 a 30', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '31 a 40', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '41 a 50', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '51 a 60', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '61 a 70', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '71 a 80', 'Usuarios' => 0, 'porcentaje' => 0));

        // print_r($estadisticas[0]['rango']);exit;

        $validarPorcentaje = 0;

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
            if ($estadisticas[$i]['Usuarios'] > 0){
	    	$estadisticas[$i]['porcentaje'] = $estadisticas[$i]['Usuarios'] * 100 / $numeroUsuarios;
	    }
            if ($estadisticas[$i]['porcentaje'] > 0) {
                $estadisticas[$i]['porcentaje'] = round($estadisticas[$i]['porcentaje'], 2);
            }

            $validarPorcentaje += $estadisticas[$i]['porcentaje'];
        }

        if ($validarPorcentaje > 100) {
            $decimalesRestantes = $validarPorcentaje - 100;
            $decimalesRestantes = round($decimalesRestantes, 2);
            for ($i = (count($estadisticas) - 1); $i >= 0; $i--) {
                if (is_float($estadisticas[$i]['porcentaje'])) {
                    $estadisticas[$i]['porcentaje'] -= $decimalesRestantes;
                    break;
                }
            }
        }

        return response()->json($estadisticas);
    }

    public function graficaUsuariosAppOEF()
    {
        $usuariosApp    = AppUser::where('estado', '!=', 'VERACRUZ')->get();
        $numeroUsuarios = count($usuariosApp);

        $estadisticas = array(array('rango' => '18 a 30', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '31 a 40', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '41 a 50', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '51 a 60', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '61 a 70', 'Usuarios' => 0, 'porcentaje' => 0),
            array('rango' => '71 a 80', 'Usuarios' => 0, 'porcentaje' => 0));

        // print_r($estadisticas[0]['rango']);exit;

        $validarPorcentaje = 0;

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
       	    if ($estadisticas[$i]['Usuarios'] > 0){    
		$estadisticas[$i]['porcentaje'] = $estadisticas[$i]['Usuarios'] * 100 / $numeroUsuarios;
	    }
            if ($estadisticas[$i]['porcentaje'] > 0) {
                $estadisticas[$i]['porcentaje'] = round($estadisticas[$i]['porcentaje'], 2);
            }

            $validarPorcentaje += $estadisticas[$i]['porcentaje'];
        }

        if ($validarPorcentaje > 100) {
            $decimalesRestantes = $validarPorcentaje - 100;
            $decimalesRestantes = round($decimalesRestantes, 2);
            for ($i = (count($estadisticas) - 1); $i >= 0; $i--) {
                if (is_float($estadisticas[$i]['porcentaje'])) {
                    $estadisticas[$i]['porcentaje'] -= $decimalesRestantes;
                    break;
                }
            }
        }

        return response()->json($estadisticas);
    }

    public function graficaDistritos()
    {
        $usuariosApp    = AppUser::where('estado', 'VERACRUZ')->get();
        $numeroUsuarios = count($usuariosApp);
        $distritos      = Distrito::whereNotIn('numdto', [11, 15, 30])->get();

        foreach ($distritos as $distrito) {
            array_add($distrito, 'totalUsuarios', 0);
            array_add($distrito, 'mujeres', 0);
            array_add($distrito, 'hombres', 0);
            array_add($distrito, 'porcentaje', 0);
        }

        foreach ($usuariosApp as $value) {
            $distritoUsuario = Municipio::where('nombrempio', $value->municipio)->first();
            foreach ($distritos as $distrito) {

                if ($distrito->numdto == $distritoUsuario->numdto) {

                    $distrito->totalUsuarios++;

                    if ($value->sexo === 'M') {
                        $distrito->hombres++;

                    }
                    if ($value->sexo === 'F') {
                        $distrito->mujeres++;
                    }
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

    public function graficaEstados()
    {

        $usuariosApp    = AppUser::where('estado', '!=', 'VERACRUZ')->get();
        $numeroUsuarios = count($usuariosApp);
        $estados        = Estado::all();

        foreach ($estados as $estado) {
            array_add($estado, 'totalUsuarios', 0);
            array_add($estado, 'mujeres', 0);
            array_add($estado, 'hombres', 0);
        }

        foreach ($usuariosApp as $value) {

            foreach ($estados as $estado) {

                if ($estado->nombre == $value->estado) {

                    $estado->totalUsuarios++;

                    if ($value->sexo === 'M') {
                        $estado->hombres++;

                    }
                    if ($value->sexo === 'F') {
                        $estado->mujeres++;
                    }
                    break;
                }
            }
        }
        return response()->json($estados);
    }

    public function PDFUsuariosAPP()
    {

        $usuariosApp       = AppUser::where('estado', 'VERACRUZ')->get();
        $numeroUsuarios    = count($usuariosApp);
        $entidadFederativa = "del Estado de Veracruz";

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

        $validarPorcentaje = 0;

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
            if ($estadisticas[$i]['Usuarios'] > 0){
		$estadisticas[$i]['porcentaje'] = $estadisticas[$i]['Usuarios'] * 100 / $numeroUsuarios;
	    }
            if ($estadisticas[$i]['porcentaje'] > 0) {
                $estadisticas[$i]['porcentaje'] = round($estadisticas[$i]['porcentaje'], 2);
            }

            $validarPorcentaje += $estadisticas[$i]['porcentaje'];
        }

        if ($validarPorcentaje > 100) {
            $decimalesRestantes = $validarPorcentaje - 100;
            $decimalesRestantes = round($decimalesRestantes, 2);
            for ($i = (count($estadisticas) - 1); $i >= 0; $i--) {
                if (is_float($estadisticas[$i]['porcentaje'])) {
                    $estadisticas[$i]['porcentaje'] -= $decimalesRestantes;
                    break;
                }
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

        $footer = '<div align="right">';
        $footer .= utf8_decode("Página Única");
        $footer .= '</div>';

        $pdf = PDFS::loadView('trivia.PDF.reporteUsuariosAppPDF', compact('numeroUsuarios', 'mujeres', 'hombres', 'porcentajeMujeres', 'porcentajeHombres', 'estadisticas', 'entidadFederativa'))->setPaper('letter', 'portrait')->setOption('footer-html', $footer)->setOption('margin-bottom', '15');
        return $pdf->inline('Estadísticas - Usuarios de la APP.pdf');
    }

    public function PDFUsuariosAPPOEF()
    {

        $usuariosApp       = AppUser::where('estado', '!=', 'VERACRUZ')->get();
        $numeroUsuarios    = count($usuariosApp);
        $entidadFederativa = "de otras Entidades Federativas";

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

        $validarPorcentaje = 0;

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
            if ($estadisticas[$i]['Usuarios'] > 0){
		$estadisticas[$i]['porcentaje'] = $estadisticas[$i]['Usuarios'] * 100 / $numeroUsuarios;
	    }
            if ($estadisticas[$i]['porcentaje'] > 0) {
                $estadisticas[$i]['porcentaje'] = round($estadisticas[$i]['porcentaje'], 2);
            }

            $validarPorcentaje += $estadisticas[$i]['porcentaje'];
        }

        if ($validarPorcentaje > 100) {
            $decimalesRestantes = $validarPorcentaje - 100;
            $decimalesRestantes = round($decimalesRestantes, 2);
            for ($i = (count($estadisticas) - 1); $i >= 0; $i--) {
                if (is_float($estadisticas[$i]['porcentaje'])) {
                    $estadisticas[$i]['porcentaje'] -= $decimalesRestantes;
                    break;
                }
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

        $footer = '<div align="right">';
        $footer .= utf8_decode("Página Única");
        $footer .= '</div>';

        $pdf = PDFS::loadView('trivia.PDF.reporteUsuariosAppPDF', compact('numeroUsuarios', 'mujeres', 'hombres', 'porcentajeMujeres', 'porcentajeHombres', 'estadisticas', 'entidadFederativa'))->setPaper('letter', 'portrait')->setOption('footer-html', $footer)->setOption('margin-bottom', '15');
        return $pdf->inline('Estadísticas - Usuarios de la APP.pdf');
    }

    public function PDFDistritos()
    {
        $usuariosApp    = AppUser::where('estado', 'VERACRUZ')->get();
        $numeroUsuarios = count($usuariosApp);
        $distritos      = Distrito::whereNotIn('numdto', [11, 15, 30])->get();

        $hombres = 0;
        $mujeres = 0;

        $porcentajeMujeres = 0;
        $porcentajeHombres = 0;

        $validarPorcentajeTotal   = 0;
        $validarPorcentajeMujeres = 0;
        $validarPorcentajeHombres = 0;

        foreach ($distritos as $distrito) {
            array_add($distrito, 'totalUsuarios', 0);
            array_add($distrito, 'porcentajeDistrital', 0);
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
                $distrito->porcentajeDistrital = $distrito->totalUsuarios * 100 / $numeroUsuarios;
                $distrito->porcentajeMujeres   = $distrito->mujeres * $distrito->porcentajeDistrital / $distrito->totalUsuarios;
                $distrito->porcentajeHombres   = $distrito->hombres * $distrito->porcentajeDistrital / $distrito->totalUsuarios;

                if ($distrito->porcentajeMujeres > 0) {
                    $distrito->porcentajeMujeres = round($distrito->porcentajeMujeres, 2);
                }
                if ($distrito->porcentajeHombres > 0) {
                    $distrito->porcentajeHombres = round($distrito->porcentajeHombres, 2);
                }
                if ($distrito->porcentajeDistrital > 0) {
                    $distrito->porcentajeDistrital = round($distrito->porcentajeDistrital, 2);
                }

                $validarPorcentajeTotal += $distrito->porcentajeDistrital;
                $validarPorcentajeMujeres += $distrito->porcentajeMujeres;
                $validarPorcentajeHombres += $distrito->porcentajeHombres;
            }
        }

        if ($validarPorcentajeTotal > 100) {
            $decimalesRestantes = $validarPorcentajeTotal - 100;
            $decimalesRestantes = round($decimalesRestantes, 2);

            for ($i = (count($distritos) - 1); $i >= 0; $i--) {
                if (is_float($distritos[$i]->porcentajeDistrital)) {
                    $distritos[$i]->porcentajeDistrital -= $decimalesRestantes;
                    break;
                }
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

        $footer = '<div align="right">';
        $footer .= utf8_decode("Página Única");
        $footer .= '</div>';

        $pdf = PDFS::loadView('trivia.PDF.reporteDistritoPDF', compact('numeroUsuarios', 'mujeres', 'hombres', 'porcentajeHombres', 'porcentajeMujeres', 'distritos'))->setPaper('letter', 'portrait')->setOption('footer-html', $footer)->setOption('margin-bottom', '10');
        return $pdf->inline('Estadísticas - Distritos.pdf');
    }

    public function PDFMunicipios(Request $request)
    {
        $usuariosApp    = AppUser::where('estado', 'VERACRUZ')->get();
        $numeroUsuarios = count($usuariosApp);
        $nombreDistrito = $request->nombreDistrito;

        $hombres = 0;
        $mujeres = 0;

        $porcentajeMujeres = 0;
        $porcentajeHombres = 0;

        $totalPorcentajeMunicipal = 0;
        $totalPorcentajeMujeres   = 0;
        $totalPorcentajeHombres   = 0;

        $municipios = Municipio::where('numdto', $request->distrito)->get();

        foreach ($municipios as $municipio) {
            array_add($municipio, 'totalUsuarios', 0);
            array_add($municipio, 'porcentajeMunicipal', 0);
            array_add($municipio, 'mujeres', 0);
            array_add($municipio, 'porcentajeMujeres', 0);
            array_add($municipio, 'hombres', 0);
            array_add($municipio, 'porcentajeHombres', 0);
        }

        $totalUsuariosPorMunicipio = 0;

        $validarPorcentajeTotal   = 0;
        $validarPorcentajeMujeres = 0;
        $validarPorcentajeHombres = 0;

        foreach ($municipios as $municipio) {
            $usuariosApp = AppUser::where('municipio', $municipio->nombrempio)->get();

            foreach ($usuariosApp as $usuarioApp) {
                $municipio->totalUsuarios++;
                $totalUsuariosPorMunicipio++;
                if ($usuarioApp->sexo === 'M') {
                    $hombres++;
                    $municipio->hombres++;
                }
                if ($usuarioApp->sexo === 'F') {
                    $mujeres++;
                    $municipio->mujeres++;
                }
            }
        }

        foreach ($municipios as $municipio) {
            if ($municipio->totalUsuarios != 0) {
                $municipio->porcentajeMunicipal = $municipio->totalUsuarios * 100 / $totalUsuariosPorMunicipio;
                $municipio->porcentajeMujeres   = $municipio->mujeres * $municipio->porcentajeMunicipal / $municipio->totalUsuarios;
                $municipio->porcentajeHombres   = $municipio->hombres * $municipio->porcentajeMunicipal / $municipio->totalUsuarios;

                $totalPorcentajeMunicipal += $municipio->porcentajeMunicipal;
                $totalPorcentajeMujeres += $municipio->porcentajeMujeres;
                $totalPorcentajeHombres += $municipio->porcentajeHombres;

                if ($municipio->porcentajeMujeres > 0) {
                    $municipio->porcentajeMujeres = round($municipio->porcentajeMujeres, 2);
                }
                if ($municipio->porcentajeHombres > 0) {
                    $municipio->porcentajeHombres = round($municipio->porcentajeHombres, 2);
                }
                if ($municipio->porcentajeMunicipal > 0) {
                    $municipio->porcentajeMunicipal = round($municipio->porcentajeMunicipal, 2);
                }

                $validarPorcentajeTotal += $municipio->porcentajeMunicipal;
                $validarPorcentajeMujeres += $municipio->porcentajeMujeres;
                $validarPorcentajeHombres += $municipio->porcentajeHombres;

                $totalPorcentajeMujeres = round($totalPorcentajeMujeres, 2);
                $totalPorcentajeHombres = round($totalPorcentajeHombres, 2);
            }
        }

        if ($validarPorcentajeTotal > 100) {
            $decimalesRestantes = $validarPorcentajeTotal - 100;
            $decimalesRestantes = round($decimalesRestantes, 2);

            for ($i = (count($municipios) - 1); $i >= 0; $i--) {
                if (is_float($municipios[$i]->porcentajeMunicipal)) {
                    $municipios[$i]->porcentajeMunicipal -= $decimalesRestantes;
                    break;
                }
            }
        }

        if ($mujeres > 0) {
            $porcentajeMujeres = $mujeres * 100 / $totalUsuariosPorMunicipio;
        }
        if ($hombres > 0) {
            $porcentajeHombres = $hombres * 100 / $totalUsuariosPorMunicipio;
        }

        $porcentajeMujeres = round($porcentajeMujeres, 2);
        $porcentajeHombres = round($porcentajeHombres, 2);

        $porcentajeMujeres = round($porcentajeMujeres, 2);
        $porcentajeHombres = round($porcentajeHombres, 2);

        $footer = '<div align="right">';
        $footer .= utf8_decode("Página Única");
        $footer .= '</div>';

        $pdf = PDFS::loadView('trivia.PDF.reporteMunicipiosPDF', compact('numeroUsuarios', 'mujeres', 'hombres', 'porcentajeHombres', 'porcentajeMujeres', 'nombreDistrito', 'municipios', 'totalPorcentajeMunicipal', 'totalPorcentajeMujeres', 'totalPorcentajeHombres'))->setPaper('letter', 'portrait')->setOption('footer-html', $footer)->setOption('margin-bottom', '10');
        return $pdf->inline('Estadísticas - Municipios por Distrito.pdf');
    }

    public function PDFEstados()
    {
        $usuario        = auth()->user();
        $nombreModulo   = "Estadísticas - Estados";
        $usuariosApp    = AppUser::where('estado', '!=', 'VERACRUZ')->get();
        $numeroUsuarios = count($usuariosApp);
        $estados        = Estado::all();

        $hombres = 0;
        $mujeres = 0;

        $porcentajeMujeres = 0;
        $porcentajeHombres = 0;

        $validarPorcentajeTotal   = 0;
        $validarPorcentajeMujeres = 0;
        $validarPorcentajeHombres = 0;

        foreach ($estados as $estado) {
            array_add($estado, 'totalUsuarios', 0);
            array_add($estado, 'porcentajeEstatal', 0);
            array_add($estado, 'mujeres', 0);
            array_add($estado, 'porcentajeMujeres', 0);
            array_add($estado, 'hombres', 0);
            array_add($estado, 'porcentajeHombres', 0);
        }

        foreach ($usuariosApp as $value) {

            foreach ($estados as $estado) {

                if ($estado->nombre == $value->estado) {

                    $estado->totalUsuarios++;

                    if ($value->sexo === 'M') {
                        $hombres++;
                        $estado->hombres++;

                    }
                    if ($value->sexo === 'F') {
                        $mujeres++;
                        $estado->mujeres++;
                    }
                    break;
                }
            }
        }

        foreach ($estados as $estado) {
            if ($estado->totalUsuarios != 0) {
                $estado->porcentajeEstatal = $estado->totalUsuarios * 100 / $numeroUsuarios;
                $estado->porcentajeMujeres = $estado->mujeres * $estado->porcentajeEstatal / $estado->totalUsuarios;
                $estado->porcentajeHombres = $estado->hombres * $estado->porcentajeEstatal / $estado->totalUsuarios;

                if ($estado->porcentajeMujeres > 0) {
                    $estado->porcentajeMujeres = round($estado->porcentajeMujeres, 2);
                }
                if ($estado->porcentajeHombres > 0) {
                    $estado->porcentajeHombres = round($estado->porcentajeHombres, 2);
                }
                if ($estado->porcentajeEstatal > 0) {
                    $estado->porcentajeEstatal = round($estado->porcentajeEstatal, 2);
                }

                $validarPorcentajeTotal += $estado->porcentajeEstatal;
                $validarPorcentajeMujeres += $estado->porcentajeMujeres;
                $validarPorcentajeHombres += $estado->porcentajeHombres;
            }
        }

        if ($validarPorcentajeTotal > 100) {
            $decimalesRestantes = $validarPorcentajeTotal - 100;
            $decimalesRestantes = round($decimalesRestantes, 2);

            for ($i = (count($estados) - 1); $i >= 0; $i--) {
                if (is_float($estados[$i]->porcentajeEstatal)) {
                    $estados[$i]->porcentajeEstatal -= $decimalesRestantes;
                    break;
                }
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

        $footer = '<div align="right">';
        $footer .= utf8_decode("Página Única");
        $footer .= '</div>';

        $pdf = PDFS::loadView('trivia.PDF.reporteEstadosPDF', compact('usuario', 'numeroUsuarios', 'hombres', 'mujeres', 'porcentajeHombres', 'porcentajeMujeres', 'estados'))->setPaper('letter', 'portrait')->setOption('footer-html', $footer)->setOption('margin-bottom', '10');
        return $pdf->inline('Estadísticas - otras Entidades Federativas.pdf');
    }

    public function scrollNotificaciones()
    {
        $notificaciones = Notify::orderBy('id', 'DESC')->paginate(10);
        return view("trivia.notificaciones.template", compact("notificaciones"));
    }

    public function updateStatusNotificaciones()
    {
        $updateStatus = Notify::where('status', 1)->update(['status' => 0]);
        return response()->json($updateStatus);
    }

    public function actualizarBaseDeDatosApp(Request $request)
    {
        $version = pregunta::select('version')->get();

        $version2 = $version[0]->version + 1;

        Pregunta::query()->update([
            'version'           => $version2,
            'actualizar_banco'  => 0,
        ]);

        return response()->json(1);
    }
}
