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
            
            echo '<script>alert("คุณเป็นติวเตอร์ เข้าฝั่งนักเรียนไม่ได้");window.location = "/firstpage"</script>';
        // return redirect('/firstpage');
    }
}
