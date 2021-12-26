<?php

namespace App\Providers;

use App\UseCases\Contracts\Schools\StoreSchoolsUseCaseInterface;
use App\UseCases\Contracts\Teachers\ChangeStatusTeachersUseCaseInterface;
use App\UseCases\Contracts\Teachers\DeleteTeachersUseCaseInterface;
use App\UseCases\Contracts\Teachers\StoreTeachersUseCaseInterface;
use App\UseCases\Contracts\Teachers\UpdateTeachersUseCaseInterface;
use App\UseCases\Schools\StoreSchoolsUseCase;
use App\UseCases\Teachers\ChangeStatusTeachersUseCase;
use App\UseCases\Teachers\DeleteTeachersUseCase;
use App\UseCases\Teachers\StoreTeachersUseCase;
use App\UseCases\Teachers\UpdateTeachersUseCase;
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
        StoreTeachersUseCaseInterface::class => StoreTeachersUseCase::class,
        ChangeStatusTeachersUseCaseInterface::class => ChangeStatusTeachersUseCase::class,
        UpdateTeachersUseCaseInterface::class => UpdateTeachersUseCase::class,
        DeleteTeachersUseCaseInterface::class => DeleteTeachersUseCase::class
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
