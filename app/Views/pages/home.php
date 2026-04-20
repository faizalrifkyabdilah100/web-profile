<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>



<div>
    <!-- Flash Message -->
    <?php if (session()->getFlashdata('pesan')): ?>
        <div id="flash-message" class="fixed top-24 right-8 z-[100] max-w-sm w-full bg-white rounded-2xl shadow-2xl border-l-4 border-<?= session()->getFlashdata('pesan')['type'] == 'success' ? 'green' : 'red' ?>-500 p-4 transform transition-all duration-500 translate-x-full">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-full bg-<?= session()->getFlashdata('pesan')['type'] == 'success' ? 'green' : 'red' ?>-50 flex items-center justify-center flex-shrink-0">
                    <i data-lucide="<?= session()->getFlashdata('pesan')['type'] == 'success' ? 'check-circle' : 'alert-circle' ?>" class="w-5 h-5 text-<?= session()->getFlashdata('pesan')['type'] == 'success' ? 'green' : 'red' ?>-500"></i>
                </div>
                <div>
                    <h4 class="font-bold text-gray-900"><?= session()->getFlashdata('pesan')['type'] == 'success' ? 'Berhasil!' : 'Gagal!' ?></h4>
                    <p class="text-sm text-gray-600 mt-1"><?= session()->getFlashdata('pesan')['message'] ?></p>
                </div>
                <button onclick="closeFlash()" class="ml-auto text-gray-400 hover:text-gray-600">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                setTimeout(() => { document.getElementById('flash-message').classList.remove('translate-x-full'); }, 100);
                setTimeout(() => { closeFlash(); }, 5000);
            });
            function closeFlash() {
                const el = document.getElementById('flash-message');
                if(el) { el.classList.add('translate-x-full'); setTimeout(() => el.remove(), 500); }
            }
        </script>
    <?php endif; ?>

    <!-- Hero Section -->
    <section class="relative h-[600px] flex items-center justify-center overflow-hidden group/hero">
        <div class="absolute inset-0" data-aos="fade-in" data-aos-duration="1500">
            <?php $heroPath = 'hero-bg.jpg'; $heroVer = file_exists(ROOTPATH . 'public/hero-bg.jpg') ? filemtime(ROOTPATH . 'public/hero-bg.jpg') : '1'; ?>
            <img src="<?= file_exists(ROOTPATH . 'public/hero-bg.jpg') ? base_url($heroPath . '?v=' . $heroVer) : 'https://images.unsplash.com/photo-1762088776943-28a9fbadcec4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzY2hvb2wlMjBidWlsZGluZyUyMG1vZGVybiUyMGV4dGVyaW9yfGVufDF8fHx8MTc3NDkzODg4MHww&ixlib=rb-4.1.0&q=80&w=1080' ?>" 
                 alt="School Building" class="w-full h-full object-cover transform scale-105" onerror="this.src='/fallback.jpg'">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-blue-900/70"></div>
        </div>
        
        <?php if($isAdmin): ?>
        <div class="absolute top-24 right-8 z-[50] opacity-0 group-hover/hero:opacity-100 transition-opacity duration-300">
            <button onclick="document.getElementById('modal-hero').classList.remove('hidden')" class="bg-white/20 text-white backdrop-blur-md hover:bg-white/40 border border-white/30 px-6 py-2.5 rounded-xl font-bold flex items-center gap-2 shadow-lg transition-colors">
                <i data-lucide="camera" class="w-5 h-5"></i> Ubah Gambar Beranda
            </button>
        </div>
        <?php endif; ?>
        
        <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl mb-6 font-bold tracking-tight" data-aos="fade-down" data-aos-delay="200">
                Selamat Datang di SMP Negeri 2 Margoyoso
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100" data-aos="fade-up" data-aos-delay="400">
                Beriman, Berakhlak Mulia, Cerdas, Terampil, Kreatif dan Berwawasan Lingkungan
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="zoom-in" data-aos-delay="600">
                <a href="<?= base_url('tentang') ?>" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg transition-all duration-300 inline-flex items-center justify-center gap-2 hover:shadow-lg hover:-translate-y-1">
                    Tentang Kami
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
                <a href="<?= base_url('program') ?>" 
                   class="bg-white hover:bg-gray-100 text-blue-900 px-8 py-3 rounded-lg transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                    Lihat Program
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-gradient-to-r from-blue-700 to-blue-600 text-white py-16 relative z-20 shadow-2xl">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <?php foreach ($statistik as $index => $stat): ?>
                    <div class="text-center group/stat relative border border-transparent hover:border-white/20 p-2 rounded-xl transition-all" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <?php if($isAdmin): ?>
                        <div class="absolute -top-3 -right-3 opacity-0 group-hover/stat:opacity-100 flex gap-1 z-30 transition-opacity">
                            <a href="<?= base_url('admin-konten/edit-item/'.$stat['id']) ?>" class="bg-indigo-500 text-white p-1.5 rounded-lg hover:bg-indigo-400">
                                <i data-lucide="pencil" class="w-3 h-3"></i>
                            </a>
                            <a href="<?= base_url('admin-konten/delete-item/'.$stat['id']) ?>" onclick="return confirm('Hapus statistik?')" class="bg-red-500 text-white p-1.5 rounded-lg hover:bg-red-400">
                                <i data-lucide="trash" class="w-3 h-3"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <div class="text-4xl md:text-5xl mb-2 font-bold"><?= esc($stat['konten']) ?></div>
                        <div class="text-blue-100 font-medium"><?= esc($stat['judul']) ?></div>
                    </div>
                <?php endforeach; ?>
                <?php if($isAdmin): ?>
                    <div class="text-center flex items-center justify-center">
                        <a href="<?= base_url('admin-konten/create-item/beranda/statistik') ?>" class="border-2 border-dashed border-blue-400/50 hover:bg-white/10 hover:border-white w-full h-full min-h-[100px] flex flex-col justify-center items-center rounded-2xl transition-all text-white/50 hover:text-white">
                            <i data-lucide="plus" class="w-8 h-8 mb-2"></i>
                            <span class="text-sm font-semibold">Tambah Stat</span>
                        </a>
                    </div>
                <?php endif; ?>
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
                    SMP Negeri 2 Margoyoso berkomitmen memberikan pendidikan terbaik dengan fasilitas lengkap dan tenaga pengajar profesional
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($fitur as $index => $f): ?>
                    <div class="text-center p-8 rounded-2xl hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-blue-100 group/card bg-white hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="<?= $index * 150 ?>">
                        <?php if($isAdmin): ?>
                        <div class="absolute top-3 right-3 opacity-0 group-hover/card:opacity-100 flex gap-1 z-30 transition-opacity">
                            <a href="<?= base_url('admin-konten/edit-item/'.$f['id']) ?>" class="bg-indigo-100 text-indigo-700 p-2 rounded-lg hover:bg-indigo-600 hover:text-white transition-colors">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= base_url('admin-konten/delete-item/'.$f['id']) ?>" onclick="return confirm('Hapus fitur unggulan?')" class="bg-red-100 text-red-700 p-2 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                                <i data-lucide="trash" class="w-4 h-4"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        
                        <div class="w-20 h-20 bg-blue-50 group-hover/card:bg-blue-600 transition-colors duration-300 rounded-2xl flex items-center justify-center mx-auto mb-6 rotate-3 group-hover/card:rotate-0">
                            <i data-lucide="<?= $f['gambar_icon'] ?>" class="w-10 h-10 text-blue-600 group-hover/card:text-white transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-xl mb-3 font-bold text-gray-900"><?= esc($f['judul']) ?></h3>
                        <p class="text-gray-600 leading-relaxed"><?= nl2br(esc($f['konten'])) ?></p>
                    </div>
                <?php endforeach; ?>
                
                <?php if($isAdmin): ?>
                    <a href="<?= base_url('admin-konten/create-item/beranda/fitur') ?>" class="text-center p-8 rounded-2xl border-2 border-dashed border-gray-300 hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 group flex flex-col justify-center items-center min-h-[250px]">
                        <div class="w-16 h-16 bg-gray-100 group-hover:bg-blue-100 transition-colors duration-300 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i data-lucide="plus" class="w-8 h-8 text-gray-400 group-hover:text-blue-600 transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-400 group-hover:text-blue-600">Tambah Fitur</h3>
                    </a>
                <?php endif; ?>
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
                <?php foreach ($program_utama as $index => $program): ?>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group/card relative hover:-translate-y-2" data-aos="zoom-in-up" data-aos-delay="<?= $index * 150 ?>">
                        <?php if($isAdmin): ?>
                        <div class="absolute top-4 right-4 opacity-0 group-hover/card:opacity-100 flex gap-2 z-30 transition-opacity">
                            <a href="<?= base_url('admin-konten/edit-item/'.$program['id']) ?>" class="bg-white text-indigo-600 shadow-md p-2 rounded-xl hover:bg-indigo-600 hover:text-white transition-colors">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= base_url('admin-konten/delete-item/'.$program['id']) ?>" onclick="return confirm('Hapus program unggulan?')" class="bg-white text-red-600 shadow-md p-2 rounded-xl hover:bg-red-600 hover:text-white transition-colors">
                                <i data-lucide="trash" class="w-4 h-4"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        
                        <div class="h-56 overflow-hidden relative">
                            <?php $src = str_starts_with($program['gambar_icon'] ?? '', 'http') ? $program['gambar_icon'] : base_url($program['gambar_icon']); ?>
                            <img src="<?= esc($src) ?>" alt="<?= esc($program['judul']) ?>" 
                                 class="w-full h-full object-cover transform transition-transform duration-700 group-hover/card:scale-110"
                                 onerror="this.src='/fallback.jpg'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-xl mb-3 font-bold text-gray-900"><?= esc($program['judul']) ?></h3>
                            <p class="text-gray-600 mb-6 leading-relaxed"><?= nl2br(esc($program['konten'])) ?></p>
                            <a href="<?= base_url('program') ?>" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center gap-2 group-hover/card:gap-3 transition-all duration-300">
                                Selengkapnya
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <?php if($isAdmin): ?>
                    <a href="<?= base_url('admin-konten/create-item/beranda/program_unggulan') ?>" class="bg-white rounded-2xl overflow-hidden border-2 border-dashed border-gray-300 hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 group flex flex-col justify-center items-center min-h-[350px]">
                        <div class="w-20 h-20 bg-gray-100 group-hover:bg-blue-100 transition-colors duration-300 rounded-full flex items-center justify-center mb-4">
                            <i data-lucide="plus" class="w-10 h-10 text-gray-400 group-hover:text-blue-600 transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-400 group-hover:text-blue-600">Tambah Program</h3>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Tombol Lihat Semua Program -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="300">
                <a href="<?= base_url('program') ?>" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300 inline-flex items-center gap-2 hover:shadow-lg hover:-translate-y-1">
                    Lihat Semua Program
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Prestasi Terkini Section -->
    <section class="py-24 bg-white relative">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Prestasi Terkini</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Berbagai prestasi yang diraih siswa-siswi SMP Negeri 2 Margoyoso
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                <?php foreach ($prestasi as $index => $pres): ?>
                    <div class="bg-gradient-to-r from-blue-50 to-white p-8 rounded-2xl border-l-4 border-blue-600 shadow-md hover:shadow-lg transition-shadow group/pres relative" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <?php if($isAdmin): ?>
                        <div class="absolute top-4 right-4 opacity-0 group-hover/pres:opacity-100 flex gap-2 z-30 transition-opacity">
                            <a href="<?= base_url('admin-konten/edit-item/'.$pres['id']) ?>" class="bg-white text-indigo-600 shadow-sm border border-gray-100 p-2 rounded-lg hover:bg-indigo-600 hover:text-white transition-colors">
                                <i data-lucide="pencil" class="w-3.5 h-3.5"></i>
                            </a>
                            <a href="<?= base_url('admin-konten/delete-item/'.$pres['id']) ?>" onclick="return confirm('Hapus prestasi?')" class="bg-white text-red-600 shadow-sm border border-gray-100 p-2 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                                <i data-lucide="trash" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        
                        <div class="flex items-center gap-6">
                            <div class="w-16 h-16 bg-blue-600 text-white rounded-full flex items-center justify-center flex-shrink-0 group-hover/pres:scale-110 transition-transform duration-300 shadow-md">
                                <i data-lucide="trophy" class="w-8 h-8"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-2 text-gray-900"><?= esc($pres['judul']) ?></h3>
                                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white rounded-full text-blue-600 text-sm font-bold shadow-sm border border-blue-100">
                                    <i data-lucide="calendar" class="w-4 h-4"></i>
                                    <?= esc($pres['konten']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <?php if($isAdmin): ?>
                    <div class="md:col-span-2 text-center mt-4">
                        <a href="<?= base_url('admin-konten/create-item/beranda/prestasi') ?>" class="inline-flex items-center gap-2 border-2 border-dashed border-gray-300 text-gray-500 hover:border-blue-500 hover:text-blue-600 hover:bg-blue-50 bg-white px-8 py-3 rounded-full font-bold transition-all duration-300 shadow-sm">
                            <i data-lucide="plus" class="w-5 h-5"></i>
                            Tambah Prestasi
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Fasilitas Lengkap Section -->
    <section class="py-24 bg-blue-600 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold">Fasilitas Lengkap</h2>
                <div class="w-24 h-1 bg-white/50 mx-auto mb-6 rounded-full"></div>
                <p class="text-blue-100 max-w-2xl mx-auto text-lg">
                    Sarana dan prasarana yang mendukung kegiatan belajar mengajar yang optimal
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <?php foreach ($fasilitas as $index => $fas): ?>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 text-center hover:bg-white/20 transition-all duration-300 border border-white/10 hover:-translate-y-1 hover:shadow-xl group/fas relative" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                        <?php if($isAdmin): ?>
                        <div class="absolute -top-3 -right-3 opacity-0 group-hover/fas:opacity-100 flex gap-1 z-30 transition-opacity">
                            <a href="<?= base_url('admin-konten/edit-item/'.$fas['id']) ?>" class="bg-indigo-500 text-white p-1.5 rounded-lg hover:bg-indigo-400">
                                <i data-lucide="pencil" class="w-3 h-3"></i>
                            </a>
                            <a href="<?= base_url('admin-konten/delete-item/'.$fas['id']) ?>" onclick="return confirm('Hapus fasilitas?')" class="bg-red-500 text-white p-1.5 rounded-lg hover:bg-red-400">
                                <i data-lucide="trash" class="w-3 h-3"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <p class="font-medium text-lg"><?= esc($fas['konten']) ?></p>
                    </div>
                <?php endforeach; ?>
                
                <?php if($isAdmin): ?>
                    <a href="<?= base_url('admin-konten/create-item/beranda/fasilitas') ?>" class="rounded-2xl p-6 text-center transition-all duration-300 border-2 border-dashed border-white/30 hover:border-white hover:bg-white/10 flex items-center justify-center gap-2 text-white/70 hover:text-white">
                        <i data-lucide="plus" class="w-5 h-5"></i>
                        <span class="font-medium text-lg">Tambah</span>
                    </a>
                <?php endif; ?>
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
                Bergabunglah dengan keluarga besar SMP Negeri 2 Margoyoso dan raih masa depan gemilang bersama kami
            </p>
            <a href="<?= base_url('tentang') ?>" class="bg-white text-blue-900 hover:bg-gray-50 hover:shadow-2xl hover:-translate-y-1 transform px-10 py-5 rounded-full font-bold text-lg transition-all duration-300 inline-flex items-center gap-3 shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                Informasi Pendaftaran
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </a>
        </div>
    </section>

    <!-- Block Ekstra Custom Sections -->
    <?php foreach($ekstra as $index => $e): ?>
        <section class="py-24 bg-white relative group/section border-b border-gray-100">
            <?php if($isAdmin): ?>
            <div class="absolute top-8 right-8 z-20 flex gap-2">
                <a href="<?= base_url('admin-konten/edit-item/'.$e['id']) ?>" class="opacity-0 group-hover/section:opacity-100 transition-opacity bg-indigo-100 text-indigo-700 px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-sm hover:bg-indigo-600 hover:text-white">
                    <i data-lucide="pencil" class="w-4 h-4"></i> Edit
                </a>
                <a href="<?= base_url('admin-konten/delete-item/'.$e['id']) ?>" onclick="return confirm('Hapus bagian ekstra ini?')" class="opacity-0 group-hover/section:opacity-100 transition-opacity bg-red-100 text-red-700 px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-sm hover:bg-red-600 hover:text-white">
                    <i data-lucide="trash" class="w-4 h-4"></i> Hapus
                </a>
            </div>
            <?php endif; ?>

            <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4"><?= esc($e['judul']) ?></h2>
                    <div class="w-24 h-1 bg-indigo-600 mx-auto rounded-full"></div>
                </div>
                <div class="max-w-4xl mx-auto prose prose-lg text-gray-600" data-aos="fade-up">
                    <?= $e['konten'] ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <?php if($isAdmin): ?>
    <div class="py-12 bg-gray-50 flex justify-center border-t border-gray-200 z-10 relative">
        <a href="<?= base_url('admin-konten/create-item/beranda/ekstra') ?>" class="bg-white border-2 border-dashed border-gray-300 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-600 px-8 py-4 rounded-2xl font-bold flex flex-col items-center gap-2 transition-all group scale-95 hover:scale-100 shadow-sm">
            <div class="w-10 h-10 bg-gray-100 text-gray-600 group-hover:bg-indigo-600 group-hover:text-white rounded-full flex items-center justify-center transition-colors">
                <i data-lucide="plus" class="w-5 h-5"></i>
            </div>
            Tambah Bagian Extra Tersendiri
        </a>
    </div>

    <!-- Modal Form (Ubah Hero Beranda) -->
    <div id="modal-hero" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="document.getElementById('modal-hero').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen p-4">
            <form action="<?= base_url('admin-konten/update_hero') ?>" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8 relative z-10">
                <?= csrf_field() ?>
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mb-2">
                        <i data-lucide="image" class="w-8 h-8"></i>
                    </div>
                </div>
                <div class="text-center mb-6 border-b border-gray-100 pb-4">
                    <h3 class="text-2xl font-bold text-gray-900">Ubah Gambar Latar</h3>
                    <p class="text-gray-500 text-sm mt-1">Upload gambar pemandangan sekolah (Landscape/Horizontal)</p>
                </div>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pilih File Gambar</label>
                        <input type="file" name="hero" accept="image/png, image/jpeg, image/jpg, image/webp" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition-all cursor-pointer" required>
                        <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, WEBP. Maks 5MB.</p>
                    </div>
                </div>
                <div class="mt-8 flex gap-3">
                    <button type="button" class="flex-1 py-3 rounded-xl font-semibold bg-gray-100 hover:bg-gray-200" onclick="document.getElementById('modal-hero').classList.add('hidden')">Batal</button>
                    <button type="submit" class="flex-1 py-3 rounded-xl font-semibold bg-indigo-600 hover:bg-indigo-700 text-white">Upload Gambar</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
