<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
/**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @param  string|null  $role
 * @return mixed
 */

{
    public function handle(Request $request, Closure $next, $type = null)
    {
        switch ($type) {
            case 'user':
                // Periksa apakah pengguna terautentikasi dan memiliki peran 'user'
                if (Auth::check() && Auth::user()->role === 'user') {
                    return $next($request);
                }
                break;

            case 'admin':
                // Periksa apakah pengguna terautentikasi dan memiliki peran 'admin' atau 'sadmin'
                if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'sadmin')) {
                    return $next($request);
                }
                break;

            case 'role':
                // Gunakan ini untuk peran yang disesuaikan sesuai kebutuhan aplikasi Anda
                // Misalnya, jika Anda memiliki peran 'editor', 'moderator', dsb.
                if (Auth::check() && Auth::user()->role === 'role_yang_diizinkan') {
                    return $next($request);
                }
                break;

            default:
                // Periksa apakah pengguna terautentikasi tanpa memerlukan peran khusus
                if (Auth::check()) {
                    return $next($request);
                }
                break;
        }

        // Jika tidak memenuhi syarat, arahkan kembali dengan pesan kesalahan
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}
