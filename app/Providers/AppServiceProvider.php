<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        \App\Models\TabSubject::observe(\App\Observers\TabSubjectObserver::class);
        \App\Models\Award::observe(\App\Observers\AwardObserver::class);
        \App\Models\AwardSeason::observe(\App\Observers\AwardSeasonObserver::class);
        \App\Models\Winner::observe(\App\Observers\WinnerObserver::class);
    }
}
