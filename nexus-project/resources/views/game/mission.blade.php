@extends('layouts.app')

@section('styles')
<style>
    /* Main Background Enhancement */
    .mission-bg {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #0f172a 50%, #1e293b 75%, #0f172a 100%);
        background-size: 400% 400%;
        animation: gradient-shift 15s ease infinite;
        position: relative;
        overflow: hidden;
    }
    
    .mission-bg::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 20% 20%, rgba(16, 185, 129, 0.1) 0%, transparent 70%),
            radial-gradient(circle at 80% 80%, rgba(16, 185, 129, 0.1) 0%, transparent 70%);
        z-index: 0;
    }
    
    .mission-bg::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2320314b' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.5;
        z-index: 0;
    }
    
    .mesh-grid {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            linear-gradient(90deg, rgba(16, 185, 129, 0.03) 1px, transparent 1px),
            linear-gradient(0deg, rgba(16, 185, 129, 0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        z-index: 1;
    }
    
    .mission-ambient-light {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle at center, rgba(16, 185, 129, 0.05) 0%, transparent 50%);
        animation: rotate 60s linear infinite;
        z-index: 2;
        pointer-events: none;
    }
    
    .mission-spotlight {
        position: absolute;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 70% 30%, rgba(16, 185, 129, 0.08) 0%, transparent 50%);
        z-index: 3;
        pointer-events: none;
    }
    
    @keyframes gradient-shift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    /* Social Media Mayhem Styles */
    /* Enhanced background styles */
    .social-media-bg {
        background: linear-gradient(125deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        position: relative;
        overflow: hidden;
    }
    
    .social-media-bg::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 25% 25%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(16, 185, 129, 0.1) 0%, transparent 50%);
        z-index: 0;
    }
    
    .circuit-lines {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            linear-gradient(90deg, transparent 49.5%, rgba(16, 185, 129, 0.1) 49.5%, rgba(16, 185, 129, 0.1) 50.5%, transparent 50.5%) 0 0,
            linear-gradient(0deg, transparent 49.5%, rgba(16, 185, 129, 0.1) 49.5%, rgba(16, 185, 129, 0.1) 50.5%, transparent 50.5%) 0 0;
        background-size: 50px 50px;
        opacity: 0.5;
        z-index: 1;
        animation: circuit-move 120s linear infinite;
    }
    
    @keyframes circuit-move {
        0% { background-position: 0 0; }
        100% { background-position: 1000px 1000px; }
    }
    
    .digital-nodes {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 2;
        pointer-events: none;
    }
    
    .node {
        position: absolute;
        width: 2px;
        height: 2px;
        background-color: rgba(16, 185, 129, 0.6);
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(16, 185, 129, 0.8);
    }
    
    .horizontal-scan {
        position: absolute;
        height: 2px;
        width: 100%;
        background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.5), transparent);
        top: 50%;
        transform: translateY(-50%);
        z-index: 3;
        opacity: 0.7;
        animation: horizontal-scan 10s linear infinite;
    }
    
    @keyframes horizontal-scan {
        0% { top: 0; opacity: 0; }
        10% { opacity: 0.7; }
        90% { opacity: 0.7; }
        100% { top: 100%; opacity: 0; }
    }
    
    .cyber-grid {
        background: 
            linear-gradient(to right, rgba(16, 185, 129, 0.1) 1px, transparent 1px) 0 0,
            linear-gradient(to bottom, rgba(16, 185, 129, 0.1) 1px, transparent 1px) 0 0;
        background-size: 20px 20px;
        background-position: center center;
    }
    
    .cyber-scanner-line {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(to right, transparent, rgba(16, 185, 129, 0.7), transparent);
        z-index: 5;
        animation: scannerLine 3s ease-in-out infinite;
        box-shadow: 0 0 10px rgba(16, 185, 129, 0.5);
    }
    
    @keyframes scannerLine {
        0% { transform: translateY(0); opacity: 0.8; }
        50% { transform: translateY(100vh); opacity: 0.6; }
        100% { transform: translateY(0); opacity: 0.8; }
    }
    
    /* Digital Rain Effect */
    .digital-rain {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        color: rgba(16, 185, 129, 0.15);
        font-family: monospace;
        font-size: 12px;
        line-height: 1;
        z-index: 1;
    }
    
    .rain-column {
        position: absolute;
        top: -20px;
        animation: rain-fall linear infinite;
    }
    
    @keyframes rain-fall {
        to { transform: translateY(100vh); }
    }
    
    .binary-bg {
        position: relative;
        overflow: hidden;
    }
    
    .binary-bg::before {
        content: "10101010010101001010101101010010101001010100101";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        font-family: monospace;
        font-size: 10px;
        color: rgba(16, 185, 129, 0.1);
        line-height: 1;
        pointer-events: none;
        z-index: 0;
    }
    
    /* Rest of your existing styles */
    .floating-particle {
        z-index: 1;
        filter: blur(1px);
    }
    
    .code-scanner {
        position: relative;
    }
    
    .code-scanner::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 65%, rgba(16, 185, 129, 0.1) 75%, transparent 85%);
        background-size: 200% 200%;
        animation: scanEffect 4s linear infinite;
        pointer-events: none;
    }
    
    @keyframes scanEffect {
        0% { background-position: 0% 200%; }
        100% { background-position: 200% 0%; }
    }
    
    .progress-scanner {
        position: relative;
        overflow: hidden;
    }
    
    .progress-scanner::after {
        content: '';
        position: absolute;
        top: 0;
        height: 100%;
        width: 30px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        animation: progressScan 2s infinite;
    }
    
    @keyframes progressScan {
        0% { left: -30px; }
        100% { left: 100%; }
    }
    
    .hover-glow {
        transition: all 0.3s ease;
    }
    
    .hover-glow:hover {
        box-shadow: 0 0 15px rgba(16, 185, 129, 0.4);
    }
    
    .glow-effect {
        filter: blur(10px);
        opacity: 0.6;
    }
    
    .matrix-text {
        font-family: monospace;
        text-shadow: 0 0 5px rgba(16, 185, 129, 0.8);
    }
    
    .code-cursor {
        border-right: 2px solid rgba(16, 185, 129, 0.7);
        animation: cursor-blink 1s step-start infinite;
    }
    
    @keyframes cursor-blink {
        50% { border-color: transparent; }
    }
    
    .villain-shake {
        animation: villain-shake 2s ease-in-out infinite;
        transform-origin: center;
    }
    
    @keyframes villain-shake {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(-3deg); }
        75% { transform: rotate(3deg); }
    }
    
    .cyber-badge {
        position: relative;
        overflow: hidden;
    }
    
    .cyber-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        animation: badge-shine 3s infinite;
    }
    
    @keyframes badge-shine {
        0% { left: -100%; }
        50% { left: 100%; }
        100% { left: 100%; }
    }
    
    .bounce-subtle {
        animation: bounce-subtle 3s ease-in-out infinite;
    }
    
    @keyframes bounce-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    
    .pulse-subtle {
        animation: pulse-subtle 2s ease-in-out infinite;
    }
    
    @keyframes pulse-subtle {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    .hover-float {
        transition: transform 0.3s ease;
    }
    
    .hover-float:hover {
        transform: translateY(-5px);
    }
    
    .perspective {
        perspective: 1000px;
    }
    
    .typing-container {
        position: relative;
    }
    
    .typing-text::after {
        content: '|';
        margin-left: 2px;
        animation: typing-cursor 0.8s infinite;
    }
    
    @keyframes typing-cursor {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }
    
    /* Cyber grid styling */
    .cyber-grid-cell {
        position: absolute;
        border-radius: 2px;
        transition: all 0.5s ease;
    }
    
    .cyber-grid-cell-blue {
        background-color: rgba(16, 185, 129, 0.4);
        box-shadow: 0 0 5px rgba(16, 185, 129, 0.3);
    }
    
    .cyber-grid-cell-green {
        background-color: rgba(20, 184, 166, 0.4);
        box-shadow: 0 0 5px rgba(20, 184, 166, 0.3);
    }
</style>

@section('content')
<div class="mission-bg min-h-screen py-8 relative">
    <!-- Background mesh grid effect -->
    <div class="mesh-grid"></div>
    
    <!-- Ambient light effect -->
    <div class="mission-ambient-light"></div>
    
    <!-- Spotlight effect -->
    <div class="mission-spotlight"></div>
    
    <div class="container mx-auto max-w-4xl px-4 relative z-10">
        <!-- Mission Header -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 mr-3 text-danger-400">
                        @switch($mission['id'])
                            @case(1)
                                <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                                <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                                @break
                            @case(2)
                                <path fill-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 00-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 00-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 00.75-.75v-1.5h1.5A.75.75 0 009 19.5V18h1.5a.75.75 0 00.75-.75V15h1.5a.75.75 0 00.75-.75v-1.5h1.5a.75.75 0 00.75-.75V9.262c.219-.313.41-.641.547-1.008.7-1.898 1.357-3.868 1.357-5.754 0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 9.75c-2.678 0-5.25-.241-7.78-.72A48.672 48.672 0 012.507 9a.75.75 0 00-1.096-.536l-.001.002z" clip-rule="evenodd" />
                                @break
                            @case(3)
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                @break
                            @default
                                <path fill-rule="evenodd" d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z" clip-rule="evenodd" />
                        @endswitch
                    </svg>
                    <h1 class="text-2xl font-game">{{ $mission['title'] }}</h1>
                </div>
                <div class="px-3 py-1 bg-danger-600 text-white text-sm rounded-full">
                    Villain: {{ $mission['villain'] }}
                </div>
            </div>
            <p class="text-white/80">{{ $mission['description'] }}</p>
            <div class="mt-3 flex items-center text-sm">
                <span class="px-2 py-1 bg-primary-700 rounded text-xs mr-2">Level {{ $mission['level'] }}</span>
                <span class="text-white/70">Difficulty: {{ $mission['difficulty'] }}</span>
            </div>
        </div>
        
        <!-- AI Helper -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            <div class="flex items-start space-x-4">
                <div class="w-12 h-12 rounded-full bg-secondary-100 flex-shrink-0 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-secondary-600">
                        <path d="M16.5 7.5h-9v9h9v-9z" />
                        <path fill-rule="evenodd" d="M8.25 2.25A.75.75 0 019 3v.75h2.25V3a.75.75 0 011.5 0v.75H15V3a.75.75 0 011.5 0v.75H16.5A.75.75 0 0116.5 6v12a.75.75 0 01-1.5 0V6a.75.75 0 01.75-.75H9a.75.75 0 01-.75-.75V3a.75.75 0 01.75-.75H15a.75.75 0 01.75.75v.75h1.5A.75.75 0 0118 6v12a.75.75 0 01-1.5 0V6h-1.5a.75.75 0 01-.75-.75V3z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-secondary-300 font-game">Circuit</h3>
                    @switch($mission['id'])
                        @case(1)
                            <p class="text-white/90">Hey {{ $player_name }}! Today we're going to learn about phishing emails. Captain Clickbait is trying to trick people into clicking links that lead to fake websites where he can steal their information.</p>
                            <p class="mt-2 text-white/90">Remember these signs of a phishing email:</p>
                            <ul class="list-disc pl-5 mt-2 space-y-1 text-white/90">
                                <li>Urgency ("Act now!" or "Immediate action required!")</li>
                                <li>Strange email addresses that don't match the company</li>
                                <li>Spelling and grammar mistakes</li>
                                <li>Suspicious links or attachments</li>
                                <li>Requests for personal information</li>
                            </ul>
                            @break
                        @case(2)
                            <p class="text-white/90">Hi {{ $player_name }}! The Key Thief is trying to steal passwords to get into people's accounts. Let's learn how to create strong passwords that are hard to crack!</p>
                            <p class="mt-2 text-white/90">Good passwords should:</p>
                            <ul class="list-disc pl-5 mt-2 space-y-1 text-white/90">
                                <li>Be at least 12 characters long</li>
                                <li>Include uppercase and lowercase letters</li>
                                <li>Include numbers and special characters</li>
                                <li>Not contain personal information like birthdays</li>
                                <li>Be different for each account you have</li>
                            </ul>
                            @break
                        @case(3)
                            <p class="text-white/90">Hi {{ $player_name }}! Profile Phantom is creating fake social media accounts to trick kids. I'll help you learn how to spot these fakes and stay safe online!</p>
                            @break
                        @default
                            <p class="text-white/90">Hello {{ $player_name }}! I'm Circuit, your AI guide. I'll help you complete this mission safely. Pay attention to the details and think critically about what you see!</p>
                    @endswitch
                </div>
            </div>
        </div>
        
        <!-- Mission Content -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            @switch($mission['id'])
                @case(1)
                    <h2 class="text-xl font-game mb-4 text-center text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-teal-400 to-cyan-500 animate__animated animate__fadeIn">The Mysterious Email Challenge</h2>
                    
                    <div class="bg-gray-900/70 backdrop-blur-xl border border-teal-500/30 p-6 rounded-xl shadow-2xl text-white mb-6 relative overflow-hidden code-scanner">
                        <!-- Matrix code rain background -->
                        <canvas id="email-code-rain" class="absolute inset-0 opacity-10"></canvas>
                        
                        <!-- Futuristic cyber grid background -->
                        <div class="absolute inset-0 cyber-grid"></div>
                        
                        <!-- Animated cybersecurity elements -->
                        <div class="absolute top-4 right-4 h-24 w-24 opacity-20 z-10">
                            <svg viewBox="0 0 100 100" class="animate-spin-slow filter drop-shadow-lg">
                                <circle cx="50" cy="50" r="40" stroke="rgba(16, 185, 129, 0.7)" stroke-width="2" fill="none" />
                                <circle cx="50" cy="50" r="30" stroke="rgba(20, 184, 166, 0.7)" stroke-width="2" fill="none" />
                                <path d="M50 10 L50 90 M10 50 L90 50" stroke="rgba(6, 182, 212, 0.7)" stroke-width="2" />
                            </svg>
                        </div>
                        
                        <!-- Scanner line effect -->
                        <div class="email-scanner-line"></div>
                        
                        <div class="relative z-10">
                            <!-- Stage navigation with matrix-style design -->
                            <div class="flex justify-center mb-8 perspective">
                                <div class="flex items-center space-x-3 bg-gray-900/70 p-1 rounded-full border border-cyan-500/20 shadow-lg shadow-cyan-500/10">
                                    <button id="phishing-stage1-btn" class="px-5 py-2 bg-gradient-to-r from-primary-600 to-cyan-600 text-white rounded-full font-bold phishing-stage-btn active transition-all duration-300 transform hover:scale-105">Email Basics</button>
                                    <button id="phishing-stage2-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold phishing-stage-btn transition-all duration-300 transform hover:scale-105">Outlook Phishing</button>
                                    <button id="phishing-stage3-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold phishing-stage-btn transition-all duration-300 transform hover:scale-105">Gmail Phishing</button>
                                    <button id="phishing-stage4-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold phishing-stage-btn transition-all duration-300 transform hover:scale-105">SMS Scams</button>
                                    <button id="phishing-stage5-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold phishing-stage-btn transition-all duration-300 transform hover:scale-105">Final Test</button>
                                </div>
                            </div>
                            
                            <!-- Cartoon Character Assistant with improved animation -->
                            <div class="flex items-start mb-6">
                                <div class="w-3/4 pr-4">
                                    <div class="flex items-start space-x-4 bg-gray-900/80 p-4 rounded-lg border border-cyan-500/30 shadow-lg shadow-cyan-500/5 animate__animated animate__fadeIn transform transition-all duration-500 hover:shadow-cyan-400/20">
                                        <div class="flex-shrink-0">
                                            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-primary-500 to-secondary-600 flex items-center justify-center overflow-hidden border-2 border-cyan-400/30 shadow-lg pulse-subtle">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10 text-white">
                                                    <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm4.59-12.42L10 14.17l-2.59-2.58L6 13l4 4 8-8z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-gray-800/90 p-3 rounded-lg rounded-tl-none relative typing-container">
                                                <div class="absolute -left-2 top-0 w-0 h-0 border-t-8 border-r-8 border-gray-800/90 border-l-transparent"></div>
                                                <p class="text-cyan-100 text-sm font-medium typing-text" id="phishing-assistant-text"></p>
                                            </div>
                                            <div class="mt-2 text-xs text-cyan-300 font-medium">PhishGuard - Email Security Expert</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="w-1/4 flex justify-center items-start">
                                    <div class="bounce-subtle">
                                        <img src="https://cdn-icons-png.flaticon.com/512/1691/1691945.png" alt="PhishGuard Character" class="h-32 filter drop-shadow-lg hover-float">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Stage 1: Email Basics -->
                            <div id="phishing-stage1" class="phishing-stage active transform transition-opacity duration-500">
                                <div class="bg-gray-900/50 backdrop-blur-md rounded-lg p-5 text-gray-200 mb-6 border border-cyan-500/20 shadow-lg hover-glow">
                                    <div class="border-b border-cyan-500/30 pb-2 mb-3">
                                        <div class="flex justify-between">
                                            <div>
                                                <p class="font-semibold">From: <span class="text-danger-400">prize-alert@amazen-reward.net</span></p>
                                                <p>To: you@example.com</p>
                                                <p>Subject: <span class="font-bold text-danger-300">URGENT: Your $1000 Gift Card is expiring TODAY!</span></p>
                                            </div>
                                            <div class="text-cyan-300 text-sm">
                                                Today, 9:42 AM
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="email-content">
                                        <p class="font-bold mb-2 text-danger-300">CONGRADULATIONS! YOU'VE BEEN SELECTED!</p>
                                        <p class="mb-3">Dear Customer,</p>
                                        <p class="mb-3">Your account has been selected to receive a $1000 Amazen Gift Card! You must claim this award in the next 2 HOURS or it will be given to someone else!</p>
                                        <p class="mb-3">To claim your prize immedietely, click the link below and enter your account details to verify your identity:</p>
                                        <p class="mb-4 text-center">
                                            <a href="#" class="px-4 py-2 bg-yellow-400 text-black font-bold rounded hover:bg-yellow-500 inline-block transform transition-transform duration-300 hover:scale-105 suspicious-link">CLAIM YOUR $1000 GIFT CARD NOW!</a>
                                        </p>
                                        <p class="mb-3">If you don't claim in the next 2 hours, your prize will be FORFITTED!</p>
                                        <p class="text-sm text-gray-500">Amazen Rewards Team</p>
                                    </div>
                                </div>
                                
                                <h3 class="font-game text-lg mb-4 text-teal-300">Find the clues that show this is a phishing email:</h3>
                                
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center checkbox-wrapper">
                                        <input type="checkbox" id="clue1" name="clues[]" value="spelling" class="mr-2 h-5 w-5 cyber-checkbox">
                                        <label for="clue1" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Has spelling and grammar mistakes</label>
                                    </div>
                                    
                                    <div class="flex items-center checkbox-wrapper">
                                        <input type="checkbox" id="clue2" name="clues[]" value="sender" class="mr-2 h-5 w-5 cyber-checkbox">
                                        <label for="clue2" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Sender email address doesn't match a real company</label>
                                    </div>
                                    
                                    <div class="flex items-center checkbox-wrapper">
                                        <input type="checkbox" id="clue3" name="clues[]" value="urgency" class="mr-2 h-5 w-5 cyber-checkbox">
                                        <label for="clue3" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Creates a false sense of urgency</label>
                                    </div>
                                    
                                    <div class="flex items-center checkbox-wrapper">
                                        <input type="checkbox" id="clue4" name="clues[]" value="offer" class="mr-2 h-5 w-5 cyber-checkbox">
                                        <label for="clue4" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Offers something too good to be true</label>
                                    </div>
                                    
                                    <div class="flex items-center checkbox-wrapper">
                                        <input type="checkbox" id="clue5" name="clues[]" value="link" class="mr-2 h-5 w-5 cyber-checkbox">
                                        <label for="clue5" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Contains a suspicious link that asks for account details</label>
                                    </div>
                                </div>
                                
                                <div class="border-t border-teal-500/30 pt-4 mt-4">
                                    <h3 class="font-game text-lg mb-2 text-teal-300">What should you do with this email?</h3>
                                    <div class="space-y-2">
                                        <div class="flex items-center radio-wrapper">
                                            <input type="radio" id="action1" name="action" value="click" class="mr-2 h-5 w-5 cyber-radio">
                                            <label for="action1" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Click the link to see if the offer is real</label>
                                        </div>
                                        <div class="flex items-center radio-wrapper">
                                            <input type="radio" id="action2" name="action" value="ignore" class="mr-2 h-5 w-5 cyber-radio">
                                            <label for="action2" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Ignore the email and do not click any links</label>
                                        </div>
                                        <div class="flex items-center radio-wrapper">
                                            <input type="radio" id="action3" name="action" value="reply" class="mr-2 h-5 w-5 cyber-radio">
                                            <label for="action3" class="text-cyan-100 hover:text-cyan-300 transition-colors duration-300">Reply to ask for more information</label>
                                        </div>
                                        <div class="flex items-center radio-wrapper">
                                            <input type="radio" id="action4" name="action" value="report" class="mr-2 h-5 w-5 cyber-radio">
                                            <label for="action4" class="text-cyan-100 hover:text-cyan-300 transition-colors duration-300">Mark as spam/phishing and delete the email</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 text-center">
                                    <button id="check-basics" class="cyber-button px-8 py-3 bg-gradient-to-r from-primary-600 to-cyan-600 hover:from-primary-700 hover:to-cyan-700 text-white font-bold rounded-md transition-all duration-300 relative overflow-hidden shadow-lg shadow-primary-500/20 hover:shadow-primary-500/40 transform hover:translate-y-[-3px]">
                                        <span class="relative z-10">Check My Answers</span>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Stage 2: Outlook Phishing -->
                            <div id="phishing-stage2" class="phishing-stage hidden transform transition-opacity duration-500">
                                <h3 class="font-game text-lg mb-4 text-center text-teal-300">Outlook Email Security Challenge</h3>
                                <p class="text-center text-cyan-100 mb-6">Practice identifying phishing attempts in a realistic Outlook environment!</p>
                                
                                <div class="bg-gradient-to-br from-blue-900/30 to-gray-900/50 rounded-lg p-5 border border-blue-500/20 shadow-lg mb-6">
                                    <!-- Outlook Interface Header -->
                                    <div class="bg-blue-600 text-white p-3 rounded-t-lg flex items-center justify-between mb-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-6 h-6 bg-white rounded flex items-center justify-center">
                                                <span class="text-blue-600 font-bold text-sm">O</span>
                                            </div>
                                            <span class="font-semibold">Outlook</span>
                                        </div>
                                        <div class="text-sm">your.email@company.com</div>
                                    </div>
                                    
                                    <!-- Email List -->
                                    <div class="bg-white rounded-lg p-4 text-gray-800">
                                        <div class="border-b pb-2 mb-3">
                                            <h4 class="font-semibold text-lg">Inbox</h4>
                                        </div>
                                        
                                        <!-- Suspicious Email -->
                                        <div class="border border-red-200 rounded-lg p-4 bg-red-50 cursor-pointer hover:bg-red-100 transition-colors duration-300" id="outlook-email">
                                            <div class="flex justify-between items-start mb-2">
                                                <div>
                                                    <p class="font-semibold text-red-600">IT-Security@company-helpdesk.net</p>
                                                    <p class="text-sm text-gray-600">To: your.email@company.com</p>
                                                </div>
                                                <span class="text-xs text-gray-500">2 minutes ago</span>
                                            </div>
                                            <p class="font-bold mb-2 text-red-700">URGENT: Security Verification Required</p>
                                            <p class="text-sm text-gray-700 mb-3">Your account will be suspended in 1 hour unless you verify your credentials immediately. Click here to verify: <span class="text-blue-600 underline">secure-company-login.net/verify</span></p>
                                            <div class="flex items-center text-xs text-gray-500">
                                                <span class="mr-4">📎 Attachment: security_form.exe</span>
                                                <span class="bg-red-100 text-red-600 px-2 py-1 rounded">Flagged by security</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-gray-900/50 backdrop-blur-md rounded-lg p-5 text-gray-200 mb-6 border border-teal-500/20 shadow-lg">
                                    <h3 class="font-game text-lg mb-4 text-teal-300">What makes this email suspicious? (Select all that apply)</h3>
                                    
                                    <div class="space-y-3 mb-6">
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="outlook-clue1" name="outlook-clues[]" value="domain" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="outlook-clue1" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Sender domain doesn't match company domain</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="outlook-clue2" name="outlook-clues[]" value="urgency" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="outlook-clue2" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Creates false urgency about account suspension</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="outlook-clue3" name="outlook-clues[]" value="link" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="outlook-clue3" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Suspicious external link for credential verification</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="outlook-clue4" name="outlook-clues[]" value="attachment" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="outlook-clue4" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Dangerous executable attachment (.exe file)</label>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t border-teal-500/30 pt-4 mt-4">
                                        <h3 class="font-game text-lg mb-2 text-teal-300">Best action to take:</h3>
                                        <div class="space-y-2">
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="outlook-action1" name="outlook-action" value="click" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="outlook-action1" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Click the link to verify account</label>
                                            </div>
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="outlook-action2" name="outlook-action" value="download" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="outlook-action2" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Download and open the attachment</label>
                                            </div>
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="outlook-action3" name="outlook-action" value="forward" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="outlook-action3" class="text-cyan-100 hover:text-cyan-300 transition-colors duration-300">Forward to IT department</label>
                                            </div>
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="outlook-action4" name="outlook-action" value="report" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="outlook-action4" class="text-cyan-100 hover:text-cyan-300 transition-colors duration-300">Report as phishing and delete immediately</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-6 text-center">
                                        <button id="check-outlook" class="cyber-button px-8 py-3 bg-gradient-to-r from-primary-600 to-cyan-600 hover:from-primary-700 hover:to-cyan-700 text-white font-bold rounded-md transition-all duration-300 relative overflow-hidden shadow-lg shadow-primary-500/20 hover:shadow-primary-500/40 transform hover:translate-y-[-3px]">
                                            <span class="relative z-10">Check My Answers</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Stage 3: Gmail Phishing -->
                            <div id="phishing-stage3" class="phishing-stage hidden transform transition-opacity duration-500">
                                <h3 class="font-game text-lg mb-4 text-center text-teal-300">Gmail Security Assessment</h3>
                                <p class="text-center text-cyan-100 mb-6">Test your skills in spotting Gmail phishing attempts!</p>
                                
                                <div class="bg-gradient-to-br from-red-900/30 to-gray-900/50 rounded-lg p-5 border border-red-500/20 shadow-lg mb-6">
                                    <!-- Gmail Interface -->
                                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                        <!-- Gmail Header -->
                                        <div class="bg-red-500 text-white p-3 flex items-center justify-between">
                                            <div class="flex items-center space-x-2">
                                                <span class="font-bold text-lg">Gmail</span>
                                            </div>
                                            <div class="text-sm">student@university.edu</div>
                                        </div>
                                        
                                        <!-- Email Content -->
                                        <div class="p-4 text-gray-800">
                                            <div class="border-l-4 border-yellow-400 bg-yellow-50 p-4 mb-4">
                                                <div class="flex items-center">
                                                    <div class="text-yellow-600 mr-2">⚠️</div>
                                                    <span class="text-sm font-medium">Be careful with this message. It may be a phishing attempt.</span>
                                                </div>
                                            </div>
                                            
                                            <div class="gmail-email">
                                                <div class="border-b pb-3 mb-4">
                                                    <div class="flex justify-between items-start">
                                                        <div>
                                                            <p class="font-semibold text-gray-900">Google Security Team &lt;no-reply@google-security.info&gt;</p>
                                                            <p class="text-sm text-gray-600">to me</p>
                                                        </div>
                                                        <span class="text-xs text-gray-500">3:24 PM</span>
                                                    </div>
                                                    <p class="font-bold text-lg mt-2 text-red-600">Critical Security Alert: Suspicious Activity Detected</p>
                                                </div>
                                                
                                                <div class="space-y-3 text-gray-700">
                                                    <p>Dear Google User,</p>
                                                    <p>We detected suspicious login attempts from an unknown device in <span class="font-semibold text-red-600">Russia</span>. Your account security may be compromised.</p>
                                                    <p><span class="font-bold text-red-600">IMMEDIATE ACTION REQUIRED:</span> To secure your account, you must verify your identity within the next 24 hours.</p>
                                                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 my-4">
                                                        <p class="font-semibold mb-2">Recent suspicious activities:</p>
                                                        <ul class="list-disc list-inside space-y-1 text-sm">
                                                            <li>Login attempt from Moscow, Russia (IP: 194.87.xx.xxx)</li>
                                                            <li>Password change attempt detected</li>
                                                            <li>Unusual email forwarding rules created</li>
                                                        </ul>
                                                    </div>
                                                    <p class="text-center">
                                                        <a href="#" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors suspicious-gmail-link">VERIFY ACCOUNT NOW</a>
                                                    </p>
                                                    <p class="text-xs text-gray-500">If you do not verify within 24 hours, your account will be temporarily suspended for security reasons.</p>
                                                    <p class="text-xs text-gray-500">Google Security Team</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-gray-900/50 backdrop-blur-md rounded-lg p-5 text-gray-200 mb-6 border border-teal-500/20 shadow-lg">
                                    <h3 class="font-game text-lg mb-4 text-teal-300">Analyze this Gmail phishing attempt (Select all red flags):</h3>
                                    
                                    <div class="space-y-3 mb-6">
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="gmail-clue1" name="gmail-clues[]" value="domain" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="gmail-clue1" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Sender uses fake Google domain (google-security.info)</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="gmail-clue2" name="gmail-clues[]" value="urgency" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="gmail-clue2" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Creates panic with "Critical Security Alert"</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="gmail-clue3" name="gmail-clues[]" value="timeline" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="gmail-clue3" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Demands immediate action within 24 hours</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="gmail-clue4" name="gmail-clues[]" value="button" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="gmail-clue4" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Suspicious "VERIFY ACCOUNT NOW" button</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="gmail-clue5" name="gmail-clues[]" value="warning" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="gmail-clue5" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Gmail shows phishing warning at the top</label>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t border-teal-500/30 pt-4 mt-4">
                                        <h3 class="font-game text-lg mb-2 text-teal-300">What should you do with this email?</h3>
                                        <div class="space-y-2">
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="gmail-action1" name="gmail-action" value="verify" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="gmail-action1" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Click "VERIFY ACCOUNT NOW" to secure account</label>
                                            </div>
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="gmail-action2" name="gmail-action" value="ignore" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="gmail-action2" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Ignore the warning and delete the email</label>
                                            </div>
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="gmail-action3" name="gmail-action" value="check" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="gmail-action3" class="text-cyan-100 hover:text-cyan-300 transition-colors duration-300">Check Google account security through official website</label>
                                            </div>
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="gmail-action4" name="gmail-action" value="report" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="gmail-action4" class="text-cyan-100 hover:text-cyan-300 transition-colors duration-300">Report as phishing and delete</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-6 text-center">
                                        <button id="check-gmail" class="cyber-button px-8 py-3 bg-gradient-to-r from-primary-600 to-cyan-600 hover:from-primary-700 hover:to-cyan-700 text-white font-bold rounded-md transition-all duration-300 relative overflow-hidden shadow-lg shadow-primary-500/20 hover:shadow-primary-500/40 transform hover:translate-y-[-3px]">
                                            <span class="relative z-10">Check My Answers</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Stage 4: SMS Scams -->
                            <div id="phishing-stage4" class="phishing-stage hidden transform transition-opacity duration-500">
                                <h3 class="font-game text-lg mb-4 text-center text-teal-300">SMS Scam Detection</h3>
                                <p class="text-center text-cyan-100 mb-6">Learn to identify dangerous text message scams!</p>
                                
                                <div class="bg-gradient-to-br from-purple-900/30 to-gray-900/50 rounded-lg p-5 border border-purple-500/20 shadow-lg mb-6">
                                    <!-- Phone Interface -->
                                    <div class="max-w-sm mx-auto bg-gray-900 rounded-3xl p-4 shadow-2xl">
                                        <!-- Phone Header -->
                                        <div class="bg-black rounded-2xl p-4 text-white">
                                            <div class="flex justify-center mb-2">
                                                <div class="w-16 h-1 bg-gray-600 rounded-full"></div>
                                            </div>
                                            <div class="text-center text-sm mb-4">Messages</div>
                                            
                                            <!-- SMS Thread -->
                                            <div class="space-y-3">
                                                <!-- Scam Message 1 -->
                                                <div class="bg-gray-700 rounded-2xl rounded-bl-none p-3 max-w-[80%]">
                                                    <p class="text-sm text-white">🚨 ALERT: Your bank account has been FROZEN due to suspicious activity. Verify your identity NOW to prevent permanent closure.</p>
                                                    <p class="text-xs text-gray-400 mt-1">+1 (555) 123-BANK</p>
                                                </div>
                                                
                                                <!-- Scam Message 2 -->
                                                <div class="bg-gray-700 rounded-2xl rounded-bl-none p-3 max-w-[80%]">
                                                    <p class="text-sm text-white">Click here IMMEDIATELY: bit.ly/bank-verify-urgent</p>
                                                    <p class="text-xs text-gray-400 mt-1">+1 (555) 123-BANK</p>
                                                </div>
                                                
                                                <!-- Scam Message 3 -->
                                                <div class="bg-gray-700 rounded-2xl rounded-bl-none p-3 max-w-[80%]">
                                                    <p class="text-sm text-white">Time remaining: 47 minutes. Account will be PERMANENTLY DELETED if not verified!</p>
                                                    <p class="text-xs text-gray-400 mt-1">+1 (555) 123-BANK</p>
                                                </div>
                                                
                                                <!-- Prize Scam -->
                                                <div class="bg-gray-700 rounded-2xl rounded-bl-none p-3 max-w-[80%] mt-6">
                                                    <p class="text-sm text-white">🎉 CONGRATULATIONS! You've won a $1000 Amazon gift card! Claim your prize here: amazn-winner.com/claim</p>
                                                    <p class="text-xs text-gray-400 mt-1">+1 (888) AMAZON</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="bg-gray-900/50 backdrop-blur-md rounded-lg p-5 text-gray-200 mb-6 border border-teal-500/20 shadow-lg">
                                    <h3 class="font-game text-lg mb-4 text-teal-300">Identify the SMS scam tactics (Select all that apply):</h3>
                                    
                                    <div class="space-y-3 mb-6">
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="sms-clue1" name="sms-clues[]" value="impersonation" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="sms-clue1" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Impersonates legitimate bank/company</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="sms-clue2" name="sms-clues[]" value="urgency" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="sms-clue2" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Creates extreme urgency and fear</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="sms-clue3" name="sms-clues[]" value="suspicious-links" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="sms-clue3" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Uses suspicious shortened URLs</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="sms-clue4" name="sms-clues[]" value="countdown" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="sms-clue4" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Uses countdown timer to pressure victims</label>
                                        </div>
                                        <div class="flex items-center checkbox-wrapper">
                                            <input type="checkbox" id="sms-clue5" name="sms-clues[]" value="prize" class="mr-2 h-5 w-5 cyber-checkbox">
                                            <label for="sms-clue5" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Offers unrealistic prizes to lure victims</label>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t border-teal-500/30 pt-4 mt-4">
                                        <h3 class="font-game text-lg mb-2 text-teal-300">Best response to these SMS scams:</h3>
                                        <div class="space-y-2">
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="sms-action1" name="sms-action" value="click" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="sms-action1" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Click the links to verify account status</label>
                                            </div>
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="sms-action2" name="sms-action" value="reply" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="sms-action2" class="text-cyan-100 hover:text-teal-300 transition-colors duration-300">Reply with personal information</label>
                                            </div>
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="sms-action3" name="sms-action" value="forward" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="sms-action3" class="text-cyan-100 hover:text-cyan-300 transition-colors duration-300">Forward to friends as a warning</label>
                                            </div>
                                            <div class="flex items-center radio-wrapper">
                                                <input type="radio" id="sms-action4" name="sms-action" value="delete" class="mr-2 h-5 w-5 cyber-radio">
                                                <label for="sms-action4" class="text-cyan-100 hover:text-cyan-300 transition-colors duration-300">Delete messages and contact bank directly</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-6 text-center">
                                        <button id="check-sms" class="cyber-button px-8 py-3 bg-gradient-to-r from-primary-600 to-cyan-600 hover:from-primary-700 hover:to-cyan-700 text-white font-bold rounded-md transition-all duration-300 relative overflow-hidden shadow-lg shadow-primary-500/20 hover:shadow-primary-500/40 transform hover:translate-y-[-3px]">
                                            <span class="relative z-10">Check My Answers</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Stage 5: Final Test -->
                            <div id="phishing-stage5" class="phishing-stage hidden transform transition-opacity duration-500">
                                <h3 class="font-game text-lg mb-4 text-center text-teal-300">Final Phishing Challenge</h3>
                                <p class="text-center text-cyan-100 mb-6">Test all your phishing detection skills in this comprehensive challenge!</p>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <!-- Challenge 1: Multi-platform Attack -->
                                    <div class="bg-gradient-to-br from-red-900/30 to-gray-900/50 rounded-lg p-5 border border-red-500/20 shadow-lg">
                                        <h4 class="font-bold text-lg mb-3 text-red-400">Challenge 1: Multi-Platform Attack</h4>
                                        <p class="text-sm text-cyan-100 mb-4">You receive these messages across different platforms on the same day:</p>
                                        
                                        <div class="space-y-3 text-xs">
                                            <div class="bg-blue-900/30 p-3 rounded border-l-4 border-blue-400">
                                                <p class="font-semibold text-blue-300">Email: "Your Netflix subscription expires today - Update payment"</p>
                                                <p class="text-gray-300">From: billing@netflix-update.com</p>
                                            </div>
                                            <div class="bg-green-900/30 p-3 rounded border-l-4 border-green-400">
                                                <p class="font-semibold text-green-300">SMS: "Your bank account locked - verify: bit.ly/bank-unlock"</p>
                                                <p class="text-gray-300">From: +1-555-BANK</p>
                                            </div>
                                            <div class="bg-purple-900/30 p-3 rounded border-l-4 border-purple-400">
                                                <p class="font-semibold text-purple-300">Social Media DM: "You won $500! Click here to claim your prize!"</p>
                                                <p class="text-gray-300">From: Official_Prizes_2024</p>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <label class="block text-sm font-medium text-cyan-300 mb-2">What's the common attack pattern?</label>
                                            <select id="final-pattern" class="w-full bg-gray-800 text-white rounded px-3 py-2 border border-gray-600">
                                                <option value="">Select an answer...</option>
                                                <option value="coordinated">Coordinated multi-platform phishing campaign</option>
                                                <option value="coincidence">Random coincidental messages</option>
                                                <option value="legitimate">All legitimate service notifications</option>
                                                <option value="spam">Simple spam messages</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <!-- Challenge 2: Advanced Email Analysis -->
                                    <div class="bg-gradient-to-br from-yellow-900/30 to-gray-900/50 rounded-lg p-5 border border-yellow-500/20 shadow-lg">
                                        <h4 class="font-bold text-lg mb-3 text-yellow-400">Challenge 2: Advanced Email Analysis</h4>
                                        <p class="text-sm text-cyan-100 mb-4">Analyze this sophisticated phishing email:</p>
                                        
                                        <div class="bg-white/10 rounded p-3 text-xs mb-4">
                                            <div class="text-yellow-200 mb-2">
                                                <p><strong>From:</strong> security@microsoft.onmicrosoft.com</p>
                                                <p><strong>Subject:</strong> Microsoft Security Alert: New Device Sign-in</p>
                                                <p><strong>Digital Signature:</strong> ✓ Verified</p>
                                            </div>
                                            <div class="text-gray-200">
                                                <p>We noticed a new sign-in to your Microsoft account from:</p>
                                                <p><strong>Device:</strong> Windows 10 PC</p>
                                                <p><strong>Location:</strong> Your approximate location</p>
                                                <p><strong>Time:</strong> Just now</p>
                                                <p class="mt-2">If this wasn't you, secure your account immediately.</p>
                                                <p class="mt-2 text-center">
                                                    <span class="bg-blue-600 text-white px-4 py-2 rounded">Review Account Activity</span>
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm font-medium text-cyan-300 mb-2">What makes this email particularly dangerous?</label>
                                            <select id="final-danger" class="w-full bg-gray-800 text-white rounded px-3 py-2 border border-gray-600">
                                                <option value="">Select an answer...</option>
                                                <option value="sophisticated">Uses legitimate-looking domain and appears verified</option>
                                                <option value="obvious">Contains obvious spelling errors</option>
                                                <option value="harmless">It's actually a legitimate Microsoft email</option>
                                                <option value="simple">Simple phishing attempt with clear red flags</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Final Knowledge Check -->
                                <div class="bg-gray-900/50 backdrop-blur-md rounded-lg p-5 text-gray-200 mb-6 border border-teal-500/20 shadow-lg">
                                    <h3 class="font-game text-lg mb-4 text-teal-300">Final Knowledge Assessment:</h3>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <p class="font-medium mb-2">1. What should you ALWAYS do before clicking links in emails?</p>
                                            <div class="space-y-2">
                                                <label class="flex items-center">
                                                    <input type="radio" name="final-q1" value="hover" class="mr-2">
                                                    <span class="text-sm">Hover over the link to see the real destination</span>
                                                </label>
                                                <label class="flex items-center">
                                                    <input type="radio" name="final-q1" value="click" class="mr-2">
                                                    <span class="text-sm">Click immediately if it looks legitimate</span>
                                                </label>
                                                <label class="flex items-center">
                                                    <input type="radio" name="final-q1" value="forward" class="mr-2">
                                                    <span class="text-sm">Forward to friends for verification</span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <p class="font-medium mb-2">2. The most effective way to verify a suspicious security email is to:</p>
                                            <div class="space-y-2">
                                                <label class="flex items-center">
                                                    <input type="radio" name="final-q2" value="reply" class="mr-2">
                                                    <span class="text-sm">Reply to the email asking for confirmation</span>
                                                </label>
                                                <label class="flex items-center">
                                                    <input type="radio" name="final-q2" value="direct" class="mr-2">
                                                    <span class="text-sm">Log in directly through the official website/app</span>
                                                </label>
                                                <label class="flex items-center">
                                                    <input type="radio" name="final-q2" value="ignore" class="mr-2">
                                                    <span class="text-sm">Ignore all security emails as fake</span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <p class="font-medium mb-2">3. When should you be MOST suspicious of an email?</p>
                                            <div class="space-y-2">
                                                <label class="flex items-center">
                                                    <input type="radio" name="final-q3" value="combination" class="mr-2">
                                                    <span class="text-sm">When it combines urgency + fear + requests for personal info</span>
                                                </label>
                                                <label class="flex items-center">
                                                    <input type="radio" name="final-q3" value="unknown" class="mr-2">
                                                    <span class="text-sm">Only when it's from unknown senders</span>
                                                </label>
                                                <label class="flex items-center">
                                                    <input type="radio" name="final-q3" value="spelling" class="mr-2">
                                                    <span class="text-sm">Only when it has spelling errors</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-6 text-center">
                                        <button id="check-final" class="cyber-button px-8 py-3 bg-gradient-to-r from-green-600 to-cyan-600 hover:from-green-700 hover:to-cyan-700 text-white font-bold rounded-md transition-all duration-300 relative overflow-hidden shadow-lg shadow-green-500/20 hover:shadow-green-500/40 transform hover:translate-y-[-3px]">
                                            <span class="relative z-10">Complete Final Challenge</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @break
                        @case(2)
                            <h2 class="text-xl font-game mb-4 text-center">Password Strength Challenge</h2>
                            
                            <div class="bg-white/5 backdrop-blur-xl border border-blue-500/30 p-6 rounded-xl shadow-2xl text-white mb-6 relative overflow-hidden">
                                <!-- Futuristic background elements -->
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-900/30 to-purple-900/30"></div>
                                <div class="absolute inset-0">
                                    <div class="grid grid-cols-12 grid-rows-12 gap-2 opacity-10">
                                        @for ($i = 0; $i < 144; $i++)
                                            <div class="h-6 w-full bg-cyan-500/30 rounded"></div>
                                        @endfor
                                    </div>
                                </div>
                                
                                <!-- Animated cybersecurity elements -->
                                <div class="absolute top-0 right-0 h-32 w-32 opacity-20">
                                    <svg viewBox="0 0 100 100" class="animate-spin-slow">
                                        <circle cx="50" cy="50" r="40" stroke="rgba(59, 130, 246, 0.5)" stroke-width="2" fill="none" />
                                        <circle cx="50" cy="50" r="30" stroke="rgba(139, 92, 246, 0.5)" stroke-width="2" fill="none" />
                                        <path d="M50 10 L50 90 M10 50 L90 50" stroke="rgba(236, 72, 153, 0.5)" stroke-width="2" />
                                    </svg>
                                </div>
                                
                                <div class="relative z-10">
                                    <p class="text-center text-xl font-bold mb-4 text-cyan-300">The Key Thief is trying to crack these passwords!</p>
                                    
                                    <!-- Stage navigation -->
                                    <div class="flex justify-center mb-8">
                                        <div class="flex items-center space-x-3 bg-gray-900/50 p-1 rounded-full">
                                            <button id="stage1-btn" class="px-5 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-full font-bold stage-btn active transition-all duration-300">Stage 1</button>
                                            <button id="stage2-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold stage-btn transition-all duration-300">Stage 2</button>
                                            <button id="stage3-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold stage-btn transition-all duration-300">Stage 3</button>
                                            <button id="stage4-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold stage-btn transition-all duration-300">Stage 4</button>
                                        </div>
                                    </div>
                                    
                                    <!-- Stage 1: Password Categories -->
                                    <div id="stage1" class="stage active">
                                        <p class="text-center mb-6 text-cyan-100">Drag each password to its correct strength category:</p>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                            <div class="border-2 border-red-500/50 rounded-lg p-4 bg-gradient-to-b from-red-900/30 to-red-800/10 backdrop-blur-sm">
                                                <h3 class="text-center font-bold mb-3 text-red-400">Weak Passwords</h3>
                                                <div class="min-h-[120px] rounded p-2 password-drop-zone flex flex-col gap-2" data-category="weak">
                                                    <div class="password-item bg-black/40 border border-red-500/30 p-3 mb-2 rounded-lg shadow-lg cursor-grab text-red-300 font-mono transition-transform hover:scale-105 hover:shadow-red-500/20" draggable="true" data-strength="weak">password123</div>
                                                    <div class="password-item bg-black/40 border border-red-500/30 p-3 mb-2 rounded-lg shadow-lg cursor-grab text-red-300 font-mono transition-transform hover:scale-105 hover:shadow-red-500/20" draggable="true" data-strength="weak">qwerty</div>
                                                    <div class="password-item bg-black/40 border border-red-500/30 p-3 rounded-lg shadow-lg cursor-grab text-red-300 font-mono transition-transform hover:scale-105 hover:shadow-red-500/20" draggable="true" data-strength="weak">birthday1990</div>
                                                </div>
                                            </div>
                                            
                                            <div class="border-2 border-yellow-500/50 rounded-lg p-4 bg-gradient-to-b from-yellow-900/30 to-yellow-800/10 backdrop-blur-sm">
                                                <h3 class="text-center font-bold mb-3 text-yellow-400">Medium Passwords</h3>
                                                <div class="min-h-[120px] rounded p-2 password-drop-zone flex flex-col gap-2" data-category="medium">
                                                    <div class="password-item bg-black/40 border border-yellow-500/30 p-3 mb-2 rounded-lg shadow-lg cursor-grab text-yellow-300 font-mono transition-transform hover:scale-105 hover:shadow-yellow-500/20" draggable="true" data-strength="medium">Football2023!</div>
                                                    <div class="password-item bg-black/40 border border-yellow-500/30 p-3 rounded-lg shadow-lg cursor-grab text-yellow-300 font-mono transition-transform hover:scale-105 hover:shadow-yellow-500/20" draggable="true" data-strength="medium">Summer#time</div>
                                                </div>
                                            </div>
                                            
                                            <div class="border-2 border-green-500/50 rounded-lg p-4 bg-gradient-to-b from-green-900/30 to-green-800/10 backdrop-blur-sm">
                                                <h3 class="text-center font-bold mb-3 text-green-400">Strong Passwords</h3>
                                                <div class="min-h-[120px] rounded p-2 password-drop-zone flex flex-col gap-2" data-category="strong">
                                                    <div class="password-item bg-black/40 border border-green-500/30 p-3 mb-2 rounded-lg shadow-lg cursor-grab text-green-300 font-mono transition-transform hover:scale-105 hover:shadow-green-500/20" draggable="true" data-strength="strong">k9$B7vP!zY@2xQ</div>
                                                    <div class="password-item bg-black/40 border border-green-500/30 p-3 rounded-lg shadow-lg cursor-grab text-green-300 font-mono transition-transform hover:scale-105 hover:shadow-green-500/20" draggable="true" data-strength="strong">Elephant-Battery-99!</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="text-center">
                                            <button id="check-categories" class="btn-cyber px-8 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-cyan-500/20 hover:shadow-cyan-500/40">
                                                <span class="relative z-10">Check My Answers</span>
                                            </button>
                                            <p id="category-feedback" class="mt-4 py-2 px-4 rounded-lg hidden"></p>
                                        </div>
                                    </div>
                                    
                                    <!-- Stage 2: Password Strength Tester -->
                                    <div id="stage2" class="stage hidden">
                                        <h3 class="font-bold text-xl text-center mb-6 text-cyan-300">Build Your Password Strength</h3>
                                        
                                        <div class="bg-gradient-to-br from-blue-900/30 to-cyan-900/10 border border-blue-500/30 rounded-xl p-6 mb-8 backdrop-blur-md">
                                            <!-- Cartoon Character Assistant -->
                                            <div class="flex items-start space-x-4 mb-6 bg-blue-900/30 p-4 rounded-lg border border-blue-400/20 animate__animated animate__fadeIn">
                                                <div class="flex-shrink-0">
                                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center overflow-hidden border-2 border-blue-300/50 shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10 text-white">
                                                            <path fill="currentColor" d="M12,2C6.477,2,2,6.477,2,12c0,5.523,4.477,10,10,10s10-4.477,10-10C22,6.477,17.523,2,12,2z M8.5,8C9.328,8,10,8.672,10,9.5 S9.328,11,8.5,11S7,10.328,7,9.5S7.672,8,8.5,8z M17,14.5c0,0.276-0.224,0.5-0.5,0.5h-9C7.224,15,7,14.776,7,14.5v-0.025 c0-2.74,2.238-4.975,4.975-4.975h0.05C14.762,9.5,17,11.735,17,14.475V14.5z M15.5,11c-0.828,0-1.5-0.672-1.5-1.5S14.672,8,15.5,8 S17,8.672,17,9.5S16.328,11,15.5,11z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="bg-blue-800/40 p-3 rounded-lg rounded-tl-none relative">
                                                        <div class="absolute -left-2 top-0 w-0 h-0 border-t-8 border-r-8 border-blue-800/40 border-l-transparent"></div>
                                                        <p class="text-cyan-100 text-sm font-medium" id="password-assistant-text">Hi there! I'm KeyGuard! I'll help you create a super strong password. Start typing, and I'll give you tips to make it stronger!</p>
                                                    </div>
                                                    <div class="mt-2 text-xs text-blue-300 font-medium">KeyGuard - Cyber Security Expert</div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-5">
                                                <label for="password-input" class="block font-bold text-cyan-300 mb-2">Create a password:</label>
                                                <div class="relative">
                                                    <input type="text" id="password-input" class="w-full bg-black/40 border border-blue-500/30 text-white rounded-lg px-4 py-3 font-mono focus:ring-2 focus:ring-cyan-500 focus:border-transparent focus:outline-none transition-all duration-300" placeholder="Type a password">
                                                    <div class="absolute right-3 top-3 text-blue-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <small class="text-blue-300 italic">We're showing the password for this learning exercise only</small>
                                            </div>
                                            
                                            <div class="mb-6">
                                                <div class="flex justify-between mb-1">
                                                    <span class="text-cyan-100">Password strength:</span>
                                                    <span id="strength-text" class="font-bold text-gray-400">None</span>
                                                </div>
                                                <div class="h-3 bg-gray-800 rounded-full overflow-hidden shadow-inner">
                                                    <div id="strength-meter" class="h-full rounded-full transition-all duration-500 ease-out" style="width: 0%; background-color: #ccc;"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="space-y-4 bg-black/20 rounded-lg p-4 border border-blue-500/20">
                                                <div class="flex items-center">
                                                    <div id="length-check" class="w-6 h-6 mr-3 rounded-full bg-gray-700 flex items-center justify-center text-white transition-colors duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" style="display:none">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-cyan-100">At least 12 characters long</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div id="uppercase-check" class="w-6 h-6 mr-3 rounded-full bg-gray-700 flex items-center justify-center text-white transition-colors duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" style="display:none">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-cyan-100">Contains uppercase letters (A-Z)</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div id="lowercase-check" class="w-6 h-6 mr-3 rounded-full bg-gray-700 flex items-center justify-center text-white transition-colors duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" style="display:none">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-cyan-100">Contains lowercase letters (a-z)</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div id="number-check" class="w-6 h-6 mr-3 rounded-full bg-gray-700 flex items-center justify-center text-white transition-colors duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" style="display:none">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-cyan-100">Contains numbers (0-9)</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <div id="special-check" class="w-6 h-6 mr-3 rounded-full bg-gray-700 flex items-center justify-center text-white transition-colors duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" style="display:none">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="text-cyan-100">Contains special characters (!@#$%^&*)</span>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-6 text-center">
                                                <button id="next-stage-2" class="btn-cyber px-8 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-cyan-500/20 hover:shadow-cyan-500/40 hidden">
                                                    <span class="relative z-10">Continue to Stage 3</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Stage 3: Create Memorable Strong Password -->
                                    <div id="stage3" class="stage hidden">
                                        <h3 class="font-bold text-xl text-center mb-6 text-cyan-300">Create a Memorable Strong Password</h3>
                                        
                                        <div class="bg-gradient-to-br from-green-900/30 to-cyan-900/10 border border-green-500/30 rounded-xl p-6 mb-8 backdrop-blur-md">
                                            <!-- Cartoon Character Assistant -->
                                            <div class="flex items-start space-x-4 mb-6 bg-green-900/30 p-4 rounded-lg border border-green-400/20 animate__animated animate__fadeIn">
                                                <div class="flex-shrink-0">
                                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-green-500 to-blue-600 flex items-center justify-center overflow-hidden border-2 border-green-300/50 shadow-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10 text-white">
                                                            <path fill="currentColor" d="M12,2C6.477,2,2,6.477,2,12c0,5.523,4.477,10,10,10s10-4.477,10-10C22,6.477,17.523,2,12,2z M8.5,8C9.328,8,10,8.672,10,9.5 S9.328,11,8.5,11S7,10.328,7,9.5S7.672,8,8.5,8z M17,14.5c0,0.276-0.224,0.5-0.5,0.5h-9C7.224,15,7,14.776,7,14.5v-0.025 c0-2.74,2.238-4.975,4.975-4.975h0.05C14.762,9.5,17,11.735,17,14.475V14.5z M15.5,11c-0.828,0-1.5-0.672-1.5-1.5S14.672,8,15.5,8 S17,8.672,17,9.5S16.328,11,15.5,11z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="bg-green-800/40 p-3 rounded-lg rounded-tl-none relative">
                                                        <div class="absolute -left-2 top-0 w-0 h-0 border-t-8 border-r-8 border-green-800/40 border-l-transparent"></div>
                                                        <p class="text-green-100 text-sm font-medium" id="memorable-assistant-text">Great job getting to this stage! Now let's create a password that's both strong AND easy to remember. Try using the passphrase method below!</p>
                                                    </div>
                                                    <div class="mt-2 text-xs text-green-300 font-medium">KeyGuard - Cyber Security Expert</div>
                                                </div>
                                            </div>
                                        
                                            <p class="mb-5 text-cyan-100">Now that you know what makes a strong password, let's create one that's both strong AND easy to remember!</p>
                                            
                                            <div class="mb-6 bg-black/30 border border-green-500/20 rounded-lg p-5">
                                                <h4 class="font-bold mb-3 text-green-400">Try the passphrase method:</h4>
                                                <ol class="list-decimal pl-5 space-y-3 text-cyan-100">
                                                    <li>Think of 3-4 random words <span class="text-green-400 font-mono">(like "elephant banana rocket")</span></li>
                                                    <li>Add numbers <span class="text-green-400 font-mono">(like "elephant7banana2rocket")</span></li>
                                                    <li>Add special characters <span class="text-green-400 font-mono">(like "elephant7!banana2#rocket")</span></li>
                                                    <li>Add some capital letters <span class="text-green-400 font-mono">(like "Elephant7!Banana2#Rocket")</span></li>
                                                </ol>
                                            </div>
                                            
                                            <div class="mb-5">
                                                <label for="final-password" class="block font-bold text-green-400 mb-2">Your memorable strong password:</label>
                                                <div class="relative">
                                                    <input type="text" id="final-password" class="w-full bg-black/40 border border-green-500/30 text-white rounded-lg px-4 py-3 font-mono focus:ring-2 focus:ring-green-500 focus:border-transparent focus:outline-none transition-all duration-300" placeholder="Create your memorable password">
                                                    <div class="absolute right-3 top-3 text-green-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-5">
                                                <div class="flex justify-between mb-1">
                                                    <span class="text-cyan-100">Final password strength:</span>
                                                    <span id="final-strength-text" class="font-bold text-gray-400">None</span>
                                                </div>
                                                <div class="h-3 bg-gray-800 rounded-full overflow-hidden shadow-inner">
                                                    <div id="final-strength-meter" class="h-full rounded-full transition-all duration-500 ease-out" style="width: 0%; background-color: #ccc;"></div>
                                                </div>
                                            </div>
                                            
                                            <div id="final-feedback" class="mt-5 p-4 rounded-lg border hidden"></div>
                                            
                                            <div class="mt-6 text-center">
                                                <button id="next-stage-3" class="btn-cyber px-8 py-3 bg-gradient-to-r from-green-600 to-cyan-600 hover:from-green-700 hover:to-cyan-700 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-green-500/20 hover:shadow-green-500/40 hidden">
                                                    <span class="relative z-10">Continue to Final Stage</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Stage 4: Google-style Login Screen -->
                                    <div id="stage4" class="stage hidden">
                                        <h3 class="font-bold text-xl text-center mb-6 text-cyan-300">Test Your Password</h3>
                                        
                                        <div class="max-w-md mx-auto">
                                            <!-- Cartoon Character Assistant -->
                                            <div class="flex items-start space-x-4 mb-6 bg-purple-900/30 p-4 rounded-lg border border-purple-400/20 animate__animated animate__fadeIn">
                                                <div class="flex-shrink-0">
                                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center overflow-hidden border-2 border-purple-300/50 shadow-lg animate-pulse-slow">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10 text-white">
                                                            <path fill="currentColor" d="M12,2C6.477,2,2,6.477,2,12c0,5.523,4.477,10,10,10s10-4.477,10-10C22,6.477,17.523,2,12,2z M8.5,8C9.328,8,10,8.672,10,9.5 S9.328,11,8.5,11S7,10.328,7,9.5S7.672,8,8.5,8z M17,14.5c0,0.276-0.224,0.5-0.5,0.5h-9C7.224,15,7,14.776,7,14.5v-0.025 c0-2.74,2.238-4.975,4.975-4.975h0.05C14.762,9.5,17,11.735,17,14.475V14.5z M15.5,11c-0.828,0-1.5-0.672-1.5-1.5S14.672,8,15.5,8 S17,8.672,17,9.5S16.328,11,15.5,11z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="bg-purple-800/40 p-3 rounded-lg rounded-tl-none relative">
                                                        <div class="absolute -left-2 top-0 w-0 h-0 border-t-8 border-r-8 border-purple-800/40 border-l-transparent"></div>
                                                        <p class="text-purple-100 text-sm font-medium" id="login-assistant-text">Now the final test! Can you remember the strong password you created? I'll need you to type it in exactly the same way to prove you can recall it!</p>
                                                    </div>
                                                    <div class="mt-2 text-xs text-purple-300 font-medium">KeyGuard - Cyber Security Expert</div>
                                                </div>
                                            </div>
                                        
                                            <div class="bg-white rounded-xl p-8 shadow-2xl" id="google-login">
                                                <!-- Google Logo -->
                                                <div class="flex justify-center mb-6">
                                                    <svg viewBox="0 0 75 24" width="75" height="24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <g id="qaEJec">
                                                            <path fill="#ea4335" d="M67.954 16.303c-1.33 0-2.278-.608-2.886-1.804l7.967-3.3-.27-.68c-.495-1.33-2.008-3.79-5.102-3.79-3.068 0-5.622 2.41-5.622 5.96 0 3.34 2.53 5.96 5.92 5.96 2.73 0 4.31-1.67 4.97-2.64l-2.03-1.35c-.673.98-1.6 1.64-2.93 1.64zm-.203-7.27c1.04 0 1.92.52 2.21 1.264l-5.32 2.21c-.06-2.3 1.79-3.474 3.12-3.474z"></path>
                                                        </g>
                                                        <g id="YGlOvc">
                                                            <path fill="#34a853" d="M58.193.67h2.564v17.44h-2.564z"></path>
                                                        </g>
                                                        <g id="BWfIk">
                                                            <path fill="#4285f4" d="M54.152 8.066h-.088c-.588-.697-1.716-1.33-3.136-1.33-2.98 0-5.71 2.614-5.71 5.98 0 3.338 2.73 5.933 5.71 5.933 1.42 0 2.548-.64 3.136-1.36h.088v.86c0 2.28-1.217 3.5-3.183 3.5-1.61 0-2.6-1.15-3-2.12l-2.28.94c.65 1.58 2.39 3.52 5.28 3.52 3.06 0 5.66-1.807 5.66-6.206V7.21h-2.48v.858zm-3.006 8.237c-1.804 0-3.318-1.513-3.318-3.588 0-2.1 1.514-3.635 3.318-3.635 1.784 0 3.183 1.534 3.183 3.635 0 2.075-1.4 3.588-3.19 3.588z"></path>
                                                        </g>
                                                        <g id="e6m3fd">
                                                            <path fill="#fbbc05" d="M38.17 6.735c-3.28 0-5.953 2.506-5.953 5.96 0 3.432 2.673 5.96 5.954 5.96 3.29 0 5.96-2.528 5.96-5.96 0-3.46-2.67-5.96-5.95-5.96zm0 9.568c-1.798 0-3.348-1.487-3.348-3.61 0-2.14 1.55-3.608 3.35-3.608s3.348 1.467 3.348 3.61c0 2.116-1.55 3.608-3.35 3.608z"></path>
                                                        </g>
                                                        <g id="vbkDmc">
                                                            <path fill="#ea4335" d="M25.17 6.71c-3.28 0-5.954 2.505-5.954 5.958 0 3.433 2.673 5.96 5.954 5.96 3.282 0 5.955-2.527 5.955-5.96 0-3.453-2.673-5.96-5.955-5.96zm0 9.567c-1.8 0-3.35-1.487-3.35-3.61 0-2.14 1.55-3.608 3.35-3.608s3.35 1.46 3.35 3.6c0 2.12-1.55 3.61-3.35 3.61z"></path>
                                                        </g>
                                                        <g id="idEJde">
                                                            <path fill="#4285f4" d="M14.11 14.182c.722-.723 1.205-1.78 1.387-3.334H9.423V8.373h8.518c.09.452.16 1.07.16 1.664 0 1.903-.52 4.26-2.19 5.934-1.63 1.7-3.71 2.61-6.48 2.61-5.12 0-9.42-4.17-9.42-9.29C0 4.17 4.31 0 9.43 0c2.83 0 4.843 1.108 6.362 2.56L14 4.347c-1.087-1.02-2.56-1.81-4.577-1.81-3.74 0-6.662 3.01-6.662 6.75s2.93 6.75 6.67 6.75c2.43 0 3.81-.972 4.69-1.856z"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                
                                                <h2 class="text-2xl font-normal text-center mb-2 text-gray-800">Sign in</h2>
                                                <p class="text-center mb-6 text-gray-600">to continue to Gmail</p>
                                                
                                                <div class="mb-4" id="login-stage-1">
                                                    <div class="mb-5">
                                                        <label for="google-email" class="block text-xs font-medium text-gray-600 mb-1">Email or phone</label>
                                                        <input type="email" id="google-email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" value="cyber.explorer@gmail.com" readonly>
                                                    </div>
                                                    
                                                    <div class="text-sm mb-6">
                                                        <span class="text-gray-600">Not your computer? Use Guest mode to sign in privately.</span>
                                                        <a href="#" class="text-blue-600 font-medium ml-1">Learn more</a>
                                                    </div>
                                                    
                                                    <div class="flex justify-between items-center">
                                                        <a href="#" class="text-blue-600 font-medium text-sm">Create account</a>
                                                        <button id="next-login" class="px-6 py-2 bg-blue-500 text-white font-medium rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Next</button>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-4 hidden" id="login-stage-2">
                                                    <div class="flex items-center mb-6">
                                                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-3">C</div>
                                                        <div>
                                                            <div class="text-gray-800">cyber.explorer@gmail.com</div>
                                                            <button id="back-to-email" class="text-sm text-gray-600 hover:text-gray-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                                                </svg>
                                                                Change account
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="mb-5">
                                                        <label for="password-confirm" class="block text-xs font-medium text-gray-600 mb-1">Enter your password</label>
                                                        <input type="password" id="password-confirm" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                                        <div id="password-error" class="text-red-500 text-sm mt-1 hidden">Wrong password. Try again.</div>
                                                    </div>
                                                    
                                                    <div class="flex items-center mb-5">
                                                        <input type="checkbox" id="show-password" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                                        <label for="show-password" class="ml-2 block text-sm text-gray-600">Show password</label>
                                                    </div>
                                                    
                                                    <div class="flex justify-between items-center">
                                                        <a href="#" class="text-blue-600 font-medium text-sm">Forgot password?</a>
                                                        <button id="login-submit" class="px-6 py-2 bg-blue-500 text-white font-medium rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Next</button>
                                                    </div>
                                                </div>
                                                
                                                <div class="hidden text-center py-6" id="login-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-green-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <h3 class="text-xl font-medium text-gray-800 mb-2">Login Successful!</h3>
                                                    <p class="text-gray-600 mb-4">You've created and remembered a strong password.</p>
                                                    <button id="complete-mission" class="px-8 py-3 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                                        Complete Mission
                                                    </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form id="mission-form" action="{{ route('game.submit-mission', ['id' => $mission['id']]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="stage1_complete" id="stage1_complete" value="0">
                        <input type="hidden" name="stage2_complete" id="stage2_complete" value="0">
                        <input type="hidden" name="stage3_complete" id="stage3_complete" value="0">
                        <input type="hidden" name="stage4_complete" id="stage4_complete" value="0">
                        <input type="hidden" name="password_score" id="password_score" value="0">
                        <input type="hidden" name="final_password" id="final_password_hidden" value="">
                        
                        <div class="mt-6 text-center hidden">
                            <button type="submit" id="submit-mission" class="btn-primary px-8 py-3" disabled>
                                Complete Mission
                            </button>
                        </div>
                    </form>
                    @break
                    
                @case(3)
                    <h2 class="text-xl font-game mb-4 text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-400 to-cyan-400 animate__animated animate__fadeIn">Social Media Mayhem Challenge</h2>
                    
                    @php
                        // Always allow access to Social Media Mayhem mission
                        $canAccessMission = true;
                    @endphp
                    
                    <!-- Enhanced background elements -->
                    <div class="social-media-bg absolute top-0 left-0 w-full h-full -z-20"></div>
                    <div class="circuit-lines absolute top-0 left-0 w-full h-full -z-20"></div>
                    <div class="horizontal-scan absolute top-0 left-0 w-full -z-20"></div>
                    
                    <!-- Digital nodes (will be populated by JS) -->
                    <div class="digital-nodes absolute top-0 left-0 w-full h-full -z-20"></div>
                    
                    <!-- Digital rain effect (will be populated by JS) -->
                    <div class="digital-rain absolute top-0 left-0 w-full h-full -z-20"></div>
                    
                    <!-- Matrix-like code rain background -->
                    <canvas id="social-code-rain" class="absolute top-0 left-0 w-full h-full -z-10"></canvas>
                    
                    <div class="bg-gray-900/90 backdrop-blur-xl border border-cyan-500/30 p-6 rounded-xl shadow-2xl text-white mb-6 relative overflow-hidden code-scanner">
                        <!-- Futuristic background elements -->
                        <div class="absolute inset-0 cyber-grid"></div>
                        
                        <!-- Scanner line effect -->
                        <div class="cyber-scanner-line"></div>
                        
                        <!-- Animated cybersecurity elements -->
                        <div class="absolute top-0 right-0 h-32 w-32 opacity-20 z-10">
                            <svg viewBox="0 0 100 100" class="animate-spin-slow filter drop-shadow-lg">
                                <circle cx="50" cy="50" r="40" stroke="rgba(139, 92, 246, 0.7)" stroke-width="2" fill="none" />
                                <circle cx="50" cy="50" r="30" stroke="rgba(59, 130, 246, 0.7)" stroke-width="2" fill="none" />
                                <path d="M50 10 L50 90 M10 50 L90 50" stroke="rgba(236, 72, 153, 0.7)" stroke-width="2" />
                            </svg>
                        </div>
                        
                        <!-- Floating digital particles -->
                        <div class="floating-particle" style="top: 20%; left: 10%;"></div>
                        <div class="floating-particle" style="top: 60%; left: 80%;"></div>
                        <div class="floating-particle" style="top: 80%; left: 30%;"></div>
                        <div class="floating-particle" style="top: 30%; left: 70%;"></div>
                        <div class="floating-particle" style="top: 50%; left: 40%;"></div>
                        
                        <div class="relative z-10">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <!-- SocialShield Character -->
                                    <div class="relative mr-4 perspective transform hover-float">
                                        <div class="absolute -top-1 -left-1 w-24 h-24 rounded-full bg-gradient-to-r from-cyan-400 to-teal-500 animate-pulse-slow opacity-50 glow-effect"></div>
                                        <img src="https://cdn-icons-png.flaticon.com/512/2371/2371580.png" alt="SocialShield" class="w-20 h-20 object-contain relative z-10 animate__animated animate__bounce">
                                </div>
                                    <div>
                                        <h2 class="text-2xl font-game mb-1 text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-cyan-400 to-teal-300">CYBER MISSION: <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-emerald-300">Social Media Mayhem</span></h2>
                                        <p class="text-white/90 matrix-text">Help SocialShield defeat the mischievous Profile Phantom!</p>
                            </div>
                                </div>
                                <!-- Villain Character -->
                                <div class="relative transform hover-float">
                                    <div class="absolute -top-1 -left-1 w-24 h-24 rounded-full bg-gradient-to-r from-red-500 to-cyan-500 animate-pulse-slow opacity-50 glow-effect"></div>
                                    <div class="relative overflow-hidden w-20 h-20 rounded-full border-2 border-cyan-500/50 bg-gray-900/60">
                                        <img src="https://cdn-icons-png.flaticon.com/512/1680/1680422.png" alt="Profile Phantom" class="w-16 h-16 object-contain absolute top-2 left-2 animate__animated animate__pulse animate__infinite villain-shake">
                                    </div>
                                    <div class="absolute -bottom-2 right-0 bg-gradient-to-r from-cyan-600 to-teal-500 text-white text-xs px-2 py-1 rounded-full animate__animated animate__flash animate__infinite animate__slow cyber-badge">VILLAIN</div>
                                </div>
                            </div>
                            
                            <!-- Mission Intro -->
                            <div class="mt-6 bg-gray-900/40 backdrop-blur-md p-4 rounded-lg border border-cyan-500/30 animate__animated animate__fadeIn hover-glow">
                                <div class="flex items-start">
                                    <div class="mr-3 flex-shrink-0 mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-400 pulse-subtle" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="mb-2 text-lg font-bold text-cyan-300 typing-container">
                                            <span class="typing-text">MISSION BRIEFING:</span>
                                        </p>
                                        <p class="text-white/90">Hey there, <span class="text-cyan-300 font-bold">{{ $player_name }}</span>! Profile Phantom is creating fake social media accounts and groups to trick kids. Complete all three challenges to earn your <span class="text-cyan-300 font-bold">Cyber Safety Badges</span> and protect the digital world!</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Badge Collection Preview -->
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-gray-900/40 backdrop-blur-md p-4 rounded-lg border border-cyan-500/30 text-center transform transition-all duration-300 hover:scale-105 hover-glow">
                                    <div class="w-16 h-16 mx-auto relative mb-2">
                                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-teal-500 rounded-full opacity-20 animate-pulse-slow"></div>
                                        <img src="https://cdn-icons-png.flaticon.com/512/3487/3487884.png" alt="Detective Badge" class="w-full h-full object-contain relative z-10 bounce-subtle">
                                    </div>
                                    <h3 class="text-lg font-bold text-cyan-300">Detective Badge</h3>
                                    <p class="text-xs text-cyan-200 mt-1">Spot the Fake!</p>
                                </div>
                                <div class="bg-gray-900/40 backdrop-blur-md p-4 rounded-lg border border-cyan-500/30 text-center transform transition-all duration-300 hover:scale-105 hover-glow">
                                    <div class="w-16 h-16 mx-auto relative mb-2">
                                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-teal-500 rounded-full opacity-20 animate-pulse-slow"></div>
                                        <img src="https://cdn-icons-png.flaticon.com/512/1792/1792525.png" alt="Escape Artist Badge" class="w-full h-full object-contain relative z-10 bounce-subtle">
                                    </div>
                                    <h3 class="text-lg font-bold text-cyan-300">Escape Artist Badge</h3>
                                    <p class="text-xs text-cyan-200 mt-1">Navigate the Maze!</p>
                                </div>
                                <div class="bg-gray-900/40 backdrop-blur-md p-4 rounded-lg border border-cyan-500/30 text-center transform transition-all duration-300 hover:scale-105 hover-glow">
                                    <div class="w-16 h-16 mx-auto relative mb-2">
                                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-teal-500 rounded-full opacity-20 animate-pulse-slow"></div>
                                        <img src="https://cdn-icons-png.flaticon.com/512/4295/4295970.png" alt="Chat Guardian Badge" class="w-full h-full object-contain relative z-10 bounce-subtle">
                                    </div>
                                    <h3 class="text-lg font-bold text-cyan-300">Chat Guardian Badge</h3>
                                    <p class="text-xs text-cyan-200 mt-1">Master Safe Chats!</p>
                                </div>
                            </div>
                            
                            <!-- Game Navigation Tabs -->
                            <div class="mt-8">
                                <div class="flex justify-center mb-8 perspective">
                                    <div class="flex items-center space-x-3 bg-gray-900/70 p-1 rounded-full border border-purple-500/20 shadow-lg shadow-purple-500/10">
                                        <button id="social-stage1-btn" class="px-5 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-full font-bold social-stage-btn active transition-all duration-300 transform hover:scale-105">Spot the Fake</button>
                                        <button id="social-stage2-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold social-stage-btn transition-all duration-300 transform hover:scale-105">Hacker Maze</button>
                                        <button id="social-stage3-btn" class="px-5 py-2 bg-gray-800/70 text-gray-400 rounded-full font-bold social-stage-btn transition-all duration-300 transform hover:scale-105">Chat Simulator</button>
                                    </div>
                                </div>
                                
                                <!-- Progress indicator with animated scanner effect -->
                                <div class="mb-6 px-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm text-purple-300 matrix-text">Mission Progress:</span>
                                        <span class="text-sm text-purple-300 code-cursor" id="mission-progress-text">1/3 Challenges</span>
                                    </div>
                                    <div class="h-3 bg-gray-800/60 rounded-full overflow-hidden shadow-lg shadow-purple-500/20">
                                        <div id="mission-progress-bar" class="h-full bg-gradient-to-r from-purple-600 via-blue-500 to-cyan-500 rounded-full progress-scanner" style="width: 33%"></div>
                                    </div>
                                </div>
                                
                                    <!-- Game Content Container -->
                                    <!-- Stage 1: Spot the Fake Quiz Game -->
                                <div id="social-stage1" class="social-stage active transform transition-opacity duration-500">
                                        <h3 class="text-xl font-game mb-4 text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-blue-400 to-cyan-400 animate__animated animate__fadeIn">Spot the Fake Challenge</h3>
                                        <p class="text-center text-white mb-6">Can you identify which social media content is real and which is fake? Train your detective skills!</p>
                                        
                                        <!-- Game interface -->
                                        <div class="bg-black/30 backdrop-blur-md p-6 rounded-xl border border-purple-500/30 mb-6 hover-glow">
                                            <!-- SocialShield Character Assistant -->
                                            <div class="flex items-start space-x-4 mb-6 bg-gradient-to-r from-purple-900/30 to-blue-900/30 p-4 rounded-lg border border-purple-400/20 animate__animated animate__fadeIn transform transition-all duration-500 hover:shadow-purple-400/20">
                                                <div class="flex-shrink-0">
                                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-600 flex items-center justify-center overflow-hidden border-2 border-purple-300/50 shadow-lg pulse-subtle">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/2371/2371580.png" alt="SocialShield" class="w-12 h-12 object-contain">
                                                </div>
                                                    </div>
                                                <div class="flex-1">
                                                    <div class="bg-purple-800/40 p-3 rounded-lg rounded-tl-none relative typing-container">
                                                        <div class="absolute -left-2 top-0 w-0 h-0 border-t-8 border-r-8 border-purple-800/40 border-l-transparent"></div>
                                                        <p class="text-purple-100 text-sm font-medium typing-text" id="spot-fake-assistant-text">Hi there! I'm SocialShield! Today we'll practice spotting fake social media content. Profile Phantom creates convincing fakes to trick people, but I'll help you learn how to identify them!</p>
                                                    </div>
                                                    <div class="mt-2 text-xs text-purple-300 font-medium">SocialShield - Social Media Expert</div>
                                                </div>
                                            </div>
                                            
                                            <!-- Quiz Container -->
                                            <div id="spot-fake-quiz-container">
                                                <!-- Current Quiz Card -->
                                                <div id="current-quiz-card" class="bg-white/5 backdrop-blur-sm rounded-xl border border-purple-500/30 overflow-hidden shadow-lg transform transition-all duration-300 hover:shadow-purple-500/30">
                                                    <!-- Question Header -->
                                                    <div class="bg-gradient-to-r from-purple-900/80 to-blue-900/80 p-4 flex justify-between items-center">
                                                        <h4 class="text-lg font-bold text-white">Question <span id="current-question-num">1</span>/5</h4>
                                                        <div class="flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                            </svg>
                                                            <span class="text-yellow-400 font-bold text-sm" id="current-score">0</span>
                                                </div>
                                                    </div>
                                                    
                                                    <!-- Social Media Post -->
                                                <div class="p-4 binary-bg">
                                                        <div class="bg-white rounded-lg overflow-hidden mb-4 max-w-2xl mx-auto shadow-lg transform transition-all duration-300 hover:shadow-purple-400/30">
                                                            <!-- Social Media Interface Header -->
                                                            <div class="bg-blue-100 border-b border-gray-300 p-3 flex items-center">
                                                                <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold mr-2">S</div>
                                                                <span class="font-bold text-blue-800">SocialConnect</span>
                                                                <div class="ml-auto flex space-x-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-800" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                            </svg>
                                                    </div>
                                                </div>
                                                            
                                                            <!-- Post Content -->
                                                            <div class="p-4 bg-white" id="post-content">
                                                                <!-- Dynamic post content will be inserted here -->
                                                                <div class="flex items-start mb-3">
                                                                    <div class="w-10 h-10 rounded-full bg-gray-300 mr-3 flex-shrink-0">
                                                                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile" class="w-full h-full rounded-full">
                                            </div>
                                                                    <div>
                                                                        <h5 class="font-bold text-gray-900">Kid_Gamer2010</h5>
                                                                        <p class="text-gray-500 text-sm">Posted yesterday at 3:45 PM</p>
                                        </div>
                                                    </div>
                                                                <p class="text-gray-800 mb-3" id="post-text">Hey everyone! I just got accepted into this awesome gaming group! They're giving away FREE gaming consoles to the first 100 kids who join! All I had to do was share my home address and my parents' email. Can't wait to get my prize! Join now at gamingprizes4kids.com!</p>
                                                                <div class="mb-3" id="post-image-container">
                                                                    <img src="https://cdn-icons-png.flaticon.com/512/5778/5778578.png" alt="Post image" class="w-full rounded-lg border border-gray-200" id="post-image">
                                                </div>
                                                                <div class="flex items-center text-gray-500 text-sm">
                                                                    <span class="mr-3"><span class="font-bold">24</span> Likes</span>
                                                                    <span class="mr-3"><span class="font-bold">5</span> Comments</span>
                                                                    <span><span class="font-bold">12</span> Shares</span>
                                                    </div>
                                                </div>
                                                    </div>
                                                </div>
                                                
                                                    <!-- Question & Options -->
                                                    <div class="p-4">
                                                        <h4 class="text-lg font-bold text-purple-300 mb-3" id="question-text">Is this social media post real or fake?</h4>
                                                        <div class="space-y-3" id="answer-options">
                                                            <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                                <input type="radio" name="quiz-answer" value="real" class="mr-3 h-4 w-4">
                                                                <span class="text-white">Real - This looks like a legitimate post</span>
                                                            </label>
                                                            <label class="flex items-center bg-gray-800/50 p-3 rounded-lg hover:bg-gray-800/70 transition cursor-pointer">
                                                                <input type="radio" name="quiz-answer" value="fake" class="mr-3 h-4 w-4">
                                                                <span class="text-white">Fake - This is suspicious and unsafe</span>
                                                            </label>
                                                    </div>
                                                        
                                                        <!-- Submit Answer Button -->
                                                        <div class="mt-6 text-center">
                                                            <button id="submit-answer" class="px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-bold rounded-lg shadow-lg hover:from-purple-700 hover:to-blue-700 transition-all">
                                                                Check Answer
                                                            </button>
                                        </div>
                                    </div>
                                    
                                                    <!-- Feedback Container (initially hidden) -->
                                                    <div id="answer-feedback" class="p-4 hidden">
                                                        <div class="bg-gray-900/50 rounded-lg p-4 border border-purple-500/30 mb-4">
                                                            <div class="flex items-start">
                                                                <div id="feedback-icon" class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 mr-3"></div>
                                            <div>
                                                                    <h5 id="feedback-title" class="font-bold text-lg mb-2"></h5>
                                                                    <p id="feedback-message" class="text-gray-300"></p>
                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-4">
                                                            <h5 class="font-bold text-purple-300 mb-2">Red Flags to Look For:</h5>
                                                            <ul id="red-flags-list" class="list-disc pl-5 space-y-1 text-white">
                                                                <!-- Red flags will be inserted here -->
                                                </ul>
                                            </div>
                                                        <div class="text-center">
                                                            <button id="next-question" class="px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 text-white font-bold rounded-lg shadow-lg hover:from-purple-700 hover:to-blue-700 transition-all">
                                                                Next Question
                                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                                <!-- Quiz Results (initially hidden) -->
                                                <div id="quiz-results" class="hidden">
                                                    <div class="text-center py-6">
                                                        <div class="w-24 h-24 mx-auto mb-4 relative">
                                                            <svg class="w-full h-full" viewBox="0 0 100 100">
                                                                <circle cx="50" cy="50" r="45" fill="none" stroke="#312e81" stroke-width="10" />
                                                                <circle id="score-circle" cx="50" cy="50" r="45" fill="none" stroke="#8b5cf6" stroke-width="10" 
                                                                    stroke-dasharray="283" stroke-dashoffset="283" transform="rotate(-90 50 50)" />
                                                            </svg>
                                                            <div class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-white">
                                                                <span id="score-percent">0%</span>
                                    </div>
                                </div>
                                                        <h3 class="text-2xl font-bold text-white mb-4">Quiz Complete!</h3>
                                                        <p class="text-lg text-purple-200 mb-6">You scored <span id="final-score">0</span> out of 5</p>
                                                        <div id="score-message" class="mb-8 bg-purple-900/30 border border-purple-500/30 p-4 rounded-lg max-w-md mx-auto"></div>
                                                        
                                                        <!-- Detective Badge (shown when passing) -->
                                                        <div id="badge-earned" class="hidden mb-6 animate__animated animate__bounceIn">
                                                            <div class="w-24 h-24 mx-auto relative">
                                                                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full opacity-20 animate-pulse-slow"></div>
                                                                <img src="https://cdn-icons-png.flaticon.com/512/3487/3487884.png" alt="Detective Badge" class="w-full h-full object-contain relative z-10">
                                                        </div>
                                                            <p class="text-xl font-bold text-yellow-300 mt-2">Detective Badge Earned!</p>
                                                            <p class="text-purple-200">You've proven your skill at spotting fakes!</p>
                                                            </div>
                                                            
                                                        <div class="flex justify-center space-x-4">
                                                            <button id="retry-quiz" class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-white font-bold rounded-lg shadow-lg transition-all">
                                                                Try Again
                                                            </button>
                                                            <button id="complete-spot-fake" class="px-6 py-2 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-bold rounded-lg shadow-lg transition-all">
                                                                Continue
                                                            </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                    <!-- Stage 2: Escape the Hacker Maze -->
                                    <div id="social-stage2" class="social-stage hidden">
                                        <h3 class="text-xl font-game mb-4 text-center text-blue-300">Escape the Hacker Maze</h3>
                                        <p class="text-center text-white mb-6">Navigate through the maze while answering cybersecurity questions to escape the hacker's traps!</p>
                                        
                                        <!-- Game interface -->
                                        <div class="bg-black/30 p-6 rounded-xl border border-blue-500/30 mb-6">
                                            <!-- SocialShield VS Profile Phantom -->
                                            <div class="flex items-center justify-between mb-6">
                                                <div class="flex items-center">
                                                    <div class="w-16 h-16 relative mr-3">
                                                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full opacity-20 animate-pulse"></div>
                                                        <img src="https://cdn-icons-png.flaticon.com/512/2371/2371580.png" alt="SocialShield" class="w-full h-full object-contain relative z-10">
                                                        </div>
                                                    <div>
                                                        <h4 class="text-cyan-300 font-bold">SocialShield</h4>
                                                        <div class="w-24 h-3 bg-gray-700 rounded-full mt-1">
                                                            <div class="h-full bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full" style="width: 100%"></div>
                                                    </div>
                                                </div>
                                                            </div>
                                                            
                                                <div class="text-xl font-game text-white">VS</div>
                                                
                                                <div class="flex items-center">
                                                    <div>
                                                        <h4 class="text-red-400 font-bold text-right">Profile Phantom</h4>
                                                        <div class="w-24 h-3 bg-gray-700 rounded-full mt-1">
                                                            <div id="phantom-health" class="h-full bg-gradient-to-r from-red-500 to-purple-500 rounded-full" style="width: 100%"></div>
                                                            </div>
                                                        </div>
                                                    <div class="w-16 h-16 relative ml-3">
                                                        <div class="absolute inset-0 bg-gradient-to-r from-red-500 to-purple-500 rounded-full opacity-20 animate-pulse"></div>
                                                        <img src="https://cdn-icons-png.flaticon.com/512/1680/1680422.png" alt="Profile Phantom" class="w-full h-full object-contain relative z-10">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Game Canvas -->
                                            <div class="relative w-full h-72 bg-gradient-to-r from-blue-900/40 to-purple-900/40 rounded-lg overflow-hidden border border-blue-500/30 mb-6">
                                                <!-- Game Background with Grid -->
                                                <div class="absolute inset-0" id="maze-background">
                                                    <div class="w-full h-full grid grid-cols-24 grid-rows-12 gap-px opacity-20">
                                                        @for ($i = 0; $i < 288; $i++)
                                                            <div class="bg-blue-500/20"></div>
                                                        @endfor
                                                    </div>
                                            </div>
                                            
                                                <!-- Game Canvas Elements -->
                                                <div id="game-container" class="absolute inset-0 overflow-hidden">
                                                    <!-- Character -->
                                                    <div id="player" class="absolute bottom-6 left-10 w-12 h-12 z-20">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/2371/2371580.png" class="w-full h-full object-contain">
                                            </div>
                                                        
                                                    <!-- Villain that appears randomly -->
                                                    <div id="villain" class="absolute w-12 h-12 z-10 hidden">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/1680/1680422.png" class="w-full h-full object-contain">
                                                                </div>
                                                    
                                                    <!-- Game Obstacles Container -->
                                                    <div id="obstacles-container" class="absolute inset-0">
                                                        <!-- Obstacles will be generated dynamically -->
                                                    </div>
                                                            
                                                    <!-- Score and Level -->
                                                    <div class="absolute top-2 left-2 bg-black/40 px-3 py-1 rounded-full text-sm text-cyan-300 font-medium">
                                                        Score: <span id="game-score">0</span>
                                                    </div>
                                                    <div class="absolute top-2 right-2 bg-black/40 px-3 py-1 rounded-full text-sm text-cyan-300 font-medium">
                                                        Level: <span id="game-level">1</span>
                                                                </div>
                                                            </div>
                                                            
                                                <!-- Game Controls -->
                                                <div class="absolute bottom-2 left-2 flex space-x-2">
                                                    <button id="btn-jump" class="w-12 h-12 bg-blue-600/60 hover:bg-blue-600/80 rounded-full flex items-center justify-center text-white border border-blue-400/50">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                                        </svg>
                                                    </button>
                                                        </div>
                                                        
                                                <!-- Start/Pause Button -->
                                                <div class="absolute bottom-2 right-2">
                                                    <button id="btn-start" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-lg text-white font-bold hover:from-blue-700 hover:to-cyan-700 border border-blue-400/50">
                                                        Start Game
                                                    </button>
                                                    <button id="btn-pause" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-lg text-white font-bold hover:from-blue-700 hover:to-cyan-700 border border-blue-400/50 hidden">
                                                        Pause
                                                    </button>
                                                        </div>
                                                        
                                                <!-- Game Over Screen (Initially Hidden) -->
                                                <div id="game-over-screen" class="absolute inset-0 bg-black/80 flex flex-col items-center justify-center hidden">
                                                    <h3 class="text-2xl font-game text-red-500 mb-2">Game Over!</h3>
                                                    <p class="text-white mb-4">You scored: <span id="final-game-score">0</span></p>
                                                    <button id="btn-retry" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-lg text-white font-bold hover:from-blue-700 hover:to-cyan-700">
                                                        Try Again
                                                    </button>
                                                            </div>
                                                            
                                                <!-- Question Popup (Initially Hidden) -->
                                                <div id="question-popup" class="absolute inset-0 bg-black/80 flex flex-col items-center justify-center p-4 hidden">
                                                    <h3 class="text-xl font-game text-cyan-300 mb-3">Cybersecurity Question</h3>
                                                    <div class="bg-gray-900/90 p-4 rounded-lg border border-blue-500/30 mb-4 w-full max-w-md">
                                                        <p id="question-text" class="text-white mb-4">What should you do if someone you don't know asks for your personal information online?</p>
                                                        <div class="space-y-2" id="question-options">
                                                            <label class="flex items-center bg-gray-800/50 p-2 rounded hover:bg-gray-800/70 transition cursor-pointer">
                                                                <input type="radio" name="question-answer" value="0" class="mr-2">
                                                                <span class="text-white">Share it if they seem nice</span>
                                                            </label>
                                                            <label class="flex items-center bg-gray-800/50 p-2 rounded hover:bg-gray-800/70 transition cursor-pointer">
                                                                <input type="radio" name="question-answer" value="1" class="mr-2">
                                                                <span class="text-white">Never share personal information with strangers</span>
                                                            </label>
                                                            <label class="flex items-center bg-gray-800/50 p-2 rounded hover:bg-gray-800/70 transition cursor-pointer">
                                                                <input type="radio" name="question-answer" value="2" class="mr-2">
                                                                <span class="text-white">Only share your address, not your phone number</span>
                                                            </label>
                                                            </div>
                                                        </div>
                                                    <button id="btn-submit-answer" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-lg text-white font-bold hover:from-blue-700 hover:to-cyan-700">
                                                        Submit Answer
                                                    </button>
                                                        </div>
                                                        
                                                <!-- Level Complete Screen (Initially Hidden) -->
                                                <div id="level-complete" class="absolute inset-0 bg-black/80 flex flex-col items-center justify-center hidden">
                                                    <div class="animate__animated animate__bounceIn">
                                                        <h3 class="text-2xl font-game text-green-400 mb-2">Level Complete!</h3>
                                                        <div class="w-24 h-24 mx-auto my-4 relative">
                                                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-400 rounded-full opacity-20 animate-pulse"></div>
                                                            <img src="https://cdn-icons-png.flaticon.com/512/1792/1792525.png" alt="Escape Artist Badge" class="w-full h-full object-contain relative z-10">
                                                                </div>
                                                        <p class="text-xl font-bold text-yellow-300 mb-2">Escape Artist Badge Earned!</p>
                                                        <p class="text-white mb-4">You've defeated Profile Phantom's maze!</p>
                                                        <button id="btn-continue" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-lg text-white font-bold hover:from-blue-700 hover:to-cyan-700">
                                                            Continue to Next Challenge
                                                        </button>
                                            </div>
                                            </div>
                                            </div>
                                            
                                            <!-- Game Instructions -->
                                            <div class="bg-blue-900/30 p-4 rounded-lg border border-blue-500/30">
                                                <h4 class="font-bold text-cyan-300 mb-2">How to Play:</h4>
                                                <ul class="list-disc pl-5 text-sm text-white space-y-1">
                                                    <li>Press <span class="font-bold text-cyan-200">Start</span> to begin the game</li>
                                                    <li>Use the <span class="font-bold text-cyan-200">Jump button</span> or press <span class="font-bold text-cyan-200">Space bar</span> to jump over obstacles</li>
                                                    <li>Avoid touching scam messages and fake giveaway ads</li>
                                                    <li>Answer cybersecurity questions correctly to advance</li>
                                                    <li>Watch out for Profile Phantom's tricks!</li>
                                                                    </ul>
                                                </div>
                                                                </div>
                                                            </div>
                                                            
                                    <!-- Stage 3: Chat Simulation -->
                                    <div id="social-stage3" class="social-stage hidden">
                                        <h3 class="text-xl font-game mb-4 text-center text-cyan-300">Chat Safety Simulator</h3>
                                        <p class="text-center text-white mb-6">Practice how to respond to suspicious messages in this chat simulator!</p>
                                        
                                        <!-- Chat Simulator Interface -->
                                        <div class="bg-black/30 p-6 rounded-xl border border-cyan-500/30 mb-6">
                                            <!-- SocialShield Character -->
                                            <div class="mb-6 bg-gradient-to-r from-blue-900/80 to-purple-900/80 border-2 border-cyan-500/50 rounded-xl p-4 shadow-lg relative overflow-hidden">
                                                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
                                                <div class="flex items-center gap-4">
                                                    <div class="w-24 h-24 flex-shrink-0">
                                                        <img src="https://cdn-icons-png.flaticon.com/512/1839/1839274.png" alt="SocialShield" class="w-full h-full object-contain drop-shadow-[0_0_15px_rgba(6,182,212,0.5)]">
                                                            </div>
                                                    <div class="flex-1">
                                                        <h3 class="text-xl font-game text-cyan-400 mb-2">SocialShield</h3>
                                                        <p class="text-white" id="social-shield-guidance">Welcome to the Chat Simulator! I'll help you learn how to recognize and respond to suspicious messages. Remember, never share personal information and be cautious about unusual requests!</p>
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            <!-- Chat Interface -->
                                            <div class="bg-gray-900 rounded-xl overflow-hidden border border-gray-700/50 shadow-lg mb-6">
                                                <!-- Chat header -->
                                                <div class="bg-gray-800 p-3 flex items-center border-b border-gray-700">
                                                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold mr-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                        </svg>
                                                        </div>
                                                        <div>
                                                        <p class="font-bold text-white" id="chat-sender-name">Unknown Contact</p>
                                                        <p class="text-xs text-gray-400" id="chat-sender-status">Online</p>
                                                </div>
                                            </div>
                                            
                                                <!-- Chat messages area -->
                                                <div class="p-4 h-80 overflow-y-auto bg-gray-900" id="chat-messages">
                                                    <!-- Messages will be inserted here via JavaScript -->
                                            </div>
                                                
                                                <!-- Response options -->
                                                <div class="p-4 bg-gray-800 border-t border-gray-700">
                                                    <div id="response-options" class="space-y-2">
                                                        <!-- Response options will be inserted here via JavaScript -->
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            <!-- Progress indicator -->
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-white/80 text-sm">Scenario: <span id="current-scenario">1</span> of <span id="total-scenarios">5</span></span>
                                                <span class="text-white/80 text-sm">Score: <span id="chat-score">0</span> points</span>
                                                </div>
                                            <div class="w-full bg-gray-800 rounded-full h-2.5">
                                                <div class="bg-gradient-to-r from-cyan-500 to-blue-500 h-2.5 rounded-full" id="chat-progress" style="width: 0%"></div>
                                                                </div>
                                            
                                            <!-- Results panel (hidden initially) -->
                                            <div id="chat-results" class="mt-6 bg-gradient-to-r from-blue-900/60 to-purple-900/60 rounded-lg p-6 border border-cyan-500/30 hidden">
                                                <h3 class="text-xl font-game text-center text-cyan-300 mb-4">Chat Safety Results</h3>
                                                <p class="text-center text-white mb-4">You've completed the Chat Safety Simulator!</p>
                                                <div class="flex justify-center items-center gap-3 mb-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                    </svg>
                                                    <div class="bg-gray-800/80 rounded-full h-8 w-64 overflow-hidden">
                                                        <div id="final-score-bar" class="h-full bg-gradient-to-r from-cyan-500 to-blue-500" style="width: 0%"></div>
                                                </div>
                                                    <span id="final-score-text" class="text-white font-bold">0%</span>
                                                        </div>
                                                <p id="final-score-message" class="text-center text-white mb-6">Thanks for practicing chat safety! Your score shows how well you can identify and respond to suspicious messages.</p>
                                                <div class="flex justify-center">
                                                    <button id="restart-chat" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg mr-3 transition">Try Again</button>
                                                    <button id="complete-chat-sim" class="px-4 py-2 bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white rounded-lg transition">Complete Challenge</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            
                                    <form id="social-media-form" action="{{ route('game.submit-mission', ['id' => $mission['id']]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="social_media_complete" id="social_media_complete" value="0">
                                        <input type="hidden" name="social_media_score" id="social_media_score" value="0">
                                        <input type="hidden" name="social_spot_fake_complete" id="social_spot_fake_complete" value="0">
                                        <input type="hidden" name="social_maze_complete" id="social_maze_complete" value="0">
                                        <input type="hidden" name="social_chat_complete" id="social_chat_complete" value="0">
                                        
                                        <div class="mt-6 text-center">
                                            <button type="submit" id="submit-social-media-mission" class="btn-primary px-8 py-3 hidden" disabled>
                                                Complete Mission
                                            </button>
                                                        </div>
                                    </form>
                                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <div class="flex justify-between">
            @endswitch
            <a href="{{ route('game.story') }}" class="btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                    <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 010 1.06l-2.47 2.47H21a.75.75 0 010 1.5H4.81l2.47 2.47a.75.75 0 11-1.06 1.06l-3.75-3.75a.75.75 0 010-1.06l3.75-3.75a.75.75 0 011.06 0z" clip-rule="evenodd" />
                </svg>
                Back to Mission List
            </a>
            
            <a href="{{ route('game.secret-code') }}" class="btn-primary">
                Visit Secret Code Challenge
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 ml-2">
                    <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 011.06 0l3.75 3.75a.75.75 0 010 1.06l-3.75 3.75a.75.75 0 11-1.06-1.06l2.47-2.47H3a.75.75 0 010-1.5h16.19l-2.47-2.47a.75.75 0 010-1.06z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection 

@if($mission['id'] == 2)
<!-- Animate.css for additional animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- Password mission JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Stage navigation
        const stageBtns = document.querySelectorAll('.stage-btn');
        const stages = document.querySelectorAll('.stage');
        let currentStage = 1;
        let stagesCompleted = [false, false, false, false];
        
        // Stage 1: Password Categories
        const passwordItems = document.querySelectorAll('.password-item');
        const dropZones = document.querySelectorAll('.password-drop-zone');
        const checkCategoriesBtn = document.getElementById('check-categories');
        const categoryFeedback = document.getElementById('category-feedback');
        
        // Stage 2: Password Strength Tester
        const passwordInput = document.getElementById('password-input');
        const strengthMeter = document.getElementById('strength-meter');
        const strengthText = document.getElementById('strength-text');
        const nextStage2Btn = document.getElementById('next-stage-2');
        
        // Password requirement indicators
        const lengthCheck = document.getElementById('length-check');
        const uppercaseCheck = document.getElementById('uppercase-check');
        const lowercaseCheck = document.getElementById('lowercase-check');
        const numberCheck = document.getElementById('number-check');
        const specialCheck = document.getElementById('special-check');
        
        // Stage 3: Memorable Strong Password
        const finalPassword = document.getElementById('final-password');
        const finalStrengthMeter = document.getElementById('final-strength-meter');
        const finalStrengthText = document.getElementById('final-strength-text');
        const finalFeedback = document.getElementById('final-feedback');
        const nextStage3Btn = document.getElementById('next-stage-3');
        
        // Stage 4: Google Login
        const nextLoginBtn = document.getElementById('next-login');
        const backToEmailBtn = document.getElementById('back-to-email');
        const loginStage1 = document.getElementById('login-stage-1');
        const loginStage2 = document.getElementById('login-stage-2');
        const loginSuccess = document.getElementById('login-success');
        const passwordConfirm = document.getElementById('password-confirm');
        const showPasswordCheck = document.getElementById('show-password');
        const loginSubmitBtn = document.getElementById('login-submit');
        const passwordError = document.getElementById('password-error');
        const completeMissionBtn = document.getElementById('complete-mission');
        
        // Form elements
        const missionForm = document.getElementById('mission-form');
        const submitMissionBtn = document.getElementById('submit-mission');
        const stage1CompleteInput = document.getElementById('stage1_complete');
        const stage2CompleteInput = document.getElementById('stage2_complete');
        const stage3CompleteInput = document.getElementById('stage3_complete');
        const stage4CompleteInput = document.getElementById('stage4_complete');
        const passwordScoreInput = document.getElementById('password_score');
        const finalPasswordHidden = document.getElementById('final_password_hidden');
        
        // Add futuristic animation classes
        document.querySelectorAll('.btn-cyber').forEach(btn => {
            btn.classList.add('animate__animated');
            
            btn.addEventListener('mouseenter', function() {
                this.classList.add('animate__pulse');
            });
            
            btn.addEventListener('mouseleave', function() {
                this.classList.remove('animate__pulse');
            });
        });
        
        // Enable drag and drop for password items
        passwordItems.forEach(item => {
            item.addEventListener('dragstart', function(e) {
                e.dataTransfer.setData('text/plain', e.target.dataset.strength);
                e.dataTransfer.setData('text/html', e.target.outerHTML);
                setTimeout(() => {
                    e.target.classList.add('opacity-50');
                }, 0);
            });
            
            item.addEventListener('dragend', function(e) {
                e.target.classList.remove('opacity-50');
            });
        });
        
        // Set up drop zones
        dropZones.forEach(zone => {
            zone.addEventListener('dragover', function(e) {
                e.preventDefault();
                zone.classList.add('bg-blue-600/10');
            });
            
            zone.addEventListener('dragleave', function() {
                zone.classList.remove('bg-blue-600/10');
            });
            
            zone.addEventListener('drop', function(e) {
                e.preventDefault();
                zone.classList.remove('bg-blue-600/10');
                
                const passwordStrength = e.dataTransfer.getData('text/plain');
                const passwordHTML = e.dataTransfer.getData('text/html');
                
                // Create a temporary element to extract the content
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = passwordHTML;
                const passwordElement = tempDiv.firstChild;
                
                // Add to this drop zone
                zone.appendChild(passwordElement);
                
                // Reattach drag event listeners to the moved element
                passwordElement.addEventListener('dragstart', function(e) {
                    e.dataTransfer.setData('text/plain', passwordElement.dataset.strength);
                    e.dataTransfer.setData('text/html', passwordElement.outerHTML);
                    setTimeout(() => {
                        passwordElement.classList.add('opacity-50');
                    }, 0);
                });
                
                passwordElement.addEventListener('dragend', function() {
                    passwordElement.classList.remove('opacity-50');
                });
            });
        });
        
        // Check categories button
        checkCategoriesBtn.addEventListener('click', function() {
            let correctPlacements = 0;
            let totalItems = 0;
            
            dropZones.forEach(zone => {
                const expectedCategory = zone.dataset.category;
                const items = zone.querySelectorAll('.password-item');
                
                items.forEach(item => {
                    totalItems++;
                    if (item.dataset.strength === expectedCategory) {
                        correctPlacements++;
                        item.classList.add('border-blue-500', 'bg-blue-900/40');
                        // Add pulse animation
                        item.classList.add('animate__animated', 'animate__pulse');
                    } else {
                        item.classList.add('border-red-500', 'bg-red-900/40');
                        item.classList.add('animate__animated', 'animate__headShake');
                    }
                });
            });
            
            categoryFeedback.classList.remove('hidden');
            
            if (correctPlacements === totalItems) {
                categoryFeedback.textContent = 'Great job! You correctly categorized all passwords.';
                categoryFeedback.classList.add('bg-green-500/20', 'border', 'border-green-500/30', 'text-green-300');
                stagesCompleted[0] = true;
                stage1CompleteInput.value = "1";
                
                // Enable stage 2 button with animation
                document.getElementById('stage2-btn').classList.remove('bg-gray-800/70', 'text-gray-400');
                document.getElementById('stage2-btn').classList.add('bg-gradient-to-r', 'from-blue-600', 'to-cyan-600', 'text-white', 'animate__animated', 'animate__pulse');
                
                // Auto advance to stage 2 after a short delay
                setTimeout(() => {
                    navigateToStage(2);
                }, 1500);
            } else {
                const scorePercentage = Math.round((correctPlacements / totalItems) * 100);
                categoryFeedback.textContent = `You got ${correctPlacements} out of ${totalItems} correct (${scorePercentage}%). Try again!`;
                categoryFeedback.classList.add('bg-yellow-500/20', 'border', 'border-yellow-500/30', 'text-yellow-300');
                
                // Reset colors after a moment
                setTimeout(() => {
                    document.querySelectorAll('.password-item').forEach(item => {
                        item.classList.remove('border-blue-500', 'bg-blue-900/40', 'border-red-500', 'bg-red-900/40', 'animate__animated', 'animate__pulse', 'animate__headShake');
                    });
                }, 2000);
            }
        });
        
        // Password strength tester
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const score = calculatePasswordStrength(password);
            updatePasswordStrength(score);
            
            // Update KeyGuard's advice based on password strength and characteristics
            updateKeyGuardAdvice(password, score);
            
            // Enable continue button if password is strong enough
            if (score >= 4) {
                nextStage2Btn.classList.remove('hidden');
                nextStage2Btn.classList.add('animate__animated', 'animate__fadeIn');
                stagesCompleted[1] = true;
                stage2CompleteInput.value = "1";
                passwordScoreInput.value = score;
            } else {
                nextStage2Btn.classList.add('hidden');
                stagesCompleted[1] = false;
                stage2CompleteInput.value = "0";
            }
        });
        
        // Final password strength tester
        finalPassword.addEventListener('input', function() {
            const password = this.value;
            const score = calculatePasswordStrength(password);
            updateFinalPasswordStrength(score);
            finalPasswordHidden.value = password;
            
            // Update KeyGuard's advice for the memorable password
            updateMemorableKeyGuardAdvice(password, score);
            
            // Show feedback based on score
            if (score >= 4) {
                finalFeedback.classList.remove('hidden', 'bg-red-900/40', 'border-red-500/30', 'text-red-300', 'bg-yellow-900/40', 'border-yellow-500/30', 'text-yellow-300');
                finalFeedback.classList.add('bg-green-900/40', 'border-green-500/30', 'text-green-300', 'animate__animated', 'animate__fadeIn');
                finalFeedback.innerHTML = '<strong>Excellent!</strong> This is a strong, memorable password that would take a long time to crack.';
                
                nextStage3Btn.classList.remove('hidden');
                nextStage3Btn.classList.add('animate__animated', 'animate__fadeIn');
                stagesCompleted[2] = true;
                stage3CompleteInput.value = "1";
            } else if (score >= 2) {
                finalFeedback.classList.remove('hidden', 'bg-red-900/40', 'border-red-500/30', 'text-red-300', 'bg-green-900/40', 'border-green-500/30', 'text-green-300');
                finalFeedback.classList.add('bg-yellow-900/40', 'border-yellow-500/30', 'text-yellow-300', 'animate__animated', 'animate__fadeIn');
                finalFeedback.innerHTML = '<strong>Getting better!</strong> Your password has medium strength. Try adding more complexity to make it stronger.';
                
                nextStage3Btn.classList.add('hidden');
                stagesCompleted[2] = false;
                stage3CompleteInput.value = "0";
            } else {
                finalFeedback.classList.remove('hidden', 'bg-green-900/40', 'border-green-500/30', 'text-green-300', 'bg-yellow-900/40', 'border-yellow-500/30', 'text-yellow-300');
                finalFeedback.classList.add('bg-red-900/40', 'border-red-500/30', 'text-red-300', 'animate__animated', 'animate__fadeIn');
                finalFeedback.innerHTML = '<strong>Needs improvement!</strong> This password would be easy to crack. Follow the guidelines above to create a stronger password.';
                
                nextStage3Btn.classList.add('hidden');
                stagesCompleted[2] = false;
                stage3CompleteInput.value = "0";
            }
        });
        
        // Continue to stage 3 button
        nextStage2Btn.addEventListener('click', function() {
            document.getElementById('stage3-btn').classList.remove('bg-gray-800/70', 'text-gray-400');
            document.getElementById('stage3-btn').classList.add('bg-gradient-to-r', 'from-green-600', 'to-cyan-600', 'text-white', 'animate__animated', 'animate__pulse');
            navigateToStage(3);
        });
        
        // Continue to stage 4 button
        nextStage3Btn.addEventListener('click', function() {
            document.getElementById('stage4-btn').classList.remove('bg-gray-800/70', 'text-gray-400');
            document.getElementById('stage4-btn').classList.add('bg-gradient-to-r', 'from-purple-600', 'to-cyan-600', 'text-white', 'animate__animated', 'animate__pulse');
            navigateToStage(4);
        });
        
        // Google login next button
        nextLoginBtn.addEventListener('click', function() {
            loginStage1.classList.add('animate__animated', 'animate__fadeOut');
            
            // Update KeyGuard's message
            updateLoginKeyGuardAdvice("email-entered");
            
            setTimeout(() => {
                loginStage1.classList.add('hidden');
                loginStage2.classList.remove('hidden');
                loginStage2.classList.add('animate__animated', 'animate__fadeIn');
                
                // Ensure password field is properly initialized after showing
                setTimeout(() => {
                    passwordConfirm.value = ""; // Clear any previous value
                    passwordConfirm.focus(); // Give it focus
                    passwordConfirm.disabled = false; // Make sure it's not disabled
                }, 100);
            }, 300);
        });
        
        // Back to email button
        backToEmailBtn.addEventListener('click', function() {
            loginStage2.classList.add('animate__animated', 'animate__fadeOut');
            
            // Update KeyGuard's message
            updateLoginKeyGuardAdvice("default");
            
            setTimeout(() => {
                loginStage2.classList.add('hidden');
                loginStage1.classList.remove('hidden', 'animate__fadeOut');
                loginStage1.classList.add('animate__fadeIn');
            }, 300);
        });
        
        // Handle password confirm input
        passwordConfirm.addEventListener('input', function() {
            // Update KeyGuard's message based on password entered
            if (this.value.length > 0) {
                updateLoginKeyGuardAdvice("typing-password");
            } else {
                updateLoginKeyGuardAdvice("password-empty");
            }
            
            // Make sure the value updates correctly
            console.log("Password input:", this.value);
        });
        
        // Show password checkbox
        showPasswordCheck.addEventListener('change', function() {
            if (this.checked) {
                passwordConfirm.type = 'text';
            } else {
                passwordConfirm.type = 'password';
            }
            
            // Re-focus the field after changing type to ensure it remains active
            setTimeout(() => {
                passwordConfirm.focus();
                
                // Place cursor at the end of text
                const length = passwordConfirm.value.length;
                if (length > 0) {
                    passwordConfirm.setSelectionRange(length, length);
                }
            }, 0);
        });
        
        // Password confirm field direct handling
        passwordConfirm.addEventListener('click', function() {
            // Ensure field is enabled on click
            this.disabled = false;
        });
        
        // Login submit button
        loginSubmitBtn.addEventListener('click', function() {
            const enteredPassword = passwordConfirm.value;
            const savedPassword = finalPassword.value;
            
            if (enteredPassword === savedPassword) {
                // Password matches
                passwordError.classList.add('hidden');
                loginStage2.classList.add('animate__animated', 'animate__fadeOut');
                
                // Update KeyGuard with success message
                updateLoginKeyGuardAdvice("success");
                
                setTimeout(() => {
                    loginStage2.classList.add('hidden');
                    loginSuccess.classList.remove('hidden');
                    loginSuccess.classList.add('animate__animated', 'animate__fadeIn');
                    
                    // Mark stage 4 as complete
                    stagesCompleted[3] = true;
                    stage4CompleteInput.value = "1";
                    
                    // Enable the form submit button
                    submitMissionBtn.disabled = false;
                }, 300);
            } else {
                // Password doesn't match
                passwordError.classList.remove('hidden');
                passwordError.classList.add('animate__animated', 'animate__headShake');
                
                // Update KeyGuard with failure message
                updateLoginKeyGuardAdvice("failure");
                
                // Remove animation class after it completes
                setTimeout(() => {
                    passwordError.classList.remove('animate__animated', 'animate__headShake');
                }, 1000);
            }
        });
        
        // Function to update KeyGuard's advice in Stage 4
        function updateLoginKeyGuardAdvice(state) {
            const assistantText = document.getElementById('login-assistant-text');
            const assistantContainer = assistantText.closest('.flex');
            let adviceText = "";
            
            // Clear any previous animations
            assistantContainer.classList.remove('animate__animated', 'animate__bounce', 'animate__tada', 'animate__shakeX', 'animate__heartBeat');
            
            switch(state) {
                case "default":
                    adviceText = "Now the final test! Can you remember the strong password you created? I'll need you to type it in exactly the same way to prove you can recall it!";
                    break;
                case "email-entered":
                    adviceText = "Great! Now try to remember your strong password. Type it exactly as you created it earlier.";
                    assistantContainer.classList.add('animate__animated', 'animate__bounce');
                    break;
                case "password-empty":
                    adviceText = "Don't worry if you can't remember right away. Try to recall the memorable passphrase you created!";
                    break;
                case "typing-password":
                    adviceText = "That's it! Keep going! Remember all the special characters and capital letters you used.";
                    break;
                case "success":
                    adviceText = "AMAZING JOB! 🎉 You created AND remembered a super strong password! You're a cyber security champion!";
                    assistantContainer.classList.add('animate__animated', 'animate__tada');
                    break;
                case "failure":
                    adviceText = "Oops! That's not quite right. Remember that passwords are case-sensitive and every character matters. Try again!";
                    assistantContainer.classList.add('animate__animated', 'animate__heartBeat');
                    break;
                default:
                    adviceText = "Now the final test! Can you remember the strong password you created? I'll need you to type it in exactly the same way to prove you can recall it!";
            }
            
            // Apply the new advice with animation
            assistantText.textContent = adviceText;
        }
        
        // Complete mission button
        completeMissionBtn.addEventListener('click', function() {
            missionForm.submit();
        });
        
        // Stage navigation
        stageBtns.forEach((btn, index) => {
            btn.addEventListener('click', function() {
                const stageNumber = index + 1;
                
                // Only allow navigation to completed stages or the next available stage
                let canNavigate = false;
                
                if (stageNumber === 1) {
                    canNavigate = true;
                } else if (stageNumber === 2) {
                    canNavigate = stagesCompleted[0];
                } else if (stageNumber === 3) {
                    canNavigate = stagesCompleted[1];
                } else if (stageNumber === 4) {
                    canNavigate = stagesCompleted[2];
                }
                
                if (canNavigate) {
                    navigateToStage(stageNumber);
                }
            });
        });
        
        function navigateToStage(stageNumber) {
            currentStage = stageNumber;
            
            // Update buttons
            stageBtns.forEach((btn, index) => {
                if (index + 1 === stageNumber) {
                    btn.classList.add('active');
                    
                    // Set the active button style
                    btn.classList.remove('bg-gray-800/70', 'text-gray-400');
                    
                    if (stageNumber === 1) {
                        btn.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-cyan-600', 'text-white');
                    } else if (stageNumber === 2) {
                        btn.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-cyan-600', 'text-white');
                    } else if (stageNumber === 3) {
                        btn.classList.add('bg-gradient-to-r', 'from-green-600', 'to-cyan-600', 'text-white');
                    } else if (stageNumber === 4) {
                        btn.classList.add('bg-gradient-to-r', 'from-purple-600', 'to-cyan-600', 'text-white');
                    }
                } else {
                    btn.classList.remove('active');
                    
                    // If the stage is completed, keep its color
                    if ((index === 0 && stagesCompleted[0]) ||
                        (index === 1 && stagesCompleted[1]) ||
                        (index === 2 && stagesCompleted[2]) ||
                        (index === 3 && stagesCompleted[3])) {
                        // Keep the colored style
                    } else {
                        // Reset to default style
                        if (index + 1 !== stageNumber) {
                            btn.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-cyan-600', 'from-green-600', 'from-purple-600', 'text-white');
                            btn.classList.add('bg-gray-800/70', 'text-gray-400');
                        }
                    }
                }
            });
            
            // Show the correct stage with animation
            stages.forEach((stage, index) => {
                if (index + 1 === stageNumber) {
                    stage.classList.remove('hidden');
                    stage.classList.add('active', 'animate__animated', 'animate__fadeIn');
                    stage.style.animationDuration = '0.5s';
                } else {
                    stage.classList.add('hidden');
                    stage.classList.remove('active', 'animate__animated', 'animate__fadeIn');
                }
            });
        }
        
        // Calculate password strength
        function calculatePasswordStrength(password) {
            let score = 0;
            
            // Check password length
            if (password.length >= 12) {
                score += 1;
                lengthCheck.classList.remove('bg-gray-700');
                lengthCheck.classList.add('bg-green-600');
                lengthCheck.querySelector('svg').style.display = 'block';
            } else {
                lengthCheck.classList.remove('bg-green-600');
                lengthCheck.classList.add('bg-gray-700');
                lengthCheck.querySelector('svg').style.display = 'none';
            }
            
            // Check for uppercase letters
            if (/[A-Z]/.test(password)) {
                score += 1;
                uppercaseCheck.classList.remove('bg-gray-700');
                uppercaseCheck.classList.add('bg-green-600');
                uppercaseCheck.querySelector('svg').style.display = 'block';
            } else {
                uppercaseCheck.classList.remove('bg-green-600');
                uppercaseCheck.classList.add('bg-gray-700');
                uppercaseCheck.querySelector('svg').style.display = 'none';
            }
            
            // Check for lowercase letters
            if (/[a-z]/.test(password)) {
                score += 1;
                lowercaseCheck.classList.remove('bg-gray-700');
                lowercaseCheck.classList.add('bg-green-600');
                lowercaseCheck.querySelector('svg').style.display = 'block';
            } else {
                lowercaseCheck.classList.remove('bg-green-600');
                lowercaseCheck.classList.add('bg-gray-700');
                lowercaseCheck.querySelector('svg').style.display = 'none';
            }
            
            // Check for numbers
            if (/[0-9]/.test(password)) {
                score += 1;
                numberCheck.classList.remove('bg-gray-700');
                numberCheck.classList.add('bg-green-600');
                numberCheck.querySelector('svg').style.display = 'block';
            } else {
                numberCheck.classList.remove('bg-green-600');
                numberCheck.classList.add('bg-gray-700');
                numberCheck.querySelector('svg').style.display = 'none';
            }
            
            // Check for special characters
            if (/[^A-Za-z0-9]/.test(password)) {
                score += 1;
                specialCheck.classList.remove('bg-gray-700');
                specialCheck.classList.add('bg-green-600');
                specialCheck.querySelector('svg').style.display = 'block';
            } else {
                specialCheck.classList.remove('bg-green-600');
                specialCheck.classList.add('bg-gray-700');
                specialCheck.querySelector('svg').style.display = 'none';
            }
            
            return score;
        }
        
        // Update password strength UI
        function updatePasswordStrength(score) {
            let percentage = (score / 5) * 100;
            strengthMeter.style.width = percentage + '%';
            
            if (score === 0) {
                strengthMeter.style.backgroundColor = '#ccc';
                strengthText.textContent = 'None';
                strengthText.className = 'font-bold text-gray-400';
            } else if (score === 1) {
                strengthMeter.style.backgroundColor = '#ef4444';
                strengthText.textContent = 'Very Weak';
                strengthText.className = 'font-bold text-red-500';
            } else if (score === 2) {
                strengthMeter.style.backgroundColor = '#f97316';
                strengthText.textContent = 'Weak';
                strengthText.className = 'font-bold text-orange-500';
            } else if (score === 3) {
                strengthMeter.style.backgroundColor = '#eab308';
                strengthText.textContent = 'Medium';
                strengthText.className = 'font-bold text-yellow-500';
            } else if (score === 4) {
                strengthMeter.style.backgroundColor = '#22c55e';
                strengthText.textContent = 'Strong';
                strengthText.className = 'font-bold text-green-500';
            } else {
                strengthMeter.style.backgroundColor = '#15803d';
                strengthText.textContent = 'Very Strong';
                strengthText.className = 'font-bold text-green-700';
            }
        }
        
        // Update final password strength UI
        function updateFinalPasswordStrength(score) {
            let percentage = (score / 5) * 100;
            finalStrengthMeter.style.width = percentage + '%';
            
            if (score === 0) {
                finalStrengthMeter.style.backgroundColor = '#ccc';
                finalStrengthText.textContent = 'None';
                finalStrengthText.className = 'font-bold text-gray-400';
            } else if (score === 1) {
                finalStrengthMeter.style.backgroundColor = '#ef4444';
                finalStrengthText.textContent = 'Very Weak';
                finalStrengthText.className = 'font-bold text-red-500';
            } else if (score === 2) {
                finalStrengthMeter.style.backgroundColor = '#f97316';
                finalStrengthText.textContent = 'Weak';
                finalStrengthText.className = 'font-bold text-orange-500';
            } else if (score === 3) {
                finalStrengthMeter.style.backgroundColor = '#eab308';
                finalStrengthText.textContent = 'Medium';
                finalStrengthText.className = 'font-bold text-yellow-500';
            } else if (score === 4) {
                finalStrengthMeter.style.backgroundColor = '#22c55e';
                finalStrengthText.textContent = 'Strong';
                finalStrengthText.className = 'font-bold text-green-500';
            } else {
                finalStrengthMeter.style.backgroundColor = '#15803d';
                finalStrengthText.textContent = 'Very Strong';
                finalStrengthText.className = 'font-bold text-green-700';
            }
        }
        
        // Interactive KeyGuard character functions
        function updateKeyGuardAdvice(password, score) {
            const assistantText = document.getElementById('password-assistant-text');
            const assistantContainer = assistantText.closest('.flex');
            let adviceText = "";
            
            // Clear any previous animations
            assistantContainer.classList.remove('animate__animated', 'animate__bounce', 'animate__tada', 'animate__shakeX');
            
            if (password.length === 0) {
                adviceText = "Hi there! I'm KeyGuard! I'll help you create a super strong password. Start typing, and I'll give you tips to make it stronger!";
            } else {
                // Check for specific password characteristics and provide tailored advice
                if (password.length < 8) {
                    adviceText = "That's a start! But your password is too short. Try making it longer - at least 12 characters is best!";
                    assistantContainer.classList.add('animate__animated', 'animate__shakeX');
                } else if (password.length < 12) {
                    adviceText = "Getting better! Your password is decent, but still a bit short. Can you make it 12 characters or more?";
                } else if (!/[A-Z]/.test(password)) {
                    adviceText = "Good length! Now try adding some UPPERCASE letters to make it stronger!";
                    assistantContainer.classList.add('animate__animated', 'animate__bounce');
                } else if (!/[0-9]/.test(password)) {
                    adviceText = "Looking good! Now add some numbers (like 2, 5, or 9) to make it even stronger!";
                    assistantContainer.classList.add('animate__animated', 'animate__bounce');
                } else if (!/[^A-Za-z0-9]/.test(password)) {
                    adviceText = "Almost there! Add some special characters like @, #, or ! to make your password super strong!";
                    assistantContainer.classList.add('animate__animated', 'animate__bounce');
                } else if (score >= 4) {
                    adviceText = "WOW! That's an AWESOME password! It would take hackers a very long time to crack this. Great job!";
                    assistantContainer.classList.add('animate__animated', 'animate__tada');
                } else {
                    adviceText = "Keep going! Your password is getting stronger, but it could still be better!";
                }
            }
            
            // Apply the new advice with animation
            assistantText.textContent = adviceText;
        }
        
        function updateMemorableKeyGuardAdvice(password, score) {
            const assistantText = document.getElementById('memorable-assistant-text');
            const assistantContainer = assistantText.closest('.flex');
            let adviceText = "";
            
            // Clear any previous animations
            assistantContainer.classList.remove('animate__animated', 'animate__bounce', 'animate__tada', 'animate__shakeX');
            
            if (password.length === 0) {
                adviceText = "Great job getting to this stage! Now let's create a password that's both strong AND easy to remember. Try using the passphrase method below!";
            } else {
                // Check if the password looks like a passphrase
                const wordCount = password.split(/[^a-zA-Z]/).filter(word => word.length > 2).length;
                
                if (wordCount < 2) {
                    adviceText = "Try using the passphrase method! Start with several random words like 'elephant banana rocket'";
                    assistantContainer.classList.add('animate__animated', 'animate__bounce');
                } else if (!/[0-9]/.test(password)) {
                    adviceText = "Good start with those words! Now try adding some numbers between or after them.";
                } else if (!/[^A-Za-z0-9]/.test(password)) {
                    adviceText = "Looking good! Now add some special characters like @, #, or ! to make it even stronger!";
                } else if (!/[A-Z]/.test(password) || !/[a-z]/.test(password)) {
                    adviceText = "Almost there! Make sure to use both UPPERCASE and lowercase letters for maximum strength.";
                } else if (score >= 4) {
                    adviceText = "FANTASTIC! This password is both strong AND memorable. The passphrase method works great, doesn't it?";
                    assistantContainer.classList.add('animate__animated', 'animate__tada');
                } else {
                    adviceText = "Keep improving your passphrase! It's getting better, but could be stronger.";
                }
            }
            
            // Apply the new advice with animation
            assistantText.textContent = adviceText;
        }
        
        // Fun character animations when transitioning stages
        nextStage2Btn.addEventListener('click', function() {
            const assistantText = document.getElementById('password-assistant-text');
            assistantText.textContent = "Great job! You've created a strong password. Let's move on to make it memorable too!";
            assistantText.closest('.flex').classList.add('animate__animated', 'animate__tada');
        });
        
        nextStage3Btn.addEventListener('click', function() {
            const assistantText = document.getElementById('memorable-assistant-text');
            assistantText.textContent = "Awesome work! Now let's test if you can remember your password by logging in!";
            assistantText.closest('.flex').classList.add('animate__animated', 'animate__tada');
        });
    });
