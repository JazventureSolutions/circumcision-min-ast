<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule)
    {
       // $schedule->command('database:backup')->everyMinute();

        $schedule->command('queue:work --stop-when-empty --tries=3 --max-time=50')
            ->everyMinute()
            ->withoutOverlapping();

        $schedule->call(function () {
            $stuckJobs = DB::table('jobs')
                ->where('created_at', '<', now()->subMinutes(3))
                ->count();

            if ($stuckJobs > 0) {
                $adminEmail = config('mail.admin_address') ?: env('MAIL_ADMIN_ADDRESS', 'admin@circumcisionclinic.net');

                try {
                    Mail::raw(
                        "Queue worker may be stopped.\n\nStuck jobs: {$stuckJobs}\n\nPlease login to the server and run: php artisan queue:work",
                        function ($message) use ($adminEmail) {
                            $message->to($adminEmail)
                                ->subject('[ALERT] Queue Worker Down - ' . config('app.name'));
                        }
                    );
                } catch (\Throwable $e) {
                    Log::error('Queue alert email failed: ' . $e->getMessage());
                }
            }
        })->everyFiveMinutes();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
