@extends('layouts.app')

@section('title', 'Login Administrator')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-50/70 via-slate-50 to-slate-100">
    <div class="max-w-md w-full">
        <!-- Card Container -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-slate-200/80 reveal-init">
            <!-- Header Logo -->
            <div class="text-center mb-8">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-blue-700 via-blue-600 to-indigo-600 flex items-center justify-center text-white mx-auto mb-4 shadow-lg shadow-blue-500/25">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">Portal Admin SchoolNotice</h2>
                <p class="text-xs text-slate-500 mt-1">Masuk untuk mengelola pengumuman, event, berita, dan prestasi</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Alamat Email Admin
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email', 'admin@schoolnotice.test') }}" required autofocus
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl text-sm border @error('email') border-rose-500 focus:ring-rose-500/20 @else border-slate-200 focus:border-blue-500 focus:ring-blue-500/20 @enderror focus:ring-2 outline-none transition-all">
                    </div>
                    @error('email')
                        <p class="text-xs font-semibold text-rose-600 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                        Kata Sandi
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" value="password" required
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl text-sm border @error('password') border-rose-500 focus:ring-rose-500/20 @else border-slate-200 focus:border-blue-500 focus:ring-blue-500/20 @enderror focus:ring-2 outline-none transition-all">
                    </div>
                    @error('password')
                        <p class="text-xs font-semibold text-rose-600 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded text-blue-600 border-slate-300 focus:ring-blue-500">
                        <span class="text-xs font-medium text-slate-600">Ingat sesi saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-md shadow-blue-600/25 transition-all duration-200 hover:-translate-y-0.5">
                    Masuk ke Dashboard
                </button>
            </form>

            <!-- Quick Demo Credential Helper -->
            <div class="mt-8 p-3.5 rounded-xl bg-blue-50/70 border border-blue-100 text-xs text-blue-800">
                <span class="block font-bold">Kredensial Akun Administrator Bawaan:</span>
                <span class="block text-blue-600 mt-0.5">Email: <strong>admin@schoolnotice.test</strong></span>
                <span class="block text-blue-600">Password: <strong>password</strong></span>
            </div>

            <!-- Back to Home -->
            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-500 hover:text-blue-600 transition-colors">
                    &larr; Kembali ke Website Publik
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
