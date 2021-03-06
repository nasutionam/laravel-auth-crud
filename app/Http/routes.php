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

Route::group(['middleware' => ['web']], function () {

  // Home
  Route::get('/', 'HomeController@index');
  Route::get('home', 'HomeController@index');

  // Authentication
  Route::get('login', 'Auth\AuthController@showLoginForm');
  Route::post('login', 'Auth\AuthController@login');
  Route::get('logout', 'Auth\AuthController@logout');

  Route::get('register', 'Auth\AuthController@showRegistrationForm');
  Route::post('register', 'Auth\AuthController@register');

  Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
  Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
  Route::post('password/reset', 'Auth\PasswordController@reset');

  Route::get('validation/{code}', 'UserController@validation');
  Route::get('sendvalidation/{email}', 'UserController@sendValidation');

  // CRUD
  Route::group(['middleware' => ['auth']],function () {

    // Create
    Route::get('createpost', 'PostController@getCreatePost');
    Route::post('createpost', 'PostController@postCreatePost');

    // Edit
    Route::get('editpost/{id}', 'PostController@getEditPost');
    Route::post('editpost/{id}', 'PostController@postEditPost');

    // Delete
    Route::get('deletepost/{id}', 'PostController@getDeletePost');

  });

});
