@extends('layouts.app')

@section('title', $news->title)
@section('meta_description', Str::limit(strip_tags($news->content), 150))

@section('content')
<!-- Breadcrumbs Bar -->
<div class="bg-slate-50 border-b border-slate-200/80 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500 overflow-x-auto">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('berita.index') }}" class="hover:text-blue-600 transition-colors">Berita</a>
            <span>/</span>
            <span class="text-slate-800 truncate max-w-xs sm:max-w-md">{{ $news->title }}</span>
        </nav>
    </div>
</div>

<!-- Main Article Section -->
<div class="py-12 lg:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <article class="lg:col-span-8">
                <!-- Meta Tags -->
                <div class="flex flex-wrap items-center gap-3 mb-4">
                    <span class="px-3 py-1 rounded-full text-xs font-bold text-indigo-700 bg-indigo-50 border border-indigo-100">
                        {{ $news->category->name ?? 'Warta Sekolah' }}
                    </span>
                    <span class="text-xs text-slate-400">•</span>
                    <span class="text-xs text-slate-500 font-medium">
                        {{ $news->published_at ? $news->published_at->translatedFormat('l, d F Y') : '-' }}
                    </span>
                    <span class="text-xs text-slate-400">•</span>
                    <span class="text-xs text-slate-500 font-medium">
                        {{ $news->reading_time }}
                    </span>
                </div>

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight leading-snug">
                    {{ $news->title }}
                </h1>

                <!-- Author byline -->
                <div class="flex items-center gap-3 my-6 py-4 border-y border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center text-white font-bold text-sm">
                        {{ strtoupper(substr($news->author->name ?? 'A', 0, 1)) }}
                    </div>
                    <div>
                        <span class="block text-sm font-bold text-slate-900">{{ $news->author->name ?? 'Humas Sekolah' }}</span>
                        <span class="block text-xs text-slate-500">Tim Publikasi & Media SMKN 1 CIOMAS</span>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="mb-8 rounded-3xl overflow-hidden bg-slate-100 border border-slate-200/80 shadow-md">
                    <img src="{{ $news->image_url }}" alt="{{ $news->title }}" class="w-full max-h-[460px] object-cover">
                </div>

                <!-- Article Body -->
                <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-4">
                    {!! $news->content !!}
                </div>

                <!-- Related News In Category -->
                @if ($relatedNews->count() > 0)
                    <div class="mt-14 pt-10 border-t border-slate-200/80">
                        <h3 class="text-xl font-bold text-slate-900 mb-6">Berita Terkait Lainnya</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            @foreach ($relatedNews as $item)
                                <a href="{{ route('berita.show', $item->slug) }}" class="group block">
                                    <div class="h-32 rounded-xl overflow-hidden bg-slate-100 mb-2.5">
                                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <h4 class="text-xs font-bold text-slate-900 group-hover:text-indigo-600 line-clamp-2 transition-colors">
                                        {{ $item->title }}
                                    </h4>
                                    <span class="text-[11px] text-slate-400 block mt-1">
                                        {{ $item->published_at ? $item->published_at->translatedFormat('d M Y') : '-' }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </article>

            <!-- Sidebar -->
            <aside class="lg:col-span-4 space-y-8">
                <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200/80">
                    <h3 class="text-base font-bold text-slate-900 mb-5 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                        Kabar Berita Terkini
                    </h3>

                    <div class="space-y-4">
                        @forelse ($recentNews as $item)
                            <a href="{{ route('berita.show', $item->slug) }}" class="flex items-start gap-3 p-3 rounded-2xl bg-white border border-slate-200/60 hover:border-indigo-300 hover:shadow-md transition-all group">
                                <div class="w-16 h-16 rounded-xl overflow-hidden bg-slate-100 shrink-0">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-xs font-bold text-slate-800 group-hover:text-indigo-600 transition-colors line-clamp-2">
                                        {{ $item->title }}
                                    </h4>
                                    <span class="text-[10px] text-slate-400 block mt-1">
                                        {{ $item->published_at ? $item->published_at->translatedFormat('d M Y') : '-' }}
                                    </span>
                                </div>
                            </a>
                        @empty
                            <p class="text-xs text-slate-400">Tidak ada berita lainnya.</p>
                        @endforelse
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
