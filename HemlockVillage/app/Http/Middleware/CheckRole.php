<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public static function handle(Request $request, Closure $next, ...$accessLevels): Response
    {
        // Not logged in
        if (!Auth::check())
        {
            session()->flash("error", "Please login first");

            return redirect("login");
        }

        $accessLevel = DB::table("roles")->find(Auth::user()->role_id);

        // Not an access level that can access
        if (!in_array($accessLevel, $accessLevels))
            abort(403, "You do not have permission to view this page");

        return $next($request);
    }
}
