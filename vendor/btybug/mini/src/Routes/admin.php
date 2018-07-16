<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 13:27
 */
Route::get('/', 'AdminController@getIndex',true)->name('mini_admin');
Route::group(['prefix'=>'assets'],function (){
    Route::get('/', 'AdminController@getAssets',true)->name('mini_admin_assets');

    Route::group(['prefix'=>'units'],function () {
        Route::group(['prefix'=>'{id?}'],function () {
            Route::get('/', 'AdminController@assetsUnits', true)->name('mini_admin_assets_units');
        });

        Route::get('{id}/forms', 'AdminController@assetsUnitsForm', true)->name('mini_admin_assets_units_form');
        Route::get('{id}/mapping', 'AdminController@assetsUnitsMapping', true)->name('mini_admin_assets_units_mapping');
        Route::get('{id}/settings', 'AdminController@assetsUnitsSettings', true)->name('mini_admin_assets_units_settings');

        Route::get('/render/{slug}', 'AdminController@iframeRander', true)->name('unit_iframe_render');
    });

    Route::get('/pages', 'AdminController@assetsPages',true)->name('mini_admin_assets_pages');
    Route::get('/plugins', 'AdminController@assetsPlugins',true)->name('mini_admin_assets_plugins');
    Route::get('/forms', 'AdminController@assetsForms',true)->name('mini_admin_assets_forms');
    Route::post('/create-page', 'AdminController@createPage',true)->name('minicms_create_page');
});
Route::get('/settings', 'AdminController@getSettings',true)->name('mini_admin_settings');


