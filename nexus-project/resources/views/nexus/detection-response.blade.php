@extends('layouts.nexus')

@section('title', 'Detection & Response Systems - Nexus Project')

@push('styles')
<style>
    .detection-card {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(59, 130, 246, 0.1));
        border: 1px solid rgba(99, 102, 241, 0.3);
    }
    
    .system-badge {
        background: rgba(99, 102, 241, 0.2);
        color: #6366f1;
    }
    
    .metric-card {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9), rgba(30, 41, 59, 0.8));
        border: 1px solid rgba(99, 102, 241, 0.2);
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Hero Section -->
    <section class="pt-20 pb-16 bg-gradient-to-br from-indigo-900 via-blue-900 to-purple-900 rounded-2xl mb-12">
        <div class="px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-indigo-500/20 rounded-full text-indigo-300 text-sm font-medium mb-6">
                    <i class="fas fa-radar mr-2"></i>
                    Advanced Security Operations
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-indigo-400 to-blue-400 bg-clip-text text-transparent">
                    Detection & Response
                </h1>
                <h2 class="text-3xl md:text-4xl font-semibold mb-6 text-white">
                    Comprehensive Security Monitoring
                </h2>
                <p class="text-xl md:text-2xl text-gray-300 max-w-4xl mx-auto">
                    Advanced threat detection systems, incident response protocols, and automated security monitoring solutions for comprehensive cybersecurity defense strategies
                </p>
            </div>
        </div>
    </section>

    <!-- Detection Systems -->
    <section class="py-12 mb-12">
        <div class="grid lg:grid-cols-2 gap-12">
            <div>
                <h2 class="text-3xl font-bold text-white mb-8">Detection Technologies</h2>
                <div class="space-y-6">
                    <div class="detection-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-indigo-400 mb-3">
                            <i class="fas fa-chart-line mr-2"></i>
                            SIEM Systems
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Security Information and Event Management platforms for centralized 
                            log analysis, correlation, and real-time threat detection across enterprise environments.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="system-badge px-3 py-1 rounded-full text-xs font-medium">Log Correlation</span>
                            <span class="system-badge px-3 py-1 rounded-full text-xs font-medium">Real-time Analysis</span>
                            <span class="system-badge px-3 py-1 rounded-full text-xs font-medium">Threat Intelligence</span>
                        </div>
                    </div>
                    
                    <div class="detection-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-blue-400 mb-3">
                            <i class="fas fa-search mr-2"></i>
                            Behavioral Analytics
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Advanced behavioral analysis systems using machine learning to detect 
                            anomalous activities and zero-day threats through pattern recognition.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="system-badge px-3 py-1 rounded-full text-xs font-medium">ML Detection</span>
                            <span class="system-badge px-3 py-1 rounded-full text-xs font-medium">Anomaly Detection</span>
                            <span class="system-badge px-3 py-1 rounded-full text-xs font-medium">User Analytics</span>
                        </div>
                    </div>
                    
                    <div class="detection-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-purple-400 mb-3">
                            <i class="fas fa-network-wired mr-2"></i>
                            Network Detection
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Network-based detection systems for monitoring traffic patterns, 
                            identifying malicious communications, and detecting lateral movement.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="system-badge px-3 py-1 rounded-full text-xs font-medium">Traffic Analysis</span>
                            <span class="system-badge px-3 py-1 rounded-full text-xs font-medium">DPI</span>
                            <span class="system-badge px-3 py-1 rounded-full text-xs font-medium">Flow Monitoring</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <h2 class="text-3xl font-bold text-white mb-8">Response Capabilities</h2>
                <div class="space-y-6">
                    <div class="detection-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-indigo-400 mb-3">
                            <i class="fas fa-robot mr-2"></i>
                            Automated Response
                        </h3>
                        <p class="text-gray-300 mb-4">
                            SOAR (Security Orchestration, Automation & Response) platforms enabling 
                            rapid automated response to security incidents and threat containment.
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-ban text-indigo-400 mr-3"></i>
                                Automatic threat isolation
                            </div>
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-shield-alt text-blue-400 mr-3"></i>
                                Firewall rule deployment
                            </div>
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-user-lock text-purple-400 mr-3"></i>
                                Account lockdown procedures
                            </div>
                        </div>
                    </div>
                    
                    <div class="detection-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-blue-400 mb-3">
                            <i class="fas fa-users mr-2"></i>
                            Incident Response
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Structured incident response processes with defined roles, escalation 
                            procedures, and communication protocols for effective threat management.
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-clipboard-list text-indigo-400 mr-3"></i>
                                Incident classification
                            </div>
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-phone text-blue-400 mr-3"></i>
                                Escalation procedures
                            </div>
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-file-alt text-purple-400 mr-3"></i>
                                Documentation standards
                            </div>
                        </div>
                    </div>
                    
                    <div class="detection-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-purple-400 mb-3">
                            <i class="fas fa-search-plus mr-2"></i>
                            Threat Hunting
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Proactive threat hunting methodologies for discovering advanced persistent 
                            threats and sophisticated attacks that evade automated detection.
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-bullseye text-indigo-400 mr-3"></i>
                                Hypothesis-driven hunting
                            </div>
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-chart-bar text-blue-400 mr-3"></i>
                                Statistical analysis
                            </div>
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-crosshairs text-purple-400 mr-3"></i>
                                IOC development
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- System Metrics -->
    <section class="py-12 bg-gray-800/30 rounded-2xl mb-12">
        <div class="px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">System Performance Metrics</h2>
                <p class="text-gray-300">
                    Real-time monitoring and response effectiveness measurements
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="metric-card rounded-lg p-6 text-center">
                    <div class="text-3xl font-bold text-indigo-400 mb-2">99.7%</div>
                    <div class="text-gray-300 text-sm mb-3">Detection Rate</div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-indigo-400 h-2 rounded-full" style="width: 99.7%"></div>
                    </div>
                </div>
                
                <div class="metric-card rounded-lg p-6 text-center">
                    <div class="text-3xl font-bold text-blue-400 mb-2">2.3s</div>
                    <div class="text-gray-300 text-sm mb-3">Avg Response Time</div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-blue-400 h-2 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
                
                <div class="metric-card rounded-lg p-6 text-center">
                    <div class="text-3xl font-bold text-purple-400 mb-2">0.02%</div>
                    <div class="text-gray-300 text-sm mb-3">False Positive Rate</div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-purple-400 h-2 rounded-full" style="width: 2%"></div>
                    </div>
                </div>
                
                <div class="metric-card rounded-lg p-6 text-center">
                    <div class="text-3xl font-bold text-cyan-400 mb-2">24/7</div>
                    <div class="text-gray-300 text-sm mb-3">Monitoring Coverage</div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-cyan-400 h-2 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
            </div>
            
            <!-- Detection Timeline -->
            <div class="bg-gray-900/50 rounded-lg p-6">
                <h3 class="text-xl font-bold text-white mb-6 text-center">Incident Detection & Response Timeline</h3>
                <div class="flex items-center justify-between relative">
                    <div class="absolute top-1/2 left-0 w-full h-0.5 bg-gray-600 -z-10"></div>
                    
                    <div class="flex flex-col items-center bg-gray-800 rounded-lg p-4 z-10">
                        <div class="w-12 h-12 bg-indigo-500 rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                        <div class="text-white font-semibold text-sm">Threat Detected</div>
                        <div class="text-indigo-400 text-xs">T+0s</div>
                    </div>
                    
                    <div class="flex flex-col items-center bg-gray-800 rounded-lg p-4 z-10">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-bell text-white"></i>
                        </div>
                        <div class="text-white font-semibold text-sm">Alert Generated</div>
                        <div class="text-blue-400 text-xs">T+0.5s</div>
                    </div>
                    
                    <div class="flex flex-col items-center bg-gray-800 rounded-lg p-4 z-10">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-cogs text-white"></i>
                        </div>
                        <div class="text-white font-semibold text-sm">Analysis Started</div>
                        <div class="text-purple-400 text-xs">T+1.2s</div>
                    </div>
                    
                    <div class="flex flex-col items-center bg-gray-800 rounded-lg p-4 z-10">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-shield-alt text-white"></i>
                        </div>
                        <div class="text-white font-semibold text-sm">Response Initiated</div>
                        <div class="text-green-400 text-xs">T+2.3s</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Research Impact -->
    <section class="py-12 mb-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4">Research Contributions</h2>
            <p class="text-gray-300">
                How advanced detection and response systems enhance cybersecurity posture
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-radar text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-3">Proactive Detection</h3>
                <p class="text-gray-300 text-sm">
                    Advanced detection systems identify threats before they can cause significant damage to organizational assets.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bolt text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-3">Rapid Response</h3>
                <p class="text-gray-300 text-sm">
                    Automated response capabilities significantly reduce incident response times and minimize attack impact.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-3">Continuous Improvement</h3>
                <p class="text-gray-300 text-sm">
                    Machine learning and threat intelligence integration enable constantly evolving defense capabilities.
                </p>
            </div>
        </div>
    </section>

    <!-- Back to Second Semester -->
    <section class="py-12 bg-gray-800/30 rounded-lg text-center">
        <a href="{{ route('nexus.second-semester') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-arrow-left mr-3"></i>
            Back to Second Semester
        </a>
    </section>
</div>
@endsection
