<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::group(['middleware'=>'auth'], function(){
    Route::resource('/mensagem','MensagemController');
    Route::resource('/resposta','RespostaController');
    Route::get('/resposta/create/{id}','RespostaController@create')->name('criar');
    Route::get('/resposta/showAnswers/{id}','RespostaController@showAnswers')->name('ver');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
