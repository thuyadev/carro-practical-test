<?php

namespace App\Providers;

use App\Repositories\ContactUser\ContactUserRepository;
use App\Repositories\ContactUser\ContactUserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ContactUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ContactUserRepositoryInterface::class, ContactUserRepository::class);
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
