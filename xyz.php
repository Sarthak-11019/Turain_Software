<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventBackHistory
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
    }
}



Route::group(['middleware' => ['admin.auth', 'preventBackHistory']], function () {



    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }