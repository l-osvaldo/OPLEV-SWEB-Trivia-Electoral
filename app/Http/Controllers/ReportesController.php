<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Mes, ProgramaEsp, Actividad, PorcProgramado, PorcRealizado, DetalleActi, Area, Programa, InfoCedula};
use DB;
use Auth;
use PDF;
use Illuminate\Support\Facades\Input;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $meses = Mes::all();      
      $programas = DB::table('programas')->where('idprograma', '<>', 2)->get();
      $action = route('reportes.poa');
      return view('pages.reportes.reppoa')->with( compact('action', 'programas', 'meses'));
    }


    public function indexindicador()
    {
      $meses = Mes::all();      
      $programas = DB::table('programas')->where('idprograma', '<>', 2)->get();
      $action = route('reportes.indicadores');
      return view('pages.reportes.repindicadores')->with( compact('action', 'programas', 'meses'));
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


    public function poa(Request $request)
    {
      if ( Auth::check() )
      {
        #Validación de seleccion de combos
        list( $rules, $messages ) = $this->_rulespoa();
        $this->validate( $request, $rules, $messages );

        $idArea = Auth::user()->idarea;        
        $idMes = $request->idmesreportar;      
        $idPrograma = $request->programa;
        $idProgramaEsp = $request->programaEsp;

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
          and actividades.idprogramaesp = 2 
          and actividades.idarea = 2 and detalleactividades.idmes = 1
        */

        $poa = array();
        $poa['resultado'] = Actividad::where('actividades.idprograma', $idPrograma)->
          where('actividades.idprogramaesp', $idProgramaEsp)->where('actividades.idarea', $idArea)->
          where('detalleactividades.idmes', $idMes)->
          leftjoin('porcentajep', 'porcentajep.idporcentajep', 'actividades.idporcentajep')->leftjoin('porcentajer', 'porcentajer.idporcentajer', 'actividades.idporcentajer')->leftjoin('detalleactividades', 'detalleactividades.autoactividades', 'actividades.autoactividades')->get();

        
        $poa['nombrearea'] = $area[0]->nombrearea;
        $poa['idmes'] = $idMes;        
        $poa['mes'] = $arrMeses[$idMes];
        $poa['programa'] = $programa[0]->claveprograma.' - '.$programa[0]->descprograma;
        $poa['programaesp'] = $programaesp[0]->claveprogramaesp.' - '.$programaesp[0]->descprogramaesp;
        $poa['objetivo'] = $programaesp[0]->objprogramaesp;        
        $pdf = PDF::loadView( 'pages.reportes.poa', ['poa'=>$poa] )->setPaper('letter', 'landscape');
        return $pdf->stream();
      }
      else
      {
        return redirect()->route('login');
      }      
    }


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


    public function indicadores(Request $request)
    {
      if ( Auth::check() )
      {      
        #Validación de seleccion de combos
        list( $rules, $messages ) = $this->_rulesindicadores();
        $this->validate( $request, $rules, $messages );  

        $idArea = Auth::user()->idarea;        
        $idMes = $request->idmesreportar;      
        $idPrograma = $request->programa;
        $idProgramaEsp = $request->programaEsp;    
        $idActividad = $request->actividades;    
        $arrMeses = [0,'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
        $area = Area::select('nombrearea')->where('idarea', $idArea)->get();            
        $infocedula = InfoCedula::where('idcontrol', $idActividad)->get();

        $programado = [0,'enep','febp','marp','abrp','mayp','junp','julp','agop','sepp','octp','novp','dicp'];     
        $colmesp = $programado[$idMes];
        $meta = PorcProgramado::select($colmesp)->where('idporcentajep', $idActividad)->get();

        $realizado = [0,'ener','febr','marr','abrr','mayr','junr','julr','agor','sepr','octr','novr','dicr'];     
        $colmesr = $realizado[$idMes];
        $real = PorcRealizado::select($colmesr)->where('idporcentajer', $idActividad)->get();

        if ($meta[0][$colmesp]!=0)
          $resultado = ($real[0][$colmesr]*100)/$meta[0][$colmesp];
        else
          $resultado = 100;

        $variacion = $resultado - 100;


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

        //var_dump($infocedula[0]['nombreindicador']);
        //die();
        $indicadores = array();      
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
        $indicadores['resultado'] = $resultado;
        $indicadores['variacion'] = $variacion;
        $indicadores['observaciones'] = $observa[0]['observaciones'];
        $indicadores['nombretitular'] = $infocedula[0]['nombretitular'];
        $indicadores['cargo'] = $infocedula[0]['cargo'];

        $pdf = PDF::loadView( 'pages.reportes.indicadores', ['indicadores'=>$indicadores] )->setPaper('letter', 'landscape');
        return $pdf->stream();
      }
      else
      {
        return redirect()->route('login');
      }  
    }
}
