<?php

use Illuminate\Support\Facades\Route;










Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/tasks', 'App\Http\Controllers\TaskController@index')->name('index');
Route::post('/tasks/store', 'App\Http\Controllers\TaskController@store')->name('store');
Route::get('/tasks/welcome', 'App\Http\Controllers\TaskController@welcome')->name('welcome');
Route::delete('/tasks/{task}', 'App\Http\Controllers\TaskController@destroy')->name('destroy');
Route::patch('/tasks/{task}/update', 'App\Http\Controllers\TaskController@update')->name('update');
