<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\TokenManagerInterface;
use App\Services\JWTTokenManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TokenManagerInterface::class, JWTTokenManager::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
