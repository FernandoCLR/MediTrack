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

Route::resource('timeline','TimelineControler')->middleware('verified');


Auth::routes(['verify' => true]);

Route::resource('home','DashController')->middleware('verified');
Route::resource('onlinehelp','onlineHelpController')->middleware('verified');
Route::resource('echannel','EchannelingController')->middleware('verified');
Route::get('payments/{id}','EchannelingController@payments')->middleware('verified');
Route::put('echannel/{echannel}','EchannelingController@updateTwo')->middleware('verified');

Route::get('events', 'EventController@index')->name('events.index')->middleware('verified');
Route::post('events', 'EventController@addEvents')->name('events.add');
Route::get('events/show','EventController@show');
Route::get('events/{user}/edit','EventController@edit');
Route::delete('event/{user}','EventController@destroy');
Route::put('events/{user}/update','EventController@update');

Route::get('/live_search', 'LiveSearch@index')->middleware('verified');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');
Route::get('/live_search/{row}','LiveSearch@show');
Route::get('/live_search/history/{user}','LiveSearch@showtwo');
Route::get('/live_search/history/{user}/details','LiveSearch@details');
Route::get('/live_search/history/{user}/edit','LiveSearch@edit');
Route::put('/live_search/history/{user}/update','LiveSearch@update');
Route::post('/live_search/history/{user}/store','LiveSearch@store');
Route::get('/live_search/history/{user}/create','LiveSearch@create');


Route::get('echannel/create', 'EchannelingController@index')->middleware('verified');
Route::post('echannel/create/fetch', 'EchannelingController@fetch')->name('echannel.create.fetch');
Route::post('echannel/create/search', 'EchannelingController@search');
Route::get('echannel/create/search/conf/{user}','EchannelingController@searchtwo');
Route::resource('hospital','HospitalController')->middleware('verified');
