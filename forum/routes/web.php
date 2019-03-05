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

Route::get('/', 'PagesController@indexPage');

Route::get('/about', 'PagesController@aboutPage');

Route::get('topics/filter', 'TopicController@filter');
Route::get('topics/search', 'TopicController@search');

Route::resource('topics', 'TopicController'); // Routes to all functions available in the topic controller

Route::get('topicposts/create/{id}', 'TopicPostController@create');
Route::get('topicposts/store/{id}', 'TopicPostController@store');
Route::resource('topicpost', 'TopicPostController', ['except' => ['create']]);

Auth::routes();
	
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
