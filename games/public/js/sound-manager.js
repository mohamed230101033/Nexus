/**
 * Global Sound Manager for the game
 * Handles all sound effects with proper error handling and browser compatibility
 */
class SoundManager {
    constructor() {
        this.sounds = {};
        this.isMuted = false;
        this.volume = 0.5;
        this.ready = false;
        
        // Preload common sounds
        this.preloadSounds({
            'click': '/audio/click.mp3',
            'success': '/audio/success.mp3',
            'failure': '/audio/time-up.mp3',
            'clue': '/audio/clue-found.mp3',
            'achievement': '/audio/achievement.mp3',
            'tick': '/audio/clock-tick.mp3',
            'timeTravel': '/sounds/space-spaceTravel.mp3',
            'timeLow': '/audio/time-low-warning.mp3'
        });
        
        // Check if sounds are muted in localStorage
        this.isMuted = localStorage.getItem('game_sound_muted') === 'true';
        
        // Create and append the sound toggle button
        this.createSoundToggle();
        
        // Set ready after a short delay to allow browser to initialize audio
        setTimeout(() => {
            this.ready = true;
        }, 500);
    }
    
    /**
     * Preload multiple sounds
     * @param {Object} soundPaths - Object with sound names as keys and paths as values
     */
    preloadSounds(soundPaths) {
        Object.entries(soundPaths).forEach(([name, path]) => {
            this.preloadSound(name, path);
        });
    }
    
    /**
     * Preload a single sound
     * @param {string} name - The sound identifier
     * @param {string} path - Path to the sound file
     */
    preloadSound(name, path) {
        try {
            const audio = new Audio(path);
            audio.volume = this.volume;
            audio.load();
            this.sounds[name] = audio;
        } catch (err) {
            console.log(`Error preloading sound ${name}:`, err);
        }
    }
    
    /**
     * Play a sound effect
     * @param {string} name - The sound identifier
     * @param {Object} options - Optional parameters (volume, loop)
     * @returns {Promise} - A promise that resolves when the sound finishes playing
     */
    play(name, options = {}) {
        if (this.isMuted || !this.ready || !this.sounds[name]) return Promise.resolve();
        
        const sound = this.sounds[name];
        
        // Apply options
        if (options.volume) sound.volume = options.volume * this.volume;
        else sound.volume = this.volume;
        
        sound.loop = options.loop === true;
        
        return new Promise((resolve, reject) => {
            // Clone the audio to allow multiple plays
            const soundToPlay = sound.cloneNode();
            
            // Set event listeners
            soundToPlay.onended = () => resolve();
            soundToPlay.onerror = (err) => {
                console.error(`Error playing sound ${name}:`, err);
                reject(err);
            };
            
            // Play with proper error handling
            const playPromise = soundToPlay.play();
            if (playPromise !== undefined) {
                playPromise.catch(error => {
                    console.log(`Sound playback prevented: ${name}`, error);
                });
            }
        });
    }
    
    /**
     * Toggle sound on/off
     */
    toggleMute() {
        this.isMuted = !this.isMuted;
        localStorage.setItem('game_sound_muted', this.isMuted);
        
        // Update the toggle icon
        const toggleIcon = document.getElementById('sound-toggle-icon');
        if (toggleIcon) {
            if (this.isMuted) {
                toggleIcon.classList.remove('fa-volume-up');
                toggleIcon.classList.add('fa-volume-mute');
            } else {
                toggleIcon.classList.remove('fa-volume-mute');
                toggleIcon.classList.add('fa-volume-up');
            }
        }
        
        // Play test sound when unmuting
        if (!this.isMuted) {
            this.play('click');
        }
    }
    
    /**
     * Set global volume
     * @param {number} value - Volume from 0 to 1
     */
    setVolume(value) {
        this.volume = Math.max(0, Math.min(1, value));
        
        // Update all loaded sounds
        Object.values(this.sounds).forEach(sound => {
            sound.volume = this.volume;
        });
    }
    
    /**
     * Create sound toggle button in the UI
     */
    createSoundToggle() {
        const toggleExists = document.getElementById('sound-toggle-container');
        if (toggleExists) return;
        
        const toggleContainer = document.createElement('div');
        toggleContainer.id = 'sound-toggle-container';
        toggleContainer.className = 'fixed top-4 right-4 z-50';
        
        const toggleButton = document.createElement('button');
        toggleButton.className = 'bg-primary-600 hover:bg-primary-700 text-white rounded-full p-2 shadow-lg transition-all duration-200 hover:scale-110';
        toggleButton.title = this.isMuted ? 'Unmute' : 'Mute';
        
        const iconClass = this.isMuted ? 'fa-volume-mute' : 'fa-volume-up';
        toggleButton.innerHTML = `<i id="sound-toggle-icon" class="fas ${iconClass} text-lg"></i>`;
        
        toggleButton.addEventListener('click', () => this.toggleMute());
        toggleContainer.appendChild(toggleButton);
        
        // Add after DOM is loaded
        if (document.body) {
            document.body.appendChild(toggleContainer);
        } else {
            document.addEventListener('DOMContentLoaded', () => {
                document.body.appendChild(toggleContainer);
            });
        }
    }
}

// Create global instance
const soundManager = new SoundManager(); 