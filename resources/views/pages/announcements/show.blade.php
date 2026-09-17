@extends('layouts.app')

@section('title', $announcement->title)
@section('meta_description', Str::limit(strip_tags($announcement->content), 150))

@section('content')
<!-- Breadcrumbs Bar -->
<div class="bg-slate-50 border-b border-slate-200/80 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500 overflow-x-auto">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('pengumuman.index') }}" class="hover:text-blue-600 transition-colors">Pengumuman</a>
            <span>/</span>
            <span class="text-slate-800 truncate max-w-xs sm:max-w-md">{{ $announcement->title }}</span>
        </nav>
    </div>
</div>

<!-- Main Article Section -->
<div class="py-12 lg:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Left: Article Content -->
            <article class="lg:col-span-8">
                <!-- Category & Dates -->
                <div class="flex flex-wrap items-center gap-3 mb-4">
                    <span class="px-3 py-1 rounded-full text-xs font-bold text-blue-700 bg-blue-50 border border-blue-100">
                        {{ $announcement->category->name ?? 'Pengumuman' }}
                    </span>
                    <span class="text-xs text-slate-400">•</span>
                    <span class="text-xs text-slate-500 font-medium">
                        Diterbitkan: {{ $announcement->published_at ? $announcement->published_at->translatedFormat('l, d F Y') : '-' }}
                    </span>
                    @if ($announcement->expired_at)
                        <span class="text-xs text-slate-400">•</span>
                        <span class="text-xs text-amber-700 font-medium bg-amber-50 px-2.5 py-0.5 rounded-md border border-amber-200">
                            Berlaku s/d: {{ $announcement->expired_at->translatedFormat('d M Y') }}
                        </span>
                    @endif
                </div>

                <!-- Headline -->
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 tracking-tight leading-snug">
                    {{ $announcement->title }}
                </h1>

                <!-- Featured Image -->
                <div class="my-8 rounded-3xl overflow-hidden bg-slate-100 border border-slate-200/80 shadow-md">
                    <img src="{{ $announcement->image_url }}" alt="{{ $announcement->title }}" class="w-full max-h-[460px] object-cover">
                </div>

                <!-- Content Body -->
                <div class="prose prose-slate max-w-none prose-p:leading-relaxed prose-headings:font-bold prose-a:text-blue-600 prose-img:rounded-2xl text-slate-700 space-y-4">
                    {!! $announcement->content !!}
                </div>

                <!-- Share Section -->
                <div class="mt-12 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <span class="text-sm font-bold text-slate-900">Bagikan Pengumuman Ini:</span>
                    <div class="flex items-center gap-2">
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($announcement->title . ' - ' . url()->current()) }}" target="_blank" class="px-4 py-2 rounded-xl text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 transition-colors">
                            WhatsApp
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($announcement->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="px-4 py-2 rounded-xl text-xs font-bold text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
                            Twitter / X
                        </a>
                        <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan pengumuman berhasil disalin!');" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 transition-colors">
                            Salin Tautan
                        </button>
                    </div>
                </div>
            </article>

            <!-- Right Sidebar: Recent Announcements -->
            <aside class="lg:col-span-4 space-y-8">
                <div class="p-6 rounded-3xl bg-slate-50 border border-slate-200/80">
                    <h3 class="text-base font-bold text-slate-900 mb-5 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                        Pengumuman Terkait Lainnya
                    </h3>

                    <div class="space-y-4">
                        @forelse ($recentAnnouncements as $item)
                            <a href="{{ route('pengumuman.show', $item->slug) }}" class="block p-3.5 rounded-2xl bg-white border border-slate-200/60 hover:border-blue-300 hover:shadow-md transition-all group">
                                <span class="text-[11px] font-bold text-blue-600 uppercase">{{ $item->category->name ?? 'Umum' }}</span>
                                <h4 class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-2 mt-1">
                                    {{ $item->title }}
                                </h4>
                                <span class="text-[11px] text-slate-400 block mt-2">
                                    {{ $item->published_at ? $item->published_at->translatedFormat('d M Y') : '-' }}
                                </span>
                            </a>
                        @empty
                            <p class="text-xs text-slate-400">Tidak ada pengumuman lainnya.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Quick Help Card -->
                <div class="p-6 rounded-3xl bg-gradient-to-br from-blue-900 to-indigo-950 text-white shadow-xl">
                    <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h4 class="text-base font-bold">Perlu Bantuan Informasi?</h4>
                    <p class="text-xs text-blue-200 mt-1.5 leading-relaxed">
                        Silakan hubungi bagian Tata Usaha dan Kesiswaan SMKN 1 CIOMAS di jam kerja operasional.
                    </p>
                    <a href="{{ route('tentang.index') }}" class="inline-block mt-4 text-xs font-bold text-white bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-xl transition-colors">
                        Kontak & Layanan Sekolah &rarr;
                    </a>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
