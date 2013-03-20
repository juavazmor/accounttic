<?php

Route::get('/', 'payments@index');

// user Resource
Route::get('users', array('as' => 'users', 'uses' => 'users@index'));
// Route::get('users/(:num)', array('as' => 'user', 'uses' => 'users@show'));
Route::get('users/new', array('as' => 'new_user', 'uses' => 'users@new'));
Route::get('users/(:num)/remove', array('as' => 'remove_user', 'uses' => 'users@remove'));
Route::get('users/(:num)/edit', array('as' => 'edit_user', 'uses' => 'users@edit'));
Route::post('users', 'users@create');
Route::put('users/(:num)', 'users@update');
Route::delete('users/(:num)', array('as' => 'delete_user', 'users@destroy'));

// job Resource
Route::get('jobs', array('as' => 'jobs', 'uses' => 'jobs@index'));
Route::get('jobs/(:any)', array('as' => 'job', 'uses' => 'jobs@show'));
Route::get('jobs/new', array('as' => 'new_job', 'uses' => 'jobs@new'));
Route::get('jobs/(:num)/remove', array('as' => 'remove_job', 'uses' => 'jobs@remove'));
Route::get('jobs/(:any)/edit', array('as' => 'edit_job', 'uses' => 'jobs@edit'));
Route::post('jobs', 'jobs@create');
Route::put('jobs/(:any)', 'jobs@update');
Route::delete('jobs/(:any)', 'jobs@destroy');

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});