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

Route::group(['middleware' => 'revalidate'], function()
{

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
Route::get('events/show','EventController@show')->middleware('verified');
Route::get('events/{user}/edit','EventController@edit')->middleware('verified');
Route::delete('event/{user}','EventController@destroy')->middleware('verified');
Route::put('events/{user}/update','EventController@update')->middleware('verified');

Route::get('/live_search', 'LiveSearch@index')->middleware('verified');
Route::post('/live_search/action', 'LiveSearch@action')->middleware('verified');
Route::delete('/live_search/{user}', 'LiveSearch@destroy')->middleware('verified');
Route::get('/live_search/{row}','LiveSearch@show')->middleware('verified');
Route::get('/live_search/history/{user}','LiveSearch@showtwo')->middleware('verified');
Route::get('/live_search/history/{user}/details','LiveSearch@details')->middleware('verified');
Route::get('/live_search/history/{user}/edit','LiveSearch@edit')->middleware('verified');
Route::put('/live_search/history/{user}/update','LiveSearch@update')->middleware('verified');
Route::post('/live_search/history/{user}/store','LiveSearch@store')->middleware('verified');
Route::get('/live_search/history/{user}/create','LiveSearch@create')->middleware('verified');


Route::get('echannel/create', 'EchannelingController@index')->middleware('verified');
Route::post('echannel/create/fetch', 'EchannelingController@fetch')->name('echannel.create.fetch');
Route::post('echannel/create/search', 'EchannelingController@search')->middleware('verified');
Route::get('echannel/create/search/conf/{user}','EchannelingController@searchtwo')->middleware('verified');
Route::resource('hospital','HospitalController')->middleware('verified');
});