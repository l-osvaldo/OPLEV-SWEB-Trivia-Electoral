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

Route::group(['middleware' => 'disablepreventback'], function () {
    Auth::routes();
    // Route::resource('programa', 'DashboardController');
    // Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/loader', 'DashboardController@loaderpagina')->name('front.loader');
    Route::get('/swal', 'DashboardController@swal')->name('front.swal');
    Route::get('/tables', 'DashboardController@tablaspagina')->name('front.tables');
    Route::get('/tables', 'DashboardController@tablaspagina')->name('front.tables');
    Route::get('/widgets', 'DashboardController@widgets')->name('front.widgets');
    Route::get('/cuadros', 'DashboardController@cuadros')->name('front.cuadros');
    Route::get('/validacion', 'DashboardController@validacion')->name('front.validacion');
    Route::post('/ejemplovalidacion', 'DashboardController@ejemplovalidacion')->name('ejemplovalidacion');
    Route::get('/modals', 'DashboardController@modalspagina')->name('front.modals');
    Route::get('/ribbons', 'DashboardController@ribbonspagina')->name('front.ribbons');
    Route::get('/general', 'DashboardController@generalpagina')->name('front.general');
    Route::get('/tabs', 'DashboardController@tabspagina')->name('front.tabs');
    Route::get('/timeline', 'DashboardController@timelinepagina')->name('front.timeline');
    Route::get('/formulario', 'DashboardController@formulariopagina')->name('front.formulario');
    Route::get('/encrypt', 'DashboardController@encrypt')->name('front.encrypt');
    Route::post('/encrypted', 'DashboardController@encrypted')->name('front.encrypted');
    Route::get('/visorpdf', 'DashboardController@visorpdf')->name('front.visorpdf');
    Route::get('/highcharts', 'DashboardController@highcharts')->name('front.highcharts');
    Route::post('/authchannel', 'Notification@authorizeUser')->name('authchannel');
    Route::post('/notifyservice', 'Notification@decryptstring')->name('notifyservice');
    Route::get('/sendNotification', 'Notification@sendNotification')->name('sendNotification');
    Route::get('/generate-pdf', 'PDFController@pdfview')->name('generate-pdf');
    Route::get('/sello-digital', 'DashboardController@selloDigital')->name('front.sello-digital');
    Route::get('/verificador-sello', 'DashboardController@verificador')->name('front.verificador-sello');
    Route::get('/fechas', 'DashboardController@fechaspagina')->name('front.fechas');
    Route::get('/cuadros_dos', 'DashboardController@cuadrosdos')->name('front.cuadros_dos');
    Route::get('/email', 'DashboardController@email')->name('front.email');

    Route::get('/', 'TriviaController@index')->name('index');
    Route::get('/gestionUsuarios', 'TriviaController@index')->name('gestionUsuarios');
    Route::get('/estadisticas', 'TriviaController@estadisticas')->name('estadisticas');
    Route::get('/gestionPreguntas', 'TriviaController@gestionPreguntas')->name('gestionPreguntas');

    Route::post('/registrarPregunta', 'TriviaController@registrarPregunta')->name('registrarPregunta');
    Route::post('/editarPregunta', 'TriviaController@editarPregunta')->name('editarPregunta');
    Route::post('/eliminarPregunta', 'TriviaController@eliminarPregunta')->name('eliminarPregunta');

});
Route::post('/destroy_document', 'PDFController@destroy_document')->name('destroy_document');
Route::get('/generar_sello', 'selloDigitalController@selloDigital')->name('generar_sello');
Route::get('/ver-pdf/{id}', 'PDFController@view');
