<?php

namespace App\Application\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Application\Console\Commands\TestCommand;
use App\Application\Console\Commands\ArticleCreateCommand;
use App\Application\Console\Commands\ArticleCreateCommandV2;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        TestCommand::class,
        ArticleCreateCommand::class,
        ArticleCreateCommandV2::class
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('src/Application/Console/console.php');
    }
}
