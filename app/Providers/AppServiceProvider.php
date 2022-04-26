<?php

namespace App\Providers;

use App\Repositories\Eloquent\{
    AdminRepository,
    CourseRepository,
    LessonRepository,
    ModuleRepository,
    SupportRepository,
    UserRepository
};
use App\Repositories\{
    AdminRepositoryInterface,
    CourseRepositoryInterface,
    LessonRepositoryInterface,
    ModuleRepositoryInterface,
    SupportRepositoryInterface,
    UserRepositoryInterface
};
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
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->singleton(
            AdminRepositoryInterface::class,
            AdminRepository::class,
        );

        $this->app->singleton(
            CourseRepositoryInterface::class,
            CourseRepository::class,
        );

        $this->app->singleton(
            ModuleRepositoryInterface::class,
            ModuleRepository::class,
        );

        $this->app->singleton(
            LessonRepositoryInterface::class,
            LessonRepository::class,
        );

        $this->app->singleton(
            SupportRepositoryInterface::class,
            SupportRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
