<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 24.07.2018
 * Time: 11:06
 */
$url = \Request::server('REQUEST_URI');
if(!starts_with($url,'/broadcasting')){
    $pages = Btybug\FrontSite\Models\FrontendPage::where('module_id','btybug/mini')->get();
    Route::group(['middleware' => 'frontPermissions'], function () use ($pages) {
        foreach ($pages as $page) {
            $key = $page->url;
            if($page->render_method){
                Route::get($key, function () use ($key) {
                    $home = new \Btybug\Mini\Model\FrontPages();
                    return $home->render($key, Request::all());
                });
            }
        }
    });
}
