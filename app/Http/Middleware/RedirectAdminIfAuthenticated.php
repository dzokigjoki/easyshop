<?php

namespace EasyShop\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use EasyShop\Models\Role;

class RedirectAdminIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();

            if($user->hasAnyRole()) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
