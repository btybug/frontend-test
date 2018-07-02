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
    return view('console::index');
}, true);
Route::get('/test', function () {
    return view('console::test');
}, true);

Route::get('/optimisation', function () {
    Artisan::call('plugin:optimaze');
    return redirect()->back()->with(['flash' => ['message' => 'modules optimisation successfully!!!']]);
});

Route::group(['prefix' => 'structure'], function () {
    Route::get('/', 'StructureController@getIndex', true)->name('index');
    Route::group(['prefix' => 'field-types'], function () {
        Route::get('/', 'FieldTypesController@getIndex', true)->name('field_types_index');
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', 'StructureController@getPages', true)->name('pages_index');
        Route::get('/settings/{id}', 'StructureController@getPageSettings', true)->name('pages_settings');
        Route::post('/settings/{id}', 'StructureController@postPageSettings');
        Route::post('/', 'StructureController@postEdit');
        Route::post('/get-data', 'StructureController@postPageData');
    });

    Route::get('/urls', 'StructureController@getUrls', true)->name('urls');
    Route::get('/classify', 'StructureController@getClassify', true)->name('classify');
//    Route::get('/settings', 'StructureController@getSettings');

    Route::group(['prefix' => 'fields'], function () {
        Route::get('/', 'StructureController@getFields', true)->name("fields");
        Route::get('/create', 'StructureController@getCreateField', true);
        Route::get('/create-new', 'StructureController@getCreateFieldNew', true);
        Route::get('/edit/{id}', 'StructureController@getEditField', true)->name("edit_field");
        Route::get('/view/{id}', 'StructureController@getViewField', true)->name("view_field");
        Route::post('/edit/{id}', 'StructureController@postEditField');
        Route::post('/render-html', 'StructureController@postRenderFieldHtml');
        Route::post('/render-html-for-result/{id}', 'StructureController@postRenderFieldHtmlForResult');
        Route::post('/mapping', 'StructureController@postMapping');
        Route::post('/new', 'StructureController@postCreateField');
        Route::post('/change-status', 'StructureController@postChangeFieldStatus');
    });

    Route::get('/edit-forms', 'StructureController@getEditForms', true);
    Route::get('/get-default-html', 'StructureController@getDefaultHtml');
    Route::post('/get-custom-html', 'StructureController@getCustomHtml');
    Route::post('/get-saved-html-type', 'StructureController@getSavedHtmlType');

    Route::group(['prefix' => 'forms'], function () {
        Route::get('/', 'StructureController@getForms', true);
        Route::get('/edit/{id}', 'StructureController@getFormEdit', true);
        Route::get('/entries/{id}', 'StructureController@getFormEntries', true);
        Route::get('/view-entries/{id}', 'StructureController@getViewEntries', true);
        Route::post('/get-entries-data', 'StructureController@postGetEntryData');
        Route::get('/settings/{id}', 'StructureController@getFormSettings', true);
        Route::post('/settings/{id}', 'StructureController@postFormSettings', true);
        Route::post('/get-available-fields-settings', 'StructureController@postAvailableFields');
        Route::post('/edit/{id}', 'StructureController@postFormEdit')->name('save_core_forms');
        Route::get('/create', 'StructureController@getCreateForm',true);
        Route::get('/edit-custom/{id}', 'StructureController@getEditForm',true);
        Route::post('/save', 'StructureController@postSaveForm');
        Route::get('/create-advanced', 'StructureController@getCreateAdvanced',true);
        Route::post('/get-unit-settings', 'StructureController@getUnitSettingsPage');
        Route::get('/get-add-field-modal', 'StructureController@getUnitFieldModal');
        Route::get('/add-field-modal', 'StructureController@getAddFieldModal');
        Route::get('/get-unit-render', 'StructureController@getUnitRender');
        Route::post('/get-edit-field-modal', 'StructureController@getUnitEditFieldModal');
        Route::post('/get-available-fields', 'StructureController@getAvailableFieldsModal');
        Route::post('/get-unit-variations', 'StructureController@getUnitVariations');
        Route::post('/get-unit-variation-data', 'StructureController@getUnitVariationField');
        Route::post('/get-unit-variations-settings', 'StructureController@getUnitVariationSettings');
        Route::post('/get-component-settings', 'StructureController@getComponentSettings');
        Route::post('/get-builder-render', 'StructureController@postBuilder');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', 'GeneralController@getIndex', true)->name('settings_index');
        Route::post('/', 'GeneralController@postSettings');
    });

    Route::group(['prefix' => 'menus'], function () {
        Route::get('/', 'MenusController@getIndex', true)->name('menus_index');
        Route::get('/edit/{menu}/{role}', 'MenusController@getEdit', true)->name('console_menu_edit');
        Route::get('/view/{menu}/{role}', 'MenusController@getView', true)->name('console_menu_view');
        Route::post('/edit/{menu}/{role}', 'MenusController@postEdit');
        Route::post('/create', 'MenusController@postCreate');
        Route::post('/delete', 'MenusController@postDelete');
    });

    Route::group(['prefix' => 'tables'], function () {
        Route::get('/', 'Developers\StructureController@getIndex', true)->name('tables');
        Route::get('/edit/{table}', 'Developers\StructureController@getEditTable', true);
        Route::post('/get-column', 'Developers\StructureController@postGetTableColumn');
        Route::get('/add-column/{table}', 'Developers\StructureController@getAddColumn', true);
        Route::post('/add-column/{table}', 'Developers\StructureController@postAddColumn');
        Route::get('/edit-column/{table}/{column}', 'Developers\StructureController@getEditTableColumn', true);
        Route::post('/edit-column/{table}/{column}', 'Developers\StructureController@postEditTableColumn');
        Route::get('/delete-column/{table}/{column}', 'Developers\StructureController@postDeleteColumn');
        Route::post('/edit-column-field/{table}/{column}', 'Developers\StructureController@postEditColumnField');
        Route::get('/render-column-field/{table}/{column}', 'Developers\StructureController@postLiveColumnField');
        Route::get('/column-field-iframe/{table}/{column}', 'Developers\StructureController@getIframe');
        Route::get('/column-field-search-iframe/{table}/{column}', 'Developers\StructureController@getSearchIframe');
        Route::post('/field-live-save/{table}/{column}', 'Developers\StructureController@saveFieldData');
        Route::post('/search-field-live-save/{table}/{column}', 'Developers\StructureController@saveSearchFieldData');
        Route::post('/field-live-preview', 'Developers\StructureController@postFieldLivePreview');
        Route::post('/search-field-live-preview', 'Developers\StructureController@postSearchFieldLivePreview');
        Route::get('/table-names', 'Developers\StructureController@postTableNames');
        Route::post('/get-table-columns', 'Developers\StructureController@postTableColumns');
        Route::get('/optimize', function () {
            Artisan::call('forms:optimize');
            return redirect('admin');
        });
        Route::get('/create', 'Developers\StructureController@getCreate');
        Route::post('/create', 'Developers\StructureController@postCreate');
//        Route::get('/fields/{table}/{column}', 'Developers\FormsController@getFields');
        Route::get('/fields/{table}/{column}', 'Developers\StructureController@getMakeFields')->name('create_field');
//    Route::post('/fields/{table}/{column}', 'Developers\FormsController@postFields');
        Route::group(['prefix' => 'field'], function () {
            Route::get('/add-new-field/{count}', 'Developers\FormsController@addNewField');
            Route::post('/delete', 'Developers\FormsController@deleteField');
            Route::get('/render-column-fields/{table}/{column}', 'Developers\FormsController@renderColumnFields');
        });
    });
});


Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'BackendController@getIndex', true)->name('backend_settings_index');
    Route::get('/general', 'BackendController@settings', true)->name('general');
    Route::post('/general', 'BackendController@postSaveSettings');
    Route::post('/site-settings', 'BackendController@postSiteSettings')->name('site_settings_console');
    Route::get('/css-js', 'BackendController@getCssJs', true)->name('css-js');
    Route::post('/css-js', 'BackendController@postCssJs');
});


