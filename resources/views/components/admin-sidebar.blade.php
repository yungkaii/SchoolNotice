<aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-tech-950 text-slate-300 flex flex-col transition-transform duration-300 transform -translate-x-full lg:translate-x-0 border-r border-tech-800 shadow-2xl lg:shadow-none font-sans">
    <!-- Sidebar Header -->
    <div class="h-20 flex items-center gap-3 px-5 border-b border-tech-800 bg-tech-950/90">
        <div class="w-10 h-10 rounded-lg bg-tech-900 border border-tech-800 flex items-center justify-center text-amber-400 font-mono font-bold text-sm shadow-inner shrink-0">
            SN
        </div>
        <div class="min-w-0 flex-1">
            <span class="block text-sm font-bold text-white tracking-tight truncate">School<span class="text-amber-400">Notice</span></span>
            <span class="block text-[10px] font-mono uppercase tracking-wider text-slate-400 truncate">SMKN 1 CIOMAS CONSOLE</span>
        </div>
    </div>

    <!-- Navigation Links -->
    <div class="flex-1 overflow-y-auto px-3 py-5 space-y-1 custom-scrollbar">
        <div class="px-3 pb-2 pt-1 text-[10px] font-mono font-bold tracking-wider uppercase text-slate-500">Menu Utama</div>

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium transition-all duration-150 {{ request()->routeIs('admin.dashboard') ? 'text-amber-400 bg-tech-900 border-l-2 border-amber-500 font-semibold' : 'text-slate-400 hover:text-white hover:bg-tech-900/60' }}">
            <svg class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-amber-400' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>Ringkasan Dashboard</span>
        </a>

        <!-- Pengumuman -->
        <a href="{{ route('admin.pengumuman.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium transition-all duration-150 {{ request()->routeIs('admin.pengumuman.*') ? 'text-amber-400 bg-tech-900 border-l-2 border-amber-500 font-semibold' : 'text-slate-400 hover:text-white hover:bg-tech-900/60' }}">
            <svg class="w-4 h-4 {{ request()->routeIs('admin.pengumuman.*') ? 'text-amber-400' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
            </svg>
            <span>Kelola Pengumuman</span>
        </a>

        <!-- Event -->
        <a href="{{ route('admin.event.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium transition-all duration-150 {{ request()->routeIs('admin.event.*') ? 'text-amber-400 bg-tech-900 border-l-2 border-amber-500 font-semibold' : 'text-slate-400 hover:text-white hover:bg-tech-900/60' }}">
            <svg class="w-4 h-4 {{ request()->routeIs('admin.event.*') ? 'text-amber-400' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>Event & Agenda</span>
        </a>

        <!-- Berita -->
        <a href="{{ route('admin.berita.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium transition-all duration-150 {{ request()->routeIs('admin.berita.*') ? 'text-amber-400 bg-tech-900 border-l-2 border-amber-500 font-semibold' : 'text-slate-400 hover:text-white hover:bg-tech-900/60' }}">
            <svg class="w-4 h-4 {{ request()->routeIs('admin.berita.*') ? 'text-amber-400' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <span>Warta Berita Sekolah</span>
        </a>

        <!-- Prestasi -->
        <a href="{{ route('admin.prestasi.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium transition-all duration-150 {{ request()->routeIs('admin.prestasi.*') ? 'text-amber-400 bg-tech-900 border-l-2 border-amber-500 font-semibold' : 'text-slate-400 hover:text-white hover:bg-tech-900/60' }}">
            <svg class="w-4 h-4 {{ request()->routeIs('admin.prestasi.*') ? 'text-amber-400' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
            </svg>
            <span>Prestasi Siswa Vokasi</span>
        </a>

        <div class="px-3 pt-5 pb-2 text-[10px] font-mono font-bold tracking-wider uppercase text-slate-500">Konfigurasi Master</div>

        <!-- Kategori -->
        <a href="{{ route('admin.kategori.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium transition-all duration-150 {{ request()->routeIs('admin.kategori.*') ? 'text-amber-400 bg-tech-900 border-l-2 border-amber-500 font-semibold' : 'text-slate-400 hover:text-white hover:bg-tech-900/60' }}">
            <svg class="w-4 h-4 {{ request()->routeIs('admin.kategori.*') ? 'text-amber-400' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            <span>Kategori Konten</span>
        </a>

        <!-- User / Admin -->
        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium transition-all duration-150 {{ request()->routeIs('admin.users.*') ? 'text-amber-400 bg-tech-900 border-l-2 border-amber-500 font-semibold' : 'text-slate-400 hover:text-white hover:bg-tech-900/60' }}">
            <svg class="w-4 h-4 {{ request()->routeIs('admin.users.*') ? 'text-amber-400' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span>Pengguna & Staf Admin</span>
        </a>
    </div>

    <!-- Sidebar Footer -->
    <div class="p-3 border-t border-tech-800 bg-tech-950/80 space-y-1.5">
        <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-2 px-3 rounded-lg text-xs font-mono font-medium text-slate-300 bg-tech-900 hover:bg-tech-850 hover:text-white border border-tech-800 transition-colors">
            <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
            <span>Buka Website Publik</span>
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center justify-center gap-2 w-full py-2 px-3 rounded-lg text-xs font-mono font-medium text-rose-400 hover:text-white hover:bg-rose-600 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Keluar (Logout)</span>
            </button>
        </form>
    </div>
</aside>

<!-- Sidebar Backdrop on Mobile -->
<div id="sidebar-backdrop" class="fixed inset-0 z-30 hidden bg-tech-950/70 backdrop-blur-sm lg:hidden transition-opacity"></div>
