<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;
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

Auth::routes();

// route for users

// route for task
Route::get('/createTask','TasksController@create');
Route::post('/task','TasksController@store');
Route::patch('/task/{task}/update','TasksController@update')->name('tasks.update');
Route::get('/task/{task}/delete','TasksController@delete');
Route::get('/task/{task}/details', 'TasksController@details')->name('tasks.show');
Route::get('/task/{task}/update', 'TasksController@index');

Route::get('/home', 'HomeController@index')->name('home');

