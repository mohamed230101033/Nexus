<div class="case-card bg-white rounded-lg shadow-lg overflow-hidden transform transition-all hover:scale-105 {{ in_array($case['id'], $completedCases) ? 'case-completed' : '' }}">
    <div class="case-card-image-container relative">
        <!-- Difficulty badge -->
        @php
            $difficultyColor = 'bg-green-100 text-green-800';
            if(strtolower($case['difficulty_name']) === 'field agent') {
                $difficultyColor = 'bg-yellow-100 text-yellow-800';
            } elseif(strtolower($case['difficulty_name']) === 'special investigator') {
                $difficultyColor = 'bg-red-100 text-red-800';
            }
        @endphp
        <div class="absolute top-3 left-3 rounded-full px-3 py-1 text-xs font-semibold {{ $difficultyColor }} z-10 shadow-sm">
            {{ $case['difficulty_name'] }}
        </div>
        
        <!-- Points banner -->
        <div class="absolute top-3 right-3 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-lg z-10 shadow-sm">
            +{{ $case['points_reward'] }} Points
        </div>
        
        <img src="{{ asset($case['image_to_investigate'] ?? 'images/placeholder-case.png') }}" alt="{{ $case['title'] }}" class="w-full h-48 object-cover">
        
        @if(in_array($case['id'], $completedCases))
            <div class="completed-overlay">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-success-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>SOLVED</span>
            </div>
        @else
            <div class="absolute bottom-0 right-0 left-0 bg-gradient-to-t from-black/70 to-transparent p-3 text-white text-right">
                <span class="text-xs opacity-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    Est. Time: 3 minutes
                </span>
            </div>
        @endif
    </div>
    <div class="p-5">
        <div class="flex justify-between items-start mb-2">
            <span class="text-xs font-semibold uppercase tracking-wider text-secondary-500">Case ID: #{{ str_pad($case['id'], 3, '0', STR_PAD_LEFT) }}</span>
            <span class="text-sm text-gray-500">Age: {{ $case['age_group'] }}</span>
        </div>
        
        <h3 class="text-xl font-bold text-primary-700 mb-2 truncate" title="{{ $case['title'] }}">{{ $case['title'] }}</h3>
        <p class="text-gray-600 text-sm mb-4 h-16 overflow-hidden">{{ Str::limit($case['storyline'], 100) }}</p>
        
        <div class="flex items-center justify-between mb-4">
            <!-- Case tags -->
            <div class="flex flex-wrap gap-1">
                @php
                    $tags = ['email', 'social media', 'news', 'website'];
                    $randomTags = array_slice($tags, 0, rand(1, 2));
                @endphp
                
                @foreach($randomTags as $tag)
                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $tag }}</span>
                @endforeach
            </div>
            
            <!-- Difficulty indicators -->
            <div class="flex">
                @php
                    $difficulty = strtolower($case['difficulty_name']) === 'rookie' ? 1 : 
                                 (strtolower($case['difficulty_name']) === 'field agent' ? 2 : 3);
                @endphp
                
                @for($i = 1; $i <= 3; $i++)
                    <div class="w-2 h-2 rounded-full ml-1 {{ $i <= $difficulty ? 'bg-primary-500' : 'bg-gray-200' }}"></div>
                @endfor
            </div>
        </div>
        
        <a href="{{ route('game.truth-detective.case', ['caseId' => $case['id']]) }}" 
           class="block w-full text-center bg-primary-500 hover:bg-primary-600 text-white font-semibold py-2 px-4 rounded-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-400 focus:ring-opacity-75">
            <div class="flex items-center justify-center">
                @if(in_array($case['id'], $completedCases))
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    Review Case
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    Start Investigation
                @endif
            </div>
        </a>
    </div>
</div> 