@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/story-mode.css') }}">
@endsection

@section('content')
<div class="story-bg min-h-screen py-12 px-4 relative">
    <div class="container mx-auto max-w-5xl relative z-10">
        <div class="story-card mb-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 mr-3 text-cyan-400 float wiggle-animation">
                        <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z" clip-rule="evenodd" />
                    </svg>
                    <h1 class="text-3xl font-game story-title" data-text="Story Mode">Story Mode</h1>
                </div>
                <div class="hidden md:flex items-center">
                    <div class="cyber-shield w-12 h-12 mr-2 circuit-character pulse">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-cyan-400">
                            <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.75.75 0 00.674 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-80 text-cyan-100">Cyber Shield Level</p>
                        <div class="w-48 h-3 bg-story-secondary rounded-full overflow-hidden shield-progress">
                            <div class="h-full bg-gradient-to-r from-cyan-400 to-teal-400" style="width: {{ session('shield_level', 0) * 10 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="grid md:grid-cols-5 gap-6 mb-8">
                <div class="md:col-span-3 space-y-4">
                    <div class="speech-bubble">
                        <p class="text-lg">Hi {{ $player_name }}! Each mission will teach you how to defend against different online tricks.</p>
                    </div>
                    <p class="text-cyan-100">Complete missions to build your Cyber Shield and collect special badges!</p>
                </div>
                
                <div class="md:col-span-2 flex items-center justify-center">
                    <div class="circuit-character">
                        <img src="https://cdn-icons-png.flaticon.com/512/2021/2021396.png" alt="Circuit" class="w-32 h-32 float-animation">
                        <div class="absolute bottom-0 left-0 w-full h-1/4 rounded-full bg-gradient-to-t from-cyan-500/20 to-transparent filter blur-sm"></div>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Mission 1 -->
                <a href="{{ route('game.mission', 1) }}" class="block">
                    <div class="mission-card bg-story-secondary/20 border border-cyan-500/20 p-5 rounded-xl">
                        <div class="flex items-center mb-3">
                            <div class="mr-4 w-14 h-14 rounded-lg bg-danger-100 flex items-center justify-center mission-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-danger-600">
                                    <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                                    <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-game text-cyan-300">The Mysterious Email</h3>
                                <div class="flex items-center text-sm">
                                    <span class="px-2 py-1 bg-story-secondary rounded text-xs mr-2 difficulty-badge">Level 1</span>
                                    <span class="text-cyan-100/70 villain-shake">Villain: Captain Clickbait</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-cyan-100/80">Captain Clickbait is sending strange emails with tempting offers. Can you spot the tricks?</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs px-2 py-1 bg-story-secondary rounded difficulty-badge">Difficulty: Easy</span>
                            @if(in_array(1, $completed_missions))
                                <span class="text-green-400 flex items-center completed-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                    Completed
                                </span>
                            @else
                                <span class="text-cyan-400 start-mission">Start Mission →</span>
                            @endif
                        </div>
                    </div>
                </a>
                
                <!-- Mission 2 -->
                <a href="{{ route('game.mission', 2) }}" class="block">
                    <div class="mission-card bg-story-secondary/20 border border-cyan-500/20 p-5 rounded-xl">
                        <div class="flex items-center mb-3">
                            <div class="mr-4 w-14 h-14 rounded-lg bg-danger-100 flex items-center justify-center mission-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-danger-600">
                                    <path fill-rule="evenodd" d="M15.75 1.5a6.75 6.75 0 00-6.651 7.906c.067.39-.032.717-.221.906l-6.5 6.499a3 3 0 00-.878 2.121v2.818c0 .414.336.75.75.75H6a.75.75 0 00.75-.75v-1.5h1.5A.75.75 0 009 19.5V18h1.5a.75.75 0 00.75-.75V15h1.5a.75.75 0 00.75-.75v-1.5h1.5a.75.75 0 00.75-.75V9.262c.219-.313.41-.641.547-1.008.7-1.898 1.357-3.868 1.357-5.754 0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0012 9.75c-2.678 0-5.25-.241-7.78-.72A48.672 48.672 0 012.507 9a.75.75 0 00-1.096-.536l-.001.002z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-game text-cyan-300">Password Peril</h3>
                                <div class="flex items-center text-sm">
                                    <span class="px-2 py-1 bg-story-secondary rounded text-xs mr-2 difficulty-badge">Level 1</span>
                                    <span class="text-cyan-100/70 villain-shake">Villain: The Key Thief</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-cyan-100/80">The Key Thief wants to crack your passwords! Learn how to create strong passwords.</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs px-2 py-1 bg-story-secondary rounded difficulty-badge">Difficulty: Easy</span>
                            @if(in_array(2, $completed_missions))
                                <span class="text-green-400 flex items-center completed-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                    Completed
                                </span>
                            @else
                                <span class="text-cyan-400 start-mission">Start Mission →</span>
                            @endif
                        </div>
                    </div>
                </a>
                
                <!-- Mission 3 -->
                <a href="{{ route('game.mission', 3) }}" class="block">
                    <div class="mission-card bg-story-secondary/20 border border-cyan-500/20 p-5 rounded-xl">
                        <div class="flex items-center mb-3">
                            <div class="mr-4 w-14 h-14 rounded-lg bg-danger-100 flex items-center justify-center mission-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-danger-600">
                                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-game text-cyan-300">Social Media Mayhem</h3>
                                <div class="flex items-center text-sm">
                                    <span class="px-2 py-1 bg-story-secondary rounded text-xs mr-2 difficulty-badge">Level 2</span>
                                    <span class="text-cyan-100/70 villain-shake">Villain: Profile Phantom</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-cyan-100/80">Profile Phantom is creating fake accounts to trick kids. Can you spot the fakes?</p>
                        <div class="mt-3 flex justify-between items-center">
                            <span class="text-xs px-2 py-1 bg-story-secondary rounded difficulty-badge">Difficulty: Medium</span>
                            @if(in_array(3, $completed_missions))
                                <span class="text-green-400 flex items-center completed-badge">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>
                                    Completed
                                </span>
                            @else
                                <span class="text-cyan-400 start-mission">Start Mission →</span>
                            @endif
                        </div>
                    </div>
                </a>
                
                <!-- Future missions -->
                <div class="mission-card bg-story-secondary/20 border border-cyan-500/20 p-5 rounded-xl opacity-50">
                    <div class="flex items-center justify-center h-40">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mx-auto mb-3 text-cyan-400/50 pulse">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-cyan-300/70">More missions coming soon!</p>
                            <p class="text-sm text-cyan-400/50 mt-2">Complete the current missions to unlock more</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <a href="{{ route('game.challenge') }}" class="inline-block bg-gradient-to-r from-cyan-500 to-teal-500 text-white font-bold py-3 px-6 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-cyan-500/30">
                    Try a Fake vs Real Challenge Instead
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/story-mode.js') }}"></script>
@endsection 