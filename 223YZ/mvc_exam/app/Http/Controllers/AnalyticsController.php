<?php

namespace App\Http\Controllers;

use App\Models\PageView;

class AnalyticsController extends Controller
{
    public function index()
    {
        $totalVisits = PageView::count();

        // Get count per URL using collection helper
        $urlStats = PageView::all()->groupBy('url')->map(function ($views) {
            return $views->count();
        });

        // Get recent 10 visits
        $recentViews = PageView::orderBy('created_at', 'desc')->take(10)->get();

        return view('analytics', compact('totalVisits', 'urlStats', 'recentViews'));
    }
}
