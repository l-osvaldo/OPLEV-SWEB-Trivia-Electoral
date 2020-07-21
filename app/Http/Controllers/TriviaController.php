<?php

namespace App\Http\Controllers;

use App\Pregunta;
use Auth;
use Illuminate\Http\Request;

class TriviaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {

            $usuario      = auth()->user();
            $nombreModulo = "Gestión de Usuarios";

            $vista = view('trivia.gestionUsuarios', compact('usuario', 'nombreModulo'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
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

    public function estadisticas()
    {
        if (Auth::check()) {

            $usuario      = auth()->user();
            $nombreModulo = "Estadísticas";

            $vista = view('trivia.estadisticas', compact('usuario', 'nombreModulo'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }

    public function gestionPreguntas()
    {
        if (Auth::check()) {

            $usuario      = auth()->user();
            $nombreModulo = "Gestión de Preguntas";
            $preguntas    = Pregunta::all();

            $vista = view('trivia.gestionDePreguntas', compact('usuario', 'nombreModulo', 'preguntas'));

        } else {
            $vista = redirect()->route('login');
        }

        return $vista;
    }
}
