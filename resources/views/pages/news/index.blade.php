@extends('layouts.app')

@section('title', 'Kabar & Berita Sekolah')
@section('meta_description', 'Portal warta berita resmi seputar prestasi, inovasi pembelajaran, dan kegiatan siswa SMKN 1 CIOMAS.')

@section('content')
<!-- Technical Header Section -->
<div class="bg-white border-b border-slate-200 py-12 lg:py-16 bg-tech-grid">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-2">
            <span class="text-xs font-mono font-bold uppercase tracking-wider text-blue-700">03 // WARTA & DOKUMENTASI</span>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-950 tracking-tight">
                Kabar Kejuruan & Warta Sekolah
            </h1>
            <p class="text-base text-slate-600 leading-relaxed font-normal">
                Liputan terkini seputar inovasi karya siswa, kemitraan dunia usaha & dunia industri (DUDI), fasilitas bengkel praktik, dan kegiatan kampus SMKN 1 Ciomas.
            </p>
        </div>

        <!-- Search & Filter Toolbar -->
        <form method="GET" action="{{ route('berita.index') }}" class="mt-8 p-4 rounded-xl bg-slate-50 border border-slate-300 shadow-sm flex flex-col md:flex-row gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="q" value="{{ $search }}" placeholder="Cari topik artikel, riset teknologi, atau nama narasumber..." class="w-full pl-10 pr-4 py-2.5 rounded-lg text-sm bg-white border border-slate-300 focus:border-blue-700 outline-none font-sans">
            </div>

            <div class="w-full md:w-64">
                <select name="category" class="w-full px-3.5 py-2.5 rounded-lg text-sm bg-white border border-slate-300 text-slate-800 focus:border-blue-700 outline-none font-sans">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (string)$categoryId === (string)$cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="px-5 py-2.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-white bg-slate-950 hover:bg-blue-700 transition-colors flex items-center justify-center shrink-0">
                Filter Warta
            </button>
            @if ($search || $categoryId)
                <a href="{{ route('berita.index') }}" class="px-4 py-2.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-slate-600 hover:bg-slate-200 border border-slate-300 transition-colors flex items-center justify-center shrink-0">
                    Reset
                </a>
            @endif
        </form>
    </div>
</div>

<!-- Featured Article Banner (if available and no filter) -->
@if ($featured)
    <div class="bg-slate-50 pt-10 pb-4 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-6 sm:p-8 rounded-xl bg-white border border-slate-300 shadow-sm reveal-init">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-6 rounded-lg overflow-hidden bg-slate-100 border border-slate-200 h-64 sm:h-80">
                        <img src="{{ $featured->image_url }}" alt="{{ $featured->title }}" class="w-full h-full object-cover">
                    </div>
                    <div class="lg:col-span-6 space-y-3">
                        <div class="flex items-center gap-2 text-xs font-mono text-slate-500">
                            <span class="px-2.5 py-0.5 rounded bg-blue-700 text-white font-bold uppercase text-[10px]">
                                {{ $featured->category->name ?? 'Sorotan Utama' }}
                            </span>
                            <span>•</span>
                            <span>{{ $featured->published_at->format('d M Y') }}</span>
                            <span>•</span>
                            <span>⏱️ {{ $featured->reading_time }} mnt</span>
                        </div>

                        <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-slate-950 tracking-tight leading-snug">
                            <a href="{{ route('berita.show', $featured->slug) }}" class="hover:text-blue-700 transition-colors">
                                {{ $featured->title }}
                            </a>
                        </h2>

                        <p class="text-sm text-slate-600 leading-relaxed font-normal">
                            {{ $featured->excerpt }}
                        </p>

                        <div class="pt-3">
                            <a href="{{ route('berita.show', $featured->slug) }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg text-xs font-mono font-bold uppercase text-white bg-slate-950 hover:bg-blue-700 transition-colors">
                                <span>BACA LIPUTAN LENGKAP</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Regular News Articles Grid -->
<div class="py-14 bg-slate-50 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($news->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($news as $item)
                    <article class="rounded-xl border border-slate-200 bg-white hover:border-slate-400 p-5 transition-all shadow-sm flex flex-col justify-between space-y-4">
                        <div class="space-y-3">
                            <div class="h-48 w-full rounded-lg overflow-hidden bg-slate-100 border border-slate-200 relative">
                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded font-mono text-[10px] font-bold uppercase tracking-wider bg-slate-950 text-white">
                                    {{ $item->category->name ?? 'Warta' }}
                                </span>
                            </div>

                            <div class="flex items-center gap-2 text-[11px] font-mono text-slate-500">
                                <span>📅 {{ $item->published_at->format('d M Y') }}</span>
                                <span>•</span>
                                <span>⏱️ {{ $item->reading_time }} mnt</span>
                            </div>

                            <h3 class="text-base font-bold text-slate-950 line-clamp-2 leading-snug">
                                <a href="{{ route('berita.show', $item->slug) }}" class="hover:text-blue-700 transition-colors">
                                    {{ $item->title }}
                                </a>
                            </h3>

                            <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed">
                                {{ Str::limit(strip_tags($item->content), 100) }}
                            </p>
                        </div>

                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-mono">
                            <span class="text-slate-500 font-bold truncate max-w-[150px]">{{ $item->author->name ?? 'Humas' }}</span>
                            <a href="{{ route('berita.show', $item->slug) }}" class="text-blue-700 hover:text-blue-900 font-bold uppercase">
                                BACA &rarr;
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination Bar -->
            <div class="mt-10">
                {{ $news->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-xl border border-slate-200 p-8">
                <div class="w-12 h-12 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center mx-auto mb-4 border border-slate-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <h3 class="text-base font-bold text-slate-900">Tidak ada artikel berita ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto font-mono">
                    Belum ada publikasi berita yang sesuai dengan pencarian atau filter kategori Anda.
                </p>
                <div class="mt-4">
                    <a href="{{ route('berita.index') }}" class="px-4 py-2 rounded-lg bg-slate-900 text-white text-xs font-mono font-bold hover:bg-slate-800 transition-colors">
                        Reset Filter
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
