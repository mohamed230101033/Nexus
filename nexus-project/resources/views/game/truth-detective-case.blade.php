@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/truth-detective.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="truth-detective-case container mx-auto px-4 py-8">
    <div class="bg-white p-6 md:p-8 rounded-xl shadow-2xl">
        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl md:text-4xl font-game text-primary-600">Case File: {{ $case['title'] }}</h1>
            <a href="{{ route('game.truth-detective') }}" class="text-primary-500 hover:text-primary-700 transition duration-150 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Back to HQ
            </a>
        </div>

        <div class="grid md:grid-cols-2 gap-8 items-start">
            <!-- Left Column: Image and Clues -->
            <div class="investigation-area">
                <h2 class="text-2xl font-semibold text-gray-800 mb-3">Examine the Evidence:</h2>
                <div class="relative mb-4 border-4 border-gray-300 rounded-lg shadow-inner overflow-hidden" id="evidence-image-container">
                    <img src="{{ asset($case['image_to_investigate'] ?? 'images/placeholder-case.png') }}" alt="Evidence for {{ $case['title'] }}" class="w-full h-auto max-h-[500px] object-contain" id="evidence-image">
                    <!-- Clue markers will be dynamically added here by JS if using interactive clues -->
                    @foreach($case['clues'] as $clue)
                        <div class="clue-marker hidden" data-clue-id="{{ $clue['id'] }}" style="position: absolute; top: {{ explode(',', $clue['area_coords'])[0] }}px; left: {{ explode(',', $clue['area_coords'])[1] }}px; width: {{ explode(',', $clue['area_coords'])[2] - explode(',', $clue['area_coords'])[0] }}px; height: {{ explode(',', $clue['area_coords'])[3] - explode(',', $clue['area_coords'])[1]}}px; border: 2px dashed red; cursor: pointer;" title="Click to reveal clue"></div>
                    @endforeach
                </div>
                
                <h3 class="text-xl font-semibold text-gray-700 mb-2">Detective Notes (Clues Found):</h3>
                <ul id="clues-found-list" class="list-disc list-inside bg-gray-50 p-4 rounded-md min-h-[100px]">
                    <li class="text-gray-500 italic">Click on highlighted areas in the image or use your tools to find clues!</li>
                </ul>
            </div>

            <!-- Right Column: Story, Timer, Decision -->
            <div class="case-details">
                <div class="bg-blue-50 p-5 rounded-lg shadow-sm mb-6 border-l-4 border-blue-500">
                    <h2 class="text-xl font-semibold text-blue-700 mb-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        Case Briefing:
                    </h2>
                    <p class="text-gray-700 leading-relaxed">{{ $case['storyline'] }}</p>
                    <div class="mt-3 text-sm text-blue-600 italic">Remember detective, your job is to determine if this is real or fake information!</div>
                </div>

                @if(session('decision_made'))
                    <div class="my-6 p-4 rounded-md @if(session('is_correct')) bg-success-100 border-success-500 text-success-700 @else bg-danger-100 border-danger-500 text-danger-700 @endif">
                        <h3 class="text-lg font-bold mb-2">@if(session('is_correct')) Case Solved! @else Re-evaluate! @endif</h3>
                        <p>{{ session('success') ?: session('error') }}</p>
                        @if(session('is_correct'))
                            <p class="mt-2">You earned <strong>{{ $case['points_reward'] }} Trust Points!</strong></p>
                            @if(!empty($case['badge_reward_name']) && in_array($case['badge_reward'], Session::get('truth_detective_badges',[])))
                                <div class="mt-2 flex items-center">
                                    <img src="{{ asset('images/badges/' . $case['badge_reward'] . '.png') }}" alt="{{ $case['badge_reward_name'] }}" class="w-8 h-8 mr-2">
                                    <span>Badge Earned: <strong>{{ $case['badge_reward_name'] }}</strong></span>
                                </div>
                            @endif
                        @endif
                    </div>
                     <a href="{{ route('game.truth-detective') }}" class="mt-4 inline-block bg-secondary-500 hover:bg-secondary-600 text-white font-semibold py-2 px-6 rounded-md transition duration-150">Back to HQ</a>

                    <!-- Display achievements gained -->
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                            </svg>
                            Your Progress:
                        </h3>
                        <div id="achievements-display" class="grid grid-cols-2 gap-2 mt-2">
                            <!-- Achievements will be displayed here by JS -->
                            <div class="flex items-center p-2 bg-blue-50 rounded">
                                <div class="text-lg mr-2">🔍</div>
                                <div class="text-sm">Keep investigating more cases!</div>
                            </div>
                        </div>
                    </div>

                @else 
                    <div class="decision-timer-section bg-gray-100 p-5 rounded-lg shadow-md mb-6 relative">
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Time Remaining:</h2>
                        <div id="timer" class="text-4xl font-bold text-primary-600">03:00</div>
                        <p class="text-sm text-gray-500">Think fast, detective! The truth won't wait forever.</p>
                        <div class="absolute top-0 right-0 w-16 h-16 -mt-6 -mr-6 bg-red-500 rounded-full shadow-xl text-white flex items-center justify-center text-xs font-bold transform rotate-12">URGENT!</div>
                    </div>
                    
                    <!-- Game Variation Selector -->
                    <div class="mb-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h3 class="text-md font-semibold text-gray-700 mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Game Mode:
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            <select id="game-variation" class="w-full rounded-md border-gray-300 focus:border-primary-500 focus:ring focus:ring-primary-200 transition duration-150">
                                <option value="normal">Normal Mode (3:00)</option>
                                <option value="speedRun">Speed Run (1:30)</option>
                                <option value="relaxed">Relaxed Mode (5:00)</option>
                            </select>
                            <div class="w-full text-sm text-gray-600 italic">
                                Choose your investigation style before starting!
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('game.truth-detective.submit', ['caseId' => $case['id']]) }}" method="POST" id="decision-form">
                        @csrf
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Your Verdict:</h2>
                        <div class="space-y-3 mb-6">
                            <div>
                                <label for="decision-real" class="flex items-center p-4 border-2 border-gray-300 rounded-lg hover:border-success-500 hover:bg-success-50 transition cursor-pointer has-[:checked]:border-success-600 has-[:checked]:bg-success-100">
                                    <input type="radio" name="decision" value="real" id="decision-real" class="form-radio h-5 w-5 text-success-600 mr-3 focus:ring-success-500">
                                    <span class="text-lg font-medium text-gray-700">This is REAL</span>
                                </label>
                            </div>
                            <div>
                                <label for="decision-fake" class="flex items-center p-4 border-2 border-gray-300 rounded-lg hover:border-danger-500 hover:bg-danger-50 transition cursor-pointer has-[:checked]:border-danger-600 has-[:checked]:bg-danger-100">
                                    <input type="radio" name="decision" value="fake" id="decision-fake" class="form-radio h-5 w-5 text-danger-600 mr-3 focus:ring-danger-500">
                                    <span class="text-lg font-medium text-gray-700">This is FAKE</span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-secondary-500 hover:bg-secondary-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition duration-150 text-lg focus:outline-none focus:ring-2 focus:ring-secondary-400 focus:ring-opacity-75">
                            <span class="mr-2">Submit Verdict</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </form>
                @endif 
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        const caseData = @json($case);
        const evidenceImageUrl = "{{ asset($case['image_to_investigate'] ?? 'images/placeholder-case.png') }}";
    </script>
    <script src="{{ asset('js/confetti.min.js') }}"></script>
    <script src="{{ asset('js/truth-detective.js') }}"></script>
@endpush 