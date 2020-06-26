<?php

namespace App\Http\Controllers;

use DB;
use PDFS;
use Response;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PDFController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	protected function getFileName($file)
	{
		return str_random(32) . '.' . $file->extension();
	}

	public function getClientOriginalExtension()
	{
		return pathinfo($this->originalName, PATHINFO_EXTENSION);
	}

	public function view($id)
	{
		$file = storage_path('app/docs/') . $id . '.pdf';

		if (file_exists($file)) {

			$headers = [
				'Content-Type' => 'application/pdf'
			];

			return response()->download($file, 'Test File', $headers, 'inline');
		} else {
			abort(404, 'Archivo no encontrado!');
		}
	}

	public function store(Request $request)
	{
		$pdf = $request->File('nombreDeSuInput');
		$extension  = $pdf->getClientOriginalExtension();
		$nombre = $pdf->getFilename().'.'.$extension;
		Storage::put('app/docs/'.$nombre, file_get_contents($pdf));
	}

	public function pdfview(Request $request)
	{
		$users = DB::table("users")->get();
		view()->share('users',$users);
		$pdf = PDFS::loadView('pdfUsers');
		//Se guarda en el storage		
    $pdf->save(storage_path('/app/docs/listausuarios.pdf'));
		return view('pdfUsers');
	}

	 public function destroy_document(Request $request)
    { 
      $filename = $request->input('filename');
      Storage::delete('docs/'.$filename); 
      return response()->json($filename);
    }

}
