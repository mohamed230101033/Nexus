@extends('layouts.nexus')

@section('title', 'NEXUS - Second Semester | Ultra Advanced Research Network')

@push('styles')
<style>
    /* Ultra Advanced Animated Background */
    .ultra-gradient-bg {
        background: 
            radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%),
            linear-gradient(135deg, #0f0f23 0%, #1a1a2e 25%, #16213e 50%, #0f0f23 75%, #1a1a2e 100%);
        background-size: 400% 400%, 400% 400%, 400% 400%, 200% 200%;
        animation: 
            ultraGradientShift 20s ease infinite,
            pulseGlow 8s ease-in-out infinite alternate;
        position: relative;
        min-height: 100vh;
    }
    
    @keyframes ultraGradientShift {
        0%, 100% { background-position: 0% 50%, 100% 50%, 50% 0%, 0% 50%; }
        25% { background-position: 100% 50%, 0% 50%, 100% 100%, 100% 50%; }
        50% { background-position: 50% 100%, 50% 0%, 0% 50%, 50% 100%; }
        75% { background-position: 0% 50%, 100% 100%, 50% 50%, 0% 0%; }
    }
    
    @keyframes pulseGlow {
        0% { filter: brightness(1) contrast(1); }
        100% { filter: brightness(1.1) contrast(1.2); }
    }
    
    /* Floating Particles Animation */
    .floating-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        overflow: hidden;
        z-index: 1;
    }
    
    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: linear-gradient(45deg, #60a5fa, #a78bfa, #f472b6);
        border-radius: 50%;
        animation: floatParticle 15s infinite linear;
        opacity: 0.6;
    }
    
    @keyframes floatParticle {
        0% {
            transform: translateY(100vh) translateX(0) scale(0);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100px) translateX(100px) scale(1);
            opacity: 0;
        }
    }
    
    /* Central Hub - Struggling to Connect */
    .central-hub {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotateX(20deg);
        width: 150px;
        height: 150px;
        background: 
            radial-gradient(circle at 30% 30%, rgba(59, 130, 246, 0.8), transparent 50%),
            radial-gradient(circle at 70% 70%, rgba(147, 51, 234, 0.6), transparent 50%),
            conic-gradient(from 0deg, #3b82f6, #8b5cf6, #f59e0b, #ef4444, #3b82f6);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        animation: 
            disconnectedPulse 3s ease-in-out infinite,
            rotateHub 20s linear infinite,
            floatingHub 6s ease-in-out infinite alternate;
        box-shadow: 
            0 0 80px rgba(59, 130, 246, 0.6),
            0 0 120px rgba(147, 51, 234, 0.4),
            inset 0 0 40px rgba(255, 255, 255, 0.1);
        border: 4px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
    }
    
    @keyframes disconnectedPulse {
        0%, 100% { 
            box-shadow: 
                0 0 80px rgba(59, 130, 246, 0.6),
                0 0 120px rgba(147, 51, 234, 0.4),
                0 0 160px rgba(239, 68, 68, 0.2),
                inset 0 0 40px rgba(255, 255, 255, 0.1);
        }
        50% { 
            box-shadow: 
                0 0 120px rgba(59, 130, 246, 0.9),
                0 0 180px rgba(147, 51, 234, 0.7),
                0 0 220px rgba(239, 68, 68, 0.4),
                inset 0 0 60px rgba(255, 255, 255, 0.2);
        }
    }
    
    @keyframes rotateHub {
        0% { transform: translate(-50%, -50%) rotateX(20deg) rotateZ(0deg); }
        100% { transform: translate(-50%, -50%) rotateX(20deg) rotateZ(360deg); }
    }
    
    @keyframes floatingHub {
        0% { transform: translate(-50%, -50%) rotateX(20deg) translateY(0px); }
        100% { transform: translate(-50%, -50%) rotateX(20deg) translateY(-30px); }
    }
    
    /* Failed Connection Lines - Flickering and Broken */
    .connection-line {
        position: absolute;
        height: 3px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(59, 130, 246, 0.7) 20%, 
            transparent 40%,
            rgba(147, 51, 234, 0.5) 60%,
            transparent 80%,
            rgba(239, 68, 68, 0.6) 100%
        );
        z-index: 5;
        animation: 
            flickerConnection 2s ease-in-out infinite,
            moveConnectionData 3s linear infinite;
        opacity: 0.4;
        border-radius: 2px;
        filter: blur(1px);
    }
    
    @keyframes flickerConnection {
        0%, 100% { opacity: 0.2; filter: blur(2px); }
        50% { opacity: 0.7; filter: blur(0.5px); }
        75% { opacity: 0.1; filter: blur(3px); }
    }
    
    @keyframes moveConnectionData {
        0% { background-position: -100% 0; }
        100% { background-position: 200% 0; }
    }
    
    /* Research Network Grid */
    .research-network {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 4rem;
        position: relative;
        perspective: 2000px;
        transform-style: preserve-3d;
        min-height: 90vh;
        padding: 4rem 2rem;
        z-index: 10;
    }
    
    /* Research Nodes - Isolated and Trying to Connect */
    .research-node {
        background: 
            linear-gradient(135deg, 
                rgba(15, 23, 42, 0.95) 0%, 
                rgba(30, 41, 59, 0.9) 50%, 
                rgba(15, 23, 42, 0.95) 100%
            );
        border: 3px solid rgba(59, 130, 246, 0.3);
        border-radius: 24px;
        padding: 2.5rem;
        position: relative;
        transform-style: preserve-3d;
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        cursor: pointer;
        overflow: hidden;
        backdrop-filter: blur(20px);
        box-shadow: 
            0 25px 50px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
        animation: isolatedFloat 8s ease-in-out infinite;
    }
    
    .research-node::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, 
            #3b82f6, #8b5cf6, #ec4899, #f59e0b, #10b981, #3b82f6);
        z-index: -1;
        border-radius: 24px;
        animation: borderGlow 4s linear infinite;
    }
    
    @keyframes borderGlow {
        0% { background-position: 0% 50%; }
        100% { background-position: 200% 50%; }
    }
    
    @keyframes isolatedFloat {
        0%, 100% { transform: translateY(0px) rotateX(0deg); }
        25% { transform: translateY(-15px) rotateX(5deg); }
        50% { transform: translateY(8px) rotateX(-3deg); }
        75% { transform: translateY(-8px) rotateX(2deg); }
    }
    
    .research-node:hover {
        transform: translateY(-25px) rotateX(15deg) scale(1.08);
        border-color: rgba(59, 130, 246, 0.8);
        box-shadow: 
            0 50px 100px rgba(59, 130, 246, 0.25),
            0 0 120px rgba(147, 51, 234, 0.35),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        animation: connectionAttempt 1.5s ease-in-out;
    }
    
    @keyframes connectionAttempt {
        0%, 100% { border-color: rgba(59, 130, 246, 0.8); }
        50% { border-color: rgba(239, 68, 68, 0.8); }
    }
    
    /* Status Indicators - Showing Disconnection */
    .status-indicator {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        animation: statusBlink 2s ease-in-out infinite;
    }
    
    .status-active {
        background: linear-gradient(45deg, #ef4444, #f97316);
        box-shadow: 0 0 25px rgba(239, 68, 68, 0.6);
    }
    
    .status-development {
        background: linear-gradient(45deg, #f59e0b, #eab308);
        box-shadow: 0 0 25px rgba(245, 158, 11, 0.6);
    }
    
    .status-research {
        background: linear-gradient(45deg, #6366f1, #8b5cf6);
        box-shadow: 0 0 25px rgba(99, 102, 241, 0.6);
    }
    
    @keyframes statusBlink {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.3); }
    }
    
    /* Research Icons with Holographic Effect */
    .research-icon {
        width: 90px;
        height: 90px;
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
        position: relative;
        animation: holographicShimmer 4s ease-in-out infinite;
        font-size: 2rem;
    }
    
    @keyframes holographicShimmer {
        0%, 100% { 
            filter: hue-rotate(0deg) brightness(1) saturate(1); 
            transform: rotateY(0deg);
        }
        25% { 
            filter: hue-rotate(90deg) brightness(1.3) saturate(1.2); 
            transform: rotateY(15deg);
        }
        50% { 
            filter: hue-rotate(180deg) brightness(0.8) saturate(0.8); 
            transform: rotateY(-10deg);
        }
        75% { 
            filter: hue-rotate(270deg) brightness(1.2) saturate(1.1); 
            transform: rotateY(12deg);
        }
    }
    
    /* Phase Navigation - Ultra Modern */
    .phase-tab {
        background: 
            linear-gradient(135deg, 
                rgba(30, 41, 59, 0.8), 
                rgba(15, 23, 42, 0.9)
            );
        border: 2px solid rgba(59, 130, 246, 0.3);
        color: #94a3b8;
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(15px);
    }
    
    .phase-tab::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(59, 130, 246, 0.4), 
            transparent
        );
        transition: left 0.8s;
    }
    
    .phase-tab:hover::before {
        left: 100%;
    }
    
    .phase-tab.active {
        background: 
            linear-gradient(135deg, 
                rgba(59, 130, 246, 0.4), 
                rgba(147, 51, 234, 0.4)
            );
        border-color: #3b82f6;
        color: #ffffff;
        box-shadow: 
            0 0 50px rgba(59, 130, 246, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }
    
    /* Connection Attempt Effects */
    .connection-attempt {
        position: absolute;
        width: 4px;
        height: 4px;
        background: #3b82f6;
        border-radius: 50%;
        animation: connectionPulse 2s ease-in-out infinite;
    }
    
    @keyframes connectionPulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(3); opacity: 0.5; }
        100% { transform: scale(1); opacity: 1; }
    }
    
    /* Network Error Messages */
    .network-error {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.3);
        padding: 1rem 2rem;
        border-radius: 12px;
        color: #ef4444;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.9rem;
        backdrop-filter: blur(10px);
        animation: errorFlash 3s ease-in-out infinite;
        z-index: 15;
    }
    
    @keyframes errorFlash {
        0%, 100% { opacity: 0.7; }
        50% { opacity: 1; }
    }
    
    /* Glitch Effects */
    .glitch {
        animation: glitch 2s ease-in-out infinite;
    }
    
    @keyframes glitch {
        0%, 100% { transform: translate(0); }
        20% { transform: translate(-2px, 2px); }
        40% { transform: translate(-2px, -2px); }
        60% { transform: translate(2px, 2px); }
        80% { transform: translate(2px, -2px); }
    }
    
    /* Ultra responsive design */
    @media (max-width: 1024px) {
        .research-network {
            grid-template-columns: 1fr;
            gap: 2rem;
            padding: 2rem 1rem;
        }
        
        .central-hub {
            position: relative;
            margin: 2rem auto;
            transform: none;
        }
        
        .connection-line {
            display: none;
        }
    }
