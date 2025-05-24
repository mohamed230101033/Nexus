@extends('layouts.nexus')

@section('title', 'First Semester - Malware Analysis')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="text-center mb-12 animate-fade-in">
        <div class="inline-flex items-center px-4 py-2 bg-red-500/20 rounded-full text-red-300 text-sm font-medium mb-6">
            <i class="fas fa-bug mr-2"></i>
            First Semester
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
            <span class="bg-gradient-to-r from-red-400 to-orange-400 bg-clip-text text-transparent">
                Malware Analysis
            </span>
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
            Comprehensive study of malware behavior, analysis techniques, and threat detection methodologies.
        </p>
    </div>

    <!-- Overview Stats -->
    <div class="grid md:grid-cols-4 gap-6 mb-12">
        <div class="bg-gradient-to-br from-red-500/20 to-orange-500/20 p-6 rounded-2xl border border-red-500/20 text-center">
            <div class="text-3xl font-bold text-white mb-2">15+</div>
            <div class="text-gray-300 text-sm">Malware Samples Analyzed</div>
        </div>
        <div class="bg-gradient-to-br from-orange-500/20 to-yellow-500/20 p-6 rounded-2xl border border-orange-500/20 text-center">
            <div class="text-3xl font-bold text-white mb-2">8</div>
            <div class="text-gray-300 text-sm">Analysis Techniques</div>
        </div>
        <div class="bg-gradient-to-br from-yellow-500/20 to-red-500/20 p-6 rounded-2xl border border-yellow-500/20 text-center">
            <div class="text-3xl font-bold text-white mb-2">12</div>
            <div class="text-gray-300 text-sm">Weeks of Research</div>
        </div>
        <div class="bg-gradient-to-br from-red-500/20 to-pink-500/20 p-6 rounded-2xl border border-red-500/20 text-center">
            <div class="text-3xl font-bold text-white mb-2">5</div>
            <div class="text-gray-300 text-sm">Major Projects</div>
        </div>
    </div>

    <!-- Main Content Sections -->
    <div class="space-y-12">
        <!-- Static Analysis Section -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-search text-white text-xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white">Static Analysis</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Techniques Learned</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">File Signature Analysis</div>
                                <div class="text-gray-400 text-sm">PE header examination and metadata extraction</div>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">String Analysis</div>
                                <div class="text-gray-400 text-sm">Extracting readable strings for behavior prediction</div>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-400 mt-1 mr-3"></i>
                            <div>
                                <div class="text-white font-medium">Disassembly</div>
                                <div class="text-gray-400 text-sm">Assembly code analysis using IDA Pro and Ghidra</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Tools Mastered</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-800/50 p-4 rounded-lg">
                            <i class="fas fa-tools text-blue-400 mb-2"></i>
                            <div class="text-white font-medium">IDA Pro</div>
                            <div class="text-gray-400 text-xs">Disassembler</div>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded-lg">
                            <i class="fas fa-code text-green-400 mb-2"></i>
                            <div class="text-white font-medium">Ghidra</div>
                            <div class="text-gray-400 text-xs">Reverse Engineering</div>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded-lg">
                            <i class="fas fa-file-code text-purple-400 mb-2"></i>
                            <div class="text-white font-medium">PEiD</div>
                            <div class="text-gray-400 text-xs">Packer Detection</div>
                        </div>
                        <div class="bg-gray-800/50 p-4 rounded-lg">
                            <i class="fas fa-terminal text-yellow-400 mb-2"></i>
                            <div class="text-white font-medium">Strings</div>
                            <div class="text-gray-400 text-xs">String Extraction</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic Analysis Section -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-pink-500 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-play text-white text-xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white">Dynamic Analysis</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-red-500/10 to-orange-500/10 p-6 rounded-xl border border-red-500/20">
                    <i class="fas fa-desktop text-red-400 text-2xl mb-4"></i>
                    <h3 class="text-white font-semibold mb-3">Sandbox Execution</h3>
                    <p class="text-gray-400 text-sm">
                        Safe execution environment analysis using VirtualBox and VMware for behavioral observation.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-orange-500/10 to-yellow-500/10 p-6 rounded-xl border border-orange-500/20">
                    <i class="fas fa-network-wired text-orange-400 text-2xl mb-4"></i>
                    <h3 class="text-white font-semibold mb-3">Network Monitoring</h3>
                    <p class="text-gray-400 text-sm">
                        Traffic analysis using Wireshark to detect malicious network communications and C&C servers.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-yellow-500/10 to-red-500/10 p-6 rounded-xl border border-yellow-500/20">
                    <i class="fas fa-chart-line text-yellow-400 text-2xl mb-4"></i>
                    <h3 class="text-white font-semibold mb-3">Process Monitoring</h3>
                    <p class="text-gray-400 text-sm">
                        Real-time process and system call monitoring using Process Monitor and API hooking tools.
                    </p>
                </div>
            </div>
        </div>

        <!-- Key Projects -->
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                <i class="fas fa-project-diagram text-purple-400 mr-3"></i>
                Key Projects
            </h2>
            <div class="space-y-6">
                <div class="border-l-4 border-blue-500 pl-6">
                    <h3 class="text-xl font-semibold text-white mb-2">Ransomware Analysis Project</h3>
                    <p class="text-gray-300 mb-3">
                        Comprehensive analysis of WannaCry ransomware including static analysis, dynamic behavior study, 
                        and kill switch mechanism investigation.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs">Static Analysis</span>
                        <span class="px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-xs">Dynamic Analysis</span>
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs">Report Writing</span>
                    </div>
                </div>
                
                <div class="border-l-4 border-green-500 pl-6">
                    <h3 class="text-xl font-semibold text-white mb-2">Banking Trojan Investigation</h3>
                    <p class="text-gray-300 mb-3">
                        Deep dive into banking trojan mechanisms, credential harvesting techniques, 
                        and financial fraud prevention strategies.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-xs">Behavioral Analysis</span>
                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-300 rounded-full text-xs">Network Analysis</span>
                        <span class="px-3 py-1 bg-orange-500/20 text-orange-300 rounded-full text-xs">IoC Extraction</span>
                    </div>
                </div>
                
                <div class="border-l-4 border-purple-500 pl-6">
                    <h3 class="text-xl font-semibold text-white mb-2">APT Campaign Analysis</h3>
                    <p class="text-gray-300 mb-3">
                        Advanced Persistent Threat campaign study focusing on multi-stage malware, 
                        lateral movement techniques, and attribution methods.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs">APT Analysis</span>
                        <span class="px-3 py-1 bg-pink-500/20 text-pink-300 rounded-full text-xs">Attribution</span>
                        <span class="px-3 py-1 bg-indigo-500/20 text-indigo-300 rounded-full text-xs">MITRE ATT&CK</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Skills & Achievements -->
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-br from-blue-500/10 to-purple-500/10 p-8 rounded-2xl border border-blue-500/20">
                <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                    <i class="fas fa-trophy text-yellow-400 mr-3"></i>
                    Achievements
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-300">
                        <i class="fas fa-medal text-yellow-400 mr-3"></i>
                        Top 5% in Malware Analysis Course
                    </li>
                    <li class="flex items-center text-gray-300">
                        <i class="fas fa-certificate text-blue-400 mr-3"></i>
                        SANS FOR610 Certificate
                    </li>
                    <li class="flex items-center text-gray-300">
                        <i class="fas fa-star text-purple-400 mr-3"></i>
                        Published Research Paper on Zero-Day Detection
                    </li>
                </ul>
            </div>
            
            <div class="bg-gradient-to-br from-green-500/10 to-teal-500/10 p-8 rounded-2xl border border-green-500/20">
                <h3 class="text-xl font-bold text-white mb-4 flex items-center">
                    <i class="fas fa-brain text-cyan-400 mr-3"></i>
                    Skills Developed
                </h3>
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Reverse Engineering</span>
                        <div class="w-24 bg-gray-700 rounded-full h-2">
                            <div class="bg-green-400 h-2 rounded-full" style="width: 90%"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Threat Intelligence</span>
                        <div class="w-24 bg-gray-700 rounded-full h-2">
                            <div class="bg-blue-400 h-2 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-300">Report Writing</span>
                        <div class="w-24 bg-gray-700 rounded-full h-2">
                            <div class="bg-purple-400 h-2 rounded-full" style="width: 95%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate sections on scroll
        const sections = document.querySelectorAll('.bg-white\\/5, .grid > div');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    gsap.from(entry.target, {
                        duration: 0.8,
                        y: 40,
                        opacity: 0,
                        delay: index * 0.1,
                        ease: "power2.out"
                    });
                }
            });
        }, { threshold: 0.1 });

        sections.forEach(section => observer.observe(section));
    });
</script>
@endsection
