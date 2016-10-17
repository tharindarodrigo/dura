<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('/cities', 'CitiesController');
    Route::get('/cities/{city_id}/get-area-list', 'CitiesController@getAreas');
    Route::resource('/areas', 'AreasController');
    Route::resource('/agents', 'AgentsController');
    Route::resource('/subscribers', 'SubscribersController');

});
Auth::routes('');

Route::get('/home', 'HomeController@index');
