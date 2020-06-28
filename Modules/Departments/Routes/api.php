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

Route::group([ 'middleware' => 'department-auth', 'prefix' => 'department' ], function () use ($router) {
    Route::get('list', ["as" => "department.list", "uses" => "DepartmentController@list"]);
    Route::post('save', ["as" => "department.save", "uses" => "DepartmentController@save"]);
    Route::patch('update/{id}', ["as" => "department.update", "uses" => "DepartmentController@update"]);
    Route::delete('delete/{id}', ["as" => "department.delete", "uses" => "DepartmentController@delete"]);
    Route::get('all', ["as" => "department.all", "uses" => "DepartmentController@all"]);
});