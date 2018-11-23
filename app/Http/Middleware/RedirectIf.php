<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIf
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
        if($request->session()->has('login')):
        if($request->session('login')):
            return redirect('/');
        endif;
        endif;
        return $next($request);

    }
}
