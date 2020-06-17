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

Route::get('api', function () {
    return response()->json(['message' => 'LOAN SIMULATOR API', 'status' => 'Connected']);
});

Route::get('/', function () {
    return redirect('api');
});
