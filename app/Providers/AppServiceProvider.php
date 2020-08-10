<?php

namespace App\Providers;

use App\Repository\Organizations\OrganizationRepository;
use App\Repository\Organizations\OrganizationRepositoryInterface;
use App\Repository\Users\UserRepositoryInterface;
use App\Repository\Users\UserRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Bind the Organziation interface
        $this->app->bind(
            OrganizationRepositoryInterface::class, 
            OrganizationRepository::class
        );

        //Bind the user interface
        $this->app->bind(
            UserRepositoryInterface::class, 
            UserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
