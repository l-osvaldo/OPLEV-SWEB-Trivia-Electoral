<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Mes, ProgramaEsp, Actividad, PorcProgramado, PorcRealizado, DetalleActi, Area, Programa, InfoCedula, Adicional, Trimestre, Trimestral};
use DB;
use Auth;
use App\Alerta;
use App\actividadesdos;
use App\porcprogramado2020;
use App\observaciones;
use App\porcrealizado2020;
use App\programasesp2020;
use Alert;

class PoaController extends Controller
{
    /**
     * Funcionalidad: Busca la vista principal del sistema junto con los datos que la componen
     * Parametros:
     * Respuesta: la vista y los datos encontrados
     *
     */
    public function index()
    {

      if (Auth::check())
      {
        
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        {          
          $meses = Mes::all();
          $areas = Area::all();
          $programas = Programa::where('reprogramacion', '<', 3)->get();
          $action = route('admin.store');

          /////////////////////////////////////////////////////////////////////////////////////////
          $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('created_at', 'desc')->take(10)->get();
          $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();

          $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('created_at', 'desc')->take(15)->get();
          $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
          $observaciones = DB::table('observaciones')->where('obs_status', 0)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
          ->orderBy('obs_date', 'desc')->get();

          $observacionesR = DB::table('observaciones')->where('obs_status', 1)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->orderBy('obs_date', 'desc')->get();
          /////////////////////////////////////////////////////////////////////////////////////////
          return view('pages.admin.index')->with( compact('meses', 'areas', 'programas', 'action', 'alertas', 'nalertas', 'alertasfin', 'nfin','observaciones','observacionesR'));
        }
        else
        { 
          $user   = auth()->user();
          $areaId = $user->idarea;
          $meses = Mes::all();
          $observaciones = DB::table('observaciones')->where('obs_status', 0)->where('obs_id_area', $areaId)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->orderBy('obs_date', 'desc')->get();

          $observacionesR = DB::table('observaciones')->where('obs_status', 3)->orWhere('obs_status', '4')->where('obs_id_area', $areaId)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->orderBy('obs_date', 'desc')->get();
          $observacionesRn = DB::table('observaciones')->where('obs_status', 3)->where('obs_id_area', $areaId)->get();
          return view('pages.poa.index')->with( compact('meses','observaciones','observacionesR','observacionesRn'));
        }
      }
      else
      {
        return redirect()->route('login');
      }
    }

