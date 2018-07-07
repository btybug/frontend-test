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
                    'url' => '/my-account/pages/edit/{id}',
                ],
                [
                    'title' => 'Content',
                    'url' => '/my-account/pages/edit/{id}/content',
                ],
                'layout' => 'mini::layouts.app'
            ],
        ];
        \Eventy::action('my.tab', $tubs);
    }
}
