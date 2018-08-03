<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 13:27
 */
Route::get('/', 'ClientController@account');
Route::get('/settings', 'ClientController@accountSettings')->name('mini_account_settings');
Route::get('/extra/forms', 'ClientController@accountForms')->name('mini_account_forms');
Route::get('/extra/forms/edit/{id}', 'ClientController@accountFormsEdit')->name('mini_account_forms_edit');
Route::get('/extra/forms/render/{id}', 'ClientController@accountFormsRender')->name('mini_account_forms_render');
Route::get('/extra/forms/delete/{id}', 'ClientController@accountFormsDelete')->name('mini_account_forms_delete');
Route::get('/extra/forms/create', 'ClientController@CreateForms', true)->name('mini_account_forms_build');
Route::post('/extra/forms/save', 'ClientController@FormsSave', true)->name('mini_account_forms_save');
Route::get('/extra/forms/inputs/{id}', 'ClientController@FormsInputs', true)->name('mini_account_forms_inputs');
Route::get('/general', 'ClientController@accountGeneral')->name('mini_account_general');
Route::get('/settings-iframe/{slug}/{settings?}', 'UnitsController@unitPreviewIframe', true)->name('mini_settings_iframe');

Route::group(['prefix' => 'media'], function () {
    Route::get('/', 'ClientController@media')->name('mini_media');
    Route::get('/settings', 'ClientController@mediaSettings')->name('mini_media_settings');
});
Route::group(['prefix' => 'preferences'], function () {
    Route::get('/', 'ClientController@preferences')->name('mini_preferences');
});
Route::group(['prefix' => 'extra'], function () {

    Route::group(['prefix' => 'plugins'], function () {
        Route::get('/', 'PluginsController@getList')->name('mini_extra_plugins');
        Route::get('/settings', 'PluginsController@getSettings')->name('mini_extra_plugin_settings');
    });

    Route::get('/gear', 'ClientController@extraGears')->name('mini_extra_gears');
    Route::get('/widgets', 'ClientController@extraWidgets')->name('mini_extra_widgets');
    Route::get('/layouts', 'ClientController@extraLayouts')->name('mini_extra_layouts');
    Route::get('/units-optimize', 'ClientController@extraGearsOptimize')->name('mini_extra_gears_optimize');
});

Route::group(['prefix' => 'my-site'], function () {
    Route::group(['prefix' => 'btybug'], function () {
        Route::get('/', 'MySiteController@pagesFunction')->name('mini_my_site_btybug');
        Route::group(['prefix' => 'pages'], function () {
            Route::get('/special', 'MySiteController@specialSettings')->name('mini_my_site_special_settings');
            Route::get('/', 'MySiteController@pagesFunction')->name('mini_my_site_btybug_pages');
            Route::post('/create', 'MySiteController@pagesCreate')->name('mini_page_create');
            Route::post('/sorting', 'MySiteController@sorting')->name('mini_page_sorting');
            Route::post('/show-page', 'MySiteController@showPage')->name('mini_page_show');
            Route::post('/edit/{id}', 'MySiteController@editUserPage')->name('mini_user_page_edit');
            Route::get('/edit/{id}', 'MySiteController@pageEdit')->name('mini_page_edit');
            Route::get('/edit/{id}/content', 'MySiteController@pageEditContent')->name('mini_page_edit_content');
            Route::get('/edit/{id}/live', 'LivePreviewController@getIngex')->name('mini_page_edit');
            Route::post('/edit/{page_id}/{slug}/{save?}', 'LivePreviewController@postPageSectionSettings')->name('mini_page_save_layout');
        });
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', 'MySiteController@settingsFunction')->name('mini_my_site_btybug_settings');
            Route::get('/special', 'MySiteController@specialSettings')->name('mini_my_site_special_settings');
        });

    });
});

Route::group(['prefix' => 'communications'], function () {
    Route::group(['prefix' => 'messages'], function () {
        Route::get('/', 'CommunicationsController@messages')->name('mini_communications_messages');
        Route::get('/create', 'CommunicationsController@createMessages')->name('mini_communications_create_messages');
        Route::get('/view/{id}', 'CommunicationsController@viewMessage')->name('mini_communications_view_messages');
    });
    Route::get('/notifications', 'CommunicationsController@notifications')->name('mini_communications_notifications');
    Route::get('/reviews', 'CommunicationsController@reviews')->name('mini_communications_reviews');
});

Route::group(['prefix' => 'btybug'], function () {
    Route::get('/cv', 'BtybugController@cv')->name('mini_btybug_cv');
    Route::get('/jobs', 'BtybugController@jobs')->name('mini_btybug_jobs');
    Route::get('/market', 'BtybugController@market')->name('mini_btybug_market');
    Route::get('/blog', 'BtybugController@blog')->name('mini_btybug_blog');
});


