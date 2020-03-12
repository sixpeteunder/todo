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

Route::view('/', 'welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/todos/new', 'create')->name('create')->middleware('auth');;
Route::get('/todos', 'HomeController@todos')->name('todos')->middleware('auth');
Route::view('/about', 'about')->name('about');
Route::permanentRedirect('/github', 'https://github.com/sixpeteunder/todo')->name('github');

