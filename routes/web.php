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
 

Route::group(['namespace'=>'Frontend'],function(){

	Route::get('blog', 'BlogControllers@getIndex')->name('blog');
	Route::get('blog/{slug}', 'BlogControllers@getSingle')->name('blog.single');
	Route::get('/', 'FrontEndControllers@getHome')->name('home');
	Route::get('/about', 'FrontEndControllers@getAbout')->name('about');
	Route::get('/contact','FrontEndControllers@getContact')->name('contact');

});
Route::group(['namespace'=>'Backend'],function(){
	Route::resource('/posts','PostController');
	Route::resource('/categories','CategoryController')->except('create');
	Route::resource('/tags','TagController')->except('create');
	Route::post('/comments/{post_id}','CommentController@store')->name('comments.store');
	Route::get('comments/{id}/edit','CommentController@edit')->name('comments.edit');
	Route::put('comments/{id}','CommentController@update')->name('comments.update');
	Route::delete('comments/{id}','CommentController@destroy')->name('comments.destroy');
});
Route::group(['namespace'=>'Auth'],function(){
	Route::get('/login', 'LoginController@getLogin')->name('login');
	Route::post('/login', 'LoginController@postLogin')->name('login');
	Route::get('/logout', 'LoginController@getLogout')->name('logout');

	Route::get('/register', 'RegisterController@getRegister')->name('register');
	Route::post('/register', 'RegisterController@postRegister')->name('register');
	Route::get('/verify', 'VerificationController@getVerify')->name('alert.verify');
	Route::get('/verify/{token}', 'VerificationController@verifyEmail')->name('verify');

});
