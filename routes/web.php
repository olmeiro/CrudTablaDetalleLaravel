<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'LandingController@index');

Route::get('/clientes', 'LandingController@clientes');

Route::get('/empresas', 'LandingController@empresas');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categorias', 'CategoriaController');

    Route::get('/producto', 'ProductoController@index');
    Route::get('/producto/crear', 'ProductoController@create');
    Route::get('/producto/listar', 'ProductoController@listar');
    Route::post('/producto/guardar/', 'ProductoController@save');
    Route::get('/producto/editar/{id}', 'ProductoController@edit');
    Route::post('/producto/actualizar', 'ProductoController@update');
    Route::get('/producto/cambiar/estado/{id}/{estado}', 'ProductoController@updateState');

    Route::get('/insumo', 'InsumoController@index');
    Route::get('/insumo/crear', 'InsumoController@create');
    Route::post('/insumo/guardar', 'InsumoController@save');
    Route::get('/insumo/listar', 'InsumoController@listar');
    Route::get('/insumo/editar/{id}', 'InsumoController@edit');
    Route::post('/insumo/actualizar', 'InsumoController@update');

    Route::get('/productoinsumo', 'ProductoInsumoController@index');
    Route::post('/productoinsumo/guardar', 'ProductoInsumoController@save');
    Route::get('/productoinsumo/listar', 'ProductoInsumoController@show');


});


