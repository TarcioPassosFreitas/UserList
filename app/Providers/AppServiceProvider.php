<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Application\Services\UserService;
use App\Domain\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}