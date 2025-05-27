@extends('layouts.nexus')

@section('title', 'Detection & Response - Nexus Project')

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
        overflow-x: hidden;
        position: relative;
        z-index: 1;
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

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 50%, #1d4ed8 100%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: #94a3b8;
        max-width: 600px;
        margin: 0 auto 2rem;
        font-weight: 400;
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

    /* YARA Screenshots */
    .detection-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #f1f5f9;
        margin-bottom: 1rem;
        text-align: center;
    }

    .detection-description {
        font-size: 1.1rem;
        color: #94a3b8;
        text-align: center;
        margin-bottom: 3rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .yara-screenshots-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
        position: relative;
        z-index: 10;
    }

    .yara-screenshot-card {
        background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.92));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(148, 163, 184, 0.1);
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        z-index: 10;
    }

    .yara-screenshot-container {
        position: relative;
        width: 100%;
        padding-top: 75%;
        overflow: hidden;
    }

    .yara-screenshot-image {
        position: absolute;
        top: 0;
        left: 0;
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
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.6);
        color: #ffffff;
        font-size: 1.5rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .yara-screenshot-card:hover .yara-screenshot-image {
        transform: scale(1.05);
    }

    .yara-screenshot-card:hover .yara-screenshot-overlay {
        opacity: 1;
    }

    .yara-screenshot-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #f1f5f9;
        margin: 1rem 0 0.5rem;
        text-align: center;
    }

    .yara-screenshot-description {
        color: #cbd5e1;
        font-size: 0.9rem;
        line-height: 1.5;
        margin: 0;
        text-align: center;
    }

    .yara-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        justify-content: center;
        margin-top: 0.5rem;
    }

    /* Responsive Design */
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

        .page-container {
            padding: 0 1rem;
        }

        .disclaimer-features {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .yara-screenshots-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
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
</style>
@endpush

@section('content')
<div class="relative z-10 min-h-screen">
    <div class="main-content">
        <div class="page-container">
        <!-- Warning Banner -->
        <div class="warning-banner">
            <h3>
                <i class="fas fa-exclamation-triangle"></i>
                Educational Research Only
            </h3>
            <p>This content demonstrates detection and response techniques for cybersecurity education and defensive research purposes only. All methodologies are studied to improve threat detection capabilities.</p>
        </div>

        <!-- Hero Section -->
        <section class="hero-section">
            <h1 class="hero-title">Detection & Response Research</h1>
            <p class="hero-subtitle">Advanced Threat Detection & Automated Response Systems for Cybersecurity Defense</p>
        </section>

        <!-- Research Section -->
        <section class="py-16">
            <div class="text-center mb-12">
                <h2 class="section-title">Detection Technologies</h2>
                <p class="section-description">
                    Comprehensive research into modern threat detection and automated response systems for enterprise cybersecurity
                </p>
            </div>

            <!-- Research Grid -->
            <div class="research-grid">
                <!-- YARA Rules Research -->
                <div class="research-card fade-in">
                    <h3 class="research-card-title">
                        <div class="research-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        YARA Rules Development
                    </h3>
                    <p class="research-description">
                        Research into signature-based detection systems using YARA rule engine for malware identification, pattern matching, and threat classification in cybersecurity defense.
                    </p>
                    <div class="research-tags">
                        <span class="research-tag">Signature Detection</span>
                        <span class="research-tag">Pattern Matching</span>
                        <span class="research-tag">Malware Analysis</span>
                        <span class="research-tag">Rule Engine</span>
                    </div>
                    <ul class="research-features">
                        <li>Custom YARA rule creation for ransomware detection</li>
                        <li>String and hex pattern identification</li>
                        <li>Behavioral signature development</li>
                        <li>Performance optimization techniques</li>
                    </ul>
                </div>

                <!-- Behavioral Analysis Research -->
                <div class="research-card fade-in">
                    <h3 class="research-card-title">
                        <div class="research-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        Behavioral Analysis Systems
                    </h3>
                    <p class="research-description">
                        Advanced behavioral analysis methodologies for detecting zero-day threats and sophisticated attack patterns through machine learning and statistical analysis.
                    </p>
                    <div class="research-tags">
                        <span class="research-tag">Behavioral Detection</span>
                        <span class="research-tag">Machine Learning</span>
                        <span class="research-tag">Anomaly Detection</span>
                        <span class="research-tag">Zero-Day Defense</span>
                    </div>
                    <ul class="research-features">
                        <li>Process behavior monitoring and analysis</li>
                        <li>Network traffic pattern recognition</li>
                        <li>File system activity monitoring</li>
                        <li>Registry modification detection</li>
                    </ul>
                </div>

                <!-- Automated Response Research -->
                <div class="research-card fade-in">
                    <h3 class="research-card-title">
                        <div class="research-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        Automated Response Systems
                    </h3>
                    <p class="research-description">
                        Development of automated incident response frameworks for rapid threat containment, quarantine procedures, and recovery operations in enterprise environments.
                    </p>
                    <div class="research-tags">
                        <span class="research-tag">Incident Response</span>
                        <span class="research-tag">Automation</span>
                        <span class="research-tag">Threat Containment</span>
                        <span class="research-tag">Recovery Systems</span>
                    </div>
                    <ul class="research-features">
                        <li>Automatic threat isolation protocols</li>
                        <li>Rapid quarantine implementation</li>
                        <li>Forensic data preservation</li>
                        <li>System restoration procedures</li>
                    </ul>
                </div>

                <!-- SIEM Integration Research -->
                <div class="research-card fade-in">
                    <h3 class="research-card-title">
                        <div class="research-icon">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        SIEM Integration Analysis
                    </h3>
                    <p class="research-description">
                        Security Information and Event Management system integration research for centralized threat detection, log analysis, and comprehensive security monitoring.
                    </p>
                    <div class="research-tags">
                        <span class="research-tag">SIEM Systems</span>
                        <span class="research-tag">Log Analysis</span>
                        <span class="research-tag">Event Correlation</span>
                        <span class="research-tag">Security Monitoring</span>
                    </div>
                    <ul class="research-features">
                        <li>Multi-source log aggregation</li>
                        <li>Real-time event correlation</li>
                        <li>Alert prioritization algorithms</li>
                        <li>Dashboard and reporting systems</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Educational Disclaimer -->
        <section class="disclaimer-section">
            <h3 class="disclaimer-title">
                <i class="fas fa-graduation-cap"></i>
                Educational Research Disclaimer
            </h3>
            <p class="disclaimer-description">
                This detection and response research is conducted exclusively for educational cybersecurity purposes and defensive security analysis. All techniques are studied to improve threat detection capabilities and develop better protection mechanisms.
            </p>
            <div class="disclaimer-features">
                <div class="disclaimer-feature">
                    <i class="fas fa-shield-alt"></i>
                    <span>Defensive Security Focus</span>
                </div>
                <div class="disclaimer-feature">
                    <i class="fas fa-book"></i>
                    <span>Academic Learning Purposes</span>
                </div>
                <div class="disclaimer-feature">
                    <i class="fas fa-lock"></i>
                    <span>Threat Detection Enhancement</span>
                </div>            </div>
        </section>

        <!-- YARA Detection Screenshots -->
        <section class="py-16">
            <div class="text-center mb-12">
                <h2 class="detection-title">YARA Rule Development & Testing</h2>
                <p class="detection-description">
                    Real-world examples of YARA rule creation, testing, and malware detection capabilities
                </p>
            </div>
            
            <div class="yara-screenshots-grid">
                <div class="yara-screenshot-card">
                    <div class="yara-screenshot-container">
                        <img src="{{ asset('images/yara/s1.png') }}" alt="YARA Rule Creation" class="yara-screenshot-image">
                        <div class="yara-screenshot-overlay">
                            <i class="fas fa-code"></i>
                        </div>
                    </div>
                    <div class="yara-screenshot-content">
                        <h3 class="yara-screenshot-title">YARA Rule Creation</h3>
                        <p class="yara-screenshot-description">
                            Development of custom YARA rules for malware family identification and threat hunting operations.
                        </p>
                        <div class="yara-tags">
                            <span class="research-tag">Rule Development</span>
                            <span class="research-tag">Pattern Matching</span>
                        </div>
                    </div>
                </div>

                <div class="yara-screenshot-card">
                    <div class="yara-screenshot-container">
                        <img src="{{ asset('images/yara/s2.png') }}" alt="YARA Testing Interface" class="yara-screenshot-image">
                        <div class="yara-screenshot-overlay">
                            <i class="fas fa-bug"></i>
                        </div>
                    </div>
                    <div class="yara-screenshot-content">
                        <h3 class="yara-screenshot-title">Rule Testing Environment</h3>
                        <p class="yara-screenshot-description">
                            Testing and validation of YARA rules against known malware samples in controlled environments.
                        </p>
                        <div class="yara-tags">
                            <span class="research-tag">Testing</span>
                            <span class="research-tag">Validation</span>
                        </div>
                    </div>
                </div>

                <div class="yara-screenshot-card">
                    <div class="yara-screenshot-container">
                        <img src="{{ asset('images/yara/s3.png') }}" alt="Detection Results" class="yara-screenshot-image">
                        <div class="yara-screenshot-overlay">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <div class="yara-screenshot-content">
                        <h3 class="yara-screenshot-title">Detection Analysis</h3>
                        <p class="yara-screenshot-description">
                            Analysis of YARA rule performance and detection accuracy in identifying malicious patterns.
                        </p>
                        <div class="yara-tags">
                            <span class="research-tag">Detection</span>
                            <span class="research-tag">Analysis</span>
                        </div>
                    </div>
                </div>

                <div class="yara-screenshot-card">
                    <div class="yara-screenshot-container">
                        <img src="{{ asset('images/yara/s4.png') }}" alt="Advanced YARA Features" class="yara-screenshot-image">
                        <div class="yara-screenshot-overlay">
                            <i class="fas fa-cogs"></i>
                        </div>
                    </div>
                    <div class="yara-screenshot-content">
                        <h3 class="yara-screenshot-title">Advanced Rule Features</h3>
                        <p class="yara-screenshot-description">
                            Implementation of advanced YARA features including string modifiers and condition logic.
                        </p>
                        <div class="yara-tags">
                            <span class="research-tag">Advanced Rules</span>
                            <span class="research-tag">Logic</span>
                        </div>
                    </div>
                </div>

                <div class="yara-screenshot-card">
                    <div class="yara-screenshot-container">
                        <img src="{{ asset('images/yara/s5.png') }}" alt="YARA Performance" class="yara-screenshot-image">
                        <div class="yara-screenshot-overlay">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="yara-screenshot-content">
                        <h3 class="yara-screenshot-title">Performance Metrics</h3>
                        <p class="yara-screenshot-description">
                            Performance analysis and optimization of YARA rules for large-scale threat hunting operations.
                        </p>
                        <div class="yara-tags">
                            <span class="research-tag">Performance</span>
                            <span class="research-tag">Optimization</span>
                        </div>
                    </div>
                </div>

                <div class="yara-screenshot-card">
                    <div class="yara-screenshot-container">
                        <img src="{{ asset('images/yara/s6.png') }}" alt="YARA Integration" class="yara-screenshot-image">
                        <div class="yara-screenshot-overlay"></div></div>
                            <i class="fas fa-puzzle-piece"></i>
                        </div>
                    </div>
                    <div class="yara-screenshot-content">
                        <h3 class="yara-screenshot-title">System Integration</h3>
                        <p class="yara-screenshot-description">
                            Integration of YARA rules with security platforms and automated detection systems.
                        </p>
                        <div class="yara-tags">
                            <span class="research-tag">Integration</span>
                            <span class="research-tag">Automation</span>
                        </div>
                    </div>
                </div>

                <div class="yara-screenshot-card">
                    <div class="yara-screenshot-container">
                        <img src="{{ asset('images/yara/s7.png') }}" alt="YARA Command Line" class="yara-screenshot-image">
                        <div class="yara-screenshot-overlay">
                            <i class="fas fa-terminal"></i>
                        </div>
                    </div>
                    <div class="yara-screenshot-content">
                        <h3 class="yara-screenshot-title">Command Line Usage</h3>
                        <p class="yara-screenshot-description">
                            Practical usage of YARA through command line interfaces for manual analysis and scripting.
                        </p>
                        <div class="yara-tags">
                            <span class="research-tag">CLI</span>
                            <span class="research-tag">Scripting</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Detection & Response Research Interface Loaded');
        
        // Intersection Observer for fade-in animations
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

        // Enhanced hover effects for research cards
        const cards = document.querySelectorAll('.research-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.borderColor = 'rgba(59, 130, 246, 0.4)';
                this.style.boxShadow = '0 25px 50px rgba(59, 130, 246, 0.15)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.borderColor = 'rgba(148, 163, 184, 0.1)';
                this.style.boxShadow = '0 20px 40px rgba(59, 130, 246, 0.1)';
            });
        });
    });
</script>
@endpush
@endsection
