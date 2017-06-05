<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;


class PerfilMiddleware
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





        if ($p==1) {

          if ($request->is('/')) {
                        return redirect('/oficialia/captura');
            
          }

          if ($request->is('oficialia/*')) {
            return $next($request);    
          }

          else{
            return redirect()->guest('/');
          }

        }


        if ($p==2) {

          if ($request->is('/')) {
                        return redirect('/gestion/informacion');
            
          }

          if ($request->is('gestion/*')) {
            return $next($request);    
          }

          else{
            return redirect()->guest('/'); 
          }

        }



        if ($p==3) {

          if ($request->is('/')) {
                        return redirect('/dep/informacion');
            
          }

          if ($request->is('dep/*')) {
            return $next($request);    
          }

          else{
            return redirect()->guest('/');
          }

        }

         if ($p==4) {

          if ($request->is('/')) {
                        return redirect('/da/informacion');
            
          }

          if ($request->is('da/*')) {
            return $next($request);    
          }

          else{
            return redirect()->guest('/');
          }

        }



        
           return $next($request);   

    }

}
