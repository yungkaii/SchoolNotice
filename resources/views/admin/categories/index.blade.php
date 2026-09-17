@extends('layouts.admin')

@section('title', 'Kelola Kategori Konten')
@section('page_title', 'Kategori Konten')
@section('page_subtitle', 'Taksonomi klasifikasi informasi pengumuman dan warta berita sekolah')

@section('content')
<div class="space-y-6 max-w-5xl mx-auto font-sans">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">Kategori Konten Terdaftar</h2>
            <p class="text-xs text-slate-500 mt-0.5">Struktur taksonomi untuk pengorganisasian warta dan pengumuman</p>
        </div>
        <a href="{{ route('admin.kategori.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-amber-500 hover:bg-amber-400 text-tech-950 text-xs font-mono font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>+ Tambah Kategori</span>
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200 text-[10px] font-mono font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3 px-4">Nama Kategori & Slug</th>
                        <th class="py-3 px-3">Deskripsi</th>
                        <th class="py-3 px-3 text-center">Pengumuman</th>
                        <th class="py-3 px-3 text-center">Berita</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                <div class="font-bold text-slate-900">{{ $category->name }}</div>
                                <div class="text-[10px] text-slate-400 mt-0.5 font-mono">slug: {{ $category->slug }}</div>
                            </td>
                            <td class="py-3.5 px-3 text-xs text-slate-600 max-w-xs truncate font-sans">
                                {{ $category->description ?? '—' }}
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-xs text-[10px] font-mono font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                    {{ $category->announcements_count }} item
                                </span>
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-xs text-[10px] font-mono font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    {{ $category->news_count }} artikel
                                </span>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.kategori.edit', $category) }}" class="p-1.5 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button type="button" data-action="{{ route('admin.kategori.destroy', $category) }}" data-name="Kategori {{ $category->name }}" class="btn-trigger-delete p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 px-4 text-center">
                                <p class="text-xs font-mono text-slate-500">Belum ada kategori yang dibuat.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
