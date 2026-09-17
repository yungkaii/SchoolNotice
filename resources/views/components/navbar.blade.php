<header id="main-navbar" class="sticky top-0 z-50 bg-white border-b border-slate-200 transition-all duration-200">
    <!-- 1. Top Technical Status Bar (Institutional Authority) -->
    <div class="bg-slate-950 text-slate-400 text-[11px] font-mono border-b border-slate-800/80 hidden md:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-8 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center gap-1.5 text-slate-300">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>SISTEM INFORMASI AKTIF</span>
                </span>
                <span class="text-slate-600">|</span>
                <span>NPSN: <span class="text-slate-200 font-semibold">20268412</span></span>
                <span class="text-slate-600">|</span>
                <span>AKREDITASI: <span class="text-amber-400 font-semibold">"A" (UNGGUL)</span></span>
            </div>
            <div class="flex items-center gap-4 text-slate-400">
                <span>📍 Kec. Ciomas, Kab. Bogor</span>
                <span class="text-slate-600">|</span>
                <span>🕒 07:30 - 15:30 WIB</span>
            </div>
        </div>
    </div>

    <!-- 2. Main Navigation Bar -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo with Technical Crest -->
            <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                <div class="w-11 h-11 rounded-lg bg-slate-900 border border-slate-700 flex items-center justify-center text-white shadow-sm group-hover:border-blue-600 transition-colors">
                    <svg class="w-6 h-6 text-blue-400 group-hover:text-blue-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-lg font-black tracking-tight text-slate-950 font-sans">School<span class="text-blue-700">Notice</span></span>
                        <span class="text-[10px] font-mono font-bold px-1.5 py-0.5 rounded bg-slate-100 text-slate-600 border border-slate-200">PORTAL</span>
                    </div>
                    <span class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider font-mono">SMKN 1 CIOMAS</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center space-x-1">
                <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-xs uppercase tracking-wider font-bold transition-colors {{ request()->routeIs('home') ? 'text-blue-700 bg-blue-50/70 border border-blue-200/60' : 'text-slate-700 hover:text-slate-950 hover:bg-slate-100' }}">
                    Beranda
                </a>
                <a href="{{ route('pengumuman.index') }}" class="px-3.5 py-2 rounded-lg text-xs uppercase tracking-wider font-bold transition-colors {{ request()->routeIs('pengumuman.*') ? 'text-blue-700 bg-blue-50/70 border border-blue-200/60' : 'text-slate-700 hover:text-slate-950 hover:bg-slate-100' }}">
                    Pengumuman
                </a>
                <a href="{{ route('event.index') }}" class="px-3.5 py-2 rounded-lg text-xs uppercase tracking-wider font-bold transition-colors {{ request()->routeIs('event.*') ? 'text-blue-700 bg-blue-50/70 border border-blue-200/60' : 'text-slate-700 hover:text-slate-950 hover:bg-slate-100' }}">
                    Agenda & Event
                </a>
                <a href="{{ route('berita.index') }}" class="px-3.5 py-2 rounded-lg text-xs uppercase tracking-wider font-bold transition-colors {{ request()->routeIs('berita.*') ? 'text-blue-700 bg-blue-50/70 border border-blue-200/60' : 'text-slate-700 hover:text-slate-950 hover:bg-slate-100' }}">
                    Warta Berita
                </a>
                <a href="{{ route('prestasi.index') }}" class="px-3.5 py-2 rounded-lg text-xs uppercase tracking-wider font-bold transition-colors {{ request()->routeIs('prestasi.*') ? 'text-blue-700 bg-blue-50/70 border border-blue-200/60' : 'text-slate-700 hover:text-slate-950 hover:bg-slate-100' }}">
                    Prestasi
                </a>
            </nav>

            <!-- Desktop Action Buttons -->
            <div class="hidden lg:flex items-center gap-3">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg text-xs font-mono font-bold tracking-wider text-white bg-slate-950 hover:bg-blue-700 border border-slate-800 transition-all">
                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                        <span>ADMIN CONSOLE</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg text-xs font-mono font-bold tracking-wider text-slate-800 bg-slate-100 hover:bg-slate-200 border border-slate-300 transition-all">
                        <svg class="w-3.5 h-3.5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        <span>LOGIN PETUGAS</span>
                    </a>
                @endauth
            </div>

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

            <div class="pt-3 mt-3 border-t border-slate-200">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-white bg-slate-900 hover:bg-blue-700">
                        Admin Dashboard &rarr;
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 rounded-lg text-xs font-mono font-bold uppercase tracking-wider text-slate-800 bg-slate-100 hover:bg-slate-200 border border-slate-300">
                        Login Petugas Admin
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>
