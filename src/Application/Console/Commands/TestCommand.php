<?php

namespace App\Application\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description test';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $message = 'Command test was runned';
        Log::debug($message);
        $this->info($message);
    }
}
