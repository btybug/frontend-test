<?php

namespace Btybug\Mini\Providers;

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
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'multisite');
        \Eventy::action('admin.menus', [
            "title" => "Mini CMS",
            "custom-link" => "#",
            "icon" => "fa fa-hand-lizard-o",
            "is_core" => "yes",
            "children" => [
                [
                    "title" => "Index",
                    "custom-link" => "/admin/mini",
                    "icon" => "fa fa-cog",
                    "is_core" => "yes"
                ], [
                    "title" => "Assets",
                    "custom-link" => "/admin/mini/assets",
                    "icon" => "fa fa-cog",
                    "is_core" => "yes"
                ], [
                    "title" => "Users",
                    "custom-link" => "/admin/mini/users",
                    "icon" => "fa fa-cog",
                    "is_core" => "yes"
                ], [
                    "title" => "Settings",
                    "custom-link" => "/admin/mini/settings",
                    "icon" => "fa fa-cog",
                    "is_core" => "yes"
                ]
            ]
        ]);

        $tubs = [
            'mini_assets' => [
                [
                    'title' => 'General',
                    'url' => '/admin/mini/assets/general',
                ],[
                    'title' => 'Units',
                    'url' => '/admin/mini/assets/units/{slug}',
                ],[
                    'title' => 'Widgets',
                    'url' => '/admin/mini/assets/widgets/{slug}',
                ],[
                    'title' => 'Layouts',
                    'url' => '/admin/mini/assets/layouts/{slug}',
                ], [
                    'title' => 'Forms',
                    'url' => '/admin/mini/assets/forms',
                ], [
                    'title' => 'Pages',
                    'url' => '/admin/mini/assets/pages',
                ], [
                    'title' => 'Plugins',
                    'url' => '/admin/mini/assets/plugins',
                ],

            ]
        ];
        \Eventy::action('my.tab', $tubs);
        \Btybug\btybug\Models\Routes::registerPages('btybug/mini');

    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

    }


}
