<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('blog.posts_index');
// });
Route::get('/','Posts\PostsController@index')->name('posts.index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace'=>'Posts','prefix'=>'posts'], function () {
    Route::get('/','PostsController@index')->name('posts.index');
    Route::get('create','PostsController@create')->name('posts.create');
    Route::post('create','PostsController@store')->name('posts.store');
    Route::get('{post}','PostsController@show')->name('posts.show');
    Route::get('{post}/edit','PostsController@edit')->name('posts.edit');
    Route::put('{post}/update','PostsController@update')->name('posts.update');
    Route::delete('{post}/delete','PostsController@destroy')->name('posts.delete');
    // comment
    // Route::post('create','CommentsController@store')->name('comments.store');
});

Route::group(['namespace'=>'Categories','prefix'=>'Category'], function () {
    Route::get('/','CategoriesController@index')->name('category.index');
    Route::get('create','CategoriesController@create')->name('category.create');
    Route::post('create','CategoriesController@store')->name('category.store');
    Route::get('{category}','CategoriesController@show')->name('category.show');
    Route::get('{category}/edit','CategoriesController@edit')->name('category.edit');
    Route::put('{category}/update','CategoriesController@update')->name('category.update');
    Route::delete('{category}/delete','CategoriesController@destroy')->name('category.delete');
    Route::get('categoryPost/{id}','CategoriesController@categoryPost')->name('categoryPost');
});
Route::group(['namespace'=>'Admin','prefix'=>'admin'], function () {
    Route::get('/','AdministrationsController@index')->name('admin');

});

Route::group(['namespace'=>'Comments','prefix'=>'Comments'], function () {
    Route::get('/','CommentsController@index')->name('comments.index');
    Route::get('create','CommentsController@create')->name('comments.create');
    Route::post('create','CommentsController@store')->name('comments.store');
    Route::get('{comment}','CommentsController@show')->name('comments.show');
    Route::get('{comment}/edit','CommentsController@edit')->name('comments.edit');
    Route::put('{comment}/update','CommentsController@update')->name('comments.update');
    Route::delete('{comment}/delete','CommentsController@destroy')->name('comments.delete');
});

Route::group(['namespace' => 'Auths'], function () {
    Route::get('register','RegistersController@create')->name('register');
    Route::post('register','RegistersController@store')->name('register_sotre');
    Route::get('login','LoginsController@create')->name('login');
    Route::post('login','LoginsController@store')->name('login_store');
    Route::get('logout','LoginsController@logout')->name('logout');
});

