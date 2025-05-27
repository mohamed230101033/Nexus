@extends('layouts.nexus')

@section('title', 'Core Ransomware Research - Nexus Project')

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
        --neon-red: #ff073a;
        --neon-orange: #ff9500;
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

    .ransomware-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e1a2e 30%, #2d1b2e 60%, #0f172a 100%);
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
        background: radial-gradient(circle, var(--neon-red), transparent);
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
        background: radial-gradient(circle, var(--neon-orange), transparent);
    }
    
    .orb:nth-child(3) {
        width: 80px;
        height: 80px;
        bottom: 30%;
        left: 20%;
        animation-delay: 4s;
        background: radial-gradient(circle, var(--neon-purple), transparent);
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-20px) scale(1.05); }
    }

    .hero-title {
        font-size: clamp(3rem, 8vw, 6rem);
        font-weight: 900;
        background: linear-gradient(45deg, var(--neon-red), var(--neon-orange), var(--neon-purple));
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradient-shift 3s ease-in-out infinite;
        text-align: center;
        margin-bottom: 1rem;
        text-shadow: 0 0 30px rgba(255, 7, 58, 0.5);
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
        box-shadow: 0 20px 60px rgba(255, 7, 58, 0.2);
        border-color: var(--neon-red);
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 3rem;
        background: linear-gradient(45deg, var(--neon-red), var(--neon-orange));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
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

    .tech-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(255, 7, 58, 0.2);
        border-color: var(--neon-red);
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

    /* Card Styles */
    .card-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .card-icon {
        font-size: 2.5rem;
        margin-right: 1rem;
        background: linear-gradient(135deg, var(--neon-red), var(--neon-orange));
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #ffffff;
    }

    .card-description {
        font-size: 1rem;
        color: #cbd5e1;
        margin-bottom: 1.5rem;
        line-height: 1.7;
    }

    .feature-list {
        list-style: none;
        padding: 0;
    }

    .feature-list li {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        color: #e2e8f0;
    }

    .feature-list li:before {
        content: '•';
        color: var(--neon-red);
        font-weight: bold;
        margin-right: 0.75rem;
        font-size: 1.2rem;
    }

    .code-block {
        background: #0f172a;
        border: 1px solid rgba(255, 7, 58, 0.3);
        border-radius: 10px;
        padding: 1.5rem;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.9rem;
        overflow-x: auto;
        margin: 1.5rem 0;
        position: relative;
    }

    .code-block::before {
        content: 'Educational Example';
        position: absolute;
        top: -12px;
        left: 20px;
        background: var(--neon-red);
        color: white;
        padding: 4px 12px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 600;
        font-family: 'Inter', sans-serif;
    }

    .content-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
        margin-bottom: 4rem;
    }

    .research-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .research-card {
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .research-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(255, 7, 58, 0.2);
        border-color: var(--neon-red);
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        padding: 1rem 2rem;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        color: white;
        text-decoration: none;
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-top: 3rem;
    }

    .back-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .tech-card {
            padding: 1.5rem;
        }
        
        .research-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section with Particles -->
<div class="ransomware-hero">
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
            <p>This content is provided solely for educational and defensive cybersecurity purposes. All examples are sanitized and designed for learning about ransomware defense mechanisms.</p>
        </div>
        
        <h1 class="hero-title" data-aos="fade-up">Core Ransomware Research</h1>
        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Advanced Encryption Analysis & Defense Strategies</p>
    </div>
</div>

