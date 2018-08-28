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
        Route::get('account', '\Btybug\FrontSite\Http\Controllers\MyAccountController@index')->middleware('auth')->name('front_page_account');
        Route::get('account/general', '\Btybug\FrontSite\Http\Controllers\MyAccountController@general')->middleware('auth')->name('front_page_account_general');
        Route::post('account/general', '\Btybug\FrontSite\Http\Controllers\MyAccountController@postGeneral')->middleware('auth')->name('front_page_account_general_post');

        Route::get('profiles', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@profiles')->middleware('auth')->name('front_page_account_profiles');
        Route::get('profiles/social', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@social')->middleware('auth')->name('front_page_account_profiles_social');
        Route::get('profiles/social/general', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@socialGeneral')->middleware('auth')->name('front_page_account_profiles_social_general');
        Route::get('profiles/social/quick-bugs', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@socialQuickbug')->middleware('auth')->name('front_page_account_profiles_social_quickbug');
        Route::get('profiles/social/travel', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@socialTravel')->middleware('auth')->name('front_page_account_profiles_social_travel');
        Route::get('profiles/social/places', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@socialPlaces')->middleware('auth')->name('front_page_account_profiles_social_places');
        Route::post('profiles/social/general', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@postSocialGeneral')->name('front_page_account_profiles_save');
        Route::post('profiles/social/bugit', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@postSocialBugit')->name('front_page_social_bugit');
        Route::get('profiles/social/tags/search', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@tagsAutocompleate')->name('front_page_social_bugit_autocomplete');

        Route::group(['prefix' => 'contacts'], function () {
            Route::get('/', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@contactsIndex', true)->name('front_page_social_contacts');
            Route::get('/following', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@contactsFollowing', true)->name('front_page_social_contacts_following');
            Route::get('/followers', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@contactsFollowers', true)->name('front_page_social_contacts_followers');
            Route::get('/networks', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@contactsNetworks', true)->name('front_page_social_contacts_networks');
        });
        Route::get('/getusers', '\Btybug\FrontSite\Http\Controllers\SocialProfileController@getAllUsers')->name('get_all_users');

        Route::get('account/general/password', '\Btybug\FrontSite\Http\Controllers\MyAccountController@password')->middleware('auth')->name('front_page_account_general_password');
        Route::get('account/general/preferances', '\Btybug\FrontSite\Http\Controllers\MyAccountController@preferances')->middleware('auth')->name('front_page_account_general_preferances');
        Route::get('account/general/logs', '\Btybug\FrontSite\Http\Controllers\MyAccountController@logs')->middleware('auth')->name('front_page_account_general_logs');
        Route::post('account/general/password', '\Btybug\FrontSite\Http\Controllers\MyAccountController@postPassword')->middleware('auth')->name('front_page_account_general_password_post');
        Route::get('favorites', '\Btybug\FrontSite\Http\Controllers\MyAccountController@favorites')->middleware('auth')->name('front_page_favorites');

        Route::get('bb/all-members', '\Btybug\FrontSite\Http\Controllers\BBController@allMembers')->middleware('auth')->name('front_page_bb_members');

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
            if (!starts_with($url, '/admin') && !starts_with($url, '/my-account') && !starts_with($url,'/broadcasting')) {
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

        Route::get('register', '\Btybug\btybug\Http\Controllers\Auth\RegisterController@showRegistrationForm')->middleware('guest');
    }


);

