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
Route::get('/orcamento/visualizar','ControladorOrcamento@index');
Route::post('/orcamento/solicita','ControladorOrcamento@store');
Route::any('/orcamento/pesquisar','ControladorOrcamento@pesquisar');
