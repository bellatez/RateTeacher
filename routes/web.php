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


Route::get('about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/ratings','HomeController@ratings');

Route::resource('/', 'BlogController');
Route::get('/teacher', 'TeacherController@index');
Route::get('/ratings', 'TeacherController@create');
Route::post('/ratings', 'TeacherController@store')->name('ratings');
Route::post('ratings/update/{rating}','RatingController@update' )->name('ratings.update');
Route::post('ratings/delete','RatingController@destroy' )->name('ratings.destroy');
