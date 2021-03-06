<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;
use Route;

class CheckForAdmin
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
        if(Auth::check() && Auth::user()->hasRole('Admin') || Route::currentRouteName() == "admin.dashboard")
        {
            return $next($request);
        }
        return redirect(route('home.index'));
        
    }
}
