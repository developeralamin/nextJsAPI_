<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       app()->bind('serviceProvider',function(){
        return new \App\Repositories\Calculate;
       });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
