@extends('layouts.app')

@section('title', 'Kabar & Berita Sekolah')
@section('meta_description', 'Portal warta berita resmi seputar prestasi, inovasi pembelajaran, dan kegiatan siswa SMKN 1 CIOMAS.')

@section('content')
<!-- Header Page -->
<div class="bg-gradient-to-b from-indigo-50/70 to-slate-50 pt-12 pb-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="text-xs font-bold uppercase tracking-wider text-indigo-700 bg-indigo-100/70 px-3 py-1 rounded-md inline-block mb-3">
                Warta & Jurnalistik Sekolah
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                Kabar & Berita Sekolah
            </h1>
            <p class="text-base text-slate-600 mt-2 leading-relaxed">
                Liputan terkini mengenai inovasi riset, torehan prestasi kejuaraan, fasilitas kampus, dan kegiatan sosial siswa.
            </p>
        </div>

        <!-- Search & Filter Bar -->
        <form method="GET" action="{{ route('berita.index') }}" class="mt-8 p-4 rounded-2xl bg-white border border-slate-200/80 shadow-sm flex flex-col md:flex-row gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="q" value="{{ $search }}" placeholder="Cari topik berita atau artikel..." class="w-full pl-10 pr-4 py-2.5 rounded-xl text-sm border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all">
            </div>

            <div class="w-full md:w-64">
                <select name="category" class="w-full px-3.5 py-2.5 rounded-xl text-sm border border-slate-200 bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (string)$categoryId === (string)$cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="px-6 py-2.5 rounded-xl text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm transition-colors flex items-center justify-center">
                Cari Berita
            </button>
            @if ($search || $categoryId)
                <a href="{{ route('berita.index') }}" class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-500 hover:bg-slate-100 transition-colors flex items-center justify-center">
                    Reset
                </a>
            @endif
        </form>
    </div>
</div>

<!-- Featured Article Hero (When no filter is active) -->
@if ($featured)
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6">
        <div class="p-6 sm:p-8 rounded-3xl bg-white border border-slate-200/80 shadow-xl overflow-hidden reveal-init">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 relative h-64 sm:h-80 rounded-2xl overflow-hidden bg-slate-100">
                    <img src="{{ $featured->image_url }}" alt="{{ $featured->title }}" class="w-full h-full object-cover">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold text-indigo-700 bg-white/95 shadow-sm border border-slate-100">
                        Sorotan Utama
                    </span>
                </div>
                <div class="lg:col-span-5 space-y-4">
                    <div class="flex items-center gap-3 text-xs font-semibold text-indigo-600">
                        <span>{{ $featured->category->name ?? 'Berita Utama' }}</span>
                        <span>•</span>
                        <span>{{ $featured->published_at ? $featured->published_at->translatedFormat('d F Y') : '-' }}</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 leading-tight">
                        <a href="{{ route('berita.show', $featured->slug) }}" class="hover:text-indigo-600 transition-colors">{{ $featured->title }}</a>
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed line-clamp-3">
                        {{ $featured->excerpt }}
                    </p>
                    <div class="pt-3 flex items-center justify-between">
                        <span class="text-xs text-slate-400">Oleh {{ $featured->author->name ?? 'Humas Sekolah' }}</span>
                        <a href="{{ route('berita.show', $featured->slug) }}" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 transition-colors shadow-sm">
                            Baca Berita Penuh &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- News Grid Section -->
<div class="py-12 lg:py-16 bg-white min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($news as $item)
                    <article class="reveal-init bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col group">
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
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-2 leading-snug">
                                    <a href="{{ route('berita.show', $item->slug) }}">{{ $item->title }}</a>
                                </h3>
                                <p class="text-sm text-slate-600 mt-2.5 line-clamp-2 leading-relaxed">
                                    {{ $item->excerpt }}
                                </p>
                            </div>

                            <div class="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs text-slate-500 font-medium">Oleh {{ $item->author->name ?? 'Humas' }}</span>
                                <a href="{{ route('berita.show', $item->slug) }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-700">
                                    Baca Artikel &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $news->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="py-16 text-center max-w-md mx-auto">
                <div class="w-16 h-16 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900">Tidak ada berita ditemukan</h3>
                <p class="text-sm text-slate-500 mt-1">Coba sesuaikan kata kunci pencarian Anda atau pilih kategori lain.</p>
                <a href="{{ route('berita.index') }}" class="inline-block mt-4 px-4 py-2 rounded-xl text-sm font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 transition-colors">
                    Lihat Semua Berita
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
