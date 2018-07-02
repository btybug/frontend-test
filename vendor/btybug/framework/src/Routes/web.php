<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'IndexController@getIndex',true);

Route::group(['prefix' => 'css'], function () {
    Route::get('/', 'CssController@getIndex',true)->name('css');
    Route::post('/savestyle', 'CssController@saveStyle')->name('save_style');
    Route::post('/editstyle', 'CssController@EditStyle')->name('edit_style');

    Route::get('/createtablecss', function(){
        \Btybug\Framework\Database\CreateTableCssTable::up();
    });
    Route::get('/changetablecss', function(){
        \Btybug\Framework\Database\ChangeFieldTableCssTable::up();
    });
    Route::get('/createtablestyles', function(){
        \Btybug\Framework\Database\CreateTableStyles::up();
    });
});
Route::group(['prefix' => 'css-classes'], function () {
    Route::post('/createfolder', 'CssController@createFolder')->name('create_folder');
    Route::post('/createfile/{dirname}', 'CssController@createFile')->name('create_file');
    Route::post('/removedir', 'CssController@removeDir')->name('remove_dir');
    Route::post('/removefile', 'CssController@removeFile')->name('remove_file');
    Route::post('/removeclass', 'CssController@removeClass')->name('remove_class');
    Route::post('/renamefolder', 'CssController@renameGroup')->name('rename_group');
    Route::post('/reset', 'CssController@resetFile')->name('reset_file');
    Route::get('/savestyle', 'CssController@saveStyleWithHtml', true)->name('save_style_with_html');
    Route::get('/', 'CssController@getContent', true)->name('get_content');

});
Route::group(['prefix' => 'html-component'], function () {
    Route::get('/', 'CssController@getComponent', true)->name('get_content_component');
    Route::post('/createfolder', 'CssController@createFolderComponent')->name('create_folder_component');
    Route::post('/createfile/{dirname}', 'CssController@createFileComponent')->name('create_file_component');
    Route::post('/removedir', 'CssController@removeDirComponent')->name('remove_dir_component');
    Route::post('/removefile', 'CssController@removeFileComponent')->name('remove_file_component');
    Route::post('/removeclass', 'CssController@removeClassComponent')->name('remove_class_component');
    Route::post('/reset', 'CssController@resetFileComponent')->name('reset_file_component');
    Route::post('/savestyle', 'CssController@saveStyleWithHtmlComponent')->name('save_style_with_html_component');
    Route::post('/savestylecomponent', 'CssController@saveStyleComponent', true)->name('save_style_component');
    Route::post('/editstylecomponent', 'CssController@EditStyleComponent')->name('edit_style_component');
    Route::post('/renamefolder', 'CssController@renameGroupComponent')->name('rename_group_component');
});

Route::group(['prefix' => 'dynamic-component'], function () {
    Route::get('/', 'DynamicComponentController@getComponent', true)->name('get_content_component_dynamic');
    Route::post('/createfolder', 'DynamicComponentController@createFolderComponent')->name('create_folder_component_dynamic');
    Route::post('/createfile/{dirname}', 'DynamicComponentController@createFileComponent')->name('create_file_component_dynamic');
    Route::post('/removedir', 'DynamicComponentController@removeDirComponent')->name('remove_dir_component_dynamic');
    Route::post('/removefile', 'DynamicComponentController@removeFileComponent')->name('remove_file_component_dynamic');
    Route::post('/removeclass', 'DynamicComponentController@removeClassComponent')->name('remove_class_component_dynamic');
    Route::post('/reset', 'DynamicComponentController@resetFileComponent')->name('reset_file_component_dynamic');
    Route::post('/savestyle', 'DynamicComponentController@saveStyleWithHtmlComponent')->name('save_style_with_html_component_dynamic');
    Route::post('/savestylecomponent', 'DynamicComponentController@saveStyleComponent', true)->name('save_style_component_dynamic');
    Route::post('/editstylecomponent', 'DynamicComponentController@EditStyleComponent')->name('edit_style_component_dynamic');
    Route::post('/renamefolder', 'DynamicComponentController@renameGroupComponent')->name('rename_group_component_dynamic');

    Route::get('/createtabledynamictablecss', function(){
        \Btybug\Framework\Database\CreateDynamicComponentCssTable::up();
    });
    Route::get('/createdynamiccomponenttablestyles', function(){
        \Btybug\Framework\Database\CreateDynamicComponentStyles::up();
    });

});


Route::group(['prefix'=>'blade'],function (){
    Route::get('/','BladeController@getIndex',true);
    Route::post('/live-render','BladeController@getLiveRender')->name('blades_live_render');
});

Route::group(['prefix'=>'sql_builder'],function (){
    Route::get('/','SqlBuilderController@getIndex',true);

});

Route::group(['prefix'=>'react'],function (){
    Route::get('/','SqlBuilderController@getReact',true);

});

Route::group(['prefix'=>'studio-test'],function (){
    Route::get('/','SqlBuilderController@getStudio',true);

});

Route::group(['prefix'=>'bb-functions'],function (){
    Route::get('/','BBController@getIndex',true);
    Route::post('/get-bb-fn-options','BBController@getOptions')->name('get_bb_fn_options');
    Route::post('/get-bb-fn-list','BBController@getFunctionsList')->name('get_bb_fn_list');
});

