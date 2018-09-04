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

Route::post('agency', 'AgencyController@store');

Route::get('report/{datetype}/{from}/{to}', 'ReportController@results');

Route::put('product/update', 'ProductController@update');

