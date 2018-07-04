<?php

namespace App\multisite\sahak\Providers;

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

    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {

    }
}
