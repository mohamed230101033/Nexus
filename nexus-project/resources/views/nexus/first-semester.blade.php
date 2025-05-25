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
        animation: slideInUp 0.8s ease-out;
    }

    .section-content.active {
        display: block;
    }    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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
        display: block !important;
    }    /* Enhanced Responsive Design */
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
            </a>            <!-- 2. RAT ANALYSIS CARD -->
            <a href="{{ route('nexus.rat-analysis') }}" class="section-card rounded-2xl p-8 text-center no-underline block" data-section="rat-analysis">
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
            </a>            <!-- 3. SNAKE KEYLOGGER ANALYSIS CARD -->
            <a href="{{ route('nexus.snake-keylogger') }}" class="section-card rounded-2xl p-8 text-center no-underline block" data-section="snake-keylogger">
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
            </a><!-- 4. NEXUS FLOWCHART CARD -->
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
    </section><!-- SNAKE KEYLOGGER ANALYSIS SECTION -->
    <section id="snake-keylogger" class="section-content">
        <div class="mb-8">
            <button onclick="showOverview()" class="back-btn px-6 py-3 rounded-lg text-white font-semibold flex items-center space-x-2 hover:bg-gray-600">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Overview</span>
            </button>
        </div>
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-black mb-6">
                <span class="bg-gradient-to-r from-red-400 via-orange-400 to-yellow-400 bg-clip-text text-transparent">
                    SNAKE KEYLOGGER
                </span>
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed mb-8">
                In-depth analysis of Snake Keylogger malware - Understanding its techniques, evasion methods, and countermeasures.
            </p>
        </div>

        <!-- Keylogger Analysis Tools -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            <!-- Keylogging Techniques -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-red-500/20">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-keyboard text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Keylogging Methods</h3>
                </div>
                <div class="space-y-4">
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-red-400 font-semibold mb-2">Hardware Keylogging</h4>
                        <p class="text-gray-300 text-sm">Physical devices that capture keystrokes at the hardware level, including USB keyloggers and keyboard overlays.</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-red-400 font-semibold mb-2">Software Keylogging</h4>
                        <p class="text-gray-300 text-sm">Applications that monitor and record keyboard input through hooking mechanisms and system monitoring.</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-red-400 font-semibold mb-2">Browser-Based Logging</h4>
                        <p class="text-gray-300 text-sm">JavaScript-based keyloggers that capture input within web browsers and online forms.</p>
                    </div>
                </div>
            </div>

            <!-- Evasion & Detection -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-orange-500/20">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-eye-slash text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Evasion & Defense</h3>
                </div>
                <div class="space-y-4">
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-orange-400 font-semibold mb-2">Anti-Detection Techniques</h4>
                        <p class="text-gray-300 text-sm">Code obfuscation, process injection, and rootkit functionality to avoid security software detection.</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-orange-400 font-semibold mb-2">Persistence Mechanisms</h4>
                        <p class="text-gray-300 text-sm">Registry modifications, scheduled tasks, and service installation for maintaining system presence.</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-orange-400 font-semibold mb-2">Defense Strategies</h4>
                        <p class="text-gray-300 text-sm">Virtual keyboards, endpoint protection, behavioral analysis, and user awareness training.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Snake Keylogger Indicators -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-red-500/20 mb-16">
            <h3 class="text-2xl font-bold text-white mb-6 text-center">Snake Keylogger Indicators of Compromise (IOCs)</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-file text-red-400 text-xl mr-3"></i>
                        <h4 class="text-red-400 font-semibold">File Indicators</h4>
                    </div>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• Suspicious executable files in temp directories</li>
                        <li>• Hidden configuration files</li>
                        <li>• Log files containing captured keystrokes</li>
                        <li>• Encrypted data files</li>
                    </ul>
                </div>
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-network-wired text-orange-400 text-xl mr-3"></i>
                        <h4 class="text-orange-400 font-semibold">Network Indicators</h4>
                    </div>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• Unusual outbound connections</li>
                        <li>• Data exfiltration patterns</li>
                        <li>• C&C server communications</li>
                        <li>• Encrypted traffic to unknown hosts</li>
                    </ul>
                </div>
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-cogs text-yellow-400 text-xl mr-3"></i>
                        <h4 class="text-yellow-400 font-semibold">Behavioral Indicators</h4>
                    </div>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• Unusual process behavior</li>
                        <li>• Registry modifications</li>
                        <li>• Memory injection techniques</li>
                        <li>• Privilege escalation attempts</li>
                    </ul>
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
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-black mb-6">
                <span class="bg-gradient-to-r from-green-400 via-emerald-400 to-teal-400 bg-clip-text text-transparent">
                    NEXUS FLOWCHART
                </span>
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed mb-8">
                Interactive visualization of the complete NEXUS project methodology, workflow, and architectural design.
            </p>
        </div>

        <!-- Project Architecture Overview -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-green-500/20 mb-16">
            <h3 class="text-2xl font-bold text-white mb-8 text-center">NEXUS Project Architecture</h3>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- First Semester -->
                <div class="bg-gray-800/50 rounded-xl p-6 border border-blue-500/30">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-shield-alt text-white"></i>
                        </div>
                        <h4 class="text-blue-400 font-bold text-lg">First Semester</h4>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-lock text-cyan-400 mr-2"></i>
                            <span class="text-gray-300">Encryption Fundamentals</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-search-plus text-purple-400 mr-2"></i>
                            <span class="text-gray-300">RAT Analysis</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-keyboard text-red-400 mr-2"></i>
                            <span class="text-gray-300">Snake Keylogger</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-project-diagram text-green-400 mr-2"></i>
                            <span class="text-gray-300">This Flowchart</span>
                        </div>
                    </div>
                </div>

                <!-- Second Semester -->
                <div class="bg-gray-800/50 rounded-xl p-6 border border-purple-500/30">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-microscope text-white"></i>
                        </div>
                        <h4 class="text-purple-400 font-bold text-lg">Second Semester</h4>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-search text-purple-400 mr-2"></i>
                            <span class="text-gray-300">Phase 1: Research</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-cogs text-pink-400 mr-2"></i>
                            <span class="text-gray-300">Phase 2: Implementation</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-chart-line text-green-400 mr-2"></i>
                            <span class="text-gray-300">Advanced Analysis</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-graduation-cap text-yellow-400 mr-2"></i>
                            <span class="text-gray-300">Final Research</span>
                        </div>
                    </div>
                </div>

                <!-- NEXUS x MYC Game -->
                <div class="bg-gray-800/50 rounded-xl p-6 border border-cyan-500/30">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-gamepad text-white"></i>
                        </div>
                        <h4 class="bg-gradient-to-r from-cyan-400 to-pink-400 bg-clip-text text-transparent font-bold text-lg">NEXUS x MYC</h4>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-puzzle-piece text-cyan-400 mr-2"></i>
                            <span class="text-gray-300">Interactive Learning</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-clock text-pink-400 mr-2"></i>
                            <span class="text-gray-300">Time Travel Scenarios</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-users text-purple-400 mr-2"></i>
                            <span class="text-gray-300">Collaborative Missions</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-trophy text-yellow-400 mr-2"></i>
                            <span class="text-gray-300">Achievement System</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Research Methodology Flowchart -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-emerald-500/20 mb-16">
            <h3 class="text-2xl font-bold text-white mb-8 text-center">Research Methodology Flow</h3>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-cyan-400/30">
                        <i class="fas fa-lightbulb text-white text-xl"></i>
                    </div>
                    <h4 class="text-cyan-400 font-semibold mb-2">Problem Identification</h4>
                    <p class="text-gray-300 text-xs">Identify cybersecurity challenges and research gaps</p>
                    <div class="mt-4">
                        <i class="fas fa-arrow-right text-gray-500 text-xl"></i>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-purple-400/30">
                        <i class="fas fa-book text-white text-xl"></i>
                    </div>
                    <h4 class="text-purple-400 font-semibold mb-2">Literature Review</h4>
                    <p class="text-gray-300 text-xs">Comprehensive analysis of existing research and methodologies</p>
                    <div class="mt-4">
                        <i class="fas fa-arrow-right text-gray-500 text-xl"></i>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-red-400/30">
                        <i class="fas fa-flask text-white text-xl"></i>
                    </div>
                    <h4 class="text-red-400 font-semibold mb-2">Experimentation</h4>
                    <p class="text-gray-300 text-xs">Hands-on analysis, testing, and practical implementation</p>
                    <div class="mt-4">
                        <i class="fas fa-arrow-right text-gray-500 text-xl"></i>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-yellow-400/30">
                        <i class="fas fa-chart-bar text-white text-xl"></i>
                    </div>
                    <h4 class="text-yellow-400 font-semibold mb-2">Data Analysis</h4>
                    <p class="text-gray-300 text-xs">Statistical analysis and pattern recognition of results</p>
                    <div class="mt-4">
                        <i class="fas fa-arrow-right text-gray-500 text-xl"></i>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-green-400/30">
                        <i class="fas fa-file-alt text-white text-xl"></i>
                    </div>
                    <h4 class="text-green-400 font-semibold mb-2">Documentation</h4>
                    <p class="text-gray-300 text-xs">Comprehensive reporting and knowledge sharing</p>
                </div>
            </div>
        </div>

        <!-- Technical Implementation Stack -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-teal-500/20">
            <h3 class="text-2xl font-bold text-white mb-8 text-center">Technical Implementation Stack</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Frontend -->
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-palette text-blue-400 text-xl mr-3"></i>
                        <h4 class="text-blue-400 font-semibold">Frontend</h4>
                    </div>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• HTML5 & CSS3</li>
                        <li>• Tailwind CSS</li>
                        <li>• JavaScript ES6+</li>
                        <li>• Responsive Design</li>
                    </ul>
                </div>

                <!-- Backend -->
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-server text-red-400 text-xl mr-3"></i>
                        <h4 class="text-red-400 font-semibold">Backend</h4>
                    </div>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• Laravel PHP</li>
                        <li>• RESTful APIs</li>
                        <li>• MySQL Database</li>
                        <li>• Authentication</li>
                    </ul>
                </div>

                <!-- Security Tools -->
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-shield-alt text-green-400 text-xl mr-3"></i>
                        <h4 class="text-green-400 font-semibold">Security Tools</h4>
                    </div>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• Malware Analysis</li>
                        <li>• Encryption Libraries</li>
                        <li>• Network Monitoring</li>
                        <li>• Vulnerability Assessment</li>
                    </ul>
                </div>

                <!-- Development -->
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-code text-purple-400 text-xl mr-3"></i>
                        <h4 class="text-purple-400 font-semibold">Development</h4>
                    </div>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• Version Control (Git)</li>
                        <li>• Testing Framework</li>
                        <li>• CI/CD Pipeline</li>
                        <li>• Documentation</li>
                    </ul>
                </div>
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

        animateElements.forEach(element => observer.observe(element));        // Add keyboard shortcuts
        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey || event.metaKey) {
                switch(event.key) {
                    case '1':
                        event.preventDefault();
                        window.location.href = "{{ route('nexus.encryption') }}";
                        break;
                    case '2':
                        event.preventDefault();
                        window.location.href = "{{ route('nexus.rat-analysis') }}";
                        break;
                    case '3':
                        event.preventDefault();
                        window.location.href = "{{ route('nexus.snake-keylogger') }}";
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
        // Hide overview
        document.getElementById('overview').style.display = 'none';
        
        // Hide all section content
        document.querySelectorAll('.section-content').forEach(section => {
            section.classList.remove('active');
            section.style.display = 'none';
        });
        
        // Show selected section
        const targetSection = document.getElementById(sectionName);
        if (targetSection) {
            targetSection.style.display = 'block';
            targetSection.classList.add('active');
        }
        
        // Update active card
        document.querySelectorAll('.section-card').forEach(card => {
            card.classList.remove('active');
        });
        document.querySelector(`[data-section="${sectionName}"]`).classList.add('active');
        
        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
      function showOverview() {
        // Hide all section content
        document.querySelectorAll('.section-content').forEach(section => {
            section.classList.remove('active');
            section.style.display = 'none';
        });
        
        // Show overview
        document.getElementById('overview').style.display = 'block';
        
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
    }

    // All encryption functionality removed - available on dedicated encryption page
</script>
@endsection
