<header id="main-navbar" class="sticky top-0 z-50 transition-all duration-300 glass-nav border-b border-slate-100/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-blue-700 via-blue-600 to-indigo-600 flex items-center justify-center shadow-md shadow-blue-500/20 group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <span class="block text-xl font-bold tracking-tight text-slate-900 group-hover:text-blue-600 transition-colors">School<span class="text-blue-600">Notice</span></span>
                    <span class="block text-xs font-medium text-slate-500 tracking-wide uppercase">SMKN 1 CIOMAS</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center gap-1 xl:gap-2">
                <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50/80' : 'text-slate-600 hover:text-blue-600 hover:bg-slate-50' }}">
                    Beranda
                </a>
                <a href="{{ route('pengumuman.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('pengumuman.*') ? 'text-blue-600 bg-blue-50/80' : 'text-slate-600 hover:text-blue-600 hover:bg-slate-50' }}">
                    Pengumuman
                </a>
                <a href="{{ route('event.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('event.*') ? 'text-blue-600 bg-blue-50/80' : 'text-slate-600 hover:text-blue-600 hover:bg-slate-50' }}">
                    Event
                </a>
                <a href="{{ route('berita.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('berita.*') ? 'text-blue-600 bg-blue-50/80' : 'text-slate-600 hover:text-blue-600 hover:bg-slate-50' }}">
                    Berita
                </a>
                <a href="{{ route('prestasi.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('prestasi.*') ? 'text-blue-600 bg-blue-50/80' : 'text-slate-600 hover:text-blue-600 hover:bg-slate-50' }}">
                    Prestasi
                </a>
                <a href="{{ route('tentang.index') }}" class="px-3.5 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs('tentang.*') ? 'text-blue-600 bg-blue-50/80' : 'text-slate-600 hover:text-blue-600 hover:bg-slate-50' }}">
                    Tentang Sekolah
                </a>
            </nav>

            <!-- Desktop Action Buttons -->
            <div class="hidden lg:flex items-center gap-3">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 shadow-sm shadow-blue-500/25 transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span>Dashboard Admin</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="p-2.5 rounded-xl text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition-colors" title="Keluar">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-700 hover:text-blue-600 bg-slate-100/80 hover:bg-blue-50 border border-slate-200/80 transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <span>Login Admin</span>
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Hamburger Button -->
            <div class="flex items-center lg:hidden">
                <button type="button" id="mobile-menu-btn" class="p-2.5 rounded-xl text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-colors" aria-label="Buka Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobile-menu" class="hidden lg:hidden border-b border-slate-200 bg-white/95 backdrop-blur-xl transition-all duration-300">
        <div class="px-4 pt-3 pb-6 space-y-1.5">
            <a href="{{ route('home') }}" class="block px-3.5 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-50' }}">
                Beranda
            </a>
            <a href="{{ route('pengumuman.index') }}" class="block px-3.5 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('pengumuman.*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-50' }}">
                Pengumuman
            </a>
            <a href="{{ route('event.index') }}" class="block px-3.5 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('event.*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-50' }}">
                Event
            </a>
            <a href="{{ route('berita.index') }}" class="block px-3.5 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('berita.*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-50' }}">
                Berita
            </a>
            <a href="{{ route('prestasi.index') }}" class="block px-3.5 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('prestasi.*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-50' }}">
                Prestasi
            </a>
            <a href="{{ route('tentang.index') }}" class="block px-3.5 py-2.5 rounded-xl text-base font-semibold {{ request()->routeIs('tentang.*') ? 'text-blue-600 bg-blue-50' : 'text-slate-700 hover:bg-slate-50' }}">
                Tentang Sekolah
            </a>

            <div class="pt-4 mt-3 border-t border-slate-100">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-center gap-2 w-full px-4 py-3 rounded-xl text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Dashboard Admin
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 rounded-xl text-sm font-semibold text-rose-600 bg-rose-50 hover:bg-rose-100">
                            Keluar dari Akun
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 w-full px-4 py-3 rounded-xl text-sm font-semibold text-slate-800 bg-slate-100 hover:bg-slate-200">
                        <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Login Admin
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>
