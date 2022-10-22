<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\emailController;

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


        // Production   
        $schedule->call(function () {
            $email_controller = new emailController;
           $email_controller->dailyEmail();
        })->name('daily email notification')->everyFiveMinutes();

      


        $schedule->call(function () {
            $email_controller = new emailController;
           $email_controller->lecturerEmail();
        })->name('lecturer email')->dailyAt('09:00');



        $schedule->call(function () {
            $email_controller = new emailController;
           $email_controller->powerschoolsubmit();
        })->name('powerschool email')->dailyAt('10:00');


        // Demo purpose

        // $schedule->call(function () {
        //     $email_controller = new emailController;
        //    $email_controller->dailyEmail();
        // })->name('daily email notification')->everyMinute();

        //   $schedule->call(function () {
        //     $email_controller = new emailController;
        //    $email_controller->lecturerEmail();
        // })->name('lecturer email')->everyMinute();

        // $schedule->call(function () {
        //     $email_controller = new emailController;
        //    $email_controller->powerschoolsubmit();
        // })->name('powerschool email')->everyMinute();



        
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
