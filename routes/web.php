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

Route::get('/','ViewController@main');

Route::prefix('imobilizado')->group(function () {

    Route::get('/','ViewController@imobilizado');
    Route::get('/add','ViewController@addImobilizado');
    Route::get('/{imobilizado}','ViewController@editImobilizado');
    Route::post('/add','PostController@imobilizado');
    Route::put('/{imobilizado}','PutController@imobilizado');
    Route::delete('/{imobilizado}','DeleteController@imobilizado');

});

Route::prefix('conta')->group(function () {

    Route::get('/','ViewController@conta');
    Route::get('/add','ViewController@addConta');
    Route::get('/{conta}','ViewController@editConta');
    Route::post('/add','PostController@conta');
    Route::put('/{conta}','PutController@conta');
    Route::delete('/{conta}','DeleteController@conta');

});

Route::prefix('custo')->group(function () {

    Route::get('/','ViewController@custo');
    Route::get('/add','ViewController@addCusto');
    Route::post('/add','PostController@custo');
    Route::delete('/{custo}','DeleteController@custo');

});

Route::prefix('receita')->group(function () {

    Route::get('/','ViewController@receita');
    Route::get('/add','ViewController@addReceita');
    Route::post('/add','PostController@receita');
    Route::delete('/{receita}','DeleteController@receita');

});

Route::prefix('relatorio')->group(function () {

    Route::get('/','ViewController@relatorio');
    Route::get('/inicio/{inicio}/final/{final}','ViewController@relatorioGeral');
    Route::get('/imobilizado/{imobilizado}/inicio/{inicio}/final/{final}','ViewController@relatorioImobilizado');

});

Route::get("params","ViewController@parametros");

Route::post('feriados','FeriadoController@add');
