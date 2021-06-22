<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/form', function () {
    return view('welcome');
});
Route::get('/form/business_info', function () {
    return view('second_form');
});
Route::get('/form/business_docs_info', function () {
    return view('third_form');
});

Route::post('submitFormOne','FormController@store')->name('submitFormOne');
Route::post('submitFormTwo','FormController@storeFormTwo')->name('submitFormTwo');
Route::post('submitFormThree','FormController@submitFormThree')->name('submitFormThree');
