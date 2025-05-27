@extends('layouts.nexus')

@section('title', 'Core Ransomware Research - Nexus Project')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        background: linear-gradient(135deg, #0f172a, #1e293b, #334155);
        color: white;
        line-height: 1.6;
    }

    .research-container {
        min-height: 100vh;
        padding: 2rem 0;
    }

    .hero-section {
        text-align: center;
        padding: 6rem 1rem 4rem;
        background: linear-gradient(135deg, 
            rgba(15, 23, 42, 0.95), 
            rgba(30, 41, 59, 0.92),
            rgba(51, 65, 85, 0.88));
        margin-bottom: 4rem;
    }

    .hero-title {
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 700;
        background: linear-gradient(135deg, #ef4444, #f97316, #eab308);
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
        animation: titleShift 3s ease-in-out infinite;
    }

    .hero-subtitle {
        font-size: 1.5rem;
        color: #cbd5e1;
        margin-bottom: 2rem;
        font-weight: 400;
    }

    .warning-banner {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1));
        border: 2px solid rgba(239, 68, 68, 0.3);
        border-radius: 15px;
        padding: 1.5rem;
        margin: 2rem auto;
        max-width: 800px;
        text-align: center;
    }

    .content-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
        margin-bottom: 4rem;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 2rem;
        text-align: center;
    }

    .research-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .research-card {
        background: linear-gradient(145deg, 
            rgba(15, 23, 42, 0.95), 
            rgba(30, 41, 59, 0.92));
        border: 2px solid rgba(14, 165, 233, 0.3);
        border-radius: 20px;
        padding: 2rem;
        transition: all 0.3s ease;
    }

    .research-card:hover {
        transform: translateY(-5px);
        border-color: rgba(14, 165, 233, 0.6);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .card-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .card-icon {
        font-size: 2.5rem;
        margin-right: 1rem;
        background: linear-gradient(135deg, #ef4444, #f97316);
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
        color: #ef4444;
        font-weight: bold;
        margin-right: 0.75rem;
        font-size: 1.2rem;
    }

    .code-block {
        background: #0f172a;
        border: 1px solid rgba(14, 165, 233, 0.3);
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
        background: #ef4444;
        color: white;
        padding: 4px 12px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 600;
        font-family: 'Inter', sans-serif;
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

    @keyframes titleShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    @media (max-width: 768px) {
        .research-grid {
            grid-template-columns: 1fr;
        }
        
        .hero-section {
            padding: 4rem 1rem 3rem;
        }
        
        .content-section {
            padding: 0 1rem;
        }
    }
</style>
@endpush

@section('content')
<div class="research-container">
    <!-- Hero Section -->
    <div class="hero-section" data-aos="fade-up">
        <h1 class="hero-title">🔐 Core Ransomware Research</h1>
        <p class="hero-subtitle">Advanced Encryption Analysis & Defense Strategies</p>
        
        <div class="warning-banner" data-aos="fade-up" data-aos-delay="200">
            <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                <i class="fas fa-exclamation-triangle" style="color: #eab308; font-size: 1.5rem; margin-right: 0.75rem;"></i>
                <span style="font-weight: 600; color: #ffffff;">Educational Research Only</span>
            </div>
            <p style="color: #cbd5e1;">
                This content is provided solely for educational and defensive cybersecurity purposes. 
                All examples are sanitized and designed for learning about ransomware defense mechanisms.
            </p>
        </div>
    </div>

    <!-- AES-256 Encryption Research -->
    <div class="content-section" data-aos="fade-up">
        <h2 class="section-title">🔒 AES-256 Encryption Analysis</h2>
        
        <div class="research-grid">
            <div class="research-card">
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

            <div class="research-card">
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
        </div>
    </div>

    <!-- Payload Analysis -->
    <div class="content-section" data-aos="fade-up">
        <h2 class="section-title">🔬 Payload Analysis</h2>
        
        <div class="research-grid">
            <div class="research-card">
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

            <div class="research-card">
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

    <!-- Back Navigation -->
    <div class="content-section" style="text-align: center;">
        <a href="{{ route('nexus.second-semester') }}" class="back-button" data-aos="fade-up">
            <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i>
            Back to Research Domains
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    offset: 100
});

// GSAP Animations
gsap.registerPlugin(ScrollTrigger);

// Animate research cards on scroll
gsap.utils.toArray('.research-card').forEach((card, i) => {
    gsap.fromTo(card, 
        { opacity: 0, y: 50 },
        {
            opacity: 1,
            y: 0,
            duration: 0.8,
            delay: i * 0.1,
            scrollTrigger: {
                trigger: card,
                start: "top 80%",
                toggleActions: "play none none reverse"
            }
        }
    );
});

// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>
@endpush
