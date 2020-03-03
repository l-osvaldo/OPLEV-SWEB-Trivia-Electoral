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
Route::get('/obtenProgramaEspPoa', 'PoaController@obtenProgramaEsp')->name('obten.programa.esp');
Route::get('obtenActividades', 'PoaController@obtenActividades')->name('obten.programa.actividades');
Route::get('obtenObjetivoAct', 'PoaController@obtenObjetivoAct')->name('obten.objetivo.actividad');
Route::get('obtenPorcProgramado', 'PoaController@obtenPorcProgramado')->name('obten.porcentaje.programado');
Route::get('obtenPorcRealizado', 'PoaController@obtenPorcRealizado')->name('obten.porcentaje.realizado');
Route::get('obtenDetallesActi', 'PoaController@obtenDetallesActi')->name('obten.detalle.actividades');
//Route::get('obtenRealizadoMes', 'PoaController@obtenRealizadoMes')->name('obten.realizado.mes');
Route::get('/reppoa', 'ReportesController@index')->name('reppoa');
Route::get('/repindicadores', 'ReportesController@indexindicador')->name('repindicadores');
Route::get('/obtenProgramaEspAdmin', 'AdminController@obtenProgramaEsp')->name('admin.obten.programa.esp');
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


Route::get('/reportes/poa', 'ReportesController@poa')->name('reportes.poa');
Route::get('/reportes/indicadores', 'ReportesController@indicadores')->name('reportes.indicadores');
Route::resource('programa', 'PoaController');
Auth::routes();
Route::resource('adicionales', 'AdicionalesController');
Route::get('/reportes/adicionales', 'ReportesController@adicionales')->name('reportes.adicionales');
Route::post('/rtrimestral', 'ReportesController@trimestral')->name('reportes.trimestral');


Route::put('/admin/guardarObsTrim', 'AdminController@guardarObsTrim')->name('admin.guardar.obs.trim');

Route::put('/admin/guardarObsIndicador', 'AdminController@guardarObsIndicador')->name('admin.guardar.obs.indicador');


Route::get('/reportes/poatrimestral', 'ReportesController@poatrimestral')->name('reportes.poa.trimestral');

Route::resource('admin', 'AdminController');

// Email related routes
Route::post('/mailsend', 'MailController@send')->name('emailsend');
// ALERT&AS
Route::post('/clickalertas', 'PoaController@clickalertas')->name('clickalertas');
Route::post('/clickalertasfin', 'PoaController@clickalertasfin')->name('clickalertasfin');
Route::post('/alertames', 'PoaController@alertames')->name('alertames');

Route::post('/buscarmes', 'ReportesController@buscarmes')->name('buscarmes');
Route::post('/buscaentre', 'ReportesController@buscaentre')->name('buscaentre');

Route::get('/change-password', 'ChangePasswordController@index');
Route::post('/change-password', 'ChangePasswordController@store')->name('change.password');
// POA CREACION
Route::get('/elaboracion', 'PoaController@elaboracion')->name('elaboracion');
Route::post('/sendactividad', 'PoaController@sendactividad')->name('sendactividad');
Route::post('/sendporgramaesp', 'PoaController@sendporgramaesp')->name('sendporgramaesp');
Route::post('/getAct', 'PoaController@getAct')->name('getAct');
Route::post('/cambiarnumero', 'PoaController@cambiarnumero')->name('cambiarnumero');
Route::post('/deleteactividad', 'PoaController@deleteactividad')->name('deleteactividad');
Route::get('/pdfelaboracion', 'ReportesController@pdfelaboracion')->name('reportes.pdfelaboracion');

Route::get('/pdfelaboracionAll', 'ReportesController@pdfelaboracionAll')->name('reportes.pdfelaboracionAll');

Route::post('/getindicador', 'PoaController@getindicador')->name('getindicador');
Route::get('/pdfindicador', 'ReportesController@pdfindicador')->name('reportes.pdfindicador');
Route::post('/sendobservacion', 'PoaController@sendobservacion')->name('sendobservacion');
Route::post('/getobservacion', 'PoaController@getobservacion')->name('getobservacion');
Route::post('/sendidObs', 'PoaController@sendidObs')->name('sendidObs');
Route::post('/sendidObsVal', 'PoaController@sendidObsVal')->name('sendidObsVal');
Route::post('/clickalertasobs', 'PoaController@clickalertas')->name('clickalertasobs');

Route::get('/reporteobs', 'PoaController@reporteobs')->name('reporteobs');
Route::post('/getidobs', 'PoaController@getidobs')->name('getidobs');

Route::post('/actindicador', 'PoaController@actindicador')->name('actindicador');

Route::post('/deleteobserr', 'PoaController@deleteobserr')->name('deleteobserr');

Route::get('/sistemonoff', 'PoaController@sistemonoff')->name('sistemonoff');
Route::post('/onOffsipsei', 'PoaController@onOffsipsei')->name('onOffsipsei');

Route::post('/newadicional', 'AdicionalesController@newadicional')->name('newadicional');

Route::post('/deleteadicional', 'AdicionalesController@deleteadicional')->name('deleteadicional');


Route::get('/repadicionales', 'AdminController@repadicionales')->name('repadicionales');

Route::post('/buscaadicionales', 'AdicionalesController@buscaadicionales')->name('buscaadicionales');

Route::get('/rtrimestralall', 'ReportesController@rtrimestralall')->name('reportes.rtrimestralall');

Route::get('/poatrimestralg', 'AdminController@poatrimestralg')->name('admin.poa.trimestralg');

Route::get('/poatrimestralgperiodo', 'AdminController@poatrimestralgperiodo')->name('admin.poa.trimestralp');

Route::post('/getprograma', 'AdminController@getprograma')->name('getprograma');

Route::post('/getprogramaesp', 'AdminController@getprogramaesp')->name('getprogramaesp');

Route::get('/rtrimestralperiodo', 'ReportesController@rtrimestralperiodo')->name('reportes.rtrimestralperiodo');

Route::get('/rtrimestralperiodog', 'ReportesController@rtrimestralperiodog')->name('reportes.rtrimestralperiodog');

Route::get('/poatrimestralgperiodoall', 'AdminController@poatrimestralgperiodoall')->name('admin.poa.trimestralpall');

Route::get('/trimbuscar', 'ReportesController@trimbuscar')->name('reportes.trimbuscar');

Route::post('/gettrimbuscar', 'ReportesController@gettrimbuscar')->name('gettrimbuscar');

Route::get('/trimestadistico', 'ReportesController@trimestadistico')->name('reportes.trimestadistico');

Route::post('/gettrimestadistico', 'ReportesController@gettrimestadistico')->name('gettrimestadistico');

Route::get('/poatriindicador', 'AdminController@poatriindicador')->name('poatriindicador');

Route::post('/gettriindicador', 'ReportesController@gettriindicador')->name('reportes.gettriindicador');

});

