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
                    <a href="{{ route('game.secret-code') }}" class="mr-4 text-cyan-400/80 hover:text-cyan-400 sound-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <h1 class="text-3xl font-game matrix-text text-cyan-400">{{ $scenario['title'] }}</h1>
                </div>
                <div class="hidden md:flex items-center">
                    <div class="cyber-shield w-12 h-12 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-cyan-400">
                            <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.75.75 0 00.674 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm opacity-80 text-cyan-100">Mission Level {{ $level }}</p>
                        <div class="w-48 h-3 bg-gray-700 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-cyan-400 to-emerald-400" style="width: {{ $level * 33 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Mission briefing -->
            <div class="mb-6">
                <div class="flex items-center mb-2">
                    <div class="w-8 h-8 rounded-full bg-cyan-900/60 flex items-center justify-center text-cyan-400 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.75.75 0 01-.674 0C6.014 20.683 1.95 15.692 1.95 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-game text-cyan-300">Mission Briefing</h2>
                </div>
                <div class="pl-11">
                    <p class="text-cyan-100 typewriter">{{ $scenario['description'] }}</p>
                </div>
            </div>
            
            <!-- Agent status terminal -->
            <div class="bg-gray-900 border border-cyan-500/30 rounded-lg p-3 font-mono text-sm">
                <div class="flex items-center text-gray-400 mb-2">
                    <span class="w-3 h-3 rounded-full bg-red-500 mr-2"></span>
                    <span class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></span>
                    <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>
                    <span class="ml-2 text-xs">agent@crypto-mission</span>
                </div>
                <div class="text-cyan-400">
                    <span class="text-green-400">$</span> <span class="code-cursor">agent_status --name="{{ $playerName }}" --mission="{{ $scenario['title'] }}" --difficulty=level{{ $level }}</span>
                </div>
            </div>
        </div>

        <!-- Encrypted message section -->
        <div class="code-card code-scanner mb-8">
            <div class="mb-8">
                <h2 class="text-2xl font-game mb-4 text-cyan-400">Encrypted Message:</h2>
                <div class="bg-gray-900/60 p-6 rounded-xl border border-cyan-500/30 font-mono text-lg break-all relative code-glow cipher-text" data-decoded="{{ $scenario['answer'] }}">
                    {{ $scenario['message'] }}
                </div>
                <p class="text-xs text-cyan-400/60 mt-2 text-right">Click the message to attempt automatic decryption</p>
            </div>

            @if($scenario['type'] === 'symbol' && isset($scenario['key']))
            <div class="mb-8">
                <h3 class="text-xl font-game mb-4 text-cyan-300">Symbol Key:</h3>
                <div class="grid grid-cols-3 sm:grid-cols-5 gap-4">
                    @foreach($scenario['key'] as $symbol => $letter)
                    <div class="bg-gray-900/60 p-3 rounded-lg border border-cyan-500/20 text-center sound-hover">
                        <span class="text-xl text-cyan-400">{{ $symbol }}</span>
                        <span class="text-sm text-cyan-100/70">=</span>
                        <span class="text-xl text-cyan-300">{{ $letter }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="mb-6">
                <h3 class="text-xl font-game mb-2 text-cyan-300">Hint:</h3>
                <div class="bg-gray-900/60 p-4 rounded-lg border border-cyan-500/20">
                    <p class="text-cyan-100">{{ $scenario['hint'] }}</p>
                </div>
            </div>
        </div>

        <!-- Answer submission form -->
        <div class="code-card code-glow mb-8">
            <h2 class="text-2xl font-game mb-4 text-cyan-400">Submit Your Decryption</h2>
            
            <form action="{{ route('game.secret-code.submit-level', $level) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="answer" class="block text-cyan-300 mb-2">Your decoded message:</label>
                    <textarea name="answer" id="answer" rows="3" class="w-full bg-gray-900/60 border border-cyan-500/30 rounded-lg p-4 text-cyan-100 focus:ring-2 focus:ring-cyan-500 focus:border-transparent"></textarea>
                </div>
                
                @if(session('error'))
                <div class="bg-red-900/40 border border-red-500/30 text-red-300 p-3 rounded-lg mb-4 animate__animated animate__headShake">
                    {{ session('error') }}
                </div>
                @endif
                
                <div class="text-right">
                    <button type="submit" id="complete-level" class="code-button">
                        Submit Decryption
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 inline-block ml-1">
                            <path d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.925A1.5 1.5 0 005.135 9.25h6.115a.75.75 0 010 1.5H5.135a1.5 1.5 0 00-1.442 1.086l-1.414 4.926a.75.75 0 00.826.95 28.896 28.896 0 0015.293-7.154.75.75 0 000-1.115A28.897 28.897 0 003.105 2.289z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Decoding tools section -->
        <div class="code-card code-glow">
            <h2 class="text-2xl font-game mb-4 text-cyan-400">Decoding Tools</h2>
            
            @if($scenario['type'] === 'caesar')
            <div class="space-y-4">
                <h3 class="text-lg font-game text-cyan-300">Caesar Cipher Shift Tool:</h3>
                <div class="flex flex-wrap gap-2">
                    @for($i = 1; $i <= 25; $i++)
                    <button onclick="shiftText({{ $i }})" 
                            class="bg-gray-900/60 hover:bg-gray-900/80 border border-cyan-500/20 hover:border-cyan-500/40 rounded-lg px-3 py-1 text-sm transition text-cyan-100 sound-hover">
                        Shift {{ $i }}
                    </button>
                    @endfor
                </div>
            </div>
            @endif

            @if($scenario['type'] === 'reverse')
            <div class="space-y-4">
                <h3 class="text-lg font-game text-cyan-300">Text Reversal Tool:</h3>
                <button onclick="reverseText()" 
                        class="code-button sound-hover">
                    Reverse Text
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

@if($scenario['type'] === 'caesar')
<script>
function shiftText(shift) {
    const text = '{{ $scenario['message'] }}';
    let result = '';
    
    for (let i = 0; i < text.length; i++) {
        let char = text[i];
        if (char.match(/[a-z]/i)) {
            const code = text.charCodeAt(i);
            if (code >= 65 && code <= 90) {
                char = String.fromCharCode(((code - 65 - shift + 26) % 26) + 65);
            } else if (code >= 97 && code <= 122) {
                char = String.fromCharCode(((code - 97 - shift + 26) % 26) + 97);
            }
        }
        result += char;
    }
    
    document.querySelector('textarea[name="answer"]').value = result;
    
    // Play sound effect
    const popSound = new Audio('/sounds/button-click.mp3');
    popSound.volume = 0.2;
    popSound.play().catch(e => console.log('Audio play error:', e));
}
</script>
@endif

@if($scenario['type'] === 'reverse')
<script>
function reverseText() {
    const text = '{{ $scenario['message'] }}';
    const reversed = text.split('').reverse().join('');
    document.querySelector('textarea[name="answer"]').value = reversed;
    
    // Play sound effect
    const popSound = new Audio('/sounds/button-click.mp3');
    popSound.volume = 0.2;
    popSound.play().catch(e => console.log('Audio play error:', e));
}
</script>
@endif

@section('scripts')
<script src="{{ asset('js/secret-code.js') }}"></script>
@endsection
@endsection
