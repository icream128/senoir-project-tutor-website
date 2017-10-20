<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TutorMiddleware
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
        if(Auth::user()->role_id == 2)
            return $next($request);

            echo '<script>alert("คุณเป็นนักเรียน เข้าฝั่งติวเตอร์ไม่ได้");window.location = "/firstpage"</script>';
    }
}

?>