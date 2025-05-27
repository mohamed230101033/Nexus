<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detection & Defence - Nexus Project</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<style>
    .defense-container {
        background: linear-gradient(135deg, #064e3b 0%, #065f46 50%, #059669 100%);
        min-height: calc(100vh - 120px);
        padding: 2rem 0;
    }

    .defense-card {
        background: rgba(6, 78, 59, 0.9);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(16, 185, 129, 0.3);
        padding: 2rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .defense-card:hover {
        transform: translateY(-5px);
        border-color: rgba(16, 185, 129, 0.6);
        box-shadow: 0 25px 50px rgba(16, 185, 129, 0.2);
    }

    .tool-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #10b981, #059669);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 2rem;
        color: white;
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }

    .dashboard-container {
        background: rgba(6, 78, 59, 0.8);
        border-radius: 15px;
        border: 1px solid rgba(16, 185, 129, 0.2);
        padding: 1.5rem;
        margin-top: 2rem;
    }

    .stat-card {
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.3);
        border-radius: 10px;
        padding: 1rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        background: rgba(16, 185, 129, 0.2);
        transform: translateY(-2px);
    }

    .activity-item {
        background: rgba(16, 185, 129, 0.1);
        border-left: 4px solid #10b981;
        padding: 0.75rem;
        margin-bottom: 0.5rem;
        border-radius: 0 8px 8px 0;
    }

    .health-indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 0.5rem;
    }

    .health-good { background-color: #10b981; }
    .health-warning { background-color: #f59e0b; }
    .health-critical { background-color: #ef4444; }

    .workflow-step {
        background: rgba(16, 185, 129, 0.1);
        border: 2px solid rgba(16, 185, 129, 0.3);
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        position: relative;
        transition: all 0.3s ease;
    }

    .workflow-step:hover {
        background: rgba(16, 185, 129, 0.2);
        transform: scale(1.05);
    }

    .workflow-arrow {
        position: absolute;
        right: -20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.5rem;
        color: #10b981;
    }

    .pulse-animation {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
</style>

<div class="defense-container">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center mr-6 shadow-lg">
                    <i class="fas fa-shield-alt text-white text-3xl"></i>
                </div>
                <div>
                    <h1 class="text-4xl font-bold text-white">Sub-Module 2: Detection & Defence</h1>
                    <p class="text-green-200 text-xl">Advanced Endpoint Detection and Response Systems</p>
                </div>
            </div>
            <a href="{{ route('nexus.second-semester-phase2') }}" class="inline-flex items-center bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-all duration-300">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Phase 2
            </a>
        </div>

        <!-- Educational Notice -->
        <div class="bg-green-900 bg-opacity-50 border border-green-400 rounded-lg p-4 mb-8">
            <div class="flex items-center">
                <i class="fas fa-graduation-cap text-green-400 text-xl mr-3"></i>
                <div>
                    <h3 class="text-green-300 font-semibold">Educational Purpose</h3>
                    <p class="text-green-200 text-sm">This module demonstrates defensive security tools for educational purposes. Always use security tools ethically and within legal boundaries.</p>
                </div>
            </div>
        </div>

        <!-- Defense Tools Grid -->
        <div class="grid lg:grid-cols-3 gap-8 mb-8">
            <!-- Wazuh SIEM -->
            <div class="defense-card">
                <div class="tool-icon">
                    <i class="fas fa-server"></i>
                </div>
                <h3 class="text-2xl font-bold text-white text-center mb-4">Wazuh SIEM</h3>
                <p class="text-green-100 text-center mb-6">Centralized Security Information and Event Management platform for comprehensive log analysis and threat detection.</p>
                
                <div class="space-y-3">
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Real-time Log Analysis</span>
                    </div>
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>File Integrity Monitoring</span>
                    </div>
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Compliance Reporting</span>
                    </div>
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Incident Response</span>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-green-400">
                    <h4 class="text-green-300 font-semibold mb-2">Detection Capabilities:</h4>
                    <ul class="text-green-200 text-sm space-y-1">
                        <li>• Malware detection and analysis</li>
                        <li>• Rootkit and steganography detection</li>
                        <li>• Vulnerability assessment</li>
                        <li>• Active response mechanisms</li>
                    </ul>
                </div>
            </div>

            <!-- Suricata IDS -->
            <div class="defense-card">
                <div class="tool-icon">
                    <i class="fas fa-network-wired"></i>
                </div>
                <h3 class="text-2xl font-bold text-white text-center mb-4">Suricata IDS</h3>
                <p class="text-green-100 text-center mb-6">High-performance Network Intrusion Detection System providing real-time threat detection and network monitoring.</p>
                
                <div class="space-y-3">
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Network Traffic Analysis</span>
                    </div>
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Protocol Detection</span>
                    </div>
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Rule-based Detection</span>
                    </div>
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Multi-threading Support</span>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-green-400">
                    <h4 class="text-green-300 font-semibold mb-2">Network Monitoring:</h4>
                    <ul class="text-green-200 text-sm space-y-1">
                        <li>• Real-time packet inspection</li>
                        <li>• Signature-based detection</li>
                        <li>• Anomaly detection algorithms</li>
                        <li>• JSON logging for SIEM integration</li>
                    </ul>
                </div>
            </div>

            <!-- YARA Rules -->
            <div class="defense-card">
                <div class="tool-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3 class="text-2xl font-bold text-white text-center mb-4">YARA Rules</h3>
                <p class="text-green-100 text-center mb-6">Pattern matching engine for malware identification and classification using custom rule definitions.</p>
                
                <div class="space-y-3">
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Pattern Matching</span>
                    </div>
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Malware Classification</span>
                    </div>
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Custom Rule Creation</span>
                    </div>
                    <div class="flex items-center text-green-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>File System Scanning</span>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-green-400">
                    <h4 class="text-green-300 font-semibold mb-2">Rule Types:</h4>
                    <ul class="text-green-200 text-sm space-y-1">
                        <li>• String-based patterns</li>
                        <li>• Hexadecimal sequences</li>
                        <li>• Regular expressions</li>
                        <li>• Conditional logic rules</li>
                    </ul>
                </div>
            </div>
        </div>        <!-- Real-time Security Dashboard -->
        <div class="dashboard-container">
            <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
                <i class="fas fa-tachometer-alt text-green-400 mr-3"></i>
                Real-time Security Dashboard
            </h3>
            
            <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6 mb-6">
                <div class="stat-card">
                    <div class="text-2xl font-bold text-green-400 pulse-animation stat-number">1247</div>
                    <div class="text-green-200 text-sm">Events Processed</div>
                    <div class="text-green-300 text-xs mt-1">↑ 15% from yesterday</div>
                </div>
                <div class="stat-card">
                    <div class="text-2xl font-bold text-yellow-400 stat-number">23</div>
                    <div class="text-green-200 text-sm">Active Threats</div>
                    <div class="text-yellow-300 text-xs mt-1">⚠ Requires attention</div>
                </div>
                <div class="stat-card">
                    <div class="text-2xl font-bold text-red-400 stat-number">7</div>
                    <div class="text-green-200 text-sm">Critical Alerts</div>
                    <div class="text-red-300 text-xs mt-1">🚨 Immediate action</div>
                </div>
                <div class="stat-card">
                    <div class="text-2xl font-bold text-blue-400">99.7%</div>
                    <div class="text-green-200 text-sm">System Uptime</div>
                    <div class="text-blue-300 text-xs mt-1">✓ Operational</div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-6">
                <!-- Live Activity Feed -->
                <div>
                    <h4 class="text-xl font-semibold text-green-300 mb-4">Live Activity Feed</h4>
                    <div class="activity-feed-content max-h-64 overflow-y-auto space-y-2">
                        <div class="activity-item">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center">
                                    <i class="fas fa-bug text-red-400 mr-3"></i>
                                    <div>
                                        <div class="text-green-200 font-medium text-sm">Malware Detected</div>
                                        <div class="text-green-300 text-xs">YARA rule triggered: Win32.Trojan.Generic</div>
                                    </div>
                                </div>
                                <div class="text-green-400 text-xs">2 min ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center">
                                    <i class="fas fa-network-wired text-blue-400 mr-3"></i>
                                    <div>
                                        <div class="text-green-200 font-medium text-sm">Network Anomaly</div>
                                        <div class="text-green-300 text-xs">Suricata: Suspicious outbound connection</div>
                                    </div>
                                </div>
                                <div class="text-green-400 text-xs">5 min ago</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center">
                                    <i class="fas fa-shield-alt text-green-400 mr-3"></i>
                                    <div>
                                        <div class="text-green-200 font-medium text-sm">File Integrity Alert</div>
                                        <div class="text-green-300 text-xs">Wazuh: System file modification detected</div>
                                    </div>
                                </div>
                                <div class="text-green-400 text-xs">8 min ago</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Health -->
                <div>
                    <h4 class="text-xl font-semibold text-green-300 mb-4">System Health Status</h4>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-3 bg-green-900 bg-opacity-30 rounded-lg">
                            <div class="flex items-center">
                                <span class="health-indicator health-good"></span>
                                <span class="text-green-200">Wazuh Manager</span>
                            </div>
                            <div class="text-green-400 text-sm">Online</div>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-green-900 bg-opacity-30 rounded-lg">
                            <div class="flex items-center">
                                <span class="health-indicator health-good"></span>
                                <span class="text-green-200">Suricata Engine</span>
                            </div>
                            <div class="text-green-400 text-sm">Active</div>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-green-900 bg-opacity-30 rounded-lg">
                            <div class="flex items-center">
                                <span class="health-indicator health-warning"></span>
                                <span class="text-green-200">YARA Scanner</span>
                            </div>
                            <div class="text-yellow-400 text-sm">High Load</div>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-green-900 bg-opacity-30 rounded-lg">
                            <div class="flex items-center">
                                <span class="health-indicator health-good"></span>
                                <span class="text-green-200">Database</span>
                            </div>
                            <div class="text-green-400 text-sm">Synchronized</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wazuh Dashboard Screenshots -->
        <div class="mt-8">
            <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
                <i class="fas fa-desktop text-green-400 mr-3"></i>
                Wazuh Dashboard Screenshots
            </h3>
            <div class="grid lg:grid-cols-2 gap-6">
                <div class="defense-card">
                    <img src="{{ asset('images/phase 2/Detect/sshdon_waszuhDashboard.png') }}" 
                         alt="Wazuh SSH Detection Dashboard" 
                         class="screenshot-image w-full h-48 object-cover rounded-lg mb-4 cursor-pointer hover:opacity-90 transition-opacity">
                    <h4 class="text-lg font-semibold text-white mb-2">SSH Attack Detection</h4>
                    <p class="text-green-200 text-sm">Wazuh dashboard showing SSH brute force attack detection and monitoring capabilities.</p>
                </div>
                
                <div class="defense-card">
                    <img src="{{ asset('images/phase 2/Detect/rootkitOnWazuh.png') }}" 
                         alt="Rootkit Detection on Wazuh" 
                         class="screenshot-image w-full h-48 object-cover rounded-lg mb-4 cursor-pointer hover:opacity-90 transition-opacity">
                    <h4 class="text-lg font-semibold text-white mb-2">Rootkit Detection</h4>
                    <p class="text-green-200 text-sm">Advanced rootkit detection capabilities showing system-level threats and persistence mechanisms.</p>
                </div>
                
                <div class="defense-card">
                    <img src="{{ asset('images/phase 2/Detect/yaraOnWazuh.png') }}" 
                         alt="YARA Integration with Wazuh" 
                         class="screenshot-image w-full h-48 object-cover rounded-lg mb-4 cursor-pointer hover:opacity-90 transition-opacity">
                    <h4 class="text-lg font-semibold text-white mb-2">YARA Integration</h4>
                    <p class="text-green-200 text-sm">YARA rules integration within Wazuh for enhanced malware detection and classification.</p>
                </div>
                
                <div class="defense-card">
                    <img src="{{ asset('images/phase 2/Detect/Verify_Check_agent_status_in_the_Wazuh_Dashboard.png') }}" 
                         alt="Wazuh Agent Status Verification" 
                         class="screenshot-image w-full h-48 object-cover rounded-lg mb-4 cursor-pointer hover:opacity-90 transition-opacity">
                    <h4 class="text-lg font-semibold text-white mb-2">Agent Status Monitoring</h4>
                    <p class="text-green-200 text-sm">Real-time agent status verification and health monitoring across multiple endpoints.</p>
                </div>
            </div>
        </div>

        

        <!-- Unified Detection Workflow -->
        <div class="mt-8">
            <h3 class="text-2xl font-bold text-white text-center mb-8">Unified Detection Workflow</h3>
            <div class="grid lg:grid-cols-3 gap-6">
                <div class="workflow-step relative">
                    <div class="workflow-arrow lg:block hidden">→</div>
                    <i class="fas fa-network-wired text-4xl text-green-400 mb-4"></i>
                    <h4 class="text-xl font-semibold text-white mb-2">1. Network Monitoring</h4>
                    <p class="text-green-200 text-sm">Suricata continuously monitors network traffic, analyzing packets for suspicious patterns and known attack signatures.</p>
                </div>
                
                <div class="workflow-step relative">
                    <div class="workflow-arrow lg:block hidden">→</div>
                    <i class="fas fa-search text-4xl text-green-400 mb-4"></i>
                    <h4 class="text-xl font-semibold text-white mb-2">2. Pattern Matching</h4>
                    <p class="text-green-200 text-sm">YARA rules scan files and memory for malware signatures, providing detailed classification and threat identification.</p>
                </div>
                
                <div class="workflow-step">
                    <i class="fas fa-server text-4xl text-green-400 mb-4"></i>
                    <h4 class="text-xl font-semibold text-white mb-2">3. Centralized Analysis</h4>
                    <p class="text-green-200 text-sm">Wazuh correlates all security events, providing comprehensive analysis, alerting, and automated response capabilities.</p>
                </div>
            </div>
        </div>    </div>
</div>

<script>
// Interactive dashboard animations
document.addEventListener('DOMContentLoaded', function() {
    // Animate statistics on page load
    const statNumbers = document.querySelectorAll('.stat-number');
    statNumbers.forEach(stat => {
        const finalValue = parseInt(stat.textContent);
        let currentValue = 0;
        const increment = finalValue / 30;
        
        const timer = setInterval(() => {
            currentValue += increment;
            if (currentValue >= finalValue) {
                stat.textContent = finalValue.toLocaleString();
                clearInterval(timer);
            } else {
                stat.textContent = Math.floor(currentValue).toLocaleString();
            }
        }, 50);
    });

    // Live activity feed simulation
    const activityFeed = document.querySelector('.activity-feed-content');
    const activities = [
        { type: 'warning', icon: 'fas fa-exclamation-triangle', message: 'Suspicious file detected by YARA', time: 'Just now' },
        { type: 'success', icon: 'fas fa-shield-alt', message: 'Malware blocked by Wazuh', time: '2 min ago' },
        { type: 'info', icon: 'fas fa-network-wired', message: 'Network anomaly detected by Suricata', time: '5 min ago' },
        { type: 'error', icon: 'fas fa-bug', message: 'Potential rootkit activity', time: '8 min ago' }
    ];

    let activityIndex = 0;
    setInterval(() => {
        if (activityFeed) {
            const activity = activities[activityIndex % activities.length];
            const newActivity = document.createElement('div');
            newActivity.className = 'activity-item opacity-0 transform translate-y-4';
            newActivity.innerHTML = `
                <div class="flex justify-between items-start">
                    <div class="flex items-center">
                        <i class="${activity.icon} text-green-400 mr-3"></i>
                        <div>
                            <div class="text-green-200 font-medium text-sm">${activity.message}</div>
                            <div class="text-green-400 text-xs">${activity.time}</div>
                        </div>
                    </div>
                </div>
            `;
            
            activityFeed.insertBefore(newActivity, activityFeed.firstChild);
            
            // Animate in
            setTimeout(() => {
                newActivity.classList.remove('opacity-0', 'translate-y-4');
                newActivity.classList.add('opacity-100', 'translate-y-0');
            }, 100);
            
            // Remove old activities
            if (activityFeed.children.length > 5) {
                activityFeed.removeChild(activityFeed.lastChild);
            }
            
            activityIndex++;
        }
    }, 8000);

    // Image modal functionality
    const images = document.querySelectorAll('.screenshot-image');
    images.forEach(img => {
        img.addEventListener('click', function() {
            const modal = document.createElement('div');
            modal.className = 'fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4';
            modal.innerHTML = `
                <div class="relative max-w-4xl max-h-full">
                    <img src="${this.src}" alt="${this.alt}" class="max-w-full max-h-full object-contain rounded-lg">
                    <button class="absolute top-4 right-4 text-white text-2xl hover:text-red-400 transition-colors" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            document.body.appendChild(modal);
            
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.remove();
                }
            });
        });
    });
});
</script>

</body>
</html>

    <div id="architecture" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">System Architecture & Data Flow</h3>
        
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="architecture-item">
                <div class="flex items-center mb-4">
                    <i class="fas fa-laptop text-blue-400 text-2xl mr-3"></i>
                    <h4 class="text-xl font-semibold text-white">Endpoint Agent</h4>
                </div>
                <p class="text-gray-300 mb-3">Deployed on <span class="highlight-text">my_os</span> (192.168.1.x)</p>
                <ul class="text-gray-400 text-sm space-y-1">
                    <li>• Log collection and forwarding</li>
                    <li>• File integrity monitoring</li>
                    <li>• System event capturing</li>
                    <li>• Active response execution</li>
                </ul>
            </div>
            
            <div class="architecture-item">
                <div class="flex items-center mb-4">
                    <i class="fas fa-server text-green-400 text-2xl mr-3"></i>
                    <h4 class="text-xl font-semibold text-white">Wazuh Server</h4>
                </div>
                <p class="text-gray-300 mb-3">Central management at <span class="highlight-text">192.168.1.6</span></p>
                <ul class="text-gray-400 text-sm space-y-1">
                    <li>• Log analysis and correlation</li>
                    <li>• Rule processing engine</li>
                    <li>• Alert generation</li>
                    <li>• Response coordination</li>
                </ul>
            </div>
            
            <div class="architecture-item">
                <div class="flex items-center mb-4">
                    <i class="fas fa-chart-bar text-purple-400 text-2xl mr-3"></i>
                    <h4 class="text-xl font-semibold text-white">Dashboard</h4>
                </div>
                <p class="text-gray-300 mb-3">Visualization and analysis interface</p>
                <ul class="text-gray-400 text-sm space-y-1">
                    <li>• Real-time alert monitoring</li>
                    <li>• MITRE ATT&CK mapping</li>
                    <li>• Forensic investigation</li>
                    <li>• Compliance reporting</li>
                </ul>
            </div>
        </div>
        
        <div class="bg-gray-800 rounded-lg p-6">
            <h4 class="text-xl font-semibold text-blue-400 mb-4">Data Flow Process</h4>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h5 class="text-lg font-medium text-white mb-3">Collection Phase</h5>
                    <ol class="text-gray-300 space-y-2">
                        <li><span class="text-blue-400 font-bold">1.</span> Wazuh agents collect system logs and events</li>
                        <li><span class="text-blue-400 font-bold">2.</span> Suricata monitors network traffic</li>
                        <li><span class="text-blue-400 font-bold">3.</span> FIM detects file system changes</li>
                        <li><span class="text-blue-400 font-bold">4.</span> YARA scans triggered on file events</li>
                    </ol>
                </div>
                <div>
                    <h5 class="text-lg font-medium text-white mb-3">Processing Phase</h5>
                    <ol class="text-gray-300 space-y-2">
                        <li><span class="text-green-400 font-bold">5.</span> Logs transmitted to Wazuh server</li>
                        <li><span class="text-green-400 font-bold">6.</span> Rules engine processes events</li>
                        <li><span class="text-green-400 font-bold">7.</span> Alerts generated and classified</li>
                        <li><span class="text-green-400 font-bold">8.</span> Active responses triggered automatically</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div id="deployment" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Deployment Guide</h3>
        
        <div class="deployment-step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">1</span>
                </div>
                <h4 class="text-xl font-semibold text-white">Wazuh Agent Installation</h4>
            </div>
            <div class="code-block text-green-400 text-sm">
                <code># Download and install Wazuh agent
curl -Os https://packages.wazuh.com/4.x/apt/pool/main/w/wazuh-agent/wazuh-agent_&lt;VERSION&gt;_amd64.deb
sudo WAZUH_MANAGER='192.168.1.6' dpkg -i ./wazuh-agent_&lt;VERSION&gt;_amd64.deb

# Start the agent service
sudo systemctl start wazuh-agent
sudo systemctl enable wazuh-agent</code>
            </div>
        </div>
        
        <div class="deployment-step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">2</span>
                </div>
                <h4 class="text-xl font-semibold text-white">Suricata Network Monitoring</h4>
            </div>
            <div class="code-block text-green-400 text-sm">
                <code># Install Suricata NIDS
sudo add-apt-repository ppa:oisf/suricata-stable -y
sudo apt update && sudo apt install suricata -y

# Download threat intelligence rules
curl -LO https://rules.emergingthreats.net/open/suricata-6.0.8/emerging.rules.tar.gz
tar -xvzf emerging.rules.tar.gz
sudo mv rules/*.rules /etc/suricata/rules/</code>
            </div>
        </div>
        
        <div class="deployment-step">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold">3</span>
                </div>
                <h4 class="text-xl font-semibold text-white">YARA Malware Detection</h4>
            </div>
            <div class="code-block text-green-400 text-sm">
                <code># Install YARA and dependencies
sudo apt update && sudo apt install yara jq -y

# Create YARA rules directory
sudo mkdir -p /etc/yara/rules/

# Create sample malware detection rule
echo 'rule test_malware { 
    strings: 
        $a = "MZ" 
    condition: 
        $a 
}' | sudo tee /etc/yara/rules/test_malware.yar</code>
            </div>
        </div>
    </div>

    <div id="integration" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Component Integration</h3>
        
        <div class="mb-8">
            <h4 class="text-xl font-semibold text-blue-400 mb-4">Wazuh Configuration</h4>
            <div class="code-block text-green-400 text-sm">
                <code>&lt;ossec_config&gt;
  &lt;localfile&gt;
    &lt;log_format&gt;json&lt;/log_format&gt;
    &lt;location&gt;/var/log/suricata/eve.json&lt;/location&gt;
  &lt;/localfile&gt;
  &lt;localfile&gt;
    &lt;log_format&gt;syslog&lt;/log_format&gt;
    &lt;location&gt;/var/ossec/logs/active-responses.log&lt;/location&gt;
  &lt;/localfile&gt;
  &lt;syscheck&gt;
    &lt;directories check_all="yes" realtime="yes"&gt;
      /etc,/bin,/usr/bin,/sbin,/usr/sbin,/opt,/tmp,/var/www/html
    &lt;/directories&gt;
  &lt;/syscheck&gt;
&lt;/ossec_config&gt;</code>
            </div>
        </div>
        
        <div class="mb-8">
            <h4 class="text-xl font-semibold text-blue-400 mb-4">Suricata Network Rules</h4>
            <div class="code-block text-green-400 text-sm">
                <code># /etc/suricata/suricata.yaml
vars:
  home_net: "[192.168.1.0/24]"
  external_net: "any"

outputs:
  - eve-log:
      enabled: yes
      filetype: regular
      filename: eve.json
      json:
        enabled: yes

rule-files:
  - /etc/suricata/rules/emerging-all.rules

af-packet:
  - interface: eth0</code>
            </div>
        </div>
        
        <div class="mb-8">
            <h4 class="text-xl font-semibold text-blue-400 mb-4">YARA Active Response Script</h4>
            <div class="code-block text-green-400 text-sm">
                <code>#!/bin/bash
# /var/ossec/active-response/bin/yara.sh

LOG_FILE="/var/ossec/logs/active-responses.log"
YARA_RULES_PATH="/etc/yara/rules/"

read INPUT_JSON
FILENAME=$(echo "${INPUT_JSON}" | jq -r '.parameters.alert.file')

if [ -f "${FILENAME}" ]; then
    YARA_OUTPUT=$(yara "${YARA_RULES_PATH}" "${FILENAME}" 2>&1)
    if [ $? -eq 0 ] && [ -n "${YARA_OUTPUT}" ]; then
        echo "$(date) YARA DETECTION: ${YARA_OUTPUT}" >> "${LOG_FILE}"
    fi
fi</code>
            </div>
        </div>
    </div>

    <div id="mitre" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">MITRE ATT&CK Framework Mapping</h3>
        
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <h4 class="text-xl font-semibold text-red-400 mb-4">Detection Techniques</h4>
                
                <div class="mitre-technique">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-white font-bold">T1110</span>
                        <span class="text-red-400 text-sm">Credential Access</span>
                    </div>
                    <h5 class="text-white font-medium mb-1">Brute Force</h5>
                    <p class="text-gray-300 text-sm">Detects repeated login attempts via Wazuh authentication monitoring</p>
                </div>
                
                <div class="mitre-technique">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-white font-bold">T1595</span>
                        <span class="text-red-400 text-sm">Reconnaissance</span>
                    </div>
                    <h5 class="text-white font-medium mb-1">Active Scanning</h5>
                    <p class="text-gray-300 text-sm">Suricata identifies network scanning activities and port enumeration</p>
                </div>
                
                <div class="mitre-technique">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-white font-bold">T1059</span>
                        <span class="text-red-400 text-sm">Execution</span>
                    </div>
                    <h5 class="text-white font-medium mb-1">Command and Scripting Interpreter</h5>
                    <p class="text-gray-300 text-sm">YARA rules detect malicious scripts and command execution</p>
                </div>
                
                <div class="mitre-technique">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-white font-bold">T1003</span>
                        <span class="text-red-400 text-sm">Credential Access</span>
                    </div>
                    <h5 class="text-white font-medium mb-1">OS Credential Dumping</h5>
                    <p class="text-gray-300 text-sm">YARA signatures identify credential theft tools like Mimikatz</p>
                </div>
            </div>
            
            <div>
                <h4 class="text-xl font-semibold text-green-400 mb-4">Response Actions</h4>
                
                <div class="deployment-step border-green-500">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-ban text-red-500 mr-3"></i>
                        <h5 class="text-white font-medium">IP Blocking</h5>
                    </div>
                    <p class="text-gray-300 text-sm">Automatically blocks malicious IPs using iptables rules</p>
                </div>
                
                <div class="deployment-step border-green-500">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-trash text-red-500 mr-3"></i>
                        <h5 class="text-white font-medium">File Quarantine</h5>
                    </div>
                    <p class="text-gray-300 text-sm">Removes or isolates detected malware files immediately</p>
                </div>
                
                <div class="deployment-step border-green-500">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-bell text-yellow-500 mr-3"></i>
                        <h5 class="text-white font-medium">Alert Generation</h5>
                    </div>
                    <p class="text-gray-300 text-sm">Creates detailed alerts with MITRE ATT&CK technique mapping</p>
                </div>
                
                <div class="deployment-step border-green-500">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-search text-blue-500 mr-3"></i>
                        <h5 class="text-white font-medium">Forensic Collection</h5>
                    </div>
                    <p class="text-gray-300 text-sm">Gathers evidence and artifacts for incident investigation</p>
                </div>
            </div>
        </div>
    </div>

    <div id="screenshots" class="tab-content hidden">
        <h3 class="text-2xl font-bold text-white mb-6">Implementation Screenshots</h3>
        <div class="screenshot-gallery">
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/Detect/Verify_Check_agent_status_in_the_Wazuh_Dashboard.png') }}" alt="Wazuh Agent Status" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Wazuh Dashboard Agent Status</p>
                <p class="text-gray-500 text-xs">Verification of agent connectivity and health monitoring</p>
            </div>
            
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/Detect/yaraOnWazuh.png') }}" alt="YARA Integration" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">YARA Malware Detection</p>
                <p class="text-gray-500 text-xs">YARA rules integration with Wazuh for malware scanning</p>
            </div>
            
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/Detect/sshdon_waszuhDashboard.png') }}" alt="SSH Detection" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">SSH Attack Detection</p>
                <p class="text-gray-500 text-xs">Real-time SSH brute force attack monitoring and alerting</p>
            </div>
            
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/Detect/rootkitOnWazuh.png') }}" alt="Rootkit Detection" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">Rootkit Detection Alert</p>
                <p class="text-gray-500 text-xs">Advanced rootkit detection and system integrity monitoring</p>
            </div>
            
            <div class="screenshot-item" onclick="openFullscreen(this)">
                <img src="{{ asset('images/phase 2/Detect/expandedDoc_forsshd.png') }}" alt="SSH Documentation" class="w-full h-48 object-cover rounded-lg mb-3">
                <p class="text-gray-400 text-sm font-medium">SSH Event Analysis</p>
                <p class="text-gray-500 text-xs">Detailed SSH event documentation and forensic analysis</p>
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
        <div class="relative max-w-5xl max-h-[90vh] p-4">
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
