<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 04.07.2018
 * Time: 13:27
 */
Route::get('/','ClientController@account');
Route::group(['prefix'=>'pages'],function (){

Route::get('/','ClientController@pages')->name('mini_page_lists');
Route::post('/create','ClientController@pagesCreate')->name('mini_page_create');
});
