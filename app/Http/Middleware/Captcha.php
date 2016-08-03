<?php

namespace App\Http\Middleware;

use Closure;

class Captcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (app('App\RelevantMedia\Contracts\Captcha')->checkCaptcha()) {
            return $next($request);
        }

        return redirect()->back()->withInput();
    }
}
