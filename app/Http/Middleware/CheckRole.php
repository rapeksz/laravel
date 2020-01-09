<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if user is logged in
        if (Auth::check()) {
            // Actions of given route
            $actions = $request->route()->getAction();
            // Prints above-mentioned actions
            // var_dump($actions);

            // $actions['roles'] -> web.php -> 'roles' => 'Admin' / ['Admin', 'User']
            $roles = isset($actions['roles']) ? $actions['roles'] : null;

            if ($request->user()->hasAnyRole($roles) || !$roles) {
                return $next($request);
            }

        } else {
            return redirect('/login');
        }
        return $next($request);
    }
}
