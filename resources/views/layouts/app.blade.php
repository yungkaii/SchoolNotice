<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SchoolNotice - Pusat Informasi & Pengumuman Sekolah') | SMKN 1 CIOMAS</title>
    <meta name="description" content="@yield('meta_description', 'Portal resmi sistem informasi, pengumuman, agenda kegiatan, berita, dan prestasi siswa SMKN 1 CIOMAS.')">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logoskanic2.png') }}">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-blue-600 selection:text-white min-h-screen flex flex-col">

    <!-- Toast Notification Container -->
    @include('components.toast')

    <!-- Navigation Header & Running News Ticker -->
    @if(!request()->routeIs('login*') && !request()->routeIs('admin.login*') && !View::hasSection('hide_navbar'))
        @include('components.navbar')
        <x-news-ticker />
    @endif

    <!-- Main Content -->
    <main class="flex-grow flex flex-col">
        @yield('content')
    </main>

    <!-- Footer -->
    @if(!request()->routeIs('login*') && !View::hasSection('hide_footer'))
        @include('components.footer')
    @endif

    <!-- Floating Back to Top Button -->
    <button id="back-to-top-btn" 
            type="button" 
            aria-label="Kembali ke atas"
            class="fixed bottom-6 right-6 z-40 p-3 rounded-full bg-slate-900/90 hover:bg-blue-600 text-white shadow-xl hover:shadow-2xl hover:shadow-blue-500/25 border border-slate-700/60 backdrop-blur-md transition-all duration-300 transform opacity-0 pointer-events-none translate-y-4 group">
        <svg class="w-5 h-5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    @stack('scripts')
</body>
</html>
