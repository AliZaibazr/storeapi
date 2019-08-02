<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Signup login controller
Route::Post('/register','API\Auth\SignupController@register')->name('register-user');
Route::Post('/login','API\Auth\SignupController@login')->name('login-user');
//Product Curd
Route::Post('/store','API\Product\ProductController@store')->name('store-product');



