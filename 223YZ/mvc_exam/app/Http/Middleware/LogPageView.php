<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageView;

class LogPageView
{
    public function handle(Request $request, Closure $next)
    {
        PageView::create([
            'url' => $request->fullUrl(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'viewed_at' => now()->toDateTimeString()
        ]);

        return $next($request);
    }
}
