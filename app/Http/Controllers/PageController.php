<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReportService;

class PageController extends Controller
{

    public function __construct(ReportService $report)
    {
        $this->report = $report;
    }


    public function test ()
    {
        return 'test';
    }
}
