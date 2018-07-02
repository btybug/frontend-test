<?php

namespace Btybug\btybug\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Btybug\btybug\Services\RenderService;
use Btybug\Console\Repository\FrontPagesRepository;
use Btybug\FrontSite\Services\FrontendPageService;

class FrontendPermissions
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $page = RenderService::getFrontPageByURL();
        if($page) {

            if ($page->status == 'draft') abort(404);

            if ($page->page_access == 0) return $next($request);

            if ($page->page_access == 1 && \Auth::check() &&
                FrontendPageService::checkAccess($page->id, \Auth::user())) {
                return $next($request);
            }
        }

        abort(404);
    }

}
