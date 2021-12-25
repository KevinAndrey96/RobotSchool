<?php

namespace App\Providers;

use App\UseCases\Contracts\Schools\StoreSchoolsUseCaseInterface;
use App\UseCases\Contracts\Teachers\StoreTeachersUseCaseInterface;
use App\UseCases\Schools\StoreSchoolsUseCase;
use App\UseCases\Teachers\StoreTeachersUseCase;
use Illuminate\Support\ServiceProvider;

class UseCasesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    protected $classes = [
        StoreSchoolsUseCaseInterface::class => StoreSchoolsUseCase::class,
        StoreTeachersUseCaseInterface::class => StoreTeachersUseCase::class
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
