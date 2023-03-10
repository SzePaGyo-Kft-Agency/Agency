<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [

        "/api/event/*",
        "/api/event/new",

        "api/participates",
        "api/participate/*/*",
        "api/participate/new",

        "/agency/*",
        "/agency/new",

        'api/users',
        'api/users/*',

        'api/events/delay/*'
    ];
}
