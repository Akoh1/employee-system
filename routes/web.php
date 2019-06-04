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
    return view('index');
});
// Route::get('/user/index', 'AdminPageController@index')->name('user.index');

// Route::resource('admin','AdminPageController');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/user/form', 'HomeController@create')->name('user.form');
// Route::get('/user/edit/{$id}', 'HomeController@edit')->name('user.edit');
// Route::get('/user/update', 'HomeController@update')->name('user.update');

// Route::get('/regular', 'RegUserController@index')->name('regular.dashboard');


Route::resource('home','HomeController');

Route::resource('admins','Admin\HomeController');

Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');


Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

});


Auth::routes(['verify' => true]);
