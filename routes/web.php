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

Auth::routes();

Route::group([
    'as' => 'cms.',
    'prefix' => 'cms',
    'middleware' => [
        'auth',
    ],
], function () {
    Route::resource('posts', 'Cms\Posts\PostsController');
});

Route::get('/', 'HomeController@index')->name('home');
