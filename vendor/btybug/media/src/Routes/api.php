<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    //Js Tree Api
Route::group(['middleware'=>'cors'],function (){
    Route::post('/jstree', 'Media\MediaApiController@getFolderChildrenJsTree');

    Route::post('/get-folder-childs', 'Media\MediaApiController@getFolderChilds');
    Route::post('/get-create-folder-child', 'Media\MediaApiController@getCreateFolderChild');
    Route::post('/get-edit-folder', 'Media\MediaApiController@getEditFolder');
    Route::post('/get-edit-folder-settings', 'Media\MediaApiController@getEditFolderSettings');
    Route::post('/get-folder-info', 'Media\MediaApiController@getFolderInfo');
    Route::post('/get-sort-folder', 'Media\MediaApiController@getSortFolder');
    Route::post('/get-remove-folder', 'Media\MediaApiController@getRemoveFolder');
    Route::post('/get-media-uploaders', 'Media\MediaApiController@getMediaUploaders');
    Route::post('/get-media-uploaders-settings', 'Media\MediaApiController@getUploaderSettings');
    Route::post('/get-media-uploader-rendered', 'Media\MediaApiController@getFolderUploader');
    Route::post('/download-folder', 'Media\MediaApiController@getDownload');

//ITEMS API
    Route::post('/get-sort-item', 'Media\MediaItemsApiController@getSortItems');
    Route::post('/get-remove-item', 'Media\MediaItemsApiController@getDeleteItems');
    Route::post('/upload', 'Media\MediaItemsApiController@uploadFile')->name('media_upload');
    Route::post('/replace-item', 'Media\MediaItemsApiController@replaceFile');
    Route::post('/rename-item', 'Media\MediaItemsApiController@renameFile');
    Route::post('/copy-item', 'Media\MediaItemsApiController@getCopyItems');
    Route::post('/transfer-item', 'Media\MediaItemsApiController@getTransferItems');
});

