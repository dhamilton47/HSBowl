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

Route::get('register', 'Auth\MultipartRegistrationController@showUserRegistrationForm')->name('register.user');
Route::get('register/school1', 'Auth\MultipartRegistrationController@showSchoolRegistrationFormPart1')->name('register.school.part1');
//Route::get('register/school1', 'Auth\RegisterSchoolController@showSchoolRegistrationForm1')->name('register.school.part1');
Route::get('register/school2', 'Auth\MultipartRegistrationController@showSchoolRegistrationFormPart2')->name('register.school.part2');
//Route::get('register/school2', 'Auth\RegisterSchoolController@showSchoolRegistrationForm2')->name('register.school.part2');
Route::get('register/role', 'Auth\MultipartRegistrationController@showRoleRegistrationForm')->name('register.role');
//Route::get('register/role', 'Auth\RegisterRoleController@index')->name('register.role');

Route::post('register', 'Auth\MultipartRegistrationController@registerUser')->name('register.continue.user');
//Route::post('register', 'Auth\MultipartRegistrationController@registerUser')->name('register.continue.user');
//Route::post('register', 'Auth\MultipartRegistrationController@registerUserPart1')->name('register.continue.user');
Route::post('register/school1', 'Auth\MultipartRegistrationController@registerSchoolPart1')->name('register.continue.school.part1');
//Route::post('register/school1', 'Auth\RegisterSchoolConfirmationController@index1')->name('register.continue.school.part1');
Route::post('register/school2', 'Auth\MultipartRegistrationController@registerSchoolPart2')->name('register.continue.school.part2');
//Route::post('register/school2', 'Auth\RegisterSchoolConfirmationController@index2')->name('register.continue.school.part2');
Route::post('register/role', 'Auth\MultipartRegistrationController@registerRole')->name('register.role');
//Route::post('register/role', 'Auth\RegisterRoleConfirmationController@index')->name('register.role.submit');

Route::get('register/confirm', 'Auth\RegisterConfirmationController@index')->name('register.confirm');
//Route::get('register', 'Auth\RegisterEmailController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterEmailController@register');

Route::get('profiles/{user}', 'ProfilesController@show')->middleware('auth')->name('profile');

Route::get('api/users', 'Api\UsersController@index')->name('api.users');
Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->middleware('auth')->name('avatar');

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
    'namespace' => 'Admin'
], function () {
    Route::get('', 'DashboardController@index')->name('admin.dashboard.index');
//    Route::get('school', 'AdminSchoolController@show')->name('admin.school.show');
//    Route::get('team', 'AdminTeamController@show')->name('admin.team.show');
});