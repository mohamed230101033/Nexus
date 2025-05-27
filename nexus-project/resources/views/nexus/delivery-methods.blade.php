@extends('layouts.nexus')

@section('title', 'Delivery Methods Research - Nexus Project')

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
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --dark-gradient: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
        --neon-blue: #00d4ff;
        --neon-purple: #b300ff;
        --neon-green: #39ff14;
        --neon-cyan: #00ffff;
        --neon-pink: #ff1493;
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
    }    body {
        background: var(--dark-gradient);
        color: #ffffff;
        overflow-x: hidden;
        scroll-behavior: smooth;
    }

    /* Hero Section */
    .delivery-hero {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
    }

    .particles-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .floating-orbs {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 2;
        pointer-events: none;
    }

    .orb {
        position: absolute;
        border-radius: 50%;
        opacity: 0.6;
        animation: float 6s ease-in-out infinite;
    }

    .orb:nth-child(1) {
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, var(--neon-cyan), transparent);
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .orb:nth-child(2) {
        width: 80px;
        height: 80px;
        background: radial-gradient(circle, var(--neon-pink), transparent);
        top: 60%;
        right: 20%;
        animation-delay: 2s;
    }

    .orb:nth-child(3) {
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, var(--neon-blue), transparent);
        bottom: 30%;
        left: 70%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        25% { transform: translateY(-20px) rotate(90deg); }
        50% { transform: translateY(-40px) rotate(180deg); }
        75% { transform: translateY(-20px) rotate(270deg); }
    }

    .hero-content {
        position: relative;
        z-index: 3;
        text-align: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 900;
        margin-bottom: 1rem;
        background: linear-gradient(45deg, var(--neon-cyan), var(--neon-pink), var(--neon-blue));
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 3s ease-in-out infinite;
        text-shadow: 0 0 30px rgba(0, 255, 255, 0.5);
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: #94a3b8;
        max-width: 600px;
        margin: 0 auto 2rem;
        line-height: 1.6;
    }    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Glass Morphism Cards */
    .glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        margin: 1rem;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .glass-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0, 255, 255, 0.2);
        border-color: var(--neon-cyan);
    }

    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .tech-card {
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .tech-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 255, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .tech-card:hover::before {
        left: 100%;
    }

    .tech-card:hover {
        transform: translateY(-5px);
        border-color: var(--neon-cyan);
        box-shadow: 0 10px 30px rgba(0, 255, 255, 0.3);
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
    }    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 3rem;
        background: linear-gradient(45deg, var(--neon-cyan), var(--neon-pink));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .nav-pills {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .nav-pill {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 25px;
        padding: 10px 20px;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .nav-pill:hover,
    .nav-pill.active {
        background: var(--neon-cyan);
        color: black;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 255, 255, 0.4);
    }

    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 1s ease forwards;
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
    }    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .tech-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .glass-card {
            margin: 0.5rem;
            padding: 1.5rem;
        }
        
        .hero-content {
            padding: 0 1rem;
        }
        
        .floating-orbs .orb {
            display: none;
        }
        
        .nav-pills {
            flex-direction: column;
            align-items: center;
        }
    }

    /* Smooth scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--neon-cyan);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--neon-pink);
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
    }    .screenshot-overlay i {
        font-size: 2rem;
        color: #60a5fa;
    }

    /* Modal Styles for Screenshot Viewer */
    .screenshot-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .screenshot-modal.active {
        display: flex;
    }

    .modal-content {
        position: relative;
        max-width: 90vw;
        max-height: 90vh;
        background: #0f172a;
        border-radius: 16px;
        border: 2px solid rgba(59, 130, 246, 0.3);
        overflow: hidden;
    }

    .modal-image {
        width: 100%;
        height: auto;
        max-height: 85vh;
        object-fit: contain;
    }

    .modal-close {
        position: absolute;
        top: 15px;
        right: 20px;
        background: rgba(239, 68, 68, 0.8);
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-close:hover {
        background: rgba(239, 68, 68, 1);
        transform: scale(1.1);
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
<!-- Hero Section -->
<section class="delivery-hero">
    <div class="particles-container" id="particles-js"></div>
    <div class="floating-orbs">
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="orb"></div>
    </div>
    <div class="hero-content container mx-auto px-4">
        <h1 class="hero-title fade-in">DELIVERY METHODS</h1>
        <p class="hero-subtitle fade-in">Advanced analysis of malware delivery vectors and attack mechanisms</p>
        <div class="nav-pills fade-in">
            <a href="#email-vectors" class="nav-pill active">Email Vectors</a>
            <a href="#web-exploits" class="nav-pill">Web Exploits</a>
            <a href="#network-propagation" class="nav-pill">Network Propagation</a>
            <a href="#physical-media" class="nav-pill">Physical Media</a>
        </div>
    </div>
</section>

<div class="container">
    <!-- Primary Delivery Vectors -->
    <section class="py-16 mb-12" id="email-vectors">
        <div class="text-center mb-12">
            <h2 class="section-title">Primary Attack Vectors</h2>
            <p class="section-description">
                Understanding the most common malware delivery methods and their characteristics
            </p>
        </div>
        
        <div class="tech-grid">
            <!-- Email-Based Attacks -->
            <div class="tech-card">
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
            <div class="tech-card" id="web-exploits">
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
            <div class="tech-card" id="physical-media">
                <div class="research-icon">
                    <i class="fas fa-usb"></i>
                </div>
                <h3 class="research-title">Physical Media</h3>
                <p class="research-description">
                    Research into USB-based attacks and removable media propagation for developing 
                    endpoint protection and device control policies.
                </p>                <div class="research-tags">
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
            <div class="tech-card" id="network-propagation">
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
        
        <div class="tech-grid">
            <div class="tech-card">
                <div class="research-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h3 class="research-title">Email Security</h3>
                <ul class="research-list">
                    <li>Advanced threat protection</li>
                    <li>Attachment sandboxing</li>                    <li>User awareness training</li>
                </ul>
            </div>
            
            <div class="tech-card">
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
            
            <div class="tech-card">
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
            
            <div class="tech-card">
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
        </div>    </section>

    <!-- Delivery Method Screenshots -->
    <section class="py-16 mb-12">
        <div class="text-center mb-12">
            <h2 class="section-title">Delivery Method Analysis</h2>
            <p class="section-description">
                Real-world examples and analysis of malware delivery techniques
            </p>
        </div>          <div class="screenshots-grid">
            <div class="screenshot-card" data-image="{{ asset('images/delivery/s1.png') }}" data-title="Email Delivery Vector Analysis">
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

            <div class="screenshot-card" data-image="{{ asset('images/delivery/s2.png') }}" data-title="Web-based Exploit Analysis">
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

            <div class="screenshot-card" data-image="{{ asset('images/delivery/s3.png') }}" data-title="Network Propagation Analysis">
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

    <!-- Screenshot Modal -->
    <div id="screenshot-modal" class="screenshot-modal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeScreenshotModal()">
                <i class="fas fa-times"></i>
            </button>
            <img id="modal-image" class="modal-image" src="" alt="">
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
    </section>    <!-- Back to Course -->
    <section class="text-center py-16">
        <a href="{{ route('nexus.second-semester') }}" class="back-link">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Second Semester
        </a>
    </section>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize particles.js with cyan/pink theme
    if (window.particlesJS) {
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: ['#00ffff', '#ff1493', '#00d4ff']
                },
                shape: {
                    type: 'circle',
                    stroke: {
                        width: 0,
                        color: '#000000'
                    }
                },
                opacity: {
                    value: 0.5,
                    random: false,
                    anim: {
                        enable: false,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 3,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 40,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#00ffff',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 6,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'repulse'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 400,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    bubble: {
                        distance: 400,
                        size: 40,
                        duration: 2,
                        opacity: 8,
                        speed: 3
                    },
                    repulse: {
                        distance: 200,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    },
                    remove: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: true
        });
    }

    // GSAP Animations
    if (window.gsap) {
        // Fade in hero elements
        gsap.from('.hero-title', {
            duration: 1.5,
            y: 50,
            opacity: 0,
            ease: 'power2.out'
        });

        gsap.from('.hero-subtitle', {
            duration: 1.5,
            y: 30,
            opacity: 0,
            delay: 0.3,
            ease: 'power2.out'
        });

        gsap.from('.nav-pills', {
            duration: 1.5,
            y: 30,
            opacity: 0,
            delay: 0.6,
            ease: 'power2.out'
        });

        // Animate tech cards on scroll
        gsap.registerPlugin(ScrollTrigger);
        
        gsap.utils.toArray('.tech-card').forEach((card, index) => {
            gsap.from(card, {
                scrollTrigger: {
                    trigger: card,
                    start: 'top 80%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                },
                duration: 0.8,
                y: 50,
                opacity: 0,
                delay: index * 0.1,
                ease: 'power2.out'
            });
        });

        // Hover effects for tech cards
        document.querySelectorAll('.tech-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                gsap.to(card, {
                    duration: 0.3,
                    scale: 1.05,
                    rotationY: 5,
                    ease: 'power2.out'
                });
            });

            card.addEventListener('mouseleave', () => {
                gsap.to(card, {
                    duration: 0.3,
                    scale: 1,
                    rotationY: 0,
                    ease: 'power2.out'
                });
            });
        });
    }

    // Screenshot Modal Functions with GSAP
    window.openScreenshotModal = function(imageSrc, title) {
        const modal = document.getElementById('screenshot-modal');
        const modalImage = document.getElementById('modal-image');
        
        modalImage.src = imageSrc;
        modalImage.alt = title;
        modal.style.display = 'flex';
        
        // GSAP animation for modal opening
        if (window.gsap) {
            gsap.fromTo(modal, 
                { opacity: 0 },
                { duration: 0.3, opacity: 1, ease: 'power2.out' }
            );
            gsap.fromTo(modalImage, 
                { scale: 0.8, opacity: 0 },
                { duration: 0.4, scale: 1, opacity: 1, delay: 0.1, ease: 'back.out(1.7)' }
            );
        } else {
            modal.classList.add('active');
        }
        
        // Prevent body scroll when modal is open
        document.body.style.overflow = 'hidden';
    };

    window.closeScreenshotModal = function() {
        const modal = document.getElementById('screenshot-modal');
        
        // GSAP animation for modal closing
        if (window.gsap) {
            gsap.to(modal, {
                duration: 0.3,
                opacity: 0,
                ease: 'power2.out',
                onComplete: () => {
                    modal.style.display = 'none';
                }
            });
        } else {
            modal.classList.remove('active');
        }
        
        // Restore body scroll
        document.body.style.overflow = 'auto';
    };

    // Close modal when clicking outside the image
    document.getElementById('screenshot-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeScreenshotModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeScreenshotModal();
        }
    });    // Add cursor pointer to screenshot cards and handle click events
    document.querySelectorAll('.screenshot-card').forEach(card => {
        card.style.cursor = 'pointer';
        card.addEventListener('click', function() {
            const imageSrc = this.getAttribute('data-image');
            const title = this.getAttribute('data-title');
            openScreenshotModal(imageSrc, title);
        });
    });

    // Navigation pills smooth scrolling
    document.querySelectorAll('.nav-pill').forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            
            // Update active pill
            document.querySelectorAll('.nav-pill').forEach(p => p.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Floating orbs animation enhancement
    if (window.gsap) {
        gsap.utils.toArray('.orb').forEach((orb, index) => {
            gsap.to(orb, {
                duration: 4 + index,
                rotation: 360,
                transformOrigin: 'center center',
                repeat: -1,
                ease: 'none'
            });
            
            gsap.to(orb, {
                duration: 6 + index * 2,
                y: 'random(-50, 50)',
                x: 'random(-30, 30)',
                repeat: -1,
                yoyo: true,
                ease: 'sine.inOut'
            });
        });
    }

    console.log('Nexus Delivery Methods: Modern Design Framework Loaded');
});
</script>
@endpush
