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
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/login','\Domain\Auth\AuthController@login')->name('admin.login');
	Route::post('/login','\Domain\Auth\AuthController@postLogin')->name('admin.postlogin');
	Route::resource('administradores','\Domain\Administrador\Http\AdministradoresController');
    Route::group(['middleware'=>'auth'], function(){
    	Route::get('/', '\Domain\Dashboard\Http\DashboardController@index')->name('admin.dashboard');
   		Route::resource('categorias', '\Domain\Categorias\Http\CategoriasController');
    	Route::resource('especificacoes', '\Domain\Especificacoes\Http\EspecificacoesController');
	});
});
