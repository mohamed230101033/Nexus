@extends('layouts.nexus')

@section('title', 'MYC Game - Mind Your Click')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-12 animate-fade-in">
        <div class="inline-flex items-center px-4 py-2 bg-purple-500/20 rounded-full text-purple-300 text-sm font-medium mb-6">
            <i class="fas fa-gamepad mr-2"></i>
            Bonus Project
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
            <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                MYC Game
            </span>
        </h1>
        <h2 class="text-2xl text-gray-300 mb-4">Mind Your Click</h2>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
            An interactive cybersecurity education game designed to teach security awareness through engaging gameplay and real-world scenarios.
        </p>
    </div>

    <!-- Game Overview -->
    <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 mb-12">
        <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
            <i class="fas fa-info-circle text-blue-400 mr-3"></i>
            Game Overview
        </h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Concept</h3>
                <p class="text-gray-300 mb-4">
                    MYC (Mind Your Click) is an educational cybersecurity game that teaches players about digital safety 
                    through interactive scenarios, puzzles, and real-world simulations. The game combines entertainment 
                    with practical security education.
                </p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs">Educational</span>
                    <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs">Interactive</span>
                    <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-xs">Scenario-Based</span>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Objectives</h3>
                <ul class="space-y-2">
                    <li class="flex items-start text-gray-300">
                        <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                        Teach cybersecurity awareness through gameplay
                    </li>
                    <li class="flex items-start text-gray-300">
                        <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                        Simulate real-world cyber threats safely
                    </li>
                    <li class="flex items-start text-gray-300">
                        <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                        Develop critical thinking for digital safety
                    </li>
                    <li class="flex items-start text-gray-300">
                        <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                        Make cybersecurity education engaging and accessible
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Game Features -->
    <div class="grid md:grid-cols-3 gap-8 mb-12">        <!-- Story Mode -->
        <div class="game-feature bg-gradient-to-br from-blue-500/10 to-cyan-500/10 p-6 rounded-2xl border border-blue-500/20">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-book-open text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-white mb-3 text-center">Story Mode</h3>
            <p class="text-gray-300 text-center mb-4">
                Immersive narrative-driven missions that teach cybersecurity concepts through engaging storylines and character development.
            </p>
            <div class="text-center">
                <a href="{{ route('game.story') }}" class="inline-flex items-center px-4 py-2 bg-blue-500/20 hover:bg-blue-500/30 text-blue-300 hover:text-white rounded-lg transition-all duration-300">
                    <i class="fas fa-play mr-2"></i>
                    Start Story
                </a>
            </div>
        </div>

        <!-- Secret Code -->
        <div class="game-feature bg-gradient-to-br from-purple-500/10 to-pink-500/10 p-6 rounded-2xl border border-purple-500/20">
            <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-key text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-white mb-3 text-center">Secret Code</h3>
            <p class="text-gray-300 text-center mb-4">
                Cryptography challenges that teach encryption, decryption, and the importance of secure communication.
            </p>
            <div class="text-center">
                <a href="{{ route('game.secret-code') }}" class="inline-flex items-center px-4 py-2 bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 hover:text-white rounded-lg transition-all duration-300">
                    <i class="fas fa-unlock mr-2"></i>
                    Decode
                </a>
            </div>
        </div>

        <!-- Cyber Time Travel -->
        <div class="game-feature bg-gradient-to-br from-green-500/10 to-emerald-500/10 p-6 rounded-2xl border border-green-500/20">
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-clock text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-white mb-3 text-center">Cyber Time Travel</h3>
            <p class="text-gray-300 text-center mb-4">
                Journey through the history of cybersecurity attacks and learn how past incidents shaped modern security practices.
            </p>
            <div class="text-center">
                <a href="{{ route('game.time-travel') }}" class="inline-flex items-center px-4 py-2 bg-green-500/20 hover:bg-green-500/30 text-green-300 hover:text-white rounded-lg transition-all duration-300">
                    <i class="fas fa-rocket mr-2"></i>
                    Travel
                </a>
            </div>
        </div>
    </div>

    <!-- Additional Game Modes -->
    <div class="grid md:grid-cols-2 gap-8 mb-12">
        <!-- Time Travel -->
        <div class="bg-gradient-to-br from-orange-500/10 to-red-500/10 p-8 rounded-2xl border border-orange-500/20">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-clock text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-white">Cyber Time Travel</h3>
            </div>
            <p class="text-gray-300 mb-6">
                Journey through the history of cybersecurity attacks and learn how past incidents shaped modern security practices. 
                Experience famous cyber attacks in a safe, educational environment.
            </p>
            <div class="flex items-center justify-between">
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-orange-500/20 text-orange-300 rounded-full text-xs">Historical</span>
                    <span class="px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-xs">Educational</span>
                    <span class="px-3 py-1 bg-yellow-500/20 text-yellow-300 rounded-full text-xs">Timeline</span>
                </div>
                <a href="{{ route('game.time-travel') }}" class="inline-flex items-center px-4 py-2 bg-orange-500/20 hover:bg-orange-500/30 text-orange-300 hover:text-white rounded-lg transition-all duration-300">
                    <i class="fas fa-rocket mr-2"></i>
                    Travel
                </a>
            </div>        </div>
    </div>

    <!-- Technical Implementation -->
    <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 mb-12">
        <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
            <i class="fas fa-code text-cyan-400 mr-3"></i>
            Technical Implementation
        </h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Technologies Used</h3>
                <div class="space-y-3">
                    <div class="flex items-center p-3 bg-black/20 rounded-lg">
                        <i class="fab fa-laravel text-red-400 mr-3 text-xl"></i>
                        <div>
                            <div class="text-white font-medium">Laravel Framework</div>
                            <div class="text-gray-400 text-sm">Backend development and routing</div>
                        </div>
                    </div>
                    <div class="flex items-center p-3 bg-black/20 rounded-lg">
                        <i class="fab fa-js-square text-yellow-400 mr-3 text-xl"></i>
                        <div>
                            <div class="text-white font-medium">JavaScript & GSAP</div>
                            <div class="text-gray-400 text-sm">Interactive animations and gameplay</div>
                        </div>
                    </div>
                    <div class="flex items-center p-3 bg-black/20 rounded-lg">
                        <i class="fab fa-css3-alt text-blue-400 mr-3 text-xl"></i>
                        <div>
                            <div class="text-white font-medium">TailwindCSS</div>
                            <div class="text-gray-400 text-sm">Responsive UI design</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Features</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                        <div>
                            <div class="text-white font-medium">Progress Tracking</div>
                            <div class="text-gray-400 text-sm">Save and resume gameplay sessions</div>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                        <div>
                            <div class="text-white font-medium">Responsive Design</div>
                            <div class="text-gray-400 text-sm">Works on desktop, tablet, and mobile</div>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                        <div>
                            <div class="text-white font-medium">Interactive Scenarios</div>
                            <div class="text-gray-400 text-sm">Real-world cybersecurity challenges</div>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                        <div>
                            <div class="text-white font-medium">Educational Content</div>
                            <div class="text-gray-400 text-sm">Evidence-based security training</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Quick Access -->
    <div class="text-center">
        <h2 class="text-2xl font-bold text-white mb-6">Ready to Play?</h2>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('game.welcome') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-play mr-3"></i>
                Start Playing Now
            </a>
            <a href="{{ route('game.village') }}" class="inline-flex items-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl border border-white/20 transition-all duration-300">
                <i class="fas fa-home mr-3"></i>
                Visit Village Hub
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate game feature cards on scroll
        const features = document.querySelectorAll('.game-feature');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    gsap.from(entry.target, {
                        duration: 0.6,
                        y: 40,
                        opacity: 0,
                        delay: index * 0.1,
                        ease: "power2.out"
                    });
                }
            });
        }, { threshold: 0.1 });

        features.forEach(feature => observer.observe(feature));

        // Add hover animations to game feature cards
        features.forEach(feature => {
            feature.addEventListener('mouseenter', function() {
                gsap.to(this, { duration: 0.3, y: -8, ease: "power2.out" });
            });
            
            feature.addEventListener('mouseleave', function() {
                gsap.to(this, { duration: 0.3, y: 0, ease: "power2.out" });
            });
        });

        // Animate the call-to-action buttons
        const buttons = document.querySelectorAll('a[href*="game"]');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                gsap.to(this, { duration: 0.2, scale: 1.05, ease: "power2.out" });
            });
            
            button.addEventListener('mouseleave', function() {
                gsap.to(this, { duration: 0.2, scale: 1, ease: "power2.out" });
            });
        });
    });
</script>
@endsection