    /**
     * Funcionalidad: Busca la vista create del sistema junto con los datos que la componen
     * Parametros:
     * Respuesta: la vista y los datos encontrados
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
      if ( Auth::check() )
      {

        if ( empty($request->input('idmesreportar')) ) {
         //Alert::error('Seleccione un mes', '¡Error!')->autoclose(3500);
          return redirect()->route('index');
        }
        #Validación del mes a reportar
        list( $rules, $messages ) = $this->_rules();
        $this->validate( $request, $rules, $messages );

        $idmesreportar = $request->input('idmesreportar');
        $mes = Mes::select('mes')->where('idmes', $idmesreportar)->get();
        //si el area es prerrogativas
        if (Auth::user()->idarea==3)        
          $programas = Programa::where('reprogramacion', '<', 3)->get();
        else
          $programas = Programa::where('idprograma', '=', 1)->get();
        $action = route('programa.store');
        $user   = auth()->user();
        $areaId = $user->idarea;
        $observaciones = DB::table('observaciones')->where('obs_status', 0)->where('obs_id_area', $areaId)
        ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
        ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
        ->orderBy('obs_date', 'desc')->get();

        $observacionesR = DB::table('observaciones')->where('obs_status', 3)->orWhere('obs_status', '4')->where('obs_id_area', $areaId)
        ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
        ->orderBy('obs_date', 'desc')->get();
        $observacionesRn = DB::table('observaciones')->where('obs_status', 3)->where('obs_id_area', $areaId)->get();
        
        return view('pages.poa.create')->with( compact('idmesreportar', 'programas', 'action', 'mes','observaciones','observacionesR','observacionesRn') );
      }
      else
      {
        return redirect()->route('login');
      }
    }

    /**
     * Funcionalidad: Busca, actulaiza y registra los datos conforme alos parametros de llegada
     * Parametros: $request
     * Respuesta: Derireccion a la vista principal del sistema
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //tengo que conseguir el idmes y el autoactividades
      $nactividad = explode("&&&", $request->input('actividades'));
      $autoactividades = $nactividad[0];
      $idmesreportar = $request->input('idmesreportar');

      //en tabla porcentajer se guarda el input realizadomes en la columna del mes correspondiente:
      //ener,febr,marr,abrr, etc
      $realizadomes = $request->input('realizadomes');
      $realizado = [0,'ener','febr','marr','abrr','mayr','junr','julr','agor','sepr','octr','novr','dicr'];
      $realizadoc = [0,'enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];     
      $mes = $realizado[$idmesreportar];
      $mesc = $realizadoc[$idmesreportar];
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

      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

      $user   = auth()->user();
      $userId = $user->id;
      $userName = $user->name;
      $acronimo = $user->usu_acronimo;

      $nomenclatura = explode(",", $request->input('programaEsp'));
      $id_programa = $nomenclatura[1];
      $num_actividad = $nactividad[1];

      $fmes = substr($mes, 0, -1);
      
      $ale = Alerta::where('ale_id_usuario', $userId)->where('ale_clase', 'final')->where('ale_mes', $mesc)->get();
      //dd($ale);exit();
      $ale->isEmpty() ? $aletipo = 'dentro' : $aletipo = 'fuera';
      //print_r($aletipo);exit;

      $alerta = new Alerta();
      $alerta->ale_actividad = $userName;

      $alerta->ale_acronimo = $acronimo;
      $alerta->ale_id_programa = $id_programa;
      $alerta->ale_num_actividad = $num_actividad;
      $alerta->ale_desc_actividad = $nactividad[2];

      $alerta->ale_tipo = 1;
      $alerta->ale_clase = 'edicion';
      $alerta->ale_id_usuario = $userId;
      $alerta->ale_tiempo = $aletipo;
      $alerta->ale_mes = $mesc;
      $alerta->ale_date = date('Y-m-d H:i:s');
      $alerta->save();
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
      Alert::success('', 'Actividad guardada')->autoclose(3500);
      return redirect()->route('programa.index');
    }

    /**
     * Funcionalidad: Actulaiza el estatus de las alertas
     * Parametros:
     * Respuesta: json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clickalertas()
    {
        //
        DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->update(['ale_tipo' => 0]);
        return response()->json(['edicion']);
    }

    /**
     * Funcionalidad: Abilita o deshabilita el sistema en general
     * Parametros:
     * Respuesta: json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sistemonoff()
    {
      $meses = Mes::all();
          $areas = Area::all();
          $programas = Programa::where('reprogramacion', '<', 3)->get();
          $action = route('admin.store');

          /////////////////////////////////////////////////////////////////////////////////////////
          $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('created_at', 'desc')->take(10)->get();
          $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();

          $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('created_at', 'desc')->take(15)->get();
          $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
          $observaciones = DB::table('observaciones')->where('obs_status', 0)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
          ->orderBy('obs_date', 'desc')->get();

          $observacionesR = DB::table('observaciones')->where('obs_status', 1)
          ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
          ->orderBy('obs_date', 'desc')->get();
          /////////////////////////////////////////////////////////////////////////////////////////
          return view('pages.admin.sistemonoff')->with( compact('meses', 'areas', 'programas', 'action', 'alertas', 'nalertas', 'alertasfin', 'nfin','observaciones','observacionesR'));
    }

    /**
     * Funcionalidad: Abilita o deshabilita el sistema en general
     * Parametros:
     * Respuesta: json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function onOffsipsei(Request $request)
    {
      if (Auth::check()) {

      if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        {          
            
          $data = $request->data;

            DB::table('actividadesdos')->update(['act_tipo_estatus' => $data]);
            return response()->json(['listo']);

        }
        else { 
          return route('auth/login');
        }
      }
      else {
        return route('auth/login');
      }
    }

    /**
     * Funcionalidad: Actulaiza el estatus de las alertas para las observaciones
     * Parametros:
     * Respuesta: json
     *
     */

