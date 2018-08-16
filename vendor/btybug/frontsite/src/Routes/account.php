<?php

Route::get('/', 'MyAccountController@account')->name('my-account');
Route::get('/general', 'MyAccountController@accountGeneral')->name('mini_account_general');

Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'MyAccountController@accountSettings')->name('mini_account_settings');
    Route::get('/user-account', 'MyAccountController@accountSettingsTab1')->name('mini_account_settings_tab1');
    Route::get('/tab2', 'MyAccountController@accountSettingsTab2')->name('mini_account_settings_tab2');
    Route::get('/tab3', 'MyAccountController@accountSettingsTab3')->name('mini_account_settings_tab3');
    Route::get('/tab4', 'MyAccountController@accountSettingsTab4')->name('mini_account_settings_tab4');
});
Route::group(['prefix' => 'favourites'], function () {
    Route::get('/', 'MyAccountController@getFavourites')->name('mini_favourites');
});