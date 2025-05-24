// Story Mode Interactive Elements

document.addEventListener('DOMContentLoaded', function() {
    // Create stars in the background
    createStars();
    
    // Add title effects
    initTitleEffects();
    
    // Setup mission card interactions
    setupMissionCards();

    // Setup interactive Circuit character
    setupCircuitCharacter();

    // Add sound effects if Web Audio API is supported
    if (window.AudioContext || window.webkitAudioContext) {
        setupSoundEffects();
    }

    // Create confetti effect for completed missions
    setupConfetti();
});

// Create animated star background
function createStars() {
    const storyBg = document.querySelector('.story-bg');
    if (!storyBg) return;

    // Create a container for stars
    const starsContainer = document.createElement('div');
    starsContainer.className = 'stars-container';
    starsContainer.style.position = 'absolute';
    starsContainer.style.top = '0';
    starsContainer.style.left = '0';
    starsContainer.style.width = '100%';
    starsContainer.style.height = '100%';
    starsContainer.style.overflow = 'hidden';
    starsContainer.style.pointerEvents = 'none';
    starsContainer.style.zIndex = '0';
    
    // Add stars to the container
    for (let i = 0; i < 50; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.left = `${Math.random() * 100}%`;
        star.style.top = `${Math.random() * 100}%`;
        star.style.animationDelay = `${Math.random() * 4}s`;
        starsContainer.appendChild(star);
    }
    
    storyBg.appendChild(starsContainer);
}

// Add special effects to story titles
function initTitleEffects() {
    const storyTitle = document.querySelector('.story-title');
    if (storyTitle) {
        // Store the title text as a data attribute for the glow effect
        storyTitle.setAttribute('data-text', storyTitle.textContent);
        
        // Add letter-by-letter animation (typewriter effect)
        const text = storyTitle.textContent;
        storyTitle.textContent = '';
        
        for (let i = 0; i < text.length; i++) {
            const letter = document.createElement('span');
            letter.textContent = text[i];
            letter.style.animationDelay = `${0.1 * i}s`;
            letter.style.display = 'inline-block';
            letter.className = 'title-letter';
            storyTitle.appendChild(letter);
            
            // Add hover effect to each letter
            letter.addEventListener('mouseover', function() {
                this.style.transform = 'translateY(-5px) scale(1.2)';
                this.style.color = 'var(--story-highlight)';
                this.style.transition = 'all 0.3s ease';
            });
            
            letter.addEventListener('mouseout', function() {
                this.style.transform = '';
                this.style.color = '';
            });
        }
    }
}

// Setup mission card interactions
function setupMissionCards() {
    const missionCards = document.querySelectorAll('.mission-card');
    
    missionCards.forEach(card => {
        // Add tilt effect on mouse move
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left; // x position within the element
            const y = e.clientY - rect.top; // y position within the element
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const deltaX = (x - centerX) / centerX * 5; // max 5 degrees tilt
            const deltaY = (y - centerY) / centerY * 5; // max 5 degrees tilt
            
            this.style.transform = `perspective(1000px) rotateX(${-deltaY}deg) rotateY(${deltaX}deg) scale3d(1.05, 1.05, 1.05)`;
        });
        
        // Reset transform when mouse leaves
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
            
            // Add a slight bounce effect when mouse leaves
            this.classList.add('bounce');
            setTimeout(() => {
                this.classList.remove('bounce');
            }, 1000);
        });
        
        // Check if mission is completed
        const completedBadge = card.querySelector('.completed-badge');
        if (completedBadge) {
            // Create a confetti container for this card
            const confettiContainer = document.createElement('div');
            confettiContainer.className = 'confetti-container';
            card.appendChild(confettiContainer);
            
            // Show confetti when hovering over completed badge
            completedBadge.addEventListener('mouseenter', function() {
                createConfettiEffect(confettiContainer);
            });
        }
    });
}

// Setup the Circuit character interactions
function setupCircuitCharacter() {
    const circuitCharacter = document.querySelector('.circuit-character');
    if (!circuitCharacter) return;
    
    // Add hover animation class
    circuitCharacter.addEventListener('mouseenter', function() {
        this.classList.add('pulse');
        
        // Show a random tip when hovering
        const speechBubble = document.querySelector('.speech-bubble');
        if (speechBubble) {
            const tips = [
                "Always check the sender's email address before clicking links!",
                "Use strong passwords with letters, numbers, and symbols!",
                "Never share personal information with strangers online!",
                "Keep your software and apps updated for better security!",
                "Remember to log out of your accounts on shared computers!"
            ];
            speechBubble.textContent = tips[Math.floor(Math.random() * tips.length)];
            speechBubble.style.opacity = '0';
            speechBubble.style.transform = 'translateY(10px)';
            
            // Animate the speech bubble
            setTimeout(() => {
                speechBubble.style.transition = 'all 0.5s ease';
                speechBubble.style.opacity = '1';
                speechBubble.style.transform = 'translateY(0)';
            }, 100);
        }
    });
    
    circuitCharacter.addEventListener('mouseleave', function() {
        this.classList.remove('pulse');
    });
}

