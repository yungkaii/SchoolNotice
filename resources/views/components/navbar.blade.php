<header id="main-navbar" class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/90 transition-all duration-200 shadow-2xs">
    <!-- 1. Top Technical Status Bar (Institutional Authority) -->
    <div class="bg-slate-950 text-slate-400 text-[11px] font-mono border-b border-slate-800/80 hidden md:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-8 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center gap-1.5 text-slate-300">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>SISTEM INFORMASI AKTIF</span>
                </span>
                <span class="text-slate-700">•</span>
                <span>NPSN: <span class="text-slate-200 font-semibold">20268412</span></span>
                <span class="text-slate-700">•</span>
                <span>AKREDITASI: <span class="text-amber-400 font-semibold">"A" (UNGGUL)</span></span>
            </div>
            <div class="flex items-center gap-4 text-slate-400">
                <span>📍 Kec. Ciomas, Kab. Bogor</span>
                <span class="text-slate-700">•</span>
                <span class="inline-flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-400 animate-ping"></span>
                    <span id="live-school-clock" class="text-slate-200 font-semibold font-mono">07:30 - 15:30 WIB</span>
                </span>
            </div>
        </div>
    </div>

    <!-- 2. Main Navigation Bar -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo with Technical Crest -->
            <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                <div class="w-11 h-11 rounded-xl bg-white border border-slate-200/90 p-1 flex items-center justify-center shadow-xs group-hover:border-blue-500 group-hover:shadow-md group-hover:shadow-blue-500/10 transition-all shrink-0">
                    <img src="{{ asset('images/logoskanic2.png') }}" alt="Logo SMKN 1 Ciomas" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-lg font-black tracking-tight text-slate-950 font-sans group-hover:text-blue-700 transition-colors">School<span class="text-blue-700 group-hover:text-amber-500 transition-colors">Notice</span></span>
                        <span class="text-[10px] font-mono font-bold px-1.5 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-200/80 shadow-2xs">PORTAL</span>
                    </div>
                    <span class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider font-mono">SMKN 1 CIOMAS</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center space-x-1.5">
                <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('home') ? 'text-blue-700 bg-blue-50/90 border border-blue-200/80 shadow-xs' : 'text-slate-700 hover:text-slate-950 hover:bg-slate-100/80' }}">
                    @if(request()->routeIs('home'))<span class="inline-block w-1.5 h-1.5 rounded-full bg-blue-600 mr-1.5 -translate-y-0.5"></span>@endif Beranda
                </a>
                <a href="{{ route('pengumuman.index') }}" class="px-3.5 py-2 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('pengumuman.*') ? 'text-blue-700 bg-blue-50/90 border border-blue-200/80 shadow-xs' : 'text-slate-700 hover:text-slate-950 hover:bg-slate-100/80' }}">
                    @if(request()->routeIs('pengumuman.*'))<span class="inline-block w-1.5 h-1.5 rounded-full bg-blue-600 mr-1.5 -translate-y-0.5"></span>@endif Pengumuman
                </a>
                <a href="{{ route('event.index') }}" class="px-3.5 py-2 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('event.*') ? 'text-blue-700 bg-blue-50/90 border border-blue-200/80 shadow-xs' : 'text-slate-700 hover:text-slate-950 hover:bg-slate-100/80' }}">
                    @if(request()->routeIs('event.*'))<span class="inline-block w-1.5 h-1.5 rounded-full bg-blue-600 mr-1.5 -translate-y-0.5"></span>@endif Agenda & Event
                </a>
                <a href="{{ route('berita.index') }}" class="px-3.5 py-2 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('berita.*') ? 'text-blue-700 bg-blue-50/90 border border-blue-200/80 shadow-xs' : 'text-slate-700 hover:text-slate-950 hover:bg-slate-100/80' }}">
                    @if(request()->routeIs('berita.*'))<span class="inline-block w-1.5 h-1.5 rounded-full bg-blue-600 mr-1.5 -translate-y-0.5"></span>@endif Warta Berita
                </a>
                <a href="{{ route('prestasi.index') }}" class="px-3.5 py-2 rounded-xl text-xs uppercase tracking-wider font-bold transition-all {{ request()->routeIs('prestasi.*') ? 'text-blue-700 bg-blue-50/90 border border-blue-200/80 shadow-xs' : 'text-slate-700 hover:text-slate-950 hover:bg-slate-100/80' }}">
                    @if(request()->routeIs('prestasi.*'))<span class="inline-block w-1.5 h-1.5 rounded-full bg-blue-600 mr-1.5 -translate-y-0.5"></span>@endif Prestasi
                </a>
            </nav>

            <!-- Desktop Action Buttons (Hanya muncul jika sudah login) -->
            @auth
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg text-xs font-mono font-bold tracking-wider text-white bg-slate-950 hover:bg-blue-700 border border-slate-800 transition-all">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span>ADMIN CONSOLE</span>
                    </a>
                </div>
            @endauth

            <!-- Mobile Menu Toggle Button -->
            <div class="flex items-center lg:hidden">
                <button type="button" id="mobile-menu-btn" class="p-2 rounded-lg text-slate-700 hover:bg-slate-100 border border-slate-200" aria-label="Menu Utama">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 bg-white">
        <div class="px-4 py-4 space-y-1.5">
            <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg text-sm font-bold uppercase tracking-wider {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50' }}">
                Beranda
            </a>
            <a href="{{ route('pengumuman.index') }}" class="block px-3 py-2.5 rounded-lg text-sm font-bold uppercase tracking-wider {{ request()->routeIs('pengumuman.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50' }}">
                Pengumuman
            </a>
            <a href="{{ route('event.index') }}" class="block px-3 py-2.5 rounded-lg text-sm font-bold uppercase tracking-wider {{ request()->routeIs('event.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50' }}">
                Agenda & Event
            </a>
            <a href="{{ route('berita.index') }}" class="block px-3 py-2.5 rounded-lg text-sm font-bold uppercase tracking-wider {{ request()->routeIs('berita.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50' }}">
                Warta Berita
            </a>
            <a href="{{ route('prestasi.index') }}" class="block px-3 py-2.5 rounded-lg text-sm font-bold uppercase tracking-wider {{ request()->routeIs('prestasi.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50' }}">
                Prestasi
            </a>

            @auth
                <div class="pt-3 mt-3 border-t border-slate-200">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-white bg-slate-900 hover:bg-blue-700">
                        Admin Dashboard &rarr;
                    </a>
                </div>
            @endauth
        </div>
    </div>
</header>
