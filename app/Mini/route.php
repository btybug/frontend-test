<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 13:27
 */
Route::get('/', 'ClientController@account');
Route::get('/settings', 'ClientController@accountSettings')->name('mini_account_settings');
Route::get('/general', 'ClientController@accountGeneral')->name('mini_account_general');

Route::group(['prefix' => 'plugins'], function () {
    Route::get('/', 'ClientController@plugins')->name('mini_plugins');
    Route::get('/settings', 'ClientController@pluginsSettings')->name('mini_plugins_settings');
});
Route::group(['prefix' => 'media'], function () {
    Route::get('/', 'ClientController@media')->name('mini_media');
    Route::get('/settings', 'ClientController@mediaSettings')->name('mini_media_settings');
});
Route::group(['prefix' => 'preferences'], function () {
    Route::get('/', 'ClientController@preferences')->name('mini_preferences');
});
Route::group(['prefix' => 'extra'], function () {
    Route::get('/plugins', 'ClientController@extraPlugins')->name('mini_extra_plugins');
    Route::get('/units', 'ClientController@extraGears')->name('mini_extra_gears');
});

Route::group(['prefix' => 'my-site'], function () {
    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', 'MySiteController@pages')->name('mini_my_site_pages');
        Route::post('/create', 'MySiteController@pagesCreate')->name('mini_page_create');
        Route::post('/edit/{id}', 'MySiteController@editUserPage')->name('mini_user_page_edit');
        Route::get('/edit/{id}', 'MySiteController@pageEdit')->name('mini_page_edit');
        Route::get('/edit/{id}/content', 'MySiteController@pageEditContent')->name('mini_page_edit_content');
    });
    Route::get('/settings', 'MySiteController@settings')->name('mini_my_site_settings');
});

Route::group(['prefix' => 'communications'], function () {
    Route::get('/messages', 'CommunicationsController@messages')->name('mini_communications_messages');
    Route::get('/notifications', 'CommunicationsController@notifications')->name('mini_communications_notifications');
    Route::get('/reviews', 'CommunicationsController@reviews')->name('mini_communications_reviews');
});

Route::group(['prefix' => 'btybug'], function () {
    Route::get('/cv', 'BtybugController@cv')->name('mini_btybug_cv');
    Route::get('/jobs', 'BtybugController@jobs')->name('mini_btybug_jobs');
    Route::get('/market', 'BtybugController@market')->name('mini_btybug_market');
    Route::get('/blog', 'BtybugController@blog')->name('mini_btybug_blog');
});


