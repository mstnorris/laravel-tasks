<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TaskRepository;
use App\Repositories\EloquentTaskRepository;
use App\Repositories\EloquentUserRepository;
use App\Repositories\UserRepository;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TaskRepository::class, function () {
            return new EloquentTaskRepository;
        });

        $this->app->singleton(UserRepository::class, function () {
            return new EloquentUserRepository;
        });
    }
}
