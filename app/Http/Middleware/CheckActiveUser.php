<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckActiveUser
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
        if (Auth::user()->status == 0) {
            Auth::logout();
            return redirect(route('login'))->with('msg','Tài khoản của bạn chưa được kich hoạt');
        }elseif (Auth::user()->status==2) {
            Auth::logout();
            return redirect(route('login'))->with('msg','Tài khoản của bạn đã bị khóa vui lòng liên hệ quản trị viên để mở khóa');
        }else{
      
            return $next($request);

        }

    }
}
