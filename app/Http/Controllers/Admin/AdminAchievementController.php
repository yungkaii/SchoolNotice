<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminAchievementController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('q');
        $level = $request->input('level');

        $query = Achievement::search($search)->level($level);
        $achievements = $query->latest('achievement_date')->paginate(10)->withQueryString();

        $levels = ['Internasional', 'Nasional', 'Provinsi', 'Kabupaten/Kota', 'Sekolah'];

        return view('admin.achievements.index', compact('achievements', 'search', 'level', 'levels'));
    }

    public function create(): View
    {
        $levels = ['Internasional', 'Nasional', 'Provinsi', 'Kabupaten/Kota', 'Sekolah'];

        return view('admin.achievements.create', compact('levels'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'level' => ['required', 'in:Internasional,Nasional,Provinsi,Kabupaten/Kota,Sekolah'],
            'achievement_date' => ['required', 'date'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:3072'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('achievements', 'public');
        }

        Achievement::create($validated);

        return redirect()->route('admin.prestasi.index')
            ->with('success', 'Data Prestasi Siswa berhasil ditambahkan!');
    }

    public function edit(Achievement $prestasi): View
    {
        $achievement = $prestasi;
        $levels = ['Internasional', 'Nasional', 'Provinsi', 'Kabupaten/Kota', 'Sekolah'];

        return view('admin.achievements.edit', compact('achievement', 'levels'));
    }

    public function update(Request $request, Achievement $prestasi): RedirectResponse
    {
        $achievement = $prestasi;

        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'level' => ['required', 'in:Internasional,Nasional,Provinsi,Kabupaten/Kota,Sekolah'],
            'achievement_date' => ['required', 'date'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:3072'],
        ]);

        if ($request->hasFile('image')) {
            if ($achievement->image && Storage::disk('public')->exists($achievement->image)) {
                Storage::disk('public')->delete($achievement->image);
            }
            $validated['image'] = $request->file('image')->store('achievements', 'public');
        }

        $achievement->update($validated);

        return redirect()->route('admin.prestasi.index')
            ->with('success', 'Data Prestasi Siswa berhasil diperbarui!');
    }

    public function destroy(Achievement $prestasi): RedirectResponse
    {
        $achievement = $prestasi;

        if ($achievement->image && Storage::disk('public')->exists($achievement->image)) {
            Storage::disk('public')->delete($achievement->image);
        }

        $achievement->delete();

        return redirect()->route('admin.prestasi.index')
            ->with('success', 'Data Prestasi Siswa berhasil dihapus!');
    }
}
