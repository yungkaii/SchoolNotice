@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- 1. Top Notice Ticker Tape (Real-time Broadcast) -->
@if($announcements->isNotEmpty())
    <div class="bg-slate-900 text-white border-b border-slate-800 py-2.5 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-4 text-xs font-mono">
            <div class="flex items-center gap-3 min-w-0 overflow-hidden">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-amber-500 text-slate-950 font-bold uppercase tracking-wider text-[10px] shrink-0">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-950 animate-ping"></span>
                    <span>WARTA TERKINI</span>
                </span>
                <span class="text-slate-400 shrink-0 hidden sm:inline">[ {{ $announcements->first()->published_at->format('d/m/Y') }} ]</span>
                <a href="{{ route('pengumuman.show', $announcements->first()->slug) }}" class="text-slate-200 hover:text-white truncate font-sans font-semibold hover:underline">
                    {{ $announcements->first()->title }}
                </a>
            </div>
            <a href="{{ route('pengumuman.index') }}" class="text-amber-400 hover:text-amber-300 font-bold shrink-0 hidden md:flex items-center gap-1 hover:underline">
                <span>SEMUA PENGUMUMAN</span>
                <span>&rarr;</span>
            </a>
        </div>
    </div>
@endif

<!-- 2. Hero Section: Split Technical Console -->
<section class="relative bg-white border-b border-slate-200 py-16 lg:py-24 bg-tech-grid overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Hero Identity & Headline (7 cols) -->
            <div class="lg:col-span-7 space-y-6 reveal-init">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-slate-100 border border-slate-300 text-slate-800 font-mono text-xs font-bold tracking-wider uppercase">
                    <span class="w-2 h-2 rounded-full bg-blue-700"></span>
                    <span>SMKN 1 CIOMAS • PUSAT KEUNGGULAN VOKASI</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-slate-950 tracking-tight leading-[1.12]">
                    Sistem Informasi & <br>
                    <span class="text-blue-700 underline decoration-amber-500 decoration-4 underline-offset-8">Warta Resmi Sekolah.</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl font-normal">
                    Pusat keterbukaan informasi akademik kejuruan, kalender agenda kegiatan, uji kompetensi, pengumuman kedinasan, dan etalase capaian prestasi kejuruan SMKN 1 Ciomas.
                </p>

                <!-- Dual Technical Action Buttons -->
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <a href="{{ route('pengumuman.index') }}" class="px-6 py-3 rounded-lg bg-slate-950 hover:bg-blue-800 text-white font-mono text-xs font-bold uppercase tracking-wider border border-slate-800 transition-all flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                        <span>Telusuri Pengumuman</span>
                    </a>
                    <a href="{{ route('event.index') }}" class="px-6 py-3 rounded-lg bg-white hover:bg-slate-50 text-slate-800 font-mono text-xs font-bold uppercase tracking-wider border border-slate-300 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Kalender Agenda</span>
                    </a>
                </div>

                <!-- Trust Micro-Badges Bar -->
                <div class="pt-6 border-t border-slate-200 grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs font-mono text-slate-600">
                    <div class="flex items-center gap-2">
                        <span class="text-amber-600 font-bold">✓</span>
                        <span>AKREDITASI "A"</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-amber-600 font-bold">✓</span>
                        <span>6 KEAHLIAN</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-amber-600 font-bold">✓</span>
                        <span>MITRA DUDI</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-amber-600 font-bold">✓</span>
                        <span>LSP-P1 TEKNIS</span>
                    </div>
                </div>
            </div>

            <!-- Right Telemetry Panel / Statistical Readout (5 cols) -->
            <div class="lg:col-span-5 reveal-init reveal-delay-1">
                <div class="rounded-2xl bg-slate-950 text-white p-6 sm:p-8 border border-slate-800 shadow-xl bg-tech-grid-dark relative">
                    <div class="flex items-center justify-between pb-5 border-b border-slate-800">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></div>
                            <span class="text-xs font-mono font-bold tracking-wider uppercase text-slate-300">TELEMETRI SISTEM VOKASI</span>
                        </div>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-slate-900 border border-slate-700 text-slate-400">AKTIF</span>
                    </div>

                    <!-- Counter Grid -->
                    <div class="grid grid-cols-2 gap-4 py-6 border-b border-slate-800">
                        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800">
                            <span class="block text-[10px] font-mono font-bold text-slate-400 uppercase">Pengumuman</span>
                            <span class="block text-3xl sm:text-4xl font-black font-mono text-white mt-1" data-counter-target="{{ $stats['announcements'] }}">0</span>
                            <span class="block text-[11px] font-mono text-blue-400 mt-1">Rilis Kedinasan</span>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800">
                            <span class="block text-[10px] font-mono font-bold text-slate-400 uppercase">Agenda Aktif</span>
                            <span class="block text-3xl sm:text-4xl font-black font-mono text-amber-400 mt-1" data-counter-target="{{ $stats['events'] }}">0</span>
                            <span class="block text-[11px] font-mono text-amber-300 mt-1">Jadwal Mendatang</span>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800">
                            <span class="block text-[10px] font-mono font-bold text-slate-400 uppercase">Warta Berita</span>
                            <span class="block text-3xl sm:text-4xl font-black font-mono text-white mt-1" data-counter-target="{{ $stats['news'] }}">0</span>
                            <span class="block text-[11px] font-mono text-slate-400 mt-1">Dokumentasi</span>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800">
                            <span class="block text-[10px] font-mono font-bold text-slate-400 uppercase">Rekor Juara</span>
                            <span class="block text-3xl sm:text-4xl font-black font-mono text-emerald-400 mt-1" data-counter-target="{{ $stats['achievements'] }}">0</span>
                            <span class="block text-[11px] font-mono text-emerald-300 mt-1">Prestasi Siswa</span>
                        </div>
                    </div>

                    <div class="pt-4 flex items-center justify-between text-[11px] font-mono text-slate-400">
                        <span>Pembaruan Terkini: {{ now()->translatedFormat('d F Y') }}</span>
                        <a href="{{ route('prestasi.index') }}" class="text-blue-400 hover:text-blue-300 font-bold hover:underline">
                            Semua Prestasi &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Section 1: Pengumuman Resmi (Asymmetric Editorial Bulletin Layout) -->