    public function clickalertasobs()
    {
        //
        DB::table('observaciones')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->update(['ale_tipo' => 0]);
        return response()->json(['edicion']);
    }

    /**
     * Funcionalidad: Actulaiza el estatus de las alertas
     * Parametros:
     * Respuesta: json
     *
     */

    public function clickalertasfin()
    {
        //
        DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->update(['ale_tipo' => 0]);
        return response()->json(['fin']);
    }


     /**
     * Funcionalidad: busca los parametros y los devuelve la vista "alertames" junto con los parametros
     * Parametros:
     * Respuesta: regresa la vista, junto con los datos encontrados
     *
     */


    /***/
    public function alertames()
    {
        //
      $user   = auth()->user();
      $userId = $user->id;

      $areaId = $user->idarea;
      $resultado = DB::table('alertas')->where('ale_id_usuario', $userId)->where('ale_clase', 'final')->get();
      //$resultado = DB::table('alertas')->where('ale_id_usuario', $userId)->where('ale_clase', 'final')->whereYear('created_at', 2020)->get();
      $observaciones = DB::table('observaciones')->where('obs_status', 0)->where('obs_id_area', $areaId)
      ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
      ->orderBy('obs_date', 'desc')->get();

      $observacionesR = DB::table('observaciones')->where('obs_status', 3)->orWhere('obs_status', '4')->where('obs_id_area', $areaId)
      ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
      ->orderBy('obs_date', 'desc')->get();

      $observacionesRn = DB::table('observaciones')->where('obs_status', 3)->where('obs_id_area', $areaId)->get();
      //dd($userId);exit;
      return view('pages.poa.alertames')->with( compact('resultado','observaciones','observacionesR','observacionesRn'));
    }

    /**
     * Funcionalidad: busca los parametros y los devuelve la vista "reporteobs" junto con los parametros
     * Parametros: $request
     * Respuesta: regresa la vista, junto con los datos encontrados
     *
     */

    public function reporteobs(Request $request)
    {

        if (Auth::check()) {

      $user   = auth()->user();
      $userId = $user->id;
      $areaId = $user->idarea;

      if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        {          
            
            $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('created_at', 'desc')->take(10)->get();
            $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();

            $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('created_at', 'desc')->take(15)->get();
            $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
            /////////////////////////////////////////////////////////////////////////////////////////
            $observaciones = DB::table('observaciones')->where('obs_status', 0)
            ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
            ->orderBy('obs_date', 'desc')->get();

            $obss = DB::table('observaciones')
            //->where('obs_status', 2)->orWhere('obs_status', 3)
            ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
            ->orderBy('obs_date', 'desc')
            ->limit(20)
            ->get();

            $observacionesR = DB::table('observaciones')->where('obs_status', 1)
            ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->orderBy('obs_date', 'desc')->get();


            return view('pages.admin.reporteobs')->with( compact('nfin','alertasfin','nalertas','alertas','observaciones', 'observacionesR','obss'));
        }
        else { 

            return route('auth/login');

        }
      }
      else {
        return route('auth/login');
      }
    }

    /**
     * Funcionalidad: recibe los parametros de las observaciones a mostrar
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function getidobs(Request $request)
    {

        if (Auth::check()) {

      $user   = auth()->user();
      $userId = $user->id;
      $areaId = $user->idarea;
      $id = $request->id;

      if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        {          

            $obss = DB::table('observaciones')->where('obs_id_area', $id)
            //->where('obs_status', 2)->orWhere('obs_status', 3)
            ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
            ->orderBy('obs_date', 'desc')
            ->limit(20)
            ->get();

            return response()->json([$obss]);
            
        }
        else { 

            return route('auth/login');

        }
      }
      else {
        return route('auth/login');
      }
    }

    /**
     * Funcionalidad: busca los datos relacionados a las actividades
     * Parametros:
     * Respuesta: regresa una vista jun con los datos encontrados
     *
     */

