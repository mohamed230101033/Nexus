@extends('layouts.nexus')

@section('title', 'Second Semester - Phase 2 | Nexus')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        color: #ffffff;
        font-family: 'Inter', sans-serif;
        line-height: 1.6;
    }

    .main-container {
        position: relative;
        z-index: 10;
        min-height: 100vh;
    }

    .hero-section {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.05));
        border-radius: 24px;
        padding: 4rem 2rem;
        margin-bottom: 4rem;
        text-align: center;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #ef4444, #dc2626, #fca5a5);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: #94a3b8;
        max-width: 600px;
        margin: 0 auto 2rem;
    }

    .phase-navigation {
        background: rgba(17, 24, 39, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(75, 85, 99, 0.3);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 4rem;
        text-align: center;
    }

    .phase-nav-title {
        font-size: 2rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 1rem;
    }

    .phase-nav-description {
        color: #94a3b8;
        margin-bottom: 2rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .phase-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .phase-btn {
        padding: 0.75rem 2rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .phase-btn.inactive {
        background: rgba(75, 85, 99, 0.3);
        color: #9ca3af;
        border-color: rgba(75, 85, 99, 0.5);
    }

    .phase-btn.inactive:hover {
        background: rgba(75, 85, 99, 0.5);
        color: #ffffff;
        border-color: rgba(75, 85, 99, 0.8);
        transform: translateY(-2px);
    }

    .phase-btn.active {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: #ffffff;
        border-color: #ef4444;
        box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
    }

    .phase-btn.active:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(239, 68, 68, 0.4);
    }

    .research-domains {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .domain-card {
        background: rgba(17, 24, 39, 0.6);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(75, 85, 99, 0.3);
        border-radius: 20px;
        padding: 2rem;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .domain-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, transparent, rgba(239, 68, 68, 0.1));
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
    }

    .domain-card:hover::before {
        opacity: 1;
    }

    .domain-card:hover {
        transform: translateY(-8px);
        border-color: rgba(239, 68, 68, 0.5);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .domain-card > * {
        position: relative;
        z-index: 2;
    }

    .card-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        color: white;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 1rem;
    }

    .card-description {
        color: #94a3b8;
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }

    .card-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .tag {
        background: rgba(239, 68, 68, 0.2);
        color: #fca5a5;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .card-button {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .card-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
    }

    .malware-card, .defense-tool, .risk-category {
        transition: all 0.3s ease;
    }

    .malware-card:hover, .defense-tool:hover {
        transform: translateY(-5px);
    }

    .stat-item {
        margin-bottom: 1rem;
    }

    .progress-bar {
        transition: width 2s ease-in-out;
    }

    .counter {
        transition: all 0.3s ease;
    }

    .metric-card {
        transition: all 0.3s ease;
    }    .metric-card:hover {
        transform: translateY(-5px);
    }

    .screenshot-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1rem;
        margin: 2rem 0;
    }

    .screenshot-item {
        background: rgba(17, 24, 39, 0.5);
        border: 1px solid rgba(75, 85, 99, 0.3);
        border-radius: 10px;
        padding: 1rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .screenshot-item:hover {
        border-color: rgba(239, 68, 68, 0.5);
        transform: translateY(-2px);
    }

    .screenshot-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 0.5rem;
    }

    .code-section {
        background: rgba(17, 24, 39, 0.7);
        border: 1px solid rgba(75, 85, 99, 0.3);
        border-radius: 10px;
        padding: 1.5rem;
        margin: 1rem 0;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.9rem;
    }

    .feature-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin: 1.5rem 0;
    }

    .feature-item {
        background: rgba(17, 24, 39, 0.5);
        border: 1px solid rgba(75, 85, 99, 0.3);
        border-radius: 8px;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .feature-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .tabs {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        border-bottom: 1px solid rgba(75, 85, 99, 0.3);
    }

    .tab {
        padding: 0.75rem 1.5rem;
        background: transparent;
        border: none;
        color: #94a3b8;
        cursor: pointer;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .tab.active {
        color: #ef4444;
        border-bottom-color: #ef4444;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .phase-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .research-domains {
            grid-template-columns: 1fr;
        }

        .screenshot-gallery {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="main-container">
    <!-- Hero Section -->
    <section class="hero-section">
        <h1 class="hero-title">Second Semester</h1>
        <h2 class="text-3xl md:text-4xl font-semibold mb-6 text-white">Phase 2: Advanced Implementation</h2>
        <p class="hero-subtitle">Three Specialized Areas: Creation, Defense, and Analysis</p>
        <div class="mt-8 flex items-center justify-center space-x-2 text-gray-400">
            <i class="fas fa-calendar-alt"></i>
            <span>Academic Period: April 2025 - June 2025</span>
        </div>
    </section>

    <!-- Phase Navigation -->
    <section class="phase-navigation">
        <h3 class="phase-nav-title">Phase Selection</h3>
        <p class="phase-nav-description">
            Building upon Phase 1 foundations, this phase focuses on practical implementation across three critical domains: 
            ethical malware creation for educational purposes, advanced detection and defense mechanisms, 
            and comprehensive statistical analysis of cybersecurity trends.
        </p>
        <div class="phase-buttons">
            <a href="{{ route('nexus.second-semester-phase1') }}" class="phase-btn inactive">
                <i class="fas fa-search"></i>
                Phase 1: Foundation Research
            </a>
            <a href="{{ route('nexus.second-semester-phase2') }}" class="phase-btn active">
                <i class="fas fa-cogs"></i>
                Phase 2: Advanced Implementation
            </a>
        </div>
    </section>

    <!-- Phase 2 Sub-Modules -->
    <section class="py-20">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-6">Phase 2: Three Core Sub-Modules</h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Advanced implementation across malware development, defense systems, and comprehensive analysis
            </p>
        </div>
        
        <!-- Sub-Module 1: Malware and Injections -->
        <div id="malware-injections" class="mb-20">
            <div class="bg-gray-800 rounded-xl p-8 border border-red-500 mb-8">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-red-600 rounded-lg flex items-center justify-center mr-6">
                        <i class="fas fa-virus text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-white">Sub-Module 1: Malware and Injections</h3>
                        <p class="text-red-400 font-semibold">Interactive Educational Malware Components</p>
                    </div>
                </div>                <!-- Interactive Cards Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Card 1: Ransomware Core -->
                    <div class="malware-card bg-gradient-to-br from-red-900/40 to-orange-900/40 border border-red-500/50 rounded-lg p-6 hover:border-red-400 hover:shadow-lg hover:shadow-red-500/20 transition-all duration-300 cursor-pointer group" onclick="window.location.href='{{ route('nexus.ransomware-core') }}'">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-500 transition-colors">
                                <i class="fas fa-lock text-white text-2xl"></i>
                            </div>
                            <h4 class="text-lg font-bold text-white mb-3">Ransomware Core</h4>
                            <p class="text-gray-300 text-sm mb-4">AES-256 encryption implementation with educational C2 protocols</p>
                            <div class="space-y-2 text-xs text-gray-400">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-code mr-2"></i>
                                    <span>Python/Flask</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-shield-alt mr-2"></i>
                                    <span>Educational Only</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-red-500/30">
                            <button class="w-full bg-red-600/20 hover:bg-red-600/40 text-red-300 hover:text-white font-semibold py-2 px-4 rounded transition-all duration-300">
                                Explore Implementation
                            </button>
                        </div>
                    </div>

                    <!-- Card 2: Remote Access Trojans -->
                    <div class="malware-card bg-gradient-to-br from-purple-900/40 to-pink-900/40 border border-purple-500/50 rounded-lg p-6 hover:border-purple-400 hover:shadow-lg hover:shadow-purple-500/20 transition-all duration-300 cursor-pointer group" onclick="window.location.href='{{ route('nexus.remote-access-trojans') }}'">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-500 transition-colors">
                                <i class="fas fa-desktop text-white text-2xl"></i>
                            </div>
                            <h4 class="text-lg font-bold text-white mb-3">Remote Access Trojans</h4>
                            <p class="text-gray-300 text-sm mb-4">Advanced remote control via TheFatRat and Meterpreter</p>
                            <div class="space-y-2 text-xs text-gray-400">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-code mr-2"></i>
                                    <span>Metasploit/Python</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-globe mr-2"></i>
                                    <span>Reverse TCP</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-purple-500/30">
                            <button class="w-full bg-purple-600/20 hover:bg-purple-600/40 text-purple-300 hover:text-white font-semibold py-2 px-4 rounded transition-all duration-300">
                                Explore Implementation
                            </button>
                        </div>
                    </div>

                    <!-- Card 3: RAT & Net Nuker -->
                    <div class="malware-card bg-gradient-to-br from-blue-900/40 to-cyan-900/40 border border-blue-500/50 rounded-lg p-6 hover:border-blue-400 hover:shadow-lg hover:shadow-blue-500/20 transition-all duration-300 cursor-pointer group" onclick="window.location.href='{{ route('nexus.rat-net-nuker') }}'">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-500 transition-colors">
                                <i class="fas fa-network-wired text-white text-2xl"></i>
                            </div>
                            <h4 class="text-lg font-bold text-white mb-3">RAT & Net Nuker</h4>
                            <p class="text-gray-300 text-sm mb-4">Discord server destruction with credential harvesting</p>
                            <div class="space-y-2 text-xs text-gray-400">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-code mr-2"></i>
                                    <span>Python/Discord API</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-user-shield mr-2"></i>
                                    <span>Info Stealer</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-blue-500/30">
                            <button class="w-full bg-blue-600/20 hover:bg-blue-600/40 text-blue-300 hover:text-white font-semibold py-2 px-4 rounded transition-all duration-300">
                                Explore Implementation
                            </button>
                        </div>
                    </div>

                    <!-- Card 4: ZPhishing -->
                    <div class="malware-card bg-gradient-to-br from-green-900/40 to-emerald-900/40 border border-green-500/50 rounded-lg p-6 hover:border-green-400 hover:shadow-lg hover:shadow-green-500/20 transition-all duration-300 cursor-pointer group" onclick="window.location.href='{{ route('nexus.zphishing') }}'">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-500 transition-colors">
                                <i class="fas fa-fish text-white text-2xl"></i>
                            </div>
                            <h4 class="text-lg font-bold text-white mb-3">ZPhishing</h4>
                            <p class="text-gray-300 text-sm mb-4">Advanced social engineering and credential harvesting</p>
                            <div class="space-y-2 text-xs text-gray-400">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-code mr-2"></i>
                                    <span>HTML/PHP/JS</span>
                                </div>
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-mask mr-2"></i>
                                    <span>Social Engineering</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-green-500/30">
                            <button class="w-full bg-green-600/20 hover:bg-green-600/40 text-green-300 hover:text-white font-semibold py-2 px-4 rounded transition-all duration-300">
                                Explore Implementation
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Ethical Notice -->
                <div class="bg-red-900/20 border border-red-500 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-exclamation-triangle text-yellow-400 text-2xl mr-4"></i>
                        <h5 class="text-xl font-semibold text-white">Educational Research Framework</h5>
                    </div>
                    <p class="text-gray-300 mb-4">
                        All malware components are developed exclusively for educational cybersecurity research and defensive analysis. 
                        Each implementation is carefully designed to demonstrate security vulnerabilities while maintaining strict ethical guidelines.
                    </p>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="flex items-center justify-center bg-gray-800/50 rounded-lg p-3">
                            <i class="fas fa-flask text-blue-400 mr-3"></i>
                            <span class="text-gray-300">Controlled Environment</span>
                        </div>
                        <div class="flex items-center justify-center bg-gray-800/50 rounded-lg p-3">
                            <i class="fas fa-graduation-cap text-green-400 mr-3"></i>
                            <span class="text-gray-300">Academic Purpose</span>
                        </div>
                        <div class="flex items-center justify-center bg-gray-800/50 rounded-lg p-3">
                            <i class="fas fa-shield-alt text-purple-400 mr-3"></i>
                            <span class="text-gray-300">Defense Focus</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- Sub-Module 2: Detection and Defence -->
        <div id="detection-defence" class="mb-20">
            <div class="bg-gray-800 rounded-xl p-8 border border-green-500 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-green-600 rounded-lg flex items-center justify-center mr-6">
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-white">Sub-Module 2: Detection and Defence</h3>
                            <p class="text-green-400 font-semibold">Advanced Security Monitoring and Threat Detection Systems</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Card -->
                <div class="bg-gradient-to-br from-green-900/50 to-emerald-800/50 rounded-lg p-8 border border-green-500/30 hover:border-green-400 transition-all duration-300 transform hover:scale-105">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                            <i class="fas fa-external-link-alt text-white text-2xl"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-4">Explore Detection & Defence</h4>
                        <p class="text-green-200 mb-6 leading-relaxed max-w-2xl mx-auto">
                            Dive into comprehensive endpoint detection and response systems featuring Wazuh SIEM, 
                            Suricata IDS, and YARA rules. Experience real-time security dashboards, threat analytics, 
                            and unified detection workflows in an immersive learning environment.
                        </p>
                        
                        <div class="grid md:grid-cols-3 gap-4 mb-8">
                            <div class="bg-green-900/30 rounded-lg p-4 border border-green-500/20">
                                <i class="fas fa-server text-green-400 text-2xl mb-2"></i>
                                <h5 class="text-green-300 font-semibold">Wazuh SIEM</h5>
                                <p class="text-green-200 text-sm">Centralized security monitoring</p>
                            </div>
                            <div class="bg-green-900/30 rounded-lg p-4 border border-green-500/20">
                                <i class="fas fa-network-wired text-green-400 text-2xl mb-2"></i>
                                <h5 class="text-green-300 font-semibold">Suricata IDS</h5>
                                <p class="text-green-200 text-sm">Network intrusion detection</p>
                            </div>
                            <div class="bg-green-900/30 rounded-lg p-4 border border-green-500/20">
                                <i class="fas fa-search text-green-400 text-2xl mb-2"></i>
                                <h5 class="text-green-300 font-semibold">YARA Rules</h5>
                                <p class="text-green-200 text-sm">Malware pattern matching</p>
                            </div>
                        </div>

                        <a href="{{ route('nexus.edr-detection-defence') }}" 
                           class="inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-shield-alt mr-3"></i>
                            Launch Detection & Defence Module
                            <i class="fas fa-arrow-right ml-3"></i>
                        </a>
                    </div>
                </div>

                <!-- Educational Notice -->
                <div class="bg-green-900 bg-opacity-30 border border-green-500/50 rounded-lg p-4 mt-6">
                    <div class="flex items-center">
                        <i class="fas fa-graduation-cap text-green-400 text-xl mr-3"></i>
                        <div>
                            <h5 class="text-green-300 font-semibold">Educational Framework</h5>
                            <p class="text-green-200 text-sm">This module demonstrates defensive security tools within an ethical learning environment. All tools and techniques are presented for educational purposes only.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Sub-Module 3: Analysis & Detection -->
        <div id="analysis-detection" class="mb-20">
            <div class="bg-gray-800 rounded-xl p-8 border border-yellow-500 mb-8">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-yellow-600 rounded-lg flex items-center justify-center mr-6">
                        <i class="fas fa-chart-bar text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-white">Sub-Module 3: Analysis & Detection</h3>
                        <p class="text-yellow-400 font-semibold">Comprehensive Malware Analysis and Statistical Insights</p>
                    </div>
                </div>
                
                <div class="grid lg:grid-cols-2 gap-8">
                    
                        </div>
                        
                        <!-- APK Analysis Navigation Card -->
                        <div class="mt-8">
                            <a href="{{ route('nexus.analysis-detection-apk') }}" 
                               class="block bg-gradient-to-r from-red-900/30 to-pink-900/30 rounded-lg p-8 border border-red-500/50 hover:border-red-400 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl group">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-pink-500 rounded-full flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-2xl font-bold text-red-400 mb-2">Comprehensive APK Analysis Framework</h5>
                                            <p class="text-red-100 text-sm mb-3">
                                                Detailed security analysis of 6 high-risk APK files with comprehensive vulnerability assessments
                                            </p>
                                            <div class="flex items-center space-x-6 text-sm">
                                                <div class="flex items-center">
                                                    <i class="fas fa-mobile-alt text-red-400 mr-2"></i>
                                                    <span class="text-red-200">6 High-Risk APKs</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <i class="fas fa-bug text-red-400 mr-2"></i>
                                                    <span class="text-red-200">StrandHogg 2.0 Analysis</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <i class="fas fa-folder text-red-400 mr-2"></i>
                                                    <span class="text-red-200">Risk Categories</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-red-400 group-hover:text-red-300 transition-colors duration-300">
                                        <i class="fas fa-arrow-right text-2xl group-hover:translate-x-2 transition-transform duration-300"></i>
                                    </div>
                                </div>
                                
                                <div class="mt-6 pt-6 border-t border-red-500/30">
                                    <div class="grid md:grid-cols-3 gap-4">
                                        <div class="bg-red-900/30 rounded-lg p-4 border border-red-500/40">
                                            <div class="text-red-400 font-semibold text-sm">Gmail2, GmsCore</div>
                                            <div class="text-red-200 text-xs">Critical security vulnerabilities</div>
                                        </div>
                                        <div class="bg-orange-900/30 rounded-lg p-4 border border-orange-500/40">
                                            <div class="text-orange-400 font-semibold text-sm">Photos, Velvet</div>
                                            <div class="text-orange-200 text-xs">Component exposure risks</div>
                                        </div>
                                        <div class="bg-yellow-900/30 rounded-lg p-4 border border-yellow-500/40">
                                            <div class="text-yellow-400 font-semibold text-sm">Videos, YouTube</div>
                                            <div class="text-yellow-200 text-xs">Permission & cryptography issues</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4 text-center">
                                    <span class="inline-flex items-center bg-red-600/20 text-red-300 text-sm font-medium px-4 py-2 rounded-full border border-red-500/40">
                                        <i class="fas fa-external-link-alt mr-2"></i>
                                        View Detailed APK Analysis Framework
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Statistics Navigation Card -->
                    <div class="statistics-navigation">
                        <h4 class="text-2xl font-bold text-white mb-6">Statistical Analysis & Survey Results</h4>
                        
                        <a href="{{ route('nexus.analysis-detection-statistics') }}" 
                           class="block bg-gradient-to-r from-yellow-900/30 to-orange-900/30 rounded-lg p-8 border border-yellow-500/50 hover:border-yellow-400 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl group">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mr-6 group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-chart-bar text-white text-2xl"></i>
                                    </div>
                                    <div>
                                        <h5 class="text-2xl font-bold text-yellow-400 mb-2">Comprehensive Survey Statistics</h5>
                                        <p class="text-yellow-100 text-sm mb-3">
                                            Detailed analysis from 40 cybersecurity professionals including majors, doctors, and engineers
                                        </p>
                                        <div class="flex items-center space-x-6 text-sm">
                                            <div class="flex items-center">
                                                <i class="fas fa-users text-yellow-400 mr-2"></i>
                                                <span class="text-yellow-200">40 Participants</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-question-circle text-yellow-400 mr-2"></i>
                                                <span class="text-yellow-200">3 Key Questions</span>
                                            </div>
                                            <div class="flex items-center">
                                                <i class="fas fa-check-circle text-yellow-400 mr-2"></i>
                                                <span class="text-yellow-200">100% Response Rate</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-yellow-400 group-hover:text-yellow-300 transition-colors duration-300">
                                    <i class="fas fa-arrow-right text-2xl group-hover:translate-x-2 transition-transform duration-300"></i>
                                </div>
                            </div>
                            
                            <div class="mt-6 pt-6 border-t border-yellow-500/30">
                                <div class="grid md:grid-cols-3 gap-4">
                                    <div class="bg-red-900/30 rounded-lg p-4 border border-red-500/40">
                                        <div class="text-red-400 font-semibold text-sm">Survey Question 1</div>
                                        <div class="text-red-200 text-xs">How did most people get hacked?</div>
                                    </div>
                                    <div class="bg-blue-900/30 rounded-lg p-4 border border-blue-500/40">
                                        <div class="text-blue-400 font-semibold text-sm">Survey Question 2</div>
                                        <div class="text-blue-200 text-xs">What actions did they take?</div>
                                    </div>
                                    <div class="bg-green-900/30 rounded-lg p-4 border border-green-500/40">
                                        <div class="text-green-400 font-semibold text-sm">Survey Question 3</div>
                                        <div class="text-green-200 text-xs">Steps to protect themselves</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 text-center">
                                <span class="inline-flex items-center bg-yellow-600/20 text-yellow-300 text-sm font-medium px-4 py-2 rounded-full border border-yellow-500/40">
                                    <i class="fas fa-external-link-alt mr-2"></i>
                                    View Detailed Statistics & Analysis
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- Research Deliverables -->
    <section class="py-20 bg-gray-800/50 rounded-xl">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-6">Phase 2 Deliverables</h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Expected outcomes and deliverables from Phase 2 implementation work
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-900 rounded-xl p-6 border border-gray-700 text-center hover:border-red-500 transition-all duration-300">
                <i class="fas fa-laptop-code text-red-400 text-3xl mb-4"></i>
                <h3 class="text-lg font-semibold text-white mb-2">Simulation Platform</h3>
                <p class="text-gray-400 text-sm">Complete educational malware simulation environment</p>
            </div>
            
            <div class="bg-gray-900 rounded-xl p-6 border border-gray-700 text-center hover:border-green-500 transition-all duration-300">
                <i class="fas fa-shield text-green-400 text-3xl mb-4"></i>
                <h3 class="text-lg font-semibold text-white mb-2">Defense System</h3>
                <p class="text-gray-400 text-sm">Comprehensive detection and response framework</p>
            </div>
            
            <div class="bg-gray-900 rounded-xl p-6 border border-gray-700 text-center hover:border-yellow-500 transition-all duration-300">
                <i class="fas fa-chart-pie text-yellow-400 text-3xl mb-4"></i>
                <h3 class="text-lg font-semibold text-white mb-2">Analytics Dashboard</h3>
                <p class="text-gray-400 text-sm">Interactive statistical analysis and visualization tools</p>
            </div>
            
            <div class="bg-gray-900 rounded-xl p-6 border border-gray-700 text-center hover:border-purple-500 transition-all duration-300">
                <i class="fas fa-file-alt text-purple-400 text-3xl mb-4"></i>
                <h3 class="text-lg font-semibold text-white mb-2">Research Report</h3>
                <p class="text-gray-400 text-sm">Comprehensive documentation of findings and methodologies</p>
            </div>
        </div>
    </section>

    <!-- Integration with Phase 1 -->
    <section class="py-20">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-6">Integration with Phase 1</h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                How Phase 2 builds upon and extends Phase 1 foundation research
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gray-800 rounded-xl p-8 border border-gray-700">
                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-link text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">Foundation Application</h3>
                <p class="text-gray-300">
                    Phase 1 research provides the theoretical foundation that directly informs 
                    the practical implementations in Phase 2's three specialized areas.
                </p>
            </div>
            
            <div class="bg-gray-800 rounded-xl p-8 border border-gray-700">
                <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-arrows-alt text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">Cross-Reference</h3>
                <p class="text-gray-300">
                    Continuous cross-referencing between Phase 1 findings and Phase 2 
                    implementations ensures theoretical accuracy and practical relevance.
                </p>
            </div>
            
            <div class="bg-gray-800 rounded-xl p-8 border border-gray-700">
                <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">Enhanced Analysis</h3>
                <p class="text-gray-300">
                    Phase 2's expanded analysis capabilities build upon Phase 1 data, 
                    providing deeper insights and more comprehensive statistical understanding.
                </p>
            </div>
        </div>
    </section>
                    implementations ensures theoretical accuracy and practical relevance.
                </p>
            </div>
            
            <div class="bg-gray-800 rounded-xl p-8 border border-gray-700"></div>
                <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-white mb-4">Enhanced Analysis</h3>
                <p class="text-gray-300">
                    Phase 2's expanded analysis capabilities build upon Phase 1 data, 
                    providing deeper insights and more comprehensive statistical understanding.
                </p>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate progress bars
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => {
            bar.style.width = width;
        }, 500);
    });
});

// Image modal functionality for survey statistics
function openImageModal(img) {
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 cursor-pointer';
    modal.onclick = () => modal.remove();
    
    const modalImg = document.createElement('img');
    modalImg.src = img.src;
    modalImg.alt = img.alt;
    modalImg.className = 'max-w-[90vw] max-h-[90vh] object-contain rounded-lg shadow-2xl';
    
    const closeBtn = document.createElement('button');
    closeBtn.innerHTML = '<i class="fas fa-times"></i>';
    closeBtn.className = 'absolute top-4 right-4 text-white text-2xl bg-gray-800 hover:bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center transition-colors';
    closeBtn.onclick = (e) => {
        e.stopPropagation();
        modal.remove();
    };
    
    modal.appendChild(modalImg);
    modal.appendChild(closeBtn);
    document.body.appendChild(modal);
    
    // Add escape key handler
    const escHandler = (e) => {
        if (e.key === 'Escape') {
            modal.remove();
            document.removeEventListener('keydown', escHandler);
        }
    };
    document.addEventListener('keydown', escHandler);
}
</script>
@endpush
