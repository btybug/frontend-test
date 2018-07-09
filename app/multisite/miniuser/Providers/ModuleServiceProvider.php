<?php

namespace App\multisite\miniuser\Providers;

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
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {

    }

    public function mapTabs()
    {
        $tubs = [
            'mini_user_page_edit' => [
                [
                    'title' => 'General',
                    'url' => '/my-account/my-site/pages/edit/{id}',
                ],
                [
                    'title' => 'Content',
                    'url' => '/my-account/my-site/pages/edit/{id}/content',
                ],
                'layout' => 'mini::layouts.app'
            ],
            'mini_my_site_settings' => [
                [
                    'title' => 'General',
                    'url' => '/my-account/my-site/settings',
                ],
                [
                    'title' => 'Special',
                    'url' => '/my-account/my-site/settings/special',
                ],
                'layout' => 'mini::layouts.app'
            ],
        ];
        \Eventy::action('my.tab', $tubs);
    }
}
