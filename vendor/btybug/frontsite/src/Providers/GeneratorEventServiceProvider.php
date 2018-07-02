<?php

namespace Btybug\FrontSite\Providers;

use Btybug\FrontSite\Models\EventSubscriber\EventGenerator\Generator;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class GeneratorEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [];
    protected $subscribe = [];
    private $generator;

    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        $generator = new Generator();
        $this->listen = $generator->getEvents();
        $this->subscribe = $generator->getSubscribes();
        $this->generator = $generator;
        parent::__construct($app);
    }


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->generator->getEventsRegister();
        parent::boot();
    }
}
