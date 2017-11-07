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

Route::get('/{page?}', ['as' => 'index', 'uses' => 'IndexController@index']);

Route::match(['get', 'post'], 'movie/search/{page?}', ['as' => 'movie.search', 'uses' => 'MoviesController@search']);

Route::get('movie/{id}', ['as' => 'movie.detail', 'uses' => 'MoviesController@detail']);
