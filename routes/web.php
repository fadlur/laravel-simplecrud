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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {//semua yang punya role admin lanjut kesini
    Route::get('/', 'Admin\CrudKecamatan@index');
    Route::resource('kecamatan','Admin\CrudKecamatan');
    Route::resource('desa','Admin\CrudDesa');
});