</script>

<style>
/* Slow spin animation for cybersecurity elements */
@keyframes spin-slow {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.animate-spin-slow {
    animation: spin-slow 12s linear infinite;
}

@keyframes pulse-slow {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.05);
        opacity: 0.9;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.animate-pulse-slow {
    animation: pulse-slow 3s ease-in-out infinite;
}

/* Glow effect for buttons */
.btn-cyber {
    position: relative;
    overflow: hidden;
}

.btn-cyber:before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        to bottom right,
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 0.2) 100%
    );
    transform: rotate(45deg);
    z-index: 0;
    transition: all 0.5s ease;
    opacity: 0;
}

.btn-cyber:hover:before {
    opacity: 1;
    animation: shine 1.5s infinite;
}

@keyframes shine {
    0% {
        left: -100%;
        top: -100%;
    }
    100% {
        left: 100%;
        top: 100%;
    }
}
</style>
@endif 

@if($mission['id'] == 1)
<!-- Animate.css for additional animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- PhishGuard JavaScript for The Mysterious Email Challenge -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Stage navigation
        const phishingStageBtns = document.querySelectorAll('.phishing-stage-btn');
        const phishingStages = document.querySelectorAll('.phishing-stage');
        let currentPhishingStage = 1;
        let phishingStagesCompleted = [false, false, false, false, false];
        
        // Add click event handlers for stage navigation
        phishingStageBtns.forEach((btn, index) => {
            btn.addEventListener('click', function() {
                const stageNumber = index + 1;
                
                // Only allow navigation to completed stages or the next unlocked stage
                let canNavigate = false;
                
                if (stageNumber === 1) {
                    // Always allow navigation to stage 1
                    canNavigate = true;
                } else if (stageNumber === 2) {
                    // Can navigate to stage 2 if stage 1 is completed
                    canNavigate = phishingStagesCompleted[0];
                } else if (stageNumber === 3) {
                    // Can navigate to stage 3 if stage 2 is completed
                    canNavigate = phishingStagesCompleted[1];
                } else if (stageNumber === 4) {
                    // Can navigate to stage 4 if stage 3 is completed
                    canNavigate = phishingStagesCompleted[2];
                } else if (stageNumber === 5) {
                    // Can navigate to stage 5 if stage 4 is completed
                    canNavigate = phishingStagesCompleted[3];
                }
                
                if (canNavigate) {
                    navigateToPhishingStage(stageNumber);
                }
            });
        });
        
        // Function to navigate between phishing stages
        function navigateToPhishingStage(stageNumber) {
            currentPhishingStage = stageNumber;
            
            // Update button styles
            phishingStageBtns.forEach((btn, index) => {
                if (index + 1 === stageNumber) {
                    btn.classList.add('active');
                    btn.classList.remove('bg-gray-800/70', 'bg-gray-800/40', 'text-gray-400', 'text-gray-200');
                    btn.classList.add('bg-gradient-to-r', 'from-primary-600', 'to-cyan-600', 'text-white');
                } else {
                    btn.classList.remove('active');
                    
                    // Keep completed stages highlighted
                    if (phishingStagesCompleted[index]) {
                        btn.classList.remove('bg-gray-800/70', 'text-gray-400');
                        btn.classList.add('bg-gradient-to-r', 'from-green-600', 'to-cyan-600', 'text-white');
                    } else if (index > 0 && phishingStagesCompleted[index - 1]) {
                        // Next unlocked stage
                        btn.classList.remove('bg-gray-800/70', 'text-gray-400');
                        btn.classList.add('bg-gray-800/40', 'text-gray-200');
                    } else {
                        // Locked stages
                        btn.classList.remove('bg-gradient-to-r', 'from-primary-600', 'to-cyan-600', 'from-green-600', 'text-white', 'text-gray-200');
                        btn.classList.add('bg-gray-800/70', 'text-gray-400');
                    }
                }
            });
            
            // Show the correct stage
            phishingStages.forEach((stage, index) => {
                if (index + 1 === stageNumber) {
                    stage.classList.remove('hidden');
                    stage.classList.add('active', 'animate__animated', 'animate__fadeIn');
                } else {
                    stage.classList.add('hidden');
                    stage.classList.remove('active', 'animate__animated', 'animate__fadeIn');
                }
            });
        }
        
        // ... existing code ...

        // Code rain animation for email challenge (similar to Secret Code page)
        const emailCodeRainCanvas = document.getElementById('email-code-rain');
        if (emailCodeRainCanvas) {
            const ctx = emailCodeRainCanvas.getContext('2d');
            
            // Set canvas dimensions
            function resizeCanvas() {
                emailCodeRainCanvas.width = emailCodeRainCanvas.parentElement.offsetWidth;
                emailCodeRainCanvas.height = emailCodeRainCanvas.parentElement.offsetHeight;
            }
            
            resizeCanvas();
            window.addEventListener('resize', resizeCanvas);
            
            // Matrix rain effect
            const fontSize = 12;
            const columns = Math.floor(emailCodeRainCanvas.width / fontSize);
            const drops = [];
            
            // Initialize drops
            for (let i = 0; i < columns; i++) {
                drops[i] = Math.floor(Math.random() * -100);
            }
            
            // Characters to display
            const chars = '01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲンабвгдеёжзийклмнопрстуфхцчшщъыьэюя';
            
            function draw() {
                // Semi-transparent black to create fade effect
                ctx.fillStyle = 'rgba(15, 23, 42, 0.05)';
                ctx.fillRect(0, 0, emailCodeRainCanvas.width, emailCodeRainCanvas.height);
                
                // Set text color and font
                ctx.font = `${fontSize}px monospace`;
                
                // Draw characters
                for (let i = 0; i < drops.length; i++) {
                    // Random character
                    const text = chars[Math.floor(Math.random() * chars.length)];
                    
                    // Different shades of green/blue for matrix effect
                    const gradient = Math.random();
                    if (gradient < 0.7) {
                        ctx.fillStyle = 'rgba(16, 185, 129, 0.6)'; // Teal (primary color from Secret Code)
                    } else {
                        ctx.fillStyle = 'rgba(20, 184, 166, 0.5)'; // Lighter teal shade
                    }
                    
                    // Draw the character
                    ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                    
                    // Move drops down and reset when off the screen
                    drops[i]++;
                    
                    // Random reset to create varied rain effect
                    if (drops[i] * fontSize > emailCodeRainCanvas.height && Math.random() > 0.975) {
                        drops[i] = Math.floor(Math.random() * -20);
                    }
                }
            }
            
            // Animation loop - Optimized for PhishGuard email animation
            setInterval(draw, 120);
        }
        
        // Create cybersecurity grid effect
        const cyberGrid = document.querySelector('.cyber-grid');
        if (cyberGrid) {
            const gridSize = 20;
            const rows = Math.ceil(cyberGrid.parentElement.offsetHeight / gridSize);
            const cols = Math.ceil(cyberGrid.parentElement.offsetWidth / gridSize);
            
            for (let i = 0; i < rows; i++) {
                for (let j = 0; j < cols; j++) {
                    // Create grid cell with random chance to be visible
                    if (Math.random() > 0.85) {
                        const cell = document.createElement('div');
                        cell.classList.add('cyber-grid-cell');
                        cell.style.top = `${i * gridSize}px`;
                        cell.style.left = `${j * gridSize}px`;
                        cell.style.width = `${gridSize - 2}px`;
                        cell.style.height = `${gridSize - 2}px`;
                        cell.style.opacity = Math.random() * 0.2 + 0.1;
                        
                        // Randomly choose color
                        const colorClass = Math.random() > 0.5 ? 'cyber-grid-cell-blue' : 'cyber-grid-cell-green';
                        cell.classList.add(colorClass);
                        
                        cyberGrid.appendChild(cell);
                    }
                }
            }
        }
        
        // Animate typing effect for PhishGuard assistant
        const typingText = document.querySelector('.typing-text');
        if (typingText) {
            const originalText = typingText.textContent;
            typingText.textContent = '';
            
            let charIndex = 0;
            const typingSpeed = 30; // ms per character
            
            function typeChar() {
                if (charIndex < originalText.length) {
                    typingText.textContent += originalText.charAt(charIndex);
                    charIndex++;
                    setTimeout(typeChar, typingSpeed);
                }
            }
            
            // Start typing animation
            typeChar();
        }
        
        // Scanner line animation
        const scannerLine = document.querySelector('.email-scanner-line');
        if (scannerLine) {
            scannerLine.style.animation = 'emailScan 3s ease-in-out infinite';
        }
        
        // Highlight suspicious elements in the email when hovering over checkbox items
        const clueCheckboxes = document.querySelectorAll('input[name="clues[]"]');
        const emailContent = document.querySelector('.email-content');
        
        if (clueCheckboxes && emailContent) {
            // Add hover effects
            document.getElementById('clue1').parentNode.addEventListener('mouseenter', () => {
                const senderElement = emailContent.querySelector(':first-child');
                if (senderElement) senderElement.classList.add('highlight-suspicious');
            });
            
            document.getElementById('clue1').parentNode.addEventListener('mouseleave', () => {
                const senderElement = emailContent.querySelector(':first-child');
                if (senderElement) senderElement.classList.remove('highlight-suspicious');
            });
            
            // Highlight urgency text
            document.getElementById('clue2').parentNode.addEventListener('mouseenter', () => {
                const urgencyElements = emailContent.querySelectorAll('p:nth-child(3), p:nth-child(6)');
                urgencyElements.forEach(el => el.classList.add('highlight-suspicious'));
            });
            
            document.getElementById('clue2').parentNode.addEventListener('mouseleave', () => {
                const urgencyElements = emailContent.querySelectorAll('p:nth-child(3), p:nth-child(6)');
                urgencyElements.forEach(el => el.classList.remove('highlight-suspicious'));
            });
            
            // Highlight spelling errors
            document.getElementById('clue3').parentNode.addEventListener('mouseenter', () => {
                const spellingElements = emailContent.querySelectorAll('p:first-child, p:nth-child(4)');
                spellingElements.forEach(el => el.classList.add('highlight-suspicious'));
            });
            
            document.getElementById('clue3').parentNode.addEventListener('mouseleave', () => {
                const spellingElements = emailContent.querySelectorAll('p:first-child, p:nth-child(4)');
                spellingElements.forEach(el => el.classList.remove('highlight-suspicious'));
            });
            
            // Highlight prize text
            document.getElementById('clue4').parentNode.addEventListener('mouseenter', () => {
                const prizeElements = emailContent.querySelectorAll('p:nth-child(3)');
                prizeElements.forEach(el => el.classList.add('highlight-suspicious'));
            });
            
            document.getElementById('clue4').parentNode.addEventListener('mouseleave', () => {
                const prizeElements = emailContent.querySelectorAll('p:nth-child(3)');
                prizeElements.forEach(el => el.classList.remove('highlight-suspicious'));
            });
            
            // Highlight suspicious link
            document.getElementById('clue5').parentNode.addEventListener('mouseenter', () => {
                const linkElements = emailContent.querySelectorAll('.suspicious-link');
                linkElements.forEach(el => el.classList.add('highlight-suspicious'));
            });
            
            document.getElementById('clue5').parentNode.addEventListener('mouseleave', () => {
                const linkElements = emailContent.querySelectorAll('.suspicious-link');
                linkElements.forEach(el => el.classList.remove('highlight-suspicious'));
            });
        }
    });
