<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ElMatch') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Clean Modern Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Cyan Modern SaaS Palette */
            --primary-bg: #f8fafc; /* Slate 50 - matches landing page body */
            --card-bg: #ffffff; /* White */
            --card-border: #e2e8f0; /* Slate 200 */
            --text-main: #0f172a; /* Slate 900 */
            --text-muted: #475569; /* Slate 600 */
            --accent-color: #06b6d4; /* Cyan 500 */
            --accent-hover: #0891b2; /* Cyan 600 */
            --accent-light: #ecfeff; /* Cyan 50 */
            --success-color: #10b981; /* Emerald 500 */
            --success-light: #ecfdf5; /* Emerald 50 */
            --warning-color: #f59e0b; /* Amber 500 */
            --warning-light: #fffbeb; /* Amber 50 */
            --danger-color: #ef4444; /* Red 500 */
            --danger-light: #fef2f2; /* Red 50 */
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
            --card-shadow-hover: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--primary-bg);
            color: var(--text-main);
            min-height: 100vh;
            /* Optional: Match landing grid pattern slightly */
            background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h40v40H0V0zm39 39V1H1v38h38z' fill='%23e2e8f0' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
            background-attachment: fixed;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: none !important;
            height: 80px;
            display: flex;
            align-items: center;
        }

        .nav-container {
            width: 100%;
            max-width: 1280px; /* Equivalent to max-w-7xl */
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem;
            display: flex;
            flex-wrap: inherit;
            align-items: center;
            justify-content: space-between;
        }
        @media (min-width: 640px) {
            .nav-container { padding-left: 1.5rem; padding-right: 1.5rem; }
        }
        @media (min-width: 1024px) {
            .nav-container { padding-left: 2rem; padding-right: 2rem; }
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--text-main) !important;
            letter-spacing: -0.05em; /* Matches tracking-tighter */
            display: flex;
            align-items: center;
            font-size: 1.5rem; /* Matches text-2xl */
            line-height: 2rem;
            padding: 0;
            margin: 0;
        }

        .nav-link {
            color: var(--text-muted) !important;
            font-weight: 600;
            transition: color 0.2s;
        }
        .nav-link:hover {
            color: var(--accent-color) !important;
        }

        .dropdown-menu {
            border: 1px solid var(--card-border);
            box-shadow: var(--card-shadow-hover);
            border-radius: 16px;
            padding: 8px 0;
            border-color: #cbd5e1;
        }
        .dropdown-item {
            color: var(--text-main);
            font-weight: 600;
            padding: 10px 20px;
        }
        .dropdown-item:hover {
            background-color: var(--accent-light);
            color: var(--accent-color);
        }

        .premium-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 24px; /* Matched bento box */
            box-shadow: var(--card-shadow);
            padding: 32px;
            transition: all 0.3s ease;
        }

        .premium-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--card-shadow-hover);
            border-color: #cbd5e1;
        }

        .premium-btn {
            background: var(--accent-color);
            color: #ffffff;
            border-radius: 9999px; /* Rounded full like landing page */
            padding: 10px 24px;
            font-weight: 700;
            border: none;
            transition: all 0.2s ease-in-out;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 14px 0 rgba(6, 182, 212, 0.39);
        }

        .premium-btn:hover {
            background: var(--accent-hover);
            color: #ffffff;
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(6, 182, 212, 0.23);
        }

        .premium-btn-outline {
            background: transparent;
            color: var(--text-main);
            border: 1px solid var(--card-border);
            border-radius: 9999px;
            padding: 10px 24px;
            font-weight: 700;
            transition: all 0.2s ease-in-out;
        }

        .premium-btn-outline:hover {
            background: #f8fafc;
            color: var(--text-main);
            border-color: #cbd5e1;
        }

        .glass-badge {
            background: var(--accent-light);
            color: var(--accent-color);
            padding: 6px 16px;
            border-radius: 9999px;
            font-size: 0.85rem;
            font-weight: 700;
            border: 1px solid rgba(6, 182, 212, 0.2);
        }

        .file-upload-wrapper {
            border: 2px dashed var(--card-border);
            border-radius: 12px;
            padding: 40px;
            text-align: center;
            background: var(--primary-bg);
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .file-upload-wrapper:hover {
            background: var(--accent-light);
            border-color: var(--accent-color);
        }

        .form-control-premium {
            border-radius: 8px;
            border: 1px solid var(--card-border);
            padding: 12px 16px;
            background: var(--primary-bg);
            color: var(--text-main);
            font-size: 0.95rem;
            transition: all 0.2s;
        }
        .form-control-premium:focus, .form-select.form-control-premium:focus {
            box-shadow: 0 0 0 3px var(--accent-light) !important;
            border-color: var(--accent-color) !important;
            outline: none !important;
        }
        .form-control-premium::placeholder {
            color: #94a3b8;
        }
        
        /* Typography overrides */
        h1, h2, h3, h4, h5, h6 {
            color: var(--text-main);
            font-weight: 700;
        }
        p {
            color: var(--text-muted);
        }
        label {
            color: var(--text-main);
            font-weight: 600;
        }
        
        /* Table */
        .table { color: var(--text-main); }
        .table-borderless tbody tr { border-bottom: 1px solid var(--card-border) !important; }

        /* Score circles */
        .score-circle {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.125rem;
            color: white;
        }
        .score-high { background: var(--success-color); }
        .score-med { background: var(--warning-color); }
        .score-low { background: var(--danger-color); }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top">
            <div class="nav-container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    ElMatch
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav ms-auto align-items-center">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item me-3">
                                    <a class="nav-link" href="{{ route('login') }}" style="font-weight: 600; color: var(--text-main) !important;">Masuk</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="premium-btn text-decoration-none" href="{{ route('register') }}" style="padding: 10px 24px; font-weight: 600;">Mulai Sekarang</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item d-flex align-items-center me-4">
                                <div style="width: 36px; height: 36px; border-radius: 50%; background: var(--accent-light); color: var(--accent-color); display: flex; align-items: center; justify-content: center; font-weight: 700; margin-right: 12px; border: 1px solid var(--accent-color);">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <span style="font-weight: 700; color: var(--text-main); font-size: 0.95rem; line-height: 1.2;">{{ Auth::user()->name }}</span>
                                    <span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600; text-transform: uppercase;">
                                        @if(Auth::user()->role === 'company')
                                            Perusahaan
                                        @elseif(Auth::user()->role === 'admin')
                                            Admin
                                        @else
                                            Pelamar
                                        @endif
                                    </span>
                                </div>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn d-flex align-items-center" href="{{ route('logout') }}"
                                   style="font-weight: 600; font-size: 0.9rem; background: var(--danger-light); color: var(--danger-color); padding: 8px 16px; border-radius: 8px; border: 1px solid transparent; transition: all 0.2s;"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   onmouseover="this.style.background='var(--danger-color)'; this.style.color='#fff';"
                                   onmouseout="this.style.background='var(--danger-light)'; this.style.color='var(--danger-color)';">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right me-2" viewBox="0 0 16 16">
                                      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>
                                    Keluar
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="margin-top: 80px;">
            @yield('content')
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
