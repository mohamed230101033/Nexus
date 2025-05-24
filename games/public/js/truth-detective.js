document.addEventListener('DOMContentLoaded', function() {
    // Timer and game setup
    const timerDisplay = document.getElementById('timer');
    const decisionForm = document.getElementById('decision-form');
    let magnifyingGlassActive = false;
    let foundCluesCount = 0;
    let totalCluesCount = 0;
    let powerUpsAvailable = {}; // Will store available power-ups
    let streakCount = parseInt(localStorage.getItem('truth_detective_streak') || '0');
    let achievementsEarned = JSON.parse(localStorage.getItem('truth_detective_achievements') || '[]');
    
    // Game variations
    const gameVariations = {
        normal: { timeLimit: 180, hintCooldown: 15 },
        speedRun: { timeLimit: 90, hintCooldown: 30 },
        relaxed: { timeLimit: 300, hintCooldown: 10 }
    };
    let currentVariation = 'normal';
    
    // Create game timer
    const gameTimer = new GameTimer({
        targetElement: timerDisplay,
        initialTime: gameVariations[currentVariation].timeLimit,
        tickSound: true,
        onTick: (timeLeft) => {
            // Any per-second updates can go here
        },
        onTimeWarning: () => {
            showNotification('⚠️ Time is running out!', 'warning');
        },
        onComplete: () => {
            // Handle time's up
            if (decisionForm) {
                showNotification('⏰ Time\'s up! Make your decision quickly!', 'danger');
                decisionForm.classList.add('animate__animated', 'animate__headShake');
            }
        }
    });

    // Load user preferences
    function loadUserPreferences() {
        currentVariation = localStorage.getItem('truth_detective_variation') || 'normal';
        
        // Apply time limit based on variation
        const newTimeLimit = gameVariations[currentVariation].timeLimit;
        gameTimer.reset(newTimeLimit);
        
        // Update display if game variation selector exists
        const variationSelector = document.getElementById('game-variation');
        if (variationSelector) {
            variationSelector.value = currentVariation;
        }
    }

    // Load power-ups
    function loadPowerUps() {
        // Get power-ups from storage or set defaults
        powerUpsAvailable = JSON.parse(localStorage.getItem('truth_detective_powerups') || '{"timeBoost":0,"revealClue":0,"extraHint":0}');
        
        // Display power-ups
        updatePowerUpDisplay();
    }

    // Update power-ups display
    function updatePowerUpDisplay() {
        const powerUpsContainer = document.getElementById('power-ups-container');
        if (!powerUpsContainer) return;

        // Clear existing buttons
        powerUpsContainer.innerHTML = '';

        // Create a button for each power-up
        Object.entries(powerUpsAvailable).forEach(([powerUp, count]) => {
            if (count > 0) {
                const button = document.createElement('button');
                button.classList.add('power-up-btn');
                button.dataset.powerup = powerUp;
                
                let iconSvg = '';
                let title = '';
                
                switch(powerUp) {
                    case 'timeBoost':
                        title = 'Add 30 seconds';
                        iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
                        break;
                    case 'revealClue':
                        title = 'Reveal a hidden clue';
                        iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>';
                        break;
                    case 'extraHint':
                        title = 'Get an extra hint';
                        iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" /></svg>';
                        break;
                }
                
                button.innerHTML = `
                    <div class="power-up-icon">${iconSvg}</div>
                    <div class="power-up-count">${count}</div>
                `;
                button.title = title;
                
                // Add click event
                button.addEventListener('click', () => usePowerUp(powerUp));
                
                powerUpsContainer.appendChild(button);
            }
        });
    }
    
    // Use a power-up
    function usePowerUp(powerType) {
        if (powerUpsAvailable[powerType] <= 0) return;
        
        // Play power-up sound
        soundManager.play('click');
        
        switch(powerType) {
            case 'timeBoost':
                // Add 30 seconds to the timer
                gameTimer.addTime(30);
                showNotification('⏱️ +30 seconds added!', 'success');
                break;
                
            case 'revealClue':
                // Reveal a random hidden clue
                const hiddenClues = Array.from(document.querySelectorAll('.clue-marker:not(.found)'));
                if (hiddenClues.length > 0) {
                    const randomClue = hiddenClues[Math.floor(Math.random() * hiddenClues.length)];
                    randomClue.classList.add('highlight-permanent');
                    showNotification('🔎 A clue has been revealed!', 'success');
                    soundManager.play('clue');
                } else {
                    // If no hidden clues, refund the power-up
                    powerUpsAvailable[powerType]++;
                    showNotification('No hidden clues remaining!', 'info');
                    return;
                }
                break;
                
            case 'extraHint':
                // Provide an extra hint based on the case
                let hint = "Look carefully at the details that seem inconsistent.";
                
                // Different hints for different case types
                if (typeof caseData !== 'undefined') {
                    if (caseData.title.toLowerCase().includes('email')) {
                        hint = "Check the sender's email address and look for spelling errors.";
                    } else if (caseData.title.toLowerCase().includes('social')) {
                        hint = "Verify the account information and post date.";
                    } else if (caseData.title.toLowerCase().includes('news')) {
                        hint = "Cross-reference with the source and check for emotional language.";
                    }
                }
                
                showNotification(`💡 Detective Tip: ${hint}`, 'info', 8000);
                break;
        }
        
        // Decrease count and update storage
        powerUpsAvailable[powerType] -= 1;
        localStorage.setItem('truth_detective_powerups', JSON.stringify(powerUpsAvailable));
        
        // Update display
        updatePowerUpDisplay();
    }

    function startConfetti() {
        const confettiSettings = { 
            particleCount: 100,
            spread: 70,
            origin: { y: 0.6 }
        };
        confetti(confettiSettings);
    }

    // Streak system
    function updateStreak(isCorrect) {
        if (isCorrect) {
            streakCount++;
            // Award power-up for streak milestones
            if (streakCount % 3 === 0) {
                // Every 3rd correct answer gets a random power-up
                const powerUps = ['timeBoost', 'revealClue', 'extraHint'];
                const randomPowerUp = powerUps[Math.floor(Math.random() * powerUps.length)];
                powerUpsAvailable[randomPowerUp] = (powerUpsAvailable[randomPowerUp] || 0) + 1;
                localStorage.setItem('truth_detective_powerups', JSON.stringify(powerUpsAvailable));
                
                showNotification(`🏆 ${streakCount} case streak! You earned a ${randomPowerUp.replace(/([A-Z])/g, ' $1').toLowerCase()} power-up!`, 'success', 6000);
                soundManager.play('achievement');
            }
        } else {
            // Reset streak on wrong answer
            streakCount = 0;
        }
        
        localStorage.setItem('truth_detective_streak', streakCount);
        
        // Update streak counter if present
        const streakCounter = document.getElementById('streak-counter');
        if (streakCounter) {
            streakCounter.textContent = streakCount;
        }
        
        // Also check for achievements
        checkForAchievements();
    }

    // Check for achievements
    function checkForAchievements() {
        // Check if we have the achievement manager available
        if (typeof achievementsManager !== 'undefined') {
            // Update progress for case completion
            achievementsManager.incrementProgress('solvedCases');
            
            // Check for speed solver achievement
            const timeElapsed = gameVariations[currentVariation].timeLimit - gameTimer.getRemainingTime();
            if (timeElapsed < 60) {
                achievementsManager.updateProgress('speedCompletion', true);
            }
            
            // Check for perfect score (all clues found)
            if (foundCluesCount === totalCluesCount && totalCluesCount > 0) {
                achievementsManager.updateProgress('perfectScore', true);
            }
            return;
        }
        
        // Legacy achievement system
        // Only check at specific milestones 
        if (streakCount === 3 && !achievementsEarned.includes('streak_3')) {
            achievementUnlocked('streak_3', 'Truth Seeker', 'Solve 3 cases in a row');
        } else if (streakCount === 5 && !achievementsEarned.includes('streak_5')) {
            achievementUnlocked('streak_5', 'Truth Expert', 'Solve 5 cases in a row');
        } else if (streakCount === 10 && !achievementsEarned.includes('streak_10')) {
            achievementUnlocked('streak_10', 'Master Detective', 'Solve 10 cases in a row');
        }
    }

    // Legacy achievement system
    function achievementUnlocked(id, title, description) {
        // Add to earned achievements
        if (!achievementsEarned.includes(id)) {
            achievementsEarned.push(id);
            localStorage.setItem('truth_detective_achievements', JSON.stringify(achievementsEarned));
            
            // Show notification for new achievement
            showAchievementNotification({ id, title, description });
            
            // Play sound
            soundManager.play('achievement');
            
            // Display confetti
            startConfetti();
        }
    }

    // Show achievement notification
    function showAchievementNotification(achievement) {
        const notification = document.createElement('div');
        notification.className = 'achievement-notification fixed top-4 right-4 bg-gradient-to-r from-purple-800 to-indigo-800 text-white p-4 rounded-lg shadow-lg z-50 transform scale-0 transition-all duration-300';
        
        notification.innerHTML = `
            <div class="flex items-center">
                <div class="achievement-icon mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-yellow-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-lg">Achievement Unlocked!</h3>
                    <p class="text-sm">${achievement.title}</p>
                    <p class="text-xs text-gray-300">${achievement.description}</p>
                </div>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Trigger animation
        setTimeout(() => {
            notification.classList.remove('scale-0');
            notification.classList.add('scale-100');
        }, 10);
        
        // Remove after 5 seconds
        setTimeout(() => {
            notification.classList.remove('scale-100');
            notification.classList.add('scale-0');
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    }

    // Start timer functionality
    function startTimer() {
        if (!timerDisplay) return;
        
        // Start game timer
        gameTimer.start();
    }

    // Show notification
    function showNotification(message, type = 'info', duration = 5000) {
        const notification = document.createElement('div');
        const typeClasses = {
            'info': 'bg-blue-500',
            'success': 'bg-green-500',
            'warning': 'bg-yellow-500',
            'danger': 'bg-red-500'
        };
        notification.className = `notification fixed top-4 left-1/2 transform -translate-x-1/2 ${typeClasses[type] || 'bg-blue-500'} text-white p-4 rounded-lg shadow-lg z-50 text-center max-w-md transition-all duration-300 opacity-0`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => notification.classList.add('show'), 10);
        
        // Remove after specified duration
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, duration);
    }

    // Progress bar for clues
    function updateClueProgress() {
        const progressEl = document.getElementById('clue-progress');
        if (!progressEl) return;
        
        const percent = Math.round((foundCluesCount / totalCluesCount) * 100);
        progressEl.style.width = `${percent}%`;
        progressEl.setAttribute('aria-valuenow', percent);
        
        document.getElementById('clues-count').textContent = `${foundCluesCount}/${totalCluesCount}`;
        
        // Achievement unlocked when all clues found
        if (foundCluesCount === totalCluesCount && foundCluesCount > 0) {
            showNotification('🎉 Master Detective! You found all the clues!', 'success');
            soundManager.play('success');
            startConfetti();
            checkForAchievements();
        }
    }

    // Create game settings panel
    function createGameSettingsPanel() {
        const settingsPanel = document.createElement('div');
        settingsPanel.className = 'game-settings-panel';
        settingsPanel.innerHTML = `
            <button id="settings-toggle" class="settings-toggle" title="Game Settings">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>
            <div class="settings-content">
                <h3>Game Settings</h3>
               
                <div class="settings-item">
                    <label for="game-variation">Game Mode:</label>
                    <select id="game-variation">
                        <option value="normal">Normal (3:00)</option>
                        <option value="speedRun">Speed Run (1:30)</option>
                        <option value="relaxed">Relaxed (5:00)</option>
                    </select>
                </div>
                
                <div class="settings-item streak-display">
                    <span>Current Streak:</span>
                    <span id="streak-count" class="streak-badge">${streakCount}</span>
                </div>
                
                <button id="save-settings" class="btn btn-primary">Save Settings</button>
            </div>
        `;
        
        document.body.appendChild(settingsPanel);
        
        // Add event listeners
        const toggleBtn = settingsPanel.querySelector('#settings-toggle');
        const saveBtn = settingsPanel.querySelector('#save-settings');
        const content = settingsPanel.querySelector('.settings-content');
        
        toggleBtn.addEventListener('click', () => {
            content.classList.toggle('show');
            soundManager.play('click');
        });
        
        saveBtn.addEventListener('click', () => {
            content.classList.remove('show');
            soundManager.play('click');
            
            // Save game variation
            const variation = document.getElementById('game-variation').value;
            localStorage.setItem('truth_detective_variation', variation);
            currentVariation = variation;
            
            // Update timer if game is in progress
            if (gameTimer.isActive()) {
                showNotification('Settings will take effect on your next case.', 'info');
            } else {
                // Update timer for current game
                gameTimer.reset(gameVariations[currentVariation].timeLimit);
                showNotification('Game settings saved!', 'success');
            }
        });
        
        // Update initial value for streak counter
        const streakCounter = document.getElementById('streak-count');
        if (streakCounter) {
            streakCounter.textContent = streakCount;
        }
    }

    // Create power-ups container
    function createPowerUpsContainer() {
        const casePage = document.querySelector('.truth-detective-case');
        if (!casePage) return;
        
        const powerUpsContainer = document.createElement('div');
        powerUpsContainer.id = 'power-ups-container';
        powerUpsContainer.className = 'power-ups-container';
        casePage.appendChild(powerUpsContainer);
    }

    // Initialize game
    function initGame() {
        loadUserPreferences();
        loadPowerUps();
        createGameSettingsPanel();
        createPowerUpsContainer();
        
        // Start timer if on case page and not already decided
        const decisionMade = document.body.classList.contains('decision-made');
        if (timerDisplay && !decisionMade) {
            startTimer();
        }
        
        // Set up event handlers for clues and decision form
        setupClueHandlers();
        setupDecisionForm();
        
        // Show achievements if available
        if (typeof achievementsManager !== 'undefined') {
            // Display achievements in the achievements-display container if it exists
            const achievementsContainer = document.getElementById('achievements-hub-display');
            if (achievementsContainer) {
                achievementsManager.displayAchievements('achievements-hub-display', 'truth');
            }
        }
        
        // Handle decision made if applicable
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('decision_made')) {
            const isCorrect = urlParams.get('is_correct') === 'true';
            
            // Update streak
            updateStreak(isCorrect);
            
            if (isCorrect) {
                soundManager.play('success');
                startConfetti();
            }
        }
        
        // Set up Magnifying Glass feature
        setupMagnifyingGlass();
    }
    
    // Setup clue handlers
    function setupClueHandlers() {
        const clueMarkers = document.querySelectorAll('.clue-marker');
        totalCluesCount = clueMarkers.length;
        
        clueMarkers.forEach(marker => {
            marker.addEventListener('click', function() {
                if (!this.classList.contains('found') && (magnifyingGlassActive || this.classList.contains('highlight-permanent'))) {
                    this.classList.add('found');
                    foundCluesCount++;
                    
                    // Show clue content
                    const clueContent = this.getAttribute('data-clue');
                    showNotification(`🔎 Clue found: ${clueContent}`, 'success');
                    
                    // Play sound
                    soundManager.play('clue');
                    
                    // Update progress bar
                    updateClueProgress();
                }
            });
        });
        
        // Setup magnifying glass toggle
        const magnifyingGlassToggle = document.getElementById('toggle-magnifying');
        if (magnifyingGlassToggle) {
            magnifyingGlassToggle.addEventListener('click', function() {
                magnifyingGlassActive = !magnifyingGlassActive;
                this.classList.toggle('active', magnifyingGlassActive);
                
                // Play sound
                soundManager.play('click');
                
                if (magnifyingGlassActive) {
                    document.body.classList.add('magnifying-active');
                    showNotification('🔍 Magnifying glass activated! Click on suspicious areas to find clues.', 'info');
                } else {
                    document.body.classList.remove('magnifying-active');
                }
            });
        }
    }
    
    // Setup decision form
    function setupDecisionForm() {
        if (!decisionForm) return;
        
        const realBtn = document.getElementById('decision-real');
        const fakeBtn = document.getElementById('decision-fake');
        
        if (realBtn) {
            realBtn.addEventListener('click', function() {
                // Play sound
                soundManager.play('click');
            });
        }
        
        if (fakeBtn) {
            fakeBtn.addEventListener('click', function() {
                // Play sound
                soundManager.play('click');
            });
        }
        
        // Pause timer when submitting form
        decisionForm.addEventListener('submit', function() {
            if (gameTimer.isActive()) {
                gameTimer.pause();
            }
        });
    }
    
    // Setup magnifying glass
    function setupMagnifyingGlass() {
        const casePage = document.querySelector('.truth-detective-case');
        if (!casePage) return;
        
        // Create magnifying glass cursor
        const cursorStyle = document.createElement('style');
        cursorStyle.textContent = `
            .magnifying-active .evidence-image {
                cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="%23ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>') 12 12, auto;
            }
        `;
        document.head.appendChild(cursorStyle);
    }
    
    // Handle rendering clue markers on an image
    function renderClueMarkers(imageElement) {
        if (!imageElement) return;
        
        // Get the parent container
        const container = imageElement.parentElement;
        if (!container) return;
        
        // Set the container position if not already
        if (window.getComputedStyle(container).position === 'static') {
            container.style.position = 'relative';
        }
        
        // Find all clue markers for this image
        const imageId = imageElement.getAttribute('id');
        if (!imageId) return;
        
        const clueData = window.clueData?.[imageId];
        if (!clueData || !Array.isArray(clueData)) return;
        
        // Create markers for each clue
        clueData.forEach((clue, index) => {
            const marker = document.createElement('div');
            marker.className = 'clue-marker';
            marker.dataset.clue = clue.text;
            marker.style.left = `${clue.x * 100}%`;
            marker.style.top = `${clue.y * 100}%`;
            
            container.appendChild(marker);
        });
    }

    // Initialize the game
    initGame();
}); 