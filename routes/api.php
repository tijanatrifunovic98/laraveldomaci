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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List the articles,zove kontrolera
Route::get('articles','\App\Http\Controllers\ArticleController@index');
//List single article
Route::get('article/{id}','\App\Http\Controllers\ArticleController@show');
//Create new article
Route::post('article','\App\Http\Controllers\ArticleController@store');
//Update article
Route::put('article','\App\Http\Controllers\ArticleController@store');
//delete article
Route::delete('article/{id}','\App\Http\Controllers\ArticleController@destroy');

//List the articles,zove kontrolera
Route::get('countries','\App\Http\Controllers\CountryController@index');
//List single article
Route::get('country/{id}','\App\Http\Controllers\CountryController@show');
//Create new article
Route::post('country','\App\Http\Controllers\CountryController@store');
//Update article
Route::put('country','\App\Http\Controllers\CountryController@store');
//delete article
Route::delete('country/{id}','\App\Http\Controllers\CountryController@destroy');
