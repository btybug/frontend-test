<?php

namespace App\multisite\sahakavatar\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'mini');
        $this->mapTabs();
        $this->mapUnits('sahakavatar');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {

    }


    public function mapUnits($username)
    {
        \Config::set('miniunits_config_path',"app" . DS . "multisite" . DS . $username . DS . "Resources". DS . "Units" . DS . "painter.json");
        \Config::set('miniunits_storage_path',"app" . DS . "multisite" . DS . $username . DS . "Resources". DS . "Units");

        \Config::set('minilayouts_config_path',"app" . DS . "multisite" . DS . $username . DS . "Resources". DS . "Views" . DS . "ContentLayouts" . DS . "layout.json");
        \Config::set('minilayouts_storage_path',"app" . DS . "multisite" . DS . $username . DS . "Resources". DS . "Views" . DS . "ContentLayouts");
    }


    public function mapTabs()
    {
        $tubs = [
            'mini_user_page_edit' => [
                [
                    'title' => 'General',
                    'url' => '/my-account/my-site/btybug/pages/edit/{id}',
                ],
                [
                    'title' => 'Content',
                    'url' => '/my-account/my-site/social/pages/edit/{id}/content',
                ],
                'layout' => 'mini::layouts.app'
            ],
            'mini_my_site_settings' => [
                [
                    'title' => 'General',
                    'url' => '/my-site/settings',
                ],
                [
                    'title' => 'Special',
                    'url' => '/my-site/settings/special',
                ],
                'layout' => 'mini::layouts.app'
            ],
            'mini_my_site_extra_units' => [
                [
                    'title' => 'Units',
                    'url' => '/my-account/extra/gear',
                ],
                [
                    'title' => 'Widget',
                    'url' => '/my-account/extra/widgets',
                ],
                [
                    'title' => 'layouts',
                    'url' => '/my-account/extra/layouts',
                ],
                'layout' => 'mini::layouts.app'
            ],
            'mini_my_site_btybug' => [
                [
                    'title' => 'Pages',
                    'url' => '/my-site/social/pages',
                ],
                [
                    'title' => ' Site Cover',
                    'url' => '/my-site/social/site-cover',
                ],
                [
                    'title' => 'Settings',
                    'url' => '/my-site/social/settings',
                ],
                'layout' => 'mini::layouts.app'
            ],
            'mini_my_account_settings' => [
                [
                    'title' => 'My details',
                    'url' => '/my-account/settings',
                ],
                [
                    'title' => 'user account',
                    'url' => '/my-account/settings/user-account',
                ],
                [
                    'title' => 'tab3',
                    'url' => '/my-account/settings/tab3',
                ],
                [
                    'title' => 'tab4',
                    'url' => '/my-account/settings/tab4',
                ],
                'layout' => 'mini::layouts.app'
            ],
            'mini_media' => [
                [
                    'title' => 'Drive',
                    'url' => route('mini_media'),
                ],
                [
                    'title' => 'Settings',
                    'url' => route('mini_media_settings'),
                ],
                'layout' => 'mini::layouts.app'
            ],
        ];
        \Eventy::action('my.tab', $tubs);
    }
}
