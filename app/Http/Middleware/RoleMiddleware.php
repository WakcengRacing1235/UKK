<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            // \Log::info('Middleware check: ', ['email' => Auth::user()->email, 'role' => Auth::user()->role]);
            if (Auth::user()->role === $role) {
                return $next($request);
            }
        }

        // \log::warning('Unauthorized access attempt: ', ['url' => $request->url()]);
        return redirect('/')->with('error', 'You do not have access to this page.');
    }
}
