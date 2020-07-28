<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session;
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

    public function fechaspagina()
    {
        Auth::check() ? $vista = view('fechas') : $vista = redirect()->route('login');
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

        $id = $this->encrypt_decrypt('encrypt', 100);

        Auth::check() ? $vista = view('encrypt')->with( compact('id')) : $vista = redirect()->route('login');

        return $vista;
    }

    public function encrypted(Request $request)
    {

        $id = $this->encrypt_decrypt('decrypt', $request->user_id);

        if ($id){
            alert()->success('Valor decriptado: '.$id, 'Encriptación');
        } else {
            alert()->error('Error en la Validación', 'Encriptación');
        }
       
       return redirect()->route('front.encrypt');
    }

    public function encrypt_decrypt($action, $string)
        {
          $output = false;
         
          $encrypt_method = "AES-256-CBC";
          $secret_key = 'This is my secret key';
          $secret_iv = 'This is my secret iv';

          $key = hash('sha256', $secret_key);
          $iv = substr(hash('sha256', $secret_iv), 0, 16);
         
          if ($action == 'encrypt')
          {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
          }
          else
          {
            if ($action == 'decrypt')
            {
              $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            }
          }
         
          return $output;
        }

    public function selloDigital()
    {
        Auth::check() ? $vista = view('selloOple') : $vista = redirect()->route('login');
        return $vista;
    }

    public function verificador()
    {
        Auth::check() ? $vista = view('verificador') : $vista = redirect()->route('login');
        return $vista;
    }

    public function cuadrosdos()
    {
        Auth::check() ? $vista = view('cuadrosdos') : $vista = redirect()->route('login');
        return $vista;
    }

    public function email()
    {
        Auth::check() ? $vista = view('email') : $vista = redirect()->route('login');
        return $vista;
    }

}
