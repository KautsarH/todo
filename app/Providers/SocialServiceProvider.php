<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //dd("hello");
        $this->app->singleton(Twitter::class, function(){
            return new Twitter('api-key');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->app->singleton(twitter::class,function(){
        //     return new Twitter('api-key');
        // });
    }
}