</script>

<style>
    /* Email Challenge Code Style (similar to Secret Code page) */
    .code-scanner {
        position: relative;
        overflow: hidden;
    }
    
    .code-scanner::before {
        content: '';
        position: absolute;
        top: -100%;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(to right, transparent, #10b981, transparent);
        animation: scan 3s ease-in-out infinite;
        box-shadow: 0 0 15px rgba(16, 185, 129, 0.3);
        z-index: 1;
    }
    
    @keyframes scan {
        0%, 100% { top: -10px; opacity: 0; }
        25%, 75% { opacity: 1; }
        50% { top: 100%; }
    }
    
    /* Email scanner line */
    .email-scanner-line {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(to right, transparent, #38bdf8, transparent);
        box-shadow: 0 0 10px rgba(56, 189, 248, 0.6);
        z-index: 5;
        pointer-events: none;
        animation: emailScan 3s ease-in-out infinite;
    }
    
    @keyframes emailScan {
        0%, 100% { top: 0; opacity: 0; }
        10%, 90% { opacity: 1; }
        50% { top: 100%; }
    }
    
    /* Cyber grid styling */
    .cyber-grid-cell {
        position: absolute;
        border-radius: 2px;
        transition: all 0.5s ease;
    }
    
    .cyber-grid-cell-blue {
        background-color: rgba(56, 189, 248, 0.4);
        box-shadow: 0 0 5px rgba(56, 189, 248, 0.3);
    }
    
    .cyber-grid-cell-green {
        background-color: rgba(16, 185, 129, 0.4);
        box-shadow: 0 0 5px rgba(16, 185, 129, 0.3);
    }
    
    /* Typing animation */
    .typing-container {
        position: relative;
    }
    
    /* Animation classes */
    .hover-glow {
        transition: box-shadow 0.3s ease, transform 0.2s ease;
    }
    
    .hover-glow:hover {
        box-shadow: 0 0 15px rgba(56, 189, 248, 0.3);
        transform: translateY(-2px);
    }
    
    .bounce-subtle {
        animation: bounce-subtle 3s ease-in-out infinite;
    }
    
    @keyframes bounce-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .pulse-subtle {
        animation: pulse-subtle 2s infinite;
    }
    
    @keyframes pulse-subtle {
        0%, 100% { box-shadow: 0 0 0 0 rgba(56, 189, 248, 0.4); }
        50% { box-shadow: 0 0 0 10px rgba(56, 189, 248, 0); }
    }
    
    .hover-float {
        transition: transform 0.3s ease;
    }
    
    .hover-float:hover {
        transform: translateY(-10px);
    }
    
    /* Suspicious highlighting */
    .highlight-suspicious {
        background-color: rgba(239, 68, 68, 0.2);
        color: #f87171;
        transition: all 0.3s ease;
        border-radius: 4px;
        padding: 2px 4px;
    }
    
    /* Cyber button styling */
    .cyber-button {
        position: relative;
        overflow: hidden;
    }
    
    .cyber-button-glitch {
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            rgba(255,255,255,0) 0%, 
            rgba(255,255,255,0.2) 25%, 
            rgba(255,255,255,0.2) 50%, 
            rgba(255,255,255,0) 100%);
        animation: glitch-anim 3s infinite;
    }
    
    @keyframes glitch-anim {
        0% { left: -100%; }
        100% { left: 100%; }
    }
    
    /* Checkbox and radio styling */
    .cyber-checkbox, .cyber-radio {
        appearance: none;
        width: 20px;
        height: 20px;
        border: 2px solid rgba(56, 189, 248, 0.4);
        background-color: rgba(15, 23, 42, 0.8);
        border-radius: 4px;
        cursor: pointer;
        position: relative;
        outline: none;
        transition: all 0.2s ease;
    }
    
    .cyber-radio {
        border-radius: 50%;
    }
    
    .cyber-checkbox:checked, .cyber-radio:checked {
        background-color: rgba(16, 185, 129, 0.8);
        border-color: rgba(16, 185, 129, 0.6);
    }
    
    .cyber-checkbox:checked::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 14px;
    }
    
    .cyber-radio:checked::after {
    content: '';
    position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 10px;
        height: 10px;
        background-color: white;
        border-radius: 50%;
    }
    
    .cyber-checkbox:hover, .cyber-radio:hover {
        box-shadow: 0 0 8px rgba(56, 189, 248, 0.6);
    }
    
    .checkbox-wrapper:hover label, .radio-wrapper:hover label {
        color: #38bdf8;
    }
    
    /* Perspective for 3D effect */
    .perspective {
        perspective: 800px;
}
</style>
@endif 