Route::group(['prefix' => 'general'], function () {
    Route::get('/', function () {
        return view('console::general.index');
    }, true);
    Route::get('/validations', 'GeneralController@getValidations', true)->name('validations');
    Route::get('/trigger-events', 'GeneralController@getTriggerEvents', true)->name('trigger_events');
});

Route::group(['prefix' => 'config'], function () {
    Route::get('/page-preview/{page_id}', 'StructureController@getPagePreview');
    Route::post('/page-preview/{page_id}', 'StructureController@postSavePageSettings');
});

Route::group(['prefix' => 'functions'], function () {
    Route::get('/', 'FunctionsController@getIndex',true)->name('fn_list');
    Route::get('/create', 'FunctionsController@getCreate',true);
    Route::post('/create', 'FunctionsController@postCreate');
    Route::post('/options', 'FunctionsController@postOptions');
    Route::post('/specific', 'FunctionsController@postSpecific');
    Route::post('/inside', 'FunctionsController@postInside');
    Route::post('/filtered', 'FunctionsController@postFiltered');
    Route::post('/get-result', 'FunctionsController@postGetResult');
    Route::post('/get-by-operator', 'FunctionsController@postOperator');
    Route::group(['prefix' => 'edit'], function () {
        Route::get('/', 'FunctionsController@getEdit',true);
        Route::get('/{key}', 'FunctionsController@getEdit',true);
        Route::post('/{key}', 'FunctionsController@postEdit',true);
    });
    Route::post('/delete', 'FunctionsController@delete');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('/', 'ApiController@getIndex',true);
    Route::get('/create', 'ApiController@create',true)->name("api_create");
});


