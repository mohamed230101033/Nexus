@extends('layouts.nexus')

@section('title', 'Core Ransomware Research - Nexus Project')

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
        background: rgba(220, 38, 38, 0.1);
        border: 2px dashed #dc2626;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #dc2626;
        backdrop-filter: blur(2px);
    }
    
    .code-container {
        position: relative;
    }
    
    .educational-note {
        background: linear-gradient(135deg, #1e40af 0%, #7c3aed 100%);
        border-left: 4px solid #3b82f6;
    }
    
    .danger-note {
        background: linear-gradient(135deg, #dc2626 0%, #ea580c 100%);
        border-left: 4px solid #ef4444;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Hero Section -->
    <section class="pt-20 pb-16 bg-gradient-to-br from-red-900 via-orange-900 to-yellow-900 rounded-2xl mb-12">
        <div class="px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-red-500/20 rounded-full text-red-300 text-sm font-medium mb-6">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Educational Research Only
                </div>                <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-red-400 to-orange-400 bg-clip-text text-transparent">
                    Malcore.py
                </h1>
                <h2 class="text-3xl md:text-4xl font-semibold mb-6 text-white">
                    Python-Based PoC Ransomware Analysis
                </h2>
                <p class="text-xl md:text-2xl text-gray-300 max-w-4xl mx-auto">
                    Comprehensive documentation of a Python-based proof-of-concept ransomware implementation featuring AES-256 encryption, Flask C2 server, and advanced persistence mechanisms
                </p>
            </div>
        </div>
    </section>

    <!-- Warning Banner -->
    <section class="py-8 bg-red-900/30 border-y border-red-500/30 rounded-lg mb-12">
        <div class="px-8">
            <div class="danger-note rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-exclamation-triangle text-yellow-400 text-2xl mr-4"></i>
                    <h3 class="text-xl font-bold text-white">Important Disclaimer</h3>
                </div>                <p class="text-gray-200 mb-3">
                    This research analyzes the "malcore.py" proof-of-concept ransomware implementation, developed exclusively for educational purposes and cybersecurity defense research. 
                    All code examples have been sanitized and modified to prevent malicious use.
                </p>
                <ul class="text-gray-200 space-y-1">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Sensitive functions are blurred or replaced</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>No functional malicious code is provided</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Focus on understanding and prevention</li>
                </ul>
            </div>
        </div>
    </section>    <!-- Malcore.py Overview -->
    <section class="py-12 mb-12">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Left Column: Overview -->
            <div>
                <h2 class="text-3xl font-bold text-white mb-8">Malcore.py Overview</h2>
                
                <div class="space-y-6">
                    <div class="bg-gray-800/50 rounded-lg p-6 border border-red-500/30">
                        <h3 class="text-xl font-semibold text-red-400 mb-3">
                            <i class="fas fa-code mr-2"></i>
                            Python Implementation
                        </h3>
                        <p class="text-gray-300">
                            A sophisticated proof-of-concept ransomware written in Python, demonstrating modern 
                            cryptographic techniques and evasion methods used by real-world threats.
                        </p>
                    </div>
                    
                    <div class="bg-gray-800/50 rounded-lg p-6 border border-orange-500/30">
                        <h3 class="text-xl font-semibold text-orange-400 mb-3">
                            <i class="fas fa-lock mr-2"></i>
                            AES-256 Encryption Engine
                        </h3>
                        <p class="text-gray-300">
                            Implements military-grade AES-256-CBC encryption with PBKDF2 key derivation, 
                            providing cryptographically secure file encryption capabilities.
                        </p>
                    </div>
                    
                    <div class="bg-gray-800/50 rounded-lg p-6 border border-purple-500/30">
                        <h3 class="text-xl font-semibold text-purple-400 mb-3">
                            <i class="fas fa-server mr-2"></i>
                            Flask C2 Infrastructure
                        </h3>
                        <p class="text-gray-300">
                            Features a lightweight Flask-based command and control server for key management, 
                            victim tracking, and operational coordination.
                        </p>
                    </div>

                    <div class="bg-gray-800/50 rounded-lg p-6 border border-blue-500/30">
                        <h3 class="text-xl font-semibold text-blue-400 mb-3">
                            <i class="fas fa-cogs mr-2"></i>
                            Advanced Persistence
                        </h3>
                        <p class="text-gray-300">
                            Employs multiple persistence mechanisms including registry modifications, 
                            scheduled tasks, and startup folder placement for sustained access.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Right Column: Technical Features -->
            <div>
                <h2 class="text-3xl font-bold text-white mb-8">Technical Features</h2>
                
                <div class="bg-gray-800/30 rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-semibold text-white mb-4">Core Capabilities</h3>
                    <div class="space-y-3">
                        <div class="flex items-center p-3 bg-red-900/20 rounded">
                            <i class="fas fa-file-code text-red-400 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">Aggressive File Encryption</div>
                                <div class="text-gray-400 text-sm">Targets 150+ file extensions with parallel processing</div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-orange-900/20 rounded">
                            <i class="fas fa-network-wired text-orange-400 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">C2 Communication</div>
                                <div class="text-gray-400 text-sm">RESTful API for key exchange and victim management</div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-purple-900/20 rounded">
                            <i class="fas fa-shield-alt text-purple-400 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">Anti-Analysis Features</div>
                                <div class="text-gray-400 text-sm">VM detection, debugger evasion, and sandbox awareness</div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-blue-900/20 rounded">
                            <i class="fas fa-clock text-blue-400 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">Persistence Layer</div>
                                <div class="text-gray-400 text-sm">Multi-vector persistence across Windows environments</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-800/30 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-white mb-4">Target Scope</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-red-900/20 p-3 rounded">
                            <div class="text-red-300 font-medium text-sm mb-1">Documents</div>
                            <div class="text-gray-400 text-xs">.doc, .pdf, .txt, .xlsx</div>
                        </div>
                        <div class="bg-orange-900/20 p-3 rounded">
                            <div class="text-orange-300 font-medium text-sm mb-1">Media Files</div>
                            <div class="text-gray-400 text-xs">.jpg, .png, .mp4, .mp3</div>
                        </div>
                        <div class="bg-yellow-900/20 p-3 rounded">
                            <div class="text-yellow-300 font-medium text-sm mb-1">Archives</div>
                            <div class="text-gray-400 text-xs">.zip, .rar, .7z, .tar</div>
                        </div>
                        <div class="bg-green-900/20 p-3 rounded">
                            <div class="text-green-300 font-medium text-sm mb-1">Databases</div>
                            <div class="text-gray-400 text-xs">.db, .sql, .mdb, .accdb</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Code Analysis Section -->
    <section class="py-12 bg-gray-800/30 rounded-2xl mb-12">
        <div class="px-8">            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-6">Malcore.py Code Analysis</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    Detailed analysis of the malcore.py implementation (sensitive components sanitized for educational safety)
                </p>
            </div>
            
            <!-- Encryption Implementation -->
            <div class="mb-12">
                <div class="educational-note rounded-lg p-6 mb-6">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-graduation-cap text-blue-300 text-xl mr-3"></i>
                        <h3 class="text-lg font-bold text-white">Educational Code Example</h3>
                    </div>                    <p class="text-blue-100">
                        The following code demonstrates the core structure of malcore.py, a Python-based ransomware PoC. 
                        Critical functions are intentionally sanitized to prevent misuse while maintaining educational value.
                    </p>
                </div>
                
                <div class="code-container bg-gray-900 rounded-lg overflow-hidden border border-gray-700">                    <div class="bg-gray-800 px-6 py-3 border-b border-gray-700">
                        <div class="flex items-center justify-between">
                            <h4 class="text-white font-semibold">malcore.py - Core Implementation</h4>
                            <div class="flex space-x-2">
                                <button onclick="toggleBlur('encryption-code')" class="px-3 py-1 bg-yellow-600 hover:bg-yellow-700 text-white text-xs rounded transition-colors">
                                    Reveal for Study
                                </button>
                                <span class="px-3 py-1 bg-red-600 text-white text-xs rounded">Sanitized</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6">                        <pre class="blur-sensitive" id="encryption-code"><code class="language-python">#!/usr/bin/env python3
"""
MALCORE.PY - Educational Ransomware Analysis
===============================================
WARNING: This is a sanitized educational example for cybersecurity research only.
Actual malicious functions have been replaced with educational placeholders.

Author: Nexus Cybersecurity Research Team
Purpose: Understanding ransomware mechanics for defense development
Status: SANITIZED FOR EDUCATIONAL USE
"""

import os
import sys
import json
import base64
import hashlib
import threading
from pathlib import Path
from datetime import datetime

# Cryptographic imports
from Crypto.Cipher import AES
from Crypto.Random import get_random_bytes
from Crypto.Protocol.KDF import PBKDF2

# Network and persistence
import requests
import winreg
import subprocess

# === CONFIGURATION SECTION ===
class MalcoreConfig:
    """Configuration class for educational analysis"""
    
    # C2 Configuration (Educational)
    C2_SERVER = "https://[REDACTED-FOR-SAFETY].onion"
    C2_ENDPOINTS = {
        'register': '/api/v1/victim/register',
        'key_exchange': '/api/v1/crypto/exchange',
        'status_update': '/api/v1/victim/status'
    }
    
    # Encryption Parameters
    ENCRYPTION_ALGORITHM = "AES-256-CBC"
    KEY_DERIVATION = "PBKDF2-SHA256"
    ITERATIONS = 100000
    
    # Target File Extensions (150+ types)
    TARGET_EXTENSIONS = [
        # Documents
        '.txt', '.doc', '.docx', '.pdf', '.xlsx', '.pptx',
        # Media
        '.jpg', '.png', '.mp4', '.mp3', '.avi', '.mov',
        # Archives  
        '.zip', '.rar', '.7z', '.tar', '.gz',
        # Databases
        '.db', '.sql', '.mdb', '.sqlite',
        # Development
        '.py', '.js', '.html', '.css', '.php', '.cpp',
        # ... [REDACTED_138_MORE_EXTENSIONS] ...
    ]
    
    # Persistence Registry Keys
    PERSISTENCE_KEYS = [
        r"SOFTWARE\Microsoft\Windows\CurrentVersion\Run",
        r"SOFTWARE\Microsoft\Windows\CurrentVersion\RunOnce",
        # ... [ADDITIONAL_KEYS_REDACTED] ...
    ]

# === ENCRYPTION ENGINE ===
class EncryptionEngine:
    """
    Educational implementation of AES-256 encryption
    NOTE: Critical functions sanitized for safety
    """
    
    def __init__(self):
        self.master_key = None
        self.victim_id = self._generate_victim_id()
        
    def _generate_victim_id(self):
        """Generate unique victim identifier for tracking"""
        import uuid
        import platform
        
        machine_info = f"{platform.node()}-{platform.processor()}"
        victim_hash = hashlib.sha256(machine_info.encode()).hexdigest()[:16]
        return f"VICTIM_{victim_hash}"
    
    def initialize_crypto(self):
        """Initialize encryption parameters"""
        # Generate master key (educational example)
        password = f"MALCORE_{self.victim_id}_{datetime.now().timestamp()}"
        salt = get_random_bytes(32)
        
        # PBKDF2 key derivation
        self.master_key = PBKDF2(
            password.encode(),
            salt,
            dkLen=32,  # 256-bit key
            count=MalcoreConfig.ITERATIONS
        )
        
        print(f"[EDUCATIONAL] Crypto initialized for {self.victim_id}")
        return self.master_key
    
    def encrypt_file_educational(self, file_path):
        """
        Educational file encryption demonstration
        WARNING: Actual encryption logic sanitized
        """
        try:
            # [SANITIZED] In real implementation:
            # 1. Read file content
            # 2. Generate random IV
            # 3. Create AES cipher
            # 4. Encrypt with padding
            # 5. Overwrite original file
            
            print(f"[EDUCATIONAL] Would encrypt: {file_path}")
            
            # Educational simulation only
            encrypted_filename = f"{file_path}.MALCORE_ENCRYPTED"
            print(f"[SIMULATION] File would be renamed to: {encrypted_filename}")
            
            return True
            
        except Exception as e:
            print(f"[EDUCATIONAL] Encryption simulation failed: {e}")
            return False

# === COMMAND & CONTROL ===
class C2Communication:
    """
    Flask-based C2 communication handler
    Educational implementation with safety measures
    """
    
    def __init__(self, victim_id):
        self.victim_id = victim_id
        self.session = requests.Session()
        self.session.headers.update({
            'User-Agent': 'Mozilla/5.0 (Educational Research)',
            'X-Victim-ID': victim_id
        })
    
    def register_victim(self):
        """Register victim with C2 server (educational)"""
        victim_data = {
            'victim_id': self.victim_id,
            'timestamp': datetime.now().isoformat(),
            'system_info': self._collect_system_info(),
            'encryption_status': 'INITIALIZED'
        }
        
        print(f"[EDUCATIONAL] Would register victim: {json.dumps(victim_data, indent=2)}")
        # [SANITIZED] Actual C2 communication removed for safety
        return True
    
    def _collect_system_info(self):
        """Collect system information for analysis"""
        import platform
        return {
            'os': platform.system(),
            'version': platform.version(),
            'architecture': platform.architecture()[0],
            'processor': platform.processor(),
            # [SANITIZED] Additional info collection removed
        }
    
    def exchange_keys(self, public_key):
        """Key exchange with C2 server (educational)"""
        print(f"[EDUCATIONAL] Would exchange keys with C2 server")
        # [SANITIZED] Actual key exchange logic removed
        return "EDUCATIONAL_DECRYPTION_KEY"

# === PERSISTENCE LAYER ===
class PersistenceManager:
    """
    Multi-vector persistence implementation
    Educational analysis of persistence techniques
    """
    
    def __init__(self):
        self.persistence_methods = []
    
    def establish_persistence(self):
        """Establish multiple persistence vectors"""
        methods = [
            self._registry_persistence,
            self._scheduled_task_persistence,
            self._startup_folder_persistence
        ]
        
        for method in methods:
            try:
                success = method()
                if success:
                    self.persistence_methods.append(method.__name__)
                    print(f"[EDUCATIONAL] {method.__name__} analysis complete")
            except Exception as e:
                print(f"[EDUCATIONAL] {method.__name__} analysis failed: {e}")
    
    def _registry_persistence(self):
        """Analyze registry persistence techniques"""
        print("[EDUCATIONAL] Analyzing registry persistence...")
        
        # Educational demonstration of registry analysis
        for reg_key in MalcoreConfig.PERSISTENCE_KEYS:
            print(f"[ANALYSIS] Would modify registry key: {reg_key}")
            # [SANITIZED] Actual registry modification removed
        
        return True
    
    def _scheduled_task_persistence(self):
        """Analyze scheduled task persistence"""
        print("[EDUCATIONAL] Analyzing scheduled task persistence...")
        
        task_config = {
            'name': 'SystemMaintenanceTask',
            'trigger': 'Daily at startup',
            'action': 'Execute malcore payload'
        }
        
        print(f"[ANALYSIS] Would create task: {json.dumps(task_config, indent=2)}")
        # [SANITIZED] Actual task creation removed
        
        return True
    
    def _startup_folder_persistence(self):
        """Analyze startup folder persistence"""
        print("[EDUCATIONAL] Analyzing startup folder persistence...")
        
        startup_path = os.path.join(
            os.path.expanduser("~"),
            "AppData", "Roaming", "Microsoft", "Windows", "Start Menu", 
            "Programs", "Startup"
        )
        
        print(f"[ANALYSIS] Would place executable in: {startup_path}")
        # [SANITIZED] Actual file placement removed
        
        return True

# === MAIN EXECUTION FLOW ===
class MalcoreFramework:
    """
    Main framework orchestrating all components
    Educational implementation for analysis purposes
    """
    
    def __init__(self):
        self.encryption_engine = EncryptionEngine()
        self.c2_client = C2Communication(self.encryption_engine.victim_id)
        self.persistence_manager = PersistenceManager()
        
    def educational_execution_flow(self):
        """
        Educational demonstration of malware execution flow
        All actual malicious operations are sanitized
        """
        print("=" * 60)
        print("MALCORE.PY EDUCATIONAL ANALYSIS STARTING")
        print("=" * 60)
        
        # Phase 1: Initialization
        print("\n[PHASE 1] Initialization and Anti-Analysis")
        self._educational_anti_analysis()
        
        # Phase 2: C2 Communication
        print("\n[PHASE 2] Command & Control Communication")
        self.c2_client.register_victim()
        
        # Phase 3: Encryption Setup
        print("\n[PHASE 3] Encryption Engine Initialization")
        self.encryption_engine.initialize_crypto()
        
        # Phase 4: File Discovery and Encryption
        print("\n[PHASE 4] File Discovery and Encryption Simulation")
        self._educational_file_processing()
        
        # Phase 5: Persistence
        print("\n[PHASE 5] Persistence Establishment")
        self.persistence_manager.establish_persistence()
        
        # Phase 6: Ransom Note
        print("\n[PHASE 6] Ransom Note Generation")
        self._educational_ransom_note()
        
        print("\n" + "=" * 60)
        print("EDUCATIONAL ANALYSIS COMPLETE")
        print("=" * 60)
    
    def _educational_anti_analysis(self):
        """Educational anti-analysis technique demonstration"""
        print("[EDUCATIONAL] Anti-analysis techniques:")
        print("  - VM detection (educational)")
        print("  - Debugger detection (educational)")
        print("  - Sandbox evasion (educational)")
        # [SANITIZED] Actual evasion techniques removed
    
    def _educational_file_processing(self):
        """Educational file processing demonstration"""
        print("[EDUCATIONAL] File processing simulation:")
        
        # Simulate file discovery
        target_dirs = ["Documents", "Desktop", "Pictures", "Videos"]
        for directory in target_dirs:
            print(f"  - Scanning {directory} (educational)")
            
        # Simulate encryption process
        print("  - Encryption simulation for educational purposes")
        print("  - File renaming simulation")
        print("  - Metadata modification simulation")
    
    def _educational_ransom_note(self):
        """Educational ransom note analysis"""
        ransom_content = """
        === EDUCATIONAL RANSOM NOTE ANALYSIS ===
        
        This demonstrates the structure of a typical ransom note:
        
        1. Victim identification
        2. Encryption notification
        3. Payment instructions
        4. Decryption proof
        5. Warning messages
        
        [CONTENT SANITIZED FOR EDUCATIONAL PURPOSES]
        """
        
        print("[EDUCATIONAL] Ransom note structure analyzed")
        print("  - Note placement simulation")
        print("  - Desktop wallpaper change simulation")

# === EDUCATIONAL ENTRY POINT ===
if __name__ == "__main__":
    print("MALCORE.PY EDUCATIONAL FRAMEWORK")
    print("================================")
    print("This is a sanitized educational implementation.")
    print("All malicious functionality has been removed.")
    print("Purpose: Cybersecurity research and defense development")
    print()
    
    # Initialize educational framework
    malcore = MalcoreFramework()
    
    # Execute educational analysis
    malcore.educational_execution_flow()
    
    print("\nEducational analysis complete.")
    print("Use this knowledge to develop better defenses!")
</code></pre>
                        <div class="warning-overlay" id="encryption-code-warning">
                            <div class="text-center">
                                <i class="fas fa-eye-slash text-2xl mb-2"></i>
                                <div>Code Blurred for Safety</div>                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Flask C2 Server Analysis -->
            <div class="mb-12">
                <div class="educational-note rounded-lg p-6 mb-6">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-server text-blue-300 text-xl mr-3"></i>
                        <h3 class="text-lg font-bold text-white">Flask C2 Server Architecture</h3>
                    </div>
                    <p class="text-blue-100">
                        Analysis of the Flask-based command and control server component that manages victim communications, 
                        key exchange, and operational coordination. Implementation details sanitized for educational safety.
                    </p>
                </div>
                
                <div class="code-container bg-gray-900 rounded-lg overflow-hidden border border-gray-700">
                    <div class="bg-gray-800 px-6 py-3 border-b border-gray-700">
                        <div class="flex items-center justify-between">
                            <h4 class="text-white font-semibold">c2_server.py - Flask C2 Implementation</h4>
                            <div class="flex space-x-2">
                                <button onclick="toggleBlur('c2-server-code')" class="px-3 py-1 bg-purple-600 hover:bg-purple-700 text-white text-xs rounded transition-colors">
                                    Reveal for Study
                                </button>
                                <span class="px-3 py-1 bg-red-600 text-white text-xs rounded">Sanitized</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <pre class="blur-sensitive" id="c2-server-code"><code class="language-python">#!/usr/bin/env python3
"""
MALCORE C2 SERVER - Educational Analysis
========================================
Flask-based command and control server for malcore.py educational research.
All operational code sanitized for educational purposes only.
"""

from flask import Flask, request, jsonify
from datetime import datetime
import json

# === C2 SERVER CONFIGURATION ===
app = Flask(__name__)
app.config['SECRET_KEY'] = '[EDUCATIONAL_KEY_REDACTED]'

# === API ENDPOINTS ===
@app.route('/api/v1/victim/register', methods=['POST'])
def register_victim():
    """Educational victim registration endpoint"""
    data = request.get_json()
    victim_id = data.get('victim_id')
    print(f"[EDUCATIONAL] Victim registration: {victim_id}")
    return jsonify({'status': 'educational_registered'}), 200

@app.route('/api/v1/crypto/exchange', methods=['POST'])
def key_exchange():
    """Educational cryptographic key exchange"""
    data = request.get_json()
    victim_id = data.get('victim_id')
    print(f"[EDUCATIONAL] Key exchange: {victim_id}")
    return jsonify({'status': 'educational_exchange'}), 200

# === EDUCATIONAL ENTRY POINT ===
if __name__ == '__main__':
    print("MALCORE C2 SERVER - EDUCATIONAL ANALYSIS")
    print("[EDUCATIONAL] Server analysis complete!")
</code></pre>
                        <div class="warning-overlay" id="c2-server-code-warning">
                            <div class="text-center">
                                <i class="fas fa-server text-2xl mb-2"></i>
                                <div>C2 Server Code Blurred</div>
                                <div class="text-sm">Educational analysis - Click "Reveal for Study"</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Defense Strategies -->
            <div class="grid lg:grid-cols-2 gap-8">
                <div class="bg-gray-900 rounded-lg p-6 border border-green-500/30">
                    <h3 class="text-xl font-bold text-green-400 mb-4">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Defense Mechanisms
                    </h3>
                    <div class="space-y-3">
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">File System Monitoring</h4>
                            <p class="text-gray-300 text-sm">Real-time detection of suspicious file operations and encryption patterns.</p>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">Behavioral Analysis</h4>
                            <p class="text-gray-300 text-sm">Monitoring for rapid file access patterns and crypto API usage.</p>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">Backup Systems</h4>
                            <p class="text-gray-300 text-sm">Automated, isolated backup solutions for recovery capabilities.</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-900 rounded-lg p-6 border border-blue-500/30">
                    <h3 class="text-xl font-bold text-blue-400 mb-4">
                        <i class="fas fa-search mr-2"></i>
                        Detection Indicators
                    </h3>
                    <div class="space-y-3">
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">File Signatures</h4>
                            <p class="text-gray-300 text-sm">Specific file extensions and encryption headers used by ransomware.</p>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">Network Patterns</h4>
                            <p class="text-gray-300 text-sm">Command & control communication and key exchange protocols.</p>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded">
                            <h4 class="font-semibold text-white mb-2">Registry Changes</h4>
                            <p class="text-gray-300 text-sm">Persistence mechanisms and configuration storage patterns.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Research Findings -->
    <section class="py-12 mb-12">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-6">Key Research Findings</h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Important insights from our controlled analysis for improving cybersecurity defenses
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-lock text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Encryption Strength</h3>
                <p class="text-gray-300">
                    Modern ransomware uses military-grade AES-256 encryption, making decryption without keys practically impossible.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-clock text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Speed of Infection</h3>
                <p class="text-gray-300">
                    Rapid file enumeration and parallel processing allow complete system encryption in minutes.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Defense Opportunities</h3>
                <p class="text-gray-300">
                    Early detection through behavioral monitoring provides the best opportunity for prevention.
                </p>
            </div>
        </div>
    </section>

    <!-- Back to Second Semester -->
    <section class="py-12 bg-gray-800/30 rounded-lg text-center">
        <a href="{{ route('nexus.second-semester') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-700 hover:to-orange-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-arrow-left mr-3"></i>
            Back to Second Semester
        </a>
    </section>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-python.min.js"></script>

<script>
    function toggleBlur(elementId) {
        const element = document.getElementById(elementId);
        const warning = document.getElementById(elementId + '-warning');
        
        console.log('Toggle blur called for:', elementId);
        console.log('Element found:', element);
        console.log('Warning found:', warning);
        
        if (element && warning) {
            if (element.classList.contains('revealed')) {
                element.classList.remove('revealed');
                warning.style.display = 'flex';
            } else {
                // Show confirmation dialog
                const confirmed = confirm("This will reveal sanitized code for educational purposes only.\n\n" +
                    "By proceeding, you confirm that you are:\n" +
                    "• Using this for legitimate educational/research purposes\n" +
                    "• Not intending to cause harm\n" +
                    "• Understanding that this is for defense development\n\n" +
                    "Do you wish to continue?"
                );
                
                if (confirmed) {
                    element.classList.add('revealed');
                    warning.style.display = 'none';
                    
                    // Show gentle notification
                    showEducationalNotification(elementId);
                }
            }
        } else {
            console.error('Could not find element or warning overlay with ID:', elementId);
        }
    }
    
    function showEducationalNotification(elementId) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-blue-600 text-white px-6 py-4 rounded-lg shadow-lg z-50 opacity-0 transition-opacity duration-300';
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-graduation-cap mr-3"></i>
                <div>
                    <div class="font-bold">Educational Code Revealed</div>
                    <div class="text-sm">Remember: This is for defensive research only</div>
                </div>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Fade in
        setTimeout(() => {
            notification.style.opacity = '1';
        }, 100);
        
        // Fade out and remove after 4 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 4000);
    }
    
    // Add warning on page load and enhance interactions
    document.addEventListener('DOMContentLoaded', function() {
        const blurredElements = document.querySelectorAll('.blur-sensitive');
        
        blurredElements.forEach(element => {
            // Add click to reveal functionality
            element.addEventListener('click', function() {
                const id = this.id;
                if (id && !this.classList.contains('revealed')) {
                    toggleBlur(id);
                }
            });
            
            // Add hover effects for better UX
            element.addEventListener('mouseenter', function() {
                if (!this.classList.contains('revealed')) {
                    this.style.filter = 'blur(4px)';
                }
            });
            
            element.addEventListener('mouseleave', function() {
                if (!this.classList.contains('revealed')) {
                    this.style.filter = 'blur(8px)';
                }
            });
        });
        
        // Initialize syntax highlighting
        if (typeof Prism !== 'undefined') {
            Prism.highlightAll();
        }
        
        // Show initial educational warning
        setTimeout(() => {
            const initialNotification = document.createElement('div');
            initialNotification.className = 'fixed bottom-4 left-4 bg-yellow-600 text-white px-6 py-4 rounded-lg shadow-lg z-50 opacity-0 transition-opacity duration-300 max-w-md';
            initialNotification.innerHTML = `
                <div class="flex items-start">
                    <i class="fas fa-info-circle mr-3 mt-1"></i>
                    <div>
                        <div class="font-bold mb-1">Educational Content Notice</div>
                        <div class="text-sm">All code has been sanitized for educational purposes. Click "Reveal for Study" buttons to view analysis content.</div>
                        <button onclick="this.parentElement.parentElement.parentElement.remove()" class="mt-2 text-xs underline hover:no-underline">Dismiss</button>
                    </div>
                </div>
            `;
            
            document.body.appendChild(initialNotification);
            
            setTimeout(() => {
                initialNotification.style.opacity = '1';
            }, 500);        }, 1000);
    });
</script>
@endsection
