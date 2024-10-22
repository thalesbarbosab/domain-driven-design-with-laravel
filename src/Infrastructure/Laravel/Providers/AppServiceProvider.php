<?php

namespace App\Infrastructure\Laravel\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerClasses();
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

    protected function registerClasses()
    {
        $interfaces_and_classes = [
           \App\Domain\Article\Repositories\ArticleRepository::class => \App\Infrastructure\Laravel\Repositories\ArticleEloquentRepository::class,
        //    \App\Domain\Article\Repositories\ArticleRepository::class => \App\Infrastructure\Laravel\Repositories\ArticleDbRepository::class,
        ];
        if(!isset($interfaces_and_classes) || !is_array($interfaces_and_classes)){
            throw new InvalidArgumentException('Invalid array interfaces_and_classes');
        }
        foreach ( $interfaces_and_classes as $interface => $class) {
            $this->app->bind($interface, function ($app) use ($class) {
                return new $class;
            });
        }
    }
}
