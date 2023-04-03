<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/save/create_company','SaveController@create_company');
Route::get('/save/create_item','SaveController@create_item');

Route::get('/save/item{id}/edit_item', 'SaveController@edit_item');
Route::patch('/save/item{id}', 'SaveController@update_item');
Route::get('/save/item{id}', 'SaveController@show_item');
Route::delete('save/item{id}', 'SaveController@destroy_item');

Route::get('/company_list', 'SaveController@company_list');
Route::get('/save/company{id}/edit_company', 'SaveController@edit_company');
Route::patch('/save/company{id}', 'SaveController@update_company');
Route::get('/save/company{id}', 'SaveController@show_company');
Route::delete('/save/company{id}', 'SaveController@destroy_company');

Route::post('/save/create_company', 'SaveController@store_company');
Route::post('/save/create_item', 'SaveController@store_item');