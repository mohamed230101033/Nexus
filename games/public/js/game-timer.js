/**
 * Game Timer
 * A reliable timer implementation for the game with callbacks and visual updates
 */
class GameTimer {
    constructor(options = {}) {
        this.targetElement = options.targetElement || null;
        this.initialTime = options.initialTime || 180; // Default 3 minutes
        this.onTick = options.onTick || (() => {});
        this.onComplete = options.onComplete || (() => {});
        this.onTimeWarning = options.onTimeWarning || (() => {});
        this.warningThreshold = options.warningThreshold || 30; // Default 30 seconds
        this.tickSound = options.tickSound || false;
        this.timeFormat = options.timeFormat || 'MM:SS'; // MM:SS or SS or M:SS
        
        this.timeLeft = this.initialTime;
        this.isRunning = false;
        this.timerId = null;
        this.startTime = null;
        this.elapsedPauseTime = 0;
        this.pauseStartTime = null;
        this.warningIssued = false;
    }
    
    /**
     * Set the timer display element
     * @param {HTMLElement|string} element - DOM element or selector
     */
    setDisplayElement(element) {
        if (typeof element === 'string') {
            this.targetElement = document.querySelector(element);
        } else {
            this.targetElement = element;
        }
    }
    
    /**
     * Start the timer
     */
    start() {
        if (this.isRunning) return;
        
        this.isRunning = true;
        this.startTime = Date.now() - (this.initialTime - this.timeLeft) * 1000;
        this.lastTickTime = Date.now();
        
        // Schedule the next update using requestAnimationFrame for smoother operation
        this.scheduleUpdate();
        
        // Play sound
        if (typeof soundManager !== 'undefined' && this.tickSound) {
            // Start tick sound for time pressure
            soundManager.play('tick', { loop: true, volume: 0.2 });
        }
    }
    
    /**
     * Schedule the next timer update
     */
    scheduleUpdate() {
        if (!this.isRunning) return;
        
        this.timerId = requestAnimationFrame(() => this.update());
    }
    
    /**
     * Update timer on each tick
     */
    update() {
        if (!this.isRunning) return;
        
        const currentTime = Date.now();
        
        // Calculate elapsed time in seconds since timer started
        const elapsedSeconds = Math.floor((currentTime - this.startTime - this.elapsedPauseTime) / 1000);
        this.timeLeft = Math.max(0, this.initialTime - elapsedSeconds);
        
        // Update display
        this.updateDisplay();
        
        // Check if we need to issue a time warning
        if (this.timeLeft <= this.warningThreshold && !this.warningIssued) {
            this.warningIssued = true;
            this.onTimeWarning(this.timeLeft);
            
            if (typeof soundManager !== 'undefined') {
                soundManager.play('timeLow');
            }
        }
        
        // Call tick callback
        const secondsElapsed = Math.floor((currentTime - this.lastTickTime) / 1000);
        if (secondsElapsed >= 1) {
            this.lastTickTime = currentTime;
            this.onTick(this.timeLeft);
        }
        
        // Check if timer completed
        if (this.timeLeft <= 0) {
            this.complete();
            return;
        }
        
        // Schedule next update
        this.scheduleUpdate();
    }
    
    /**
     * Pause the timer
     */
    pause() {
        if (!this.isRunning) return;
        
        this.isRunning = false;
        this.pauseStartTime = Date.now();
        cancelAnimationFrame(this.timerId);
        
        // Stop tick sound
        if (typeof soundManager !== 'undefined' && this.tickSound) {
            // We would need a method to stop the sound here
            // For now we'll just mute it by toggling mute
            if (!soundManager.isMuted) {
                soundManager.toggleMute();
                this.wasUnmuted = true;
            }
        }
    }
    
    /**
     * Resume the timer
     */
    resume() {
        if (this.isRunning || !this.pauseStartTime) return;
        
        // Add the pause duration to the total elapsed pause time
        this.elapsedPauseTime += (Date.now() - this.pauseStartTime);
        this.pauseStartTime = null;
        this.isRunning = true;
        
        // Resume the tick sound
        if (typeof soundManager !== 'undefined' && this.tickSound && this.wasUnmuted) {
            if (soundManager.isMuted) {
                soundManager.toggleMute();
            }
            this.wasUnmuted = false;
        }
        
        // Schedule updates again
        this.scheduleUpdate();
    }
    
    /**
     * Reset the timer
     * @param {number} newTime - Optional new time in seconds
     */
    reset(newTime = null) {
        cancelAnimationFrame(this.timerId);
        this.isRunning = false;
        this.initialTime = newTime !== null ? newTime : this.initialTime;
        this.timeLeft = this.initialTime;
        this.elapsedPauseTime = 0;
        this.pauseStartTime = null;
        this.warningIssued = false;
        this.updateDisplay();
    }
    
    /**
     * Add time to the timer
     * @param {number} seconds - Seconds to add
     */
    addTime(seconds) {
        this.timeLeft += seconds;
        this.initialTime += seconds;
        
        // If we were in warning mode but now have more time, remove warning
        if (this.warningIssued && this.timeLeft > this.warningThreshold) {
            this.warningIssued = false;
        }
        
        this.updateDisplay();
        
        // If we're adding time while paused, need to update the start time
        if (!this.isRunning) {
            this.startTime = Date.now() - (this.initialTime - this.timeLeft) * 1000;
        }
    }
    
    /**
     * Handle timer completion
     */
    complete() {
        this.isRunning = false;
        cancelAnimationFrame(this.timerId);
        this.timeLeft = 0;
        this.updateDisplay();
        
        // Stop tick sound and play completion sound
        if (typeof soundManager !== 'undefined') {
            if (this.tickSound) {
                // Stop ticking
                // soundManager.stop('tick');
            }
            soundManager.play('failure');
        }
        
        // Call completion callback
        this.onComplete();
    }
    
    /**
     * Update timer display
     */
    updateDisplay() {
        if (!this.targetElement) return;
        
        const minutes = Math.floor(this.timeLeft / 60);
        const seconds = this.timeLeft % 60;
        
        let displayText = '';
        
        switch (this.timeFormat) {
            case 'MM:SS':
                displayText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                break;
            case 'M:SS':
                displayText = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                break;
            case 'SS':
                displayText = this.timeLeft.toString();
                break;
            default:
                displayText = `${minutes}:${seconds.toString().padStart(2, '0')}`;
        }
        
        this.targetElement.textContent = displayText;
        
        // Add visual indication for time running low
        if (this.timeLeft <= this.warningThreshold) {
            this.targetElement.classList.add('text-danger-600');
            
            if (this.timeLeft <= 10) {
                this.targetElement.classList.add('animate-pulse');
            } else {
                this.targetElement.classList.remove('animate-pulse');
            }
        } else {
            this.targetElement.classList.remove('text-danger-600', 'animate-pulse');
        }
    }
    
    /**
     * Get remaining time
     * @returns {number} Seconds remaining
     */
    getRemainingTime() {
        return this.timeLeft;
    }
    
    /**
     * Check if timer is active
     * @returns {boolean} Is timer running
     */
    isActive() {
        return this.isRunning;
    }
} 