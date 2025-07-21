<?php



namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

class task
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
      if (!session()->has('role') || session('role') !== 'admin') {
    return redirect()->route('userlog');
}

        return $next($request);
    }
}

