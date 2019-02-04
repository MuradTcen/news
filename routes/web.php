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
//Route::get('/home', ['as' => 'home', 'uses' => 'PostController@show']);


Auth::routes();

Route::group(['middleware' => ['auth']], function()
{
    Route::get('new-post','PostController@create');


    Route::post('new-post','PostController@store');

    Route::get('delete/{id}','PostController@destroy');

    Route::get('edit/{id}','PostController@edit');
    Route::post('update','PostController@update');

});

Route::get('/download/{filename}', 'PostController@download')->name('downloadfile');


Route::get('post/{id}','PostController@get_post')->where('id', '[0-9]+');



Route::get(
    '/socialite/{provider}',
    [
        ‘as’ => ‘socialite.auth’,
        function ( $provider ) {
            return \Socialite::driver( $provider )->redirect();
        }
    ]
);

Route::get('/socialite/{provider}/callback', function ($provider) {
    $user = \Socialite::driver($provider)->user();
    dd($user);
});

