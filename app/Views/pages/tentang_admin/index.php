<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 py-12">
    <!-- Header -->
    <div class="mx-auto max-w-7xl w-full px-4 sm:px-6 lg:px-8 mb-10" data-aos="fade-down">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-600/30">
                    <i data-lucide="layout-dashboard" class="w-7 h-7"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Manajemen Halaman Tentang</h1>
                    <p class="text-gray-500 mt-1">Kelola Identitas, Profil, Visi, Misi, Tujuan, dan Nilai-nilai Sekolah</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Message -->
    <?php if (!empty($flash)): ?>
        <div class="mx-auto max-w-7xl w-full px-4 sm:px-6 lg:px-8 mb-8" data-aos="fade-down" data-aos-delay="100">
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

    <div class="mx-auto max-w-7xl w-full px-4 sm:px-6 lg:px-8" data-aos="fade-up" data-aos-delay="200">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            
            <!-- Profil & Visi Section (Form Langsung) -->
            <div class="p-8 border-b border-gray-100 bg-gradient-to-br from-white to-blue-50/50">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 bg-blue-100 text-blue-600 rounded-xl"><i data-lucide="book-open"></i></div>
                    <h2 class="text-2xl font-bold text-gray-900">1. Profil Singkat & Visi</h2>
                </div>
                
                <form action="<?= base_url('tentang-admin/update_utama') ?>" method="POST" class="space-y-6">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_profil" value="<?= $profil['id'] ?>">
                    <input type="hidden" name="id_visi" value="<?= $visi['id'] ?>">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Profil Singkat Sekolah</label>
                            <textarea name="profil_konten" rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-white" required><?= esc($profil['konten']) ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Visi Sekolah</label>
                            <textarea name="visi_konten" rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-white" required><?= esc($visi['konten']) ?></textarea>
                        </div>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2.5 rounded-xl font-semibold bg-blue-600 hover:bg-blue-700 text-white shadow-lg hover:-translate-y-0.5 transition-all flex items-center gap-2">
                            <i data-lucide="save" class="w-4 h-4"></i> Simpan Teks Utama
                        </button>
                    </div>
                </form>
            </div>

            <!-- List data section: Identitas, Misi, Tujuan, Nilai -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-gray-100">
                
                <!-- Identitas -->
                <div class="bg-white p-8">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-indigo-100 text-indigo-600 rounded-xl"><i data-lucide="info"></i></div>
                            <h2 class="text-xl font-bold text-gray-900">Identitas Sekolah</h2>
                        </div>
                        <a href="<?= base_url('tentang-admin/create-item/identitas') ?>" class="text-sm bg-indigo-50 text-indigo-700 hover:bg-indigo-600 hover:text-white px-3 py-1.5 rounded-lg font-semibold transition-colors flex items-center gap-1"><i data-lucide="plus" class="w-4 h-4"></i> Tambah</a>
                    </div>
                    <div class="space-y-3 max-h-80 overflow-y-auto pr-2 custom-scrollbar">
                        <?php if(empty($identitas)): ?>
                            <p class="text-center text-gray-400 text-sm py-4 border border-dashed rounded-xl">Belum ada data</p>
                        <?php else: ?>
                            <?php foreach($identitas as $item): ?>
                            <div class="flex justify-between p-3 border border-gray-100 rounded-xl hover:shadow-md transition-shadow group">
                                <div>
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest"><?= esc($item['judul']) ?></p>
                                    <p class="font-medium text-gray-800 text-sm mt-0.5"><?= esc($item['konten']) ?></p>
                                </div>
                                <div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="<?= base_url('tentang-admin/edit-item/'.$item['id']) ?>" class="p-1.5 text-amber-500 hover:bg-amber-50 rounded-md"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                                    <a href="<?= base_url('tentang-admin/delete-item/'.$item['id']) ?>" onclick="return confirm('Hapus?')" class="p-1.5 text-red-500 hover:bg-red-50 rounded-md"><i data-lucide="trash" class="w-4 h-4"></i></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Misi -->
                <div class="bg-white p-8">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-emerald-100 text-emerald-600 rounded-xl"><i data-lucide="target"></i></div>
                            <h2 class="text-xl font-bold text-gray-900">Misi Sekolah</h2>
                        </div>
                        <a href="<?= base_url('tentang-admin/create-item/misi') ?>" class="text-sm bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white px-3 py-1.5 rounded-lg font-semibold transition-colors flex items-center gap-1"><i data-lucide="plus" class="w-4 h-4"></i> Tambah</a>
                    </div>
                    <div class="space-y-3 max-h-80 overflow-y-auto pr-2 custom-scrollbar">
                        <?php if(empty($misi)): ?>
                            <p class="text-center text-gray-400 text-sm py-4 border border-dashed rounded-xl">Belum ada data</p>
                        <?php else: ?>
                            <?php foreach($misi as $i => $item): ?>
                            <div class="flex justify-between items-center p-3 border border-gray-100 rounded-xl hover:shadow-md transition-shadow group gap-3">
                                <div class="flex items-center gap-3 w-full">
                                    <div class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-xs font-bold shrink-0"><?= $i+1 ?></div>
                                    <p class="text-sm text-gray-700 leading-snug line-clamp-2" title="<?= esc($item['konten']) ?>"><?= strip_tags($item['konten']) ?></p>
                                </div>
                                <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity shrink-0">
                                    <a href="<?= base_url('tentang-admin/edit-item/'.$item['id']) ?>" class="p-1.5 text-amber-500 hover:bg-amber-50 rounded-md"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                                    <a href="<?= base_url('tentang-admin/delete-item/'.$item['id']) ?>" onclick="return confirm('Hapus?')" class="p-1.5 text-red-500 hover:bg-red-50 rounded-md"><i data-lucide="trash" class="w-4 h-4"></i></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Tujuan -->
                <div class="bg-white p-8">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-pink-100 text-pink-600 rounded-xl"><i data-lucide="flag"></i></div>
                            <h2 class="text-xl font-bold text-gray-900">Tujuan Sekolah</h2>
                        </div>
                        <a href="<?= base_url('tentang-admin/create-item/tujuan') ?>" class="text-sm bg-pink-50 text-pink-700 hover:bg-pink-600 hover:text-white px-3 py-1.5 rounded-lg font-semibold transition-colors flex items-center gap-1"><i data-lucide="plus" class="w-4 h-4"></i> Tambah</a>
                    </div>
                    <div class="space-y-3 max-h-80 overflow-y-auto pr-2 custom-scrollbar">
                        <?php if(empty($tujuan)): ?>
                            <p class="text-center text-gray-400 text-sm py-4 border border-dashed rounded-xl">Belum ada data</p>
                        <?php else: ?>
                            <?php foreach($tujuan as $i => $item): ?>
                            <div class="flex justify-between items-center p-3 border border-gray-100 rounded-xl hover:shadow-md transition-shadow group gap-3">
                                <div class="flex items-center gap-3 w-full">
                                    <div class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-xs font-bold shrink-0"><?= $i+1 ?></div>
                                    <p class="text-sm text-gray-700 leading-snug line-clamp-2" title="<?= esc($item['konten']) ?>"><?= strip_tags($item['konten']) ?></p>
                                </div>
                                <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity shrink-0">
                                    <a href="<?= base_url('tentang-admin/edit-item/'.$item['id']) ?>" class="p-1.5 text-amber-500 hover:bg-amber-50 rounded-md"><i data-lucide="pencil" class="w-4 h-4"></i></a>
                                    <a href="<?= base_url('tentang-admin/delete-item/'.$item['id']) ?>" onclick="return confirm('Hapus?')" class="p-1.5 text-red-500 hover:bg-red-50 rounded-md"><i data-lucide="trash" class="w-4 h-4"></i></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Nilai-Nilai -->
                <div class="bg-white p-8">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-amber-100 text-amber-600 rounded-xl"><i data-lucide="award"></i></div>
                            <h2 class="text-xl font-bold text-gray-900">Nilai-Nilai Kami</h2>
                        </div>
                        <a href="<?= base_url('tentang-admin/create-item/nilai') ?>" class="text-sm bg-amber-50 text-amber-700 hover:bg-amber-600 hover:text-white px-3 py-1.5 rounded-lg font-semibold transition-colors flex items-center gap-1"><i data-lucide="plus" class="w-4 h-4"></i> Tambah</a>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-80 overflow-y-auto pr-2 custom-scrollbar">
                        <?php if(empty($nilai)): ?>
                            <p class="text-center text-gray-400 text-sm py-4 border border-dashed rounded-xl col-span-2">Belum ada data</p>
                        <?php else: ?>
                            <?php foreach($nilai as $item): ?>
                            <div class="relative p-4 border border-gray-100 rounded-xl hover:shadow-md transition-shadow group flex flex-col gap-2">
                                <div class="flex gap-2">
                                    <?php if($item['gambar_icon']): ?>
                                    <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                                        <i data-lucide="<?= esc($item['gambar_icon']) ?>" class="w-4 h-4"></i>
                                    </div>
                                    <?php endif; ?>
                                    <div>
                                        <h4 class="font-bold text-gray-900 text-sm"><?= esc($item['judul']) ?></h4>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 leading-snug line-clamp-3"><?= strip_tags($item['konten']) ?></p>
                                
                                <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity bg-white/90 backdrop-blur-sm rounded-md shadow-sm border border-gray-100">
                                    <a href="<?= base_url('tentang-admin/edit-item/'.$item['id']) ?>" class="p-1 text-amber-500 hover:bg-amber-50 rounded-lg"><i data-lucide="pencil" class="w-3 h-3"></i></a>
                                    <a href="<?= base_url('tentang-admin/delete-item/'.$item['id']) ?>" onclick="return confirm('Hapus?')" class="p-1 text-red-500 hover:bg-red-50 rounded-lg"><i data-lucide="trash" class="w-3 h-3"></i></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<style>
/* Custom Scrollbar for list */
.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}
</style>

<script>
    const flashAlert = document.getElementById('flash-alert');
    if (flashAlert) {
        setTimeout(() => {
            flashAlert.style.transition = 'all 0.5s ease-out';
            flashAlert.style.opacity = '0';
            flashAlert.style.transform = 'translateY(-20px)';
            setTimeout(() => flashAlert.remove(), 500);
        }, 3000);
    }
</script>

<?= $this->endSection() ?>
