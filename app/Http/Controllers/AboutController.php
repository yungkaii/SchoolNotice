<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $facilities = [
            [
                'name' => 'Laboratorium Komputer & AI',
                'description' => 'Fasilitas 3 ruang lab komputer modern dengan 120 unit PC spesifikasi tinggi, koneksi gigabit fiber optic, dan AC.',
                'icon' => 'computer',
            ],
            [
                'name' => 'Laboratorium Sains Terpadu',
                'description' => 'Laboratorium Fisika, Kimia, dan Biologi dengan standar keselamatan modern dan peralatan instrumen lengkap.',
                'icon' => 'beaker',
            ],
            [
                'name' => 'Perpustakaan & Digital Library',
                'description' => 'Koleksi lebih dari 15.000 judul buku, e-journal terakreditasi, ruang baca hening ber-AC, dan area diskusi.',
                'icon' => 'book',
            ],
            [
                'name' => 'Auditorium Graha Widya',
                'description' => 'Gedung serbaguna berkapasitas 800 tempat duduk dengan sistem tata suara mutakhir dan panggung pertunjukan seni.',
                'icon' => 'academic',
            ],
            [
                'name' => 'Gedung Olahraga & Lapangan Terpadu',
                'description' => 'Fasilitas lapangan basket berstandar FIBA, lapangan futsal rumput sintetis, lapangan bulutangkis, dan panjat tebing.',
                'icon' => 'trophy',
            ],
            [
                'name' => 'Studio Musik & Seni Budaya',
                'description' => 'Ruang kedap suara untuk latihan gamelan tradisional, ansambel musik modern, dan seni peran teater.',
                'icon' => 'sparkles',
            ],
        ];

        $leaders = [
            [
                'name' => 'Drs. H. Bambang Sudarsono, M.Pd.',
                'role' => 'Kepala Sekolah',
                'desc' => 'Pengabdi dunia pendidikan selama lebih dari 25 tahun, berkomitmen membawa SchoolNotice menjadi institusi global unggul.',
            ],
            [
                'name' => 'Dra. Sri Wahyuni, M.Si.',
                'role' => 'Wakasek Bidang Kurikulum',
                'desc' => 'Mengawal implementasi kurikulum merdeka inovatif dan integrasi pembelajaran berbasis teknologi cerdas.',
            ],
            [
                'name' => 'Ahmad Fauzi, S.Pd., M.Ed.',
                'role' => 'Wakasek Bidang Kesiswaan',
                'desc' => 'Membina potensi karakter, organisasi kepemimpinan OSIS/MPK, dan prestasi talenta peserta didik.',
            ],
            [
                'name' => 'Ir. Maya Safitri, M.T.',
                'role' => 'Wakasek Bidang Sarana & Prasarana',
                'desc' => 'Memastikan kelayakan infrastruktur kampus hijau sekolah, kenyamanan ruang kelas, dan laboratorium mutakhir.',
            ],
        ];

        return view('pages.about', compact('facilities', 'leaders'));
    }
}