<div class="container">
    <!-- AES-256 Encryption Research -->
    <div class="tech-grid" data-aos="fade-up" data-aos-delay="400">
        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="500">
            <div class="card-header">
                <div class="card-icon">🔐</div>
                <h3 class="card-title">Cryptographic Implementation</h3>
            </div>
            <p class="card-description">
                Analysis of Advanced Encryption Standard (AES-256) implementation in modern ransomware variants. 
                Understanding the encryption mechanics helps develop better detection and prevention strategies.
            </p>
            <ul class="feature-list">
                <li>256-bit symmetric encryption algorithm</li>
                <li>PBKDF2 key derivation function</li>
                <li>CBC mode for block cipher operation</li>
                <li>Secure random key generation</li>
            </ul>
            
            <div class="code-block">
                <div style="color: #10b981; margin-bottom: 0.5rem;"># Educational AES-256 Analysis</div>
                <div style="color: #6b7280;">from cryptography.fernet import Fernet</div>
                <div style="color: #6b7280;">import os, secrets, hashlib</div>
                <div style="color: #ffffff; margin-top: 1rem;">class EncryptionAnalysis:</div>
                <div style="color: #ffffff; margin-left: 1rem;">def generate_key(self):</div>
                <div style="color: #6b7280; margin-left: 2rem;"># Educational key generation</div>
                <div style="color: #6b7280; margin-left: 2rem;">return Fernet.generate_key()</div>
            </div>
        </div>

        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="600">
            <div class="card-header">
                <div class="card-icon">🎯</div>
                <h3 class="card-title">File Targeting & Processing</h3>
            </div>
            <p class="card-description">
                Research into how ransomware identifies and prioritizes target files for maximum impact while 
                avoiding system-critical files to maintain system stability.
            </p>
            <ul class="feature-list">
                <li>Priority file extension targeting (.pdf, .docx, .xlsx)</li>
                <li>Recursive directory traversal algorithms</li>
                <li>System file avoidance mechanisms</li>
                <li>File size optimization for speed</li>
            </ul>
            
            <div class="code-block">
                <div style="color: #10b981; margin-bottom: 0.5rem;"># File Discovery Analysis</div>
                <div style="color: #6b7280;">import glob, pathlib</div>
                <div style="color: #ffffff; margin-top: 1rem;">def analyze_targets():</div>
                <div style="color: #6b7280; margin-left: 1rem;">target_extensions = [</div>
                <div style="color: #f59e0b; margin-left: 2rem;">'*.pdf', '*.docx', '*.xlsx'</div>
                <div style="color: #6b7280; margin-left: 1rem;">]</div>
                <div style="color: #6b7280; margin-left: 1rem;"># Educational analysis only</div>
            </div>
        </div>

        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="700">
            <div class="card-header">
                <div class="card-icon">⚙️</div>
                <h3 class="card-title">Persistence Mechanisms</h3>
            </div>
            <p class="card-description">
                Understanding how ransomware maintains persistence on infected systems through various 
                registry modifications and startup procedures for defensive analysis.
            </p>
            <ul class="feature-list">
                <li>Registry Run key modifications</li>
                <li>Scheduled task creation</li>
                <li>Startup folder placement</li>
                <li>Service installation methods</li>
            </ul>
        </div>

        <div class="tech-card glass-card" data-aos="fade-up" data-aos-delay="800">
            <div class="card-header">
                <div class="card-icon">🕵️</div>
                <h3 class="card-title">Anti-Analysis Techniques</h3>
            </div>
            <p class="card-description">
                Research into evasion methods used to avoid detection by security software and 
                analysis environments, crucial for developing better detection mechanisms.
            </p>
            <ul class="feature-list">
                <li>Virtual machine detection</li>
                <li>Debugger presence checks</li>
                <li>Code obfuscation methods</li>
                <li>Sandbox evasion techniques</li>
            </ul>
        </div>
    </div>

    <!-- C2 Communication -->
    <div class="content-section" data-aos="fade-up">
        <h2 class="section-title">📡 Command & Control Analysis</h2>
        
        <div class="research-card">
            <div class="card-header">
                <div class="card-icon">📡</div>
                <h3 class="card-title">C2 Communication Protocols</h3>
            </div>
            <p class="card-description">
                Analysis of command and control infrastructure used by ransomware for victim registration, 
                key exchange, and payment verification in educational context.
            </p>
            
            <div class="research-grid" style="margin-top: 2rem;">
                <div>
                    <h4 style="color: #ffffff; font-weight: 600; margin-bottom: 1rem;">Communication Features</h4>
                    <ul class="feature-list">
                        <li>Encrypted HTTPS communication</li>
                        <li>Victim ID generation and registration</li>
                        <li>Secure key exchange protocols</li>
                        <li>Payment verification systems</li>
                    </ul>
                </div>
                
                <div class="code-block">
                    <div style="color: #10b981; margin-bottom: 0.5rem;"># C2 Communication Analysis</div>
                    <div style="color: #6b7280;">import requests, json</div>
                    <div style="color: #ffffff; margin-top: 1rem;">def analyze_c2_protocol():</div>
                    <div style="color: #6b7280; margin-left: 1rem;"># Educational C2 analysis</div>
                    <div style="color: #f59e0b; margin-left: 1rem;">endpoint = "educational-analysis.local"</div>
                    <div style="color: #6b7280; margin-left: 1rem;">print("Analyzing C2 patterns...")</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Defense Strategies -->
    <div class="content-section" data-aos="fade-up">
        <h2 class="section-title">🛡️ Defense & Mitigation</h2>
        
        <div class="research-grid">
            <div class="research-card">
                <div class="card-header">
                    <div class="card-icon">🔍</div>
                    <h3 class="card-title">Detection Methods</h3>
                </div>
                <p class="card-description">
                    Research-based approaches for detecting ransomware activity through behavioral 
                    analysis and pattern recognition before significant damage occurs.
                </p>
                <ul class="feature-list">
                    <li>File system monitoring for rapid encryption</li>
                    <li>API call pattern analysis</li>
                    <li>Network traffic anomaly detection</li>
                    <li>Registry modification monitoring</li>
                </ul>
            </div>

            <div class="research-card">
                <div class="card-header">
                    <div class="card-icon">💾</div>
                    <h3 class="card-title">Recovery Strategies</h3>
                </div>
                <p class="card-description">
                    Best practices for ransomware recovery based on research findings, focusing on 
                    backup strategies and incident response procedures.
                </p>
                <ul class="feature-list">
                    <li>Automated isolated backup systems</li>
                    <li>Point-in-time recovery mechanisms</li>
                    <li>Incident response procedures</li>
                    <li>Forensic analysis workflows</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Educational Disclaimer -->
    <div style="background: linear-gradient(135deg, rgba(220, 38, 38, 0.1), rgba(239, 68, 68, 0.05)); border: 1px solid rgba(220, 38, 38, 0.3); border-radius: 12px; padding: 30px; margin: 40px 0; text-align: center;">
        <h3 style="color: #ef4444; font-size: 1.3rem; font-weight: 600; margin-bottom: 15px;">
            <i class="fas fa-graduation-cap" style="margin-right: 10px;"></i>
            Educational Research Disclaimer
        </h3>
        <p style="color: #cbd5e1; line-height: 1.6; margin-bottom: 20px;">
            This ransomware research is conducted exclusively for educational cybersecurity purposes and defensive security analysis. All techniques are studied to improve system security and develop better protection mechanisms.
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

    <!-- Back Navigation -->
    <div class="content-section" style="text-align: center;">
        <a href="{{ route('nexus.second-semester') }}" class="back-button" data-aos="fade-up">
            <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i>
            Back to Research Domains
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Core Ransomware Research Interface Loaded');
        
        // Initialize AOS animations
        AOS.init({
            duration: 1000,
            offset: 100,
            easing: 'ease-in-out',
            once: true
        });
        
        // Initialize particles.js with red theme
        if (window.particlesJS) {
            particlesJS('particles-js', {
                particles: {
                    number: { value: 80, density: { enable: true, value_area: 800 } },
                    color: { value: '#ff073a' },
                    shape: { type: 'circle' },
                    opacity: { value: 0.5, random: false },
                    size: { value: 3, random: true },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: '#ff073a',
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
                this.style.borderColor = 'rgba(255, 7, 58, 0.4)';
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
</script>
@endsection
