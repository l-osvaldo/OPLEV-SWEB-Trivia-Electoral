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
     * Display a listing of the resource.
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

        $observaciones = DB::table('observaciones')->where('obs_status', 0)->where('obs_id_area', $areaId)->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
        ->orderBy('obs_date', 'desc')->get();
        $observacionesR = DB::table('observaciones')->where('obs_status', 3)->where('obs_id_area', $areaId)
        ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
        ->orderBy('obs_date', 'desc')->get();
        return view('pages.adicionales.index')->with( compact('meses','observaciones','observacionesR') );
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
        if ($this->_rules()) {
           //Alert::error('Seleccione un mes', '¡Error!')->autoclose(3500);
        }
        list( $rules, $messages ) = $this->_rules();
        $this->validate( $request, $rules, $messages );

        $idArea = Auth::user()->idarea;
        $idmesreportar = $request->input('idmesreportar');
        $mes = Mes::select('mes')->where('idmes', $idmesreportar)->get();                
        $existeAdicional = Adicional::select('descadicional', 'soporteadicional', 'observaadicional')->where('idarea', $idArea)->where('idmes', $idmesreportar)->exists();
        $user   = auth()->user();
        $areaId = $user->idarea;
        $observaciones = DB::table('observaciones')->where('obs_status', 0)->where('obs_id_area', $areaId)
        ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
        ->orderBy('obs_date', 'desc')->get();

        $observacionesR = DB::table('observaciones')->where('obs_status', 3)->where('obs_id_area', $areaId)
        ->join('actividadesdos', 'actividadesdos.autoactividades', '=', 'obs_idactividad')
        ->orderBy('obs_date', 'desc')->get();


        //devuelve false sino existe
        if ($existeAdicional)
        {          
          $id = Adicional::select('id')->where('idarea', $idArea)->where('idmes', $idmesreportar)->get();
          $adicional = Adicional::find($id[0]->id);
          $put = TRUE;
          $action = route('adicionales.update', ['adicional' => $adicional->id ]);
          return view('pages.adicionales.create')->with( compact('adicional', 'action', 'put', 'idmesreportar', 'mes','observaciones','observacionesR') );
        }
        else
        {
          $adicional = new Adicional();
          $action = route('adicionales.store');
          return view('pages.adicionales.create')->with( compact('adicional', 'action', 'idmesreportar', 'mes','observaciones','observacionesR') );
        }
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

      $descadicional = trim(strtoupper($request->input('descadicional')));
      $descadicional = strtr($descadicional,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
      $soporteadicional = trim(strtoupper($request->input('soporteadicional')));
      $soporteadicional = strtr($soporteadicional,"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
      $observaadicional = trim(strtoupper($request->input('observaadicional')));
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
     * Update the specified resource in storage.
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
      $adicional->descadicional = strtoupper($request->input('descadicional'));
      $adicional->soporteadicional = strtoupper($request->input('soporteadicional'));
      $adicional->observaadicional = strtoupper($request->input('observaadicional'));

      $adicional->save();
      Alert::success('', 'Registro exitoso')->autoclose(3500);
      return redirect()->route('adicionales.index');  
    }


    #Validación de formulario
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

    #Validación de formulario adicionales
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
