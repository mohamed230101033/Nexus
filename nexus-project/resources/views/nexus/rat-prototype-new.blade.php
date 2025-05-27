@extends('layouts.nexus')

@section('title', 'RAT Prototype Development - Nexus Project')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #0a0a0f;
        color: #ffffff;
        font-family: 'Orbitron', monospace;
        overflow-x: hidden;
        position: relative;
    }

    /* Neural Network Background */
    .neural-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -2;
        background: radial-gradient(circle at 25% 25%, #6b21a8 0%, transparent 50%),
                    radial-gradient(circle at 75% 75%, #db2777 0%, transparent 50%),
                    radial-gradient(circle at 50% 50%, #1e1b4b 0%, transparent 50%);
        animation: pulseNeural 8s ease-in-out infinite alternate;
    }

    @keyframes pulseNeural {
        0% { opacity: 0.3; transform: scale(1); }
        100% { opacity: 0.7; transform: scale(1.1); }
    }

    /* Cyber Grid */
    .cyber-grid {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-image: 
            linear-gradient(rgba(168, 85, 247, 0.1) 1px, transparent 1px),
            linear-gradient(90deg, rgba(168, 85, 247, 0.1) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: gridMove 20s linear infinite;
    }

    @keyframes gridMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    /* Network Nodes */
    .network-nodes {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        pointer-events: none;
    }

    .node {
        position: absolute;
        width: 4px;
        height: 4px;
        background: #a855f7;
        border-radius: 50%;
        box-shadow: 0 0 20px #a855f7, 0 0 40px #a855f7;
        animation: nodeFloat 6s ease-in-out infinite;
    }

    @keyframes nodeFloat {
        0%, 100% { transform: translateY(0px) scale(1); opacity: 0.6; }
        50% { transform: translateY(-20px) scale(1.2); opacity: 1; }
    }

    /* Connection Lines */
    .connection-line {
        position: absolute;
        height: 1px;
        background: linear-gradient(90deg, transparent, #a855f7, transparent);
        animation: connectionPulse 3s ease-in-out infinite;
    }

    @keyframes connectionPulse {
        0%, 100% { opacity: 0.2; }
        50% { opacity: 0.8; }
    }

    /* Stealth Container */
    .stealth-container {
        background: rgba(15, 15, 25, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(168, 85, 247, 0.3);
        border-radius: 20px;
        position: relative;
        overflow: hidden;
    }

    .stealth-container::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, #a855f7, #db2777, #6366f1, #a855f7);
        border-radius: 20px;
        z-index: -1;
        animation: borderGlow 3s ease-in-out infinite;
    }

    @keyframes borderGlow {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    /* Hero Title Effects */
    .hero-title {
        font-family: 'Orbitron', monospace;
        font-weight: 900;
        background: linear-gradient(45deg, #a855f7, #db2777, #6366f1, #a855f7);
        background-size: 300% 300%;
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: gradientShift 3s ease-in-out infinite;
        text-shadow: 0 0 30px rgba(168, 85, 247, 0.5);
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
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
@endpush

@section('content')
<!-- Neural Network Background -->
<div class="neural-background"></div>
<div class="cyber-grid"></div>
<div class="network-nodes" id="networkNodes"></div>

<!-- Floating Orbs -->
<div class="floating-orb" style="top: 10%; left: 85%; width: 100px; height: 100px; animation-delay: 0s;"></div>
<div class="floating-orb" style="top: 70%; left: 10%; width: 150px; height: 150px; animation-delay: 2s;"></div>
<div class="floating-orb" style="top: 30%; left: 90%; width: 80px; height: 80px; animation-delay: 4s;"></div>

<div class="max-w-7xl mx-auto relative z-10">
    <!-- Hero Section -->
    <section class="pt-20 pb-16 stealth-container mb-12" id="heroSection">
        <div class="px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-full text-purple-300 text-sm font-medium mb-8 border border-purple-500/30">
                    <div class="loading-animation mr-3"></div>
                    <i class="fas fa-graduation-cap mr-2"></i>
                    Educational Development Only
                </div>
                <h1 class="hero-title text-6xl md:text-8xl font-bold mb-8" id="heroTitle">
                    RAT PROTOTYPE
                </h1>
                <h2 class="text-4xl md:text-5xl font-semibold mb-8 text-white typing-text">
                    Remote Access Tool Development
                </h2>
                <p class="text-xl md:text-2xl text-gray-300 max-w-4xl mx-auto opacity-0" id="heroDescription">
                    Educational development of Remote Access Tool prototype for understanding system vulnerabilities and implementing comprehensive security measures through advanced stealth networking
                </p>
            </div>
        </div>
    </section>

    <!-- Warning Banner -->
    <section class="py-8 stealth-container mb-12" id="warningSection">
        <div class="px-8">
            <div class="danger-note rounded-lg p-8">
                <div class="flex items-center mb-6">
                    <i class="fas fa-exclamation-triangle text-yellow-400 text-3xl mr-4 animate-pulse"></i>
                    <h3 class="text-2xl font-bold text-white">Educational Purpose Disclaimer</h3>
                </div>
                <p class="text-gray-200 mb-4 text-lg">
                    This RAT prototype is developed solely for educational cybersecurity research and defensive purposes. 
                    All implementations are controlled and sanitized for academic study.
                </p>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="flex items-center">
                        <i class="fas fa-check text-green-400 mr-3 text-lg"></i>
                        <span class="text-gray-200">Controlled laboratory environment only</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check text-green-400 mr-3 text-lg"></i>
                        <span class="text-gray-200">No unauthorized access capabilities</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check text-green-400 mr-3 text-lg"></i>
                        <span class="text-gray-200">Focus on defense and detection methods</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RAT Prototype Overview -->
    <section class="py-12 mb-12">
        <div class="px-8">
            <h2 class="text-5xl font-bold text-white mb-12 text-center hero-title">RAT Architecture Network</h2>
            <div class="max-w-4xl mx-auto mb-12">
                <div class="educational-note rounded-lg p-8">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-info-circle text-blue-400 text-2xl mr-4"></i>
                        <h3 class="text-xl font-bold text-white">Development Overview</h3>
                    </div>
                    <p class="text-gray-200 text-lg leading-relaxed">
                        This Remote Access Trojan (RAT) serves as a preparatory stage for deploying ransomware payloads and other detection/persistence scripts. 
                        The primary objective is acquiring elevated privileges through Windows UAC social engineering, providing full authority for subsequent operations.
                    </p>
                </div>
            </div>
        </div>

        <!-- Key Functionalities Grid -->
        <div class="px-8 grid lg:grid-cols-2 gap-8 mb-12">
            <!-- Privilege Escalation -->
            <div class="feature-card border-red-500/30">
                <h3 class="text-3xl font-semibold text-red-400 mb-6">
                    <i class="fas fa-user-shield mr-3"></i>
                    Privilege Escalation
                </h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-red-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Utilizes Windows scripting to trigger UAC prompts</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-red-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Requests administrative privileges through social engineering</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-red-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Enables full system access for subsequent payloads</p>
                    </div>
                </div>
            </div>

            <!-- Data Extraction -->
            <div class="feature-card border-yellow-500/30">
                <h3 class="text-3xl font-semibold text-yellow-400 mb-6">
                    <i class="fas fa-database mr-3"></i>
                    Cookie & Credential Extraction
                </h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-yellow-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Leverages win32crypt API for browser credentials</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-yellow-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Uses sqlite3 for temporary database access</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-yellow-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Implements secure data transmission protocols</p>
                    </div>
                </div>
            </div>

            <!-- WebSocket Exploitation -->
            <div class="feature-card border-blue-500/30">
                <h3 class="text-3xl font-semibold text-blue-400 mb-6">
                    <i class="fas fa-globe mr-3"></i>
                    WebSocket Exploitation
                </h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-blue-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Targets Chromium-based browsers</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-blue-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Exploits DevTools WebSocket connections</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-blue-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Establishes persistent communication channels</p>
                    </div>
                </div>
            </div>

            <!-- Stealth Operations -->
            <div class="feature-card border-purple-500/30">
                <h3 class="text-3xl font-semibold text-purple-400 mb-6">
                    <i class="fas fa-eye-slash mr-3"></i>
                    Stealth Execution
                </h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-purple-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Terminates GUI browser processes</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-purple-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Restarts browsers in headless CLI mode</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-purple-400 mr-3 mt-1 text-lg"></i>
                        <p class="text-gray-300 text-lg">Executes background commands silently</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Code Implementation Section -->
    <section class="py-12 stealth-container mb-12">
        <div class="px-8">
            <h2 class="text-4xl font-bold text-white mb-8 text-center hero-title">Implementation Framework</h2>
            
            <!-- RAT Core Implementation -->
            <div class="mb-12">
                <div class="educational-note rounded-lg p-6 mb-6">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-graduation-cap text-blue-300 text-xl mr-3"></i>
                        <h3 class="text-lg font-bold text-white">Educational RAT Framework</h3>
                    </div>
                    <p class="text-blue-100">
                        This framework demonstrates RAT architecture for educational understanding. 
                        Sensitive implementation details are redacted for safety.
                    </p>
                </div>
                
                <div class="code-container relative">
                    <div class="code-header">
                        <div class="flex items-center justify-between w-full">
                            <h4 class="text-white font-semibold">RAT Core Framework</h4>
                            <div class="flex space-x-2">
                                <button onclick="toggleBlur('rat-code')" class="magnetic-btn text-xs px-4 py-2">
                                    Reveal for Study
                                </button>
                                <span class="px-3 py-1 bg-orange-600 text-white text-xs rounded">Educational</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <pre class="blur-sensitive" id="rat-code"><code class="language-python"># === Educational RAT Framework ===
import socket, threading, json, base64
from cryptography.fernet import Fernet

class EducationalRAT:
    def __init__(self, server_host="localhost", port=8080):
        self.host = server_host
        self.port = port
        self.encryption_key = Fernet.generate_key()
        self.cipher = Fernet(self.encryption_key)
    
    def establish_connection(self):
        # Educational connection framework
        self.socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        print("[+] RAT Framework Analysis Complete")
    
    def send_encrypted_data(self, data):
        encrypted = self.cipher.encrypt(data.encode())
        return base64.b64encode(encrypted)
    
    def educational_payload_handler(self):
        # Simulated payload analysis for defense research
        payload_types = {
            'system_info': 'Gather system information',
            'file_ops': 'File operation commands',
            'network_scan': 'Network reconnaissance'
        }
        return payload_types</code></pre>
                        <div class="warning-overlay" id="rat-warning">
                            <div class="text-center">
                                <i class="fas fa-eye-slash text-2xl mb-2"></i>
                                <div>Framework Blurred for Safety</div>
                                <div class="text-sm">Educational Research Only</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UAC Bypass Techniques -->
            <div class="mb-12">
                <div class="educational-note rounded-lg p-6 mb-6">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-shield-alt text-red-400 text-xl mr-3"></i>
                        <h3 class="text-lg font-bold text-white">UAC Bypass Techniques</h3>
                    </div>
                    <p class="text-blue-100">
                        Educational analysis of Windows UAC bypass methods for defensive security research.
                    </p>
                </div>
                
                <div class="code-container relative">
                    <div class="code-header">
                        <div class="flex items-center justify-between w-full">
                            <h4 class="text-white font-semibold">UAC Bypass Framework</h4>
                            <div class="flex space-x-2">
                                <button onclick="toggleBlur('uac-code')" class="magnetic-btn text-xs px-4 py-2">
                                    Reveal Techniques
                                </button>
                                <span class="px-3 py-1 bg-red-600 text-white text-xs rounded">Defense Research</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <pre class="blur-sensitive" id="uac-code"><code class="language-python"># UAC Bypass Educational Framework
import os, subprocess, winreg

class UACBypassEducational:
    def __init__(self):
        self.bypass_methods = ["fodhelper", "eventvwr", "sdclt"]
    
    def analyze_fodhelper_bypass(self):
        # Educational analysis of FodHelper technique
        registry_path = r"Software\Classes\ms-settings\Shell\Open\command"
        executable = "fodhelper.exe"
        
        print(f"[ANALYSIS] Registry Path: {registry_path}")
        print(f"[ANALYSIS] Target Executable: {executable}")
        print("[EDUCATIONAL] This bypasses UAC via registry manipulation")
    
    def analyze_detection_methods(self):
        detection_strategies = {
            'registry_monitoring': 'Monitor suspicious registry writes',
            'process_behavior': 'Track unusual process spawning',
            'privilege_escalation': 'Detect elevation attempts'
        }
        return detection_strategies</code></pre>
                        <div class="warning-overlay" id="uac-warning">
                            <div class="text-center">
                                <i class="fas fa-shield-alt text-2xl mb-2"></i>
                                <div>UAC Bypass Analysis</div>
                                <div class="text-sm">Defense Research Only</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Security Analysis -->
    <section class="py-12 stealth-container mb-12">
        <div class="px-8">
            <h2 class="text-4xl font-bold text-white mb-8 text-center hero-title">Security Analysis & Countermeasures</h2>
            
            <!-- Detection & Prevention Grid -->
            <div class="grid lg:grid-cols-2 gap-8 mb-12">
                <div class="feature-card border-blue-500/30">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">
                        <i class="fas fa-search mr-3"></i>
                        Detection Strategies
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-shield-alt text-blue-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Behavioral Analysis</h4>
                                <p class="text-gray-300 text-sm">Monitor UAC bypass attempts and privilege escalation</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-eye text-blue-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Process Monitoring</h4>
                                <p class="text-gray-300 text-sm">Track headless browser launches and injections</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-network-wired text-blue-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Network Analysis</h4>
                                <p class="text-gray-300 text-sm">Detect suspicious WebSocket connections</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="feature-card border-green-500/30">
                    <h3 class="text-2xl font-semibold text-green-400 mb-4">
                        <i class="fas fa-lock mr-3"></i>
                        Prevention Measures
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-user-shield text-green-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">UAC Hardening</h4>
                                <p class="text-gray-300 text-sm">Configure strict UAC policies and restrictions</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-database text-green-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Browser Security</h4>
                                <p class="text-gray-300 text-sm">Implement credential encryption and secure storage</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-cog text-green-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">System Hardening</h4>
                                <p class="text-gray-300 text-sm">Disable DevTools protocols and strengthen isolation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation & Related Research -->
    <section class="py-12">
        <div class="px-8">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">Related Research Components</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Core Ransomware -->
                <div class="feature-card border-red-500/30 hover:border-red-400/50 transition-all duration-300 group cursor-pointer" onclick="window.location.href='{{ route('nexus.core-ransomware') }}'">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-lock text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-red-400 group-hover:text-red-300">Core Ransomware</h3>
                    </div>
                    <p class="text-gray-300 mb-4">Python-based ransomware implementation with AES-256 encryption and Flask C2 server.</p>
                    <div class="text-red-400 text-sm font-medium">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Explore Implementation →
                    </div>
                </div>

                <!-- Evasion & Stealth -->
                <div class="feature-card border-purple-500/30 hover:border-purple-400/50 transition-all duration-300 group cursor-pointer" onclick="window.location.href='{{ route('nexus.evasion-stealth') }}'">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-eye-slash text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-purple-400 group-hover:text-purple-300">Evasion & Stealth</h3>
                    </div>
                    <p class="text-gray-300 mb-4">Anti-detection techniques and stealth operation methodologies.</p>
                    <div class="text-purple-400 text-sm font-medium">
                        <i class="fas fa-arrow-right mr-2"></i>
                        Explore Techniques →
                    </div>
                </div>

                <!-- Second Semester Overview -->
                <div class="feature-card border-cyan-500/30 hover:border-cyan-400/50 transition-all duration-300 group cursor-pointer" onclick="window.location.href='{{ route('nexus.second-semester') }}'">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-network-wired text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-cyan-400 group-hover:text-cyan-300">Integration Network</h3>
                    </div>
                    <p class="text-gray-300 mb-4">View the complete research integration network with RAT as central hub.</p>
                    <div class="text-cyan-400 text-sm font-medium">
                        <i class="fas fa-arrow-right mr-2"></i>
                        View Network →
                    </div>
                </div>
            </div>

            <!-- Return to Main Navigation -->
            <div class="text-center mt-12">
                <a href="{{ route('nexus.index') }}" class="magnetic-btn inline-flex items-center px-8 py-3">
                    <i class="fas fa-home mr-3"></i>
                    Return to Nexus Home
                </a>
            </div>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

<script>
    // Network Node Generation
    function createNetworkNodes() {
        const container = document.getElementById('networkNodes');
        const nodeCount = 50;

        for (let i = 0; i < nodeCount; i++) {
            const node = document.createElement('div');
            node.className = 'node';
            node.style.left = Math.random() * 100 + '%';
            node.style.top = Math.random() * 100 + '%';
            node.style.animationDelay = Math.random() * 6 + 's';
            container.appendChild(node);

            // Create connection lines
            if (i % 3 === 0) {
                const line = document.createElement('div');
                line.className = 'connection-line';
                line.style.left = Math.random() * 100 + '%';
                line.style.top = Math.random() * 100 + '%';
                line.style.width = Math.random() * 200 + 50 + 'px';
                line.style.transform = `rotate(${Math.random() * 360}deg)`;
                line.style.animationDelay = Math.random() * 3 + 's';
                container.appendChild(line);
            }
        }
    }

    // GSAP Animations
    function initAnimations() {
        // Hero title animation
        gsap.fromTo("#heroTitle", 
            { scale: 0.5, opacity: 0, rotationY: 180 },
            { scale: 1, opacity: 1, rotationY: 0, duration: 2, ease: "back.out(1.7)" }
        );

        // Hero description fade in
        gsap.to("#heroDescription", {
            opacity: 1,
            y: 0,
            duration: 1.5,
            delay: 1,
            ease: "power2.out"
        });

        // Stagger card animations
        gsap.fromTo(".feature-card", 
            { y: 50, opacity: 0 },
            { 
                y: 0, 
                opacity: 1, 
                duration: 1, 
                stagger: 0.2,
                delay: 0.5,
                ease: "power2.out"
            }
        );

        // Floating animation for orbs
        gsap.to(".floating-orb", {
            y: "random(-50, 50)",
            x: "random(-30, 30)",
            rotation: "random(-180, 180)",
            duration: "random(3, 6)",
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut",
            stagger: 0.5
        });
    }

    // Blur Toggle Function
    function toggleBlur(elementId) {
        const element = document.getElementById(elementId);
        const warning = document.getElementById(elementId.replace('-code', '-warning'));
        
        if (element && warning) {
            if (element.classList.contains('revealed')) {
                element.classList.remove('revealed');
                warning.style.display = 'flex';
            } else {
                const confirmed = confirm(
                    "This will reveal educational RAT framework for cybersecurity research only.\n\n" +
                    "By proceeding, you confirm that you are:\n" +
                    "• Using this for legitimate educational/research purposes\n" +
                    "• Developing defensive cybersecurity capabilities\n" +
                    "• Not intending to cause harm or unauthorized access\n\n" +
                    "Do you wish to continue?"
                );
                
                if (confirmed) {
                    element.classList.add('revealed');
                    warning.style.display = 'none';
                    
                    // Animate reveal
                    gsap.from(element, {
                        scale: 0.95,
                        opacity: 0.8,
                        duration: 0.5,
                        ease: "power2.out"
                    });
                }
            }
        }
    }

    // Initialize everything
    document.addEventListener('DOMContentLoaded', function() {
        createNetworkNodes();
        initAnimations();
        
        // Add click handlers
        const blurredElements = document.querySelectorAll('.blur-sensitive');
        blurredElements.forEach(element => {
            element.addEventListener('click', function() {
                const id = this.id;
                if (id) {
                    toggleBlur(id);
                }
            });
        });

        // Magnetic button effects
        const magneticBtns = document.querySelectorAll('.magnetic-btn');
        magneticBtns.forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    scale: 1.05,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });

            btn.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    scale: 1,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });
        });

        console.log('🚀 RAT Prototype Network Initialized');
        console.log('🔮 Neural pathways active');
        console.log('🛡️ Educational framework loaded');
    });
</script>
@endsection
