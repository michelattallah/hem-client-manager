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

Route::prefix('/backoffice/')->group(function () {

    Route::get('clients' , 'ClientsController@index');
    Route::get('clients/{client}' , 'ClientsController@show');
    Route::post('clients' , 'ClientsController@store');
    
    Route::post('upload' , 'UploadController@upload');
    Route::post('destroy' , 'UploadController@destroy');

});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
