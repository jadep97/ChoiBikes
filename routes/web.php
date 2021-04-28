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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	
	// Route::get('item/{id}', ['as' => 'item.edit', 'uses' => 'ItemController@edit']);
	// // Route::get('item', 'ItemController@index')->name('item');
	

	
	// // Route::post('item', [ 'as' => 'item.store', 'uses' => 'ItemController@store']);
	// // Route::put('item', ['as' => 'item.update', 'uses' => 'ItemController@update']);
	


});
Route::get('/itemsearch',['uses' => 'ItemController@searchItem','as' => 'itemsearch']);

Route::group(['middleware' => 'auth'], function () {
	Route::post('item/{id}', ['as' => 'item.update', 'uses' => 'ItemController@update']);
	Route::resource('item', 'ItemController');
	// Route::patch('item', [ 'as' => 'item.index', 'uses' => 'ItemController@index']);
	// Route::post('item', [ 'as' => 'item.store', 'uses' => 'ItemController@store']);
	// Route::put('item', ['as' => 'item.update', 'uses' => 'ItemController@update']);
	
	// Route::post('item', ['as' => 'item.create', 'uses' => 'ItemController@create']);
	

});

	
	

