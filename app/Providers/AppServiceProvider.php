<?php

namespace App\Providers;

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
        $this->app->bind('App\Services\Interfaces\BankTransactionInterface', 'App\Services\BankTransactionService');
        $this->app->bind('App\Services\Interfaces\CurrentAccountInterface', function ($app) {
            return new \App\Services\CurrentAccountService($app->make('App\Services\Interfaces\BankTransactionInterface'));
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
