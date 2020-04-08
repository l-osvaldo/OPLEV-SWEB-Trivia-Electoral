<?php

namespace App\Http\Controllers;

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
		Storage::put('public/docs/'.$nombre, file_get_contents($pdf));
	}	

}
