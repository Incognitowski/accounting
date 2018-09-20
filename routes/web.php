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
    return view('main');
});

Route::prefix('imobilizado')->group(function () {

    Route::get('/','ViewController@imobilizado');
    Route::get('/add','ViewController@addImobilizado');
    Route::post('/add','PostController@imobilizado');

});

Route::prefix('conta')->group(function () {

    Route::get('/','ViewController@conta');
    Route::get('/add','ViewController@addConta');

});

Route::prefix('test')->group(function () {

    Route::get('/conta','TestController@conta');
    Route::get('/imobilizado','TestController@imobilizado');
    Route::get('/lancamento','TestController@lancamento');

});