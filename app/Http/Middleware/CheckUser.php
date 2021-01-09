<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckUser
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
        if(!Session::has('user_id')){
            Session::flash('login_error','You have to auth');
            return redirect('/');
        }
        return $next($request);
    }
}
