<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
$academicPrograms = [
    [
        'icon' => 'book-open',
        'title' => 'Matematika & IPA',
        'description' => 'Program pembelajaran Matematika dan IPA dengan pendekatan problem solving dan eksperimen praktis',
        'image' => 'https://images.unsplash.com/photo-1605781645799-c9c7d820b4ac?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHVkZW50cyUyMHNjaWVuY2UlMjBsYWJvcmF0b3J5fGVufDF8fHx8MTc3NDkzODg4MXww&ixlib=rb-4.1.0&q=80&w=1080',
    ],
    [
        'icon' => 'globe',
        'title' => 'Bahasa & Sosial',
        'description' => 'Penguasaan Bahasa Indonesia, Inggris, dan ilmu sosial untuk wawasan luas',
        'image' => 'https://images.unsplash.com/photo-1632217138608-66217da0142f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzY2hvb2wlMjBsaWJyYXJ5JTIwYm9va3N8ZW58MXx8fHwxNzc0OTE1ODY5fDA&ixlib=rb-4.1.0&q=80&w=1080',
    ],
    [
        'icon' => 'code',
        'title' => 'Teknologi & Komputer',
        'description' => 'Pembelajaran coding, robotika, dan literasi digital untuk masa depan',
        'image' => 'https://images.unsplash.com/photo-1771408427146-09be9a1d4535?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHVkZW50cyUyMGNvbXB1dGVyJTIwY2xhc3N8ZW58MXx8fHwxNzc0OTM4ODgyfDA&ixlib=rb-4.1.0&q=80&w=1080',
    ],
];

$extracurricular = [
    [
        'icon' => 'trophy',
        'category' => 'Olahraga',
        'activities' => ['Basket', 'Futsal', 'Voli', 'Bulu Tangkis', 'Renang', 'Taekwondo'],
        'color' => 'bg-red-100 text-red-600',
    ],
    [
        'icon' => 'palette',
        'category' => 'Seni & Budaya',
        'activities' => ['Tari Tradisional', 'Paduan Suara', 'Band', 'Melukis', 'Teater'],
        'color' => 'bg-purple-100 text-purple-600',
    ],
    [
        'icon' => 'beaker',
        'category' => 'Sains & Teknologi',
        'activities' => ['Robotika', 'Coding Club', 'KIR', 'English Club'],
        'color' => 'bg-blue-100 text-blue-600',
    ],
    [
        'icon' => 'heart',
        'category' => 'Kepemimpinan',
        'activities' => ['OSIS', 'Pramuka', 'PMR', 'Paskibra'],
        'color' => 'bg-green-100 text-green-600',
    ],
];

$achievements = [
    [
        'title' => 'Juara 1 Olimpiade Matematika Tingkat Nasional',
        'year' => '2025',
    ],
    [
        'title' => 'Juara 2 Lomba Robotika Se-Jakarta',
        'year' => '2025',
    ],
    [
        'title' => 'Juara 1 Kompetisi Debat Bahasa Inggris',
        'year' => '2024',
    ],
    [
        'title' => 'Juara 3 Festival Seni Budaya Nasional',
        'year' => '2024',
    ],
];

$facilities = [
    'Laboratorium IPA Modern',
    'Laboratorium Komputer',
    'Perpustakaan Digital',
    'Ruang Multimedia',
    'Lapangan Olahraga',
    'Studio Musik',
    'Aula Serbaguna',
    'Masjid',
];
?>

