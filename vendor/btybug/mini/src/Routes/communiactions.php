<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 14.08.2018
 * Time: 02:40
 */

Route::get('/', 'ClientController@communications');
Route::get('/notifications', 'ClientController@communication_notifications');
Route::get('/messages', 'ClientController@communication_messages');
Route::get('/subscribers', 'ClientController@communication_subscribers');