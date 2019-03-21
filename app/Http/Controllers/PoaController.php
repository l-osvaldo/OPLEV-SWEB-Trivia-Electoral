<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Mes, ProgramaEsp, Actividad, PorcProgramado, PorcRealizado, DetalleActi, Area, Programa, InfoCedula, Adicional, Trimestre, Trimestral};
use DB;
use Auth;

class PoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::check())
      {
        
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        {          
          $meses = Mes::all();
          $areas = Area::all();
          $programas = DB::table('programas')->where('idprograma', '=', 1)->get();
          $action = route('admin.store');

          return view('pages.admin.index')->with( compact('meses', 'areas', 'programas', 'action'));
        }
        else
        { 
          $meses = Mes::all();
          return view('pages.poa.index')->with( compact('meses'));
        }
      }
      else
      {
        return redirect()->route('login');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if ( Auth::check() )
      {
        #Validación del mes a reportar
        list( $rules, $messages ) = $this->_rules();
        $this->validate( $request, $rules, $messages );

        $idmesreportar = $request->input('idmesreportar');
        $mes = Mes::select('mes')->where('idmes', $idmesreportar)->get();
        $programas = DB::table('programas')->where('idprograma', '<>', 2)->get();
        $action = route('programa.store');
        return view('pages.poa.create')->with( compact('idmesreportar', 'programas', 'action', 'mes') );
      }
      else
      {
        return redirect()->route('login');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //tengo que conseguir el idmes y el autoactividades
      $autoactividades = $request->input('actividades');
      $idmesreportar = $request->input('idmesreportar');

      //en tabla porcentajer se guarda el input realizadomes en la columna del mes correspondiente:
      //ener,febr,marr,abrr, etc
      $realizadomes = $request->input('realizadomes');
      $realizado = [0,'ener','febr','marr','abrr','mayr','junr','julr','agor','sepr','octr','novr','dicr'];     
      $mes = $realizado[$idmesreportar];
      DB::table('porcentajer')->where('autoactividades', $autoactividades)->update([$mes => $realizadomes]);

      //en tabla detalleactividades se guarda los input descatividad,soporte,observaciones 
      //donde idmes=messeleccionado y el autoactividades sea igual al autoactividades de la actividad 
      //seleccionada

      $descactividad = trim(strtoupper($request->input('descactividad')));
      $descactividad = strtr($descactividad,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
      $soporte = trim(strtoupper($request->input('soporte')));
      $soporte = strtr($soporte,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");            
      $observaciones = trim(strtoupper($request->input('observaciones')));
      $observaciones = strtr($observaciones,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");      

      DB::table('detalleactividades')->where('idmes', $idmesreportar)->where('autoactividades', $autoactividades)->update(['descripcion' => $descactividad, 'soporte' => $soporte, 'observaciones' => $observaciones]);

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


    #Validación de formulario
    private function _rules( $new = True )
    {

      $messages = [
        'idmesreportar.required' => 'Debe seleccionar un mes de trabajo',
        'idmesreportar.not_in' => 'Debe seleccionar un mes de trabajo'
      ];

      $rules = [

          'idmesreportar' => 'required|not_in:0'
      ];

      return array( $rules, $messages );
    }




    public function obtenProgramaEsp(Request $request) {
      if (Auth::check()) {
        $idArea = Auth::user()->idarea;
        $programa = $request->programa;

        $programaEsp = ProgramaEsp::select('idprogramaesp', 'claveprogramaesp','descprogramaesp')
          ->where('idprograma', $programa)
          ->where('idarea', $idArea)->get();

        return response()->json($programaEsp);

      } else {
        return route('auth/login');
      }
    }

    public function obtenActividades(Request $request) {
      $idArea = Auth::user()->idarea;
      $idPrograma = $request->programa;
      $idProgramaEsp = $request->programaEsp;

      $actividades = Actividad::where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->get();
      return response()->json($actividades);

    }

    public function obtenObjetivoAct(Request $request) {
      $idArea = Auth::user()->idarea;
      $idPrograma = $request->programa;
      $idProgramaEsp = $request->programaEsp;
      $objetivo = ProgramaEsp::select('objprogramaesp')
        ->where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->get();
      return response()->json($objetivo);
    }

    public function obtenPorcProgramado(Request $request) {
      $idActividad = $request->idActividad;
      $porcProgramado = PorcProgramado::where('porcentajep.idporcentajep', $idActividad)->leftJoin('actividades', 'actividades.autoactividades', 'porcentajep.idporcentajep')->get();
      return response()->json($porcProgramado);
    }

    public function obtenPorcRealizado(Request $request) {
      $idActividad = $request->idActividad;
      $porcRealizado = PorcRealizado::where('idporcentajer', $idActividad)->get();
      return response()->json($porcRealizado);
    }

    public function obtenDetallesActi(Request $request) {      
      $idActividad = $request->idActividad;
      $idMes = $request->idMes;      
      $detalleActi = DetalleActi::where('idmes', $idMes)->where('autoactividades', $idActividad)->get();
      return response()->json($detalleActi);
      //
    }


}
