@extends('layouts.admin')

@section('title', 'Tambah Prestasi Siswa')
@section('page_title', 'Tambah Prestasi Siswa')
@section('page_subtitle', 'Catat medali, juara LKS, olimpiade, dan capaian talenta siswa SMKN 1 CIOMAS')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto font-sans">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500 uppercase tracking-wider">
            <a href="{{ route('admin.prestasi.index') }}" class="hover:text-purple-600 transition-colors">Prestasi Siswa</a>
            <span>/</span>
            <span class="text-purple-600 font-bold">Tambah Baru</span>
        </div>
        <a href="{{ route('admin.prestasi.index') }}" class="px-3.5 py-1.5 text-xs font-mono font-semibold uppercase tracking-wider text-slate-600 hover:text-slate-900 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
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

    <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-white rounded-xl border border-slate-200 p-5 sm:p-6 shadow-sm space-y-5">
            <!-- Nama Siswa & Kelas -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="sm:col-span-2">
                    <label for="student_name" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Nama Lengkap Siswa / Tim <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="student_name" id="student_name" value="{{ old('student_name') }}" required placeholder="Contoh: Muhammad Farhan Al-Ghifari" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:bg-white transition-all">
                    @error('student_name') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="class" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Kelas / Jurusan <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="class" id="class" value="{{ old('class') }}" required placeholder="Contoh: XII RPL 1" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:bg-white transition-all">
                    @error('class') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Judul Kejuaraan & Tingkat -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="sm:col-span-2">
                    <label for="title" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Nama Prestasi / Kejuaraan <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="Contoh: Juara 1 Lomba Kompetensi Siswa (LKS) Web Technologies" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:bg-white transition-all">
                    @error('title') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="level" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Tingkat Kejuaraan <span class="text-rose-500">*</span>
                    </label>
                    <select name="level" id="level" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:bg-white transition-all text-slate-700">
                        @foreach($levels as $lvl)
                            <option value="{{ $lvl }}" {{ old('level', 'Nasional') === $lvl ? 'selected' : '' }}>{{ $lvl }}</option>
                        @endforeach
                    </select>
                    @error('level') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Tanggal Raihan -->
            <div>
                <label for="achievement_date" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Tanggal Perolehan Prestasi <span class="text-rose-500">*</span>
                </label>
                <input type="date" name="achievement_date" id="achievement_date" value="{{ old('achievement_date', now()->format('Y-m-d')) }}" required class="w-full sm:w-1/2 px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:bg-white transition-all">
                @error('achievement_date') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Upload Foto Dokumentasi Prestasi -->
            <div>
                <label class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Foto Siswa / Dokumentasi Medali <span class="text-slate-400 lowercase font-normal">(opsional, maks. 3MB)</span>
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-xl hover:border-purple-400 transition-colors bg-slate-50/50">
                    <div class="space-y-2 text-center">
                        <svg class="mx-auto h-10 w-10 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-xs text-slate-600 justify-center">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md px-3 py-1 font-mono font-semibold text-purple-600 hover:text-purple-500 focus-within:outline-none shadow-sm border border-slate-200">
                                <span>Pilih Berkas Foto</span>
                                <input id="image" name="image" type="file" accept="image/*" data-preview-target="achievement-preview-box" class="sr-only">
                            </label>
                        </div>
                        <p class="text-[11px] font-mono text-slate-400">PNG, JPG, JPEG, WEBP hingga 3MB</p>
                    </div>
                </div>

                <!-- Preview Box -->
                <div id="achievement-preview-box" class="hidden mt-4 p-3 rounded-xl bg-slate-50 border border-slate-200">
                    <div class="text-xs font-mono font-semibold text-slate-500 mb-2">Pratinjau Foto Terpilih:</div>
                    <img src="" alt="Pratinjau" class="w-full max-h-64 object-cover rounded-lg border border-slate-200">
                </div>
                @error('image') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Deskripsi Prestasi -->
            <div>
                <label for="description" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Deskripsi & Keterangan Prestasi <span class="text-rose-500">*</span>
                </label>
                <textarea name="description" id="description" rows="6" required placeholder="Jelaskan rincian kejuaraan, penyelenggara, dan apresiasi yang diraih..." class="w-full px-3.5 py-3 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:bg-white transition-all leading-relaxed">{{ old('description') }}</textarea>
                @error('description') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.prestasi.index') }}" class="px-4 py-2 rounded-lg border border-slate-300 text-xs font-mono font-semibold uppercase tracking-wider text-slate-600 hover:bg-slate-50 transition-colors">
                Batalkan
            </a>
            <button type="submit" class="px-5 py-2 rounded-lg bg-purple-600 hover:bg-purple-500 text-white text-xs font-mono font-bold uppercase tracking-wider shadow-sm transition-all">
                Simpan Prestasi
            </button>
        </div>
    </form>
</div>
@endsection
