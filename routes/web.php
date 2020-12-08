<?php

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
//     return view('pages.home');
// });
Route::get('/','HomeController@home')->name('home');

Route::get('home','HomeController@home')->name('home');

Route::get('login','HomeController@login')->name('login');

Route::get('register','HomeController@register')->name('register');

Route::get('contact','HomeController@contact')->name('contact');

Route::get('detail/{id}','HomeController@detail')->name('detail');

Route::get('about','HomeController@about')->name('about');

Route::get('category/{id}','HomeController@category')->name('category');



Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('login','AdminController@ViewLoginAdmin')->name('login');
    Route::post('progressLogin','AdminController@progressLogin')->name('progressLogin');
    Route::get('logout','AdminController@logout')->name('logout');
});


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
        Route::prefix('news')->name('news.')->group(function() {
        Route::get('index','AdminController@index')->name('index');
        Route::get('index','AdminController@index')->name('index');
    });

Route::middleware('check_login')->group(function() {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });

    Route::prefix('category')->name('category.')->group(function() {
        Route::get('index','CategoryController@index')->name('index');
        Route::get('create','CategoryController@create')->name('create');
        Route::post('store','CategoryController@store')->name('store');
        Route::get('edit/{id}','CategoryController@edit')->name('edit');
        Route::post('update/{id}','CategoryController@update')->name('update');
        Route::get('destroy/{id}','CategoryController@destroy')->name('destroy');
    });  
    
    Route::prefix('typeofnews')->name('typeofnews.')->group(function(){
        Route::get('index','TypeOfNewsController@index')->name('index');
        Route::get('create','TypeOfNewsController@create')->name('create');
        Route::post('store','TypeOfNewsController@store')->name('store');
        Route::get('edit/{id}','TypeOfNewsController@edit')->name('edit');
        Route::post('update/{id}','TypeOfNewsController@update')->name('update');
        Route::get('destroy/{id}','TypeOfNewsController@destroy')->name('destroy');

    });

    Route::prefix('news')->name('news.')->group(function(){
        Route::get('index','NewsController@index')->name('index');
        Route::get('create','NewsController@create')->name('create');
        Route::post('store','NewsController@store')->name('store');
        Route::get('edit/{id}','NewsController@edit')->name('edit');
        Route::post('update/{id}','NewsController@update')->name('update');
        Route::get('destroy/{id}','NewsController@destroy')->name('destroy');
        Route::get('ajax_loaitin/{id}','NewsController@getLoaiTin');

    });

    Route::prefix('slide')->name('slide.')->group(function() {
        Route::get('index','SlideController@index')->name('index');
        Route::get('create','SlideController@create')->name('create');
        Route::post('store','SlideController@store')->name('store');
        Route::get('edit/{id}','SlideController@edit')->name('edit');
        Route::post('update/{id}','SlideController@update')->name('update');
        Route::get('destroy/{id}','SlideController@destroy')->name('destroy');
    });

    Route::prefix('user')->name('user.')->group(function() {
        Route::get('index','AdminController@index')->name('index');
        Route::get('create','AdminController@create')->name('create');
        Route::post('store','AdminController@store')->name('store');
        Route::get('edit/{id}','AdminController@edit')->name('edit');
        Route::post('update/{id}','AdminController@update')->name('update');
        Route::get('destroy/{id}','AdminController@destroy')->name('destroy');
    });
});
});
