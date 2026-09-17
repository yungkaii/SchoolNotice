@extends('layouts.app')

@section('title', 'Galeri Prestasi Siswa')
@section('meta_description', 'Rekam jejak torehan prestasi gemilang dan medali kejuaraan siswa SMKN 1 CIOMAS di tingkat kota, provinsi, nasional, hingga internasional.')

@section('content')
<!-- Technical Header Section -->
<div class="relative bg-tech-950 text-white border-b border-tech-800 bg-tech-grid-dark pt-12 pb-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-tech-950/70 via-tech-950/90 to-tech-950 pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb / Institutional Tag -->
        <div class="flex items-center gap-2 mb-4 text-[11px] font-mono tracking-wider text-slate-400 uppercase">
            <span class="inline-block w-2 h-2 bg-amber-500 rounded-xs"></span>
            <span>SMKN 1 CIOMAS</span>
            <span>/</span>
            <span class="text-amber-400">HALL OF FAME & PRESTASI SISWA</span>
        </div>

        <div class="max-w-3xl">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight font-sans">
                Galeri Prestasi & Juara Vokasi
            </h1>
            <p class="text-sm sm:text-base text-slate-300 mt-3 leading-relaxed">
                Torehan medali, piala kejuaraan teknologi, LKS, riset inovasi, dan prestasi kejuaraan karya cipta siswa-siswi terampil SMKN 1 CIOMAS di kancah daerah hingga dunia.
            </p>
        </div>

        <!-- 4-Tile Telemetry Stats Console -->
        <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-3.5 sm:gap-4">
            <!-- Total Prestasi -->
            <div class="p-4 rounded-xl bg-tech-900/90 border border-tech-800 backdrop-blur-md relative overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-amber-500"></div>
                <div class="flex items-baseline justify-between">
                    <span class="text-2xl sm:text-3xl font-mono font-black text-white tracking-tight">{{ $stats['total'] }}</span>
                    <span class="text-xs font-mono text-amber-400 font-semibold">TOTAL</span>
                </div>
                <span class="block text-xs font-medium text-slate-400 mt-1 uppercase tracking-wide">Torehan Kejuaraan</span>
            </div>

            <!-- Internasional -->
            <div class="p-4 rounded-xl bg-tech-900/90 border border-tech-800 backdrop-blur-md relative overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-purple-500"></div>
                <div class="flex items-baseline justify-between">
                    <span class="text-2xl sm:text-3xl font-mono font-black text-purple-400 tracking-tight">{{ $stats['internasional'] }}</span>
                    <span class="text-xs font-mono text-purple-400 font-semibold">GLOBAL</span>
                </div>
                <span class="block text-xs font-medium text-slate-400 mt-1 uppercase tracking-wide">Tingkat Internasional</span>
            </div>

            <!-- Nasional -->
            <div class="p-4 rounded-xl bg-tech-900/90 border border-tech-800 backdrop-blur-md relative overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-cobalt-500"></div>
                <div class="flex items-baseline justify-between">
                    <span class="text-2xl sm:text-3xl font-mono font-black text-cobalt-400 tracking-tight">{{ $stats['nasional'] }}</span>
                    <span class="text-xs font-mono text-cobalt-400 font-semibold">NASIONAL</span>
                </div>
                <span class="block text-xs font-medium text-slate-400 mt-1 uppercase tracking-wide">Tingkat Nasional</span>
            </div>

            <!-- Provinsi -->
            <div class="p-4 rounded-xl bg-tech-900/90 border border-tech-800 backdrop-blur-md relative overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-1 bg-emerald-500"></div>
                <div class="flex items-baseline justify-between">
                    <span class="text-2xl sm:text-3xl font-mono font-black text-emerald-400 tracking-tight">{{ $stats['provinsi'] }}</span>
                    <span class="text-xs font-mono text-emerald-400 font-semibold">PROVINSI</span>
                </div>
                <span class="block text-xs font-medium text-slate-400 mt-1 uppercase tracking-wide">Tingkat Provinsi</span>
            </div>
        </div>

        <!-- Filter & Search Toolbar -->
        <div class="mt-8 pt-6 border-t border-tech-800/80 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Level Filter Tabs -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0 custom-scrollbar">
                <a href="{{ route('prestasi.index', ['q' => $search]) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-mono uppercase tracking-wider font-semibold whitespace-nowrap transition-all {{ empty($level) ? 'bg-amber-500 text-tech-950 font-bold shadow-sm' : 'bg-tech-900 text-slate-300 hover:bg-tech-800 border border-tech-800' }}">
                    Semua Tingkat
                </a>
                @foreach ($levels as $lvl)
                    <a href="{{ route('prestasi.index', ['level' => $lvl, 'q' => $search]) }}" class="px-3.5 py-1.5 rounded-lg text-xs font-mono uppercase tracking-wider font-semibold whitespace-nowrap transition-all {{ $level === $lvl ? 'bg-amber-500 text-tech-950 font-bold shadow-sm' : 'bg-tech-900 text-slate-300 hover:bg-tech-800 border border-tech-800' }}">
                        {{ $lvl }}
                    </a>
                @endforeach
            </div>

            <!-- Search Bar -->
            <form method="GET" action="{{ route('prestasi.index') }}" class="flex items-center gap-2">
                <input type="hidden" name="level" value="{{ $level }}">
                <div class="relative">
                    <input type="text" name="q" value="{{ $search }}" placeholder="Cari nama siswa / kejuaraan..." class="w-full sm:w-64 pl-9 pr-3 py-2 rounded-lg text-xs font-sans bg-tech-900 border border-tech-800 text-white placeholder-slate-500 focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition-all">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <button type="submit" class="px-4 py-2 rounded-lg text-xs font-bold font-mono uppercase text-tech-950 bg-amber-500 hover:bg-amber-400 transition-colors shadow-sm">
                    Cari
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Achievements Grid Showcase -->
<div class="py-12 lg:py-16 bg-slate-50 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($achievements->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach ($achievements as $item)
                    <div class="reveal-init bg-white rounded-xl border border-slate-200 shadow-sm hover:shadow-md hover:border-amber-300 hover:-translate-y-1 transition-all duration-300 flex flex-col group overflow-hidden">
                        <!-- Image Container with Level Badge -->
                        <div class="relative h-52 overflow-hidden bg-tech-950">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            
                            <!-- Level Pill Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-mono font-bold tracking-wider uppercase border shadow-sm backdrop-blur-md {{ $item->level_badge_class }}">
                                    {{ $item->level }}
                                </span>
                            </div>

                            <!-- Date Badge -->
                            <div class="absolute bottom-3 right-3">
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-mono font-semibold bg-tech-950/80 text-slate-300 border border-tech-800 backdrop-blur-md">
                                    {{ $item->achievement_date->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </div>

                        <!-- Content Body -->
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-base font-bold text-slate-900 group-hover:text-amber-600 transition-colors line-clamp-2 leading-snug">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-xs text-slate-600 mt-2 line-clamp-3 leading-relaxed">
                                    {{ $item->description }}
                                </p>
                            </div>

                            <!-- Student Info Stamp -->
                            <div class="pt-4 mt-5 border-t border-slate-100 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-tech-900 text-amber-400 border border-tech-800 flex items-center justify-center font-mono font-bold text-sm shrink-0">
                                    {{ strtoupper(substr($item->student_name, 0, 1)) }}
                                </div>
                                <div class="min-w-0 flex-1">
                                    <span class="block text-xs font-bold text-slate-900 truncate">{{ $item->student_name }}</span>
                                    <div class="flex items-center gap-1.5 mt-0.5">
                                        <span class="text-[11px] font-mono text-slate-500">Kelas:</span>
                                        <span class="px-1.5 py-0.2 rounded-xs text-[10px] font-mono font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                            {{ $item->class }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $achievements->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="py-16 text-center max-w-md mx-auto">
                <div class="w-16 h-16 rounded-xl bg-amber-50 text-amber-600 border border-amber-200 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-slate-900">Tidak ada data prestasi ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">Coba sesuaikan kata kunci pencarian atau bersihkan filter tingkat lomba yang aktif.</p>
                <a href="{{ route('prestasi.index') }}" class="inline-block mt-4 px-4 py-2 rounded-lg text-xs font-mono uppercase font-bold text-tech-950 bg-amber-500 hover:bg-amber-400 transition-colors">
                    Reset Filter
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
