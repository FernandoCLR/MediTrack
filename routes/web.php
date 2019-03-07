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

Route::get('/', 'PagesController@welcome');
Route::get('/registration', 'PagesController@registration');
Route::get('/dashboard', 'PagesController@dashboard');

Route::resource('timeline','TimelineControler');


Auth::routes();

Route::resource('home','DashController');
Route::resource('onlinehelp','onlineHelpController');
Route::resource('echannel','EchannelingController');

Route::get('events', 'EventController@index')->name('events.index');
Route::post('events', 'EventController@addEvents')->name('events.add');

Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');
Route::get('/live_search/{row}','LiveSearch@show');
Route::get('/live_search/history/{user}','LiveSearch@showtwo');
Route::get('/live_search/history/{user}/details','LiveSearch@details');
Route::get('/live_search/history/{user}/edit','LiveSearch@edit');
Route::put('/live_search/history/{user}/update','LiveSearch@update');
Route::post('/live_search/history/{user}/store','LiveSearch@store');
Route::get('/live_search/history/{user}/create','LiveSearch@create');


Route::get('echannel/create', 'EchannelingController@index');
Route::post('echannel/create/fetch', 'EchannelingController@fetch')->name('echannel.create.fetch');

