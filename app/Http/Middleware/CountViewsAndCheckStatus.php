<?php

namespace App\Http\Middleware;

use Closure;
use App\posts;
class CountViewsAndCheckStatus
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
      if (count($request->segments())==3) {
       $url=$request->segment(3);
       $post=posts::where('slug',$url)->first();
       $post2=posts::where('slug',$url)->where('status',2)->first();
       if (empty($post2)) {
         return abort(404);
       }else{
        $post->views=$post->views+1;
        $post->update();
      }
      
    }
    return $next($request);
  }
}
