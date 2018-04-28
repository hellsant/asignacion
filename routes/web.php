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

Route::resource('profesional', 'ProfesionalController');
Route::resource('proyecto', 'ProyectoController');
Route::resource('area', 'AreasController');
Route::resource('estudiante', 'EstudianteController');
Route::resource('modalidad', 'ModalidadController');
Route::resource('subarea', 'SubAreatoController');

