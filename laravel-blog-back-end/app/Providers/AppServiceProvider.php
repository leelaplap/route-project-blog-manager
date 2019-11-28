<?php

namespace App\Providers;

use App\Repositories\BlogRepositoryInterface;
use App\Repositories\Eloquent\BlogEloquentRepository;
use App\Services\BlogServiceInterface;
use App\Services\Impl\BlogImplService;
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
        $this->app->singleton(BlogServiceInterface::class, BlogImplService::class);
        $this->app->singleton(BlogRepositoryInterface::class, BlogEloquentRepository::class);
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
