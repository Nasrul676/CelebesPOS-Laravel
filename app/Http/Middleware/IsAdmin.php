<?php

namespace App\Http\Middleware;
use App\Http\Controllers\ErrorCoontroller;

use Closure;

class IsAdmin
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
        if(auth()->user()->is_admin == 'admin'){

            return $next($request);
        }
        return redirect()->route('eror');
    }
}
