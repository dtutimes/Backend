<?php

namespace App\Http\Middleware;

use Closure;

class CheckAlbum
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
        $album = \App\Models\Album::whereUuid($request->route('uuid'))->firstOrFail();
        if($album) return $next($request);
    }
}
