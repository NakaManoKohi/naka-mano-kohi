<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Benefit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $benefit)
    {
        if(str_contains($benefit, '||')) {
            $benefit = explode('||', $benefit);
            if(in_array(auth()->user()->benefit, $benefit)) {
                return $next($request);
            }
        } else {
            if(auth()->user()->benefit === $benefit) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