<div>
    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 lg:pt-32 lg:pb-24 flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden text-center">
        <!-- Abstract glowing orbs -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>
        
        <div class="relative z-10 text-white px-4 max-w-4xl mx-auto" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-4xl md:text-6xl mb-6 font-bold tracking-tight">Program Pendidikan</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Program unggulan untuk mengembangkan potensi siswa secara maksimal
            </p>
        </div>
    </section>

    <!-- Academic Programs -->
    <section class="py-24 bg-white relative">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Program Akademik</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Pembelajaran berkualitas dengan metode modern dan pendekatan yang sesuai dengan kebutuhan siswa
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($academicPrograms as $index => $program): ?>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group hover:-translate-y-2" data-aos="fade-up" data-aos-delay="<?= $index * 150 ?>">
                        <div class="h-56 overflow-hidden relative">
                            <img src="<?= $program['image'] ?>" alt="<?= $program['title'] ?>" 
                                 class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110"
                                 onerror="this.src='/fallback.jpg'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-8">
                            <div class="w-16 h-16 bg-blue-50 group-hover:bg-blue-600 transition-colors duration-300 rounded-2xl flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-lg rotate-3 group-hover:rotate-0">
                                <i data-lucide="<?= $program['icon'] ?>" class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors duration-300"></i>
                            </div>
                            <h3 class="text-xl mb-3 font-bold text-gray-900"><?= $program['title'] ?></h3>
                            <p class="text-gray-600 leading-relaxed"><?= $program['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Extracurricular -->
    <section class="py-24 bg-gray-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-100 rounded-full blur-3xl opacity-50 translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-100 rounded-full blur-3xl opacity-50 -translate-x-1/2 translate-y-1/2"></div>
        
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Ekstrakurikuler</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Berbagai pilihan kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($extracurricular as $index => $item): ?>
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 group" data-aos="zoom-in" data-aos-delay="<?= $index * 100 ?>">
                        <div class="w-16 h-16 <?= $item['color'] ?> rounded-2xl flex items-center justify-center mb-6 rotate-3 group-hover:rotate-0 transition-transform duration-300">
                            <i data-lucide="<?= $item['icon'] ?>" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl mb-6 font-bold text-gray-900"><?= $item['category'] ?></h3>
                        <ul class="space-y-3">
                            <?php foreach ($item['activities'] as $activity): ?>
                                <li class="flex items-center gap-3 text-gray-600 group/item">
                                    <div class="w-2 h-2 rounded-full border-2 border-blue-600 group-hover/item:bg-blue-600 transition-colors"></div>
                                    <span class="group-hover/item:text-blue-600 transition-colors"><?= $activity ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Achievements -->
    <section class="py-24 bg-white relative">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Prestasi Terkini</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Berbagai prestasi yang diraih siswa-siswi SMP Negeri 2 Margoyoso
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                <?php foreach ($achievements as $index => $achievement): ?>
                    <div class="bg-gradient-to-r from-blue-50 to-white p-8 rounded-2xl border-l-4 border-blue-600 shadow-md hover:shadow-lg transition-shadow group" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <div class="flex items-center gap-6">
                            <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300 shadow-md">
                                <i data-lucide="trophy" class="w-8 h-8"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2 text-gray-900"><?= $achievement['title'] ?></h3>
                                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full text-blue-600 text-sm font-bold shadow-sm border border-blue-100">
                                    <i data-lucide="calendar" class="w-4 h-4"></i>
                                    <?= $achievement['year'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Facilities -->
    <section class="py-24 bg-blue-600 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold">Fasilitas Lengkap</h2>
                <div class="w-24 h-1 bg-white/50 mx-auto mb-6 rounded-full"></div>
                <p class="text-blue-100 max-w-2xl mx-auto text-lg">
                    Sarana dan prasarana yang mendukung kegiatan belajar mengajar yang optimal
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php foreach ($facilities as $index => $facility): ?>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300 border border-white/10 hover:-translate-y-1 hover:shadow-xl" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                        <p class="font-medium text-lg"><?= $facility ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gray-50">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center" data-aos="zoom-in">
            <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-8">
                <i data-lucide="phone-call" class="w-10 h-10 text-blue-600"></i>
            </div>
            <h2 class="text-3xl md:text-4xl mb-6 font-bold text-gray-900">
                Tertarik dengan Program Kami?
            </h2>
            <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                Hubungi kami untuk informasi lebih lanjut tentang program pendidikan di SMP Negeri 2 Margoyoso
            </p>
            <a href="mailto:smpn2margoyoso@gmail.com" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-4 rounded-full font-bold text-lg transition-all duration-300 inline-flex items-center gap-3 hover:shadow-xl hover:-translate-y-1">
                <i data-lucide="mail" class="w-5 h-5"></i>
                Hubungi Kami Sekarang
            </a>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
