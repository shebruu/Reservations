<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...

    protected $middleware = [
        \App\Http\Middleware\ContentSecurityPolicy::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\InjectUser::class,
        ],

        'api' => [
            // ...
        ],
    ];

    protected $routeMiddleware = [

        'isAdmin' => \App\Http\Middleware\IsAdmin::class,
    ];
}
