@extends('layouts.app')

@section('title', 'Tentang Sekolah')
@section('meta_description', 'Profil lengkap, sejarah, visi misi, fasilitas pembelajaran, dan struktur pimpinan SMKN 1 CIOMAS.')

@section('content')
<!-- Hero Header -->
<div class="bg-gradient-to-b from-blue-50/70 to-slate-50 pt-12 pb-16 border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-100/70 px-3 py-1 rounded-md inline-block mb-3">
            Profil & Identitas
        </span>
        <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
            Mengenal SMKN 1 CIOMAS
        </h1>
        <p class="text-base sm:text-lg text-slate-600 mt-4 leading-relaxed">
            Membangun generasi cerdas berkarakter, berwawasan global, terampil vokasi, dan unggul dalam penguasaan sains serta teknologi industri masa depan.
        </p>
    </div>
</div>

<!-- History & Philosophy Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 space-y-5 reveal-init">
                <span class="text-xs font-bold uppercase tracking-wider text-blue-600">Sejarah Singkat</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">
                    Dedikasi Pendidikan Kejuruan Unggulan untuk Masa Depan Bangsa
                </h2>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    Didirikan dengan visi vokasi unggul, SMKN 1 CIOMAS bermula dari komitmen para pendidik dan tokoh masyarakat untuk menghadirkan institusi pendidikan kejuruan berkualitas yang mengutamakan kedalaman integritas akhlak, keahlian terapan, dan keunggulan teknologi.
                </p>
                <p class="text-slate-600 leading-relaxed text-sm sm:text-base">
                    Kini, dengan akreditasi "A" Unggul, sekolah terus bertransformasi mengadopsi kurikulum modern, fasilitas laboratorium digital, dan kemitraan internasional guna mencetak lulusan yang siap bersaing di perguruan tinggi terbaik dunia.
                </p>

                <div class="grid grid-cols-3 gap-4 pt-4 border-t border-slate-100">
                    <div>
                        <span class="block text-3xl font-black text-blue-600">28+</span>
                        <span class="block text-xs text-slate-500 font-semibold mt-0.5">Tahun Berkarya</span>
                    </div>
                    <div>
                        <span class="block text-3xl font-black text-blue-600">1.200+</span>
                        <span class="block text-xs text-slate-500 font-semibold mt-0.5">Siswa Aktif</span>
                    </div>
                    <div>
                        <span class="block text-3xl font-black text-blue-600">98%</span>
                        <span class="block text-xs text-slate-500 font-semibold mt-0.5">Tembus PTN & LN</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6 reveal-init reveal-delay-2">
                <div class="p-8 rounded-3xl bg-gradient-to-tr from-blue-900 to-indigo-900 text-white shadow-2xl relative overflow-hidden">
                    <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Nilai Utama Sekolah (C-O-R-E)</h3>
                    <ul class="space-y-3 text-sm text-blue-100">
                        <li class="flex items-start gap-2.5">
                            <span class="w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">C</span>
                            <span><strong>Character:</strong> Menjunjung tinggi kejujuran, ketakwaan, dan empati sosial.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">O</span>
                            <span><strong>Open-minded:</strong> Terbuka terhadap inovasi ilmu pengetahuan dan kemajemukan dunia.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">R</span>
                            <span><strong>Resilience:</strong> Daya juang tangguh menghadapi tantangan dan persaingan.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">E</span>
                            <span><strong>Excellence:</strong> Berikhtiar memberikan karya terbaik bagi kemajuan peradaban.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="py-16 lg:py-20 bg-slate-50 border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 reveal-init">
            <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-100 px-3 py-1 rounded-md">Visi & Misi</span>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Arah dan Tujuan Institusi</h2>
            <p class="text-sm text-slate-500 mt-1">Landasan filosofis dalam membimbing segenap civitas akademika</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Visi Card -->
            <div class="reveal-init p-8 rounded-3xl bg-white border border-slate-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mb-5 font-black text-lg">
                        V
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Visi Sekolah</h3>
                    <p class="text-base text-slate-700 leading-relaxed font-medium">
                        "Terwujudnya sekolah unggul berstandar global yang melahirkan cendekiawan muda beriman, berakhlak mulia, adaptif terhadap teknologi digital, dan berwawasan pelestarian lingkungan."
                    </p>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-100 text-xs text-slate-400">
                    Rencana Jangka Panjang Sekolah 2025 - 2030
                </div>
            </div>

            <!-- Misi Card -->
            <div class="reveal-init reveal-delay-2 p-8 rounded-3xl bg-white border border-slate-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-5 font-black text-lg">
                        M
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Misi Sekolah</h3>
                    <ul class="space-y-3 text-sm text-slate-600 leading-relaxed">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 font-bold">•</span>
                            <span>Menyelenggarakan proses pembelajaran transformatif berbasis riset dan pemanfaatan kecerdasan buatan.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 font-bold">•</span>
                            <span>Mengembangkan minat dan bakat peserta didik melalui pembinaan intensif olimpiade, olahraga, dan seni.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 font-bold">•</span>
                            <span>Menumbuhkan budaya literasi, kepedulian sosial, dan kepemimpinan berlandaskan nilai-nilai Pancasila.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-600 font-bold">•</span>
                            <span>Menjalin sinergi kemitraan strategis dengan institusi riset dan universitas dalam serta luar negeri.</span>
                        </li>
                    </ul>
                </div>
                <div class="pt-6 mt-6 border-t border-slate-100 text-xs text-slate-400">
                    Implementasi Terarah Berkesinambungan
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facilities Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 reveal-init">
            <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-100 px-3 py-1 rounded-md">Sarana Penunjang</span>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Fasilitas Unggulan Sekolah</h2>
            <p class="text-sm text-slate-500 mt-1">Infrastruktur modern yang mendukung kenyamanan dan eksplorasi belajar siswa</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($facilities as $fac)
                <div class="reveal-init p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:bg-white hover:border-blue-300 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-2">{{ $fac['name'] }}</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">{{ $fac['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Leadership Section -->
