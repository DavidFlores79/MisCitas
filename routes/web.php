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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/specialties', 'SpecialtyController@index');
    Route::get('/specialties/create', 'SpecialtyController@create');  //muestra formulario de registro
    Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');
    Route::post('/specialties', 'SpecialtyController@store'); //envio del formulario de registro o mostrar errores
    Route::put('/specialties/{specialty}', 'SpecialtyController@update');  //guarda los cambios en la DB
    Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy');  //guarda los cambios en la DB
    
    //Doctors
    Route::resource('doctors', 'DoctorController');
    //Patients
    Route::resource('patients', 'PatientController');
});

//Estas son las rutas que estaran asociadas con la ESPECIALIDAD
    // :: vervo HTTP                                //@ método q atiende la peticion en el controlador

