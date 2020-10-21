<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'v1'],function() {
    Route::get('hora','\Domain\Leiloes\Http\LeiloesApiController@hora')->name('api.hora');
    Route::get('leiloes/andamentos', '\Domain\Leiloes\Http\LeiloesApiController@andamentos')->name('leiloes.andamentos');
    Route::get('leiloes/encerrados', '\Domain\Leiloes\Http\LeiloesApiController@encerrados')->name('leiloes.encerrados');
    Route::get('leiloes/{leiloe}/finalizar', '\Domain\Leiloes\Http\LeiloesApiController@finaliza')->name('leiloes.finalizar');
    Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}','\Domain\Cliente\Http\ClientesApiController@getConfirm')->name('auth.confirm');
    Route::post('auth/login','\Domain\Auth\ApiAuthController@userAuth')->name('auth.login');
    Route::post('auth/register','\Domain\Cliente\Http\ClientesApiController@store')->name('auth.register');
    
    Route::group(['middleware'=>'jwt.auth'], function(){
        Route::get('auth/confirm','\Domain\Cliente\Http\ClientesApiController@confirm')->name('auth.confirm');
        Route::get('leiloes/{leiloe}/dar_lance','\Domain\Leiloes\Http\LeiloesApiController@dar_lance')->name('leiloes.darlance'); 
    });  
});
