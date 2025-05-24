@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/secret-code.css') }}">
@endsection

@section('content')
<div class="code-bg min-h-screen py-12 px-4 relative">
    <!-- Matrix-like code rain background -->
    <canvas id="code-rain-canvas" class="fixed top-0 left-0 w-full h-full -z-10"></canvas>
    
    <div class="container mx-auto max-w-4xl relative z-10">
        <!-- Header -->
        <div class="code-card code-glow mb-8">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 mr-3 text-cyan-400">
                        <path fill-rule="evenodd" d="M12 1.5a.75.75 0 01.75.75V4.5a.75.75 0 01-1.5 0V2.25A.75.75 0 0112 1.5zM5.636 4.136a.75.75 0 011.06 0l1.592 1.591a.75.75 0 01-1.061 1.06l-1.591-1.59a.75.75 0 010-1.061zm12.728 0a.75.75 0 010 1.06l-1.591 1.592a.75.75 0 01-1.06-1.061l1.59-1.591a.75.75 0 011.061 0zm-6.816 4.496a.75.75 0 01.82.311l5.228 7.917a.75.75 0 01-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 01-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 01-1.247-.606l.569-9.47a.75.75 0 01.554-.68z" clip-rule="evenodd" />
                    </svg>
                    <h1 class="text-3xl font-game matrix-text text-cyan-400">Secret Code Academy</h1>
                </div>
                <div class="hidden md:flex items-center">
                    <div class="cyber-shield w-12 h-12 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-cyan-400">
                            <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.75.75 0 00.674 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-80 text-cyan-100">Cyber Shield Level</p>
                        <div class="w-48 h-3 bg-gray-700 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-cyan-400 to-emerald-400" style="width: {{ session('shield_level', 0) * 10 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4">
                <p class="text-lg typewriter text-cyan-100">Welcome to the Secret Code Academy, {{ $player_name }}!</p>
                <p class="text-cyan-100">Here you'll learn about encryption and how to keep messages safe. Complete each level to unlock new challenges and earn Cyber Shield points!</p>
                
                <!-- Animated terminal-like element -->
                <div class="bg-gray-900 border border-cyan-500/30 rounded-lg p-3 font-mono text-sm">
                    <div class="flex items-center text-gray-400 mb-2">
                        <span class="w-3 h-3 rounded-full bg-red-500 mr-2"></span>
                        <span class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></span>
                        <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>
                        <span class="ml-2 text-xs">terminal@secret-code-academy</span>
                    </div>
                    <div class="text-cyan-400">
                        <span class="text-green-400">$</span> <span class="code-cursor">initialize_mission --agent="{{ $player_name }}" --security-level=high</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Level Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($levels as $level)
            <a href="{{ $level['unlocked'] ? route('game.secret-code.level', $level['id']) : '#' }}" 
               class="block transition transform hover:scale-105 {{ !$level['unlocked'] ? 'opacity-60 cursor-not-allowed' : 'sound-hover' }}">
                <div class="code-card code-scanner relative">
                    <!-- Level indicator -->
                    <div class="absolute -top-3 -right-3 w-10 h-10 rounded-full bg-gradient-to-br from-cyan-500 to-emerald-500 flex items-center justify-center text-white font-bold shadow-lg">
                        {{ $level['id'] }}
                    </div>
                    
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-800 flex-shrink-0 flex items-center justify-center">
                            @if(!$level['unlocked'])
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-cyan-400">
                                <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-cyan-400">
                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                            </svg>
                            @endif
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-game text-cyan-300">{{ $level['name'] }}</h3>
                            <p class="text-sm text-cyan-100/70">Difficulty: 
                                <span class="
                                    @if($level['difficulty'] == 'Easy') text-green-400 
                                    @elseif($level['difficulty'] == 'Medium') text-yellow-400 
                                    @else text-red-400 
                                    @endif
                                ">{{ $level['difficulty'] }}</span>
                            </p>
                        </div>
                    </div>
                    
                    <p class="text-cyan-100/90">{{ $level['description'] }}</p>
                    
                    <!-- Animated button for unlocked levels -->
                    @if($level['unlocked'])
                    <div class="mt-4 text-right">
                        <span class="inline-block code-button">
                            <span class="mr-2">Start Mission</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 inline-block">
                                <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                    @else
                    <div class="mt-4 flex items-center justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-cyan-400 mr-2">
                            <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-cyan-400/70 text-sm">Complete previous level to unlock</span>
                    </div>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
        
        <!-- Secret code hints section -->
        <div class="code-card code-glow mt-8 binary-bg">
            <h2 class="text-2xl font-game text-cyan-400 mb-4">Cryptography Hints</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-900/50 p-4 rounded-lg border border-cyan-500/20">
                    <h3 class="font-bold text-cyan-300 mb-2">Caesar Cipher</h3>
                    <p class="text-cyan-100 text-sm">Shift each letter in the alphabet by a fixed number of positions. Example: With a shift of 3, A becomes D, B becomes E, etc.</p>
                </div>
                <div class="bg-gray-900/50 p-4 rounded-lg border border-cyan-500/20">
                    <h3 class="font-bold text-cyan-300 mb-2">Reverse Cipher</h3>
                    <p class="text-cyan-100 text-sm">Read the message backwards to reveal its true meaning. Simple but effective for basic encryption.</p>
                </div>
                <div class="bg-gray-900/50 p-4 rounded-lg border border-cyan-500/20">
                    <h3 class="font-bold text-cyan-300 mb-2">Symbol Substitution</h3>
                    <p class="text-cyan-100 text-sm">Replace each letter with a unique symbol. To decrypt, you need the key that matches symbols to letters.</p>
                </div>
            </div>
            
            <!-- Interactive cipher example -->
            <div class="mt-6 p-4 bg-gray-900/50 rounded-lg border border-cyan-500/20">
                <h3 class="font-bold text-cyan-300 mb-2">Try it yourself:</h3>
                <p class="cipher-text font-mono tracking-wider cursor-pointer" data-decoded="CLICK ME TO DECODE THIS MESSAGE">
                    #@!$% ^& *) |)&$)|)& *(!$ ^&$$@(&
                </p>
                <p class="text-xs text-cyan-400/60 mt-1">Click the text above to decode</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/secret-code.js') }}"></script>
@endsection
