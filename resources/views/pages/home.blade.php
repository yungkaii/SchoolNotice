@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section: Split Technical Console -->
<section class="relative bg-white border-b border-slate-200 py-16 lg:py-24 bg-tech-grid overflow-hidden">
    <!-- Ambient Lighting Effects -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Hero Identity & Headline (7 cols) -->
            <div class="lg:col-span-7 space-y-6 reveal-init">
                <div class="inline-flex items-center gap-2.5 px-3 py-1.5 rounded-full bg-slate-900 text-white font-mono text-xs font-bold tracking-wider uppercase border border-slate-800 shadow-sm">
                    <img src="{{ asset('images/logoskanic2.png') }}" alt="Logo SMKN 1 Ciomas" class="w-4 h-4 object-contain">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>SMKN 1 CIOMAS • PUSAT KEUNGGULAN</span>
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
                    <a href="{{ route('pengumuman.index') }}" class="px-6 py-3 rounded-xl bg-slate-950 hover:bg-blue-800 text-white font-mono text-xs font-bold uppercase tracking-wider border border-slate-800 hover-lift transition-all flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                        <span>Telusuri Pengumuman</span>
                    </a>
                    <a href="{{ route('event.index') }}" class="px-6 py-3 rounded-xl bg-white hover:bg-slate-50 text-slate-800 font-mono text-xs font-bold uppercase tracking-wider border border-slate-300 hover-lift transition-all flex items-center gap-2 shadow-xs">
                        <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Kalender Agenda</span>
                    </a>
                </div>

                <!-- Trust Micro-Badges Bar -->
                <div class="pt-6 border-t border-slate-200/90 grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs font-mono text-slate-600">
                    <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200/80">
                        <span class="text-amber-500 font-bold">✓</span>
                        <span>AKREDITASI "A"</span>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200/80">
                        <span class="text-blue-500 font-bold">✓</span>
                        <span>5 KEAHLIAN</span>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200/80">
                        <span class="text-emerald-500 font-bold">✓</span>
                        <span>MITRA DUDI</span>
                    </div>
                    <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200/80">
                        <span class="text-purple-500 font-bold">✓</span>
                        <span>LSP-P1 TEKNIS</span>
                    </div>
                </div>
            </div>

            <!-- Right Telemetry Panel / Statistical Readout (5 cols) -->
            <div class="lg:col-span-5 reveal-init reveal-delay-1">
                <div class="rounded-2xl bg-slate-950 text-white p-6 sm:p-8 border border-slate-800 shadow-2xl bg-tech-grid-dark relative overflow-hidden hover-lift-dark transition-all">
                    <!-- Top Accent Gradient Stripe -->
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 via-amber-400 to-emerald-400"></div>

                    <div class="flex items-center justify-between pb-5 border-b border-slate-800">
                        <div class="flex items-center gap-2">
                            <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></div>
                            <span class="text-xs font-mono font-bold tracking-wider uppercase text-slate-300">TELEMETRI SISTEM VOKASI</span>
                        </div>
                        <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-slate-900 border border-slate-700 text-slate-400">ONLINE</span>
                    </div>

                    <!-- Counter Grid -->
                    <div class="grid grid-cols-2 gap-4 py-6 border-b border-slate-800">
                        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-slate-700 transition-colors">
                            <span class="block text-[10px] font-mono font-bold text-slate-400 uppercase">Pengumuman</span>
                            <span class="block text-3xl sm:text-4xl font-black font-mono text-white mt-1" data-counter-target="{{ $stats['announcements'] }}">0</span>
                            <span class="block text-[11px] font-mono text-blue-400 mt-1">Rilis Kedinasan</span>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-slate-700 transition-colors">
                            <span class="block text-[10px] font-mono font-bold text-slate-400 uppercase">Agenda Aktif</span>
                            <span class="block text-3xl sm:text-4xl font-black font-mono text-amber-400 mt-1" data-counter-target="{{ $stats['events'] }}">0</span>
                            <span class="block text-[11px] font-mono text-amber-300 mt-1">Jadwal Mendatang</span>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-slate-700 transition-colors">
                            <span class="block text-[10px] font-mono font-bold text-slate-400 uppercase">Warta Berita</span>
                            <span class="block text-3xl sm:text-4xl font-black font-mono text-white mt-1" data-counter-target="{{ $stats['news'] }}">0</span>
                            <span class="block text-[11px] font-mono text-slate-400 mt-1">Dokumentasi</span>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-slate-700 transition-colors">
                            <span class="block text-[10px] font-mono font-bold text-slate-400 uppercase">Rekor Juara</span>
                            <span class="block text-3xl sm:text-4xl font-black font-mono text-emerald-400 mt-1" data-counter-target="{{ $stats['achievements'] }}">0</span>
                            <span class="block text-[11px] font-mono text-emerald-300 mt-1">Prestasi Siswa</span>
                        </div>
                    </div>

                    <div class="pt-4 flex items-center justify-between text-[11px] font-mono text-slate-400">
                        <span>Pembaruan: {{ now()->translatedFormat('d F Y') }}</span>
                        <a href="{{ route('prestasi.index') }}" class="text-blue-400 hover:text-blue-300 font-bold hover:underline inline-flex items-center gap-1">
                            <span>Semua Prestasi</span>
                            <span>&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Flagship Majors Showcase Grid -->
