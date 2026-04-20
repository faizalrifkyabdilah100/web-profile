<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
    $isEdit = isset($item);
    $actionUrl = $isEdit ? base_url('tentang-admin/update-item/' . $item['id']) : base_url('tentang-admin/store-item/' . $kategori);
    $titleText = $isEdit ? 'Edit Data ' : 'Tambah Data ';
    $titleText .= ucfirst(str_replace('_', ' ', $kategori));
?>

<div class="min-h-screen bg-slate-50 py-12">
    <div class="mx-auto max-w-3xl w-full px-4 sm:px-6 lg:px-8 mb-8" data-aos="fade-down">
        <a href="<?= base_url('tentang-admin') ?>" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 font-medium mb-4 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Kembali ke Manajemen Tentang
        </a>
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg">
                <i data-lucide="<?= $isEdit ? 'pencil' : 'plus-circle' ?>" class="w-6 h-6"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-900"><?= $titleText ?></h1>
                <p class="text-gray-500 mt-1">Formulir pengaturan untuk bagian <?= ucfirst($kategori) ?></p>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-3xl w-full px-4 sm:px-6 lg:px-8" data-aos="fade-up" data-aos-delay="100">
        <form action="<?= $actionUrl ?>" method="POST" class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <?= csrf_field() ?>
            
            <div class="p-8 space-y-6">
                <!-- Field Judul (Hanya untuk Identitas dan Nilai) -->
                <?php if($kategori === 'identitas' || $kategori === 'nilai'): ?>
                    <div>
                        <label for="judul" class="block text-sm font-bold text-gray-700 mb-2">
                            <?= $kategori === 'identitas' ? 'Label (Cth: NPSN, Alamat)' : 'Judul Nilai (Cth: Religius, Inovatif)' ?> <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" id="judul" value="<?= old('judul') ?? ($item['judul'] ?? '') ?>" required
                               class="w-full px-4 py-3 rounded-xl border <?= $validation->hasError('judul') ? 'border-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' ?> bg-gray-50 focus:bg-white transition-colors duration-300">
                        <?php if ($validation->hasError('judul')): ?>
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1"><i data-lucide="alert-circle" class="w-4 h-4"></i> <?= $validation->getError('judul') ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Field Gambar Icon (Hanya untuk Nilai) -->
                <?php if($kategori === 'nilai'): ?>
                    <div>
                        <label for="gambar_icon" class="block text-sm font-bold text-gray-700 mb-2">Nama Icon <a href="https://lucide.dev/icons/" target="_blank" class="text-indigo-600 font-normal hover:underline">(Cari di Lucide)</a></label>
                        <input type="text" name="gambar_icon" id="gambar_icon" value="<?= old('gambar_icon') ?? ($item['gambar_icon'] ?? '') ?>" placeholder="Cth: heart, target, lightbulb..."
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white transition-colors duration-300">
                    </div>
                <?php endif; ?>

                <!-- Field Konten (Teks Deskripsi / Nilai Value) -->
                <div>
                    <label for="konten" class="block text-sm font-bold text-gray-700 mb-2">
                        <?= $kategori === 'identitas' ? 'Value (Cth: 20338988, Negeri)' : 'Isi Teks / Deskripsi' ?> <span class="text-red-500">*</span>
                    </label>
                    
                    <?php if($kategori === 'identitas'): ?>
                        <!-- Identitas cuma butuh text input 1 baris -->
                        <input type="text" name="konten" id="konten" value="<?= old('konten') ?? ($item['konten'] ?? '') ?>" required
                               class="w-full px-4 py-3 rounded-xl border <?= $validation->hasError('konten') ? 'border-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' ?> bg-gray-50 focus:bg-white transition-colors duration-300">
                    <?php else: ?>
                        <!-- Misi / Tujuan / Nilai butuh textarea karena bisa panjang -->
                        <textarea name="konten" id="konten" rows="5" required
                                  class="w-full px-4 py-3 rounded-xl border <?= $validation->hasError('konten') ? 'border-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' ?> bg-gray-50 focus:bg-white transition-colors duration-300"><?= old('konten') ?? ($item['konten'] ?? '') ?></textarea>
                    <?php endif; ?>

                    <?php if ($validation->hasError('konten')): ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center gap-1"><i data-lucide="alert-circle" class="w-4 h-4"></i> <?= $validation->getError('konten') ?></p>
                    <?php endif; ?>
                </div>

            </div>

            <!-- Footer Action -->
            <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex justify-end gap-3 rounded-b-3xl">
                <a href="<?= base_url('tentang-admin') ?>" class="px-6 py-2.5 rounded-xl font-semibold text-gray-700 hover:bg-gray-200 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-8 py-2.5 rounded-xl font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center gap-2">
                    <i data-lucide="save" class="w-5 h-5"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
