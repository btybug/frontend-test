<?php

namespace Btybug\Framework\Providers;

use Btybug\Framework\Models\Optimzation;
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
        include __DIR__ . '/../' . DS . 'FwFunctions' . DS . 'functions.php';
        BBaddShortcode('FW-get-classes', 'FWgetClasses');
        BBaddShortcode('FW-get', 'FWget');

        BBaddFunctions('get_user',[
            'fn' => 'BBGetUser',
            'view' => 'framework::bb_functions._partials.user_options',
            'description' => 'Get Auth user or select ID for get User'
        ]);

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'framework');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'framework');

        $tabs = [
            'framework_settings' => [
                [
                    'title' => 'Backend',
                    'url' => '/admin/framework/settings',
                ],
                [
                    'title' => 'Frontend',
                    'url' => '/admin/framework/settings/frontend',
                ]
            ],
            'framework_assets' => [
                [
                    'title' => 'Js',
                    'url' => '/admin/framework/js',
                ],
                [
                    'title' => 'Css',
                    'url' => '/admin/framework/css',
                ],
                [
                    'title' => 'Fonts',
                    'url' => '/admin/framework/fonts',
                ]
            ]
        ];

        \Eventy::action('my.tab', $tabs);

       

        \Eventy::action('admin.menus', [
            "title" => "Framework",
            "custom-link" => "#",
            "icon" => "fa fa-thumbs-o-up",
            "is_core" => "yes",
            "children" => [
                [
                    "title" => "Css",
                    "custom-link" => "/admin/framework/css",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],
                [
                    "title" => "Css Classes",
                    "custom-link" => "/admin/framework/css-classes",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],
                [
                    "title" => "HTML Component",
                    "custom-link" => "/admin/framework/html-component",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],
                [
                    "title" => "Dynamic Component",
                    "custom-link" => "/admin/framework/dynamic-component",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],
                [
                    "title" => "Blade Studio",
                    "custom-link" => "/admin/framework/blade",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],[
                    "title" => "Sql Studio",
                    "custom-link" => "/admin/framework/sql_builder",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],[
                    "title" => "All Studios",
                    "custom-link" => "/admin/framework/all-studios",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],
                [
                    "title" => "BB Functions",
                    "custom-link" => "/admin/framework/bb-functions",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],
                [
                    "title" => "React",
                    "custom-link" => "/admin/framework/react",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],
                [
                    "title" => "Studio test",
                    "custom-link" => "/admin/framework/studio-test",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ]
            ]
        ]);

        //TODO; remove when finish all
//        // \Btybug\btybug\Models\Routes::registerPages('sahak.avatar/framework');
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
