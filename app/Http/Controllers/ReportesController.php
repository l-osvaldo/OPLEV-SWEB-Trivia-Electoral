<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Mes, ProgramaEsp, Actividad, PorcProgramado, PorcRealizado, DetalleActi, Area, Programa, InfoCedula, Adicional, Trimestre, Trimestral};
use DB;
use Auth;
use PDF;
use PDFS;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Alert;

class ReportesController extends Controller
{
    /**
     * Funcionalidad: Busca la vista principal del sistema
     * Parametros: 
     * Respuesta: regresa la vista junto con los datos para su creacion
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $meses = Mes::all();      
      if (Auth::user()->idarea==3)              
        $programas = Programa::where('reprogramacion', '<', 3)->get();
      //else
        $user   = auth()->user();
      $areaId = $user->idarea;
        $programas = Programa::where('idprograma', '=', 1)->get();
      $action = route('reportes.poa');
      $observaciones = DB::table('observaciones')->where('obs_status', 0)->where('obs_id_area', $areaId)
      ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
      ->orderBy('obs_date', 'desc')->get();

      $observacionesR = DB::table('observaciones')->where('obs_status', 3)->orWhere('obs_status', '4')->where('obs_id_area', $areaId)
      ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
      ->orderBy('obs_date', 'desc')->get();

      $observacionesRn = DB::table('observaciones')->where('obs_status', 3)->where('obs_id_area', $areaId)->get();
      return view('pages.reportes.reppoa')->with( compact('action', 'programas', 'meses','observaciones', 'observacionesR', 'observacionesRn'));
    }


    /**
     * Funcionalidad: Busca la vista repindicadores del sistema
     * Parametros: 
     * Respuesta: regresa la vista junto con los datos para su creacion
     *
     * @return \Illuminate\Http\Response
     */

