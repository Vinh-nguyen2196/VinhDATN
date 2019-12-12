<?php

namespace App\Http\Middleware;

use Closure;

class CheckSigin
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
        if(Auth::check()){
            return redirect('/trang-chu');
            }
            else{
                return $next($request);
            }
    }
}
