@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/truth-detective.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="truth-detective-hub container mx-auto px-4 py-8">

    <div class="text-center mb-12 relative">
        <div class="absolute -top-20 left-1/2 transform -translate-x-1/2 w-40 h-40 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full opacity-10 filter blur-2xl"></div>
        <h1 class="text-4xl md:text-5xl font-game text-primary-600 mb-4 relative">
            <span class="inline-block animate-pulse-subtle">Truth</span> 
            <span class="inline-block">Detective</span> 
            <span class="inline-block animate-pulse-subtle">Academy</span>
        </h1>
        <p class="text-lg text-gray-700 max-w-3xl mx-auto">
            Welcome, Detective <span class="font-bold text-primary-600">{{ $player_name }}</span>! The internet is full of mysteries. Can you tell what's <span class="text-success-600 font-bold">REAL</span> from what's <span class="text-danger-600 font-bold">FAKE</span>? Your training continues here!
        </p>
    </div>

    <!-- Player Stats -->
    <div class="player-stats bg-white p-6 rounded-xl shadow-xl mb-10 transform hover:scale-[1.01] transition-transform duration-300 border border-gray-100">
        <div class="grid md:grid-cols-4 gap-6">
            <div class="stat-card bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-lg text-center">
                <h3 class="text-xl font-semibold text-gray-700">Trust Points</h3>
                <p class="text-3xl font-bold text-secondary-500 counter-animate" data-target="{{ $trustPoints ?? 0 }}">0</p>
                <div class="mt-2 text-sm text-gray-600">Earn more by solving cases correctly</div>
            </div>
            
            <div class="stat-card bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-lg text-center">
                <h3 class="text-xl font-semibold text-gray-700">Cases Solved</h3>
                <p class="text-3xl font-bold text-secondary-500 counter-animate" data-target="{{ count($completedCases ?? []) }}">0</p>
                <div class="mt-2 text-sm text-gray-600">{{ count($completedCases ?? []) > 0 ? 'Great work!' : 'Start investigating to raise this number' }}</div>
            </div>
            
            <div class="stat-card bg-gradient-to-br from-yellow-50 to-yellow-100 p-4 rounded-lg text-center">
                <h3 class="text-xl font-semibold text-gray-700">Current Streak</h3>
                <div class="flex justify-center items-center">
                    <p class="text-3xl font-bold text-secondary-500" id="streak-counter">0</p>
                    <span class="text-sm text-gray-500 ml-2">cases</span>
                </div>
                <div class="mt-2 text-sm text-gray-600">Solve consecutive cases to earn power-ups!</div>
            </div>
            
            <div class="stat-card bg-gradient-to-br from-yellow-50 to-yellow-100 p-4 rounded-lg text-center">
                <h3 class="text-xl font-semibold text-gray-700">Badges Earned</h3>
                <div class="flex flex-wrap justify-center space-x-2 mt-2">
                    @forelse ($earnedBadges as $badge)
                        <div class="badge-icon tooltip" title="{{ ucfirst(str_replace('_', ' ', $badge)) }}">
                            <img src="{{ asset('images/badges/' . $badge . '.png') }}" alt="{{ $badge }}" class="w-10 h-10 hover:scale-125 transition-transform">
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">No badges yet!</p>
                    @endforelse
                </div>
                <div class="mt-2 text-sm text-gray-600">Collect all badges to become a master detective</div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-success-100 border-l-4 border-success-500 text-success-700 p-4 mb-6 rounded-md shadow-sm animate-fade-in" role="alert">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-danger-100 border-l-4 border-danger-500 text-danger-700 p-4 mb-6 rounded-md shadow-sm animate-fade-in" role="alert">
            <p class="font-bold">Oops!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <!-- Power-ups and Achievements Section -->
    <div class="mb-10 grid md:grid-cols-2 gap-6">
        <!-- Power-ups -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <h2 class="text-2xl font-game text-primary-600 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                </svg>
                Power-ups
            </h2>
            <div class="power-ups-display flex flex-wrap gap-3 mb-3" id="power-ups-display">
                <!-- Power-ups will be displayed here by JS -->
                <div class="animate-pulse flex space-x-4 w-full">
                    <div class="bg-gray-100 h-12 w-12 rounded-lg"></div>
                    <div class="bg-gray-100 h-12 w-12 rounded-lg"></div>
                    <div class="bg-gray-100 h-12 w-12 rounded-lg"></div>
                </div>
            </div>
            <p class="text-sm text-gray-600 italic">Earn power-ups by maintaining a streak of correct case verdicts!</p>
        </div>
        
        <!-- Achievements -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <h2 class="text-2xl font-game text-primary-600 mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                </svg>
                Achievements
            </h2>
            <div class="achievements-display grid grid-cols-1 md:grid-cols-2 gap-2" id="achievements-hub-display">
                <!-- Achievements will be displayed here by JS -->
                <div class="animate-pulse flex flex-col space-y-2">
                    <div class="bg-gray-100 h-6 w-3/4 rounded"></div>
                    <div class="bg-gray-100 h-4 w-1/2 rounded"></div>
                </div>
                <div class="animate-pulse flex flex-col space-y-2">
                    <div class="bg-gray-100 h-6 w-3/4 rounded"></div>
                    <div class="bg-gray-100 h-4 w-1/2 rounded"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and filter bar -->
    <div class="mb-8 bg-white p-4 rounded-lg shadow-md">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="search-bar">
                <label for="case-search" class="sr-only">Search cases</label>
                <div class="relative">
                    <input type="text" id="case-search" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500" placeholder="Search cases...">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-wrap gap-2">
                <button class="filter-btn active" data-filter="all">All Cases</button>
                <button class="filter-btn" data-filter="rookie">Rookie</button>
                <button class="filter-btn" data-filter="agent">Field Agent</button>
                <button class="filter-btn" data-filter="investigator">Special Investigator</button>
                <button class="filter-btn" data-filter="completed">Completed</button>
                <button class="filter-btn" data-filter="open">Open Cases</button>
            </div>
        </div>
    </div>

    <!-- Case Categories -->
    <div class="case-categories space-y-10">
        <!-- Rookie Cases -->
        <div class="category-section" data-category="rookie">
            <h2 class="text-3xl font-game text-primary-500 mb-6 border-b-2 border-primary-200 pb-2 flex items-center">
                <span class="case-level-badge bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">EASY</span>
                Rookie Cases <span class="text-sm font-normal text-gray-500 ml-2">(Ages 9-11)</span>
            </h2>
            @if(count($rookieCases) > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($rookieCases as $case)
                        @include('partials.truth-detective-case-card', ['case' => $case, 'completedCases' => $completedCases])
                    @endforeach
                </div>
            @else
                <div class="empty-state bg-gray-50 p-6 rounded-lg text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400 mx-auto mb-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <p class="text-gray-600">No rookie cases available at the moment. Check back soon!</p>
                </div>
            @endif
        </div>

        <!-- Field Agent Cases -->
        <div class="category-section" data-category="agent">
            <h2 class="text-3xl font-game text-primary-500 mb-6 border-b-2 border-primary-200 pb-2 flex items-center">
                <span class="case-level-badge bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">MEDIUM</span>
                Field Agent Cases <span class="text-sm font-normal text-gray-500 ml-2">(Ages 12-14)</span>
            </h2>
             @if(count($agentCases) > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($agentCases as $case)
                         @include('partials.truth-detective-case-card', ['case' => $case, 'completedCases' => $completedCases])
                    @endforeach
                </div>
            @else
                <div class="empty-state bg-gray-50 p-6 rounded-lg text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400 mx-auto mb-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <p class="text-gray-600">No field agent cases available. Keep up the good work, detective!</p>
                </div>
            @endif
        </div>

        <!-- Special Investigator Cases -->
        <div class="category-section" data-category="investigator">
            <h2 class="text-3xl font-game text-primary-500 mb-6 border-b-2 border-primary-200 pb-2 flex items-center">
                <span class="case-level-badge bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">HARD</span>
                Special Investigator Cases <span class="text-sm font-normal text-gray-500 ml-2">(Ages 15-16)</span>
            </h2>
            @if(count($investigatorCases) > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($investigatorCases as $case)
                        @include('partials.truth-detective-case-card', ['case' => $case, 'completedCases' => $completedCases])
                    @endforeach
                </div>
            @else
                <div class="empty-state bg-gray-50 p-6 rounded-lg text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400 mx-auto mb-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <p class="text-gray-600">No special investigator cases available yet. You're doing great!</p>
                </div>
            @endif
        </div>
    </div>

    <div class="mt-12 text-center">
        <div class="max-w-2xl mx-auto bg-gradient-to-r from-blue-500 to-purple-600 p-1 rounded-xl shadow-lg">
            <div class="bg-white p-6 rounded-lg flex flex-col sm:flex-row items-center gap-4">
                <img src="{{ asset('images/truth-detective/detective_byte_character.png') }}" alt="Detective Byte" class="w-24 h-24 object-contain">
                <div class="text-left">
                    <h3 class="text-xl font-bold text-gray-800">Detective Byte Says:</h3>
                    <p class="text-gray-600 italic">"Keep honing those skills! In the digital world, things aren't always what they seem. Check for unusual URLs, spelling errors, and always verify sources before trusting information online."</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/confetti.min.js') }}"></script>
    <script src="{{ asset('js/truth-detective.js') }}"></script>
    <script>
        // Counter animation
        document.querySelectorAll('.counter-animate').forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 1500;
            const step = Math.max(1, Math.floor(target / (duration / 30)));
            
            let current = 0;
            const counterInterval = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(counterInterval);
                }
                counter.textContent = current;
            }, 30);
        });
        
        // Load and display streak
        document.addEventListener('DOMContentLoaded', function() {
            const streakCount = parseInt(localStorage.getItem('truth_detective_streak') || '0');
            document.getElementById('streak-counter').textContent = streakCount;
            
            // Load and display power-ups
            const powerUpsContainer = document.getElementById('power-ups-display');
            if (powerUpsContainer) {
                // Clear loading placeholder
                powerUpsContainer.innerHTML = '';
                
                const powerUps = JSON.parse(localStorage.getItem('truth_detective_powerups') || '{"timeBoost":0,"revealClue":0,"extraHint":0}');
                
                let hasPowerUps = false;
                
                // Create buttons for each power-up type
                Object.entries(powerUps).forEach(([powerUp, count]) => {
                    if (count > 0) {
                        hasPowerUps = true;
                        
                        const button = document.createElement('div');
                        button.classList.add('power-up-btn');
                        
                        let iconSvg = '';
                        let title = '';
                        
                        switch(powerUp) {
                            case 'timeBoost':
                                title = 'Time Boost (+30s)';
                                iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
                                break;
                            case 'revealClue':
                                title = 'Reveal Clue';
                                iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>';
                                break;
                            case 'extraHint':
                                title = 'Extra Hint';
                                iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" /></svg>';
                                break;
                        }
                        
                        button.innerHTML = `
                            <div class="power-up-icon">${iconSvg}</div>
                            <div class="power-up-count">${count}</div>
                        `;
                        button.title = title;
                        
                        powerUpsContainer.appendChild(button);
                    }
                });
                
                // If no power-ups, show a message
                if (!hasPowerUps) {
                    const message = document.createElement('p');
                    message.className = 'text-gray-500 text-center w-full';
                    message.textContent = 'Solve cases in a row to earn power-ups!';
                    powerUpsContainer.appendChild(message);
                }
            }
            
            // Load and display achievements
            const achievementsContainer = document.getElementById('achievements-hub-display');
            if (achievementsContainer) {
                // Clear loading placeholder
                achievementsContainer.innerHTML = '';
                
                const achievementsEarned = JSON.parse(localStorage.getItem('truth_detective_achievements') || '[]');
                
                // Define all possible achievements
                const allAchievements = [
                    {
                        id: 'first_case',
                        name: 'First Steps',
                        description: 'Found your first clue!',
                        icon: '🔎'
                    },
                    {
                        id: 'eagle_eye',
                        name: 'Eagle Eye',
                        description: 'Found all clues in a case!',
                        icon: '👁️'
                    },
                    {
                        id: 'speed_solver',
                        name: 'Speed Solver',
                        description: 'Solved a case with more than 2 minutes left!',
                        icon: '⏱️'
                    },
                    {
                        id: 'streak_master',
                        name: 'Streak Master',
                        description: 'Achieved a 5-case solving streak!',
                        icon: '🔥'
                    }
                ];
                
                // If no achievements, show a message
                if (achievementsEarned.length === 0) {
                    const message = document.createElement('div');
                    message.className = 'col-span-2 text-gray-500 text-center py-4';
                    message.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto mb-2 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                        </svg>
                        <p>Complete cases to unlock achievements!</p>
                    `;
                    achievementsContainer.appendChild(message);
                    return;
                }
                
                // Display each achievement
                allAchievements.forEach(achievement => {
                    const isEarned = achievementsEarned.includes(achievement.id);
                    
                    const achievementElement = document.createElement('div');
                    achievementElement.className = `achievement-item p-3 rounded-md ${isEarned ? 'bg-gradient-to-r from-blue-50 to-purple-50' : 'bg-gray-50 opacity-50'}`;
                    
                    achievementElement.innerHTML = `
                        <div class="flex items-center">
                            <div class="achievement-badge ${isEarned ? 'text-2xl' : 'text-xl text-gray-400'} mr-3">
                                ${achievement.icon}
                            </div>
                            <div>
                                <h4 class="font-semibold ${isEarned ? 'text-primary-700' : 'text-gray-500'}">${achievement.name}</h4>
                                <p class="text-xs ${isEarned ? 'text-gray-600' : 'text-gray-400'}">${achievement.description}</p>
                            </div>
                            ${isEarned ? '<div class="ml-auto text-green-500 text-xl">✓</div>' : ''}
                        </div>
                    `;
                    
                    achievementsContainer.appendChild(achievementElement);
                });
            }
        });
        
        // Filter functionality
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', () => {
                // Update active button
                document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                
                const filter = button.getAttribute('data-filter');
                filterCases(filter);
            });
        });
        
        function filterCases(filter) {
            const allCards = document.querySelectorAll('.case-card');
            
            switch(filter) {
                case 'all':
                    allCards.forEach(card => card.closest('.case-card').style.display = 'block');
                    document.querySelectorAll('.category-section').forEach(section => section.style.display = 'block');
                    break;
                case 'rookie':
                case 'agent':
                case 'investigator':
                    document.querySelectorAll('.category-section').forEach(section => {
                        section.style.display = section.getAttribute('data-category') === filter ? 'block' : 'none';
                    });
                    break;
                case 'completed':
                    allCards.forEach(card => {
                        card.closest('.case-card').style.display = card.classList.contains('case-completed') ? 'block' : 'none';
                    });
                    document.querySelectorAll('.category-section').forEach(section => section.style.display = 'block');
                    break;
                case 'open':
                    allCards.forEach(card => {
                        card.closest('.case-card').style.display = !card.classList.contains('case-completed') ? 'block' : 'none';
                    });
                    document.querySelectorAll('.category-section').forEach(section => section.style.display = 'block');
                    break;
            }
        }
        
        // Search functionality
        document.getElementById('case-search').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            const cards = document.querySelectorAll('.case-card');
            
            cards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
@endpush 