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

Route::get('/', 'ModulesController@getChilds', true);
Route::get('/test/{id?}', 'UnitsNewController@test');

//Route::get('/optimisation', function () {
//    Artisan::call('plugin:optimaze');
//    return redirect()->back()->with(['flash' => ['message' => 'modules optimisation successfully!!!']]);
//});

Route::group(['prefix' => 'modules'], function () {

    Route::get('/', 'ModulesController@getIndex', true)->name('modules_index');
    Route::get('/core-packages', 'ModulesController@getCoreModules', true)->name('core_packages');
    Route::get('/update-cms', 'ModulesController@getUpdateCms', true)->name('update_cms');
    Route::get('/{repository}/{package}/explore', 'ModulesController@getExplore', true);
    Route::get('/{repository}/{package}/explore/plugins', 'ModulesController@getExplorePlugins', true);

    Route::group(['prefix' => 'extra-packages'], function () {
        Route::get('/', 'PluginsController@getIndex', true)->name('plugins_index');
        Route::get('/{repository}/{package}/explore', 'PluginsController@getExplore', true);
    });
//    Route::group(['prefix' => 'datatable'], function () {
    Route::any('datatable/{table}', 'DatatablesController@getIndex', true)->name('modules_datatable_index');
    Route::get('datatable/show-columns/{table}', 'DatatablesController@getShowColumns', true)->name('modules_datatable_show_columns');
    Route::get('datatable/settings-for-frontend/{table}', 'DatatablesController@getFrontendSettings', true)->name('modules_datatable_settinds_for_frontend');
    Route::get('/datatables/{table}', 'DatatablesController@getData')->name('dynamic_datatable');

//});5
});


//Route::group(['prefix' => 'apps'], function ($router) {
//    Route::get('/', 'AppsController@getIndex', true)->name('app_plugins');
//    Route::get('/{repository}/{package}/explore', 'AppsController@getExplore', true);
//
//    Route::group(['prefix' => 'core-apps'], function () {
//        Route::get('/', 'AppsController@getCoreApps', true)->name('core_apps');
//        Route::post('/create-product', 'AppsController@postCreateProduct', true)->name('apps_create_product');
//        Route::post('/delete', 'AppsController@delete', true)->name('app_product_delete');
//        Route::get('/{repository}/{package}/explore', 'AppsController@getExplore', true);
//        Route::group(['prefix' => 'edit'], function () {
//            Route::get('/', 'AppsController@getEditCore', true);
//            Route::get('/{param}', 'AppsController@getEditCore', true)->name('app_edit_product');
//            Route::post('/{param}', 'AppsController@postEditCore', true)->name('app_edit_product_post');
//        });
//    });
//
//    Route::group(['prefix' => 'extra-apps'], function () {
//        Route::get('/', 'AppsController@getExtra', true)->name('app_extra');
//        Route::get('/{repository}/{package}/explore', 'AppsController@getExplore', true);
//    });
//});
Route::group(['prefix' => 'gears'], function () {
    Route::get('/', function () {
        return view("uploads::gears.units.list");
    }, true)->name('uploads_gears_index');
    Route::get('/back-end', 'UnitsController@getIndex', true)->name('uploads_back_end');
    Route::post('/back-end', 'UnitsController@getIndexFromPost')->name('uploads_back_end_from_post');
    Route::get('/front-end', 'UnitsController@getFrontend', true)->name('uploads_front_end');
    Route::get('/remove-painter', 'UnitsController@removePainter', true)->name('remove-painter');
    Route::post('/front-end', 'UnitsController@getFrontendFromPost')->name('uploads_front_end_from_post');
    Route::post('/upload', 'UnitsController@postUploadUnit');
    Route::get('/delete-variation/{slug}', 'UnitsController@postDeleteVariation');
    Route::get('/units-variations/{slug}', 'UnitsController@getUnitVariations', true)->name('uploads_units_variations');
    Route::post('/units-variations/{slug}', 'UnitsController@postUnitVariations');
    Route::get('/live-settings/{slug}', 'UnitsController@unitPreview', true)->name('uploads_live_settings');
    Route::get('/settings/{slug?}', 'UnitsController@getSettings', true)->name('uploads_settings');
    Route::get('/settings/create/{slug?}', 'UnitsController@createVariationForUnit', true)->name('create_variation_for_unit');
    Route::get('/settings-iframe/{slug}/{settings?}', 'UnitsController@unitPreviewIframe', true)->name('uploads_settings_iframe');

    Route::get('/html-iframe/{slug}/{settings?}', 'UnitsController@htmlPreviewIframe', true)->name('uploads_settings_iframe');

    Route::post('/settings/options', 'UnitsController@postOptions')->name('uploads_gears_settings_options');
    Route::post('/settings/{id}/{save?}', 'UnitsController@postSettings');
    Route::post('/delete', 'UnitsController@postDelete');
    Route::post('/filter', 'UnitsController@filterUnits')->name('filter-units');
});


