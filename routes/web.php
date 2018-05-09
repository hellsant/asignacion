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

Route::get('profesional/ocultar/{id}', 'ProfesionalController@ocultar');
Route::resource('profesional', 'ProfesionalController');
Route::get('proyecto/ocultar/{id}', 'ProyectoController@ocultar');
Route::resource('proyecto', 'ProyectoController');
Route::get('area/ocultar/{id}', 'AreasController@ocultar');
Route::resource('area', 'AreasController');
Route::get('estudiante/ocultar/{id}', 'EstudianteController@ocultar');
Route::resource('estudiante', 'EstudianteController');
Route::get('modalidad/ocultar/{id}', 'ModalidadController@ocultar');
Route::resource('modalidad', 'ModalidadController');
Route::get('carrera/ocultar/{id}', 'CarreraController@ocultar');
Route::resource('carrera', 'CarreraController');
Route::get('subarea/{area}/{id}/create', 'SubAreatoController@recibe');
Route::get('subarea/ocultar/{id}', 'SubAreatoController@ocultar');
Route::resource('subarea', 'SubAreatoController');