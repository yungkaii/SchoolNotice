@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Ringkasan & Statistik')
@section('page_subtitle', 'Selamat datang di panel kontrol terpadu SchoolNotice')

@section('content')
<div class="space-y-8">
    <!-- 1. Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1: Pengumuman -->
        <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-sm flex items-center justify-between hover:shadow-md transition-shadow">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Pengumuman</span>
                <span class="block text-3xl font-black text-slate-900 mt-1" data-counter-target="{{ $stats['announcements_total'] }}">0</span>
                <span class="block text-[11px] font-semibold text-emerald-600 mt-1">
                    {{ $stats['announcements_published'] }} Terbit aktif
                </span>
            </div>
            <div class="w-13 h-13 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center p-3">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                </svg>
            </div>
        </div>

        <!-- Card 2: Events -->
        <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-sm flex items-center justify-between hover:shadow-md transition-shadow">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Agenda</span>
                <span class="block text-3xl font-black text-slate-900 mt-1" data-counter-target="{{ $stats['events_total'] }}">0</span>
                <span class="block text-[11px] font-semibold text-teal-600 mt-1">
                    {{ $stats['events_upcoming'] }} Agenda mendatang
                </span>
            </div>
            <div class="w-13 h-13 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center p-3">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>

        <!-- Card 3: Berita -->
        <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-sm flex items-center justify-between hover:shadow-md transition-shadow">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Kabar Berita</span>
                <span class="block text-3xl font-black text-slate-900 mt-1" data-counter-target="{{ $stats['news_total'] }}">0</span>
                <span class="block text-[11px] font-semibold text-indigo-600 mt-1">
                    Artikel terpublikasi
                </span>
            </div>
            <div class="w-13 h-13 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center p-3">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
        </div>

        <!-- Card 4: Prestasi -->
        <div class="p-6 rounded-3xl bg-white border border-slate-200/80 shadow-sm flex items-center justify-between hover:shadow-md transition-shadow">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Prestasi Siswa</span>
                <span class="block text-3xl font-black text-slate-900 mt-1" data-counter-target="{{ $stats['achievements_total'] }}">0</span>
                <span class="block text-[11px] font-semibold text-amber-600 mt-1">
                    Medali & Penghargaan
                </span>
            </div>
            <div class="w-13 h-13 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center p-3">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 5h-2V3H7v2H5c-1.1 0-2 .9-2 2v1c0 2.55 1.92 4.63 4.39 4.94.63 1.5 1.98 2.63 3.61 2.96V19H7v2h10v-2h-4v-3.1c1.63-.33 2.98-1.46 3.61-2.96C19.08 12.63 21 10.55 21 8V7c0-1.1-.9-2-2-2zM5 8V7h2v3.82C5.84 10.4 5 9.3 5 8zm14 0c0 1.3-.84 2.4-2 2.82V7h2v1z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- 2. Quick Actions Bar -->
    <div class="p-6 rounded-3xl bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 text-white shadow-xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-bold">Aksi Cepat Admin</h3>
            <p class="text-xs text-blue-200 mt-0.5">Tambah konten informasi baru langsung ke website</p>
        </div>
        <div class="flex flex-wrap items-center gap-2.5">
            <a href="{{ route('admin.pengumuman.create') }}" class="px-3.5 py-2 rounded-xl text-xs font-bold text-slate-900 bg-white hover:bg-blue-50 transition-colors shadow-sm">
                + Pengumuman
            </a>
            <a href="{{ route('admin.event.create') }}" class="px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-teal-600 hover:bg-teal-500 transition-colors shadow-sm">
                + Agenda Event
            </a>
            <a href="{{ route('admin.berita.create') }}" class="px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-500 transition-colors shadow-sm">
                + Berita Sekolah
            </a>
            <a href="{{ route('admin.prestasi.create') }}" class="px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-amber-600 hover:bg-amber-500 transition-colors shadow-sm">
                + Prestasi Siswa
            </a>
        </div>
    </div>

    <!-- 3. Two Columns: Recent Announcements & Upcoming Events -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Left 7 Cols: Recent Announcements Table -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Pengumuman Terbaru</h3>
                    <p class="text-xs text-slate-400">Daftar publikasi informasi termutakhir</p>
                </div>
                <a href="{{ route('admin.pengumuman.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700">
                    Lihat Semua &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-100 text-slate-400 uppercase tracking-wider">
                            <th class="pb-3 font-semibold">Judul</th>
                            <th class="pb-3 font-semibold">Kategori</th>
                            <th class="pb-3 font-semibold">Status</th>
                            <th class="pb-3 font-semibold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($recentAnnouncements as $item)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-3 font-semibold text-slate-800 max-w-[220px] truncate">
                                    {{ $item->title }}
                                </td>
                                <td class="py-3 text-slate-500">
                                    {{ $item->category->name ?? '-' }}
                                </td>
                                <td class="py-3">
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $item->status === 'published' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : ($item->status === 'draft' ? 'bg-slate-100 text-slate-600' : 'bg-rose-50 text-rose-700') }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="py-3 text-right">
                                    <a href="{{ route('admin.pengumuman.edit', $item->id) }}" class="font-bold text-blue-600 hover:text-blue-700">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-slate-400">Belum ada pengumuman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right 5 Cols: Upcoming Events Widget -->
        <div class="lg:col-span-5 bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Agenda Mendatang</h3>
                    <p class="text-xs text-slate-400">Jadwal event terdekat</p>
                </div>
                <a href="{{ route('admin.event.index') }}" class="text-xs font-bold text-teal-600 hover:text-teal-700">
                    Kelola &rarr;
                </a>
            </div>

            <div class="space-y-3.5">
                @forelse ($upcomingEvents as $evt)
                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <span class="text-[10px] font-bold text-teal-600 block">
                                {{ $evt->event_date->translatedFormat('d M Y') }} • {{ substr($evt->start_time, 0, 5) }} WIB
                            </span>
                            <h4 class="text-xs font-bold text-slate-900 truncate mt-0.5">{{ $evt->title }}</h4>
                            <span class="text-[11px] text-slate-400 block truncate">{{ $evt->location }}</span>
                        </div>
                        <a href="{{ route('admin.event.edit', $evt->id) }}" class="text-xs font-semibold text-slate-400 hover:text-teal-600 shrink-0">
                            Edit
                        </a>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 py-6 text-center">Tidak ada event mendatang.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- 4. Two Columns: Recent News & Recent Achievements -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent News -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Berita Terbaru</h3>
                    <p class="text-xs text-slate-400">Artikel kabar sekolah terkini</p>
                </div>
                <a href="{{ route('admin.berita.index') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-700">
                    Semua Berita &rarr;
                </a>
            </div>

            <div class="space-y-3">
                @forelse ($recentNews as $newsItem)
                    <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl overflow-hidden bg-slate-200 shrink-0">
                            <img src="{{ $newsItem->image_url }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-xs font-bold text-slate-900 truncate">{{ $newsItem->title }}</h4>
                            <span class="text-[10px] text-slate-400 block mt-0.5">
                                {{ $newsItem->published_at ? $newsItem->published_at->translatedFormat('d M Y') : '-' }} • {{ $newsItem->category->name ?? 'Umum' }}
                            </span>
                        </div>
                        <a href="{{ route('admin.berita.edit', $newsItem->id) }}" class="text-xs font-semibold text-indigo-600 hover:underline shrink-0">
                            Edit
                        </a>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 text-center py-6">Belum ada berita.</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Achievements -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Prestasi Siswa Terbaru</h3>
                    <p class="text-xs text-slate-400">Rekor penghargaan terkini</p>
                </div>
                <a href="{{ route('admin.prestasi.index') }}" class="text-xs font-bold text-amber-700 hover:text-amber-800">
                    Semua Prestasi &rarr;
                </a>
            </div>

            <div class="space-y-3">
                @forelse ($recentAchievements as $ach)
                    <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-md border inline-block mb-1 {{ $ach->level_badge_class }}">
                                {{ $ach->level }}
                            </span>
                            <h4 class="text-xs font-bold text-slate-900 truncate">{{ $ach->title }}</h4>
                            <span class="text-[11px] text-slate-500 block truncate">{{ $ach->student_name }} ({{ $ach->class }})</span>
                        </div>
                        <a href="{{ route('admin.prestasi.edit', $ach->id) }}" class="text-xs font-semibold text-amber-700 hover:underline shrink-0">
                            Edit
                        </a>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 text-center py-6">Belum ada data prestasi.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
