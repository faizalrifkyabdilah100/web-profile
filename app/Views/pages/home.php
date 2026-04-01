<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
$features = [
    [
        'icon' => 'book-open',
        'title' => 'Kurikulum Berkualitas',
        'description' => 'Kurikulum nasional yang diperkaya dengan program pengembangan karakter dan keterampilan abad 21',
    ],
    [
        'icon' => 'users',
        'title' => 'Guru Profesional',
        'description' => 'Tenaga pengajar berpengalaman dan berdedikasi tinggi untuk membimbing siswa mencapai prestasi terbaik',
    ],
    [
        'icon' => 'trophy',
        'title' => 'Prestasi Gemilang',
        'description' => 'Berbagai prestasi akademik dan non-akademik di tingkat kota, provinsi, dan nasional',
    ],
    [
        'icon' => 'target',
        'title' => 'Fasilitas Lengkap',
        'description' => 'Laboratorium, perpustakaan, dan fasilitas olahraga yang mendukung pembelajaran optimal',
    ],
];

$stats = [
    ['number' => '500+', 'label' => 'Siswa Aktif'],
    ['number' => '40+', 'label' => 'Tenaga Pendidik'],
    ['number' => '15+', 'label' => 'Tahun Berpengalaman'],
    ['number' => '100+', 'label' => 'Prestasi'],
];

$programs = [
    [
        'title' => 'Program Akademik',
        'description' => 'Pembelajaran berkualitas dengan metode modern dan interaktif',
        'image' => 'https://images.unsplash.com/photo-1589104760192-ccab0ce0d90f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxpbmRvbmVzaWFuJTIwc3R1ZGVudHMlMjBjbGFzc3Jvb20lMjBsZWFybmluZ3xlbnwxfHx8fDE3NzQ5Mzg4ODB8MA&ixlib=rb-4.1.0&q=80&w=1080',
    ],
    [
        'title' => 'Program Ekstrakurikuler',
        'description' => 'Berbagai pilihan kegiatan untuk mengembangkan bakat dan minat siswa',
        'image' => 'https://images.unsplash.com/photo-1760259904989-3c9b99ad49d8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHVkZW50cyUyMHNwb3J0cyUyMGZpZWxkfGVufDF8fHx8MTc3NDg2MjI1NXww&ixlib=rb-4.1.0&q=80&w=1080',
    ],
    [
        'title' => 'Program Karakter',
        'description' => 'Pembentukan karakter dan nilai-nilai moral yang kuat',
        'image' => 'https://images.unsplash.com/photo-1632217138608-66217da0142f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzY2hvb2wlMjBsaWJyYXJ5JTIwYm9va3N8ZW58MXx8fHwxNzc0OTE1ODY5fDA&ixlib=rb-4.1.0&q=80&w=1080',
    ],
];
?>

<div>
    <!-- Hero Section -->
    <section class="relative h-[600px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0" data-aos="fade-in" data-aos-duration="1500">
            <img src="https://images.unsplash.com/photo-1762088776943-28a9fbadcec4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzY2hvb2wlMjBidWlsZGluZyUyMG1vZGVybiUyMGV4dGVyaW9yfGVufDF8fHx8MTc3NDkzODg4MHww&ixlib=rb-4.1.0&q=80&w=1080" 
                 alt="School Building" class="w-full h-full object-cover transform scale-105" onerror="this.src='/fallback.jpg'">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-blue-900/70"></div>
        </div>
        
        <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl mb-6 font-bold tracking-tight" data-aos="fade-down" data-aos-delay="200">
                Selamat Datang di SMP Nusantara Jaya
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100" data-aos="fade-up" data-aos-delay="400">
                Membentuk Generasi Cerdas, Berkarakter, dan Berprestasi
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="zoom-in" data-aos-delay="600">
                <a href="<?= base_url('tentang') ?>" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg transition-all duration-300 inline-flex items-center justify-center gap-2 hover:shadow-lg hover:-translate-y-1">
                    Tentang Kami
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
                <a href="<?= base_url('kontak') ?>" 
                   class="bg-white hover:bg-gray-100 text-blue-900 px-8 py-3 rounded-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-gradient-to-r from-blue-700 to-blue-600 text-white py-16 relative z-20 shadow-2xl">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <?php foreach ($stats as $index => $stat): ?>
                    <div class="text-center" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <div class="text-4xl md:text-5xl mb-2 font-bold"><?= $stat['number'] ?></div>
                        <div class="text-blue-100 font-medium"><?= $stat['label'] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 bg-white relative">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Mengapa Memilih Kami?</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    SMP Nusantara Jaya berkomitmen memberikan pendidikan terbaik dengan fasilitas lengkap dan tenaga pengajar profesional
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($features as $index => $feature): ?>
                    <div class="text-center p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-blue-100 group bg-white hover:-translate-y-2" data-aos="fade-up" data-aos-delay="<?= $index * 150 ?>">
                        <div class="w-20 h-20 bg-blue-50 group-hover:bg-blue-600 transition-colors duration-300 rounded-2xl flex items-center justify-center mx-auto mb-6 rotate-3 group-hover:rotate-0">
                            <i data-lucide="<?= $feature['icon'] ?>" class="w-10 h-10 text-blue-600 group-hover:text-white transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-xl mb-3 font-bold text-gray-900"><?= $feature['title'] ?></h3>
                        <p class="text-gray-600 leading-relaxed"><?= $feature['description'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="py-24 bg-slate-50 relative overflow-hidden">
        <!-- Background accents -->
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-blue-100/40 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-indigo-100/40 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4"></div>

        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Program Unggulan</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Berbagai program pendidikan yang dirancang untuk mengembangkan potensi siswa secara maksimal
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($programs as $index => $program): ?>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group hover:-translate-y-2" data-aos="zoom-in-up" data-aos-delay="<?= $index * 150 ?>">
                        <div class="h-56 overflow-hidden relative">
                            <img src="<?= $program['image'] ?>" alt="<?= $program['title'] ?>" 
                                 class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110"
                                 onerror="this.src='/fallback.jpg'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-xl mb-3 font-bold text-gray-900"><?= $program['title'] ?></h3>
                            <p class="text-gray-600 mb-6 leading-relaxed"><?= $program['description'] ?></p>
                            <a href="<?= base_url('program') ?>" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center gap-2 group-hover:gap-3 transition-all duration-300">
                                Selengkapnya
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-900 text-white py-24 relative overflow-hidden">
        <!-- Abstract ambient shapes -->
        <div class="absolute top-0 left-10 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
        <div class="absolute top-0 right-10 w-64 h-64 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-1/2 w-64 h-64 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-4000"></div>

        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="zoom-in">
            <h2 class="text-3xl md:text-5xl mb-6 font-bold tracking-tight">
                Daftarkan Putra-Putri Anda Sekarang!
            </h2>
            <p class="text-xl mb-10 text-blue-100 max-w-2xl mx-auto font-light">
                Bergabunglah dengan keluarga besar SMP Nusantara Jaya dan raih masa depan gemilang bersama kami
            </p>
            <a href="<?= base_url('kontak') ?>" class="bg-white text-blue-900 hover:bg-gray-50 hover:shadow-2xl hover:-translate-y-1 transform px-10 py-5 rounded-full font-bold text-lg transition-all duration-300 inline-flex items-center gap-3 shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                Informasi Pendaftaran
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </a>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
