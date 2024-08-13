<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\role;

class CheckRole
{
    public function handle(Request $request, Closure $next, $roles)
    {
        if (!Auth::check()) {
            return redirect('/admin');
        }

        foreach ($roles as $role) {
            if (Auth::user()->role->role === $role) {
                return $next($request);
            }
        }
        if (Auth::check()) {
            return redirect('/admin/dashboard');
        }

        return redirect('/admin');
    }
}
