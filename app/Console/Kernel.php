<?php

namespace App\Console;

use App\Jobs\SendNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DateTime;
use Illuminate\Support\Facades\Cache;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('ema:get-schedule')->daily();
        // $schedule->command('ema:get-schedule');
        $data = Cache::get('ema:schedule');
        // $value = [
        //     "id" => 134,
        //     "account_id" => 34,
        //     "date" => "2021-11-12",
        //     "popup_time" => "2021-11-12 21:30:00",
        //     "postponded_1" => 0,
        //     "postponded_2" => 0,
        // ];
        // $schedule->job(new SendNotification($value))->everyMinute();
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $time = date_format(new DateTime($value["popup_time"]), 'H:i');
                $schedule->job(new SendNotification($value))->daily()->at($time);
                // $schedule->job(new SendNotification($value))->everyMinute();
            }
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
