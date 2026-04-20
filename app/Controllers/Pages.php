<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $halamanModel = new \App\Models\HalamanDinamisModel();

        // 1. Fitur Unggulan (Mengapa Memilih Kami?)
        $fitur = $halamanModel->where('halaman', 'beranda')->where('kategori', 'fitur')->findAll();
        if(empty($fitur)) {
            $defaultFitur = [
                ['judul' => 'Kurikulum Berkualitas', 'konten' => 'Kurikulum nasional yang diperkaya dengan program pengembangan karakter dan keterampilan abad 21', 'icon' => 'book-open'],
                ['judul' => 'Guru Profesional', 'konten' => 'Tenaga pengajar berpengalaman dan berdedikasi tinggi untuk membimbing siswa mencapai prestasi terbaik', 'icon' => 'users'],
                ['judul' => 'Prestasi Gemilang', 'konten' => 'Berbagai prestasi akademik dan non-akademik di tingkat kota, provinsi, dan nasional', 'icon' => 'trophy'],
                ['judul' => 'Fasilitas Lengkap', 'konten' => 'Laboratorium, perpustakaan, dan fasilitas olahraga yang mendukung pembelajaran optimal', 'icon' => 'target'],
            ];
            foreach($defaultFitur as $f) {
                $halamanModel->save(['halaman' => 'beranda', 'kategori' => 'fitur', 'judul' => $f['judul'], 'konten' => $f['konten'], 'gambar_icon' => $f['icon']]);
            }
            $fitur = $halamanModel->where('halaman', 'beranda')->where('kategori', 'fitur')->findAll();
        }

        // 2. Statistik
        $statistik = $halamanModel->where('halaman', 'beranda')->where('kategori', 'statistik')->findAll();
        if(empty($statistik)) {
            $defaultStats = [
                ['judul' => 'Tenaga Pendidik', 'konten' => '30+'],
                ['judul' => 'Tahun Berdiri', 'konten' => '1995'],
                ['judul' => 'Akreditasi', 'konten' => 'A'],
                ['judul' => 'Status Sekolah', 'konten' => 'Negeri'],
            ];
            foreach($defaultStats as $s) {
                $halamanModel->save(['halaman' => 'beranda', 'kategori' => 'statistik', 'judul' => $s['judul'], 'konten' => $s['konten']]);
            }
            $statistik = $halamanModel->where('halaman', 'beranda')->where('kategori', 'statistik')->findAll();
        }

        // 3. Program Utama Beranda
        $program_utama = $halamanModel->where('halaman', 'beranda')->where('kategori', 'program_unggulan')->findAll();
        if(empty($program_utama)) {
            $defaultPrograms = [
                ['judul' => 'Program Akademik', 'konten' => 'Pembelajaran berkualitas dengan metode modern dan interaktif', 'gambar' => 'https://images.unsplash.com/photo-1589104760192-ccab0ce0d90f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxpbmRvbmVzaWFuJTIwc3R1ZGVudHMlMjBjbGFzc3Jvb20lMjBsZWFybmluZ3xlbnwxfHx8fDE3NzQ5Mzg4ODB8MA&ixlib=rb-4.1.0&q=80&w=1080'],
                ['judul' => 'Program Ekstrakurikuler', 'konten' => 'Berbagai pilihan kegiatan untuk mengembangkan bakat dan minat siswa', 'gambar' => 'https://images.unsplash.com/photo-1760259904989-3c9b99ad49d8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHVkZW50cyUyMHNwb3J0cyUyMGZpZWxkfGVufDF8fHx8MTc3NDg2MjI1NXww&ixlib=rb-4.1.0&q=80&w=1080'],
                ['judul' => 'Program Karakter', 'konten' => 'Pembentukan karakter dan nilai-nilai moral yang kuat', 'gambar' => 'https://images.unsplash.com/photo-1632217138608-66217da0142f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzY2hvb2wlMjBsaWJyYXJ5JTIwYm9va3N8ZW58MXx8fHwxNzc0OTE1ODY5fDA&ixlib=rb-4.1.0&q=80&w=1080'],
            ];
            foreach($defaultPrograms as $prog) {
                $halamanModel->save(['halaman' => 'beranda', 'kategori' => 'program_unggulan', 'judul' => $prog['judul'], 'konten' => $prog['konten'], 'gambar_icon' => $prog['gambar']]);
            }
            $program_utama = $halamanModel->where('halaman', 'beranda')->where('kategori', 'program_unggulan')->findAll();
        }

        // 4. Prestasi
        $prestasi = $halamanModel->where('halaman', 'beranda')->where('kategori', 'prestasi')->findAll();
        if(empty($prestasi)) {
            $defaultPrestasi = [
                ['judul' => 'Juara 1 Olimpiade Matematika Tingkat Nasional', 'konten' => '2025'],
                ['judul' => 'Juara 2 Lomba Robotika Se-Jakarta', 'konten' => '2025'],
                ['judul' => 'Juara 1 Kompetisi Debat Bahasa Inggris', 'konten' => '2024'],
                ['judul' => 'Juara 3 Festival Seni Budaya Nasional', 'konten' => '2024'],
            ];
            foreach($defaultPrestasi as $pres) {
                $halamanModel->save(['halaman' => 'beranda', 'kategori' => 'prestasi', 'judul' => $pres['judul'], 'konten' => $pres['konten']]);
            }
            $prestasi = $halamanModel->where('halaman', 'beranda')->where('kategori', 'prestasi')->findAll();
        }

        // 5. Fasilitas
        $fasilitas = $halamanModel->where('halaman', 'beranda')->where('kategori', 'fasilitas')->findAll();
        if(empty($fasilitas)) {
            $defaultFasilitas = ['Laboratorium IPA Modern', 'Laboratorium Komputer', 'Perpustakaan Digital', 'Ruang Multimedia', 'Lapangan Olahraga', 'Studio Musik', 'Aula Serbaguna', 'Masjid'];
            foreach($defaultFasilitas as $fas) {
                $halamanModel->save(['halaman' => 'beranda', 'kategori' => 'fasilitas', 'konten' => $fas]);
            }
            $fasilitas = $halamanModel->where('halaman', 'beranda')->where('kategori', 'fasilitas')->findAll();
        }

        // Cek Section Ekstra Beranda
        $ekstra = $halamanModel->where('halaman', 'beranda')->where('kategori', 'ekstra')->findAll();

        $data = [
            'fitur' => $fitur,
            'statistik' => $statistik,
            'program_utama' => $program_utama,
            'prestasi' => $prestasi,
            'fasilitas' => $fasilitas,
            'ekstra' => $ekstra,
            'isAdmin' => session()->get('role') === 'super_admin'
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $halamanModel = new \App\Models\HalamanDinamisModel();
        
        // Cek jika jumlah Misi di DB kurang dari aslinya, maka hapus semua data dulu agar di-seed ulang komplit
        $jml_misi = $halamanModel->where('halaman', 'tentang')->where('kategori', 'misi')->countAllResults();
        if ($jml_misi > 0 && $jml_misi < 7) {
            // $halamanModel->emptyTable('halaman_dinamis'); // Removed to not empty table on testing
        }

        // Cek dan seed Profil
        $profil = $halamanModel->where('halaman', 'tentang')->where('kategori', 'profil')->first();
        if (!$profil) {
            $halamanModel->save(['halaman' => 'tentang', 'kategori' => 'profil', 'judul' => 'Profil Singkat', 'konten' => 'SMP Negeri 2 Margoyoso adalah sekolah menengah pertama negeri yang berdiri sejak 17 Juli 1995 berdasarkan SK Pendirian Nomor 107/O/1997. Berlokasi di Jalan Tambak Buntu, Kecamatan Margoyoso, Kabupaten Pati, Provinsi Jawa Tengah. Dengan 30 guru dan tenaga pendidik yang berdedikasi, sekolah berkomitmen mewujudkan peserta didik yang beriman, berakhlak mulia, cerdas, terampil, kreatif, dan berwawasan lingkungan.']);
            $profil = $halamanModel->where('halaman', 'tentang')->where('kategori', 'profil')->first();
        }

        // Cek dan seed Visi
        $visi = $halamanModel->where('halaman', 'tentang')->where('kategori', 'visi')->first();
        if (!$visi) {
            $halamanModel->save(['halaman' => 'tentang', 'kategori' => 'visi', 'judul' => 'Visi Sekolah', 'konten' => 'TERWUJUDNYA PESERTA DIDIK YANG BERIMAN DAN BERTAQWA KEPADA TUHAN YME, BERAKHLAK MULIA, CERDAS, TERAMPIL, KREATIF DAN BERWAWASAN LINGKUNGAN']);
            $visi = $halamanModel->where('halaman', 'tentang')->where('kategori', 'visi')->first();
        }

        // Cek dan seed Misi
        $misi = $halamanModel->where('halaman', 'tentang')->where('kategori', 'misi')->findAll();
        if(empty($misi)) {
            $defaultMisi = [
                'Membangun kultur budaya sekolah berkarakter religius yang beriman dan bertaqwa kepada Tuhan YME.',
                'Meningkatkan kualitas personal yang religius, maju, mandiri dan sejahtera serta berakhlak mulia.',
                'Melaksanakan pembelajaran secara efektif dan efisien sehingga dapat mengembangkan potensi peserta didik secara optimal.',
                'Meningkatkan keterampilan peserta didik dalam mengembangkan logika, praktika dan estetika serta kreatifitas sehingga dapat berkembang secara optimal.',
                'Mendorong dan membantu warga sekolah untuk mengenali potensi dirinya serta meningkatkan kreatifitasnya.',
                'Menumbuhkembangkan budaya bersih dan indah pada semua warga sekolah.',
                'Mewujudkan kenyamanan lingkungan yang nyaman, aman dan menyenangkan dalam mendukung terciptanya proses pembelajaran.'
            ];
            foreach($defaultMisi as $m) {
                $halamanModel->save(['halaman' => 'tentang', 'kategori' => 'misi', 'konten' => $m]);
            }
            $misi = $halamanModel->where('halaman', 'tentang')->where('kategori', 'misi')->findAll();
        }

        // Cek dan seed Identitas
        $identitas = $halamanModel->where('halaman', 'tentang')->where('kategori', 'identitas')->findAll();
        if(empty($identitas)) {
            $defaultId = [
                ['judul' => 'NPSN', 'konten' => '20338988'],
                ['judul' => 'Status', 'konten' => 'Negeri'],
                ['judul' => 'Bentuk Pendidikan', 'konten' => 'SMP'],
                ['judul' => 'Status Kepemilikan', 'konten' => 'Pemerintah Daerah'],
                ['judul' => 'SK Pendirian', 'konten' => '107/O/1997'],
                ['judul' => 'Tanggal SK Pendirian', 'konten' => '17 Juli 1995'],
                ['judul' => 'SK Izin Operasional', 'konten' => '420/05854'],
                ['judul' => 'Tanggal SK Izin Operasional', 'konten' => '1 Januari 1910'],
                ['judul' => 'Alamat', 'konten' => 'Jl. Tambak Buntu, Kec. Margoyoso, Kab. Pati, Prov. Jawa Tengah'],
                ['judul' => 'Jumlah Guru & Tenaga Pendidik', 'konten' => '30 Orang'],
            ];
            foreach($defaultId as $id_skul) {
                $halamanModel->save(['halaman' => 'tentang', 'kategori' => 'identitas', 'judul' => $id_skul['judul'], 'konten' => $id_skul['konten']]);
            }
            $identitas = $halamanModel->where('halaman', 'tentang')->where('kategori', 'identitas')->findAll();
        }

        // Cek dan seed Tujuan
        $tujuan = $halamanModel->where('halaman', 'tentang')->where('kategori', 'tujuan')->findAll();
        if(empty($tujuan)) {
            $defaultTujuan = [
                'Membentuk karakter siswa yang beriman dan bertaqwa kepada Tuhan YME.',
                'Meningkatkan sikap sopan santun dan berbudi pekerti luhur sebagai cerminan akhlak mulia.',
                'Menghasilkan lulusan yang berkualitas dan berdaya saing tinggi.',
                'Meningkatkan prestasi akademik maupun non akademik peserta didik.',
                'Meningkatkan dan menghasilkan hasil karya sebagai wujud implementasi profil pelajar pancasila.',
                'Meningkatkan partisipasi warga sekolah dalam melestarikan lingkungan hidup.',
                'Terciptanya kenyamanan lingkungan sekolah dalam menunjang proses pembelajaran yang optimal.'
            ];
            foreach($defaultTujuan as $t) {
                $halamanModel->save(['halaman' => 'tentang', 'kategori' => 'tujuan', 'konten' => $t]);
            }
            $tujuan = $halamanModel->where('halaman', 'tentang')->where('kategori', 'tujuan')->findAll();
        }

        // Cek dan seed Nilai
        $nilai = $halamanModel->where('halaman', 'tentang')->where('kategori', 'nilai')->findAll();
        if(empty($nilai)) {
            $halamanModel->save(['halaman' => 'tentang', 'kategori' => 'nilai', 'judul' => 'Religius', 'konten' => 'Membangun karakter beriman dan bertaqwa kepada Tuhan YME dalam setiap aspek kehidupan sekolah', 'gambar_icon' => 'heart']);
            $halamanModel->save(['halaman' => 'tentang', 'kategori' => 'nilai', 'judul' => 'Berprestasi', 'konten' => 'Mendorong siswa untuk mencapai prestasi akademik dan non-akademik yang optimal', 'gambar_icon' => 'award']);
            $halamanModel->save(['halaman' => 'tentang', 'kategori' => 'nilai', 'judul' => 'Berwawasan Lingkungan', 'konten' => 'Menumbuhkan budaya bersih, indah, dan peduli terhadap kelestarian lingkungan', 'gambar_icon' => 'leaf']);
            $halamanModel->save(['halaman' => 'tentang', 'kategori' => 'nilai', 'judul' => 'Inovatif & Kreatif', 'konten' => 'Mengembangkan logika, praktika, estetika, dan kreativitas peserta didik secara optimal', 'gambar_icon' => 'lightbulb']);
            $nilai = $halamanModel->where('halaman', 'tentang')->where('kategori', 'nilai')->findAll();
        }

        // Cek Section Ekstra
        $ekstra = $halamanModel->where('halaman', 'tentang')->where('kategori', 'ekstra')->findAll();

        $data = [
            'profil' => $profil,
            'visi' => $visi,
            'misi' => $misi,
            'identitas' => $identitas,
            'tujuan' => $tujuan,
            'nilai' => $nilai,
            'ekstra' => $ekstra,
            'isAdmin' => session()->get('role') === 'super_admin'
        ];

        return view('pages/about', $data);
    }

    public function programs()
    {
        $halamanModel = new \App\Models\HalamanDinamisModel();

        // 1. Program Akademik
        $akademik = $halamanModel->where('halaman', 'program')->where('kategori', 'akademik')->findAll();
        if(empty($akademik)) {
            $defaultAkademik = [
                ['judul' => 'Matematika & IPA', 'konten' => 'Program pembelajaran Matematika dan IPA dengan pendekatan problem solving dan eksperimen praktis', 'gambar' => 'https://images.unsplash.com/photo-1605781645799-c9c7d820b4ac?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHVkZW50cyUyMHNjaWVuY2UlMjBsYWJvcmF0b3J5fGVufDF8fHx8MTc3NDkzODg4MXww&ixlib=rb-4.1.0&q=80&w=1080', 'icon' => 'book-open'],
                ['judul' => 'Bahasa & Sosial', 'konten' => 'Penguasaan Bahasa Indonesia, Inggris, dan ilmu sosial untuk wawasan luas', 'gambar' => 'https://images.unsplash.com/photo-1632217138608-66217da0142f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzY2hvb2wlMjBsaWJyYXJ5JTIwYm9va3N8ZW58MXx8fHwxNzc0OTE1ODY5fDA&ixlib=rb-4.1.0&q=80&w=1080', 'icon' => 'globe'],
                ['judul' => 'Teknologi & Komputer', 'konten' => 'Pembelajaran coding, robotika, dan literasi digital untuk masa depan', 'gambar' => 'https://images.unsplash.com/photo-1771408427146-09be9a1d4535?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHVkZW50cyUyMGNvbXB1dGVyJTIwY2xhc3N8ZW58MXx8fHwxNzc0OTM4ODgyfDA&ixlib=rb-4.1.0&q=80&w=1080', 'icon' => 'code'],
            ];
            foreach($defaultAkademik as $prog) {
                $halamanModel->save(['halaman' => 'program', 'kategori' => 'akademik', 'judul' => $prog['judul'], 'konten' => $prog['konten'], 'gambar_icon' => $prog['gambar'].';'.$prog['icon']]);
            }
            $akademik = $halamanModel->where('halaman', 'program')->where('kategori', 'akademik')->findAll();
        }

        // 2. Ekstrakurikuler
        $ekskul = $halamanModel->where('halaman', 'program')->where('kategori', 'ekstrakurikuler')->findAll();
        if(empty($ekskul)) {
            $defaultEkskul = [
                ['judul' => 'Olahraga', 'konten' => 'Basket, Futsal, Voli, Bulu Tangkis, Renang, Taekwondo', 'icon' => 'trophy'],
                ['judul' => 'Seni & Budaya', 'konten' => 'Tari Tradisional, Paduan Suara, Band, Melukis, Teater', 'icon' => 'palette'],
                ['judul' => 'Sains & Teknologi', 'konten' => 'Robotika, Coding Club, KIR, English Club', 'icon' => 'beaker'],
                ['judul' => 'Kepemimpinan', 'konten' => 'OSIS, Pramuka, PMR, Paskibra', 'icon' => 'heart'],
            ];
            foreach($defaultEkskul as $eks) {
                $halamanModel->save(['halaman' => 'program', 'kategori' => 'ekstrakurikuler', 'judul' => $eks['judul'], 'konten' => $eks['konten'], 'gambar_icon' => $eks['icon']]);
            }
            $ekskul = $halamanModel->where('halaman', 'program')->where('kategori', 'ekstrakurikuler')->findAll();
        }

        // Cek Section Ekstra Program
        $ekstra = $halamanModel->where('halaman', 'program')->where('kategori', 'ekstra')->findAll();

        $data = [
            'akademik' => $akademik,
            'ekskul' => $ekskul,
            'ekstra' => $ekstra,
            'isAdmin' => session()->get('role') === 'super_admin'
        ];

        return view('pages/programs', $data);
    }

}
