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
Route::any('proyecto/finalizar/{id}', 'ProyectoController@finalizar')->name('proyecto.finalizar');
Route::any('proyectosCulminados', 'ProyectoController@proyectosCulminados')->name('proyecto.proyectosCulminados');
Route::any('terminarCiclo/{id}', 'ProyectoController@terminarCiclo')->name('proyecto.terminarCiclo');

Route::get('area/ocultar/{id}', 'AreasController@ocultar');
Route::resource('area', 'AreasController');
Route::get('estudiante/ocultar/{id}', 'EstudianteController@ocultar');
Route::resource('estudiante', 'EstudianteController');
Route::get('modalidad/ocultar/{id}', 'ModalidadController@ocultar');
Route::resource('modalidad', 'ModalidadController');
Route::get('carrera/ocultar/{id}', 'CarreraController@ocultar');
Route::resource('carrera', 'CarreraController');

Route::any('subarea', 'SubareaController@index')->name('subarea.index');
Route::any('subarea/create/{area}', 'SubareaController@store')->name('subarea.store');
Route::any('subarea/ocultar/{id}', 'SubareaController@ocultar');
Route::any('subarea/edit/{id}', 'SubareaController@edit')->name('subarea.edit');
Route::any('subarea/update/{id}', 'SubareaController@update')->name('subarea.update');
Route::any('subarea/profesionales/{s}', 'SubareaController@indexProfesionales')->name('subarea.profesional');
Route::any('subarea/eliminarProfesional/{idprofesional}/{idsubarea}', 'SubareaController@ocultarProfesional')->name('subarea.ocultarProfesional');


Route::any('subarea/registrar/{area}', 'SubareaController@recibe')->name('subarea.recibe');


Route::resource('tribunal', 'TribunalController');
Route::any('tribunal/registrar/{p}', 'TribunalController@registrar')
->name('tribunal.asignar');
Route::any('tribunal/listaTutores/{p}', 'TribunalController@listaTutores')
->name('tribunal.listaTutores');
Route::any('tribunal/reasignar/{idprofesional}/{idproyecto}', 'TribunalController@reasignar')
->name('tribunal.reasignar');
Route::any('tribunal/cambiar/{idprofesional}/{idproyecto}', 'TribunalController@cambiar')
->name('tribunal.cambiar');
Route::any('tribunal/retirar/{idprofesional}/{idproyecto}', 'TribunalController@retirar')
->name('tribunal.retirar');
Route::any('tribunal/listaReasignar/{id}', 'TribunalController@listaReasignar')
->name('tribunal.listaReasignar');
