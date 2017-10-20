<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Access;

class CheckPermission
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $permission = null)
    {
        $access = new Access();
        if ($access->can($permission)) {
             return $next($request);
        }
        return $request->ajax ? response('Unauthorized.', 401) : redirect('/login');
    }
}
