<?php

namespace Btybug\btybug\Providers;

//use TorMorten\Eventy;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use function MongoDB\BSON\toPHP;


class DirectivesServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('option', function ($expression) {
            $t = self::parseMultipleArgs($expression);
            $hide = 'hide';
            return  "<?php if( isset({$t->get(2)}['key']) && isset({$t->get(2)}['type']) && {$t->get(2)}['type'] == {$t->get(1)} &&  {$t->get(2)}['key'] == {$t->get(0)}){ echo '<div>'; }else{ echo '<div class=".$hide.">'; } ?>";
        });

        Blade::directive('endoption', function () {
            return "</div>";
        });
    }

    public static function parseMultipleArgs($expression)
    {
        return collect(explode(',', $expression))->map(function ($item) {
            return trim($item);
        });
    }

    public static function stripQuotes($expression)
    {
        return str_replace("'", '', $expression);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
