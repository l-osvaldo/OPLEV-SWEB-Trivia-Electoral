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
Route::group(['middleware' => 'disablepreventback'],function()
{
Route::get('/', 'PoaController@index')->name('index');
Route::get('/poa/obtenProgramaEsp', 'PoaController@obtenProgramaEsp')->name('obten.programa.esp');
Route::get('obtenActividades', 'PoaController@obtenActividades')->name('obten.programa.actividades');
Route::get('obtenObjetivoAct', 'PoaController@obtenObjetivoAct')->name('obten.objetivo.actividad');
Route::get('obtenPorcProgramado', 'PoaController@obtenPorcProgramado')->name('obten.porcentaje.programado');
Route::get('obtenPorcRealizado', 'PoaController@obtenPorcRealizado')->name('obten.porcentaje.realizado');
Route::get('obtenDetallesActi', 'PoaController@obtenDetallesActi')->name('obten.detalle.actividades');
//Route::get('obtenRealizadoMes', 'PoaController@obtenRealizadoMes')->name('obten.realizado.mes');
Route::get('/reppoa', 'ReportesController@index')->name('reppoa');
Route::get('/repindicadores', 'ReportesController@indexindicador')->name('repindicadores');
Route::get('/admin/obtenProgramaEsp', 'AdminController@obtenProgramaEsp')->name('admin.obten.programa.esp');
Route::get('/admin/obtenObjetivoAct', 'AdminController@obtenObjetivoAct')->name('admin.obten.objetivo.actividad');
Route::get('/admin/obtenActividades', 'AdminController@obtenActividades')->name('admin.obten.programa.actividades');
Route::get('/admin/obtenPorcProgramado', 'AdminController@obtenPorcProgramado')->name('admin.obten.porcentaje.programado');
Route::get('/admin/obtenPorcRealizado', 'AdminController@obtenPorcRealizado')->name('admin.obten.porcentaje.realizado');
Route::get('/admin/obtenDetallesActi', 'AdminController@obtenDetallesActi')->name('admin.obten.detalle.actividades');
Route::get('/poatrimestral', 'AdminController@poatrimestral')->name('admin.poa.trimestral');
// Email related routes
Route::get('/mail/send', 'MailController@send')->name('emailsend');
// ALERT&AS
Route::get('/alertames', 'PoaController@alertames')->name('alertames');
Route::get('/bitacora', 'ReportesController@bitacora')->name('bitacora');
Route::get('/bitacorames', 'ReportesController@bitacorames')->name('bitacorames');
Route::get('/tablames', 'ReportesController@tablames')->name('tablames');


Route::post('/reportes/poa', 'ReportesController@poa')->name('reportes.poa');
Route::post('/reportes/indicadores', 'ReportesController@indicadores')->name('reportes.indicadores');
Route::resource('programa', 'PoaController');
Auth::routes();
Route::resource('adicionales', 'AdicionalesController');
Route::post('/reportes/adicionales', 'ReportesController@adicionales')->name('reportes.adicionales');
Route::post('/reportes/trimestral', 'ReportesController@trimestral')->name('reportes.trimestral');


Route::put('/admin/guardarObsTrim', 'AdminController@guardarObsTrim')->name('admin.guardar.obs.trim');


Route::post('/reportes/poatrimestral', 'ReportesController@poatrimestral')->name('reportes.poa.trimestral');

Route::resource('admin', 'AdminController');

// Email related routes
Route::post('/mail/send', 'MailController@send')->name('emailsend');
// ALERT&AS
Route::post('/clickalertas', 'PoaController@clickalertas')->name('clickalertas');
Route::post('/clickalertasfin', 'PoaController@clickalertasfin')->name('clickalertasfin');
Route::post('/alertames', 'PoaController@alertames')->name('alertames');

Route::post('/buscarmes', 'ReportesController@buscarmes')->name('buscarmes');
Route::post('/buscaentre', 'ReportesController@buscaentre')->name('buscaentre');

});

