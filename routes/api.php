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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// controller satuan
Route::get('satuan', 'SatuanController@index')->name('satuan')->middleware('is_admin')->middleware('auth');
Route::get('satuan/edit_satuan/{id}', 'SatuanController@edit')->name('edit_satuan')->middleware('is_admin')->middleware('auth');
Route::get('satuan_satuan/{id}', 'SatuanController@destroy')->name('destroy_satuan')->middleware('is_admin')->middleware('auth');
Route::post('satuan/update_satuan/{id}', 'SatuanController@update')->name('update_satuan')->middleware('is_admin')->middleware('auth');
Route::post('satuan/tambah_satuan', 'SatuanController@store')->name('tambah_data_satuan')->middleware('is_admin')->middleware('auth');