</style>
@endpush

@section('content')
<div class="ultra-gradient-bg">
    <!-- Floating Particles -->
    <div class="floating-particles">
        <!-- Particles will be generated by JavaScript -->
    </div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <!-- Ultra Hero Section -->
        <div class="text-center pt-20 pb-16 animate-fade-in">
            <div class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-full text-blue-300 text-sm font-medium mb-12 border border-blue-500/30 backdrop-blur-sm">
                <i class="fas fa-exclamation-triangle mr-3 animate-pulse text-red-400"></i>
                NETWORK INTEGRATION PENDING - CONNECTION ATTEMPTS FAILING
                <i class="fas fa-exclamation-triangle ml-3 animate-pulse text-red-400"></i>
            </div>
            
            <h1 class="text-7xl md:text-8xl font-black mb-8 leading-tight glitch">
                <span class="bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 bg-clip-text text-transparent">
                    SECOND SEMESTER
                </span>
            </h1>
            
            <h2 class="text-4xl md:text-5xl font-bold mb-10 text-gray-200">
                DISCONNECTED RESEARCH NETWORK
            </h2>
            
            <p class="text-2xl md:text-3xl text-gray-300 max-w-5xl mx-auto leading-relaxed">
                Five isolated research domains struggling to establish connections — 
                <span class="text-red-400 font-bold">integration work required</span>
            </p>
            
            <!-- Network Status Display -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 backdrop-blur-sm">
                    <i class="fas fa-times-circle text-red-400 text-2xl mb-2"></i>
                    <div class="text-red-300 font-bold">CONNECTION FAILED</div>
                    <div class="text-red-400 text-sm">Integration: 0%</div>
                </div>
                <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-xl p-4 backdrop-blur-sm">
                    <i class="fas fa-exclamation-triangle text-yellow-400 text-2xl mb-2"></i>
                    <div class="text-yellow-300 font-bold">NODES ISOLATED</div>
                    <div class="text-yellow-400 text-sm">Sync Status: ERROR</div>
                </div>
                <div class="bg-blue-500/10 border border-blue-500/30 rounded-xl p-4 backdrop-blur-sm">
                    <i class="fas fa-cog text-blue-400 text-2xl mb-2 animate-spin"></i>
                    <div class="text-blue-300 font-bold">ATTEMPTING REPAIR</div>
                    <div class="text-blue-400 text-sm">ETA: Unknown</div>
                </div>
            </div>
        </div>

        <!-- Phase Navigation -->
        <div class="flex justify-center mb-20">
            <div class="bg-white/5 backdrop-blur-sm rounded-3xl p-4 border border-white/10">
                <div class="flex space-x-4">
                    <button onclick="showPhase('overview')" id="overview-btn" class="phase-tab active px-10 py-5 rounded-2xl font-bold text-xl transition-all duration-300">
                        <i class="fas fa-eye mr-3"></i>
                        Research Overview
                    </button>
                    <button onclick="showPhase('phase1')" id="phase1-btn" class="phase-tab px-10 py-5 rounded-2xl font-bold text-xl transition-all duration-300">
                        <i class="fas fa-search-plus mr-3"></i>
                        Phase 1: Research
                    </button>
                    <button onclick="showPhase('phase2')" id="phase2-btn" class="phase-tab px-10 py-5 rounded-2xl font-bold text-xl transition-all duration-300">
                        <i class="fas fa-cogs mr-3"></i>
                        Phase 2: Implementation
                    </button>
                </div>
            </div>
        </div>

        <!-- Research Overview Section -->
        <div id="overview" class="phase-content">
            <div class="research-network relative">
                <!-- Network Error Message -->
                <div class="network-error">
                    <i class="fas fa-wifi mr-2"></i>
                    NETWORK_ERROR: Unable to establish secure connections between research nodes
                </div>
                
                <!-- Central Hub - Struggling -->
                <div class="central-hub">
                    <i class="fas fa-network-wired text-4xl text-white"></i>
                </div>
                
                <!-- Failed Connection Lines -->
                <div class="connection-line" style="top: 25%; left: 25%; width: 20%; transform: rotate(35deg);"></div>
                <div class="connection-line" style="top: 25%; right: 25%; width: 20%; transform: rotate(-35deg);"></div>
                <div class="connection-line" style="bottom: 35%; left: 20%; width: 25%; transform: rotate(-25deg);"></div>
                <div class="connection-line" style="bottom: 35%; right: 20%; width: 25%; transform: rotate(25deg);"></div>
                <div class="connection-line" style="top: 50%; left: 30%; width: 15%;"></div>
                <div class="connection-line" style="top: 50%; right: 30%; width: 15%;"></div>
                
                <!-- Connection Attempt Particles -->
                <div class="connection-attempt" style="top: 30%; left: 40%;"></div>
                <div class="connection-attempt" style="top: 60%; right: 35%;"></div>
                <div class="connection-attempt" style="bottom: 40%; left: 55%;"></div>
                
                <!-- Research Nodes Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 relative z-10">
                    <!-- Core Ransomware Research (Row 1) -->
                    <div class="research-node group" onclick="navigateToResearch('core-ransomware')">
                        <div class="status-indicator status-active"></div>
                        <div class="research-icon bg-gradient-to-br from-red-500 to-orange-500">
                            <i class="fas fa-virus text-white"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-6 group-hover:text-red-400 transition-colors">
                            Core Ransomware Analysis
                        </h3>
                        <p class="text-gray-300 mb-8 leading-relaxed text-lg">
                            Educational research into ransomware mechanics, encryption algorithms, and defensive strategies for academic and security awareness purposes.
                        </p>
                        <div class="flex flex-wrap gap-3 mb-6">
                            <span class="px-4 py-2 bg-red-500/20 text-red-300 rounded-full text-sm font-medium">Encryption Analysis</span>
                            <span class="px-4 py-2 bg-orange-500/20 text-orange-300 rounded-full text-sm font-medium">Defense Strategies</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-lg text-gray-400">Status: <span class="text-red-400 font-bold">ISOLATED</span></span>
                            <i class="fas fa-arrow-right text-red-400 group-hover:translate-x-3 transition-transform text-xl"></i>
                        </div>
                    </div>

                    <!-- RAT Prototype (Row 1) -->
                    <div class="research-node group" onclick="navigateToResearch('rat-prototype')">
                        <div class="status-indicator status-development"></div>
                        <div class="research-icon bg-gradient-to-br from-purple-500 to-pink-500">
                            <i class="fas fa-user-secret text-white"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-6 group-hover:text-purple-400 transition-colors">
                            RAT Prototype Development
                        </h3>
                        <p class="text-gray-300 mb-8 leading-relaxed text-lg">
                            Educational development of Remote Access Tool prototype for understanding system vulnerabilities and implementing comprehensive security measures.
                        </p>
                        <div class="flex flex-wrap gap-3 mb-6">
                            <span class="px-4 py-2 bg-purple-500/20 text-purple-300 rounded-full text-sm font-medium">Remote Access</span>
                            <span class="px-4 py-2 bg-pink-500/20 text-pink-300 rounded-full text-sm font-medium">System Control</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-lg text-gray-400">Status: <span class="text-yellow-400 font-bold">DISCONNECTED</span></span>
                            <i class="fas fa-arrow-right text-purple-400 group-hover:translate-x-3 transition-transform text-xl"></i>
                        </div>
                    </div>

                    <!-- Evasion & Stealth (Row 1) -->
                    <div class="research-node group" onclick="navigateToResearch('evasion-stealth')">
                        <div class="status-indicator status-research"></div>
                        <div class="research-icon bg-gradient-to-br from-green-500 to-teal-500">
                            <i class="fas fa-eye-slash text-white"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-6 group-hover:text-green-400 transition-colors">
                            Evasion & Stealth Techniques
                        </h3>
                        <p class="text-gray-300 mb-8 leading-relaxed text-lg">
                            Advanced research into evasion techniques, anti-analysis methods, and stealth mechanisms used by modern malware for educational defense development.
                        </p>
                        <div class="flex flex-wrap gap-3 mb-6">
                            <span class="px-4 py-2 bg-green-500/20 text-green-300 rounded-full text-sm font-medium">Anti-Detection</span>
                            <span class="px-4 py-2 bg-teal-500/20 text-teal-300 rounded-full text-sm font-medium">Obfuscation</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-lg text-gray-400">Status: <span class="text-blue-400 font-bold">OFFLINE</span></span>
                            <i class="fas fa-arrow-right text-green-400 group-hover:translate-x-3 transition-transform text-xl"></i>
                        </div>
                    </div>

                    <!-- Delivery Methods (Row 2) -->
                    <div class="research-node group lg:col-start-1" onclick="navigateToResearch('delivery-methods')">
                        <div class="status-indicator status-development"></div>
                        <div class="research-icon bg-gradient-to-br from-orange-500 to-red-500">
                            <i class="fas fa-paper-plane text-white"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-6 group-hover:text-orange-400 transition-colors">
                            Delivery Methods Analysis
                        </h3>
                        <p class="text-gray-300 mb-8 leading-relaxed text-lg">
                            Comprehensive study of malware delivery mechanisms, infection vectors, and propagation techniques used in modern cyber attacks for educational defense purposes.
                        </p>
                        <div class="flex flex-wrap gap-3 mb-6">
                            <span class="px-4 py-2 bg-orange-500/20 text-orange-300 rounded-full text-sm font-medium">Email Phishing</span>
                            <span class="px-4 py-2 bg-red-500/20 text-red-300 rounded-full text-sm font-medium">Web Exploits</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-lg text-gray-400">Status: <span class="text-yellow-400 font-bold">NO SIGNAL</span></span>
                            <i class="fas fa-arrow-right text-orange-400 group-hover:translate-x-3 transition-transform text-xl"></i>
                        </div>
                    </div>

                    <!-- Detection & Response (Row 2) -->
                    <div class="research-node group lg:col-start-3" onclick="navigateToResearch('detection-response')">
                        <div class="status-indicator status-active"></div>
                        <div class="research-icon bg-gradient-to-br from-indigo-500 to-blue-500">
                            <i class="fas fa-radar text-white"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-6 group-hover:text-indigo-400 transition-colors">
                            Detection & Response Systems
                        </h3>
                        <p class="text-gray-300 mb-8 leading-relaxed text-lg">
                            Advanced threat detection systems, incident response protocols, and automated security monitoring solutions for comprehensive cybersecurity defense strategies.
                        </p>
                        <div class="flex flex-wrap gap-3 mb-6">
                            <span class="px-4 py-2 bg-indigo-500/20 text-indigo-300 rounded-full text-sm font-medium">SIEM Systems</span>
                            <span class="px-4 py-2 bg-blue-500/20 text-blue-300 rounded-full text-sm font-medium">Threat Hunting</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-lg text-gray-400">Status: <span class="text-red-400 font-bold">UNREACHABLE</span></span>
                            <i class="fas fa-arrow-right text-indigo-400 group-hover:translate-x-3 transition-transform text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Network Statistics - Showing Failure -->
            <div class="mt-20 grid grid-cols-1 md:grid-cols-4 gap-8 bg-red-500/10 backdrop-blur-sm rounded-3xl p-10 border border-red-500/30">
                <div class="text-center">
                    <div class="text-5xl font-bold text-red-400 mb-3">5</div>
                    <div class="text-gray-300 text-lg">Isolated Domains</div>
                    <div class="text-red-400 text-sm mt-1">Not Connected</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-yellow-400 mb-3">0</div>
                    <div class="text-gray-300 text-lg">Active Connections</div>
                    <div class="text-yellow-400 text-sm mt-1">Integration Needed</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-blue-400 mb-3">∞</div>
                    <div class="text-gray-300 text-lg">Connection Attempts</div>
                    <div class="text-blue-400 text-sm mt-1">All Failed</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-purple-400 mb-3">?</div>
                    <div class="text-gray-300 text-lg">Integration ETA</div>
                    <div class="text-purple-400 text-sm mt-1">Pending Development</div>
                </div>
            </div>
        </div>

        <!-- Phase 1 & 2 content remains the same but hidden initially -->
        <div id="phase1" class="phase-content hidden">
            <!-- Your existing Phase 1 content here -->
        </div>

        <div id="phase2" class="phase-content hidden">
            <!-- Your existing Phase 2 content here -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Create floating particles
    function createFloatingParticles() {
        const container = document.querySelector('.floating-particles');
        const particleCount = 50;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 15 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
            container.appendChild(particle);
        }
    }

    function showPhase(phase) {
        // Hide all phases
        document.querySelectorAll('.phase-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active class from all buttons
        document.querySelectorAll('.phase-tab').forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Show selected phase
        document.getElementById(phase).classList.remove('hidden');
        document.getElementById(phase + '-btn').classList.add('active');
    }

    function navigateToResearch(researchArea) {
        // Add connection attempt animation before navigation
        const hub = document.querySelector('.central-hub');
        hub.style.animation = 'disconnectedPulse 0.5s ease-in-out, rotateHub 20s linear infinite, floatingHub 6s ease-in-out infinite alternate';
        
        setTimeout(() => {
            switch(researchArea) {
                case 'core-ransomware':
                    window.location.href = '{{ route("nexus.core-ransomware") }}';
                    break;
                case 'rat-prototype':
                    window.location.href = '{{ route("nexus.rat-prototype") }}';
                    break;
                case 'evasion-stealth':
                    window.location.href = '{{ route("nexus.evasion-stealth") }}';
                    break;
                case 'delivery-methods':
                    window.location.href = '{{ route("nexus.delivery-methods") }}';
                    break;
                case 'detection-response':
                    window.location.href = '{{ route("nexus.detection-response") }}';
                    break;
                default:
                    console.log('Research area not found:', researchArea);
            }
        }, 500);
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Create particles
        createFloatingParticles();
        
        // Initialize with overview phase visible
        showPhase('overview');
        
        // Add enhanced hover effects
        const researchNodes = document.querySelectorAll('.research-node');
        researchNodes.forEach(node => {
            node.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-25px) rotateX(15deg) scale(1.08)';
                // Add connection attempt effect
                const attempts = document.querySelectorAll('.connection-attempt');
                attempts.forEach(attempt => {
                    attempt.style.animation = 'connectionPulse 0.5s ease-in-out';
                });
            });
            
            node.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });

        // Simulate network error messages
        setInterval(() => {
            const errorMsg = document.querySelector('.network-error');
            const messages = [
                'NETWORK_ERROR: Unable to establish secure connections between research nodes',
                'CONNECTION_TIMEOUT: Research domains remain isolated',
                'SYNC_FAILED: Integration protocols not implemented',
                'BRIDGE_DOWN: Cross-domain communication disabled'
            ];
            
            errorMsg.innerHTML = '<i class="fas fa-wifi mr-2"></i>' + messages[Math.floor(Math.random() * messages.length)];
        }, 4000);
    });
</script>
@endsection
