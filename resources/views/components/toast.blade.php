<div class="fixed top-24 right-5 z-50 flex flex-col gap-3 max-w-md w-full pointer-events-none">
    @if (session('success'))
        <div class="toast-alert pointer-events-auto flex items-start gap-3 p-4 rounded-2xl bg-white border border-emerald-200 shadow-xl shadow-emerald-500/10 transition-all duration-300 transform translate-y-0">
            <div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <h4 class="text-sm font-bold text-slate-900">Berhasil!</h4>
                <p class="text-xs text-slate-600 mt-0.5">{{ session('success') }}</p>
            </div>
            <button type="button" class="toast-close text-slate-400 hover:text-slate-600 p-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="toast-alert pointer-events-auto flex items-start gap-3 p-4 rounded-2xl bg-white border border-rose-200 shadow-xl shadow-rose-500/10 transition-all duration-300 transform translate-y-0">
            <div class="w-8 h-8 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <h4 class="text-sm font-bold text-slate-900">Terjadi Kesalahan</h4>
                <p class="text-xs text-slate-600 mt-0.5">{{ session('error') }}</p>
            </div>
            <button type="button" class="toast-close text-slate-400 hover:text-slate-600 p-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    @if (session('info'))
        <div class="toast-alert pointer-events-auto flex items-start gap-3 p-4 rounded-2xl bg-white border border-blue-200 shadow-xl shadow-blue-500/10 transition-all duration-300 transform translate-y-0">
            <div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <h4 class="text-sm font-bold text-slate-900">Informasi</h4>
                <p class="text-xs text-slate-600 mt-0.5">{{ session('info') }}</p>
            </div>
            <button type="button" class="toast-close text-slate-400 hover:text-slate-600 p-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
</div>
