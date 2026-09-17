@extends('layouts.admin')

@section('title', 'Kelola Berita Sekolah')
@section('page_title', 'Kelola Berita Sekolah')
@section('page_subtitle', 'Publikasi warta berita, dokumentasi kegiatan, dan artikel SMKN 1 CIOMAS')

@section('content')
<div class="space-y-6 font-sans">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">Daftar Warta Berita</h2>
            <p class="text-xs text-slate-500 mt-0.5">Kelola artikel redaksi dan liputan kegiatan sekolah</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-mono font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>+ Tulis Berita Baru</span>
        </a>
    </div>

    <!-- Filters & Search Card -->
    <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
        <form action="{{ route('admin.berita.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <div class="sm:col-span-2 relative">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul berita atau artikel..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 focus:bg-white transition-all">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <div class="flex items-center gap-2">
                <select name="category" class="flex-1 py-2 px-3 bg-slate-50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 focus:bg-white transition-all text-slate-700 font-sans">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="px-4 py-2 bg-tech-950 hover:bg-tech-900 text-white rounded-lg text-xs font-mono font-bold uppercase tracking-wider transition-colors">
                    Filter
                </button>
                @if(request()->anyFilled(['q', 'category']))
                    <a href="{{ route('admin.berita.index') }}" class="p-2 text-slate-400 hover:text-slate-600 rounded-lg border border-slate-200 hover:bg-slate-50" title="Reset Filter">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200 text-[10px] font-mono font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3 px-4">Artikel Berita</th>
                        <th class="py-3 px-3">Kategori</th>
                        <th class="py-3 px-3">Penulis</th>
                        <th class="py-3 px-3">Tanggal Rilis</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($news as $item)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-10 h-10 rounded-lg object-cover border border-slate-200 shrink-0">
                                    <div class="min-w-0">
                                        <h4 class="font-bold text-slate-900 truncate max-w-xs md:max-w-md">{{ $item->title }}</h4>
                                        <p class="text-[11px] text-slate-400 mt-0.5 truncate max-w-xs">{{ Str::limit(strip_tags($item->content), 60) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-xs text-[11px] font-mono font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                    {{ $item->category->name ?? 'Warta Sekolah' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap">
                                <div class="flex items-center gap-2 text-xs text-slate-700 font-medium">
                                    <span class="w-5 h-5 rounded-md bg-tech-950 text-amber-400 font-mono font-bold flex items-center justify-center text-[10px]">
                                        {{ substr($item->author->name ?? 'A', 0, 1) }}
                                    </span>
                                    <span>{{ $item->author->name ?? 'Admin Sekolah' }}</span>
                                </div>
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap">
                                <div class="text-xs font-mono font-medium text-slate-700">{{ $item->published_at->format('d M Y') }}</div>
                                <div class="text-[10px] font-mono text-slate-400 mt-0.5">{{ $item->reading_time }} mnt baca</div>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="p-1.5 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-colors" title="Lihat di Web">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.berita.edit', $item) }}" class="p-1.5 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button type="button" data-action="{{ route('admin.berita.destroy', $item) }}" data-name="{{ $item->title }}" class="btn-trigger-delete p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Hapus">
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
                                <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                                <h4 class="font-bold text-slate-800">Tidak ada berita ditemukan</h4>
                                <p class="text-xs text-slate-500 mt-1">Coba sesuaikan kata kunci pencarian atau filter kategori Anda.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($news->hasPages())
            <div class="px-4 py-3 border-t border-slate-100">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
