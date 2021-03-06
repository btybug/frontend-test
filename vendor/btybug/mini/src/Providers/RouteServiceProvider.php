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
        $this->mapFrontRoutes();
        $this->mapFrontHome();
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
            'middleware' => ['web','adminCheck']
        ], function ($router) {
            Route::group([
                'middleware' => ['auth'],
                'prefix' => 'my-site',
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
                'middleware' => ['auth'],
                'prefix' => 'admin/mini',
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/admin.php';
            });
        });
    }
    protected function mapFrontRoutes()
    {

        Route::group([
            'domain' => (string)env('DOMAIN'),
            'middleware' => 'web',
        ], function ($router) {
            Route::group([
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/front.php';
            });
        });
    }
    protected function mapFrontHome()
    {
        Route::group([
            'domain' => (string)env('DOMAIN'),
            'middleware' => ['web','adminCheck']
        ], function ($router) {
            Route::group([
                'middleware' => ['auth'],
                'prefix' => 'home',
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/home.php';
            });
        });
    }



    protected function mapFrontNotifications()
    {
        Route::group([
            'domain' => (string)env('DOMAIN'),
            'middleware' => ['web','adminCheck']
        ], function ($router) {
            Route::group([
                'middleware' => ['auth'],
                'prefix' => 'notifications',
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/notifications.php';
            });
        });
    }

    protected function mapFrontMessages()
    {
        Route::group([
            'domain' => (string)env('DOMAIN'),
            'middleware' => ['web','adminCheck']
        ], function ($router) {
            Route::group([
                'middleware' => ['auth'],
                'prefix' => 'messages',
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/messages.php';
            });
        });
    }

    protected function mapFrontSubscribers()
    {
        Route::group([
            'domain' => (string)env('DOMAIN'),
            'middleware' => ['web','adminCheck']
        ], function ($router) {
            Route::group([
                'middleware' => ['auth'],
                'prefix' => 'subscribers',
                'namespace' => $this->namespace,
            ], function ($router) {
                require __DIR__ . '/../Routes/subscribers.php';
            });
        });
    }


}
