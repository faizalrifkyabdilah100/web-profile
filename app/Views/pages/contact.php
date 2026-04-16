<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<?php
$contactInfo = [
    [
        'icon' => 'map-pin',
        'title' => 'Alamat',
        'content' => 'Jl. Tambak Buntu, Kec. Margoyoso, Kab. Pati, Prov. Jawa Tengah',
        'color' => 'bg-blue-100 text-blue-600',
    ],
    [
        'icon' => 'phone',
        'title' => 'Telepon',
        'content' => "Informasi lebih lanjut,\nsilakan datang ke sekolah",
        'color' => 'bg-green-100 text-green-600',
    ],
    [
        'icon' => 'mail',
        'title' => 'Email',
        'content' => 'smpn2margoyoso@gmail.com',
        'color' => 'bg-purple-100 text-purple-600',
    ],
    [
        'icon' => 'clock',
        'title' => 'Jam Operasional',
        'content' => "Senin - Jumat: 07.00 - 16.00 WIB\nSabtu: 07.00 - 12.00 WIB",
        'color' => 'bg-orange-100 text-orange-600',
    ],
];

$faqs = [
    [
        'question' => 'Kapan pendaftaran siswa baru dibuka?',
        'answer' => 'Pendaftaran siswa baru biasanya dibuka pada bulan Januari - Maret setiap tahunnya.',
    ],
    [
        'question' => 'Apa saja syarat pendaftaran?',
        'answer' => 'Fotokopi ijazah/SKHUN SD, Fotokopi Kartu Keluarga, Pas foto 3x4, dan formulir pendaftaran yang telah diisi.',
    ],
    [
        'question' => 'Apakah ada program beasiswa?',
        'answer' => 'Ya, kami menyediakan program beasiswa prestasi akademik dan non-akademik untuk siswa berprestasi.',
    ],
    [
        'question' => 'Berapa biaya pendidikan?',
        'answer' => 'Untuk informasi biaya pendidikan, silakan hubungi kantor administrasi atau datang langsung ke sekolah.',
    ],
];
?>

