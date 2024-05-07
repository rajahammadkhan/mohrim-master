<?php

namespace App\Http\Middleware;
use App\Helpers\Qs;
use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use function PHPUnit\Framework\isEmpty;

class AdminRoutes
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
        if (!Qs::userIsAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
