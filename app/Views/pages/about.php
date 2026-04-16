<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
$identity = [
    ['label' => 'NPSN', 'value' => '20338988'],
    ['label' => 'Status', 'value' => 'Negeri'],
    ['label' => 'Bentuk Pendidikan', 'value' => 'SMP'],
    ['label' => 'Status Kepemilikan', 'value' => 'Pemerintah Daerah'],
    ['label' => 'SK Pendirian', 'value' => '107/O/1997'],
    ['label' => 'Tanggal SK Pendirian', 'value' => '17 Juli 1995'],
    ['label' => 'SK Izin Operasional', 'value' => '420/05854'],
    ['label' => 'Tanggal SK Izin Operasional', 'value' => '1 Januari 1910'],
    ['label' => 'Alamat', 'value' => 'Jl. Tambak Buntu, Kec. Margoyoso, Kab. Pati, Prov. Jawa Tengah'],
    ['label' => 'Jumlah Guru & Tenaga Pendidik', 'value' => '30 Orang'],
];

$misi = [
    'Membangun kultur budaya sekolah berkarakter religius yang beriman dan bertaqwa kepada Tuhan YME.',
    'Meningkatkan kualitas personal yang religius, maju, mandiri dan sejahtera serta berakhlak mulia.',
    'Melaksanakan pembelajaran secara efektif dan efisien sehingga dapat mengembangkan potensi peserta didik secara optimal.',
    'Meningkatkan keterampilan peserta didik dalam mengembangkan logika, praktika dan estetika serta kreatifitas sehingga dapat berkembang secara optimal.',
    'Mendorong dan membantu warga sekolah untuk mengenali potensi dirinya serta meningkatkan kreatifitasnya.',
    'Menumbuhkembangkan budaya bersih dan indah pada semua warga sekolah.',
    'Mewujudkan kenyamanan lingkungan yang nyaman, aman dan menyenangkan dalam mendukung terciptanya proses pembelajaran.',
];

$tujuan = [
    'Membentuk karakter siswa yang beriman dan bertaqwa kepada Tuhan YME.',
    'Meningkatkan sikap sopan santun dan berbudi pekerti luhur sebagai cerminan akhlak mulia.',
    'Menghasilkan lulusan yang berkualitas dan berdaya saing tinggi.',
    'Meningkatkan prestasi akademik maupun non akademik peserta didik.',
    'Meningkatkan dan menghasilkan hasil karya sebagai wujud implementasi profil pelajar pancasila.',
    'Meningkatkan partisipasi warga sekolah dalam melestarikan lingkungan hidup.',
    'Terciptanya kenyamanan lingkungan sekolah dalam menunjang proses pembelajaran yang optimal.',
];

