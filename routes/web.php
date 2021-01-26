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

Route::get('/', "PageController@index");
//Route::resource('mantenimiento/cargos', "CargoController");

//  ruta dinámica
 

Route::post('mantenimiento/{modelo}', 'PageController@insert'); // registrar
Route::put('mantenimiento/{modelo}/{id}', 'PageController@update'); // editar
Route::delete('mantenimiento/{modelo}/{id}', 'PageController@delete');// eliminar 
Route::get('mantenimiento/{modelo}/{id}/edit', 'PageController@select'); // extraer datos para el formulario en json
Route::get('mantenimiento/{modelo}', 'PageController@getPage'); //mostrar datos para listar
Route::get('consulta/{modelo}/{funcion}', 'PageController@ejecutarFuncion'); // ruta para combo box
Route::get('historia-clinica/evolucion/{paciente?}', 'HistoriaClinicaController@evolucion');
Auth::routes();


