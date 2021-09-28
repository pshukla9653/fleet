<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		\Illuminate\Support\Facades\Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        /**
         * TODO:: To be checked if there is a better way
         * This is forcing application to use cloudfront cdn as application url instead of origin itself
         * Also forcing application to use https
         */
        if (env('APP_ENV') !== 'local') {
            \Illuminate\Support\Facades\URL::forceRootUrl(config('app.url'));
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