// Setup sound effects for interactive elements
function setupSoundEffects() {
    try {
        // Create audio context
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        const audioCtx = new AudioContext();
        
        // Function to play hover sound
        function playHoverSound() {
            const oscillator = audioCtx.createOscillator();
            const gainNode = audioCtx.createGain();
            
            oscillator.type = 'sine';
            oscillator.frequency.setValueAtTime(440, audioCtx.currentTime); // A4
            oscillator.frequency.exponentialRampToValueAtTime(880, audioCtx.currentTime + 0.1); // A5
            
            gainNode.gain.setValueAtTime(0.1, audioCtx.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + 0.2);
            
            oscillator.connect(gainNode);
            gainNode.connect(audioCtx.destination);
            
            oscillator.start();
            oscillator.stop(audioCtx.currentTime + 0.2);
        }
        
        // Function to play click sound
        function playClickSound() {
            const oscillator = audioCtx.createOscillator();
            const gainNode = audioCtx.createGain();
            
            oscillator.type = 'square';
            oscillator.frequency.setValueAtTime(880, audioCtx.currentTime); // A5
            oscillator.frequency.exponentialRampToValueAtTime(220, audioCtx.currentTime + 0.1); // A3
            
            gainNode.gain.setValueAtTime(0.2, audioCtx.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + 0.3);
            
            oscillator.connect(gainNode);
            gainNode.connect(audioCtx.destination);
            
            oscillator.start();
            oscillator.stop(audioCtx.currentTime + 0.3);
        }
        
        // Add sound to mission cards
        const missionCards = document.querySelectorAll('.mission-card');
        missionCards.forEach(card => {
            card.addEventListener('mouseenter', playHoverSound);
            card.addEventListener('click', playClickSound);
        });
        
        // Add sound to circuit character
        const circuitCharacter = document.querySelector('.circuit-character');
        if (circuitCharacter) {
            circuitCharacter.addEventListener('mouseenter', playHoverSound);
        }
        
        // Add sound to title
        const storyTitle = document.querySelector('.story-title');
        if (storyTitle) {
            storyTitle.addEventListener('mouseenter', playHoverSound);
        }
        
    } catch (e) {
        console.log('Web Audio API not supported or error occurred:', e);
    }
}

// Create confetti effect for completed missions
function setupConfetti() {
    const completedBadges = document.querySelectorAll('.completed-badge');
    completedBadges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            const card = this.closest('.mission-card');
            if (card) {
                const container = card.querySelector('.confetti-container');
                if (container) {
                    createConfettiEffect(container);
                }
            }
        });
    });
}

// Helper function to create confetti
function createConfettiEffect(container) {
    const colors = ['#38bdf8', '#10b981', '#f59e0b', '#3b82f6', '#ef4444'];
    
    // Clear any existing confetti
    container.innerHTML = '';
    
    // Create confetti pieces
    for (let i = 0; i < 30; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.left = `${Math.random() * 100}%`;
        confetti.style.top = `${Math.random() * 100}%`;
        confetti.style.width = `${Math.random() * 6 + 4}px`;
        confetti.style.height = `${Math.random() * 6 + 4}px`;
        confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
        confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
        
        // Animation for confetti
        confetti.style.animation = `confetti ${Math.random() * 2 + 1}s ease forwards`;
        confetti.style.opacity = '0';
        
        // Add keyframes for this specific confetti piece
        const style = document.createElement('style');
        const animationName = `confetti_${Math.random().toString(36).substring(2, 9)}`;
        
        style.textContent = `
            @keyframes ${animationName} {
                0% { opacity: 1; transform: translateY(0) rotate(${Math.random() * 360}deg); }
                100% { opacity: 0; transform: translateY(${-Math.random() * 100 - 50}px) translateX(${(Math.random() - 0.5) * 100}px) rotate(${Math.random() * 720}deg); }
            }
        `;
        document.head.appendChild(style);
        
        confetti.style.animation = `${animationName} ${Math.random() * 2 + 1}s ease forwards`;
        
        container.appendChild(confetti);
    }
} 