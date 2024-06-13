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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::get('user/delete/{id}', 'UserController@delete');
Route::get('/user/show/{id}', 'UserController@show');

Route::resource('course', 'CourseController');
Route::get('/course/edit/{id}', 'CourseController@edit');
Route::get('course/delete/{id}', 'CourseController@delete');
Route::get('/course/show/{id}', 'CourseController@show');

Route::resource('classroom', 'ClassRoomController');
Route::get('/classroom/edit/{id}', 'ClassRoomController@edit');
Route::get('classroom/delete/{id}', 'ClassRoomController@delete');
Route::get('/classroom/show/{id}', 'ClassRoomController@show');

Route::resource('payment', 'PaymentController');
Route::get('/payment/edit/{id}', 'PaymentController@edit');
Route::get('payment/delete/{id}', 'PaymentController@delete');
Route::get('/payment/show/{id}', 'PaymentController@show');

Route::resource('viewedclass', 'ViewedClassController');
Route::get('/viewedclass/edit/{id}', 'ViewedClassController@edit');
Route::get('viewedclass/delete/{id}', 'ViewedClassController@delete');
Route::get('/viewedclass/show/{id}', 'ViewedClassController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
