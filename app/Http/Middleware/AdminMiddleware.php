<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah user sudah login DAN apakah dia admin
        if (auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }

        // Jika bukan admin, lempar ke 404 (seolah-olah halaman tidak ada)
        abort(404);
    }
}
