@extends('layouts.app')

@section('title', $news->title)
@section('meta_description', Str::limit(strip_tags($news->content), 150))

@section('content')
<!-- Technical Breadcrumbs Bar -->
<div class="bg-slate-100 border-b border-slate-200 py-3 font-mono text-xs text-slate-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-2 overflow-x-auto">
        <a href="{{ route('home') }}" class="hover:text-slate-900 transition-colors">BERANDA</a>
        <span>/</span>
        <a href="{{ route('berita.index') }}" class="hover:text-slate-900 transition-colors">WARTA</a>
        <span>/</span>
        <span class="text-slate-800 font-bold truncate max-w-xs sm:max-w-md uppercase">{{ $news->title }}</span>
    </div>
</div>

<!-- Main Article Section -->
<div class="py-12 lg:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left: Article Body (8 cols) -->
            <article class="lg:col-span-8 space-y-6">
                <!-- Meta Tags -->
                <div class="flex flex-wrap items-center gap-3 text-xs font-mono">
                    <span class="px-2.5 py-1 rounded bg-blue-700 text-white font-bold uppercase text-[11px]">
                        {{ $news->category->name ?? 'Warta Sekolah' }}
                    </span>
                    <span class="text-slate-500">
                        RILIS: {{ $news->published_at ? $news->published_at->translatedFormat('l, d F Y') : '-' }}
                    </span>
                    <span class="text-slate-400">•</span>
                    <span class="text-slate-600 font-semibold">
                        ⏱️ {{ $news->reading_time }} MENIT BACA
                    </span>
                </div>

                <!-- Headline -->
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-950 tracking-tight leading-snug">
                    {{ $news->title }}
                </h1>

                <!-- Author Byline Box -->
                <div class="flex items-center gap-3.5 py-3 px-4 rounded-xl bg-slate-50 border border-slate-200">
                    <div class="w-10 h-10 rounded-lg bg-slate-900 text-white flex items-center justify-center font-bold text-sm shrink-0 border border-slate-800 font-mono">
                        {{ strtoupper(substr($news->author->name ?? 'H', 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <span class="block text-sm font-bold text-slate-900">{{ $news->author->name ?? 'Humas Sekolah' }}</span>
                        <span class="block text-xs text-slate-500 font-mono">Tim Publikasi & Jurnalistik SMKN 1 CIOMAS</span>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="rounded-xl overflow-hidden bg-slate-100 border border-slate-300 shadow-sm">
                    <img src="{{ $news->image_url }}" alt="{{ $news->title }}" class="w-full max-h-[460px] object-cover">
                </div>

                <!-- Content Body -->
                <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed font-sans text-base space-y-4 pt-2">
                    {!! $news->content !!}
                </div>

                <!-- Bottom Back Link -->
                <div class="mt-10 pt-6 border-t border-slate-200 flex items-center justify-between font-mono text-xs">
                    <span class="text-slate-500">Kanal Warta Resmi SMKN 1 Ciomas</span>
                    <a href="{{ route('berita.index') }}" class="text-blue-700 hover:text-blue-900 font-bold uppercase hover:underline">
                        &larr; Kembali ke Indeks Warta
                    </a>
                </div>
            </article>

            <!-- Right: Editorial Desk Sidebar (4 cols) -->
            <aside class="lg:col-span-4 space-y-6 lg:sticky lg:top-24">
                <!-- Redaksi Humas Box -->
                <div class="p-6 rounded-xl bg-slate-50 border border-slate-300 space-y-3 font-mono text-xs">
                    <span class="text-[10px] font-bold uppercase text-slate-400 block">DESK REDAKSI HUMAS</span>
                    <h4 class="text-base font-bold text-slate-900 font-sans tracking-tight">Kemitraan Publikasi & Media</h4>
                    <p class="text-slate-600 font-sans leading-relaxed text-xs">
                        Seluruh berita dan dokumentasi kegiatan diproduksi secara terverifikasi oleh Divisi Hubungan Masyarakat & Publikasi SMKN 1 Ciomas.
                    </p>
                    <div class="pt-2 border-t border-slate-200 text-slate-500 space-y-1">
                        <div>📍 Kampus SMKN 1 Ciomas, Bogor</div>
                        <div>✉️ humas@smkn1ciomas.sch.id</div>
                    </div>
                </div>

                <!-- Quick Navigation to other categories -->
                <div class="p-6 rounded-xl bg-slate-950 text-white border border-slate-800 bg-tech-grid-dark space-y-3">
                    <span class="text-[10px] font-mono text-amber-400 font-bold uppercase">KANAL PENGUMUMAN</span>
                    <h4 class="text-sm font-bold text-white tracking-tight font-sans">Informasi Kedinasan Terkait</h4>
                    <p class="text-xs text-slate-300 font-sans leading-relaxed">
                        Cek juga pengumuman kedinasan resmi mengenai kalender ujian dan ketentuan kesiswaan terkini.
                    </p>
                    <a href="{{ route('pengumuman.index') }}" class="inline-block px-4 py-2 rounded bg-blue-700 hover:bg-blue-600 text-white text-xs font-mono font-bold uppercase transition-colors">
                        Buka Pengumuman &rarr;
                    </a>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
