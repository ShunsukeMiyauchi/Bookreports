<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Book;
use DateTime;
use DateTimeZone;

class Kernel extends ConsoleKernel
{
    
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      $schedule->command('command:notify')->everyMinute()->when(function () {
      $now = new DateTime('now');
      $now->setTimezone(new DateTimeZone('Asia/Tokyo')); 
      
      $futureDate = $now->modify('+2 days');
      $book=Book::whereDate('return_at','<=', $futureDate)->first();
      
        if (is_null($book))
        {
            return false;
        }else{
            return true;
        }
        
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
