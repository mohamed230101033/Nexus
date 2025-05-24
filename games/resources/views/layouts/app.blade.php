<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MYC: Mind Your Click') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom Styles -->
    <link href="{{ asset('css/space-background.css') }}" rel="stylesheet">
    <link href="{{ asset('css/child-friendly-nav.css') }}" rel="stylesheet">
    
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
    <!-- Page-specific styles -->
    @yield('styles')

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                        secondary: {
                            50: '#fdf4ff',
                            100: '#fae8ff',
                            200: '#f5d0fe',
                            300: '#f0abfc',
                            400: '#e879f9',
                            500: '#d946ef',
                            600: '#c026d3',
                            700: '#a21caf',
                            800: '#86198f',
                            900: '#701a75',
                            950: '#4a044e',
                        },
                        danger: {
                            50: '#fef2f2',
                            100: '#fee2e2',
                            200: '#fecaca',
                            300: '#fca5a5',
                            400: '#f87171',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                            800: '#991b1b',
                            900: '#7f1d1d',
                            950: '#450a0a',
                        },
                        success: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                            950: '#052e16',
                        },
                    },
                    fontFamily: {
                        'game': ['Righteous', 'cursive'],
                        'sans': ['Nunito', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS -->
    <style>
        /* Add custom animations for the Social Media Mayhem activity */
        .animate-spin-slow {
            animation: spin 15s linear infinite;
        }
        
        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(0.95);
            }
        }
        
        /* Social stage classes */
        .social-stage {
            transition: all 0.3s ease;
        }
        
        .social-stage.hidden {
            display: none;
        }
        
        .social-stage.active {
            display: block;
        }
        
        /* Time Travel Effect Styles */
        .time-travel-active {
            animation: timeTravel 3s forwards;
        }
        
        @keyframes timeTravel {
            0% { filter: brightness(1) blur(0); }
            50% { filter: brightness(1.5) blur(5px); }
            100% { filter: brightness(1) blur(0); }
        }
        
        #warp-container {
            pointer-events: none;
        }
        
        /* Achievement animations */
        .animate-pulse-subtle {
            animation: pulse-subtle 2s infinite;
        }
        
        .animate-bounce-subtle {
            animation: bounce-subtle 1s infinite;
        }
        
        @keyframes pulse-subtle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        /* Achievement notification styles */
        .achievement-notification {
            z-index: 9999;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        
        /* Power-up styles */
        .power-ups-container {
            display: flex;
            gap: 8px;
            margin-bottom: 1rem;
        }
        
        .power-up-btn {
            background: linear-gradient(135deg, #2a3f5f, #1e293b);
            border: 2px solid rgba(99, 102, 241, 0.4);
            border-radius: 8px;
            padding: 8px;
            position: relative;
            transition: all 0.2s;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .power-up-btn:hover {
            transform: scale(1.1);
            border-color: rgba(99, 102, 241, 0.8);
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.4);
        }
        
        .power-up-icon {
            width: 24px;
            height: 24px;
            color: white;
        }
        
        .power-up-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Notification styles */
        .notification {
            z-index: 9999;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        
        .notification.show {
            opacity: 1;
        }
        
        /* Confetti animation for level completion */
        .confetti-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
            overflow: hidden;
        }
        
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            opacity: 0.7;
            animation: confetti-fall 3s ease-in-out forwards;
        }
        
        @keyframes confetti-fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }
        
        /* Homepage-style background pattern */
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%239C92AC' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        /* Floating animation for characters */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        /* Animated bubbles */
        .bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            animation: float 8s ease-in-out infinite;
            z-index: -1;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0); }
            50% { transform: translateY(-20px) rotate(180deg); }
            100% { transform: translateY(0) rotate(360deg); }
        }

        /* Secret Code Background Style */
        .bg-code-secret {
            background-color: #0f172a;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(16, 185, 129, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(59, 130, 246, 0.05) 0%, transparent 50%),
                url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2320314b' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>

    <!-- Scripts -->
</head>
<body class="font-sans antialiased min-h-screen bg-code-secret">
    <!-- Secret Code style background elements -->
    <canvas id="code-rain-canvas" class="fixed top-0 left-0 w-full h-full -z-10"></canvas>
    
    <!-- Animated bubbles background -->
    <div class="bubble" style="width: 80px; height: 80px; left: 10%; top: 10%; animation-delay: 0s;"></div>
    <div class="bubble" style="width: 50px; height: 50px; left: 20%; top: 40%; animation-delay: 1s;"></div>
    <div class="bubble" style="width: 70px; height: 70px; left: 80%; top: 15%; animation-delay: 2s;"></div>
    <div class="bubble" style="width: 40px; height: 40px; left: 70%; top: 70%; animation-delay: 3s;"></div>
    <div class="bubble" style="width: 60px; height: 60px; left: 30%; top: 80%; animation-delay: 4s;"></div>
    <div class="bubble" style="width: 90px; height: 90px; left: 90%; top: 60%; animation-delay: 5s;"></div>

    <!-- SVG Icons -->
    <div style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg">
            <symbol id="icon-home" viewBox="0 0 24 24">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </symbol>
            
            <symbol id="icon-story" viewBox="0 0 24 24">
                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </symbol>
            
            <symbol id="icon-secret-code" viewBox="0 0 24 24">
                <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </symbol>
            
            <symbol id="icon-time-travel" viewBox="0 0 24 24">
                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </symbol>
            
            <symbol id="icon-menu" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </symbol>
        </svg>
    </div>
    
    <header class="child-navbar">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="navbar-logo">
                    <img src="{{ asset('images/shield-logo.svg') }}" alt="MYC Logo" class="w-10 h-10">
                </div>
                <h1 class="navbar-title font-game">MYC: Mind Your Click</h1>
            </div>
            <nav class="hidden md:block">
                <ul class="flex space-x-4 nav-menu">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link bounce-animation">
                            <span class="nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor"><use href="#icon-home"></use></svg>
                            </span>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('game.story') }}" class="nav-link bounce-animation">
                            <span class="nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor"><use href="#icon-story"></use></svg>
                            </span>
                            Story Mode
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('game.secret-code') }}" class="nav-link bounce-animation">
                            <span class="nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor"><use href="#icon-secret-code"></use></svg>
                            </span>
                            Secret Code
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('game.time-travel') }}" class="nav-link bounce-animation">
                            <span class="nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor"><use href="#icon-time-travel"></use></svg>
                            </span>
                            Cyber Time Travel
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor"><use href="#icon-menu"></use></svg>
                </button>
            </div>
            
            <!-- Animated robot character in navbar -->
            <div class="hidden lg:block absolute right-6 top-16 floating" style="animation-delay: 0.5s;">
                <img src="https://cdn-icons-png.flaticon.com/512/4616/4616734.png" alt="Robot Character" class="w-12 h-12">
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 mobile-nav-menu">
            <nav>
                <ul class="flex flex-col space-y-2">
                    <li>
                        <a href="{{ route('home') }}" class="nav-link">
                            <span class="nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor"><use href="#icon-home"></use></svg>
                            </span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('game.story') }}" class="nav-link">
                            <span class="nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor"><use href="#icon-story"></use></svg>
                            </span>
                            Story Mode
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('game.secret-code') }}" class="nav-link">
                            <span class="nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor"><use href="#icon-secret-code"></use></svg>
                            </span>
                            Secret Code
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('game.time-travel') }}" class="nav-link">
                            <span class="nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor"><use href="#icon-time-travel"></use></svg>
                            </span>
                            Cyber Time Travel
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="child-footer mt-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h3 class="footer-title">MYC - Mind Your Click</h3>
                    <p class="footer-subtitle">Teaching safe online navigation for children</p>
                </div>
                <div class="social-links">
                    <a href="#" class="social-icon twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="social-icon instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon youtube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            
            <!-- Animated characters in footer -->
            <div class="flex justify-center mt-4 space-x-4 animate__animated animate__fadeInUp">
                <img src="https://cdn-icons-png.flaticon.com/512/4616/4616218.png" alt="Robot Character" class="w-12 h-12 floating" style="animation-delay: 0.5s;">
                <img src="https://cdn-icons-png.flaticon.com/512/4616/4616608.png" alt="Robot Character" class="w-12 h-12 floating" style="animation-delay: 1s;">
                <img src="https://cdn-icons-png.flaticon.com/512/2995/2995440.png" alt="Robot Character" class="w-12 h-12 floating" style="animation-delay: 1.5s;">
            </div>
            
            <div class="footer-copyright">
                <p>&copy; {{ date('Y') }} MYC-Mind Your Click. All rights reserved.</p>
            </div>
            <!-- The character will be added via JavaScript -->
        </div>
    </footer>

    <!-- Core JS Files -->
    <script src="{{ asset('js/sound-manager.js') }}"></script>
    <script src="{{ asset('js/game-timer.js') }}"></script>
    <script src="{{ asset('js/achievements.js') }}"></script>
    <script src="{{ asset('js/confetti.js') }}"></script>
    <script src="{{ asset('js/child-friendly-nav.js') }}"></script>
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    <!-- Time Travel Script -->
    @if(Route::is('game.time-travel') || Route::is('game.time-travel.attack'))
    <script src="{{ asset('js/time-travel.js') }}"></script>
    @endif

    <!-- Secret Code Rain Effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animated background code rain effect
            function setupCodeRain() {
                const codeRainCanvas = document.getElementById('code-rain-canvas');
                if (!codeRainCanvas) return;
                
                const ctx = codeRainCanvas.getContext('2d');
                codeRainCanvas.width = window.innerWidth;
                codeRainCanvas.height = window.innerHeight;
                
                const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+{}:"<>?|[];\',./`~';
                const fontSize = 14;
                const columns = codeRainCanvas.width / fontSize;
                
                const drops = [];
                for (let i = 0; i < columns; i++) {
                    drops[i] = 1;
                }
                
                function draw() {
                    ctx.fillStyle = 'rgba(15, 23, 42, 0.05)';
                    ctx.fillRect(0, 0, codeRainCanvas.width, codeRainCanvas.height);
                    
                    ctx.fillStyle = '#10b981';
                    ctx.font = fontSize + 'px monospace';
                    
                    for (let i = 0; i < drops.length; i++) {
                        const text = characters.charAt(Math.floor(Math.random() * characters.length));
                        ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                        
                        if (drops[i] * fontSize > codeRainCanvas.height && Math.random() > 0.975) {
                            drops[i] = 0;
                        }
                        
                        drops[i]++;
                    }
                }
                
                setInterval(draw, 33);
                
                // Handle window resize
                window.addEventListener('resize', function() {
                    codeRainCanvas.width = window.innerWidth;
                    codeRainCanvas.height = window.innerHeight;
                });
            }
            
            setupCodeRain();
        });
    </script>
    
    <!-- Page-specific scripts -->
    @yield('scripts')
    
    @stack('scripts')
</body>
</html> 