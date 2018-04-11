<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\categories;
use App\posts;
use App\tag;
use App\subcategories;
use App\modules;
use App\chatlog;
use App\web_settings;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);

         // share date with header
        View::composer('*',function($view)
        {
            $view->with('allcategories',categories::where('status','>',0)->get());
            $view->with('RecentPosts',posts::orderBy('created_at','desc')->where('status', '=', 2)->skip(3)->take(3)->get());
            $view->with('LatestPost',posts::orderBy('created_at','desc')->where('status', '=', 2)->take(3)->get());
            $view->with('TopViewPost',posts::where('views','>',0)->where('status', '=', 2)->orderBy('views','desc')->take(3)->get());
            $view->with('TimelinePost',posts::where('status', '=', 2)->take(7));
            $view->with('getTag',tag::all()->take(10));
            $view->with('LatestPost',posts::orderBy('created_at','desc')->where('status', '=', 2)->take(3)->get());
            $view->with('web_settings',web_settings::all());
            $view->with('kiemduyet',posts::where('status',0)->count());

     
        });

        View::composer('*',function($view)
        {
            if (isset(Auth::user()->id)!=null) {
              
            $view->with('countchat1',chatlog::all()->count());
            $view->with('datachat1',chatlog::where('user_id','!=',Auth::user()->id)->orderBy('id','desc')->limit(5)->get());
            $view->with('countchat2',chatlog::where('from_user_id',Auth::user()->id)->count());
            $view->with('datachat2',chatlog::where('from_user_id',Auth::user()->id)->orderBy('id','desc')->get());

        }
     
        });



    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
