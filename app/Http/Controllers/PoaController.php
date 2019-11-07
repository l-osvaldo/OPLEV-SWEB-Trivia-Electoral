<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Mes, ProgramaEsp, Actividad, PorcProgramado, PorcRealizado, DetalleActi, Area, Programa, InfoCedula, Adicional, Trimestre, Trimestral};
use DB;
use Auth;
use App\Alerta;
use App\actividadesdos;
use Alert;

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
          $programas = Programa::where('reprogramacion', '<', 3)->get();
          $action = route('admin.store');

          /////////////////////////////////////////////////////////////////////////////////////////
          $alertas = DB::table('alertas')->where('ale_clase', 'edicion')->orderBy('created_at', 'desc')->take(10)->get();
          $nalertas = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'edicion')->get();

          $alertasfin = DB::table('alertas')->where('ale_clase', 'final')->orderBy('created_at', 'desc')->take(15)->get();
          $nfin = DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->get();
          /////////////////////////////////////////////////////////////////////////////////////////
          return view('pages.admin.index')->with( compact('meses', 'areas', 'programas', 'action', 'alertas', 'nalertas', 'alertasfin', 'nfin'));
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
      Alert::success('', 'Notificación registrada')->autoclose(3500);
      return redirect()->route('programa.index');
    }

    /**
     * Display the specified resource.
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

    public function clickalertasfin()
    {
        //
        DB::table('alertas')->where('ale_tipo', 1)->where('ale_clase', 'final')->update(['ale_tipo' => 0]);
        return response()->json(['fin']);
    }


    /***/
    public function alertames()
    {
        //
      $user   = auth()->user();
      $userId = $user->id;
      $resultado = DB::table('alertas')->where('ale_id_usuario', $userId)->where('ale_clase', 'final')->whereYear('created_at', 2019)->get();
      //dd($resultado);exit;
      return view('pages.poa.alertames')->with( compact('resultado'));
    }

    /***/
    public function elaboracion()
    {
        //
      $user   = auth()->user();
      $userId = $user->id;
      $resultado = DB::table('alertas')->where('ale_id_usuario', $userId)->where('ale_clase', 'final')->whereYear('created_at', 2019)->get();
      $programas = DB::table('programas')->where('reprogramacion', 0)->get();
      //$programaesp = DB::table('programasesp')->where('idprograma', 1)->where('idarea', $userId)->get();
      return view('pages.poa.elaboracion')->with( compact('resultado','programas'));
    }

    public function sendactividad(Request $request)
    {
      if (Auth::check()) {
        $idArea = Auth::user()->idarea;
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

        switch ($ida) {
            case '0':
                $act = new actividadesdos();
                $act->reprogramacion = 1;
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
                $act->bandera = 1;
                $act->act_estatus = 1;
                $act->save();

                $actup = actividadesdos::find($act->id);
                $actup->autoactividades = $act->id;
                $actup->idporcentajep = $act->id;
                $actup->idporcentajer = $act->id;
                $actup->save();

                $pp = new PorcProgramado();
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

                $pr = new PorcRealizado();
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
                break;
            default:
                $act = actividadesdos::find($ida);
                $act->descactividad = $acttext;
                $act->unidadmedida = $uni;
                $act->idarea = $idArea;
                $act->save();

                //////////////////////////////////////////////////////

                DB::table('porcentajep')->where('idporcentajep', $act->id)->update([
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

                 $pp = DB::table('porcentajep')->where('idporcentajep',  $act->id)->first();
        }

        return response()->json([$act,$pp]);

      } else {
        return route('auth/login');
      }
    }


    public function cambiarnumero(Request $request)
    {
      if (Auth::check()) {

        $data = $request->data;
        
        foreach ($data  as $datas) {
          $idNum = explode("|",$datas);
          $updateNum= DB::table('actividadesdos')->where('id', $idNum[0])->update(['numactividad' => $idNum[1]]);
        }

        return response()->json([implode(",",$data)]);

      } else {
        return route('auth/login');
      }
    }


    public function deleteactividad(Request $request)
    {
      if (Auth::check()) {

        $data = $request->data;
        
        DB::table('actividadesdos')->where('id', $data)->delete();
        DB::table('porcentajep')->where('idporcentajep', $data)->delete();
        DB::table('porcentajer')->where('idporcentajer', $data)->delete();
        

        return response()->json('listo');

      } else {
        return route('auth/login');
      }
    }


    public function sendporgramaesp(Request $request)
    {
      if (Auth::check()) {
        $idArea = Auth::user()->idarea;
        $id = $request->id;
        $proesp = DB::table('programasesp')->where('idprograma', $id)->where('idarea', $idArea)->get();

        return response()->json([$proesp]);

      } else {
        return route('auth/login');
      }
    }

    public function getAct(Request $request)
    {
      if (Auth::check()) {
        $idArea = Auth::user()->idarea;
        $id = $request->proesp;
        $actAdd = DB::table('actividadesdos')->where('idprogramaesp', $id)->where('idarea', $idArea)->join('porcentajep', 'porcentajep.idporcentajep', '=', 'autoactividades')->orderBy('numactividad', 'asc')->get();


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

      $actividades = Actividad::where('idprograma', $idPrograma)->where('idprogramaesp', $idProgramaEsp)->where('idarea', $idArea)->orderBy('numactividad')->get();
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
