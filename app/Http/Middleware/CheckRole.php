<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $isAdmin user table 中儲存使用者角色的欄位名稱
     * @return mixed
     */
    public function handle($request, Closure $next, $isAdmin)
    {
        // 未登入或非 admin 導回首頁
        if (\Auth::check() == false || \Auth::user()->$isAdmin != true)
        {
            return redirect('/');
        }

        return $next($request);
    }
}
