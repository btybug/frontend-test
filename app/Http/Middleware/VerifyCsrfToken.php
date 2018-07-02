<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/admin/manage/frontend/pages/live-settings',
        '/admin/framework/sql_builder/render',
        '/admin/media/php/connector.minimal.php'
    ];
}
