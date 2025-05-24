@extends('layouts.app')

@section('content')
<div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: -100;">
    <video autoplay muted loop style="position: absolute; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; transform: translateX(-50%) translateY(-50%);">
        <source src="{{ asset('galaxy.mp4') }}" type="video/mp4">
    </video>
</div>

<div class="min-h-screen relative">
    <div class="container mx-auto px-4 py-8 relative">
        <div class="text-center mb-8">
            <h1 class="text-4xl md:text-5xl font-game text-white mb-4">Cyber Time Travel</h1>
            <p class="text-lg text-blue-100 max-w-3xl mx-auto">Join our adventure through time to discover famous cyber attacks and learn how to protect yourself online!</p>
        </div>
        
        <div class="time-machine bg-gray-900 bg-opacity-70 rounded-xl p-6 md:p-8 text-center max-w-3xl mx-auto mb-12 border-2 border-blue-400 shadow-lg backdrop-blur-md">
            <h2 class="text-2xl text-blue-300 font-game mb-4">Time Machine</h2>
            <p class="text-white mb-6 text-lg">Ready to travel through time and discover the most important cyber events in history? Our special time machine will take you on an exciting journey!</p>
            
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="{{ route('game.time-travel.random') }}" class="travel-button" id="travel-button">
                    <span class="mr-2">Random Time Travel</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </a>
                
                <a href="{{ route('game.time-travel.attack', 'morris-worm') }}" class="travel-button sequential-button">
                    <span class="mr-2">Start From Beginning</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </a>
            </div>
        </div>
        
        <div class="mb-12">
            <h2 class="text-2xl md:text-3xl font-game text-white mb-6 text-center">Cyber Attack Timeline</h2>
            <div class="relative">
                <!-- Timeline line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-2 bg-blue-500 rounded opacity-70"></div>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Morris Worm (1988) -->
                    <div class="md:col-start-2 relative">
                        <div class="absolute left-0 md:left-auto md:right-full top-6 md:mr-8 h-5 w-5 rounded-full bg-blue-500 shadow-glow transform md:translate-x-1/2"></div>
                        <div class="cyber-attack-card p-5">
                            <span class="cyber-attack-date block mb-2">November 2, 1988</span>
                            <h3 class="text-xl text-white font-bold mb-2">Morris Worm</h3>
                            <div class="mb-3 overflow-hidden rounded-lg">
                                <img src="{{ asset('images/cyber-attacks/morris-worm.jpg') }}" alt="Morris Worm" class="w-full h-40 object-cover transform transition">
                            </div>
                            <p class="text-gray-300 mb-3 text-lg">One of the first computer worms that spread through the early internet, affecting many computers.</p>
                            <a href="{{ route('game.time-travel.attack', 'morris-worm') }}" class="attack-link text-blue-400 hover:text-blue-300 inline-flex items-center transition" data-attack="morris-worm">
                                <span>Travel to 1988</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Empty grid cell for spacing -->
                    <div class="md:col-start-1"></div>
                    
                    <!-- ILOVEYOU Virus (2000) -->
                    <div class="md:col-start-1 relative">
                        <div class="absolute right-0 md:right-auto md:left-full top-6 md:ml-8 h-5 w-5 rounded-full bg-blue-500 shadow-glow transform md:-translate-x-1/2"></div>
                        <div class="cyber-attack-card p-5">
                            <span class="cyber-attack-date block mb-2">May 4, 2000</span>
                            <h3 class="text-xl text-white font-bold mb-2">ILOVEYOU Virus</h3>
                            <div class="mb-3 overflow-hidden rounded-lg">
                                <img src="{{ asset('images/cyber-attacks/i-love-you.jpg') }}" alt="ILOVEYOU Virus" class="w-full h-40 object-cover transform transition">
                            </div>
                            <p class="text-gray-300 mb-3 text-lg">A harmful computer worm that spread through email attachments, causing problems for many computers.</p>
                            <a href="{{ route('game.time-travel.attack', 'i-love-you') }}" class="attack-link text-blue-400 hover:text-blue-300 inline-flex items-center transition" data-attack="i-love-you">
                                <span>Travel to 2000</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Empty grid cell for spacing -->
                    <div class="md:col-start-1"></div>
                    
                    <!-- Stuxnet (2010) -->
                    <div class="md:col-start-2 relative">
                        <div class="absolute left-0 md:left-auto md:right-full top-6 md:mr-8 h-5 w-5 rounded-full bg-blue-500 shadow-glow transform md:translate-x-1/2"></div>
                        <div class="cyber-attack-card p-5">
                            <span class="cyber-attack-date block mb-2">June 2010</span>
                            <h3 class="text-xl text-white font-bold mb-2">Stuxnet</h3>
                            <div class="mb-3 overflow-hidden rounded-lg">
                                <img src="{{ asset('images/cyber-attacks/stuxnet.jpg') }}" alt="Stuxnet" class="w-full h-40 object-cover transform transition">
                            </div>
                            <p class="text-gray-300 mb-3 text-lg">A special type of computer program designed to affect machines in factories, showing how cyber attacks can impact the real world.</p>
                            <a href="{{ route('game.time-travel.attack', 'stuxnet') }}" class="attack-link text-blue-400 hover:text-blue-300 inline-flex items-center transition" data-attack="stuxnet">
                                <span>Travel to 2010</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Empty grid cell for spacing -->
                    <div class="md:col-start-2"></div>
                    
                    <!-- WannaCry (2017) -->
                    <div class="md:col-start-1 relative">
                        <div class="absolute right-0 md:right-auto md:left-full top-6 md:ml-8 h-5 w-5 rounded-full bg-blue-500 shadow-glow transform md:-translate-x-1/2"></div>
                        <div class="cyber-attack-card p-5">
                            <span class="cyber-attack-date block mb-2">May 12, 2017</span>
                            <h3 class="text-xl text-white font-bold mb-2">WannaCry Ransomware</h3>
                            <div class="mb-3 overflow-hidden rounded-lg">
                                <img src="{{ asset('images/cyber-attacks/wannacry.jpg') }}" alt="WannaCry Ransomware" class="w-full h-40 object-cover transform transition">
                            </div>
                            <p class="text-gray-300 mb-3 text-lg">A global computer attack that locked people's files and asked for money to unlock them. It affected hospitals, schools, and companies.</p>
                            <a href="{{ route('game.time-travel.attack', 'wannacry') }}" class="attack-link text-blue-400 hover:text-blue-300 inline-flex items-center transition" data-attack="wannacry">
                                <span>Travel to 2017</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Empty grid cell for spacing -->
                    <div class="md:col-start-1"></div>
                    
                    <!-- SolarWinds (2020) -->
                    <div class="md:col-start-2 relative">
                        <div class="absolute left-0 md:left-auto md:right-full top-6 md:mr-8 h-5 w-5 rounded-full bg-blue-500 shadow-glow transform md:translate-x-1/2"></div>
                        <div class="cyber-attack-card p-5">
                            <span class="cyber-attack-date block mb-2">December 2020</span>
                            <h3 class="text-xl text-white font-bold mb-2">SolarWinds Attack</h3>
                            <div class="mb-3 overflow-hidden rounded-lg">
                                <img src="{{ asset('images/cyber-attacks/solarwinds.jpg') }}" alt="SolarWinds Attack" class="w-full h-40 object-cover transform transition">
                            </div>
                            <p class="text-gray-300 mb-3 text-lg">A sneaky attack that hid in software updates, allowing hackers to access many important computer systems without being noticed.</p>
                            <a href="{{ route('game.time-travel.attack', 'solarwinds') }}" class="attack-link text-blue-400 hover:text-blue-300 inline-flex items-center transition" data-attack="solarwinds">
                                <span>Travel to 2020</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center text-gray-300 text-sm">
            <p>
                <strong>Attribution:</strong> Images sourced from various websites for educational purposes. Space backgrounds from 
                <a href="https://unsplash.com" class="text-blue-300 hover:text-blue-200">Unsplash</a> and 
                <a href="https://www.deviantart.com" class="text-blue-300 hover:text-blue-200">DeviantArt</a>.
            </p>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/time-travel.js') }}"></script>
@endpush

@push('styles')
<style>
    .shadow-glow {
        box-shadow: 0 0 15px 5px rgba(59, 130, 246, 0.7);
    }
    
    .font-game {
        font-family: 'Comic Sans MS', 'Chalkboard SE', 'Marker Felt', sans-serif;
    }
    
    .sequential-button {
        background: linear-gradient(to right, #4f46e5, #818cf8);
    }
    
    .sequential-button:hover {
        box-shadow: 0 0 20px rgba(79, 70, 229, 0.7);
    }
    
    .sequential-button::before {
        background: linear-gradient(to right, #818cf8, #4f46e5);
    }
    
    .backdrop-blur-md {
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
    
    /* Animation for time travel */
    .time-travel-active {
        animation: timeTravel 3s forwards;
    }
    
    @keyframes timeTravel {
        0% { filter: brightness(1) blur(0); }
        50% { filter: brightness(1.5) blur(5px); }
        100% { filter: brightness(1) blur(0); }
    }
    
    /* Warp container styling */
    #warp-container {
        pointer-events: none;
    }
</style>
@endpush
@endsection 