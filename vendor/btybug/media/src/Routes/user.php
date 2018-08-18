<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 18.08.2018
 * Time: 05:16
 */

Route::any('php/{code}',function ($code){
    include __DIR__.'/../Modules/elFinder/php/'.$code;
});