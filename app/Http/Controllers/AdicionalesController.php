<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Mes, ProgramaEsp, Actividad, PorcProgramado, PorcRealizado, DetalleActi, Area, Programa, Adicional};
use DB;
use Auth;
use Alert;

class AdicionalesController extends Controller
{

    /**
     * Funcionalidad: Busca la vista index del sistema y realiza la busqueda correspondiente a las alertas y meses
     * Parametros:
     * Respuesta: Envio de la vista y sus parametros
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      if ( Auth::check() )
      { 
        $user   = auth()->user();
        $areaId = $user->idarea;
        $meses = Mes::all();

        $observaciones = DB::table('observaciones')->where('obs_status', 0)->where('obs_id_area', $areaId)->join('actividades', 'actividades.autoactividades', '=', 'obs_idactividad')
        ->orderBy('obs_date', 'desc')->get();
        $observacionesR = DB::table('observaciones')->where('obs_status', 3)->orWhere('obs_status', '4')->where('obs_id_area', $areaId)
        ->join('actividades', 'actividades.autoactividades', '=', 'obs_idactividad')
        ->orderBy('obs_date', 'desc')->get();
        $observacionesRn = DB::table('observaciones')->where('obs_status', 3)->where('obs_id_area', $areaId)->get();
        return view('pages.adicionales.index')->with( compact('meses','observaciones','observacionesR','observacionesRn') );
      }
      else
      {
        return redirect()->route('login');
      }



      
    }

    /**
     * Funcionalidad: Realiza la busqueda correspondiente a las alertas y a las adicionales
     * Parametros: request
     * Respuesta: Envio de la vista y sus parametros
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if ( Auth::check() )
      {        
        #Validación del mes a reportar
        if ($this->_rules()) {
           //Alert::error('Seleccione un mes', '¡Error!')->autoclose(3500);
        }
        list( $rules, $messages ) = $this->_rules();
        $this->validate( $request, $rules, $messages );

        $idArea = Auth::user()->idarea;
        $idmesreportar = $request->input('idmesreportar');
        $mes = Mes::select('mes')->where('idmes', $idmesreportar)->get();                
        $adicionales = Adicional::select('descadicional', 'soporteadicional', 'observaadicional','id')->where('idarea', $idArea)->where('idmes', $idmesreportar)->get();
        //dd($adicionales);exit;
        $user   = auth()->user();
        $areaId = $user->idarea;
        $observaciones = DB::table('observaciones')->where('obs_status', 0)->where('obs_id_area', $areaId)
        ->join('actividades', 'actividades.autoactividades', '=', 'obs_idactividad')
        ->orderBy('obs_date', 'desc')->get();

        $observacionesR = DB::table('observaciones')->where('obs_status', 3)->orWhere('obs_status', '4')->where('obs_id_area', $areaId)
        ->join('actividades', 'actividades.autoactividades', '=', 'obs_idactividad')
        ->orderBy('obs_date', 'desc')->get();
        $observacionesRn = DB::table('observaciones')->where('obs_status', 3)->where('obs_id_area', $areaId)->get();

        return view('pages.adicionales.create')->with( compact('adicionales', 'idmesreportar', 'mes','observaciones','observacionesR','observacionesRn') );

        //devuelve false sino existe
        //if ($existeAdicional)
        //{          
        //  $id = Adicional::select('id')->where('idarea', $idArea)->where('idmes', $idmesreportar)->get();
        //  $adicional = Adicional::find($id[0]->id);
        //  $put = TRUE;
        //  $action = route('adicionales.update', ['adicional' => $adicional->id ]);
        //  return view('pages.adicionales.create')->with( compact('adicional', 'action', 'put', 'idmesreportar', 'mes','observaciones','observacionesR','observacionesRn') );
        //}
        //else
        //{
        //  $adicional = new Adicional();
        //  $action = route('adicionales.store');
        //  return view('pages.adicionales.create')->with( compact('adicional', 'action', 'idmesreportar', 'mes','observaciones','observacionesR','observacionesRn') );
        //}


      }
      else
      {
        return redirect()->route('login');
      }      
    }

    /**
     * Funcionalidad: registra las adicionales y busca las alertas correspondientes alos parametros
     * Parametros: request
     * Respuesta: Envio de la vista y sus parametros
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      #Validación de formulario
      list( $rules, $messages ) = $this->_rulesadicionales();
      $this->validate( $request, $rules, $messages );

      $idArea = Auth::user()->idarea;        
      $arrMeses = [0,'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
      $idmes = $request->input('idmesreportar');
      $area = Area::select('nombrearea')->where('idarea', $idArea)->get();                  
      $adicional = new Adicional();
      $adicional->idarea = $idArea;
      $adicional->area = $area[0]->nombrearea;
      $adicional->idmes = $request->input('idmesreportar');
      $adicional->mes = $arrMeses[$idmes];      

      $descadicional = trim($request->input('descadicional'));
      $descadicional = strtr($descadicional,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
      $soporteadicional = trim($request->input('soporteadicional'));
      $soporteadicional = strtr($soporteadicional,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
      $observaadicional = trim($request->input('observaadicional'));
      $observaadicional = strtr($observaadicional,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");


      $adicional->descadicional = $descadicional;
      $adicional->soporteadicional = $soporteadicional;
      $adicional->observaadicional = $observaadicional;
      $adicional->save();
      Alert::success('', 'Registro exitoso')->autoclose(3500);
      return redirect()->route('adicionales.index');      
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
     * Funcionalidad: registra las adicionales
     * Parametros: request, id
     * Respuesta: Envio de la vista y sus parametros
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      #Validación de formulario
      list( $rules, $messages ) = $this->_rulesadicionales();
      $this->validate( $request, $rules, $messages );

      $idArea = Auth::user()->idarea;        
      $arrMeses = [0,'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
      $idmes = $request->input('idmesreportar');
      $area = Area::select('nombrearea')->where('idarea', $idArea)->get();        

      $adicional = Adicional::find($id);
      $adicional->idarea = $idArea;
      $adicional->area = $area[0]->nombrearea;
      $adicional->idmes = $request->input('idmesreportar');
      $adicional->mes = $arrMeses[$idmes];      
      $adicional->descadicional = $request->input('descadicional');
      $adicional->soporteadicional = $request->input('soporteadicional');
      $adicional->observaadicional = $request->input('observaadicional');

      $adicional->save();
      Alert::success('', 'Registro exitoso')->autoclose(3500);
      return redirect()->route('adicionales.index');  
    }


    public function newadicional(Request $request)
    {

      //$request);exit;      

      $idArea = Auth::user()->idarea;        
      $arrMeses = [0,'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
      $idmes = $request->input('idmes');
      $id = $request->input('id');
      $area = Auth::user()->name; 

      if ($id=='0') {
            $adicional = new Adicional();
            $adicional->idarea = $idArea;
            $adicional->area = $area;
            $adicional->idmes = $request->input('idmes');
            $adicional->mes = $arrMeses[$idmes];      
            $adicional->descadicional = $request->input('desc');
            $adicional->soporteadicional = $request->input('sopo');
            $adicional->observaadicional = $request->input('obse');

            $adicional->save();
      } else {
            $adicional = Adicional::find($id);
            $adicional->idarea = $idArea;
            $adicional->area = $area;
            $adicional->idmes = $request->input('idmes');
            $adicional->mes = $arrMeses[$idmes];      
            $adicional->descadicional = $request->input('desc');
            $adicional->soporteadicional = $request->input('sopo');
            $adicional->observaadicional = $request->input('obse');

            $adicional->save();
      } 

      $adicionales = Adicional::select('descadicional', 'soporteadicional', 'observaadicional','id')->where('idarea', $idArea)->where('idmes', $idmes)->get();
     
       return response()->json([$adicionales]);
      
    }


    /**
     * Funcionalidad: validacion de formulario
     * Parametros: $new
     * Respuesta: 
     *
     */
    private function _rules( $new = True )
    {

      $messages = [
        'idmesreportar.required' => 'Debe seleccionar un mes',
        'idmesreportar.not_in' => 'Debe seleccionar un mes'
      ];

      $rules = [

          'idmesreportar' => 'required|not_in:0'
      ];
      return array( $rules, $messages );
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
     * Funcionalidad: validacion de formulario adicionales
     * Parametros: $new
     * Respuesta: 
     *
     */
    private function _rulesadicionales( $new = True )
    {

      $messages = [
        'descadicional.required' => 'Debe escribir la descripción de la actividad adicional',
        'soporteadicional.required' => 'Debe escribir el soporte de la actividad adicional'
      ];

      $rules = [
        'descadicional' => 'required',
        'soporteadicional' => 'required'        
      ];
      return array( $rules, $messages );
    }




}
