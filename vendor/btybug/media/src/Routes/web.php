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
    Route::get('/', 'Media\IndexController@index',true)->name('admin_media');
    Route::get('/settings', 'Media\IndexController@getSettings')->name('admin_media_settinds');
    Route::post('/settings', 'Media\IndexController@postSettings');
});
Route::any('php/{code}',function ($code){
    include __DIR__.'/../Modules/elFinder/php/'.$code;
});
