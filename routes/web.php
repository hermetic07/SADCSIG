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

Route::get('/Service','ServiceControl@index');
Route::post('/Service-Add','ServiceControl@add');
Route::get('/Service-view', 'ServiceControl@view');
Route::post('/Service-Update','ServiceControl@update');
Route::post('Service-delete', 'ServiceControl@delete');

Route::get('/Nature','NatureControl@index');
Route::post('/Nature-Add','NatureControl@add');
Route::get('/Nature-view', 'NatureControl@view');
Route::post('/Nature-Update','NatureControl@update');
Route::post('Nature-delete', 'NatureControl@delete');
