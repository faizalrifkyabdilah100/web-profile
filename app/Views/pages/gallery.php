<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
$categories = [
    ['id' => 'all', 'name' => 'Semua'],
    ['id' => 'academic', 'name' => 'Akademik'],
    ['id' => 'extracurricular', 'name' => 'Ekstrakurikuler'],
    ['id' => 'facilities', 'name' => 'Fasilitas'],
    ['id' => 'events', 'name' => 'Kegiatan'],
];

$galleryItems = [
    [
        'id' => 1,
        'category' => 'academic',
        'title' => 'Pembelajaran di Kelas',
        'image' => 'https://images.unsplash.com/photo-1589104760192-ccab0ce0d90f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxpbmRvbmVzaWFuJTIwc3R1ZGVudHMlMjBjbGFzc3Jvb20lMjBsZWFybmluZ3xlbnwxfHx8fDE3NzQ5Mzg4ODB8MA&ixlib=rb-4.1.0&q=80&w=1080',
    ],
    [
        'id' => 2,
        'category' => 'facilities',
        'title' => 'Gedung Sekolah',
        'image' => 'https://images.unsplash.com/photo-1762088776943-28a9fbadcec4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzY2hvb2wlMjBidWlsZGluZyUyMG1vZGVybiUyMGV4dGVyaW9yfGVufDF8fHx8MTc3NDkzODg4MHww&ixlib=rb-4.1.0&q=80&w=1080',
    ],
    [
        'id' => 3,
        'category' => 'academic',
        'title' => 'Laboratorium IPA',
        'image' => 'https://images.unsplash.com/photo-1605781645799-c9c7d820b4ac?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHVkZW50cyUyMHNjaWVuY2UlMjBsYWJvcmF0b3J5fGVufDF8fHx8MTc3NDkzODg4MXww&ixlib=rb-4.1.0&q=80&w=1080',
    ],
    [
        'id' => 4,
        'category' => 'facilities',
        'title' => 'Perpustakaan',
        'image' => 'https://images.unsplash.com/photo-1632217138608-66217da0142f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzY2hvb2wlMjBsaWJyYXJ5JTIwYm9va3N8ZW58MXx8fHwxNzc0OTE1ODY5fDA&ixlib=rb-4.1.0&q=80&w=1080',
    ],
    [
        'id' => 5,
        'category' => 'extracurricular',
        'title' => 'Kegiatan Olahraga',
        'image' => 'https://images.unsplash.com/photo-1760259904989-3c9b99ad49d8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHVkZW50cyUyMHNwb3J0cyUyMGZpZWxkfGVufDF8fHx8MTc3NDg2MjI1NXww&ixlib=rb-4.1.0&q=80&w=1080',
    ],
    [
        'id' => 6,
        'category' => 'academic',
        'title' => 'Laboratorium Komputer',
        'image' => 'https://images.unsplash.com/photo-1771408427146-09be9a1d4535?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzdHVkZW50cyUyMGNvbXB1dGVyJTIwY2xhc3N8ZW58MXx8fHwxNzc0OTM4ODgyfDA&ixlib=rb-4.1.0&q=80&w=1080',
    ],
];
?>

