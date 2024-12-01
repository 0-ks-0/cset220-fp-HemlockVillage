<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public static function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Not logged in
        if (!Auth::check())
        {
            session()->flash("error", "Please login first");

            return redirect("login");
        }

        // Not a role that can access
        if (!in_array(Auth::user()->role_id, $roles))
            abort(403, "You do not have permission to view this page");

        return $next($request);
    }
}
