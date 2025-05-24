/**
 * Achievements System for the Cybersecurity Game
 * Manages player achievements, progress, and rewards
 */
class AchievementsManager {
    constructor() {
        this.achievements = {};
        this.progress = {};
        this.earnedAchievements = [];
        
        // Load from localStorage
        this.loadFromStorage();
        
        // Define all achievements
        this.initializeAchievements();
    }
    
    /**
     * Load achievements data from localStorage
     */
    loadFromStorage() {
        try {
            this.earnedAchievements = JSON.parse(localStorage.getItem('game_achievements') || '[]');
            this.progress = JSON.parse(localStorage.getItem('game_progress') || '{}');
        } catch (e) {
            console.error('Error loading achievements from storage:', e);
            this.earnedAchievements = [];
            this.progress = {};
        }
    }
    
    /**
     * Save to localStorage
     */
    saveToStorage() {
        localStorage.setItem('game_achievements', JSON.stringify(this.earnedAchievements));
        localStorage.setItem('game_progress', JSON.stringify(this.progress));
    }
    
    /**
     * Initialize achievement definitions
     */
    initializeAchievements() {
        // Mission achievements
        this.achievements = {
            // Phishing achievements
            'phishing_rookie': {
                id: 'phishing_rookie',
                name: 'Phishing Rookie',
                description: 'Complete your first phishing challenge',
                icon: 'fa-fish',
                color: 'text-blue-500',
                type: 'mission'
            },
            'phishing_expert': {
                id: 'phishing_expert',
                name: 'Phishing Expert',
                description: 'Identify all clues in a phishing email',
                icon: 'fa-fish-fins',
                color: 'text-blue-600',
                type: 'mission'
            },
            'phishing_master': {
                id: 'phishing_master',
                name: 'Phishing Master',
                description: 'Complete all phishing stages with high score',
                icon: 'fa-user-shield',
                color: 'text-blue-700',
                type: 'mission'
            },
            
            // Password achievements
            'password_beginner': {
                id: 'password_beginner',
                name: 'Password Beginner',
                description: 'Create your first strong password',
                icon: 'fa-key',
                color: 'text-yellow-500', 
                type: 'mission'
            },
            'password_expert': {
                id: 'password_expert',
                name: 'Password Expert',
                description: 'Successfully categorize password strength types',
                icon: 'fa-unlock-keyhole',
                color: 'text-yellow-600',
                type: 'mission'
            },
            'password_master': {
                id: 'password_master',
                name: 'Password Master',
                description: 'Complete all password challenges with high score',
                icon: 'fa-shield-halved',
                color: 'text-yellow-700',
                type: 'mission'
            },
            
            // Social media achievements
            'social_rookie': {
                id: 'social_rookie',
                name: 'Social Media Rookie',
                description: 'Complete your first social media challenge',
                icon: 'fa-users',
                color: 'text-green-500', 
                type: 'mission'
            },
            'social_expert': {
                id: 'social_expert',
                name: 'Social Media Expert',
                description: 'Correctly identify online privacy concerns',
                icon: 'fa-user-secret',
                color: 'text-green-600',
                type: 'mission'
            },
            
            // Truth Detective achievements
            'truth_rookie': {
                id: 'truth_rookie',
                name: 'Truth Seeker',
                description: 'Complete your first Truth Detective case',
                icon: 'fa-magnifying-glass',
                color: 'text-purple-500',
                type: 'truth'
            },
            'truth_expert': {
                id: 'truth_expert',
                name: 'Truth Expert',
                description: 'Solve 3 Truth Detective cases',
                icon: 'fa-magnifying-glass-chart',
                color: 'text-purple-600', 
                type: 'truth'
            },
            'truth_master': {
                id: 'truth_master', 
                name: 'Master Detective',
                description: 'Solve 5 Truth Detective cases with perfect accuracy',
                icon: 'fa-user-detective',
                color: 'text-purple-700',
                type: 'truth'
            },
            
            // Time Travel achievements
            'time_traveler': {
                id: 'time_traveler',
                name: 'Time Traveler',
                description: 'Visit your first historical cyber attack',
                icon: 'fa-clock-rotate-left',
                color: 'text-indigo-500',
                type: 'time'
            },
            'history_buff': {
                id: 'history_buff',
                name: 'Cyber History Buff',
                description: 'Visit all historical cyber attacks',
                icon: 'fa-timeline',
                color: 'text-indigo-700',
                type: 'time'
            },
            
            // Special achievements
            'speed_solver': {
                id: 'speed_solver',
                name: 'Speed Solver',
                description: 'Complete any challenge in under 60 seconds',
                icon: 'fa-bolt',
                color: 'text-amber-500',
                type: 'special'
            },
            'perfect_score': {
                id: 'perfect_score',
                name: 'Perfect Score',
                description: 'Get 100% on any challenge',
                icon: 'fa-star',
                color: 'text-amber-600',
                type: 'special'
            },
            'completionist': {
                id: 'completionist',
                name: 'Completionist',
                description: 'Complete all missions in the game',
                icon: 'fa-trophy',
                color: 'text-amber-700',
                type: 'special'
            }
        };
    }
    
