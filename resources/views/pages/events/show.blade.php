@extends('layouts.app')

@section('title', $event->title)
@section('meta_description', Str::limit(strip_tags($event->description), 150))

@section('content')
<!-- Technical Breadcrumbs Bar -->
<div class="bg-slate-100 border-b border-slate-200 py-3 font-mono text-xs text-slate-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-2 overflow-x-auto">
        <a href="{{ route('home') }}" class="hover:text-slate-900 transition-colors">BERANDA</a>
        <span>/</span>
        <a href="{{ route('event.index') }}" class="hover:text-slate-900 transition-colors">AGENDA</a>
        <span>/</span>
        <span class="text-slate-800 font-bold truncate max-w-xs sm:max-w-md uppercase">{{ $event->title }}</span>
    </div>
</div>

<!-- Main Event Section -->
<div class="py-12 lg:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left: Event Details (8 cols) -->
            <div class="lg:col-span-8 space-y-8">
                <div class="space-y-3">
                    <div class="flex items-center gap-2 font-mono text-xs">
                        <span class="px-2.5 py-1 rounded font-bold uppercase tracking-wider {{ $event->status === 'upcoming' ? 'bg-blue-100 text-blue-800 border border-blue-200' : ($event->status === 'ongoing' ? 'bg-amber-100 text-amber-800 border border-amber-200 animate-pulse' : 'bg-slate-100 text-slate-700 border border-slate-200') }}">
                            STATUS: {{ $event->status === 'upcoming' ? 'Mendatang' : ($event->status === 'ongoing' ? 'Sedang Berlangsung' : 'Selesai') }}
                        </span>
                        <span class="text-slate-400">•</span>
                        <span class="text-slate-500">KODE EVENT: EVT-{{ $event->id }}</span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-950 tracking-tight leading-snug">
                        {{ $event->title }}
                    </h1>
                </div>

                <!-- Event Poster -->
                <div class="rounded-xl overflow-hidden bg-slate-100 border border-slate-300 shadow-sm">
                    <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full max-h-[460px] object-cover">
                </div>

                <!-- Technical Specification Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-6 rounded-xl bg-slate-50 border border-slate-300 font-mono">
                    <div class="p-3 bg-white rounded-lg border border-slate-200">
                        <span class="block text-[10px] uppercase text-slate-400 font-bold">Tanggal Pelaksanaan</span>
                        <span class="block text-sm font-bold text-slate-900 mt-1 font-sans">{{ $event->event_date->translatedFormat('l, d F Y') }}</span>
                    </div>

                    <div class="p-3 bg-white rounded-lg border border-slate-200">
                        <span class="block text-[10px] uppercase text-slate-400 font-bold">Waktu & Jam</span>
                        <span class="block text-sm font-bold text-slate-900 mt-1 font-sans">{{ $event->formatted_time }}</span>
                    </div>

                    <div class="p-3 bg-white rounded-lg border border-slate-200">
                        <span class="block text-[10px] uppercase text-slate-400 font-bold">Lokasi / Venue</span>
                        <span class="block text-sm font-bold text-slate-900 mt-1 font-sans">{{ $event->location }}</span>
                    </div>

                    <div class="p-3 bg-white rounded-lg border border-slate-200">
                        <span class="block text-[10px] uppercase text-slate-400 font-bold">Penanggung Jawab (PIC)</span>
                        <span class="block text-sm font-bold text-blue-700 mt-1 font-sans">{{ $event->person_in_charge }}</span>
                    </div>
                </div>

                <!-- Description Body -->
                <div class="space-y-4">
                    <h3 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-900 border-b border-slate-200 pb-2">
                        Deskripsi & Rincian Agenda
                    </h3>
                    <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed font-sans text-base space-y-4">
                        {!! nl2br(e($event->description)) !!}
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-200 flex items-center justify-between font-mono text-xs">
                    <span class="text-slate-500">SMKN 1 Ciomas Calendar System</span>
                    <a href="{{ route('event.index') }}" class="text-blue-700 hover:text-blue-900 font-bold uppercase hover:underline">
                        &larr; Kembali ke Kalender Agenda
                    </a>
                </div>
            </div>

            <!-- Right: Countdown Cockpit & Helpdesk (4 cols) -->
            <div class="lg:col-span-4 space-y-6 lg:sticky lg:top-24">
                <!-- Countdown Box (if upcoming) -->
                @if($event->status === 'upcoming')
                    <div class="p-6 rounded-xl bg-slate-950 text-white border border-slate-800 bg-tech-grid-dark space-y-4"
                         data-countdown-date="{{ $event->event_date->format('Y-m-d') }} {{ $event->start_time }}">
                        <span class="text-[10px] font-mono font-bold px-2 py-0.5 rounded bg-amber-500 text-slate-950 uppercase tracking-wider">
                            HITUNG MUNDUR ACARA
                        </span>
                        <h4 class="text-base font-bold text-white tracking-tight">Waktu Menuju Kegiatan</h4>

                        <div class="grid grid-cols-4 gap-2 text-center font-mono pt-2">
                            <div class="px-2 py-3 rounded bg-slate-900 border border-slate-800">
                                <span class="cd-days block text-xl font-black text-amber-400">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 block mt-0.5">HARI</span>
                            </div>
                            <div class="px-2 py-3 rounded bg-slate-900 border border-slate-800">
                                <span class="cd-hours block text-xl font-black text-white">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 block mt-0.5">JAM</span>
                            </div>
                            <div class="px-2 py-3 rounded bg-slate-900 border border-slate-800">
                                <span class="cd-minutes block text-xl font-black text-white">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 block mt-0.5">MENIT</span>
                            </div>
                            <div class="px-2 py-3 rounded bg-slate-900 border border-slate-800">
                                <span class="cd-seconds block text-xl font-black text-amber-400">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-slate-400 block mt-0.5">DETIK</span>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Contact Coordinator Box -->
                <div class="p-6 rounded-xl bg-slate-50 border border-slate-300 space-y-3 font-mono text-xs">
                    <span class="text-[10px] font-bold uppercase text-slate-500 block">KONTAK KOORDINATOR</span>
                    <h4 class="text-base font-bold text-slate-900 font-sans tracking-tight">{{ $event->person_in_charge }}</h4>
                    <p class="text-slate-600 font-sans leading-relaxed text-xs">
                        Untuk konfirmasi kepesertaan atau pertanyaan seputar teknis agenda kegiatan di SMKN 1 Ciomas.
                    </p>
                    <div class="pt-3 border-t border-slate-200 space-y-1 text-slate-600">
                        <div>📍 {{ $event->location }}</div>
                        <div>🕒 {{ $event->formatted_time }}</div>
                        <div>📞 (0251) 8632-456</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
