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

    Route::get('/', function () {
        return view('manage-imobilizado');
    });

    Route::get('add', function () {
        return view('add-imobilizado');
    });

});

Route::prefix('test')->group(function () {

    Route::get('/conta','TestController@conta');
    Route::get('/imobilizado','TestController@imobilizado');

});