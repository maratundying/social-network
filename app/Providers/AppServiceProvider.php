<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\user_model;
use App\friends_requests;
use Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.profilelayout', function ($view) {
            $view->with('user_data',user_model::where('id',Session::get('user_id'))->first());
        });

        View::composer('layouts.profilelayout', function ($view) {
            $view->with('notifications',friends_requests::where('user2_id',Session::get('user_id'))->limit(5)->get());
        });
    }
}
