<?php

namespace App\Providers;

use App\Models\Business;
use App\Models\Rating;
use App\Policies\ResourcePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::policy(Rating::class, ResourcePolicy::class);
        Gate::policy(Business::class, ResourcePolicy::class);
    }
}
