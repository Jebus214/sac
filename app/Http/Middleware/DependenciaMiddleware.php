<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;


class DependenciaMiddleware
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



 
          $p=Auth::user()->permisos;
 

        if ($p==0 ) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/');
            }
        }
        else{
             if ($p==3){
                     return $next($request);
             } 
             else{
                
                if ($request->ajax() || $request->wantsJson()) {
                      return response('Unauthorized.', 401);
                 } 
                else {
                     return redirect()->guest('/');
                }
             }
        }

    }
}
