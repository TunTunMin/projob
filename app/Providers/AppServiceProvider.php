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
        view()->composer(['frontend.profile.index', 'frontend.profile.info', 'frontend.profile.about', 'frontend.profile.experience.index', 'frontend.profile.education', 'frontend.profile.sidebar', 'frontend.profile.skill', 'frontend.profile.language'], ProfileComposer::class);
        Schema::defaultStringLength(191);
    }
}
