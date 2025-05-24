/**
 * Cyber Time Travel Animation and Functionality
 */
document.addEventListener('DOMContentLoaded', function() {
    console.log('Time travel script loaded!');
    
    // Button to initiate random time travel
    const travelButton = document.getElementById('travel-button');
    if (travelButton) {
        console.log('Travel button found, adding click event');
        travelButton.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Travel button clicked!');
            startTimeTravel(e, null);
        });
    }

    // All buttons with the travel-button class for consistency
    const sequentialButtons = document.querySelectorAll('.sequential-button');
    sequentialButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Sequential button clicked!');
            startTimeTravel(e, null, true, this.getAttribute('href'));
        });
    });

    // Attack selection from the timeline
    const attackLinks = document.querySelectorAll('.attack-link');
    attackLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Attack link clicked: ' + this.getAttribute('data-attack'));
            const attackId = this.getAttribute('data-attack');
            startTimeTravel(e, attackId);
        });
    });

    /**
     * Start the time travel animation
     * @param {Event} e - Click event
     * @param {string} attackId - Optional attack ID to travel to
     * @param {boolean} isSequential - Whether this is a sequential journey
     * @param {string} destinationUrl - Optional URL to navigate to
     */
    function startTimeTravel(e, attackId, isSequential = false, destinationUrl = null) {
        console.log('Starting time travel animation');
        // Play sound effect if available
        playSoundEffect(document.location.origin + '/sounds/space-spaceTravel.mp3');
        
        // Get the video element which is our background
        const videoBackground = document.querySelector('video');
        if (videoBackground) {
            // Add a class to the video's parent for the animation
            videoBackground.parentElement.classList.add('time-travel-active');
        }
        
        // Create warp speed effect
        createWarpEffect();
        
        // After animation completes, redirect to the destination
        setTimeout(() => {
            // Remove animation class
            if (videoBackground) {
                videoBackground.parentElement.classList.remove('time-travel-active');
            }
            
            // Determine destination URL
            let targetUrl;
            
            if (destinationUrl) {
                // If explicit URL was provided, use it
                targetUrl = destinationUrl;
            } else if (attackId) {
                // If attack ID was provided
                targetUrl = document.location.origin + `/game/time-travel/${attackId}`;
            } else {
                // Random time travel - let the server handle the randomization
                targetUrl = document.location.origin + `/game/time-travel/random`;
            }
            
            console.log('Navigating to:', targetUrl);
            window.location.href = targetUrl;
        }, 3000);
    }
    
    /**
     * Play a sound effect with better error handling
     * @param {string} soundPath - Path to the sound file
     */
    function playSoundEffect(soundPath) {
        // Use the global sound manager if available
        if (typeof soundManager !== 'undefined') {
            soundManager.play('timeTravel');
            return;
        }
        
        // Fallback to direct audio playback
        try {
            const soundEffect = new Audio(soundPath);
            soundEffect.volume = 0.5;
            
            // Using the play promise API with proper error handling
            const playPromise = soundEffect.play();
            
            if (playPromise !== undefined) {
                playPromise.catch(error => {
                    console.log('Sound playback prevented: ', error);
                    // User interaction may be needed before audio can play
                });
            }
        } catch (err) {
            console.log('Sound error:', err);
            // Continue without sound
        }
    }
    
    /**
     * Create warp speed particles effect
     */
    function createWarpEffect() {
        // Remove existing warp container if present
        const existingWarp = document.getElementById('warp-container');
        if (existingWarp) {
            existingWarp.remove();
        }
        
        // Create warp container
        const warpContainer = document.createElement('div');
        warpContainer.id = 'warp-container';
        warpContainer.style.position = 'fixed';
        warpContainer.style.top = '0';
        warpContainer.style.left = '0';
        warpContainer.style.width = '100%';
        warpContainer.style.height = '100%';
        warpContainer.style.overflow = 'hidden';
        warpContainer.style.zIndex = '5';
        
        document.body.appendChild(warpContainer);
        
        // Create warp stars
        for (let i = 0; i < 200; i++) {
            createWarpStar(warpContainer);
        }
        
        // Remove warp effect after animation
        setTimeout(() => {
            warpContainer.remove();
        }, 3000);
    }
    
    /**
     * Create a single warp speed star
     * @param {HTMLElement} container - Container element
     */
    function createWarpStar(container) {
        const star = document.createElement('div');
        const size = Math.random() * 3 + 1;
        
        star.style.position = 'absolute';
        star.style.width = `${size}px`;
        star.style.height = `${size}px`;
        star.style.background = `rgba(255, 255, 255, ${Math.random() * 0.5 + 0.5})`;
        star.style.borderRadius = '50%';
        star.style.boxShadow = `0 0 ${size * 2}px ${size}px rgba(65, 105, 225, 0.7)`;
        
        // Start position in the center
        star.style.top = '50%';
        star.style.left = '50%';
        star.style.transform = 'translate(-50%, -50%)';
        
        container.appendChild(star);
        
        // Random angle for travel direction
        const angle = Math.random() * Math.PI * 2;
        
        // Animate the star
        setTimeout(() => {
            star.style.transition = `all ${Math.random() * 2 + 1}s linear`;
            star.style.top = `${50 + Math.sin(angle) * 50}%`;
            star.style.left = `${50 + Math.cos(angle) * 50}%`;
            star.style.opacity = '0';
            star.style.width = `${size * 3}px`;
            star.style.height = `${size * 3}px`;
        }, 10);
    }
    
    // Back button handling for attack detail page
    const backButton = document.getElementById('back-button');
    if (backButton) {
        backButton.addEventListener('click', function(e) {
            e.preventDefault();
            handleNavigation(this.getAttribute('href'));
        });
    }

    // Navigation buttons for previous/next attack
    const prevAttackBtn = document.getElementById('prev-attack');
    const nextAttackBtn = document.getElementById('next-attack');
    
    if (prevAttackBtn) {
        prevAttackBtn.addEventListener('click', function(e) {
            e.preventDefault();
            handleNavigation(this.getAttribute('href'));
        });
    }
    
    if (nextAttackBtn) {
        nextAttackBtn.addEventListener('click', function(e) {
            e.preventDefault();
            handleNavigation(this.getAttribute('href'));
        });
    }
    
    function handleNavigation(url) {
        // Add travel effect
        const videoBackground = document.querySelector('video');
        if (videoBackground) {
            videoBackground.parentElement.classList.add('time-travel-active');
        }
        
        createWarpEffect();
        
        // Play sound effect
        playSoundEffect(document.location.origin + '/sounds/space-spaceTravel.mp3');
        
        // Navigate after animation
        setTimeout(() => {
            window.location.href = url;
        }, 2000);
    }

    /**
     * Functions for individual attack pages
     */

    // Initialize attack page if we're on one
    const attackPage = document.querySelector('.cyber-attack-detail');
    if (attackPage) {
        initAttackPage();
    }

    function initAttackPage() {
        // Add typewriter effect to attack description
        const description = document.querySelector('.attack-description');
        if (description) {
            const text = description.textContent;
            description.textContent = '';
            let i = 0;
            const typeInterval = setInterval(() => {
                if (i < text.length) {
                    description.textContent += text.charAt(i);
                    i++;
                } else {
                    clearInterval(typeInterval);
                }
            }, 20);
        }
    }
}); 