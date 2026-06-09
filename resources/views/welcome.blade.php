<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElMatch - AI CV Review & Job Recommendation</title>
    <!-- Tailwind CSS (via CDN for simplicity on landing page) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <div class="text-2xl font-bold text-blue-600">
                    ElMatch
                </div>
                <nav>
                    @if (Route::has('login'))
                        <div class="flex space-x-4">
                            @auth
                                <a href="{{ url('/home') }}" class="text-gray-600 hover:text-blue-600 font-medium">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-medium">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md font-medium transition">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow flex items-center justify-center">
            <div class="text-center px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">
                <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                    Find Your Dream Job with <span class="text-blue-600">AI</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8">
                    Upload your CV and let our advanced AI analyze your skills and experience to find the perfect job matches for you.
                </p>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block bg-blue-600 text-white font-semibold px-8 py-4 rounded-lg shadow-lg hover:bg-blue-700 hover:-translate-y-1 transition transform duration-200">
                        Get Started for Free
                    </a>
                @endif
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500">
                &copy; {{ date('Y') }} ElMatch. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>
