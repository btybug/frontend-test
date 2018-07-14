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
                    "title" => "Settings",
                    "custom-link" => "/admin/mini/settings",
                    "icon" => "fa fa-cog",
                    "is_core" => "yes"
                ]
            ]
        ]);

    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        \Btybug\btybug\Models\Routes::registerPages('btybug/mini');

    }


}
