<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Facades\Gate; 
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Gate::define('user-only',function(User $user){
            return $user->type=='Writer';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Paginator::useBootstrapFive();
        Paginator::useBootstrap();

        //to use data share in all app.
        $setting = Setting::first();
        View::share("setting", $setting);

        // to switch between lang
        $locale = App::getLocale();
        View::share("locale", $locale);        

    }
}
