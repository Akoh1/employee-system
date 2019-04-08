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
Route::get('/admin/index', 'AdminPageController@index')->name('adminindex');
Route::get('/user', 'RegularUserController@index')->name('reguser');
Route::get('/user/create', 'RegularUserController@create');
Route::get('/userstore', 'RegularUserController@store');
Route::resource('regularuser','RegularUserController');
// Route::get('/register','RegController@show') -> name('register');
Route::resource('register','RegisterController');
Route::resource('admin','AdminPageController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);
