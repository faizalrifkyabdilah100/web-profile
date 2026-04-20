<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 py-12">
    <!-- Header -->
    <div class="mx-auto max-w-4xl w-full px-4 sm:px-6 lg:px-8 mb-8" data-aos="fade-down">
        <a href="<?= base_url('halaman-dinamis') ?>" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 font-medium mb-4 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Kembali ke Manajemen Konten
        </a>
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center text-white shadow-lg">
                <i data-lucide="pencil" class="w-6 h-6"></i>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Edit Konten</h1>
                <p class="text-gray-500 mt-1">Perbarui data konten halaman website</p>
            </div>
        </div>
    </div>

    <!-- Form Container -->
    <div class="mx-auto max-w-4xl w-full px-4 sm:px-6 lg:px-8" data-aos="fade-up" data-aos-delay="100">
        <form action="<?= base_url('halaman-dinamis/update/' . $konten['id']) ?>" method="POST" class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <?= csrf_field() ?>
            
            <div class="p-8 space-y-8">
                <!-- Dropdown Halaman -->
                <div>
                    <label for="halaman" class="block text-sm font-bold text-gray-700 mb-2">Halaman <span class="text-red-500">*</span></label>
                    <select name="halaman" id="halaman" required
                            class="w-full px-4 py-3 rounded-xl border <?= $validation->hasError('halaman') ? 'border-red-500 focus:ring-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' ?> bg-gray-50 focus:bg-white transition-colors duration-300">
                        <option value="">Pilih Halaman...</option>
                        <option value="beranda" <?= (old('halaman') ?? $konten['halaman']) == 'beranda' ? 'selected' : '' ?>>Beranda</option>
                        <option value="tentang" <?= (old('halaman') ?? $konten['halaman']) == 'tentang' ? 'selected' : '' ?>>Tentang Kami</option>
                        <option value="program" <?= (old('halaman') ?? $konten['halaman']) == 'program' ? 'selected' : '' ?>>Program</option>
                    </select>
                    <?php if ($validation->hasError('halaman')): ?>
                        <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-4 h-4"></i>
                            <?= $validation->getError('halaman') ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Kategori / Bagian -->
                <div>
                    <label for="kategori" class="block text-sm font-bold text-gray-700 mb-2">Kategori / Bagian <span class="text-red-500">*</span></label>
                    <input type="text" name="kategori" id="kategori" value="<?= old('kategori') ?? esc($konten['kategori']) ?>" required placeholder="Contoh: hero_title, fasilitas, sambutan..."
                           class="w-full px-4 py-3 rounded-xl border <?= $validation->hasError('kategori') ? 'border-red-500 focus:ring-red-500' : 'border-gray-200 focus:border-indigo-500 focus:ring-indigo-500' ?> bg-gray-50 focus:bg-white transition-colors duration-300 relative z-10">
                    <p class="mt-2 text-xs text-gray-500">Penanda untuk bagian mana isi ini akan dipanggil.</p>
                </div>

                <!-- Judul -->
                <div>
                    <label for="judul" class="block text-sm font-bold text-gray-700 mb-2">Judul Item</label>
                    <input type="text" name="judul" id="judul" value="<?= old('judul') ?? esc($konten['judul']) ?>" placeholder="Judul blok konten"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white transition-colors duration-300 relative z-10">
                </div>

                <!-- Gambar Icon (Optional) -->
                <div>
                    <label for="gambar_icon" class="block text-sm font-bold text-gray-700 mb-2">Gambar / Lucide Icon (Opsional)</label>
                    <input type="text" name="gambar_icon" id="gambar_icon" value="<?= old('gambar_icon') ?? esc($konten['gambar_icon']) ?>" placeholder="Contoh icon: book-open, URL Gambar"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50 focus:bg-white transition-colors duration-300 relative z-10">
                </div>

                <!-- Rich Text Editor - Summernote -->
                <div>
                    <label for="konten" class="block text-sm font-bold text-gray-700 mb-2">Isi Konten <span class="text-red-500">*</span></label>
                    <div class="relative z-0">
                        <textarea name="konten" id="summernote" required><?= old('konten') ?? $konten['konten'] ?></textarea>
                    </div>
                </div>

            </div>

            <!-- Footer Action -->
            <div class="bg-gray-50 px-8 py-5 border-t border-gray-200 flex justify-end gap-3 rounded-b-3xl">
                <a href="<?= base_url('halaman-dinamis') ?>" class="px-6 py-2.5 rounded-xl font-semibold text-gray-700 hover:bg-gray-200 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-8 py-2.5 rounded-xl font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all flex items-center gap-2">
                    <i data-lucide="save" class="w-5 h-5"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Ketik isi konten di sini...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>

<?= $this->endSection() ?>
