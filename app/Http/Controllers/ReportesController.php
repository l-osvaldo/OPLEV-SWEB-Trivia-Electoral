<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\{Mes, ProgramaEsp, Actividad, PorcProgramado, PorcRealizado, DetalleActi, Area, Programa};
use DB;
use Auth;
use PDF;

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
      return view('pages.reportes.index')->with( compact('action', 'programas', 'meses'));
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

    public function poa(Request $request)
    {
      if ( Auth::check() )
      {
        $idArea = Auth::user()->idarea;        
        $idMes = $request->idmesreportar;      
        $idPrograma = $request->programa;
        $idProgramaEsp = $request->programaEsp;
        $arrMeses = [0,'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];

        $programa = Programa::select('claveprograma', 'descprograma')->where('idprograma', $idPrograma)->get();
        //$programa = Programa::all();
        /*
        foreach ($programa as $title)
        {
          echo $title;
        }
        die();*/
        $pdf = PDF::loadView('pages.reportes.poa', ['idArea'=>$idArea], ['mes'=>$arrMeses[$idMes]], ['programa'=>$programa], ['idProgramaEsp'=>$idProgramaEsp] )->setPaper('letter', 'landscape');
        return $pdf->stream();





        /*$view =  \View::make('pages.reportes.poa', compact('idArea', 'idMes', 'idPrograma', 'idProgramaEsp'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();        */
      }
      else
      {
        return redirect()->route('login');
      }      
    }
}
