<?php

namespace App\Providers;

use App\Models\Subscription;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('guest.layouts.layout', function ($view) {
            $view->with("subs", Subscription::with("courses")->where("active", "=", 1)->orderBy("created_at", "Desc")->get());
        });
    }
}
