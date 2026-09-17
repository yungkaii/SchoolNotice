<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\Event;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Helper to generate modern vector cards in storage
        $generateSvg = function (string $subfolder, string $filename, string $title, string $tag, string $c1, string $c2) {
            $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 650" width="100%" height="100%">
  <defs>
    <linearGradient id="grad_{$filename}" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="{$c1}"/>
      <stop offset="100%" stop-color="{$c2}"/>
    </linearGradient>
    <filter id="cardShadow" x="-10%" y="-10%" width="120%" height="125%">
      <feDropShadow dx="0" dy="16" stdDeviation="20" flood-color="#090d16" flood-opacity="0.3"/>
    </filter>
  </defs>
  <rect width="1000" height="650" fill="url(#grad_{$filename})"/>
  <circle cx="900" cy="100" r="280" fill="#ffffff" fill-opacity="0.08"/>
  <circle cx="100" cy="550" r="220" fill="#ffffff" fill-opacity="0.06"/>
  <path d="M-50,320 Q250,180 550,380 T1050,340 L1050,650 L-50,650 Z" fill="#ffffff" fill-opacity="0.04"/>

  <g filter="url(#cardShadow)" transform="translate(100, 110)">
    <rect width="800" height="430" rx="28" fill="#ffffff" fill-opacity="0.14" stroke="#ffffff" stroke-opacity="0.3" stroke-width="1.5"/>
    
    <!-- Badge -->
    <rect x="50" y="55" width="220" height="42" rx="21" fill="#ffffff" fill-opacity="0.25"/>
    <circle cx="72" cy="76" r="6" fill="#facc15"/>
    <text x="92" y="82" fill="#ffffff" font-family="'Plus Jakarta Sans', system-ui, sans-serif" font-size="14" font-weight="800" letter-spacing="1">{$tag}</text>
    
    <!-- Title -->
    <text x="50" y="160" fill="#ffffff" font-family="'Plus Jakarta Sans', system-ui, sans-serif" font-size="34" font-weight="900">{$title}</text>
    
    <!-- Decorative lines -->
    <rect x="50" y="210" width="600" height="12" rx="6" fill="#ffffff" fill-opacity="0.6"/>
    <rect x="50" y="235" width="480" height="12" rx="6" fill="#ffffff" fill-opacity="0.5"/>
    <rect x="50" y="260" width="530" height="12" rx="6" fill="#ffffff" fill-opacity="0.5"/>
    
    <!-- School Badge Footer inside card -->
    <g transform="translate(50, 320)">
      <rect width="200" height="50" rx="14" fill="#ffffff" fill-opacity="0.2"/>
      <circle cx="30" cy="25" r="14" fill="#ffffff"/>
      <text x="24" y="30" fill="#1e3a8a" font-family="system-ui, sans-serif" font-size="14" font-weight="900">SN</text>
      <text x="55" y="24" fill="#ffffff" font-family="system-ui, sans-serif" font-size="13" font-weight="700">SchoolNotice</text>
      <text x="55" y="38" fill="#ffffff" font-family="system-ui, sans-serif" font-size="10" fill-opacity="0.8">Official Portal</text>
    </g>
  </g>
</svg>
SVG;
            Storage::disk('public')->put("{$subfolder}/{$filename}.svg", $svg);

            return "{$subfolder}/{$filename}.svg";
        };

        // 2. Seed Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@schoolnotice.test'],
            [
                'name' => 'Administrator Sekolah',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // 3. Seed Categories
        $categoriesData = [
            ['name' => 'Akademik', 'description' => 'Informasi proses belajar mengajar, ujian, dan kalender pendidikan'],
            ['name' => 'Kesiswaan', 'description' => 'Kegiatan murid, tata tertib, dan organisasi sekolah'],
            ['name' => 'Sarana & Prasarana', 'description' => 'Fasilitas gedung, laboratorium, dan sarana penunjang sekolah'],
            ['name' => 'Beasiswa', 'description' => 'Peluang dan program beasiswa prestasi serta bantuan belajar'],
            ['name' => 'Informasi Kelulusan', 'description' => 'Agenda kelulusan, cap tiga jari, dan ijazah alumni'],
            ['name' => 'Ekstrakurikuler', 'description' => 'Aktivitas ekstrakurikuler seni, olahraga, dan sains'],
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[$cat['name']] = Category::firstOrCreate(
                ['name' => $cat['name']],
                ['slug' => Str::slug($cat['name']), 'description' => $cat['description']]
            );
        }

        // 4. Seed Announcements
        $announcements = [
            [
                'title' => 'Jadwal Pelaksanaan Penilaian Akhir Semester (PAS) Ganjil TA 2026/2027',
                'category_id' => $categories['Akademik']->id,
                'content' => '<p>Diberitahukan kepada seluruh peserta didik kelas X, XI, dan XII bahwa Penilaian Akhir Semester (PAS) Ganjil Tahun Ajaran 2026/2027 akan diselenggarakan mulai tanggal <strong>1 Desember 2026</strong> sampai dengan <strong>12 Desember 2026</strong>.</p><p>Ujian akan dilaksanakan berbasis sistem Computer-Based Testing (CBT) di laboratorium komputer sekolah dan gawai masing-masing siswa yang telah terpasang aplikasi Safe Exam Browser.</p><p>Harap seluruh siswa mempersiapkan kartu peserta ujian, menaati tata tertib waktu kehadiran maksimal 15 menit sebelum bel masuk, dan membawa perlengkapan kartu peserta.</p>',
                'published_at' => Carbon::now()->subDays(2)->toDateString(),
                'expired_at' => Carbon::now()->addDays(20)->toDateString(),
                'status' => 'published',
                'image' => $generateSvg('announcements', 'announcement-1', 'Jadwal PAS Ganjil 2026/2027', 'AKADEMIK', '#1e3a8a', '#2563eb'),
            ],
            [
                'title' => 'Pendaftaran Program Beasiswa Indonesia Cerdas & Prestasi Tahap II',
                'category_id' => $categories['Beasiswa']->id,
                'content' => '<p>Kabar gembira bagi siswa-siswi berprestasi baik di bidang akademik maupun non-akademik! Seleksi Program Beasiswa Indonesia Cerdas Tahap II telah resmi dibuka.</p><p>Beasiswa ini mencakup bantuan dana pendidikan, tunjangan buku, dan pembinaan intensif persiapan olimpiade. Persyaratan administrasi:</p><ul><li>Fotokopi rapor 2 semester terakhir dengan nilai rata-rata minimal 85</li><li>Sertifikat juara kejuaraan minimal tingkat Kota/Kabupaten</li><li>Surat rekomendasi dari wali kelas</li><li>Surat keterangan penghasilan orang tua (untuk kategori beasiswa ekonomi)</li></ul><p>Batas akhir pengumpulan berkas ke Ruang BK adalah tanggal <strong>25 Oktober 2026</strong>.</p>',
                'published_at' => Carbon::now()->subDays(5)->toDateString(),
                'expired_at' => Carbon::now()->addDays(15)->toDateString(),
                'status' => 'published',
                'image' => $generateSvg('announcements', 'announcement-2', 'Program Beasiswa Tahap II', 'BEASISWA', '#047857', '#10b981'),
            ],
            [
                'title' => 'Tata Tertib dan Ketentuan Pakaian Seragam Sekolah Terbaru',
                'category_id' => $categories['Kesiswaan']->id,
                'content' => '<p>Menindaklanjuti hasil rapat dewan guru dan komite sekolah, diumumkan ketentuan baru mengenai kedisiplinan pemakaian atribut seragam sekolah terhitung mulai pekan depan:</p><ul><li><strong>Senin - Selasa:</strong> Seragam Putih Abu-abu lengkap dengan dasi, topi upacara, dan sabuk berlogo sekolah</li><li><strong>Rabu:</strong> Seragam Khas Yayasan / Batik Sekolah dengan bawahan hitam</li><li><strong>Kamis:</strong> Pakaian Tradisional Daerah / Adat Jawa</li><li><strong>Jumat:</strong> Pakaian Pramuka Lengkap atau seragam olahraga saat jam pelajaran PJOK</li></ul><p>Siswa yang tidak mematuhi ketentuan akan diberikan kartu pembinaan disiplin oleh Tim Tatib Sekolah.</p>',
                'published_at' => Carbon::now()->subDays(8)->toDateString(),
                'expired_at' => Carbon::now()->addDays(40)->toDateString(),
                'status' => 'published',
                'image' => $generateSvg('announcements', 'announcement-3', 'Ketentuan Seragam Sekolah', 'KESISWAAN', '#b45309', '#f59e0b'),
            ],
            [
                'title' => 'Pemeliharaan Laboratorium Komputer & Jaringan Internet Sekolah',
                'category_id' => $categories['Sarana & Prasarana']->id,
                'content' => '<p>Dalam rangka peningkatan performa server dan koneksi internet sekolah menyambut ujian semester, Tim IT Infrastruktur Sekolah akan melakukan upgrade jaringan serat optik dan server lokal pada hari Sabtu dan Minggu ini.</p><p>Selama periode pemeliharaan, akses Wi-Fi sekolah dan portal e-learning lokal akan mengalami interupsi sementara. Laboratorium Komputer 1, 2, dan 3 akan ditutup untuk umum mulai Jumat pukul 16:00 WIB.</p>',
                'published_at' => Carbon::now()->subDays(1)->toDateString(),
                'expired_at' => Carbon::now()->addDays(7)->toDateString(),
                'status' => 'published',
                'image' => $generateSvg('announcements', 'announcement-4', 'Upgrade Server & Lab', 'SARANA', '#374151', '#6b7280'),
            ],
            [
                'title' => 'Prosedur Verifikasi Kelulusan dan Pengambilan Ijazah Alumni Angkatan 2026',
                'category_id' => $categories['Informasi Kelulusan']->id,
                'content' => '<p>Diberitahukan kepada seluruh alumni angkatan 2026 bahwa blangko Ijazah resmi dari Dinas Pendidikan Provinsi telah selesai diverifikasi dan siap dibagikan.</p><p>Jadwal pengambilan ijazah dan cap 3 jari diatur sesuai nomor induk siswa di Bagian Tata Usaha mulai pukul 08:00 - 14:00 WIB. Harap membawa bukti bebas perpustakaan dan kartu identitas alumni.</p>',
                'published_at' => Carbon::now()->subDays(12)->toDateString(),
                'expired_at' => Carbon::now()->addDays(30)->toDateString(),
                'status' => 'published',
                'image' => $generateSvg('announcements', 'announcement-5', 'Pengambilan Ijazah Alumni', 'KELULUSAN', '#6d28d9', '#8b5cf6'),
            ],
            [
                'title' => 'Rancangan Anggaran dan Program Kerja OSIS Periode 2026/2027 (Draft)',
                'category_id' => $categories['Kesiswaan']->id,
                'content' => '<p>Draft rancangan program kerja pengurus OSIS periode 2026/2027 telah disusun untuk dipresentasikan dalam Sidang Paripurna MPK pada tanggal 30 September 2026 mendatang.</p>',
                'published_at' => Carbon::now()->addDays(5)->toDateString(),
                'expired_at' => null,
                'status' => 'draft',
                'image' => $generateSvg('announcements', 'announcement-6', 'Draft Program Kerja OSIS', 'DRAFT', '#475569', '#64748b'),
            ],
        ];

        foreach ($announcements as $item) {
            Announcement::firstOrCreate(
                ['slug' => Str::slug($item['title'])],
                array_merge($item, ['slug' => Str::slug($item['title'])])
            );
        }

        // 5. Seed Events
        $events = [
            [
                'title' => 'Class Meeting & Festival Seni Antar Kelas (CLASSIC 2026)',
                'description' => 'Festival tahunan pasca-ujian yang memadukan kompetisi olahraga futsal, basket, e-sport, festival tari kreasi modern, dan pasar kuliner kreasi siswa. Setiap kelas wajib mengirimkan delegasi terbaiknya untuk memperebutkan Piala Bergilir Kepala Sekolah.',
                'event_date' => Carbon::now()->addDays(14)->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '15:30:00',
                'location' => 'Lapangan Utama & Aula Terbuka',
                'person_in_charge' => 'Bpk. Hendra Gunawan, S.Pd (Pembina OSIS)',
                'status' => 'upcoming',
                'image' => $generateSvg('events', 'event-1', 'CLASSIC Festival Seni & Olahraga', 'FESTIVAL', '#0f766e', '#14b8a6'),
            ],
            [
                'title' => 'Seminar Nasional Literasi Digital & AI untuk Pelajar Masa Depan',
                'description' => 'Menghadirkan pakar teknologi kecerdasan buatan dari perguruan tinggi terkemuka dan praktisi industri teknologi. Siswa akan mempelajari pemanfaatan AI yang etis, dasar machine learning, dan peluang karier digital di era Revolusi Industri 5.0.',
                'event_date' => Carbon::now()->addDays(7)->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '12:30:00',
                'location' => 'Auditorium Graha Widya Lantai 3',
                'person_in_charge' => 'Ibu Dr. Ratna Susanti, M.Kom',
                'status' => 'upcoming',
                'image' => $generateSvg('events', 'event-2', 'Seminar Nasional AI Pelajar', 'SEMINAR', '#1e40af', '#3b82f6'),
            ],
            [
                'title' => 'Pekan Olahraga dan Seni (PORSENI) Pelajar Tingkat Kabupaten',
                'description' => 'Kontingen atlet dan duta seni sekolah kita akan berlaga dalam PORSENI Kabupaten ke-22. Mari berikan dukungan penuh untuk 45 perwakilan sekolah di cabang atletik, bulutangkis, catur, renang, dan vokal solo.',
                'event_date' => Carbon::now()->addDays(21)->toDateString(),
                'start_time' => '07:30:00',
                'end_time' => '17:00:00',
                'location' => 'GOR Tri Dharma Kabupaten',
                'person_in_charge' => 'Bpk. Donny Setiawan, M.Or (Guru PJOK)',
                'status' => 'upcoming',
                'image' => $generateSvg('events', 'event-3', 'PORSENI Pelajar 2026', 'KOMPETISI', '#b91c1c', '#ef4444'),
            ],
            [
                'title' => 'Workshop Strategi Tembus PTN Favorit (SNBP & UTBK-SNBT 2027)',
                'description' => 'Bimbingan karir komprehensif bagi murid kelas XI dan XII. Membahas strategi pemetaan nilai rapor, analisis rasionalisasi jurusan perguruan tinggi negeri favorit, simulasi try out CBT, dan tips memilih program studi impian.',
                'event_date' => Carbon::now()->addDays(30)->toDateString(),
                'start_time' => '08:30:00',
                'end_time' => '14:00:00',
                'location' => 'Ruang Multimedia & Konseling BK',
                'person_in_charge' => 'Ibu Nurul Aini, S.Psi (Koordinator BK)',
                'status' => 'upcoming',
                'image' => $generateSvg('events', 'event-4', 'Workshop Tembus PTN 2027', 'WORKSHOP', '#7c2d12', '#ea580c'),
            ],
            [
                'title' => 'Lomba Debat Bahasa Inggris & Pidato Kebangsaan Antar Sekolah',
                'description' => 'Ajang unjuk kemampuan retorika dan pemikiran kritis pemuda dalam bahasa Inggris dan bahasa Indonesia. Menghadirkan 32 tim perwakilan SMA se-provinsi.',
                'event_date' => Carbon::now()->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '15:00:00',
                'location' => 'Ruang Teater Mini Sekolah',
                'person_in_charge' => 'Mr. David Wijaya, M.Pd',
                'status' => 'ongoing',
                'image' => $generateSvg('events', 'event-5', 'Lomba Debat & Pidato', 'SEDANG BERLANGSUNG', '#047857', '#10b981'),
            ],
            [
                'title' => 'Upacara Peringatan Hari Pendidikan Nasional dan Apresiasi Insan Pendidik',
                'description' => 'Upacara bendera khidmat diiringi persembahan paduan suara, pembacaan ikrar pelajar berprestasi, serta penganugerahan penghargaan guru inspiratif dan tenaga kependidikan berdedikasi tinggi.',
                'event_date' => Carbon::now()->subDays(30)->toDateString(),
                'start_time' => '07:00:00',
                'end_time' => '09:30:00',
                'location' => 'Plaza Upacara Utama',
                'person_in_charge' => 'Wakasek Bidang Kesiswaan',
                'status' => 'finished',
                'image' => $generateSvg('events', 'event-6', 'Hardiknas & Guru Inspiratif', 'SELESAI', '#4b5563', '#9ca3af'),
            ],
        ];

        foreach ($events as $evt) {
            Event::firstOrCreate(
                ['slug' => Str::slug($evt['title'])],
                array_merge($evt, ['slug' => Str::slug($evt['title'])])
            );
        }

        // 6. Seed News
        $newsItems = [
            [
                'title' => 'Tim Robotik SMKN 1 CIOMAS Raih Juara 1 Tingkat Nasional di ITB',
                'category_id' => $categories['Ekstrakurikuler']->id,
                'author_id' => $admin->id,
                'content' => "<p>Prestasi membanggakan kembali diukir oleh siswa-siswi terbaik SMKN 1 CIOMAS. Tim Robotik 'AeroTech' berhasil menyabet Juara 1 dalam Kontes Robot Pelajar Nasional yang diselenggarakan di Institut Teknologi Bandung (ITB) akhir pekan lalu.</p><p>Mengusung inovasi robot otonom penyelamat bencana alam yang dilengkapi sensor LiDAR dan kecerdasan visual, robot karya siswa kami sukses mencatatkan waktu tercepat dan ketepatan manuver tertinggi di antara 64 tim dari berbagai provinsi.</p><p>Kepala Sekolah menyampaikan rasa bangga dan apresiasi setinggi-tingginya kepada tim dan pembina yang telah bekerja keras selama 6 bulan terakhir dalam mempersiapkan karya inovasi ini.</p>",
                'published_at' => Carbon::now()->subDays(3)->toDateString(),
                'image' => $generateSvg('news', 'news-1', 'Juara 1 Robotik Nasional di ITB', 'PRESTASI NASIONAL', '#1e3a8a', '#3b82f6'),
            ],
            [
                'title' => 'Peluncuran Laboratorium Bahasa Digital Berbasis Multimedia Terintegrasi',
                'category_id' => $categories['Sarana & Prasarana']->id,
                'author_id' => $admin->id,
                'content' => '<p>Guna meningkatkan kecakapan bahasa internasional para siswa, pihak sekolah secara resmi meresmikan Laboratorium Bahasa Digital Generasi Baru berkapasitas 48 unit workstation mutakhir.</p><p>Laboratorium ini dilengkapi perangkat lunak pembelajaran interaktif untuk Bahasa Inggris, Bahasa Jepang, Bahasa Jerman, dan Bahasa Mandarin. Kepala Dinas Pendidikan yang hadir mengapresiasi terobosan digitalisasi sarana belajar ini.</p>',
                'published_at' => Carbon::now()->subDays(6)->toDateString(),
                'image' => $generateSvg('news', 'news-2', 'Peresmian Lab Bahasa Digital', 'FASILITAS BARU', '#0f766e', '#14b8a6'),
            ],
            [
                'title' => 'Kunjungan Edukatif Siswa Kelas XII ke Lembaga Riset dan Kampus Ternama',
                'category_id' => $categories['Akademik']->id,
                'author_id' => $admin->id,
                'content' => '<p>Sebanyak 280 murid kelas XII mengikuti kegiatan Study Campus dan Industrial Exploration ke Badan Riset dan Inovasi Nasional (BRIN) serta Fakultas Kedokteran dan Teknik Universitas Gadjah Mada (UGM).</p><p>Kegiatan ini bertujuan memberikan gambaran nyata dunia riset sains modern dan memotivasi siswa dalam menentukan jurusan impian mereka di perguruan tinggi kelak.</p>',
                'published_at' => Carbon::now()->subDays(9)->toDateString(),
                'image' => $generateSvg('news', 'news-3', 'Study Tour & Riset Ilmiah', 'KEGIATAN SISWA', '#7c2d12', '#f97316'),
            ],
            [
                'title' => 'Gelar Karya Proyek P5 Tampilkan Inovasi Daur Ulang Ramah Lingkungan',
                'category_id' => $categories['Kesiswaan']->id,
                'author_id' => $admin->id,
                'content' => "<p>Halaman sekolah hari ini dipenuhi puluhan stand pameran karya siswa dalam Gelar Karya Proyek Penguatan Profil Pelajar Pancasila (P5) dengan tema 'Gaya Hidup Berkelanjutan'.</p><p>Siswa memamerkan aneka produk bernilai guna tinggi dari daur ulang plastik, pakaian bekas yang diproses kembali, serta purwarupa sistem hidroponik bertenaga surya.</p>",
                'published_at' => Carbon::now()->subDays(12)->toDateString(),
                'image' => $generateSvg('news', 'news-4', 'Gelar Karya Proyek P5', 'INOVASI HIJAU', '#15803d', '#22c55e'),
            ],
            [
                'title' => 'Ratusan Siswa Antusias Ikuti Aksi Donor Darah & Edukasi Kesehatan Remaja',
                'category_id' => $categories['Kesiswaan']->id,
                'author_id' => $admin->id,
                'content' => '<p>Bekerja sama dengan Palang Merah Indonesia (PMI) Kota, Palang Merah Remaja (PMR) Wira sekolah menyelenggarakan bakti sosial donor darah tahunan dan screening kesehatan gratis.</p><p>Tercatat sebanyak 120 kantong darah berhasil dikumpulkan dari siswa yang telah memenuhi syarat umur, bapak/ibu guru, dan tenaga kependidikan.</p>',
                'published_at' => Carbon::now()->subDays(15)->toDateString(),
                'image' => $generateSvg('news', 'news-5', 'Bakti Sosial Donor Darah', 'SOSIAL & KESEHATAN', '#be123c', '#f43f5e'),
            ],
            [
                'title' => 'Kemenangan Spektakuler Tim Basket Putri dalam Turnamen Walikota Cup',
                'category_id' => $categories['Ekstrakurikuler']->id,
                'author_id' => $admin->id,
                'content' => '<p>Pertandingan final sengit Turnamen Bola Basket Pelajar Walikota Cup 2026 berakhir manis bagi tim basket putri sekolah kita. Berhadapan dengan rival sekota di hadapan ribuan suporter, tim berhasil menang dramatis dengan skor 58-52.</p><p>Kemenangan ini memastikan trofi juara pertama kembali pulang ke sekolah untuk ketiga kalinya secara berturut-turut.</p>',
                'published_at' => Carbon::now()->subDays(18)->toDateString(),
                'image' => $generateSvg('news', 'news-6', 'Juara Walikota Cup Basket', 'OLAHRAGA', '#4338ca', '#6366f1'),
            ],
        ];

        foreach ($newsItems as $item) {
            News::firstOrCreate(
                ['slug' => Str::slug($item['title'])],
                array_merge($item, ['slug' => Str::slug($item['title'])])
            );
        }

        // 7. Seed Achievements
        $achievements = [
            [
                'student_name' => 'Muhammad Rayhan Pratama',
                'class' => 'XII IPA 1',
                'title' => 'Medali Emas Olimpiade Sains Nasional (OSN) Bidang Astronomi',
                'level' => 'Nasional',
                'achievement_date' => Carbon::now()->subDays(10)->toDateString(),
                'description' => 'Berhasil mengungguli 150 finalis dari seluruh penjuru Indonesia dalam tes teori astrofisika dan observasi data teleskop luar angkasa.',
                'image' => $generateSvg('achievements', 'achievement-1', 'Medali Emas OSN Astronomi', 'MEDALI EMAS', '#b45309', '#f59e0b'),
            ],
            [
                'student_name' => 'Alicia Jasmine Putri',
                'class' => 'XI MIPA 3',
                'title' => 'Medali Perak International Junior Science Olympiad (IJSO)',
                'level' => 'Internasional',
                'achievement_date' => Carbon::now()->subDays(25)->toDateString(),
                'description' => 'Mewakili kontingen Indonesia di ajang olimpiade sains internasional yang diselenggarakan di Kyoto, Jepang.',
                'image' => $generateSvg('achievements', 'achievement-2', 'Medali Perak IJSO Kyoto', 'INTERNASIONAL', '#6b21a8', '#a855f7'),
            ],
            [
                'student_name' => 'Daffa Arya Sena',
                'class' => 'XII IPS 2',
                'title' => 'Juara 1 Lomba Debat Hukum & Konstitusi Pelajar Tingkat Provinsi',
                'level' => 'Provinsi',
                'achievement_date' => Carbon::now()->subDays(40)->toDateString(),
                'description' => 'Meraih gelar Best Speaker dan membawa tim sekolah menjuarai kompetisi debat konstitusi antar SMA se-Provinsi.',
                'image' => $generateSvg('achievements', 'achievement-3', 'Juara 1 Debat Konstitusi', 'PROVINSI', '#1e40af', '#3b82f6'),
            ],
            [
                'student_name' => 'Siti Nurhaliza',
                'class' => 'X-B',
                'title' => 'Juara 1 Kejuaraan Bulutangkis Tunggal Putri Tingkat Pelajar',
                'level' => 'Kabupaten/Kota',
                'achievement_date' => Carbon::now()->subDays(50)->toDateString(),
                'description' => 'Menang straight game di babak final Turnamen Bulutangkis Pelajar Piala PBSI Kota.',
                'image' => $generateSvg('achievements', 'achievement-4', 'Juara 1 Bulutangkis Tunggal', 'KOTA / KABUPATEN', '#047857', '#10b981'),
            ],
            [
                'student_name' => 'Tim Paduan Suara Gita Pelajar',
                'class' => 'Gabungan X - XII',
                'title' => 'Juara Umum Festival Paduan Suara Sekolah Nasional',
                'level' => 'Nasional',
                'achievement_date' => Carbon::now()->subDays(65)->toDateString(),
                'description' => 'Tampil memukau membawakan lagu daerah aransemen kontemporer di hadapan juri vokal profesional.',
                'image' => $generateSvg('achievements', 'achievement-5', 'Juara Umum Paduan Suara', 'PADUAN SUARA', '#be123c', '#e11d48'),
            ],
            [
                'student_name' => 'Rizky Ananda Putra',
                'class' => 'XI IPS 1',
                'title' => 'Best Speaker National English Debate Championship',
                'level' => 'Nasional',
                'achievement_date' => Carbon::now()->subDays(80)->toDateString(),
                'description' => 'Mendapatkan poin individual tertinggi dari 48 pembicara debat bahasa Inggris tingkat nasional.',
                'image' => $generateSvg('achievements', 'achievement-6', 'Best Speaker English Debate', 'DEBAT INGGRIS', '#0f766e', '#14b8a6'),
            ],
        ];

        foreach ($achievements as $ach) {
            Achievement::firstOrCreate(
                ['title' => $ach['title'], 'student_name' => $ach['student_name']],
                $ach
            );
        }
    }
}
