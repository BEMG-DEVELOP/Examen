<?php

use Illuminate\Routing\RouteGroup;
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

Route::get('/', function () {
    return view('welcome');
});

Route::namespace("App\\Http\\Controllers")->group(function () {
    
    //Rutas para el catalogo de Alumnos
    Route::get('Alumnos','AlumnosController@index')->name('Alumnos');
    Route::post('Guardad_Alumnos','AlumnosController@store')->name('guardarAlumno');
    Route::post('Actualizar_Alumno/{CodigoAlumno}','AlumnosController@update')->name('ActualizarAlumno');
    Route::get('BorrarAlumno/{CodigoAlumno}','AlumnosController@destroy')->name('alumnoEliminado');
    
    //Rutas para el catalogo de Materias
    Route::get('Materias','MateriaController@index')->name('materias');
    Route::post('Guardad_Materias','MateriaController@store')->name('guardarMateria');
    Route::post('Actualizar_Materia/{CodigoMateria}','MateriaController@update')->name('actualizarMateria');
    Route::get('BorrarMateria/{CodigoMateria}','MateriaController@destroy')->name('eliminarMateria');

    //Rutas para las inscripciones a materias y baja de materias
    Route::get('Inscribir','CalificacionesController@index')->name('inscribir');
    Route::post('Inscrito','CalificacionesController@store')->name('inscrito');
    Route::get('EditarCalifiaccion/{id_rel}','CalificacionesController@edit')->name('editarcali');
    Route::post('Calificacion/{id_rel}','CalificacionesController@update')->name('resultados');
    Route::get('Bajar/{id_rel}','CalificacionesController@destroy')->name('debaja');
});