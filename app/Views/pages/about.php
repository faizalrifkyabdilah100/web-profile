<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
$values = [
    [
        'icon' => 'target',
        'title' => 'Integritas',
        'description' => 'Menjunjung tinggi kejujuran dan nilai-nilai moral dalam setiap aspek pendidikan',
    ],
    [
        'icon' => 'award',
        'title' => 'Prestasi',
        'description' => 'Mendorong siswa untuk mencapai prestasi akademik dan non-akademik terbaik',
    ],
    [
        'icon' => 'users',
        'title' => 'Kekeluargaan',
        'description' => 'Membangun lingkungan sekolah yang harmonis dan saling mendukung',
    ],
    [
        'icon' => 'eye',
        'title' => 'Inovasi',
        'description' => 'Menerapkan metode pembelajaran modern dan inovatif untuk hasil optimal',
    ],
];

$history = [
    [
        'year' => '2010',
        'event' => 'Pendirian SMP Nusantara Jaya dengan 100 siswa angkatan pertama',
    ],
    [
        'year' => '2015',
        'event' => 'Meraih akreditasi A dan menjadi sekolah rujukan di wilayah Jakarta Selatan',
    ],
    [
        'year' => '2020',
        'event' => 'Peluncuran program pembelajaran digital dan fasilitas laboratorium modern',
    ],
    [
        'year' => '2026',
        'event' => 'Lebih dari 500 siswa aktif dengan 100+ prestasi di berbagai kompetisi',
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
                Mengenal lebih dekat visi, misi, dan nilai-nilai luhur SMP Nusantara Jaya
            </p>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-24 bg-white relative">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="text-3xl md:text-4xl mb-6 font-bold text-gray-900">Profil Sekolah</h2>
                    <div class="w-16 h-1 bg-blue-600 mb-8 rounded-full"></div>
                    <div class="prose prose-lg text-gray-600 space-y-6">
                        <p>
                            SMP Nusantara Jaya adalah lembaga pendidikan menengah pertama yang berdiri sejak tahun 2010. 
                            Kami berkomitmen untuk memberikan pendidikan berkualitas yang tidak hanya fokus pada aspek 
                            akademik, tetapi juga pengembangan karakter dan soft skills siswa.
                        </p>
                        <p>
                            Dengan tenaga pengajar yang profesional dan berpengalaman, fasilitas pembelajaran yang lengkap, 
                            serta kurikulum yang terus dikembangkan sesuai dengan perkembangan zaman, kami siap membentuk 
                            generasi muda Indonesia yang cerdas, berkarakter, dan siap menghadapi tantangan global.
                        </p>
                        <p>
                            Lokasi strategis di Jakarta Selatan dengan lingkungan yang kondusif untuk belajar menjadikan 
                            SMP Nusantara Jaya pilihan tepat untuk pendidikan putra-putri Anda.
                        </p>
                    </div>
                </div>
                <div class="relative" data-aos="fade-left" data-aos-duration="1000">
                    <div class="absolute inset-0 bg-blue-600 rounded-2xl transform translate-x-4 translate-y-4"></div>
                    <div class="rounded-2xl overflow-hidden shadow-2xl relative bg-white z-10">
                        <img src="https://images.unsplash.com/photo-1762088776943-28a9fbadcec4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzY2hvb2wlMjBidWlsZGluZyUyMG1vZGVybiUyMGV4dGVyaW9yfGVufDF8fHx8MTc3NDkzODg4MHww&ixlib=rb-4.1.0&q=80&w=1080"
                             alt="School Building" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700" onerror="this.src='/fallback.jpg'">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="py-24 bg-slate-50 relative overflow-hidden text-slate-800">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/50 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-100/50 rounded-full blur-3xl opacity-50 translate-y-1/2 -translate-x-1/2"></div>
        
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-white p-10 rounded-2xl shadow-xl hover:-translate-y-2 transition-transform duration-300 relative overflow-hidden group" data-aos="fade-up">
                    <div class="absolute top-0 right-0 p-8 opacity-10 transform translate-x-4 -translate-y-4 group-hover:scale-110 transition-transform duration-500 text-blue-600">
                        <i data-lucide="eye" class="w-32 h-32"></i>
                    </div>
                    <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-8 rotate-3 group-hover:rotate-0 transition-transform duration-300">
                        <i data-lucide="eye" class="w-10 h-10"></i>
                    </div>
                    <h2 class="text-3xl font-bold mb-6 text-gray-900">Visi</h2>
                    <p class="text-gray-600 leading-relaxed text-lg relative z-10">
                        Menjadi lembaga pendidikan menengah pertama terkemuka yang menghasilkan lulusan 
                        berkualitas, berkarakter mulia, berprestasi, dan mampu bersaing di tingkat nasional 
                        maupun internasional dengan tetap menjunjung tinggi nilai-nilai budaya Indonesia.
                    </p>
                </div>

                <div class="bg-white p-10 rounded-2xl shadow-xl hover:-translate-y-2 transition-transform duration-300 relative overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute top-0 right-0 p-8 opacity-10 transform translate-x-4 -translate-y-4 group-hover:scale-110 transition-transform duration-500 text-blue-600">
                        <i data-lucide="target" class="w-32 h-32"></i>
                    </div>
                    <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-8 rotate-3 group-hover:rotate-0 transition-transform duration-300">
                        <i data-lucide="target" class="w-10 h-10"></i>
                    </div>
                    <h2 class="text-3xl font-bold mb-6 text-gray-900">Misi</h2>
                    <ul class="space-y-4 text-gray-600 relative z-10 text-lg">
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-sm font-bold">1</div>
                            <span>Menyelenggarakan pendidikan berkualitas dengan kurikulum yang relevan</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-sm font-bold">2</div>
                            <span>Membentuk karakter siswa yang berakhlak mulia dan berjiwa Pancasila</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-sm font-bold">3</div>
                            <span>Mengembangkan potensi akademik dan non-akademik siswa secara optimal</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-sm font-bold">4</div>
                            <span>Menciptakan lingkungan belajar yang kondusif dan menyenangkan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Values -->
    <section class="py-32 bg-white relative">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Nilai-Nilai Kami</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Prinsip-prinsip fundamental yang menjadi landasan dalam setiap kegiatan pendidikan di SMP Nusantara Jaya
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

    <!-- History Timeline -->
    <section class="py-32 bg-slate-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-blue-100/40 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Perjalanan Kami</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 text-lg">
                    Sejarah perkembangan SMP Nusantara Jaya dari tahun ke tahun
                </p>
            </div>

            <div class="relative">
                <!-- Timeline line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-blue-200 hidden md:block"></div>

                <div class="space-y-16">
                    <?php foreach ($history as $index => $item): ?>
                        <div class="relative flex flex-col md:flex-row items-center <?= $index % 2 === 0 ? '' : 'md:flex-row-reverse' ?>" data-aos="<?= $index % 2 === 0 ? 'fade-right' : 'fade-left' ?>">
                            <div class="w-full md:w-1/2 <?= $index % 2 === 0 ? 'md:pr-16 md:text-right mb-8 md:mb-0' : 'md:pl-16 mb-8 md:mb-0' ?>">
                                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-shadow relative group">
                                    <div class="absolute top-4 <?= $index % 2 === 0 ? 'right-0 translate-x-1/2' : 'left-0 -translate-x-1/2' ?> w-8 h-8 bg-blue-100 rotate-45 hidden md:block group-hover:bg-blue-200 transition-colors"></div>
                                    <h3 class="text-4xl font-black text-blue-100 mb-2 leading-none"><?= $item['year'] ?></h3>
                                    <p class="text-gray-700 text-lg font-medium relative z-10"><?= $item['event'] ?></p>
                                </div>
                            </div>

                            <!-- Timeline dot -->
                            <div class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 bg-white border-4 border-blue-600 rounded-full hidden md:flex items-center justify-center z-10 box-content shadow-lg">
                                <div class="w-3 h-3 bg-blue-600 rounded-full"></div>
                            </div>

                            <div class="w-full md:w-1/2"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
