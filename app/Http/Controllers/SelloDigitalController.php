<?php

namespace App\Http\Controllers;

use DB;
use PDFS;
use App\User;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SelloDigitalController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function selloDigital()
	{
		function encrypt_decrypt($action, $string) {
			$output = false;
			$encrypt_method = "AES-256-CBC";
			$secret_key = 'LEON ES EL HIJO MAS BONITO DEL MUNDO';
			$secret_iv = '07.0216171089';

			$key = hash('sha256', $secret_key);

			$iv = substr(hash('sha256', $secret_iv), 0, 16);
			if ( $action == 'encrypt' ) {
				$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
				$output = base64_encode($output);
			} else if( $action == 'decrypt' ) {
				$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
			}
			return $output;
		}

		$id = 1;
		$area = Area::find($id);

		$users = DB::table("users")->get();

		$plain_txt = 'sello ople';
		$hashDoc = "";
		$dataHora = "";

		$sello_digital = $area->sello_digital;
		$identificador = $area->identificador;
		$rfc = 'OPLE456789D9';

		$dataHora = date('Y-m-d H:i:s');
		$foliosito = mt_rand();
		$encrypted_txt = encrypt_decrypt('encrypt', $foliosito);
		$decrypted_txt = encrypt_decrypt('decrypt', $encrypted_txt);

		$rest1 = substr($encrypted_txt, 0, 7);
		$rest2 = substr($encrypted_txt, 7, 5);
		$rest3 = substr($encrypted_txt, 12, 8);
		$rest4 = substr($encrypted_txt, 20, 6);
		$rest5 = substr($encrypted_txt, 26, 6);

		$pdf = PDFS::loadView('pdfUsersSello', compact('hashDoc', 'dataHora', 'rest1', 'rest2', 'rest3', 'rest4', 'rest5', 'sello_digital','plain_txt', 'identificador', 'rfc','users'))->setPaper('letter', 'portrait');

		return $pdf->stream();

	}


	
}
