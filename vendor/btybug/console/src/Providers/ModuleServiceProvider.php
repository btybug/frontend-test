<?php

namespace Btybug\Console\Providers;

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
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'console');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'console');

        $tubs = [
            'structure_console' => [
                [
                    'title' => 'Pages',
                    'url' => '/admin/console/structure/pages',
                ],
                [
                    'title' => 'Menus',
                    'url' => '/admin/console/structure/menus',
                ],
                [
                    'title' => 'Classify',
                    'url' => '/admin/console/structure/classify',
                ],
                [
                    'title' => 'Urls',
                    'url' => '/admin/console/structure/urls',
                ],
                [
                    'title' => 'Settings',
                    'url' => '/admin/console/structure/settings',
                ],
                [
                    'title' => 'Tables',
                    'url' => '/admin/console/structure/tables',
                ],
                [
                    'title' => 'Master Forms',
                    'url' => '/admin/console/structure/forms',
                ],
                [
                    'title' => 'Edit Forms',
                    'url' => '/admin/console/structure/edit-forms',
                ],
                [
                    'title' => 'Fields',
                    'url' => '/admin/console/structure/fields',
                ],
                [
                    'title' => 'Field types',
                    'url' => '/admin/console/structure/field-types',
                ]
            ],
            'backend_gears' => [
                [
                    'title' => 'General Fields',
                    'url' => '/admin/console/backend/general-fields',
                    'icon' => 'fa fa-cub'
                ],
                [
                    'title' => 'Special fields',
                    'url' => '/admin/console/backend/special-fields',
                    'icon' => 'fa fa-cub'
                ]
            ], 'console_general' => [
                [
                    'title' => 'Validations',
                    'url' => '/admin/console/general/validations',
                ],
                [
                    'title' => 'Trigger & Events',
                    'url' => '/admin/console/general/trigger-events',
                ]
            ],
        ];

        \Eventy::action('my.tab', $tubs);

        \Eventy::action('add.validation', [
            'test' => 'Added from plugin'
        ]);

        \Eventy::action('admin.menus', [
            "title" => "Developer console",
            "custom-link" => "#",
            "icon" => "fa fa-ils",
            "is_core" => "yes",
            "children" => [
                [
                    "title" => "Structure",
                    "custom-link" => "/admin/console/structure",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes",
                    "children" => [
                        [
                            "title" => "Pages",
                            "custom-link" => "/admin/console/structure/pages",
                            "icon" => "fa fa-angle-right",
                            "is_core" => "yes"
                        ] ,[
                            "title" => "Menus",
                            "custom-link" => "/admin/console/structure/menus",
                            "icon" => "fa fa-angle-right",
                            "is_core" => "yes"
                        ],[
                            "title" => "Classify",
                            "custom-link" => "/admin/console/structure/classify",
                            "icon" => "fa fa-angle-right",
                            "is_core" => "yes"
                        ],[
                            "title" => "URLS",
                            "custom-link" => "/admin/console/structure/urls",
                            "icon" => "fa fa-angle-right",
                            "is_core" => "yes"
                        ],[
                            "title" => "SETTINGS",
                            "custom-link" => "/admin/console/structure/settings",
                            "icon" => "fa fa-angle-right",
                            "is_core" => "yes"
                        ],[
                            "title" => "Tables",
                            "custom-link" => "/admin/console/structure/tables",
                            "icon" => "fa fa-angle-right",
                            "is_core" => "yes"
                        ]
                    ]
                ], [
                    "title" => "Settings",
                    "custom-link" => "/admin/console/settings",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes",
                    "children" => [
                        [
                            "title" => "General",
                            "custom-link" => "/admin/console/settings/general",
                            "icon" => "fa fa-angle-right",
                            "is_core" => "yes"
                        ]
                        ]
                ], [
                    "title" => "General",
                    "custom-link" => "/admin/console/general",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"],
                [
                    "title" => "Functions",
                    "custom-link" => "/admin/console/functions",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"],
                [
                    "title" => "Api",
                    "custom-link" => "/admin/console/api",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"]
            ]]);


        \Eventy::action('backend_page_edit_widget', ['Page Info'=> [
            'view' => 'console::structure.panels.page_info',
            'id' => 'panel_info',
        ]]);

        \Eventy::action('backend_page_edit_widget', ['Header & footer'=>
            [
                'view' => 'console::structure.panels.header_footer',
                'id' => 'panel_header_footer',
            ]]);
        \Eventy::action('backend_page_edit_widget', ['Main Content'=>
            [
                'view' => 'console::structure.panels.main_content',
                'id' => 'panel_main_content',
            ]]);
        \Eventy::action('backend_page_edit_widget', ['Layout'=>
            [
                'view' => 'console::structure.panels.layout',
                'id' => 'layout',
            ]]);
        \Eventy::action('backend_page_edit_widget', ['Assets '=>
            [
                'view' => 'console::structure.panels.assets',
                'id' => 'panel_assets',
            ]]);


        //TODO; remove when finish all
        // \Btybug\btybug\Models\Routes::registerPages('btybug/console');
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
