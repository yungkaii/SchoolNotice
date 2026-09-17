<header class="h-20 bg-white border-b border-slate-200/80 px-4 sm:px-6 lg:px-8 flex items-center justify-between sticky top-0 z-20">
    <div class="flex items-center gap-3">
        <!-- Mobile Sidebar Toggle -->
        <button type="button" id="sidebar-toggle-btn" class="lg:hidden p-2 rounded-xl text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div>
            <h1 class="text-lg sm:text-xl font-bold text-slate-900 leading-tight">@yield('page_title', 'Dashboard')</h1>
            <p class="text-xs text-slate-500 hidden sm:block">@yield('page_subtitle', 'Sistem Pengelolaan Informasi SchoolNotice')</p>
        </div>
    </div>

    <!-- Right: Admin Profile Widget -->
    <div class="flex items-center gap-4">
        <div class="hidden sm:flex flex-col text-right">
            <span class="text-sm font-bold text-slate-900">{{ auth()->user()->name ?? 'Administrator' }}</span>
            <span class="text-[11px] font-semibold text-blue-600 uppercase tracking-wider">{{ auth()->user()->role ?? 'Admin' }}</span>
        </div>
        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center text-white font-bold text-sm shadow-md shadow-blue-500/20">
            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
        </div>
    </div>
</header>
