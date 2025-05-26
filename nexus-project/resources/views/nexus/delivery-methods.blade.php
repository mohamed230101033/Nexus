@extends('layouts.nexus')

@section('title', 'Delivery Methods Analysis - Nexus Project')

@push('styles')
<style>
    .delivery-card {
        background: linear-gradient(135deg, rgba(249, 115, 22, 0.1), rgba(239, 68, 68, 0.1));
        border: 1px solid rgba(249, 115, 22, 0.3);
    }
    
    .method-badge {
        background: rgba(249, 115, 22, 0.2);
        color: #f97316;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Hero Section -->
    <section class="pt-20 pb-16 bg-gradient-to-br from-orange-900 via-red-900 to-yellow-900 rounded-2xl mb-12">
        <div class="px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-orange-500/20 rounded-full text-orange-300 text-sm font-medium mb-6">
                    <i class="fas fa-paper-plane mr-2"></i>
                    Defense-Oriented Analysis
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-orange-400 to-red-400 bg-clip-text text-transparent">
                    Delivery Methods
                </h1>
                <h2 class="text-3xl md:text-4xl font-semibold mb-6 text-white">
                    Attack Vector Analysis & Prevention
                </h2>
                <p class="text-xl md:text-2xl text-gray-300 max-w-4xl mx-auto">
                    Comprehensive study of malware delivery mechanisms, infection vectors, and propagation techniques used in modern cyber attacks for educational defense purposes
                </p>
            </div>
        </div>
    </section>

    <!-- Delivery Mechanisms -->
    <section class="py-12 mb-12">
        <div class="grid lg:grid-cols-2 gap-12">
            <div>
                <h2 class="text-3xl font-bold text-white mb-8">Primary Delivery Vectors</h2>
                <div class="space-y-6">
                    <div class="delivery-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-orange-400 mb-3">
                            <i class="fas fa-envelope mr-2"></i>
                            Email-Based Attacks
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Analysis of phishing campaigns, malicious attachments, and social engineering 
                            techniques to develop better email security and user awareness programs.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="method-badge px-3 py-1 rounded-full text-xs font-medium">Spear Phishing</span>
                            <span class="method-badge px-3 py-1 rounded-full text-xs font-medium">Malicious PDFs</span>
                            <span class="method-badge px-3 py-1 rounded-full text-xs font-medium">Office Macros</span>
                        </div>
                    </div>
                    
                    <div class="delivery-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-red-400 mb-3">
                            <i class="fas fa-globe mr-2"></i>
                            Web-Based Exploits
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Study of drive-by downloads, exploit kits, and watering hole attacks 
                            to improve web security and browser protection mechanisms.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="method-badge px-3 py-1 rounded-full text-xs font-medium">Drive-by Downloads</span>
                            <span class="method-badge px-3 py-1 rounded-full text-xs font-medium">Exploit Kits</span>
                            <span class="method-badge px-3 py-1 rounded-full text-xs font-medium">Malvertising</span>
                        </div>
                    </div>
                    
                    <div class="delivery-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-yellow-400 mb-3">
                            <i class="fas fa-usb mr-2"></i>
                            Physical Media
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Research into USB-based attacks and removable media propagation 
                            for developing endpoint protection and device control policies.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="method-badge px-3 py-1 rounded-full text-xs font-medium">USB Autorun</span>
                            <span class="method-badge px-3 py-1 rounded-full text-xs font-medium">BadUSB</span>
                            <span class="method-badge px-3 py-1 rounded-full text-xs font-medium">CD/DVD</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <h2 class="text-3xl font-bold text-white mb-8">Advanced Techniques</h2>
                <div class="space-y-6">
                    <div class="delivery-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-orange-400 mb-3">
                            <i class="fas fa-network-wired mr-2"></i>
                            Network Propagation
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Analysis of worm-like behavior, lateral movement techniques, and 
                            network-based spreading mechanisms for network security improvement.
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-share-alt text-orange-400 mr-3"></i>
                                SMB vulnerability exploitation
                            </div>
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-wifi text-red-400 mr-3"></i>
                                Wireless network attacks
                            </div>
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-server text-yellow-400 mr-3"></i>
                                Server-to-server propagation
                            </div>
                        </div>
                    </div>
                    
                    <div class="delivery-card rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-red-400 mb-3">
                            <i class="fas fa-download mr-2"></i>
                            Supply Chain Attacks
                        </h3>
                        <p class="text-gray-300 mb-4">
                            Study of software supply chain compromises and trusted application 
                            abuse for developing verification and integrity checking systems.
                        </p>
                        <div class="space-y-3">
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-code text-orange-400 mr-3"></i>
                                Compromised software updates
                            </div>
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-puzzle-piece text-red-400 mr-3"></i>
                                Third-party library infections
                            </div>
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-certificate text-yellow-400 mr-3"></i>
                                Code signing abuse
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-800/30 rounded-lg p-6 mt-6">
                    <h3 class="text-xl font-semibold text-white mb-4">Prevention Statistics</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-orange-900/20 rounded">
                            <div class="text-2xl font-bold text-orange-400">85%</div>
                            <div class="text-gray-300 text-sm">Email-based Attacks</div>
                        </div>
                        <div class="text-center p-4 bg-red-900/20 rounded">
                            <div class="text-2xl font-bold text-red-400">12%</div>
                            <div class="text-gray-300 text-sm">Web-based Exploits</div>
                        </div>
                        <div class="text-center p-4 bg-yellow-900/20 rounded">
                            <div class="text-2xl font-bold text-yellow-400">2%</div>
                            <div class="text-gray-300 text-sm">Physical Media</div>
                        </div>
                        <div class="text-center p-4 bg-orange-800/20 rounded">
                            <div class="text-2xl font-bold text-orange-300">1%</div>
                            <div class="text-gray-300 text-sm">Supply Chain</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Defense Strategies -->
    <section class="py-12 bg-gray-800/30 rounded-2xl mb-12">
        <div class="px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">Defense Implementation</h2>
                <p class="text-gray-300">
                    Multi-layered security approaches based on delivery method analysis
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gray-900/50 rounded-lg p-6 text-center">
                    <i class="fas fa-envelope-open-text text-orange-400 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-white mb-3">Email Security</h3>
                    <ul class="text-gray-300 text-sm space-y-1">
                        <li>Advanced threat protection</li>
                        <li>Attachment sandboxing</li>
                        <li>User awareness training</li>
                    </ul>
                </div>
                
                <div class="bg-gray-900/50 rounded-lg p-6 text-center">
                    <i class="fas fa-shield-alt text-red-400 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-white mb-3">Web Protection</h3>
                    <ul class="text-gray-300 text-sm space-y-1">
                        <li>Web application firewalls</li>
                        <li>Content filtering</li>
                        <li>Browser security policies</li>
                    </ul>
                </div>
                
                <div class="bg-gray-900/50 rounded-lg p-6 text-center">
                    <i class="fas fa-laptop text-yellow-400 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-white mb-3">Endpoint Control</h3>
                    <ul class="text-gray-300 text-sm space-y-1">
                        <li>Device control policies</li>
                        <li>USB port management</li>
                        <li>Application whitelisting</li>
                    </ul>
                </div>
                
                <div class="bg-gray-900/50 rounded-lg p-6 text-center">
                    <i class="fas fa-network-wired text-orange-400 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-white mb-3">Network Security</h3>
                    <ul class="text-gray-300 text-sm space-y-1">
                        <li>Network segmentation</li>
                        <li>Intrusion detection</li>
                        <li>Traffic monitoring</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Research Impact -->
    <section class="py-12 mb-12">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4">Research Impact</h2>
            <p class="text-gray-300">
                How delivery method analysis improves cybersecurity defenses
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-paper-plane text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-3">Vector Understanding</h3>
                <p class="text-gray-300 text-sm">
                    Comprehensive analysis of attack vectors enables targeted defense strategies and improved security postures.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-3">Prevention Focus</h3>
                <p class="text-gray-300 text-sm">
                    Understanding delivery methods allows for proactive prevention rather than reactive response to threats.
                </p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-3">User Awareness</h3>
                <p class="text-gray-300 text-sm">
                    Analysis results directly inform security awareness training and user education programs.
                </p>
            </div>
        </div>
    </section>

    <!-- Back to Second Semester -->
    <section class="py-12 bg-gray-800/30 rounded-lg text-center">
        <a href="{{ route('nexus.second-semester') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-arrow-left mr-3"></i>
            Back to Second Semester
        </a>
    </section>
</div>
@endsection
