<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicNewsController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('q');
        $categoryId = $request->input('category');

        $query = News::with('category', 'author')
            ->published()
            ->search($search)
            ->category($categoryId);

        // If not searching or filtering, pick 1 featured article for header hero
        $featured = null;
        if (! $search && ! $categoryId) {
            $featured = (clone $query)->first();
            if ($featured) {
                $query->where('id', '!=', $featured->id);
            }
        }

        $news = $query->paginate(9)->withQueryString();
        $categories = Category::has('news')->get();

        return view('pages.news.index', compact('news', 'featured', 'categories', 'search', 'categoryId'));
    }

    public function show(News $news): View
    {
        $news->load('category', 'author');

        $relatedNews = News::published()
            ->where('category_id', $news->category_id)
            ->where('id', '!=', $news->id)
            ->take(3)
            ->get();

        $recentNews = News::published()
            ->where('id', '!=', $news->id)
            ->take(4)
            ->get();

        return view('pages.news.show', compact('news', 'relatedNews', 'recentNews'));
    }
}
