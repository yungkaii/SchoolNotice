@extends('layouts.app')

@section('title', 'Login Administrator')
@section('hide_navbar', true)
@section('hide_footer', true)

@section('content')
<div class="flex-1 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-tech-950 bg-tech-grid-dark relative overflow-hidden min-h-screen">
    <!-- Subtle dark gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-tech-950/80 via-tech-950/95 to-tech-950 pointer-events-none"></div>

    <div class="relative max-w-md w-full">
        <!-- Top Bar Navigation (Kembali ke Beranda) -->
        <div class="mb-5 flex items-center justify-between">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-mono font-bold tracking-wider text-slate-300 bg-tech-900 hover:bg-amber-500 hover:text-tech-950 border border-tech-800 hover:border-amber-400 transition-all shadow-md group">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>KEMBALI KE BERANDA</span>
            </a>
            <div class="flex items-center gap-2 text-[11px] font-mono text-slate-500">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <span>SECURITY GATE</span>
            </div>
        </div>

        <!-- Card Container -->
        <div class="bg-tech-900 rounded-2xl p-8 sm:p-10 border border-tech-800 shadow-2xl relative overflow-hidden reveal-init">
            <!-- Top Industrial Accent Stripe -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 via-cobalt-500 to-amber-500"></div>

            <!-- Header Logo & Terminal Title -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-2xl bg-white p-2 flex items-center justify-center mx-auto mb-4 shadow-lg ring-2 ring-tech-800">
                    <img src="{{ asset('images/logoskanic2.png') }}" alt="Logo SMKN 1 Ciomas" class="w-full h-full object-contain">
                </div>
                <span class="inline-block px-2.5 py-0.5 rounded-xs bg-tech-950 border border-tech-800 text-[10px] font-mono font-bold uppercase tracking-wider text-amber-400 mb-2">
                    SMKN 1 CIOMAS • SECURITY GATE
                </span>
                <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight font-sans">
                    Admin Console Login
                </h2>
                <p class="text-xs text-slate-400 mt-1 font-sans">
                    Otorisasi akses panel pengelolaan data & warta sekolah
                </p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Alamat Email Akun
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email', 'admin@schoolnotice.test') }}" required autofocus
                            class="w-full pl-10 pr-4 py-2.5 rounded-lg text-xs sm:text-sm font-sans bg-tech-950 border @error('email') border-rose-500 text-rose-300 @else border-tech-800 text-white @enderror focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition-all placeholder-slate-600">
                    </div>
                    @error('email')
                        <p class="text-xs font-mono text-rose-400 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-xs font-mono font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                        Kata Sandi Autentikasi
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" value="password" required
                            class="w-full pl-10 pr-4 py-2.5 rounded-lg text-xs sm:text-sm font-sans bg-tech-950 border @error('password') border-rose-500 text-rose-300 @else border-tech-800 text-white @enderror focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition-all placeholder-slate-600">
                    </div>
                    @error('password')
                        <p class="text-xs font-mono text-rose-400 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded-xs bg-tech-950 border-tech-800 text-amber-500 focus:ring-amber-500">
                        <span class="text-xs font-sans text-slate-400">Ingat sesi kredensial</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-2.5 px-4 rounded-lg text-xs sm:text-sm font-mono font-bold uppercase tracking-wider text-tech-950 bg-amber-500 hover:bg-amber-400 shadow-sm transition-all duration-200">
                    Masuk ke Dashboard &rarr;
                </button>
            </form>

            <!-- Quick Demo Credential Helper -->
            <div class="mt-6 p-3 rounded-lg bg-tech-950 border border-tech-800 text-[11px] font-mono text-slate-400">
                <span class="block font-bold text-amber-400 uppercase tracking-wide">Kredensial Default (Testing):</span>
                <span class="block text-slate-300 mt-1">Email: <span class="text-white">admin@schoolnotice.test</span></span>
                <span class="block text-slate-300">Password: <span class="text-white">password</span></span>
            </div>

            <!-- Back to Home Button -->
            <div class="mt-6 pt-4 border-t border-tech-800/80 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-lg text-xs font-mono font-bold tracking-wider text-slate-300 hover:text-white bg-tech-950/80 hover:bg-tech-950 border border-tech-800 hover:border-slate-700 transition-all">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Kembali ke Halaman Beranda</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
