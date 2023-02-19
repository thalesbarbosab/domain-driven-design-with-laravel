<?php

namespace App\Infrastructure\Laravel\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         /**
         * Register Custom Migrations Path
         */
        $this->loadMigrationsFrom(base_path('src/Infrastructure/Laravel/database/migrations'));

        /**
         * Register Custom Lang Path
         */
        App::useLangPath(base_path('src/Domain/Shared/Lang'));
    }
}
