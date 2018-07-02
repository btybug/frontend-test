<?php

namespace Btybug\Hook;

use Illuminate\Support\ServiceProvider;

use Blade;

class HookServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Adds a directive in Blade for actions
         */
        Blade::directive('action', function($expression) {
            return "<?php Hook::action$expression; ?>";
        });

        /**
         * Adds a directive in Blade for filters
         */
        Blade::directive('filter', function($expression) {
            return "<?php echo Hook::filter$expression; ?>";
        });
    }

    /**
     * Registers the eventy singleton
     *
     * @return void
     */
    public function register()
    {
    	$this->app->singleton('hooky', function ($app) {
		    return new Hooks();
		});
    }
}
