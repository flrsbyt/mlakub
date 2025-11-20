<?php

namespace App\Console\Commands;

use App\Jobs\WeatherNotificationJob;
use Illuminate\Console\Command;

class WeatherNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update weather notifications for all admin users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating weather notifications...');
        
        // Dispatch job untuk update cuaca
        WeatherNotificationJob::dispatch();
        
        $this->info('Weather notification job dispatched successfully!');
        
        return 0;
    }
}
