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

Route::group([ 'middleware' => 'company-auth', 'prefix' => 'company' ], function () use ($router) {
    Route::get('list', ["as" => "company.list", "uses" => "CompanyController@list"]);
    Route::post('save', ["as" => "company.save", "uses" => "CompanyController@save"]);
    Route::patch('update/{id}', ["as" => "company.update", "uses" => "CompanyController@update"]);
    Route::delete('delete/{id}', ["as" => "company.delete", "uses" => "CompanyController@delete"]);
    Route::get('all', ["as" => "company.all", "uses" => "CompanyController@all"]);
});