<div>
    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 lg:pt-32 lg:pb-24 flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden text-center">
        <!-- Abstract glowing orbs -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>
        
        <div class="relative z-10 text-white px-4 max-w-4xl mx-auto" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-4xl md:text-6xl mb-6 font-bold tracking-tight">Galeri</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Dokumentasi kegiatan dan fasilitas SMP Nusantara Jaya
            </p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-24 bg-white relative">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <!-- Category Filter -->
            <div class="flex flex-wrap justify-center gap-4 mb-16" id="filter-container" data-aos="fade-up">
                <?php foreach ($categories as $category): ?>
                    <button type="button" data-filter="<?= $category['id'] ?>"
                            class="filter-btn px-8 py-3 rounded-full font-medium transition-all duration-300 shadow-sm hover:shadow-md <?= $category['id'] === 'all' ? 'bg-blue-600 text-white hover:bg-blue-700 hover:-translate-y-1' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 hover:-translate-y-1' ?>">
                        <?= $category['name'] ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="gallery-grid">
                <?php foreach ($galleryItems as $index => $item): ?>
                    <div class="gallery-item group relative aspect-[4/3] overflow-hidden rounded-2xl shadow-lg cursor-pointer block hover:shadow-2xl transition-all duration-500"
                         data-category="<?= $item['category'] ?>"
                         data-aos="zoom-in" data-aos-delay="<?= ($index % 3) * 150 ?>"
                         onclick="openModal('<?= $item['image'] ?>')">
                        <img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                             onerror="this.src='/fallback.jpg'">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                <span class="px-3 py-1 bg-blue-600/80 text-white text-xs font-bold rounded-full uppercase tracking-wider mb-3 inline-block">
                                    <?php 
                                        $catName = '';
                                        foreach($categories as $cat) {
                                            if($cat['id'] == $item['category']) {
                                                $catName = $cat['name'];
                                                break;
                                            }
                                        }
                                        echo $catName;
                                    ?>
                                </span>
                                <h3 class="text-white text-xl font-bold"><?= $item['title'] ?></h3>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4 w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 scale-50 group-hover:scale-100">
                            <i data-lucide="maximize-2" class="w-5 h-5 text-white"></i>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div id="no-items" class="text-center py-20 hidden">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i data-lucide="image-off" class="w-12 h-12 text-gray-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Tidak ada foto</h3>
                <p class="text-gray-500 text-lg">Tidak ada foto dalam kategori yang Anda pilih</p>
            </div>
        </div>
    </section>

    <!-- Modal for enlarged image -->
    <div id="imageModal" class="fixed inset-0 bg-black/95 z-[60] items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm" onclick="closeModal()">
        <button type="button" class="absolute top-6 right-6 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center text-white transition-colors duration-300 backdrop-blur-md" onclick="closeModal()">
            <i data-lucide="x" class="w-6 h-6"></i>
        </button>
        <img id="modalImage" src="" alt="Enlarged view" class="max-w-7xl max-h-[90vh] object-contain rounded-lg shadow-2xl transform scale-95 transition-transform duration-300" onclick="event.stopPropagation()">
    </div>

    <!-- Video Section (Optional) -->
    <section class="py-32 bg-slate-50 relative overflow-hidden text-slate-800 border-t border-slate-200">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/50 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-100/50 rounded-full blur-3xl opacity-50 translate-y-1/2 -translate-x-1/2"></div>
        
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Video Profil</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Lihat lebih dekat suasana dan kegiatan di SMP Nusantara Jaya
                </p>
            </div>

            <div class="max-w-4xl mx-auto" data-aos="zoom-in" data-aos-delay="200">
                <div class="aspect-video bg-gray-900 rounded-2xl flex items-center justify-center relative shadow-2xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1589104760192-ccab0ce0d90f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxpbmRvbmVzaWFuJTIwc3R1ZGVudHMlMjBjbGFzc3Jvb20lMjBsZWFybmluZ3xlbnwxfHx8fDE3NzQ5Mzg4ODB8MA&ixlib=rb-4.1.0&q=80&w=1080" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-105 transition-transform duration-700" alt="Video Thumbnail">
                    <div class="absolute inset-0 bg-blue-900/30 group-hover:bg-blue-900/10 transition-colors duration-300"></div>
                    <button class="w-20 h-20 bg-blue-600 text-white rounded-full flex items-center justify-center relative z-10 hover:scale-110 transition-transform duration-300 shadow-xl pl-2 group">
                        <i data-lucide="play" class="w-8 h-8 group-hover:text-blue-200"></i>
                    </button>
                    <div class="absolute bottom-6 left-6 right-6 text-center z-10 text-white opacity-80 group-hover:opacity-100 transition-opacity">
                        <p class="text-sm font-medium">Video profil sekolah akan segera hadir</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    // Gallery Filter Logic
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const noItems = document.getElementById('no-items');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active state on buttons
            filterBtns.forEach(b => {
                b.classList.remove('bg-blue-600', 'text-white', 'hover:bg-blue-700');
                b.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
            });
            btn.classList.add('bg-blue-600', 'text-white', 'hover:bg-blue-700');
            btn.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');

            // Filter items
            const filter = btn.getAttribute('data-filter');
            let count = 0;

            galleryItems.forEach(item => {
                // Hapus data-aos dari elemen agar tidak konflik ngulang animasi terus kalau disembunyikan/dimunculkan
                item.removeAttribute('data-aos');
                
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.classList.remove('hidden');
                    // Tambahkan animasi manual untuk transisi smooth saat filter
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.9)';
                    setTimeout(() => {
                        item.classList.add('block');
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                    count++;
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.9)';
                    setTimeout(() => {
                        item.classList.add('hidden');
                        item.classList.remove('block');
                    }, 300);
                }
            });

            setTimeout(() => {
                if (count === 0) {
                    noItems.classList.remove('hidden');
                } else {
                    noItems.classList.add('hidden');
                }
            }, 300);
        });
    });

    // Modal Logic
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');

    function openModal(src) {
        modalImg.src = src;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        // Animate in
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalImg.classList.remove('scale-95');
            modalImg.classList.add('scale-100');
        }, 10);
        document.body.style.overflow = 'hidden'; // Prevent scrolling background
    }

    function closeModal() {
        // Animate out
        modal.classList.add('opacity-0');
        modalImg.classList.remove('scale-100');
        modalImg.classList.add('scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = ''; // Restore scrolling
        }, 300);
    }

    // Escape key to close modal
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
</script>

<?= $this->endSection() ?>
