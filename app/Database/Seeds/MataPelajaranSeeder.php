<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode'       => 'MTK',
                'nama'       => 'Matematika',
                'kelompok'   => 'Kelompok A (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang bilangan, struktur, ruang, dan perubahan. Mencakup aritmatika, aljabar, geometri, dan statistika dasar.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'IPA',
                'nama'       => 'Ilmu Pengetahuan Alam',
                'kelompok'   => 'Kelompok A (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang alam sekitar melalui pengamatan dan eksperimen. Mencakup fisika, kimia, dan biologi dasar.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'IPS',
                'nama'       => 'Ilmu Pengetahuan Sosial',
                'kelompok'   => 'Kelompok A (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang kehidupan sosial masyarakat. Mencakup geografi, sejarah, ekonomi, dan sosiologi dasar.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'BIN',
                'nama'       => 'Bahasa Indonesia',
                'kelompok'   => 'Kelompok A (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang penggunaan bahasa Indonesia yang baik dan benar, membaca, menulis, dan sastra Indonesia.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'BING',
                'nama'       => 'Bahasa Inggris',
                'kelompok'   => 'Kelompok A (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang kemampuan berbahasa Inggris mencakup listening, speaking, reading, dan writing.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'PKN',
                'nama'       => 'Pendidikan Kewarganegaraan',
                'kelompok'   => 'Kelompok A (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang nilai-nilai Pancasila, UUD 1945, hak dan kewajiban warga negara, serta sistem pemerintahan.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'PAI',
                'nama'       => 'Pendidikan Agama Islam',
                'kelompok'   => 'Kelompok A (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang ajaran agama Islam, Al-Quran, hadits, akidah, akhlak, fiqih, dan sejarah kebudayaan Islam.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'PJOK',
                'nama'       => 'Pendidikan Jasmani, Olahraga dan Kesehatan',
                'kelompok'   => 'Kelompok B (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang aktivitas jasmani, olahraga, dan kesehatan untuk kebugaran fisik peserta didik.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'SBD',
                'nama'       => 'Seni Budaya',
                'kelompok'   => 'Kelompok B (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang seni rupa, seni musik, seni tari, dan seni teater serta apresiasi budaya.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'INF',
                'nama'       => 'Informatika',
                'kelompok'   => 'Kelompok B (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang berpikir komputasional, teknologi informasi dan komunikasi, serta literasi digital.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'PRK',
                'nama'       => 'Prakarya',
                'kelompok'   => 'Kelompok B (Umum)',
                'deskripsi'  => 'Mata pelajaran yang mempelajari tentang kerajinan, rekayasa, budidaya, dan pengolahan untuk mengembangkan keterampilan.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'BJW',
                'nama'       => 'Bahasa Jawa',
                'kelompok'   => 'Muatan Lokal',
                'deskripsi'  => 'Mata pelajaran muatan lokal yang mempelajari tentang bahasa, sastra, dan budaya Jawa untuk melestarikan kearifan lokal.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode'       => 'BK',
                'nama'       => 'Bimbingan Konseling',
                'kelompok'   => 'Pengembangan Diri',
                'deskripsi'  => 'Layanan bimbingan dan konseling untuk membantu peserta didik dalam pengembangan diri, karir, sosial, dan belajar.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('mata_pelajaran')->truncate();
        $this->db->table('mata_pelajaran')->insertBatch($data);
    }
}
