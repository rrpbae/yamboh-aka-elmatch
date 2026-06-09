<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElMatch - AI Job Matcher</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        primary: '#2563eb', // Blue 600
                        primaryHover: '#1d4ed8', // Blue 700
                        surface: '#f8fafc', // Slate 50
                        background: '#f1f5f9', // Slate 100
                        textMain: '#0f172a', // Slate 900
                        textMuted: '#475569', // Slate 600
                        borderMain: '#cbd5e1', // Slate 300
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #f1f5f9;
            color: #0f172a;
        }
        .glass-nav {
            background: rgba(248, 250, 252, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #cbd5e1;
        }
        .clean-card {
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 16px;
            transition: all 0.2s ease;
        }
        .clean-card:hover {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            transform: translateY(-2px);
        }
        .gradient-text {
            background: linear-gradient(to right, #2563eb, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-scroll {
            display: flex;
            width: max-content;
            animation: scroll 40s linear infinite;
        }
        .animate-scroll:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="antialiased selection:bg-primary selection:text-white">

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 w-full z-50 glass-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="font-extrabold text-3xl tracking-tighter textMain">ElMatch</span>
            </div>
            
            <div class="hidden md:flex items-center gap-8">
                <a href="#features" class="text-sm font-semibold text-textMuted hover:text-primary transition">Fitur</a>
                <a href="#how-it-works" class="text-sm font-semibold text-textMuted hover:text-primary transition">Cara Kerja</a>
                <a href="#testimonials" class="text-sm font-semibold text-textMuted hover:text-primary transition">Testimoni</a>
            </div>

            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm font-semibold textMain hover:text-primary transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold textMain hover:text-primary transition hidden sm:block">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-primary text-white text-sm font-semibold px-6 py-2.5 rounded-lg hover:bg-primaryHover transition-colors">
                                Mulai Sekarang
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="pt-32 pb-16 px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto flex flex-col items-center text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-100 text-sm font-semibold text-primary mb-8 mt-10">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>
            Rekrutmen Masa Depan Telah Hadir
        </div>

        <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold tracking-tight mb-6 textMain leading-tight">
            Hubungkan Potensi Anda dengan <span class="gradient-text">Pekerjaan Terbaik.</span>
        </h1>
        
        <p class="text-lg md:text-xl text-textMuted max-w-3xl mx-auto mb-10 leading-relaxed font-medium">
            Tinggalkan cara lama. Platform rekrutmen bertenaga AI kami akan membedah CV Anda dan memberikan rekomendasi lowongan pekerjaan yang paling relevan secara otomatis.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 w-full justify-center mb-16">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-8 py-4 bg-primary text-white rounded-lg font-semibold text-lg hover:bg-primaryHover transition-colors shadow-sm shadow-blue-200 flex items-center justify-center gap-2">
                    Buat Akun Gratis
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>
                </a>
                <a href="#how-it-works" class="px-8 py-4 bg-surface text-textMain border border-borderMain rounded-lg font-semibold text-lg hover:bg-background transition-colors flex items-center justify-center">
                    Lihat Cara Kerja
                </a>
            @endif
        </div>

        <!-- Trust Stats -->
        <div class="flex flex-wrap justify-center gap-8 md:gap-16 pt-8 border-t border-borderMain w-full max-w-4xl mx-auto opacity-80">
            <div class="text-center">
                <h4 class="text-3xl font-bold textMain mb-1">98%</h4>
                <p class="text-sm text-textMuted font-medium">Akurasi AI Match</p>
            </div>
            <div class="text-center">
                <h4 class="text-3xl font-bold textMain mb-1">< 5 Detik</h4>
                <p class="text-sm text-textMuted font-medium">Waktu Ekstraksi CV</p>
            </div>
            <div class="text-center">
                <h4 class="text-3xl font-bold textMain mb-1">100%</h4>
                <p class="text-sm text-textMuted font-medium">Gratis untuk Pelamar</p>
            </div>
        </div>
    </main>

    <!-- How It Works Section -->
    <section id="how-it-works" class="bg-surface py-20 border-y border-borderMain mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold textMain mb-4">Hanya Butuh 3 Langkah Mudah</h2>
                <p class="text-textMuted max-w-2xl mx-auto">Kami menyederhanakan proses pencarian kerja. Tidak perlu lagi mengisi formulir riwayat hidup yang panjang secara manual.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                <!-- Connecting Line (Desktop only) -->
                <div class="hidden md:block absolute top-12 left-[15%] right-[15%] h-0.5 bg-borderMain z-0"></div>

                <div class="relative z-10 flex flex-col items-center text-center">
                    <div class="w-24 h-24 rounded-full bg-blue-50 border-4 border-surface flex items-center justify-center text-primary text-3xl font-bold mb-6 shadow-sm">1</div>
                    <h3 class="text-xl font-bold textMain mb-3">Unggah CV PDF</h3>
                    <p class="text-textMuted">Cukup siapkan file CV terbaikmu dalam format PDF dan unggah ke dalam sistem ElMatch.</p>
                </div>

                <div class="relative z-10 flex flex-col items-center text-center mt-8 md:mt-0">
                    <div class="w-24 h-24 rounded-full bg-emerald-50 border-4 border-surface flex items-center justify-center text-emerald-600 text-3xl font-bold mb-6 shadow-sm">2</div>
                    <h3 class="text-xl font-bold textMain mb-3">AI Menganalisis</h3>
                    <p class="text-textMuted">Engine Xetel AI kami akan mengekstrak data keahlian dan pengalamanmu dalam hitungan detik.</p>
                </div>

                <div class="relative z-10 flex flex-col items-center text-center mt-8 md:mt-0">
                    <div class="w-24 h-24 rounded-full bg-amber-50 border-4 border-surface flex items-center justify-center text-amber-600 text-3xl font-bold mb-6 shadow-sm">3</div>
                    <h3 class="text-xl font-bold textMain mb-3">Dapatkan Pekerjaan</h3>
                    <p class="text-textMuted">Sistem langsung merekomendasikan lowongan dengan persentase kecocokan paling tinggi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold textMain mb-4">Fitur Lengkap untuk Karirmu</h2>
            <p class="text-textMuted max-w-2xl mx-auto">Dirancang untuk menghubungkan perusahaan pencari talenta dan profesional dengan sangat akurat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="clean-card p-8">
                <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-primary mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/><path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1m-4 11V2h3v2.5A1.5 1.5 0 0 0 10 6h2v7H4z"/></svg>
                </div>
                <h3 class="text-xl font-bold textMain mb-3">Smart Parsing</h3>
                <p class="text-textMuted leading-relaxed">Sistem membaca struktur CV secara otomatis, mendeteksi skill teknis, pengalaman, hingga ringkasan profil tanpa format khusus yang ribet.</p>
            </div>

            <div class="clean-card p-8">
                <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/></svg>
                </div>
                <h3 class="text-xl font-bold textMain mb-3">Match Score</h3>
                <p class="text-textMuted leading-relaxed">Algoritma menghitung persentase kecocokan Anda dengan spesifikasi kualifikasi lowongan. Semakin tinggi skor, semakin besar peluang diterima.</p>
            </div>

            <div class="clean-card p-8">
                <div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/><path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/></svg>
                </div>
                <h3 class="text-xl font-bold textMain mb-3">Portal HRD</h3>
                <p class="text-textMuted leading-relaxed">Bukan hanya untuk pelamar. Perusahaan dapat membuat profil, memasang lowongan, dan membiarkan AI mencarikan kandidat terbaik.</p>
            </div>
            
            <div class="clean-card p-8">
                <div class="w-12 h-12 rounded-lg bg-red-50 flex items-center justify-center text-red-600 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/></svg>
                </div>
                <h3 class="text-xl font-bold textMain mb-3">Privasi Terjamin</h3>
                <p class="text-textMuted leading-relaxed">Data riwayat hidup Anda tersimpan dengan aman dan hanya digunakan untuk keperluan analisis pencocokan karir pada platform kami.</p>
            </div>

            <div class="clean-card p-8 md:col-span-2 flex flex-col justify-center border border-blue-200 bg-blue-50/50">
                <h3 class="text-2xl font-bold textMain mb-3">Siap Menyederhanakan Pencarian Kerjamu?</h3>
                <p class="text-textMuted mb-6 max-w-lg">Bergabunglah dengan para profesional yang telah lebih dulu menghemat waktu mereka dengan bantuan asisten cerdas ElMatch.</p>
                <div>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex px-6 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primaryHover transition-colors items-center gap-2">
                        Daftar Sekarang Secara Gratis
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="bg-surface py-24 border-y border-borderMain">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold textMain mb-4">Apa Kata Mereka</h2>
                <p class="text-textMuted max-w-2xl mx-auto">Pengalaman nyata dari pengguna yang telah terbantu oleh ElMatch.</p>
            </div>

            <div class="relative overflow-hidden w-full mt-10">
                <!-- Gradient Edges for Smooth Fade -->
                <div class="absolute top-0 left-0 w-16 md:w-32 h-full bg-gradient-to-r from-surface to-transparent z-10 pointer-events-none"></div>
                <div class="absolute top-0 right-0 w-16 md:w-32 h-full bg-gradient-to-l from-surface to-transparent z-10 pointer-events-none"></div>
                
                <div class="animate-scroll gap-6 pb-4">
                    <!-- ORIGINAL 6 TESTIMONIALS -->
                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center font-bold text-primary text-xl">S</div>
                            <div>
                                <h4 class="font-bold textMain">Shinta N</h4>
                                <p class="text-sm text-textMuted">HR Specialist</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Sangat membantu sisi HRD. Daripada menyeleksi ratusan CV yang kadang tidak relevan, dashboard perusahaan ElMatch langsung mengurutkan kandidat dari persentase match tertinggi."</p>
                    </div>
                    
                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center font-bold text-emerald-600 text-xl">R</div>
                            <div>
                                <h4 class="font-bold textMain">Rajendra R</h4>
                                <p class="text-sm text-textMuted">Fresh Graduate IT</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Biasanya daftar kerja itu capek harus masukin riwayat pendidikan dan pengalaman satu-satu. Di sini tinggal modal PDF CV, langsung muncul kerjaan yang cocok. Sangat efisien!"</p>
                    </div>

                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center font-bold text-amber-600 text-xl">S</div>
                            <div>
                                <h4 class="font-bold textMain">Stefani P</h4>
                                <p class="text-sm text-textMuted">Marketing Manager</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Platform ini luar biasa. AI-nya benar-benar paham dengan skill spesifik di bidang pemasaran digital, sehingga rekomendasi posisi yang masuk sangat relevan."</p>
                    </div>

                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center font-bold text-purple-600 text-xl">Y</div>
                            <div>
                                <h4 class="font-bold textMain">Yazid N</h4>
                                <p class="text-sm text-textMuted">Backend Developer</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Tampilannya bersih banget, nggak sakit di mata. Lebih penting lagi, algoritmanya beneran mengenali stack teknologiku dari CV tanpa ada yang keliru."</p>
                    </div>

                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center font-bold text-red-600 text-xl">E</div>
                            <div>
                                <h4 class="font-bold textMain">Ermas M</h4>
                                <p class="text-sm text-textMuted">Startup Founder</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Sebagai perusahaan yang baru berkembang, mencari talenta yang tepat sangat krusial. ElMatch sangat memangkas waktu kami dalam menemukan kandidat unggulan."</p>
                    </div>

                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center font-bold text-teal-600 text-xl">R</div>
                            <div>
                                <h4 class="font-bold textMain">Rafael P</h4>
                                <p class="text-sm text-textMuted">Data Analyst</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Proses yang sangat seamless. Saya hanya upload CV satu kali, dan notifikasi pekerjaan yang masuk ke dashboard sangat akurat sesuai tools data yang saya kuasai."</p>
                    </div>

                    <!-- DUPLICATED 6 TESTIMONIALS (For Infinite Scroll) -->
                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center font-bold text-primary text-xl">S</div>
                            <div>
                                <h4 class="font-bold textMain">Shinta N</h4>
                                <p class="text-sm text-textMuted">HR Specialist</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Sangat membantu sisi HRD. Daripada menyeleksi ratusan CV yang kadang tidak relevan, dashboard perusahaan ElMatch langsung mengurutkan kandidat dari persentase match tertinggi."</p>
                    </div>
                    
                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center font-bold text-emerald-600 text-xl">R</div>
                            <div>
                                <h4 class="font-bold textMain">Rajendra R</h4>
                                <p class="text-sm text-textMuted">Fresh Graduate IT</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Biasanya daftar kerja itu capek harus masukin riwayat pendidikan dan pengalaman satu-satu. Di sini tinggal modal PDF CV, langsung muncul kerjaan yang cocok. Sangat efisien!"</p>
                    </div>

                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center font-bold text-amber-600 text-xl">S</div>
                            <div>
                                <h4 class="font-bold textMain">Stefani P</h4>
                                <p class="text-sm text-textMuted">Marketing Manager</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Platform ini luar biasa. AI-nya benar-benar paham dengan skill spesifik di bidang pemasaran digital, sehingga rekomendasi posisi yang masuk sangat relevan."</p>
                    </div>

                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center font-bold text-purple-600 text-xl">Y</div>
                            <div>
                                <h4 class="font-bold textMain">Yazid N</h4>
                                <p class="text-sm text-textMuted">Backend Developer</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Tampilannya bersih banget, nggak sakit di mata. Lebih penting lagi, algoritmanya beneran mengenali stack teknologiku dari CV tanpa ada yang keliru."</p>
                    </div>

                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center font-bold text-red-600 text-xl">E</div>
                            <div>
                                <h4 class="font-bold textMain">Ermas M</h4>
                                <p class="text-sm text-textMuted">Startup Founder</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Sebagai perusahaan yang baru berkembang, mencari talenta yang tepat sangat krusial. ElMatch sangat memangkas waktu kami dalam menemukan kandidat unggulan."</p>
                    </div>

                    <div class="clean-card p-8 w-[350px] shrink-0">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center font-bold text-teal-600 text-xl">R</div>
                            <div>
                                <h4 class="font-bold textMain">Rafael P</h4>
                                <p class="text-sm text-textMuted">Data Analyst</p>
                            </div>
                        </div>
                        <p class="text-textMuted leading-relaxed">"Proses yang sangat seamless. Saya hanya upload CV satu kali, dan notifikasi pekerjaan yang masuk ke dashboard sangat akurat sesuai tools data yang saya kuasai."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Banner -->
    <section class="max-w-5xl mx-auto px-4 py-24 text-center">
        <h2 class="text-4xl md:text-5xl font-extrabold textMain mb-6">Mulai Karir Anda Bersama ElMatch</h2>
        <p class="text-xl text-textMuted mb-10 max-w-2xl mx-auto">Jangan biarkan peluang terlewat karena proses rekrutmen yang berbelit. Unggah CV Anda sekarang.</p>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="inline-block px-10 py-4 bg-primary text-white rounded-xl font-bold text-lg hover:bg-primaryHover transition-colors shadow-lg shadow-blue-200">
                Mulai Pengalaman AI Sekarang
            </a>
        @endif
    </section>

    <!-- Footer -->
    <footer class="border-t border-borderMain py-12 text-center bg-surface">
        <div class="flex items-center justify-center gap-2 mb-4">
            <span class="font-extrabold textMain text-2xl tracking-tighter">ElMatch</span>
        </div>
        <p class="text-textMuted text-sm mb-4">Platform Perekrutan Pintar Berbasis Kecerdasan Buatan.</p>
        <p class="text-textMuted text-sm">&copy; {{ date('Y') }} ElMatch. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>
