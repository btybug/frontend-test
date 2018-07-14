<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 13:27
 */
Route::get('/', 'AdminController@getIndex',true)->name('mini_admin');
Route::group(['prefix'=>'assets'],function (){
    Route::get('/', 'AdminController@assetsUnits',true)->name('mini_admin_assets_units');
    Route::get('/pages', 'AdminController@assetsPages',true)->name('mini_admin_assets_pages');
    Route::get('/plugins', 'AdminController@assetsPlugins',true)->name('mini_admin_assets_plugins');
    Route::get('/forms', 'AdminController@assetsForms',true)->name('mini_admin_assets_forms');

});
Route::get('/settings', 'AdminController@getSettings',true)->name('mini_admin_settings');