<section class="py-12 bg-white border-b border-slate-200 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 pb-3 border-b border-slate-200/80 gap-3">
            <div>
                <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-blue-700 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span>
                    <span>PROGRAM VOKASI UNGGULAN</span>
                </span>
                <h2 class="text-xl sm:text-2xl font-black text-slate-950 tracking-tight mt-1">
                    5 Konsentrasi Keahlian SMKN 1 Ciomas
                </h2>
            </div>
            <span class="text-xs font-mono text-slate-500">Berbasis Kurikulum Industri & Standar LSP-P1</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <!-- 1. PPLG -->
            <div class="p-5 rounded-2xl bg-slate-50 hover:bg-white border border-slate-200 hover:border-blue-500 hover-lift shadow-xs group transition-all">
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-lg mb-3.5 group-hover:bg-blue-600 group-hover:text-white transition-colors shadow-2xs">
                    💻
                </div>
                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase bg-blue-50 text-blue-700 border border-blue-200 mb-2">PPLG</span>
                <h3 class="text-sm font-bold text-slate-900 group-hover:text-blue-700 transition-colors leading-snug">Pengembangan Perangkat Lunak & Gim</h3>
                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Software, Web, Mobile App & Game Development</p>
            </div>

            <!-- 2. BCF -->
            <div class="p-5 rounded-2xl bg-slate-50 hover:bg-white border border-slate-200 hover:border-rose-500 hover-lift shadow-xs group transition-all">
                <div class="w-10 h-10 rounded-xl bg-rose-100 text-rose-700 flex items-center justify-center font-bold text-lg mb-3.5 group-hover:bg-rose-600 group-hover:text-white transition-colors shadow-2xs">
                    🎥
                </div>
                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase bg-rose-50 text-rose-700 border border-rose-200 mb-2">BCF</span>
                <h3 class="text-sm font-bold text-slate-900 group-hover:text-rose-700 transition-colors leading-snug">Broadcasting & Perfilman</h3>
                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Sinematografi, Produksi Audio Visual & Live Broadcast</p>
            </div>

            <!-- 3. Animasi -->
            <div class="p-5 rounded-2xl bg-slate-50 hover:bg-white border border-slate-200 hover:border-purple-500 hover-lift shadow-xs group transition-all">
                <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center font-bold text-lg mb-3.5 group-hover:bg-purple-600 group-hover:text-white transition-colors shadow-2xs">
                    🎨
                </div>
                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase bg-purple-50 text-purple-700 border border-purple-200 mb-2">ANIMASI</span>
                <h3 class="text-sm font-bold text-slate-900 group-hover:text-purple-700 transition-colors leading-snug">Animasi Digital 2D & 3D</h3>
                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Concept Art, 3D Modeling & Visual Effects</p>
            </div>

            <!-- 4. Teknik Otomotif -->
            <div class="p-5 rounded-2xl bg-slate-50 hover:bg-white border border-slate-200 hover:border-amber-500 hover-lift shadow-xs group transition-all">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold text-lg mb-3.5 group-hover:bg-amber-600 group-hover:text-white transition-colors shadow-2xs">
                    🚗
                </div>
                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase bg-amber-50 text-amber-700 border border-amber-200 mb-2">OTOMOTIF</span>
                <h3 class="text-sm font-bold text-slate-900 group-hover:text-amber-700 transition-colors leading-snug">Teknik Otomotif</h3>
                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">Perawatan Kendaraan Modern & Teknologi Ototronik</p>
            </div>

            <!-- 5. Teknik Pengelasan -->
            <div class="p-5 rounded-2xl bg-slate-50 hover:bg-white border border-slate-200 hover:border-teal-500 hover-lift shadow-xs group transition-all">
                <div class="w-10 h-10 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center font-bold text-lg mb-3.5 group-hover:bg-teal-600 group-hover:text-white transition-colors shadow-2xs">
                    ⚡
                </div>
                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase bg-teal-50 text-teal-700 border border-teal-200 mb-2">PENGELASAN</span>
                <h3 class="text-sm font-bold text-slate-900 group-hover:text-teal-700 transition-colors leading-snug">Teknik Pengelasan & Logam</h3>
                <p class="text-[11px] text-slate-500 mt-1.5 leading-relaxed">SMAW, GTAW, GMAW & Fabrikasi Konstruksi Logam</p>
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
                    <div class="flex-1 bg-white rounded-2xl border border-slate-200/90 p-6 sm:p-8 flex flex-col justify-between hover:border-blue-500 hover:shadow-xl transition-all duration-300 hover-lift relative overflow-hidden group">
                        <!-- Top Accent Line -->
                        <div class="h-1.5 w-full bg-gradient-to-r from-blue-600 via-indigo-600 to-sky-500 absolute top-0 left-0"></div>
                        <div class="absolute -right-16 -top-16 w-48 h-48 bg-blue-500/5 rounded-full blur-2xl pointer-events-none"></div>

                        <div class="space-y-4 pt-1">
                            <div class="flex flex-wrap items-center justify-between gap-3 text-xs font-mono">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-blue-700 font-bold uppercase tracking-wider text-[11px] border border-blue-200/60 shadow-2xs">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span>
                                    <span>{{ $featured->category->name ?? 'Pengumuman' }}</span>
                                </span>
                                <span class="text-slate-500 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>TAYANG: {{ $featured->published_at->format('d M Y') }}</span>
                                </span>
                            </div>

                            <h3 class="text-xl sm:text-2xl font-black text-slate-950 tracking-tight leading-snug">
                                <a href="{{ route('pengumuman.show', $featured->slug) }}" class="group-hover:text-blue-700 transition-colors">
                                    {{ $featured->title }}
                                </a>
                            </h3>

                            <p class="text-sm text-slate-600 leading-relaxed font-normal">
                                {{ $featured->excerpt }}
                            </p>
                        </div>

                        <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between">
                            @if($featured->expired_at)
                                <span class="text-xs font-mono text-slate-500 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Berlaku s/d: <strong class="text-slate-800">{{ $featured->expired_at->format('d M Y') }}</strong></span>
                                </span>
                            @else
                                <span class="text-xs font-mono text-emerald-600 font-semibold flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                    <span>Berlaku Terbuka</span>
                                </span>
                            @endif
                            <a href="{{ route('pengumuman.show', $featured->slug) }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg bg-slate-900 group-hover:bg-blue-600 text-white text-xs font-mono font-bold uppercase transition-colors shadow-2xs">
                                <span>BACA EDARAN</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right: Stacked Vertical Notice Stream (5 cols) -->
                <div class="lg:col-span-5 space-y-4 flex flex-col justify-between reveal-init reveal-delay-1">
                    @forelse($announcements->skip(1) as $announcement)
                        <div class="bg-white rounded-2xl border border-slate-200/90 p-4 sm:p-5 hover:border-blue-500 hover:shadow-md transition-all duration-300 flex items-start gap-4 hover-lift group">
                            <!-- Technical Date Stamp Box -->
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200/90 flex flex-col items-center justify-center text-center shrink-0 font-mono group-hover:border-blue-300 group-hover:from-blue-50/50 group-hover:to-blue-50/20 transition-colors shadow-2xs">
                                <span class="text-base font-black text-slate-900 group-hover:text-blue-700 leading-none transition-colors">{{ $announcement->published_at->format('d') }}</span>
                                <span class="text-[10px] uppercase font-bold text-slate-500 mt-0.5">{{ $announcement->published_at->format('M') }}</span>
                            </div>

                            <div class="min-w-0 flex-1 space-y-1">
                                <div class="flex items-center gap-2 text-[10px] font-mono">
                                    <span class="font-bold text-blue-700 uppercase">{{ $announcement->category->name ?? 'Info' }}</span>
                                    <span class="text-slate-300">•</span>
                                    <span class="text-slate-500">{{ $announcement->published_at->format('Y') }}</span>
                                </div>
                                <h4 class="text-sm font-bold text-slate-900 truncate leading-snug">
                                    <a href="{{ route('pengumuman.show', $announcement->slug) }}" class="group-hover:text-blue-700 transition-colors">
                                        {{ $announcement->title }}
                                    </a>
                                </h4>
                                <p class="text-xs text-slate-500 truncate">
                                    {{ Str::limit(strip_tags($announcement->content), 80) }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="p-8 rounded-2xl bg-white border border-slate-200 text-center text-xs text-slate-500 font-mono">
                            Belum ada pengumuman tambahan.
                        </div>
                    @endforelse

                    <div class="p-4 sm:p-5 rounded-2xl bg-slate-950 text-white flex items-center justify-between border border-slate-800 shadow-md relative overflow-hidden">
                        <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-blue-600/10 rounded-full blur-xl pointer-events-none"></div>
                        <div class="space-y-0.5 relative">
                            <span class="text-[11px] font-mono text-amber-400 font-bold block">PENGUMUMAN LAINNYA</span>
                            <span class="text-xs text-slate-300 block">Arsip dan dokumen edaran akademik lengkap</span>
                        </div>
                        <a href="{{ route('pengumuman.index') }}" class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-500 text-xs font-mono font-bold text-white transition-all shadow-md relative shrink-0">
                            Buka Arsip &rarr;
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="p-12 rounded-2xl bg-white border border-slate-200 text-center">
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
            <div class="mb-10 p-6 sm:p-8 rounded-3xl bg-slate-950 text-white border border-slate-800/80 bg-tech-grid-dark shadow-2xl shadow-slate-950/20 relative overflow-hidden reveal-init">
                <div class="absolute -right-16 -top-16 w-60 h-60 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center relative">
                    <div class="lg:col-span-6 space-y-3">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 text-amber-400 font-mono text-[11px] font-bold uppercase tracking-wider border border-amber-500/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-ping"></span>
                            <span>EVENT TERDEKAT MENDATANG</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight">
                            <a href="{{ route('event.show', $nearestEvent->slug) }}" class="hover:text-amber-400 transition-colors">
                                {{ $nearestEvent->title }}
                            </a>
                        </h3>
                        <div class="flex flex-wrap items-center gap-4 text-xs font-mono text-slate-300 pt-1">
                            <span class="flex items-center gap-1.5">📅 {{ $nearestEvent->event_date->format('d M Y') }}</span>
                            <span class="flex items-center gap-1.5">🕒 {{ $nearestEvent->formatted_time }}</span>
                            <span class="flex items-center gap-1.5">📍 {{ $nearestEvent->location }}</span>
                        </div>
                    </div>

                    <!-- Digital Split Countdown Block -->
                    <div class="lg:col-span-6 flex justify-start lg:justify-end" 
                         data-countdown-date="{{ $nearestEvent->event_date->format('Y-m-d') }} {{ $nearestEvent->start_time }}">
                        <div class="grid grid-cols-4 gap-2 sm:gap-3 text-center font-mono">
                            <div class="px-3 py-3 rounded-xl bg-slate-900/90 border border-slate-700/60 backdrop-blur-sm min-w-[65px] sm:min-w-[80px] shadow-inner">
                                <span class="cd-days block text-2xl sm:text-3xl font-black text-amber-400">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 font-bold block mt-1">HARI</span>
                            </div>
                            <div class="px-3 py-3 rounded-xl bg-slate-900/90 border border-slate-700/60 backdrop-blur-sm min-w-[65px] sm:min-w-[80px] shadow-inner">
                                <span class="cd-hours block text-2xl sm:text-3xl font-black text-white">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 font-bold block mt-1">JAM</span>
                            </div>
                            <div class="px-3 py-3 rounded-xl bg-slate-900/90 border border-slate-700/60 backdrop-blur-sm min-w-[65px] sm:min-w-[80px] shadow-inner">
                                <span class="cd-minutes block text-2xl sm:text-3xl font-black text-white">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 font-bold block mt-1">MENIT</span>
                            </div>
                            <div class="px-3 py-3 rounded-xl bg-slate-900/90 border border-slate-700/60 backdrop-blur-sm min-w-[65px] sm:min-w-[80px] shadow-inner">
                                <span class="cd-seconds block text-2xl sm:text-3xl font-black text-amber-400">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 font-bold block mt-1">DETIK</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Structured Horizontal Event Timeline Rows -->
            <div class="space-y-3.5 reveal-init reveal-delay-1">
                @foreach($events as $event)
                    <div class="bg-white hover:bg-slate-50/80 rounded-2xl border border-slate-200/90 hover:border-amber-400/80 p-4 sm:p-5 transition-all duration-300 flex flex-col md:flex-row md:items-center justify-between gap-4 hover-lift shadow-xs hover:shadow-md group">
                        <div class="flex items-start sm:items-center gap-4 min-w-0">
                            <!-- Date Stamp -->
                            <div class="w-16 h-16 rounded-xl bg-slate-950 text-white flex flex-col items-center justify-center font-mono shrink-0 border border-slate-800 shadow-sm group-hover:border-amber-500/50 transition-colors">
                                <span class="text-xl font-black leading-none text-white">{{ $event->event_date->format('d') }}</span>
                                <span class="text-[10px] uppercase font-bold text-amber-400 mt-1">{{ $event->event_date->format('M Y') }}</span>
                            </div>

                            <div class="min-w-0 space-y-1">
                                <div class="flex flex-wrap items-center gap-2 text-[11px] font-mono">
                                    <span class="text-slate-600 font-semibold">🕒 {{ $event->formatted_time }}</span>
                                    <span class="text-slate-300">•</span>
                                    <span class="text-slate-600 font-semibold">📍 {{ $event->location }}</span>
                                    <span class="text-slate-300">•</span>
                                    <span class="text-blue-700 font-semibold">PIC: {{ $event->person_in_charge }}</span>
                                </div>
                                <h4 class="text-base font-bold text-slate-900 truncate">
                                    <a href="{{ route('event.show', $event->slug) }}" class="group-hover:text-blue-700 transition-colors">
                                        {{ $event->title }}
                                    </a>
                                </h4>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 shrink-0 self-end md:self-center">
                            @if($event->status === 'upcoming')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-200/60 font-mono text-xs font-bold uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                    <span>Akan Datang</span>
                                </span>
                            @elseif($event->status === 'ongoing')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-50 text-amber-700 border border-amber-200/60 font-mono text-xs font-bold uppercase">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-ping"></span>
                                    <span>Sedang Berlangsung</span>
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-slate-100 text-slate-600 border border-slate-200 font-mono text-xs font-bold uppercase">
                                    Selesai
                                </span>
                            @endif

                            <a href="{{ route('event.show', $event->slug) }}" class="p-2.5 text-slate-500 hover:text-amber-600 border border-slate-200 rounded-xl hover:bg-white hover:border-amber-300 transition-all shadow-2xs" title="Rincian Agenda">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-12 rounded-2xl bg-slate-50 border border-slate-200 text-center">
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
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Left: Hero Magazine Feature (7 cols) -->
                @php $mainArticle = $news->first(); @endphp
                <div class="lg:col-span-7 flex flex-col reveal-init">
                    <div class="bg-white rounded-xl border border-slate-300 overflow-hidden flex flex-col hover:border-slate-400 transition-colors shadow-sm">
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
                <div class="lg:col-span-5 space-y-4 flex flex-col reveal-init reveal-delay-1">
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
                    <div class="rounded-2xl border border-slate-200/90 bg-white p-5 hover:border-emerald-500 hover:shadow-xl transition-all duration-300 flex flex-col justify-between space-y-4 hover-lift group">
                        <div class="space-y-3">
                            <!-- Student Photo Card -->
                            <div class="h-48 w-full rounded-xl overflow-hidden bg-slate-100 border border-slate-200/80 relative">
                                <img src="{{ $achievement->image_url }}" alt="{{ $achievement->student_name }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full font-mono text-[10px] font-bold uppercase tracking-wider backdrop-blur-md border shadow-2xs {{ $achievement->level_badge_class }}">
                                    {{ $achievement->level }}
                                </span>
                            </div>

                            <div>
                                <h4 class="text-sm font-bold text-slate-950 truncate">{{ $achievement->student_name }}</h4>
                                <span class="text-xs font-mono text-slate-500 block mt-0.5">Kelas: {{ $achievement->class }}</span>
                            </div>

                            <p class="text-xs font-semibold text-slate-800 line-clamp-2 leading-relaxed group-hover:text-emerald-700 transition-colors">
                                {{ $achievement->title }}
                            </p>
                        </div>

                        <div class="pt-3.5 border-t border-slate-100 flex items-center justify-between text-[11px] font-mono text-slate-500">
                            <span>📅 {{ $achievement->achievement_date->format('M Y') }}</span>
                            <span class="inline-flex items-center gap-1 font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/60">
                                <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>TERVERIFIKASI</span>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-12 rounded-2xl bg-slate-50 border border-slate-200 text-center">
                <p class="text-sm text-slate-500 font-mono">Belum ada data prestasi yang ditampilkan.</p>
            </div>
        @endif
    </div>
</section>

<!-- 7. Section 5: Pusat Layanan Terpadu & Hotline (Technical Terminal Frame) -->
<section class="py-16 lg:py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="p-8 sm:p-12 rounded-3xl bg-slate-950 text-white border border-slate-800/90 bg-tech-grid-dark relative overflow-hidden shadow-2xl shadow-blue-950/30 reveal-init">
            <!-- Ambient Glow Radiance -->
            <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative">
                <div class="lg:col-span-8 space-y-4">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-blue-900/60 text-blue-300 font-mono text-[11px] font-bold uppercase tracking-wider border border-blue-700/60">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-400 animate-pulse"></span>
                        <span>LAYANAN INFORMASI TERPADU SATU PINTU</span>
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white tracking-tight">
                        Butuh Informasi Khusus Terkait SMKN 1 Ciomas?
                    </h2>
                    <p class="text-sm text-slate-300 leading-relaxed max-w-2xl font-normal">
                        Dapatkan informasi lengkap seputar kurikulum vokasi kejuruan, Bursa Kerja Khusus (BKK), penerimaan peserta didik baru (PPDB), jadwal Uji Kompetensi Keahlian (UKK), atau kemitraan industri.
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
                        <div class="p-3 rounded-xl bg-slate-900/80 border border-slate-800 backdrop-blur-sm flex items-center gap-2.5 text-xs font-mono text-slate-300">
                            <span>📍</span>
                            <span class="truncate">Jl. Laladon, Ciomas</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-900/80 border border-slate-800 backdrop-blur-sm flex items-center gap-2.5 text-xs font-mono text-slate-300">
                            <span>📞</span>
                            <span class="truncate">(0251) 8632-456</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-900/80 border border-slate-800 backdrop-blur-sm flex items-center gap-2.5 text-xs font-mono text-slate-300">
                            <span>✉️</span>
                            <span class="truncate">info@smkn1ciomas.sch.id</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3.5 justify-center">
                    <a href="{{ route('pengumuman.index') }}" class="px-6 py-3.5 rounded-xl bg-white hover:bg-slate-100 text-slate-950 font-mono text-xs font-bold uppercase tracking-wider text-center transition-all shadow-lg hover:shadow-xl">
                        Cari Arsip Pengumuman &rarr;
                    </a>
                    <a href="{{ route('event.index') }}" class="px-6 py-3.5 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-mono text-xs font-bold uppercase tracking-wider text-center transition-all shadow-lg hover:shadow-xl shadow-blue-600/30">
                        Lihat Agenda Kegiatan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
