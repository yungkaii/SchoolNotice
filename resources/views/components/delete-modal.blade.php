<!-- Global Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-tech-950/75 backdrop-blur-sm transition-opacity">
    <div class="relative w-full max-w-md bg-white rounded-xl p-6 md:p-8 shadow-2xl border border-slate-200 transform transition-all overflow-hidden">
        <!-- Danger stripe -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-rose-600"></div>

        <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 border border-rose-200 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>

        <div class="text-center">
            <span class="inline-block px-2.5 py-0.5 rounded-xs bg-rose-50 text-rose-700 border border-rose-200 text-[10px] font-mono font-bold uppercase tracking-wider mb-2">
                PERINGATAN SISTEM
            </span>
            <h3 class="text-lg font-bold text-slate-900">Konfirmasi Penghapusan Data</h3>
            <p class="text-xs text-slate-600 mt-2 leading-relaxed font-sans">
                Apakah Anda yakin ingin menghapus data <span id="delete-modal-item-name" class="font-mono font-bold text-slate-900"></span>? Data yang dihapus tidak dapat dipulihkan kembali.
            </p>
        </div>

        <form id="delete-modal-form" method="POST" action="" class="mt-6 flex items-center gap-3">
            @csrf
            @method('DELETE')
            <button type="button" class="delete-modal-close flex-1 py-2 px-4 rounded-lg border border-slate-300 text-xs font-mono font-semibold uppercase tracking-wider text-slate-700 hover:bg-slate-50 transition-colors">
                Batalkan
            </button>
            <button type="submit" class="flex-1 py-2 px-4 rounded-lg bg-rose-600 hover:bg-rose-700 text-xs font-mono font-bold uppercase tracking-wider text-white shadow-sm transition-all">
                Ya, Hapus Data
            </button>
        </form>
    </div>
</div>
