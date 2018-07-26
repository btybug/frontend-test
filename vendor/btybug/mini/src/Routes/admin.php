<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 13:27
 */
Route::get('/', 'AdminController@getIndex', true)->name('mini_admin');
Route::group(['prefix' => 'assets'], function () {
    Route::get('/', 'AdminController@getAssets', true)->name('mini_admin_assets');

    Route::group(['prefix' => 'units'], function () {
        Route::get('/', 'AdminController@assetsUnits', true)->name('mini_admin_assets_units');
        Route::group(['prefix' => '{id?}'], function () {
            Route::get('/', 'AdminController@assetsUnits', true)->name('mini_admin_assets_units');
        });

        Route::post('{id}/settings', 'AdminController@postAssetsUnitsSettings', true)->name('mini_admin_assets_units_settings_post');
        Route::get('{id}/settings', 'AdminController@assetsUnitsSettings', true)->name('mini_admin_assets_units_settings');

        Route::get('/render/{slug}', 'AdminController@iframeRander', true)->name('unit_iframe_render');
        Route::get('/render-with-form/{slug}', 'AdminController@renderWithForm', true)->name('unit_iframe_render_with_form');
    });

    Route::group(['prefix' => 'layouts'], function () {
        Route::get('/', 'AdminLayoutsController@assetsLayouts', true);
        Route::get('/{id?}', 'AdminLayoutsController@assetsLayouts', true)->name('mini_admin_assets_layouts');
        Route::get('/create-variation/{id?}', 'AdminLayoutsController@assetsLayoutsCreateVariation', true)->name('mini_admin_assets_layouts_create_variation');
        Route::get('live/{id?}', 'AdminLayoutsController@assetsLayoutLive', true)->name('mini_admin_assets_layouts_live');
        Route::get('/render/{slug}', 'AdminLayoutsController@iframeRander', true)->name('layout_iframe_render');
    });
    Route::get('/pages', 'AdminPagesController@assetsPages', true)->name('mini_admin_assets_pages');
    Route::get('/plugins', 'AdminController@assetsPlugins', true)->name('mini_admin_assets_plugins');
    Route::get('/forms', 'AdminController@assetsForms', true)->name('mini_admin_assets_forms');
    Route::post('/create-page', 'AdminPagesController@createPage', true)->name('minicms_create_page');
    Route::post('/edit-page', 'AdminPagesController@editPage', true)->name('minicms_edit_page');
    Route::post('/get-page-edit-form', 'AdminPagesController@getPageEditForl', true)->name('minicms_page_edit_form_page');
    Route::get('/general', 'AdminPagesController@assetsGeneral', true)->name('mini_admin_assets_general');
    Route::post('/general', 'AdminPagesController@assetsGeneralSave', true)->name('mini_admin_assets_general_save');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UsersController@getIndex', true)->name('mini_admin_assets_users');
});

Route::get('/settings', 'AdminController@getSettings', true)->name('mini_admin_settings');




