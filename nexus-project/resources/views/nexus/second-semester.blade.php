@extends('layouts.nexus')

@section('title', 'Second Semester - Advanced Cybersecurity Research | Nexus')

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
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(147, 197, 253, 0.05));
        border-radius: 24px;
        padding: 4rem 2rem;
        margin-bottom: 4rem;
        text-align: center;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(59, 130, 246, 0.2);
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #60a5fa, #3b82f6, #93c5fd);
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
        border-color: rgba(59, 130, 246, 0.4);
        box-shadow: 0 25px 50px rgba(59, 130, 246, 0.15);
    }

    .card-icon {
        width: 4rem;
        height: 4rem;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        margin-bottom: 2rem;
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
        font-size: 1.8rem;
        font-weight: 700;
        color: #f1f5f9;
        margin-bottom: 1rem;
    }

    .card-description {
        color: #cbd5e1;
        line-height: 1.7;
        margin-bottom: 2rem;
        font-size: 1rem;
    }

    .tech-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 2rem;
    }

    .tech-tag {
        padding: 0.5rem 1rem;
        border-radius: 1rem;
        font-size: 0.85rem;
        font-weight: 500;
        border: 1px solid;
    }

    .tech-tag.blue {
        background: rgba(59, 130, 246, 0.1);
        color: #93c5fd;
        border-color: rgba(59, 130, 246, 0.3);
    }

    .tech-tag.purple {
        background: rgba(139, 92, 246, 0.1);
        color: #c4b5fd;
        border-color: rgba(139, 92, 246, 0.3);
    }

    .tech-tag.cyan {
        background: rgba(6, 182, 212, 0.1);
        color: #67e8f9;
        border-color: rgba(6, 182, 212, 0.3);
    }

    .explore-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 600;
        padding: 0.875rem 2rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 1rem;
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

    .libraries-section {
        background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.92));
        border-radius: 20px;
        padding: 3rem;
        margin: 4rem 0;
        border: 1px solid rgba(148, 163, 184, 0.1);
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #60a5fa, #3b82f6, #93c5fd);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-align: center;
        margin-bottom: 2rem;
    }

    .libraries-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .library-card {
        background: rgba(15, 23, 42, 0.5);
        border: 1px solid rgba(59, 130, 246, 0.2);
        border-radius: 12px;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .library-card:hover {
        border-color: rgba(59, 130, 246, 0.4);
        transform: translateY(-2px);
    }

    .library-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: #60a5fa;
        margin-bottom: 0.5rem;
    }

    .library-description {
        color: #cbd5e1;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .library-category {
        display: inline-block;
        background: rgba(59, 130, 246, 0.1);
        color: #93c5fd;
        padding: 0.25rem 0.75rem;
        border-radius: 0.5rem;
        font-size: 0.75rem;
        font-weight: 500;
        margin-top: 0.75rem;
    }

    /* Code Analysis Section Styles */
    .code-analysis-section {
        margin: 4rem 0;
        padding: 3rem 2rem;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.6), rgba(30, 41, 59, 0.4));
        border-radius: 24px;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(59, 130, 246, 0.1);
    }

    .code-analysis-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .code-card {
        background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.8));
        border: 1px solid rgba(148, 163, 184, 0.15);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .code-card:hover {
        transform: translateY(-4px);
        border-color: rgba(59, 130, 246, 0.4);
        box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
    }

    .code-card-header {
        padding: 1.5rem 1.5rem 1rem;
        border-bottom: 1px solid rgba(148, 163, 184, 0.1);
        display: flex;
        align-items: center;
        gap: 1rem;
        position: relative;
    }

    .code-icon {
        width: 3rem;
        height: 3rem;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .code-card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #f1f5f9;
        margin: 0;
        flex-grow: 1;
    }

    .code-card-tag {
        background: rgba(59, 130, 246, 0.15);
        color: #93c5fd;
        padding: 0.375rem 0.75rem;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 500;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .code-card-content {
        padding: 1.5rem;
    }

    .code-snippet {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        border: 1px solid rgba(148, 163, 184, 0.2);
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1.5rem;
        font-family: 'JetBrains Mono', monospace;
        overflow-x: auto;
    }

    .code-snippet pre {
        margin: 0;
        color: #e2e8f0;
        font-size: 0.875rem;
        line-height: 1.6;
        white-space: pre-wrap;
    }

    .code-snippet code {
        color: #94a3b8;
        font-family: inherit;
    }

    .code-description {
        color: #94a3b8;
        line-height: 1.7;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    .code-features {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .feature-tag {
        background: rgba(16, 185, 129, 0.15);
        color: #6ee7b7;
        padding: 0.375rem 0.875rem;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 500;
        border: 1px solid rgba(16, 185, 129, 0.3);
        transition: all 0.3s ease;
    }

    .feature-tag:hover {
        background: rgba(16, 185, 129, 0.25);
        transform: translateY(-1px);
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

        .libraries-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .code-analysis-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .code-card-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .code-snippet {
            font-size: 0.8rem;
            padding: 1rem;
        }

        .code-snippet pre {
            font-size: 0.75rem;
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
                <h1 class="hero-title">Advanced Cybersecurity Research</h1>
                <p class="hero-subtitle">Second Semester - Professional Security Analysis & Implementation</p>
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
            </div>

            <!-- Professional Libraries Section -->
            <div class="libraries-section">
                <h2 class="section-title">Professional Security Libraries</h2>
                <p class="text-center text-gray-300 mb-6 max-w-3xl mx-auto">
                    Industry-standard libraries and frameworks used in our research for malware analysis, 
                    cryptographic operations, and security testing.
                </p>
                
                <div class="libraries-grid">
                    <div class="library-card">
                        <div class="library-name">Cryptography (Python)</div>
                        <div class="library-description">
                            Advanced cryptographic library providing secure encryption/decryption algorithms, 
                            key generation, and digital signatures used in ransomware encryption analysis.
                        </div>
                        <div class="library-category">Encryption & Security</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">YARA</div>
                        <div class="library-description">
                            Industry-standard pattern matching engine for malware identification and classification. 
                            Used for creating custom detection rules and threat hunting.
                        </div>
                        <div class="library-category">Malware Detection</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">PyCryptodome</div>
                        <div class="library-description">
                            Self-contained Python package providing cryptographic primitives including AES, RSA, 
                            and hash functions for security research and analysis.
                        </div>
                        <div class="library-category">Cryptography</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">psutil</div>
                        <div class="library-description">
                            Cross-platform library for retrieving system information, process monitoring, 
                            and system resource analysis in security applications.
                        </div>
                        <div class="library-category">System Analysis</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">Requests</div>
                        <div class="library-description">
                            HTTP library for Python used in command & control communications analysis, 
                            API interactions, and network-based security testing.
                        </div>
                        <div class="library-category">Network Security</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">PyQt5/PySide</div>
                        <div class="library-description">
                            GUI framework for creating professional security tools and malware analysis interfaces 
                            with cross-platform compatibility.
                        </div>
                        <div class="library-category">User Interface</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">Scapy</div>
                        <div class="library-description">
                            Powerful packet manipulation library for network security testing, 
                            traffic analysis, and protocol research.
                        </div>
                        <div class="library-category">Network Analysis</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">PyInstaller</div>
                        <div class="library-description">
                            Application bundler for Python programs, used in studying executable packaging 
                            and distribution methods in cybersecurity research.
                        </div>
                        <div class="library-category">Application Packaging</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">Winshell</div>
                        <div class="library-description">
                            Windows-specific library for shell operations, file system manipulation, 
                            and registry access in Windows security research.
                        </div>
                        <div class="library-category">Windows Security</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">Colorama</div>
                        <div class="library-description">
                            Cross-platform colored terminal output library for creating professional 
                            command-line security tools and analysis interfaces.
                        </div>
                        <div class="library-category">CLI Tools</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">Threading</div>
                        <div class="library-description">
                            Python's built-in threading module for concurrent operations in malware analysis, 
                            real-time monitoring, and parallel processing tasks.
                        </div>
                        <div class="library-category">Concurrent Processing</div>
                    </div>

                    <div class="library-card">
                        <div class="library-name">Hashlib</div>
                        <div class="library-description">
                            Cryptographic hash function library providing MD5, SHA-1, SHA-256 algorithms 
                            for file integrity verification and malware identification.
                        </div>
                        <div class="library-category">Hash Functions</div>
                    </div>
                </div>
            </div>

            <!-- Malware Code Analysis Section -->
            <section class="code-analysis-section">
                <h2 class="section-title">Snake Keylogger Code Analysis</h2>
                <p class="text-center text-gray-300 mb-6 max-w-3xl mx-auto">
                    Professional analysis of malware components including obfuscation techniques, 
                    deobfuscation algorithms, and security research findings.
                </p>
                
                <div class="code-analysis-grid">
                    <div class="code-card">
                        <div class="code-card-header">
                            <div class="code-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <h3 class="code-card-title">Initial Obfuscated Code</h3>
                            <span class="code-card-tag">JavaScript Analysis</span>
                        </div>
                        <div class="code-card-content">
                            <div class="code-snippet">
                                <pre><code>var I0i=64562877
var LEZVCW = String.fromCharCode(
    64562993-I0i, 64562991-I0i, 
    64562998-I0i, 64563000-I0i,
    // ...hundreds more operations
);
eval(LEZVCW)</code></pre>
                            </div>
                            <p class="code-description">
                                Heavily obfuscated JavaScript code using mathematical operations and String.fromCharCode() 
                                to hide malicious functionality. This pattern is common in malware droppers.
                            </p>
                            <div class="code-features">
                                <span class="feature-tag">Mathematical Obfuscation</span>
                                <span class="feature-tag">Dynamic Code Generation</span>
                                <span class="feature-tag">Anti-Analysis</span>
                            </div>
                        </div>
                    </div>

                    <div class="code-card">
                        <div class="code-card-header">
                            <div class="code-icon">
                                <i class="fas fa-unlock-alt"></i>
                            </div>
                            <h3 class="code-card-title">Deobfuscation Algorithm</h3>
                            <span class="code-card-tag">Analysis Method</span>
                        </div>
                        <div class="code-card-content">
                            <div class="code-snippet">
                                <pre><code>// Pattern Recognition Process
1. Identify String.fromCharCode() patterns
2. Calculate arithmetic operations:
   475-383 = 92 -> "\"
   90-3 = 87   -> "W"
   474-369 = 105 -> "i"
3. Reconstruct original strings</code></pre>
                            </div>
                            <p class="code-description">
                                Manual deobfuscation process using pattern analysis and mathematical calculation 
                                to reveal the true functionality of the malware code.
                            </p>
                            <div class="code-features">
                                <span class="feature-tag">Manual Analysis</span>
                                <span class="feature-tag">Pattern Recognition</span>
                                <span class="feature-tag">Character Mapping</span>
                            </div>
                        </div>
                    </div>

                    <div class="code-card">
                        <div class="code-card-header">
                            <div class="code-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h3 class="code-card-title">ActiveX Object Usage</h3>
                            <span class="code-card-tag">Payload Analysis</span>
                        </div>
                        <div class="code-card-content">
                            <div class="code-snippet">
                                <pre><code>// Deobfuscated Key Pattern
GzCMjp... = new ActiveXObject(...)
    .GetSpecialFolder(...) + 
    "\Windows\System32\wscript.exe"

// File System Access
EaynfY... = new ActiveXObject(...)
    .GetSpecialFolder(...) + 
    "\downloads\payload.exe"</code></pre>
                            </div>
                            <p class="code-description">
                                Analysis reveals ActiveXObject usage for file system access and Windows system 
                                directory targeting, indicating potential system compromise attempts.
                            </p>
                            <div class="code-features">
                                <span class="feature-tag">System Access</span>
                                <span class="feature-tag">File Operations</span>
                                <span class="feature-tag">Windows Targeting</span>
                            </div>
                        </div>
                    </div>

                    <div class="code-card">
                        <div class="code-card-header">
                            <div class="code-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h3 class="code-card-title">Security Implications</h3>
                            <span class="code-card-tag">Threat Assessment</span>
                        </div>
                        <div class="code-card-content">
                            <div class="code-snippet">
                                <pre><code>// Identified Threats
1. Code Injection via eval()
2. File System Manipulation  
3. Windows Script Host Abuse
4. Anti-Analysis Techniques
5. Potential Data Exfiltration</code></pre>
                            </div>
                            <p class="code-description">
                                Comprehensive threat analysis revealing multiple attack vectors including code injection, 
                                file system access, and evasion techniques commonly used in keylogger malware.
                            </p>
                            <div class="code-features">
                                <span class="feature-tag">Threat Analysis</span>
                                <span class="feature-tag">Risk Assessment</span>
                                <span class="feature-tag">Security Research</span>
                            </div>
                        </div>
                    </div>

                    <div class="code-card">
                        <div class="code-card-header">
                            <div class="code-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h3 class="code-card-title">Code Segmentation Analysis</h3>
                            <span class="code-card-tag">Detailed Breakdown</span>
                        </div>
                        <div class="code-card-content">
                            <div class="code-snippet">
                                <pre><code>// Analysis Segments
Lines 47-60:  Initial payload setup
Lines 61-102: File system operations
Lines 104-163: Network communications
Lines 164-188: Persistence mechanisms

// Pattern: Junk code + Real functionality</code></pre>
                            </div>
                            <p class="code-description">
                                Systematic breakdown of code segments reveals a structured approach with junk code 
                                interspersed with functional malware components for analysis evasion.
                            </p>
                            <div class="code-features">
                                <span class="feature-tag">Code Segmentation</span>
                                <span class="feature-tag">Function Mapping</span>
                                <span class="feature-tag">Structure Analysis</span>
                            </div>
                        </div>
                    </div>

                    <div class="code-card">
                        <div class="code-card-header">
                            <div class="code-icon">
                                <i class="fas fa-bug"></i>
                            </div>
                            <h3 class="code-card-title">Defense Research Findings</h3>
                            <span class="code-card-tag">Countermeasures</span>
                        </div>
                        <div class="code-card-content">
                            <div class="code-snippet">
                                <pre><code>// Detection Strategies
1. Monitor ActiveXObject creation
2. Analyze String.fromCharCode patterns
3. Track GetSpecialFolder calls
4. Sandbox eval() operations
5. Implement behavioral analysis</code></pre>
                            </div>
                            <p class="code-description">
                                Research-driven defense strategies developed through malware analysis to improve 
                                detection capabilities and strengthen security systems against similar threats.
                            </p>
                            <div class="code-features">
                                <span class="feature-tag">Defense Strategy</span>
                                <span class="feature-tag">Detection Methods</span>
                                <span class="feature-tag">Security Enhancement</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate cards on load
        const cards = document.querySelectorAll('.research-card, .library-card');
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

        // Library cards hover effect
        document.querySelectorAll('.library-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px)';
                this.style.borderColor = 'rgba(59, 130, 246, 0.6)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.borderColor = 'rgba(59, 130, 246, 0.4)';
            });
        });

        // Code cards hover effect
        document.querySelectorAll('.code-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px)';
                this.style.borderColor = 'rgba(59, 130, 246, 0.6)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.borderColor = 'rgba(59, 130, 246, 0.4)';
            });
        });
    });
</script>
@endpush