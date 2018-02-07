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

// Overview clients
Route::get('/clients', 'ClientsController@index')->name('clients.overview');

// Add client
Route::get('/clients/add', 'ClientsController@create')->name('clients.add');
Route::post('/clients/add', 'ClientsController@postCreate');

// Edit client
Route::get('/clients/edit/{id}', 'ClientsController@edit')->name('clients.edit');
Route::post('/clients/edit/{id}', 'ClientsController@postEdit');

// Delete client
Route::delete('/clients/delete/{id}', 'ClientsController@destroy');

// Overview patients
Route::get('/patients/{method?}/{field?}', 'PatientsController@index')->name('patients.overview');

// Add client
Route::get('/patients/add', 'PatientsController@create');
Route::post('/patients/add', 'PatientsController@postCreate');

// Edit patient
Route::get('/patients/edit/{id}', 'PatientsController@edit')->name('patients.edit');
Route::post('/patients/edit/{id}', 'PatientsController@postEdit');

// Delete client
Route::delete('/patients/delete/{id}', 'PatientsController@destroy');

// Overview species
Route::get('/species', 'SpeciesController@index')->name('species.overview');

Route::get('/species/add', 'SpeciesController@create');
Route::post('/species/add', 'SpeciesController@postCreate');

Route::get('/species/edit/{id}', 'SpeciesController@edit');
Route::post('/species/edit/{id}', 'SpeciesController@postEdit');
Route::delete('/species/delete/{id}', 'SpeciesController@destroy');

