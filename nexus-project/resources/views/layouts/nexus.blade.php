<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Nexus Project - Cybersecurity Portfolio')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
                        },
                        dark: {
                            100: '#1f2937',
                            200: '#374151',
                            300: '#4b5563',
                            400: '#6b7280',
                            500: '#9ca3af',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-in': 'slideIn 0.6s ease-out',
                        'bounce-slow': 'bounce 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideIn: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    @yield('styles')
</head>
<body class="bg-gradient-to-br from-gray-900 via-blue-900 to-indigo-900 min-h-screen font-['Inter']">
    <!-- Background Pattern -->
    <div class="fixed inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.03"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>

    <!-- Header -->
    <header class="relative z-10 bg-black/20 backdrop-blur-md border-b border-white/10">
        <div class="container mx-auto px-6 py-4">            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Nexus Logo" class="w-8 h-8 rounded">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">Nexus Project</h1>
                        <p class="text-blue-200 text-sm">Cybersecurity Portfolio</p>
                    </div>
                </div>
                
                <nav class="hidden md:flex space-x-1">
                    <a href="{{ route('nexus.index') }}" 
                       class="nav-tab {{ request()->routeIs('nexus.index') ? 'active' : '' }}"
                       data-tab="overview">
                        <i class="fas fa-home mr-2"></i>
                        Overview
                    </a>
                    <a href="{{ route('nexus.first-semester') }}" 
                       class="nav-tab {{ request()->routeIs('nexus.first-semester') ? 'active' : '' }}"
                       data-tab="first-semester">
                        <i class="fas fa-bug mr-2"></i>
                        First Semester
                    </a>
                    <a href="{{ route('nexus.second-semester') }}" 
                       class="nav-tab {{ request()->routeIs('nexus.second-semester') ? 'active' : '' }}"
                       data-tab="second-semester">
                        <i class="fas fa-research mr-2"></i>
                        Second Semester
                    </a>
                    <a href="{{ route('nexus.myc-game') }}" 
                       class="nav-tab {{ request()->routeIs('nexus.myc-game') ? 'active' : '' }}"
                       data-tab="myc-game">
                        <i class="fas fa-gamepad mr-2"></i>
                        MYC Game
                    </a>
                </nav>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-white hover:text-blue-300 transition-colors">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <nav id="mobile-menu" class="md:hidden mt-4 hidden">
                <div class="flex flex-col space-y-2">
                    <a href="{{ route('nexus.index') }}" 
                       class="nav-tab-mobile {{ request()->routeIs('nexus.index') ? 'active' : '' }}">
                        <i class="fas fa-home mr-2"></i>
                        Overview
                    </a>
                    <a href="{{ route('nexus.first-semester') }}" 
                       class="nav-tab-mobile {{ request()->routeIs('nexus.first-semester') ? 'active' : '' }}">
                        <i class="fas fa-bug mr-2"></i>
                        First Semester
                    </a>
                    <a href="{{ route('nexus.second-semester') }}" 
                       class="nav-tab-mobile {{ request()->routeIs('nexus.second-semester') ? 'active' : '' }}">
                        <i class="fas fa-research mr-2"></i>
                        Second Semester
                    </a>
                    <a href="{{ route('nexus.myc-game') }}" 
                       class="nav-tab-mobile {{ request()->routeIs('nexus.myc-game') ? 'active' : '' }}">
                        <i class="fas fa-gamepad mr-2"></i>
                        MYC Game
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10 container mx-auto px-6 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative z-10 bg-black/20 backdrop-blur-md border-t border-white/10 mt-16">
        <div class="container mx-auto px-6 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-300 text-sm">
                    © {{ date('Y') }} Nexus Project - Cybersecurity Portfolio
                </div>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    @yield('scripts')

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // GSAP animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate header on load
            gsap.from('header', { duration: 0.8, y: -50, opacity: 0, ease: "power2.out" });
            
            // Animate main content
            gsap.from('main', { duration: 0.8, y: 30, opacity: 0, delay: 0.2, ease: "power2.out" });
            
            // Animate navigation tabs
            gsap.from('.nav-tab', { 
                duration: 0.6, 
                x: -20, 
                opacity: 0, 
                stagger: 0.1, 
                delay: 0.4,
                ease: "power2.out" 
            });
        });

        // Tab hover animations
        document.querySelectorAll('.nav-tab, .nav-tab-mobile').forEach(tab => {
            tab.addEventListener('mouseenter', function() {
                gsap.to(this, { duration: 0.2, scale: 1.05, ease: "power2.out" });
            });
            
            tab.addEventListener('mouseleave', function() {
                gsap.to(this, { duration: 0.2, scale: 1, ease: "power2.out" });
            });
        });
    </script>

    <style>
        .nav-tab {
            @apply px-4 py-2 rounded-lg text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200 flex items-center font-medium;
        }
        
        .nav-tab.active {
            @apply bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg;
        }
        
        .nav-tab-mobile {
            @apply px-4 py-3 rounded-lg text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200 flex items-center font-medium;
        }
        
        .nav-tab-mobile.active {
            @apply bg-gradient-to-r from-blue-500 to-purple-600 text-white;
        }
    </style>
</body>
</html>
