@extends('layouts.app')

@section('content')
<div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: -100;">
    <video autoplay muted loop style="position: absolute; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; transform: translateX(-50%) translateY(-50%);">
        <source src="{{ asset('earth.mp4') }}" type="video/mp4">
    </video>
</div>

<div class="min-h-screen relative">
    <div class="container mx-auto px-4 py-8 relative">
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ route('game.time-travel') }}" class="text-blue-300 hover:text-blue-100 transition flex items-center" id="back-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Return to Time Machine
            </a>
            
            <div class="timeline-navigation flex gap-2">
                @if(isset($previousAttack))
                <a href="{{ route('game.time-travel.attack', $previousAttack) }}" class="travel-button prev-button" id="prev-attack">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Previous Attack
                </a>
                @endif
                
                @if(isset($nextAttack))
                <a href="{{ route('game.time-travel.attack', $nextAttack) }}" class="travel-button next-button" id="next-attack">
                    Next Attack
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                @endif
            </div>
        </div>
        
        <div class="cyber-attack-detail bg-gray-900 bg-opacity-70 rounded-xl border-2 border-blue-400 shadow-lg overflow-hidden max-w-4xl mx-auto backdrop-blur-md">
            <!-- Attack Header -->
            <div class="p-6 md:p-8 border-b border-blue-500 border-opacity-50">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-game text-white mb-2">{{ $attack['name'] }}</h1>
                        <p class="cyber-attack-date mb-2">{{ $attack['date'] }}</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="inline-block bg-red-600 bg-opacity-70 text-white px-4 py-2 rounded-full text-sm font-bold">
                            Threat Level: {{ $attack['threat_level'] }}
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Attack Content -->
            <div class="p-6 md:p-8">
                <!-- Attack Image -->
                <div class="mb-8 rounded-lg overflow-hidden">
                    <img src="{{ asset($attack['image']) }}" alt="{{ $attack['name'] }}" class="w-full h-64 md:h-80 object-cover">
                </div>
                
                <!-- Attack Details -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Main Description -->
                    <div class="md:col-span-2 text-gray-200">
                        <h2 class="text-2xl text-white font-bold mb-4">The Attack</h2>
                        <div class="attack-description space-y-4 text-lg">
                            {!! $attack['description'] !!}
                        </div>
                    </div>
                    
                    <!-- Quick Facts -->
                    <div class="bg-black bg-opacity-50 p-6 rounded-lg border border-blue-500 text-gray-300 backdrop-blur-md">
                        <h2 class="text-xl text-white font-bold mb-4">Quick Facts</h2>
                        <ul class="space-y-4">
                            <li>
                                <strong class="block text-blue-300">Created by:</strong>
                                <span>{{ $attack['created_by'] }}</span>
                            </li>
                            <li>
                                <strong class="block text-blue-300">Target:</strong>
                                <span>{{ $attack['target'] }}</span>
                            </li>
                            <li>
                                <strong class="block text-blue-300">Damage:</strong>
                                <span>{{ $attack['damage'] }}</span>
                            </li>
                            <li>
                                <strong class="block text-blue-300">Method:</strong>
                                <span>{{ $attack['method'] }}</span>
                            </li>
                            <li>
                                <strong class="block text-blue-300">Significance:</strong>
                                <span>{{ $attack['significance'] }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Impact and Legacy -->
                <div class="mt-10">
                    <h2 class="text-2xl text-white font-bold mb-4">Impact and Legacy</h2>
                    <div class="text-gray-200 space-y-4 text-lg">
                        {!! $attack['impact'] !!}
                    </div>
                </div>
                
                <!-- Protection Measures -->
                <div class="mt-10 bg-blue-900 bg-opacity-20 p-6 rounded-lg border-2 border-blue-400 border-opacity-50 backdrop-blur-md">
                    <h2 class="text-2xl text-white font-bold mb-4">How to Protect Yourself</h2>
                    <div class="text-gray-200 space-y-4 text-lg">
                        {!! $attack['protection'] !!}
                    </div>
                </div>
                
                <!-- Quiz -->
                <div class="mt-10">
                    <h2 class="text-2xl text-white font-bold mb-4">Test Your Knowledge</h2>
                    <div class="bg-gray-800 bg-opacity-50 p-6 rounded-lg border border-blue-500 backdrop-blur-md">
                        <form id="quiz-form" class="space-y-6">
                            <div>
                                <p class="text-white mb-4 text-lg">{{ $attack['quiz']['question'] }}</p>
                                <div class="space-y-3">
                                    @foreach($attack['quiz']['options'] as $index => $option)
                                    <div class="flex items-center">
                                        <input type="radio" id="option{{ $index }}" name="quiz-answer" value="{{ $index }}" class="mr-3 h-5 w-5">
                                        <label for="option{{ $index }}" class="text-gray-300 cursor-pointer text-lg">{{ $option }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="travel-button">
                                Check Answer
                            </button>
                            <div id="quiz-result" class="hidden mt-4 p-4 rounded-lg text-lg"></div>
                        </form>
                    </div>
                </div>
                
                <!-- Bottom navigation -->
                <div class="mt-10 flex justify-between">
                    @if(isset($previousAttack))
                    <a href="{{ route('game.time-travel.attack', $previousAttack) }}" class="travel-button prev-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Previous Attack
                    </a>
                    @else
                    <div></div>
                    @endif
                    
                    @if(isset($nextAttack))
                    <a href="{{ route('game.time-travel.attack', $nextAttack) }}" class="travel-button next-button">
                        Next Attack
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    @else
                    <div></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/time-travel.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quiz handling
        const quizForm = document.getElementById('quiz-form');
        const quizResult = document.getElementById('quiz-result');
        
        if (quizForm) {
            quizForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const selectedOption = document.querySelector('input[name="quiz-answer"]:checked');
                
                if (!selectedOption) {
                    return;
                }
                
                const correctAnswer = {{ $attack['quiz']['correct_answer'] }};
                const isCorrect = parseInt(selectedOption.value) === correctAnswer;
                
                quizResult.classList.remove('hidden');
                quizResult.classList.remove('bg-green-800', 'bg-red-800', 'text-green-100', 'text-red-100');
                
                if (isCorrect) {
                    quizResult.classList.add('bg-green-600', 'text-white');
                    quizResult.textContent = "Correct! You've learned about this cyber attack! 🎉";
                } else {
                    quizResult.classList.add('bg-red-600', 'text-white');
                    quizResult.textContent = "Oops! That's not right. Try reviewing the information about this attack. 😊";
                }
            });
        }
    });
</script>
@endpush

@push('styles')
<style>
    .backdrop-blur-md {
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
    
    .font-game {
        font-family: 'Comic Sans MS', 'Chalkboard SE', 'Marker Felt', sans-serif;
    }
</style>
@endpush
@endsection 