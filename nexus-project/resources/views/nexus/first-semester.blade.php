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
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">
            <!-- 1. ENCRYPTION SECTION CARD -->
            <div class="section-card rounded-2xl p-8 text-center" data-section="encryption">
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
            </div>            <!-- 2. RAT ANALYSIS CARD -->
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
                        • Penetration Testing<br>
                        • Vulnerability Scan<br>
                        • OSINT Gathering
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
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-16">
            <p class="text-lg text-gray-300 mb-6">Ready to start your cybersecurity journey?</p>
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                <button onclick="document.querySelector('[data-section=encryption]').click()" class="encrypt-btn px-8 py-4 rounded-lg text-white font-bold text-lg flex items-center space-x-2">
                    <i class="fas fa-rocket"></i>
                    <span>Start with Encryption</span>
                </button>
                <p class="text-gray-400 text-sm">Most popular starting point</p>
            </div>
        </div>    </section>    <!-- ENCRYPTION SECTION - ENHANCED INTERACTIVE CONTENT -->
    <section id="encryption" class="section-content">
        <div class="mb-8">
            <button onclick="showOverview()" class="back-btn px-6 py-3 rounded-lg text-white font-semibold flex items-center space-x-2 hover:bg-gray-600">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Overview</span>
            </button>
        </div>

        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-black mb-6">
                <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-teal-400 bg-clip-text text-transparent">
                    ENCRYPTION
                </span>
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed mb-8">
                Master the fundamentals of cryptography through hands-on interactive demonstrations. 
                Learn how encryption protects our digital world with real file encryption and decryption.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                <div class="bg-gradient-to-r from-blue-500/20 to-cyan-500/20 p-4 rounded-xl border border-blue-500/30">
                    <i class="fas fa-file-lock text-2xl text-blue-400 mb-2"></i>
                    <div class="text-white font-semibold">Real Encryption</div>
                    <div class="text-gray-300 text-sm">Actual file protection</div>
                </div>
                <div class="bg-gradient-to-r from-purple-500/20 to-pink-500/20 p-4 rounded-xl border border-purple-500/30">
                    <i class="fas fa-key text-2xl text-purple-400 mb-2"></i>
                    <div class="text-white font-semibold">Multiple Algorithms</div>
                    <div class="text-gray-300 text-sm">AES, RSA, Caesar & more</div>
                </div>
                <div class="bg-gradient-to-r from-green-500/20 to-teal-500/20 p-4 rounded-xl border border-green-500/30">
                    <i class="fas fa-unlock text-2xl text-green-400 mb-2"></i>
                    <div class="text-white font-semibold">Full Decryption</div>
                    <div class="text-gray-300 text-sm">Secure file recovery</div>
                </div>
            </div>
        </div>

        <!-- Interactive Encryption Demos - Enhanced Layout -->
        <div class="encryption-grid mb-16">
            <!-- Text Encryption Demo -->
            <div class="encryption-demo rounded-2xl p-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-font text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Text Encryption</h3>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-white font-semibold mb-3">Enter your message:</label>
                        <textarea id="textInput" class="nexus-input w-full p-4 rounded-lg resize-none" rows="4" placeholder="Type your secret message here..."></textarea>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <button onclick="encryptText('caesar')" class="encrypt-btn px-4 py-3 rounded-lg text-white font-semibold hover:transform hover:scale-105 transition-all">
                            <i class="fas fa-shield-alt mr-2"></i>Caesar Cipher
                        </button>
                        <button onclick="encryptText('base64')" class="encrypt-btn px-4 py-3 rounded-lg text-white font-semibold hover:transform hover:scale-105 transition-all">
                            <i class="fas fa-code mr-2"></i>Base64
                        </button>
                        <button onclick="encryptText('rot13')" class="encrypt-btn px-4 py-3 rounded-lg text-white font-semibold hover:transform hover:scale-105 transition-all">
                            <i class="fas fa-sync-alt mr-2"></i>ROT13
                        </button>
                        <button onclick="encryptText('reverse')" class="encrypt-btn px-4 py-3 rounded-lg text-white font-semibold hover:transform hover:scale-105 transition-all">
                            <i class="fas fa-exchange-alt mr-2"></i>Reverse
                        </button>
                    </div>
                    
                    <div>
                        <label class="block text-white font-semibold mb-3">Encrypted Result:</label>
                        <div id="textOutput" class="bg-gray-800 p-4 rounded-lg min-h-[80px] text-cyan-400 font-mono break-all border border-gray-600"></div>
                        <button onclick="copyToClipboard('textOutput')" class="mt-2 px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg text-sm transition-all">
                            <i class="fas fa-copy mr-2"></i>Copy Result
                        </button>
                    </div>

                    <!-- Decryption Section for Text -->
                    <div class="decryption-section">
                        <h4 class="text-white font-semibold mb-3 flex items-center">
                            <i class="fas fa-unlock mr-2"></i>Decrypt Text
                        </h4>
                        <textarea id="textDecryptInput" class="nexus-input w-full p-4 rounded-lg resize-none mb-4" rows="3" placeholder="Paste encrypted text to decrypt..."></textarea>
                        <div class="grid grid-cols-2 gap-4">
                            <button onclick="decryptText('caesar')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all">
                                <i class="fas fa-unlock mr-2"></i>Caesar
                            </button>
                            <button onclick="decryptText('base64')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all">
                                <i class="fas fa-unlock mr-2"></i>Base64
                            </button>
                            <button onclick="decryptText('rot13')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all">
                                <i class="fas fa-unlock mr-2"></i>ROT13
                            </button>
                            <button onclick="decryptText('reverse')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all">
                                <i class="fas fa-unlock mr-2"></i>Reverse
                            </button>
                        </div>
                        <div id="textDecryptOutput" class="bg-gray-800 p-4 rounded-lg min-h-[60px] text-green-400 font-mono break-all border border-gray-600 mt-4"></div>
                    </div>
                </div>
            </div>

            <!-- File Encryption Demo -->
            <div class="encryption-demo rounded-2xl p-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-file-lock text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">File Encryption</h3>
                </div>
                
                <div class="space-y-6">
                    <div class="file-upload-area border-2 border-dashed border-gray-600 rounded-lg p-8 text-center" 
                         ondrop="handleFileDrop(event)" 
                         ondragover="handleDragOver(event)" 
                         ondragleave="handleDragLeave(event)">
                        <input type="file" id="fileInput" class="hidden" onchange="handleFileUpload(event)">
                        <label for="fileInput" class="cursor-pointer block">
                            <i class="fas fa-cloud-upload-alt text-5xl text-gray-400 mb-4"></i>
                            <p class="text-gray-300 text-lg mb-2">Drop files here or click to upload</p>
                            <p class="text-gray-500 text-sm">Support for all file types</p>
                        </label>
                    </div>
                    
                    <div id="fileInfo" class="hidden bg-gray-800 p-4 rounded-lg border border-gray-600">
                        <div class="flex items-center justify-between">
                            <div>
                                <div id="fileName" class="text-white font-semibold"></div>
                                <div id="fileSize" class="text-gray-400 text-sm"></div>
                            </div>
                            <div id="fileStatus" class="text-green-400">
                                <i class="fas fa-check-circle"></i> Ready
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex space-x-4">
                            <input type="password" id="filePassword" class="nexus-input flex-1 p-3 rounded-lg" placeholder="Enter encryption password...">
                            <button onclick="encryptFile()" class="encrypt-btn px-6 py-3 rounded-lg text-white font-semibold">
                                <i class="fas fa-lock mr-2"></i>Encrypt File
                            </button>
                        </div>
                    </div>
                    
                    <div id="encryptedFileResult" class="hidden">
                        <div class="bg-gray-800 p-4 rounded-lg border border-gray-600">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-white font-semibold">
                                    <i class="fas fa-file-lock text-green-400 mr-2"></i>Encrypted File Ready
                                </span>
                                <button onclick="downloadEncryptedFile()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all">
                                    <i class="fas fa-download mr-2"></i>Download
                                </button>
                            </div>
                            <p class="text-gray-400 text-sm">File has been successfully encrypted. Download it to save.</p>
                        </div>
                    </div>

                    <!-- File Decryption Section -->
                    <div class="decryption-section">
                        <h4 class="text-white font-semibold mb-4 flex items-center">
                            <i class="fas fa-unlock mr-2"></i>Decrypt File
                        </h4>
                        <div class="file-upload-area border-2 border-dashed border-purple-600 rounded-lg p-6 text-center" 
                             ondrop="handleEncryptedFileDrop(event)" 
                             ondragover="handleDragOver(event)" 
                             ondragleave="handleDragLeave(event)">
                            <input type="file" id="encryptedFileInput" class="hidden" onchange="handleEncryptedFileUpload(event)">
                            <label for="encryptedFileInput" class="cursor-pointer block">
                                <i class="fas fa-file-upload text-3xl text-purple-400 mb-3"></i>
                                <p class="text-gray-300">Upload encrypted file</p>
                            </label>
                        </div>
                        
                        <div class="flex space-x-4 mt-4">
                            <input type="password" id="decryptPassword" class="nexus-input flex-1 p-3 rounded-lg" placeholder="Enter decryption password...">
                            <button onclick="decryptFile()" class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all">
                                <i class="fas fa-unlock mr-2"></i>Decrypt
                            </button>
                        </div>
                        
                        <div id="decryptedFileResult" class="hidden mt-4">
                            <div class="bg-gray-800 p-4 rounded-lg border border-gray-600">
                                <div class="flex items-center justify-between">
                                    <span class="text-white font-semibold">
                                        <i class="fas fa-file-check text-green-400 mr-2"></i>File Decrypted Successfully
                                    </span>
                                    <button onclick="downloadDecryptedFile()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all">
                                        <i class="fas fa-download mr-2"></i>Download
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video Encryption Simulation - Enhanced -->
            <div class="encryption-demo rounded-2xl p-8">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-orange-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-video text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Video Security</h3>
                </div>
                
                <div class="space-y-6">
                    <div class="video-container">
                        <video id="demoVideo" class="w-full rounded-lg" controls preload="metadata">
                            <source src="/videos/Nexus Demo (online-video-cutter.com).mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-4">
                        <button onclick="simulateVideoEncryption()" class="encrypt-btn px-6 py-4 rounded-lg text-white font-semibold text-lg">
                            <i class="fas fa-play mr-2"></i>
                            Simulate Video Encryption
                        </button>
                        <button onclick="resetVideoDemo()" class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-all">
                            <i class="fas fa-redo mr-2"></i>Reset Demo
                        </button>
                    </div>
                    
                    <div id="videoEncryptionStatus" class="bg-gray-800 p-4 rounded-lg border border-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-info-circle text-blue-400 mr-2"></i>
                            <span class="text-white">Ready to demonstrate video encryption concepts</span>
                        </div>
                        <div class="mt-2 text-gray-400 text-sm">
                            This simulation shows how video content can be protected through encryption
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Encryption Algorithms Info - Enhanced -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">Encryption Algorithms</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="algo-card rounded-xl p-6 text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-key text-white text-2xl"></i>
                    </div>
                    <h4 class="text-white font-bold mb-2">AES</h4>
                    <p class="text-gray-400 text-sm mb-4">Advanced Encryption Standard - Industry standard symmetric encryption</p>
                    <div class="text-xs text-cyan-400">
                        • 128/192/256-bit keys<br>
                        • Block cipher<br>
                        • NIST approved
                    </div>
                </div>
                
                <div class="algo-card rounded-xl p-6 text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lock text-white text-2xl"></i>
                    </div>
                    <h4 class="text-white font-bold mb-2">RSA</h4>
                    <p class="text-gray-400 text-sm mb-4">Rivest-Shamir-Adleman - Public key cryptographic algorithm</p>
                    <div class="text-xs text-purple-400">
                        • Public-key cryptography<br>
                        • Digital signatures<br>
                        • 1024-4096 bit keys
                    </div>
                </div>
                
                <div class="algo-card rounded-xl p-6 text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-fingerprint text-white text-2xl"></i>
                    </div>
                    <h4 class="text-white font-bold mb-2">SHA</h4>
                    <p class="text-gray-400 text-sm mb-4">Secure Hash Algorithm - Cryptographic hash function family</p>
                    <div class="text-xs text-green-400">
                        • SHA-1, SHA-256, SHA-512<br>
                        • Data integrity<br>
                        • One-way function
                    </div>
                </div>
                
                <div class="algo-card rounded-xl p-6 text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h4 class="text-white font-bold mb-2">DES</h4>
                    <p class="text-gray-400 text-sm mb-4">Data Encryption Standard - Legacy symmetric encryption standard</p>
                    <div class="text-xs text-red-400">
                        • 56-bit key length<br>
                        • Historical importance<br>
                        • Now deprecated
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- RAT ANALYSIS SECTION -->
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
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed mb-8">
                Comprehensive analysis of Remote Access Trojans - Understanding behavior, detection, and mitigation strategies.
            </p>
        </div>

        <!-- Interactive Analysis Tools -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            <!-- Behavioral Analysis -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-purple-500/20">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-search-plus text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Behavioral Analysis</h3>
                </div>
                <div class="space-y-4">
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-purple-400 font-semibold mb-2">Network Communication Patterns</h4>
                        <p class="text-gray-300 text-sm">Monitor and analyze RAT communication protocols, command & control patterns, and data exfiltration methods.</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-purple-400 font-semibold mb-2">Process Behavior</h4>
                        <p class="text-gray-300 text-sm">Track process creation, file system modifications, registry changes, and persistence mechanisms.</p>
                    </div>
                </div>
            </div>

            <!-- Detection Methods -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-pink-500/20">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-red-500 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-shield-alt text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Detection Strategies</h3>
                </div>
                <div class="space-y-4">
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-pink-400 font-semibold mb-2">Signature-Based Detection</h4>
                        <p class="text-gray-300 text-sm">Identify known RAT variants through static analysis and signature matching techniques.</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h4 class="text-pink-400 font-semibold mb-2">Heuristic Analysis</h4>
                        <p class="text-gray-300 text-sm">Advanced behavioral detection using machine learning and anomaly detection algorithms.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RAT Analysis Flowchart -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-purple-500/20 mb-16">
            <h3 class="text-2xl font-bold text-white mb-6 text-center">RAT Analysis Workflow</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold">1</span>
                    </div>
                    <h4 class="text-purple-400 font-semibold mb-2">Collection</h4>
                    <p class="text-gray-300 text-sm">Gather suspected RAT samples from various sources</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold">2</span>
                    </div>
                    <h4 class="text-pink-400 font-semibold mb-2">Static Analysis</h4>
                    <p class="text-gray-300 text-sm">Examine file structure, strings, and metadata</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold">3</span>
                    </div>
                    <h4 class="text-red-400 font-semibold mb-2">Dynamic Analysis</h4>
                    <p class="text-gray-300 text-sm">Execute in sandbox and monitor behavior</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold">4</span>
                    </div>
                    <h4 class="text-orange-400 font-semibold mb-2">Report</h4>
                    <p class="text-gray-300 text-sm">Document findings and create IOCs</p>
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

        animateElements.forEach(element => observer.observe(element));
          // Add keyboard shortcuts
        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey || event.metaKey) {
                switch(event.key) {
                    case '1':
                        event.preventDefault();
                        showSection('encryption');
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
    
    // Enhanced Error Handling
    function handleEncryptionError(error, element) {
        console.error('Encryption error:', error);
        addErrorAnimation(element);
        showNotification('Encryption failed. Please try again.', 'error');
    }
    
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
      // Encryption functions
    function encryptText(algorithm) {
        const input = document.getElementById('textInput').value;
        const output = document.getElementById('textOutput');
        const button = event.target;
        
        if (!input.trim()) {
            output.innerHTML = '<span class="text-red-400">Please enter some text to encrypt</span>';
            addErrorAnimation(output);
            return;
        }
        
        try {
            addLoadingState(button);
            
            let result = '';
            
            switch(algorithm) {
                case 'caesar':
                    result = caesarCipher(input, 3);
                    break;
                case 'base64':
                    result = btoa(input);
                    break;
                case 'rot13':
                    result = rot13(input);
                    break;
                case 'reverse':
                    result = input.split('').reverse().join('');
                    break;
            }
            
            setTimeout(() => {
                output.innerHTML = `<span class="text-cyan-400">${result}</span>`;
                addSuccessAnimation(output);
                removeLoadingState(button);
                showNotification(`Text encrypted using ${algorithm.toUpperCase()}`, 'success');
            }, 500);
            
        } catch (error) {
            removeLoadingState(button);
            handleEncryptionError(error, output);
        }
    }
    
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
    
    function encryptImage(algorithm) {
        const canvas = document.getElementById('imageCanvas');
        const ctx = canvas.getContext('2d');
        
        if (!canvas.width) {
            alert('Please upload an image first');
            return;
        }
        
        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const data = imageData.data;
        
        if (algorithm === 'pixelShift') {
            // Simple pixel shifting
            for (let i = 0; i < data.length; i += 4) {
                const temp = data[i];
                data[i] = data[i + 2];
                data[i + 2] = temp;
            }
        } else if (algorithm === 'colorInvert') {
            // Color inversion
            for (let i = 0; i < data.length; i += 4) {
                data[i] = 255 - data[i];     // Red
                data[i + 1] = 255 - data[i + 1]; // Green
                data[i + 2] = 255 - data[i + 2]; // Blue
            }
        }
        
        ctx.putImageData(imageData, 0, 0);
    }
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
    
    function handleEncryptedFileUpload(event) {
        const file = event.target.files[0];
        if (file) {
            selectedEncryptedFile = file;
            // Show feedback that file is ready for decryption
            const fileInput = document.getElementById('encryptedFileInput');
            fileInput.parentElement.innerHTML = `
                <div class="text-center">
                    <i class="fas fa-file-check text-3xl text-green-400 mb-3"></i>
                    <p class="text-green-400 font-semibold">${file.name}</p>
                    <p class="text-gray-400 text-sm">Ready for decryption</p>
                </div>
            `;
        }
    }
    
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
            document.getElementById('fileInput').files = event.dataTransfer.files;
        }
    }
    
    function handleEncryptedFileDrop(event) {
        event.preventDefault();
        event.currentTarget.classList.remove('dragover');
        
        const file = event.dataTransfer.files[0];
        if (file) {
            selectedEncryptedFile = file;
            // Show feedback that file is ready for decryption
            event.currentTarget.innerHTML = `
                <div class="text-center">
                    <i class="fas fa-file-check text-3xl text-green-400 mb-3"></i>
                    <p class="text-green-400 font-semibold">${file.name}</p>
                    <p class="text-gray-400 text-sm">Ready for decryption</p>
                </div>
            `;
        }
    }
    
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
      // File Encryption Function
    async function encryptFile() {
        if (!selectedFile) {
            showNotification('Please select a file to encrypt', 'warning');
            return;
        }
        
        const password = document.getElementById('filePassword').value;
        if (!password) {
            showNotification('Please enter a password for encryption', 'warning');
            addErrorAnimation(document.getElementById('filePassword'));
            return;
        }
        
        if (password.length < 4) {
            showNotification('Password must be at least 4 characters long', 'warning');
            addErrorAnimation(document.getElementById('filePassword'));
            return;
        }
        
        try {
            // Show loading state
            const fileStatus = document.getElementById('fileStatus');
            const encryptButton = event.target;
            
            fileStatus.innerHTML = '<i class="fas fa-spinner fa-spin text-yellow-400"></i> Encrypting...';
            addLoadingState(encryptButton);
            
            // Read file as array buffer
            const fileBuffer = await selectedFile.arrayBuffer();
            const fileData = new Uint8Array(fileBuffer);
            
            // Simple XOR encryption with password (for demonstration)
            const encryptedData = simpleXOREncrypt(fileData, password);
            
            // Create encrypted file blob
            const encryptedBlob = new Blob([encryptedData], { type: 'application/octet-stream' });
            encryptedFile = new File([encryptedBlob], selectedFile.name + '.encrypted', {
                type: 'application/octet-stream'
            });
            
            // Update UI
            setTimeout(() => {
                fileStatus.innerHTML = '<i class="fas fa-lock text-green-400"></i> Encrypted';
                document.getElementById('encryptedFileResult').classList.remove('hidden');
                removeLoadingState(encryptButton);
                addSuccessAnimation(document.getElementById('encryptedFileResult'));
                showNotification(`File "${selectedFile.name}" encrypted successfully`, 'success');
            }, 1000);
            
        } catch (error) {
            const encryptButton = event.target;
            removeLoadingState(encryptButton);
            handleEncryptionError(error, document.getElementById('fileStatus'));
        }
    }
      // File Decryption Function
    async function decryptFile() {
        if (!selectedEncryptedFile) {
            showNotification('Please select an encrypted file to decrypt', 'warning');
            return;
        }
        
        const password = document.getElementById('decryptPassword').value;
        if (!password) {
            showNotification('Please enter the decryption password', 'warning');
            addErrorAnimation(document.getElementById('decryptPassword'));
            return;
        }
        
        try {
            const decryptButton = event.target;
            addLoadingState(decryptButton);
            
            // Read encrypted file
            const fileBuffer = await selectedEncryptedFile.arrayBuffer();
            const encryptedData = new Uint8Array(fileBuffer);
            
            // Decrypt using XOR with password
            const decryptedData = simpleXORDecrypt(encryptedData, password);
            
            // Create decrypted file blob
            const originalName = selectedEncryptedFile.name.replace('.encrypted', '');
            const decryptedBlob = new Blob([decryptedData]);
            decryptedFile = new File([decryptedBlob], originalName);
            
            // Show success with delay for better UX
            setTimeout(() => {
                document.getElementById('decryptedFileResult').classList.remove('hidden');
                removeLoadingState(decryptButton);
                addSuccessAnimation(document.getElementById('decryptedFileResult'));
                showNotification(`File "${originalName}" decrypted successfully`, 'success');
            }, 800);
            
        } catch (error) {
            const decryptButton = event.target;
            removeLoadingState(decryptButton);
            handleDecryptionError(error, document.getElementById('decryptedFileResult'));
        }
    }
    
    // Simple XOR encryption/decryption functions
    function simpleXOREncrypt(data, password) {
        const result = new Uint8Array(data.length);
        const passwordBytes = new TextEncoder().encode(password);
        
        for (let i = 0; i < data.length; i++) {
            result[i] = data[i] ^ passwordBytes[i % passwordBytes.length];
        }
        
        return result;
    }
    
    function simpleXORDecrypt(data, password) {
        return simpleXOREncrypt(data, password); // XOR is its own inverse
    }
      // Download Functions
    function downloadEncryptedFile() {
        if (!encryptedFile) {
            showNotification('No encrypted file available for download', 'warning');
            return;
        }
        
        try {
            const url = URL.createObjectURL(encryptedFile);
            const a = document.createElement('a');
            a.href = url;
            a.download = encryptedFile.name;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            
            showNotification(`Encrypted file "${encryptedFile.name}" downloaded successfully`, 'success');
        } catch (error) {
            console.error('Download error:', error);
            showNotification('Failed to download encrypted file', 'error');
        }
    }
    
    function downloadDecryptedFile() {
        if (!decryptedFile) {
            showNotification('No decrypted file available for download', 'warning');
            return;
        }
        
        try {
            const url = URL.createObjectURL(decryptedFile);
            const a = document.createElement('a');
            a.href = url;
            a.download = decryptedFile.name;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            
            showNotification(`Decrypted file "${decryptedFile.name}" downloaded successfully`, 'success');
        } catch (error) {
            console.error('Download error:', error);
            showNotification('Failed to download decrypted file', 'error');
        }
    }
      // Enhanced Video Demo Functions with Multi-Phase Encryption
    function simulateVideoEncryption() {
        const status = document.getElementById('videoEncryptionStatus');
        const video = document.getElementById('demoVideo');
        
        let scrambleLevel = 0;
        
        // Phase 1: Initialization
        status.innerHTML = `
            <div class="flex items-center justify-center">
                <i class="fas fa-cog fa-spin text-cyan-400 mr-2"></i>
                <span class="text-white">Initializing AES-256 encryption engine...</span>
            </div>
            <div class="mt-2 text-gray-400 text-sm">
                🔐 Generating cryptographic keys • Security Level: Maximum
            </div>
        `;
        
        // Create overlay element for advanced effects
        let overlay = document.querySelector('.video-encryption-overlay');
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.className = 'video-encryption-overlay';
            overlay.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: 10;
                background: linear-gradient(45deg, transparent 30%, rgba(0,255,255,0.1) 50%, transparent 70%);
                opacity: 0;
                transition: all 0.3s ease;
            `;
            video.parentNode.appendChild(overlay);
        }
        
        setTimeout(() => {
            // Phase 2: Progressive Scrambling
            status.innerHTML = `
                <div class="flex items-center justify-center">
                    <i class="fas fa-shield-alt text-yellow-400 mr-2"></i>
                    <span class="text-white">Scrambling video data blocks...</span>
                </div>
                <div class="mt-2 text-gray-400 text-sm">
                    🔄 Processing frame encryption • Progress: 0%
                </div>
            `;
            
            // Progressive scrambling effect
            const scrambleInterval = setInterval(() => {
                scrambleLevel += 20;
                const progress = Math.min(scrambleLevel, 100);
                
                // Update progress
                status.innerHTML = `
                    <div class="flex items-center justify-center">
                        <i class="fas fa-lock text-yellow-400 mr-2"></i>
                        <span class="text-white">Encrypting video frames...</span>
                    </div>
                    <div class="mt-2 text-gray-400 text-sm">
                        🔄 Processing frame encryption • Progress: ${progress}%
                    </div>
                    <div class="mt-3 w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-yellow-400 to-orange-500 h-2 rounded-full transition-all duration-300" style="width: ${progress}%"></div>
                    </div>
                `;
                
                // Apply increasing scramble effects
                video.style.filter = `
                    hue-rotate(${scrambleLevel * 3.6}deg) 
                    contrast(${1 + scrambleLevel * 0.01}) 
                    saturate(${1 + scrambleLevel * 0.02})
                    blur(${scrambleLevel * 0.05}px)
                `;
                
                // Animate overlay
                overlay.style.opacity = progress * 0.01;
                overlay.style.background = `linear-gradient(${45 + scrambleLevel}deg, 
                    transparent 30%, 
                    rgba(${255 - progress}, ${progress * 2.55}, 255, 0.${Math.floor(progress/20)}) 50%, 
                    transparent 70%)`;
                
                if (progress >= 100) {
                    clearInterval(scrambleInterval);
                    
                    setTimeout(() => {
                        // Phase 3: Full Encryption
                        status.innerHTML = `
                            <div class="flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                <span class="text-white">AES-256 encryption completed successfully!</span>
                            </div>
                            <div class="mt-2 text-green-400 text-sm">
                                ✅ 2048-bit key applied • ✅ CBC mode enabled • ✅ IV randomized
                            </div>
                            <div class="mt-3 text-yellow-400 text-sm font-bold">
                                ⚠️ ENCRYPTED CONTENT - AUTHORIZED ACCESS ONLY
                            </div>
                        `;
                        
                        // Final encrypted state
                        video.style.filter = 'hue-rotate(180deg) contrast(1.8) saturate(2) blur(1px)';
                        overlay.style.background = `
                            repeating-linear-gradient(
                                90deg,
                                rgba(255,0,0,0.1) 0px,
                                rgba(0,255,0,0.1) 2px,
                                rgba(0,0,255,0.1) 4px,
                                transparent 6px,
                                transparent 8px
                            )
                        `;
                        overlay.style.opacity = '0.8';
                        
                        // Add encrypted text overlay
                        let textOverlay = document.querySelector('.encrypted-text-overlay');
                        if (!textOverlay) {
                            textOverlay = document.createElement('div');
                            textOverlay.className = 'encrypted-text-overlay';
                            textOverlay.style.cssText = `
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                z-index: 15;
                                color: #ff0000;
                                font-family: 'JetBrains Mono', monospace;
                                font-size: 14px;
                                font-weight: bold;
                                text-shadow: 0 0 10px rgba(255,0,0,0.8);
                                animation: glitch 0.5s infinite;
                                pointer-events: none;
                            `;
                            textOverlay.innerHTML = `
                                <div style="text-align: center;">
                                    <div>ENCRYPTED</div>
                                    <div style="font-size: 10px; margin-top: 5px;">AES-256-CBC</div>
                                    <div style="font-size: 8px; margin-top: 2px;">01001000 01100101 01111000</div>
                                </div>
                            `;
                            video.parentNode.appendChild(textOverlay);
                        }
                        
                        // Add CSS for glitch animation
                        if (!document.querySelector('#glitch-animation')) {
                            const style = document.createElement('style');
                            style.id = 'glitch-animation';
                            style.textContent = `
                                @keyframes glitch {
                                    0% { transform: translate(-50%, -50%) skew(0deg); }
                                    20% { transform: translate(-50%, -50%) skew(2deg); }
                                    40% { transform: translate(-50%, -50%) skew(-1deg); }
                                    60% { transform: translate(-50%, -50%) skew(1deg); }
                                    80% { transform: translate(-50%, -50%) skew(-2deg); }
                                    100% { transform: translate(-50%, -50%) skew(0deg); }
                                }
                            `;
                            document.head.appendChild(style);
                        }
                        
                        // Show success notification
                        showNotification('Video encryption completed successfully! 🔐', 'success');
                        
                        // Auto-reset after 5 seconds
                        setTimeout(() => {
                            resetVideoDemo();
                        }, 5000);
                    }, 1000);
                }
            }, 200);
        }, 1500);
    }
    
    function resetVideoDemo() {
        const status = document.getElementById('videoEncryptionStatus');
        const video = document.getElementById('demoVideo');
        
        // Remove overlays
        const overlay = document.querySelector('.video-encryption-overlay');
        const textOverlay = document.querySelector('.encrypted-text-overlay');
        if (overlay) overlay.remove();
        if (textOverlay) textOverlay.remove();
        
        // Reset video filter with smooth transition
        video.style.transition = 'filter 1s ease';
        video.style.filter = 'none';
        
        // Reset status
        status.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-info-circle text-blue-400 mr-2"></i>
                <span class="text-white">Ready to demonstrate advanced video encryption</span>
            </div>
            <div class="mt-2 text-gray-400 text-sm">
                This simulation demonstrates AES-256 encryption with progressive scrambling effects
            </div>
        `;
        
        showNotification('Video demo reset successfully', 'info');
    }
</script>
@endsection
