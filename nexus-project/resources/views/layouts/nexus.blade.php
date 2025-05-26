<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'NEXUS - Cybersecurity Research Platform')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        nexus: {
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
                        cyber: {
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
                        }
                    },
                    animation: {
                        'gradient-x': 'gradient-x 15s ease infinite',
                        'gradient-y': 'gradient-y 15s ease infinite',
                        'gradient-xy': 'gradient-xy 15s ease infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-glow': 'pulse-glow 2s ease-in-out infinite alternate',
                        'scan': 'scan 3s ease-in-out infinite',
                        'matrix-rain': 'matrix-rain 20s linear infinite',
                    },
                    keyframes: {
                        'gradient-y': {
                            '0%, 100%': {
                                'background-size': '400% 400%',
                                'background-position': 'center top'
                            },
                            '50%': {
                                'background-size': '200% 200%',
                                'background-position': 'center center'
                            }
                        },
                        'gradient-x': {
                            '0%, 100%': {
                                'background-size': '200% 200%',
                                'background-position': 'left center'
                            },
                            '50%': {
                                'background-size': '200% 200%',
                                'background-position': 'right center'
                            }
                        },
                        'gradient-xy': {
                            '0%, 100%': {
                                'background-size': '400% 400%',
                                'background-position': 'left center'
                            },
                            '25%': {
                                'background-size': '400% 400%',
                                'background-position': 'left bottom'
                            },
                            '50%': {
                                'background-size': '400% 400%',
                                'background-position': 'right bottom'
                            },
                            '75%': {
                                'background-size': '400% 400%',
                                'background-position': 'right center'
                            }
                        },
                        'float': {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        },
                        'pulse-glow': {
                            '0%': { 
                                'box-shadow': '0 0 20px rgba(14, 165, 233, 0.4), 0 0 40px rgba(168, 85, 247, 0.2)',
                                'transform': 'scale(1)'
                            },
                            '100%': { 
                                'box-shadow': '0 0 30px rgba(14, 165, 233, 0.6), 0 0 60px rgba(168, 85, 247, 0.4)',
                                'transform': 'scale(1.02)'
                            }
                        },
                        'scan': {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(100%)' }
                        },
                        'matrix-rain': {
                            '0%': { transform: 'translateY(-100vh)' },
                            '100%': { transform: 'translateY(100vh)' }
                        }
                    }
                }
            }
        }
    </script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    @yield('styles')
    
    <style>
        :root {
            --nexus-primary: #0ea5e9;
            --nexus-secondary: #a855f7;
            --nexus-accent: #06b6d4;
            --nexus-dark: #0f172a;
            --nexus-darker: #020617;
            --nexus-glow: rgba(14, 165, 233, 0.3);
            --nexus-glow-secondary: rgba(168, 85, 247, 0.3);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        
        /* Enhanced Matrix Background */
        .matrix-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.03;
        }
        
        .matrix-char {
            position: absolute;
            color: var(--nexus-primary);
            font-family: 'JetBrains Mono', monospace;
            font-size: 14px;
            animation: matrix-rain linear infinite;
        }
        
        /* Enhanced Glow Effects */
        .nexus-glow {
            box-shadow: 
                0 0 20px var(--nexus-glow),
                0 0 40px var(--nexus-glow-secondary),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .nexus-glow:hover {
            box-shadow: 
                0 0 30px var(--nexus-glow),
                0 0 60px var(--nexus-glow-secondary),
                0 0 90px rgba(14, 165, 233, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        
        /* Enhanced Tab Styling */
        .nexus-tab {
            position: relative;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.8));
            border: 1px solid rgba(14, 165, 233, 0.2);
            backdrop-filter: blur(20px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .nexus-tab:hover {
            border-color: var(--nexus-primary);
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.1), rgba(168, 85, 247, 0.1));
        }
        
        .nexus-tab.active {
            border-color: var(--nexus-secondary);
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.15), rgba(168, 85, 247, 0.15));
        }
        
        .nexus-tab::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--nexus-primary), var(--nexus-secondary));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .nexus-tab:hover::before,
        .nexus-tab.active::before {
            transform: scaleX(1);
        }
        
        /* Enhanced Card Styling */
        .nexus-card {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.9), rgba(30, 41, 59, 0.8));
            border: 1px solid rgba(14, 165, 233, 0.2);
            backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .nexus-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--nexus-primary), transparent);
            transition: left 0.6s ease;
        }
        
        .nexus-card:hover::before {
            left: 100%;
        }
        
        .nexus-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: var(--nexus-primary);
            box-shadow: 
                0 20px 40px rgba(14, 165, 233, 0.2),
                0 10px 20px rgba(168, 85, 247, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        /* Progress Indicators */
        .progress-ring {
            transition: stroke-dasharray 0.6s ease-in-out;
        }
        
        /* Floating Particles */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--nexus-primary), var(--nexus-secondary));
            animation: float 8s infinite ease-in-out;
            opacity: 0.1;
        }
        
        /* Enhanced Mobile Menu */
        .mobile-menu {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.95));
            backdrop-filter: blur(20px);
            border: 1px solid rgba(14, 165, 233, 0.2);
        }
        
        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--nexus-darker);
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--nexus-primary), var(--nexus-secondary));
            border-radius: 4px;
        }
          ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(var(--nexus-secondary), var(--nexus-primary));
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gradient-to-br from-slate-900 via-blue-900 to-indigo-900 min-h-screen font-['Inter'] relative overflow-x-hidden">
    <!-- Enhanced Matrix Background -->
    <div class="matrix-bg" id="matrix-background"></div>
    
    <!-- Floating Particles -->
    <div class="particle" style="top: 20%; left: 10%; width: 4px; height: 4px; animation-delay: 0s;"></div>
    <div class="particle" style="top: 60%; left: 80%; width: 6px; height: 6px; animation-delay: 2s;"></div>
    <div class="particle" style="top: 80%; left: 20%; width: 3px; height: 3px; animation-delay: 4s;"></div>
    <div class="particle" style="top: 30%; left: 70%; width: 5px; height: 5px; animation-delay: 1s;"></div>
    <div class="particle" style="top: 70%; left: 40%; width: 4px; height: 4px; animation-delay: 3s;"></div>
    
    <!-- Enhanced Background Pattern -->
    <div class="fixed inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%2314b8a6" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>

    <!-- Enhanced Header -->
    <header class="relative z-50 bg-black/30 backdrop-blur-xl border-b border-white/10 sticky top-0">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <div class="w-12 h-12 bg-gradient-to-r from-nexus-400 to-cyber-600 rounded-xl flex items-center justify-center nexus-glow">
                            <img src="{{ asset('images/logo.png') }}" alt="Nexus Logo" class="w-8 h-8 rounded-lg">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-r from-nexus-400 to-cyber-600 rounded-xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-nexus-400 via-cyan-400 to-blue-400 bg-clip-text text-transparent animate-gradient-x">
                            NEXUS
                        </h1>
                        <p class="text-blue-200 text-sm font-medium">Cybersecurity Research Platform</p>
                    </div>
                </div
                
                <!-- Enhanced Desktop Navigation -->
                <nav class="hidden lg:flex space-x-2">
                    <a href="{{ route('nexus.index') }}" 
                       class="nexus-tab px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 {{ Request::routeIs('nexus.index') ? 'active text-nexus-400' : 'text-gray-300 hover:text-white' }}">
                        <i class="fas fa-home mr-2"></i>Overview
                    </a>
                    <a href="{{ route('nexus.first-semester') }}" 
                       class="nexus-tab px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 {{ Request::routeIs('nexus.first-semester') ? 'active text-nexus-400' : 'text-gray-300 hover:text-white' }}">
                        <i class="fas fa-shield-alt mr-2"></i>First Semester
                    </a>
                    <a href="{{ route('nexus.second-semester') }}" 
                       class="nexus-tab px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 {{ Request::routeIs('nexus.second-semester') ? 'active text-nexus-400' : 'text-gray-300 hover:text-white' }}">
                        <i class="fas fa-code mr-2"></i>Second Semester
                    </a>
                    <a href="{{ route('nexus.myc-game') }}" 
                       class="nexus-tab px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 {{ Request::routeIs('nexus.myc-game') ? 'active' : 'text-gray-300 hover:text-white' }}">
                        <i class="fas fa-gamepad mr-2"></i>
                        <span class="bg-gradient-to-r from-cyan-400 to-pink-500 bg-clip-text text-transparent font-bold">
                            NEXUS x MYC
                        </span>
                    </a>
                </nav>

                <!-- Enhanced Mobile Menu Button -->
                <button class="lg:hidden p-2 rounded-xl nexus-glow" id="mobile-menu-button">
                    <i class="fas fa-bars text-white text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Enhanced Mobile Menu -->
        <div class="lg:hidden mobile-menu border-t border-white/10 hidden" id="mobile-menu">
            <div class="container mx-auto px-6 py-4 space-y-2">
                <a href="{{ route('nexus.index') }}" 
                   class="block nexus-tab px-4 py-3 rounded-lg text-sm font-semibold {{ Request::routeIs('nexus.index') ? 'active text-nexus-400' : 'text-gray-300' }}">
                    <i class="fas fa-home mr-3"></i>Overview
                </a>
                <a href="{{ route('nexus.first-semester') }}" 
                   class="block nexus-tab px-4 py-3 rounded-lg text-sm font-semibold {{ Request::routeIs('nexus.first-semester') ? 'active text-nexus-400' : 'text-gray-300' }}">
                    <i class="fas fa-shield-alt mr-3"></i>First Semester
                </a>
                <a href="{{ route('nexus.second-semester') }}" 
                   class="block nexus-tab px-4 py-3 rounded-lg text-sm font-semibold {{ Request::routeIs('nexus.second-semester') ? 'active text-nexus-400' : 'text-gray-300' }}">
                    <i class="fas fa-code mr-3"></i>Second Semester
                </a>
                <a href="{{ route('nexus.myc-game') }}" 
                   class="block nexus-tab px-4 py-3 rounded-lg text-sm font-semibold {{ Request::routeIs('nexus.myc-game') ? 'active' : 'text-gray-300' }}">
                    <i class="fas fa-gamepad mr-3"></i>
                    <span class="bg-gradient-to-r from-cyan-400 to-pink-500 bg-clip-text text-transparent font-bold">
                        NEXUS x MYC
                    </span>
                </a>
            </div>
        </div>
    </header>

    <!-- Enhanced Main Content -->
    <main class="relative z-10 min-h-screen">
        @yield('content')
    </main>

    <!-- Enhanced Footer -->
    <footer class="relative z-10 bg-black/30 backdrop-blur-xl border-t border-white/10 mt-20">
        <div class="container mx-auto px-6 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-nexus-400 to-cyber-600 rounded-lg flex items-center justify-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Nexus Logo" class="w-6 h-6 rounded">
                        </div>
                        <h3 class="text-xl font-bold bg-gradient-to-r from-nexus-400 to-cyan-400 bg-clip-text text-transparent">
                            NEXUS
                        </h3>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Advancing cybersecurity education through innovative research, practical learning, and cutting-edge technology.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-white font-semibold mb-4">Platform</h4>
                    <div class="space-y-2">
                        <a href="{{ route('nexus.index') }}" class="block text-gray-400 hover:text-nexus-400 transition-colors text-sm">
                            <i class="fas fa-home mr-2"></i>Overview
                        </a>
                        <a href="{{ route('nexus.first-semester') }}" class="block text-gray-400 hover:text-nexus-400 transition-colors text-sm">
                            <i class="fas fa-shield-alt mr-2"></i>Research Phase I
                        </a>
                        <a href="{{ route('nexus.second-semester') }}" class="block text-gray-400 hover:text-nexus-400 transition-colors text-sm">
                            <i class="fas fa-code mr-2"></i>Implementation Phase II
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-white font-semibold mb-4">Interactive Learning</h4>
                    <div class="space-y-2">
                        <a href="{{ route('nexus.myc-game') }}" class="block text-gray-400 hover:text-cyan-400 transition-colors text-sm">
                            <i class="fas fa-gamepad mr-2"></i>
                            <span class="bg-gradient-to-r from-cyan-400 to-pink-500 bg-clip-text text-transparent font-medium">
                                NEXUS x MYC Game
                            </span>
                        </a>
                        <span class="block text-gray-500 text-xs">Cybersecurity Education Through Gaming</span>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-white/10 mt-8 pt-6 text-center">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} NEXUS Platform. Empowering the next generation of cybersecurity professionals.
                </p>
            </div>
        </div>
    </footer>

    <!-- Enhanced JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                    const icon = mobileMenuButton.querySelector('i');
                    icon.classList.toggle('fa-bars');
                    icon.classList.toggle('fa-times');
                });
            }
            
            // Enhanced Matrix Background Animation
            function createMatrixBackground() {
                const matrixContainer = document.getElementById('matrix-background');
                const characters = '01ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                
                for (let i = 0; i < 50; i++) {
                    const char = document.createElement('div');
                    char.className = 'matrix-char';
                    char.textContent = characters[Math.floor(Math.random() * characters.length)];
                    char.style.left = Math.random() * 100 + '%';
                    char.style.animationDuration = (Math.random() * 10 + 10) + 's';
                    char.style.animationDelay = Math.random() * 10 + 's';
                    char.style.fontSize = (Math.random() * 10 + 10) + 'px';
                    char.style.opacity = Math.random() * 0.5 + 0.1;
                    matrixContainer.appendChild(char);
                }
            }
            
            createMatrixBackground();
            
            // Enhanced GSAP Animations
            if (typeof gsap !== 'undefined') {
                // Animate cards on scroll
                if (typeof ScrollTrigger !== 'undefined') {
                    gsap.registerPlugin(ScrollTrigger);
                    
                    gsap.utils.toArray('.nexus-card').forEach((card, index) => {
                        gsap.fromTo(card, 
                            {
                                opacity: 0,
                                y: 50,
                                scale: 0.9
                            },
                            {
                                opacity: 1,
                                y: 0,
                                scale: 1,
                                duration: 0.8,
                                delay: index * 0.1,
                                ease: "power3.out",
                                scrollTrigger: {
                                    trigger: card,
                                    start: "top 85%",
                                    end: "bottom 15%",
                                    toggleActions: "play none none reverse"
                                }
                            }
                        );
                    });
                }
                
                // Animate navigation tabs
                gsap.utils.toArray('.nexus-tab').forEach((tab, index) => {
                    gsap.fromTo(tab,
                        {
                            opacity: 0,
                            x: -30
                        },
                        {
                            opacity: 1,
                            x: 0,
                            duration: 0.6,
                            delay: index * 0.1,
                            ease: "power2.out"
                        }
                    );
                });
            }
            
            // Enhanced Scroll Effects
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                
                // Parallax effect for background elements
                const particles = document.querySelectorAll('.particle');
                particles.forEach((particle, index) => {
                    const speed = (index + 1) * 0.2;
                    particle.style.transform = `translateY(${rate * speed}px)`;
                });
            });
            
            // Enhanced Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-pulse-glow');
                    }
                });
            }, observerOptions);
            
            // Observe all nexus cards
            document.querySelectorAll('.nexus-card').forEach(card => {
                observer.observe(card);
            });
        });    </script>

    @yield('scripts')
    @stack('scripts')
</body>
</html>
