<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'blog'], function() {
    Route::get('/', 'api\BlogController@index');
    // Route::group(['prefix' => 'categories'], function () {
    //     Route::get('/', 'BlogController@indexCategory')->name('blog.categories.index');
    //     Route::get('/{slug}', 'BlogController@showCategory')->name('blog.categories.show');
    // });
    Route::get('/{slug}', 'api\BlogController@show');
});
