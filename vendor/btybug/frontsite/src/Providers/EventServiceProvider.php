<?php

namespace Btybug\FrontSite\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\AfterLoginEvent' => [
            'App\Listeners\LoginListener',
        ],
        'App\Events\AfterLogOutEvent' => [
            'App\Listeners\LogOutListener',
        ],
        'App\Events\FormSubmit' => [
            'App\Listeners\SubmitFormListener',
        ],
        'App\Events\CustomEvent' => [
            'App\Listeners\CustomEventLictner',
        ]
    ];

    protected $subscribe = [
        'App\Listeners\UserEventSubscriber',
        'App\Listeners\SubmitFormListener',
        'App\Listeners\CustomEventLictner',
        'App\Listeners\LoginListener',
        'App\Listeners\LogOutListener',
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        \Subscriber::addEvent('After Login', 'App\Events\AfterLoginEvent');
        \Subscriber::addEvent('After Log out', 'App\Events\AfterLogOutEvent');
        \Subscriber::addEvent('on registred', 'Illuminate\Auth\Events\Registred');
        \Subscriber::addEvent('on Page Create', 'App\Events\PageCreateEvent');


        \Subscriber::addProperty('Send Email', 'Btybug\FrontSite\Models\EventSubscriber\Independent\CoreIndependents@sendEmail');
        \Subscriber::addProperty('Notification', 'Btybug\FrontSite\Models\EventSubscriber\Independent\CoreIndependents@Notification');
        \Subscriber::add('App\Events\FormSubmit', 'BtybugManage\Models\Emails@onFormSubmit', ['name' => 'value']);
        \Subscriber::add('App\Events\CustomEvent', 'Btybug\FrontSite\Models\Emails@test');

        parent::boot();


    }
}
