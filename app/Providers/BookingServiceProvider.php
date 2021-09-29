<?php

namespace App\Providers;

use App\Services\BookingService;
use App\Services\EmailService;
use App\Services\EmailTemplateService;
use Illuminate\Support\ServiceProvider;

class BookingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(BookingService::class, function (EmailService $emailService) {
            return new BookingService($emailService);
        });

        $this->app->singleton(EmailTemplateService::class, function () {
            return new EmailTemplateService();
        });
    }
}
