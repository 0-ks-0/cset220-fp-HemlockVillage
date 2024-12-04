<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$accessLevels
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$accessLevels): Response
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            session()->flash("error", "Please login first");
            return redirect("login");
        }

        // Get the access level from the roles table
        $role = DB::table('roles')->where('id', Auth::user()->role_id)->first();

        // Ensure the role exists and check the access level
        if (!$role || !in_array($role->access_level, $accessLevels)) {
            abort(403, "You do not have permission to view this page");
        }

        return $next($request);
    }
}




