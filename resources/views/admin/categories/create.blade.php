@extends('layouts.admin')

@section('title', 'Tambah Kategori Konten')
@section('page_title', 'Tambah Kategori')
@section('page_subtitle', 'Definisikan kategori baru untuk mengelompokkan pengumuman & berita')

@section('content')
<div class="space-y-6 max-w-2xl mx-auto font-sans">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500 uppercase tracking-wider">
            <a href="{{ route('admin.kategori.index') }}" class="hover:text-amber-600 transition-colors">Kategori</a>
            <span>/</span>
            <span class="text-amber-600 font-bold">Tambah Baru</span>
        </div>
        <a href="{{ route('admin.kategori.index') }}" class="px-3.5 py-1.5 text-xs font-mono font-semibold uppercase tracking-wider text-slate-600 hover:text-slate-900 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
            &larr; Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-mono">
            <div class="font-bold mb-1 uppercase tracking-wider">Harap periksa kesalahan input:</div>
            <ul class="list-disc list-inside space-y-0.5 text-rose-700 font-sans">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="bg-white rounded-xl border border-slate-200 p-5 sm:p-6 shadow-sm space-y-5">
            <div>
                <label for="name" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Nama Kategori <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Contoh: Kurikulum & Akademik" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all">
                @error('name') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="description" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Keterangan Singkat <span class="text-slate-400 lowercase font-normal">(opsional)</span>
                </label>
                <textarea name="description" id="description" rows="4" placeholder="Jelaskan cakupan topik konten untuk kategori ini..." class="w-full px-3.5 py-3 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all leading-relaxed">{{ old('description') }}</textarea>
                @error('description') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.kategori.index') }}" class="px-4 py-2 rounded-lg border border-slate-300 text-xs font-mono font-semibold uppercase tracking-wider text-slate-600 hover:bg-slate-50 transition-colors">
                Batalkan
            </a>
            <button type="submit" class="px-5 py-2 rounded-lg bg-amber-500 hover:bg-amber-400 text-tech-950 text-xs font-mono font-bold uppercase tracking-wider shadow-sm transition-all">
                Simpan Kategori
            </button>
        </div>
    </form>
</div>
@endsection