    /***/
    public function elaboracion()
    {

    if (Auth::check()) {

      $user   = auth()->user();
      $userId = $user->id;
      $areaId = $user->idarea;

      if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
        {          
            
            //$resultado = DB::table('alertas')->where('ale_id_usuario', $userId)->where('ale_clase', 'final')->whereYear('created_at', 2019)->get();
            $resultado = DB::table('alertas')->where('ale_id_usuario', $userId)->where('ale_clase', 'final')->get();
            $programas = DB::table('programas2020')->where('reprogramacion', 0)->get();

            $unidades = DB::table('users')->where('usu_tipo', 1)->get();
            /////////////////////////////////////////////////////////////////////////////////////////
            $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('created_at', 'desc')->take(10)->get();
            $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();

            $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('created_at', 'desc')->take(15)->get();
            $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
            /////////////////////////////////////////////////////////////////////////////////////////
            $observaciones = DB::table('observaciones')->where('obs_status', 0)
            ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->join('users', 'users.idarea', '=', 'actividadesdos.idarea')
            ->orderBy('obs_date', 'desc')->get();

            $observacionesR = DB::table('observaciones')->where('obs_status', 1)
            ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->orderBy('obs_date', 'desc')->get();


            return view('pages.poa.elaboracion')->with( compact('resultado','programas','nfin','alertasfin','nalertas','alertas','unidades','observaciones', 'observacionesR'));
        }
        else { 

          //dd($userId);exit;
          
            //$resultado = DB::table('alertas')->where('ale_id_usuario', $userId)->where('ale_clase', 'final')->whereYear('created_at', 2019)->get();
            $resultado = DB::table('alertas')->where('ale_id_usuario', $userId)->where('ale_clase', 'final')->get();
            $programas = DB::table('programas2020')->where('reprogramacion', 0)->get();
            /////////////////////////////////////////////////////////////////////////////////////////
            $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('created_at', 'desc')->take(10)->get();
            $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();

            $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('created_at', 'desc')->take(15)->get();
            $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
            /////////////////////////////////////////////////////////////////////////////////////////
            $observaciones = DB::table('observaciones')
            ->where('obs_status', 0)->where('obs_id_area', $areaId)->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->orderBy('obs_date', 'desc')->get();
            $observacionesR = DB::table('observaciones')->where('obs_status', 3)->orWhere('obs_status', '4')->where('obs_id_area', $areaId)
            ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->orderBy('obs_date', 'desc')->get();

             $observacionesRn = DB::table('observaciones')->where('obs_status', 3)->where('obs_id_area', $areaId)->get();


            return view('pages.poa.elaboracion')->with( compact('resultado','programas','nfin','alertasfin','nalertas','alertas','observaciones', 'observacionesR', 'observacionesRn'));

        }
      }
      else {
        return route('auth/login');
      }
    }

