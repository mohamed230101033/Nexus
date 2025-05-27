@extends('layouts.nexus')

@section('title', 'NEXUS - Encryption & Cryptography')

@push('styles')
<style>    /* Encryption-specific styles */
    .encryption-hero {
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.15), rgba(14, 165, 233, 0.15));
        border: 2px solid rgba(6, 182, 212, 0.4);
        backdrop-filter: blur(20px);
    }

    /* Enhanced Card System */
    .encryption-card {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.9), rgba(30, 41, 59, 0.8));
        border: 2px solid rgba(6, 182, 212, 0.3);
        backdrop-filter: blur(20px);
        transition: all 0.4s ease;
        position: relative;
        overflow: visible;
        border-radius: 20px;
        z-index: 1;
    }

    .encryption-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(45deg, transparent, rgba(6, 182, 212, 0.1), transparent);
        opacity: 0;
        transition: all 0.4s ease;
        pointer-events: none;
        z-index: -1;
    }

    .encryption-card:hover::before {
        opacity: 1;
    }

    .encryption-card:hover {
        border-color: #06b6d4;
        box-shadow: 0 25px 60px rgba(6, 182, 212, 0.4);
        transform: translateY(-8px);
    }

    /* Form elements need higher z-index */
    .nexus-input,
    textarea,
    input[type="file"],
    button,
    select {
        position: relative;
        z-index: 2;
    }

    /* Ensure input containers are also properly layered */
    .card-section {
        position: relative;
        z-index: 2;
    }

    /* File upload area specific fixes */
    .file-upload-area {
        position: relative;
        z-index: 2;
        border: 3px dashed rgba(6, 182, 212, 0.5);
        background: rgba(15, 23, 42, 0.8);
        transition: all 0.3s ease;
        min-height: 120px;
    }

    .file-upload-area:hover {
        border-color: #06b6d4;
        background: rgba(6, 182, 212, 0.1);
    }

    .file-upload-area.dragover {
        border-color: #0ea5e9;
        background: rgba(14, 165, 233, 0.2);
        transform: scale(1.02);
    }

    /* Specialized Card Types */
    .text-encryption-card {
        border-color: rgba(59, 130, 246, 0.4);
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(99, 102, 241, 0.05));
    }

    .text-encryption-card:hover {
        border-color: #3b82f6;
        box-shadow: 0 25px 60px rgba(59, 130, 246, 0.3);
    }

    .file-encryption-card {
        border-color: rgba(168, 85, 247, 0.4);
        background: linear-gradient(135deg, rgba(168, 85, 247, 0.1), rgba(217, 70, 239, 0.05));
    }

    .file-encryption-card:hover {
        border-color: #a855f7;
        box-shadow: 0 25px 60px rgba(168, 85, 247, 0.3);
    }

    .video-encryption-card {
        border-color: rgba(239, 68, 68, 0.4);
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(245, 101, 101, 0.05));
    }

    .video-encryption-card:hover {
        border-color: #ef4444;
        box-shadow: 0 25px 60px rgba(239, 68, 68, 0.3);
    }

    .algorithms-card {
        border-color: rgba(34, 197, 94, 0.4);
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(74, 222, 128, 0.05));
    }

    .algorithms-card:hover {
        border-color: #22c55e;
        box-shadow: 0 25px 60px rgba(34, 197, 94, 0.3);
    }

    /* Enhanced video player */
    .video-container {
        position: relative;
        background: rgba(15, 23, 42, 0.9);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    .video-container video {
        width: 100%;
        height: auto;
        max-height: 300px;
        object-fit: cover;
    }

    /* Decryption section styles */
    .decryption-section {
        background: linear-gradient(135deg, rgba(168, 85, 247, 0.15), rgba(236, 72, 153, 0.15));
        border: 2px solid rgba(168, 85, 247, 0.4);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        padding: 24px;
        margin-top: 24px;
    }    /* Enhanced Card Headers */
    .card-header {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .card-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }

    .card-section {
        margin-bottom: 1.5rem;
        padding: 1rem;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(15, 23, 42, 0.3);
    }

    /* Enhanced spacing and layout */
    .encryption-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        margin-bottom: 3rem;
    }

    @media (min-width: 768px) {
        .encryption-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1280px) {
        .encryption-grid {
            grid-template-columns: repeat(3, 1fr);
        }
        
        .video-encryption-card {
            grid-column: span 2;
        }
    }

    .algorithms-section {
        grid-column: 1 / -1;
    }

    .encrypt-btn {
        background: linear-gradient(45deg, #0ea5e9, #06b6d4);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .encrypt-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .encrypt-btn:hover::before {
        left: 100%;
    }

    .encrypt-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(14, 165, 233, 0.4);
    }

    /* Algorithm Cards */
    .algo-card {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.6));
        border: 1px solid rgba(14, 165, 233, 0.2);
        transition: all 0.4s ease;
    }

    .algo-card:hover {
        border-color: #0ea5e9;
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(14, 165, 233, 0.2);
    }

    /* Input Styling */
    .nexus-input {
        background: rgba(15, 23, 42, 0.8);
        border: 2px solid rgba(14, 165, 233, 0.3);
        color: white;
        transition: all 0.3s ease;
    }

    .nexus-input:focus {
        border-color: #0ea5e9;
        box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
        outline: none;
    }

    /* Back Button */
    .back-btn {
        background: linear-gradient(45deg, #374151, #4b5563);
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: linear-gradient(45deg, #4b5563, #6b7280);
        transform: translateX(-5px);
    }
</style>
@endpush

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Navigation -->
    <div class="mb-8">
        <a href="{{ route('nexus.first-semester') }}" class="back-btn px-6 py-3 rounded-lg text-white font-semibold flex items-center space-x-2 hover:bg-gray-600 inline-flex">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Overview</span>
        </a>
    </div>

    <!-- Hero Section -->
    <div class="encryption-hero rounded-2xl p-8 mb-16">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-black mb-6">
                <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-teal-400 bg-clip-text text-transparent">
                    ENCRYPTION & CRYPTOGRAPHY
                </span>
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed mb-8">
                Master the fundamentals of cryptography through hands-on interactive demonstrations. 
                Learn how encryption protects our digital world with real file encryption and decryption.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                <div class="bg-gradient-to-r from-blue-500/20 to-cyan-500/20 p-4 rounded-xl border border-blue-500/30">
                    <i class="fas fa-file-lock text-2xl text-blue-400 mb-2"></i>
                    <div class="text-white font-semibold">Real Encryption</div>
                    <div class="text-gray-300 text-sm">Actual file protection</div>
                </div>
                <div class="bg-gradient-to-r from-purple-500/20 to-pink-500/20 p-4 rounded-xl border border-purple-500/30">
                    <i class="fas fa-key text-2xl text-purple-400 mb-2"></i>
                    <div class="text-white font-semibold">Multiple Algorithms</div>
                    <div class="text-gray-300 text-sm">AES, RSA, Caesar & more</div>
                </div>
                <div class="bg-gradient-to-r from-green-500/20 to-teal-500/20 p-4 rounded-xl border border-green-500/30">
                    <i class="fas fa-unlock text-2xl text-green-400 mb-2"></i>
                    <div class="text-white font-semibold">Full Decryption</div>
                    <div class="text-gray-300 text-sm">Secure file recovery</div>
                </div>
            </div>
        </div>
    </div>    <!-- Interactive Encryption Demos -->

    <style>
    /* Override grid layout for the first two cards */
    @media (min-width: 768px) {
        .encryption-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }
        
        .encryption-grid > .text-encryption-card,
        .encryption-grid > .file-encryption-card {
            flex: 0 0 calc(50% - 1rem);
            width: calc(50% - 1rem);
        }
        
        .encryption-grid > .video-encryption-card,
        .encryption-grid > .algorithms-section {
            flex: 0 0 100%;
            width: 100%;
        }
    }
    </style>
    
    <div class="encryption-grid">
        <!-- Text Encryption Card -->
        <div class="encryption-card text-encryption-card p-6">
            <div class="card-header">
                <div class="flex items-center">
                    <div class="card-icon bg-gradient-to-r from-blue-500 to-cyan-500">
                        <i class="fas fa-font text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white">Text Encryption</h3>
                        <p class="text-gray-300 text-sm">Encrypt and decrypt text using various algorithms</p>
                    </div>
                </div>
            </div>
            
            <!-- Text Input Section -->
            <div class="card-section">
                <h4 class="text-blue-400 font-semibold mb-3 flex items-center">
                    <i class="fas fa-edit mr-2"></i>Input Message
                </h4>
                <textarea id="textInput" class="nexus-input w-full p-4 rounded-lg resize-none" 
                          rows="4" placeholder="Type your secret message here..."></textarea>
            </div>
            
            <!-- Encryption Algorithms -->
            <div class="card-section">
                <h4 class="text-blue-400 font-semibold mb-3 flex items-center">
                    <i class="fas fa-cogs mr-2"></i>Encryption Methods
                </h4>
                <div class="grid grid-cols-2 gap-3">
                    <button onclick="encryptText('caesar')" class="encrypt-btn px-4 py-3 rounded-lg text-white font-semibold hover:transform hover:scale-105 transition-all">
                        <i class="fas fa-shield-alt mr-2"></i>Caesar Cipher
                    </button>
                    <button onclick="encryptText('base64')" class="encrypt-btn px-4 py-3 rounded-lg text-white font-semibold hover:transform hover:scale-105 transition-all">
                        <i class="fas fa-code mr-2"></i>Base64
                    </button>
                    <button onclick="encryptText('rot13')" class="encrypt-btn px-4 py-3 rounded-lg text-white font-semibold hover:transform hover:scale-105 transition-all">
                        <i class="fas fa-sync-alt mr-2"></i>ROT13
                    </button>
                    <button onclick="encryptText('reverse')" class="encrypt-btn px-4 py-3 rounded-lg text-white font-semibold hover:transform hover:scale-105 transition-all">
                        <i class="fas fa-exchange-alt mr-2"></i>Reverse
                    </button>
                </div>
            </div>
            
            <!-- Encryption Output -->
            <div class="card-section">
                <h4 class="text-cyan-400 font-semibold mb-3 flex items-center">
                    <i class="fas fa-lock mr-2"></i>Encrypted Result
                </h4>
                <div id="textOutput" class="bg-gray-800 p-4 rounded-lg min-h-[80px] text-cyan-400 font-mono break-all border border-gray-600"></div>
                <button onclick="copyToClipboard('textOutput')" class="mt-3 px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg text-sm transition-all">
                    <i class="fas fa-copy mr-2"></i>Copy Result
                </button>
            </div>

            <!-- Decryption Section -->
            <div class="card-section border-purple-500/30 bg-gradient-to-r from-purple-900/20 to-pink-900/10">
                <h4 class="text-purple-400 font-semibold mb-3 flex items-center">
                    <i class="fas fa-unlock mr-2"></i>Decrypt Text
                </h4>
                <textarea id="textDecryptInput" class="nexus-input w-full p-4 rounded-lg resize-none mb-4" 
                          rows="3" placeholder="Paste encrypted text to decrypt..."></textarea>
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <button onclick="decryptText('caesar')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all">
                        <i class="fas fa-unlock mr-2"></i>Caesar
                    </button>
                    <button onclick="decryptText('base64')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all">
                        <i class="fas fa-unlock mr-2"></i>Base64
                    </button>
                    <button onclick="decryptText('rot13')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all">
                        <i class="fas fa-unlock mr-2"></i>ROT13
                    </button>
                    <button onclick="decryptText('reverse')" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all">
                        <i class="fas fa-unlock mr-2"></i>Reverse
                    </button>
                </div>
                <div id="textDecryptOutput" class="bg-gray-800 p-4 rounded-lg min-h-[60px] text-green-400 font-mono break-all border border-gray-600"></div>
            </div>
        </div>

        <!-- File Encryption Card -->
        <div class="encryption-card file-encryption-card p-6">
            <div class="card-header">
                <div class="flex items-center">
                    <div class="card-icon bg-gradient-to-r from-purple-500 to-pink-500">
                        <i class="fas fa-file-lock text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white">File Encryption</h3>
                        <p class="text-gray-300 text-sm">Secure files with password-based encryption</p>
                    </div>
                </div>
            </div>
            
            <!-- File Upload Section -->
            <div class="card-section">
                <h4 class="text-purple-400 font-semibold mb-3 flex items-center">
                    <i class="fas fa-upload mr-2"></i>Select File
                </h4>
                <div class="file-upload-area border-2 border-dashed border-purple-600/50 rounded-lg p-8 text-center" 
                     ondrop="handleFileDrop(event)" 
                     ondragover="handleDragOver(event)" 
                     ondragleave="handleDragLeave(event)">
                    <input type="file" id="fileInput" class="hidden" onchange="handleFileUpload(event)">
                    <label for="fileInput" class="cursor-pointer block">
                        <i class="fas fa-cloud-upload-alt text-5xl text-purple-400 mb-4"></i>
                        <p class="text-gray-300 text-lg mb-2">Drop files here or click to upload</p>
                        <p class="text-gray-500 text-sm">Support for all file types</p>
                    </label>
                </div>
                
                <div id="fileInfo" class="hidden bg-gray-800 p-4 rounded-lg border border-gray-600 mt-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <div id="fileName" class="text-white font-semibold"></div>
                            <div id="fileSize" class="text-gray-400 text-sm"></div>
                        </div>
                        <div id="fileStatus" class="text-green-400">
                            <i class="fas fa-check-circle"></i> Ready
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Encryption Control -->
            <div class="card-section">
                <h4 class="text-purple-400 font-semibold mb-3 flex items-center">
                    <i class="fas fa-key mr-2"></i>Encryption Control
                </h4>
                <div class="flex space-x-4">
                    <input type="password" id="filePassword" class="nexus-input flex-1 p-3 rounded-lg" placeholder="Enter encryption password...">
                    <button onclick="encryptFile()" class="encrypt-btn px-6 py-3 rounded-lg text-white font-semibold">
                        <i class="fas fa-lock mr-2"></i>Encrypt File
                    </button>
                </div>
                
                <div id="encryptedFileResult" class="hidden mt-4">
                    <div class="bg-gray-800 p-4 rounded-lg border border-gray-600">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-white font-semibold">
                                <i class="fas fa-file-lock text-green-400 mr-2"></i>Encrypted File Ready
                            </span>
                            <button onclick="downloadEncryptedFile()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all">
                                <i class="fas fa-download mr-2"></i>Download
                            </button>
                        </div>
                        <p class="text-gray-400 text-sm">File has been successfully encrypted. Download it to save.</p>
                    </div>
                </div>
            </div>

            <!-- File Decryption Section -->
            <div class="card-section border-pink-500/30 bg-gradient-to-r from-pink-900/20 to-purple-900/10">
                <h4 class="text-pink-400 font-semibold mb-4 flex items-center">
                    <i class="fas fa-unlock mr-2"></i>Decrypt File
                </h4>
                <div class="file-upload-area border-2 border-dashed border-pink-600/50 rounded-lg p-6 text-center mb-4" 
                     ondrop="handleEncryptedFileDrop(event)" 
                     ondragover="handleDragOver(event)" 
                     ondragleave="handleDragLeave(event)">
                    <input type="file" id="encryptedFileInput" class="hidden" onchange="handleEncryptedFileUpload(event)">
                    <label for="encryptedFileInput" class="cursor-pointer block">
                        <i class="fas fa-file-upload text-3xl text-pink-400 mb-3"></i>
                        <p class="text-gray-300">Upload encrypted file</p>
                    </label>
                </div>
                
                <div class="flex space-x-4">
                    <input type="password" id="decryptPassword" class="nexus-input flex-1 p-3 rounded-lg" placeholder="Enter decryption password...">
                    <button onclick="decryptFile()" class="px-6 py-3 bg-pink-600 hover:bg-pink-700 text-white rounded-lg transition-all">
                        <i class="fas fa-unlock mr-2"></i>Decrypt
                    </button>
                </div>
                
                <div id="decryptedFileResult" class="hidden mt-4">
                    <div class="bg-gray-800 p-4 rounded-lg border border-gray-600">
                        <div class="flex items-center justify-between">
                            <span class="text-white font-semibold">
                                <i class="fas fa-file-check text-green-400 mr-2"></i>File Decrypted Successfully
                            </span>
                            <button onclick="downloadDecryptedFile()" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all">
                                <i class="fas fa-download mr-2"></i>Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Encryption Simulation Card -->
        <div class="encryption-card video-encryption-card p-6">
            <div class="card-header">
                <div class="flex items-center">
                    <div class="card-icon bg-gradient-to-r from-red-500 to-orange-500">
                        <i class="fas fa-video text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white">Video Security Simulation</h3>
                        <p class="text-gray-300 text-sm">Experience real-time video encryption and access control</p>
                    </div>
                </div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Video Player Section -->
                <div class="card-section">
                    <h4 class="text-red-400 font-semibold mb-3 flex items-center">
                        <i class="fas fa-play mr-2"></i>Video Content
                    </h4>
                    <div class="video-container">
                        <video id="demoVideo" class="w-full rounded-lg" controls preload="metadata">
                            <source src="/videos/Nexus Demo (online-video-cutter.com).mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                
                <!-- Control Panel -->
                <div class="space-y-4">
                    <div class="card-section">
                        <h4 class="text-orange-400 font-semibold mb-3 flex items-center">
                            <i class="fas fa-shield-alt mr-2"></i>Security Controls
                        </h4>
                        <button onclick="simulateVideoEncryption()" class="encrypt-btn w-full px-6 py-4 rounded-lg text-white font-semibold text-lg">
                            <i class="fas fa-lock mr-2"></i>
                            Encrypt Video & Block Access
                        </button>
                        <button onclick="resetVideoDemo()" class="mt-3 w-full px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-semibold">
                            <i class="fas fa-unlock mr-2"></i>
                            Decrypt & Restore Access
                        </button>
                    </div>
                    
                    <div class="card-section">
                        <h4 class="text-yellow-400 font-semibold mb-3 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>Security Status
                        </h4>
                        <div id="videoEncryptionStatus" class="bg-gray-800 p-4 rounded-lg border border-gray-600">
                            <div class="flex items-center">
                                <i class="fas fa-shield-check text-green-400 mr-2"></i>
                                <span class="text-white">Video security ready</span>
                            </div>
                            <div class="mt-2 text-gray-400 text-sm">
                                Click "Encrypt Video" to see real-time security protection
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Encryption Algorithms Information Card -->
        <div class="algorithms-section">
            <div class="encryption-card algorithms-card p-6">
                <div class="card-header">
                    <div class="flex items-center">
                        <div class="card-icon bg-gradient-to-r from-green-500 to-teal-500">
                            <i class="fas fa-key text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-white">Encryption Algorithms</h3>
                            <p class="text-gray-300 text-sm">Learn about different cryptographic methods and their applications</p>
                        </div>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="card-section text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-key text-white text-2xl"></i>
                        </div>
                        <h4 class="text-white font-bold mb-2">AES</h4>
                        <p class="text-gray-400 text-sm mb-4">Advanced Encryption Standard - Industry standard symmetric encryption</p>
                        <div class="text-xs text-cyan-400 bg-cyan-900/20 p-2 rounded">
                            • 128/192/256-bit keys<br>
                            • Block cipher<br>
                            • NIST approved
                        </div>
                    </div>
                    
                    <div class="card-section text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-lock text-white text-2xl"></i>
                        </div>
                        <h4 class="text-white font-bold mb-2">RSA</h4>
                        <p class="text-gray-400 text-sm mb-4">Rivest-Shamir-Adleman - Public key cryptographic algorithm</p>
                        <div class="text-xs text-purple-400 bg-purple-900/20 p-2 rounded">
                            • Public-key cryptography<br>
                            • Digital signatures<br>
                            • 1024-4096 bit keys
                        </div>
                    </div>
                    
                    <div class="card-section text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-fingerprint text-white text-2xl"></i>
                        </div>
                        <h4 class="text-white font-bold mb-2">SHA</h4>
                        <p class="text-gray-400 text-sm mb-4">Secure Hash Algorithm - Cryptographic hash function family</p>
                        <div class="text-xs text-green-400 bg-green-900/20 p-2 rounded">
                            • SHA-1, SHA-256, SHA-512<br>
                            • Data integrity<br>
                            • One-way function
                        </div>
                    </div>
                    
                    <div class="card-section text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                        <h4 class="text-white font-bold mb-2">DES</h4>
                        <p class="text-gray-400 text-sm mb-4">Data Encryption Standard - Legacy symmetric encryption standard</p>
                        <div class="text-xs text-red-400 bg-red-900/20 p-2 rounded">
                            • 56-bit key length<br>
                            • Historical importance<br>
                            • Now deprecated
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
    // File upload variables
    let selectedFile = null;
    let encryptedFile = null;
    let decryptedFile = null;
    let selectedEncryptedFile = null;
    
    // Text Encryption Functions
    function encryptText(algorithm) {
        const input = document.getElementById('textInput').value;
        const output = document.getElementById('textOutput');
        
        if (!input.trim()) {
            output.innerHTML = '<span class="text-red-400">Please enter some text to encrypt</span>';
            return;
        }
        
        let result = '';
        
        switch(algorithm) {
            case 'caesar':
                result = caesarCipher(input, 3);
                break;
            case 'base64':
                result = btoa(input);
                break;
            case 'rot13':
                result = rot13(input);
                break;
            case 'reverse':
                result = input.split('').reverse().join('');
                break;
        }
        
        output.innerHTML = `<span class="text-cyan-400">${result}</span>`;
    }
    
    function decryptText(algorithm) {
        const input = document.getElementById('textDecryptInput').value;
        const output = document.getElementById('textDecryptOutput');
        
        if (!input.trim()) {
            output.innerHTML = '<span class="text-red-400">Please enter encrypted text to decrypt</span>';
            return;
        }
        
        let result = '';
        
        try {
            switch(algorithm) {
                case 'caesar':
                    result = caesarCipher(input, -3);
                    break;
                case 'base64':
                    result = atob(input);
                    break;
                case 'rot13':
                    result = rot13(input);
                    break;
                case 'reverse':
                    result = input.split('').reverse().join('');
                    break;
            }
            output.innerHTML = `<span class="text-green-400">${result}</span>`;
        } catch (error) {
            output.innerHTML = '<span class="text-red-400">Invalid encrypted text or wrong algorithm</span>';
        }
    }
    
    function caesarCipher(text, shift) {
        return text.replace(/[a-zA-Z]/g, function(char) {
            const start = char <= 'Z' ? 65 : 97;
            return String.fromCharCode(((char.charCodeAt(0) - start + shift) % 26) + start);
        });
    }
    
    function rot13(text) {
        return text.replace(/[a-zA-Z]/g, function(char) {
            const start = char <= 'Z' ? 65 : 97;
            return String.fromCharCode(((char.charCodeAt(0) - start + 13) % 26) + start);
        });
    }
    
    function copyToClipboard(elementId) {
        const element = document.getElementById(elementId);
        const text = element.textContent;
        
        if (!text || text.includes('Please enter')) {
            alert('No content to copy');
            return;
        }
        
        navigator.clipboard.writeText(text).then(() => {
            const originalHTML = element.innerHTML;
            element.innerHTML = '<span class="text-green-400"><i class="fas fa-check mr-2"></i>Copied to clipboard!</span>';
            
            setTimeout(() => {
                element.innerHTML = originalHTML;
            }, 2000);
        }).catch(() => {
            alert('Text copied to clipboard!');
        });
    }
    
    // File handling functions
    function handleFileUpload(event) {
        const file = event.target.files[0];
        if (file) {
            selectedFile = file;
            showFileInfo(file);
        }
    }
    
    function handleEncryptedFileUpload(event) {
        const file = event.target.files[0];
        if (file) {
            selectedEncryptedFile = file;
        }
    }
    
    function handleDragOver(event) {
        event.preventDefault();
        event.currentTarget.classList.add('dragover');
    }
    
    function handleDragLeave(event) {
        event.preventDefault();
        event.currentTarget.classList.remove('dragover');
    }
    
    function handleFileDrop(event) {
        event.preventDefault();
        event.currentTarget.classList.remove('dragover');
        
        const file = event.dataTransfer.files[0];
        if (file) {
            selectedFile = file;
            showFileInfo(file);
            document.getElementById('fileInput').files = event.dataTransfer.files;
        }
    }
    
    function handleEncryptedFileDrop(event) {
        event.preventDefault();
        event.currentTarget.classList.remove('dragover');
        
        const file = event.dataTransfer.files[0];
        if (file) {
            selectedEncryptedFile = file;
        }
    }
    
    function showFileInfo(file) {
        document.getElementById('fileInfo').classList.remove('hidden');
        document.getElementById('fileName').textContent = file.name;
        document.getElementById('fileSize').textContent = formatFileSize(file.size);
    }
    
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }
    
    async function encryptFile() {
        if (!selectedFile) {
            alert('Please select a file to encrypt');
            return;
        }
        
        const password = document.getElementById('filePassword').value;
        if (!password) {
            alert('Please enter a password for encryption');
            return;
        }
        
        try {
            const fileBuffer = await selectedFile.arrayBuffer();
            const fileData = new Uint8Array(fileBuffer);
            const encryptedData = simpleXOREncrypt(fileData, password);
            
            const encryptedBlob = new Blob([encryptedData], { type: 'application/octet-stream' });
            encryptedFile = new File([encryptedBlob], selectedFile.name + '.encrypted', {
                type: 'application/octet-stream'
            });
            
            document.getElementById('fileStatus').innerHTML = '<i class="fas fa-lock text-green-400"></i> Encrypted';
            document.getElementById('encryptedFileResult').classList.remove('hidden');
        } catch (error) {
            console.error('Encryption error:', error);
            alert('Encryption failed. Please try again.');
        }
    }
    
    async function decryptFile() {
        if (!selectedEncryptedFile) {
            alert('Please select an encrypted file to decrypt');
            return;
        }
        
        const password = document.getElementById('decryptPassword').value;
        if (!password) {
            alert('Please enter the decryption password');
            return;
        }
        
        try {
            const fileBuffer = await selectedEncryptedFile.arrayBuffer();
            const encryptedData = new Uint8Array(fileBuffer);
            const decryptedData = simpleXORDecrypt(encryptedData, password);
            
            const originalName = selectedEncryptedFile.name.replace('.encrypted', '');
            const decryptedBlob = new Blob([decryptedData]);
            decryptedFile = new File([decryptedBlob], originalName);
            
            document.getElementById('decryptedFileResult').classList.remove('hidden');
        } catch (error) {
            console.error('Decryption error:', error);
            alert('Decryption failed. Please check your password.');
        }
    }
    
    function simpleXOREncrypt(data, password) {
        const result = new Uint8Array(data.length);
        const passwordBytes = new TextEncoder().encode(password);
        
        for (let i = 0; i < data.length; i++) {
            result[i] = data[i] ^ passwordBytes[i % passwordBytes.length];
        }
        
        return result;
    }
    
    function simpleXORDecrypt(data, password) {
        return simpleXOREncrypt(data, password);
    }
    
    function downloadEncryptedFile() {
        if (!encryptedFile) {
            alert('No encrypted file available');
            return;
        }
        
        const url = URL.createObjectURL(encryptedFile);
        const a = document.createElement('a');
        a.href = url;
        a.download = encryptedFile.name;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }
    
    function downloadDecryptedFile() {
        if (!decryptedFile) {
            alert('No decrypted file available');
            return;
        }
        
        const url = URL.createObjectURL(decryptedFile);
        const a = document.createElement('a');
        a.href = url;
        a.download = decryptedFile.name;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }
    
    function simulateVideoEncryption() {
        const status = document.getElementById('videoEncryptionStatus');
        const video = document.getElementById('demoVideo');
        const container = video.closest('.video-container');
        
        // Clear any existing intervals to prevent multiple animations
        if (window.scrambleInterval) {
            clearInterval(window.scrambleInterval);
        }
        
        // 1. Pause video immediately if playing
        if (!video.paused) {
            video.pause();
        }
        
        // 2. Disable video controls completely
        video.controls = false;
        video.style.pointerEvents = 'none';
        
        // 3. Store original source and remove it to prevent playback
        const originalSource = video.src || video.querySelector('source')?.src;
        if (originalSource) {
            video.removeAttribute('src');
            const sources = video.querySelectorAll('source');
            sources.forEach(source => source.removeAttribute('src'));
            video.load(); // Force reload to clear buffer
        }
        
        // 4. Add blocking overlay
        let blockingOverlay = document.querySelector('.video-blocking-overlay');
        if (!blockingOverlay) {
            blockingOverlay = document.createElement('div');
            blockingOverlay.className = 'video-blocking-overlay';
            blockingOverlay.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.8);
                z-index: 20;
                cursor: not-allowed;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #ff4444;
                font-family: 'JetBrains Mono', monospace;
                font-weight: bold;
                text-align: center;
                border: 2px solid #ff4444;
                border-radius: 8px;
            `;
            blockingOverlay.innerHTML = `
                <div>
                    <i class="fas fa-lock text-4xl mb-2"></i>
                    <div class="text-lg">VIDEO ENCRYPTED</div>
                    <div class="text-sm mt-1">PLAYBACK DISABLED</div>
                    <div class="text-xs mt-2 opacity-70">Unauthorized access prevented</div>
                </div>
            `;
            container.appendChild(blockingOverlay);
        }
        
        // Phase 1: Start encryption process
        status.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-spinner fa-spin text-blue-400 mr-2"></i>
                <span class="text-white">Initializing AES-256 encryption...</span>
            </div>
            <div class="mt-2 text-gray-400 text-sm">Generating secure encryption keys</div>
            <div class="mt-2 text-red-400 text-sm font-bold">
                ⚠️ VIDEO PLAYBACK DISABLED - ENCRYPTION IN PROGRESS
            </div>
        `;
        
        // Add encryption overlay effect
        const overlay = document.createElement('div');
        overlay.className = 'encryption-overlay absolute inset-0 bg-gradient-to-r from-blue-500/20 to-purple-500/20 animate-pulse';
        container.appendChild(overlay);
        
        // Store scramble interval globally so it can be cleared during decryption
        window.scrambleInterval = setInterval(() => {
            const scrambleLevel = parseFloat(video.getAttribute('data-scramble-level') || '0');
            const newLevel = scrambleLevel + 0.2;
            video.setAttribute('data-scramble-level', newLevel);
            
            video.style.filter = `
                hue-rotate(${newLevel * 180}deg) 
                contrast(${1 + newLevel * 0.5}) 
                saturate(${1 + newLevel}) 
                blur(${newLevel * 2}px)
            `;
            
            if (newLevel >= 1) {
                clearInterval(window.scrambleInterval);
                video.style.filter = 'brightness(0.1) contrast(10) blur(5px)';
                overlay.className = 'encryption-overlay absolute inset-0 bg-red-900/50 animate-pulse';
                
                // Final encryption state
                status.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas fa-lock text-green-400 mr-2"></i>
                        <span class="text-white">Video successfully encrypted</span>
                    </div>
                    <div class="mt-2 grid grid-cols-2 gap-4 text-xs">
                        <div class="text-green-400">✓ AES-256 encryption applied</div>
                        <div class="text-green-400">✓ Video stream secured</div>
                        <div class="text-green-400">✓ 2048-bit key generated</div>
                        <div class="text-green-400">✓ Playback disabled</div>
                    </div>
                `;
            }
        }, 100);
    }
    
    function resetVideoDemo() {
        const status = document.getElementById('videoEncryptionStatus');
        const video = document.getElementById('demoVideo');
        const container = video.closest('.video-container');
        
        // Clear any ongoing encryption animations
        if (window.scrambleInterval) {
            clearInterval(window.scrambleInterval);
        }
        
        // Remove all encryption-related overlays
        container.querySelectorAll('.video-blocking-overlay, .encryption-overlay').forEach(el => el.remove());
        
        // Reset video attributes and styling
        video.removeAttribute('data-scramble-level');
        video.style.filter = 'none';
        video.style.transition = 'filter 0.5s ease';
        video.controls = true;
        video.style.pointerEvents = 'auto';
        
        // Restore video source if needed
        if (!video.src) {
            video.src = "/videos/Nexus Demo (online-video-cutter.com).mp4";
            video.load();
        }
        
        // Update status
        status.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-shield-check text-green-400 mr-2"></i>
                <span class="text-white">Video security ready</span>
            </div>
            <div class="mt-2 text-gray-400 text-sm">
                Click "Encrypt Video" to see real-time security protection
            </div>
        `;
        
        // Show success notification
        showNotification('🔓 Video decrypted successfully!', 'success');
    }
    
    // Notification system for better UX
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg border shadow-lg transition-all duration-300 transform translate-x-full`;
        
        const colors = {
            success: 'bg-green-900/90 border-green-500 text-green-400',
            error: 'bg-red-900/90 border-red-500 text-red-400',
            info: 'bg-blue-900/90 border-blue-500 text-blue-400'
        };
        
        notification.className += ` ${colors[type]}`;
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'exclamation' : 'info'}-circle mr-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        // Auto remove
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
</script>
@endsection
