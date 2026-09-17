@extends('layouts.admin')

@section('title', 'Edit Administrator')
@section('page_title', 'Perbarui Akun Admin')
@section('page_subtitle', 'Ubah data profil atau hak akses peran administrator SMKN 1 CIOMAS')

@section('content')
<div class="space-y-6 max-w-2xl mx-auto font-sans">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2 text-xs font-mono text-slate-500 uppercase tracking-wider">
            <a href="{{ route('admin.users.index') }}" class="hover:text-amber-600 transition-colors">Admin</a>
            <span>/</span>
            <span class="text-amber-600 font-bold">Edit</span>
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-3.5 py-1.5 text-xs font-mono font-semibold uppercase tracking-wider text-slate-600 hover:text-slate-900 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
            Kembali
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

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl border border-slate-200 p-5 sm:p-6 shadow-sm space-y-5">
            <div>
                <label for="name" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Nama Lengkap <span class="text-rose-500">*</span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all">
                @error('name') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Alamat Email Login <span class="text-rose-500">*</span>
                </label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all">
                @error('email') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Kata Sandi Baru <span class="text-slate-400 lowercase font-normal">(kosongkan jika tidak ingin mengubah)</span>
                </label>
                <input type="password" name="password" id="password" placeholder="Minimal 8 karakter baru" class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all">
                @error('password') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="role" class="block text-xs font-mono font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                    Hak Akses / Peran <span class="text-rose-500">*</span>
                </label>
                <select name="role" id="role" required class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-xs font-sans focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 focus:bg-white transition-all text-slate-700">
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Super Admin (Akses Penuh)</option>
                    <option value="editor" {{ old('role', $user->role) === 'editor' ? 'selected' : '' }}>Editor Konten (Pengumuman, Event, Berita, Prestasi)</option>
                </select>
                @error('role') <p class="text-xs font-mono text-rose-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 rounded-lg border border-slate-300 text-xs font-mono font-semibold uppercase tracking-wider text-slate-600 hover:bg-slate-50 transition-colors">
                Batalkan
            </a>
            <button type="submit" class="px-5 py-2 rounded-lg bg-amber-500 hover:bg-amber-400 text-tech-950 text-xs font-mono font-bold uppercase tracking-wider shadow-sm transition-all">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
