<?php

namespace Btybug\btybug\Providers;

use Btybug\btybug\Models\Painter\Painter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Btybug\btybug\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the module.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();
        $this->mapFrontDashboard();

        //
    }

    /**
     * Define the "web" routes for the module.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'domain' => (string)env('DOMAIN'),
            'middleware' => 'web',
        ], function ($router) {
            Route::group([
//                'middleware' => ['admin:Users'],
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/web.php';
            });
        });
    }

    /**
     * Define the "api" routes for the module.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'domain' => (string)env('DOMAIN'),
        ], function ($router) {
            Route::group([
//                'middleware' => ['admin:Users'],
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/api.php';
            });
        });
    }

    protected function mapFrontDashboard()
    {
        Route::group([
            'domain' => (string)env('DOMAIN'),
            'middleware' => ['web','adminCheck']
        ], function ($router) {
            Route::group([
                'middleware' => ['auth'],
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/dashboard.php';
            });
        });
    }
}
