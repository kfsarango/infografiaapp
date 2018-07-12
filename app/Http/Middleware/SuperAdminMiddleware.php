<?php

namespace InstaInfo\Http\Middleware;

use Closure;

class SuperAdminMiddleware
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
        if ($request->user()->tipousuario !=2) {
            return redirect('/useradmin/admin');
        }

        return $next($request);
    }
}
