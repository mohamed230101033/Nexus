@extends('layouts.nexus')

@section('title', 'Evasion & Stealth Techniques - Nexus Project')

@push('styles')
<style>
    .stealth-card {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(6, 182, 212, 0.1));
        border: 1px solid rgba(16, 185, 129, 0.3);
    }
    
    .technique-badge {
        background: rgba(16, 185, 129, 0.2);
        color: #10b981;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Hero Section -->
    <section class="pt-20 pb-16 bg-gradient-to-br from-green-900 via-teal-900 to-emerald-900 rounded-2xl mb-12">
        <div class="px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-green-500/20 rounded-full text-green-300 text-sm font-medium mb-6">
                    <i class="fas fa-eye-slash mr-2"></i>
                    Defensive Research Focus
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-green-400 to-teal-400 bg-clip-text text-transparent">
                    Evasion & Stealth
                </h1>
                <h2 class="text-3xl md:text-4xl font-semibold mb-6 text-white">
                    Advanced Detection Avoidance Analysis
                </h2>
                <p class="text-xl md:text-2xl text-gray-300 max-w-4xl mx-auto">
                    Advanced research into evasion techniques, anti-analysis methods, and stealth mechanisms used by modern malware for educational defense development
                </p>
            </div>
        </div>
    </section>

    <!-- Research Areas -->
    <section class="py-12 mb-12">
        <div class="grid lg:grid-cols-2 gap-12">
            <div>
                <h2 class="text-3xl font-bold text-white mb-8">Evasion Techniques Studied</h2>
                <div class="space-y-6">
                    <div class="stealth-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-green-400 mb-3">
                            <i class="fas fa-mask mr-2"></i>
                            Code Obfuscation
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Analysis of code obfuscation techniques including encryption, packing, 
                            and metamorphic code generation for developing better detection algorithms.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="technique-badge px-3 py-1 rounded-full text-xs font-medium">Polymorphism</span>
                            <span class="technique-badge px-3 py-1 rounded-full text-xs font-medium">Encryption</span>
                            <span class="technique-badge px-3 py-1 rounded-full text-xs font-medium">Packing</span>
                        </div>
                    </div>
                    
                    <div class="stealth-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-teal-400 mb-3">
                            <i class="fas fa-bug mr-2"></i>
                            Anti-Debugging
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Study of anti-debugging and anti-analysis techniques to improve 
                            malware analysis tools and sandbox environments.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="technique-badge px-3 py-1 rounded-full text-xs font-medium">Debugger Detection</span>
                            <span class="technique-badge px-3 py-1 rounded-full text-xs font-medium">VM Evasion</span>
                        </div>
                    </div>
                    
                    <div class="stealth-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-emerald-400 mb-3">
                            <i class="fas fa-ghost mr-2"></i>
                            Persistence Methods
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Research into advanced persistence techniques and stealth mechanisms 
                            for developing comprehensive detection and removal tools.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="technique-badge px-3 py-1 rounded-full text-xs font-medium">Registry Manipulation</span>
                            <span class="technique-badge px-3 py-1 rounded-full text-xs font-medium">Service Hijacking</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <h2 class="text-3xl font-bold text-white mb-8">Defense Development</h2>
                <div class="bg-gray-800/30 rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-semibold text-white mb-4">Detection Improvements</h3>
                    <div class="space-y-4">
                        <div class="flex items-start p-4 bg-gray-900/50 rounded">
                            <i class="fas fa-search text-green-400 text-xl mr-4 mt-1"></i>
                            <div>
                                <h4 class="text-white font-medium mb-2">Behavioral Analysis</h4>
                                <p class="text-gray-300 text-sm">
                                    Developing advanced behavioral detection that focuses on actions rather than signatures.
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-gray-900/50 rounded">
                            <i class="fas fa-brain text-teal-400 text-xl mr-4 mt-1"></i>
                            <div>
                                <h4 class="text-white font-medium mb-2">Machine Learning Detection</h4>
                                <p class="text-gray-300 text-sm">
                                    Training ML models to identify evasive malware through pattern recognition.
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start p-4 bg-gray-900/50 rounded">
                            <i class="fas fa-layer-group text-emerald-400 text-xl mr-4 mt-1"></i>
                            <div>
                                <h4 class="text-white font-medium mb-2">Multi-Layer Defense</h4>
                                <p class="text-gray-300 text-sm">
                                    Implementing multiple detection layers to counter sophisticated evasion.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-800/30 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-white mb-4">Research Metrics</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-green-900/20 rounded">
                            <div class="text-2xl font-bold text-green-400">15+</div>
                            <div class="text-gray-300 text-sm">Evasion Techniques</div>
                        </div>
                        <div class="text-center p-4 bg-teal-900/20 rounded">
                            <div class="text-2xl font-bold text-teal-400">8</div>
                            <div class="text-gray-300 text-sm">Detection Methods</div>
                        </div>
                        <div class="text-center p-4 bg-emerald-900/20 rounded">
                            <div class="text-2xl font-bold text-emerald-400">95%</div>
                            <div class="text-gray-300 text-sm">Detection Rate</div>
                        </div>
                        <div class="text-center p-4 bg-cyan-900/20 rounded">
                            <div class="text-2xl font-bold text-cyan-400">24/7</div>
                            <div class="text-gray-300 text-sm">Monitoring</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Findings -->
    <section class="py-12 bg-gray-800/30 rounded-2xl mb-12">
        <div class="px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">Research Findings</h2>
                <p class="text-gray-300">
                    Critical insights for improving cybersecurity defenses against evasive malware
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-eye-slash text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-3">Advanced Evasion</h3>
                    <p class="text-gray-300 text-sm">
                        Modern malware employs sophisticated evasion techniques requiring advanced detection methods.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-3">Behavioral Focus</h3>
                    <p class="text-gray-300 text-sm">
                        Behavioral analysis proves more effective than signature-based detection for evasive threats.
                    </p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-brain text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-3">AI Integration</h3>
                    <p class="text-gray-300 text-sm">
                        Machine learning significantly improves detection rates for previously unknown evasion techniques.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Second Semester -->
    <section class="py-12 bg-gray-800/30 rounded-lg text-center">
        <a href="{{ route('nexus.second-semester') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-arrow-left mr-3"></i>
            Back to Second Semester
        </a>
    </section>
</div>
@endsection
