<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div>
    <!-- Hero Section -->
    <section class="relative pt-24 pb-16 lg:pt-32 lg:pb-24 flex items-center justify-center bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 overflow-hidden text-center">
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>
        
        <div class="relative z-10 text-white px-4 max-w-4xl mx-auto" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-4xl md:text-6xl mb-6 font-bold tracking-tight">Masuk</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Silakan masuk untuk mengelola data
            </p>
        </div>
    </section>

    <!-- Login Form -->
    <section class="py-16 bg-slate-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/40 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-indigo-100/40 rounded-full blur-3xl translate-y-1/3 -translate-x-1/4"></div>

        <div class="mx-auto max-w-md px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- Error Message -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="rounded-2xl px-6 py-4 flex items-center gap-4 shadow-lg bg-red-50 border border-red-200 text-red-800 mb-6" data-aos="fade-down" id="error-alert">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center bg-red-100">
                        <i data-lucide="alert-circle" class="w-5 h-5"></i>
                    </div>
                    <p class="font-medium"><?= session()->getFlashdata('error') ?></p>
                    <button onclick="document.getElementById('error-alert').style.display='none'" class="ml-auto hover:opacity-70 transition-opacity">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>
            <?php endif; ?>

            <!-- Login Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden" data-aos="fade-up">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-slate-800 to-slate-900 px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <i data-lucide="lock-keyhole" class="w-7 h-7 text-white"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Login</h2>
                            <p class="text-slate-300 text-sm">Masukkan kredensial Anda</p>
                        </div>
                    </div>
                </div>

                <form action="<?= base_url('auth/authenticate') ?>" method="post" class="p-8">
                    <?= csrf_field() ?>

                    <!-- Username -->
                    <div class="mb-6">
                        <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="user" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input type="text" name="username" id="username" value="<?= old('username') ?>" 
                                   class="w-full pl-12 pr-4 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none"
                                   placeholder="Masukkan username" required autofocus>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-8">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i data-lucide="key-round" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input type="password" name="password" id="password" 
                                   class="w-full pl-12 pr-12 py-3 bg-slate-50 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all duration-300 outline-none"
                                   placeholder="Masukkan password" required>
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                                <i data-lucide="eye" class="w-5 h-5" id="eye-icon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" 
                            class="w-full py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition-all duration-300 inline-flex items-center justify-center gap-2 hover:shadow-lg hover:-translate-y-0.5">
                        <i data-lucide="log-in" class="w-5 h-5"></i>
                        Masuk
                    </button>
                </form>
            </div>

            <!-- Back to Home -->
            <div class="text-center mt-6" data-aos="fade-up" data-aos-delay="200">
                <a href="<?= base_url('/') ?>" class="text-gray-500 hover:text-blue-600 text-sm font-medium inline-flex items-center gap-1 transition-colors duration-300">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('eye-icon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.setAttribute('data-lucide', 'eye-off');
        } else {
            input.type = 'password';
            icon.setAttribute('data-lucide', 'eye');
        }
        lucide.createIcons();
    }
</script>

<?= $this->endSection() ?>
