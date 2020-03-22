<?php

use Illuminate\Support\Facades\Route;
use Spatie\Tags\Tag;

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
Route::view('/todos/new', 'create', ["tags" => Tag::all()])->name('create')->middleware('auth');
Route::post('todos/new', 'HomeController@create')->middleware('auth');
Route::get('/todos', 'HomeController@todos')->name('todos')->middleware('auth');
Route::get('/todos/{todo}', 'HomeController@todo')->middleware('auth');
Route::get('/todos/{todo}/delete', 'HomeController@delete')->middleware('auth');
Route::view('/about', 'about')->name('about');
Route::permanentRedirect('/github', 'https://github.com/sixpeteunder/todo')->name('github');

