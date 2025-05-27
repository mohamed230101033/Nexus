@extends('layouts.nexus')

@section('title', 'RAT Prototype - Nexus Project')

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

    .rat-hero {
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
        background: radial-gradient(circle, var(--neon-purple), transparent);
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
    }
    
    .orb:nth-child(2) {
        width: 150px;
        height: 150px;
        top: 60%;
        right: 15%;
        animation-delay: 2s;
    }
    
    .orb:nth-child(3) {
        width: 80px;
        height: 80px;
        bottom: 30%;
        left: 20%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33% { transform: translateY(-20px) rotate(120deg); }
        66% { transform: translateY(10px) rotate(240deg); }
    }

    .glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }

    .glass-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 50%, rgba(255,255,255,0.05) 100%);
        pointer-events: none;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 900;
        background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue), var(--neon-green));
        background-size: 300% 300%;
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: gradientShift 3s ease-in-out infinite;
        text-align: center;
        margin-bottom: 1.5rem;
        text-shadow: 0 0 30px rgba(179, 0, 255, 0.3);
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .hero-subtitle {
        font-size: 1.5rem;
        color: rgba(255, 255, 255, 0.8);
        text-align: center;
        margin-bottom: 2rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Warning Banner */
    .warning-banner {
        background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
        border: 1px solid #ef4444;
        border-radius: 12px;
        padding: 20px;
        margin: 20px 0;
        text-align: center;
        box-shadow: 0 4px 20px rgba(220, 38, 38, 0.3);
    }

    .warning-banner h3 {
        color: #ffffff;
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .warning-banner p {
        color: #fecaca;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    /* Hero Section */
    .hero {
        padding: 100px 0 80px;
        text-align: center;
        position: relative;
    }

    .hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 50%, #1d4ed8 100%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 20px;
        line-height: 1.1;
    }

    .hero .subtitle {
        font-size: 1.3rem;
        color: #94a3b8;
        max-width: 600px;
        margin: 0 auto 40px;
        font-weight: 400;
    }

    /* Tech Grid from evasion template */
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

    .tech-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0, 212, 255, 0.2);
        border-color: var(--neon-blue);
    }

    /* Research Cards */
    .research-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin: 60px 0;
    }

    .research-card {
        background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.92));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(148, 163, 184, 0.1);
        border-radius: 16px;
        padding: 30px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
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

    .research-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #f1f5f9;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .research-card .icon {
        width: 28px;
        height: 28px;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .research-card p {
        color: #cbd5e1;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .research-card .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 20px;
    }

    .tag {
        background: rgba(59, 130, 246, 0.1);
        color: #93c5fd;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    /* Code Blocks */
    .code-container {
        position: relative;
        background: rgba(15, 15, 25, 0.9);
        border: 1px solid rgba(168, 85, 247, 0.3);
        border-radius: 15px;
        overflow: hidden;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .code-container:hover {
        border-color: rgba(168, 85, 247, 0.6);
        box-shadow: 0 0 30px rgba(168, 85, 247, 0.3);
    }

    .code-header {
        background: linear-gradient(135deg, rgba(168, 85, 247, 0.2), rgba(219, 39, 119, 0.2));
        padding: 12px 20px;
        border-bottom: 1px solid rgba(168, 85, 247, 0.3);
        display: flex;
        align-items: center;
        justify-content: between;
    }

    .code-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #a855f7, #db2777, #a855f7);
        animation: scanLine 2s linear infinite;
    }

    @keyframes scanLine {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Blur Sensitive */
    .blur-sensitive {
        filter: blur(8px);
        transition: all 0.3s ease;
        cursor: pointer;
        user-select: none;
        position: relative;
    }

    .blur-sensitive:hover {
        filter: blur(4px);
        transform: scale(1.02);
    }

    .blur-sensitive.revealed {
        filter: none;
        transform: scale(1);
    }

    .warning-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(168, 85, 247, 0.1);
        border: 2px dashed #a855f7;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #a855f7;
        backdrop-filter: blur(2px);
        animation: warningPulse 2s ease-in-out infinite;
    }

    @keyframes warningPulse {
        0%, 100% { opacity: 0.7; }
        50% { opacity: 1; }
    }

    /* Enhanced Cards */
    .feature-card {
        background: rgba(15, 15, 25, 0.8);
        border: 1px solid rgba(168, 85, 247, 0.3);
        border-radius: 15px;
        padding: 30px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(168, 85, 247, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .feature-card:hover::before {
        left: 100%;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        border-color: rgba(168, 85, 247, 0.6);
        box-shadow: 0 20px 40px rgba(168, 85, 247, 0.2);
    }

    /* Magnetic Buttons */
    .magnetic-btn {
        background: linear-gradient(135deg, #a855f7, #db2777);
        border: none;
        color: white;
        padding: 15px 30px;
        border-radius: 50px;
        font-family: 'Orbitron', monospace;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(168, 85, 247, 0.3);
    }

    .magnetic-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .magnetic-btn:hover::before {
        left: 100%;
    }

    .magnetic-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(168, 85, 247, 0.5);
    }

    /* Floating Orbs */
    .floating-orb {
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(168, 85, 247, 0.3), transparent);
        animation: float 8s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33% { transform: translateY(-30px) rotate(120deg); }
        66% { transform: translateY(15px) rotate(240deg); }
    }

    /* Typing Effect */
    .typing-text {
        overflow: hidden;
        border-right: 2px solid #a855f7;
        white-space: nowrap;
        animation: typing 3s steps(40, end), blink-caret 0.75s step-end infinite;
    }

    @keyframes typing {
        from { width: 0; }
        to { width: 100%; }
    }

    @keyframes blink-caret {
        from, to { border-color: transparent; }
        50% { border-color: #a855f7; }
    }

    /* Educational & Danger Notes */
    .educational-note {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(168, 85, 247, 0.2));
        border: 1px solid rgba(59, 130, 246, 0.4);
        border-left: 4px solid #3b82f6;
        border-radius: 10px;
        backdrop-filter: blur(10px);
    }

    .danger-note {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(168, 85, 247, 0.2));
        border: 1px solid rgba(239, 68, 68, 0.4);
        border-left: 4px solid #ef4444;
        border-radius: 10px;
        backdrop-filter: blur(10px);
    }

    /* Smooth Scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Loading Animation */
    .loading-animation {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 2px solid rgba(168, 85, 247, 0.3);
        border-top: 2px solid #a855f7;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .feature-card {
            padding: 20px;
        }
        
        .cyber-grid {
            background-size: 30px 30px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
@endpush

@section('content')
<!-- Hero Section with Particles -->
<div class="evasion-hero">
    <div class="particles-container" id="particles-js"></div>
    <div class="floating-orbs">
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="orb"></div>
    </div>
    <div class="container hero-content">
        <!-- Warning Banner -->
        <div class="warning-banner">
            <h3><i class="fas fa-exclamation-triangle"></i> Educational Research Only</h3>
            <p>This content demonstrates RAT development concepts for cybersecurity education and defensive research purposes only. All implementations are theoretical and designed for academic understanding.</p>
        </div>
        
        <h1 class="hero-title" data-aos="fade-up">RAT Prototype Research</h1>
        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Remote Access Tool Development & Analysis for Cybersecurity Education</p>
    </div>
</div>

<div class="container">    <!-- Research Grid -->
    <div class="tech-grid" data-aos="fade-up" data-aos-delay="400">        <!-- UAC Bypass Research -->
        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="500">
            <h3><div class="icon">🛡️</div>UAC Bypass Research</h3>
            <p>Educational analysis of Windows User Account Control bypass techniques through social engineering and registry manipulation for defensive cybersecurity research.</p>
            <div class="tags">
                <span class="tag">Windows Security</span>
                <span class="tag">Privilege Escalation</span>
                <span class="tag">Social Engineering</span>
                <span class="tag">Registry Analysis</span>
            </div>
            <ul style="color: #cbd5e1; margin: 20px 0; padding-left: 20px;">
                <li>FodHelper.exe exploitation methods</li>
                <li>Event Viewer registry manipulation</li>
                <li>Administrative privilege acquisition</li>
                <li>Detection and prevention strategies</li>
            </ul>
        </div>        <!-- Credential Extraction Analysis -->
        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="600">
            <h3><div class="icon">🔐</div>Credential Extraction Analysis</h3>
            <p>Research into browser credential storage mechanisms and extraction methodologies for understanding data protection vulnerabilities in web browsers.</p>
            <div class="tags">
                <span class="tag">Browser Security</span>
                <span class="tag">Data Protection</span>
                <span class="tag">Encryption Analysis</span>
                <span class="tag">SQLite Operations</span>
            </div>
            <ul style="color: #cbd5e1; margin: 20px 0; padding-left: 20px;">
                <li>Win32Crypt API utilization</li>
                <li>Chrome/Edge credential databases</li>
                <li>Cookie and session extraction</li>
                <li>Secure data transmission protocols</li>
            </ul>
        </div>        <!-- WebSocket Exploit Research -->
        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="700">
            <h3><div class="icon">🌐</div>WebSocket Exploit Research</h3>
            <p>Analysis of Chromium DevTools WebSocket protocol vulnerabilities and exploitation techniques for understanding browser security architecture.</p>
            <div class="tags">
                <span class="tag">WebSocket Protocol</span>
                <span class="tag">Browser DevTools</span>
                <span class="tag">Network Security</span>
                <span class="tag">Protocol Analysis</span>
            </div>
            <ul style="color: #cbd5e1; margin: 20px 0; padding-left: 20px;">
                <li>DevTools protocol exploitation</li>
                <li>Headless browser injection</li>
                <li>Remote debugging interfaces</li>
                <li>Communication channel establishment</li>
            </ul>
        </div>        <!-- Browser Data Research -->
        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="800">
            <h3><div class="icon">📊</div>Browser Data Research</h3>
            <p>Comprehensive study of browser data storage, session management, and security mechanisms to understand modern web application vulnerabilities.</p>
            <div class="tags">
                <span class="tag">Data Analysis</span>
                <span class="tag">Session Management</span>
                <span class="tag">Security Research</span>
                <span class="tag">Forensic Analysis</span>
            </div>
            <ul style="color: #cbd5e1; margin: 20px 0; padding-left: 20px;">
                <li>Browser process termination and restart</li>
                <li>Silent background operation modes</li>
                <li>Data exfiltration methodologies</li>
                <li>Stealth execution techniques</li>
            </ul>
        </div>
    </div>

    <!-- Educational Disclaimer -->
    <div style="background: linear-gradient(135dc, rgba(220, 38, 38, 0.1), rgba(239, 68, 68, 0.05)); border: 1px solid rgba(220, 38, 38, 0.3); border-radius: 12px; padding: 30px; margin: 40px 0; text-align: center;">
        <h3 style="color: #ef4444; font-size: 1.3rem; font-weight: 600; margin-bottom: 15px;">
            <i class="fas fa-graduation-cap" style="margin-right: 10px;"></i>
            Educational Research Disclaimer
        </h3>
        <p style="color: #cbd5e1; line-height: 1.6; margin-bottom: 20px;">
            This RAT prototype research is conducted exclusively for educational cybersecurity purposes and defensive security analysis. All techniques are studied to improve system security and develop better protection mechanisms.
        </p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 20px;">
            <div style="display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-shield-alt" style="color: #10b981; margin-right: 8px;"></i>
                <span style="color: #e2e8f0;">Controlled Research Environment</span>
            </div>
            <div style="display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-book" style="color: #10b981; margin-right: 8px;"></i>
                <span style="color: #e2e8f0;">Academic Learning Purposes</span>
            </div>
            <div style="display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-lock" style="color: #10b981; margin-right: 8px;"></i>
                <span style="color: #e2e8f0;">Defensive Security Focus</span>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('RAT Prototype Research Interface Loaded');
        
        // Initialize AOS animations
        AOS.init({
            duration: 1000,
            offset: 100,
            easing: 'ease-in-out',
            once: true
        });
        
        // Initialize particles.js
        if (window.particlesJS) {
            particlesJS('particles-js', {
                particles: {
                    number: { value: 80, density: { enable: true, value_area: 800 } },
                    color: { value: '#00d4ff' },
                    shape: { type: 'circle' },
                    opacity: { value: 0.5, random: false },
                    size: { value: 3, random: true },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: '#00d4ff',
                        opacity: 0.4,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 2,
                        direction: 'none',
                        random: false,
                        straight: false,
                        out_mode: 'out',
                        attract: { enable: false }
                    }
                },
                interactivity: {
                    detect_on: 'canvas',
                    events: {
                        onhover: { enable: true, mode: 'repulse' },
                        onclick: { enable: true, mode: 'push' },
                        resize: true
                    },
                    modes: {
                        grab: { distance: 400, line_linked: { opacity: 1 } },
                        bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 },
                        repulse: { distance: 200 },
                        push: { particles_nb: 4 },
                        remove: { particles_nb: 2 }
                    }
                },
                retina_detect: true
            });
        }
        
        // Add hover effects to tech cards
        const cards = document.querySelectorAll('.tech-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-15px)';
                this.style.borderColor = 'rgba(0, 212, 255, 0.4)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-10px)';
                this.style.borderColor = 'rgba(255, 255, 255, 0.1)';
            });
        });

        // GSAP animations for floating orbs
        if (window.gsap) {
            gsap.to('.orb:nth-child(1)', {
                y: -30,
                duration: 2,
                ease: 'power2.inOut',
                yoyo: true,
                repeat: -1
            });
            
            gsap.to('.orb:nth-child(2)', {
                y: -20,
                duration: 2.5,
                ease: 'power2.inOut',
                yoyo: true,
                repeat: -1,
                delay: 0.5
            });
            
            gsap.to('.orb:nth-child(3)', {
                y: -25,
                duration: 3,
                ease: 'power2.inOut',
                yoyo: true,
                repeat: -1,
                delay: 1
            });
        }
    });
</script>@endsection
