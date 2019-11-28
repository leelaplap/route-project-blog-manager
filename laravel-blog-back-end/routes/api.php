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

Route::prefix('blogs')->group(function (){
    Route::get('/','api\BlogController@getAllBlog');
    Route::post('/store','api\BlogController@store');
    Route::get('/{id}','api\BlogController@getById');
    Route::put('/{id}/update','api\BlogController@updateBlog');
    Route::delete('/{id}/delete','api\BlogController@delete');
});
