<?php

namespace App\Http\Middleware;
// use Symfony\Component\HttpFoundation\Session\Session;
use Session;
use Closure;

class SessionCheck
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
        // dd('o m here',$request);
        $path=$request->path();
        
        if (($path=="/" || $path=="register") && session()->has('login_user')) {
            // return $next($request);
            return redirect(route('carmodels.index'));
// dd('i m here');
        }
        else if(($path!="/" && !session()->has('login_user')) && ($path!="register" && !session()->has('login_user'))) {
// dd('i m here');
        
            return redirect()->route('user.login')->with('error', 'Please login first to access users page');
        }
    
        return $next($request);
    }
}
