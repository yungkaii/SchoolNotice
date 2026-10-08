<div class="bg-slate-950 text-slate-200 border-b border-slate-800 text-xs font-mono relative z-40 overflow-hidden shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center h-10">
        <!-- Label Badge (Fixed on Left) -->
        <div class="flex items-center gap-2 pr-3.5 bg-slate-950 z-10 shrink-0 border-r border-slate-800/90 shadow-[6px_0_12px_rgba(2,6,23,0.9)]">
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-amber-500 text-slate-950 font-bold uppercase tracking-wider text-[10px] shadow-sm shadow-amber-500/25">
                <span class="w-1.5 h-1.5 rounded-full bg-slate-950 animate-ping"></span>
                <svg class="w-3 h-3 text-slate-950" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" />
                </svg>
                <span>WARTA TERKINI</span>
            </span>
        </div>

        <!-- Marquee Track (Running Text) -->
        <div class="flex-1 overflow-hidden relative cursor-pointer py-1 select-none ticker-mask" title="Arahkan kursor untuk menjeda">
            <div class="ticker-track flex items-center">
                <!-- Set 1 -->
                <div class="flex items-center gap-8 shrink-0 pr-8">
                    @forelse($tickerNews as $item)
                        <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center gap-2 text-slate-300 hover:text-amber-400 font-sans text-xs transition-colors group">
                            @if($item->category)
                                <span class="px-1.5 py-0.5 rounded text-[10px] font-mono font-bold uppercase bg-slate-800/90 text-blue-400 border border-slate-700/80">
                                    {{ $item->category->name }}
                                </span>
                            @endif
                            <span class="font-medium group-hover:underline text-slate-200 group-hover:text-amber-400">{{ $item->title }}</span>
                            <span class="text-slate-500 font-mono text-[11px]">({{ $item->published_at ? $item->published_at->diffForHumans() : 'Terkini' }})</span>
                        </a>
                        <span class="text-amber-500/70 select-none font-mono">✦</span>
                    @empty
                        <span class="text-slate-400 font-sans text-xs">
                            Selamat datang di Portal SchoolNotice SMKN 1 Ciomas • Simak pengumuman, agenda kegiatan, warta berita, dan prestasi sekolah terbaru di sini.
                        </span>
                        <span class="text-amber-500/70 select-none font-mono">✦</span>
                    @endforelse
                </div>

                <!-- Set 2 (Duplikasi untuk loop tak terhingga / seamless infinite scroll) -->
                <div class="flex items-center gap-8 shrink-0 pr-8" aria-hidden="true">
                    @forelse($tickerNews as $item)
                        <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center gap-2 text-slate-300 hover:text-amber-400 font-sans text-xs transition-colors group" tabindex="-1">
                            @if($item->category)
                                <span class="px-1.5 py-0.5 rounded text-[10px] font-mono font-bold uppercase bg-slate-800/90 text-blue-400 border border-slate-700/80">
                                    {{ $item->category->name }}
                                </span>
                            @endif
                            <span class="font-medium group-hover:underline text-slate-200 group-hover:text-amber-400">{{ $item->title }}</span>
                            <span class="text-slate-500 font-mono text-[11px]">({{ $item->published_at ? $item->published_at->diffForHumans() : 'Terkini' }})</span>
                        </a>
                        <span class="text-amber-500/70 select-none font-mono">✦</span>
                    @empty
                        <span class="text-slate-400 font-sans text-xs">
                            Selamat datang di Portal SchoolNotice SMKN 1 Ciomas • Simak pengumuman, agenda kegiatan, warta berita, dan prestasi sekolah terbaru di sini.
                        </span>
                        <span class="text-amber-500/70 select-none font-mono">✦</span>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Quick Link (Fixed on Right) -->
        <div class="hidden sm:flex items-center pl-3.5 bg-slate-950 z-10 shrink-0 border-l border-slate-800/90 shadow-[-6px_0_12px_rgba(2,6,23,0.9)]">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-1.5 text-[11px] font-mono font-bold text-amber-400 hover:text-amber-300 uppercase tracking-wider transition-colors hover:underline">
                <span>SEMUA BERITA</span>
                <span>&rarr;</span>
            </a>
        </div>
    </div>
</div>