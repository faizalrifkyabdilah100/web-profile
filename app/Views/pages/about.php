<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
$isAdmin = session()->get('role') === 'super_admin';
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

    <!-- Flash Message -->
    <?php $flash = session()->getFlashdata('pesan'); if (!empty($flash)): ?>
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 mt-8 absolute left-0 right-0 z-50">
            <div class="rounded-2xl px-6 py-4 flex items-center gap-4 shadow-xl border <?= $flash['type'] === 'success' ? 'bg-emerald-50 border-emerald-200 text-emerald-800' : 'bg-red-50 border-red-200 text-red-800' ?> animate-bounce" id="flash-alert">
                <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center <?= $flash['type'] === 'success' ? 'bg-emerald-100' : 'bg-red-100' ?>">
                    <i data-lucide="<?= $flash['type'] === 'success' ? 'check-circle' : 'alert-circle' ?>" class="w-5 h-5"></i>
                </div>
                <p class="font-bold"><?= $flash['message'] ?></p>
                <button onclick="document.getElementById('flash-alert').style.display='none'" class="ml-auto hover:opacity-70 transition-opacity">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
        </div>
        <script>setTimeout(() => document.getElementById('flash-alert').style.display = 'none', 3000);</script>
    <?php endif; ?>

    <!-- School Identity + Logo -->
    <section class="py-24 bg-white relative">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

                <!-- Identity Card -->
                <div data-aos="fade-right" data-aos-duration="1000" class="relative group/section">
                    <div class="flex items-center gap-3 mb-4">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Identitas Sekolah</h2>
                        <?php if($isAdmin): ?>
                            <a href="<?= base_url('admin-konten/create-item/tentang/identitas') ?>" class="opacity-0 group-hover/section:opacity-100 transition-opacity bg-indigo-100 text-indigo-700 px-3 py-1 rounded-lg text-sm font-bold flex items-center gap-1 shadow-sm hover:bg-indigo-600 hover:text-white">
                                <i data-lucide="plus" class="w-4 h-4"></i> Tambah Identitas
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="w-16 h-1 bg-blue-600 mb-8 rounded-full"></div>
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                        <?php foreach ($identitas as $index => $item): ?>
                            <div class="flex items-start gap-4 px-6 py-4 <?= $index % 2 === 0 ? 'bg-white' : 'bg-slate-50' ?> hover:bg-blue-50 transition-colors duration-200 group/item relative">
                                <span class="text-sm font-semibold text-gray-500 w-48 flex-shrink-0 pt-0.5"><?= esc($item['judul']) ?></span>
                                <span class="text-sm text-gray-900 font-medium leading-relaxed flex-1">: <?= esc($item['konten']) ?></span>
                                
                                <?php if($isAdmin): ?>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 opacity-0 group-hover/item:opacity-100 transition-opacity flex gap-2">
                                    <a href="<?= base_url('tentang-admin/edit-item/'.$item['id']) ?>" class="p-1.5 text-amber-500 bg-amber-50 rounded shadow-sm hover:bg-amber-500 hover:text-white"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                                    <a href="<?= base_url('admin-konten/delete-item/'.$item['id']) ?>" onclick="return confirm('Hapus ini?')" class="p-1.5 text-red-500 bg-red-50 rounded shadow-sm hover:bg-red-500 hover:text-white"><i data-lucide="trash" class="w-4 h-4"></i></a>
                                </div>
                                <?php endif; ?>
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
                        <div class="relative group/logo">
                            <div class="w-52 h-52 rounded-full border-4 border-blue-200 shadow-2xl flex items-center justify-center bg-blue-50 overflow-hidden hover:border-blue-400 transition-all duration-300">
                                <?php $logoPath = 'logo-sekolah.png'; $logoVer = file_exists(FCPATH . $logoPath) ? filemtime(FCPATH . $logoPath) : '1'; ?>
                                <img id="school-logo"
                                     src="<?= base_url($logoPath . '?v=' . $logoVer) ?>"
                                     alt="Logo SMP Negeri 2 Margoyoso"
                                     class="w-full h-full object-contain p-4 transition-transform duration-300 group-hover/logo:scale-105"
                                     onerror="this.style.display='none'; document.getElementById('logo-placeholder').style.display='flex';">
                                <!-- Fallback jika logo belum ada -->
                                <div id="logo-placeholder" class="flex-col items-center justify-center text-blue-400 text-center p-4 transition-transform duration-300 group-hover/logo:scale-105" style="display:none;">
                                    <i data-lucide="image" class="w-16 h-16 mb-3 opacity-40"></i>
                                    <span class="text-xs text-gray-400 font-medium">Logo sekolah<br>akan tampil di sini</span>
                                </div>
                            </div>
                            
                            <?php if($isAdmin): ?>
                            <!-- Edit Button Overlay -->
                            <div class="absolute inset-0 bg-black/40 rounded-full opacity-0 group-hover/logo:opacity-100 flex items-center justify-center transition-opacity duration-300 backdrop-blur-[2px]">
                                <button onclick="document.getElementById('modal-logo').classList.remove('hidden')" class="bg-white text-indigo-600 hover:bg-indigo-50 px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg transform translate-y-4 group-hover/logo:translate-y-0 transition-all duration-300">
                                    <i data-lucide="camera" class="w-4 h-4"></i> Ubah Logo
                                </button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100 group/section relative">
                        <?php if($isAdmin): ?>
                        <div class="absolute top-4 right-4 z-20">
                            <button onclick="document.getElementById('modal-profil').classList.remove('hidden')" class="opacity-0 group-hover/section:opacity-100 transition-opacity bg-indigo-100 text-indigo-700 px-3 py-1 rounded-lg text-sm font-bold flex items-center gap-1 shadow-sm hover:bg-indigo-600 hover:text-white">
                                <i data-lucide="pencil" class="w-4 h-4"></i> Edit
                            </button>
                        </div>
                        <?php endif; ?>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Profil Singkat</h3>
                        <div class="prose text-gray-600 space-y-4 text-sm leading-relaxed">
                            <p><?= nl2br(esc($profil['konten'])) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi -->
    <section class="py-24 bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white relative overflow-hidden group/section">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-500/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-500/20 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        
        <?php if($isAdmin): ?>
        <div class="absolute top-8 right-8 z-20">
            <button onclick="document.getElementById('modal-visi').classList.remove('hidden')" class="opacity-0 group-hover/section:opacity-100 transition-opacity bg-white/20 text-white backdrop-blur-sm border border-white/30 px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg hover:bg-white/40">
                <i data-lucide="pencil" class="w-4 h-4"></i> Edit Visi
            </button>
        </div>
        <?php endif; ?>

        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 relative z-10 text-center" data-aos="zoom-in" data-aos-duration="1000">
            <div class="w-20 h-20 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-8 border border-white/20">
                <i data-lucide="eye" class="w-10 h-10 text-blue-200"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-8">Visi Sekolah</h2>
            <div class="w-24 h-1 bg-blue-300 mx-auto mb-10 rounded-full"></div>
            <blockquote class="text-xl md:text-2xl font-semibold leading-relaxed text-blue-50 italic max-w-4xl mx-auto border-l-4 border-blue-300 pl-8 text-left">
                "<?= esc($visi['konten']) ?>"
            </blockquote>
        </div>
    </section>

    <!-- Misi -->
    <section class="py-24 bg-slate-50 relative overflow-hidden text-slate-800 group/section">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/50 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-100/50 rounded-full blur-3xl opacity-50 translate-y-1/2 -translate-x-1/2"></div>
        
        <?php if($isAdmin): ?>
        <div class="absolute top-8 right-8 z-20">
            <a href="<?= base_url('admin-konten/create-item/tentang/misi') ?>" class="opacity-0 group-hover/section:opacity-100 transition-opacity bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg hover:bg-blue-700">
                <i data-lucide="plus" class="w-4 h-4"></i> Tambah Misi
            </a>
        </div>
        <?php endif; ?>

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
                    <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-start gap-4 group/item relative" data-aos="fade-up" data-aos-delay="<?= $index * 80 ?>">
                        <div class="flex-shrink-0 w-9 h-9 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-black text-sm group-hover/item:bg-blue-600 group-hover/item:text-white transition-colors duration-300">
                            <?= $index + 1 ?>
                        </div>
                        <p class="text-gray-700 leading-relaxed text-sm flex-1"><?= esc($item['konten']) ?></p>
                        
                        <?php if($isAdmin): ?>
                        <div class="absolute right-4 top-4 opacity-0 group-hover/item:opacity-100 transition-opacity flex gap-1">
                            <a href="<?= base_url('tentang-admin/edit-item/'.$item['id']) ?>" class="p-1 text-amber-500 bg-amber-50 rounded hover:bg-amber-500 hover:text-white"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                            <a href="<?= base_url('admin-konten/delete-item/'.$item['id']) ?>" onclick="return confirm('Hapus ini?')" class="p-1 text-red-500 bg-red-50 rounded hover:bg-red-500 hover:text-white"><i data-lucide="trash" class="w-4 h-4"></i></a>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Tujuan -->
    <section class="py-24 bg-white relative overflow-hidden group/section">
        
        <?php if($isAdmin): ?>
        <div class="absolute top-8 right-8 z-20">
            <a href="<?= base_url('admin-konten/create-item/tentang/tujuan') ?>" class="opacity-0 group-hover/section:opacity-100 transition-opacity bg-indigo-600 text-white px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg hover:bg-indigo-700">
                <i data-lucide="plus" class="w-4 h-4"></i> Tambah Tujuan
            </a>
        </div>
        <?php endif; ?>

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
                    <div class="relative p-6 rounded-2xl border border-gray-100 bg-gradient-to-br from-white to-indigo-50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group/item overflow-hidden" data-aos="fade-up" data-aos-delay="<?= $index * 80 ?>">
                        <div class="absolute top-0 right-0 text-6xl font-black text-indigo-100 leading-none p-4 select-none group-hover/item:text-indigo-200 transition-colors"><?= $index + 1 ?></div>
                        
                        <?php if($isAdmin): ?>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover/item:opacity-100 transition-opacity flex gap-1 z-20 bg-white/80 p-1 rounded-lg backdrop-blur-sm">
                            <a href="<?= base_url('tentang-admin/edit-item/'.$item['id']) ?>" class="p-1.5 text-amber-500 hover:bg-amber-100 rounded focus:outline-none"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                            <a href="<?= base_url('admin-konten/delete-item/'.$item['id']) ?>" onclick="return confirm('Hapus ini?')" class="p-1.5 text-red-500 hover:bg-red-100 rounded focus:outline-none"><i data-lucide="trash" class="w-4 h-4"></i></a>
                        </div>
                        <?php endif; ?>

                        <div class="relative z-10 w-full h-full flex flex-col">
                            <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center mb-4 group-hover/item:bg-indigo-600 transition-colors duration-300">
                                <i data-lucide="check-circle" class="w-5 h-5 text-indigo-600 group-hover/item:text-white transition-colors duration-300"></i>
                            </div>
                            <p class="text-gray-700 leading-relaxed text-sm font-medium flex-1 mb-6"><?= esc($item['konten']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Nilai-Nilai -->
    <section class="py-24 bg-slate-50 relative group/section">
        <?php if($isAdmin): ?>
        <div class="absolute top-8 right-8 z-20">
            <a href="<?= base_url('admin-konten/create-item/tentang/nilai') ?>" class="opacity-0 group-hover/section:opacity-100 transition-opacity bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-bold flex items-center gap-2 shadow-lg hover:bg-blue-700">
                <i data-lucide="plus" class="w-4 h-4"></i> Tambah Nilai
            </a>
        </div>
        <?php endif; ?>

        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Nilai-Nilai Kami</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Prinsip-prinsip fundamental yang menjadi landasan dalam setiap kegiatan pendidikan di SMP Negeri 2 Margoyoso
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($nilai as $index => $value): ?>
                    <div class="text-center p-8 rounded-2xl border border-gray-100 bg-white hover:border-blue-100 hover:shadow-xl transition-all duration-300 group/item hover:-translate-y-2 relative" data-aos="fade-up" data-aos-delay="<?= $index * 150 ?>">
                        
                        <?php if($isAdmin): ?>
                        <div class="absolute top-2 right-2 opacity-0 group-hover/item:opacity-100 transition-opacity flex gap-1 z-20">
                            <a href="<?= base_url('tentang-admin/edit-item/'.$value['id']) ?>" class="p-1.5 text-amber-500 bg-amber-50 hover:bg-amber-100 rounded focus:outline-none"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                            <a href="<?= base_url('admin-konten/delete-item/'.$value['id']) ?>" onclick="return confirm('Hapus ini?')" class="p-1.5 text-red-500 bg-red-50 hover:bg-red-100 rounded focus:outline-none"><i data-lucide="trash" class="w-4 h-4"></i></a>
                        </div>
                        <?php endif; ?>

                        <div class="w-20 h-20 bg-blue-50 text-blue-600 group-hover/item:bg-blue-600 group-hover/item:text-white transition-colors duration-300 rounded-2xl flex items-center justify-center mx-auto mb-6 rotate-3 group-hover/item:rotate-0">
                            <i data-lucide="<?= $value['gambar_icon'] ?: 'hexagon' ?>" class="w-10 h-10"></i>
                        </div>
                        <h3 class="text-xl mb-3 font-bold text-gray-900"><?= esc($value['judul']) ?></h3>
                        <p class="text-gray-600 leading-relaxed"><?= esc($value['konten']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
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
        <a href="<?= base_url('admin-konten/create-item/tentang/ekstra') ?>" class="bg-white border-2 border-dashed border-gray-300 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 hover:border-indigo-600 px-8 py-4 rounded-2xl font-bold flex flex-col items-center gap-2 transition-all group scale-95 hover:scale-100 shadow-sm">
            <div class="w-10 h-10 bg-gray-100 text-gray-600 group-hover:bg-indigo-600 group-hover:text-white rounded-full flex items-center justify-center transition-colors">
                <i data-lucide="plus" class="w-5 h-5"></i>
            </div>
            Tambah Bagian Extra Tersendiri
        </a>
    </div>
    <?php endif; ?>

    <!-- Modal Form (Profil & Visi) -->
    <?php if($isAdmin): ?>
    <div id="modal-profil" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="document.getElementById('modal-profil').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen p-4">
            <form action="<?= base_url('admin-konten/update_utama') ?>" method="POST" class="bg-white rounded-3xl shadow-2xl max-w-xl w-full p-8 relative z-10">
                <?= csrf_field() ?>
                <input type="hidden" name="id_profil" value="<?= $profil['id'] ?>">
                <input type="hidden" name="id_visi" value="<?= $visi['id'] ?>">
                <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                    <h3 class="text-2xl font-bold text-gray-900">Edit Profil & Visi</h3>
                    <button type="button" class="text-gray-400 hover:text-gray-600" onclick="document.getElementById('modal-profil').classList.add('hidden')"><i data-lucide="x"></i></button>
                </div>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Profil Singkat Sekolah</label>
                        <textarea name="profil_konten" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-blue-500" required><?= esc($profil['konten']) ?></textarea>
                    </div>
                </div>
                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" class="px-6 py-2.5 rounded-xl font-semibold bg-gray-100 hover:bg-gray-200" onclick="document.getElementById('modal-profil').classList.add('hidden')">Batal</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl font-semibold bg-blue-600 hover:bg-blue-700 text-white">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
    
    <div id="modal-visi" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="document.getElementById('modal-visi').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen p-4">
            <form action="<?= base_url('admin-konten/update_utama') ?>" method="POST" class="bg-white rounded-3xl shadow-2xl max-w-xl w-full p-8 relative z-10">
                <?= csrf_field() ?>
                <input type="hidden" name="id_profil" value="<?= $profil['id'] ?>">
                <input type="hidden" name="id_visi" value="<?= $visi['id'] ?>">
                <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                    <h3 class="text-2xl font-bold text-gray-900">Edit Visi Sekolah</h3>
                    <button type="button" class="text-gray-400 hover:text-gray-600" onclick="document.getElementById('modal-visi').classList.add('hidden')"><i data-lucide="x"></i></button>
                </div>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Visi Sekolah</label>
                        <textarea name="visi_konten" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-blue-500" required><?= esc($visi['konten']) ?></textarea>
                    </div>
                </div>
                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" class="px-6 py-2.5 rounded-xl font-semibold bg-gray-100 hover:bg-gray-200" onclick="document.getElementById('modal-visi').classList.add('hidden')">Batal</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl font-semibold bg-blue-600 hover:bg-blue-700 text-white">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Form (Ubah Logo) -->
    <div id="modal-logo" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="document.getElementById('modal-logo').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen p-4">
            <form action="<?= base_url('admin-konten/update_logo') ?>" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8 relative z-10">
                <?= csrf_field() ?>
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mb-2">
                        <i data-lucide="image" class="w-8 h-8"></i>
                    </div>
                </div>
                <div class="text-center mb-6 border-b border-gray-100 pb-4">
                    <h3 class="text-2xl font-bold text-gray-900">Ubah Logo Sekolah</h3>
                    <p class="text-gray-500 text-sm mt-1">Upload gambar resolusi tinggi (PNG/JPG)</p>
                </div>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Pilih File Logo Baru</label>
                        <input type="file" name="logo" accept="image/png, image/jpeg, image/jpg" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition-all cursor-pointer" required>
                        <p class="text-xs text-gray-500 mt-2">Format: PNG, JPG (Tanpa background/transparan disarankan). Maks 2MB.</p>
                    </div>
                </div>
                <div class="mt-8 flex gap-3">
                    <button type="button" class="flex-1 py-3 rounded-xl font-semibold bg-gray-100 hover:bg-gray-200" onclick="document.getElementById('modal-logo').classList.add('hidden')">Batal</button>
                    <button type="submit" class="flex-1 py-3 rounded-xl font-semibold bg-indigo-600 hover:bg-indigo-700 text-white">Upload Logo</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>

<?= $this->endSection() ?>