<section class="py-16 lg:py-20 bg-slate-50 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 reveal-init">
            <span class="text-xs font-bold uppercase tracking-wider text-blue-600 bg-blue-100 px-3 py-1 rounded-md">Manajemen</span>
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mt-2">Pimpinan & Manajemen Sekolah</h2>
            <p class="text-sm text-slate-500 mt-1">Insan pendidik profesional yang berdedikasi mengawal arah pendidikan sekolah</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($leaders as $leader)
                <div class="reveal-init p-6 rounded-2xl bg-white border border-slate-200/80 shadow-sm flex flex-col items-center text-center">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-white flex items-center justify-center font-bold text-2xl shadow-lg shadow-blue-500/20 mb-4">
                        {{ strtoupper(substr($leader['name'], 0, 1)) }}
                    </div>
                    <h3 class="text-base font-bold text-slate-900">{{ $leader['name'] }}</h3>
                    <span class="text-xs font-semibold text-blue-600 mt-1">{{ $leader['role'] }}</span>
                    <p class="text-xs text-slate-500 mt-3 leading-relaxed">{{ $leader['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact & Map Section -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="p-8 sm:p-12 rounded-3xl bg-slate-900 text-white shadow-2xl reveal-init">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <div class="lg:col-span-6 space-y-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-blue-400">Hubungi Kami</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white">
                        Kunjungi Kampus SMKN 1 CIOMAS
                    </h2>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Kami senantiasa membuka pintu bagi para calon murid, orang tua, dan rekanan industri untuk berkonsultasi maupun melihat langsung fasilitas laboratorium sekolah kami.
                    </p>

                    <div class="space-y-3 pt-4 text-sm text-slate-300">
                        <p class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-slate-800 text-blue-400 flex items-center justify-center shrink-0">📍</span>
                            <span>Jl. Raya Laladon, Ciomas, Kec. Ciomas, Kab. Bogor, Jawa Barat 16610</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-slate-800 text-blue-400 flex items-center justify-center shrink-0">📞</span>
                            <span>(0251) 8632-456 / +62 812-3456-7890</span>
                        </p>
                        <p class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg bg-slate-800 text-blue-400 flex items-center justify-center shrink-0">✉️</span>
                            <span>info@smkn1ciomas.sch.id</span>
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-6 flex flex-col justify-center">
                    <div class="p-6 rounded-2xl bg-slate-800 border border-slate-700 space-y-3 text-center">
                        <h4 class="text-base font-bold text-white">Jam Operasional Pelayanan</h4>
                        <p class="text-xs text-slate-400 leading-relaxed">
                            Senin - Jumat: 07.30 - 15.30 WIB<br>
                            Sabtu: 08.00 - 12.00 WIB (Layanan Khusus & Ekstrakurikuler)<br>
                            Minggu & Hari Libur Nasional: Tutup
                        </p>
                        <div class="pt-3">
                            <a href="{{ route('pengumuman.index') }}" class="inline-block px-5 py-2.5 rounded-xl text-xs font-bold text-blue-900 bg-white hover:bg-blue-50 transition-colors">
                                Lihat Informasi Terbaru &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
