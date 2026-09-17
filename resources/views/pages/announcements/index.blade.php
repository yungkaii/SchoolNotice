@extends('layouts.app')

@section('title', 'Daftar Pengumuman')
@section('meta_description', 'Pusat pengumuman resmi akademik, kesiswaan, beasiswa, dan kelulusan SMKN 1 CIOMAS.')

@section('content')
<!-- Header Page -->
<div class="bg-gradient-to-b from-blue-50/70 to-slate-50 pt-12 pb-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-100/70 px-3 py-1 rounded-md inline-block mb-3">
                Informasi Resmi
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Pusat Pengumuman Sekolah
            </h1>
            <p class="text-base text-slate-600 mt-2 leading-relaxed">
                Seluruh pengumuman penting terkait kegiatan akademik, ketentuan kesiswaan, beasiswa, dan agenda ujian sekolah.
            </p>
        </div>

        <!-- Search & Filter Bar -->
        <form method="GET" action="{{ route('pengumuman.index') }}" class="mt-8 p-4 rounded-2xl bg-white border border-slate-200/80 shadow-sm flex flex-col md:flex-row gap-3">
            <!-- Search Input -->
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="q" value="{{ $search }}" placeholder="Cari judul pengumuman atau kata kunci..." class="w-full pl-10 pr-4 py-2.5 rounded-xl text-sm border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition-all">
            </div>

            <!-- Category Filter Dropdown -->
            <div class="w-full md:w-56">
                <select name="category" class="w-full px-3.5 py-2.5 rounded-xl text-sm border border-slate-200 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition-all">
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
                <select name="sort" class="w-full px-3.5 py-2.5 rounded-xl text-sm border border-slate-200 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition-all">
                    <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Terlama</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition-colors flex items-center justify-center gap-1.5">
                <span>Filter</span>
            </button>
            @if ($search || $categoryId || $sort !== 'newest')
                <a href="{{ route('pengumuman.index') }}" class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-500 hover:bg-slate-100 transition-colors flex items-center justify-center">
                    Reset
                </a>
            @endif
        </form>
    </div>
</div>

<!-- Announcements Grid Section -->
<div class="py-12 lg:py-16 bg-white min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($announcements->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($announcements as $item)
                    <article class="reveal-init bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col group">
                        <div class="relative h-48 overflow-hidden bg-slate-100">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <div class="absolute top-3.5 left-3.5">
                                <span class="px-3 py-1 rounded-full text-xs font-bold text-blue-700 bg-white/95 shadow-sm border border-slate-100 backdrop-blur-md">
                                    {{ $item->category->name ?? 'Pengumuman' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-2 text-xs font-medium text-slate-500 mb-2.5">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ $item->published_at ? $item->published_at->translatedFormat('d F Y') : '-' }}</span>
                                </div>
                                <h2 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug">
                                    <a href="{{ route('pengumuman.show', $item->slug) }}">{{ $item->title }}</a>
                                </h2>
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
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $announcements->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="py-16 text-center max-w-md mx-auto">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Tidak ada pengumuman ditemukan</h3>
                <p class="text-sm text-slate-500 mt-1">Coba sesuaikan kata kunci pencarian atau bersihkan filter kategori.</p>
                <a href="{{ route('pengumuman.index') }}" class="inline-block mt-4 px-4 py-2 rounded-xl text-sm font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 transition-colors">
                    Reset Semua Filter
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
