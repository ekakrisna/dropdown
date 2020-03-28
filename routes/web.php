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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dropdown', 'DynamicDependent@index');

Route::post('dropdown/regencies', 'DynamicDependent@regencies')->name('dynamicdependent.regencies');
Route::post('dropdown/districts', 'DynamicDependent@districts')->name('dynamicdependent.districts');
Route::post('dropdown/villages', 'DynamicDependent@villages')->name('dynamicdependent.villages');
