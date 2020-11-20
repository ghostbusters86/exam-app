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

Route::any('/', 'QuestionController@index');
Route::any('start', 'QuestionController@start');
Route::any('submit-ans', 'QuestionController@submitAns');
Route::any('ans-page', 'QuestionController@anspage');
Route::any('add-question', 'QuestionController@store');
Route::any('update-question', 'QuestionController@update');
Route::any('delete-question', 'QuestionController@destroy');
Route::any('questions', 'QuestionController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
