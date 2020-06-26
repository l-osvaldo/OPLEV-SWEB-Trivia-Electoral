<?php

namespace App\Http\Controllers;

use App\User;
use App\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Events\MyEvent;
use Carbon\Carbon;
use DateTime;

class Notification extends Controller
{
	public function authorizeUser(Request $request) {
		$key = env('PUSHER_APP_KEY');
		$secret = env('PUSHER_APP_SECRET');
		$channel_name = $request->channel_name;
		$socket_id = $request->socket_id;
		$string_to_sign = $socket_id.':'.$channel_name;
		$signature = hash_hmac('sha256', $string_to_sign, $secret);
		return response()->json(['auth' => $key.':'.$signature]);
	}

	public function sendNotification(){
		$usuario = auth()->user();
		$idUser = $usuario->id;
		$mensaje = 'Alerta del Sistema';
		$notify = new Notify([
			'idUser'    => $idUser,
			'mensaje'    =>  Crypt::encryptString($mensaje)
		]);
		$notify->save();
		event(new MyEvent($notify));
	}

	public function decryptstring(Request $request)
    {
      $mensaje = $request->input('mensaje');
      $men = Crypt::decryptString($mensaje);
      return response()->json(['success'=>compact('men')]);
    }

}
