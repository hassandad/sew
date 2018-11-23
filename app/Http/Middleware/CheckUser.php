<?php

namespace App\Http\Middleware;

use Closure;


class CheckUser
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
        if(session()->has('login')):
            if(session('login')):
                session(['showUser' => true]);
            else:
                session(['showUser' => false]);
                endif;
        else:
            session(['showUser' => false]);
            endif;

        return $next($request);
    }
}
