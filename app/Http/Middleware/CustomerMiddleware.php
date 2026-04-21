<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) { 
            return redirect()->route('login');
        }

        if (! $request->user() || ! $request->user()->hasRole('customer')) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
