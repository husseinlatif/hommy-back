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

Route::POST('createRepublic', 'RepublicController@createRepublic');
Route::DELETE('deleteRepublic/{id}', 'RepublicController@deleteRepublic');
Route::GET('listRepublic', 'RepublicController@listRepublic');
Route::GET('showRepublic/{id}', 'RepublicController@showRepublic');
Route::PUT('updateRepublic/{id}', 'RepublicController@updateRepublic');
Route::PUT('addUser/{id}', 'RepublicController@addUser');
Route::PUT('removeUser/{id}', 'RepublicController@removeUser');


Route::POST('createUser', 'UserController@createUser');
Route::DELETE('deleteUser/{id}', 'UserController@deleteUser');
Route::GET('listUser', 'UserController@listUser');
Route::GET('showUser/{id}', 'UserController@showUser');
Route::PUT('updateUser/{id}', 'UserController@updateUser');