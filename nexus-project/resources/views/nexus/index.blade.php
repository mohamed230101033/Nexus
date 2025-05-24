@extends('layouts.nexus')

@section('title', 'Nexus Project - Cybersecurity Portfolio Overview')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Hero Section -->
    <div class="text-center mb-16 animate-fade-in">
        <div class="inline-flex items-center px-4 py-2 bg-blue-500/20 rounded-full text-blue-300 text-sm font-medium mb-6">
            <i class="fas fa-shield-alt mr-2"></i>
            Cybersecurity Portfolio
        </div>
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
            Welcome to the <br>
            <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                Nexus Project
            </span>
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
            A comprehensive cybersecurity portfolio showcasing malware analysis, research projects, 
            and interactive security education through gaming.
        </p>
    </div>

    <!-- Navigation Cards -->
    <div class="grid md:grid-cols-3 gap-8 mb-16">
        <!-- First Semester Card -->
        <a href="{{ route('nexus.first-semester') }}" class="portfolio-card group">
            <div class="bg-gradient-to-br from-red-500/20 to-orange-500/20 p-6 rounded-2xl border border-red-500/20 hover:border-red-400/40 transition-all duration-300 h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-orange-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-bug text-white text-xl"></i>
                    </div>
                    <i class="fas fa-arrow-right text-gray-400 group-hover:text-white group-hover:translate-x-1 transition-all duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">First Semester</h3>
                <p class="text-gray-300 text-sm mb-4">Malware Analysis</p>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Deep dive into malware analysis techniques, reverse engineering, 
                    and threat detection methodologies.
                </p>
                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-xs">
                        Static Analysis
                    </span>
                    <span class="px-3 py-1 bg-orange-500/20 text-orange-300 rounded-full text-xs">
                        Dynamic Analysis
                    </span>
                </div>
            </div>
        </a>

        <!-- Second Semester Card -->
        <a href="{{ route('nexus.second-semester') }}" class="portfolio-card group">
            <div class="bg-gradient-to-br from-green-500/20 to-emerald-500/20 p-6 rounded-2xl border border-green-500/20 hover:border-green-400/40 transition-all duration-300 h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-microscope text-white text-xl"></i>
                    </div>
                    <i class="fas fa-arrow-right text-gray-400 group-hover:text-white group-hover:translate-x-1 transition-all duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Second Semester</h3>
                <p class="text-gray-300 text-sm mb-4">Research & Implementation</p>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Advanced research projects covering malware creation, detection systems, 
                    and comprehensive security analysis.
                </p>
                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-xs">
                        Research
                    </span>
                    <span class="px-3 py-1 bg-emerald-500/20 text-emerald-300 rounded-full text-xs">
                        Detection
                    </span>
                </div>
            </div>
        </a>

        <!-- NEXUS x MYC Card -->
        <a href="{{ route('nexus.myc-game') }}" class="portfolio-card group">
            <div class="bg-gradient-to-br from-purple-500/20 to-pink-500/20 p-6 rounded-2xl border border-purple-500/20 hover:border-purple-400/40 transition-all duration-300 h-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-gamepad text-white text-xl"></i>
                    </div>
                    <i class="fas fa-arrow-right text-gray-400 group-hover:text-white group-hover:translate-x-1 transition-all duration-300"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">NEXUS x MYC</h3>
                <p class="text-gray-300 text-sm mb-4">Interactive Security Education</p>
                <p class="text-gray-400 text-sm leading-relaxed">
                    "Mind Your Click" - An engaging cybersecurity education game 
                    teaching security awareness through interactive scenarios.
                </p>
                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs">
                        Gaming
                    </span>
                    <span class="px-3 py-1 bg-pink-500/20 text-pink-300 rounded-full text-xs">
                        Education
                    </span>
                </div>
            </div>
        </a>
    </div>

    <!-- Skills & Technologies -->
    <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10">
        <h2 class="text-2xl font-bold text-white mb-6 text-center">
            <i class="fas fa-code mr-3 text-blue-400"></i>
            Technologies & Skills
        </h2>
        <div class="grid md:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-shield-virus text-white text-2xl"></i>
                </div>
                <h3 class="text-white font-semibold mb-2">Malware Analysis</h3>
                <p class="text-gray-400 text-sm">Static & Dynamic Analysis</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-2xl flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-search text-white text-2xl"></i>
                </div>
                <h3 class="text-white font-semibold mb-2">Threat Detection</h3>
                <p class="text-gray-400 text-sm">Security Monitoring</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-2xl flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-code text-white text-2xl"></i>
                </div>
                <h3 class="text-white font-semibold mb-2">Development</h3>
                <p class="text-gray-400 text-sm">Laravel, JavaScript, PHP</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <h3 class="text-white font-semibold mb-2">Education</h3>
                <p class="text-gray-400 text-sm">Security Awareness</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate portfolio cards on scroll
        const cards = document.querySelectorAll('.portfolio-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    gsap.from(entry.target, {
                        duration: 0.6,
                        y: 30,
                        opacity: 0,
                        delay: index * 0.1,
                        ease: "power2.out"
                    });
                }
            });
        }, { threshold: 0.1 });

        cards.forEach(card => observer.observe(card));

        // Add hover animations to cards
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                gsap.to(this, { duration: 0.3, y: -5, ease: "power2.out" });
            });
            
            card.addEventListener('mouseleave', function() {
                gsap.to(this, { duration: 0.3, y: 0, ease: "power2.out" });
            });
        });
    });
</script>
@endsection
