@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- 1. Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-b from-blue-50/70 via-white to-slate-50 pt-10 pb-20 lg:pt-16 lg:pb-28">
    <!-- Ambient Background Glows -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-400/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -right-24 w-96 h-96 bg-indigo-400/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            <!-- Left Hero Copy -->
            <div class="lg:col-span-7 space-y-6 reveal-init">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-100/80 border border-blue-200 text-blue-700 text-xs font-bold tracking-wide uppercase">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    Portal Resmi SMKN 1 CIOMAS
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                    Semua Informasi Sekolah, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-600">Dalam Satu Tempat.</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl">
                    Pusat informasi terpadu yang menyajikan pengumuman resmi, agenda kegiatan, warta berita, dan rekam jejak prestasi siswa secara aktual, transparan, dan dapat diakses kapan saja.
                </p>

                <!-- CTA Action Buttons -->
                <div class="flex flex-wrap items-center gap-3.5 pt-2">
                    <a href="{{ route('pengumuman.index') }}" class="inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-600/25 transition-all duration-200 hover:-translate-y-0.5">
                        <span>Lihat Pengumuman</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="{{ route('event.index') }}" class="inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl font-bold text-sm text-slate-700 hover:text-blue-600 bg-white hover:bg-slate-50 border border-slate-200 shadow-sm transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Agenda & Event</span>
                    </a>
                </div>

                <!-- Trust Badges -->
                <div class="pt-6 border-t border-slate-200/80 grid grid-cols-3 gap-4 max-w-lg">
                    <div>
                        <span class="block text-2xl font-black text-slate-900" data-counter-target="{{ $stats['announcements'] ?? 0 }}">0</span>
                        <span class="block text-xs font-semibold text-slate-500 mt-0.5">Pengumuman Aktif</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-slate-900" data-counter-target="{{ $stats['events'] ?? 0 }}">0</span>
                        <span class="block text-xs font-semibold text-slate-500 mt-0.5">Agenda Mendatang</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-slate-900" data-counter-target="{{ $stats['achievements'] ?? 0 }}">0</span>
                        <span class="block text-xs font-semibold text-slate-500 mt-0.5">Prestasi Siswa</span>
                    </div>
                </div>
            </div>

            <!-- Right Hero Graphic -->
            <div class="lg:col-span-5 relative reveal-init reveal-delay-2">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <div class="relative rounded-3xl p-3 bg-gradient-to-b from-white/90 to-white/40 border border-white/80 shadow-2xl shadow-blue-500/10 backdrop-blur-xl">
                        <img src="{{ asset('images/defaults/hero-illustration.svg') }}" alt="SchoolNotice Dashboard Preview" class="w-full h-auto rounded-2xl">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Pengumuman Terbaru Section -->
