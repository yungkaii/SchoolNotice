@extends('layouts.app')

@section('title', $announcement->title)
@section('meta_description', Str::limit(strip_tags($announcement->content), 150))

@section('content')
<!-- Technical Breadcrumbs Bar -->
<div class="bg-slate-100 border-b border-slate-200 py-3 font-mono text-xs text-slate-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-2 overflow-x-auto">
        <a href="{{ route('home') }}" class="hover:text-slate-900 transition-colors">BERANDA</a>
        <span>/</span>
        <a href="{{ route('pengumuman.index') }}" class="hover:text-slate-900 transition-colors">PENGUMUMAN</a>
        <span>/</span>
        <span class="text-slate-800 font-bold truncate max-w-xs sm:max-w-md uppercase">DOC.{{ str_pad($announcement->id, 4, '0', STR_PAD_LEFT) }}</span>
    </div>
</div>

<!-- Main Document Content Section -->
<div class="py-12 lg:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left: Document Article Content (8 cols) -->
            <article class="lg:col-span-8 space-y-6">
                <!-- Institutional Document Seal Header -->
                <div class="p-4 rounded-lg bg-slate-50 border border-slate-300 flex flex-wrap items-center justify-between gap-3 text-xs font-mono">
                    <div class="flex items-center gap-2 text-slate-700">
                        <span class="w-2 h-2 rounded-full bg-blue-700"></span>
                        <strong class="text-slate-950 font-bold">SMKN 1 CIOMAS</strong>
                        <span class="text-slate-400">|</span>
                        <span>DOKUMEN RESMI</span>
                    </div>
                    <span class="text-slate-500">NO.REF: ED/{{ $announcement->published_at->format('Ymd') }}/{{ str_pad($announcement->id, 3, '0', STR_PAD_LEFT) }}</span>
                </div>

                <!-- Category & Dates -->
                <div class="flex flex-wrap items-center gap-3 text-xs font-mono">
                    <span class="px-2.5 py-1 rounded bg-blue-700 text-white font-bold uppercase text-[11px]">
                        {{ $announcement->category->name ?? 'Pengumuman' }}
                    </span>
                    <span class="text-slate-500">
                        RILIS: {{ $announcement->published_at ? $announcement->published_at->translatedFormat('l, d F Y') : '-' }}
                    </span>
                    @if ($announcement->expired_at)
                        <span class="text-amber-800 font-bold bg-amber-50 px-2 py-0.5 rounded border border-amber-200">
                            BERLAKU S/D: {{ $announcement->expired_at->translatedFormat('d M Y') }}
                        </span>
                    @endif
                </div>

                <!-- Headline -->
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-950 tracking-tight leading-snug">
                    {{ $announcement->title }}
                </h1>

                <!-- Featured Image -->
                <div class="rounded-xl overflow-hidden bg-slate-100 border border-slate-300 shadow-sm">
                    <img src="{{ $announcement->image_url }}" alt="{{ $announcement->title }}" class="w-full max-h-[440px] object-cover">
                </div>

                <!-- Content Body -->
                <div class="prose prose-slate max-w-none prose-p:leading-relaxed prose-headings:font-black text-slate-700 text-base space-y-4 pt-2">
                    {!! $announcement->content !!}
                </div>

                <!-- Share & Verification Note -->
                <div class="mt-10 pt-6 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4 font-mono text-xs">
                    <div class="flex items-center gap-2 text-slate-600">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Informasi ini telah diverifikasi oleh Manajemen SMKN 1 Ciomas</span>
                    </div>
                    <a href="{{ route('pengumuman.index') }}" class="text-blue-700 hover:text-blue-900 font-bold uppercase hover:underline">
                        &larr; Kembali ke Daftar Pengumuman
                    </a>
                </div>
            </article>

            <!-- Right: Technical Sidebar Metadata (4 cols) -->
            <aside class="lg:col-span-4 space-y-6 lg:sticky lg:top-24">
                <!-- Metadata Card -->
                <div class="p-6 rounded-xl bg-slate-50 border border-slate-300 space-y-4">
                    <h3 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-900 border-b border-slate-200 pb-3 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-blue-700"></span>
                        <span>Metadata Pengumuman</span>
                    </h3>

                    <dl class="space-y-3 text-xs font-mono">
                        <div>
                            <dt class="text-slate-400 text-[10px] uppercase">Kategori</dt>
                            <dd class="text-slate-800 font-bold font-sans mt-0.5">{{ $announcement->category->name ?? 'Umum' }}</dd>
                        </div>
                        <div>
                            <dt class="text-slate-400 text-[10px] uppercase">Tanggal Terbit</dt>
                            <dd class="text-slate-800 font-bold mt-0.5">{{ $announcement->published_at->format('d F Y') }}</dd>
                        </div>
                        <div>
                            <dt class="text-slate-400 text-[10px] uppercase">Status Tayang</dt>
                            <dd class="mt-0.5">
                                <span class="inline-block px-2 py-0.5 rounded text-[11px] font-bold uppercase {{ $announcement->status === 'published' ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-200 text-slate-700' }}">
                                    {{ $announcement->status }}
                                </span>
                            </dd>
                        </div>
                        @if($announcement->expired_at)
                            <div>
                                <dt class="text-slate-400 text-[10px] uppercase">Batas Berlaku</dt>
                                <dd class="text-amber-700 font-bold mt-0.5">{{ $announcement->expired_at->format('d F Y') }}</dd>
                            </div>
                        @endif
                    </dl>
                </div>

                <!-- Help Desk Service Card -->
                <div class="p-6 rounded-xl bg-slate-950 text-white border border-slate-800 bg-tech-grid-dark space-y-3">
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-blue-900 text-blue-300 font-bold uppercase">
                        LAYANAN INFORMASI
                    </span>
                    <h4 class="text-base font-bold text-white tracking-tight">Perlu Klarifikasi Informasi?</h4>
                    <p class="text-xs text-slate-300 leading-relaxed font-normal">
                        Silakan hubungi bagian Tata Usaha dan Kesiswaan SMKN 1 CIOMAS di jam kerja operasional.
                    </p>
                    <div class="pt-2 border-t border-slate-800 text-xs font-mono text-slate-400 space-y-1">
                        <div>📞 (0251) 8632-456</div>
                        <div>✉️ info@smkn1ciomas.sch.id</div>
                    </div>
                    <div class="pt-2">
                        <a href="{{ route('pengumuman.index') }}" class="block text-center py-2 px-3 rounded bg-white text-slate-950 text-xs font-mono font-bold uppercase hover:bg-slate-100 transition-colors">
                            &larr; Arsip Pengumuman
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
