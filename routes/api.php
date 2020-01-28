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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');
    route::get('/', function() {
        return Auth::user()->level;
    })->middleware('jwt.verify');


//});

Route::post('tambahanggota','AnggotaController@store')->middleware('jwt.verify');
Route::put('ubahanggota/{id}','AnggotaController@update')->middleware('jwt.verify');
Route::delete('deleteanggota/{id}','AnggotaController@destroy')->middleware('jwt.verify');
Route::get('tampilanggota','AnggotaController@index')->middleware('jwt.verify');

Route::post('tambahbuku','BukuController@store')->middleware('jwt.verify');
Route::put('ubahbuku/{id}','BukuController@update')->middleware('jwt.verify');
Route::delete('deletebuku/{id}','BukuController@destroy')->middleware('jwt.verify');
Route::get('tampilbuku','BukuController@index')->middleware('jwt.verify');