    /**
     * Check if achievement is earned
     * @param {string} achievementId - Achievement ID to check
     * @returns {boolean} - Whether achievement is earned
     */
    hasAchievement(achievementId) {
        return this.earnedAchievements.includes(achievementId);
    }
    
    /**
     * Award an achievement to the player if they don't already have it
     * @param {string} achievementId - Achievement to award
     * @param {boolean} showNotification - Whether to show a notification
     * @returns {boolean} - True if newly awarded, false if already had it
     */
    awardAchievement(achievementId, showNotification = true) {
        if (!this.achievements[achievementId]) {
            console.error(`Achievement ${achievementId} does not exist`);
            return false;
        }
        
        if (this.earnedAchievements.includes(achievementId)) {
            return false; // Already earned
        }
        
        // Add to earned list
        this.earnedAchievements.push(achievementId);
        this.saveToStorage();
        
        // Show notification
        if (showNotification) {
            this.showAchievementNotification(achievementId);
        }
        
        // Play achievement sound if sound manager exists
        if (typeof soundManager !== 'undefined') {
            soundManager.play('achievement');
        }
        
        // Trigger event that achievement was earned
        document.dispatchEvent(new CustomEvent('achievement-earned', {
            detail: { achievementId, achievement: this.achievements[achievementId] }
        }));
        
        return true;
    }
    
    /**
     * Get all achievements of a specific type
     * @param {string} type - Achievement type
     * @returns {Array} - Array of achievement objects
     */
    getAchievementsByType(type) {
        return Object.values(this.achievements).filter(a => a.type === type);
    }
    
    /**
     * Get all earned achievements
     * @returns {Array} - Array of earned achievement objects
     */
    getEarnedAchievements() {
        return this.earnedAchievements.map(id => this.achievements[id]).filter(a => a);
    }
    
    /**
     * Update progress toward an achievement
     * @param {string} key - Progress key
     * @param {number|string} value - New value
     */
    updateProgress(key, value) {
        this.progress[key] = value;
        this.saveToStorage();
        
        // Check for achievements based on progress
        this.checkProgressAchievements();
    }
    
    /**
     * Increment progress counter
     * @param {string} key - Progress key
     * @param {number} amount - Amount to increment (default 1)
     */
    incrementProgress(key, amount = 1) {
        if (!this.progress[key]) this.progress[key] = 0;
        this.progress[key] += amount;
        this.saveToStorage();
        
        // Check for achievements based on progress
        this.checkProgressAchievements();
    }
    
    /**
     * Check progress against thresholds for achievements
     */
    checkProgressAchievements() {
        // Check mission completion counts
        const completedMissions = this.progress.completedMissions || 0;
        if (completedMissions >= 1 && !this.hasAchievement('phishing_rookie')) {
            this.awardAchievement('phishing_rookie');
        }
        
        if (completedMissions >= 5 && !this.hasAchievement('completionist')) {
            this.awardAchievement('completionist');
        }
        
        // Check truth detective cases
        const solvedCases = this.progress.solvedCases || 0;
        if (solvedCases >= 1 && !this.hasAchievement('truth_rookie')) {
            this.awardAchievement('truth_rookie');
        }
        if (solvedCases >= 3 && !this.hasAchievement('truth_expert')) {
            this.awardAchievement('truth_expert');
        }
        if (solvedCases >= 5 && !this.hasAchievement('truth_master')) {
            this.awardAchievement('truth_master');
        }
        
        // Check time travel visits
        const timeVisits = this.progress.timeVisits || 0;
        if (timeVisits >= 1 && !this.hasAchievement('time_traveler')) {
            this.awardAchievement('time_traveler');
        }
        if (timeVisits >= 5 && !this.hasAchievement('history_buff')) {
            this.awardAchievement('history_buff');
        }
        
        // Check perfect scores
        if (this.progress.perfectScore && !this.hasAchievement('perfect_score')) {
            this.awardAchievement('perfect_score');
        }
        
        // Check speed completions
        if (this.progress.speedCompletion && !this.hasAchievement('speed_solver')) {
            this.awardAchievement('speed_solver');
        }
    }
    
