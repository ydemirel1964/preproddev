<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class urlControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(config('app.env') == 'production'){
            $host = $request->header('host');
            if (substr($host, 0, 4) != 'www.') {
                if(!$request->secure()){
                    $request->server->set('HTTPS', true);
                }
                $request->headers->set('host', 'www.'.$host);
                return Redirect::to($request->path(),301);
            }else{
                if(!$request->secure()){
                    $request->server->set('HTTPS', true);
                    return Redirect::to($request->path(),301);
                }
            }
        }
        return $next($request);
    }
}
