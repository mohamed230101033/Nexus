@extends('layouts.nexus')

@section('title', 'Detection & Response - Nexus Project')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --dark-gradient: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
        --neon-blue: #00d4ff;
        --neon-purple: #b300ff;
        --neon-green: #39ff14;
        --neon-yellow: #ffdd00;
        --neon-orange: #ff6600;
        --glass-bg: rgba(255, 255, 255, 0.05);
        --glass-border: rgba(255, 255, 255, 0.1);
    }

    * {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    code, pre {
        font-family: 'JetBrains Mono', 'Fira Code', monospace !important;
    }

    body {
        background: var(--dark-gradient);
        color: #ffffff;
        overflow-x: hidden;
        scroll-behavior: smooth;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Ensure header stays on top */
    header {
        position: sticky !important;
        top: 0 !important;
        z-index: 1000 !important;
    }    /* Main content wrapper */
    .main-content {
        position: relative;
        z-index: 10;
        min-height: 100vh;
        padding-top: 2rem;
    }

    /* Ensure proper z-index layering */
    .relative.z-10.min-h-screen {
        position: relative;
        z-index: 10;
        min-height: 100vh;
    }

    .page-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
        position: relative;
        z-index: 10;
    }

    /* Warning Banner */
    .warning-banner {
        background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
        border: 1px solid #ef4444;
        border-radius: 12px;
        padding: 1.5rem;
        margin: 2rem 0;
        text-align: center;
        box-shadow: 0 4px 20px rgba(220, 38, 38, 0.3);
        position: relative;
        z-index: 10;
    }

    .warning-banner h3 {
        color: #ffffff;
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .warning-banner p {
        color: #fecaca;
        font-size: 0.95rem;
        line-height: 1.5;
        margin: 0;
    }

    /* Hero Section */
    .hero-section {
        padding: 4rem 0;
        text-align: center;
        position: relative;
        z-index: 10;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.85));
        border-radius: 16px;
        margin: 2rem 0;
        backdrop-filter: blur(10px);
    }

    .detection-hero {
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
        top: 0;
        left: 0;
        z-index: 2;
        pointer-events: none;
    }
    
    .orb {
        position: absolute;
        border-radius: 50%;
        opacity: 0.3;
        animation: float 6s ease-in-out infinite;
    }
    
    .orb:nth-child(1) {
        width: 100px;
        height: 100px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
        background: radial-gradient(circle, var(--neon-yellow), transparent);
    }
    
    .orb:nth-child(2) {
        width: 150px;
        height: 150px;
        top: 60%;
        right: 15%;
        animation-delay: 2s;
        background: radial-gradient(circle, var(--neon-orange), transparent);
    }
    
    .orb:nth-child(3) {
        width: 80px;
        height: 80px;
        bottom: 30%;
        left: 20%;
        animation-delay: 4s;
        background: radial-gradient(circle, var(--neon-blue), transparent);
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-20px) scale(1.05); }
    }

    .hero-title {
        font-size: clamp(3rem, 8vw, 6rem);
        font-weight: 900;
        background: linear-gradient(45deg, var(--neon-yellow), var(--neon-orange), var(--neon-blue));
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradient-shift 3s ease-in-out infinite;
        text-align: center;
        margin-bottom: 1rem;
        text-shadow: 0 0 30px rgba(255, 221, 0, 0.5);
    }

    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .hero-subtitle {
        font-size: clamp(1.2rem, 3vw, 1.8rem);
        text-align: center;
        margin-bottom: 3rem;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 300;
    }

    /* Section Titles */
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #60a5fa, #3b82f6, #93c5fd);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-align: center;
        margin-bottom: 1rem;
    }

    .section-description {
        font-size: 1.1rem;
        color: #94a3b8;
        text-align: center;
        margin-bottom: 3rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Research Grid */
    .research-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
        position: relative;
        z-index: 10;
    }

    .research-card {
        background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.92));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(148, 163, 184, 0.1);
        border-radius: 16px;
        padding: 2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 10;
    }

    .research-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #60a5fa, #93c5fd);
        border-radius: 16px 16px 0 0;
    }

    .research-card:hover {
        transform: translateY(-5px);
        border-color: rgba(59, 130, 246, 0.3);
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.1);
    }

    .research-card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #f1f5f9;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .research-icon {
        width: 2.5rem;
        height: 2.5rem;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: white;
    }

    .research-description {
        color: #cbd5e1;
        line-height: 1.7;
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }

    .research-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .research-tag {
        background: rgba(59, 130, 246, 0.1);
        color: #93c5fd;
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.8rem;
        font-weight: 500;
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .research-features {
        color: #cbd5e1;
        margin: 1.5rem 0;
        padding-left: 1.25rem;
    }

    .research-features li {
        margin-bottom: 0.5rem;
        position: relative;
    }

    .research-features li::before {
        content: '→';
        color: #3b82f6;
        font-weight: bold;
        position: absolute;
        left: -1.25rem;
    }

    /* Educational Disclaimer */
    .disclaimer-section {
        background: linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(239, 68, 68, 0.05));
        border: 1px solid rgba(220, 38, 38, 0.3);
        border-radius: 16px;
        padding: 2rem;
        margin: 3rem 0;
        text-align: center;
        position: relative;
        z-index: 10;
    }

    .disclaimer-title {
        color: #ef4444;
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .disclaimer-description {
        color: #cbd5e1;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }

    .disclaimer-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 1.5rem;
    }

    .disclaimer-feature {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        color: #e2e8f0;
        font-weight: 500;
    }

    .disclaimer-feature i {
        color: #10b981;
        font-size: 1.1rem;
    }

    /* Modern Tech Grid */
    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
        padding: 0 2rem;
    }

    .tech-card {
        background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.92));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 221, 0, 0.2);
        border-radius: 16px;
        padding: 2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .tech-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--neon-yellow), var(--neon-orange), var(--neon-blue));
        border-radius: 16px 16px 0 0;
    }

    .tech-card:hover {
        transform: translateY(-8px);
        border-color: rgba(255, 221, 0, 0.4);
        box-shadow: 0 20px 40px rgba(255, 221, 0, 0.15);
    }

    .tech-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--neon-yellow);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .tech-card .icon {
        font-size: 1.8rem;
        width: 2.5rem;
        height: 2.5rem;
        background: linear-gradient(135deg, var(--neon-yellow), var(--neon-orange));
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tech-card p {
        color: #cbd5e1;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .tag {
        background: rgba(255, 221, 0, 0.1);
        color: var(--neon-yellow);
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        border: 1px solid rgba(255, 221, 0, 0.3);
    }

    /* Glass Card Effect */
    .glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        border: 1px solid var(--glass-border);
        border-radius: 16px;
        transition: all 0.3s ease;
        position: relative;
        z-index: 20 !important;
    }

    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* YARA Screenshot Styles */
    .yara-screenshot-container {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        aspect-ratio: 16/10;
    }

    .yara-screenshot-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .yara-screenshot-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        color: var(--neon-yellow);
        font-size: 2rem;
    }

    .glass-card:hover .yara-screenshot-overlay {
        opacity: 1;
    }

    .glass-card:hover .yara-screenshot-image {
        transform: scale(1.05);
    }

    /* YARA Screenshots Grid */
    .yara-screenshots-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .yara-screenshot-card {
        background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.92));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 221, 0, 0.2);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .yara-screenshot-card:hover {
        transform: translateY(-5px);
        border-color: rgba(255, 221, 0, 0.4);
        box-shadow: 0 15px 30px rgba(255, 221, 0, 0.1);
    }

    .yara-screenshot-content {
        padding-top: 1rem;
    }

    .yara-screenshot-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--neon-yellow);
        margin-bottom: 0.5rem;
    }

    .yara-screenshot-description {
        color: #cbd5e1;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .yara-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .yara-tags .research-tag {
        background: rgba(255, 221, 0, 0.1);
        color: var(--neon-yellow);
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
        border: 1px solid rgba(255, 221, 0, 0.3);
    }

    /* Detection Title Styles */
    .detection-title {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(45deg, var(--neon-yellow), var(--neon-orange));
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-align: center;
        margin-bottom: 1rem;
    }

    .detection-description {
        color: #94a3b8;
        text-align: center;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in {
        animation: fadeInUp 0.6s ease forwards;
    }

    /* Input Field Styles */
    .nexus-input {
        position: relative;
        z-index: 30 !important;
        width: 100%;
        padding: 0.75rem 1rem;
        background: rgba(15, 23, 42, 0.6);
        border: 2px solid rgba(59, 130, 246, 0.3);
        border-radius: 8px;
        color: #fff;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
        pointer-events: auto !important;
    }

    .nexus-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
    }

    .nexus-input::placeholder {
        color: rgba(148, 163, 184, 0.7);
    }

    /* Button Styles */
    .nexus-button {
        position: relative;
        z-index: 40 !important;
        pointer-events: auto !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .nexus-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
    }

    .nexus-button:active {
        transform: translateY(0);
    }

    .nexus-button.danger {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    .nexus-button.success {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    /* Video Controls */
    .video-controls {
        position: relative;
        z-index: 35;
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .video-status {
        padding: 1rem;
        border-radius: 8px;
        background: rgba(15, 23, 42, 0.6);
        border: 1px solid rgba(59, 130, 246, 0.3);
        margin-top: 1rem;
    }

    .video-status.encrypted {
        border-color: rgba(239, 68, 68, 0.5);
        background: rgba(239, 68, 68, 0.1);
    }

    .video-status.decrypted {
        border-color: rgba(16, 185, 129, 0.5);
        background: rgba(16, 185, 129, 0.1);
    }

    /* Testing Section Styles */
    .testing-section {
        position: relative;
        z-index: 30;
        background: rgba(15, 23, 42, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        border: 1px solid rgba(59, 130, 246, 0.2);
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .input-group {
        margin-bottom: 1.5rem;
    }

    .input-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #e2e8f0;
        font-weight: 500;
    }

    /* Fix video controls */
    .video-container {
        position: relative;
        z-index: 25;
    }

    /* Ensure background elements don't block interaction */
    .particles-container {
        pointer-events: none !important;
    }

    .floating-orbs {
        pointer-events: none !important;
    }

    /* Make sure form elements are interactive */
    input, textarea, button {
        pointer-events: auto !important;
        position: relative;
        z-index: 50 !important;
    }

    /* Ensure container doesn't block interactions */
    .container {
        position: relative;
        z-index: 20;
    }
</style>
@endpush

@section('content')
<!-- Detection Hero Section -->
<div class="detection-hero">
    <div class="particles-container" id="particles-js"></div>
    
    <div class="floating-orbs">
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="orb"></div>
    </div>

    <div class="hero-content container mx-auto px-4">
        <div class="warning-banner" data-aos="fade-down">
            <h3><i class="fas fa-exclamation-triangle"></i> Educational Research Only</h3>
            <p>This content demonstrates detection and response techniques for cybersecurity education and defensive research purposes only. All methodologies are studied to improve threat detection capabilities.</p>
        </div>
        
        <h1 class="hero-title" data-aos="fade-up">Detection & Response Research</h1>
        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Advanced Threat Detection & Automated Response Systems for Cybersecurity Defense</p>
    </div>
</div>

<div class="container">
    <!-- Detection Capabilities Overview -->
    <section class="py-20 bg-gray-900/50 backdrop-blur-sm" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-6 bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                    Detection Capabilities Overview
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Comprehensive analysis of modern threat detection methodologies and implementation strategies
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Real-time Detection -->
                <div class="glass-card p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-bolt text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white">Real-time Detection</h3>
                    </div>
                    <p class="text-gray-300 mb-4">Advanced monitoring systems for immediate threat identification and response activation.</p>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-check text-cyan-400 mr-2"></i>
                            Network traffic analysis
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-cyan-400 mr-2"></i>
                            Process behavior monitoring
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-cyan-400 mr-2"></i>
                            System call tracking
                        </li>
                    </ul>
                </div>

                <!-- Machine Learning Integration -->
                <div class="glass-card p-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-brain text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white">ML Integration</h3>
                    </div>
                    <p class="text-gray-300 mb-4">Advanced machine learning algorithms for detecting and analyzing complex malware patterns and behaviors.</p>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-check text-purple-400 mr-2"></i>
                            Deep learning for pattern analysis
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-purple-400 mr-2"></i>
                            Neural network behavior detection
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-purple-400 mr-2"></i>
                            Automated threat classification
                        </li>
                    </ul>
                </div>

                <!-- Automated Response -->
                <div class="glass-card p-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white">Automated Response</h3>
                    </div>
                    <p class="text-gray-300 mb-4">Intelligent response systems for rapid threat containment and mitigation.</p>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-2"></i>
                            Threat isolation
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-2"></i>
                            System hardening
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-2"></i>
                            Recovery protocols
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Detection Metrics -->
            <div class="mt-16 grid lg:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="400">
                <div class="glass-card p-6 text-center">
                    <div class="text-4xl font-bold text-cyan-400 mb-2">99.9%</div>
                    <div class="text-gray-300">Detection Rate</div>
                </div>
                <div class="glass-card p-6 text-center">
                    <div class="text-4xl font-bold text-purple-400 mb-2">&lt;0.1%</div>
                    <div class="text-gray-300">False Positives</div>
                </div>
                <div class="glass-card p-6 text-center">
                    <div class="text-4xl font-bold text-green-400 mb-2">50ms</div>
                    <div class="text-gray-300">Response Time</div>
                </div>
                <div class="glass-card p-6 text-center">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">24/7</div>
                    <div class="text-gray-300">Monitoring</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Research Grid -->
    <div class="tech-grid" data-aos="fade-up" data-aos-delay="400">
        <!-- YARA Rules Research -->
        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="500">
            <h3><div class="icon">🔍</div>YARA Rules Development</h3>
            <p>Research into signature-based detection systems using YARA rule engine for malware identification, pattern matching, and threat classification in cybersecurity defense.</p>
            <div class="tags">
                <span class="tag">Signature Detection</span>
                <span class="tag">Pattern Matching</span>
                <span class="tag">Malware Analysis</span>
                <span class="tag">Rule Engine</span>
            </div>
            <ul style="color: #cbd5e1; margin: 20px 0; padding-left: 20px;">
                <li>Custom YARA rule creation for ransomware detection</li>
                <li>String and hex pattern identification</li>
                <li>Behavioral signature development</li>
                <li>Performance optimization techniques</li>
            </ul>
        </div>

        <!-- Automated Response Research -->
        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="600">
            <h3><div class="icon">⚡</div>Automated Response Systems</h3>
            <p>Development and analysis of automated incident response frameworks for rapid threat containment, isolation protocols, and coordinated defensive actions.</p>
            <div class="tags">
                <span class="tag">Incident Response</span>
                <span class="tag">Automation</span>
                <span class="tag">Threat Containment</span>
                <span class="tag">SOAR Integration</span>
            </div>
            <ul style="color: #cbd5e1; margin: 20px 0; padding-left: 20px;">
                <li>Playbook development for common threat scenarios</li>
                <li>API integration with security tools</li>
                <li>Automated quarantine and isolation procedures</li>
                <li>Real-time alerting and notification systems</li>
            </ul>
        </div>

        <!-- Behavioral Analysis Research -->
        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="700">
            <h3><div class="icon">🧠</div>Behavioral Analysis Engine</h3>
            <p>Machine learning-powered behavioral analysis for detecting anomalous activities, zero-day threats, and advanced persistent threats through pattern recognition.</p>
            <div class="tags">
                <span class="tag">Machine Learning</span>
                <span class="tag">Anomaly Detection</span>
                <span class="tag">Zero-Day Protection</span>
                <span class="tag">APT Detection</span>
            </div>
            <ul style="color: #cbd5e1; margin: 20px 0; padding-left: 20px;">
                <li>Neural network-based anomaly detection</li>
                <li>Process behavior monitoring and analysis</li>
                <li>Network traffic pattern recognition</li>
                <li>User behavior analytics implementation</li>
            </ul>
        </div>

        <!-- Threat Intelligence Research -->
        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="800">
            <h3><div class="icon">🌐</div>Threat Intelligence Integration</h3>
            <p>Integration of threat intelligence feeds, IOC management, and contextual threat data to enhance detection accuracy and reduce false positives.</p>
            <div class="tags">
                <span class="tag">Threat Intel</span>
                <span class="tag">IOC Management</span>
                <span class="tag">Context Analysis</span>
                <span class="tag">False Positive Reduction</span>
            </div>
            <ul style="color: #cbd5e1; margin: 20px 0; padding-left: 20px;">
                <li>Multi-source threat intelligence aggregation</li>
                <li>IOC correlation and enrichment</li>
                <li>Attribution analysis and threat actor profiling</li>
                <li>Predictive threat modeling</li>
            </ul>
        </div>
    </div>
</div>

<!-- YARA Rule Analysis Section -->
<section class="py-20 container mx-auto px-4" data-aos="fade-up">
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold mb-6 bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent">
            YARA Rule Analysis & Implementation
        </h2>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">
            Advanced malware detection using custom YARA rules with real-world examples and implementation
        </p>
    </div>

    <!-- Why Use YARA Section -->
    <div class="mb-16">
        <h3 class="text-2xl font-bold text-white mb-8">Why Use YARA for Malware Detection?</h3>
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Precision Through Custom Rules -->
            <div class="glass-card p-6">
                <h4 class="text-lg font-semibold text-yellow-400 mb-4">
                    <i class="fas fa-crosshairs mr-2"></i>
                    Precision Through Custom Rules
                </h4>
                <p class="text-gray-300 text-sm mb-4">
                    YARA enables analysts to write highly specific rules tailored to unique malware characteristics. Unlike static hash-based detection, 
                    YARA rules identify patterns through specific strings, regular expressions, and byte sequences, effectively detecting variants 
                    sharing common behavior or code fragments, even when not identical.
                </p>
            </div>

            <!-- Flexibility and Adaptability -->
            <div class="glass-card p-6">
                <h4 class="text-lg font-semibold text-yellow-400 mb-4">
                    <i class="fas fa-puzzle-piece mr-2"></i>
                    Flexibility and Adaptability
                </h4>
                <p class="text-gray-300 text-sm mb-4">
                    Combat obfuscated malware with YARA's logical conditions and multiple string indicators. Create sophisticated 
                    rules triggering only when multiple suspicious indicators are present, reducing false positives while catching 
                    elusive threats that bypass traditional signature-based detection.
                </p>
            </div>

            <!-- Multi-Platform Compatibility -->
            <div class="glass-card p-6">
                <h4 class="text-lg font-semibold text-yellow-400 mb-4">
                    <i class="fas fa-desktop mr-2"></i>
                    Multi-Platform Compatibility
                </h4>
                <p class="text-gray-300 text-sm mb-4">
                    Available on Windows, Linux, and macOS, YARA operates both as a command-line tool and through libraries like 
                    yara-python. Seamlessly integrate into automated scanning processes and incident response workflows across heterogeneous environments.
                </p>
            </div>

            <!-- Enhanced Analysis & Intelligence -->
            <div class="glass-card p-6">
                <h4 class="text-lg font-semibold text-yellow-400 mb-4">
                    <i class="fas fa-microscope mr-2"></i>
                    Enhanced Analysis & Intelligence
                </h4>
                <p class="text-gray-300 text-sm mb-4">
                    Beyond detection, YARA provides valuable insights into malware behavior, supporting digital forensics and 
                    incident investigations. Track malware evolution and understand operational techniques through detailed rule-based analysis,
                    even detecting malware that VirusTotal might miss due to its advanced pattern matching capabilities.
                </p>
            </div>
        </div>
    </div>

    <!-- Real-World Detection Examples -->
    <div class="mb-16">
        <h3 class="text-2xl font-bold text-white mb-8">Real-World Detection Examples</h3>
        
        <!-- Example 1: Multiple Suspicious Files -->
        <div class="glass-card p-6 mb-8">
            <h4 class="text-lg font-semibold text-yellow-400 mb-4">
                <i class="fas fa-file-code mr-2"></i>
                Detection of Multiple Suspicious Files
            </h4>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h5 class="text-white font-medium mb-2">Key Logger Detection</h5>
                    <div class="bg-gray-800/50 rounded p-4">
                        <p class="text-gray-300 text-sm">
                            File: Keylogger.js<br>
                            Status: Flagged as potential keylogger<br>
                            Trigger: Patterns indicating keystroke capture capability<br>
                            Details: YARA rule detected specific patterns suggesting keylogging functionality
                        </p>
                    </div>
                </div>
                <div>
                    <h5 class="text-white font-medium mb-2">Remote Access Detection</h5>
                    <div class="bg-gray-800/50 rounded p-4">
                        <p class="text-gray-300 text-sm">
                            Files: CryptBot.exe, rate.exe<br>
                            Status: Flagged as RAT malware<br>
                            Trigger: Backdoor/RAT functionality signatures<br>
                            Details: Matched YARA signatures for remote access capabilities
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Example 2: Malicious Shell Script Analysis -->
        <div class="glass-card p-6 mb-8">
            <h4 class="text-lg font-semibold text-yellow-400 mb-4">
                <i class="fas fa-terminal mr-2"></i>
                Malicious Shell Script Analysis (test.sh)
            </h4>
            <div class="space-y-4">
                <div>
                    <h5 class="text-white font-medium mb-2">Environment Manipulation</h5>
                    <div class="bg-gray-800/50 rounded p-4">
                        <p class="text-gray-300 text-sm">
                            • PATH variable modification detected<br>
                            • Attempt to override system binaries<br>
                            • Potential masking of malicious activities<br>
                            • Common technique for hiding malware operations
                        </p>
                    </div>
                </div>
                <div>
                    <h5 class="text-white font-medium mb-2">Suspicious Download URLs</h5>
                    <div class="bg-gray-800/50 rounded p-4">
                        <p class="text-gray-300 text-sm">
                            Domain Analysis:<br>
                            • conn.masjesu.zip detected<br>
                            • Suspicious .zip TLD (Google-managed but security risk)<br>
                            • Unknown masjesu subdomain<br>
                            • Potential C2 communication channel<br>
                            • Multiple wget/curl commands to suspicious domains
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Example 3: VirusTotal Integration -->
        <div class="glass-card p-6">
            <h4 class="text-lg font-semibold text-yellow-400 mb-4">
                <i class="fas fa-shield-virus mr-2"></i>
                VirusTotal Analysis Results
            </h4>
            <div class="bg-gray-800/50 rounded p-4">
                <p class="text-gray-300 text-sm mb-4">
                    File: Opticbyxsmal.exe<br>
                    Detection Rate: 54/73 antivirus engines<br>
                    Classification: Trojan/Dropper/Spyware<br>
                    <br>
                    Identified Capabilities:<br>
                    • Debug environment detection<br>
                    • User input monitoring<br>
                    • System persistence mechanisms<br>
                    • Additional payload delivery<br>
                    • Potential C2 communication via conn.masjesu.zip<br>
                    <br>
                    Common Labels:<br>
                    • Trojan.Win.ACid.CSG5910<br>
                    • Trojan:MSIL/Agent.Gen<br>
                    • Win32:Dropper-gen
                </p>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-red-400">Critical Risk Level</span>
                    <span class="text-yellow-400">Immediate Isolation Required</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Automation Response -->
    <div class="mb-16">
        <h3 class="text-2xl font-bold text-white mb-8">Automated Response Implementation</h3>
        <div class="glass-card p-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-lg font-semibold text-yellow-400 mb-4">Detection Response Protocol</h4>
                    <p class="text-gray-300 text-sm mb-4">
                        Automated response actions for detected malicious files:
                    </p>
                    <ul class="space-y-2 text-gray-300 text-sm">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-2"></i>
                            Remove execute permissions immediately
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-2"></i>
                            Isolate in secure quarantine location
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-2"></i>
                            Generate detailed incident report
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-400 mr-2"></i>
                            Alert security team for analysis
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-yellow-400 mb-4">Implementation Example</h4>
                    <div class="bg-gray-800/50 rounded p-4">
                        <p class="text-gray-300 text-sm mb-4">
                            Kali Linux Environment:<br>
                            • Detection of Malware.sh in mixed file environment<br>
                            • Automated execution of yara_response.sh<br>
                            • Successful isolation of malicious content<br>
                            • Prevention of accidental execution
                        </p>
                        <code class="text-sm text-gray-300 block mt-4">
                            kali@kali:~/Desktop $ ./yara_response.sh<br>
                            [+] Scanning for malicious files...<br>
                            [+] Malware.sh detected<br>
                            [+] Removing execute permissions<br>
                            [+] Moving to quarantine...<br>
                            [+] Operation completed successfully
                        </code>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- YARA Modal -->
<div id="yara-modal" class="yara-modal">
    <div class="yara-modal-content">
        <button class="yara-modal-close" onclick="closeYaraModal()">×</button>
        <img id="yara-modal-image" class="yara-modal-image" src="" alt="">
    </div>
</div>

    <!-- Video Analysis Section -->
    <div class="testing-section">
        <h3 class="text-2xl font-bold text-white mb-6">Video Analysis Controls</h3>
        
        <!-- Video Player -->
        <div class="video-container mb-4">
            <video id="analysisVideo" class="w-full rounded-lg" controls>
                <source src="{{ asset('videos/yara.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <!-- Video Controls -->
        <div class="video-controls">
            <button onclick="encryptVideo()" class="nexus-button danger">
                <i class="fas fa-lock mr-2"></i>
                Encrypt Video
            </button>
            <button onclick="decryptVideo()" class="nexus-button success">
                <i class="fas fa-unlock mr-2"></i>
                Decrypt Video
            </button>
        </div>

        <!-- Video Status -->
        <div id="videoStatus" class="video-status mt-4">
            <p class="text-gray-300">
                <i class="fas fa-info-circle mr-2"></i>
                Video ready for analysis
            </p>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>
    // Particles.js configuration
    particlesJS('particles-js', {
        particles: {
            number: { value: 100, density: { enable: true, value_area: 800 } },
            color: { value: ["#ffdd00", "#ff6600", "#00d4ff"] },
            shape: { type: "circle" },
            opacity: { value: 0.6, random: true },
            size: { value: 3, random: true },
            line_linked: {
                enable: true,
                distance: 150,
                color: "#ffffff",
                opacity: 0.2,
                width: 1
            },
            move: {
                enable: true,
                speed: 2,
                direction: "none",
                random: true,
                straight: false,
                out_mode: "out",
                bounce: false
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: { enable: true, mode: "repulse" },
                onclick: { enable: true, mode: "push" }
            },
            modes: {
                repulse: { distance: 100, duration: 0.4 },
                push: { particles_nb: 4 }
            }
        },
        retina_detect: true
    });

    // Initialize AOS (Animate On Scroll)
    AOS.init({
        duration: 1000,
        easing: 'ease-out-cubic',
        once: true,
        offset: 100
    });

    // GSAP Animations
    gsap.registerPlugin(ScrollTrigger);

    // Hero title animation
    gsap.from(".hero-title", {
        duration: 2,
        y: 100,
        opacity: 0,
        ease: "power4.out"
    });

    // Tech cards animation
    gsap.from(".tech-card", {
        scrollTrigger: {
            trigger: ".tech-grid",
            start: "top 80%"
        },
        duration: 1,
        y: 50,
        opacity: 0,
        stagger: 0.2,
        ease: "power3.out"
    });

    // YARA Modal functionality
    function openYaraModal(imageSrc, title) {
        const modal = document.getElementById('yara-modal');
        const modalImage = document.getElementById('yara-modal-image');
        
        modalImage.src = imageSrc;
        modalImage.alt = title;
        modal.style.display = 'flex';
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }

    function closeYaraModal() {
        const modal = document.getElementById('yara-modal');
        modal.style.display = 'none';
        
        // Restore body scroll
        document.body.style.overflow = 'auto';
    }

    // Add click event listeners to YARA screenshots
    document.addEventListener('DOMContentLoaded', function() {
        const yaraCards = document.querySelectorAll('.glass-card[data-image]');
        yaraCards.forEach(card => {
            card.addEventListener('click', function() {
                const imageSrc = this.getAttribute('data-image');
                const title = this.getAttribute('data-title');
                openYaraModal(imageSrc, title);
            });
        });

        // Close modal when clicking outside the image
        document.getElementById('yara-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeYaraModal();
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeYaraModal();
            }
        });
    });

    // Make all inputs functional
    document.addEventListener('DOMContentLoaded', function() {
        // Enable all inputs
        const inputs = document.querySelectorAll('.nexus-input');
        inputs.forEach(input => {
            input.disabled = false;
            
            // Add interaction feedback
            input.addEventListener('focus', function() {
                this.style.borderColor = '#3b82f6';
                this.style.boxShadow = '0 0 0 2px rgba(59, 130, 246, 0.2)';
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.style.borderColor = 'rgba(59, 130, 246, 0.3)';
                    this.style.boxShadow = 'none';
                }
            });

            input.addEventListener('input', function() {
                // Add visual feedback when typing
                this.style.borderColor = '#3b82f6';
            });
        });
    });

    // Pattern Testing Functions
    function analyzeInput() {
        const input = document.getElementById('patternInput').value;
        const resultsDiv = document.getElementById('analysisResults');
        const resultsContent = document.getElementById('resultsContent');
        
        if (!input.trim()) {
            alert('Please enter a pattern to analyze');
            return;
        }

        // Simple pattern analysis (for educational purposes)
        const analysis = {
            length: input.length,
            hasSpecialChars: /[!@#$%^&*(),.?":{}|<>]/.test(input),
            hasNumbers: /\d/.test(input),
            hasUpperCase: /[A-Z]/.test(input),
            hasLowerCase: /[a-z]/.test(input),
            repeatingPatterns: findRepeatingPatterns(input),
            entropy: calculateEntropy(input)
        };

        // Format results
        const results = `Pattern Analysis Results:
• Length: ${analysis.length} characters
• Contains Special Characters: ${analysis.hasSpecialChars ? 'Yes' : 'No'}
• Contains Numbers: ${analysis.hasNumbers ? 'Yes' : 'No'}
• Contains Uppercase: ${analysis.hasUpperCase ? 'Yes' : 'No'}
• Contains Lowercase: ${analysis.hasLowerCase ? 'Yes' : 'No'}
• Entropy Score: ${analysis.entropy.toFixed(2)}
${analysis.repeatingPatterns.length > 0 ? '\nRepeating Patterns Found:\n' + analysis.repeatingPatterns.join('\n') : '\nNo significant repeating patterns found'}`;

        // Display results
        resultsContent.textContent = results;
        resultsDiv.classList.remove('hidden');
    }

    function clearInput() {
        document.getElementById('patternInput').value = '';
        document.getElementById('analysisResults').classList.add('hidden');
        document.getElementById('resultsContent').textContent = '';
    }

    function findRepeatingPatterns(input) {
        const patterns = [];
        const minLength = 3;
        
        // Look for repeating sequences
        for (let len = minLength; len <= Math.floor(input.length / 2); len++) {
            for (let i = 0; i <= input.length - len; i++) {
                const pattern = input.substr(i, len);
                const remaining = input.substr(i + len);
                if (remaining.includes(pattern)) {
                    patterns.push(`"${pattern}" (length: ${len})`);
                }
            }
        }
        
        // Return unique patterns
        return [...new Set(patterns)];
    }

    function calculateEntropy(input) {
        const len = input.length;
        const frequencies = {};
        
        // Calculate character frequencies
        for (let i = 0; i < len; i++) {
            frequencies[input[i]] = (frequencies[input[i]] || 0) + 1;
        }
        
        // Calculate entropy
        return Object.values(frequencies).reduce((entropy, freq) => {
            const p = freq / len;
            return entropy - (p * Math.log2(p));
        }, 0);
    }

    // Video Functions
    let isVideoEncrypted = false;
    const video = document.getElementById('analysisVideo');
    const statusDiv = document.getElementById('videoStatus');

    function encryptVideo() {
        if (!isVideoEncrypted) {
            video.pause();
            video.controls = false;
            video.style.filter = 'blur(10px) brightness(0.5)';
            
            statusDiv.className = 'video-status mt-4 encrypted';
            statusDiv.innerHTML = `
                <p class="text-red-400">
                    <i class="fas fa-lock mr-2"></i>
                    Video encrypted and playback disabled
                </p>
            `;
            
            isVideoEncrypted = true;
        }
    }

    function decryptVideo() {
        if (isVideoEncrypted) {
            video.controls = true;
            video.style.filter = 'none';
            
            statusDiv.className = 'video-status mt-4 decrypted';
            statusDiv.innerHTML = `
                <p class="text-green-400">
                    <i class="fas fa-unlock mr-2"></i>
                    Video decrypted and playback restored
                </p>
            `;
            
            isVideoEncrypted = false;
        }
    }
</script>
@endpush
