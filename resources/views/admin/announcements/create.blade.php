@extends('layouts.admin')

@section('title', 'Tambah Pengumuman Baru')
@section('page_title', 'Buat Pengumuman Baru')
@section('page_subtitle', 'Terbitkan informasi atau edaran resmi baru untuk SMKN 1 CIOMAS')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto font-sans">
    <!-- Breadcrumb / Header -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500 uppercase tracking-wider">
            <a href="{{ route('admin.pengumuman.index') }}" class="hover:text-amber-600 transition-colors">Pengumuman</a>
            <span>/</span>
            <span class="text-amber-600 font-bold">Buat Baru</span>
        </div>
        <a href="{{ route('admin.pengumuman.index') }}" class="px-3.5 py-1.5 text-xs font-mono font-semibold uppercase tracking-wider text-slate-600 hover:text-slate-900 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
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

    <form action="{{ route('admin.pengumuman.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-white rounded-xl border border-slate-200 p-5 sm:p-6 shadow-sm space-y-5">
            <!-- Judul Pengumuman -->
            <div>
                <label for="title" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Judul Pengumuman <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Contoh: Jadwal Uji Kompetensi Keahlian (UKK) TA 2026/2027" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all">
                @error('title') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Kategori & Status -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="category_id" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Kategori <span class="text-rose-500">*</span>
                    </label>
                    <select name="category_id" id="category_id" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all text-slate-700">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="status" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Status Publikasi <span class="text-rose-500">*</span>
                    </label>
                    <select name="status" id="status" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all text-slate-700">
                        <option value="published" {{ old('status', 'published') === 'published' ? 'selected' : '' }}>Published (Langsung Tayang)</option>
                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft (Simpan Sementara)</option>
                        <option value="expired" {{ old('status') === 'expired' ? 'selected' : '' }}>Expired (Arsip)</option>
                    </select>
                    @error('status') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Jadwal Tayang & Expired -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="published_at" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Tanggal Publikasi <span class="text-rose-500">*</span>
                    </label>
                    <input type="date" name="published_at" id="published_at" value="{{ old('published_at', now()->format('Y-m-d')) }}" required class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all">
                    @error('published_at') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="expired_at" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Tanggal Kedaluwarsa <span class="text-slate-400 lowercase font-normal">(opsional)</span>
                    </label>
                    <input type="date" name="expired_at" id="expired_at" value="{{ old('expired_at') }}" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all">
                    @error('expired_at') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Upload Banner / Gambar -->
            <div>
                <label class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Gambar / Banner Pengumuman <span class="text-slate-400 lowercase font-normal">(opsional, maks. 3MB)</span>
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-xl hover:border-amber-400 transition-colors bg-slate-50/50">
                    <div class="space-y-2 text-center">
                        <svg class="mx-auto h-10 w-10 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-xs text-slate-600 justify-center">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md px-3 py-1 font-mono font-semibold text-amber-600 hover:text-amber-500 focus-within:outline-none shadow-sm border border-slate-200">
                                <span>Pilih Berkas Foto</span>
                                <input id="image" name="image" type="file" accept="image/*" data-preview-target="announcement-preview-box" class="sr-only">
                            </label>
                        </div>
                        <p class="text-[11px] font-mono text-slate-400">PNG, JPG, JPEG, WEBP hingga 3MB</p>
                    </div>
                </div>

                <!-- Preview Box -->
                <div id="announcement-preview-box" class="hidden mt-4 p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <div class="text-xs font-mono font-semibold text-slate-500 mb-2">Pratinjau Gambar:</div>
                    <img src="" alt="Pratinjau" class="w-full max-h-64 object-cover rounded-lg border border-slate-200">
                </div>
                @error('image') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Isi Pengumuman -->
            <div>
                <label for="content" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Isi Pengumuman Lengkap <span class="text-rose-500">*</span>
                </label>
                <textarea name="content" id="content" rows="10" required placeholder="Tuliskan teks pengumuman resmi di sini..." class="w-full px-3.5 py-3 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all leading-relaxed">{{ old('content') }}</textarea>
                @error('content') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.pengumuman.index') }}" class="px-4 py-2 rounded-lg border border-slate-300 text-xs font-mono font-semibold uppercase tracking-wider text-slate-600 hover:bg-slate-50 transition-colors">
                Batalkan
            </a>
            <button type="submit" class="px-5 py-2 rounded-lg bg-amber-500 hover:bg-amber-400 text-tech-950 text-xs font-mono font-bold uppercase tracking-wider shadow-sm transition-all">
                Simpan & Publikasikan
            </button>
        </div>
    </form>
</div>
@endsection
