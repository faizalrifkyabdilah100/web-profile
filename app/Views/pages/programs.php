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
                <?php foreach ($akademik as $index => $program): 
                    $parts = explode(';', $program['gambar_icon']);
                    $img = $parts[0] ?? '';
                    $icon = $parts[1] ?? 'book-open';
                ?>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group/akademik hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="<?= $index * 150 ?>">
                        <?php if($isAdmin): ?>
                        <div class="absolute top-4 right-4 opacity-0 group-hover/akademik:opacity-100 flex gap-2 z-30 transition-opacity">
                            <a href="<?= base_url('admin-konten/edit-item/'.$program['id']) ?>" class="bg-white text-indigo-600 shadow-md p-2 rounded-xl hover:bg-indigo-600 hover:text-white transition-colors">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= base_url('admin-konten/delete-item/'.$program['id']) ?>" onclick="return confirm('Hapus program akademik?')" class="bg-white text-red-600 shadow-md p-2 rounded-xl hover:bg-red-600 hover:text-white transition-colors">
                                <i data-lucide="trash" class="w-4 h-4"></i>
                            </a>
                        </div>
                        <?php endif; ?>

                        <div class="h-56 overflow-hidden relative">
                            <?php $src = str_starts_with($img, 'http') ? $img : base_url($img); ?>
                            <img src="<?= esc($src) ?>" alt="<?= esc($program['judul']) ?>" 
                                 class="w-full h-full object-cover transform transition-transform duration-700 group-hover/akademik:scale-110"
                                 onerror="this.src='/fallback.jpg'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover/akademik:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-8">
                            <div class="w-16 h-16 bg-blue-50 group-hover/akademik:bg-blue-600 transition-colors duration-300 rounded-2xl flex items-center justify-center mb-6 -mt-16 relative z-10 shadow-lg rotate-3 group-hover/akademik:rotate-0">
                                <i data-lucide="<?= esc($icon) ?>" class="w-8 h-8 text-blue-600 group-hover/akademik:text-white transition-colors duration-300"></i>
                            </div>
                            <h3 class="text-xl mb-3 font-bold text-gray-900"><?= esc($program['judul']) ?></h3>
                            <p class="text-gray-600 leading-relaxed"><?= nl2br(esc($program['konten'])) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <?php if($isAdmin): ?>
                    <!-- Form Tambahan Khusus Akademik -->
                    <a href="<?= base_url('admin-konten/create-item/program/akademik') ?>" class="bg-white rounded-2xl overflow-hidden border-2 border-dashed border-gray-300 hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 group flex flex-col justify-center items-center py-16 shadow-lg min-h-[350px]">
                        <div class="w-20 h-20 bg-gray-100 group-hover:bg-blue-100 transition-colors duration-300 rounded-full flex items-center justify-center mb-4">
                            <i data-lucide="plus" class="w-10 h-10 text-gray-400 group-hover:text-blue-600 transition-colors duration-300"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-400 group-hover:text-blue-600">Tambah Program</h3>
                    </a>
                <?php endif; ?>
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
                <?php 
                $colors = ['bg-red-100 text-red-600', 'bg-purple-100 text-purple-600', 'bg-blue-100 text-blue-600', 'bg-green-100 text-green-600', 'bg-orange-100 text-orange-600'];
                foreach ($ekskul as $index => $item): 
                    $color = $colors[$index % count($colors)];
                    $activities = explode(',', $item['konten']);
                ?>
                    <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 group/ekskul relative" data-aos="zoom-in" data-aos-delay="<?= $index * 100 ?>">
                        <?php if($isAdmin): ?>
                        <div class="absolute top-4 right-4 opacity-0 group-hover/ekskul:opacity-100 flex gap-2 z-30 transition-opacity">
                            <a href="<?= base_url('admin-konten/edit-item/'.$item['id']) ?>" class="bg-gray-100 text-indigo-600 shadow-sm p-1.5 rounded-lg hover:bg-indigo-600 hover:text-white transition-colors">
                                <i data-lucide="pencil" class="w-4 h-4"></i>
                            </a>
                            <a href="<?= base_url('admin-konten/delete-item/'.$item['id']) ?>" onclick="return confirm('Hapus kategori ekstrakurikuler?')" class="bg-gray-100 text-red-600 shadow-sm p-1.5 rounded-lg hover:bg-red-600 hover:text-white transition-colors">
                                <i data-lucide="trash" class="w-4 h-4"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        
                        <div class="w-16 h-16 <?= $color ?> rounded-2xl flex items-center justify-center mb-6 rotate-3 group-hover/ekskul:rotate-0 transition-transform duration-300">
                            <i data-lucide="<?= esc($item['gambar_icon']) ?>" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl mb-6 font-bold text-gray-900"><?= esc($item['judul']) ?></h3>
                        <ul class="space-y-3">
                            <?php foreach ($activities as $activity): ?>
                                <?php if(trim($activity) !== ''): ?>
                                <li class="flex items-center gap-3 text-gray-600 group/item">
                                    <div class="w-2 h-2 rounded-full border-2 border-blue-600 group-hover/item:bg-blue-600 transition-colors"></div>
                                    <span class="group-hover/item:text-blue-600 transition-colors"><?= esc(trim($activity)) ?></span>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
                
                <?php if($isAdmin): ?>
                    <a href="<?= base_url('admin-konten/create-item/program/ekstrakurikuler') ?>" class="border-2 border-dashed border-gray-300 text-gray-500 hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600 w-full min-h-[250px] flex flex-col justify-center items-center rounded-2xl transition-all">
                        <div class="w-16 h-16 bg-gray-100 group-hover:bg-blue-100 transition-colors duration-300 rounded-full flex items-center justify-center mb-4">
                            <i data-lucide="plus" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold">Tambah Ekskul</h3>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gray-50">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center" data-aos="zoom-in">
            <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-8">
                <i data-lucide="info" class="w-10 h-10 text-blue-600"></i>
            </div>
            <h2 class="text-3xl md:text-4xl mb-6 font-bold text-gray-900">
                Tertarik dengan Program Kami?
            </h2>
            <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                Pelajari lebih lanjut tentang SMP Negeri 2 Margoyoso dan program pendidikan kami
            </p>
            <a href="<?= base_url('tentang') ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-4 rounded-full font-bold text-lg transition-all duration-300 inline-flex items-center gap-3 hover:shadow-xl hover:-translate-y-1">
                <i data-lucide="school" class="w-5 h-5"></i>
                Tentang Sekolah Kami
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
        <a href="<?= base_url('admin-konten/create-item/program/ekstra') ?>" class="bg-white border-2 border-dashed border-gray-300 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-600 px-8 py-4 rounded-2xl font-bold flex flex-col items-center gap-2 transition-all group scale-95 hover:scale-100 shadow-sm">
            <div class="w-10 h-10 bg-gray-100 text-gray-600 group-hover:bg-indigo-600 group-hover:text-white rounded-full flex items-center justify-center transition-colors">
                <i data-lucide="plus" class="w-5 h-5"></i>
            </div>
            Tambah Bagian Extra Tersendiri
        </a>
    </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
