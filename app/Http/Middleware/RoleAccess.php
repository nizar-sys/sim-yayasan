<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $role = $request->user()->role;

        if (Auth::user()->educator != null) {
            $role = 'educator';
        }elseif (Auth::user()->student != null) {
            $role = 'student';
        }

        if(!in_array($role, $roles)) {
            return back()->with('error', 'Anda tidak memiliki akses ke halaman ini');
        }
        return $next($request);
    }
}
