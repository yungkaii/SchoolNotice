<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\News;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $announcements = Announcement::with('category')
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $events = Event::upcoming()
            ->take(3)
            ->get();

        $news = News::with('category', 'author')
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $achievements = Achievement::latest('achievement_date')
            ->take(4)
            ->get();

        $stats = [
            'announcements' => Announcement::published()->count(),
            'events' => Event::where('status', 'upcoming')->count(),
            'news' => News::count(),
            'achievements' => Achievement::count(),
        ];

        return view('pages.home', compact('announcements', 'events', 'news', 'achievements', 'stats'));
    }
}
