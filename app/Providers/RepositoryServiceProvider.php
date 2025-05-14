<?php

namespace App\Providers;

use App\Repositories\Contracts\Role\IRoleRepository;
use App\Repositories\Contracts\User\IAdminRepository;
use App\Repositories\Contracts\User\IUserRepository;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\AdminRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );

        $this->app->bind(
            IAdminRepository::class,
            AdminRepository::class
        );

        $this->app->bind(
            abstract: IRoleRepository::class,
            concrete: RoleRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
