<?php

use Illuminate\Http\Request;

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
    Route::get('todo_all/{id}', 'TodoController@todoAll');
    Route::get('todo/{id}', 'TodoController@todoShow');
    Route::post('todo_add', 'TodoController@todoAdd');
    Route::post('todo_update/{id}', 'TodoController@todoUpdate');
    Route::post('todo_remove/{id}', 'TodoController@todoRemove');

