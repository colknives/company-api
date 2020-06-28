<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([ 'middleware' => 'employee-auth', 'prefix' => 'employee' ], function () use ($router) {
    Route::get('list', ["as" => "employee.list", "uses" => "EmployeeController@list"]);
    Route::post('save', ["as" => "employee.save", "uses" => "EmployeeController@save"]);
    Route::patch('update/{id}', ["as" => "employee.update", "uses" => "EmployeeController@update"]);
    Route::delete('delete/{id}', ["as" => "employee.delete", "uses" => "EmployeeController@delete"]);
    Route::get('all', ["as" => "employee.all", "uses" => "EmployeeController@all"]);
});