    /**
     * Funcionalidad: Registra o actualiza una actividad
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function sendactividad(Request $request)
    {
      if (Auth::check()) {
        $user   = auth()->user();
        $userId = $user->id;
        $idArea = $user->idarea;
        $cargo = $user->cargo;
        $titular = $user->titular;


        $acttext = $request->act;
        $uni = $request->uni;
        $ene = $request->ene;
        $feb = $request->feb;
        $mar = $request->mar;
        $abr = $request->abr;
        $may = $request->may;
        $jun = $request->jun;
        $jul = $request->jul;
        $ago = $request->ago;
        $sep = $request->sep;
        $oct = $request->oct;
        $nov = $request->nov;
        $dic = $request->dic;
        $ida = $request->ida;
        $pro = $request->pro;
        $esp = $request->esp;
        $can = $request->can;
        $ord = $request->ord;
        $ini = $request->ini;
        $ter = $request->ter;
        $area = $request->area;
        $per = $request->per;

        switch ($ida) {
            case '0':
                $act = new actividadesdos();
                $act->reprogramacion = 2;
                $act->autoactividades = $act->id;
                $act->idprograma = $pro;
                $act->idprogramaesp = $esp;
                $act->idarea = $idArea;
                $act->numactividad = $ord;
                $act->descactividad = $acttext;
                $act->unidadmedida = $uni;
                $act->cantidadanual = $can;
                $act->idporcentajep = $act->id;
                $act->idporcentajer = $act->id;
                $act->observatrim = '';
                $act->bandera = 0;
                $act->act_estatus = 1;
                $act->act_tipo_estatus = 1;
                $act->save();

                $act = actividadesdos::find($act->id);
                $act->autoactividades = $act->id;
                $act->idporcentajep = $act->id;
                $act->idporcentajer = $act->id;
                $act->save();

                $pp = new porcprogramado2020();
                $pp->idporcentajep = $act->id;
                $pp->enep = $ene;
                $pp->febp = $feb;
                $pp->marp = $mar;
                $pp->abrp = $abr;
                $pp->mayp = $may;
                $pp->junp = $jun;
                $pp->julp = $jul;
                $pp->agop = $ago;
                $pp->sepp = $sep;
                $pp->octp = $oct;
                $pp->novp = $nov;
                $pp->dicp = $dic;
                $pp->inicio = $ini;
                $pp->termino = $ter;
                
                $pp->save();

                $pr = new porcrealizado2020();
                $pr->idporcentajer = $act->id;
                $pr->ener = 0;
                $pr->febr = 0;
                $pr->marr = 0;
                $pr->abrr = 0;
                $pr->mayr = 0;
                $pr->junr = 0;
                $pr->julr = 0;
                $pr->agor = 0;
                $pr->sepr = 0;
                $pr->octr = 0;
                $pr->novr = 0;
                $pr->dicr = 0;
                $pr->autoactividades = $act->id;
                
                $pr->save();

                DB::table('infocedulas2020')->insert([
                  'reprogramacion' =>  0,
                  'identificadorindicador' =>  '',
                  'definicionindicador' =>  '',
                  'idcontrol' =>  $act->id,
                  'idarea' =>  $idArea,
                  'area' =>  $area,
                  'nombreindicador' =>  '',
                  'objetivoindicador' =>  '',
                  'metaindicador' =>  '100',
                  'periodocumplimiento' =>  $per,
                  'abreviaturaperiodocump' => $ini.' - '.$ter,
                  'dimensionmedir' =>  '',
                  'idprograma' =>  '',
                  'idprograma1' =>  $pro,
                  'unidadmedida' =>  '',
                  'metodocalculo' =>  '',
                  'variable1' =>  '',
                  'descripcionvariable1' =>  '',
                  'fuentesinfovariable1' =>  '',
                  'variable2' =>  '',
                  'descripcionvariable2' =>  '',
                  'fuentesinfovariable2' =>  '',
                  'frecuenciamedicion' => 0,
                  'frecuenciaespecifique' => '',
                  'fundamentojuridico' => '',
                  'lineabase' => null,
                  'lineabasev' => '',
                  'lineabasea' => '',
                  'comportamientoindicador' => '',
                  'nombretitular' => $titular,
                  'cargo' => $cargo
                ]);

                break;
            default:
                $act = actividadesdos::find($ida);
                $act->reprogramacion = 1;
                $act->descactividad = $acttext;
                $act->unidadmedida = $uni;
                $act->idarea = $idArea;
                $act->save();

                //////////////////////////////////////////////////////

                DB::table('porcentajep2020')->where('idporcentajep', $act->id)->update([
                  'enep' => $ene,
                  'febp' => $feb,
                  'marp' => $mar,
                  'abrp' => $abr,
                  'mayp' => $may,
                  'junp' => $jun,
                  'julp' => $jul,
                  'agop' => $ago,
                  'sepp' => $sep,
                  'octp' => $oct,
                  'novp' => $nov,
                  'dicp' => $dic,
                  'inicio' => $ini,
                  'termino' => $ter
                ]);

                 $pp = DB::table('porcentajep2020')->where('idporcentajep',  $act->id)->first();


                 DB::table('infocedulas2020')->where('idcontrol', $act->id)->update([
                  'periodocumplimiento' =>  $per,
                  'abreviaturaperiodocump' => $ini.' - '.$ter
                ]);
        }

        return response()->json([$act,$pp]);

      } else {
        return route('auth/login');
      }
    }


    /**
     * Funcionalidad: Actualiza el orden de las actividades
     * Parametros: $request
     * Respuesta: json
     *
     */