<div>
    <!-- Hero Section -->
    <section class="relative pt-24 pb-32 lg:pt-32 lg:pb-40 flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden text-center">
        <!-- Abstract glowing orbs -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>
        
        <div class="relative z-10 text-white px-4 max-w-4xl mx-auto" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-4xl md:text-6xl mb-6 font-bold tracking-tight">Hubungi Kami</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Silakan hubungi kami untuk informasi lebih lanjut
            </p>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="py-24 bg-white relative z-20 -mt-16">
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($contactInfo as $index => $info): ?>
                    <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 group" data-aos="fade-up" data-aos-delay="<?= $index * 150 ?>">
                        <div class="w-16 h-16 <?= $info['color'] ?> rounded-2xl flex items-center justify-center mb-6 rotate-3 group-hover:rotate-0 transition-transform duration-300 shadow-sm">
                            <i data-lucide="<?= $info['icon'] ?>" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900"><?= $info['title'] ?></h3>
                        <p class="text-gray-600 leading-relaxed whitespace-pre-line"><?= $info['content'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map -->
    <section class="py-32 bg-slate-50 relative overflow-hidden text-slate-800 border-t border-slate-200">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/50 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-indigo-100/50 rounded-full blur-3xl opacity-50 translate-y-1/2 -translate-x-1/2"></div>
        
        <div class="mx-auto max-w-[1400px] w-full px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Contact Form -->
                <div data-aos="fade-right">
                    <div class="mb-10">
                        <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Kirim Pesan</h2>
                        <div class="w-16 h-1 bg-blue-600 rounded-full"></div>
                    </div>
                    
                    <form id="contactForm" class="space-y-6 bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-300"
                                   placeholder="Masukkan nama lengkap">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-300"
                                       placeholder="email@contoh.com">
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nomor Telepon <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" id="phone" name="phone" required
                                       class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-300"
                                       placeholder="08xx-xxxx-xxxx">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                Subjek <span class="text-red-500">*</span>
                            </label>
                            <select id="subject" name="subject" required
                                    class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-300 appearance-none">
                                <option value="">Pilih subjek</option>
                                <option value="pendaftaran">Informasi Pendaftaran</option>
                                <option value="program">Informasi Program</option>
                                <option value="beasiswa">Informasi Beasiswa</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Pesan <span class="text-red-500">*</span>
                            </label>
                            <textarea id="message" name="message" required rows="6"
                                      class="w-full px-4 py-3 bg-gray-50 rounded-xl border border-gray-200 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-300 resize-none"
                                      placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>

                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2 hover:shadow-lg hover:-translate-y-1">
                            <i data-lucide="send" class="w-5 h-5"></i>
                            Kirim Pesan
                        </button>

                        <div id="successMessage" class="hidden bg-green-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-r-lg shadow-sm transform transition-all duration-300 opacity-0 translate-y-2">
                            <div class="flex items-center gap-3">
                                <i data-lucide="check-circle" class="w-6 h-6 text-green-500"></i>
                                <p class="font-medium">Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.</p>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Map Placeholder -->
                <div data-aos="fade-left">
                    <div class="mb-10">
                        <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Lokasi Kami</h2>
                        <div class="w-16 h-1 bg-blue-600 rounded-full"></div>
                    </div>
                    
                    <div class="bg-white rounded-2xl h-[600px] flex items-center justify-center border border-gray-100 shadow-lg relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gray-100">
                            <!-- In real app, replace with iframe Google Maps -->
                            <div class="w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-50 block"></div>
                        </div>
                        <div class="relative z-10 text-center p-10 bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl transform group-hover:scale-105 transition-transform duration-500 border border-white/50">
                            <div class="w-20 h-20 bg-blue-100 rounded-full mx-auto mb-6 flex justify-center items-center shadow-inner">
                                <i data-lucide="map-pin" class="w-10 h-10 text-blue-600"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">SMP Negeri 2 Margoyoso</h3>
                            <p class="text-gray-600 mb-6">Kecamatan Margoyoso, Kab. Pati</p>
                            <p class="text-gray-800 font-medium leading-relaxed">
                                Jl. Tambak Buntu<br />
                                Kec. Margoyoso, Kab. Pati<br />
                                Prov. Jawa Tengah
                            </p>
                            <a href="https://maps.google.com/?q=SMP+Negeri+2+Margoyoso" target="_blank" rel="noopener" class="mt-8 inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-800 transition-colors">
                                Buka di Google Maps
                                <i data-lucide="external-link" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-32 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-blue-50/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl mb-4 font-bold text-gray-900">Pertanyaan Umum</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 rounded-full"></div>
                <p class="text-gray-600 text-lg">
                    Temukan jawaban untuk pertanyaan yang sering diajukan
                </p>
            </div>

            <div class="space-y-6">
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="bg-white rounded-2xl p-8 shadow-md border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <h3 class="text-xl font-bold mb-4 text-gray-900 flex items-start gap-3">
                            <i data-lucide="help-circle" class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5 group-hover:scale-110 transition-transform"></i>
                            <?= $faq['question'] ?>
                        </h3>
                        <p class="text-gray-600 leading-relaxed pl-9"><?= $faq['answer'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-16 text-center" data-aos="zoom-in" data-aos-delay="400">
                <div class="inline-block p-8 bg-blue-50 rounded-3xl border border-blue-100">
                    <p class="text-gray-800 text-lg font-medium mb-4">Masih ada pertanyaan lain?</p>
                        <a href="mailto:smpn2margoyoso@gmail.com" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-bold transition-all duration-300 inline-flex items-center gap-2 hover:shadow-lg hover:-translate-y-1">
                        <i data-lucide="mail" class="w-5 h-5"></i>
                        Email: smpn2margoyoso@gmail.com
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const successMessage = document.getElementById('successMessage');
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;
        
        // Animasi loading state
        submitBtn.innerHTML = '<i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i> Mengirim...';
        submitBtn.disabled = true;
        lucide.createIcons();

        setTimeout(() => {
            // Restore button
            submitBtn.innerHTML = originalBtnText;
            submitBtn.disabled = false;
            lucide.createIcons();

            // Sembunyikan pesan sukses lama jika ada animasi
            successMessage.classList.remove('hidden');
            
            // Trigger flow animasi tailwind (opacity dan translate)
            setTimeout(() => {
                successMessage.classList.remove('opacity-0', 'translate-y-2');
                successMessage.classList.add('opacity-100', 'translate-y-0');
            }, 10);
            
            // Reset form
            this.reset();
            
            // Sembunyikan pesan setelah 4 detik
            setTimeout(() => {
                successMessage.classList.remove('opacity-100', 'translate-y-0');
                successMessage.classList.add('opacity-0', 'translate-y-2');
                setTimeout(() => {
                    successMessage.classList.add('hidden');
                }, 300);
            }, 4000);
        }, 800);
    });
</script>

<?= $this->endSection() ?>
