<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
//        dd(auth()->user());
            if (auth()->user() && auth()->user()->role == 1) {
                return $next($request);

//                abort(403, 'Unauthorized action.');
            }
            return redirect('login');


        }
    }