    public function cambiarnumero(Request $request)
    {
      if (Auth::check()) {

        $data = $request->data;
        //CAMBIAR EL NUMERO SIEMPRE Y CUANDO LA PREGUNTA SEA INGRESADA ENTRE LOS NUMEROS ESENARIO DE MUCHO CUIDADO
        
        foreach ($data  as $datas) {
          $idNum = explode("|",$datas);
          //$updateNum= DB::table('actividadesdos')->where('id', $idNum[0])->update(['reprogramacion' => 1,'numactividad' => $idNum[1]]);
          $updateNum= DB::table('actividadesdos')->where('id', $idNum[0])->update(['numactividad' => $idNum[1]]);
        }

        return response()->json([implode(",",$data)]);

      } else {
        return route('auth/login');
      }
    }


    /**
     * Funcionalidad: Actualiza los datos de un indicador
     * Parametros: $request
     * Respuesta: json
     *
     */


    public function actindicador(Request $request)
    {
      if (Auth::check()) {
        $user   = auth()->user();

        DB::table('infocedulas2020')->where('idcontrol', $request->id)->where('idarea', $user->idarea)->update([
                  'identificadorindicador' =>  $request->idin,
                  'definicionindicador' =>  $request->dein,

                  'nombreindicador' =>  $request->noin,
                  'objetivoindicador' =>  $request->obin,
                  'dimensionmedir' =>  $request->dime,
                  'unidadmedida' =>  $request->unme,
                  'metodocalculo' =>  $request->meca,
                  'variable1' =>  $request->var1,
                  'descripcionvariable1' =>  $request->dev1,
                  'fuentesinfovariable1' =>  $request->fui1,
                  'variable2' =>  $request->var2,
                  'descripcionvariable2' =>  $request->dev2,
                  'fuentesinfovariable2' =>  $request->fui2,
                  'frecuenciamedicion' => $request->frme,
                  'frecuenciaespecifique' => $request->fres,
                  'fundamentojuridico' => $request->fuju,
                  'lineabasev' => $request->libv,
                  'lineabasea' => $request->liba,
                  'comportamientoindicador' => $request->coin
                ]);

        return response()->json([$request->id,$request->id]);

      } else {
        return route('auth/login');
      }
    }


    /**
     * Funcionalidad: Actualiza el estatus de las observaciones
     * Parametros: $request
     * Respuesta: json
     *
     */


    public function sendidObs(Request $request)
    {
      if (Auth::check()) {
        $user   = auth()->user();
        $acronimo = $user->usu_acronimo;
        $areaId = $user->idarea;

        $data = $request->data;
        $id  = $request->id;
        $color  = $request->color;
        foreach ($data  as $datas) {
          $idNum = explode("|",$datas);
          $updateNum= DB::table('observaciones')->where('id', $idNum[0])->update([
            'obs_status' => $idNum[1],
            'obs_date_dos'=>date('Y-m-d H:i:s'),
            'obs_acronimo'=>$acronimo,
            'obs_tipo'=>'0'
          ]);
        }

        $count = DB::table('observaciones')->where('obs_idactividad', $id)->where('obs_status', '0')->count();

        $act2 = actividadesdos::find($id);
        $act2->act_obs = $count;
        $act2->act_obs_edit = $color;
        $act2->save();


        $observaciones = DB::table('observaciones')
            ->where('obs_status', 0)->where('obs_id_area', $areaId)->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->orderBy('obs_date', 'desc')->get();

        return response()->json($observaciones);

      } else {
        return route('auth/login');
      }
    }


    /**
     * Funcionalidad: Actualiza el estatus de las observaciones validas
     * Parametros: $request
     * Respuesta: json
     *
     */


