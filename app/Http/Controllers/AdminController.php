<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Mes, ProgramaEsp, Actividad, PorcProgramado, PorcRealizado, DetalleActi, Area, Programa, InfoCedula, Adicional, Trimestre, Trimestral};
use DB;
use Auth;
use PDF;
use Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Funcionalidad: Registro de actividades
     * Parametros: $request
     * Respuesta: Redireccionamiento
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //tengo que conseguir el idmes y el autoactividades
      $autoactividades = $request->input('actividades_admin');
      $mesadmin = $request->input('mes_admin');


      //en tabla porcentajer se guarda el input realizadomes en la columna del mes correspondiente:
      //ener,febr,marr,abrr, etc
      $realizadomes = $request->input('realizadomes_admin');
      $realizado = [0,'ener','febr','marr','abrr','mayr','junr','julr','agor','sepr','octr','novr','dicr'];     
      $mes = $realizado[$mesadmin];
      DB::table('porcentajer')->where('autoactividades', $autoactividades)->update([$mes => $realizadomes]);

      //en tabla detalleactividades se guarda los input descatividad,soporte,observaciones 
      //donde idmes=messeleccionado y el autoactividades sea igual al autoactividades de la actividad 
      //seleccionada
      $descactividad = trim($request->input('descactividad_admin'));
      $descactividad = strtr($descactividad,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
      $soporte = trim($request->input('soporte_admin'));
      $soporte = strtr($soporte,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");            
      $observaciones = trim($request->input('observaciones_admin'));
      $observaciones = strtr($observaciones,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");      

      DB::table('detalleactividades')->where('idmes', $mesadmin)->where('autoactividades', $autoactividades)->update(['descripcion' => $descactividad, 'soporte' => $soporte, 'observaciones' => $observaciones]);
      Alert::success('', 'Registro exitoso')->autoclose(3500);
      return redirect()->route('programa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Funcionalidad: Obtiene el programa especifico
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function obtenProgramaEsp(Request $request)
    {
      if (Auth::check())
      {        
        $idArea = $request->area;
        $programa = $request->programa;
        $programaEsp = ProgramaEsp::select('idprogramaesp', 'claveprogramaesp','descprogramaesp')
          ->where('idprograma', $programa)
          ->where('idarea', $idArea)->get();
        return response()->json($programaEsp);
      }
      else
      {
        return route('auth/login');
      }
    }

    /**
     * Funcionalidad: Obtiene actividades
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function obtenActividades(Request $request) {
      $idArea = $request->area;
      $idPrograma = $request->programa;
      $idProgramaEsp = $request->programaEsp;

      $actividades = Actividad::where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->orderBy('numactividad')->get();
      return response()->json($actividades);
    }

    /**
     * Funcionalidad: Obtiene el objetivo de una actividad
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function obtenObjetivoAct(Request $request)
    {
      $idArea = $request->area;
      $idPrograma = $request->programa;
      $idProgramaEsp = $request->programaEsp;
      $objetivo = ProgramaEsp::select('objprogramaesp')
        ->where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->get();
      return response()->json($objetivo);
    }

    /**
     * Funcionalidad: Obtiene el porcentaje programado
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function obtenPorcProgramado(Request $request) {
      $idActividad = $request->idActividad;
      $porcProgramado = PorcProgramado::where('porcentajep.idporcentajep', $idActividad)->leftJoin('actividades', 'actividades.autoactividades', 'porcentajep.idporcentajep')->get();
      return response()->json($porcProgramado);
    }

    /**
     * Funcionalidad: Obtiene el porcentaje realizado
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function obtenPorcRealizado(Request $request) {
      $idActividad = $request->idActividad;
      $porcRealizado = PorcRealizado::where('idporcentajer', $idActividad)->get();
      return response()->json($porcRealizado);
    }

    /**
     * Funcionalidad: Obtiene los detalles de una actividad
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function obtenDetallesActi(Request $request) {      
      $idActividad = $request->idActividad;
      $idMes = $request->mes;      
      $detalleActi = DetalleActi::where('idmes', $idMes)->where('autoactividades', $idActividad)->get();
      return response()->json($detalleActi);
      //
    }

    /**
     * Funcionalidad: Obtiene los trimestrales
     * Parametros: 
     * Respuesta: regresa la vista seleccionada con los parametros especificos
     *
     */

    public function poatrimestral()
    {

      if (Auth::check())
      {
        
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        {          

          $areas = Area::all();
          $trimestres = Trimestre::all();
          $programas = DB::table('programas')->where('reprogramacion', '<', 3)->get();
          $action = route('reportes.trimestral');
          $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
          $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('ale_date', 'desc')->take(15)->get();
          $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('ale_date', 'desc')->take(10)->get();
          $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();
          $observaciones = DB::table('observaciones')->where('obs_status', 0)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
          ->orderBy('obs_date', 'desc')->get();

          $observacionesR = DB::table('observaciones')->where('obs_status', 1)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->orderBy('obs_date', 'desc')->get();
          return view('pages.admin.poatrimestral')->with( compact('areas', 'trimestres', 'programas', 'action', 'nfin', 'alertasfin','nalertas', 'alertas','observaciones','observacionesR'));

        }
        else
        { 
          return redirect()->route('login');
        }
      }
      else
      {
        return redirect()->route('login');        
      }
    }

    /**
     * Funcionalidad: Guarda las observaciones del trimestre
     * Parametros: $request
     * Respuesta: $modificacion
     *
     */

    public function guardarObsTrim(Request $request)
    {      
      $id = $request->input('id');
      $modificacion = $request->input('value');
      //$modificacion = strtr($modificacion,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
      //guardo la observacion en la tabla actividades
      Actividad::where('autoactividades',$id)->update(['observatrim4' => $modificacion, 'bandera4' => 1]);
      //guardo la observación en la tabla trimestral
      Trimestral::where('idactividad',$id)->update(['observatrim' => $modificacion]);
      return $modificacion;      
    }    



}
