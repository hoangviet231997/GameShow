<?php

namespace Modules\NewGameShow\Http\Middleware;

use App\Http\Controllers\BaseController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckUser extends BaseController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() && Auth::user() )
            return $this->responseSuccess(Auth::user(),'Successfully');
        else
            return $this->responseBadRequest('You have to login');
        return $next($request);
    }
}
