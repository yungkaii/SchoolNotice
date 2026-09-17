@extends('layouts.app')

@section('title', $event->title)
@section('meta_description', Str::limit(strip_tags($event->description), 150))

@section('content')
<!-- Breadcrumbs Bar -->
<div class="bg-slate-50 border-b border-slate-200/80 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500 overflow-x-auto">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('event.index') }}" class="hover:text-blue-600 transition-colors">Event</a>
            <span>/</span>
            <span class="text-slate-800 truncate max-w-xs sm:max-w-md">{{ $event->title }}</span>
        </nav>
    </div>
</div>

<!-- Main Event Section -->
<div class="py-12 lg:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Left: Event Details -->
            <div class="lg:col-span-8 space-y-8">
                <div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $event->status === 'upcoming' ? 'bg-teal-50 text-teal-700 border border-teal-200' : ($event->status === 'ongoing' ? 'bg-amber-50 text-amber-700 border border-amber-200' : 'bg-slate-100 text-slate-700 border border-slate-200') }}">
                        Status: {{ $event->status === 'upcoming' ? 'Mendatang' : ($event->status === 'ongoing' ? 'Sedang Berlangsung' : 'Selesai') }}
                    </span>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight mt-3 leading-snug">
                        {{ $event->title }}
                    </h1>
                </div>

                <!-- Event Poster -->
                <div class="rounded-3xl overflow-hidden bg-slate-100 border border-slate-200/80 shadow-md">
                    <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full max-h-[460px] object-cover">
                </div>

                <!-- Event Info Highlights Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-6 rounded-3xl bg-slate-50 border border-slate-200/80">
                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-slate-500">Tanggal Acara</span>
                            <span class="block text-sm font-bold text-slate-900 mt-0.5">{{ $event->event_date->translatedFormat('l, d F Y') }}</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-slate-500">Waktu Pelaksanaan</span>
                            <span class="block text-sm font-bold text-slate-900 mt-0.5">{{ $event->formatted_time }}</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-slate-500">Lokasi / Tempat</span>
                            <span class="block text-sm font-bold text-slate-900 mt-0.5">{{ $event->location }}</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5">
                        <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-slate-500">Penanggung Jawab (PIC)</span>
                            <span class="block text-sm font-bold text-slate-900 mt-0.5">{{ $event->person_in_charge }}</span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Deskripsi Lengkap Acara</h3>
                    <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-4">
                        {!! nl2br(e($event->description)) !!}
                    </div>
                </div>
            </div>

            <!-- Right Sidebar: Countdown & Other Events -->
            <aside class="lg:col-span-4 space-y-8">
                <!-- Live Countdown Box -->
                <div class="p-6 rounded-3xl bg-gradient-to-br from-slate-900 to-slate-800 text-white shadow-xl" data-countdown-date="{{ $event->event_date->format('Y-m-d') }} {{ $event->start_time }}">
                    <h4 class="text-xs font-bold uppercase tracking-wider text-teal-400 mb-1 cd-status">Hitung Mundur Waktu Acara</h4>
                    <p class="text-xs text-slate-400 mb-5">Persiapkan diri Anda menyambut acara ini</p>

                    <div class="grid grid-cols-4 gap-2 text-center">
                        <div class="p-2.5 rounded-xl bg-slate-800/90 border border-slate-700">
                            <span class="block text-xl font-black text-white cd-days">00</span>
                            <span class="block text-[9px] uppercase font-bold text-slate-400 mt-0.5">Hari</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-800/90 border border-slate-700">
                            <span class="block text-xl font-black text-white cd-hours">00</span>
                            <span class="block text-[9px] uppercase font-bold text-slate-400 mt-0.5">Jam</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-800/90 border border-slate-700">
                            <span class="block text-xl font-black text-white cd-minutes">00</span>
                            <span class="block text-[9px] uppercase font-bold text-slate-400 mt-0.5">Menit</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-800/90 border border-slate-700">
                            <span class="block text-xl font-black text-teal-400 cd-seconds">00</span>
                            <span class="block text-[9px] uppercase font-bold text-slate-400 mt-0.5">Detik</span>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events List -->
                <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200/80">
                    <h3 class="text-base font-bold text-slate-900 mb-5 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                        Event Mendatang Lainnya
                    </h3>

                    <div class="space-y-4">
                        @forelse ($upcomingEvents as $item)
                            <a href="{{ route('event.show', $item->slug) }}" class="block p-3.5 rounded-2xl bg-white border border-slate-200/60 hover:border-teal-300 hover:shadow-md transition-all group">
                                <span class="text-[11px] font-bold text-teal-600">
                                    {{ $item->event_date->translatedFormat('d M Y') }} • {{ substr($item->start_time, 0, 5) }} WIB
                                </span>
                                <h4 class="text-sm font-bold text-slate-800 group-hover:text-teal-700 transition-colors line-clamp-2 mt-1">
                                    {{ $item->title }}
                                </h4>
                                <span class="text-[11px] text-slate-400 block mt-2 truncate">
                                    Lokasi: {{ $item->location }}
                                </span>
                            </a>
                        @empty
                            <p class="text-xs text-slate-400">Tidak ada event mendatang lainnya.</p>
                        @endforelse
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
