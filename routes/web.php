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
    return view('index');
});

Route::get('/telamensagens', function () {
    return view('mensagens');
});

Route::group(['prefix' => 'api'], function()
{
	Route::get('pessoas', 'PessoaController@lista');
	Route::post('pessoas', 'PessoaController@novo');
	Route::put('pessoa/{id}', 'PessoaController@editar');
	Route::delete('pessoa/{id}', 'PessoaController@excluir');
	Route::get('mensagens', 'MessagesController@lista');
	Route::post('mensagens', 'MessagesController@novo');
});
