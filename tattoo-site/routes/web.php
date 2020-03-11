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

Route::get('/orcamento','ControladorOrcamento@create');
Route::post('/orcamento','ControladorOrcamento@store');
Route::get('/orcamentos','ControladorOrcamento@index');
Route::post('/orcamento/salvar','ControladorOrcamento@update');
Route::any('/orcamento/pesquisar','ControladorOrcamento@pesquisar');
