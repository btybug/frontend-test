<?php

namespace Btybug\FrontSite\Providers;

//use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'manage');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'manage');

        $tubs = [
            'manage_settings' => [
                [
                    'title' => 'General',
                    'url' => '/admin/front-site/settings',
                ],
                [
                    'title' => 'Frontend',
                    'url' => '/admin/front-site/settings/frontend',
                ],
                [
                    'title' => 'Notifications',
                    'url' => '/admin/front-site/settings/notifications',
                ],
                [
                    'title' => 'URL menger',
                    'url' => '/admin/front-site/settings/url-menger',
                ],
                [
                    'title' => 'Admin Emails',
                    'url' => '/admin/front-site/settings/adminemails',
                ],
                [
                    'title' => 'Api settings',
                    'url' => '/admin/front-site/settings/api-settings',
                ], [
                    'title' => 'Api Products',
                    'url' => '/admin/front-site/settings/api-products',
                ],
                [
                    'title' => 'Language',
                    'url' => '/admin/front-site/settings/lang',
                ]
            ],
            'frontend_manage' => [

                [
                    'title' => 'Pages',
                    'url' => '/admin/front-site/structure/front-pages',
                ],
                [
                    'title' => 'Menus',
                    'url' => '/admin/front-site/structure/menus',
                ],
                [
                    'title' => 'Classify',
                    'url' => '/admin/front-site/structure/classify',
                ],
                [
                    'title' => 'Filters',
                    'url' => '/admin/front-site/structure/filters',
                ],
                [
                    'title' => 'Hooks',
                    'url' => '/admin/front-site/structure/hooks',
                ]
            ],
            'page_edit' => [
                [
                    'title' => 'General',
                    'url' => '/admin/front-site/structure/front-pages/general/{id}',
                ],[
                    'title' => 'Content',
                    'url' => '/admin/front-site/structure/front-pages/settings/{id}',
                ],[
                    'title' => 'Extra',
                    'url' => '/admin/front-site/structure/front-pages/extra/{id}',
                ]
            ],'page_special_edit' => [
                [
                    'title' => 'Special Settings',
                    'url' => '/admin/front-site/structure/front-pages/special-settings/{id}',
                ], [
                    'title' => 'Special General',
                    'url' => '/admin/front-site/structure/front-pages/special-general/{id}',
                ],
            ],
            'manage_emails' => [
                [
                    'title' => 'Emails',
                    'url' => '/admin/front-site/emails/{id}',
                ], [
                    'title' => 'Settings',
                    'url' => '/admin/front-site/emails/settings',
                ],
            ]
        ];
        \Eventy::action('my.tab', $tubs);

        \Eventy::action('admin.menus', [
            "title" => "Front Site",
            "custom-link" => "#",
            "icon" => "fa fa-hand-lizard-o",
            "is_core" => "yes",
            "children" => [
                [
                    "title" => "Structure",
                    "custom-link" => "/admin/front-site/structure",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ], [
                    "title" => "Settings",
                    "custom-link" => "/admin/front-site/settings",
                    "icon" => "fa fa-cog",
                    "is_core" => "yes"
                ], [
                    "title" => "Events",
                    "custom-link" => "/admin/front-site/event",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ],[
                    "title" => "Admin Events",
                    "custom-link" => "/admin/front-site/admin-events",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ], [
                    "title" => "Emails",
                    "custom-link" => "/admin/front-site/emails",
                    "icon" => "fa fa-angle-right",
                    "is_core" => "yes"
                ]
            ]
        ]);

          // \Btybug\btybug\Models\Routes::registerPages('btybug/frontsite');
        \Eventy::action('front_page_edit_widget', ['Page Info'=> [
            'view' => 'manage::panels.page_info',
            'id' => 'panel_info',
        ]]);
        \Eventy::action('front_page_edit_widget', ['Header & footer'=>
            [
                'view' => 'manage::panels.header_footer',
                'id' => 'panel_header_footer',
            ]]);
        \Eventy::action('front_page_edit_widget', ['Main Content'=>
            [
                'view' => 'manage::panels.main_content',
                'id' => 'panel_main_content',
            ]]);
        \Eventy::action('front_page_edit_widget', ['Assets '=>
            [
                'view' => 'manage::panels.assets',
                'id' => 'panel_assets',
            ]]);


        \Eventy::action('front_page_edit_widget', ['Test Pane; '=>
        [
            'view' => 'manage::panels.test',
            'id' => 'test_panel',
        ]]);
        \Eventy::action('front_page_edit_widget', ['CSS Panel'=>
        [
            'view' => 'manage::panels.css',
            'id' => 'css_panel',
        ]]);

        \Eventy::action('front_page_edit_widget', ['Page Units'=>
            [
                'view' => 'manage::panels.units',
                'id' => 'units_panel',
            ]]);

    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(GeneratorEventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }
}
