<?php

namespace App\Providers;

use App\Repositories\Contracts\Schools\SchoolRepositoryInterface;
use App\Repositories\Schools\SchoolRepository;
use App\UseCases\Contracts\Schools\StoreSchoolsUseCaseInterface;
use App\UseCases\Schools\StoreSchoolsUseCase;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    protected $classes = [
        SchoolRepositoryInterface::class => SchoolRepository::class
    ];

    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
