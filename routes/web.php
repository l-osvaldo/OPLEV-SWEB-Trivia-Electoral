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

	Auth::routes();
	Route::resource('programa', 'DashboardController');
	Route::get('/', 'DashboardController@index')->name('index');
	Route::get('/loader', 'DashboardController@loaderpagina')->name('front.loader');
	Route::get('/swal', 'DashboardController@swal')->name('front.swal');
	Route::get('/tables', 'DashboardController@tablaspagina')->name('front.tables');
	Route::get('/tables', 'DashboardController@tablaspagina')->name('front.tables');
	Route::get('/widgets', 'DashboardController@widgets')->name('front.widgets');
	Route::get('/cuadros', 'DashboardController@cuadros')->name('front.cuadros');

	Route::get('/validacion', 'DashboardController@validacion')->name('front.validacion');
	Route::get('/modals', 'DashboardController@modalspagina')->name('front.modals');
	Route::get('/ribbons', 'DashboardController@ribbonspagina')->name('front.ribbons');
	Route::get('/general', 'DashboardController@generalpagina')->name('front.general');
	Route::get('/tabs', 'DashboardController@tabspagina')->name('front.tabs');
	Route::get('/timeline', 'DashboardController@timelinepagina')->name('front.timeline');
	Route::get('/formulario', 'DashboardController@formulariopagina')->name('front.formulario');
	Route::post('/authchannel', 'Notification@authorizeUser')->name('authchannel');
	Route::get('/notification', 'Notification@sendNotification');
});

