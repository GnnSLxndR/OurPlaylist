<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('auth/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('playlist', ['as'=> 'home', 'uses'=>'OurPlaylistController@index']);
Route::get('playlist/create',['as' => 'playlist.create', 'uses'=>'OurPlaylistController@create']);
Route::post('playlist/create',['as' => 'playlist.create', 'uses' => 'OurPlaylistController@create']);

Route::get('playlist/show/{id}', ['as'=> 'playlist.show','uses' => 'OurPlaylistController@show'])->where('id','[0-9]+');
Route::get('playlist/{id}/add', ['as'=> 'playlist.add', 'uses' => 'OurPlaylistController@add'])->where('id','[0-9]+');