$values = [
    [
        'icon' => 'heart',
        'title' => 'Religius',
        'description' => 'Membangun karakter beriman dan bertaqwa kepada Tuhan YME dalam setiap aspek kehidupan sekolah',
    ],
    [
        'icon' => 'award',
        'title' => 'Berprestasi',
        'description' => 'Mendorong siswa untuk mencapai prestasi akademik dan non-akademik yang optimal',
    ],
    [
        'icon' => 'leaf',
        'title' => 'Berwawasan Lingkungan',
        'description' => 'Menumbuhkan budaya bersih, indah, dan peduli terhadap kelestarian lingkungan',
    ],
    [
        'icon' => 'lightbulb',
        'title' => 'Inovatif & Kreatif',
        'description' => 'Mengembangkan logika, praktika, estetika, dan kreativitas peserta didik secara optimal',
    ],
];
?>

    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 lg:pt-32 lg:pb-24 flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden text-center">
        <!-- Abstract glowing orbs -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>
        
        <div class="relative z-10 text-white px-4 max-w-4xl mx-auto" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-4xl md:text-6xl mb-6 font-bold tracking-tight">Tentang Kami</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Mengenal lebih dekat SMP Negeri 2 Margoyoso — visi, misi, dan komitmen kami untuk pendidikan berkualitas
            </p>
        </div>
    </section>

    <!-- School Identity + Logo -->
    <section class="py-24 bg-white relative">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

                <!-- Identity Card -->
                <div data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Identitas Sekolah</h2>
                    <div class="w-16 h-1 bg-blue-600 mb-8 rounded-full"></div>
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                        <?php foreach ($identity as $index => $item): ?>
                            <div class="flex items-start gap-4 px-6 py-4 <?= $index % 2 === 0 ? 'bg-white' : 'bg-slate-50' ?> hover:bg-blue-50 transition-colors duration-200">
                                <span class="text-sm font-semibold text-gray-500 w-48 flex-shrink-0 pt-0.5"><?= $item['label'] ?></span>
                                <span class="text-sm text-gray-900 font-medium leading-relaxed">: <?= $item['value'] ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Logo Placeholder & Deskripsi -->
                <div data-aos="fade-left" data-aos-duration="1000" class="flex flex-col gap-8">
                    <!-- Logo Placeholder -->
                    <div class="flex flex-col items-center">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 self-start">Logo Sekolah</h2>
                        <div class="w-16 h-1 bg-blue-600 mb-6 rounded-full self-start"></div>
                        <div class="w-52 h-52 rounded-full border-4 border-blue-200 shadow-2xl flex items-center justify-center bg-blue-50 overflow-hidden group hover:border-blue-400 transition-all duration-300">
                            <img id="school-logo"
                                 src="<?= base_url('logo-sekolah.png') ?>"
                                 alt="Logo SMP Negeri 2 Margoyoso"
                                 class="w-full h-full object-contain p-4"
                                 onerror="this.style.display='none'; document.getElementById('logo-placeholder').style.display='flex';">
                            <!-- Fallback jika logo belum ada -->
                            <div id="logo-placeholder" class="flex-col items-center justify-center text-blue-400 text-center p-4" style="display:none;">
                                <i data-lucide="image" class="w-16 h-16 mb-3 opacity-40"></i>
                                <span class="text-xs text-gray-400 font-medium">Logo sekolah<br>akan tampil di sini</span>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Profil Singkat</h3>
                        <div class="prose text-gray-600 space-y-4 text-sm leading-relaxed">
                            <p>
                                SMP Negeri 2 Margoyoso adalah sekolah menengah pertama negeri yang berdiri sejak 17 Juli 1995 berdasarkan SK Pendirian Nomor 107/O/1997. Berlokasi di Jalan Tambak Buntu, Kecamatan Margoyoso, Kabupaten Pati, Provinsi Jawa Tengah.
                            </p>
                            <p>
                                Dengan 30 guru dan tenaga pendidik yang berdedikasi, sekolah berkomitmen mewujudkan peserta didik yang beriman, berakhlak mulia, cerdas, terampil, kreatif, dan berwawasan lingkungan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi -->
    <section class="py-24 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-500/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-500/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 relative z-10 text-center" data-aos="zoom-in" data-aos-duration="1000">
            <div class="w-20 h-20 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-8 border border-white/20">
                <i data-lucide="eye" class="w-10 h-10 text-blue-200"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-8">Visi Sekolah</h2>
            <div class="w-24 h-1 bg-blue-300 mx-auto mb-10 rounded-full"></div>
            <blockquote class="text-xl md:text-2xl font-semibold leading-relaxed text-blue-50 italic max-w-4xl mx-auto border-l-4 border-blue-300 pl-8 text-left">
                "TERWUJUDNYA PESERTA DIDIK YANG BERIMAN DAN BERTAQWA KEPADA TUHAN YME, BERAKHLAK MULIA, CERDAS, TERAMPIL, KREATIF DAN BERWAWASAN LINGKUNGAN"
            </blockquote>
        </div>
    </section>

    <!-- Misi -->
    <section class="py-24 bg-slate-50 relative overflow-hidden text-slate-800">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/50 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-100/50 rounded-full blur-3xl opacity-50 translate-y-1/2 -translate-x-1/2"></div>
        
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i data-lucide="target" class="w-8 h-8 text-white"></i>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Misi Sekolah</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                <?php foreach ($misi as $index => $item): ?>
                    <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-start gap-4 group" data-aos="fade-up" data-aos-delay="<?= $index * 80 ?>">
                        <div class="flex-shrink-0 w-9 h-9 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-black text-sm group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <?= $index + 1 ?>
                        </div>
                        <p class="text-gray-700 leading-relaxed text-sm"><?= $item ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Tujuan -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="w-16 h-16 bg-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i data-lucide="flag" class="w-8 h-8 text-white"></i>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tujuan Sekolah</h2>
                <div class="w-24 h-1 bg-indigo-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                <?php foreach ($tujuan as $index => $item): ?>
                    <div class="relative p-6 rounded-2xl border border-gray-100 bg-gradient-to-br from-white to-indigo-50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden" data-aos="fade-up" data-aos-delay="<?= $index * 80 ?>">
                        <div class="absolute top-0 right-0 text-6xl font-black text-indigo-100 leading-none p-4 select-none group-hover:text-indigo-200 transition-colors"><?= $index + 1 ?></div>
                        <div class="relative z-10">
                            <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center mb-4 group-hover:bg-indigo-600 transition-colors duration-300">
                                <i data-lucide="check-circle" class="w-5 h-5 text-indigo-600 group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <p class="text-gray-700 leading-relaxed text-sm font-medium"><?= $item ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Nilai-Nilai -->
    <section class="py-24 bg-slate-50 relative">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Nilai-Nilai Kami</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Prinsip-prinsip fundamental yang menjadi landasan dalam setiap kegiatan pendidikan di SMP Negeri 2 Margoyoso
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($values as $index => $value): ?>
                    <div class="text-center p-8 rounded-2xl border border-gray-100 bg-white hover:border-blue-100 hover:shadow-xl transition-all duration-300 group hover:-translate-y-2" data-aos="fade-up" data-aos-delay="<?= $index * 150 ?>">
                        <div class="w-20 h-20 bg-blue-50 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300 rounded-2xl flex items-center justify-center mx-auto mb-6 rotate-3 group-hover:rotate-0">
                            <i data-lucide="<?= $value['icon'] ?>" class="w-10 h-10"></i>
                        </div>
                        <h3 class="text-xl mb-3 font-bold text-gray-900"><?= $value['title'] ?></h3>
                        <p class="text-gray-600 leading-relaxed"><?= $value['description'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>
