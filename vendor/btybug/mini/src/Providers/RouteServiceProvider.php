<?php

namespace Btybug\Mini\Providers;


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
    protected $namespace = 'Btybug\Mini\Http\Controllers';

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
        $this->mapAdminRoutes();
        $this->mapWebRoutes();
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
                'middleware' => ['auth'],
                'prefix' => 'my-account',
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/route.php';
            });
        });
    }
    protected function mapAdminRoutes()
    {

        Route::group([
            'domain' => (string)env('DOMAIN'),
            'middleware' => 'web',
        ], function ($router) {
            Route::group([
                'middleware' => ['admin:Users'],
                'prefix' => 'admin/minicms',
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/admin.php';
            });
        });
    }


}