<section id="pengumuman-section" class="py-16 lg:py-24 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 reveal-init">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-50 px-3 py-1 rounded-md">Informasi Terkini</span>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Pengumuman Terbaru</h2>
                <p class="text-sm text-slate-500 mt-1">Warta resmi dan pengumuman administratif dari pihak sekolah</p>
            </div>
            <a href="{{ route('pengumuman.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-blue-600 hover:text-blue-700 group">
                <span>Lihat Semua Pengumuman</span>
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <!-- Announcements Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($announcements as $index => $item)
                <article class="reveal-init reveal-delay-{{ $index + 1 }} bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col group">
                    <!-- Image Banner -->
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        <div class="absolute top-3.5 left-3.5">
                            <span class="px-3 py-1 rounded-full text-xs font-bold text-blue-700 bg-white/95 shadow-sm border border-slate-100 backdrop-blur-md">
                                {{ $item->category->name ?? 'Pengumuman' }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-2 text-xs font-medium text-slate-500 mb-2.5">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : '-' }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug">
                                <a href="{{ route('pengumuman.show', $item->slug) }}">{{ $item->title }}</a>
                            </h3>
                            <p class="text-sm text-slate-600 mt-2.5 line-clamp-2 leading-relaxed">
                                {{ $item->excerpt }}
                            </p>
                        </div>

                        <div class="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-semibold text-slate-400">Pemberitahuan Resmi</span>
                            <a href="{{ route('pengumuman.show', $item->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 hover:text-blue-700 group-hover:translate-x-0.5 transition-transform">
                                <span>Baca Selengkapnya</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-12 text-center">
                    <p class="text-slate-500 text-sm">Belum ada pengumuman terbaru saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- 3. Event Mendatang Section -->
<section class="py-16 lg:py-24 bg-slate-900 text-white relative overflow-hidden">
    <!-- Ambient Lights -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-teal-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 reveal-init">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-teal-400 bg-teal-950/60 border border-teal-800/60 px-3 py-1 rounded-md">Kalender Kegiatan</span>
                <h2 class="text-3xl font-extrabold text-white tracking-tight mt-2">Agenda & Event Mendatang</h2>
                <p class="text-sm text-slate-400 mt-1">Ikuti rangkaian kegiatan akademik, seni, dan olahraga sekolah</p>
            </div>
            <a href="{{ route('event.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-teal-400 hover:text-teal-300 group">
                <span>Lihat Seluruh Agenda</span>
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <!-- Featured Countdown Box (If upcoming event exists) -->
        @if ($events->isNotEmpty())
            @php $topEvent = $events->first(); @endphp
            <div class="mb-10 p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-slate-800 to-slate-800/80 border border-slate-700/80 shadow-2xl reveal-init">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-7 space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 rounded-full text-[11px] font-extrabold uppercase tracking-wider bg-teal-500/20 text-teal-300 border border-teal-500/30">
                                Event Terdekat
                            </span>
                            <span class="text-xs text-slate-400">{{ $topEvent->event_date->translatedFormat('l, d F Y') }}</span>
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">
                            <a href="{{ route('event.show', $topEvent->slug) }}" class="hover:text-teal-300 transition-colors">{{ $topEvent->title }}</a>
                        </h3>
                        <p class="text-sm text-slate-300 line-clamp-2 leading-relaxed">
                            {{ $topEvent->description }}
                        </p>
                        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-400 pt-1">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                {{ $topEvent->formatted_time }}
                            </span>
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                {{ $topEvent->location }}
                            </span>
                        </div>
                    </div>

                    <!-- Countdown Timer Clock -->
                    <div class="lg:col-span-5 flex flex-col items-center justify-center p-5 rounded-2xl bg-slate-900/80 border border-slate-700/60" data-countdown-date="{{ $topEvent->event_date->format('Y-m-d') }} {{ $topEvent->start_time }}">
                        <span class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-3 cd-status">Waktu Menuju Acara</span>
                        <div class="grid grid-cols-4 gap-2 sm:gap-3 text-center w-full">
                            <div class="p-2.5 sm:p-3 rounded-xl bg-slate-800 border border-slate-700">
                                <span class="block text-xl sm:text-2xl font-black text-white cd-days">00</span>
                                <span class="block text-[10px] uppercase font-bold text-slate-400 mt-1">Hari</span>
                            </div>
                            <div class="p-2.5 sm:p-3 rounded-xl bg-slate-800 border border-slate-700">
                                <span class="block text-xl sm:text-2xl font-black text-white cd-hours">00</span>
                                <span class="block text-[10px] uppercase font-bold text-slate-400 mt-1">Jam</span>
                            </div>
                            <div class="p-2.5 sm:p-3 rounded-xl bg-slate-800 border border-slate-700">
                                <span class="block text-xl sm:text-2xl font-black text-white cd-minutes">00</span>
                                <span class="block text-[10px] uppercase font-bold text-slate-400 mt-1">Menit</span>
                            </div>
                            <div class="p-2.5 sm:p-3 rounded-xl bg-slate-800 border border-slate-700">
                                <span class="block text-xl sm:text-2xl font-black text-teal-400 cd-seconds">00</span>
                                <span class="block text-[10px] uppercase font-bold text-slate-400 mt-1">Detik</span>
                            </div>
                        </div>
                        <a href="{{ route('event.show', $topEvent->slug) }}" class="mt-4 text-xs font-bold text-teal-400 hover:text-teal-300">
                            Lihat Detail Agenda &rarr;
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($events as $index => $event)
                <article class="reveal-init reveal-delay-{{ $index + 1 }} bg-slate-800/80 rounded-2xl border border-slate-700/70 overflow-hidden hover:border-slate-600 transition-all duration-300 flex flex-col group">
                    <div class="relative h-44 overflow-hidden bg-slate-800">
                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        <div class="absolute top-3.5 left-3.5">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $event->status === 'upcoming' ? 'bg-teal-500 text-white' : ($event->status === 'ongoing' ? 'bg-amber-500 text-white' : 'bg-slate-600 text-slate-200') }}">
                                {{ $event->status }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="text-xs font-semibold text-teal-400 mb-2">
                                {{ $event->event_date->translatedFormat('d F Y') }} • {{ $event->formatted_time }}
                            </div>
                            <h3 class="text-lg font-bold text-white group-hover:text-teal-300 transition-colors line-clamp-2">
                                <a href="{{ route('event.show', $event->slug) }}">{{ $event->title }}</a>
                            </h3>
                            <p class="text-xs text-slate-400 mt-2 line-clamp-2">
                                {{ $event->description }}
                            </p>
                        </div>

                        <div class="pt-4 mt-4 border-t border-slate-700/60 flex items-center justify-between text-xs text-slate-400">
                            <span class="truncate max-w-[180px]">{{ $event->location }}</span>
                            <a href="{{ route('event.show', $event->slug) }}" class="font-bold text-teal-400 hover:text-teal-300">
                                Detail &rarr;
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-12 text-center text-slate-400">
                    <p>Belum ada agenda kegiatan mendatang.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- 4. Berita Sekolah Section -->
<section class="py-16 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 reveal-init">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-100/70 px-3 py-1 rounded-md">Warta Sekolah</span>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Kabar & Berita Terbaru</h2>
                <p class="text-sm text-slate-500 mt-1">Dokumentasi kegiatan dan liputan seputar kehidupan kampus sekolah</p>
            </div>
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-blue-600 hover:text-blue-700 group">
                <span>Lihat Semua Berita</span>
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($news as $index => $item)
                <article class="reveal-init reveal-delay-{{ $index + 1 }} bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col group">
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        <div class="absolute top-3.5 left-3.5">
                            <span class="px-3 py-1 rounded-full text-xs font-bold text-indigo-700 bg-white/95 shadow-sm border border-slate-100 backdrop-blur-md">
                                {{ $item->category->name ?? 'Berita' }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-3 text-xs font-medium text-slate-400 mb-2.5">
                                <span>{{ $item->published_at ? $item->published_at->translatedFormat('d M Y') : '-' }}</span>
                                <span>•</span>
                                <span>{{ $item->reading_time }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug">
                                <a href="{{ route('berita.show', $item->slug) }}">{{ $item->title }}</a>
                            </h3>
                            <p class="text-sm text-slate-600 mt-2.5 line-clamp-2 leading-relaxed">
                                {{ $item->excerpt }}
                            </p>
                        </div>

                        <div class="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-500 font-medium">Oleh {{ $item->author->name ?? 'Humas Sekolah' }}</span>
                            <a href="{{ route('berita.show', $item->slug) }}" class="text-xs font-bold text-blue-600 hover:text-blue-700">
                                Baca Artikel &rarr;
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-12 text-center text-slate-500 text-sm">
                    <p>Belum ada berita terbaru saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- 5. Prestasi Siswa Section -->
<section class="py-16 lg:py-24 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 reveal-init">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-amber-700 bg-amber-100 px-3 py-1 rounded-md">Prestasi Membanggakan</span>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Kebanggaan Sekolah</h2>
                <p class="text-sm text-slate-500 mt-1">Dedikasi dan capaian juara siswa di tingkat nasional dan internasional</p>
            </div>
            <a href="{{ route('prestasi.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-amber-700 hover:text-amber-800 group">
                <span>Lihat Galeri Prestasi</span>
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($achievements as $index => $item)
                <div class="reveal-init reveal-delay-{{ $index + 1 }} p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:bg-white hover:border-amber-300 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-800 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 5h-2V3H7v2H5c-1.1 0-2 .9-2 2v1c0 2.55 1.92 4.63 4.39 4.94.63 1.5 1.98 2.63 3.61 2.96V19H7v2h10v-2h-4v-3.1c1.63-.33 2.98-1.46 3.61-2.96C19.08 12.63 21 10.55 21 8V7c0-1.1-.9-2-2-2zM5 8V7h2v3.82C5.84 10.4 5 9.3 5 8zm14 0c0 1.3-.84 2.4-2 2.82V7h2v1z"/>
                            </svg>
                        </div>
                        <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-bold border {{ $item->level_badge_class }}">
                            {{ $item->level }}
                        </span>
                        <h4 class="text-base font-bold text-slate-900 mt-2.5 line-clamp-2 leading-snug">
                            {{ $item->title }}
                        </h4>
                    </div>

                    <div class="pt-4 mt-4 border-t border-slate-200/60">
                        <span class="block text-sm font-bold text-slate-800">{{ $item->student_name }}</span>
                        <span class="block text-xs font-semibold text-slate-500">Kelas {{ $item->class }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-8 text-center text-slate-500 text-sm">
                    Belum ada data prestasi ditampilkan.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- 6. Call To Action (CTA) Section -->
<section class="py-16 lg:py-20 bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 text-white relative overflow-hidden">
    <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative reveal-init">
        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-blue-200 border border-white/20 inline-block mb-4">
            Terhubung Bersama Kami
        </span>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight leading-tight">
            Ingin Tahu Lebih Banyak Seputar Sekolah Kami?
        </h2>
        <p class="text-base text-blue-100 max-w-2xl mx-auto mt-4 leading-relaxed">
            Dapatkan informasi lengkap mengenai kurikulum vokasi kejuruan, program beasiswa, fasilitas laboratorium modern, serta cara bergabung dengan keluarga besar SMKN 1 CIOMAS.
        </p>

        <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <a href="{{ route('tentang.index') }}" class="px-6 py-3.5 rounded-xl font-bold text-sm text-blue-900 bg-white hover:bg-blue-50 shadow-xl transition-all duration-200 hover:-translate-y-0.5">
                Profil & Fasilitas Sekolah
            </a>
            <a href="{{ route('pengumuman.index') }}" class="px-6 py-3.5 rounded-xl font-bold text-sm text-white bg-blue-700/80 hover:bg-blue-600 border border-blue-500/50 transition-all duration-200 hover:-translate-y-0.5">
                Cari Pengumuman
            </a>
        </div>
    </div>
</section>
@endsection
