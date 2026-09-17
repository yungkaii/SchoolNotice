<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminAnnouncementController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('q');
        $categoryId = $request->input('category');
        $status = $request->input('status');

        $query = Announcement::with('category')
            ->search($search)
            ->category($categoryId);

        if ($status) {
            $query->where('status', $status);
        }

        $announcements = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.announcements.index', compact('announcements', 'categories', 'search', 'categoryId', 'status'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.announcements.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'content' => ['required', 'string'],
            'published_at' => ['required', 'date'],
            'expired_at' => ['nullable', 'date', 'after_or_equal:published_at'],
            'status' => ['required', 'in:draft,published,expired'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:3072'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('announcements', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);

        Announcement::create($validated);

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman baru berhasil diterbitkan!');
    }

    public function edit(Announcement $pengumuman): View
    {
        $announcement = $pengumuman;
        $categories = Category::orderBy('name')->get();

        return view('admin.announcements.edit', compact('announcement', 'categories'));
    }

    public function update(Request $request, Announcement $pengumuman): RedirectResponse
    {
        $announcement = $pengumuman;
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'content' => ['required', 'string'],
            'published_at' => ['required', 'date'],
            'expired_at' => ['nullable', 'date', 'after_or_equal:published_at'],
            'status' => ['required', 'in:draft,published,expired'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:3072'],
        ]);

        if ($request->hasFile('image')) {
            if ($announcement->image && Storage::disk('public')->exists($announcement->image)) {
                Storage::disk('public')->delete($announcement->image);
            }
            $validated['image'] = $request->file('image')->store('announcements', 'public');
        }

        $validated['slug'] = Str::slug($validated['title']);

        $announcement->update($validated);

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy(Announcement $pengumuman): RedirectResponse
    {
        $announcement = $pengumuman;
        if ($announcement->image && Storage::disk('public')->exists($announcement->image)) {
            Storage::disk('public')->delete($announcement->image);
        }

        $announcement->delete();

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus!');
    }
}