Route::group(['prefix' => 'layouts'], function () {
    Route::get('/', 'PageSectionsController@getIndex', true)->name('uploads_layouts_back_end');
    Route::post('/', 'PageSectionsController@getIndexFromPost')->name('uploads_layouts_back_end_from_post');
    Route::get('/remove-layout', 'PageSectionsController@removeLayout', true)->name('remove-layout');
    Route::post('/settings/options', 'PageSectionsController@postOptions')->name('uploads_settings_options');
    Route::post('/settings/page-options', 'PageSectionsController@postPageOptions')->name('uploads_page_settings_options');

    Route::get('/settings/{slug}', 'PageSectionsController@getSettings', true)->name('uploads_layouts_settings');
    Route::get('/responsive/{slug}', 'PageSectionsController@getSettingsResponsive', true)->name('uploads_layouts_responsive');
    Route::get('/settings/create/{slug?}', 'PageSectionsController@createVariationForlayout', true)->name('create_variation_for_layout');
    Route::get('/variations/{slug}', 'PageSectionsController@getVariations', true)->name('uploads_layouts_variations');
    Route::post('/settings/{slug}/{save?}', 'PageSectionsController@postSettings')->name('uploads_layouts_settings_post');
    Route::post('/page-settings/{page_id}/{slug}/{save?}', 'PageSectionsController@postPageSectionSettings')->name('uploads_page_layouts_settings_post');
    Route::post('/console', 'PageSectionsController@getConsole');
    Route::post('/make-active', 'PageSectionsController@postMakeActive');
    Route::post('/upload', 'PageSectionsController@postUpload');
    Route::get('/delete-variation/{slug}', 'PageSectionsController@postDeleteVariation');
    Route::post('/delete', 'PageSectionsController@postDelete');
    Route::post('/filter', 'PageSectionsController@filterLayouts')->name('filter-layouts');
});

Route::group(['prefix' => 'assets'], function () {
    Route::get('/', 'AssetsController@getIndex', true)->name('uploads_assets_index');
    Route::get('/js', 'AssetsController@getJs', true)->name('uploads_assets_js');
    Route::get('/css', 'AssetsController@getCss', true)->name('uploads_assets_css');
    Route::get('/fonts', 'AssetsController@getFonts', true)->name('uploads_assets_fonts');
    Route::get('/unit-data', 'AssetsController@getUnitData', true)->name('uploads_assets_unit_data');

    Route::post('/', 'AssetsController@postUploadJs');
    Route::post('/change-version', 'AssetsController@postChangeVersion');
    Route::post('/update-link', 'AssetsController@postUpdateLink');
    Route::post('/get-versions', 'AssetsController@getVersions');
    Route::post('/get-data', 'AssetsController@getCode');
    Route::post('/save-code', 'AssetsController@postSaveCode')->name('assets_save_code');
    Route::post('/get-active-versions', 'AssetsController@getActiveVersions');
    Route::post('/upload-version', 'AssetsController@postUploadVersion');
    Route::post('/generate-main-js', 'AssetsController@postGenerateMainJs');
    Route::post('/make-active', 'AssetsController@postMakeActive');
    Route::post('/css', 'AssetsController@postCss');
    Route::post('/delete', 'AssetsController@delete');
});

Route::group(['prefix' => 'profiles'], function () {
    Route::get('/', 'AssetProfilesController@getIndex', true)->name('uploads_assets_profiles_index');
    Route::get('/optimize', 'AssetProfilesController@getOptimized', true)->name('uploads_assets_optimize');
    Route::post('/delete', 'AssetProfilesController@delete')->name('uploads_assets_profiles_delete');
    Route::group(['prefix' => 'js'], function () {
        Route::get('/', 'AssetProfilesController@getJs', true)->name('uploads_assets_profiles_js');
        Route::get('/create', 'AssetProfilesController@getJsCreate', true)->name('uploads_assets_profiles_create_js');
        Route::post('/create', 'AssetProfilesController@postJsCreate')->name('uploads_assets_profiles_create_js_post');
        Route::post('/get-assets', 'AssetProfilesController@postGetAssets')->name('uploads_assets_profiles_get_assets');
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', 'AssetProfilesController@getJsEdit', true);
            Route::get('/edit', 'AssetProfilesController@getJsEdit', true)->name('uploads_assets_profiles_edit_js');
            Route::post('/edit', 'AssetProfilesController@postJsEdit', true)->name('uploads_assets_profiles_edit_js_post');
        });
    });

    Route::group(['prefix' => 'css'], function () {
        Route::get('/', 'AssetProfilesController@getCss', true)->name('uploads_assets_profiles_css');
        Route::get('/create', 'AssetProfilesController@getCssCreate', true)->name('uploads_assets_profiles_create_css');
        Route::post('/create', 'AssetProfilesController@postCssCreate')->name('uploads_assets_profiles_create_css_post');

        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', 'AssetProfilesController@getCssEdit', true);
            Route::get('/edit', 'AssetProfilesController@getCssEdit', true)->name('uploads_assets_profiles_edit_css');
            Route::post('/edit', 'AssetProfilesController@postCssEdit', true)->name('uploads_assets_profiles_edit_css_post');

        });
    });
});

Route::group(['prefix' => 'market'], function ($router) {
    Route::get('/', 'MarketController@getIndex', true)->name('market_index');
    Route::get('/packages', 'MarketController@getPackages', true)->name('composer_market');
    Route::group(['prefix' => 'composer'], function ($router) {
        Route::get('/', 'ComposerController@getIndex', true)->name('composer_index');
        Route::post('/main', 'ComposerController@getMain')->name('composer_main');
        Route::post('plugin-on-off', 'ComposerController@getOnOff')->name('on_off');
    });
});
