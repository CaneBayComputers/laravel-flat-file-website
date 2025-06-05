<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;

class VerifyContentAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = trim($request->path(), '/');

        // Allow home page to pass through
        if ( $path === '' ) 
        {
            return $next($request);
        }

        // Regex: allow only letters, numbers, slashes, and dashes
        if ( ! preg_match('/^[a-zA-Z0-9\/-]+$/', $path) ) 
        {
            abort(404);
        }

        $content_list = Redis::get('content_list');

        $path = str_replace('/', '\\/', $path);

        if ( $content_list && strpos($content_list, '"' . $path . '"') !== false ) 
        {
            return $next($request);
        }

        abort(404);
    }
}
