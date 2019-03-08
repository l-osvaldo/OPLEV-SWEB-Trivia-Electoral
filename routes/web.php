<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PoaController@index')->name('index');

Route::resource('programa', 'PoaController');
Route::get('/poa/obtenProgramaEsp', 'PoaController@obtenProgramaEsp')->name('obten.programa.esp');
Route::get('obtenActividades', 'PoaController@obtenActividades')->name('obten.programa.actividades');
Route::get('obtenObjetivoAct', 'PoaController@obtenObjetivoAct')->name('obten.objetivo.actividad');
Route::get('obtenPorcProgramado', 'PoaController@obtenPorcProgramado')->name('obten.porcentaje.programado');
Route::get('obtenPorcRealizado', 'PoaController@obtenPorcRealizado')->name('obten.porcentaje.realizado');
Route::get('obtenDetallesActi', 'PoaController@obtenDetallesActi')->name('obten.detalle.actividades');
Route::get('obtenRealizadoMes', 'PoaController@obtenRealizadoMes')->name('obten.realizado.mes');
Route::get('/reppoa', 'ReportesController@index')->name('reppoa');
Route::get('/repindicadores', 'ReportesController@indexindicador')->name('repindicadores');
Route::post('/reportes/poa', 'ReportesController@poa')->name('reportes.poa');
Route::post('/reportes/indicadores', 'ReportesController@indicadores')->name('reportes.indicadores');

Auth::routes();


Route::resource('adicionales', 'AdicionalesController');
Route::post('/reportes/adicionales', 'ReportesController@adicionales')->name('reportes.adicionales');



Route::get('pdf', 'PoaController@invoice');
