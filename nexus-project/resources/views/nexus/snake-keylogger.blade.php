@extends('layouts.nexus')

@section('title', 'NEXUS - Snake Keylogger Analysis | Malware Research')

@push('styles')
<style>
    /* Snake Keylogger specific styling */
    .malware-card {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
        border: 3px solid rgba(239, 68, 68, 0.4);
        backdrop-filter: blur(20px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .malware-card:hover {
        border-color: #ef4444;
        box-shadow: 0 20px 50px rgba(239, 68, 68, 0.3);
        transform: translateY(-5px);
    }

    .analysis-stage {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
        border: 2px solid rgba(251, 146, 60, 0.3);
        backdrop-filter: blur(10px);
        transition: all 0.4s ease;
    }

    .analysis-stage:hover {
        border-color: #fb923c;
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(251, 146, 60, 0.2);
    }

    .code-block {
        background: rgba(15, 23, 42, 0.9);
        border: 1px solid rgba(251, 146, 60, 0.3);
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.8rem;
    }

    .back-btn {
        background: linear-gradient(45deg, #374151, #4b5563);
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: linear-gradient(45deg, #4b5563, #6b7280);
        transform: translateX(-5px);
    }

    .ioc-indicator {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(251, 146, 60, 0.1));
        border: 1px solid rgba(239, 68, 68, 0.3);
        transition: all 0.3s ease;
    }

    .ioc-indicator:hover {
        border-color: #ef4444;
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(251, 146, 60, 0.2));
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
            <span class="bg-gradient-to-r from-red-400 via-orange-400 to-yellow-400 bg-clip-text text-transparent">
                SNAKE KEYLOGGER
            </span>
        </h1>
        <p class="text-xl text-gray-300 max-w-4xl mx-auto leading-relaxed mb-8">
            Real-world analysis of obfuscated JavaScript malware sample from Malware Bazaar - Multi-stage payload delivery and evasion techniques.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <span class="px-4 py-2 bg-red-600/20 border border-red-500 rounded-full text-red-300 text-sm">
                <i class="fas fa-bug mr-2"></i>Malware Analysis
            </span>
            <span class="px-4 py-2 bg-orange-600/20 border border-orange-500 rounded-full text-orange-300 text-sm">
                <i class="fas fa-code mr-2"></i>JavaScript Obfuscation
            </span>
            <span class="px-4 py-2 bg-yellow-600/20 border border-yellow-500 rounded-full text-yellow-300 text-sm">
                <i class="fas fa-shield-alt mr-2"></i>ActiveX Exploitation
            </span>
        </div>
    </div>

    <!-- Stage 1: Initial Obfuscation -->
    <div class="analysis-stage rounded-2xl p-8 mb-16">
        <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-lg mr-4">1</span>
            Initial Obfuscation Analysis
        </h3>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <div>
                <h4 class="text-red-400 font-semibold mb-4">Obfuscated Code Pattern</h4>
                <div class="code-block rounded-lg p-4 mb-4">
<pre class="text-green-400 text-xs overflow-x-auto"><code>var LEZVCW = '';
for (var i = 0; i < ZYbHXl.length; i++) {
    LEZVCW += String.fromCharCode(ZYbHXl[i] - 64562842);
}
var ZYbHXl = new Array(
64562887-I0i,64562995-I0i,64562974-I0i,
64562991-I0i,64562909-I0i,64562956-I0i,
64562975-I0i,64562983-I0i...)
eval(LEZVCW)</code></pre>
                </div>
                <div class="mt-4 space-y-2">
                    <div class="flex items-center">
                        <i class="fas fa-calculator text-orange-400 mr-2"></i>
                        <span class="text-gray-300 text-sm">Mathematical obfuscation using base value subtraction</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-code text-yellow-400 mr-2"></i>
                        <span class="text-gray-300 text-sm">Dynamic code evaluation through eval()</span>
                    </div>
                </div>
            </div>
            
            <div>
                <h4 class="text-orange-400 font-semibold mb-4">Analysis Screenshot</h4>
                <div class="bg-gray-900/50 rounded-lg p-4">
                    <img src="{{ asset('images/snake_keylogger/s1.png') }}" alt="Initial Code Analysis" class="w-full rounded-lg">
                </div>
                <p class="text-gray-400 text-sm mt-2">Initial obfuscated JavaScript showing character code mathematics</p>
            </div>
        </div>
    </div>

    <!-- Stage 2: Deobfuscation Process -->
    <div class="analysis-stage rounded-2xl p-8 mb-16">
        <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
            <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-lg mr-4">2</span>
            Deobfuscation Analysis
        </h3>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <div>
                <h4 class="text-orange-400 font-semibold mb-4">Deobfuscation Process</h4>
                <div class="bg-gray-800/50 rounded-lg p-6 mb-4">
                    <ul class="text-gray-300 space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-arrow-right text-orange-400 mr-3 mt-1"></i>
                            <span><strong>Step 1:</strong> Identify base value (64562842) used for character code offset</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-arrow-right text-orange-400 mr-3 mt-1"></i>
                            <span><strong>Step 2:</strong> Subtract base value from each array element</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-arrow-right text-orange-400 mr-3 mt-1"></i>
                            <span><strong>Step 3:</strong> Convert results to ASCII characters using String.fromCharCode()</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-arrow-right text-orange-400 mr-3 mt-1"></i>
                            <span><strong>Step 4:</strong> Reconstruct readable JavaScript code for analysis</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div>
                <h4 class="text-yellow-400 font-semibold mb-4">Deobfuscated Output</h4>
                <div class="code-block rounded-lg p-4">
<pre class="text-green-400 text-xs overflow-x-auto"><code>// Deobfuscated result reveals:
var activeXObj = new ActiveXObject("WScript.Shell");
var xmlDoc = new ActiveXObject("MSXML2.DOMDocument");
xmlDoc.async = false;
xmlDoc.loadXML(base64Data);
// Payload delivery mechanism exposed</code></pre>
                </div>
                <div class="mt-4">
                    <div class="bg-gray-900/50 rounded-lg p-4">
                        <img src="{{ asset('images/snake_keylogger/s2.png') }}" alt="Code Deobfuscation Process" class="w-full rounded-lg">
                    </div>
                    <p class="text-gray-400 text-sm mt-2">Deobfuscation process and pattern analysis</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stage 3: ActiveX Exploitation -->
    <div class="analysis-stage rounded-2xl p-8 mb-16">
        <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
            <span class="bg-yellow-500 text-black px-3 py-1 rounded-full text-lg mr-4">3</span>
            ActiveX Exploitation Techniques
        </h3>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
                <h4 class="text-yellow-400 font-semibold mb-4">Exploitation Methods</h4>
                <div class="space-y-4">
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h5 class="text-white font-semibold mb-2">WScript.Shell Access</h5>
                        <p class="text-gray-300 text-sm">Gains system-level access through Windows Script Host for command execution</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h5 class="text-white font-semibold mb-2">MSXML2.DOMDocument</h5>
                        <p class="text-gray-300 text-sm">XML DOM manipulation for Base64 decoding and data processing</p>
                    </div>
                    <div class="bg-gray-800/50 rounded-lg p-4">
                        <h5 class="text-white font-semibold mb-2">Base64 Decoding</h5>
                        <p class="text-gray-300 text-sm">Uses XML DOM selectSingleNode() method for payload decoding</p>
                    </div>
                </div>
            </div>
            
            <div>
                <h4 class="text-purple-400 font-semibold mb-4">System Impact</h4>
                <div class="bg-gray-900/50 rounded-lg p-4 mb-4">
                    <img src="{{ asset('images/snake_keylogger/s3.png') }}" alt="ActiveX Analysis" class="w-full rounded-lg">
                </div>
                <div class="bg-gray-800/50 rounded-lg p-4">
                    <ul class="text-gray-300 text-sm space-y-1">
                        <li>• Keystroke logging</li>
                        <li>• Password theft</li>
                        <li>• Banking credential compromise</li>
                        <li>• Data exfiltration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Stage 4: Network Communication -->
    <div class="analysis-stage rounded-2xl p-8 mb-16">
        <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
            <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-lg mr-4">4</span>
            Network Communication & C&C
        </h3>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
                <h4 class="text-purple-400 font-semibold mb-4">C&C Infrastructure</h4>
                <div class="code-block rounded-lg p-4 mb-4">
<pre class="text-green-400 text-xs"><code>// Command & Control Server
C&C: 192.3.220.6/web/w88.js
Method: HTTP GET requests
Payload: Base64 encoded commands
Persistence: Registry modifications</code></pre>
                </div>
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <h5 class="text-blue-400 font-semibold mb-3">Traffic Analysis</h5>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• <strong>Domain:</strong> 192.3.220.6</li>
                        <li>• <strong>Path:</strong> /web/w88.js</li>
                        <li>• <strong>Protocol:</strong> HTTP (unencrypted)</li>
                        <li>• <strong>Frequency:</strong> Periodic check-ins</li>
                    </ul>
                </div>
            </div>
            
            <div>
                <h4 class="text-green-400 font-semibold mb-4">Communication Flow</h4>
                <div class="bg-gray-900/50 rounded-lg p-4 mb-4">
                    <img src="{{ asset('images/snake_keylogger/s4.png') }}" alt="Network Communication" class="w-full rounded-lg">
                </div>
                <div class="bg-gray-800/50 rounded-lg p-6">
                    <h5 class="text-blue-400 font-semibold mb-3">Research Methodology</h5>
                    <ul class="text-gray-300 text-sm space-y-2">
                        <li>• <strong>Safe Analysis:</strong> Conducted in isolated environment</li>
                        <li>• <strong>Manual Deobfuscation:</strong> Character code mathematics</li>
                        <li>• <strong>Network Monitoring:</strong> Traffic analysis without execution</li>
                        <li>• <strong>Sample Source:</strong> Malware Bazaar repository</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Detection and Prevention -->
    <div class="malware-card rounded-2xl p-8 mb-16">
        <h3 class="text-2xl font-bold text-white mb-6 text-center">Detection & Prevention Strategies</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="ioc-indicator rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-search text-blue-400 text-xl mr-3"></i>
                    <h4 class="text-blue-400 font-semibold">Static Analysis</h4>
                </div>
                <ul class="text-gray-300 text-sm space-y-1">
                    <li>• String pattern matching</li>
                    <li>• Obfuscation detection</li>
                    <li>• ActiveX object identification</li>
                    <li>• Entropy analysis</li>
                </ul>
            </div>
            
            <div class="ioc-indicator rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-eye text-green-400 text-xl mr-3"></i>
                    <h4 class="text-green-400 font-semibold">Behavioral Analysis</h4>
                </div>
                <ul class="text-gray-300 text-sm space-y-1">
                    <li>• Network communication monitoring</li>
                    <li>• Registry modification detection</li>
                    <li>• Process injection analysis</li>
                    <li>• Keylogger behavior patterns</li>
                </ul>
            </div>
            
            <div class="ioc-indicator rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-shield-alt text-purple-400 text-xl mr-3"></i>
                    <h4 class="text-purple-400 font-semibold">Prevention</h4>
                </div>
                <ul class="text-gray-300 text-sm space-y-1">
                    <li>• ActiveX restrictions</li>
                    <li>• Script execution policies</li>
                    <li>• Network segmentation</li>
                    <li>• User awareness training</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- IOCs Section -->
    <div class="malware-card rounded-2xl p-8">
        <h3 class="text-2xl font-bold text-white mb-6 text-center">Indicators of Compromise (IOCs)</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-800/50 rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-globe text-red-400 text-xl mr-3"></i>
                    <h4 class="text-red-400 font-semibold">Network Indicators</h4>
                </div>
                <ul class="text-gray-300 text-sm space-y-2">
                    <li>• <strong>IP:</strong> 192.3.220.6</li>
                    <li>• <strong>URL:</strong> /web/w88.js</li>
                    <li>• <strong>Protocol:</strong> HTTP</li>
                    <li>• <strong>User-Agent:</strong> Mozilla/5.0 variations</li>
                </ul>
            </div>
            
            <div class="bg-gray-800/50 rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-file-code text-orange-400 text-xl mr-3"></i>
                    <h4 class="text-orange-400 font-semibold">File Indicators</h4>
                </div>
                <ul class="text-gray-300 text-sm space-y-2">
                    <li>• Obfuscated JavaScript files</li>
                    <li>• Base64 encoded payloads</li>
                    <li>• Temporary file creation</li>
                    <li>• Registry persistence entries</li>
                </ul>
            </div>
            
            <div class="bg-gray-800/50 rounded-lg p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-cogs text-yellow-400 text-xl mr-3"></i>
                    <h4 class="text-yellow-400 font-semibold">Behavioral Indicators</h4>
                </div>
                <ul class="text-gray-300 text-sm space-y-2">
                    <li>• ActiveX object instantiation</li>
                    <li>• Keystroke capture attempts</li>
                    <li>• Periodic network beaconing</li>
                    <li>• Process injection activities</li>
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
                    window.location.href = "{{ route('nexus.rat-analysis') }}";
                    break;
                case '3':
                    event.preventDefault();
                    // Already on snake-keylogger page
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
