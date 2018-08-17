<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 14.08.2018
 * Time: 02:40
 */
Route::get('/dashboard', '\Btybug\FrontSite\Http\Controllers\ClientController@dashboard')->name('home_dashboard');
Route::get('/notifications', '\Btybug\FrontSite\Http\Controllers\ClientController@communication_notifications');
Route::get('/messages', '\Btybug\FrontSite\Http\Controllers\ClientController@communication_messages');
Route::get('/subscribers', '\Btybug\FrontSite\Http\Controllers\ClientController@communication_subscribers');
Route::get('/my-site', 'HomeController@mySites');
Route::get('/media', 'HomeController@media')->name('mini_media');
Route::get('/media/drive', 'HomeController@drive')->name('mini_media_drive');
Route::get('/media/settings', 'HomeController@settings')->name('mini_media_settings');