    public function sendidObsVal(Request $request)
    {
      if (Auth::check()) {
        $user   = auth()->user();
        $acronimo = 'UTP';

        $data = $request->data;
        $id  = $request->id;
        $color  = $request->color;
        foreach ($data  as $datas) {
          $idNum = explode("|",$datas);
          $updateNum= DB::table('observaciones')->where('id', $idNum[0])->update([
            'obs_status' => $idNum[1],
            'obs_date_tres'=>date('Y-m-d H:i:s'),
            'obs_acronimo'=>$acronimo,
            'obs_tipo'=>'1'
          ]);
        }

        $count = DB::table('observaciones')->where('obs_idactividad', $id)->where('obs_status', '2')->count();

        $act2 = actividadesdos::find($id);
        $act2->act_obs = $count;
        $act2->act_obs_edit = $color;
        $act2->save();

        $observaciones = DB::table('observaciones')
            ->where('obs_status', 1)->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->orderBy('obs_date', 'desc')->get();

        return response()->json($observaciones);

      } else {
        return route('auth/login');
      }
    }

    /**
     * Funcionalidad: Registra las observaciones
     * Parametros: $request
     * Respuesta: json
     *
     */


    public function sendobservacion(Request $request)
    {
      if (Auth::check()) {

        $data = $request->data;
        $id = $request->id;
        $cla = $request->cla;
        $uni = $request->uni;
        $color  = $request->color;
        $num  = $request->num;

        $user   = auth()->user();
        $userId = $user->id;
        $userName = $user->name;
        $acronimo = $user->usu_acronimo;
            
        foreach ($data  as $datas) {

            $obs = new Observaciones();
            $obs->obs_desc =  $datas;
            $obs->obs_idactividad = $id;
            $obs->obs_status = '0';
            $obs->obs_date = date('Y-m-d H:i:s');
            $obs->obs_id_area = $uni;
            $obs->obs_clave = $cla;
            $obs->obs_acronimo = 'UTP';
            $obs->obs_tipo = '1';
            $obs->save();

        }

        $count = DB::table('observaciones')->where('obs_idactividad', $id)->where('obs_status', '0')->count();

        $act2 = actividadesdos::find($id);
        $act2->act_obs = $count;
        $act2->act_obs_edit = $color;
        $act2->save();

        $observaciones = DB::table('observaciones')
            ->where('obs_status', 0)->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
            ->orderBy('obs_date', 'desc')->get();

        return response()->json($observaciones);

      } else {
        return route('auth/login');
      }
    }


    /**
     * Funcionalidad: Busca los datos de de un indicador en particular
     * Parametros: $request
     * Respuesta: json
     *
     */


    public function getindicador(Request $request)
    {
      if (Auth::check()) {

        $id = $request->data;
        $data = DB::table('infocedulas2020')->where('idcontrol', $id)->get();

        return response()->json($data);

      } else {
        return route('auth/login');
      }
    }

    /**
     * Funcionalidad: Busca las observaciones referentes a una actividad
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function getobservacion(Request $request)
    {
      if (Auth::check()) {

        $id = $request->id;
        $obs =  DB::table('observaciones')->where('obs_idactividad', $id)->orderBy('obs_date', 'desc')->get();
        //DB::table('observaciones')->where('obs_idactividad', $id)->where('obs_status', '3')->update(['obs_status' => '4']);


        return response()->json($obs);

      } else {
        return route('auth/login');
      }
    }

    /**
     * Funcionalidad: Actualiza y busca los elementos de las obseravciones editadas
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function deleteobserr(Request $request)
    {
      if (Auth::check()) {
        $user   = auth()->user();
        $userId = $user->idarea;
        $arr = $request->arr;
        foreach ($arr as $idObs) {
             DB::table('observaciones')->where('id', $idObs)->update(['obs_status' => '4']);
        }

        $obs =  DB::table('observaciones')->where('obs_id_area', $userId)->where('obs_status', '3')->orWhere('obs_status', '4')
        ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
        ->orderBy('obs_date', 'desc')->get();
        
        return response()->json($obs);

      } else {
        return route('auth/login');
      }
    }

    /**
     * Funcionalidad: Borra una actividad
     * Parametros: $request
     * Respuesta: json
     *
     */


