<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Test
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
            if(Auth::user()->usertype=='Admin'){
                dd('php is boss');
            }elseif (Auth::user()->usertype=='User'){
                dd('Java is boss');
            }
            return $next($request);
        }
        else{
            return redirect('/login');
//            return redirect()->back();
        }
//        return $next($request);
    }
}
