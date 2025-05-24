@extends('layouts.nexus')

@section('title', 'NEXUS - Network Security | Cybersecurity Fundamentals')

@push('styles')
<style>
    /* Network Security Specific Styles */
    .network-container {
        background: linear-gradient(135deg, rgba(123, 31, 162, 0.1), rgba(168, 85, 247, 0.1));
        border: 2px solid rgba(168, 85, 247, 0.3);
        backdrop-filter: blur(20px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .network-container:hover {
        border-color: #a855f7;
        box-shadow: 
            0 25px 50px rgba(168, 85, 247, 0.4),
            0 15px 30px rgba(123, 31, 162, 0.3);
        transform: translateY(-5px);
    }

    .protocol-card {
        background: linear-gradient(135deg, rgba(168, 85, 247, 0.1), rgba(123, 31, 162, 0.1));
        border: 1px solid rgba(168, 85, 247, 0.2);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .protocol-card::before {
        content: '';
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(168, 85, 247, 0.1), transparent);
        transition: top 0.5s ease;
    }

    .protocol-card:hover::before {
        top: 100%;
    }

    .protocol-card:hover {
        border-color: #a855f7;
        transform: scale(1.05);
        box-shadow: 0 15px 30px rgba(168, 85, 247, 0.3);
    }

    .firewall-demo {
        background: linear-gradient(45deg, rgba(168, 85, 247, 0.05), rgba(123, 31, 162, 0.05));
        border: 1px solid rgba(168, 85, 247, 0.2);
        padding: 2rem;
        border-radius: 1rem;
        margin: 2rem 0;
    }

    .traffic-analyzer {
        background: linear-gradient(135deg, rgba(168, 85, 247, 0.1), rgba(236, 72, 153, 0.1));
        border: 1px solid rgba(168, 85, 247, 0.3);
        padding: 1.5rem;
        border-radius: 1rem;
        position: relative;
    }

    .packet-flow {
        animation: packetMove 3s infinite linear;
    }

    @keyframes packetMove {
        0% { transform: translateX(-100%); opacity: 0; }
        50% { opacity: 1; }
        100% { transform: translateX(100%); opacity: 0; }
    }

    .network-topology {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 2rem 0;
        position: relative;
    }

    .network-node {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #a855f7, #7c3aed);
        box-shadow: 0 10px 20px rgba(168, 85, 247, 0.3);
        transition: all 0.3s ease;
        position: relative;
        z-index: 2;
    }

    .network-node:hover {
        transform: scale(1.1);
        box-shadow: 0 15px 30px rgba(168, 85, 247, 0.5);
    }

    .connection-line {
        position: absolute;
        top: 50%;
        left: 10%;
        right: 10%;
        height: 2px;
        background: linear-gradient(90deg, #a855f7, #7c3aed, #a855f7);
        z-index: 1;
        animation: dataFlow 2s infinite ease-in-out;
    }

    @keyframes dataFlow {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 1; }
    }

    .security-tool {
        background: linear-gradient(135deg, rgba(168, 85, 247, 0.1), rgba(59, 130, 246, 0.1));
        border: 1px solid rgba(168, 85, 247, 0.2);
        padding: 1.5rem;
        border-radius: 1rem;
        transition: all 0.3s ease;
    }

    .security-tool:hover {
        border-color: #a855f7;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(168, 85, 247, 0.2);
    }

    .vulnerability-scanner {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(168, 85, 247, 0.1));
        border: 1px solid rgba(239, 68, 68, 0.3);
        padding: 1.5rem;
        border-radius: 1rem;
        margin: 1rem 0;
    }

    .scan-progress {
        width: 100%;
        height: 8px;
        background: rgba(168, 85, 247, 0.2);
        border-radius: 4px;
        overflow: hidden;
        margin: 1rem 0;
    }

    .scan-bar {
        height: 100%;
        background: linear-gradient(90deg, #a855f7, #7c3aed);
        border-radius: 4px;
        animation: scanning 3s infinite ease-in-out;
    }

    @keyframes scanning {
        0% { width: 0%; }
        50% { width: 70%; }
        100% { width: 100%; }
    }

    .intrusion-alert {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(249, 115, 22, 0.1));
        border: 1px solid rgba(239, 68, 68, 0.3);
        padding: 1rem;
        border-radius: 0.5rem;
        margin: 0.5rem 0;
        animation: alertPulse 2s infinite ease-in-out;
    }

    @keyframes alertPulse {
        0%, 100% { border-color: rgba(239, 68, 68, 0.3); }
        50% { border-color: rgba(239, 68, 68, 0.8); }
    }

    .back-btn {
        background: linear-gradient(135deg, #6b7280, #4b5563);
        border: none;
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: linear-gradient(135deg, #4b5563, #374151);
        transform: translateX(-5px);
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-violet-900 relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-bounce"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-bounce animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('nexus.first-semester') }}" class="back-btn px-6 py-3 rounded-lg text-white font-semibold flex items-center space-x-2 hover:bg-gray-600 inline-flex">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Overview</span>
            </a>
        </div>

        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-7xl font-black mb-6">
                <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-indigo-400 bg-clip-text text-transparent">
                    NETWORK SECURITY
                </span>
            </h1>
            <p class="text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed mb-8">
                Master network protocols, firewall configuration, intrusion detection systems, and advanced traffic analysis techniques. 
                Build robust network defense mechanisms against modern cyber threats.
            </p>
            <div class="flex items-center justify-center space-x-6 text-purple-400">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-shield-alt text-2xl"></i>
                    <span class="font-semibold">Firewall Configuration</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-search text-2xl"></i>
                    <span class="font-semibold">Traffic Analysis</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-bug text-2xl"></i>
                    <span class="font-semibold">Intrusion Detection</span>
                </div>
            </div>
        </div>

        <!-- Network Topology Visualization -->
        <div class="network-container rounded-2xl p-8 mb-12">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">
                <i class="fas fa-network-wired text-purple-400 mr-3"></i>
                Network Security Architecture
            </h2>
            
            <div class="network-topology">
                <div class="connection-line"></div>
                
                <div class="network-node" title="Client">
                    <i class="fas fa-laptop text-white text-2xl"></i>
                </div>
                
                <div class="network-node" title="Firewall">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                
                <div class="network-node" title="IDS/IPS">
                    <i class="fas fa-search text-white text-2xl"></i>
                </div>
                
                <div class="network-node" title="Server">
                    <i class="fas fa-server text-white text-2xl"></i>
                </div>
            </div>
            
            <p class="text-gray-300 text-center mt-6">
                Interactive network topology showing the flow of data through security layers
            </p>
        </div>

        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-2 gap-12 mb-12">
            <!-- Network Protocols Section -->
            <div class="space-y-8">
                <h2 class="text-3xl font-bold text-white mb-6">
                    <i class="fas fa-ethernet text-purple-400 mr-3"></i>
                    Network Protocols
                </h2>
                
                <div class="grid gap-6">
                    <div class="protocol-card rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-globe text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">TCP/IP Protocol Suite</h3>
                                <p class="text-purple-300 text-sm">Transport & Network Layer Security</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-sm">
                            Understanding TCP/IP stack vulnerabilities, packet structure analysis, and secure communication protocols.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs">TCP</span>
                            <span class="px-3 py-1 bg-pink-500/20 text-pink-300 rounded-full text-xs">IP</span>
                            <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-xs">UDP</span>
                        </div>
                    </div>

                    <div class="protocol-card rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-lock text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">SSL/TLS Encryption</h3>
                                <p class="text-green-300 text-sm">Secure Socket Layer Protection</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-sm">
                            Implementation and analysis of SSL/TLS protocols for secure web communications and certificate management.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-xs">HTTPS</span>
                            <span class="px-3 py-1 bg-teal-500/20 text-teal-300 rounded-full text-xs">Certificates</span>
                            <span class="px-3 py-1 bg-emerald-500/20 text-emerald-300 rounded-full text-xs">PKI</span>
                        </div>
                    </div>

                    <div class="protocol-card rounded-xl p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-key text-white text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">VPN Protocols</h3>
                                <p class="text-blue-300 text-sm">Virtual Private Network Security</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-sm">
                            Configuration and management of VPN tunnels, IPSec, OpenVPN, and WireGuard for secure remote access.
                        </p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs">IPSec</span>
                            <span class="px-3 py-1 bg-cyan-500/20 text-cyan-300 rounded-full text-xs">OpenVPN</span>
                            <span class="px-3 py-1 bg-sky-500/20 text-sky-300 rounded-full text-xs">WireGuard</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Firewall Configuration Section -->
            <div class="space-y-8">
                <h2 class="text-3xl font-bold text-white mb-6">
                    <i class="fas fa-shield-alt text-purple-400 mr-3"></i>
                    Firewall Configuration
                </h2>
                
                <div class="firewall-demo">
                    <h3 class="text-xl font-bold text-white mb-4">Interactive Firewall Rules</h3>
                    <div class="space-y-4">
                        <div class="bg-gray-800/50 rounded-lg p-4 border border-purple-500/30">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-white font-semibold">Rule #1: Block Suspicious Traffic</span>
                                <span class="px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-sm">DENY</span>
                            </div>
                            <p class="text-gray-300 text-sm">Source: 192.168.1.0/24 → Destination: ANY → Port: 445 (SMB)</p>
                        </div>
                        
                        <div class="bg-gray-800/50 rounded-lg p-4 border border-purple-500/30">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-white font-semibold">Rule #2: Allow HTTPS Traffic</span>
                                <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-sm">ALLOW</span>
                            </div>
                            <p class="text-gray-300 text-sm">Source: ANY → Destination: WEB_SERVERS → Port: 443 (HTTPS)</p>
                        </div>
                        
                        <div class="bg-gray-800/50 rounded-lg p-4 border border-purple-500/30">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-white font-semibold">Rule #3: Log SSH Attempts</span>
                                <span class="px-3 py-1 bg-yellow-500/20 text-yellow-300 rounded-full text-sm">LOG</span>
                            </div>
                            <p class="text-gray-300 text-sm">Source: ANY → Destination: SERVERS → Port: 22 (SSH)</p>
                        </div>
                    </div>
                </div>

                <div class="security-tool">
                    <h3 class="text-xl font-bold text-white mb-4">
                        <i class="fas fa-cogs text-purple-400 mr-2"></i>
                        Advanced Firewall Features
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-filter text-purple-400"></i>
                            </div>
                            <h4 class="text-white font-semibold text-sm">Packet Filtering</h4>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-chart-line text-purple-400"></i>
                            </div>
                            <h4 class="text-white font-semibold text-sm">Traffic Monitoring</h4>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-shield-virus text-purple-400"></i>
                            </div>
                            <h4 class="text-white font-semibold text-sm">DPI Analysis</h4>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-ban text-purple-400"></i>
                            </div>
                            <h4 class="text-white font-semibold text-sm">IP Blacklisting</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Traffic Analysis Section -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">
                <i class="fas fa-chart-line text-purple-400 mr-3"></i>
                Network Traffic Analysis
            </h2>
            
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="traffic-analyzer">
                    <h3 class="text-xl font-bold text-white mb-4">
                        <i class="fas fa-eye text-purple-400 mr-2"></i>
                        Real-time Monitoring
                    </h3>
                    <div class="packet-flow bg-purple-500/20 h-2 rounded-full mb-4"></div>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between text-gray-300">
                            <span>Packets/sec:</span>
                            <span class="text-purple-300 font-semibold">1,247</span>
                        </div>
                        <div class="flex justify-between text-gray-300">
                            <span>Bandwidth:</span>
                            <span class="text-purple-300 font-semibold">45.2 Mbps</span>
                        </div>
                        <div class="flex justify-between text-gray-300">
                            <span>Connections:</span>
                            <span class="text-purple-300 font-semibold">156 Active</span>
                        </div>
                    </div>
                </div>

                <div class="traffic-analyzer">
                    <h3 class="text-xl font-bold text-white mb-4">
                        <i class="fas fa-microscope text-purple-400 mr-2"></i>
                        Deep Packet Inspection
                    </h3>
                    <div class="space-y-3">
                        <div class="bg-gray-800/50 rounded p-3 border border-purple-500/30">
                            <div class="text-white font-semibold text-sm">HTTP Request Detected</div>
                            <div class="text-gray-400 text-xs">GET /api/data → 192.168.1.100</div>
                        </div>
                        <div class="bg-gray-800/50 rounded p-3 border border-red-500/30">
                            <div class="text-red-300 font-semibold text-sm">Suspicious Pattern</div>
                            <div class="text-gray-400 text-xs">Port scan from 10.0.0.15</div>
                        </div>
                    </div>
                </div>

                <div class="traffic-analyzer">
                    <h3 class="text-xl font-bold text-white mb-4">
                        <i class="fas fa-chart-pie text-purple-400 mr-2"></i>
                        Protocol Distribution
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 text-sm">HTTPS</span>
                            <div class="flex-1 mx-3 bg-gray-700 rounded-full h-2">
                                <div class="bg-purple-500 h-2 rounded-full" style="width: 65%"></div>
                            </div>
                            <span class="text-purple-300 text-sm">65%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 text-sm">DNS</span>
                            <div class="flex-1 mx-3 bg-gray-700 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 20%"></div>
                            </div>
                            <span class="text-blue-300 text-sm">20%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-300 text-sm">Other</span>
                            <div class="flex-1 mx-3 bg-gray-700 rounded-full h-2">
                                <div class="bg-pink-500 h-2 rounded-full" style="width: 15%"></div>
                            </div>
                            <span class="text-pink-300 text-sm">15%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Intrusion Detection Section -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">
                <i class="fas fa-shield-virus text-purple-400 mr-3"></i>
                Intrusion Detection & Prevention
            </h2>
            
            <div class="grid lg:grid-cols-2 gap-8">
                <div class="vulnerability-scanner">
                    <h3 class="text-xl font-bold text-white mb-4">
                        <i class="fas fa-search text-red-400 mr-2"></i>
                        Vulnerability Scanner
                    </h3>
                    <p class="text-gray-300 mb-4">Scanning network for potential security vulnerabilities...</p>
                    
                    <div class="scan-progress">
                        <div class="scan-bar"></div>
                    </div>
                    
                    <div class="space-y-2 mt-4">
                        <div class="intrusion-alert">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-exclamation-triangle text-red-400 mr-2"></i>
                                    <span class="text-white font-semibold">Critical: Open SMB Port</span>
                                </div>
                                <span class="text-red-300 text-sm">CVE-2023-XXXX</span>
                            </div>
                        </div>
                        
                        <div class="intrusion-alert">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fas fa-info-circle text-yellow-400 mr-2"></i>
                                    <span class="text-white font-semibold">Medium: Outdated SSL Certificate</span>
                                </div>
                                <span class="text-yellow-300 text-sm">Expires Soon</span>
                            </div>
                        </div>
                        
                        <div class="bg-gray-800/50 rounded p-3 border border-green-500/30">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-400 mr-2"></i>
                                <span class="text-white font-semibold">Firewall: Active & Updated</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="security-tool">
                        <h3 class="text-xl font-bold text-white mb-4">
                            <i class="fas fa-robot text-purple-400 mr-2"></i>
                            AI-Powered Threat Detection
                        </h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-800/50 rounded p-4 text-center">
                                <i class="fas fa-brain text-purple-400 text-2xl mb-2"></i>
                                <h4 class="text-white font-semibold">Machine Learning</h4>
                                <p class="text-gray-300 text-sm">Behavioral analysis</p>
                            </div>
                            <div class="bg-gray-800/50 rounded p-4 text-center">
                                <i class="fas fa-fingerprint text-blue-400 text-2xl mb-2"></i>
                                <h4 class="text-white font-semibold">Signature Matching</h4>
                                <p class="text-gray-300 text-sm">Known threat patterns</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="security-tool">
                        <h3 class="text-xl font-bold text-white mb-4">
                            <i class="fas fa-bolt text-purple-400 mr-2"></i>
                            Incident Response
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-sm font-bold">1</span>
                                </div>
                                <span class="text-gray-300">Threat Detection & Classification</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-sm font-bold">2</span>
                                </div>
                                <span class="text-gray-300">Automated Containment</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-sm font-bold">3</span>
                                </div>
                                <span class="text-gray-300">Recovery & Analysis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tools & Resources -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-white mb-8">
                <i class="fas fa-tools text-purple-400 mr-3"></i>
                Professional Network Security Tools
            </h2>
            
            <div class="grid md:grid-cols-4 gap-6">
                <div class="security-tool text-center">
                    <i class="fas fa-terminal text-purple-400 text-3xl mb-4"></i>
                    <h3 class="text-white font-bold mb-2">Wireshark</h3>
                    <p class="text-gray-300 text-sm">Network protocol analyzer</p>
                </div>
                
                <div class="security-tool text-center">
                    <i class="fas fa-search text-blue-400 text-3xl mb-4"></i>
                    <h3 class="text-white font-bold mb-2">Nmap</h3>
                    <p class="text-gray-300 text-sm">Network discovery scanner</p>
                </div>
                
                <div class="security-tool text-center">
                    <i class="fas fa-shield-alt text-green-400 text-3xl mb-4"></i>
                    <h3 class="text-white font-bold mb-2">Snort</h3>
                    <p class="text-gray-300 text-sm">Intrusion detection system</p>
                </div>
                
                <div class="security-tool text-center">
                    <i class="fas fa-fire text-red-400 text-3xl mb-4"></i>
                    <h3 class="text-white font-bold mb-2">pfSense</h3>
                    <p class="text-gray-300 text-sm">Open source firewall</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add interactive hover effects
    const protocolCards = document.querySelectorAll('.protocol-card');
    protocolCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05) rotateY(5deg)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotateY(0deg)';
        });
    });

    // Simulate network activity
    function updateNetworkStats() {
        const packetsEl = document.querySelector('.traffic-analyzer:first-child');
        if (packetsEl) {
            const packets = Math.floor(Math.random() * 2000) + 800;
            const bandwidth = (Math.random() * 50 + 20).toFixed(1);
            const connections = Math.floor(Math.random() * 200) + 100;
            
            const statsEls = packetsEl.querySelectorAll('.text-purple-300');
            if (statsEls.length >= 3) {
                statsEls[0].textContent = packets.toLocaleString();
                statsEls[1].textContent = bandwidth + ' Mbps';
                statsEls[2].textContent = connections + ' Active';
            }
        }
    }

    // Update stats every 3 seconds
    setInterval(updateNetworkStats, 3000);

    // Add keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.key === 'h') {
            e.preventDefault();
            window.location.href = '{{ route("nexus.first-semester") }}';
        }
    });

    console.log('🌐 Network Security module loaded successfully!');
});
</script>
@endpush
