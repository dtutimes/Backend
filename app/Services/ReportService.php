<?php

namespace App\Services;

use Carbon\Carbon;
use App\Mail\DailyReportMail;
use App\User;
use App\Models\Story;


class ReportService 
{

    public function sendDailyReport()
    {
        $council = $this->getUsersWithRole('council');
        $stats =  $this->getDailyStats();

        foreach ($council as $user) {
            \Mail::to($user->email)->send(new DailyReportMail($stats)); 
        }
    }

    public function sendWeeklyReport()
    {
        $council = $this->getUsersWithRole('council');
        $stats = $this->getWeeklyStats();

        foreach ($council as $user) {
            \Mail::to($user->email)->send(new DailyReportMail($stats)); 
        }
    }

    public function getDailyStats()
    {        
        return [ 
            'drafts' => $this->storyWithStatusAndDate('draft', Carbon::now()), 
            'pendings' => $this->storyWithStatusAndDate('pending', Carbon::now()), 
            'published' => $this->storyWithStatusAndDate('published', Carbon::now()), 
        ];
    }

    public function getWeeklyStats()
    {
        $from = Carbon::now()->subWeek();

        return [
            'drafts' => $this->storyWithStatusInLastWeek('draft', $from), 
            'pendings' => $this->storyWithStatusInLastWeek('pending', $from), 
            'published' => $this->storyWithStatusInLastWeek('published', $from), 
        ];
    }

    public function storyWithStatusAndDate($status, $date)
    {
        return Story::whereDate('created_at', $date)->where('status', $status)->with('user')->get();
    }

    public function storyWithStatusInLastWeek($status, $week)
    {
        return Story::where('created_at', '>=', $week)->where('status', $status)->with('user')->get();
    }

    public function getUsersWithRole($role)
    {
        return User::with('roles')->where('name', $role)->get();
    }
}