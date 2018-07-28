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
        Route::get('settings/{id}', 'AdminController@assetsUnitsSettings', true)->name('mini_admin_assets_units_settings');
        Route::get('/render/{slug}', 'AdminController@iframeRander', true)->name('unit_iframe_render');
        Route::get('/render-with-form/{slug}', 'AdminController@renderWithForm', true)->name('unit_iframe_render_with_form');
        Route::get('live/{id?}', 'AdminController@assetsUnitsLive', true)->name('mini_admin_assets_units_live');
        Route::get('/settings-iframe/{slug}/{settings?}', 'UnitsController@unitPreviewIframe', true)->name('minicms_settings_iframe');
        Route::post('/settings/{id}/{save?}', 'UnitsController@postSettings')->name('minicms_settings_save');
        Route::get('/create-variation/{id?}', 'UnitsController@assetsCreateUnitVariation', true)->name('mini_admin_assets_create_unit_variation');
    });

    Route::group(['prefix' => 'widgets'], function () {
        Route::get('/', 'AdminWidgetsController@assetsUnits', true)->name('mini_admin_assets_widgets');
        Route::group(['prefix' => '{id?}'], function () {
            Route::get('/', 'AdminWidgetsController@assetsUnits', true)->name('mini_admin_assets_widgets');
        });
        Route::post('{id}/settings', 'AdminWidgetsController@postAssetsUnitsSettings', true)->name('mini_admin_assets_widgets_settings_post');
        Route::get('settings/{id}', 'AdminWidgetsController@assetsUnitsSettings', true)->name('mini_admin_assets_widgets_settings');
        Route::get('/render/{slug}', 'AdminWidgetsController@iframeRander', true)->name('unit_iframe_render');
        Route::get('/render-with-form/{slug}', 'AdminWidgetsController@renderWithForm', true)->name('unit_iframe_render_with_form');
        Route::get('live/{id?}', 'AdminWidgetsController@assetsUnitsLive', true)->name('mini_admin_assets_widgets_live');
        Route::get('/settings-iframe/{slug}/{settings?}', 'AdminWidgetsController@unitPreviewIframe', true)->name('minicms_settings_iframe');
        Route::post('/settings/{id}/{save?}', 'AdminWidgetsController@postSettings')->name('minicms_widgets_settings_save');
        Route::get('/create-variation/{id?}', 'AdminWidgetsController@assetsCreateWidgetVariation', true)->name('mini_admin_assets_create_widget_variation');
    });

    Route::group(['prefix' => 'layouts'], function () {
        Route::get('/', 'AdminLayoutsController@assetsLayouts', true);
        Route::get('/{id?}', 'AdminLayoutsController@assetsLayouts', true)->name('mini_admin_assets_layouts');
        Route::get('/create-variation/{id?}', 'AdminLayoutsController@assetsLayoutsCreateVariation', true)->name('mini_admin_assets_layouts_create_variation');
        Route::get('live/{id?}', 'AdminLayoutsController@assetsLayoutLive', true)->name('mini_admin_assets_layouts_live');
        Route::get('/settings/{id}', 'AdminLayoutsController@assetsLayoutSettings', true)->name('mini_admin_assets_layouts_settings');
        Route::post('/settings/{id}', 'AdminLayoutsController@postAssetsLayoutSettings')->name('mini_admin_assets_layouts_settings_post');
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