<!-- Add animation for social media safety section -->
<style>
.social-badge-animate {
    animation: pop-and-glow 1s ease-in-out;
}

@keyframes pop-and-glow {
    0% { transform: scale(1); filter: drop-shadow(0 0 0px rgba(59, 130, 246, 0.8)); }
    50% { transform: scale(1.2); filter: drop-shadow(0 0 15px rgba(59, 130, 246, 0.8)); }
    100% { transform: scale(1); filter: drop-shadow(0 0 5px rgba(59, 130, 246, 0.8)); }
}
</style>

<!-- Social Media Safety Interactive Script -->
<script>
    // Add interactive elements for Social Media Safety section if it exists
    document.addEventListener('DOMContentLoaded', function() {
        const safetyPledgeBtn = document.getElementById('safety-pledge-btn');
        
        if (safetyPledgeBtn) {
            safetyPledgeBtn.addEventListener('click', function() {
                // Create a safety badge element
                const badgeContainer = document.createElement('div');
                badgeContainer.className = 'fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 bg-gradient-to-r from-blue-900 to-purple-900 p-8 rounded-2xl border-4 border-yellow-400 shadow-2xl animate__animated animate__zoomIn text-center';
                
                badgeContainer.innerHTML = `
                    <div class="mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/2526/2526496.png" alt="Safety Badge" class="h-32 mx-auto social-badge-animate">
                                        </div>
                    <h3 class="text-yellow-300 text-2xl font-bold mb-2">Congratulations!</h3>
                    <p class="text-white mb-4">You're now a Social Media Safety Champion!</p>
                    <button id="close-badge" class="px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700">Continue My Mission</button>
                `;
                
                document.body.appendChild(badgeContainer);
                
                // Add confetti effect
                const confettiColors = ['#3b82f6', '#8b5cf6', '#ec4899', '#fbbf24'];
                for (let i = 0; i < 50; i++) {
                    const confetti = document.createElement('div');
                    confetti.className = 'absolute w-3 h-3 rounded-full';
                    confetti.style.backgroundColor = confettiColors[Math.floor(Math.random() * confettiColors.length)];
                    confetti.style.top = `${Math.random() * 100}%`;
                    confetti.style.left = `${Math.random() * 100}%`;
                    confetti.style.opacity = Math.random();
                    confetti.style.animation = `fall ${Math.random() * 3 + 2}s linear forwards`;
                    badgeContainer.appendChild(confetti);
                }
                
                // Close button functionality
                document.getElementById('close-badge').addEventListener('click', function() {
                    badgeContainer.classList.remove('animate__zoomIn');
                    badgeContainer.classList.add('animate__zoomOut');
                    setTimeout(() => {
                        document.body.removeChild(badgeContainer);
                    }, 500);
                });
                
                // Add CSS animation for confetti
                const style = document.createElement('style');
                style.textContent = `
                    @keyframes fall {
                        0% { transform: translateY(-100px) rotate(0deg); opacity: 1; }
                        100% { transform: translateY(500px) rotate(360deg); opacity: 0; }
                    }
                `;
                document.head.appendChild(style);
            });
        }
    });
