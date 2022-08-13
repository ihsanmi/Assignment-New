<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controllers;

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

/*Route::get('/', function () {

    return "welcome";
});*/
Route::get('deshbord/','App\Http\Controllers\ProductController@index');
Route::get('createproduct/','App\Http\Controllers\ProductController@create');
Route::post('storeproduct/','App\Http\Controllers\ProductController@store');
Route::get('editproduct/{id}','App\Http\Controllers\ProductController@edit');
Route::put('updateproduct/{id}','App\Http\Controllers\ProductController@update');
Route::delete('deleteproduct/{id}','App\Http\Controllers\ProductController@destroy');
Route::get('/','App\Http\Controllers\LoginController@index');
Route::post('Checklogin/','App\Http\Controllers\LoginController@Checklogin');
Route::get('successlogin/','App\Http\Controllers\LoginController@successlogin');
Route::get('register/','App\Http\Controllers\LoginController@create');
Route::post('store/','App\Http\Controllers\LoginController@store');
Route::get('logout/','App\Http\Controllers\LoginController@destroy');