    public function deleteactividad(Request $request)
    {
      if (Auth::check()) {

        $user   = auth()->user();
        $usu_clave = $user->usu_clave;

        $data = $request->data;
        $send_clave = $request->cla;

        if ($send_clave === $usu_clave) {

        DB::table('actividadesdos')->where('id', $data)->update([
                  'reprogramacion' =>  5
                ]);
        
        //DB::table('actividadesdos')->where('id', $data)->delete();
        //DB::table('porcentajep2020')->where('idporcentajep', $data)->delete();
        //DB::table('porcentajer2020')->where('idporcentajer', $data)->delete();
        //DB::table('infocedulas2020')->where('idcontrol', $data)->delete();
        
          return response()->json('1');
        }
        else {
          return response()->json('0');
        }

      } else {
        return route('auth/login');
      }
    }


    /**
     * Funcionalidad: Busca un programa especifico
     * Parametros: $request
     * Respuesta: json
     *
     */


    public function sendporgramaesp(Request $request)
    {
      if (Auth::check()) {

        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta'))
        {
          $idArea = $request->uni;
        }
        else {
          $idArea = Auth::user()->idarea;
        }
          
        $id = $request->id;
        $proesp = DB::table('programasesp2020')->where('idprograma', $id)->where('idarea', $idArea)->get();

        return response()->json([$proesp]);

      } else {
        return route('auth/login');
      }
    }

    /**
     * Funcionalidad: Busca las actividades para una usuario
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function getAct(Request $request)
    {
      if (Auth::check()) {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta'))
        {
          $idArea = $request->uni;
        }
        else {
          $idArea = Auth::user()->idarea;
        }
        $id = $request->proesp;
        $actAdd = DB::table('actividadesdos')->where('idprogramaesp', $id)->where('idarea', $idArea)->where('reprogramacion', '!=' , 5)->join('porcentajep2020', 'porcentajep2020.idporcentajep', '=', 'autoactividades')->orderBy('numactividad', 'asc')->get();


        return response()->json([$actAdd]);

      } else {
        return route('auth/login');
      }
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

    /**
     * Funcionalidad: Validación de formulario
     * Parametros: $new
     * Respuesta: array
     *
     */

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

    /* Funcionalidad: obtiende un programa especifico
     * Parametros: $request
     * Respuesta: json
     *
     */


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

    /* Funcionalidad: obtiende actividades
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function obtenActividades(Request $request) {
      $idArea = Auth::user()->idarea;
      $idPrograma = $request->programa;
      $idProgramaEsp = $request->programaEsp;

      //$actividades = Actividad::where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->orderBy('numactividad')->get();
      $actividades = Actividad::where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->where('reprogramacion','<=',3)->orderBy('numactividad')->get();
      return response()->json($actividades);

    }

    /* Funcionalidad: obtiende el objetivo de una actividad
     * Parametros: $request
     * Respuesta: json
     *
     */


    public function obtenObjetivoAct(Request $request) {
      $idArea = Auth::user()->idarea;
      $idPrograma = $request->programa;
      $idProgramaEsp = $request->programaEsp;
      $objetivo = ProgramaEsp::select('objprogramaesp')
        ->where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->get();
      return response()->json($objetivo);
    }

    /* Funcionalidad: obtiende porcentaje programado
     * Parametros: $request
     * Respuesta: json
     *
     */


    public function obtenPorcProgramado(Request $request) {
      $idActividad = $request->idActividad;
      $porcProgramado = PorcProgramado::where('porcentajep.idporcentajep', $idActividad)->leftJoin('actividades', 'actividades.autoactividades', 'porcentajep.idporcentajep')->get();
      return response()->json($porcProgramado);
    }

    /* Funcionalidad: obtiende porcentaje realizado
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function obtenPorcRealizado(Request $request) {
      $idActividad = $request->idActividad;
      $porcRealizado = PorcRealizado::where('idporcentajer', $idActividad)->get();
      return response()->json($porcRealizado);
    }

    /* Funcionalidad: obtiende el detalle de una actividad
     * Parametros: $request
     * Respuesta: json
     *
     */

    public function obtenDetallesActi(Request $request) {      
      $idActividad = $request->idActividad;
      $idMes = $request->idMes;      
      $detalleActi = DetalleActi::where('idmes', $idMes)->where('autoactividades', $idActividad)->get();
      return response()->json($detalleActi);
      //
    }


}
