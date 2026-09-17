@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Ringkasan & Statistik')
@section('page_subtitle', 'Selamat datang di panel kontrol terpadu SMKN 1 CIOMAS')

@section('content')
<div class="space-y-8 font-sans">
    <!-- 1. Telemetry Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Card 1: Pengumuman -->
        <div class="p-5 rounded-xl bg-white border border-slate-200 shadow-sm relative overflow-hidden group hover:border-slate-300 transition-all">
            <div class="absolute top-0 left-0 right-0 h-1 bg-amber-500"></div>
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-slate-500">Pengumuman</span>
                    <span class="block text-3xl font-mono font-black text-slate-900 mt-1" data-counter-target="{{ $stats['announcements_total'] }}">0</span>
                    <span class="inline-flex items-center gap-1.5 text-[11px] font-mono text-emerald-600 mt-1.5 font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        {{ $stats['announcements_published'] }} Terbit aktif
                    </span>
                </div>
                <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 border border-amber-200 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 2: Events -->
        <div class="p-5 rounded-xl bg-white border border-slate-200 shadow-sm relative overflow-hidden group hover:border-slate-300 transition-all">
            <div class="absolute top-0 left-0 right-0 h-1 bg-cobalt-500"></div>
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-slate-500">Agenda & Event</span>
                    <span class="block text-3xl font-mono font-black text-slate-900 mt-1" data-counter-target="{{ $stats['events_total'] }}">0</span>
                    <span class="inline-flex items-center gap-1.5 text-[11px] font-mono text-cobalt-600 mt-1.5 font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-cobalt-500"></span>
                        {{ $stats['events_upcoming'] }} Agenda mendatang
                    </span>
                </div>
                <div class="w-10 h-10 rounded-lg bg-cobalt-50 text-cobalt-600 border border-cobalt-200 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 3: Berita -->
        <div class="p-5 rounded-xl bg-white border border-slate-200 shadow-sm relative overflow-hidden group hover:border-slate-300 transition-all">
            <div class="absolute top-0 left-0 right-0 h-1 bg-emerald-500"></div>
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-slate-500">Warta Berita</span>
                    <span class="block text-3xl font-mono font-black text-slate-900 mt-1" data-counter-target="{{ $stats['news_total'] }}">0</span>
                    <span class="inline-flex items-center gap-1.5 text-[11px] font-mono text-emerald-600 mt-1.5 font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Artikel terpublikasi
                    </span>
                </div>
                <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 border border-emerald-200 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 4: Prestasi -->
        <div class="p-5 rounded-xl bg-white border border-slate-200 shadow-sm relative overflow-hidden group hover:border-slate-300 transition-all">
            <div class="absolute top-0 left-0 right-0 h-1 bg-purple-500"></div>
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-slate-500">Prestasi Vokasi</span>
                    <span class="block text-3xl font-mono font-black text-slate-900 mt-1" data-counter-target="{{ $stats['achievements_total'] }}">0</span>
                    <span class="inline-flex items-center gap-1.5 text-[11px] font-mono text-purple-600 mt-1.5 font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                        Medali & Juara
                    </span>
                </div>
                <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 border border-purple-200 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Quick Actions Console Bar -->
    <div class="p-5 sm:p-6 rounded-xl bg-tech-950 text-white border border-tech-800 shadow-md flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-xs bg-amber-500"></span>
                <h3 class="text-sm font-mono font-bold uppercase tracking-wider text-white">Konsol Aksi Cepat</h3>
            </div>
            <p class="text-xs text-slate-400 mt-0.5">Entri data publikasi baru langsung ke portal publik sekolah</p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.pengumuman.create') }}" class="px-3 py-1.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-tech-950 bg-amber-500 hover:bg-amber-400 transition-colors shadow-sm">
                + Pengumuman
            </a>
            <a href="{{ route('admin.event.create') }}" class="px-3 py-1.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-white bg-cobalt-600 hover:bg-cobalt-500 transition-colors shadow-sm">
                + Agenda Event
            </a>
            <a href="{{ route('admin.berita.create') }}" class="px-3 py-1.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-white bg-emerald-600 hover:bg-emerald-500 transition-colors shadow-sm">
                + Berita Sekolah
            </a>
            <a href="{{ route('admin.prestasi.create') }}" class="px-3 py-1.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-white bg-purple-600 hover:bg-purple-500 transition-colors shadow-sm">
                + Prestasi Siswa
            </a>
        </div>
    </div>

    <!-- 3. Two Columns: Recent Announcements & Upcoming Events -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Left 7 Cols: Recent Announcements Table -->
        <div class="lg:col-span-7 bg-white rounded-xl p-5 sm:p-6 border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Pengumuman Terkini</h3>
                    <p class="text-xs text-slate-500">Publikasi warta informasi resmi sekolah</p>
                </div>
                <a href="{{ route('admin.pengumuman.index') }}" class="text-xs font-mono font-bold text-amber-600 hover:text-amber-700">
                    Lihat Semua &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-100 text-slate-400 font-mono uppercase tracking-wider text-[10px]">
                            <th class="pb-2.5 font-semibold">Judul Pengumuman</th>
                            <th class="pb-2.5 font-semibold">Kategori</th>
                            <th class="pb-2.5 font-semibold">Status</th>
                            <th class="pb-2.5 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($recentAnnouncements as $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-3 font-medium text-slate-900 max-w-[220px] truncate">
                                    {{ $item->title }}
                                </td>
                                <td class="py-3 text-slate-600 font-mono text-[11px]">
                                    {{ $item->category->name ?? '-' }}
                                </td>
                                <td class="py-3">
                                    <span class="px-2 py-0.5 rounded-xs text-[10px] font-mono font-bold uppercase {{ $item->status === 'published' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : ($item->status === 'draft' ? 'bg-slate-100 text-slate-600 border border-slate-200' : 'bg-rose-50 text-rose-700 border border-rose-200') }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="py-3 text-right">
                                    <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="font-mono text-xs font-bold text-amber-600 hover:text-amber-700">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-slate-400 font-mono text-xs">Belum ada pengumuman terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right 5 Cols: Upcoming Events Widget -->
        <div class="lg:col-span-5 bg-white rounded-xl p-5 sm:p-6 border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Agenda Terdekat</h3>
                    <p class="text-xs text-slate-500">Jadwal kegiatan operasional & akademik</p>
                </div>
                <a href="{{ route('admin.event.index') }}" class="text-xs font-mono font-bold text-cobalt-600 hover:text-cobalt-700">
                    Kelola &rarr;
                </a>
            </div>

            <div class="space-y-3">
                @forelse ($upcomingEvents as $evt)
                    <div class="p-3 rounded-lg bg-slate-50 border border-slate-200 flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <span class="text-[10px] font-mono font-bold text-cobalt-600 block">
                                {{ $evt->event_date->translatedFormat('d M Y') }} • {{ substr($evt->start_time, 0, 5) }} WIB
                            </span>
                            <h4 class="text-xs font-bold text-slate-900 truncate mt-0.5">{{ $evt->title }}</h4>
                            <span class="text-[11px] font-sans text-slate-500 block truncate">{{ $evt->location }}</span>
                        </div>
                        <a href="{{ route('admin.event.edit', $evt->id) }}" class="text-xs font-mono font-semibold text-slate-400 hover:text-cobalt-600 shrink-0">
                            Edit
                        </a>
                    </div>
                @empty
                    <p class="text-xs font-mono text-slate-400 py-6 text-center">Tidak ada event mendatang.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- 4. Two Columns: Recent News & Recent Achievements -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent News -->
        <div class="bg-white rounded-xl p-5 sm:p-6 border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Berita Terbaru</h3>
                    <p class="text-xs text-slate-500">Warta liputan terkini kegiatan sekolah</p>
                </div>
                <a href="{{ route('admin.berita.index') }}" class="text-xs font-mono font-bold text-emerald-600 hover:text-emerald-700">
                    Semua Warta &rarr;
                </a>
            </div>

            <div class="space-y-3">
                @forelse ($recentNews as $newsItem)
                    <div class="p-3 rounded-lg bg-slate-50 border border-slate-200 flex items-center gap-3">
                        <div class="w-12 h-12 rounded-md overflow-hidden bg-tech-950 shrink-0 border border-slate-200">
                            <img src="{{ $newsItem->image_url }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-xs font-bold text-slate-900 truncate">{{ $newsItem->title }}</h4>
                            <span class="text-[10px] font-mono text-slate-400 block mt-0.5">
                                {{ $newsItem->published_at ? $newsItem->published_at->translatedFormat('d M Y') : '-' }} • {{ $newsItem->category->name ?? 'Umum' }}
                            </span>
                        </div>
                        <a href="{{ route('admin.berita.edit', $newsItem->id) }}" class="text-xs font-mono font-semibold text-emerald-600 hover:underline shrink-0">
                            Edit
                        </a>
                    </div>
                @empty
                    <p class="text-xs font-mono text-slate-400 text-center py-6">Belum ada berita terdaftar.</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Achievements -->
        <div class="bg-white rounded-xl p-5 sm:p-6 border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Prestasi Siswa Terbaru</h3>
                    <p class="text-xs text-slate-500">Daftar torehan medali & kejuaraan terkini</p>
                </div>
                <a href="{{ route('admin.prestasi.index') }}" class="text-xs font-mono font-bold text-purple-600 hover:text-purple-700">
                    Semua Prestasi &rarr;
                </a>
            </div>

            <div class="space-y-3">
                @forelse ($recentAchievements as $ach)
                    <div class="p-3 rounded-lg bg-slate-50 border border-slate-200 flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <span class="text-[10px] font-mono font-bold px-1.5 py-0.5 rounded-xs border inline-block mb-1 {{ $ach->level_badge_class }}">
                                {{ $ach->level }}
                            </span>
                            <h4 class="text-xs font-bold text-slate-900 truncate">{{ $ach->title }}</h4>
                            <span class="text-[11px] font-sans text-slate-600 block truncate">{{ $ach->student_name }} ({{ $ach->class }})</span>
                        </div>
                        <a href="{{ route('admin.prestasi.edit', $ach->id) }}" class="text-xs font-mono font-semibold text-purple-600 hover:underline shrink-0">
                            Edit
                        </a>
                    </div>
                @empty
                    <p class="text-xs font-mono text-slate-400 text-center py-6">Belum ada data prestasi.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
