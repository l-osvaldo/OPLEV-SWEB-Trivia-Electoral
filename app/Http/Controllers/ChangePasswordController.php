<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Alert;
  
class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listausuarios = User::all();
        return view('/auth/passwords/changePassword',compact('listausuarios'));
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'unidadtecnica' => ['required'],
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $query = User::where('id', '=', $request->unidadtecnica)->first();

         if (!$query) {
             dd('Error 000xxx1.');
         }

         if (!Hash::check($request->current_password, $query->password)) {
             dd('Error 000xxx2.');
         }
           
   
        //User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        User::where('id',$request->unidadtecnica)->update(['password'=> Hash::make($request->new_password)]); 
            dd('ok.');
    }
}