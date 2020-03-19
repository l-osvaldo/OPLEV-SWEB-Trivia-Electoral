<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Alert;

class DashboardController extends Controller
{
    /**
     * Funcionalidad: Busca la avista principal de dasboard
     * Parametros:
     * Respuesta: Regresa la avista principal de dasboard
     *
     */

    public function index()
    {
        Auth::check() ? $vista = view('dashboard') : $vista = redirect()->route('login');
        return $vista;
    }   

    /**
     * Funcionalidad: Busca la avista principal del loader
     * Parametros:
     * Respuesta: Regresa la avista principal del loader
     *
     */

    public function loaderpagina()
    {
        Auth::check() ? $vista = view('loaderEjemplo') : $vista = redirect()->route('login');
        return $vista;
    }   

}
