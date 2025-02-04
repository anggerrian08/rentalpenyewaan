<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BookingUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:booking-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        return $this->info('Oke');
    }
}
