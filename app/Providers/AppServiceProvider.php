<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Habit;
use App\Observers\HabitObserver;

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
        Habit::observe(HabitObserver::class);
        date_default_timezone_set('Asia/Yekaterinburg');
    }
}
