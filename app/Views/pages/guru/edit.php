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
            <h1 class="text-4xl md:text-6xl mb-6 font-bold tracking-tight">Edit Data Guru</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Perbarui informasi data guru <?= esc($guru['nama']) ?>
            </p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-16 bg-slate-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/40 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-indigo-100/40 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4"></div>

        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Back Button -->
            <a href="<?= base_url('guru') ?>" class="inline-flex items-center gap-2 text-gray-600 hover:text-blue-600 font-medium mb-8 transition-colors duration-300 group" data-aos="fade-right">
                <i data-lucide="arrow-left" class="w-5 h-5 group-hover:-translate-x-1 transition-transform"></i>
                Kembali ke Daftar Guru
            </a>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-amber-500 to-orange-500 px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i data-lucide="user-cog" class="w-7 h-7 text-white"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Edit Data Guru</h2>
                            <p class="text-amber-100 text-sm">Perbarui data guru dengan informasi terbaru</p>
                        </div>
                    </div>
                </div>

                <form action="<?= base_url('guru/update/' . $guru['id']) ?>" method="post" enctype="multipart/form-data" class="p-8">
                    <?= csrf_field() ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div class="md:col-span-2">
                            <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="user" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input type="text" name="nama" id="nama" value="<?= old('nama', $guru['nama']) ?>" 
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 <?= $validation->hasError('nama') ? 'border-red-300 bg-red-50' : 'border-gray-200' ?> rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none"
                                       placeholder="Masukkan nama lengkap guru">
                            </div>
                            <?php if ($validation->hasError('nama')): ?>
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1"><i data-lucide="alert-circle" class="w-4 h-4"></i> <?= $validation->getError('nama') ?></p>
                            <?php endif; ?>
                        </div>

                        <!-- NIP -->
                        <div>
                            <label for="nip" class="block text-sm font-semibold text-gray-700 mb-2">NIP</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="hash" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input type="text" name="nip" id="nip" value="<?= old('nip', $guru['nip']) ?>" 
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none"
                                       placeholder="Nomor Induk Pegawai">
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label for="jenis_kelamin" class="block text-sm font-semibold text-gray-700 mb-2">
                                Jenis Kelamin <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="users" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <select name="jenis_kelamin" id="jenis_kelamin" 
                                        class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 <?= $validation->hasError('jenis_kelamin') ? 'border-red-300 bg-red-50' : 'border-gray-200' ?> rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none appearance-none">
                                    <option value="L" <?= old('jenis_kelamin', $guru['jenis_kelamin']) === 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="P" <?= old('jenis_kelamin', $guru['jenis_kelamin']) === 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                    <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Tempat Lahir -->
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="map-pin" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= old('tempat_lahir', $guru['tempat_lahir']) ?>" 
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none"
                                       placeholder="Contoh: Pati">
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="calendar" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?= old('tanggal_lahir', $guru['tanggal_lahir']) ?>" 
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none">
                            </div>
                        </div>

                        <!-- Jabatan -->
                        <div>
                            <label for="jabatan" class="block text-sm font-semibold text-gray-700 mb-2">Jabatan</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="briefcase" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input type="text" name="jabatan" id="jabatan" value="<?= old('jabatan', $guru['jabatan']) ?>" 
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none"
                                       placeholder="Contoh: Guru, Wakil Kepala Sekolah">
                            </div>
                        </div>

                        <!-- Mata Pelajaran -->
                        <div>
                            <label for="mata_pelajaran" class="block text-sm font-semibold text-gray-700 mb-2">Mata Pelajaran</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="book-open" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input type="text" name="mata_pelajaran" id="mata_pelajaran" value="<?= old('mata_pelajaran', $guru['mata_pelajaran']) ?>" 
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none"
                                       placeholder="Contoh: Matematika">
                            </div>
                        </div>

                        <!-- No Telepon -->
                        <div>
                            <label for="no_telepon" class="block text-sm font-semibold text-gray-700 mb-2">No. Telepon</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i data-lucide="phone" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input type="text" name="no_telepon" id="no_telepon" value="<?= old('no_telepon', $guru['no_telepon']) ?>" 
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none"
                                       placeholder="Contoh: 081234567890">
                            </div>
                        </div>

                        <!-- Foto -->
                        <div>
                            <label for="foto" class="block text-sm font-semibold text-gray-700 mb-2">Foto</label>
                            
                            <!-- Current Photo -->
                            <?php if ($guru['foto'] && file_exists('uploads/guru/' . $guru['foto'])): ?>
                                <div class="mb-3 flex items-center gap-3">
                                    <img src="<?= base_url('uploads/guru/' . $guru['foto']) ?>" alt="Foto saat ini" class="w-20 h-20 rounded-xl object-cover shadow-md border-2 border-blue-200">
                                    <span class="text-sm text-gray-500">Foto saat ini</span>
                                </div>
                            <?php endif; ?>

                            <div class="relative">
                                <input type="file" name="foto" id="foto" accept="image/*"
                                       class="w-full py-3 px-4 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 file:cursor-pointer file:transition-colors"
                                       onchange="previewImage(this)">
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengubah foto</p>
                            <div id="image-preview" class="mt-3 hidden">
                                <img id="preview-img" src="" alt="Preview" class="w-24 h-24 rounded-xl object-cover shadow-md border-2 border-amber-200">
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="md:col-span-2">
                            <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                            <div class="relative">
                                <div class="absolute top-3 left-0 pl-4 pointer-events-none">
                                    <i data-lucide="home" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <textarea name="alamat" id="alamat" rows="3" 
                                          class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none resize-none"
                                          placeholder="Masukkan alamat lengkap"><?= old('alamat', $guru['alamat']) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                        <a href="<?= base_url('guru') ?>" 
                           class="px-8 py-3 rounded-xl bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all duration-300 text-center">
                            Batal
                        </a>
                        <button type="submit" 
                                class="px-8 py-3 rounded-xl bg-amber-500 text-white font-semibold hover:bg-amber-600 transition-all duration-300 inline-flex items-center justify-center gap-2 hover:shadow-lg hover:-translate-y-0.5">
                            <i data-lucide="save" class="w-5 h-5"></i>
                            Perbarui Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const img = document.getElementById('preview-img');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add('hidden');
        }
    }
</script>

<?= $this->endSection() ?>
