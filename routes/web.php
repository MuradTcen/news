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

Route::get('/', 'PostController@index');
Route::get('/home', 'PostController@index');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('new-post', 'PostController@create');


    Route::post('new-post', 'PostController@store');

    Route::get('delete/{id}', 'PostController@destroy');

    Route::get('edit/{id}', 'PostController@edit');
    Route::post('update', 'PostController@update');

});

Route::get('/download/{filename}', 'PostController@download')->name('downloadfile');

Route::get('post/{post}','PostController@show')->where('id', '[0-9]+');
//Route::resource('post', 'PostController');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

