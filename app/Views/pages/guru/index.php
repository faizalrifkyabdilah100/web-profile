<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div>
    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 lg:pt-32 lg:pb-24 flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden text-center">
        <!-- Abstract glowing orbs -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>
        
        <div class="relative z-10 text-white px-4 max-w-4xl mx-auto" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-4xl md:text-6xl mb-6 font-bold tracking-tight">Data Guru & Tenaga Pendidik</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Daftar guru dan tenaga pendidik SMP Negeri 2 Margoyoso yang berdedikasi dalam mencerdaskan anak bangsa
            </p>
        </div>
    </section>

    <!-- Flash Message -->
    <?php if (!empty($flash)): ?>
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 mt-8" data-aos="fade-down">
            <div class="rounded-2xl px-6 py-4 flex items-center gap-4 shadow-lg <?= $flash['type'] === 'success' ? 'bg-emerald-50 border border-emerald-200 text-emerald-800' : 'bg-red-50 border border-red-200 text-red-800' ?>" id="flash-alert">
                <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center <?= $flash['type'] === 'success' ? 'bg-emerald-100' : 'bg-red-100' ?>">
                    <i data-lucide="<?= $flash['type'] === 'success' ? 'check-circle' : 'alert-circle' ?>" class="w-5 h-5"></i>
                </div>
                <p class="font-medium"><?= $flash['message'] ?></p>
                <button onclick="document.getElementById('flash-alert').style.display='none'" class="ml-auto hover:opacity-70 transition-opacity">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Data Table Section -->
    <section class="py-16 bg-white relative">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            
            <!-- Header + Add Button -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10" data-aos="fade-up">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Daftar Guru</h2>
                    <div class="w-16 h-1 bg-blue-600 rounded-full mb-3"></div>
                    <p class="text-gray-500">Total <span class="font-bold text-blue-600"><?= count($guru) ?></span> guru & tenaga pendidik terdaftar</p>
                </div>
                <a href="<?= base_url('guru/create') ?>" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 inline-flex items-center gap-2 hover:shadow-xl hover:-translate-y-0.5 group">
                    <i data-lucide="user-plus" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                    Tambah Guru
                </a>
            </div>

            <?php if (empty($guru)): ?>
                <!-- Empty State -->
                <div class="text-center py-24 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200" data-aos="fade-up">
                    <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="users" class="w-12 h-12 text-blue-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Data Guru</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">Data guru masih kosong. Mulai tambahkan data guru untuk menampilkan daftar di sini.</p>
                    <a href="<?= base_url('guru/create') ?>" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 inline-flex items-center gap-2 hover:shadow-lg">
                        <i data-lucide="plus" class="w-5 h-5"></i>
                        Tambah Data Pertama
                    </a>
                </div>
            <?php else: ?>
                <!-- Desktop Table -->
                <div class="hidden lg:block" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full" id="guru-table">
                                <thead>
                                    <tr class="bg-gradient-to-r from-slate-800 to-slate-900 text-white">
                                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider w-12">No</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Foto</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Nama</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">NIP</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">L/P</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Jabatan</th>
                                        <th class="px-6 py-4 text-left text-sm font-semibold uppercase tracking-wider">Mata Pelajaran</th>
                                        <th class="px-6 py-4 text-center text-sm font-semibold uppercase tracking-wider w-36">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php foreach ($guru as $index => $g): ?>
                                        <tr class="hover:bg-blue-50/50 transition-colors duration-200 group">
                                            <td class="px-6 py-4">
                                                <span class="text-sm font-bold text-gray-400"><?= $index + 1 ?></span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?php if ($g['foto'] && file_exists('uploads/guru/' . $g['foto'])): ?>
                                                    <img src="<?= base_url('uploads/guru/' . $g['foto']) ?>" 
                                                         alt="<?= esc($g['nama']) ?>" 
                                                         class="w-12 h-12 rounded-xl object-cover shadow-sm border-2 border-white group-hover:scale-110 transition-transform duration-300">
                                                <?php else: ?>
                                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center shadow-sm border-2 border-white">
                                                        <i data-lucide="user" class="w-6 h-6 text-blue-400"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="font-semibold text-gray-900"><?= esc($g['nama']) ?></span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="text-sm text-gray-600 font-mono"><?= esc($g['nip'] ?: '-') ?></span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold <?= $g['jenis_kelamin'] === 'L' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700' ?>">
                                                    <?= $g['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700"><?= esc($g['jabatan'] ?: '-') ?></td>
                                            <td class="px-6 py-4 text-sm text-gray-700"><?= esc($g['mata_pelajaran'] ?: '-') ?></td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center justify-center gap-2">
                                                    <a href="<?= base_url('guru/edit/' . $g['id']) ?>" 
                                                       class="w-9 h-9 rounded-lg bg-amber-50 hover:bg-amber-500 text-amber-600 hover:text-white flex items-center justify-center transition-all duration-300 hover:shadow-md hover:scale-110"
                                                       title="Edit">
                                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                                    </a>
                                                    <button onclick="confirmDelete(<?= $g['id'] ?>, '<?= esc($g['nama']) ?>')" 
                                                            class="w-9 h-9 rounded-lg bg-red-50 hover:bg-red-500 text-red-600 hover:text-white flex items-center justify-center transition-all duration-300 hover:shadow-md hover:scale-110"
                                                            title="Hapus">
                                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Mobile Cards -->
                <div class="lg:hidden grid grid-cols-1 sm:grid-cols-2 gap-4" data-aos="fade-up" data-aos-delay="100">
                    <?php foreach ($guru as $index => $g): ?>
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-start gap-4 mb-4">
                                <?php if ($g['foto'] && file_exists('uploads/guru/' . $g['foto'])): ?>
                                    <img src="<?= base_url('uploads/guru/' . $g['foto']) ?>" 
                                         alt="<?= esc($g['nama']) ?>" 
                                         class="w-16 h-16 rounded-xl object-cover shadow-md border-2 border-white">
                                <?php else: ?>
                                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center shadow-md border-2 border-white flex-shrink-0">
                                        <i data-lucide="user" class="w-8 h-8 text-blue-400"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-bold text-gray-900 text-lg truncate"><?= esc($g['nama']) ?></h3>
                                    <p class="text-sm text-gray-500 font-mono"><?= esc($g['nip'] ?: 'NIP belum diisi') ?></p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold mt-1 <?= $g['jenis_kelamin'] === 'L' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700' ?>">
                                        <?= $g['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?>
                                    </span>
                                </div>
                            </div>
                            <div class="space-y-2 mb-4 text-sm">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <i data-lucide="briefcase" class="w-4 h-4 text-gray-400"></i>
                                    <span><?= esc($g['jabatan'] ?: '-') ?></span>
                                </div>
                                <div class="flex items-center gap-2 text-gray-600">
                                    <i data-lucide="book-open" class="w-4 h-4 text-gray-400"></i>
                                    <span><?= esc($g['mata_pelajaran'] ?: '-') ?></span>
                                </div>
                            </div>
                            <div class="flex gap-2 pt-3 border-t border-gray-100">
                                <a href="<?= base_url('guru/edit/' . $g['id']) ?>" 
                                   class="flex-1 py-2 rounded-lg bg-amber-50 hover:bg-amber-500 text-amber-600 hover:text-white text-center text-sm font-semibold transition-all duration-300 inline-flex items-center justify-center gap-1">
                                    <i data-lucide="pencil" class="w-4 h-4"></i> Edit
                                </a>
                                <button onclick="confirmDelete(<?= $g['id'] ?>, '<?= esc($g['nama']) ?>')" 
                                        class="flex-1 py-2 rounded-lg bg-red-50 hover:bg-red-500 text-red-600 hover:text-white text-center text-sm font-semibold transition-all duration-300 inline-flex items-center justify-center gap-1">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i> Hapus
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<!-- Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 z-[100] hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeDeleteModal()"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8 relative z-10 transform scale-95 opacity-0 transition-all duration-300" id="delete-modal-content">
            <div class="text-center">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i data-lucide="alert-triangle" class="w-10 h-10 text-red-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Hapus Data Guru?</h3>
                <p class="text-gray-500 mb-8">Apakah Anda yakin ingin menghapus data <strong id="delete-name" class="text-gray-900"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
                <div class="flex gap-3">
                    <button onclick="closeDeleteModal()" 
                            class="flex-1 py-3 rounded-xl bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-colors duration-300">
                        Batal
                    </button>
                    <a id="delete-link" href="#" 
                       class="flex-1 py-3 rounded-xl bg-red-600 text-white font-semibold hover:bg-red-700 transition-colors duration-300 inline-flex items-center justify-center gap-2">
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                        Ya, Hapus
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, name) {
        const modal = document.getElementById('delete-modal');
        const content = document.getElementById('delete-modal-content');
        document.getElementById('delete-name').textContent = name;
        document.getElementById('delete-link').href = '<?= base_url('guru/delete/') ?>' + id;
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
        
        // Re-render lucide icons in modal
        lucide.createIcons();
    }

    function closeDeleteModal() {
        const modal = document.getElementById('delete-modal');
        const content = document.getElementById('delete-modal-content');
        
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Auto-hide flash message after 5 seconds
    const flashAlert = document.getElementById('flash-alert');
    if (flashAlert) {
        setTimeout(() => {
            flashAlert.style.transition = 'all 0.5s ease-out';
            flashAlert.style.opacity = '0';
            flashAlert.style.transform = 'translateY(-20px)';
            setTimeout(() => flashAlert.remove(), 500);
        }, 5000);
    }
</script>

<?= $this->endSection() ?>
