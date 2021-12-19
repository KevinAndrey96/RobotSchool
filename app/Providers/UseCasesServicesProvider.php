<?php

namespace App\Providers;

use App\UseCases\Contracts\Schools\StoreSchoolsUseCaseInterface;
use App\UseCases\Schools\StoreSchoolsUseCase;
use Illuminate\Support\ServiceProvider;

class UseCasesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    protected $classes = [
        StoreSchoolsUseCaseInterface::class => StoreSchoolsUseCase::class
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
