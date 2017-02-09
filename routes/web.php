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

Route::get('/Requirement','RequirementControl@index');
Route::post('/Requirement-Add','RequirementControl@add');
Route::get('/Requirement-view', 'RequirementControl@view');
Route::post('/Requirement-Update','RequirementControl@update');
Route::post('Requirement-delete', 'RequirementControl@delete');

Route::get('/License','LicenseControl@index');
Route::post('/License-Add','LicenseControl@add');
Route::get('/License-view', 'LicenseControl@view');
Route::post('/License-Update','LicenseControl@update');
Route::post('License-delete', 'LicenseControl@delete');

Route::get('/Measurement','MeasurementControl@index');
Route::post('/measurement-Add','MeasurementControl@add');
Route::get('/measurement-view', 'MeasurementControl@view');
Route::post('/measurement-Update','MeasurementControl@update');
Route::post('measurement-delete', 'MeasurementControl@delete');

Route::get('/Attribute','AttributeControl@index');
Route::post('/Attribute-Add','AttributeControl@add');
Route::get('/Attribute-view', 'AttributeControl@view');
Route::post('/Attribute-Update','AttributeControl@update');
Route::post('Attribute-delete', 'AttributeControl@delete');

Route::get('/Military','MilitaryControl@index');
Route::post('/Military-Add','MilitaryControl@add');
Route::get('/Military-view', 'MilitaryControl@view');
Route::post('/Military-Update','MilitaryControl@update');
Route::post('Military-delete', 'MilitaryControl@delete');

Route::get('/Rank','RankControl@index');
Route::post('/Rank-Add','RankControl@add');
Route::get('/Rank-view', 'RankControl@view');
Route::post('/Rank-Update','RankControl@update');
Route::post('Rank-delete', 'RankControl@delete');

Route::get('/Role','RoleControl@index');
Route::post('/Role-Add','RoleControl@add');
Route::get('/Role-view', 'RoleControl@view');
Route::post('/Role-Update','RoleControl@update');
Route::post('Role-delete', 'RoleControl@delete');

Route::get('/Leave','LeaveControl@index');
Route::post('/Leave-Add','LeaveControl@add');
Route::get('/Leave-view', 'LeaveControl@view');
Route::post('/Leave-Update','LeaveControl@update');
Route::post('Leave-delete', 'LeaveControl@delete');

Route::get('/Province','ProvinceControl@index');
Route::post('/Province-Add','ProvinceControl@add');
Route::get('/Province-view', 'ProvinceControl@view');
Route::post('/Province-Update','ProvinceControl@update');
Route::post('Province-delete', 'ProvinceControl@delete');

Route::get('/Area','AreaControl@index');
Route::post('/Area-Add','AreaControl@add');
Route::get('/Area-view', 'AreaControl@view');
Route::post('/Area-Update','AreaControl@update');
Route::post('Area-delete', 'AreaControl@delete');
