<?php

namespace App\View\Components;

use App\Models\News;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class NewsTicker extends Component
{
    /**
     * @var Collection<int, News>
     */
    public Collection $tickerNews;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        try {
            $this->tickerNews = News::with('category')
                ->published()
                ->latest('published_at')
                ->take(8)
                ->get();
        } catch (\Throwable) {
            $this->tickerNews = collect();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news-ticker');
    }
}