    /**
     * Display achievement in the UI
     * @param {string} containerId - HTML container ID to display achievements
     * @param {string} type - Optional filter by achievement type
     */
    displayAchievements(containerId, type = null) {
        const container = document.getElementById(containerId);
        if (!container) return;
        
        // Clear container
        container.innerHTML = '';
        
        // Get achievements - filter by type if provided
        let achievementsToDisplay = Object.values(this.achievements);
        if (type) {
            achievementsToDisplay = achievementsToDisplay.filter(a => a.type === type);
        }
        
        // Create elements for each achievement
        achievementsToDisplay.forEach(achievement => {
            const isEarned = this.earnedAchievements.includes(achievement.id);
            
            const achievementEl = document.createElement('div');
            achievementEl.className = `achievement-item p-3 rounded-lg transition-all duration-300 ${isEarned ? 'bg-gradient-to-br from-slate-800/80 to-slate-900' : 'bg-gray-800/50'} ${isEarned ? 'border border-' + achievement.color.replace('text-', '') + '/50' : 'border border-gray-700/30'}`;
            
            const iconClass = isEarned ? achievement.icon : 'fa-question';
            const nameText = isEarned ? achievement.name : 'Locked Achievement';
            const descText = isEarned ? achievement.description : 'Keep playing to unlock';
            
            achievementEl.innerHTML = `
                <div class="flex items-center">
                    <div class="achievement-icon ${isEarned ? achievement.color : 'text-gray-500'} mr-3">
                        <i class="fa-solid ${iconClass} text-xl ${isEarned ? 'animate-pulse-subtle' : ''}"></i>
                    </div>
                    <div class="achievement-details">
                        <h3 class="font-semibold text-sm ${isEarned ? 'text-white' : 'text-gray-400'}">${nameText}</h3>
                        <p class="text-xs ${isEarned ? 'text-gray-300' : 'text-gray-500'}">${descText}</p>
                    </div>
                    ${isEarned ? '<div class="ml-auto"><i class="fa-solid fa-circle-check text-green-500"></i></div>' : ''}
                </div>
            `;
            
            container.appendChild(achievementEl);
        });
    }
    
    /**
     * Show achievement notification
     * @param {string} achievementId - ID of the achievement
     */
    showAchievementNotification(achievementId) {
        const achievement = this.achievements[achievementId];
        if (!achievement) return;
        
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'achievement-notification fixed bottom-4 right-4 bg-gradient-to-r from-slate-800 to-slate-900 text-white p-4 rounded-lg shadow-lg z-50 transform translate-y-20 opacity-0 transition-all duration-500 border-l-4 border-' + achievement.color.replace('text-', '');
        
        notification.innerHTML = `
            <div class="flex items-center">
                <div class="achievement-icon ${achievement.color} mr-3">
                    <i class="fa-solid ${achievement.icon} text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-sm">Achievement Unlocked!</h3>
                    <p class="font-semibold text-xs">${achievement.name}</p>
                    <p class="text-xs text-gray-300">${achievement.description}</p>
                </div>
            </div>
        `;
        
        // Add to the DOM
        document.body.appendChild(notification);
        
        // Trigger animation
        setTimeout(() => {
            notification.classList.remove('translate-y-20', 'opacity-0');
            notification.classList.add('animate-bounce-subtle');
        }, 100);
        
        // Remove after 5 seconds
        setTimeout(() => {
            notification.classList.add('translate-y-20', 'opacity-0');
            setTimeout(() => {
                notification.remove();
            }, 500);
        }, 5000);
    }
    
    /**
     * Reset all achievements (for development)
     */
    resetAll() {
        this.earnedAchievements = [];
        this.progress = {};
        this.saveToStorage();
    }
}

// Create global instance
const achievementsManager = new AchievementsManager(); 