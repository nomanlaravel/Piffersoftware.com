<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{


    protected $commands = [
        \App\Console\Commands\SendArmourerReminders::class,
        \App\Console\Commands\SendInspectionFollowupReminder::class,

    ];

    /**
     * Define the application's command schedule.
     */
protected function schedule(Schedule $schedule): void
{
    $schedule->command('inspire')->everyThreeMinutes()->withoutOverlapping();
    $schedule->command('send:contract-reminders')->everyMinute()->withoutOverlapping();
    $schedule->command('send:armourer-reminders')->everyTwoMinutes()->withoutOverlapping();
    $schedule->command('send:meeting-reminders')->everyFourMinutes()->withoutOverlapping();
    $schedule->command('send:cnic-reminders')->cron('*/5 * * * *')->withoutOverlapping();
    $schedule->command('send:validity-reminders')->cron('*/6 * * * *')->withoutOverlapping();
}




    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {

        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
