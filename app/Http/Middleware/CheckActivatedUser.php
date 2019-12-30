<?php

namespace App\Http\Middleware;

use Closure;
use Log;
class CheckActivatedUser
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

        if($request->user()->activated) {
            return $next($request);
        }
        else {
            return redirect()->route('me.info', $request->user()->uuid);
        }
    }
}
