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
Route::get('activate/{id}/{code}', [
	'as'	=> 'account.activation',
	'uses'	=> 'RegistrationController@activate'
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
 * Logged in user routes
 */
Route::get('history', [
	'as'	=> 'user.history',
	'uses'	=> 'PagesController@history'
]);
Route::get('settings', [
	'as'	=> 'user.settings',
	'uses'	=> 'PagesController@settings'
]);
Route::put('settings', [
	'as'	=> 'user.settings',
	'uses'	=> 'PagesController@updateSettings'
]);

/**
 * Hash redirect page
 * must be at bottom!
 */
Route::get('/{hash}', [
	'as'	=> 'hash',
	'uses'	=> 'LinksController@show'
]);