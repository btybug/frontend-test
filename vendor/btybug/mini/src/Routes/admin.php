<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 13:27
 */
Route::get('/', 'AdminController@getIndex',true)->name('mini_admin');
Route::get('/settings', 'AdminController@getSettings',true)->name('mini_admin_settings');
