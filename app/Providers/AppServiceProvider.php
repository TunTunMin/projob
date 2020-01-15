<?php

namespace App\Providers;

use App\Http\ViewComposers\ProfileComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('components.flashMessage', 'flashMessage');
        view()->composer(['frontend.profile.index'], ProfileComposer::class);
        Schema::defaultStringLength(191);
    }
}
