<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
	'as'	=> 'home',
	'uses'	=> 'LinksController@create'
]);
Route::post('/', [
	'as'	=> 'home',
	'uses'	=> 'LinksController@store'
]);
Route::get('/{hash}', [
	'as'	=> 'hash',
	'uses'	=> 'LinksController@show'
]);