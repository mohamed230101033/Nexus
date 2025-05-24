@extends('layouts.nexus')

@section('title', 'Second Semester - Research & Implementation')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-12 animate-fade-in">
        <div class="inline-flex items-center px-4 py-2 bg-green-500/20 rounded-full text-green-300 text-sm font-medium mb-6">
            <i class="fas fa-microscope mr-2"></i>
            Second Semester
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
            <span class="bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent">
                Research & Implementation
            </span>
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
            Advanced cybersecurity research covering malware development, detection systems, and comprehensive security analysis.
        </p>
    </div>

    <!-- Phase Navigation -->
    <div class="flex justify-center mb-12">
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-2 border border-white/10">
            <div class="flex space-x-2">
                <button onclick="showPhase('phase1')" id="phase1-btn" class="phase-btn active px-6 py-3 rounded-xl font-medium transition-all duration-300">
                    <i class="fas fa-search-plus mr-2"></i>
                    Phase 1: Research
                </button>
                <button onclick="showPhase('phase2')" id="phase2-btn" class="phase-btn px-6 py-3 rounded-xl font-medium transition-all duration-300">
                    <i class="fas fa-cogs mr-2"></i>
                    Phase 2: Implementation
                </button>
            </div>
        </div>
    </div>

    <!-- Phase 1: Research Points -->
    <div id="phase1" class="phase-content">
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 mb-8">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                <i class="fas fa-search-plus text-green-400 mr-3"></i>
                Phase 1: Research Points
            </h2>
            <p class="text-gray-300 mb-8">
                Comprehensive research covering five key areas of cybersecurity, each contributing to advanced understanding 
                of modern threat landscapes and defense mechanisms.
            </p>
            
            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Research Point 1 -->
                <div class="research-card bg-gradient-to-br from-blue-500/10 to-cyan-500/10 p-6 rounded-xl border border-blue-500/20">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-virus text-white text-xl"></i>
                        </div>
                        <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-xs font-medium">Point 1</span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Advanced Malware Families</h3>
                    <p class="text-gray-300 mb-4">
                        Deep analysis of emerging malware families, their evolution patterns, and attack vectors in modern cybersecurity landscape.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs">APT Groups</span>
                        <span class="px-3 py-1 bg-cyan-500/20 text-cyan-300 rounded-full text-xs">Zero-Days</span>
                        <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-xs">Nation-State</span>
                    </div>
                </div>

                <!-- Research Point 2 -->
                <div class="research-card bg-gradient-to-br from-purple-500/10 to-pink-500/10 p-6 rounded-xl border border-purple-500/20">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-network-wired text-white text-xl"></i>
                        </div>
                        <span class="bg-purple-500/20 text-purple-300 px-3 py-1 rounded-full text-xs font-medium">Point 2</span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Network Security Protocols</h3>
                    <p class="text-gray-300 mb-4">
                        Investigation of next-generation network security protocols and their effectiveness against sophisticated attacks.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs">TLS 1.3</span>
                        <span class="px-3 py-1 bg-pink-500/20 text-pink-300 rounded-full text-xs">DNS-over-HTTPS</span>
                        <span class="px-3 py-1 bg-violet-500/20 text-violet-300 rounded-full text-xs">QUIC</span>
                    </div>
                </div>

                <!-- Research Point 3 -->
                <div class="research-card bg-gradient-to-br from-green-500/10 to-teal-500/10 p-6 rounded-xl border border-green-500/20">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-robot text-white text-xl"></i>
                        </div>
                        <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-xs font-medium">Point 3</span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">AI-Powered Threat Detection</h3>
                    <p class="text-gray-300 mb-4">
                        Research on machine learning and AI applications in cybersecurity for automated threat detection and response.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-xs">Machine Learning</span>
                        <span class="px-3 py-1 bg-teal-500/20 text-teal-300 rounded-full text-xs">Behavioral Analysis</span>
                        <span class="px-3 py-1 bg-emerald-500/20 text-emerald-300 rounded-full text-xs">SOAR</span>
                    </div>
                </div>

                <!-- Research Point 4 -->
                <div class="research-card bg-gradient-to-br from-orange-500/10 to-red-500/10 p-6 rounded-xl border border-orange-500/20">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-cloud text-white text-xl"></i>
                        </div>
                        <span class="bg-orange-500/20 text-orange-300 px-3 py-1 rounded-full text-xs font-medium">Point 4</span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Cloud Security Architecture</h3>
                    <p class="text-gray-300 mb-4">
                        Analysis of cloud-native security solutions and their implementation in hybrid infrastructure environments.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-orange-500/20 text-orange-300 rounded-full text-xs">Zero Trust</span>
                        <span class="px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-xs">Container Security</span>
                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-300 rounded-full text-xs">DevSecOps</span>
                    </div>
                </div>

                <!-- Research Point 5 -->
                <div class="research-card bg-gradient-to-br from-indigo-500/10 to-blue-500/10 p-6 rounded-xl border border-indigo-500/20 lg:col-span-2">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                        <span class="bg-indigo-500/20 text-indigo-300 px-3 py-1 rounded-full text-xs font-medium">Point 5</span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3">Quantum Cryptography & Post-Quantum Security</h3>
                    <p class="text-gray-300 mb-4">
                        Forward-looking research into quantum-resistant cryptographic algorithms and their implications for future cybersecurity infrastructure.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-xs">Quantum Computing</span>
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs">Post-Quantum Crypto</span>
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs">NIST Standards</span>
                        <span class="px-3 py-1 bg-cyan-500/20 text-cyan-300 rounded-full text-xs">Future-Proofing</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Phase 2: Implementation -->
    <div id="phase2" class="phase-content hidden">
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 mb-8">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                <i class="fas fa-cogs text-emerald-400 mr-3"></i>
                Phase 2: Implementation
            </h2>
            <p class="text-gray-300 mb-8">
                Practical implementation phase divided into three comprehensive parts: malware creation for research, 
                detection and defense mechanisms, and statistical analysis of security threats.
            </p>
            
            <div class="space-y-8">
                <!-- Part 1: Creating Malware/Simulations -->
                <div class="implementation-card bg-gradient-to-br from-red-500/10 to-pink-500/10 p-8 rounded-xl border border-red-500/20">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-semibold text-white mb-2 flex items-center">
                                <i class="fas fa-code text-red-400 mr-3"></i>
                                Part 1: Creating Malware & Simulations
                            </h3>
                            <p class="text-gray-300">Ethical malware development for educational and research purposes in controlled environments.</p>
                        </div>
                        <span class="bg-red-500/20 text-red-300 px-4 py-2 rounded-full text-sm font-medium">Research Only</span>
                    </div>
                    
                    <div class="grid md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-black/20 p-4 rounded-lg">
                            <i class="fas fa-bug text-red-400 text-2xl mb-3"></i>
                            <h4 class="text-white font-semibold mb-2">Proof of Concept Malware</h4>
                            <p class="text-gray-400 text-sm">Developing PoC malware samples to understand attack vectors and payload delivery mechanisms.</p>
                        </div>
                        <div class="bg-black/20 p-4 rounded-lg">
                            <i class="fas fa-desktop text-orange-400 text-2xl mb-3"></i>
                            <h4 class="text-white font-semibold mb-2">Attack Simulations</h4>
                            <p class="text-gray-400 text-sm">Creating realistic attack scenarios for testing defense mechanisms and incident response procedures.</p>
                        </div>
                        <div class="bg-black/20 p-4 rounded-lg">
                            <i class="fas fa-flask text-yellow-400 text-2xl mb-3"></i>
                            <h4 class="text-white font-semibold mb-2">Controlled Testing</h4>
                            <p class="text-gray-400 text-sm">Isolated lab environment testing to ensure safety and prevent accidental deployment.</p>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-xs">Ethical Hacking</span>
                        <span class="px-3 py-1 bg-orange-500/20 text-orange-300 rounded-full text-xs">Sandboxed Environment</span>
                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-300 rounded-full text-xs">Research Ethics</span>
                        <span class="px-3 py-1 bg-pink-500/20 text-pink-300 rounded-full text-xs">Academic Purpose</span>
                    </div>
                </div>

                <!-- Part 2: Detection/Defense -->
                <div class="implementation-card bg-gradient-to-br from-blue-500/10 to-cyan-500/10 p-8 rounded-xl border border-blue-500/20">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-semibold text-white mb-2 flex items-center">
                                <i class="fas fa-shield-alt text-blue-400 mr-3"></i>
                                Part 2: Detection & Defense
                            </h3>
                            <p class="text-gray-300">Advanced detection systems and defensive mechanisms against modern cyber threats.</p>
                        </div>
                        <span class="bg-blue-500/20 text-blue-300 px-4 py-2 rounded-full text-sm font-medium">Defense Systems</span>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-4">Detection Technologies</h4>
                            <div class="space-y-3">
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-search text-blue-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">Behavioral Analytics</div>
                                        <div class="text-gray-400 text-sm">AI-powered anomaly detection</div>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-fingerprint text-cyan-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">Signature-based Detection</div>
                                        <div class="text-gray-400 text-sm">Pattern matching and heuristics</div>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-network-wired text-purple-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">Network Traffic Analysis</div>
                                        <div class="text-gray-400 text-sm">Deep packet inspection</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-4">Defense Mechanisms</h4>
                            <div class="space-y-3">
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-wall-brick text-green-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">Next-Gen Firewalls</div>
                                        <div class="text-gray-400 text-sm">Application-aware filtering</div>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-eye text-yellow-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">EDR Solutions</div>
                                        <div class="text-gray-400 text-sm">Endpoint detection & response</div>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-robot text-orange-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">Automated Response</div>
                                        <div class="text-gray-400 text-sm">SOAR platform integration</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Part 3: Analysis/Statistics -->
                <div class="implementation-card bg-gradient-to-br from-purple-500/10 to-indigo-500/10 p-8 rounded-xl border border-purple-500/20">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-semibold text-white mb-2 flex items-center">
                                <i class="fas fa-chart-line text-purple-400 mr-3"></i>
                                Part 3: Analysis & Statistics
                            </h3>
                            <p class="text-gray-300">Comprehensive statistical analysis and data visualization of cybersecurity metrics and trends.</p>
                        </div>
                        <span class="bg-purple-500/20 text-purple-300 px-4 py-2 rounded-full text-sm font-medium">Data Science</span>
                    </div>
                    
                    <div class="grid md:grid-cols-4 gap-6 mb-6">
                        <div class="text-center bg-black/20 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-purple-400 mb-2">500+</div>
                            <div class="text-gray-300 text-sm">Threat Samples Analyzed</div>
                        </div>
                        <div class="text-center bg-black/20 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-blue-400 mb-2">95%</div>
                            <div class="text-gray-300 text-sm">Detection Accuracy</div>
                        </div>
                        <div class="text-center bg-black/20 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-green-400 mb-2">15</div>
                            <div class="text-gray-300 text-sm">Statistical Models</div>
                        </div>
                        <div class="text-center bg-black/20 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-yellow-400 mb-2">24/7</div>
                            <div class="text-gray-300 text-sm">Monitoring Coverage</div>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs">Statistical Analysis</span>
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs">Data Visualization</span>
                        <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-xs">Threat Intelligence</span>
                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-300 rounded-full text-xs">Risk Assessment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function showPhase(phase) {
        // Hide all phases
        document.querySelectorAll('.phase-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active class from all buttons
        document.querySelectorAll('.phase-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Show selected phase
        document.getElementById(phase).classList.remove('hidden');
        document.getElementById(phase + '-btn').classList.add('active');
        
        // Animate the content
        gsap.from(`#${phase}`, {
            duration: 0.5,
            y: 30,
            opacity: 0,
            ease: "power2.out"
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Animate research cards and implementation cards on scroll
        const cards = document.querySelectorAll('.research-card, .implementation-card');
        
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

        cards.forEach(card => observer.observe(card));
    });
</script>

<style>
    .phase-btn {
        @apply text-gray-300 hover:text-white hover:bg-white/10;
    }
    
    .phase-btn.active {
        @apply bg-gradient-to-r from-green-500 to-emerald-500 text-white;
    }
</style>
@endsection
