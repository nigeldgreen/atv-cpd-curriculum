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

Route::prefix('v1')->middleware(['auth:api'])->group(function () {
    Route::get('/module', 'ModuleController@index');
    Route::get('/module/{module_id}', 'ModuleController@show');
    Route::post('/module', 'ModuleController@store');
    Route::put('/module', 'ModuleController@update');
    Route::delete('/module', 'ModuleController@destroy');
});
