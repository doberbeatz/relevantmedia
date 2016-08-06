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
        if (app('App\RelevantMedia\Contracts\Captcha')->checkCaptcha($request->get('captcha'))) {
            return $next($request);
        }

        $validator = \Validator::make($request->all(), ['captcha'=>'required']);
        $validator->errors()->add('captcha', 'Wrong captcha!');

        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }
}
