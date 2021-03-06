<?php

namespace App\Http;

//use App\Http\Middleware\ViewTestMiddleware;
use Btybug\btybug\Middleware\ConvertEmptyStingsToNullBty;
use Btybug\btybug\Middleware\FormSettingsMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Btybug\User\Http\Middleware\UserHasPermission;
use Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull;
use Laravel\Passport\Http\Middleware\CheckClientCredentials;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        ConvertEmptyStingsToNullBty::class,
        \App\Http\Middleware\Cors::class,
        FormSettingsMiddleware::class
//        ViewTestMiddleware::class
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Btybug\btybug\Middleware\CustomSCMiddleware::class,
            FormSettingsMiddleware::class
//            ViewTestMiddleware::class
        ],
        'adminCheck' => [
            \Btybug\btybug\Middleware\CheckAdminOrUser::class,
        ],
        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'admin' =>\Btybug\btybug\Middleware\AuthenticateAdmin::class,
        'userHasPerm' =>UserHasPermission::class,
        'sessionTimout' =>\Btybug\btybug\Middleware\SessionTimeout::class,
        'system' =>\Btybug\btybug\Middleware\SystemSettings::class,
        'frontPermissions'=> \Btybug\btybug\Middleware\FrontendPermissions::class,
        'cors' => \App\Http\Middleware\Cors::class,
        'form' =>   FormSettingsMiddleware::class,
        'client' => CheckClientCredentials::class,
        'stringToNull' => ConvertEmptyStringsToNull::class
    ];
}
