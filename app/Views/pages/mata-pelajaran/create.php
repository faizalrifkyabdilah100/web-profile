<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
$validation = session()->getFlashdata('validation') ?? \Config\Services::validation();
?>

<div>
    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 lg:pt-32 lg:pb-24 flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden text-center">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>
        
        <div class="relative z-10 text-white px-4 max-w-4xl mx-auto" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-4xl md:text-6xl mb-6 font-bold tracking-tight">Tambah Mata Pelajaran</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Lengkapi formulir di bawah untuk menambahkan data mata pelajaran baru
            </p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16 bg-slate-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/40 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-indigo-100/40 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4"></div>

        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Back Button -->
            <a href="<?= base_url('mata-pelajaran') ?>" class="inline-flex items-center gap-2 text-gray-600 hover:text-teal-600 font-medium mb-8 transition-colors duration-300 group" data-aos="fade-right">
                <i data-lucide="arrow-left" class="w-5 h-5 group-hover:-translate-x-1 transition-transform"></i>
                Kembali ke Daftar Mata Pelajaran
            </a>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-teal-600 to-cyan-600 px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i data-lucide="book-plus" class="w-7 h-7 text-white"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Formulir Mata Pelajaran</h2>
                            <p class="text-teal-100 text-sm">Isi data mata pelajaran dengan lengkap</p>
                        </div>
                    </div>
                </div>

                <form action="<?= base_url('mata-pelajaran/store') ?>" method="post" class="p-8">
                    <?= csrf_field() ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Mata Pelajaran -->
                        <div class="md:col-span-2">
                            <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Mata Pelajaran <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="book-open" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" 
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 <?= $validation->hasError('nama') ? 'border-red-300 bg-red-50' : 'border-gray-200' ?> rounded-xl focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all duration-300 outline-none"
                                       placeholder="Contoh: Matematika">
                            </div>
                            <?php if ($validation->hasError('nama')): ?>
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-4 h-4"></i> <?= $validation->getError('nama') ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- Kode -->
                        <div>
                            <label for="kode" class="block text-sm font-semibold text-gray-700 mb-2">Kode</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="hash" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input type="text" name="kode" id="kode" value="<?= old('kode') ?>" 
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all duration-300 outline-none"
                                       placeholder="Contoh: MTK">
                            </div>
                        </div>

                        <!-- Kelompok -->
                        <div>
                            <label for="kelompok" class="block text-sm font-semibold text-gray-700 mb-2">Kelompok</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="layers" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <select name="kelompok" id="kelompok" 
                                        class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all duration-300 outline-none appearance-none">
                                    <option value="">Pilih Kelompok</option>
                                    <option value="Kelompok A (Umum)" <?= old('kelompok') === 'Kelompok A (Umum)' ? 'selected' : '' ?>>Kelompok A (Umum)</option>
                                    <option value="Kelompok B (Umum)" <?= old('kelompok') === 'Kelompok B (Umum)' ? 'selected' : '' ?>>Kelompok B (Umum)</option>
                                    <option value="Muatan Lokal" <?= old('kelompok') === 'Muatan Lokal' ? 'selected' : '' ?>>Muatan Lokal</option>
                                    <option value="Pengembangan Diri" <?= old('kelompok') === 'Pengembangan Diri' ? 'selected' : '' ?>>Pengembangan Diri</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="md:col-span-2">
                            <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                            <div class="relative">
                                <div class="absolute top-3 left-0 pl-4 pointer-events-none">
                                    <i data-lucide="file-text" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <textarea name="deskripsi" id="deskripsi" rows="3" 
                                          class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 transition-all duration-300 outline-none resize-none"
                                          placeholder="Deskripsi singkat mata pelajaran"><?= old('deskripsi') ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                        <a href="<?= base_url('mata-pelajaran') ?>" 
                           class="px-8 py-3 rounded-xl bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all duration-300 text-center">
                            Batal
                        </a>
                        <button type="submit" 
                                class="px-8 py-3 rounded-xl bg-teal-600 text-white font-semibold hover:bg-teal-700 transition-all duration-300 inline-flex items-center justify-center gap-2 hover:shadow-lg hover:-translate-y-0.5">
                            <i data-lucide="save" class="w-5 h-5"></i>
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
