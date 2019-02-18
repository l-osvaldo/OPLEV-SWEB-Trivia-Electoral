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

Route::get('/', function () {
	return view('auth/login');
});

Route::resource('programa', 'PoaController');
Route::get('obtenProgramaEsp', 'PoaController@obtenProgramaEsp')->name('obten.programa.esp');

Auth::routes();


//Route::post('programa/create','PoaController@create')->name('poa.create');

