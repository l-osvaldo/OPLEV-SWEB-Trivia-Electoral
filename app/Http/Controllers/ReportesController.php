<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Mes, ProgramaEsp, Actividad, PorcProgramado, PorcRealizado, DetalleActi, Area, Programa, InfoCedula, Adicional, Trimestre, Trimestral};
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
      if (Auth::check())
      {
        
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        {          
          $meses = Mes::all();
          $areas = Area::all();
          $programas = DB::table('programas')->where('idprograma', '<>', 2)->get();
          $action = route('reportes.indicadores');

          return view('pages.admin.repindicadores')->with( compact('action', 'programas', 'meses', 'areas'));
        }
        else
        { 
          $meses = Mes::all();      
          $programas = DB::table('programas')->where('idprograma', '<>', 2)->get();
          $action = route('reportes.indicadores');
          return view('pages.reportes.repindicadores')->with( compact('action', 'programas', 'meses'));
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
          //return view('pages.reportes.new_poa', ['poa'=>$poa] );
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
            $indicadores['resultado'] = ($real[0][$colmesr]*100)/$meta[0][$colmesp];
            $indicadores['variacion'] = $indicadores['resultado'] - 100;
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

        $pdf = PDF::loadView( 'pages.reportes.indicadores', ['indicadores'=>$indicadores] )->setPaper('letter', 'landscape');
        return $pdf->stream();

      
      }
      else
      {
        return redirect()->route('login');
      }  
    }



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

        if ($infoadicional->count() > 0)
        {
          $adicionales = array();      
          $adicionales['area'] = $infoadicional[0]['area'];
          $adicionales['mes'] = $infoadicional[0]['mes'];
          $adicionales['descadicional'] = $infoadicional[0]['descadicional'];
          $adicionales['soporteadicional'] = $infoadicional[0]['soporteadicional'];
          $adicionales['observaadicional'] = $infoadicional[0]['observaadicional'];

          $pdf = PDF::loadView( 'pages.reportes.adicionales', ['adicionales'=>$adicionales] )->setPaper('letter', 'landscape');
          return $pdf->stream();
        }
        else
        {          
          echo "<script>alert('No hay actividades adicionales en el mes seleccionado');</script>";
          echo "<script>window.close();</script>";  
        }
      }
      else
      {
        return redirect()->route('login');
      }       
    }


    public function trimestral(Request $request)
    {
      

      $idArea = $request->area_trim;      
      $idPrograma = $request->programa_trim;
      $idProgramaEsp = $request->programaEsp_trim;    
      $idTrimestre = $request->trimestre_trim; 

      //Obtengo los campos del área
      $areas = Area::where('idarea', $idArea)->get();
      $trim_idarea = $idArea;
      $trim_nombrearea = $areas[0]['nombrearea'];

      //Obtengo los campos del programa
      $programas = Programa::where('idprograma', '=', 1)->get();
      $trim_idprograma = $idPrograma;
      $trim_claveprograma = $programas[0]['claveprograma'];
      $trim_descprograma = $programas[0]['descprograma'];      

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
      $actividades = Actividad::where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->get();   
      DB::table('trimestral')->truncate();     
      foreach ($actividades as $acti)
      {
        $trim_numactividad = $acti->numactividad;
        $trim_descactividad = $acti->descactividad;
        $trim_unidadmedida = $acti->unidadmedida;
        $trim_cantidadanual = $acti->cantidadanual;
        $actiporcentajep = $acti->idporcentajep;
        $actiporcentajer = $acti->idporcentajer;
        $trim_idactividad = $acti->idporcentajep;        
        $bandera = $acti->bandera;
        
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

        if ($bandera == 0 )
        {
          if ($avaporcentaje == 0)
            $observatrim = "META CUMPLIDA";
          if ($avaporcentaje == -100)
            $observatrim = "META NO CUMPLIDA";
          if ( ($avaporcentaje < 0) && ($avaporcentaje > -100) )
            $observatrim = "META PARCIALMENTE CUMPLIDA";
          if ($avaporcentaje > 0)
            $observatrim = "META REBASADA";
        }
        else
          $observatrim = $acti->observatrim;

        //Ahora hay que guardar la observacion en la tabla actividades 
        //en la actividad numero trim_idactividad

        if ($bandera == 0 )
          Actividad::where('autoactividades',$trim_idactividad)->update(['observatrim' => $observatrim]);        


        //ahora vamos a guardar en la tabla auxiliar trimestral
        $arrTrimestral = array(          
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
      $programas = DB::table('programas')->where('idprograma', '=', 1)->get();
      $programaesp = ProgramaEsp::where('idprograma', $idPrograma)->where('idarea', $idArea)->get();
      $trimestral = Trimestral::all();
      $action = route('reportes.trimestral');
      return view('pages.admin.poatrimestralb')->with( compact('areas', 'trimestres', 'programas', 'programaesp', 'action', 'arrTrimestral', 'trimestral'));
    }




    public function poatrimestral(Request $request)
    {
      if ( Auth::check() )
      {      
        $trimestral = Trimestral::all();

        $pdf = PDF::loadView( 'pages.reportes.trimestrales', ['trimestral'=>$trimestral] )->setPaper('letter', 'landscape');
        return $pdf->stream();

      
      }
      else
      {
        return redirect()->route('login');
      }  
    }

















}
