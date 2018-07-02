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

Route::get('/', function () {
    return view("manage::index");
},true);

Route::get('/test/{id?}', function (\Illuminate\Http\Request $request) {
    $v_id = $request->id;
    return view('test', compact('v_id'));
});

Route::get('/test-unit/{id?}', function (\Illuminate\Http\Request $request) {
    $v_id = $request->id;
    return view('test-unit', compact('v_id'));
});

Route::group(['prefix'=>'structure'], function () {
    Route::get('/',function (){
        return view("manage::structure");
    },true)->name('structure_index');
    Route::group(['prefix' => 'front-pages'], function () {
        //front pages
        Route::get('/', 'PagesController@getIndex',true)->name('front_pages_index');
        Route::get('/settings/{param}', 'PagesController@getSettings',true)->name('frontsite_settings');
        Route::get('/settings/{param}/layout', 'PagesController@getSettingsLayout',true)->name('frontsite_settings_layout');
        Route::get('/extra/{param}', 'PagesController@getExtra',true)->name('frontsite_extra_pages');
        Route::get('/special-settings/{param}', 'PagesController@getSpecialSettings',true)->name('frontsite_special_settings');
        Route::post('/settings/{id}', 'PagesController@postSettings');
        Route::post('/extra/{id}', 'PagesController@postExtra');
        Route::post('/special-settings/{id}', 'PagesController@postSpecialSettings');
        Route::get('/general/{id}', 'PagesController@getGeneral',true)->name('frontsite_general');
        Route::get('/special-general/{id}', 'PagesController@getSpecialGeneral',true)->name('frontsite_special_general');
        Route::post('/general/{id}', 'PagesController@postGeneral',true)->name('frontsite_save_general');
        Route::post('/user-avatar', 'PagesController@postUserAvatar');
        Route::post('/sorting', 'PagesController@postSortPages');
        Route::post('/classify', 'PagesController@postClassify');
        Route::post('/new', 'PagesController@postNew');
        Route::get('/new/{parent_id}', 'PagesController@getAddChild');
        Route::post('/detach', 'PagesController@postDetach');
        Route::post('/get-data', 'PagesController@postData');
        Route::post('/delete', 'PagesController@postDelete');

        Route::group(['prefix' => 'page-preview'], function () {
            Route::get('/{id}', 'PagesController@getPagePreview',true)->name('page_review_index');
            Route::post('/{id}', 'PagesController@postPagePreview');
        });
        Route::get('/page-test-preview/{id}', 'PagesController@getPageTestPreview');
        Route::post('/page-test-preview/{id}', 'PagesController@postPagePreview');

        Route::post('/live-settings', 'PagesController@liveSettings');
        Route::get('/live/{id}', 'PagesController@postPageLive');

        Route::post('/load-tpl', 'PagesController@loadTpl');
        Route::get('/preview/{layout_id?}/{page_id?}', 'PagesController@getPreview',true); // this method does not exist
        Route::post('/addchild', 'PagesController@postAddchild');
        Route::post('/changeparent', 'PagesController@postChangeparent');
        Route::get('/delete/{id}', 'PagesController@getDelete');
        Route::get('/template/{page}/{template_id}', 'PagesController@getTemplate');
        Route::post('/delete', 'PagesController@postDelete');
        Route::post('/create', 'PagesController@postCreate');
        Route::get('/update/{id}', 'PagesController@getUpdate');
        Route::post('/update', 'PagesController@postUpdate');
        Route::post('/load-layout', 'PagesController@postLoadLayout');
        Route::post('/layouts', 'PagesController@postLayouts');
        Route::post('/template-variations', 'PagesController@postTemplateVariations');
        Route::post('/update-inavtive', 'PagesController@postUpdateInavtive');
        Route::post('/update-customiser', 'PagesController@postUpdateCustomiser');
        Route::post('/layout-sidebar-counts', 'PagesController@postLayoutSidebarCounts');
        Route::post('/load-area', 'PagesController@postLoadArea');
        Route::post('/apply-area', 'PagesController@postApplyArea');
        Route::post('/membership-list/{id?}', 'PagesController@postMembershipList');
        Route::post('/list/{id?}', 'PagesController@postList');
        Route::post('/partial-access/{id?}', 'PagesController@postPartialAccess');
        Route::post('/get-fields-by-group', 'PagesController@getFieldsByGroup');
    });

    Route::group(['prefix' => 'classify'], function () {
        Route::get('/', 'ClassifyController@getIndex',true)->name('frontsite_classify');
        Route::post('/create', 'ClassifyController@postCreate')->name('classify_create');
        Route::post('/delete', 'ClassifyController@postDelete')->name('classify_delete');
        Route::post('/generate-items', 'ClassifyController@postGenerateItems')->name('classify_generate_items');
        Route::post('/load-items', 'ClassifyController@loadItems')->name('classify_load_items');

        Route::post('/edit/{id}', 'ClassifyController@postEdit');
        Route::post('/delete-item', 'ClassifyController@postDeleteItem');
        Route::post('/term-create', 'ClassifyController@postTermCreate');
        Route::post('/term-edit/{id}', 'ClassifyController@postTermEdit');
        Route::get('/delete/{id}', 'ClassifyController@getDelete');
        Route::post('/delterm', 'ClassifyController@postDelterm');
        Route::post('/mngchild', 'ClassifyController@postMngchild');
        Route::post('/changeparent', 'ClassifyController@postChangeparent');
        Route::get('/data', 'ClassifyController@getData');
        Route::post('/get-taxonomy-form', 'ClassifyController@postTaxonomyForm');
        Route::post('/generate-term', 'ClassifyController@postGenerateForm');
    });

    Route::group(['prefix' => 'menus'], function () {
        Route::get('/', 'MenusController@getIndex',true)->name('frontsite_menus');
//        Route::get('/edit', 'MenusController@getEdit');
        Route::get('/edit/{id}', 'MenusController@getEdit',true)->name('edit_front_menu');
        Route::post('/edit/{id}', 'MenusController@postEdit',true)->name('post_edit_front_menu');
        Route::post('/create', 'MenusController@postCreate');
        Route::get('/update/{id}', 'MenusController@getUpdate');
        Route::post('/update', 'MenusController@postUpdate');
        Route::post('/addmenuitem', 'MenuFrontController@postAddmenuitem');
        Route::post('/changeparent', 'MenuFrontController@postChangeparent');
        Route::post('/delmenuitem', 'MenuFrontController@postDelmenuitem');
        Route::get('/html', 'MenuFrontController@getHtml');
        Route::get('/delete/{id}', 'MenuFrontController@getDelete');
        Route::get('/data', 'MenuFrontController@getData');
        Route::get('/menufile', 'MenuFrontController@getMenufile');
        Route::get('/sidebarmenus', 'MenuFrontController@getSidebarmenus');
        Route::get('/iframe-preview/{id?}', 'MenusController@getMenuPreview');
    });

    Route::group(['prefix' => 'hooks'], function () {
        Route::get('/', 'HooksController@getIndex',true)->name('frontsite_hooks_index');
        Route::post('/renderbbbuton', 'HooksController@renderBbButton')->name('render_bbbutton');
        Route::get('/edit/{id}', 'HooksController@getEdit',true)->name('frontsite_hooks_edit');
        Route::get('/create', 'HooksController@create',true)->name('frontsite_hooks_create');
        Route::post('/create', 'HooksController@createSave')->name('frontsite_hooks_create_save');
        Route::post('/edit/{id}', 'HooksController@saveEdit')->name('frontsite_hooks_edit_save');
        Route::get('/remove/{id}', 'HooksController@remove',true)->name('frontsite_hooks_remove');
    });
    Route::group(['prefix' => 'filters'], function () {
        Route::get('/', 'FiltersController@getIndex',true);
    });
});

Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'SettingsController@getIndex',true)->name('forntsite_settings_index');
    Route::post('/', 'SettingsController@storeSystem');
    Route::get('/login-registration', 'SettingsController@getLoginRegistration',true)->name('frontsite_login_registration'); // this view does not exist
    Route::get('/notifications', 'SettingsController@getNotifications',true)->name('frontsite_notifications');
    Route::get('/url-menger', 'SettingsController@getUrlMenger',true)->name('frontsite_url_menger');
    Route::get('/adminemails', 'SettingsController@getAdminemails',true)->name('frontsite_adminemails');
    Route::get('/lang', 'SettingsController@getLang',true)->name('frontsite_lang');
    Route::get('/api-settings', 'SettingsController@getApi',true)->name('frontsite_api_settings');
    Route::post('/api-settings', 'SettingsController@postApi')->name('frontsite_api_settings_save');
    Route::post('/api-settings/delete', 'SettingsController@deleteConnection')->name('frontsite_api_settings_delete_connection');
    Route::post('/api-settings/edit', 'SettingsController@editConnection')->name('frontsite_api_settings_edit_connection');
    Route::get('/api-products', 'SettingsController@getApiProducts',true)->name('frontsite_api_products');
    Route::post('/page-settings', 'GeneralController@postSettings')->name('front_pages_general_settings');
    Route::get('/frontend', 'SettingsController@getFrontSettings',true)->name('font_site_settings_frontrnd');
    Route::post('/frontend', 'SettingsController@postFrontSettings')->name('post_font_site_settings_frontrnd');
});

