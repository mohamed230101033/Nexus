@extends('layouts.nexus')

@section('title', 'Delivery Methods Research - Nexus Project')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    * {
        box-sizing: border-box;
    }    body {
        font-family: 'Inter', sans-serif;
        background: transparent !important;
        color: #e2e8f0;
        position: relative;
        z-index: 1;
    }

    /* Ensure navbar stays on top */
    header {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        width: 100% !important;
    }

    /* Main content positioning */
    .main-content {
        background: transparent !important;
        min-height: 100vh;
        position: relative;
        z-index: 1;
    }

    /* Hero section specific positioning */
    .hero-section {
        position: relative;
        z-index: 10;
        padding-top: 2rem;
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        background: linear-gradient(90deg, #60a5fa, #3b82f6, #93c5fd);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: #94a3b8;
        max-width: 600px;
        margin: 0 auto 2rem;
        line-height: 1.6;
    }

    .research-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .research-card {
        background: rgba(15, 23, 42, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(59, 130, 246, 0.1);
        border-radius: 16px;
        padding: 2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .research-card:hover {
        transform: translateY(-5px);
        border-color: rgba(59, 130, 246, 0.3);
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.1);
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

    .card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .card-icon {
        font-size: 2rem;
        width: 3rem;
        height: 3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #3b82f6, #60a5fa);
        border-radius: 12px;
        color: white;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #e2e8f0;
        margin: 0;
    }

    .card-description {
        color: #94a3b8;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .feature-list {
        list-style: none;
        padding: 0;
        margin: 0 0 1.5rem 0;
    }

    .feature-list li {
        color: #cbd5e1;
        padding: 0.5rem 0;
        display: flex;
        align-items: center;
    }

    .feature-list li::before {
        content: '•';
        color: #60a5fa;
        font-weight: bold;
        margin-right: 0.5rem;
    }

    .warning-banner {
        background: linear-gradient(135deg, #991b1b, #dc2626);
        border: 1px solid #fca5a5;
        border-radius: 12px;
        padding: 1.5rem;
        margin: 2rem auto;
        max-width: 1200px;
    }

    .warning-content {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .warning-icon {
        font-size: 2rem;
        color: #fef2f2;
    }

    .warning-text {
        color: #fef2f2;
        font-weight: 500;
    }

    .disclaimer-section {
        background: rgba(30, 41, 59, 0.5);
        border: 1px solid rgba(148, 163, 184, 0.2);
        border-radius: 12px;
        padding: 2rem;
        margin: 3rem auto;
        max-width: 1200px;
    }

    .disclaimer-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #e2e8f0;
        margin-bottom: 1rem;
    }

    .disclaimer-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }    .disclaimer-list li {
        color: #94a3b8;
        padding: 0.75rem 0;
        display: flex;
        align-items: center;
    }

    .disclaimer-list li::before {
        content: '✓';
        color: #22c55e;
        font-weight: bold;
        margin-right: 0.75rem;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background: rgba(59, 130, 246, 0.1);
        border: 1px solid rgba(59, 130, 246, 0.3);
        border-radius: 2rem;
        color: #60a5fa;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 2rem;
    }

    .hero-description {
        font-size: 1.125rem;
        color: #94a3b8;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.7;
    }

    .section-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: #e2e8f0;
        margin-bottom: 1rem;
    }

    .section-description {
        font-size: 1.125rem;
        color: #94a3b8;
        max-width: 600px;
        margin: 0 auto;
    }

    .research-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .research-icon {
        width: 3rem;
        height: 3rem;
        background: linear-gradient(135deg, #3b82f6, #60a5fa);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .research-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #e2e8f0;
        margin-bottom: 1rem;
    }

    .research-description {
        color: #94a3b8;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .research-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .research-tag {
        padding: 0.5rem 1rem;
        background: rgba(59, 130, 246, 0.1);
        border: 1px solid rgba(59, 130, 246, 0.3);
        border-radius: 1rem;
        color: #60a5fa;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .research-stat {
        display: flex;
        align-items: baseline;
        gap: 0.5rem;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: #3b82f6;
    }

    .stat-label {
        color: #94a3b8;
        font-size: 0.875rem;
    }

    .research-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .research-list li {
        color: #94a3b8;
        padding: 0.5rem 0;
        display: flex;
        align-items: center;
    }

    .research-list li::before {
        content: '•';
        color: #60a5fa;
        font-weight: bold;
        margin-right: 0.75rem;
    }

    .warning-section {
        background: linear-gradient(135deg, #991b1b, #dc2626);
        border: 1px solid #fca5a5;
        border-radius: 12px;
        padding: 2rem;
        margin: 3rem auto;
        max-width: 1200px;
    }

    .warning-content {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .warning-icon {
        font-size: 2rem;
        color: #fef2f2;
    }

    .warning-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #fef2f2;
        margin: 0 0 0.5rem 0;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        padding: 1rem 2rem;
        background: linear-gradient(135deg, #3b82f6, #60a5fa);
        color: white;
        text-decoration: none;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
          .research-grid {
            grid-template-columns: 1fr;
            padding: 0 1rem;
        }
    }

    .payload-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(255, 215, 0, 0.3) 50%, 
            transparent 100%);
        animation: launchSweep 8s ease-in-out infinite;
    }

    @keyframes launchSweep {
        0% { left: -100%; }
        50% { left: 100%; }
        100% { left: -100%; }
    }

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

    /* Screenshots Section Styles */
    .screenshots-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .screenshot-card {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
        border: 1px solid rgba(59, 130, 246, 0.2);
        border-radius: 16px;
        overflow: hidden;
        backdrop-filter: blur(20px);
        transition: all 0.3s ease;
        transform: translateY(-2px);
    }

    .screenshot-card:hover {
        transform: translateY(-8px);
        border-color: rgba(59, 130, 246, 0.4);
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.1);
    }

    .screenshot-container {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: linear-gradient(135deg, #1e293b, #0f172a);
    }

    .screenshot-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .screenshot-card:hover .screenshot-image {
        transform: scale(1.05);
    }

    .screenshot-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .screenshot-card:hover .screenshot-overlay {
        opacity: 1;
    }

    .screenshot-overlay i {
        font-size: 2rem;
        color: #60a5fa;
    }

    .screenshot-content {
        padding: 1.5rem;
    }

    .screenshot-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #e2e8f0;
        margin-bottom: 0.75rem;
    }

    .screenshot-description {
        color: #94a3b8;
        line-height: 1.6;
        margin-bottom: 1rem;
        font-size: 0.95rem;
    }

    .screenshot-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    @media (max-width: 768px) {
        .screenshots-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .screenshot-container {
            height: 180px;
        }
    }
</style>
@endpush

@section('content')
<div class="main-content">
<div class="max-w-7xl mx-auto px-4">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="text-center mb-16">
            <div class="hero-badge">
                <i class="fas fa-shield-alt mr-3"></i>
                Malware Delivery Vector Analysis
            </div>
            <h1 class="hero-title">
                Delivery Methods
            </h1>
            <h2 class="hero-subtitle">
                Understanding Attack Vectors for Better Defense
            </h2>
            <p class="hero-description">
                Comprehensive analysis of malware delivery mechanisms, infection vectors, and propagation techniques 
                used in modern cyber attacks for educational defense purposes.
            </p>
        </div>
    </section>    <!-- Primary Delivery Vectors -->
    <section class="py-16 mb-12">
        <div class="text-center mb-12">
            <h2 class="section-title">Primary Attack Vectors</h2>
            <p class="section-description">
                Understanding the most common malware delivery methods and their characteristics
            </p>
        </div>
        
        <div class="research-grid">
            <!-- Email-Based Attacks -->
            <div class="research-card">
                <div class="research-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 class="research-title">Email-Based Attacks</h3>
                <p class="research-description">
                    Analysis of phishing campaigns, malicious attachments, and social engineering 
                    techniques to develop better email security and user awareness programs.
                </p>
                <div class="research-tags">
                    <span class="research-tag">Spear Phishing</span>
                    <span class="research-tag">Malicious PDFs</span>
                    <span class="research-tag">Office Macros</span>
                </div>
                <div class="research-stat">
                    <span class="stat-value">85%</span>
                    <span class="stat-label">of malware delivered via email</span>
                </div>
            </div>
            
            <!-- Web-Based Exploits -->
            <div class="research-card">
                <div class="research-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="research-title">Web-Based Exploits</h3>
                <p class="research-description">
                    Study of drive-by downloads, exploit kits, and watering hole attacks to improve 
                    web security and browser protection mechanisms.
                </p>
                <div class="research-tags">
                    <span class="research-tag">Drive-by Downloads</span>
                    <span class="research-tag">Exploit Kits</span>
                    <span class="research-tag">Malvertising</span>
                </div>
                <div class="research-stat">
                    <span class="stat-value">12%</span>
                    <span class="stat-label">via web-based vectors</span>
                </div>
            </div>
            
            <!-- Physical Media -->
            <div class="research-card">
                <div class="research-icon">
                    <i class="fas fa-usb-drive"></i>
                </div>
                <h3 class="research-title">Physical Media</h3>
                <p class="research-description">
                    Research into USB-based attacks and removable media propagation for developing 
                    endpoint protection and device control policies.
                </p>
                <div class="research-tags">
                    <span class="research-tag">USB Autorun</span>
                    <span class="research-tag">BadUSB</span>
                    <span class="research-tag">CD/DVD</span>
                </div>
                <div class="research-stat">
                    <span class="stat-value">2%</span>
                    <span class="stat-label">via physical media</span>
                </div>
            </div>
            
            <!-- Network Propagation -->
            <div class="research-card">
                <div class="research-icon">
                    <i class="fas fa-network-wired"></i>
                </div>
                <h3 class="research-title">Network Propagation</h3>
                <p class="research-description">
                    Analysis of worm-like behavior, lateral movement techniques, and network-based 
                    spreading mechanisms for network security improvement.
                </p>
                <div class="research-tags">
                    <span class="research-tag">Lateral Movement</span>
                    <span class="research-tag">Worm Behavior</span>
                    <span class="research-tag">SMB Exploits</span>
                </div>
                <div class="research-stat">
                    <span class="stat-value">1%</span>
                    <span class="stat-label">via network propagation</span>
                </div>
            </div>
        </div>
    </section>    <!-- Defense Strategies -->
    <section class="py-16 mb-12">
        <div class="text-center mb-12">
            <h2 class="section-title">Defense Strategies</h2>
            <p class="section-description">
                Multi-layered security approaches based on delivery method analysis
            </p>
        </div>
        
        <div class="research-grid">
            <div class="research-card">
                <div class="research-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h3 class="research-title">Email Security</h3>
                <ul class="research-list">
                    <li>Advanced threat protection</li>
                    <li>Attachment sandboxing</li>
                    <li>User awareness training</li>
                </ul>
            </div>
            
            <div class="research-card">
                <div class="research-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="research-title">Endpoint Protection</h3>
                <ul class="research-list">
                    <li>Behavioral analysis</li>
                    <li>Real-time monitoring</li>
                    <li>Application whitelisting</li>
                </ul>
            </div>
            
            <div class="research-card">
                <div class="research-icon">
                    <i class="fas fa-network-wired"></i>
                </div>
                <h3 class="research-title">Network Security</h3>
                <ul class="research-list">
                    <li>Network segmentation</li>
                    <li>Intrusion detection</li>
                    <li>Traffic monitoring</li>
                </ul>
            </div>
            
            <div class="research-card">
                <div class="research-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="research-title">User Education</h3>
                <ul class="research-list">
                    <li>Security awareness training</li>
                    <li>Phishing simulations</li>
                    <li>Best practices education</li>
                </ul>
            </div>
        </div>
    </section>
                        User awareness training
                    </li>
                </ul>
            </div>
            
            <div class="impact-card p-8 text-center group">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Web Protection</h3>
                <ul class="text-gray-300 space-y-2">
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                        Web application firewalls
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-orange-400 rounded-full mr-2"></span>
                        Content filtering
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2"></span>
                        Browser security policies
                    </li>
                </ul>
            </div>
            
            <div class="impact-card p-8 text-center group">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-laptop text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Endpoint Control</h3>
                <ul class="text-gray-300 space-y-2">
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2"></span>
                        Device control policies
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-orange-400 rounded-full mr-2"></span>
                        USB port management
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-yellow-300 rounded-full mr-2"></span>
                        Application whitelisting
                    </li>
                </ul>
            </div>
            
            <div class="impact-card p-8 text-center group">
                <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-network-wired text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Network Security</h3>
                <ul class="text-gray-300 space-y-2">
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-orange-400 rounded-full mr-2"></span>
                        Network segmentation
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-red-400 rounded-full mr-2"></span>
                        Intrusion detection
                    </li>
                    <li class="flex items-center">
                        <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2"></span>
                        Traffic monitoring
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Research Impact -->
    <section class="py-16 mb-12">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-white mb-6 flex items-center justify-center">
                <span class="text-yellow-400 mr-4">🚀</span>
                <span class="gradient-text">RESEARCH IMPACT</span>
            </h2>
            <p class="text-xl text-gray-300">
                How delivery method analysis improves cybersecurity defenses
            </p>
        </div>
        
        <div class="research-grid">
            <!-- Impact Card 1 -->
            <div class="impact-card p-8 text-center group">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Enhanced Detection</h3>
                <p class="text-gray-300 mb-4">
                    Improved malware detection rates through advanced behavioral analysis and threat intelligence.
                </p>
                <div class="flex items-center justify-center gap-2">
                    <span class="text-xs bg-blue-500 text-white rounded-full px-3 py-1">Before: 70%</span>
                    <span class="text-xs bg-teal-500 text-white rounded-full px-3 py-1">After: 90%</span>
                </div>
            </div>
            
            <!-- Impact Card 2 -->
            <div class="impact-card p-8 text-center group">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-lock-open text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Improved Response</h3>
                <p class="text-gray-300 mb-4">
                    Faster incident response and remediation times reducing potential damage from attacks.
                </p>
                <div class="flex items-center justify-center gap-2">
                    <span class="text-xs bg-purple-500 text-white rounded-full px-3 py-1">Before: 60 mins</span>
                    <span class="text-xs bg-pink-500 text-white rounded-full px-3 py-1">After: 15 mins</span>
                </div>
            </div>
            
            <!-- Impact Card 3 -->
            <div class="impact-card p-8 text-center group">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-user-shield text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Stronger Prevention</h3>
                <p class="text-gray-300 mb-4">
                    Enhanced prevention measures blocking malware delivery and exploitation attempts.
                </p>
                <div class="flex items-center justify-center gap-2">
                    <span class="text-xs bg-red-500 text-white rounded-full px-3 py-1">Before: 75%</span>
                    <span class="text-xs bg-orange-500 text-white rounded-full px-3 py-1">After: 95%</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Delivery Method Screenshots -->
    <section class="py-16 mb-12">
        <div class="text-center mb-12">
            <h2 class="section-title">Delivery Method Analysis</h2>
            <p class="section-description">
                Real-world examples and analysis of malware delivery techniques
            </p>
        </div>
        
        <div class="screenshots-grid">
            <div class="screenshot-card">
                <div class="screenshot-container">
                    <img src="{{ asset('images/delivery/s1.png') }}" alt="Email Delivery Analysis" class="screenshot-image">
                    <div class="screenshot-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="screenshot-content">
                    <h3 class="screenshot-title">Email Delivery Vector</h3>
                    <p class="screenshot-description">
                        Analysis of malicious email campaigns showing phishing techniques, 
                        attachment analysis, and social engineering tactics used in modern attacks.
                    </p>
                    <div class="screenshot-tags">
                        <span class="research-tag">Phishing Analysis</span>
                        <span class="research-tag">Attachment Scanning</span>
                    </div>
                </div>
            </div>

            <div class="screenshot-card">
                <div class="screenshot-container">
                    <img src="{{ asset('images/delivery/s2.png') }}" alt="Web-based Exploit Analysis" class="screenshot-image">
                    <div class="screenshot-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="screenshot-content">
                    <h3 class="screenshot-title">Web-based Exploits</h3>
                    <p class="screenshot-description">
                        Examination of drive-by download mechanisms, exploit kit behavior, 
                        and browser-based attack vectors for security research purposes.
                    </p>
                    <div class="screenshot-tags">
                        <span class="research-tag">Drive-by Downloads</span>
                        <span class="research-tag">Browser Security</span>
                    </div>
                </div>
            </div>

            <div class="screenshot-card">
                <div class="screenshot-container">
                    <img src="{{ asset('images/delivery/s3.png') }}" alt="Network Propagation Analysis" class="screenshot-image">
                    <div class="screenshot-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
                <div class="screenshot-content">
                    <h3 class="screenshot-title">Network Propagation</h3>
                    <p class="screenshot-description">
                        Investigation of network-based spreading mechanisms, lateral movement 
                        techniques, and worm-like behavior patterns in cybersecurity research.
                    </p>
                    <div class="screenshot-tags">
                        <span class="research-tag">Lateral Movement</span>
                        <span class="research-tag">Network Analysis</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Educational Warning -->
    <section class="warning-section">
        <div class="warning-content">
            <div class="warning-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="warning-title">Educational Purpose Only</h3>
            <p class="warning-text">
                This analysis is conducted for educational and defensive cybersecurity purposes only. 
                Understanding attack vectors helps develop better security measures and protections.
            </p>
        </div>
    </section>

    <!-- Disclaimer -->
    <section class="disclaimer-section">
        <h3 class="disclaimer-title">Important Disclaimer</h3>
        <ul class="disclaimer-list">
            <li>This research is conducted for educational purposes and cybersecurity defense</li>
            <li>All analysis focuses on understanding threats to build better protections</li>
            <li>Information is used to improve security awareness and training programs</li>
            <li>No malicious activities are conducted or encouraged</li>
        </ul>
    </section>

    <!-- Back to Course -->
    <section class="text-center py-16">
        <a href="{{ route('nexus.second-semester') }}" class="back-link">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Second Semester        </a>
    </section>
</div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Simple fade-in animation for research cards
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
            }
        });
    }, observerOptions);

    // Observe all research cards
    document.querySelectorAll('.research-card').forEach(card => {
        observer.observe(card);
    });

    console.log('Nexus Delivery Methods: Professional Design Loaded');
});
</script>
@endpush
