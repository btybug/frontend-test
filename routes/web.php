<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//$users=\Btybug\User\User::all()->pluck('id')->toArray();
//
//dd($users,\Btybug\FrontSite\Models\FrontendPage::whereNotIn('user_id',$users)->delete());
Route::get('/', function () {
    return view('welcome');
});
Route::get('/demo','DemoController@demo');
Route::get('/demo1','DemoController@demo1');
Route::get('/demo2','DemoController@demo2');
Route::get('/demo3','DemoController@demo3');
