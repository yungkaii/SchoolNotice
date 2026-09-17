<!-- Global Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm transition-opacity">
    <div class="relative w-full max-w-md bg-white rounded-3xl p-6 md:p-8 shadow-2xl border border-slate-100 transform transition-all">
        <div class="w-14 h-14 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center mx-auto mb-5 shadow-inner">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>

        <h3 class="text-xl font-bold text-slate-900 text-center">Konfirmasi Penghapusan</h3>
        <p class="text-sm text-slate-500 text-center mt-2 leading-relaxed">
            Apakah Anda yakin ingin menghapus data <span id="delete-modal-item-name" class="font-semibold text-slate-800"></span>? Tindakan ini bersifat permanen dan tidak dapat dibatalkan.
        </p>

        <form id="delete-modal-form" method="POST" action="" class="mt-7 flex items-center gap-3">
            @csrf
            @method('DELETE')
            <button type="button" class="delete-modal-close flex-1 py-2.5 px-4 rounded-xl border border-slate-200 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors">
                Batal
            </button>
            <button type="submit" class="flex-1 py-2.5 px-4 rounded-xl bg-rose-600 hover:bg-rose-700 text-sm font-semibold text-white shadow-sm shadow-rose-600/30 transition-all hover:shadow-md">
                Ya, Hapus
            </button>
        </form>
    </div>
</div>
