<?php

namespace App\Providers;

use App\iVet\Interfaces\FrontendRepositoryInterface;
use App\iVet\Repositories\FrontendRepository;
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
        $this->app->bind(FrontendRepositoryInterface::class, function () {

            return new FrontendRepository;
        });
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
