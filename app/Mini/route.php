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

Route::group(['prefix' => 'pages'], function () {
    Route::get('/', 'ClientController@pages')->name('mini_page_lists');
    Route::post('/create', 'ClientController@pagesCreate')->name('mini_page_create');
    Route::post('/edit/{id}', 'ClientController@editUserPage')->name('mini_user_page_edit');
    Route::get('/edit/{id}', 'ClientController@pageEdit')->name('mini_page_edit');
    Route::get('/edit/{id}/content', 'ClientController@pageEditContent')->name('mini_page_edit_content');
});

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
    Route::get('/pages', 'MySiteController@pages')->name('mini_my_site_pages');
    Route::get('/settings', 'MySiteController@settings')->name('mini_my_site_settings');
});

