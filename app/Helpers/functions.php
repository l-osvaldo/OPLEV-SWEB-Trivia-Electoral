<?php
//function global_function_example($str)
function global_function_example()
{
	$user   = auth()->user();
    $areaId = $user->idarea;

    if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('consulta')) 
    {          
    	$variable = DB::table('actividades')->select('act_tipo_estatus')->take(1)->get();
    } else {
    	$variable = DB::table('actividades')->select('act_tipo_estatus')->where('idarea', $areaId)->take(1)->get();
    }

    return $variable[0]->act_tipo_estatus;
}