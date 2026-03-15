<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Repositories\Interfaces\LikeRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\LikeRepository;
use App\Repositories\PostRepository;
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
        $this->app->bind(
            AuthRepositoryInterface::class,
            AuthRepository::class,
        );

        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class,
        );

        $this->app->bind(
            LikeRepositoryInterface::class,
            LikeRepository::class,
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
