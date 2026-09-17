<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicAchievementController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('q');
        $level = $request->input('level');

        $query = Achievement::search($search)
            ->level($level)
            ->latest('achievement_date');

        $achievements = $query->paginate(12)->withQueryString();

        $levels = ['Internasional', 'Nasional', 'Provinsi', 'Kabupaten/Kota', 'Sekolah'];

        $stats = [
            'total' => Achievement::count(),
            'internasional' => Achievement::where('level', 'Internasional')->count(),
            'nasional' => Achievement::where('level', 'Nasional')->count(),
            'provinsi' => Achievement::where('level', 'Provinsi')->count(),
        ];

        return view('pages.achievements.index', compact('achievements', 'search', 'level', 'levels', 'stats'));
    }
}
