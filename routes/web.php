<?php

use App\Http\Controllers\Blog\PostController;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/posts/{post}', [PostController::class, 'show'])->name('blog.show');

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/posts', 'PostController');
    Route::resource('tags', 'TagController');
    Route::get('/trashed-posts', 'PostController@trashed')->name('trashed-posts.index');
    Route::put('restore-post/{post}', 'PostController@restore')->name('restore-posts');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('users/profile','UserController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UserController@update')->name('users.update-profile');
    Route::get('users','UserController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');
});