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

Route::redirect('/', '/home');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');

Route::get('profiles/{user}', 'ProfilesController@show')->middleware('auth')->name('profile');

Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->middleware('auth')->name('avatar');
Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
    'namespace' => 'Admin'
], function () {
    Route::get('', 'DashboardController@index')->name('admin.dashboard.index');
});