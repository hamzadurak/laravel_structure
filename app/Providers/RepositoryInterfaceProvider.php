<?php

namespace App\Providers;

use App\Http\Controllers\Language\Contracts\LanguageInterface;
use App\Http\Controllers\Language\Repositories\LanguageRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryInterfaceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            LanguageInterface::class,
            LanguageRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
