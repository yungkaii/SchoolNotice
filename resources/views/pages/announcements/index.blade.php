@extends('layouts.app')

@section('title', 'Daftar Pengumuman')
@section('meta_description', 'Pusat pengumuman resmi akademik, kesiswaan, beasiswa, dan kelulusan SMKN 1 CIOMAS.')

@section('content')
<!-- Technical Header Section -->
<div class="bg-white border-b border-slate-200 py-12 lg:py-16 bg-tech-grid">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-2">
            <span class="text-xs font-mono font-bold uppercase tracking-wider text-blue-700">01 // INFORMASI RESMI</span>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-950 tracking-tight">
                Pusat Pengumuman & Edaran Resmi
            </h1>
            <p class="text-base text-slate-600 leading-relaxed font-normal">
                Pusat publikasi edaran kedinasan, kalender ujian kejuruan (UKK), beasiswa, kelulusan, dan tata tertib siswa SMKN 1 Ciomas.
            </p>
        </div>

        <!-- Technical Filter Toolbar -->
        <form method="GET" action="{{ route('pengumuman.index') }}" class="mt-8 p-4 rounded-xl bg-slate-50 border border-slate-300 shadow-sm flex flex-col md:flex-row gap-3">
            <!-- Search Input -->
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="q" value="{{ $search }}" placeholder="Cari judul pengumuman, nomor surat, atau kata kunci..." class="w-full pl-10 pr-4 py-2.5 rounded-lg text-sm bg-white border border-slate-300 focus:border-blue-700 focus:ring-1 focus:ring-blue-700 outline-none transition-all font-sans">
            </div>

            <!-- Category Filter Dropdown -->
            <div class="w-full md:w-56">
                <select name="category" class="w-full px-3.5 py-2.5 rounded-lg text-sm bg-white border border-slate-300 text-slate-800 focus:border-blue-700 outline-none transition-all font-sans">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (string)$categoryId === (string)$cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Sort Filter -->
            <div class="w-full md:w-44">
                <select name="sort" class="w-full px-3.5 py-2.5 rounded-lg text-sm bg-white border border-slate-300 text-slate-800 focus:border-blue-700 outline-none transition-all font-sans">
                    <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>Rilis Terbaru</option>
                    <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Rilis Terlama</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="px-5 py-2.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-white bg-slate-950 hover:bg-blue-700 transition-colors flex items-center justify-center gap-1.5 shrink-0">
                <span>Filter Data</span>
            </button>
            @if ($search || $categoryId || $sort !== 'newest')
                <a href="{{ route('pengumuman.index') }}" class="px-4 py-2.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-slate-600 hover:bg-slate-200 border border-slate-300 transition-colors flex items-center justify-center shrink-0">
                    Reset
                </a>
            @endif
        </form>
    </div>
</div>

<!-- Announcements Listing Grid -->
<div class="py-14 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($announcements->count() > 0)
            <div class="space-y-4">
                @foreach ($announcements as $announcement)
                    <article class="bg-white rounded-xl border border-slate-200 hover:border-slate-400 p-6 sm:p-7 transition-all shadow-sm flex flex-col md:flex-row gap-6 items-start justify-between">
                        <div class="flex items-start gap-5 min-w-0 flex-1">
                            <!-- Technical Date Stamp Box -->
                            <div class="w-16 h-16 rounded-lg bg-slate-900 text-white flex flex-col items-center justify-center text-center shrink-0 font-mono border border-slate-800">
                                <span class="text-xl font-black leading-none">{{ $announcement->published_at->format('d') }}</span>
                                <span class="text-[10px] uppercase font-bold text-amber-400 mt-1">{{ $announcement->published_at->format('M Y') }}</span>
                            </div>

                            <div class="space-y-2 min-w-0 flex-1">
                                <div class="flex flex-wrap items-center gap-2 text-xs font-mono">
                                    <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 font-bold border border-blue-200 uppercase text-[11px]">
                                        {{ $announcement->category->name ?? 'Umum' }}
                                    </span>
                                    <span class="text-slate-400">•</span>
                                    <span class="text-slate-500">RILIS: {{ $announcement->published_at->translatedFormat('l, d F Y') }}</span>
                                    @if ($announcement->expired_at)
                                        <span class="text-slate-400">•</span>
                                        <span class="text-amber-700 font-medium">Batas: {{ $announcement->expired_at->format('d M Y') }}</span>
                                    @endif
                                </div>

                                <h2 class="text-lg sm:text-xl font-bold text-slate-950 leading-snug">
                                    <a href="{{ route('pengumuman.show', $announcement->slug) }}" class="hover:text-blue-700 transition-colors">
                                        {{ $announcement->title }}
                                    </a>
                                </h2>

                                <p class="text-sm text-slate-600 leading-relaxed font-normal">
                                    {{ $announcement->excerpt }}
                                </p>
                            </div>
                        </div>

                        <div class="flex md:flex-col items-center md:items-end justify-between w-full md:w-auto pt-4 md:pt-0 border-t md:border-t-0 border-slate-100 shrink-0 gap-3">
                            <span class="px-2.5 py-1 rounded text-[11px] font-mono font-bold uppercase {{ $announcement->status === 'published' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-slate-100 text-slate-600 border border-slate-200' }}">
                                {{ $announcement->status }}
                            </span>
                            <a href="{{ route('pengumuman.show', $announcement->slug) }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-xs font-mono font-bold uppercase text-white bg-slate-900 hover:bg-blue-700 transition-colors">
                                <span>BACA DOKUMEN</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination Bar -->
            <div class="mt-10">
                {{ $announcements->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-xl border border-slate-200 p-8">
                <div class="w-12 h-12 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center mx-auto mb-4 border border-slate-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-slate-900">Tidak ada pengumuman ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto font-mono">
                    Coba sesuaikan kata kunci pencarian atau bersihkan filter kategori yang sedang aktif.
                </p>
                <div class="mt-4">
                    <a href="{{ route('pengumuman.index') }}" class="px-4 py-2 rounded-lg bg-slate-900 text-white text-xs font-mono font-bold hover:bg-slate-800 transition-colors">
                        Reset Semua Filter
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
