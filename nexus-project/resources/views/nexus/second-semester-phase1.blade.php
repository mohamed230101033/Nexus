@extends('layouts.nexus')

@section('title', 'Second Semester Phase 1 - Foundation Research | Nexus')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        color: #ffffff;
        font-family: 'Inter', sans-serif;
        line-height: 1.6;
    }

    .main-container {
        position: relative;
        z-index: 10;
        min-height: 100vh;
    }

    .hero-section {
        background: linear-gradient(135deg, rgba(147, 51, 234, 0.1), rgba(168, 85, 247, 0.05));
        border-radius: 24px;
        padding: 4rem 2rem;
        margin-bottom: 4rem;
        text-align: center;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(147, 51, 234, 0.2);
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #a855f7, #9333ea, #c084fc);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: #94a3b8;
        max-width: 600px;
        margin: 0 auto 2rem;
        font-weight: 400;
    }

    /* Phase Navigation Styles */
    .phase-navigation {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.92));
        border-radius: 20px;
        padding: 2rem;
        margin: 2rem 0 4rem;
        border: 1px solid rgba(148, 163, 184, 0.1);
        text-align: center;
    }

    .phase-nav-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #f1f5f9;
        margin-bottom: 1rem;
    }

    .phase-nav-description {
        color: #94a3b8;
        margin-bottom: 2rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .phase-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .phase-btn {
        padding: 0.75rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        min-width: 140px;
    }

    .phase-btn.active {
        background: linear-gradient(135deg, #9333ea, #7c3aed);
        color: white;
        box-shadow: 0 8px 25px rgba(147, 51, 234, 0.3);
    }

    .phase-btn.inactive {
        background: rgba(107, 114, 128, 0.2);
        color: #9ca3af;
        border: 1px solid rgba(107, 114, 128, 0.3);
    }

    .phase-btn.inactive:hover {
        background: rgba(147, 51, 234, 0.1);
        color: #a855f7;
        border-color: rgba(147, 51, 234, 0.4);
        transform: translateY(-2px);
    }

    .research-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .research-card {
        background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.92));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(148, 163, 184, 0.1);
        border-radius: 20px;
        padding: 2.5rem;
        transition: all 0.4s ease;
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
        border-radius: 20px 20px 0 0;
    }

    .research-card.blue::before {
        background: linear-gradient(90deg, #3b82f6, #60a5fa, #93c5fd);
    }

    .research-card.purple::before {
        background: linear-gradient(90deg, #8b5cf6, #a78bfa, #c4b5fd);
    }

    .research-card.cyan::before {
        background: linear-gradient(90deg, #06b6d4, #22d3ee, #67e8f9);
    }

    .research-card:hover {
        transform: translateY(-8px);
        border-color: rgba(147, 51, 234, 0.4);
        box-shadow: 0 25px 50px rgba(147, 51, 234, 0.15);
    }

    .card-icon {
        width: 4rem;
        height: 4rem;
        margin-bottom: 1.5rem;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .card-icon.blue {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    }

    .card-icon.purple {
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    }

    .card-icon.cyan {
        background: linear-gradient(135deg, #06b6d4, #0891b2);
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #f1f5f9;
        margin-bottom: 1rem;
    }

    .card-description {
        color: #94a3b8;
        line-height: 1.7;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    .tech-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .tech-tag {
        padding: 0.375rem 0.875rem;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 500;
        border: 1px solid;
        transition: all 0.3s ease;
    }

    .tech-tag.blue {
        background: rgba(59, 130, 246, 0.15);
        color: #93c5fd;
        border-color: rgba(59, 130, 246, 0.3);
    }

    .tech-tag.purple {
        background: rgba(139, 92, 246, 0.15);
        color: #c4b5fd;
        border-color: rgba(139, 92, 246, 0.3);
    }

    .tech-tag.cyan {
        background: rgba(6, 182, 212, 0.15);
        color: #67e8f9;
        border-color: rgba(6, 182, 212, 0.3);
    }

    .explore-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .explore-btn.blue {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        color: white;
    }

    .explore-btn.purple {
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        color: white;
    }

    .explore-btn.cyan {
        background: linear-gradient(135deg, #06b6d4, #0891b2);
        color: white;
    }

    .explore-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .research-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .research-card {
            padding: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="relative z-10 min-h-screen">
    <div class="main-container">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- Hero Section -->
            <div class="hero-section">
                <h1 class="hero-title">Phase 1: Foundation Research</h1>
                <p class="hero-subtitle">Five Key Areas of Advanced Cybersecurity Research and Development</p>
                <div class="mt-4 flex items-center justify-center space-x-2 text-gray-400">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Academic Period: February 2025 - April 2025</span>
                </div>
            </div>

            <!-- Phase Navigation -->
            <div class="phase-navigation">
                <h3 class="phase-nav-title">Phase 1 Overview</h3>
                <p class="phase-nav-description">
                    This phase focuses on establishing foundational knowledge across five critical areas of cybersecurity research. 
                    Each research point builds upon previous knowledge while introducing new concepts and methodologies.
                </p>
                <div class="phase-buttons">
                    <a href="{{ route('nexus.second-semester-phase1') }}" class="phase-btn active">
                        <i class="fas fa-search mr-2"></i>
                        Phase 1
                    </a>
                    <a href="{{ route('nexus.second-semester-phase2') }}" class="phase-btn inactive">
                        <i class="fas fa-rocket mr-2"></i>
                        Phase 2
                    </a>
                </div>
            </div>

            <!-- Research Domains -->
            <div class="research-grid">
                <!-- Core Ransomware Research Domain -->
                <div class="research-card blue">
                    <div class="card-icon blue">
                        <i class="fas fa-virus"></i>
                    </div>
                    <h3 class="card-title">Core Ransomware Analysis</h3>
                    <p class="card-description">
                        Deep analysis of ransomware mechanisms including AES-256 encryption, payload development, 
                        file system targeting, and persistence mechanisms for educational and defensive purposes.
                    </p>
                    <div class="tech-tags">
                        <span class="tech-tag blue">Python Cryptography</span>
                        <span class="tech-tag blue">AES-256 Encryption</span>
                        <span class="tech-tag blue">Payload Analysis</span>
                        <span class="tech-tag blue">Process Injection</span>
                        <span class="tech-tag blue">Persistence Methods</span>
                    </div>
                    <a href="{{ route('nexus.core-ransomware') }}" class="explore-btn blue">
                        Explore Research
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Detection & Response Domain -->
                <div class="research-card purple">
                    <div class="card-icon purple">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="card-title">Detection & Response Systems</h3>
                    <p class="card-description">
                        Advanced threat detection using YARA rules, behavioral analysis, and automated response protocols. 
                        Includes malware scanning, pattern recognition, and incident response workflows.
                    </p>
                    <div class="tech-tags">
                        <span class="tech-tag purple">YARA Engine</span>
                        <span class="tech-tag purple">Behavioral Analysis</span>
                        <span class="tech-tag purple">Pattern Matching</span>
                        <span class="tech-tag purple">Automated Response</span>
                        <span class="tech-tag purple">Threat Intelligence</span>
                    </div>
                    <a href="{{ route('nexus.detection-response') }}" class="explore-btn purple">
                        Explore Research
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Delivery Methods Domain -->
                <div class="research-card cyan">
                    <div class="card-icon cyan">
                        <i class="fas fa-usb"></i>
                    </div>
                    <h3 class="card-title">Advanced Delivery Methods</h3>
                    <p class="card-description">
                        Comprehensive study of malware delivery vectors including USB drives, autorun functionality, 
                        social engineering tactics, and disguised executable deployment strategies.
                    </p>
                    <div class="tech-tags">
                        <span class="tech-tag cyan">USB Delivery</span>
                        <span class="tech-tag cyan">Autorun Execution</span>
                        <span class="tech-tag cyan">Social Engineering</span>
                        <span class="tech-tag cyan">Process Hollowing</span>
                        <span class="tech-tag cyan">Steganography</span>
                    </div>
                    <a href="{{ route('nexus.delivery-methods') }}" class="explore-btn cyan">
                        Explore Research
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- RAT Prototype Domain -->
                <div class="research-card blue">
                    <div class="card-icon blue">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3 class="card-title">RAT Prototype Development</h3>
                    <p class="card-description">
                        Advanced remote access tool development using Python, featuring secure command & control, 
                        file transfer protocols, system reconnaissance, and multi-platform compatibility.
                    </p>
                    <div class="tech-tags">
                        <span class="tech-tag blue">Python Socket Programming</span>
                        <span class="tech-tag blue">Command & Control</span>
                        <span class="tech-tag blue">File Transfer Protocol</span>
                        <span class="tech-tag blue">System Reconnaissance</span>
                        <span class="tech-tag blue">Multi-threading</span>
                    </div>
                    <a href="{{ route('nexus.rat-prototype') }}" class="explore-btn blue">
                        Explore Research
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Evasion & Stealth Domain -->
                <div class="research-card purple">
                    <div class="card-icon purple">
                        <i class="fas fa-user-ninja"></i>
                    </div>
                    <h3 class="card-title">Evasion & Stealth Techniques</h3>
                    <p class="card-description">
                        Comprehensive study of advanced evasion techniques including anti-debugging, sandbox detection, 
                        code obfuscation, polymorphic behavior, and stealth persistence mechanisms.
                    </p>
                    <div class="tech-tags">
                        <span class="tech-tag purple">Anti-Debugging</span>
                        <span class="tech-tag purple">Sandbox Evasion</span>
                        <span class="tech-tag purple">Code Obfuscation</span>
                        <span class="tech-tag purple">Polymorphic Code</span>
                        <span class="tech-tag purple">Stealth Persistence</span>
                    </div>
                    <a href="{{ route('nexus.evasion-stealth') }}" class="explore-btn purple">
                        Explore Research
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Foundation Building Section -->
            <div class="phase-navigation">
                <h3 class="phase-nav-title">Foundation Building Focus</h3>
                <p class="phase-nav-description">
                    Phase 1 establishes the theoretical foundation and research methodologies that directly inform 
                    the practical implementations explored in Phase 2's specialized areas.
                </p>
                
                <div class="grid md:grid-cols-3 gap-8 mt-8">
                    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-book text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Research Foundation</h3>
                        <p class="text-gray-300 text-sm">
                            Establish comprehensive understanding of cybersecurity principles, attack vectors, 
                            and defensive methodologies through systematic research.
                        </p>
                    </div>
                    
                    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-flask text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Analysis Methods</h3>
                        <p class="text-gray-300 text-sm">
                            Develop critical analysis skills through systematic examination of malware samples, 
                            attack patterns, and security vulnerabilities.
                        </p>
                    </div>
                    
                    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-3">Educational Ethics</h3>
                        <p class="text-gray-300 text-sm">
                            Maintain strict ethical guidelines and educational focus while exploring 
                            advanced cybersecurity concepts and technologies.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate cards on load
        const cards = document.querySelectorAll('.research-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Enhanced hover effects
        document.querySelectorAll('.research-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-12px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-8px) scale(1)';
            });
        });
    });
</script>
@endpush
