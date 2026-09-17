@extends('layouts.app')

@section('title', 'Agenda & Event Sekolah')
@section('meta_description', 'Kalender agenda kegiatan, festival seni, seminar, olimpiade, dan kompetisi di SMKN 1 CIOMAS.')

@section('content')
<!-- Technical Header Section -->
<div class="bg-white border-b border-slate-200 py-12 lg:py-16 bg-tech-grid">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-2">
            <span class="text-xs font-mono font-bold uppercase tracking-wider text-amber-600">02 // WAKTU & KEGIATAN</span>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-950 tracking-tight">
                Kalender Agenda & Event Kejuruan
            </h1>
            <p class="text-base text-slate-600 leading-relaxed font-normal">
                Jadwal lengkap kegiatan perlombaan vokasi (LKS), seminar teknologi, uji sertifikasi kompetensi (LSP), pameran karya, dan upacara peringatan.
            </p>
        </div>

        <!-- Filter Tabs & Search Bar -->
        <div class="mt-8 flex flex-col md:flex-row md:items-center justify-between gap-4 p-4 rounded-xl bg-slate-50 border border-slate-300 shadow-sm">
            <!-- Filter Status Tabs -->
            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0 font-mono text-xs">
                <a href="{{ route('event.index', ['status' => 'upcoming', 'q' => $search]) }}" class="px-3.5 py-2 rounded-lg font-bold transition-colors whitespace-nowrap {{ $status === 'upcoming' ? 'bg-slate-950 text-white' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-300' }}">
                    MENDATANG ({{ $counts['upcoming'] }})
                </a>
                <a href="{{ route('event.index', ['status' => 'ongoing', 'q' => $search]) }}" class="px-3.5 py-2 rounded-lg font-bold transition-colors whitespace-nowrap {{ $status === 'ongoing' ? 'bg-amber-600 text-white' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-300' }}">
                    BERLANGSUNG ({{ $counts['ongoing'] }})
                </a>
                <a href="{{ route('event.index', ['status' => 'finished', 'q' => $search]) }}" class="px-3.5 py-2 rounded-lg font-bold transition-colors whitespace-nowrap {{ $status === 'finished' ? 'bg-slate-700 text-white' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-300' }}">
                    SELESAI ({{ $counts['finished'] }})
                </a>
                <a href="{{ route('event.index', ['status' => 'all', 'q' => $search]) }}" class="px-3.5 py-2 rounded-lg font-bold transition-colors whitespace-nowrap {{ $status === 'all' ? 'bg-blue-700 text-white' : 'bg-white text-slate-700 hover:bg-slate-200 border border-slate-300' }}">
                    SEMUA ({{ $counts['all'] }})
                </a>
            </div>

            <!-- Search -->
            <form method="GET" action="{{ route('event.index') }}" class="flex items-center gap-2">
                <input type="hidden" name="status" value="{{ $status }}">
                <div class="relative">
                    <input type="text" name="q" value="{{ $search }}" placeholder="Cari nama event atau lokasi..." class="w-full sm:w-64 pl-9 pr-3 py-2 rounded-lg text-xs bg-white border border-slate-300 focus:border-blue-700 outline-none font-sans">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <button type="submit" class="px-4 py-2 rounded-lg text-xs font-mono font-bold uppercase text-white bg-slate-950 hover:bg-blue-700 transition-colors">
                    Cari
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Events List Section -->
<div class="py-14 bg-slate-50 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($events->count() > 0)
            <div class="space-y-4">
                @foreach ($events as $event)
                    <article class="bg-white rounded-xl border border-slate-200 hover:border-slate-400 p-6 sm:p-7 transition-all shadow-sm flex flex-col md:flex-row items-start justify-between gap-6">
                        <div class="flex items-start gap-5 min-w-0 flex-1">
                            <!-- Technical Date Stamp -->
                            <div class="w-16 h-16 rounded-lg bg-slate-900 text-white flex flex-col items-center justify-center font-mono shrink-0 border border-slate-800">
                                <span class="text-xl font-black leading-none">{{ $event->event_date->format('d') }}</span>
                                <span class="text-[10px] uppercase font-bold text-amber-400 mt-1">{{ $event->event_date->format('M Y') }}</span>
                            </div>

                            <div class="space-y-2 min-w-0 flex-1">
                                <div class="flex flex-wrap items-center gap-2 text-xs font-mono">
                                    <span class="text-slate-700 font-semibold">🕒 {{ $event->formatted_time }}</span>
                                    <span class="text-slate-400">•</span>
                                    <span class="text-slate-700 font-semibold">📍 {{ $event->location }}</span>
                                    <span class="text-slate-400">•</span>
                                    <span class="text-blue-700 font-semibold">PIC: {{ $event->person_in_charge }}</span>
                                </div>

                                <h2 class="text-lg sm:text-xl font-bold text-slate-950 leading-snug">
                                    <a href="{{ route('event.show', $event->slug) }}" class="hover:text-blue-700 transition-colors">
                                        {{ $event->title }}
                                    </a>
                                </h2>

                                <p class="text-sm text-slate-600 leading-relaxed font-normal">
                                    {{ $event->excerpt }}
                                </p>
                            </div>
                        </div>

                        <div class="flex md:flex-col items-center md:items-end justify-between w-full md:w-auto pt-4 md:pt-0 border-t md:border-t-0 border-slate-100 shrink-0 gap-3">
                            @if($event->status === 'upcoming')
                                <span class="px-2.5 py-1 rounded text-[11px] font-mono font-bold uppercase bg-blue-50 text-blue-800 border border-blue-200">
                                    Akan Datang
                                </span>
                            @elseif($event->status === 'ongoing')
                                <span class="px-2.5 py-1 rounded text-[11px] font-mono font-bold uppercase bg-amber-50 text-amber-800 border border-amber-200 animate-pulse">
                                    Sedang Berlangsung
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded text-[11px] font-mono font-bold uppercase bg-slate-100 text-slate-600 border border-slate-200">
                                    Selesai
                                </span>
                            @endif

                            <a href="{{ route('event.show', $event->slug) }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-xs font-mono font-bold uppercase text-white bg-slate-900 hover:bg-blue-700 transition-colors">
                                <span>RINCIAN ACARA</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination Bar -->
            <div class="mt-10">
                {{ $events->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-xl border border-slate-200 p-8">
                <div class="w-12 h-12 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center mx-auto mb-4 border border-slate-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-slate-900">Tidak ada agenda event ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto font-mono">
                    Belum ada jadwal yang cocok dengan kata kunci atau filter status yang dipilih.
                </p>
                <div class="mt-4">
                    <a href="{{ route('event.index') }}" class="px-4 py-2 rounded-lg bg-slate-900 text-white text-xs font-mono font-bold hover:bg-slate-800 transition-colors">
                        Tampilkan Semua Agenda
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
