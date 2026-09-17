@extends('layouts.app')

@section('title', 'Agenda & Event Sekolah')
@section('meta_description', 'Kalender agenda kegiatan, festival seni, seminar, olimpiade, dan kompetisi di SMKN 1 CIOMAS.')

@section('content')
<!-- Header Page -->
<div class="bg-gradient-to-b from-teal-50/70 to-slate-50 pt-12 pb-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-xs font-bold uppercase tracking-wider text-teal-700 bg-teal-100/70 px-3 py-1 rounded-md inline-block mb-3">
                Kalender Sekolah
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Agenda & Event Sekolah
            </h1>
            <p class="text-base text-slate-600 mt-2 leading-relaxed">
                Jadwal lengkap kegiatan perlombaan, seminar, festival budaya, pekan olahraga, dan upacara peringatan.
            </p>
        </div>

        <!-- Filter Tabs & Search Bar -->
        <div class="mt-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Tabs -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0">
                <a href="{{ route('event.index', ['status' => 'upcoming', 'q' => $search]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ $status === 'upcoming' ? 'bg-teal-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Mendatang ({{ $counts['upcoming'] }})
                </a>
                <a href="{{ route('event.index', ['status' => 'ongoing', 'q' => $search]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ $status === 'ongoing' ? 'bg-amber-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Sedang Berlangsung ({{ $counts['ongoing'] }})
                </a>
                <a href="{{ route('event.index', ['status' => 'finished', 'q' => $search]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ $status === 'finished' ? 'bg-slate-700 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Telah Selesai ({{ $counts['finished'] }})
                </a>
                <a href="{{ route('event.index', ['status' => 'all', 'q' => $search]) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ $status === 'all' ? 'bg-blue-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Semua ({{ $counts['all'] }})
                </a>
            </div>

            <!-- Search -->
            <form method="GET" action="{{ route('event.index') }}" class="flex items-center gap-2">
                <input type="hidden" name="status" value="{{ $status }}">
                <div class="relative">
                    <input type="text" name="q" value="{{ $search }}" placeholder="Cari nama event atau lokasi..." class="w-full sm:w-64 pl-9 pr-3 py-2 rounded-xl text-xs border border-slate-200 bg-white focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 outline-none">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <button type="submit" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-teal-600 hover:bg-teal-700 transition-colors">
                    Cari
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Events Grid Section -->
<div class="py-12 lg:py-16 bg-white min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($events->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($events as $event)
                    <article class="reveal-init bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col group">
                        <div class="relative h-48 overflow-hidden bg-slate-100">
                            <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <div class="absolute top-3.5 left-3.5">
                                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $event->status === 'upcoming' ? 'bg-teal-500 text-white' : ($event->status === 'ongoing' ? 'bg-amber-500 text-white' : 'bg-slate-700 text-slate-200') }}">
                                    {{ $event->status === 'upcoming' ? 'Mendatang' : ($event->status === 'ongoing' ? 'Sedang Berjalan' : 'Selesai') }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-2 text-xs font-semibold text-teal-700 mb-2">
                                    <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ $event->event_date->translatedFormat('l, d F Y') }}</span>
                                </div>
                                <h2 class="text-lg font-bold text-slate-900 group-hover:text-teal-700 transition-colors line-clamp-2 leading-snug">
                                    <a href="{{ route('event.show', $event->slug) }}">{{ $event->title }}</a>
                                </h2>
                                <p class="text-sm text-slate-600 mt-2.5 line-clamp-2 leading-relaxed">
                                    {{ $event->excerpt }}
                                </p>

                                <div class="mt-4 space-y-1.5 text-xs text-slate-500">
                                    <p class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        <span>{{ $event->formatted_time }}</span>
                                    </p>
                                    <p class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                        <span class="truncate">{{ $event->location }}</span>
                                    </p>
                                </div>
                            </div>

                            <div class="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs text-slate-400 truncate max-w-[170px]">PIC: {{ $event->person_in_charge }}</span>
                                <a href="{{ route('event.show', $event->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold text-teal-600 hover:text-teal-700 group-hover:translate-x-0.5 transition-transform">
                                    <span>Detail Acara</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $events->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="py-16 text-center max-w-md mx-auto">
                <div class="w-16 h-16 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Tidak ada agenda kegiatan ditemukan</h3>
                <p class="text-sm text-slate-500 mt-1">Belum ada agenda yang sesuai dengan kriteria filter saat ini.</p>
                <a href="{{ route('event.index') }}" class="inline-block mt-4 px-4 py-2 rounded-xl text-sm font-semibold text-teal-700 bg-teal-50 hover:bg-teal-100 transition-colors">
                    Lihat Semua Event
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
