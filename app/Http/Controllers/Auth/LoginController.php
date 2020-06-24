<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('login');
    }

    public function login(Request $request)
    {
        $password = $request->password;
        $email    = $request->email;
        $user     = User::where('email', $email)->first();

        if (!empty($user)) {

            $status = $user->status;
            if ($status == 1) {
                //print_r($user);exit;

                if (Hash::check($password, $user->password)) {
                    Auth::login($user);

                    return $this->sendLoginResponse($request);
                } else {
                    $aviso = 'Contraseña incorrecta.';
                    return view('auth.login', compact('aviso'));
                    Session::flush();
                }
                // return $this->sendFailedLoginResponse($request);
            } else {
                $aviso = 'Su cuenta esta desactivada, contacte al administrador del sistema.';
                return view('auth.login', compact('aviso'));
                Session::flush();
            }
        } else {
            $aviso = 'Este e-mail no existe en el sistema.';
            return view('auth.login', compact('aviso'));
            Session::flush();
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

}
