<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $level)
    {
        if(str_contains($level, '||')) {
            $level = explode('||', $level);
            if(in_array(auth()->user()->level, $level)) {
                return $next($request);
            }
        } else {
            if(auth()->user()->level === $level) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
