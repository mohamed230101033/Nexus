@extends('layouts.nexus')

@section('title', 'NEXUS - RAT Analysis | Remote Access Trojan Research')

@push('styles')
<style>
    /* RAT Analysis specific styling */
    .rat-card {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
        border: 3px solid rgba(168, 85, 247, 0.4);
        backdrop-filter: blur(20px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .rat-card:hover {
        border-color: #a855f7;
        box-shadow: 0 20px 50px rgba(168, 85, 247, 0.3);
        transform: translateY(-5px);
    }

    .analysis-module {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
        border: 2px solid rgba(236, 72, 153, 0.3);
        backdrop-filter: blur(10px);
        transition: all 0.4s ease;
    }

    .analysis-module:hover {
        border-color: #ec4899;
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(236, 72, 153, 0.2);
    }

    .workflow-step {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(168, 85, 247, 0.1));
        border: 1px solid rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
    }

    .workflow-step:hover {
        border-color: #3b82f6;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(168, 85, 247, 0.2));
    }

    .back-btn {
        background: linear-gradient(45deg, #374151, #4b5563);
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: linear-gradient(45deg, #4b5563, #6b7280);
        transform: translateX(-5px);
    }

    .detection-card {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(59, 130, 246, 0.1));
        border: 1px solid rgba(16, 185, 129, 0.3);
        transition: all 0.3s ease;
    }

    .detection-card:hover {
        border-color: #10b981;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(59, 130, 246, 0.2));
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Navigation Back Button -->
    <div class="mb-8">
        <a href="{{ route('nexus.first-semester') }}" class="back-btn px-6 py-3 rounded-lg text-white font-semibold flex items-center space-x-2 hover:bg-gray-600 inline-flex">
            <i class="fas fa-arrow-left"></i>
            <span>Back to First Semester</span>
        </a>
    </div>

    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-6xl font-black mb-6">
            <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-red-400 bg-clip-text text-transparent">
                RAT ANALYSIS
            </span>
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed mb-8">
            Real-world analysis of Remcos RAT: From initial infection to complete forensic investigation
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <span class="px-4 py-2 bg-purple-600/20 border border-purple-500 rounded-full text-purple-300 text-sm">
                <i class="fas fa-search-plus mr-2"></i>Behavioral Analysis
            </span>
            <span class="px-4 py-2 bg-pink-600/20 border border-pink-500 rounded-full text-pink-300 text-sm">
                <i class="fas fa-network-wired mr-2"></i>Network Communication
            </span>
            <span class="px-4 py-2 bg-red-600/20 border border-red-500 rounded-full text-red-300 text-sm">
                <i class="fas fa-bug mr-2"></i>Remote Access Trojan
            </span>
        </div>
    </div>

    <!-- Module 1: Remcos RAT Overview -->
    <div class="analysis-module rounded-2xl p-8 mb-16">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-info-circle text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-white">Remcos RAT Overview</h3>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
                <h4 class="text-purple-400 font-semibold mb-4">Malware Profile</h4>
                <div class="bg-gray-800/50 rounded-lg p-6 mb-6">
                    <ul class="text-gray-300 space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-dot-circle text-purple-400 mr-3 mt-1"></i>
                            <span><strong>Name:</strong> Remcos (Remote Control & Surveillance)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-dot-circle text-purple-400 mr-3 mt-1"></i>
                            <span><strong>Type:</strong> Commercial Remote Access Trojan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-dot-circle text-purple-400 mr-3 mt-1"></i>
                            <span><strong>First Seen:</strong> 2016</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-dot-circle text-purple-400 mr-3 mt-1"></i>
                            <span><strong>Platform:</strong> Windows</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-dot-circle text-purple-400 mr-3 mt-1"></i>
                            <span><strong>Programming:</strong> C/C++</span>
                        </li>
                    </ul>
                </div>
                
                <h4 class="text-pink-400 font-semibold mb-4">Key Capabilities</h4>
                <div class="space-y-2">
                    <div class="bg-gray-800/30 rounded-lg p-3 flex items-center">
                        <i class="fas fa-desktop text-blue-400 mr-3"></i>
                        <span class="text-gray-300 text-sm">Remote desktop access and control</span>
                    </div>
                    <div class="bg-gray-800/30 rounded-lg p-3 flex items-center">
                        <i class="fas fa-microphone text-green-400 mr-3"></i>
                        <span class="text-gray-300 text-sm">Audio recording and surveillance</span>
                    </div>
                    <div class="bg-gray-800/30 rounded-lg p-3 flex items-center">
                        <i class="fas fa-keyboard text-yellow-400 mr-3"></i>
                        <span class="text-gray-300 text-sm">Keylogging and credential theft</span>
                    </div>
                    <div class="bg-gray-800/30 rounded-lg p-3 flex items-center">
                        <i class="fas fa-download text-red-400 mr-3"></i>
                        <span class="text-gray-300 text-sm">File system manipulation</span>
                    </div>
                </div>
            </div>
            
            <div>
                <h4 class="text-red-400 font-semibold mb-4">Analysis Screenshot</h4>
                <div class="bg-gray-900/50 rounded-lg p-4 mb-4">
                    <img src="{{ asset('images/RAT/s1.png') }}" alt="Remcos RAT Analysis" class="w-full rounded-lg border border-gray-600">
                </div>
                <p class="text-gray-300 text-sm mb-6">Initial static analysis showing PE structure and entry points</p>
                
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <h5 class="text-orange-400 font-semibold mb-3">Analysis Environment</h5>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• <strong>Platform:</strong> Windows 10 VM (isolated)</li>
                        <li>• <strong>Tools:</strong> Process Hacker, Wireshark, IDA Pro</li>
                        <li>• <strong>Sample Source:</strong> Malware research repository</li>
                        <li>• <strong>Safety:</strong> Air-gapped environment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Module 2: Analysis Workflow -->
    <div class="analysis-module rounded-2xl p-8 mb-16">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-project-diagram text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-white">4-Stage Analysis Workflow</h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="workflow-step rounded-lg p-6 text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-white">1</span>
                </div>
                <h4 class="text-blue-400 font-semibold mb-3">Collection</h4>
                <ul class="text-gray-300 text-sm space-y-1">
                    <li>• Sample acquisition</li>
                    <li>• Hash verification</li>
                    <li>• Environment setup</li>
                    <li>• Tool preparation</li>
                </ul>
            </div>
            
            <div class="workflow-step rounded-lg p-6 text-center">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-white">2</span>
                </div>
                <h4 class="text-purple-400 font-semibold mb-3">Static Analysis</h4>
                <ul class="text-gray-300 text-sm space-y-1">
                    <li>• PE structure analysis</li>
                    <li>• String extraction</li>
                    <li>• Import/Export tables</li>
                    <li>• Entropy analysis</li>
                </ul>
            </div>
            
            <div class="workflow-step rounded-lg p-6 text-center">
                <div class="w-16 h-16 bg-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-white">3</span>
                </div>
                <h4 class="text-pink-400 font-semibold mb-3">Dynamic Analysis</h4>
                <ul class="text-gray-300 text-sm space-y-1">
                    <li>• Behavioral monitoring</li>
                    <li>• Network traffic capture</li>
                    <li>• Registry modifications</li>
                    <li>• Process injection</li>
                </ul>
            </div>
            
            <div class="workflow-step rounded-lg p-6 text-center">
                <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-white">4</span>
                </div>
                <h4 class="text-red-400 font-semibold mb-3">Report Generation</h4>
                <ul class="text-gray-300 text-sm space-y-1">
                    <li>• IOC compilation</li>
                    <li>• MITRE ATT&CK mapping</li>
                    <li>• Detection rules</li>
                    <li>• Mitigation strategies</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Module 3: Behavioral Analysis -->
    <div class="analysis-module rounded-2xl p-8 mb-16">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-blue-500 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-eye text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-white">Behavioral Analysis Results</h3>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
                <h4 class="text-green-400 font-semibold mb-4">Process Behavior</h4>
                <div class="bg-gray-800/50 rounded-lg p-6 mb-6">
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-cog text-blue-400 mr-3 mt-1"></i>
                            <div>
                                <p class="text-white font-medium">Process Injection</p>
                                <p class="text-gray-400 text-sm">Injects into legitimate Windows processes (explorer.exe, svchost.exe)</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-key text-yellow-400 mr-3 mt-1"></i>
                            <div>
                                <p class="text-white font-medium">Registry Persistence</p>
                                <p class="text-gray-400 text-sm">Creates autorun entries in HKEY_CURRENT_USER\Software\Microsoft\Windows\CurrentVersion\Run</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-shield-alt text-red-400 mr-3 mt-1"></i>
                            <div>
                                <p class="text-white font-medium">Defense Evasion</p>
                                <p class="text-gray-400 text-sm">Attempts to disable Windows Defender and other security products</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h4 class="text-blue-400 font-semibold mb-4">File System Activity</h4>
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• Creates configuration files in %APPDATA%</li>
                        <li>• Drops additional payloads in temp directories</li>
                        <li>• Modifies system files for persistence</li>
                        <li>• Stores captured data in encrypted format</li>
                    </ul>
                </div>
            </div>
            
            <div>
                <h4 class="text-purple-400 font-semibold mb-4">Process Analysis</h4>
                <div class="bg-gray-900/50 rounded-lg p-4 mb-4">
                    <img src="{{ asset('images/RAT/s4.png') }}" alt="Process Analysis" class="w-full rounded-lg border border-gray-600">
                </div>
                <p class="text-gray-300 text-sm mb-6">Process Hacker revealing RAT injection into legitimate Windows processes</p>
                
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <h5 class="text-orange-400 font-semibold mb-3">Key Observations</h5>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• Multiple process injections detected</li>
                        <li>• Network connections to C&C servers</li>
                        <li>• Keylogger hooks installed</li>
                        <li>• Screen capture capabilities active</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Module 4: Network Traffic Analysis -->
    <div class="analysis-module rounded-2xl p-8 mb-16">
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-network-wired text-white"></i>
            </div>
            <h3 class="text-2xl font-bold text-white">Network Traffic Analysis</h3>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
                <h4 class="text-red-400 font-semibold mb-4">Communication Patterns</h4>
                <div class="bg-gray-800/50 rounded-lg p-6 mb-6">
                    <div class="space-y-4">
                        <div class="border-l-4 border-red-500 pl-4">
                            <p class="text-white font-medium">Initial Beacon</p>
                            <p class="text-gray-400 text-sm">POST request to C&C server with system information</p>
                        </div>
                        <div class="border-l-4 border-orange-500 pl-4">
                            <p class="text-white font-medium">Command Polling</p>
                            <p class="text-gray-400 text-sm">Regular GET requests checking for new commands</p>
                        </div>
                        <div class="border-l-4 border-yellow-500 pl-4">
                            <p class="text-white font-medium">Data Exfiltration</p>
                            <p class="text-gray-400 text-sm">Encrypted data transmission using custom protocol</p>
                        </div>
                    </div>
                </div>
                
                <h4 class="text-orange-400 font-semibold mb-4">Network Indicators</h4>
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• <strong>Protocol:</strong> HTTP/HTTPS over TCP</li>
                        <li>• <strong>Ports:</strong> 80, 443, custom high ports</li>
                        <li>• <strong>Encryption:</strong> RC4 encrypted payloads</li>
                        <li>• <strong>Frequency:</strong> 30-60 second intervals</li>
                    </ul>
                </div>
            </div>
            
            <div>
                <h4 class="text-blue-400 font-semibold mb-4">Traffic Capture</h4>
                <div class="bg-gray-900/50 rounded-lg p-4 mb-4">
                    <img src="{{ asset('images/RAT/s2.png') }}" alt="Network Traffic" class="w-full rounded-lg border border-gray-600">
                </div>
                <p class="text-gray-300 text-sm mb-6">Wireshark capture showing encrypted C&C communication</p>
                
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <h5 class="text-green-400 font-semibold mb-3">C&C Infrastructure</h5>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Primary C&C:</span>
                            <span class="text-white">185.215.113.39</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Backup C&C:</span>
                            <span class="text-white">192.168.100.5</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Domain:</span>
                            <span class="text-white">update-service[.]com</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">User-Agent:</span>
                            <span class="text-white">Mozilla/5.0 (Windows NT 10.0)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detection Strategies -->
    <div class="rat-card rounded-2xl p-8 mb-16">
        <h3 class="text-2xl font-bold text-white mb-6 text-center">Detection & Defense Strategies</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h4 class="text-blue-400 font-semibold mb-4">Signature-Based Detection</h4>
                <div class="space-y-4">
                    <div class="detection-card rounded-lg p-4">
                        <h5 class="text-white font-medium mb-2">YARA Rules</h5>
                        <p class="text-gray-400 text-sm">Pattern matching for Remcos-specific strings and behaviors</p>
                    </div>
                    <div class="detection-card rounded-lg p-4">
                        <h5 class="text-white font-medium mb-2">Network Signatures</h5>
                        <p class="text-gray-400 text-sm">Snort/Suricata rules for C&C communication patterns</p>
                    </div>
                    <div class="detection-card rounded-lg p-4">
                        <h5 class="text-white font-medium mb-2">Hash-Based Detection</h5>
                        <p class="text-gray-400 text-sm">SHA256 hashes of known Remcos variants</p>
                    </div>
                </div>
            </div>
            
            <div>
                <h4 class="text-green-400 font-semibold mb-4">Heuristic Analysis</h4>
                <div class="space-y-4">
                    <div class="detection-card rounded-lg p-4">
                        <h5 class="text-white font-medium mb-2">Behavioral Monitoring</h5>
                        <p class="text-gray-400 text-sm">Process injection and keylogger behavior detection</p>
                    </div>
                    <div class="detection-card rounded-lg p-4">
                        <h5 class="text-white font-medium mb-2">Anomaly Detection</h5>
                        <p class="text-gray-400 text-sm">Unusual network traffic and system modifications</p>
                    </div>
                    <div class="detection-card rounded-lg p-4">
                        <h5 class="text-white font-medium mb-2">Machine Learning</h5>
                        <p class="text-gray-400 text-sm">AI-powered detection based on malware families</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MITRE ATT&CK Mapping -->
    <div class="rat-card rounded-2xl p-8">
        <h3 class="text-2xl font-bold text-white mb-6 text-center">MITRE ATT&CK Framework Mapping</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-800/50 rounded-lg p-6">
                <h4 class="text-red-400 font-semibold mb-4 flex items-center">
                    <i class="fas fa-crosshairs mr-2"></i>Initial Access
                </h4>
                <ul class="text-gray-300 text-sm space-y-2">
                    <li>• T1566.001 - Spearphishing Attachment</li>
                    <li>• T1566.002 - Spearphishing Link</li>
                    <li>• T1078 - Valid Accounts</li>
                </ul>
            </div>
            
            <div class="bg-gray-800/50 rounded-lg p-6">
                <h4 class="text-orange-400 font-semibold mb-4 flex items-center">
                    <i class="fas fa-anchor mr-2"></i>Persistence
                </h4>
                <ul class="text-gray-300 text-sm space-y-2">
                    <li>• T1547.001 - Registry Run Keys</li>
                    <li>• T1055 - Process Injection</li>
                    <li>• T1543.003 - Windows Service</li>
                </ul>
            </div>
            
            <div class="bg-gray-800/50 rounded-lg p-6">
                <h4 class="text-yellow-400 font-semibold mb-4 flex items-center">
                    <i class="fas fa-eye-slash mr-2"></i>Defense Evasion
                </h4>
                <ul class="text-gray-300 text-sm space-y-2">
                    <li>• T1562.001 - Disable Security Tools</li>
                    <li>• T1055 - Process Injection</li>
                    <li>• T1027 - Obfuscated Files</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add keyboard shortcuts
    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey || event.metaKey) {
            switch(event.key) {
                case '1':
                    event.preventDefault();
                    window.location.href = "{{ route('nexus.encryption') }}";
                    break;
                case '2':
                    event.preventDefault();
                    // Already on rat-analysis page
                    break;
                case '3':
                    event.preventDefault();
                    window.location.href = "{{ route('nexus.snake-keylogger') }}";
                    break;
                case '4':
                    event.preventDefault();
                    window.location.href = "{{ route('nexus.first-semester') }}#nexus-flowchart";
                    break;
                case 'h':
                    event.preventDefault();
                    window.location.href = "{{ route('nexus.first-semester') }}";
                    break;
            }
        }
    });
});
</script>
@endpush
