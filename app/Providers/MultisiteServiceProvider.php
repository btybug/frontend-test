<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MultisiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register('App\multisite\Mini\Providers\ModuleServiceProvider');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    public function map()
    {


        //
    }

    protected function mapMultisiteRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}
