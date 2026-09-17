<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicEventController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('q');
        $status = $request->input('status', 'upcoming');

        $query = Event::search($search);

        if ($status === 'upcoming') {
            $query->upcoming();
        } elseif ($status === 'ongoing') {
            $query->ongoing();
        } elseif ($status === 'finished') {
            $query->finished();
        } else {
            $query->orderBy('event_date', 'desc');
        }

        $events = $query->paginate(9)->withQueryString();

        $counts = [
            'all' => Event::count(),
            'upcoming' => Event::where('status', 'upcoming')->whereDate('event_date', '>=', now()->toDateString())->count(),
            'ongoing' => Event::where('status', 'ongoing')->count(),
            'finished' => Event::where('status', 'finished')->orWhereDate('event_date', '<', now()->toDateString())->count(),
        ];

        return view('pages.events.index', compact('events', 'search', 'status', 'counts'));
    }

    public function show(Event $event): View
    {
        $upcomingEvents = Event::upcoming()
            ->where('id', '!=', $event->id)
            ->take(3)
            ->get();

        return view('pages.events.show', compact('event', 'upcomingEvents'));
    }
}
