<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class CheckAge http request 需帶有 "age" 參數，且大於21 才能通過
 * @package App\Http\Middleware
 */
class CheckAge
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
        if ($request->age <= 21)
        {
            return redirect('/');
        }

        return $next($request);
    }
}
