<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\UserStat;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        User::created(function ($user) {
            $user->stats()->firstOrCreate([], [
                'level' => 1,
                'xp' => 0,
                'physical' => 1,
                'intellect' => 1,
                'discipline' => 1,
                'social' => 1,
                'creativity' => 1,
                'wellbeing' => 1,
            ]);
        });
    }
}
