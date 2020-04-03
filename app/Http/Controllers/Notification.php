<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use DateTime;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;
use App\Events\MyEvent;
use Carbon\Carbon;

class Notification extends Controller
{
	public function authorizeUser(Request $request) {
		$key = 'c298b7f80f6c55437712';
		$secret = 'a10337694b00b4a49d79';
		$channel_name = $request->channel_name;
		$socket_id = $request->socket_id;
		$string_to_sign = $socket_id.':'.$channel_name;
		$signature = hash_hmac('sha256', $string_to_sign, $secret);
		return response()->json(['auth' => $key.':'.$signature]);
	}

	public function sendNotification(){
		event(new MyEvent('hello world'));
	}


}
