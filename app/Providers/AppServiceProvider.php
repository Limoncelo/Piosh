<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if(!$this->app->runningInConsole())
        {
            $projects = DB::table('articles')
                ->where('category_id', 1)
                ->latest()
                ->limit(5)
                ->get();

            $menu = DB::table('articles')->where('category_id', 4)->get();
            View::share('projects', $projects);
            View::share('menu', $menu);

            $mentions_legales = DB::table('articles')
                ->where('id', 9)
                ->first();

            View::share('mentions_legales', $mentions_legales);
        }
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
