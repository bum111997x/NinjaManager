<?php

namespace App\Providers;

use App\Http\Repositories\Eloquent\NinjaEloquentRepository;
use App\Http\Repositories\NinjaRepositoryInterface;
use App\Http\Services\Impl\NinjaService;
use App\Http\Services\NinjaServiceInterface;
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
        $this->app->singleton(NinjaServiceInterface::class, NinjaService::class);
        $this->app->singleton(NinjaRepositoryInterface::class,NinjaEloquentRepository::class);
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
