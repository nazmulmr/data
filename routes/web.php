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


Route::get('/form','homeController@form');
Route::post('/process',[
   'uses'=>'homeController@process',
   'as'=>'add-process'
]);

Route::post('/employee/data',[
    'uses' => 'EmployeeController@index',
    'as' => 'employee-data'
]);


