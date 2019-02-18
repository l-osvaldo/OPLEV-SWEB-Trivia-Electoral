<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Mes};
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
      if ( Auth::check() )
      {
        $meses = Mes::all();
        return view('pages.poa.index')->with( compact('meses') );
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

        $idmesreportar = $request->input('idmesreportar');
        $programas = DB::table('programas')->where('idprograma', '<>', 2)->get();
        $action = route('programa.store');
        return view('pages.poa.create')->with( compact('idmesreportar', 'programas', 'action') );

        /*
        $zonas       = DB::table('zonas')->orderBy('zona')->get();
        $municipios  = DB::table('municipios')->where('estado', 'VERACRUZ DE IGNACIO DE LA LLAVE')->orderBy('mpio')->get();
        $tipoObras   = DB::table('tipo_obras')->orderBy('obra')->get();
        $origenObras = DB::table('origen_obras')->orderBy('origen')->get();
        $residente   = Residente::find(Auth::user()->id);
        $statusObras = DB::table('status_obras')->orderBy('id')->get();
        $statusProyectos = DB::table('status_proyectos')->orderBy('id')->get();
        $supervisores = Supervisor::all();

        $obra = new Obra();
        $action = route('obras.store');

        return view('pages.obras.create')->with( compact('obra', 'action', 'zonas', 'municipios', 'tipoObras', 'origenObras', 'statusObras', 'statusProyectos', 'supervisores', 'residente') );*/
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
}
