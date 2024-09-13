<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard=='admin'){
                    return to_route('dashboard.home');
                }else{
                    return to_route('home');
                }
            }
        }

        return $next($request);
    }


//    public function handle(Request $request, Closure $next): Response
//    {
//        $guard = Config::get('fortify.guard');
//
//        if ($guard==='admin' && Auth::guard('admin')->check()) {
//            return redirect()->route('dashboard.home');
//        }
//        elseif ($guard==='web' && Auth::guard('web')->check()) {
//            return redirect(RouteServiceProvider::HOME);
//        }
//        else return $next($request);
//    }
}
