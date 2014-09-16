<?php

Route::get('/', [
	'as'	=> 'home',
	'uses'	=> 'LinksController@create'
]);
Route::post('/', [
	'as'	=> 'home',
	'uses'	=> 'LinksController@store'
]);


/**
 * Registration
 */
Route::get('register', [
	'as'	=> 'register',
	'uses'	=> 'RegistrationController@create'
]);
Route::post('register', [
	'as'	=> 'register',
	'uses'	=> 'RegistrationController@store'
]);

/**
 * Sessions
 */
Route::post('login', [
	'as'	=> 'login',
	'uses'	=> 'SessionsController@store'
]);
Route::get('logout', [
	'as'	=> 'logout',
	'uses'	=> 'SessionsController@destroy'
]);

/**
 * Hash redirect page
 * must be at bottom!
 */
Route::get('/{hash}', [
	'as'	=> 'hash',
	'uses'	=> 'LinksController@show'
]);