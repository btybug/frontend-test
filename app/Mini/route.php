<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 13:27
 */
Route::get('/', 'ClientController@account');
Route::get('/settings', 'ClientController@accountSettings')->name('mini_account_settings');
Route::group(['prefix' => 'pages'], function () {
    Route::get('/', 'ClientController@pages')->name('mini_page_lists');
    Route::post('/create', 'ClientController@pagesCreate')->name('mini_page_create');
});

Route::group(['prefix' => 'plugins'], function () {
    Route::get('/', 'ClientController@plugins')->name('mini_plugins');
    Route::post('/settings', 'ClientController@pluginsSettings')->name('mini_plugins_settings');
});
Route::group(['prefix' => 'media'], function () {
    Route::get('/', 'ClientController@media')->name('mini_media');
    Route::post('/settings', 'ClientController@mediaSettings')->name('mini_media_settings');
});
Route::group(['prefix' => 'preferences'], function () {
    Route::get('/', 'ClientController@preferences')->name('mini_preferences');
});
Route::group(['prefix' => 'market'], function () {
    Route::get('/', 'ClientController@marketPlugins')->name('mini_market_plugins');
    Route::post('/create', 'ClientController@marketGears')->name('mini_market_gears');
});

