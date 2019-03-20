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
//Route::get('obtenRealizadoMes', 'PoaController@obtenRealizadoMes')->name('obten.realizado.mes');
Route::get('/reppoa', 'ReportesController@index')->name('reppoa');
Route::get('/repindicadores', 'ReportesController@indexindicador')->name('repindicadores');
Route::post('/reportes/poa', 'ReportesController@poa')->name('reportes.poa');
Route::post('/reportes/indicadores', 'ReportesController@indicadores')->name('reportes.indicadores');

Auth::routes();

Route::resource('adicionales', 'AdicionalesController');
Route::post('/reportes/adicionales', 'ReportesController@adicionales')->name('reportes.adicionales');

Route::get('/admin/obtenProgramaEsp', 'AdminController@obtenProgramaEsp')->name('admin.obten.programa.esp');
Route::get('/admin/obtenObjetivoAct', 'AdminController@obtenObjetivoAct')->name('admin.obten.objetivo.actividad');
Route::get('/admin/obtenActividades', 'AdminController@obtenActividades')->name('admin.obten.programa.actividades');
Route::get('/admin/obtenPorcProgramado', 'AdminController@obtenPorcProgramado')->name('admin.obten.porcentaje.programado');
Route::get('/admin/obtenPorcRealizado', 'AdminController@obtenPorcRealizado')->name('admin.obten.porcentaje.realizado');
Route::get('/admin/obtenDetallesActi', 'AdminController@obtenDetallesActi')->name('admin.obten.detalle.actividades');
Route::get('/trimestral', 'AdminController@trimestral')->name('admintrimestral');


Route::resource('admin', 'AdminController');

