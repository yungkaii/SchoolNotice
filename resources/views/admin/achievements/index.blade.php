@extends('layouts.admin')

@section('title', 'Kelola Prestasi Siswa')
@section('page_title', 'Kelola Prestasi Siswa')
@section('page_subtitle', 'Dokumentasi capaian medali, LKS, dan kejuaraan siswa SMKN 1 CIOMAS')

@section('content')
<div class="space-y-6 font-sans">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">Daftar Prestasi & Juara Siswa</h2>
            <p class="text-xs text-slate-500 mt-0.5">Rekam jejak penghargaan kompetensi kejuruan dan non-akademik</p>
        </div>
        <a href="{{ route('admin.prestasi.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-purple-600 hover:bg-purple-500 text-white text-xs font-mono font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>+ Tambah Prestasi</span>
        </a>
    </div>

    <!-- Filters & Search Card -->
    <div class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
        <form action="{{ route('admin.prestasi.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <div class="sm:col-span-2 relative">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama siswa, kelas, atau nama kejuaraan..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:bg-white transition-all">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <div class="flex items-center gap-2">
                <select name="level" class="flex-1 py-2 px-3 bg-slate-50 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:bg-white transition-all text-slate-700 font-sans">
                    <option value="">Semua Tingkat</option>
                    @foreach($levels as $lvl)
                        <option value="{{ $lvl }}" {{ request('level') == $lvl ? 'selected' : '' }}>{{ $lvl }}</option>
                    @endforeach
                </select>
                <button type="submit" class="px-4 py-2 bg-tech-950 hover:bg-tech-900 text-white rounded-lg text-xs font-mono font-bold uppercase tracking-wider transition-colors">
                    Filter
                </button>
                @if(request()->anyFilled(['q', 'level']))
                    <a href="{{ route('admin.prestasi.index') }}" class="p-2 text-slate-400 hover:text-slate-600 rounded-lg border border-slate-200 hover:bg-slate-50" title="Reset Filter">
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
                        <th class="py-3 px-4">Siswa & Dokumentasi</th>
                        <th class="py-3 px-3">Nama Kejuaraan / Prestasi</th>
                        <th class="py-3 px-3">Tingkat</th>
                        <th class="py-3 px-3">Tanggal Raihan</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($achievements as $achievement)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $achievement->image_url }}" alt="{{ $achievement->student_name }}" class="w-10 h-10 rounded-lg object-cover border border-slate-200 shrink-0">
                                    <div class="min-w-0">
                                        <h4 class="font-bold text-slate-900 truncate max-w-xs">{{ $achievement->student_name }}</h4>
                                        <div class="flex items-center gap-1.5 mt-0.5">
                                            <span class="text-[10px] font-mono text-slate-400">Kelas:</span>
                                            <span class="px-1.5 py-0.2 rounded-xs text-[10px] font-mono font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                                {{ $achievement->class }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-3">
                                <div class="font-bold text-slate-900 line-clamp-1 max-w-md">{{ $achievement->title }}</div>
                                <div class="text-[11px] text-slate-400 mt-0.5 line-clamp-1 max-w-md">{{ $achievement->excerpt }}</div>
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-xs text-[10px] font-mono font-bold uppercase border {{ $achievement->level_badge_class }}">
                                    {{ $achievement->level }}
                                </span>
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap">
                                <div class="text-xs font-mono font-medium text-slate-700">{{ $achievement->achievement_date->format('d M Y') }}</div>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.prestasi.edit', $achievement) }}" class="p-1.5 text-slate-400 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <button type="button" data-action="{{ route('admin.prestasi.destroy', $achievement) }}" data-name="{{ $achievement->title }} ({{ $achievement->student_name }})" class="btn-trigger-delete p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Hapus">
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
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                </div>
                                <h4 class="font-bold text-slate-800">Tidak ada data prestasi ditemukan</h4>
                                <p class="text-xs text-slate-500 mt-1">Coba sesuaikan kata kunci pencarian atau tingkat kejuaraan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($achievements->hasPages())
            <div class="px-4 py-3 border-t border-slate-100">
                {{ $achievements->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
