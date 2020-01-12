<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Analytics;
use App\Models\Story;
use Spatie\Analytics\Period;

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
        $schedule->call('\App\Services\ReportService@sendDailyReport')->dailyAt('20:15');
        $schedule->call('\App\Services\ReportService@sendWeeklyReport')->mondays()->at('00:00');
        $schedule->call(function () {
            $analytics = Analytics::fetchMostVisitedPages(Period::days(7));
            foreach ($analytics as $item) {
                $url = $item["url"];
                if (preg_match('#^/blog/#', $url) === 1) {
                    $slug = preg_replace('#^/blog/#', "", $url);
                    $story = Story::where('slug', $slug)->firstOrFail();
                    $story->update(['views' => $item['pageViews']]);
                }
            }
        })->daily();
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
