<?php

namespace App\Providers;

use App\Services\EmailService;
use App\Services\WordDocumentService;
use Illuminate\Support\ServiceProvider;

class MailerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(EmailService::class, fn() => new EmailService(new WordDocumentService, config('mailers')));
    }
}
