<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElMatch - Platform Karir Cerdas</title>
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
                        primary: '#06b6d4', // Cyan 500
                        primaryHover: '#0891b2', // Cyan 600
                        surface: '#ffffff',
                        background: '#f8fafc', // Light slate
                        textMain: '#0f172a',
                        textMuted: '#475569',
                    },
                    backgroundImage: {
                        'grid-pattern': "url(\"data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h40v40H0V0zm39 39V1H1v38h38z' fill='%23e2e8f0' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E\")",
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #f8fafc; overflow-x: hidden; }
        
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .hero-gradient {
            position: absolute;
            top: -10%;
            right: -5%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(6,182,212,0.15) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
            z-index: -1;
            filter: blur(40px);
        }

        .bento-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 2rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
            position: relative;
            overflow: hidden;
        }

        .bento-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
            border-color: #cbd5e1;
        }

        .floating-ui-1 {
            animation: float 6s ease-in-out infinite;
        }
        .floating-ui-2 {
            animation: float 8s ease-in-out infinite reverse;
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(2deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 30s linear infinite;
        }
        
        /* Modern text gradient */
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(90deg, #0891b2, #22d3ee);
        }
    </style>
</head>
<body class="antialiased text-textMain selection:bg-primary selection:text-white relative">

    <!-- Background Pattern -->
    <div class="fixed inset-0 z-[-2] bg-grid-pattern"></div>
    <div class="fixed inset-0 z-[-1] bg-gradient-to-b from-white/50 to-white/95"></div>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 w-full z-50 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <a href="#" class="flex items-center gap-2">
                <span class="font-extrabold text-2xl tracking-tighter textMain">ElMatch</span>
            </a>
            
            <div class="hidden md:flex items-center gap-8 bg-white/50 px-6 py-2 rounded-full border border-slate-200">
                <a href="#fitur" class="text-sm font-semibold text-slate-600 hover:text-primary transition">Fitur Utama</a>
                <a href="#cara-kerja" class="text-sm font-semibold text-slate-600 hover:text-primary transition">Cara Kerja</a>
                <a href="#testimoni" class="text-sm font-semibold text-slate-600 hover:text-primary transition">Kisah Sukses</a>
                <a href="#faq" class="text-sm font-semibold text-slate-600 hover:text-primary transition">FAQ</a>
            </div>

            <div class="flex items-center gap-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm font-bold textMain hover:text-primary transition px-4 py-2">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-bold textMain hover:text-primary transition hidden sm:block px-4 py-2">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-textMain text-white text-sm font-bold px-5 py-2.5 rounded-full hover:bg-black transition-colors shadow-lg shadow-slate-200">
                                Mulai Gratis
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="hero-gradient"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-8 items-center">
                <!-- Hero Text -->
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-50 border border-cyan-100 text-sm font-bold text-primary mb-6">
                        <span class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></span>
                        Era Baru Perekrutan Cerdas
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tighter mb-6 leading-[1.1]">
                        Pekerjaan Impian,<br />
                        <span class="text-gradient">Satu Unggahan CV.</span>
                    </h1>
                    
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-lg font-medium">
                        Lupakan proses melamar kerja yang melelahkan. ElMatch secara otomatis menganalisis keahlian Anda dan merekomendasikan lowongan yang paling tepat secara instan.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-8 py-4 bg-primary text-white rounded-full font-bold text-lg hover:bg-primaryHover transition-all shadow-xl shadow-cyan-500/20 flex items-center justify-center gap-2 hover:gap-3">
                                Unggah CV Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>
                            </a>
                        @endif
                        <a href="#fitur" class="px-8 py-4 bg-white text-textMain border border-slate-200 rounded-full font-bold text-lg hover:bg-slate-50 transition-all flex items-center justify-center">
                            Pelajari Sistem
                        </a>
                    </div>
                </div>

                <!-- Hero Visual (Abstract UI) - Added pointer-events-none -->
                <div class="relative h-[400px] lg:h-[500px] hidden md:block pointer-events-none select-none">
                    <!-- Glass Card 1 (CV Upload) -->
                    <div class="absolute top-10 right-20 w-72 bg-white/80 backdrop-blur-xl border border-slate-200 rounded-2xl p-5 shadow-2xl floating-ui-1 z-20">
                        <div class="flex items-center gap-4 mb-4 border-b border-slate-100 pb-4">
                            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16"><path d="M5.523 12.424c.14-.082.293-.162.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572q-.131.054-.223.006c-.05-.026-.067-.08-.077-.116-.01-.037-.02-.12.015-.24.015-.05.045-.109.08-.168.08-.13.2-.28.38-.423zm.459-2.647c-.015.023-.03.048-.045.074-.038.067-.075.138-.112.212-.224.444-.45 1.082-.67 1.745-.024.072-.047.144-.07.215.35-.11.71-.23 1.08-.36.19-.06.38-.13.57-.2-.1-.31-.2-.61-.28-.9-.05-.18-.1-.36-.14-.54a59 59 0 0 1-.29-1.15zM7.5 10.3c.01-.03.03-.07.05-.11.05-.1.11-.22.18-.34a8 8 0 0 1 .44-.71c-.05.06-.1.12-.14.19a4 4 0 0 0-.27.53c-.06.13-.11.26-.16.39l-.1.29zM8 5.5a1 1 0 0 0-.5.5c0 .24.08.61.16 1 .08.38.19.82.32 1.34.22-.09.43-.19.64-.3.07-.04.15-.08.22-.12a.8.8 0 0 0 .28-.35c.04-.08.06-.18.06-.29 0-.25-.09-.54-.27-.72C8.75 6.06 8.46 5.5 8 5.5"/><path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.603 12.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .471.242c.089.105.145.234.151.372a1.7 1.7 0 0 1-.01.597c-.033.228-.115.48-.21.758a17 17 0 0 1-.462 1.258c.376.541.815 1.05 1.3 1.5.498.468 1.06 1.028 1.625 1.46.335.257.653.47.92.61.27.142.5.25.688.33.19.083.35.195.45.348.102.158.15.35.12.56a.8.8 0 0 1-.166.425c-.14.168-.344.256-.563.266-.23.01-.52-.061-.856-.23A7.5 7.5 0 0 1 11.2 11.5c-.53-.418-1.15-1-1.74-1.63a18 18 0 0 1-2.27 1.15 14 14 0 0 1-2.02.664c-.45.097-.83.18-1.1.25-.26.07-.46.15-.56.24m.92-1.15c.34-.1.74-.2 1.18-.3.41-.09.83-.19 1.25-.3a16 16 0 0 0 1.7-1.07c-.47-.41-.95-.88-1.41-1.4-.41-.48-.8-1-1.15-1.54a17 17 0 0 0-1.05 2.1c-.2.43-.4.87-.55 1.32q-.1.3-.15.48c-.03.11-.05.19-.05.25-.01.07 0 .1.03.1.04 0 .1-.04.22-.1q.16-.07.38-.2M12.5 10c-.3-.08-.6-.2-1-.4a8 8 0 0 0-1.4-.6c.5-.4.9-.8 1.3-1.2.4-.4.8-.8 1-1.1.2-.2.3-.4.3-.6v-.1c0-.1 0-.1-.02-.1-.02 0-.05.02-.1.08-.06.07-.15.18-.28.34-.16.19-.36.44-.6.76-.23.3-.48.65-.77 1.03-.26.35-.55.72-.85 1.08.38.2.78.3 1.15.3.38 0 .68-.08.82-.2.1-.1.14-.2.13-.3m-3.9-6.4c-.1-.1-.3-.2-.5-.1-.2 0-.3.2-.4.4-.1.2-.1.5 0 .8.1.3.2.6.4.8.1-.1.2-.3.3-.6.1-.3.2-.6.2-.9z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-sm">Resume_Final.pdf</h4>
                                <p class="text-xs text-slate-500">Mengekstrak data...</p>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="h-2 bg-slate-100 rounded-full w-full"></div>
                            <div class="h-2 bg-slate-100 rounded-full w-4/5"></div>
                            <div class="h-2 bg-slate-100 rounded-full w-5/6"></div>
                        </div>
                    </div>

                    <!-- Glass Card 2 (Match Score) -->
                    <div class="absolute bottom-20 left-10 w-80 bg-white border border-slate-200 rounded-3xl p-6 shadow-2xl floating-ui-2 z-30">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h4 class="font-bold text-lg leading-tight">Backend Developer</h4>
                                <p class="text-sm text-slate-500">TechCorp Indonesia</p>
                            </div>
                            <!-- SVG Circular Progress -->
                            <div class="relative w-14 h-14 flex items-center justify-center">
                                <svg class="absolute" width="56" height="56" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="40" fill="none" stroke="#f1f5f9" stroke-width="10"></circle>
                                    <circle cx="50" cy="50" r="40" fill="none" stroke="#10b981" stroke-width="10" stroke-dasharray="251.2" stroke-dashoffset="30" stroke-linecap="round" transform="rotate(-90 50 50)"></circle>
                                </svg>
                                <span class="font-extrabold text-sm text-emerald-500">92%</span>
                            </div>
                        </div>
                        <div class="flex gap-2 mb-4">
                            <span class="px-2 py-1 bg-slate-100 text-slate-600 rounded text-xs font-bold">Laravel</span>
                            <span class="px-2 py-1 bg-slate-100 text-slate-600 rounded text-xs font-bold">MySQL</span>
                            <span class="px-2 py-1 bg-emerald-50 text-emerald-600 rounded text-xs font-bold border border-emerald-100">+ Cocok</span>
                        </div>
                        <div class="w-full py-2.5 bg-black text-white rounded-xl text-sm font-bold text-center">Ajukan Lamaran</div>
                    </div>

                    <!-- Decorative Background Elements -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-cyan-100 rounded-full blur-3xl opacity-50 z-10"></div>
                </div>
            </div>
        </div>
    </header>

    <!-- How It Works (Cara Kerja) Section -->
    <section id="cara-kerja" class="py-24 bg-slate-50/50 border-t border-slate-200 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">Mulai dalam Hitungan Detik</h2>
                <p class="text-lg text-slate-500 font-medium">Alur proses yang dirancang agar Anda bisa langsung terhubung dengan lowongan impian tanpa membuang waktu sedikitpun.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
                <!-- Connecting Line (Desktop) -->
                <div class="hidden md:block absolute top-12 left-[16%] right-[16%] h-0.5 bg-gradient-to-r from-cyan-100 via-cyan-300 to-cyan-100 z-0"></div>

                <!-- Step 1 -->
                <div class="relative z-10 flex flex-col items-center text-center">
                    <div class="w-24 h-24 rounded-3xl bg-white border border-slate-200 shadow-xl shadow-slate-200/50 flex items-center justify-center text-primary mb-6 rotate-3 hover:rotate-0 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/></svg>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-cyan-100 text-cyan-600 font-bold flex items-center justify-center text-sm mb-4">1</div>
                    <h3 class="text-xl font-bold mb-3">Siapkan CV Anda</h3>
                    <p class="text-slate-500 font-medium">Unggah *Curriculum Vitae* terbaik Anda dalam format PDF standar.</p>
                </div>

                <!-- Step 2 -->
                <div class="relative z-10 flex flex-col items-center text-center">
                    <div class="w-24 h-24 rounded-3xl bg-white border border-slate-200 shadow-xl shadow-slate-200/50 flex items-center justify-center text-emerald-500 mb-6 -rotate-3 hover:rotate-0 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" viewBox="0 0 16 16"><path d="M5 0h6v1H5V0zm7 1h1v1h-1V1zm1 2h1v6h-1V3zm0 7h1v1h-1v-1zm-1 2h1v1h-1v-1zm-7 1h6v1H5v-1zm-1-1H3v1h1v-1zm-1-2H2V3h1v7zm0-8H2V1h1v1z"/><path d="M4 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"/></svg>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 font-bold flex items-center justify-center text-sm mb-4">2</div>
                    <h3 class="text-xl font-bold mb-3">AI Mengekstrak Data</h3>
                    <p class="text-slate-500 font-medium">Sistem kami langsung memindai keterampilan, durasi pengalaman, dan latar belakang Anda.</p>
                </div>

                <!-- Step 3 -->
                <div class="relative z-10 flex flex-col items-center text-center">
                    <div class="w-24 h-24 rounded-3xl bg-white border border-slate-200 shadow-xl shadow-slate-200/50 flex items-center justify-center text-purple-500 mb-6 rotate-3 hover:rotate-0 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" viewBox="0 0 16 16"><path d="M13.5 1a1.5 1.5 0 0 1 1.5 1.5v11a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 13.5v-11A1.5 1.5 0 0 1 2.5 1h11zm-11 1a.5.5 0 0 0-.5.5v11a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-11a.5.5 0 0 0-.5-.5h-11z"/><path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/></svg>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 font-bold flex items-center justify-center text-sm mb-4">3</div>
                    <h3 class="text-xl font-bold mb-3">Dapatkan Rekomendasi</h3>
                    <p class="text-slate-500 font-medium">Temukan lowongan dengan persentase kecocokan paling tinggi yang siap Anda lamar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bento Box Features Section -->
    <section id="fitur" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">Desain cerdas untuk karir yang lebih cerah.</h2>
                <p class="text-lg text-slate-500 font-medium">Bukan sekadar papan lowongan biasa. ElMatch adalah asisten pribadi yang bekerja tanpa henti untuk karir Anda.</p>
            </div>

            <!-- Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Bento Item 1 (Large) -->
                <div class="bento-card md:col-span-2 bg-gradient-to-br from-slate-50 to-cyan-50/30">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-primary mb-6 border border-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16"><path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/><path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1m-4 11V2h3v2.5A1.5 1.5 0 0 0 10 6h2v7H4z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Ekstraksi Dokumen Otomatis</h3>
                    <p class="text-slate-500 font-medium leading-relaxed max-w-lg mb-8">Sistem kami membedah struktur PDF Anda—membaca keahlian teknis, durasi pengalaman, hingga tingkat pendidikan tanpa mengharuskan Anda mengisi puluhan kotak formulir yang membosankan.</p>
                    <div class="h-32 w-full rounded-xl bg-white border border-slate-200 p-4 relative overflow-hidden">
                        <div class="flex gap-2 mb-3">
                            <div class="h-3 w-20 bg-slate-200 rounded"></div><div class="h-3 w-16 bg-cyan-200 rounded"></div>
                        </div>
                        <div class="h-3 w-full bg-slate-100 rounded mb-2"></div>
                        <div class="h-3 w-3/4 bg-slate-100 rounded mb-2"></div>
                        <div class="absolute bottom-0 right-0 w-32 h-32 bg-cyan-100 rounded-full blur-2xl opacity-50"></div>
                    </div>
                </div>

                <!-- Bento Item 2 -->
                <div class="bento-card">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-emerald-500 mb-6 border border-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16"><path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Sistem Skor Akurat</h3>
                    <p class="text-slate-500 font-medium leading-relaxed">Ketahuilah di mana Anda berdiri. Lihat persentase kecocokan langsung dengan kualifikasi dari perusahaan.</p>
                </div>

                <!-- Bento Item 3 -->
                <div class="bento-card bg-slate-900 text-white">
                    <div class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center text-white mb-6 border border-white/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16"><path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/><path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Portal Perusahaan</h3>
                    <p class="text-slate-400 font-medium leading-relaxed">Terhubung secara efisien. HRD kini tidak perlu menyortir lamaran secara manual berkat peringkat kandidat cerdas.</p>
                </div>

                <!-- Bento Item 4 (Large) -->
                <div class="bento-card md:col-span-2 flex flex-col justify-center items-center text-center p-12 bg-cyan-50/50 border-cyan-100">
                    <h3 class="text-2xl md:text-3xl font-extrabold mb-4">Mulai Ekosistem Perekrutan Pintar</h3>
                    <p class="text-slate-500 font-medium max-w-md mx-auto mb-8">Tidak ada biaya tersembunyi. Pelamar dapat mendaftar dan memindai dokumen mereka secara penuh 100% gratis.</p>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-8 py-3 bg-black text-white rounded-full font-bold hover:scale-105 transition-transform">
                        Gabung Sekarang
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials / Marquee -->
    <section id="testimoni" class="py-24 overflow-hidden border-t border-slate-200">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold tracking-tight mb-4">Dipercaya Oleh Talenta Hebat</h2>
        </div>
        
        <div class="relative flex overflow-hidden">
            <!-- Fade edges -->
            <div class="absolute left-0 top-0 bottom-0 w-32 bg-gradient-to-r from-[#f8fafc] to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-[#f8fafc] to-transparent z-10 pointer-events-none"></div>

            <div class="animate-marquee gap-6 items-center">
                <!-- Card 1 -->
                <div class="w-[400px] p-6 bg-white border border-slate-200 rounded-2xl shrink-0">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center font-bold">R</div>
                        <div>
                            <h4 class="font-bold">Rajendra R</h4>
                            <p class="text-xs text-slate-500">Fresh Graduate IT</p>
                        </div>
                    </div>
                    <p class="text-slate-600 font-medium text-sm leading-relaxed">"Sangat cepat. Saya baru unggah PDF CV saya 10 menit yang lalu, langsung dapat 3 rekomendasi posisi web developer yang sangat relevan dengan skill saya."</p>
                </div>
                
                <!-- Card 2 -->
                <div class="w-[400px] p-6 bg-white border border-slate-200 rounded-2xl shrink-0">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center font-bold">S</div>
                        <div>
                            <h4 class="font-bold">Shinta N</h4>
                            <p class="text-xs text-slate-500">HR Specialist</p>
                        </div>
                    </div>
                    <p class="text-slate-600 font-medium text-sm leading-relaxed">"Dashboard perusahaan ElMatch benar-benar menghemat waktu. Kandidat sudah diurutkan berdasarkan persentase match tertinggi."</p>
                </div>

                <!-- Card 3 -->
                <div class="w-[400px] p-6 bg-white border border-slate-200 rounded-2xl shrink-0">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center font-bold">Y</div>
                        <div>
                            <h4 class="font-bold">Yazid N</h4>
                            <p class="text-xs text-slate-500">Backend Developer</p>
                        </div>
                    </div>
                    <p class="text-slate-600 font-medium text-sm leading-relaxed">"Tidak perlu isi formulir pendaftaran kerja yang panjang bertele-tele. Platform ini langsung paham dengan tech stack yang saya tulis di CV."</p>
                </div>

                <!-- Duplicated for Marquee -->
                <div class="w-[400px] p-6 bg-white border border-slate-200 rounded-2xl shrink-0">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center font-bold">R</div>
                        <div>
                            <h4 class="font-bold">Rajendra R</h4>
                            <p class="text-xs text-slate-500">Fresh Graduate IT</p>
                        </div>
                    </div>
                    <p class="text-slate-600 font-medium text-sm leading-relaxed">"Sangat cepat. Saya baru unggah PDF CV saya 10 menit yang lalu, langsung dapat 3 rekomendasi posisi web developer yang sangat relevan dengan skill saya."</p>
                </div>
                
                <div class="w-[400px] p-6 bg-white border border-slate-200 rounded-2xl shrink-0">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center font-bold">S</div>
                        <div>
                            <h4 class="font-bold">Shinta N</h4>
                            <p class="text-xs text-slate-500">HR Specialist</p>
                        </div>
                    </div>
                    <p class="text-slate-600 font-medium text-sm leading-relaxed">"Dashboard perusahaan ElMatch benar-benar menghemat waktu. Kandidat sudah diurutkan berdasarkan persentase match tertinggi."</p>
                </div>

                <div class="w-[400px] p-6 bg-white border border-slate-200 rounded-2xl shrink-0">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center font-bold">Y</div>
                        <div>
                            <h4 class="font-bold">Yazid N</h4>
                            <p class="text-xs text-slate-500">Backend Developer</p>
                        </div>
                    </div>
                    <p class="text-slate-600 font-medium text-sm leading-relaxed">"Tidak perlu isi formulir pendaftaran kerja yang panjang bertele-tele. Platform ini langsung paham dengan tech stack yang saya tulis di CV."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-24 bg-slate-50/50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">Pertanyaan Seputar ElMatch</h2>
                <p class="text-lg text-slate-500 font-medium">Ada hal yang belum jelas? Cari tahu jawabannya di bawah ini.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- FAQ Item 1 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-cyan-200 transition-colors">
                    <h4 class="text-lg font-bold mb-2">Apakah ElMatch 100% gratis?</h4>
                    <p class="text-slate-500 text-sm leading-relaxed font-medium">Tentu! Mengunggah CV dan mendapatkan rekomendasi pekerjaan cerdas sepenuhnya gratis untuk semua pelamar.</p>
                </div>
                <!-- FAQ Item 2 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-cyan-200 transition-colors">
                    <h4 class="text-lg font-bold mb-2">Format CV apa yang didukung?</h4>
                    <p class="text-slate-500 text-sm leading-relaxed font-medium">Saat ini sistem hanya memproses file berekstensi PDF untuk memastikan akurasi dan konsistensi parsing oleh AI kami.</p>
                </div>
                <!-- FAQ Item 3 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-cyan-200 transition-colors">
                    <h4 class="text-lg font-bold mb-2">Apakah data saya aman?</h4>
                    <p class="text-slate-500 text-sm leading-relaxed font-medium">Ya. Kami menggunakan enkripsi standar industri dan data CV Anda tidak akan pernah kami bagikan kepada pihak ketiga manapun.</p>
                </div>
                <!-- FAQ Item 4 -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:border-cyan-200 transition-colors">
                    <h4 class="text-lg font-bold mb-2">Apakah ini hanya untuk IT?</h4>
                    <p class="text-slate-500 text-sm leading-relaxed font-medium">Sistem pemindai kami terlatih untuk memahami berbagai jenis industri. Dari bidang teknologi, bisnis, kesehatan, hingga manufaktur.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-slate-200 py-12 text-center bg-white">
        <div class="flex items-center justify-center mb-6">
            <span class="font-extrabold textMain text-2xl tracking-tighter">ElMatch</span>
        </div>
        <p class="text-slate-500 text-sm font-medium mb-4 max-w-md mx-auto">Platform Rekrutmen Cerdas. Berhenti membuang waktu, mulailah menemukan yang tepat.</p>
        <p class="text-slate-400 text-xs font-semibold">&copy; {{ date('Y') }} ElMatch. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>
