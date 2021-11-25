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
        $schedule->command('ema:schedule-get')->daily();
        // $schedule->command('ema:get-schedule');
        $data = Cache::get('ema:schedule');
        // $value = [
        //     "id" => 134,
        //     "account_id" => 34,
        //     "date" => "2021-11-14",
        //     "popup_time" => "2021-11-12 21:30:00",
        //     "postponded_1" => 0,
        //     "postponded_2" => 0,
        //     "postponded_3" => 0,
        // ];
        // $schedule->job(new SendNotification($value))->everyMinute();
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if ($value["nth_popup"] == 0 || $value["postponded_1"] > 0) {
                    $time = date_format(new DateTime($value["popup_time"]), 'H:i');
                    $schedule->job(new SendNotification($value))->daily()->at($time);
                }
                if (($value["postponded_2"] == null && $value["nth_popup"] == 1) || $value["postponded_2"] > 0) {
                    $time1 = date_format(new DateTime($value["popup_time1"]), 'H:i');
                    $schedule->job(new SendNotification($value))->daily()->at($time1);
                }
                if (($value["postponded_3"] == null && $value["nth_popup"] == 2) || $value["postponded_3"] > 0) {
                    $time2 = date_format(new DateTime($value["popup_time2"]), 'H:i');
                    $schedule->job(new SendNotification($value))->daily()->at($time2);
                }
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
