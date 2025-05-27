<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Analysis & Detection Statistics - Nexus Project</title>
    
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
    .statistics-container {
        background: linear-gradient(135deg, #a16207 0%, #ca8a04 50%, #facc15 100%);
        min-height: calc(100vh - 120px);
        padding: 2rem 0;
    }

    .statistics-card {
        background: rgba(161, 98, 7, 0.9);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(250, 204, 21, 0.3);
        padding: 2rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .statistics-card:hover {
        transform: translateY(-5px);
        border-color: rgba(250, 204, 21, 0.6);
        box-shadow: 0 25px 50px rgba(250, 204, 21, 0.2);
    }

    .metric-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #facc15, #ca8a04);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        box-shadow: 0 10px 30px rgba(250, 204, 21, 0.3);
    }

    .survey-stat-card {
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(250, 204, 21, 0.2);
        transition: all 0.3s ease;
    }

    .survey-stat-card:hover {
        border-color: rgba(250, 204, 21, 0.4);
        background: rgba(0, 0, 0, 0.7);
    }

    .metric-card {
        transition: all 0.3s ease;
    }

    .metric-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        position: relative;
        margin: auto;
        padding: 20px;
        width: 90%;
        max-width: 1200px;
        top: 50%;
        transform: translateY(-50%);
    }

    .modal img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    .close {
        position: absolute;
        top: 10px;
        right: 25px;
        color: #fff;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
        z-index: 1001;
    }

    .close:hover {
        color: #facc15;
    }
</style>

