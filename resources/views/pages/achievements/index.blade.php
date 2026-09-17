@extends('layouts.app')

@section('title', 'Galeri Prestasi Siswa')
@section('meta_description', 'Rekam jejak torehan prestasi gemilang siswa SMKN 1 CIOMAS di tingkat kota, provinsi, nasional, hingga internasional.')

@section('content')
<!-- Header Page -->
<div class="bg-gradient-to-b from-amber-50/70 to-slate-50 pt-12 pb-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-xs font-bold uppercase tracking-wider text-amber-800 bg-amber-100 px-3 py-1 rounded-md inline-block mb-3">
                Ruang Prestasi & Kejuaraan
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Galeri Prestasi Siswa
            </h1>
            <p class="text-base text-slate-600 mt-2 leading-relaxed">
                Apresiasi setinggi-tingginya atas kerja keras, dedikasi, dan pencapaian medali putra-putri terbaik SMKN 1 CIOMAS di berbagai bidang kejuruan teknologi, riset, seni, dan olahraga.
            </p>
        </div>

        <!-- Quick Stats Pill Row -->
        <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="p-4 rounded-2xl bg-white border border-slate-200/80 shadow-sm">
                <span class="block text-2xl font-black text-slate-900">{{ $stats['total'] }}</span>
                <span class="block text-xs font-semibold text-slate-500 mt-0.5">Total Prestasi</span>
            </div>
            <div class="p-4 rounded-2xl bg-purple-50 border border-purple-200 shadow-sm">
                <span class="block text-2xl font-black text-purple-700">{{ $stats['internasional'] }}</span>
                <span class="block text-xs font-semibold text-purple-600 mt-0.5">Tingkat Internasional</span>
            </div>
            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 shadow-sm">
                <span class="block text-2xl font-black text-amber-800">{{ $stats['nasional'] }}</span>
                <span class="block text-xs font-semibold text-amber-700 mt-0.5">Tingkat Nasional</span>
            </div>
            <div class="p-4 rounded-2xl bg-blue-50 border border-blue-200 shadow-sm">
                <span class="block text-2xl font-black text-blue-700">{{ $stats['provinsi'] }}</span>
                <span class="block text-xs font-semibold text-blue-600 mt-0.5">Tingkat Provinsi</span>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="mt-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0">
                <a href="{{ route('prestasi.index', ['q' => $search]) }}" class="px-4 py-2 rounded-xl text-xs font-bold whitespace-nowrap transition-all {{ empty($level) ? 'bg-amber-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Semua Tingkat
                </a>
                @foreach ($levels as $lvl)
                    <a href="{{ route('prestasi.index', ['level' => $lvl, 'q' => $search]) }}" class="px-4 py-2 rounded-xl text-xs font-bold whitespace-nowrap transition-all {{ $level === $lvl ? 'bg-amber-600 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                        {{ $lvl }}
                    </a>
                @endforeach
            </div>

            <form method="GET" action="{{ route('prestasi.index') }}" class="flex items-center gap-2">
                <input type="hidden" name="level" value="{{ $level }}">
                <div class="relative">
                    <input type="text" name="q" value="{{ $search }}" placeholder="Cari nama siswa / kejuaraan..." class="w-full sm:w-64 pl-9 pr-3 py-2 rounded-xl text-xs border border-slate-200 bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 outline-none">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <button type="submit" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-amber-600 hover:bg-amber-700 transition-colors">
                    Cari
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Achievements Grid Section -->
<div class="py-12 lg:py-16 bg-white min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($achievements->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($achievements as $item)
                    <div class="reveal-init bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col group">
                        <div class="relative h-48 overflow-hidden bg-slate-100">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <div class="absolute top-3.5 left-3.5">
                                <span class="px-3 py-1 rounded-full text-xs font-bold border shadow-sm backdrop-blur-md {{ $item->level_badge_class }}">
                                    {{ $item->level }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <span class="text-xs font-medium text-slate-400 block mb-2">
                                    {{ $item->achievement_date->translatedFormat('d F Y') }}
                                </span>
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-amber-700 transition-colors line-clamp-2 leading-snug">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-sm text-slate-600 mt-2 line-clamp-2 leading-relaxed">
                                    {{ $item->description }}
                                </p>
                            </div>

                            <div class="pt-5 mt-5 border-t border-slate-100 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-sm shrink-0">
                                    {{ strtoupper(substr($item->student_name, 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <span class="block text-sm font-bold text-slate-900 truncate">{{ $item->student_name }}</span>
                                    <span class="block text-xs font-semibold text-slate-500">Kelas {{ $item->class }}</span>
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
                <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Tidak ada data prestasi ditemukan</h3>
                <p class="text-sm text-slate-500 mt-1">Coba sesuaikan kata kunci atau bersihkan filter tingkat lomba.</p>
                <a href="{{ route('prestasi.index') }}" class="inline-block mt-4 px-4 py-2 rounded-xl text-sm font-semibold text-amber-700 bg-amber-50 hover:bg-amber-100 transition-colors">
                    Reset Filter
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
