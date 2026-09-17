<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicAnnouncementController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('q');
        $categoryId = $request->input('category');
        $sort = $request->input('sort', 'newest');

        $query = Announcement::with('category')
            ->published()
            ->search($search);

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($sort === 'oldest') {
            $query->oldest('published_at');
        } else {
            $query->latest('published_at');
        }

        $announcements = $query->paginate(9)->withQueryString();
        $categories = Category::has('announcements')->get();

        return view('pages.announcements.index', compact('announcements', 'categories', 'search', 'categoryId', 'sort'));
    }

    public function show(Announcement $announcement): View
    {
        $announcement->load('category');

        $recentAnnouncements = Announcement::published()
            ->where('id', '!=', $announcement->id)
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('pages.announcements.show', compact('announcement', 'recentAnnouncements'));
    }
}
