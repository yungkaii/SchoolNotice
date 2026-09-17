<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\Event;
use App\Models\News;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'announcements_total' => Announcement::count(),
            'announcements_published' => Announcement::where('status', 'published')->count(),
            'events_total' => Event::count(),
            'events_upcoming' => Event::where('status', 'upcoming')->count(),
            'news_total' => News::count(),
            'achievements_total' => Achievement::count(),
            'categories_total' => Category::count(),
            'admins_total' => User::count(),
        ];

        $recentAnnouncements = Announcement::with('category')
            ->latest()
            ->take(5)
            ->get();

        $upcomingEvents = Event::upcoming()
            ->take(4)
            ->get();

        $recentNews = News::with('category', 'author')
            ->latest()
            ->take(4)
            ->get();

        $recentAchievements = Achievement::latest('achievement_date')
            ->take(4)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentAnnouncements', 'upcomingEvents', 'recentNews', 'recentAchievements'));
    }
}
