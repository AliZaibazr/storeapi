<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
Route::group(['prefix' => 'auth'], function () {
    Route::Post('/register','API\Auth\SignupController@register')->name('register-user');
    Route::Post('/login','API\Auth\SignupController@login')->name('login-user');
   


Route::group(['middleware' => 'auth:api'], function () {
//Product Curd


Route::Post('/update','API\Products\ProductController@update')->name('update-product');
Route::Post('/destroy','API\Products\ProductController@destroy')->name('destroy-product');

Route::get('/make-permission','API\Users\UserController@makePermission')->name('make-permission');
Route::get('/logout','API\Auth\SignupController@logout')->name('logout-user');    
Route::get('/user','API\Auth\SignupController@user')->name('auth-user');    
});
Route::get('/index-user','API\Users\UserController@index')->name('index-user');
Route::get('/index','API\Products\ProductController@index')->name('index-product');
Route::Post('/store','API\Products\ProductController@store')->name('store-product');
Route::Post('/assignpermission','API\Users\PermisssionController@assignPermission')->name('assign-permission');
Route::Post('/revokepermission','API\Users\PermisssionController@revokePermission')->name('revoke-permission');
Route::get('/index-permission','API\Users\PermisssionController@index')->name('index-permission');
});


