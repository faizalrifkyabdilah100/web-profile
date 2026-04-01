<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP Nusantara Jaya</title>
    <!-- Tailwind CSS (via CDN for development mirroring React setup) -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!-- Custom Theme CSS -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap'); body { font-family: 'Inter', sans-serif; overflow-x: hidden; }</style>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <!-- AOS CSS for Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-background text-foreground min-h-screen flex flex-col">

<?php
$uri = service('uri')->getPath();
$navigation = [
    ['name' => 'Beranda', 'href' => base_url('/')],
    ['name' => 'Tentang', 'href' => base_url('tentang')],
    ['name' => 'Program', 'href' => base_url('program')],
    ['name' => 'Galeri', 'href' => base_url('galeri')],
    ['name' => 'Kontak', 'href' => base_url('kontak')],
];

// Helper to determine active state
function isActivePath($href, $currentUri) {
    $path = parse_url($href, PHP_URL_PATH);
    $path = trim($path, '/');
    $currentUri = trim($currentUri, '/');
    return $path === $currentUri;
}
?>

    <!-- Header -->
    <header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50 transition-all duration-300">
        <nav class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between items-center">
                <!-- Logo -->
                <a href="<?= base_url('/') ?>" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center group-hover:bg-blue-700 transition-colors duration-300">
                        <i data-lucide="graduation-cap" class="w-6 h-6 text-white transform group-hover:scale-110 transition-transform duration-300"></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">SMP Nusantara</span>
                        <span class="text-xs text-gray-600">Jaya</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex gap-8">
                    <?php foreach ($navigation as $item): ?>
                        <a href="<?= $item['href'] ?>"
                           class="px-3 py-2 rounded-md transition-all duration-300 hover:scale-105 <?= isActivePath($item['href'], $uri) ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' ?>">
                            <?= $item['name'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- Mobile menu button -->
                <button type="button" id="mobile-menu-btn" class="md:hidden p-2 text-gray-700 hover:text-blue-600 transition-colors duration-300">
                    <i data-lucide="menu" class="w-6 h-6 transform transition-transform duration-300 active:scale-95" id="menu-icon"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden py-4 border-t transition-all duration-300 ease-in-out opacity-0 translate-y-[-10px]">
                <?php foreach ($navigation as $item): ?>
                    <a href="<?= $item['href'] ?>" class="block px-3 py-2 rounded-md mb-1 transition-colors duration-300 <?= isActivePath($item['href'], $uri) ? 'text-blue-600 bg-blue-50 font-medium' : 'text-gray-700 hover:bg-gray-50' ?>">
                        <?= $item['name'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-1 overflow-hidden">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-950 text-slate-300 border-t border-slate-800 relative overflow-hidden">
        <!-- Ambient background glows -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-indigo-600/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
        
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 py-16 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <!-- Brand & Desc -->
                <div class="lg:col-span-1" data-aos="fade-up" data-aos-duration="800">
                    <div class="flex items-center gap-3 mb-6 group cursor-pointer">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center group-hover:rotate-12 group-hover:scale-110 transition-all duration-300 shadow-lg shadow-blue-500/20">
                            <i data-lucide="graduation-cap" class="w-6 h-6 text-white"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-xl text-white group-hover:text-blue-400 transition-colors duration-300 tracking-tight">SMP Nusantara</span>
                            <span class="text-xs text-blue-400 font-medium tracking-widest uppercase">Jaya</span>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">
                        Membentuk generasi cerdas, berkarakter, dan berprestasi untuk masa depan Indonesia yang gemilang melalui pendidikan berkualitas internasional.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition-all duration-300 hover:scale-110">
                            <i data-lucide="facebook" class="w-4 h-4"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-pink-600 hover:border-pink-600 transition-all duration-300 hover:scale-110">
                            <i data-lucide="instagram" class="w-4 h-4"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center text-slate-400 hover:text-white hover:bg-red-600 hover:border-red-600 transition-all duration-300 hover:scale-110">
                            <i data-lucide="youtube" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h3 class="font-bold text-white mb-6 text-lg">Navigasi</h3>
                    <ul class="space-y-4">
                        <?php foreach ($navigation as $item): ?>
                            <li>
                                <a href="<?= $item['href'] ?>" class="text-slate-400 hover:text-blue-400 flex items-center gap-2 transition-all duration-300 group">
                                    <div class="w-1 h-1 rounded-full bg-blue-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    <span class="transform group-hover:translate-x-2 transition-transform duration-300"><?= $item['name'] ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h3 class="font-bold text-white mb-6 text-lg">Hubungi Kami</h3>
                    <ul class="space-y-5 text-slate-400">
                        <li class="flex items-start gap-4 hover:text-white transition-colors duration-300 group">
                            <div class="mt-1 w-8 h-8 rounded-full bg-slate-900 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-600/20 group-hover:text-blue-500 transition-colors">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                            </div>
                            <span class="text-sm leading-relaxed">Jl. Pendidikan No. 123<br>Jakarta Selatan, 12345</span>
                        </li>
                        <li class="flex items-center gap-4 hover:text-white transition-colors duration-300 group">
                            <div class="w-8 h-8 rounded-full bg-slate-900 flex items-center justify-center flex-shrink-0 group-hover:bg-green-600/20 group-hover:text-green-500 transition-colors">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </div>
                            <a href="tel:02112345678" class="text-sm">(021) 1234-5678</a>
                        </li>
                        <li class="flex items-center gap-4 hover:text-white transition-colors duration-300 group">
                            <div class="w-8 h-8 rounded-full bg-slate-900 flex items-center justify-center flex-shrink-0 group-hover:bg-red-600/20 group-hover:text-red-500 transition-colors">
                                <i data-lucide="mail" class="w-4 h-4"></i>
                            </div>
                            <a href="mailto:info@smpnusantarajaya.sch.id" class="text-sm break-all">info@smpnusantarajaya.sch.id</a>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                    <h3 class="font-bold text-white mb-6 text-lg">Buletin Sekolah</h3>
                    <p class="text-slate-400 text-sm mb-4 leading-relaxed">Dapatkan informasi terbaru seputar kegiatan dan prestasi sekolah langsung ke email Anda.</p>
                    <form class="flex flex-col gap-3" onsubmit="event.preventDefault();">
                        <input type="email" placeholder="Alamat Email Anda" class="w-full px-4 py-3 rounded-lg bg-slate-900 border border-slate-800 text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-300">
                        <button type="submit" class="w-full px-4 py-3 rounded-lg bg-blue-600 hover:bg-blue-500 text-white font-medium transition-colors duration-300 flex items-center justify-center gap-2">
                            <span>Berlangganan</span>
                            <i data-lucide="send" class="w-4 h-4"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-16 pt-8 border-t border-slate-800/60 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-sm">&copy; 2026 SMP Nusantara Jaya. All rights reserved.</p>
                <div class="flex gap-6 text-sm font-medium">
                    <a href="#" class="text-slate-500 hover:text-white transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="text-slate-500 hover:text-white transition-colors">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- AOS Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Init AOS
        AOS.init({
            once: true, // whether animation should happen only once - while scrolling down
            offset: 50, // offset (in px) from the original trigger point
            duration: 600, // values from 0 to 3000, with step 50ms
            easing: 'ease-out-cubic', // default easing for AOS animations
        });

        // Inisialisasi Lucide icons
        lucide.createIcons();

        // Mobile menu toggle dengan animasi
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');

        let isMenuOpen = false;

        btn.addEventListener('click', () => {
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                menu.classList.remove('hidden');
                // Allow display:block to apply before animating opacity/transform
                setTimeout(() => {
                    menu.classList.remove('opacity-0', 'translate-y-[-10px]');
                    menu.classList.add('opacity-100', 'translate-y-0');
                }, 10);
                icon.setAttribute('data-lucide', 'x');
            } else {
                menu.classList.remove('opacity-100', 'translate-y-0');
                menu.classList.add('opacity-0', 'translate-y-[-10px]');
                setTimeout(() => {
                    menu.classList.add('hidden');
                }, 300); // match transition duration
                icon.setAttribute('data-lucide', 'menu');
            }
            // Re-render the specific icon
            lucide.createIcons();
        });
    </script>
</body>
</html>
