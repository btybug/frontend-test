<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('pages-optimize', 'HomeController@pagesOptimize');
Route::get('units/img/{slug}/{path}', 'HomeController@unitImg')->where('path', '.*');
if (\Illuminate\Support\Facades\Schema::hasTable('admin_pages')) {
    Route::get(BBGetAdminLoginUrl(), '\App\Modules\Users\Http\Controllers\Auth\AuthController@getAdminLogin')->middleware('guest');
    Route::post(BBGetAdminLoginUrl(), ['before' => 'throttle:2,60', 'uses' => '\App\Modules\Users\Http\Controllers\Auth\AuthController@postAdminLogin'])->middleware('guest');

}
Route::get('migrate', function () {

});
Route::group(
    ['domain' => env('DOMAIN'), 'middleware' => 'form'],
    function () {

        Route::get('form-test', function () {
            return view('test-form');
        });
        Route::post('save-form', function () {

        });

//        Route::get('/', 'HomeController@pages');
        //deletable
        Route::get('login', '\Btybug\User\Http\Controllers\Auth\LoginController@showLoginForm')->middleware('guest')->name('login');
        Route::post('login', '\Btybug\User\Http\Controllers\Auth\LoginController@login')->middleware('guest');


        Route::post('register', '\Btybug\btybug\Http\Controllers\Auth\RegisterController@register')->middleware('guest')->name('register');

        Route::get('activate/{username}/{token}', '\App\Modules\Users\Http\Controllers\Auth\AuthController@activate')->middleware('guest');

        //        Route::get(BBGetAdminLoginUrl(), '\Btybug\Modules\Users\Http\Controllers\Auth\AuthController@getAdminLogin')->middleware('guest');
        //        Route::post(BBGetAdminLoginUrl(), '\Btybug\Modules\Users\Http\Controllers\Auth\AuthController@postAdminLogin')->middleware('guest');
        Route::get('logout', '\Btybug\User\Http\Controllers\Auth\LoginController@logout')->middleware('auth')->name('log_out');;

        Route::post('/modality/settings-live', 'Admincp\ModalityController@postSettingsLive');
        Route::post('/modality/settings-live-react', 'Admincp\ModalityReactController@postSettingsLive');

        Route::post('/modality/settings-customize', 'Admincp\ModalityController@postCustomizeUnit');
        Route::post('/modality/settings-customize-save', 'Admincp\ModalityController@postCustomizeUnitSave');

        Route::post('/modality/settings-customize-layouts', 'Admincp\ModalityController@postCustomizeLayout');
        Route::post('/modality/settings-customize-layouts-save', 'Admincp\ModalityController@postCustomizeLayoutSave');

        Route::post('/modality/live-preview', 'Admincp\ModalityController@postLivePreview');

        Route::post('/modality/styles/options', 'Admincp\ModalityController@psotStylesOptions');
        Route::post('/modality/widgets/options', 'Admincp\ModalityController@psotWidgetsOptions');
        Route::post('/modality/templates/options', 'Admincp\ModalityController@postTplOptions');
        Route::post('/modality/units/options', 'Admincp\ModalityController@postUnitOptions');
        Route::post('/modality/mini_units/options', 'Admincp\ModalityController@postMiniUnitOptions');
        Route::post('/modality/page-sections/options', 'Admincp\ModalityController@postPageSectionOptions');
        Route::post('/modality/mini-page-sections/options', 'Admincp\ModalityController@postMiniPageSectionOptions');
        Route::get('/modality/page-sections/modal/{slug}', 'Admincp\ModalityController@pageSectionPreview');
        Route::post('/modality/placeholder_section/options', 'Admincp\ModalityController@postSectionOptions');
        Route::post('/modality/main_body_modality/options', 'Admincp\ModalityController@postMainBodyOptions');

        //front pages
        Route::get('account', '\Btybug\FrontSite\Http\Controllers\MyAccountController@index')->name('front_page_account');
        Route::get('account/general', '\Btybug\FrontSite\Http\Controllers\MyAccountController@general')->name('front_page_account_general');
        Route::get('account/general/password', '\Btybug\FrontSite\Http\Controllers\MyAccountController@password')->name('front_page_account_general_password');
        Route::get('favorites', '\Btybug\FrontSite\Http\Controllers\MyAccountController@favorites')->name('front_page_favorites');

        Route::group(
            ['prefix' => '/admin', 'middleware' => ['admin:Users', 'sessionTimout', 'system']],
            function () {

                Route::get('/', 'Admincp\DashboardController@getIndex')->name('go_to_home');

                Route::get('/menus', 'Admincp\DashboardController@getAdminMenus');
//                Route::controller('/dashboard', 'Admincp\DashboardController');

                Route::get(
                    '/notes',
                    function () {
                        return View('admin.notes');
                    }
                );

                Route::get(
                    '/functions',
                    function () {
                        $function = \config('functions');

                        return View('admin.functions')->with('functions', $function);
                    }
                );
            }
        );

        //ignore Routes For Common Pages
//        $ignores = config('ignoreroutes');//D:\wamp\www\avatar\appdata\config\ignoreroutes.php
        if (\Illuminate\Support\Facades\Schema::hasTable('frontend_pages')) {
            $url = \Request::server('REQUEST_URI'); //$_SERVER['REQUEST_URI'];
            if (!starts_with($url, '/admin') && !starts_with($url, '/my-account')) {
                $pages = Btybug\FrontSite\Models\FrontendPage::where('module_id',null)->get();;
                Route::group(['middleware' => 'frontPermissions'], function () use ($pages) {
                    foreach ($pages as $page) {
                        $key = $page->url;
                        if(!$page->render_method){
                            Route::get($key, function () use ($key) {
                                $home = new Btybug\btybug\Models\Home();
                                return $home->render($key, Request::all());
                            });
                        }

                    }
                });
            }
        }

//        Route::get('register', '\Btybug\btybug\Http\Controllers\Auth\RegisterController@showRegistrationForm')->middleware('guest');
    }


);
Route::get('/my-sites', 'HomeController@mySites');

