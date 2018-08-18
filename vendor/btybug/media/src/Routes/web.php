<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'IndexController@settings');
Route::group(['prefix'=>'drive'],function (){
    Route::get('/settings', 'Media\IndexController@getSettings',true)->name('admin_media_settinds');
    Route::get('/', 'Media\IndexController@index',true)->name('admin_media');
    Route::post('/settings', 'Media\IndexController@postSettings');
});

