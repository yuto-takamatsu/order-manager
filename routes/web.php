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

Route::get('/save/{id}/edit_item', 'SaveController@edit_item');
Route::patch('/save/{id}', 'SaveController@update_item');

Route::post('/save/create_company', 'SaveController@store_company');
Route::post('/save/create_item', 'SaveController@store_item');