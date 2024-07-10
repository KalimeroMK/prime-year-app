<?php

namespace App\Providers;

use App\Interface\YearRepositoryInterface;
use App\Repositories\YearRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(YearRepositoryInterface::class, YearRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}