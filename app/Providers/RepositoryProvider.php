<?php

namespace App\Providers;

use App\Contracts\Repositories\CompaniesRepositoryInterface;
use App\Repositories\Companies\CompaniesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CompaniesRepositoryInterface::class, CompaniesRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
