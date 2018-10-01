<?php

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

Route::get('/', 'PagesController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//opcional logs
Route::get('/logs/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');