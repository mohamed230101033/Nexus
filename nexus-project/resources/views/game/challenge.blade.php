@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-primary-700 via-primary-800 to-primary-900 min-h-screen py-8">
    <div class="container mx-auto max-w-4xl px-4">
        <!-- Challenge Header -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 mr-3 text-secondary-300">
                        <path fill-rule="evenodd" d="M12 1.5a.75.75 0 01.75.75V4.5a.75.75 0 01-1.5 0V2.25A.75.75 0 0112 1.5zM5.636 4.136a.75.75 0 011.06 0l1.592 1.591a.75.75 0 01-1.061 1.06l-1.591-1.59a.75.75 0 010-1.061zm12.728 0a.75.75 0 010 1.06l-1.591 1.592a.75.75 0 01-1.06-1.061l1.59-1.591a.75.75 0 011.061 0zm-6.816 4.496a.75.75 0 01.82.311l5.228 7.917a.75.75 0 01-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 01-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 01-1.247-.606l.569-9.47a.75.75 0 01.554-.68zM3 10.5a.75.75 0 01.75-.75H6a.75.75 0 010 1.5H3.75A.75.75 0 013 10.5zm14.25 0a.75.75 0 01.75-.75h2.25a.75.75 0 010 1.5H18a.75.75 0 01-.75-.75zm-8.962 3.712a.75.75 0 010 1.061l-1.591 1.591a.75.75 0 11-1.061-1.06l1.591-1.592a.75.75 0 011.06 0z" clip-rule="evenodd" />
                    </svg>
                    <h1 class="text-3xl font-game">Fake vs Real Challenge</h1>
                </div>
                <div class="hidden md:flex items-center">
                    <div class="cyber-shield w-12 h-12 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                            <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.75.75 0 00.674 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-80">Cyber Shield Level</p>
                        <div class="w-48 h-3 bg-gray-700 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-green-400 to-blue-500" style="width: {{ session('shield_level', 0) * 10 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="space-y-4 mb-6">
                <p class="text-lg">Hi {{ $player_name }}! Can you tell which one is fake and which is real?</p>
                <p>These challenges will test your ability to spot the differences between legitimate content and scams.</p>
            </div>
            
            <!-- Badges Display -->
            @if(session('badges') && count(session('badges')) > 0)
                <div class="mt-4 border-t border-white/20 pt-4">
                    <h3 class="text-lg font-game mb-2">Your Cyber Badges:</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(session('badges') as $badge)
                            <div class="badge bg-gradient-to-br from-yellow-400 to-yellow-600" title="{{ $badge }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mt-4 bg-success-600/20 border border-success-600/30 text-success-100 p-4 rounded-lg">
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2 flex-shrink-0 text-success-400">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <p class="font-bold">{{ session('success') }}</p>
                            @if(session('badge'))
                                <p class="mt-1">You earned the {{ session('badge') }} badge!</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            
            @if(session('error'))
                <div class="mt-4 bg-danger-600/20 border border-danger-600/30 text-danger-100 p-4 rounded-lg">
                    <div class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2 flex-shrink-0 text-danger-400">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <p class="font-bold">{{ session('error') }}</p>
                            @if(session('explanation'))
                                <p class="mt-1">{{ session('explanation') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Challenge Content -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            <h2 class="text-2xl font-game mb-4 text-center">{{ $challenge['title'] }}</h2>
            <p class="text-center mb-8">{{ $challenge['description'] }}</p>
            
            <form action="{{ route('game.submit-challenge') }}" method="POST">
                @csrf
                <input type="hidden" name="challenge_id" value="{{ $challenge['id'] }}">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Fake Content -->
                    <div class="relative">
                        <div class="game-card bg-white p-6 rounded-xl text-gray-800 h-full">
                            <div class="absolute -top-3 -left-3">
                                <div class="w-8 h-8 rounded-full bg-danger-100 border-4 border-primary-800 flex items-center justify-center">
                                    <span class="text-danger-600 font-bold">A</span>
                                </div>
                            </div>
                            
                            <div class="mb-4 pb-3 border-b border-gray-200">
                                <h3 class="text-xl font-bold">Option A</h3>
                            </div>
                            
                            <div class="prose max-w-none">
                                <p>{{ $challenge['fake_content'] }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Real Content -->
                    <div class="relative">
                        <div class="game-card bg-white p-6 rounded-xl text-gray-800 h-full">
                            <div class="absolute -top-3 -left-3">
                                <div class="w-8 h-8 rounded-full bg-primary-100 border-4 border-primary-800 flex items-center justify-center">
                                    <span class="text-primary-600 font-bold">B</span>
                                </div>
                            </div>
                            
                            <div class="mb-4 pb-3 border-b border-gray-200">
                                <h3 class="text-xl font-bold">Option B</h3>
                            </div>
                            
                            <div class="prose max-w-none">
                                <p>{{ $challenge['real_content'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/5 p-6 rounded-xl mb-6">
                    <h3 class="font-game text-xl mb-4">Which one is fake?</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="radio" id="answer_fake" name="answer" value="fake" class="mr-3 h-5 w-5">
                            <label for="answer_fake" class="text-lg">Option A is fake</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="radio" id="answer_real" name="answer" value="real" class="mr-3 h-5 w-5">
                            <label for="answer_real" class="text-lg">Option B is fake</label>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2 text-secondary-300">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm text-secondary-300">Look carefully for clues that reveal which is fake!</span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-primary">
                        Submit Answer
                    </button>
                </div>
            </form>
        </div>
        
        <!-- AI Helper -->
        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl text-white mb-8">
            <div class="flex items-start space-x-4">
                <div class="w-12 h-12 rounded-full bg-secondary-100 flex-shrink-0 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-secondary-600">
                        <path d="M16.5 7.5h-9v9h9v-9z" />
                        <path fill-rule="evenodd" d="M8.25 2.25A.75.75 0 019 3v.75h2.25V3a.75.75 0 011.5 0v.75H15V3a.75.75 0 011.5 0v.75h.75a3 3 0 013 3v.75H21A.75.75 0 0121 9h-.75v2.25H21a.75.75 0 010 1.5h-.75V15H21a.75.75 0 010 1.5h-.75v.75a3 3 0 01-3 3h-.75V21a.75.75 0 01-1.5 0v-.75h-2.25V21a.75.75 0 01-1.5 0v-.75H9V21a.75.75 0 01-1.5 0v-.75h-.75a3 3 0 01-3-3v-.75H3A.75.75 0 013 15h.75v-2.25H3a.75.75 0 010-1.5h.75V9H3a.75.75 0 010-1.5h.75v-.75a3 3 0 013-3h.75V3a.75.75 0 01.75-.75zM6 6.75A.75.75 0 016.75 6h10.5a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V6.75z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-secondary-300 font-game">Circuit</h3>
                    <p class="text-white/90">Hi {{ $player_name }}! When comparing the two options, look for these clues that might reveal which one is fake:</p>
                    <ul class="list-disc pl-5 mt-2 space-y-1 text-white/90">
                        <li>Spelling and grammar mistakes</li>
                        <li>Suspicious URLs or email addresses</li>
                        <li>Requests for personal information</li>
                        <li>Unrealistic offers or threats</li>
                        <li>Urgent demands for action</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <div class="flex justify-between">
            <a href="{{ route('game.story') }}" class="btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                    <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0111.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 01-1.085.67L12 18.089l-7.165 3.583A.75.75 0 013.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93z" clip-rule="evenodd" />
                </svg>
                Story Mode
            </a>
            
            <a href="{{ route('game.secret-code') }}" class="btn-primary">
                Secret Code Game
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 ml-2">
                    <path d="M11.584 2.376a.75.75 0 01.832 0l9 6a.75.75 0 11-.832 1.248L12 3.901 3.416 9.624a.75.75 0 01-.832-1.248l9-6z" />
                    <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 010 1.5H3a.75.75 0 010-1.5h.75v-9.918a.75.75 0 01.634-.74A49.109 49.109 0 0112 9c2.59 0 5.134.202 7.616.592a.75.75 0 01.634.74zm-7.5 2.418a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75zm3-.75a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0v-6.75a.75.75 0 01.75-.75zM9 12.75a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection 
