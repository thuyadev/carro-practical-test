<?php

namespace App\Providers;

use App\Repositories\ContactForm\ContactFormRepository;
use App\Repositories\ContactForm\ContactFormRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ContactFormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ContactFormRepositoryInterface::class, ContactFormRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
