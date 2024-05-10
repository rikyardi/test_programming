<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role == "Pengguna") {
            return redirect('dashboard');
        }
        if (Auth::user()->role == "Admin") {
            return $next($request);
        }
        if (Auth::user()->role == "Approval") {
            return redirect('/approval');           
        }
    }
}
