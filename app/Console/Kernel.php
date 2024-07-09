<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Book;
use Carbon\Carbon;

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
      $schedule->command('command:notify')->everyMinute()->timezone('Asia/Tokyo')->when(function () {
        $now = Carbon::now();
        $book=Book::find(8);
        $return_at = Carbon::parse($book->return_at);
        if ($return_at ->diffInMinutes($now) <= 2880)
        {
            return true;
        }else{
            return false;
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
