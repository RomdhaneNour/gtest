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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Post', 'PostController@index')->name('post')->middleware('auth');
Route::post('/submit', 'PostController@store')->name('submit')->middleware('auth');
Route::get('/updatePost/{id}', 'PostController@edit')->name('edit')->middleware('auth');
Route::get('/update/{id}', 'PostController@update')->name('update')->middleware('auth');
Route::get('/deletePost/{id}', 'PostController@destroy')->name('destroy')->middleware('auth');
Route::get('/comment', 'CommentController@index')->name('comment')->middleware('auth');
Route::get('/tocomment/{id}', 'CommentController@update')->name('tocomment')->middleware('auth');
Route::post('/AddComment', 'CommentController@store')->name('AddComment')->middleware('auth');
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});
Route::get('/newuser', 'UserController@create')->name('newuser')->middleware('auth');
Route::post('/add', 'UserController@store')->name('add')->middleware('auth');
Route::get('/show', 'UserController@show')->name('show')->middleware('auth');
Route::get('/edit', 'UserController@edit')->name('edit')->middleware('auth');
Route::get('/deleteuser/{id}', 'UserController@destroy')->name('destroy')->middleware('auth');
