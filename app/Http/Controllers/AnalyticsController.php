<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use App\Models\Story;
use Spatie\Analytics\Period;

class AnalyticsController extends Controller
{
    public function index()
    {
        $analytics = Analytics::fetchMostVisitedPages(Period::days(31));
        $result = [];
        foreach ($analytics as $item) {
            $url = $item["url"];
            if (preg_match('#^/blog/#', $url) === 1) {
                $slug = preg_replace('#^/blog/#', "", $url);
                $story = Story::where('slug', $slug)->firstOrFail();
                $story->update(['views' => $item['pageViews']]);
                array_push($result, ['url' => $slug, 'views' => $item['pageViews']]);
            }
        }
        return view('analytics.index', ['weekViews' => $result]);
    }
}
