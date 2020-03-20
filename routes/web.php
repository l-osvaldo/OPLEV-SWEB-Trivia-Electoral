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
Route::get('/widgets', 'DashboardController@widgetspagina')->name('front.widgets');
Route::get('/tables', 'DashboardController@tablaspagina')->name('front.tables');
});

