<footer class="bg-slate-950 text-slate-300 pt-16 pb-12 border-t border-slate-800 bg-tech-grid-dark relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pb-12 border-b border-slate-800">
            <!-- Col 1: School Identity (5 cols) -->
            <div class="lg:col-span-5 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-lg bg-white p-1 flex items-center justify-center shadow-md shrink-0">
                        <img src="{{ asset('images/logoskanic2.png') }}" alt="Logo SMKN 1 Ciomas" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-xl font-black text-white tracking-tight">School<span class="text-blue-500">Notice</span></span>
                            <span class="text-[10px] font-mono px-1.5 py-0.5 bg-blue-950 text-blue-300 border border-blue-800 rounded">SMK PUSAT KEUNGGULAN</span>
                        </div>
                        <span class="block text-xs font-bold font-mono text-slate-400 uppercase">SMKN 1 CIOMAS</span>
                    </div>
                </div>

                <p class="text-xs text-slate-400 leading-relaxed max-w-md">
                    Portal publikasi informasi resmi, edaran kedinasan, agenda uji kompetensi, warta inovasi teknologi, dan rekam jejak prestasi kejuruan SMKN 1 CIOMAS. Menghadirkan keterbukaan informasi bagi siswa, pendidik, orang tua, dan mitra dunia industri (DUDI).
                </p>

                <div class="pt-2 flex flex-wrap gap-2 text-[11px] font-mono text-slate-400">
                    <span class="px-2 py-1 rounded bg-slate-900 border border-slate-800">NPSN: 20268412</span>
                    <span class="px-2 py-1 rounded bg-slate-900 border border-slate-800">STATUS: NEGERI</span>
                    <span class="px-2 py-1 rounded bg-slate-900 border border-slate-800">AKREDITASI: A (UNGGUL)</span>
                </div>
            </div>

            <!-- Col 2: Program Keahlian (3 cols) -->
            <div class="lg:col-span-3">
                <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-200 mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                    <span>Konsentrasi Keahlian</span>
                </h4>
                <ul class="space-y-2 text-xs text-slate-400 font-medium">
                    <li class="hover:text-white transition-colors">• Pengembangan Perangkat Lunak dan Gim (PPLG)</li>
                    <li class="hover:text-white transition-colors">• Broadcasting dan Perfilman (BCF)</li>
                    <li class="hover:text-white transition-colors">• Animasi Digital 2D & 3D</li>
                    <li class="hover:text-white transition-colors">• Teknik Otomotif</li>
                    <li class="hover:text-white transition-colors">• Teknik Pengelasan & Fabrikasi Logam</li>
                </ul>
            </div>

            <!-- Col 3: Navigasi Cepat (2 cols) -->
            <div class="lg:col-span-2">
                <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-200 mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                    <span>Kanal Utama</span>
                </h4>
                <ul class="space-y-2 text-xs text-slate-400 font-medium">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="{{ route('pengumuman.index') }}" class="hover:text-white transition-colors">Pengumuman Resmi</a></li>
                    <li><a href="{{ route('event.index') }}" class="hover:text-white transition-colors">Kalender Agenda</a></li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-white transition-colors">Warta Sekolah</a></li>
                    <li><a href="{{ route('prestasi.index') }}" class="hover:text-white transition-colors">Galeri Juara</a></li>
                </ul>
            </div>

            <!-- Col 4: Kontak & Alamat (2 cols) -->
            <div class="lg:col-span-2">
                <h4 class="text-xs font-mono font-bold uppercase tracking-wider text-slate-200 mb-4 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                    <span>Sekretariat</span>
                </h4>
                <div class="space-y-2.5 text-xs text-slate-400 leading-relaxed">
                    <p>
                        <strong class="text-slate-300 block">SMKN 1 Ciomas:</strong>
                        Jl. Raya Laladon, Ciomas, Kec. Ciomas, Kab. Bogor, Jawa Barat 16610
                    </p>
                    <p class="font-mono">
                        <span class="text-slate-500">Telp:</span> (0251) 8632-456<br>
                        <span class="text-slate-500">Email:</span> info@smkn1ciomas.sch.id
                    </p>
                    <div class="pt-1">
                        <a href="{{ route('login') }}" class="inline-block text-[11px] font-mono text-blue-400 hover:text-blue-300 hover:underline">
                            &gt; Akses Login Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Legal & Architecture Metadata -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] font-mono text-slate-500">
            <p>&copy; {{ date('Y') }} SMKN 1 CIOMAS — SchoolNotice Platform. Seluruh Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>
