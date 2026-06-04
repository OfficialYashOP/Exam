<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [];

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\LogPageView::class,
        ],
        'api' => [],
    ];

    protected $routeMiddleware = [
        'log.pageview' => \App\Http\Middleware\LogPageView::class,
    ];
}
