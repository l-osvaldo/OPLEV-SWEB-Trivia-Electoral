<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
//use Illuminate\Support\Facades\Crypt
use Illuminate\Http\Request;
use Crypt;
use DB;
use Auth;

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
        Auth::check() ? $vista = view('widgets') : $vista = redirect()->route('login');
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

     public function ejemplovalidacion()
    {
        return redirect('validacion');
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

    public function visorpdf()
    {
        Auth::check() ? $vista = view('visorpdf') : $vista = redirect()->route('login');
        return $vista;
    }

    public function highcharts()
    {
        Auth::check() ? $vista = view('highcharts') : $vista = redirect()->route('login');
        return $vista;
    }

    public function encrypt()
    {

        $encrypted = Crypt::encrypt('100');

        //dd($encrypted);

        $parte1 = substr($encrypted, 0, 15);//eyJpdiI6I
        $parte2 = substr($encrypted, 15); //eyJpdiI6I

        $varVista = $parte1.str_random(10).$parte2;

        $respuesta = '';

        Auth::check() ? $vista = view('encrypt')->with( compact('encrypted','parte1','parte2','varVista','respuesta')) : $vista = redirect()->route('login');
        return $vista;
    }

    public function encrypted(Request $request)
    {

        $parte1 = substr($request->user_id, 0, 15);
        $parte2 = substr($request->user_id, 25);

        try {
            
            $Alert_texto='Valor decriptado: '.decrypt($parte1.$parte2);
            $Alert_subtitulo='OK!';
            $Alert_tipo='success';

        } catch (DecryptException $e) {

            $Alert_texto='Error de validación';
            $Alert_subtitulo='Error!';
            $Alert_tipo='error';

        }
       
       return redirect()->route('front.encrypt', compact('Alert_texto','Alert_subtitulo','Alert_tipo'));
    }

}
