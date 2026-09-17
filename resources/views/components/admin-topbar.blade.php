<header class="h-16 sm:h-20 bg-white border-b border-slate-200 px-4 sm:px-6 lg:px-8 flex items-center justify-between sticky top-0 z-20 font-sans">
    <div class="flex items-center gap-3">
        <!-- Mobile Sidebar Toggle -->
        <button type="button" id="sidebar-toggle-btn" class="lg:hidden p-2 rounded-lg text-slate-600 hover:text-amber-600 hover:bg-slate-100 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div>
            <h1 class="text-base sm:text-lg font-bold text-slate-900 leading-tight">@yield('page_title', 'Dashboard')</h1>
            <p class="text-xs text-slate-500 hidden sm:block">@yield('page_subtitle', 'Panel Kontrol Pusat Informasi SMKN 1 CIOMAS')</p>
        </div>
    </div>

    <!-- Right: Status Indicator & Admin Profile Widget -->
    <div class="flex items-center gap-4">
        <!-- Live System Status Pill -->
        <div class="hidden md:flex items-center gap-2 px-2.5 py-1 rounded-full bg-slate-100 border border-slate-200 text-[11px] font-mono text-slate-600">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            <span>SISTEM VOKASI TERHUBUNG</span>
        </div>

        <!-- Admin Profile -->
        <div class="flex items-center gap-3 pl-3 md:border-l md:border-slate-200">
            <div class="hidden sm:flex flex-col text-right">
                <span class="text-xs font-bold text-slate-900">{{ auth()->user()->name ?? 'Administrator' }}</span>
                <span class="text-[10px] font-mono font-semibold text-amber-600 uppercase tracking-wider">{{ auth()->user()->role ?? 'Admin' }}</span>
            </div>
            <div class="w-9 h-9 rounded-lg bg-tech-950 border border-tech-800 flex items-center justify-center text-amber-400 font-mono font-bold text-xs shadow-sm">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
        </div>
    </div>
</header>