Route::group(['prefix' => 'event'], function () {
    Route::get('/', 'EventsController@getIndex',true)->name('frontsite_event_index');
    Route::get('/new', 'EventsController@getIndexNew',true)->name('frontsite_event_index_new');
    Route::get('/new-connection/{slug}', 'EventsController@getIndexNewConnection',true)->name('frontsite_event_index_new_connection');
    Route::post('/new-connection/{slug}', 'EventsController@postNewConnection',true)->name('frontsite_event_index_new_connection');
    Route::post('/get-function-data', 'EventsController@postGetFunctionData');
    Route::post('/get-event-function-relations', 'EventsController@postGetEventFunctionRelation');
    Route::post('/save-event-function-relations', 'EventsController@postSaveEventFunctionRelation');
});

Route::group(['prefix' => 'admin-events'], function () {
    Route::get('/', 'AdminEventsController@getIndex',true)->name('frontsite_admin_event_index');
    Route::get('/create', 'AdminEventsController@getCreate',true)->name('frontsite_admin_event_index_new');
});

Route::group(['prefix' => 'emails'], function () {
    Route::get('/', "EmailsController@getIndex",true);
    Route::get('/settings', "EmailsController@getSettings",true)->name('frontsite_emails_settings');
    Route::get('/{id}', "EmailsController@getIndex",true)->name('frontsite_emails_index');
    Route::post('/settings', "EmailsController@postSettings");
    Route::get('/update', "EmailsController@getUpdate",true);
    Route::get('/update/{id}', "EmailsController@getUpdate",true)->name('frontsite_emails_update');
    Route::post('/update/{id}', "EmailsController@postUpdate");
    Route::get('/data/{id}', "EmailsController@getData");
    Route::post('/create-group', "EmailsController@postCreateGroup");
    Route::post('/get-forms-lists', "EmailsController@postGetFormLists");
    Route::post('/get-forms-shortcodes', "EmailsController@getFormShortcodes")->name('frontsite_emails_get_form_shortcodes');
    Route::post('/create-email', "EmailsController@postCreateEmail");
    Route::post('/delete-email/{id}', "EmailsController@postDeleteEmail");
    Route::post('check-email-settings', "EmailsController@postCheckEmail");
});

