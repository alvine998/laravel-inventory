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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/main/product', \App\Http\Controllers\ProductController::class);
Route::resource('/login', \App\Http\Controllers\LoginController::class);
Route::resource('/main/user', \App\Http\Controllers\UserController::class);
