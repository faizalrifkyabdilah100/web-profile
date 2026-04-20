<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('pages/home');
    }

    public function about()
    {
        $halamanModel = new \App\Models\HalamanDinamisModel();
        
        // Cek jika jumlah Misi di DB kurang dari aslinya, maka hapus semua data dulu agar di-seed ulang komplit
        $jml_misi = $halamanModel->where('halaman', 'tentang')->where('kategori', 'misi')->countAllResults();
        if ($jml_misi > 0 && $jml_misi < 7) {
            $halamanModel->emptyTable('halaman_dinamis');
            // reset auto increment could be done, but emptying is enough to trigger the seeder
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

        $data = [
            'profil' => $profil,
            'visi' => $visi,
            'misi' => $misi,
            'identitas' => $identitas,
            'tujuan' => $tujuan,
            'nilai' => $nilai
        ];

        return view('pages/about', $data);
    }

    public function programs()
    {
        return view('pages/programs');
    }

}
