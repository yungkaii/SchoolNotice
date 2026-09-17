@extends('layouts.admin')

@section('title', 'Kelola Administrator')
@section('page_title', 'Kelola Akun Administrator')
@section('page_subtitle', 'Manajemen hak akses pengelola konten SchoolNotice SMKN 1 CIOMAS')

@section('content')
<div class="space-y-6 max-w-5xl mx-auto font-sans">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">Kelola Akun Administrator</h2>
            <p class="text-xs text-slate-500 mt-0.5">Pengguna terotorisasi dengan hak akses manajerial sistem</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-tech-950 hover:bg-tech-900 text-white text-xs font-mono font-bold uppercase tracking-wider rounded-lg shadow-sm transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            <span>+ Tambah Admin</span>
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200 text-[10px] font-mono font-bold uppercase tracking-wider text-slate-500">
                        <th class="py-3 px-4">Nama Administrator</th>
                        <th class="py-3 px-3">Alamat Email</th>
                        <th class="py-3 px-3">Peran (Role)</th>
                        <th class="py-3 px-3">Terdaftar Sejak</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-tech-950 text-amber-400 font-mono font-bold flex items-center justify-center text-xs shadow-sm shrink-0 border border-tech-800">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900 flex items-center gap-2">
                                            <span>{{ $user->name }}</span>
                                            @if($user->id === auth()->id())
                                                <span class="px-1.5 py-0.2 rounded-xs text-[9px] font-mono font-bold uppercase bg-amber-100 text-amber-800 border border-amber-200">Anda</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap font-mono text-xs text-slate-600">
                                {{ $user->email }}
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap">
                                @if($user->role === 'admin')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-xs text-[10px] font-mono font-bold uppercase bg-amber-50 text-amber-800 border border-amber-200">
                                        Super Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-xs text-[10px] font-mono font-semibold uppercase bg-slate-100 text-slate-700 border border-slate-200">
                                        Editor Konten
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap text-xs font-mono text-slate-500">
                                {{ $user->created_at ? $user->created_at->format('d M Y') : '—' }}
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-1.5 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    @if($user->id !== auth()->id())
                                        <button type="button" data-action="{{ route('admin.users.destroy', $user) }}" data-name="Admin {{ $user->name }}" class="btn-trigger-delete p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 px-4 text-center">
                                <p class="text-xs font-mono text-slate-500">Belum ada akun administrator terdaftar.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="px-4 py-3 border-t border-slate-100">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
