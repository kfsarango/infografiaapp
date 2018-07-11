<?php

namespace InstaInfo\Http\Middleware;

use Closure;

class UserAdminMiddleware
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
        if ($request->user()->tipousuario != 1) {
            return redirect('/superadmin/super');
        }
        return $next($request);
    }
}