<section class="py-16 lg:py-20 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-xs font-mono font-bold uppercase tracking-wider text-blue-700">01 // INFORMASI RESMI</span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-950 tracking-tight mt-1">
                    Pengumuman & Edaran Kedinasan
                </h2>
            </div>
            <a href="{{ route('pengumuman.index') }}" class="inline-flex items-center gap-2 text-xs font-mono font-bold uppercase tracking-wider text-blue-700 hover:text-blue-900">
                <span>Daftar Pengumuman Lengkap</span>
                <span>&rarr;</span>
            </a>
        </div>

        @if($announcements->isNotEmpty())
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                <!-- Left: Major Featured Bulletin Card (7 cols) -->
                @php $featured = $announcements->first(); @endphp
                <div class="lg:col-span-7 flex flex-col reveal-init">
                    <div class="flex-1 bg-white rounded-xl border border-slate-300 p-6 sm:p-8 flex flex-col justify-between hover:border-blue-700 transition-colors shadow-sm relative overflow-hidden">
                        <div class="space-y-4">
                            <div class="flex flex-wrap items-center justify-between gap-3 text-xs font-mono">
                                <span class="px-2.5 py-1 rounded bg-blue-700 text-white font-bold uppercase tracking-wider text-[11px]">
                                    {{ $featured->category->name ?? 'Pengumuman' }}
                                </span>
                                <span class="text-slate-500">TAYANG: {{ $featured->published_at->format('d M Y') }}</span>
                            </div>

                            <h3 class="text-xl sm:text-2xl font-black text-slate-950 tracking-tight leading-snug">
                                <a href="{{ route('pengumuman.show', $featured->slug) }}" class="hover:text-blue-700 transition-colors">
                                    {{ $featured->title }}
                                </a>
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed font-normal">
                                {{ $featured->excerpt }}
                            </p>
                        </div>

                        <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between">
                            @if($featured->expired_at)
                                <span class="text-xs font-mono text-slate-500">
                                    Berlaku s/d: <strong class="text-slate-700">{{ $featured->expired_at->format('d M Y') }}</strong>
                                </span>
                            @else
                                <span class="text-xs font-mono text-emerald-600 font-semibold">● Berlaku Terbuka</span>
                            @endif
                            <a href="{{ route('pengumuman.show', $featured->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-mono font-bold uppercase text-slate-950 hover:text-blue-700 transition-colors">
                                <span>BACA EDARAN</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right: Stacked Vertical Notice Stream (5 cols) -->
                <div class="lg:col-span-5 space-y-4 flex flex-col justify-between reveal-init reveal-delay-1">
                    @forelse($announcements->skip(1) as $announcement)
                        <div class="bg-white rounded-xl border border-slate-200 p-5 hover:border-blue-600 transition-colors shadow-sm flex items-start gap-4">
                            <!-- Technical Date Stamp Box -->
                            <div class="w-14 h-14 rounded-lg bg-slate-100 border border-slate-300 flex flex-col items-center justify-center text-center shrink-0 font-mono">
                                <span class="text-base font-black text-slate-900 leading-none">{{ $announcement->published_at->format('d') }}</span>
                                <span class="text-[10px] uppercase font-bold text-slate-500 mt-0.5">{{ $announcement->published_at->format('M') }}</span>
                            </div>

                            <div class="min-w-0 flex-1 space-y-1">
                                <div class="flex items-center gap-2 text-[10px] font-mono">
                                    <span class="font-bold text-blue-700 uppercase">{{ $announcement->category->name ?? 'Info' }}</span>
                                    <span class="text-slate-400">•</span>
                                    <span class="text-slate-500">{{ $announcement->published_at->format('Y') }}</span>
                                </div>
                                <h4 class="text-sm font-bold text-slate-900 truncate leading-snug">
                                    <a href="{{ route('pengumuman.show', $announcement->slug) }}" class="hover:text-blue-700 transition-colors">
                                        {{ $announcement->title }}
                                    </a>
                                </h4>
                                <p class="text-xs text-slate-500 truncate">
                                    {{ Str::limit(strip_tags($announcement->content), 80) }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 rounded-xl bg-white border border-slate-200 text-center text-xs text-slate-500 font-mono">
                            Belum ada pengumuman tambahan.
                        </div>
                    @endforelse

                    <div class="p-4 rounded-xl bg-slate-900 text-white flex items-center justify-between border border-slate-800">
                        <div class="space-y-0.5">
                            <span class="text-[11px] font-mono text-amber-400 font-bold block">PENGUMUMAN LAINNYA</span>
                            <span class="text-xs text-slate-300 block">Arsip dan dokumen edaran akademik lengkap</span>
                        </div>
                        <a href="{{ route('pengumuman.index') }}" class="px-3.5 py-1.5 rounded bg-blue-700 hover:bg-blue-600 text-xs font-mono font-bold text-white transition-colors">
                            Buka Arsip &rarr;
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="p-12 rounded-xl bg-white border border-slate-200 text-center">
                <p class="text-sm text-slate-500 font-mono">Belum ada pengumuman resmi yang diterbitkan.</p>
            </div>
        @endif
    </div>
</section>

<!-- 4. Section 2: Agenda & Event (Countdown Cockpit + Timeline Stack) -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-xs font-mono font-bold uppercase tracking-wider text-amber-600">02 // WAKTU & KEGIATAN</span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-950 tracking-tight mt-1">
                    Agenda & Event Kalender Sekolah
                </h2>
            </div>
            <a href="{{ route('event.index') }}" class="inline-flex items-center gap-2 text-xs font-mono font-bold uppercase tracking-wider text-blue-700 hover:text-blue-900">
                <span>Lihat Seluruh Kalender</span>
                <span>&rarr;</span>
            </a>
        </div>

        @if($events->isNotEmpty())
            <!-- Event Countdown Cockpit -->
            @php $nearestEvent = $events->first(); @endphp
            <div class="mb-10 p-6 sm:p-8 rounded-2xl bg-slate-950 text-white border border-slate-800 bg-tech-grid-dark reveal-init">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                    <div class="lg:col-span-6 space-y-2">
                        <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded bg-amber-500 text-slate-950 font-mono text-[11px] font-black uppercase tracking-wider">
                            <span>⚡ EVENT TERDEKAT MENDATANG</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight">
                            <a href="{{ route('event.show', $nearestEvent->slug) }}" class="hover:text-amber-400 transition-colors">
                                {{ $nearestEvent->title }}
                            </a>
                        </h3>
                        <div class="flex flex-wrap items-center gap-4 text-xs font-mono text-slate-400 pt-1">
                            <span>📅 {{ $nearestEvent->event_date->format('d M Y') }}</span>
                            <span>🕒 {{ $nearestEvent->formatted_time }}</span>
                            <span>📍 {{ $nearestEvent->location }}</span>
                        </div>
                    </div>

                    <!-- Digital Split Countdown Block -->
                    <div class="lg:col-span-6 flex justify-start lg:justify-end" 
                         data-countdown-date="{{ $nearestEvent->event_date->format('Y-m-d') }} {{ $nearestEvent->start_time }}">
                        <div class="grid grid-cols-4 gap-2 sm:gap-3 text-center font-mono">
                            <div class="px-3 py-3 rounded-lg bg-slate-900 border border-slate-800 min-w-[65px] sm:min-w-[80px]">
                                <span class="cd-days block text-2xl sm:text-3xl font-black text-amber-400">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 font-bold block mt-1">HARI</span>
                            </div>
                            <div class="px-3 py-3 rounded-lg bg-slate-900 border border-slate-800 min-w-[65px] sm:min-w-[80px]">
                                <span class="cd-hours block text-2xl sm:text-3xl font-black text-white">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 font-bold block mt-1">JAM</span>
                            </div>
                            <div class="px-3 py-3 rounded-lg bg-slate-900 border border-slate-800 min-w-[65px] sm:min-w-[80px]">
                                <span class="cd-minutes block text-2xl sm:text-3xl font-black text-white">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 font-bold block mt-1">MENIT</span>
                            </div>
                            <div class="px-3 py-3 rounded-lg bg-slate-900 border border-slate-800 min-w-[65px] sm:min-w-[80px]">
                                <span class="cd-seconds block text-2xl sm:text-3xl font-black text-amber-400">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 font-bold block mt-1">DETIK</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Structured Horizontal Event Timeline Rows -->
            <div class="space-y-3 reveal-init reveal-delay-1">
                @foreach($events as $event)
                    <div class="bg-slate-50 hover:bg-white rounded-xl border border-slate-200 hover:border-slate-400 p-4 sm:p-5 transition-all flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex items-start sm:items-center gap-4 min-w-0">
                            <!-- Date Stamp -->
                            <div class="w-16 h-16 rounded-lg bg-slate-900 text-white flex flex-col items-center justify-center font-mono shrink-0 border border-slate-800">
                                <span class="text-lg font-black leading-none">{{ $event->event_date->format('d') }}</span>
                                <span class="text-[10px] uppercase font-bold text-amber-400 mt-1">{{ $event->event_date->format('M Y') }}</span>
                            </div>

                            <div class="min-w-0 space-y-1">
                                <div class="flex flex-wrap items-center gap-2 text-[11px] font-mono">
                                    <span class="text-slate-600 font-semibold">🕒 {{ $event->formatted_time }}</span>
                                    <span class="text-slate-400">•</span>
                                    <span class="text-slate-600 font-semibold">📍 {{ $event->location }}</span>
                                    <span class="text-slate-400">•</span>
                                    <span class="text-blue-700 font-semibold">PIC: {{ $event->person_in_charge }}</span>
                                </div>
                                <h4 class="text-base font-bold text-slate-900 truncate">
                                    <a href="{{ route('event.show', $event->slug) }}" class="hover:text-blue-700 transition-colors">
                                        {{ $event->title }}
                                    </a>
                                </h4>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 shrink-0 self-end md:self-center">
                            @if($event->status === 'upcoming')
                                <span class="px-2.5 py-1 rounded bg-blue-100 text-blue-800 font-mono text-xs font-bold uppercase">
                                    Akan Datang
                                </span>
                            @elseif($event->status === 'ongoing')
                                <span class="px-2.5 py-1 rounded bg-amber-100 text-amber-800 font-mono text-xs font-bold uppercase animate-pulse">
                                    Sedang Berlangsung
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded bg-slate-200 text-slate-700 font-mono text-xs font-bold uppercase">
                                    Selesai
                                </span>
                            @endif

                            <a href="{{ route('event.show', $event->slug) }}" class="p-2 text-slate-600 hover:text-slate-900 border border-slate-300 rounded-lg hover:bg-slate-100 transition-colors" title="Rincian Agenda">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-12 rounded-xl bg-slate-50 border border-slate-200 text-center">
                <p class="text-sm text-slate-500 font-mono">Belum ada agenda kegiatan mendatang.</p>
            </div>
        @endif
    </div>
</section>

<!-- 5. Section 3: Warta Berita (Magazine Asymmetric Layout) -->
<section class="py-16 lg:py-20 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-xs font-mono font-bold uppercase tracking-wider text-blue-700">03 // PUBLIKASI & LIPUTAN</span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-950 tracking-tight mt-1">
                    Warta Kejuruan & Inovasi Sekolah
                </h2>
            </div>
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-xs font-mono font-bold uppercase tracking-wider text-blue-700 hover:text-blue-900">
                <span>Seluruh Artikel Warta</span>
                <span>&rarr;</span>
            </a>
        </div>

        @if($news->isNotEmpty())
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                <!-- Left: Hero Magazine Feature (7 cols) -->
                @php $mainArticle = $news->first(); @endphp
                <div class="lg:col-span-7 flex flex-col reveal-init">
                    <div class="bg-white rounded-xl border border-slate-300 overflow-hidden flex flex-col flex-1 hover:border-slate-400 transition-colors shadow-sm">
                        <div class="h-64 sm:h-72 w-full overflow-hidden bg-slate-100 relative">
                            <img src="{{ $mainArticle->image_url }}" alt="{{ $mainArticle->title }}" class="w-full h-full object-cover">
                            <span class="absolute top-4 left-4 px-2.5 py-1 rounded bg-slate-950 text-white font-mono text-[11px] font-bold uppercase tracking-wider">
                                {{ $mainArticle->category->name ?? 'Berita' }}
                            </span>
                        </div>

                        <div class="p-6 sm:p-8 flex flex-col justify-between flex-1 space-y-4">
                            <div class="space-y-3">
                                <div class="flex items-center gap-3 text-xs font-mono text-slate-500">
                                    <span>📅 {{ $mainArticle->published_at->format('d F Y') }}</span>
                                    <span>•</span>
                                    <span>⏱️ {{ $mainArticle->reading_time }} menit baca</span>
                                    <span>•</span>
                                    <span>✍️ {{ $mainArticle->author->name ?? 'Humas' }}</span>
                                </div>
                                <h3 class="text-xl sm:text-2xl font-black text-slate-950 tracking-tight leading-snug">
                                    <a href="{{ route('berita.show', $mainArticle->slug) }}" class="hover:text-blue-700 transition-colors">
                                        {{ $mainArticle->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-slate-600 leading-relaxed font-normal">
                                    {{ $mainArticle->excerpt }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs font-mono text-slate-400">Liputan SMKN 1 Ciomas</span>
                                <a href="{{ route('berita.show', $mainArticle->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-mono font-bold uppercase text-blue-700 hover:text-blue-900">
                                    <span>BACA SELENGKAPNYA</span>
                                    <span>&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Two Complementary Story Cards (5 cols) -->
                <div class="lg:col-span-5 space-y-6 flex flex-col justify-between reveal-init reveal-delay-1">
                    @forelse($news->skip(1) as $item)
                        <div class="bg-white rounded-xl border border-slate-200 p-5 hover:border-slate-400 transition-colors shadow-sm flex flex-col sm:flex-row gap-4">
                            <div class="w-full sm:w-36 h-28 rounded-lg overflow-hidden bg-slate-100 shrink-0 border border-slate-200">
                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                            </div>

                            <div class="space-y-1.5 flex-1 min-w-0">
                                <div class="flex items-center gap-2 text-[10px] font-mono text-slate-500">
                                    <span class="font-bold text-blue-700 uppercase">{{ $item->category->name ?? 'Warta' }}</span>
                                    <span>•</span>
                                    <span>{{ $item->published_at->format('d M Y') }}</span>
                                </div>
                                <h4 class="text-sm font-bold text-slate-900 line-clamp-2 leading-snug">
                                    <a href="{{ route('berita.show', $item->slug) }}" class="hover:text-blue-700 transition-colors">
                                        {{ $item->title }}
                                    </a>
                                </h4>
                                <p class="text-xs text-slate-500 line-clamp-2">
                                    {{ Str::limit(strip_tags($item->content), 80) }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 rounded-xl bg-white border border-slate-200 text-center text-xs text-slate-500 font-mono">
                            Belum ada artikel warta lainnya.
                        </div>
                    @endforelse

                    <div class="p-5 rounded-xl bg-slate-100 border border-slate-300 flex items-center justify-between">
                        <div>
                            <span class="block text-xs font-mono font-bold text-slate-900 uppercase">Saluran Media & Redaksi</span>
                            <span class="block text-xs text-slate-500 mt-0.5">Kontribusi artikel dan liputan siswa SMKN 1 Ciomas</span>
                        </div>
                        <a href="{{ route('berita.index') }}" class="px-3 py-1.5 rounded bg-slate-900 text-white text-xs font-mono font-bold hover:bg-slate-800 transition-colors">
                            Semua Warta &rarr;
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="p-12 rounded-xl bg-white border border-slate-200 text-center">
                <p class="text-sm text-slate-500 font-mono">Belum ada warta berita yang diterbitkan.</p>
            </div>
        @endif
    </div>
</section>

<!-- 6. Section 4: Galeri Prestasi Siswa (Vocational Honor Roll & Podium) -->
<section class="py-16 lg:py-20 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-4 border-b border-slate-200 gap-4">
            <div>
                <span class="text-xs font-mono font-bold uppercase tracking-wider text-emerald-700">04 // REKAM JEJAK JUARA</span>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-950 tracking-tight mt-1">
                    Galeri Prestasi & Capaian Vokasi Siswa
                </h2>
            </div>
            <a href="{{ route('prestasi.index') }}" class="inline-flex items-center gap-2 text-xs font-mono font-bold uppercase tracking-wider text-blue-700 hover:text-blue-900">
                <span>Daftar Penghargaan Lengkap</span>
                <span>&rarr;</span>
            </a>
        </div>

        @if($achievements->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 reveal-init">
                @foreach($achievements as $achievement)
                    <div class="rounded-xl border border-slate-200 bg-white p-5 hover:border-slate-400 transition-colors shadow-sm flex flex-col justify-between space-y-4">
                        <div class="space-y-3">
                            <!-- Student Photo Card -->
                            <div class="h-44 w-full rounded-lg overflow-hidden bg-slate-100 border border-slate-200 relative">
                                <img src="{{ $achievement->image_url }}" alt="{{ $achievement->student_name }}" class="w-full h-full object-cover">
                                <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded font-mono text-[10px] font-bold uppercase tracking-wider border {{ $achievement->level_badge_class }}">
                                    {{ $achievement->level }}
                                </span>
                            </div>

                            <div>
                                <h4 class="text-sm font-bold text-slate-950 truncate">{{ $achievement->student_name }}</h4>
                                <span class="text-xs font-mono text-slate-500 block">Kelas: {{ $achievement->class }}</span>
                            </div>

                            <p class="text-xs font-semibold text-slate-800 line-clamp-2 leading-relaxed">
                                {{ $achievement->title }}
                            </p>
                        </div>

                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] font-mono text-slate-500">
                            <span>📅 {{ $achievement->achievement_date->format('M Y') }}</span>
                            <span class="font-bold text-blue-700">TERVERIFIKASI</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-12 rounded-xl bg-slate-50 border border-slate-200 text-center">
                <p class="text-sm text-slate-500 font-mono">Belum ada data prestasi yang ditampilkan.</p>
            </div>
        @endif
    </div>
</section>

<!-- 7. Section 5: Pusat Layanan Terpadu & Hotline (Technical Terminal Frame) -->
<section class="py-16 lg:py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="p-8 sm:p-12 rounded-2xl bg-slate-950 text-white border border-slate-800 bg-tech-grid-dark relative overflow-hidden reveal-init">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative">
                <div class="lg:col-span-8 space-y-4">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-blue-900/60 text-blue-300 font-mono text-[11px] font-bold uppercase tracking-wider border border-blue-700">
                        <span>LAYANAN INFORMASI TERPADU SATU PINTU</span>
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white tracking-tight">
                        Butuh Informasi Khusus Terkait SMKN 1 Ciomas?
                    </h2>
                    <p class="text-sm text-slate-300 leading-relaxed max-w-2xl font-normal">
                        Dapatkan informasi lengkap seputar kurikulum vokasi kejuruan, Bursa Kerja Khusus (BKK), penerimaan peserta didik baru (PPDB), jadwal Uji Kompetensi Keahlian (UKK), atau kunjungan kemitraan industri.
                    </p>
                    <div class="flex flex-wrap items-center gap-4 text-xs font-mono text-slate-400 pt-2">
                        <span>📍 Jl. Raya Laladon, Ciomas, Bogor</span>
                        <span>•</span>
                        <span>📞 (0251) 8632-456</span>
                        <span>•</span>
                        <span>✉️ info@smkn1ciomas.sch.id</span>
                    </div>
                </div>

                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center">
                    <a href="{{ route('pengumuman.index') }}" class="px-5 py-3 rounded-lg bg-white hover:bg-slate-100 text-slate-950 font-mono text-xs font-bold uppercase tracking-wider text-center transition-colors">
                        Cari Arsip Pengumuman &rarr;
                    </a>
                    <a href="{{ route('event.index') }}" class="px-5 py-3 rounded-lg bg-blue-700 hover:bg-blue-600 text-white font-mono text-xs font-bold uppercase tracking-wider text-center transition-colors">
                        Lihat Agenda Kegiatan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
