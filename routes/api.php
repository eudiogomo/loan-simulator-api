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

Route::group(array('middleware' => 'api'), function()
{

  Route::get('api', function () {
      return response()->json(['message' => 'LOAN SIMULATOR API', 'status' => 'Connected']);
  });

  Route::resource('agreement', 'AgreementController');
  Route::resource('institution', 'InstitutionController');
  Route::resource('institutionfee', 'InstitutionFeeController');
});

Route::get('/', function () {
    return redirect('api');
});