<div class="statistics-container">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-16">
            <div class="flex items-center justify-center mb-6">
                <div class="metric-icon">
                    <i class="fas fa-chart-bar text-white text-3xl"></i>
                </div>
            </div>
            <h1 class="text-5xl font-bold text-white mb-6">Analysis & Detection Statistics</h1>
            <p class="text-xl text-yellow-100 max-w-3xl mx-auto mb-8">
                Comprehensive survey statistics and analysis from 40 cybersecurity professionals including majors, doctors, and engineers
            </p>
            
            <!-- Back to Phase 2 Button -->
            <a href="{{ route('nexus.second-semester-phase2') }}" 
               class="inline-flex items-center bg-yellow-600 hover:bg-yellow-500 text-white font-semibold px-6 py-3 rounded-lg transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Phase 2
            </a>
        </div>

        <!-- Statistics Content -->
        <div class="statistics-card mb-8">
            <div class="statistics-analysis">
                <h2 class="text-3xl font-bold text-white mb-8 text-center">Statistical Analysis & Survey Results</h2>
                
                <!-- Survey Overview -->
                <div class="bg-gradient-to-r from-yellow-900/30 to-orange-900/30 rounded-lg p-6 mb-8 border border-yellow-500/50">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-users text-yellow-400 text-2xl mr-3"></i>
                        <h3 class="text-xl font-bold text-yellow-400">Cybersecurity Survey 2025</h3>
                    </div>
                    <div class="grid md:grid-cols-3 gap-4 mb-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">40</div>
                            <div class="text-yellow-200 text-sm">Total Respondents</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">3</div>
                            <div class="text-yellow-200 text-sm">Key Questions</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">100%</div>
                            <div class="text-yellow-200 text-sm">Response Rate</div>
                        </div>
                    </div>
                    <p class="text-yellow-100 text-sm">
                        Comprehensive survey conducted among cybersecurity professionals including majors, doctors, and engineers 
                        to understand current threat landscape and defense strategies.
                    </p>
                </div>

                <!-- Survey Statistics Images -->
                <div class="space-y-8">
                    <!-- Question 1: How did most people get hacked? -->
                    <div class="survey-stat-card bg-gray-900/50 rounded-lg p-6 border border-gray-600">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">1</span>
                            </div>
                            <h4 class="text-lg font-bold text-red-400">How did most of the people get hacked?</h4>
                        </div>
                        <div class="text-center mb-4">
                            <img src="{{ asset('images/phase 2/Statistics/how_did_most_of_the_people_got_hacked.png') }}" 
                                 alt="Survey Results: How People Get Hacked" 
                                 class="w-full max-w-2xl mx-auto rounded-lg shadow-lg border border-gray-700 cursor-pointer hover:opacity-90 transition-opacity"
                                 onclick="openImageModal(this)">
                        </div>
                        <div class="grid md:grid-cols-2 gap-4 text-sm">
                            <div class="space-y-2">
                                <div class="text-gray-300"><strong>Key Findings (Based on 40 responses):</strong></div>
                                <div class="text-red-300">• Phishing attacks remain the top vector</div>
                                <div class="text-orange-300">• Social engineering exploits trust</div>
                                <div class="text-yellow-300">• Malware distribution through email</div>
                            </div>
                            <div class="space-y-2">
                                <div class="text-gray-300"><strong>Prevention Insights:</strong></div>
                                <div class="text-blue-300">• Email security awareness training</div>
                                <div class="text-green-300">• Multi-factor authentication</div>
                                <div class="text-purple-300">• Regular security updates</div>
                            </div>
                        </div>
                    </div>

                    <!-- Question 2: What's the action they took? -->
                    <div class="survey-stat-card bg-gray-900/50 rounded-lg p-6 border border-gray-600">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">2</span>
                            </div>
                            <h4 class="text-lg font-bold text-blue-400">What's the action they took?</h4>
                        </div>
                        <div class="text-center mb-4">
                            <img src="{{ asset('images/phase 2/Statistics/whats_the_action_they_took.png') }}" 
                                 alt="Survey Results: Actions Taken After Attacks" 
                                 class="w-full max-w-2xl mx-auto rounded-lg shadow-lg border border-gray-700 cursor-pointer hover:opacity-90 transition-opacity"
                                 onclick="openImageModal(this)">
                        </div>
                        <div class="grid md:grid-cols-2 gap-4 text-sm">
                            <div class="space-y-2">
                                <div class="text-gray-300"><strong>Immediate Response (40 participants):</strong></div>
                                <div class="text-green-300">• Password changes implemented</div>
                                <div class="text-blue-300">• System scans performed</div>
                                <div class="text-yellow-300">• Professional assistance sought</div>
                            </div>
                            <div class="space-y-2">
                                <div class="text-gray-300"><strong>Long-term Actions:</strong></div>
                                <div class="text-purple-300">• Security software upgraded</div>
                                <div class="text-red-300">• Account monitoring increased</div>
                                <div class="text-orange-300">• Education and training pursued</div>
                            </div>
                        </div>
                    </div>

                    <!-- Question 3: Steps to protect themselves -->
                    <div class="survey-stat-card bg-gray-900/50 rounded-lg p-6 border border-gray-600">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">3</span>
                            </div>
                            <h4 class="text-lg font-bold text-green-400">Steps to protect themselves</h4>
                        </div>
                        <div class="text-center mb-4">
                            <img src="{{ asset('images/phase 2/Statistics/steps_to_protect_thierselves.png') }}" 
                                 alt="Survey Results: Protection Steps" 
                                 class="w-full max-w-2xl mx-auto rounded-lg shadow-lg border border-gray-700 cursor-pointer hover:opacity-90 transition-opacity"
                                 onclick="openImageModal(this)">
                        </div>
                        <div class="grid md:grid-cols-2 gap-4 text-sm">
                            <div class="space-y-2">
                                <div class="text-gray-300"><strong>Preventive Measures (40 responses):</strong></div>
                                <div class="text-green-300">• Strong password policies</div>
                                <div class="text-blue-300">• Regular software updates</div>
                                <div class="text-purple-300">• Backup strategies implemented</div>
                            </div>
                            <div class="space-y-2">
                                <div class="text-gray-300"><strong>Advanced Protection:</strong></div>
                                <div class="text-yellow-300">• Network monitoring tools</div>
                                <div class="text-red-300">• Incident response plans</div>
                                <div class="text-orange-300">• Continuous security training</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Analysis Metrics -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 my-8">
                    <div class="metric-card bg-blue-900/20 border border-blue-500/50 rounded-lg p-4 text-center hover:bg-blue-900/30 transition-all duration-300 cursor-pointer">
                        <div class="text-2xl font-bold text-blue-400">40</div>
                        <div class="text-gray-400 text-sm">Survey Participants</div>
                        <div class="mt-2">
                            <i class="fas fa-users text-blue-400"></i>
                        </div>
                    </div>
                    <div class="metric-card bg-red-900/20 border border-red-500/50 rounded-lg p-4 text-center hover:bg-red-900/30 transition-all duration-300 cursor-pointer">
                        <div class="text-2xl font-bold text-red-400">3</div>
                        <div class="text-gray-400 text-sm">Key Survey Questions</div>
                        <div class="mt-2">
                            <i class="fas fa-question-circle text-red-400"></i>
                        </div>
                    </div>
                    <div class="metric-card bg-green-900/20 border border-green-500/50 rounded-lg p-4 text-center hover:bg-green-900/30 transition-all duration-300 cursor-pointer">
                        <div class="text-2xl font-bold text-green-400">100%</div>
                        <div class="text-gray-400 text-sm">Response Rate</div>
                        <div class="mt-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                        </div>
                    </div>
                    <div class="metric-card bg-purple-900/20 border border-purple-500/50 rounded-lg p-4 text-center hover:bg-purple-900/30 transition-all duration-300 cursor-pointer">
                        <div class="text-2xl font-bold text-purple-400">2025</div>
                        <div class="text-gray-400 text-sm">Survey Year</div>
                        <div class="mt-2">
                            <i class="fas fa-calendar text-purple-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Trend Analysis -->
                <div class="bg-gray-900/50 rounded-lg p-6">
                    <h3 class="text-lg font-bold text-yellow-400 mb-4">Survey Analysis Trends</h3>
                    <div class="space-y-3 text-sm text-gray-300">
                        <div class="flex items-center justify-between">
                            <span>Phishing Attacks (Most Common)</span>
                            <span class="text-red-400">67.5% of responses</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Password Changes (Top Action)</span>
                            <span class="text-blue-400">82.5% implemented</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Multi-Factor Auth (Protection)</span>
                            <span class="text-green-400">75% adoption</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Security Training (Prevention)</span>
                            <span class="text-orange-400">92.5% valuable</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Analysis Insights -->
        <div class="statistics-card">
            <h2 class="text-2xl font-bold text-white mb-6">Key Research Insights</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-yellow-900/20 rounded-lg p-6 border border-yellow-500/30">
                    <h3 class="text-lg font-semibold text-yellow-400 mb-4">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Threat Landscape Analysis
                    </h3>
                    <ul class="space-y-2 text-yellow-100 text-sm">
                        <li>• Phishing remains the dominant attack vector</li>
                        <li>• Email-based attacks show increasing sophistication</li>
                        <li>• Social engineering tactics continue to evolve</li>
                        <li>• Mobile device targeting is on the rise</li>
                    </ul>
                </div>
                
                <div class="bg-green-900/20 rounded-lg p-6 border border-green-500/30">
                    <h3 class="text-lg font-semibold text-green-400 mb-4">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Defense Effectiveness
                    </h3>
                    <ul class="space-y-2 text-green-100 text-sm">
                        <li>• Multi-factor authentication significantly reduces risk</li>
                        <li>• Regular training improves user security awareness</li>
                        <li>• Incident response plans accelerate recovery</li>
                        <li>• Continuous monitoring enhances threat detection</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeImageModal()">&times;</span>
        <img id="modalImage" src="" alt="Survey Statistics">
    </div>
</div>

<script>
// Image Modal Functions
function openImageModal(img) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    
    modal.style.display = 'block';
    modalImg.src = img.src;
    modalImg.alt = img.alt;
    
    // Prevent body scrolling when modal is open
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'none';
    
    // Restore body scrolling
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside the image
document.getElementById('imageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// Close modal with escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});
</script>

</body>
</html>
