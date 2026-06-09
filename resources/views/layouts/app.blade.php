<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Premium Custom Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-bg: #f4f7fe;
            --card-bg: rgba(255, 255, 255, 0.7);
            --card-border: rgba(255, 255, 255, 0.5);
            --text-main: #2b3674;
            --text-muted: #a3aed1;
            --accent-color: #4318FF;
            --accent-hover: #3311db;
            --glass-shadow: 0 18px 40px rgba(112, 144, 176, 0.12);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f4f7fe 0%, #e0e5f2 100%);
            color: var(--text-main);
            min-height: 100vh;
        }

        .navbar {
            background: var(--card-bg) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--card-border);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--accent-color) !important;
            letter-spacing: -0.5px;
        }

        .premium-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            box-shadow: var(--glass-shadow);
            padding: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .premium-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 22px 45px rgba(112, 144, 176, 0.18);
        }

        .premium-btn {
            background: var(--accent-color);
            color: white;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(67, 24, 255, 0.2);
        }

        .premium-btn:hover {
            background: var(--accent-hover);
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(67, 24, 255, 0.3);
            color: white;
        }

        .glass-badge {
            background: rgba(67, 24, 255, 0.1);
            color: var(--accent-color);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .score-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            color: white;
        }
        .score-high { background: linear-gradient(135deg, #05cd99 0%, #04b386 100%); box-shadow: 0 8px 16px rgba(5, 205, 153, 0.3); }
        .score-med { background: linear-gradient(135deg, #ffce20 0%, #e5b91d 100%); box-shadow: 0 8px 16px rgba(255, 206, 32, 0.3); }
        .score-low { background: linear-gradient(135deg, #ee5d50 0%, #d65448 100%); box-shadow: 0 8px 16px rgba(238, 93, 80, 0.3); }

        .file-upload-wrapper {
            border: 2px dashed rgba(67, 24, 255, 0.3);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            background: rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .file-upload-wrapper:hover {
            background: rgba(67, 24, 255, 0.05);
            border-color: var(--accent-color);
        }

        .form-control-premium {
            border-radius: 12px;
            border: 1px solid rgba(163, 174, 209, 0.5);
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.8);
        }
        .form-control-premium:focus {
            box-shadow: 0 0 0 4px rgba(67, 24, 255, 0.1);
            border-color: var(--accent-color);
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <!-- Bootstrap JS Fallback -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
