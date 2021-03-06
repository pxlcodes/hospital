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


Route::group(['prefix' => '/'], function () {

    Route::get('/', 'PageController@index');
    Route::get('/about', 'PageController@about');
    Route::get('/contact', 'PageController@contact');
    Route::get('/executive', 'PageController@executive');
    Route::get('/service', 'PageController@service');
    Route::get('/notice', 'PageController@notice');

});

Auth::routes(['verify' => true]);
Route::group(['middleware' => ['verified']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('/', 'DashboardController');
        Route::resource('about', 'AboutController');
        Route::resource('doctor', 'DoctorController');
        Route::resource('executive', 'ExecutiveController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('{gallery}/image', 'AlbumController');
        Route::resource('notice', 'NoticeController');
        Route::resource('pages', 'PageController');
        Route::resource('service', 'ServiceController');
        Route::resource('carousel', 'CarouselController');
        Route::resource('user', 'UserController');
        Route::patch('/user/{user}', 'UserController@suspend')->name('user.suspend');
        Route::patch('/verify/{user}', 'Auth\AdminVerificationController@update')->name('admin.verify');
    });
});
