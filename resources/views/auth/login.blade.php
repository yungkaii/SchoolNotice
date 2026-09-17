@extends('layouts.app')

@section('title', 'Login Administrator')

@section('content')
<div class="min-h-[82vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-tech-950 bg-tech-grid-dark relative overflow-hidden">
    <!-- Subtle dark gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-tech-950/80 via-tech-950/95 to-tech-950 pointer-events-none"></div>

    <div class="relative max-w-md w-full">
        <!-- Card Container -->
        <div class="bg-tech-900 rounded-2xl p-8 sm:p-10 border border-tech-800 shadow-2xl relative overflow-hidden reveal-init">
            <!-- Top Industrial Accent Stripe -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 via-cobalt-500 to-amber-500"></div>

            <!-- Header Logo & Terminal Title -->
            <div class="text-center mb-8">
                <div class="w-12 h-12 rounded-xl bg-tech-950 border border-tech-800 flex items-center justify-center text-amber-400 mx-auto mb-4 shadow-inner">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
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

            <!-- Back to Home -->
            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-xs font-mono text-slate-400 hover:text-amber-400 transition-colors">
                    &larr; Kembali ke Website Publik SMKN 1 Ciomas
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