</script>

<!-- Social Media Mayhem Scripts -->
<script>
    // Execute when DOM is fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Only run this code if on Social Media Mayhem mission
        if (!document.getElementById('social-stage1')) return;
        
        // Element references
        const socialStageBtns = document.querySelectorAll('.social-stage-btn');
        const socialStages = document.querySelectorAll('.social-stage');
        const progressBar = document.getElementById('mission-progress-bar');
        const progressText = document.getElementById('mission-progress-text');
        const submitBtn = document.getElementById('submit-social-media-mission');
        
        // Form inputs
        const completeInput = document.getElementById('social_media_complete');
        const scoreInput = document.getElementById('social_media_score');
        const spotFakeInput = document.getElementById('social_spot_fake_complete');
        const mazeInput = document.getElementById('social_maze_complete');
        const chatInput = document.getElementById('social_chat_complete');
        
        // Track completion status
        const stagesCompleted = [false, false, false];
        
        // Navigation between stages
        socialStageBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => navigateToStage(index + 1));
        });
        
        function navigateToStage(stageNum) {
            // Update button styles
            socialStageBtns.forEach((btn, i) => {
                if (i + 1 === stageNum) {
                    btn.classList.add('active', 'bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
                    btn.classList.remove('bg-gray-800/70', 'text-gray-400');
                } else {
                    btn.classList.remove('active');
                    // Keep colored style if completed
                    if (stagesCompleted[i]) {
                        btn.classList.add('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
                        btn.classList.remove('bg-gray-800/70', 'text-gray-400');
                    } else {
                        btn.classList.remove('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
                        btn.classList.add('bg-gray-800/70', 'text-gray-400');
                    }
                }
            });
            
            // Show selected stage, hide others
            socialStages.forEach((stage, i) => {
                if (i + 1 === stageNum) {
                    stage.classList.remove('hidden');
                    stage.classList.add('active', 'animate__animated', 'animate__fadeIn');
                } else {
                    stage.classList.add('hidden');
                    stage.classList.remove('active', 'animate__animated', 'animate__fadeIn');
                }
            });
        }
        
        // Update progress indicators
        function updateProgress() {
            const count = stagesCompleted.filter(Boolean).length;
            const percentage = (count / 3) * 100;
            
            progressBar.style.width = `${percentage}%`;
            progressText.textContent = `${count}/3 Challenges`;
            
            // Update score and check for completion
            scoreInput.value = count;
            
            if (count === 3) {
                completeInput.value = "1";
                submitBtn.classList.remove('hidden');
                submitBtn.disabled = false;
            }
        }
        
        // === SPOT THE FAKE QUIZ GAME ===
        if (document.getElementById('spot-fake-quiz-container')) {
            const quizCard = document.getElementById('current-quiz-card');
            const quizResults = document.getElementById('quiz-results');
            const questionNum = document.getElementById('current-question-num');
            const scoreDisplay = document.getElementById('current-score');
            const postText = document.getElementById('post-text');
            const postImage = document.getElementById('post-image');
            const submitAnswerBtn = document.getElementById('submit-answer');
            const feedback = document.getElementById('answer-feedback');
            const feedbackIcon = document.getElementById('feedback-icon');
            const feedbackTitle = document.getElementById('feedback-title');
            const feedbackMsg = document.getElementById('feedback-message');
            const redFlagsList = document.getElementById('red-flags-list');
            const nextBtn = document.getElementById('next-question');
            const scorePercent = document.getElementById('score-percent');
            const finalScore = document.getElementById('final-score');
            const scoreMessage = document.getElementById('score-message');
            const badgeEarned = document.getElementById('badge-earned');
            const retryBtn = document.getElementById('retry-quiz');
            const completeBtn = document.getElementById('complete-spot-fake');
            
            // Quiz data
            let currentQuestion = 0;
            let score = 0;
            const questions = [
                {
                    text: "Hey everyone! I just got accepted into this awesome gaming group! They're giving away FREE gaming consoles to the first 100 kids who join! All I had to do was share my home address and my parents' email. Can't wait to get my prize! Join now at gamingprizes4kids.com!",
                    image: "https://cdn-icons-png.flaticon.com/512/5778/5778578.png",
                    isReal: false,
                    redFlags: [
                        "Asking for personal information (home address)",
                        "Requesting parent's email from children",
                        "Offering expensive free prizes (gaming consoles)",
                        "Using a suspicious website (not an official gaming company)",
                        "Creating urgency with 'first 100 kids'"
                    ]
                },
                {
                    text: "Just finished my school project about space! I learned so much about the planets and stars. Check out the model of the solar system I made with my dad! #Science #Space #SchoolProject",
                    image: "https://cdn-icons-png.flaticon.com/512/3074/3074621.png",
                    isReal: true,
                    redFlags: []
                },
                {
                    text: "URGENT MESSAGE: Your account has been selected for a special reward! You have been chosen to test the newest iPhone 15 Pro Max and keep it for FREE! Click here to claim: testnewiphone-free.com/claim",
                    image: "https://cdn-icons-png.flaticon.com/512/644/644458.png",
                    isReal: false,
                    redFlags: [
                        "Creating urgency with 'URGENT MESSAGE'",
                        "Offering expensive free products",
                        "Using a suspicious website (not Apple's official website)",
                        "Too good to be true offer (test and keep a new iPhone)",
                        "Prompting immediate action with 'Click here to claim'"
                    ]
                },
                {
                    text: "Had so much fun at the school science fair today! Our team won second place with our volcano project. Thanks to Ms. Johnson for being an awesome science teacher! #ScienceFair #SchoolFun",
                    image: "https://cdn-icons-png.flaticon.com/512/2646/2646083.png",
                    isReal: true,
                    redFlags: []
                },
                {
                    text: "I'm giving away my Roblox password to the first 5 people who message me! I have rare items and lots of Robux! You just need to send me your username and password first so I can check if you're eligible!",
                    image: "https://cdn-icons-png.flaticon.com/512/681/681494.png",
                    isReal: false,
                    redFlags: [
                        "Offering to share account passwords (major security risk)",
                        "Asking others for their passwords",
                        "Creating urgency with 'first 5 people'",
                        "Breaking platform rules (sharing accounts is against terms of service)",
                        "Suspicious exchange of sensitive information"
                    ]
                }
            ];
            
            // Initialize quiz
            function initQuiz() {
                currentQuestion = 0;
                score = 0;
                loadQuestion();
                scoreDisplay.textContent = score;
                quizResults.classList.add('hidden');
                quizCard.classList.remove('hidden');
            }
            
            // Load current question
            function loadQuestion() {
                const q = questions[currentQuestion];
                questionNum.textContent = currentQuestion + 1;
                postText.textContent = q.text;
                postImage.src = q.image;
                
                // Reset radio buttons
                document.querySelectorAll('input[name="quiz-answer"]').forEach(radio => {
                    radio.checked = false;
                });
                
                feedback.classList.add('hidden');
                document.getElementById('answer-options').classList.remove('hidden');
                submitAnswerBtn.classList.remove('hidden');
            }
            
            // Check answer
            function checkAnswer() {
                const selected = document.querySelector('input[name="quiz-answer"]:checked')?.value;
                if (!selected) return;
                
                const q = questions[currentQuestion];
                const isCorrect = (selected === "real" && q.isReal) || (selected === "fake" && !q.isReal);
                
                // Hide options, show feedback
                document.getElementById('answer-options').classList.add('hidden');
                submitAnswerBtn.classList.add('hidden');
                feedback.classList.remove('hidden');
                
                if (isCorrect) {
                    score++;
                    scoreDisplay.textContent = score;
                    
                    feedbackIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
                    feedbackIcon.className = 'w-10 h-10 rounded-full bg-green-900/50 flex items-center justify-center flex-shrink-0 mr-3';
                    
                    if (q.isReal) {
                        feedbackTitle.textContent = 'Correct! This is a real post.';
                        feedbackTitle.className = 'font-bold text-lg mb-2 text-green-400';
                        feedbackMsg.textContent = 'This post shows normal social activity and doesn\'t ask for personal information or contain suspicious links.';
                    } else {
                        feedbackTitle.textContent = 'Correct! This is a fake post.';
                        feedbackTitle.className = 'font-bold text-lg mb-2 text-green-400';
                        feedbackMsg.textContent = 'Great job spotting this fake! Profile Phantom created this to try to trick people.';
                    }
                } else {
                    feedbackIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>';
                    feedbackIcon.className = 'w-10 h-10 rounded-full bg-red-900/50 flex items-center justify-center flex-shrink-0 mr-3';
                    
                    if (q.isReal) {
                        feedbackTitle.textContent = 'Incorrect. This is actually a real post.';
                        feedbackTitle.className = 'font-bold text-lg mb-2 text-red-400';
                        feedbackMsg.textContent = 'This post shows normal social activity and doesn\'t contain any warning signs of being fake.';
                    } else {
                        feedbackTitle.textContent = 'Incorrect. This is a fake post.';
                        feedbackTitle.className = 'font-bold text-lg mb-2 text-red-400';
                        feedbackMsg.textContent = 'Profile Phantom created this fake post to trick people. Look at the red flags below to learn what to watch for.';
                    }
                }
                
                // Show red flags
                redFlagsList.innerHTML = '';
                if (!q.isReal) {
                    q.redFlags.forEach(flag => {
                        const li = document.createElement('li');
                        li.textContent = flag;
                        li.className = 'text-red-300';
                        redFlagsList.appendChild(li);
                    });
                } else {
                    redFlagsList.innerHTML = '<li class="text-green-300">No red flags! This is a safe post.</li>';
                }
            }
            
            // Show results
            function showResults() {
                quizCard.classList.add('hidden');
                quizResults.classList.remove('hidden');
                
                const percentage = (score / questions.length) * 100;
                scorePercent.textContent = `${percentage}%`;
                finalScore.textContent = score;
                
                // Animate score circle
                const circumference = 2 * Math.PI * 45;
                const offset = circumference - (percentage / 100) * circumference;
                const scoreCircle = document.getElementById('score-circle');
                scoreCircle.style.strokeDasharray = `${circumference} ${circumference}`;
                scoreCircle.style.strokeDashoffset = offset;
                
                // Set message
                if (percentage >= 80) {
                    scoreMessage.innerHTML = '<p class="text-green-300 font-bold">Amazing!</p><p class="text-white">You\'re a social media detective! You can easily spot Profile Phantom\'s tricks!</p>';
                    
                    // Show badge for high scores
                    badgeEarned.classList.remove('hidden');
                    
                    // Mark stage complete
                    stagesCompleted[0] = true;
                    spotFakeInput.value = "1";
                    updateProgress();
                    
                    // Update UI
                    socialStageBtns[0].classList.remove('bg-gray-800/70', 'text-gray-400');
                    socialStageBtns[0].classList.add('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
                } else if (percentage >= 60) {
                    scoreMessage.innerHTML = '<p class="text-blue-300 font-bold">Good job!</p><p class="text-white">You caught most of the fake posts. With a bit more practice, you\'ll be an expert!</p>';
                    badgeEarned.classList.add('hidden');
                } else {
                    scoreMessage.innerHTML = '<p class="text-yellow-300 font-bold">Keep practicing!</p><p class="text-white">Spotting fakes can be tricky. Try the quiz again to improve your detection skills!</p>';
                    badgeEarned.classList.add('hidden');
                }
            }
            
            // Event listeners
            submitAnswerBtn.addEventListener('click', checkAnswer);
            nextBtn.addEventListener('click', function() {
                currentQuestion++;
                if (currentQuestion < questions.length) {
                    loadQuestion();
                } else {
                    showResults();
                }
            });
            retryBtn.addEventListener('click', initQuiz);
            completeBtn.addEventListener('click', function() {
                navigateToStage(2);
            });
            
            // Start quiz
            initQuiz();
        }
        
        // Add demo completion buttons for all games
        const demoButtons = [
            { id: 'complete-spot-fake', stage: 0, input: spotFakeInput },
            { id: 'complete-hacker-maze', stage: 1, input: mazeInput },
            { id: 'complete-chat-sim', stage: 2, input: chatInput }
        ];
        
        demoButtons.forEach(button => {
            const container = stages[button.stage].querySelector('.text-center');
            
            if (container) {
                // Check if a complete button already exists
                const existingBtn = container.querySelector('[data-complete-btn="true"]');
                if (existingBtn) return; // Skip if button already exists
                
                const demoBtn = document.createElement('button');
                demoBtn.setAttribute('data-complete-btn', 'true');
                demoBtn.className = 'mt-6 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold rounded-lg shadow-lg transition-all transform hover:scale-105 shadow-purple-500/20';
                demoBtn.innerHTML = '<span class="flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>Complete Challenge</span>';
                
                demoBtn.addEventListener('click', function() {
                    stagesCompleted[button.stage] = true;
                    button.input.value = "1";
                    updateProgress();
                    
                    stageBtns[button.stage].classList.remove('bg-gray-800/70', 'text-gray-400');
                    stageBtns[button.stage].classList.add('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
                    
                    this.disabled = true;
                    this.innerHTML = '<span class="flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>Completed!</span>';
                    this.className = 'mt-6 px-6 py-3 bg-green-600 text-white font-bold rounded-lg cursor-not-allowed';
                    
                    // Add automatic navigation to next stage when a stage is completed
                    if (button.stage === 0) {
                        // If Spot the Fake is completed, move to Hacker Maze
                        setTimeout(() => showStage(2), 1000);
                    } else if (button.stage === 1) {
                        // If Hacker Maze is completed, move to Chat Simulation
                        setTimeout(() => showStage(3), 1000);
                    }
                });
                
                container.appendChild(demoBtn);
            }
        });
    });
</script>

<script>
    // Social Media Mayhem script
    document.addEventListener('DOMContentLoaded', function() {
        // Only run on Social Media Mayhem page
        if (!document.getElementById('social-stage1')) return;
        
        // Get UI elements
        const stageBtns = document.querySelectorAll('.social-stage-btn');
        const stages = document.querySelectorAll('.social-stage');
        const progressBar = document.getElementById('mission-progress-bar');
        const progressText = document.getElementById('mission-progress-text');
        const submitBtn = document.getElementById('submit-social-media-mission');
        
        // Form inputs
        const completeInput = document.getElementById('social_media_complete');
        const scoreInput = document.getElementById('social_media_score');
        const spotFakeInput = document.getElementById('social_spot_fake_complete');
        const mazeInput = document.getElementById('social_maze_complete');
        const chatInput = document.getElementById('social_chat_complete');
        
        // Track completion status
        const stagesCompleted = [false, false, false];
        
        // Navigation
        stageBtns.forEach((btn, index) => {
            btn.addEventListener('click', function() {
                showStage(index + 1);
            });
        });
        
        function showStage(num) {
            // Update buttons
            stageBtns.forEach((btn, i) => {
                if (i + 1 === num) {
                    btn.classList.add('active', 'bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
                    btn.classList.remove('bg-gray-800/70', 'text-gray-400');
                } else {
                    btn.classList.remove('active');
                    
                    if (stagesCompleted[i]) {
                        btn.classList.add('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
                        btn.classList.remove('bg-gray-800/70', 'text-gray-400');
                    } else {
                        btn.classList.remove('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
                        btn.classList.add('bg-gray-800/70', 'text-gray-400');
                    }
                }
            });
            
            // Show stage
            stages.forEach((stage, i) => {
                if (i + 1 === num) {
                    stage.classList.remove('hidden');
                } else {
                    stage.classList.add('hidden');
                }
            });
        }
        
        // Update progress
        function updateProgress() {
            const count = stagesCompleted.filter(Boolean).length;
            const percentage = (count / 3) * 100;
            
            progressBar.style.width = `${percentage}%`;
            progressText.textContent = `${count}/3 Challenges`;
            
            scoreInput.value = count;
            
            if (count === 3) {
                completeInput.value = "1";
                submitBtn.classList.remove('hidden');
                submitBtn.disabled = false;
            }
        }
        
        // Fix for the "Continue to Next Challenge" button in Spot the Fake quiz
        const completeSpotFakeBtn = document.getElementById('complete-spot-fake');
        if (completeSpotFakeBtn) {
            completeSpotFakeBtn.addEventListener('click', function() {
                // Navigate to Hacker Maze (second stage)
                showStage(2);
            });
        }
        
        // Add functionality for the Escape the Hacker Maze game
        const btnStart = document.getElementById('btn-start');
        const btnPause = document.getElementById('btn-pause');
        const btnJump = document.getElementById('btn-jump');
        const player = document.getElementById('player');
        const gameOverScreen = document.getElementById('game-over-screen');
        const levelComplete = document.getElementById('level-complete');
        const btnRetry = document.getElementById('btn-retry');
        const btnContinue = document.getElementById('btn-continue');
        
        if (btnStart && player) {
            let isGameRunning = false;
            let score = 0;
            let level = 1;
            
            function updateGameUI() {
                // Update score and level display
                document.getElementById('game-score').textContent = score;
                document.getElementById('game-level').textContent = level;
            }
            
            function startGame() {
                isGameRunning = true;
                btnStart.classList.add('hidden');
                btnPause.classList.remove('hidden');
                gameOverScreen.classList.add('hidden');
                
                // Simple animation to show the game is running
                player.classList.add('animate__animated', 'animate__bounce');
                
                // Add space bar control for jump
                document.addEventListener('keydown', function(e) {
                    if (e.code === 'Space' && isGameRunning) {
                        jumpPlayer();
                    }
                });
                
                updateGameUI();
            }
            
            function pauseGame() {
                isGameRunning = false;
                btnPause.classList.add('hidden');
                btnStart.textContent = 'Resume Game';
                btnStart.classList.remove('hidden');
            }
            
            function jumpPlayer() {
                if (!isGameRunning) return;
                
                player.classList.remove('animate__bounce');
                player.classList.add('animate__animated', 'animate__bounceUp');
                
                setTimeout(() => {
                    player.classList.remove('animate__bounceUp');
                    if (isGameRunning) {
                        player.classList.add('animate__bounce');
                    }
                }, 500);
                
                // Increase score
                score += 10;
                updateGameUI();
                
                // Check if level complete
                if (score >= 100) {
                    completeLevel();
                }
            }
            
            function completeLevel() {
                isGameRunning = false;
                levelComplete.classList.remove('hidden');
            }
            
            // Event listeners
            btnStart.addEventListener('click', startGame);
            btnPause.addEventListener('click', pauseGame);
            btnJump.addEventListener('click', jumpPlayer);
            btnRetry.addEventListener('click', function() {
                score = 0;
                level = 1;
                gameOverScreen.classList.add('hidden');
                startGame();
            });
            
            btnContinue.addEventListener('click', function() {
                levelComplete.classList.add('hidden');
                
                // Mark the maze game as complete
                stagesCompleted[1] = true;
                mazeInput.value = "1";
                updateProgress();
                
                // Update UI
                stageBtns[1].classList.remove('bg-gray-800/70', 'text-gray-400');
                stageBtns[1].classList.add('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
                
                // Navigate to chat simulation (stage 3)
                setTimeout(() => showStage(3), 1000);
            });
        }
    });
</script>

<!-- Type PhishGuard's welcome message -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Type PhishGuard's welcome message
        const phishingAssistantText = document.getElementById('phishing-assistant-text');
        if (phishingAssistantText) {
            const welcomeMessage = "Hi there! I'm PhishGuard! I'll help you spot tricky emails and messages that might be trying to steal your information. Let's learn how to stay safe online!";
            let charIndex = 0;
            
            function typeWelcomeMessage() {
                if (charIndex < welcomeMessage.length) {
                    phishingAssistantText.textContent += welcomeMessage.charAt(charIndex);
                    charIndex++;
                    setTimeout(typeWelcomeMessage, 30);
                }
            }
            
            // Start typing animation
            typeWelcomeMessage();
        }
        
        // Code rain animation for email challenge (similar to Secret Code page)
        const emailCodeRainCanvas = document.getElementById('email-code-rain');
        if (emailCodeRainCanvas) {
            const ctx = emailCodeRainCanvas.getContext('2d');
            
            // Set canvas dimensions
            function resizeCanvas() {
                emailCodeRainCanvas.width = emailCodeRainCanvas.parentElement.offsetWidth;
                emailCodeRainCanvas.height = emailCodeRainCanvas.parentElement.offsetHeight;
            }
            
            resizeCanvas();
            window.addEventListener('resize', resizeCanvas);
            
            // Matrix rain effect
            const fontSize = 12;
            const columns = Math.floor(emailCodeRainCanvas.width / fontSize);
            const drops = [];
            
            // Initialize drops
            for (let i = 0; i < columns; i++) {
                drops[i] = Math.floor(Math.random() * -100);
            }
            
            // Characters to display
            const chars = '01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲンабвгдеёжзийклмнопрстуфхцчшщъыьэюя';
            
            function draw() {
                // Semi-transparent black to create fade effect
                ctx.fillStyle = 'rgba(15, 23, 42, 0.05)';
                ctx.fillRect(0, 0, emailCodeRainCanvas.width, emailCodeRainCanvas.height);
                
                // Set text color and font
                ctx.font = `${fontSize}px monospace`;
                
                // Draw characters
                for (let i = 0; i < drops.length; i++) {
                    // Random character
                    const text = chars[Math.floor(Math.random() * chars.length)];
                    
                    // Different shades of green/blue for matrix effect
                    const gradient = Math.random();
                    if (gradient < 0.7) {
                        ctx.fillStyle = 'rgba(16, 185, 129, 0.6)'; // Teal (primary color from Secret Code)
                    } else {
                        ctx.fillStyle = 'rgba(20, 184, 166, 0.5)'; // Lighter teal shade
                    }
                    
                    // Draw the character
                    ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                    
                    // Move drops down and reset when off the screen
                    drops[i]++;
                    
                    // Random reset to create varied rain effect
                    if (drops[i] * fontSize > emailCodeRainCanvas.height && Math.random() > 0.975) {
                        drops[i] = Math.floor(Math.random() * -20);
                    }
                }
            }
            
            // Animation loop - Optimized for typing animation canvas
            setInterval(draw, 120);
        }
        
        // Create cybersecurity grid effect
        const cyberGrid = document.querySelector('.cyber-grid');
        if (cyberGrid) {
            const gridSize = 20;
            const rows = Math.ceil(cyberGrid.parentElement.offsetHeight / gridSize);
            const cols = Math.ceil(cyberGrid.parentElement.offsetWidth / gridSize);
            
            for (let i = 0; i < rows; i++) {
                for (let j = 0; j < cols; j++) {
                    // Create grid cell with random chance to be visible
                    if (Math.random() > 0.85) {
                        const cell = document.createElement('div');
                        cell.classList.add('cyber-grid-cell');
                        cell.style.top = `${i * gridSize}px`;
                        cell.style.left = `${j * gridSize}px`;
                        cell.style.width = `${gridSize - 2}px`;
                        cell.style.height = `${gridSize - 2}px`;
                        cell.style.opacity = Math.random() * 0.2 + 0.1;
                        
                        // Randomly choose color
                        const colorClass = Math.random() > 0.5 ? 'cyber-grid-cell-blue' : 'cyber-grid-cell-green';
                        cell.classList.add(colorClass);
                        
                        cyberGrid.appendChild(cell);
                    }
                }
            }
        }
        
        // Add hover effects to email content when hovering over checkboxes
        const email = document.querySelector('.email-content');
        if (email) {
            // Add suspicious link hover effect
            const suspiciousLink = email.querySelector('.suspicious-link');
            if (suspiciousLink) {
                suspiciousLink.addEventListener('mouseover', function() {
                    this.style.boxShadow = '0 0 15px rgba(239, 68, 68, 0.6)';
                });
                
                suspiciousLink.addEventListener('mouseout', function() {
                    this.style.boxShadow = 'none';
                });
            }
            
            // Highlight urgent text with hover
            const urgentTexts = email.querySelectorAll('p:nth-child(1), p:nth-child(3), p:nth-child(6)');
            urgentTexts.forEach(text => {
                text.classList.add('hover:text-danger-300', 'transition-colors', 'duration-300');
            });
        }
    });
</script>

<!-- Script to handle the "Check My Answers" button for phishing email challenge -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle "Check My Answers" button functionality for the phishing email challenge
        const checkBasicsBtn = document.getElementById('check-basics');
        if (checkBasicsBtn) {
            checkBasicsBtn.addEventListener('click', function() {
                // Get selected clues
                const selectedClues = Array.from(document.querySelectorAll('input[name="clues[]"]:checked'))
                    .map(checkbox => checkbox.value);
                
                // Get selected action
                const selectedAction = document.querySelector('input[name="action"]:checked')?.value;
                
                // Check if user has selected clues and an action
                if (selectedClues.length === 0 || !selectedAction) {
                    alert('Please identify the suspicious elements and choose what action to take.');
                    return;
                }
                
                // Check if correct action is selected (report)
                const isActionCorrect = selectedAction === 'report';
                
                // Check how many clues were correctly identified (all 5 should be selected)
                const correctCluesCount = selectedClues.length;
                const totalCorrectClues = 5; // Total number of clues
                
                // Create feedback message
                let feedbackTitle, feedbackMessage, feedbackClass;
                
                if (isActionCorrect && correctCluesCount === totalCorrectClues) {
                    feedbackTitle = 'Excellent job!';
                    feedbackMessage = 'You correctly identified all the suspicious elements and chose the right action. This is definitely a phishing email that should be reported and deleted.';
                    feedbackClass = 'bg-green-700/50 text-green-300 border-green-500/30';
                    
                    // Mark this stage as completed if tracking variable exists
                    if (typeof phishingStagesCompleted !== 'undefined') {
                        phishingStagesCompleted[0] = true;
                        
                        // Update UI to reflect completion
                        const phishingStageBtns = document.querySelectorAll('.phishing-stage-btn');
                        if (phishingStageBtns.length > 0) {
                            phishingStageBtns[0].classList.remove('bg-gray-800/70', 'text-gray-400');
                            phishingStageBtns[0].classList.add('bg-gradient-to-r', 'from-primary-600', 'to-cyan-600', 'text-white');
                            
                            // Enable next stage button
                            if (phishingStageBtns[1]) {
                                phishingStageBtns[1].classList.remove('bg-gray-800/70', 'text-gray-400');
                                phishingStageBtns[1].classList.add('bg-gray-800/40', 'text-gray-200');
                            }
                        }
                    }
                } else if (isActionCorrect) {
                    feedbackTitle = 'Good choice, but keep looking!';
                    feedbackMessage = `You correctly chose to report the email, but you missed some suspicious elements. You found ${correctCluesCount} out of ${totalCorrectClues} clues. Try again and see if you can find them all!`;
                    feedbackClass = 'bg-blue-700/50 text-blue-300 border-blue-500/30';
                } else {
                    feedbackTitle = 'Be careful!';
                    feedbackMessage = 'This is a dangerous phishing email. You should mark it as spam/phishing and delete it rather than interacting with it in any way.';
                    feedbackClass = 'bg-red-700/50 text-red-300 border-red-500/30';
                }
                
                // Display feedback
                const feedbackEl = document.createElement('div');
                feedbackEl.className = `mt-6 p-4 rounded-lg ${feedbackClass} animate__animated animate__fadeIn`;
                feedbackEl.innerHTML = `
                    <h4 class="font-bold text-lg mb-2">${feedbackTitle}</h4>
                    <p>${feedbackMessage}</p>
                `;
                
                // Remove any existing feedback
                const existingFeedback = checkBasicsBtn.parentNode.querySelector('.animate__fadeIn');
                if (existingFeedback) {
                    existingFeedback.remove();
                }
                
                // Add feedback after the button
                checkBasicsBtn.parentNode.appendChild(feedbackEl);
                
                // If they got everything right, show a continue button
                if (isActionCorrect && correctCluesCount === totalCorrectClues) {
                    const continueBtn = document.createElement('button');
                    continueBtn.className = 'cyber-button px-6 py-2 mt-4 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-700 hover:to-blue-700 text-white font-bold rounded-md transition-all duration-300 relative overflow-hidden shadow-lg shadow-blue-500/20 hover:shadow-blue-500/40 transform hover:translate-y-[-3px]';
                    continueBtn.innerHTML = '<span class="relative z-10">Complete Mission</span>';
                    
                    continueBtn.addEventListener('click', function() {
                        // Submit mission completion with results
                        completeMission({
                            'clues': selectedClues,
                            'action': selectedAction,
                            'mission_complete': true
                        });
                    });
                    
                    feedbackEl.appendChild(continueBtn);
                }
            });
        }
    });
</script>

<!-- Social Media Mayhem Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Only run this code if on Social Media Mayhem mission
        if(document.getElementById('social-stage1')) {
            // ... existing code ...
            
            // Matrix-like code rain background for Social Media Mayhem
            const codeRainCanvas = document.getElementById('social-code-rain');
            if (codeRainCanvas) {
                const ctx = codeRainCanvas.getContext('2d');
                codeRainCanvas.width = window.innerWidth;
                codeRainCanvas.height = window.innerHeight;
                
                const matrix = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#$%^&*()*&^%";
                const matrixChars = matrix.split("");
                
                const fontSize = 14;
                const columns = codeRainCanvas.width / fontSize;
                
                const drops = [];
                for (let i = 0; i < columns; i++) {
                    drops[i] = Math.floor(Math.random() * codeRainCanvas.height / fontSize);
                }
                
                function drawCodeRain() {
                    // Semi-transparent black to create fade effect
                    ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
                    ctx.fillRect(0, 0, codeRainCanvas.width, codeRainCanvas.height);
                    
                    ctx.fillStyle = "#8B5CF6"; // Purple color for matrix code
                    ctx.font = fontSize + "px monospace";
                    
                    for (let i = 0; i < drops.length; i++) {
                        // Random character
                        const text = matrixChars[Math.floor(Math.random() * matrixChars.length)];
                        // Position character
                        ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                        
                        // Check if it's time to reset drop
                        if (drops[i] * fontSize > codeRainCanvas.height && Math.random() > 0.975) {
                            drops[i] = 0;
                        }
                        
                        // Move drop down
                        drops[i]++;
                    }
                }
                
                // Animation loop - Optimized for code rain performance
                setInterval(drawCodeRain, 80);
                
                // Resize handling
                window.addEventListener('resize', function() {
                    codeRainCanvas.width = window.innerWidth;
                    codeRainCanvas.height = window.innerHeight;
                });
            }
            
            // Create digital nodes
            const nodesContainer = document.querySelector('.digital-nodes');
            if (nodesContainer) {
                // Create 50 random nodes
                for (let i = 0; i < 50; i++) {
                    const node = document.createElement('div');
                    node.classList.add('node');
                    
                    // Random position
                    const posX = Math.random() * 100;
                    const posY = Math.random() * 100;
                    node.style.left = posX + '%';
                    node.style.top = posY + '%';
                    
                    // Random size (1-3px)
                    const size = Math.random() * 2 + 1;
                    node.style.width = size + 'px';
                    node.style.height = size + 'px';
                    
                    // Random opacity
                    node.style.opacity = Math.random() * 0.8 + 0.2;
                    
                    // Random pulsing animation
                    const animationDuration = Math.random() * 3 + 2;
                    node.style.animation = `pulse-subtle ${animationDuration}s ease-in-out infinite`;
                    
                    nodesContainer.appendChild(node);
                }
            }
            
            // Create digital rain effect
            const digitalRain = document.querySelector('.digital-rain');
            if (digitalRain) {
                const characters = "10";
                const columnCount = Math.floor(window.innerWidth / 15); // One column every 15px
                
                for (let i = 0; i < columnCount; i++) {
                    const column = document.createElement('div');
                    column.classList.add('rain-column');
                    
                    // Random position
                    column.style.left = (i * 15) + Math.random() * 10 + 'px';
                    
                    // Random animation duration
                    const duration = Math.random() * 10 + 5;
                    column.style.animationDuration = duration + 's';
                    
                    // Generate random binary characters
                    const length = Math.floor(Math.random() * 20) + 10;
                    let content = '';
                    for (let j = 0; j < length; j++) {
                        content += characters.charAt(Math.floor(Math.random() * characters.length));
                    }
                    column.textContent = content;
                    
                    digitalRain.appendChild(column);
                }
            }
            
            // Floating particles animation
            const particles = document.querySelectorAll('.floating-particle');
            particles.forEach(particle => {
                // Random size
                const size = Math.floor(Math.random() * 6) + 4;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                
                // Random color
                const colors = ['#8B5CF6', '#3B82F6', '#06B6D4', '#10B981'];
                const color = colors[Math.floor(Math.random() * colors.length)];
                particle.style.backgroundColor = color;
                particle.style.boxShadow = `0 0 10px ${color}`;
                
                // Set initial position
                particle.style.position = 'absolute';
                particle.style.borderRadius = '50%';
                
                // Animate floating
                animateParticle(particle);
            });
            
            function animateParticle(particle) {
                // Random movement duration
                const duration = Math.floor(Math.random() * 8) + 4;
                // Random X and Y movement range
                const xMove = Math.floor(Math.random() * 30) - 15;
                const yMove = Math.floor(Math.random() * 30) - 15;
                
                // Current position
                const currentLeft = parseInt(particle.style.left) || 0;
                const currentTop = parseInt(particle.style.top) || 0;
                
                // Animate to new position
                particle.style.transition = `all ${duration}s ease-in-out`;
                particle.style.left = (currentLeft + xMove) + '%';
                particle.style.top = (currentTop + yMove) + '%';
                
                // Schedule next animation
                setTimeout(() => animateParticle(particle), duration * 1000);
            }
            
            // Add typing effect to elements with typing-text class
            const typingElements = document.querySelectorAll('.typing-text');
            typingElements.forEach(element => {
                const text = element.textContent;
                element.textContent = '';
                
                let i = 0;
                function typeWriter() {
                    if (i < text.length) {
                        element.textContent += text.charAt(i);
                        i++;
                        setTimeout(typeWriter, 30);
                    }
                }
                
                typeWriter();
            });
        }
    });

    // Mission completion form submission
    window.completeMission = function(formData = {}) {
        // Show completion animation
        const completionOverlay = document.createElement('div');
        completionOverlay.className = 'fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center';
        completionOverlay.innerHTML = `
            <div class="bg-gradient-to-br from-slate-800 to-slate-900 p-8 rounded-2xl border border-emerald-500/30 text-center max-w-md mx-4 animate__animated animate__zoomIn">
                <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check text-white text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4">Mission Complete!</h2>
                <p class="text-gray-300 mb-6">Analyzing your performance...</p>
                <div class="w-full bg-gray-700 rounded-full h-2 mb-4">
                    <div class="bg-gradient-to-r from-emerald-500 to-cyan-500 h-2 rounded-full animate-pulse" style="width: 100%"></div>
                </div>
            </div>
        `;
        document.body.appendChild(completionOverlay);

        // Create and submit form
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("game.submit-mission", $mission["id"]) }}';
        
        // Add CSRF token
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);
        
        // Add form data
        Object.keys(formData).forEach(key => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = formData[key];
            form.appendChild(input);
        });
        
        document.body.appendChild(form);
        
        // Submit after delay for animation
        setTimeout(() => {
            form.submit();
        }, 2000);
    };
    
    // Add handlers for new phishing stages
    document.addEventListener('DOMContentLoaded', function() {
        // Stage 2: Outlook Phishing Handler
        const checkOutlookBtn = document.getElementById('check-outlook');
        if (checkOutlookBtn) {
            checkOutlookBtn.addEventListener('click', function() {
                const selectedClues = Array.from(document.querySelectorAll('input[name="outlook-clues[]"]:checked'))
                    .map(checkbox => checkbox.value);
                const selectedAction = document.querySelector('input[name="outlook-action"]:checked')?.value;
                
                const correctClues = ['domain', 'urgency', 'link', 'attachment'];
                const correctAction = 'report';
                
                const correctCluesCount = selectedClues.filter(clue => correctClues.includes(clue)).length;
                const isActionCorrect = selectedAction === correctAction;
                
                let feedbackTitle, feedbackMessage, feedbackClass;
                
                if (isActionCorrect && correctCluesCount === correctClues.length) {
                    feedbackTitle = 'Outstanding!';
                    feedbackMessage = 'You successfully identified all Outlook phishing indicators and chose the correct response. Great work!';
                    feedbackClass = 'bg-green-700/50 text-green-300 border-green-500/30';
                    
                    if (typeof phishingStagesCompleted !== 'undefined') {
                        phishingStagesCompleted[1] = true;
                        const phishingStageBtns = document.querySelectorAll('.phishing-stage-btn');
                        if (phishingStageBtns[1]) {
                            phishingStageBtns[1].classList.remove('bg-gray-800/70', 'text-gray-400');
                            phishingStageBtns[1].classList.add('bg-gradient-to-r', 'from-green-600', 'to-cyan-600', 'text-white');
                        }
                        if (phishingStageBtns[2]) {
                            phishingStageBtns[2].classList.remove('bg-gray-800/70', 'text-gray-400');
                            phishingStageBtns[2].classList.add('bg-gray-800/40', 'text-gray-200');
                        }
                    }
                } else {
                    feedbackTitle = 'Keep practicing!';
                    feedbackMessage = `You found ${correctCluesCount} out of ${correctClues.length} clues. ${isActionCorrect ? 'Good action choice!' : 'Remember to report and delete phishing emails.'} Try again!`;
                    feedbackClass = 'bg-yellow-700/50 text-yellow-300 border-yellow-500/30';
                }
                
                showFeedback(feedbackTitle, feedbackMessage, feedbackClass);
            });
        }
        
        // Stage 3: Gmail Phishing Handler
        const checkGmailBtn = document.getElementById('check-gmail');
        if (checkGmailBtn) {
            checkGmailBtn.addEventListener('click', function() {
                const selectedClues = Array.from(document.querySelectorAll('input[name="gmail-clues[]"]:checked'))
                    .map(checkbox => checkbox.value);
                const selectedAction = document.querySelector('input[name="gmail-action"]:checked')?.value;
                
                const correctClues = ['domain', 'urgency', 'timeline', 'button', 'warning'];
                const correctActions = ['check', 'report']; // Both are acceptable
                
                const correctCluesCount = selectedClues.filter(clue => correctClues.includes(clue)).length;
                const isActionCorrect = correctActions.includes(selectedAction);
                
                let feedbackTitle, feedbackMessage, feedbackClass;
                
                if (isActionCorrect && correctCluesCount === correctClues.length) {
                    feedbackTitle = 'Excellent detection!';
                    feedbackMessage = 'You caught all the Gmail phishing signs and chose a safe response. Well done!';
                    feedbackClass = 'bg-green-700/50 text-green-300 border-green-500/30';
                    
                    if (typeof phishingStagesCompleted !== 'undefined') {
                        phishingStagesCompleted[2] = true;
                        const phishingStageBtns = document.querySelectorAll('.phishing-stage-btn');
                        if (phishingStageBtns[2]) {
                            phishingStageBtns[2].classList.remove('bg-gray-800/70', 'text-gray-400');
                            phishingStageBtns[2].classList.add('bg-gradient-to-r', 'from-green-600', 'to-cyan-600', 'text-white');
                        }
                        if (phishingStageBtns[3]) {
                            phishingStageBtns[3].classList.remove('bg-gray-800/70', 'text-gray-400');
                            phishingStageBtns[3].classList.add('bg-gray-800/40', 'text-gray-200');
                        }
                    }
                } else {
                    feedbackTitle = 'Good effort!';
                    feedbackMessage = `You identified ${correctCluesCount} out of ${correctClues.length} warning signs. ${isActionCorrect ? 'Smart action choice!' : 'Best to check directly or report suspicious emails.'} Keep learning!`;
                    feedbackClass = 'bg-yellow-700/50 text-yellow-300 border-yellow-500/30';
                }
                
                showFeedback(feedbackTitle, feedbackMessage, feedbackClass);
            });
        }
        
        // Stage 4: SMS Scams Handler
        const checkSmsBtn = document.getElementById('check-sms');
        if (checkSmsBtn) {
            checkSmsBtn.addEventListener('click', function() {
                const selectedClues = Array.from(document.querySelectorAll('input[name="sms-clues[]"]:checked'))
                    .map(checkbox => checkbox.value);
                const selectedAction = document.querySelector('input[name="sms-action"]:checked')?.value;
                
                const correctClues = ['impersonation', 'urgency', 'suspicious-links', 'countdown', 'prize'];
                const correctAction = 'delete';
                
                const correctCluesCount = selectedClues.filter(clue => correctClues.includes(clue)).length;
                const isActionCorrect = selectedAction === correctAction;
                
                let feedbackTitle, feedbackMessage, feedbackClass;
                
                if (isActionCorrect && correctCluesCount === correctClues.length) {
                    feedbackTitle = 'SMS scam expert!';
                    feedbackMessage = 'You identified all SMS scam tactics and chose the safest response. Excellent work!';
                    feedbackClass = 'bg-green-700/50 text-green-300 border-green-500/30';
                    
                    if (typeof phishingStagesCompleted !== 'undefined') {
                        phishingStagesCompleted[3] = true;
                        const phishingStageBtns = document.querySelectorAll('.phishing-stage-btn');
                        if (phishingStageBtns[3]) {
                            phishingStageBtns[3].classList.remove('bg-gray-800/70', 'text-gray-400');
                            phishingStageBtns[3].classList.add('bg-gradient-to-r', 'from-green-600', 'to-cyan-600', 'text-white');
                        }
                        if (phishingStageBtns[4]) {
                            phishingStageBtns[4].classList.remove('bg-gray-800/70', 'text-gray-400');
                            phishingStageBtns[4].classList.add('bg-gray-800/40', 'text-gray-200');
                        }
                    }
                } else {
                    feedbackTitle = 'Learning progress!';
                    feedbackMessage = `You spotted ${correctCluesCount} out of ${correctClues.length} scam tactics. ${isActionCorrect ? 'Great response!' : 'Remember to delete suspicious messages and contact companies directly.'} Try again!`;
                    feedbackClass = 'bg-yellow-700/50 text-yellow-300 border-yellow-500/30';
                }
                
                showFeedback(feedbackTitle, feedbackMessage, feedbackClass);
            });
        }
        
        // Stage 5: Final Test Handler
        const checkFinalBtn = document.getElementById('check-final');
        if (checkFinalBtn) {
            checkFinalBtn.addEventListener('click', function() {
                const pattern = document.getElementById('final-pattern')?.value;
                const danger = document.getElementById('final-danger')?.value;
                const q1 = document.querySelector('input[name="final-q1"]:checked')?.value;
                const q2 = document.querySelector('input[name="final-q2"]:checked')?.value;
                const q3 = document.querySelector('input[name="final-q3"]:checked')?.value;
                
                const correctAnswers = {
                    pattern: 'coordinated',
                    danger: 'sophisticated',
                    q1: 'hover',
                    q2: 'direct',
                    q3: 'combination'
                };
                
                let score = 0;
                if (pattern === correctAnswers.pattern) score++;
                if (danger === correctAnswers.danger) score++;
                if (q1 === correctAnswers.q1) score++;
                if (q2 === correctAnswers.q2) score++;
                if (q3 === correctAnswers.q3) score++;
                
                let feedbackTitle, feedbackMessage, feedbackClass;
                
                if (score === 5) {
                    feedbackTitle = 'Phishing Expert!';
                    feedbackMessage = 'Perfect score! You have mastered phishing detection across all platforms. You are now a certified phishing defense expert!';
                    feedbackClass = 'bg-green-700/50 text-green-300 border-green-500/30';
                    
                    if (typeof phishingStagesCompleted !== 'undefined') {
                        phishingStagesCompleted[4] = true;
                        const phishingStageBtns = document.querySelectorAll('.phishing-stage-btn');
                        if (phishingStageBtns[4]) {
                            phishingStageBtns[4].classList.remove('bg-gray-800/70', 'text-gray-400');
                            phishingStageBtns[4].classList.add('bg-gradient-to-r', 'from-green-600', 'to-cyan-600', 'text-white');
                        }
                    }
                } else if (score >= 3) {
                    feedbackTitle = 'Well done!';
                    feedbackMessage = `You got ${score} out of 5 correct. You have a solid understanding of phishing defense. Review the areas you missed and try again for a perfect score!`;
                    feedbackClass = 'bg-blue-700/50 text-blue-300 border-blue-500/30';
                } else {
                    feedbackTitle = 'Keep learning!';
                    feedbackMessage = `You got ${score} out of 5 correct. Review the phishing detection principles and try the challenge again. Practice makes perfect!`;
                    feedbackClass = 'bg-yellow-700/50 text-yellow-300 border-yellow-500/30';
                }
                
                showFeedback(feedbackTitle, feedbackMessage, feedbackClass);
            });
        }
        
        // Helper function to show feedback
        function showFeedback(title, message, className) {
            // Create or update feedback element
            let feedback = document.getElementById('phishing-feedback');
            if (!feedback) {
                feedback = document.createElement('div');
                feedback.id = 'phishing-feedback';
                feedback.className = 'mt-6 p-4 rounded-lg border animate__animated animate__fadeIn';
                
                // Find the button that was clicked and insert feedback after it
                const activeStage = document.querySelector('.phishing-stage:not(.hidden)');
                if (activeStage) {
                    const buttonContainer = activeStage.querySelector('.text-center');
                    if (buttonContainer) {
                        buttonContainer.appendChild(feedback);
                    }
                }
            }
            
            // Update feedback content and styling
            feedback.className = `mt-6 p-4 rounded-lg border animate__animated animate__fadeIn ${className}`;
            feedback.innerHTML = `<strong>${title}</strong><br>${message}`;
        }
    });
</script>
@endsection