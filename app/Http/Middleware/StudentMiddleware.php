<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
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
        if(Auth::user()->role_id == 1)
            return $next($request);
<<<<<<< HEAD
        return redirect('/you-are-not-student');
=======
        return redirect('/notstudent');
>>>>>>> 0a6d2a7c3e5967de5dbe37712bb912fe2be31244
    }
}
