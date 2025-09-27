<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $mode = 'auth'): Response
    {
        // Guest-only pages: if already logged in, kick to home
        if ($mode === 'guest') {
            if (Auth::check()) {
                return redirect()
                    ->route('home.view')
                    ->with('status', 'You are already signed in.');
            }
            return $next($request);
        }

        // Auth-only pages: if not logged in, send to login with flash
        if (!Auth::check()) {
            return redirect()
                ->route('login.view')
                ->with('error', 'Please login to your account');
        }

        return $next($request);     
    }
}
