<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
    $isEdit = isset($item);
    $actionUrl = $isEdit ? base_url('admin-konten/update-item/' . $item['id']) : base_url('admin-konten/store-item/' . $halaman . '/' . $kategori);
    $titleText = $isEdit ? 'Edit Data ' : 'Tambah Data ';
    $titleText .= ucfirst(str_replace('_', ' ', $kategori));
?>

<div class="min-h-screen bg-slate-50 py-12">
    <div class="mx-auto max-w-3xl w-full px-4 sm:px-6 lg:px-8 mb-8" data-aos="fade-down">
        <a href="<?= base_url($halaman === 'beranda' ? '/' : $halaman) ?>" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 font-medium mb-4 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Kembali ke Halaman <?= ucfirst($halaman) ?>
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
        <form action="<?= $actionUrl ?>" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <?= csrf_field() ?>
            
            <div class="p-8 space-y-6">
                <!-- Field Judul (Hanya untuk Identitas, Nilai, Fitur, Statistik, Prestasi, Program Unggulan, Akademik, Ekstrakurikuler, Ekstra) -->
                <?php if(in_array($kategori, ['identitas', 'nilai', 'fitur', 'statistik', 'prestasi', 'program_unggulan', 'akademik', 'ekstrakurikuler', 'ekstra'])): ?>
                    <div>
                        <label for="judul" class="block text-sm font-bold text-gray-700 mb-2">
                            Judul / Label <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="judul" id="judul" value="<?= old('judul') ?? ($item['judul'] ?? '') ?>" required
                               class="w-full px-4 py-3 rounded-xl border <?= $validation->hasError('judul') ? 'border-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' ?> bg-gray-50 focus:bg-white transition-colors duration-300">
                        <?php if ($validation->hasError('judul')): ?>
                            <p class="mt-2 text-sm text-red-600 flex items-center gap-1"><i data-lucide="alert-circle" class="w-4 h-4"></i> <?= $validation->getError('judul') ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Field Gambar Icon -->
                <?php if(in_array($kategori, ['nilai', 'fitur', 'program_unggulan', 'akademik', 'ekstrakurikuler'])): ?>
                    <?php if($kategori === 'program_unggulan' || $kategori === 'akademik'): ?>
                        <div>
                            <label for="gambar_file" class="block text-sm font-bold text-gray-700 mb-2">
                                Upload Gambar Thumbnail <?= isset($item['gambar_icon']) && !empty($item['gambar_icon']) ? '(Biarkan kosong jika tidak ingin mengubah)' : '(Opsional)' ?>
                            </label>
                            <input type="file" name="gambar_file" id="gambar_file" accept="image/*"
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white transition-all duration-300 mb-4 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                            
                            <input type="hidden" name="gambar_icon_lama" value="<?= esc($item['gambar_icon'] ?? '') ?>">

                            <?php if($kategori === 'akademik'): ?>
                                <?php 
                                    $parts = explode(';', $item['gambar_icon'] ?? '');
                                    $oldIcon = $parts[1] ?? 'book-open';
                                ?>
                                <label for="ikon_pendukung" class="block text-sm font-bold text-gray-700 mb-2 mt-4">
                                    Nama Icon Lucide Pendukung <a href="https://lucide.dev/icons/" target="_blank" class="text-indigo-600 font-normal hover:underline">(Buka)</a>
                                </label>
                                <input type="text" name="ikon_pendukung" id="ikon_pendukung" value="<?= old('ikon_pendukung') ?? esc($oldIcon) ?>" placeholder="Cth: book-open, globe, code..."
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white transition-colors duration-300">
                            <?php endif; ?>

                            <?php if(!empty($item['gambar_icon'])): ?>
                                <?php $imgUrl = $kategori==='akademik' ? explode(';', $item['gambar_icon'])[0] : $item['gambar_icon']; ?>
                                <p class="text-xs text-gray-500 mt-3">Gambar saat ini: <a href="<?= str_starts_with($imgUrl, 'http') ? $imgUrl : base_url($imgUrl) ?>" target="_blank" class="text-blue-500 hover:underline border rounded-md p-1 border-gray-200 block w-fit mt-1"><img src="<?= str_starts_with($imgUrl, 'http') ? $imgUrl : base_url($imgUrl) ?>" class="h-20 w-32 object-cover rounded"></a></p>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div>
                            <label for="gambar_icon" class="block text-sm font-bold text-gray-700 mb-2">
                                Nama Icon (Cari di Lucide) <a href="https://lucide.dev/icons/" target="_blank" class="text-indigo-600 font-normal hover:underline">(Buka)</a>
                            </label>
                            <input type="text" name="gambar_icon" id="gambar_icon" value="<?= old('gambar_icon') ?? ($item['gambar_icon'] ?? '') ?>" placeholder="Cth: heart, target, lightbulb..."
                                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white transition-colors duration-300">
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Field Konten (Teks Deskripsi / Nilai Value) -->
                <div>
                    <label for="konten" class="block text-sm font-bold text-gray-700 mb-2">
                        Isi Konten / Value <span class="text-red-500">*</span>
                    </label>
                    
                    <?php if(in_array($kategori, ['identitas', 'statistik', 'prestasi', 'fasilitas'])): ?>
                        <!-- Hanya butuh text input 1 baris -->
                        <input type="text" name="konten" id="konten" value="<?= old('konten') ?? ($item['konten'] ?? '') ?>" required
                               class="w-full px-4 py-3 rounded-xl border <?= $validation->hasError('konten') ? 'border-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' ?> bg-gray-50 focus:bg-white transition-colors duration-300">
                    <?php else: ?>
                        <!-- Butuh textarea karena bisa panjang -->
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
                <a href="<?= base_url($halaman === 'beranda' ? '/' : $halaman) ?>" class="px-6 py-2.5 rounded-xl font-semibold text-gray-700 hover:bg-gray-200 transition-colors">
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
