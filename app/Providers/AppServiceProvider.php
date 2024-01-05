<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\ProyekService;
use App\Services\KontraktorService;
use App\Repositories\UserRepository;
use App\Repositories\ProyekRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\KontraktorRepository;
use App\Services\Contracts\AuthServiceInterface;
use App\Services\Contracts\ProyekServiceInterface;
use App\Services\Contracts\KontraktorServiceInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\ProyekRepositoryInterface;
use App\Repositories\Contracts\KontraktorRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(KontraktorRepositoryInterface::class, KontraktorRepository::class);
        $this->app->bind(KontraktorServiceInterface::class, KontraktorService::class);
        $this->app->bind(ProyekRepositoryInterface::class, ProyekRepository::class);
        $this->app->bind(ProyekServiceInterface::class, ProyekService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