Route::group(['prefix' => '/bburl'], function () {
    Route::any('/unit/{slug}', 'Developers\BBurlsController@BBunit');
    Route::any('/render-unit', 'Developers\BBurlsController@unitRender');
    Route::any('/get-heading/{id}', 'Developers\BBurlsController@getHeading');
    Route::any('/get-heading-keys', 'Developers\BBurlsController@getFileSourcehedindKeys');
    Route::post('/unit-main', 'Developers\BBurlsController@getUnitMain');
    Route::post('/unit-main-default', 'Developers\BBurlsController@getUnitMainDefault');
    Route::post('/get-form-field-options', 'Developers\BBurlsController@getFormFieldOptions');
    Route::post('/get-field-options-live', 'Developers\BBurlsController@getFieldOptionsLive');
    Route::any('/layout', 'Developers\BBurlsController@BBlayout');
    Route::post('/get-tables-lists', 'Developers\BBurlsController@getTableLists');
    Route::post('/get-table-columns', 'Developers\BBurlsController@getTableColums');
    Route::post('/get-column-rules', 'Developers\BBurlsController@getColumnRules');
    Route::post('/get-file-data', 'Developers\BBurlsController@getFileData');
    Route::post('/get-file-list', 'Developers\BBurlsController@getFileListing');
    Route::post('/get-field-units', 'Developers\BBurlsController@getFieldUnitListing');
    Route::post('/get-field-unit', 'Developers\BBurlsController@getFieldUnit');
    Route::post('/get-page-layout-config-toarray', 'Developers\BBurlsController@getPageLayoutConfigToArray');
    Route::post('/get-bb-button-data', 'Developers\BBurlsController@getBBbuttonData');
    Route::post('/get-page-section-config-toarray', 'Developers\BBurlsController@getPageSectionConfigToArray');
    Route::post('/get-bb-output', 'Developers\BBurlsController@getBBFunctionOutput');
    Route::post('/get-output-bb', 'Developers\BBurlsController@getBBFunction');
    Route::post('/get-section-render-and-data', 'Developers\BBurlsController@getSectionRenderAndData');
    Route::post('/post-save-hooks', 'Developers\BBurlsController@postSaveHooks');
    Route::post('/post-add-unit-to-hook', 'Developers\BBurlsController@postAddUnitToHook');
});