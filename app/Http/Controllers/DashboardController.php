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

    public function swal()
    {
        Auth::check() ? $vista = view('sweetAlertExample') : $vista = redirect()->route('login');
        return $vista;
    }

    public function tablaspagina()
    {
        Auth::check() ? $vista = view('dataTables') : $vista = redirect()->route('login');
        return $vista;
    }

    public function widgets()
    {
        Auth::check() ? $vista = view('widgets') : $vista = redirect()->route('login');
        return $vista;
    }

    public function cuadros()
    {
        Auth::check() ? $vista = view('cuadros') : $vista = redirect()->route('login');
        return $vista;
    }

    public function validacion()
    {
        Auth::check() ? $vista = view('validaciones') : $vista = redirect()->route('login');
        return $vista;
    }

    public function modalspagina()
    {
        Auth::check() ? $vista = view('modals') : $vista = redirect()->route('login');
        return $vista;
    }  

    public function ribbonspagina()
    {
        Auth::check() ? $vista = view('ribbons') : $vista = redirect()->route('login');
        return $vista;
    } 

     public function generalpagina()
    {
        Auth::check() ? $vista = view('general') : $vista = redirect()->route('login');
        return $vista;
    }  

     public function tabspagina()
    {
        Auth::check() ? $vista = view('tabs') : $vista = redirect()->route('login');
        return $vista;
    } 

    public function timelinepagina()
    {
        Auth::check() ? $vista = view('timeline') : $vista = redirect()->route('login');
        return $vista;
    }

    public function formulariopagina()
    {
        Auth::check() ? $vista = view('formulario') : $vista = redirect()->route('login');
        return $vista;
    }  

}
