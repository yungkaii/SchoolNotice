<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminEventController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('q');
        $status = $request->input('status');

        $query = Event::search($search);

        if ($status) {
            $query->where('status', $status);
        }

        $events = $query->latest('event_date')->paginate(10)->withQueryString();

        return view('admin.events.index', compact('events', 'search', 'status'));
    }

    public function create(): View
    {
        return view('admin.events.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'event_date' => ['required', 'date'],
            'start_time' => ['required'],
            'end_time' => ['nullable'],
            'location' => ['required', 'string', 'max:255'],
            'person_in_charge' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:upcoming,ongoing,finished'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:3072'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);

        Event::create($validated);

        return redirect()->route('admin.event.index')
            ->with('success', 'Agenda Event baru berhasil ditambahkan!');
    }

    public function edit(Event $event): View
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'event_date' => ['required', 'date'],
            'start_time' => ['required'],
            'end_time' => ['nullable'],
            'location' => ['required', 'string', 'max:255'],
            'person_in_charge' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:upcoming,ongoing,finished'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:3072'],
        ]);

        if ($request->hasFile('image')) {
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);

        $event->update($validated);

        return redirect()->route('admin.event.index')
            ->with('success', 'Agenda Event berhasil diperbarui!');
    }

    public function destroy(Event $event): RedirectResponse
    {
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.event.index')
            ->with('success', 'Agenda Event berhasil dihapus!');
    }
}