    public function indexindicador()
    {
      if (Auth::check())
      {
        
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        {          
          $meses = Mes::all();
          $areas = Area::all();
          $programas = Programa::where('reprogramacion', '<', 3)->get();
          $action = route('reportes.indicadores');

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

          return view('pages.admin.repindicadores')->with( compact('action', 'programas', 'meses', 'areas','nfin', 'alertasfin','nalertas', 'alertas','observaciones', 'observacionesR'));
        }
        else
        { 
          $meses = Mes::all();      
          if (Auth::user()->idarea==3)                        
            $programas = Programa::where('reprogramacion', '<', 3)->get();
          else
            $programas = Programa::where('idprograma', '=', 1)->get();        
          $action = route('reportes.indicadores');

          $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
          $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('ale_date', 'desc')->take(15)->get();
          $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('ale_date', 'desc')->take(10)->get();
          $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();
          $user   = auth()->user();
          $areaId = $user->idarea;
          $observaciones = DB::table('observaciones')->where('obs_status', 0)->where('obs_id_area', $areaId)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->orderBy('obs_date', 'desc')->get();

          $observacionesR = DB::table('observaciones')->where('obs_status', 3)->orWhere('obs_status', '4')->where('obs_id_area', $areaId)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->orderBy('obs_date', 'desc')->get();

          $observacionesRn = DB::table('observaciones')->where('obs_status', 3)->where('obs_id_area', $areaId)->get();
          return view('pages.reportes.repindicadores')->with( compact('action', 'programas', 'meses','nfin', 'alertasfin','nalertas', 'alertas','observaciones','observacionesR', 'observacionesRn'));
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Funcionalidad: Busca la vista bitacora del sistema
     * Parametros: $request
     * Respuesta: regresa la vista junto con los datos para su creacion
     *
     * @return \Illuminate\Http\Response
     */

     public function bitacora(Request $request)
    {
        //
      /////////////////////////////////////////////////////////////////////////////////////////
          $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('ale_date', 'desc')->take(10)->get();
          $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();

          $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('ale_date', 'desc')->take(15)->get();
          $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
          $observaciones = DB::table('observaciones')->where('obs_status', 0)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
          ->orderBy('obs_date', 'desc')->get();

          $observacionesR = DB::table('observaciones')->where('obs_status', 1)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->orderBy('obs_date', 'desc')->get();
          /////////////////////////////////////////////////////////////////////////////////////////
         return view('pages.admin.bitacora')->with( compact('alertas', 'nalertas', 'alertasfin', 'nfin','observaciones','observacionesR'));
    }

    /**
     * Funcionalidad: Busca la vista bitacorames del sistema
     * Parametros: $request
     * Respuesta: regresa la vista junto con los datos para su creacion
     *
     * @return \Illuminate\Http\Response
     */

     public function bitacorames(Request $request)
    {

          $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('ale_date', 'desc')->take(10)->get();
          $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();

          $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('ale_date', 'desc')->take(15)->get();
          $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
          $observaciones = DB::table('observaciones')->where('obs_status', 0)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
          ->orderBy('obs_date', 'desc')->get();

          $observacionesR = DB::table('observaciones')->where('obs_status', 1)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->orderBy('obs_date', 'desc')->get();

          $mes_anterior  = date("m")-1;

          $mesant=['titulo','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];

          //dd($mesant[$mes_anterior]);exit;

          $alertaMA = DB::table('alertas')->where('ale_clase', 'final')->where('ale_mes', $mesant[$mes_anterior])->take(20)->get();

          $rfijo = DB::table('alertas')->where('ale_clase', 'final')
        //->join('alertas', 'abreviatura', '=', 'ale_acronimo')
        //->join('users', 'ban_receptor_id', '=', 'id')
        //->select('doc_asunto', 'doc_tipo', 'documentos.ale_date', 'doc_respuesta', 'doc_prioridad', 'nombre')
        ->get();

          //dd($rfijo);exit;
         return view('pages.admin.bitacorames')->with( compact('alertas', 'nalertas', 'alertasfin', 'nfin', 'rfijo', 'alertaMA','observaciones','observacionesR'));
    }


    /**
     * Funcionalidad: Busca la vista tablames del sistema
     * Parametros: $request
     * Respuesta: regresa la vista junto con los datos para su creacion
     *
     * @return \Illuminate\Http\Response
     */


     public function tablames(Request $request)
    {

          $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('ale_date', 'desc')->take(10)->get();
          $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();

          $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('ale_date', 'desc')->take(15)->get();
          $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
          $observaciones = DB::table('observaciones')->where('obs_status', 0)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
          ->orderBy('obs_date', 'desc')->get();

          $observacionesR = DB::table('observaciones')->where('obs_status', 1)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->orderBy('obs_date', 'desc')->get();

          $rfijo = DB::table('alertas')->select('ale_acronimo', 'ale_mes')->where('ale_clase', 'final')
        //->join('alertas', 'abreviatura', '=', 'ale_acronimo')
        //->join('users', 'ban_receptor_id', '=', 'id')
        //->select('doc_asunto', 'doc_tipo', 'documentos.ale_date', 'doc_respuesta', 'doc_prioridad', 'nombre')
        ->get();

          //dd($rfijo);exit;
         return view('pages.admin.tablames')->with( compact('alertas', 'nalertas', 'alertasfin', 'nfin', 'rfijo', 'observaciones','observacionesR'));
    }


    /**
     * Funcionalidad: Busca la vista buscarmes del sistema
     * Parametros: $request
     * Respuesta: regresa la vista junto con los datos para su creacion
     *
     * @return \Illuminate\Http\Response
     */


    public function buscarmes(Request $request)
    {

        //$mes = $request->mes;
        $acr = $request->acr;
        
        $resultado = DB::table('alertas')->where('ale_acronimo', $acr)->where('ale_clase', 'final')->get();
        //$resultado = DB::table('alertas')->where('ale_mes', $mes)->where('ale_acronimo', $acr)->where('ale_clase', 'final')->get();

        return response()->json([$resultado]);
    }


    /**
     * Funcionalidad: Busca la vista buscaentre del sistema
     * Parametros: $request
     * Respuesta: regresa la vista junto con los datos para su creacion
     *
     * @return \Illuminate\Http\Response
     */


    public function buscaentre(Request $request)
    {

        $pri = $request->datep;
        $seg = $request->dates;

        $date_from = Carbon::parse($request->datep)->startOfDay();
        $date_to = Carbon::parse($request->dates)->endOfDay();

        $acr = $request->acr;
        
        $resultado = DB::table('alertas')->where('ale_acronimo', $acr)->where('ale_clase', 'edicion')->whereBetween('ale_date', [$date_from, $date_to])->get();

        //dd($resultado);exit;
        return response()->json([$resultado]);
    }


    /**
     * Funcionalidad: Validación de formulario
     * Parametros: $new
     * Respuesta: regresa la vista junto con los datos para su creacion
     *
     * @return \Illuminate\Http\Response
     */

    #Validación de formulario
    private function _rulespoa( $new = True )
    {

      $messages = [
        'idmesreportar.required' => 'Debe seleccionar un mes de trabajo',
        'idmesreportar.not_in' => 'Debe seleccionar un mes de trabajo',
        'programa.required' => 'Debe seleccionar un programa',
        'programa.not_in' => 'Debe seleccionar un programa',
        'programaEsp.required' => 'Debe seleccionar un programa específico',
        'programaEsp.not_in' => 'Debe seleccionar un programa específico'
      ];

      $rules = [
        'idmesreportar' => 'required|not_in:0',
        'programa' => 'required|not_in:0',
        'programaEsp' => 'required|not_in:0'
      ];

      return array( $rules, $messages );
    }


    /**
     * Funcionalidad: crea un pdf del poa apartir de los datos recibidos
     * Parametros: $request
     * Respuesta: regresa un pdf
     *
     * @return \Illuminate\Http\Response
     */


    public function poa(Request $request)
    {
      if ( Auth::check() )
      {


        if (!Auth::user()->hasRole('admin')) 
        {         
          #Validación de seleccion de combos
          list( $rules, $messages ) = $this->_rulespoa();
          $this->validate( $request, $rules, $messages );
        }
        
        if (Auth::user()->hasRole('admin')) 
        { 
          $idArea = $request->areareporte;
          $idMes = $request->mesreporte;      
          $idPrograma = $request->programareporte;
          $idProgramaEsp = $request->programaespreporte;    
        }
        else
        {
          $idArea = Auth::user()->idarea;        
          $idMes = $request->idmesreportar;      
          $idPrograma = $request->programa;
          $idProgramaEsp = $request->programaEsp;
        }

        //if (empty($idArea)||empty($idMes)||empty($idProgramaEsp)||empty($idPrograma)) {
        //   Alert::error('Los campos son requeridos', '¡Error!')->autoclose(3500);
        //     return redirect()->route('reportes.poa');
        //  }
        
        $area = Area::select('nombrearea')->where('idarea', $idArea)->get();
        $arrMeses = [0,'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $programa = Programa::select('claveprograma', 'descprograma')->where('idprograma', $idPrograma)->get();
        $programaesp = ProgramaEsp::select('claveprogramaesp', 'descprogramaesp', 'objprogramaesp')->where('idprograma', $idPrograma)->where('idprogramaesp',$idProgramaEsp)->get();

        /*
          select * from actividades 
          left join porcentajep 
          ON porcentajep.idporcentajep = actividades.idporcentajep 
          left join porcentajer 
          ON porcentajer.idporcentajer = actividades.idporcentajer
          left join detalleactividades 
          ON detalleactividades.autoactividades = actividades.autoactividades
          where actividades.idprograma = 1 
          and actividades.idprogramaesp = 15
          and actividades.idarea = 5 and detalleactividades.idmes = 3 order by actividades.numactividad
          where 
        */

        $poa = array();
        $poa['resultado'] = Actividad::where('actividades.idprograma', $idPrograma)->
          where('actividades.idprogramaesp', $idProgramaEsp)->where('actividades.idarea', $idArea)->
          where('detalleactividades.idmes', $idMes)->where('actividades.reprogramacion','<',3)->
          leftjoin('porcentajep', 'porcentajep.idporcentajep', 'actividades.idporcentajep')->leftjoin('porcentajer', 'porcentajer.idporcentajer', 'actividades.idporcentajer')->leftjoin('detalleactividades', 'detalleactividades.autoactividades', 'actividades.autoactividades')->orderBy('actividades.numactividad','asc')->get();
        
        $poa['nombrearea'] = $area[0]->nombrearea;
        $poa['idmes'] = $idMes;        
        $poa['mes'] = $arrMeses[$idMes];
        $poa['programa'] = $programa[0]->claveprograma.' - '.$programa[0]->descprograma;
        $poa['programaesp'] = $programaesp[0]->claveprogramaesp.' - '.$programaesp[0]->descprogramaesp;
        $poa['objetivo'] = $programaesp[0]->objprogramaesp;        
        //$pdf = PDF::loadView( 'pages.reportes.poa', ['poa'=>$poa] )->setPaper('letter', 'landscape');
        //$pdf = PDF::loadView( 'pages.reportes.poa', ['poa'=>$poa] )->setPaper('letter', 'landscape');
        //return $pdf->stream();

        //dd(['poa'=>$poa]);exit;

        $pdfs = PDFS::loadView('pages.reportes.poa', ['poa'=>$poa])->setPaper('letter', 'landscape');
        $pdfs->setOption('margin-top', 72);
        $pdfs->setOption('margin-bottom', 10);
        $pdfs->setOption('margin-left', 10);
        $pdfs->setOption('margin-right', 10);
        $pdfs->setOption('footer-font-size', 8);
       

        $pdfs->setOption('header-html', '<!DOCTYPE html><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html><body>
    <table border="0" align="center" width="100%">

    <tr style="border: 1px solid black;background:#fff; height:75px; text-align:center;">
      <td colspan="6">
      <img class="logo" src="'.public_path('images/logoople.png').'" width="100" style="position:absolute;top:0px;">
      ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 
      </td>
    </tr>

    </table>

    <table border="1" align="center" width="100%" style="border: 1px solid black;border-collapse: collapse;text-align:center;">

    <tr style="border: 1px solid black;background:#ccc;">
      <th colspan="6"  style="font-size:14px;padding:5px 0;"">
        '.$poa['programa'].'<br>'.$poa['programaesp'].'
      </th>
    </tr>
    <tr style="border: 1px solid black;">
     <td colspan="6" style="text-align:center;font-size:14px;padding:5px 0;">
       Objetivo: '.$poa['objetivo'].'
     </td>
    </tr>
    <tr style="background:#ccc;font-size:14px;font-weight: bold;">
      <td colspan="2" style="padding:10px 0; border:solid 1px black;" width="400px">UNIDAD RESPONSABLE</td>
      <td colspan="2" style="padding:10px 0; border:solid 1px black;" width="400px">FIRMA DEL RESPONSABLE</td>
      <td colspan="2" style="padding:10px 30px; border:solid 1px black;">MES</td>
    </tr>
    <tr style="font-size:14px">
      <td colspan="2" style="padding:10px 0; border:solid 1px black;">'.$poa['nombrearea'].'</td>
      <td colspan="2" style="padding:10px 0; border:solid 1px black;"></td>
      <td colspan="2" style="padding:10px 30px; border:solid 1px black;">'.$poa['mes'].'</td>
    </tr>
    </table>

     <table border="0" align="center" width="100%" style="border-collapse: collapse;text-align:center;margin:2px 0;border-top:1px solid black;">
    <tr style="background:#ccc;text-align: center;border-bottom: .5px solid black;font-weight: bold;font-size:14px;">
        <td width="2%" colspan="1" style="border-left:1px solid black;">No. ACT.</td> 
        <td width="8%" colspan="1" style="border-left:1px solid black;">AVANCE MENSUAL<br><div style="width: 50%; float: left;text-align: center;">PROG.</div> <div style="width: 50%; float: left;text-align: center;">REAL.</div></td> 
        <td width="28%" colspan="1" style="border-left:1px solid black;">DESCRIPCIÓN</td> 
        <td width="22%" colspan="1" style="border-left:1px solid black;">SOPORTE</td> 
        <td width="22%" colspan="1" style="border-left:1px solid black;border-right:1px solid black;">OBSERVACIONES</td>
    </tr>

  </table>
</body></html>');
        //$pdfs->setOption('footer-html', date('Y-m-d H:i:s'));
        $pdfs->setOption('load-error-handling','ignore');
        $pdfs->setOption('footer-right','[page] / [toPage]');
        return $pdfs->inline('reporte.pdf');
        //return view('pages.reportes.new_poa', ['poa'=>$poa] );
      }
      else
      {
        return redirect()->route('login');
      }      
    }


    /**
     * Funcionalidad: Validación de formulario
     * Parametros: $new
     * Respuesta: 
     *
     * @return \Illuminate\Http\Response
     */

    #Validación de formulario
    private function _rulesindicadores( $new = True )
    {

      $messages = [
        'idmesreportar.required' => 'Debe seleccionar un mes de trabajo',
        'idmesreportar.not_in' => 'Debe seleccionar un mes de trabajo',
        'programa.required' => 'Debe seleccionar un programa',
        'programa.not_in' => 'Debe seleccionar un programa',
        'programaEsp.required' => 'Debe seleccionar un programa específico',
        'programaEsp.not_in' => 'Debe seleccionar un programa específico',
        'actividades.required' => 'Debe seleccionar una actividad',
        'actividades.not_in' => 'Debe seleccionar una actividad'
      ];

      $rules = [
        'idmesreportar' => 'required|not_in:0',
        'programa' => 'required|not_in:0',
        'programaEsp' => 'required|not_in:0',
        'actividades' => 'required|not_in:0'
      ];

      return array( $rules, $messages );
    }


  /**
     * Funcionalidad: crea un pdf de indicadores, apartir de los datos recibidos
     * Parametros: $request
     * Respuesta: regresa un pdf
     *
     * @return \Illuminate\Http\Response
     */


    public function indicadores(Request $request)
    {
      if ( Auth::check() )
      {      
        
        if (!(Auth::user()->hasRole('admin')) && !(Auth::user()->hasRole('consulta')))
        {  
          #Validación de seleccion de combos
          list( $rules, $messages ) = $this->_rulesindicadores();
          $this->validate( $request, $rules, $messages );  
        }


        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        { 
          $idArea = $request->area_admin;
          $idMes = $request->mes_admin;      
          $idPrograma = $request->programa_admin;
          $idProgramaEsp = $request->programaEsp_admin;    
          $idActividad = $request->actividades_admin; 
        }
        else
        {
          $idArea = Auth::user()->idarea;        
          $idMes = $request->idmesreportar;      
          $idPrograma = $request->programa;
          $idProgramaEsp = $request->programaEsp;    
          $idActividad = $request->actividades; 
        }

        $arrMeses = [0,'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $area = Area::select('nombrearea')->where('idarea', $idArea)->get();            
        $infocedula = InfoCedula::where('idcontrol', $idActividad)->get();

        $programado = [0,'enep','febp','marp','abrp','mayp','junp','julp','agop','sepp','octp','novp','dicp'];     
        $colmesp = $programado[$idMes];
        $meta = PorcProgramado::select($colmesp)->where('idporcentajep', $idActividad)->get();

        $realizado = [0,'ener','febr','marr','abrr','mayr','junr','julr','agor','sepr','octr','novr','dicr'];     
        $colmesr = $realizado[$idMes];
        $real = PorcRealizado::select($colmesr)->where('idporcentajer', $idActividad)->get();
        
        /* 
          $colmesp está el nombre del mes programado
          $colmesr está el nombre del mes realizado
          $meta[0][$colmesp] está lo programado del mes
          $real[0][$colmesr] está lo realizado del mes
        */
        //Caso: se programó en ese mes la actividad pero no se realizó
        $indicadores = array();      
        $indicadores['resultado'] = '';        
        $indicadores['variacion'] = '';
        //si la actividad está programada, es decir, diferente de cero
        if ($meta[0][$colmesp]!=0)
        {
          //hay que ver si no se realiza la actividad
          if ($real[0][$colmesr]==0) 
          {
            $indicadores['resultado'] = '';        
            $indicadores['variacion'] = '-100%';
          }
          else
          {
            $indicadores['resultado'] = round(($real[0][$colmesr]*100)/$meta[0][$colmesp],1);
            $indicadores['variacion'] = round($indicadores['resultado'] - 100,1);
          }
        }
        else
        {
          //No se tiene programado nada pero hay que ver si se realiza la actividad
          if ($real[0][$colmesr]!=0) 
          {            
            $indicadores['resultado'] = 'No programado pero si realizado';
            $indicadores['variacion'] = '';
          }

        }

        $observa = DetalleActi::select('observaciones')->where('idmes', $idMes)->where('autoactividades', $idActividad)->get();

        $prog1 = '';
        $prog2 = '';
        $prog3 = '';
        $prog4 = '';
        if ($idPrograma==1)
          $prog1 = 'X';
        if ($idPrograma==2)
          $prog2 = 'X';
        if ($idPrograma==3)
          $prog3 = 'X';
        if ($idPrograma==4)
          $prog4 = 'X';


        $frecuenciamedicion = $infocedula[0]['frecuenciamedicion'];
        if ($frecuenciamedicion==1)
          $frecuencia = "Mensual";
        if ($frecuenciamedicion==2)
          $frecuencia = "Trimestre";
        if ($frecuenciamedicion==3)
          $frecuencia = "Semestre";
        if ($frecuenciamedicion==4)
          $frecuencia = "Anual";                            
        if ($frecuenciamedicion==5)
          $frecuencia = "Único";
        if ($frecuenciamedicion==6)
          $frecuencia = "Bimestral";        
        $indicadores['identificadorindicador'] = $infocedula[0]['identificadorindicador'];
        $indicadores['nombrearea'] = $area[0]->nombrearea;
        $indicadores['objetivoindicador'] = $infocedula[0]['objetivoindicador'];
        $indicadores['abreviaturaperiodocump'] = $infocedula[0]['abreviaturaperiodocump']; 
        $indicadores['mes'] = $arrMeses[$idMes];               
        $indicadores['prog1'] = $prog1;
        $indicadores['prog2'] = $prog2;
        $indicadores['prog3'] = $prog3;
        $indicadores['prog4'] = $prog4;
        $indicadores['nombreindicador'] = $infocedula[0]['nombreindicador'];
        $indicadores['frecuencia'] = $frecuencia;
        $indicadores['variable1'] = $infocedula[0]['variable1'];
        $indicadores['variable2'] = $infocedula[0]['variable2'];
        $indicadores['meta'] = $meta[0][$colmesp];
        $indicadores['realizado'] = $real[0][$colmesr];
        $indicadores['observaciones'] = $observa[0]['observaciones'];
        $indicadores['nombretitular'] = $infocedula[0]['nombretitular'];
        $indicadores['cargo'] = $infocedula[0]['cargo'];

        //$pdf = PDF::loadView( 'pages.reportes.indicadores', ['indicadores'=>$indicadores] )->setPaper('letter', 'landscape');
        //return $pdf->stream();

        $pdfs = PDFS::loadView('pages.reportes.indicadores', ['indicadores'=>$indicadores])->setPaper('letter', 'landscape');
        $pdfs->setOption('margin-top', 22);
        $pdfs->setOption('margin-bottom', 10);
        $pdfs->setOption('margin-left', 10);
        $pdfs->setOption('margin-right', 10);
        $pdfs->setOption('footer-font-size', 8);

        $pdfs->setOption('header-html', '<!DOCTYPE html><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <html><body>
            <table border="0" align="center" width="100%">

            <tr style="border: 1px solid black;background:#fff; height:75px; text-align:center;">
              <td colspan="6">
              <img class="logo" src="'.public_path('images/logoople.png').'" width="100" style="position:absolute;top:0px;">
              ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Cédula de Indicadores Aplicados <br> Indicadores y Metas del Programa Operativo Anual 2019 
              </td>
            </tr>
          </table>
        </body></html>');
        //$pdfs->setOption('footer-html', date('Y-m-d H:i:s'));
        $pdfs->setOption('load-error-handling','ignore');
        $pdfs->setOption('footer-right','[page] / [toPage]');
        return $pdfs->inline('reporte.pdf');

      
      }
      else
      {
        return redirect()->route('login');
      }  
    }


  /**
     * Funcionalidad: crea un pdf de la elaboracion del poa, apartir de los datos recibidos
     * Parametros: $request
     * Respuesta: regresa un pdf
     *
     * @return \Illuminate\Http\Response
     */



  public function pdfelaboracion(Request $request)
    {
      if ( Auth::check() )
      {   

        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta'))
        {
          $idArea = $request->unidad;
        }
        else {
          $idArea = Auth::user()->idarea;
        }
        
        $actPdf = DB::table('actividadesdos')->where('idprogramaesp', $request->progesp)->where('idarea', $idArea)->where('reprogramacion', '!=' , 5)->join('porcentajep2020', 'porcentajep2020.idporcentajep', '=', 'autoactividades')->orderBy('numactividad', 'asc')->get();

        //$actPdf = DB::table('actividadesdos')->where('idprogramaesp', $request->progesp)->where('idarea', $idArea)->orderBy('numactividad', 'asc')->get();

        //dd($actPdf);exit;


        $pdfs = PDFS::loadView('pages.poa.pdfelaboracion',[
          'actividades'=>$actPdf,
          'result'=>$request->result,
          'r1M0'=>$request->r1M0,
          'r1M1'=>$request->r1M1,
          'r1M2'=>$request->r1M2,
          'r1M3'=>$request->r1M3,
          'r1M4'=>$request->r1M4,
          'r1M5'=>$request->r1M5,
          'r1M6'=>$request->r1M6,
          'r1M7'=>$request->r1M7,
          'r1M8'=>$request->r1M8,
          'r1M9'=>$request->r1M9,
          'r1M10'=>$request->r1M10,
          'r1M11'=>$request->r1M11,

          'r2M0'=>$request->r2M0,
          'r2M1'=>$request->r2M1,
          'r2M2'=>$request->r2M2,
          'r2M3'=>$request->r2M3,
          'r2M4'=>$request->r2M4,
          'r2M5'=>$request->r2M5,
          'r2M6'=>$request->r2M6,
          'r2M7'=>$request->r2M7,
          'r2M8'=>$request->r2M8,
          'r2M9'=>$request->r2M9,
          'r2M10'=>$request->r2M10,
          'r2M11'=>$request->r2M11,

          'r3M0'=>$request->r3M0,
          'r3M1'=>$request->r3M1,
          'r3M2'=>$request->r3M2,
          'r3M3'=>$request->r3M3,
          'r3M4'=>$request->r3M4,
          'r3M5'=>$request->r3M5,
          'r3M6'=>$request->r3M6,
          'r3M7'=>$request->r3M7,
          'r3M8'=>$request->r3M8,
          'r3M9'=>$request->r3M9,
          'r3M10'=>$request->r3M10,
          'r3M11'=>$request->r3M11,

          'r4M0'=>$request->r4M0,
          'r4M1'=>$request->r4M1,
          'r4M2'=>$request->r4M2,
          'r4M3'=>$request->r4M3,
          'r4M4'=>$request->r4M4,
          'r4M5'=>$request->r4M5,
          'r4M6'=>$request->r4M6,
          'r4M7'=>$request->r4M7,
          'r4M8'=>$request->r4M8,
          'r4M9'=>$request->r4M9,
          'r4M10'=>$request->r4M10,
          'r4M11'=>$request->r4M11,
        ])->setPaper('letter', 'landscape');
        //$pdfs = PDFS::loadHtml('<h3>'.$request->programa.'</h3>')->setPaper('letter', 'landscape');
        $pdfs->setOption('margin-top', 50);
        $pdfs->setOption('margin-bottom', 10);
        $pdfs->setOption('margin-left', 15);
        $pdfs->setOption('margin-right', 10);
        $pdfs->setOption('footer-font-size', 8);

        $pdfs->setOption('header-html', '<!DOCTYPE html><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <html><body>
          <table style="width:100%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
  <tr style="background: #ccc;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
    <th style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="5">PROGRAMA OPERATIVO ANUAL 2020</th>
  </tr>
  <tr style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
    <td rowspan="3" style="padding: 3px;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;"><img src="'.public_path('images/logoople.png').'" alt="OPLE" width="100px"></td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;width:29%;" colspan="2">Programa General:</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" rowspan="2">Ejercicio 2020</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" rowspan="2">Unidad Responsable:<br><strong>'.$request->unidadtit.'</strong></td>
  </tr>
  <tr style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Clave: <strong>'.$request->clave.'</strong></td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;"><strong>'.$request->protext.'</strong></td>
  </tr>

  <tr style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="2"><strong>'.$request->esptext.'</strong></td>
    <td style="text-align: left;border: 1px solid black;font-size: small;border-collapse: collapse;padding:0 0 0 5px;" colspan="4">Objetivo: <strong>'.$request->objetivo.'</strong></td>
  </tr>
  <tr style="border:1px solid #fff;border-bottom:1px solid #000;height:10px;">
    <td style="border:1px solid #fff;border-bottom:1px solid #000;" colspan="5"></td>
  </tr>
</table>

<table style="width:100%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">
  <tr style="background: #ccc;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse">

    <td style="width:2%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" rowspan="2">No.</td>
    <td style="width:30%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" rowspan="2">Actividad</td>

    <td style="width:16%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="3">Meta</td>

    <td style="width:30%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="12">Programación mensual</td>

    <td style="width:4%;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;" colspan="12">Fecha</td>
    
  </tr>
  <tr style="background: #eeeeee;text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse">
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse; with:6%;">Unidad de<br> medida</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse; with:10%;" colspan="2">Cantidad<br> anual</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Ene</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Feb</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Mar</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Abr</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">May</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Jun</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Jul</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Ago</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Sep</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Oct</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Nov</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse;">Dic</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse; width="2%">Inicio</td>
    <td style="text-align: center;border: 1px solid black;font-size: small;border-collapse: collapse; width="2%">Termino</td>
  </tr>
</table>

        </body></html>');
        //$pdfs->setOption('footer-html', date('Y-m-d H:i:s'));
        $pdfs->setOption('load-error-handling','ignore');
        //$pdfs->setOption('footer-right','[page] / [toPage]');
        return $pdfs->inline('reporte.pdf');


      }
      else
      {
        return redirect()->route('login');
      }       
    }


  /**
     * Funcionalidad: crea un pdf del indicador, apartir de los datos recibidos
     * Parametros: $request
     * Respuesta: regresa un pdf
     *
     * @return \Illuminate\Http\Response
     */

    public function pdfindicador(Request $request)
    {
      if ( Auth::check() )
      {   

        $id = $request->data;
        $indPdf = DB::table('infocedulas2020')->where('idcontrol', $id)->first();


        $pdfs = PDFS::loadView('pages.poa.pdfindicador',['indicadores'=>$indPdf])->setPaper('letter', 'portrait');
        $pdfs->setOption('margin-top', 10);
        $pdfs->setOption('margin-bottom', 10);
        $pdfs->setOption('margin-left', 15);
        $pdfs->setOption('margin-right', 10);
        $pdfs->setOption('footer-font-size', 8);

        //$pdfs->setOption('footer-html', date('Y-m-d H:i:s'));
        $pdfs->setOption('load-error-handling','ignore');
        //$pdfs->setOption('footer-right','[page] / [toPage]');
        return $pdfs->inline('indicador.pdf');


      }
      else
      {
        return redirect()->route('login');
      }       
    }


  /**
     * Funcionalidad: crea un pdf de las actividades adicionales, apartir de los datos recibidos
     * Parametros: $request
     * Respuesta: regresa un pdf
     *
     * @return \Illuminate\Http\Response
     */


    public function adicionales(Request $request)
    {
      if ( Auth::check() )
      {   
        #Validación de seleccion de combos
        //list( $rules, $messages ) = $this->_rulesindicadores();
        //$this->validate( $request, $rules, $messages ); 
         

        $idArea = Auth::user()->idarea;        
        $idMes = $request->idmesreporteadicional;      
        $infoadicional = Adicional::where('idarea', $idArea)->where('idmes', $idMes)->get();

        //if (empty($idArea)||empty($idMes)) {
        //    Alert::error('Seleccione un mes', '¡Error!')->autoclose(3500);
        //}

        if ($infoadicional->count() > 0)
        {
          $adicionales = array();      
          $adicionales['area'] = $infoadicional[0]['area'];
          $adicionales['mes'] = $infoadicional[0]['mes'];
          $adicionales['descadicional'] = nl2br($infoadicional[0]['descadicional']);
          $adicionales['soporteadicional'] = nl2br($infoadicional[0]['soporteadicional']);
          $adicionales['observaadicional'] = nl2br($infoadicional[0]['observaadicional']);

          //$pdf = PDF::loadView( 'pages.reportes.adicionales', ['adicionales'=>$adicionales] )->setPaper('letter', 'landscape');
         // return $pdf->stream();

        $pdfs = PDFS::loadView('pages.reportes.adicionales', ['adicionales'=>$adicionales])->setPaper('letter', 'landscape');
        $pdfs->setOption('margin-top', 22);
        $pdfs->setOption('margin-bottom', 10);
        $pdfs->setOption('margin-left', 10);
        $pdfs->setOption('margin-right', 10);
        $pdfs->setOption('footer-font-size', 8);

        $pdfs->setOption('header-html', '<!DOCTYPE html><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <html><body>
            <table border="0" align="center" width="100%">

            <tr style="border: 1px solid black;background:#fff; height:75px;">
              <th colspan="6">
              <img class="logo" src="'.public_path('images/logoople.png').'" width="100" style="position:absolute;top:0px;">
              ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 <br> Actividades Adicionales 
              </th>
            </tr>
          </table>
        </body></html>');
        //$pdfs->setOption('footer-html', date('Y-m-d H:i:s'));
        $pdfs->setOption('load-error-handling','ignore');
        $pdfs->setOption('footer-right','[page] / [toPage]');
        return $pdfs->inline('reporte.pdf');

        }
        else
        {          
          echo "<script>alert('No hay actividades adicionales en el mes seleccionado');</script>";
          echo "<script>window.close();</script>";  
          //Alert::error('No hay actividades adicionales en el mes seleccionado', '¡Error!')->autoclose(3500);
        }
      }
      else
      {
        return redirect()->route('login');
      }       
    }

    /**
     * Funcionalidad: realiza una busqueda apartir de los parametros recibidos
     * Parametros: $request
     * Respuesta: regresa la vista poatrimestralb junto con los datos seleccionados
     *
     * @return \Illuminate\Http\Response
     */

    public function trimestral(Request $request)
    {
      

      $idArea = $request->area_trim;      
      $idPrograma = $request->programa_trim;
      $idProgramaEsp = $request->programaEsp_trim;    
      $idTrimestre = $request->trimestre_trim; 
      //print_r($idProgramaEsp);exit;
      //if ($idArea==='0'||$idProgramaEsp==='0'||$idProgramaEsp==='0'||$idTrimestre==='0') {
      //   Alert::error('Los campos son requeridos', '¡Error!')->autoclose(3500);
      //}

      //print_r($aletipo);exit;

      if (empty($idArea)||empty($idPrograma)||empty($idProgramaEsp)||empty($idTrimestre)) {
         //Alert::error('Los campos son requeridos', '¡Error!')->autoclose(3500);
          return redirect()->route('admin.poa.trimestral');
         //print_r($idArea);exit;
      }

      //Obtengo los campos del área
      $areas = Area::where('idarea', $idArea)->get();
      $trim_idarea = $idArea;
      $trim_nombrearea = $areas[0]['nombrearea'];

      //Obtengo los campos del programa


      if ($idPrograma==4)      
        $programas = Programa::where('idprograma', '=', 4)->get();        
      else
        $programas = Programa::where('reprogramacion', '<', 3)->get();
      

      $trim_idprograma = $idPrograma;
      $trim_claveprograma = $programas[0]['claveprograma'];
      $trim_descprograma = $programas[0]['descprograma'];      

      $programas = Programa::where('reprogramacion', '<', 3)->get();
      //Obtengo los campos del programa especial o subprograma
      $programasesp = ProgramaEsp::where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->get();
      $trim_idprogramaesp = $idProgramaEsp;
      $trim_claveprogramaesp = $programasesp[0]['claveprogramaesp'];
      $trim_descprogramaesp = $programasesp[0]['descprogramaesp'];
      $trim_objprogramaesp = $programasesp[0]['objprogramaesp'];

      /*
      Este seria un each global porque se tienen que hacer por cada una de las actividades las sig operaciones:
      - recuperar el numero de la actividad, su descripcion, su unidad de medida y cantidad anual (estan en actividades)
      - recuperar los campos inicio y termino (estan en porcentajep)
      - Para el avance trimestral seleccionado, de la actividad involucrada:
          recuperar los meses programados y sumar esas cantidades (estan en porcentajep)
          recuperar los meses realizados y sumas esas cantidades (estan en porcentajer)
          calcular la variacion (pendiente la formula)
      - Para el avance acumulado de la actividad involucrada:          
          recuperar los meses programados desde enero hasta el mes final que se obtiene con el ultimo del trimestral
          recuperar los meses realizados desde enero hasta el mes final que se obtiene con el ultimo del trimestral
          calcula la variacion
      - En base a los cálculos trimestrales, guardar (aun se verá en donde) la observacion pertinente:
          Meta Cumplida en su totalidad
          Meta Rebasada          
          personalizada tal como : Meta No Cumplida Por no registrarse Organizaciones de Observadores Electorales

      */      
      $actividades = Actividad::where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->where('reprogramacion','<=',3)->orderBy('numactividad')->get();   
      DB::table('trimestral')->truncate();     
      foreach ($actividades as $acti)
      {
        $reprogramacion = $acti->reprogramacion;
        $trim_numactividad = $acti->numactividad;
        $trim_descactividad = $acti->descactividad;
        $trim_unidadmedida = $acti->unidadmedida;
        $trim_cantidadanual = $acti->cantidadanual;
        $actiporcentajep = $acti->idporcentajep;
        $actiporcentajer = $acti->idporcentajer;
        $trim_idactividad = $acti->idporcentajep;        
        $bandera = $acti->bandera;
        $reprog =  $acti->reprogramacion;


        //cambio del segundo trimestre
        //si es 1 ya se cerré ese trimestre
        $trim1cerrado = $acti->trim1cerrado;
        $trim2cerrado = $acti->trim2cerrado;
        $trim3cerrado = $acti->trim3cerrado;
        $trim4cerrado = $acti->trim4cerrado;
        $bandera4 = $acti->bandera4;

        //fin del cambio


        
        $porcentajep = PorcProgramado::where('idporcentajep', $actiporcentajep)->get();
        $trim_inicio = $porcentajep[0]->inicio;
        $trim_termino = $porcentajep[0]->termino;

        //recuperar los meses programados, realizados y sumar esas cantidades (estan en porcentajep y porcentajer)
        //recuperar los meses programados desde enero hasta el mes final que se obtiene con el ultimo del trimestral
        $porcentajer = PorcRealizado::where('idporcentajer', $actiporcentajer)->get();
        switch($idTrimestre)
        {          
          case 1:
            $periodotrimestral = "Enero - Marzo";
            $avtprogramado = $porcentajep[0]->enep + $porcentajep[0]->febp + $porcentajep[0]->marp;            
            $avtrealizado = $porcentajer[0]->ener + $porcentajer[0]->febr + $porcentajer[0]->marr;
            $avaprogramado = $porcentajep[0]->enep + $porcentajep[0]->febp + $porcentajep[0]->marp;            
            $avarealizado = $porcentajer[0]->ener + $porcentajer[0]->febr + $porcentajer[0]->marr;
            break;
          case 2:
            $periodotrimestral = "Abril - Junio";
            $avtprogramado = $porcentajep[0]->abrp + $porcentajep[0]->mayp + $porcentajep[0]->junp;
            $avtrealizado = $porcentajer[0]->abrr + $porcentajer[0]->mayr + $porcentajer[0]->junr;
            $avaprogramado = $porcentajep[0]->enep + $porcentajep[0]->febp + $porcentajep[0]->marp + $porcentajep[0]->abrp + $porcentajep[0]->mayp + $porcentajep[0]->junp;
            $avarealizado = $porcentajer[0]->ener + $porcentajer[0]->febr + $porcentajer[0]->marr + $porcentajer[0]->abrr + $porcentajer[0]->mayr + $porcentajer[0]->junr;
            break;
          case 3:
            $periodotrimestral = "Julio - Septiembre";
            $avtprogramado = $porcentajep[0]->julp + $porcentajep[0]->agop + $porcentajep[0]->sepp;
            $avtrealizado = $porcentajer[0]->julr + $porcentajer[0]->agor + $porcentajer[0]->sepr;
            $avaprogramado = $porcentajep[0]->enep + $porcentajep[0]->febp + $porcentajep[0]->marp + $porcentajep[0]->abrp + $porcentajep[0]->mayp + $porcentajep[0]->junp + $porcentajep[0]->julp + $porcentajep[0]->agop + $porcentajep[0]->sepp;
            $avarealizado = $porcentajer[0]->ener + $porcentajer[0]->febr + $porcentajer[0]->marr + $porcentajer[0]->abrr + $porcentajer[0]->mayr + $porcentajer[0]->junr + $porcentajer[0]->julr + $porcentajer[0]->agor + $porcentajer[0]->sepr;
            break;            
          case 4:
            $periodotrimestral = "Octubre - Diciembre";
            $avtprogramado = $porcentajep[0]->octp + $porcentajep[0]->novp + $porcentajep[0]->dicp;
            $avtrealizado = $porcentajer[0]->octr + $porcentajer[0]->novr + $porcentajer[0]->dicr;
            $avaprogramado = $porcentajep[0]->enep + $porcentajep[0]->febp + $porcentajep[0]->marp + $porcentajep[0]->abrp + $porcentajep[0]->mayp + $porcentajep[0]->junp + $porcentajep[0]->julp + $porcentajep[0]->agop + $porcentajep[0]->sepp + $porcentajep[0]->octp + $porcentajep[0]->novp + $porcentajep[0]->dicp;
            $avarealizado = $porcentajer[0]->ener + $porcentajer[0]->febr + $porcentajer[0]->marr + $porcentajer[0]->abrr + $porcentajer[0]->mayr + $porcentajer[0]->junr + $porcentajer[0]->julr + $porcentajer[0]->agor + $porcentajer[0]->sepr + $porcentajer[0]->octr + $porcentajer[0]->novr + $porcentajer[0]->dicr;            
            break;            
        }

        //se calcula la variacion del avance trimestral
        $resta = $avtrealizado - $avtprogramado;
        if ( ($resta != 0) && ($avtprogramado != 0) )
          $avtvariacion = ($resta * 100) / $avtprogramado;
        else
          $avtvariacion = 0;

        //se calcula la cantidad y porcentaje de variacion del avance acumulado
        $avacantidad = $avarealizado - $avaprogramado;
        if ( ($avacantidad != 0) && ($avaprogramado != 0) )
          $avaporcentaje = ($avacantidad * 100) / $avaprogramado;
        else
          $avaporcentaje = 0;

        //faltan las observaciones que se guardaran en la tabla trimestral en el campo observatrim
        // y guardarlo al mismo tiempo en otro campo en la tabla actividades, la cual debe de tener
        //cuatro campos de observaciones, uno por cada trimestre.
        //si $avaporcentaje = 0 "META CUMPLIDA"
        //si $avaporcentaje = -100 "META NO CUMPLIDA"
        //si $avaporcentaje <=-1 y >-100 "META PARCIALMENTE CUMPLIDA"
        //si $avaporcentaje > 0 "META REBASADA"

        //Consideraciones para "SIN VARIACION"
        


/*****Aqui comienzan los cambios derivados del segundo trimestre ***/

      

        if ($idTrimestre==1)
        {
          if ($trim1cerrado==1)
            $observatrim = $acti->observatrim;
          else
          {
            if ($bandera == 0 )
            {
              if ($reprog == 3)
                $observatrim = "Actividad afectada por la reprogramación de fecha 11 de marzo de 2019 según Acuerdo OPLEV/CG034/2019";
              else          
                if (($avtprogramado == $avtrealizado) && ($avtprogramado!=0))
                  $observatrim = "Meta Cumplida";
                else 
                  if (($avtprogramado == 0) && ($avaprogramado == 0))
                    $observatrim = "Sin Variación";
                  else
                    if ($avaporcentaje == -100)
                      $observatrim = "Meta No Cumplida";
                    else
                      if ( ($avaporcentaje < 0) && ($avaporcentaje > -100) )
                        $observatrim = "Meta Parcialmente Cumplida";
                      else
                        if ($avaporcentaje > 0)
                          $observatrim = "Meta Rebasada";
                        else 
                          $observatrim = "";
            }
            else
              $observatrim = $acti->observatrim;

            //Ahora hay que guardar la observacion en la tabla actividades 
            //en la actividad numero trim_idactividad
            if ($bandera == 0 )
              Actividad::where('autoactividades',$trim_idactividad)->update(['observatrim' => $observatrim]);             
          }          
        }
        else
        {
          if ($idTrimestre==2)
          {

            /*
            var_dump($avtprogramado);
            var_dump($avtrealizado);
            die();*/

            if ($trim2cerrado==1)
              $observatrim = $acti->observatrim2;
            else            
            {
              if ($bandera2 == 0 )
              {
                if ($reprog == 3)
                  $observatrim = "Actividad afectada por la reprogramación de fecha 11 de marzo de 2019 según Acuerdo OPLEV/CG034/2019";
                else          
                  if (($avtprogramado == $avtrealizado) && ($avtprogramado!=0))
                    $observatrim = "Meta Cumplida";
                  else 
                    if (($avtprogramado == 0) && ($avaprogramado == 0))
                      $observatrim = "Sin Variación";
                    else
                      if ($avaporcentaje == -100)
                        $observatrim = "Meta No Cumplida";
                      else
                        if ( ($avaporcentaje < 0) && ($avaporcentaje > -100) )
                          $observatrim = "Meta Parcialmente Cumplida";
                        else
                          if ($avaporcentaje > 0)
                            $observatrim = "Meta Rebasada";
                          else 
                            $observatrim = "";
              }
              else
                $observatrim = $acti->observatrim2;

              //Ahora hay que guardar la observacion en la tabla actividades 
              //en la actividad numero trim_idactividad
              if ($bandera2 == 0 )
                Actividad::where('autoactividades',$trim_idactividad)->update(['observatrim2' => $observatrim]);             
            } 

          }
          else
          {


            if ($idTrimestre==3)
            {

              /*
              var_dump($avtprogramado);
              var_dump($avtrealizado);
              die();*/

              if ($trim3cerrado==1)
                $observatrim = $acti->observatrim3;
              else            
              {
                if ($bandera3 == 0 )
                {
                  if ($reprog == 3)
                    $observatrim = "Actividad afectada por la reprogramación de fecha 11 de marzo de 2019 según Acuerdo OPLEV/CG034/2019";
                  else          
                    //if (($avtprogramado == $avtrealizado) && ($avtprogramado!=0))
                    if (($avtprogramado == $avtrealizado) && ($avaprogramado == $avarealizado) && ($avarealizado!=0))
                      $observatrim = "Meta Cumplida";
                    else 
                      if (($avtprogramado == 0) && ($avaprogramado == 0))
                        $observatrim = "Sin Variación";
                      else
                        if ($avaporcentaje == -100)
                          $observatrim = "Meta No Cumplida";
                        else
                          if ( ($avaporcentaje < 0) && ($avaporcentaje > -100) )
                            $observatrim = "Meta Parcialmente Cumplida";
                          else
                            if ($avaporcentaje > 0)
                              $observatrim = "Meta Rebasada";
                            else 
                              $observatrim = "";
                }
                else
                  $observatrim = $acti->observatrim3;

                //Ahora hay que guardar la observacion en la tabla actividades 
                //en la actividad numero trim_idactividad
                if ($bandera3 == 0 )
                  Actividad::where('autoactividades',$trim_idactividad)->update(['observatrim3' => $observatrim]);
              } 
            }
            else
            {



              if ($idTrimestre==4)
              {

                /*
                var_dump($avtprogramado);
                var_dump($avtrealizado);
                die();*/

                if ($trim4cerrado==1)
                  $observatrim = $acti->observatrim4;
                else            
                {
                  if ($bandera4 == 0 )
                  {
                    if ($reprog == 3)
                      $observatrim = "Actividad afectada por la reprogramación de fecha 11 de marzo de 2019 según Acuerdo OPLEV/CG034/2019";
                    else          
                      //if (($avtprogramado == $avtrealizado) && ($avtprogramado!=0))
                      if (($avtprogramado == $avtrealizado) && ($avaprogramado == $avarealizado) && ($avarealizado!=0))
                        $observatrim = "Meta Cumplida";
                      else 
                        if (($avtprogramado == 0) && ($avaprogramado == 0))
                          $observatrim = "Sin Variación";
                        else
                          if ($avaporcentaje == -100)
                            $observatrim = "Meta No Cumplida";
                          else
                            if ( ($avaporcentaje < 0) && ($avaporcentaje > -100) )
                              $observatrim = "Meta Parcialmente Cumplida";
                            else
                              if ($avaporcentaje > 0)
                                $observatrim = "Meta Rebasada";
                              else 
                                $observatrim = "";
                  }
                  else
                    $observatrim = $acti->observatrim4;

                  //Ahora hay que guardar la observacion en la tabla actividades 
                  //en la actividad numero trim_idactividad
                  if ($bandera4 == 0 )
                    Actividad::where('autoactividades',$trim_idactividad)->update(['observatrim4' => $observatrim]);
                }
              }              
            }
            //del idTrimestre==3
          }
          //del idTrimestre==2
        }
        //fin del else del segundo trimestre






        // Termina el cambio  

        //Ahora hay que guardar la observacion en la tabla actividades 
        //en la actividad numero trim_idactividad

        if ($bandera == 0 )
          Actividad::where('autoactividades',$trim_idactividad)->update(['observatrim' => $observatrim]);        


        //ahora vamos a guardar en la tabla auxiliar trimestral
        $arrTrimestral = array(     
          'reprogramacion' => $reprogramacion,     
          'idactividad' => $trim_idactividad,
          'idtrimestral' => $idTrimestre,
          'periodotrimestral' => $periodotrimestral,
          'idarea' => $trim_idarea,
          'nombrearea' => $trim_nombrearea,
          'idprograma' => $trim_idprograma,
          'claveprograma' => $trim_claveprograma,
          'descprograma' => $trim_descprograma,
          'idprogramaesp' => $trim_idprogramaesp,
          'claveprogramaesp' => $trim_claveprogramaesp,
          'descprogramaesp' => $trim_descprogramaesp,
          'objprogramaesp' => $trim_objprogramaesp,
          'numactividad' => $trim_numactividad,
          'descactividad' => $trim_descactividad,
          'unidadmedida' => $trim_unidadmedida,
          'cantidadanual' => $trim_cantidadanual,
          'inicio' => $trim_inicio,
          'termino' => $trim_termino,
          'avtprogramado' => $avtprogramado,
          'avtrealizado' => $avtrealizado,
          'avtvariacion' => $avtvariacion,
          'avaprogramado' => $avaprogramado,
          'avarealizado' => $avarealizado,
          'avacantidad' => $avacantidad,
          'avaporcentaje' => $avaporcentaje,
          'observatrim' => $observatrim
          );

        DB::table('trimestral')->insert($arrTrimestral);

      }

      $areas = Area::all();
      $trimestres = Trimestre::all();
      $programas = Programa::where('reprogramacion', '<', 3)->get(); 

      $user   = auth()->user();
      $areaId = $user->idarea;    

      $programaesp = ProgramaEsp::where('idprograma', $idPrograma)->where('idarea', $idArea)->get();
      $trimestral = Trimestral::all();
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

          return view('pages.admin.poatrimestralb')->with( compact('areas', 'trimestres', 'programas', 'programaesp', 'action', 'arrTrimestral', 'trimestral','nfin', 'alertasfin','nalertas', 'alertas','observaciones','observacionesR'));



     
    }


    /**
     * Funcionalidad: crea un pdf de trimestrales, apartir de los datos recibidos
     * Parametros: $request
     * Respuesta: regresa un pdf
     *
     * @return \Illuminate\Http\Response
     */


    public function poatrimestral(Request $request)
    {
      if ( Auth::check() )
      {      
        $trimestral = Trimestral::all();

        //$pdf = PDF::loadView( 'pages.reportes.trimestrales', ['trimestral'=>$trimestral] )->setPaper('legal', 'landscape');
        //return $pdf->stream();

        $pdfs = PDFS::loadView('pages.reportes.trimestrales', ['trimestral'=>$trimestral])->setPaper('legal', 'landscape');
        $pdfs->setOption('margin-top', 55);
        $pdfs->setOption('margin-bottom', 10);
        $pdfs->setOption('margin-left', 10);
        $pdfs->setOption('margin-right', 10);
        $pdfs->setOption('footer-font-size', 8);


        $pdfs->setOption('header-html', '<!DOCTYPE html><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <html><body>
            <table border="0" align="center" width="100%">

            <tr style="border: 1px solid black;background:#fff; height:75px;">
              <th colspan="6">
              ORGANISMO PÚBLICO LOCAL ELECTORAL <br> Programa Operativo Anual 2019 
              </th>
            </tr>
          </table>

  <table border="1" style="border-collapse: collapse;">
    <tr style="border: 1px solid black;">
      <td rowspan="3" style="border: 1px solid black;text-align: center;font-size: 13px;padding: 10px 0 10px 5px;" width="8%"><img class="logo" src="'.public_path('images/logoople.png').'" width="100"></td>
      <td style="border: 1px solid black;text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;" width="8%">Programa</td>      
      <td style="border: 1px solid black;font-size: 13px;padding: 10px 0 10px 5px;" width="35%">'.$trimestral[0]->descprograma.'</td>
      <td style="border: 1px solid black;text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;"  width="10%">Unidad Responsable<br><span>'.$trimestral[0]->nombrearea.'</span></td>
    </tr>
    <tr style="border: 1px solid black;">
      <td width="8%" style="border: 1px solid black;text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Programa Específico</td>
      <td style="border: 1px solid black;font-size: 13px;padding: 10px 0 10px 5px;" width="35%">'.$trimestral[0]->descprogramaesp.'</td>
      <td width="10%" style="border: 1px solid black;text-align: center;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Periodo Trimestral<br><span>'.$trimestral[0]->periodotrimestral.'</span></td>
    </tr>
    <tr style="border: 1px solid black;">
      <td width="8%" style="border: 1px solid black;text-align: left;font-size: 13px;padding: 10px 0 10px 5px; background:#ccc;font-weight: bold;">Objetivo</td>
      <td colspan="2" width="60%" style="border: 1px solid black;font-size: 13px;padding: 10px 0 10px 5px;">'.$trimestral[0]->objprogramaesp.'</td>
    </tr>
  </table>

        </body></html>');
        //$pdfs->setOption('footer-html', date('Y-m-d H:i:s'));
        //dd($trimestral);exit();
        $pdfs->setOption('load-error-handling','ignore');
        $pdfs->setOption('footer-right','[page] / [toPage]');
        return $pdfs->inline('reporte.pdf');

      
      }
      else
      {
        return redirect()->route('login');
      }  
    }

















}
