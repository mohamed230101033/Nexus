// Child-friendly Navigation and Footer Animations

document.addEventListener('DOMContentLoaded', function() {
    initializeEmojiBubbles();
    initializeNavbarAnimations();
    initializeCharacterInteraction();
    initializeHoverSounds();
});

// Create random emoji bubbles in the navbar
function initializeEmojiBubbles() {
    const navbar = document.querySelector('.child-navbar');
    if (!navbar) return;
    
    
    // Create 5 random emoji bubbles
    for (let i = 0; i < 5; i++) {
        createEmojiBubble(navbar, emojis);
    }
    
    // Add new bubbles occasionally
    setInterval(() => {
        const bubbles = document.querySelectorAll('.emoji-bubble');
        if (bubbles.length < 8) {
            createEmojiBubble(navbar, emojis);
        }
    }, 3000);
}

function createEmojiBubble(navbar, emojis) {
    const bubble = document.createElement('div');
    bubble.className = 'emoji-bubble';
    
    // Random emoji
    const emoji = emojis[Math.floor(Math.random() * emojis.length)];
    bubble.textContent = emoji;
    
    // Random position within the navbar
    const navbarWidth = navbar.offsetWidth;
    const navbarHeight = navbar.offsetHeight;
    const left = 20 + Math.random() * (navbarWidth - 60);
    const top = Math.random() * navbarHeight;
    
    bubble.style.left = `${left}px`;
    bubble.style.top = `${top}px`;
    
    // Random animation delay
    bubble.style.animationDelay = `${Math.random() * 2}s`;
    
    navbar.appendChild(bubble);
    
    // Remove bubble after some time
    setTimeout(() => {
        bubble.classList.add('pop-animation');
        setTimeout(() => {
            bubble.remove();
        }, 500);
    }, 5000 + Math.random() * 5000);
}

// Add animations to navbar elements
function initializeNavbarAnimations() {
    // Animate navigation links with staggered delay
    const navLinks = document.querySelectorAll('.nav-menu .nav-link');
    navLinks.forEach((link, index) => {
        link.classList.add('slide-in-animation');
        link.style.animationDelay = `${0.1 * index}s`;
    });
    
    // Add interactive eyes to the shield logo
    const logoContainer = document.querySelector('.navbar-logo');
    if (logoContainer) {
        const eyesContainer = document.createElement('div');
        eyesContainer.className = 'shield-logo-eyes';
        
        const leftEye = document.createElement('div');
        leftEye.className = 'shield-logo-eye';
        
        const rightEye = document.createElement('div');
        rightEye.className = 'shield-logo-eye';
        
        eyesContainer.appendChild(leftEye);
        eyesContainer.appendChild(rightEye);
        
        const container = document.createElement('div');
        container.className = 'shield-logo-container';
        container.appendChild(logoContainer.querySelector('img').cloneNode(true));
        container.appendChild(eyesContainer);
        
        logoContainer.innerHTML = '';
        logoContainer.appendChild(container);
        
        // Make eyes follow cursor
        document.addEventListener('mousemove', function(e) {
            const eyes = document.querySelectorAll('.shield-logo-eye');
            eyes.forEach(eye => {
                const rect = eye.getBoundingClientRect();
                const x = (rect.left + rect.width / 2) - e.clientX;
                const y = (rect.top + rect.height / 2) - e.clientY;
                const angle = Math.atan2(y, x);
                
                const distance = Math.min(1, Math.sqrt(x*x + y*y) / 100);
                const eyeX = Math.cos(angle) * distance * -1;
                const eyeY = Math.sin(angle) * distance * -1;
                
                eye.style.transform = `translate(${eyeX}px, ${eyeY}px)`;
            });
        });
    }
}

// Add character and interactions to the footer
function initializeCharacterInteraction() {
    const footer = document.querySelector('.child-footer');
    if (!footer) return;

    // Create a wave effect at the top of the footer
    const wave = document.createElement('div');
    wave.className = 'footer-wave';
    footer.appendChild(wave);
    
    // Add cartoon character to footer
    const characterContainer = document.createElement('div');
    characterContainer.className = 'footer-character-container';
    
    const character = document.createElement('div');
    character.className = 'footer-character';
    character.innerHTML = `
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <!-- Simple robot character -->
            <rect x="25" y="30" width="50" height="45" rx="5" fill="#59c9ff" />
            <circle cx="40" cy="45" r="5" fill="white" />
            <circle cx="40" cy="45" r="2" fill="#333" class="robot-eye" />
            <circle cx="60" cy="45" r="5" fill="white" />
            <circle cx="60" cy="45" r="2" fill="#333" class="robot-eye" />
            <rect x="40" y="60" width="20" height="5" rx="2" fill="white" />
            <rect x="35" y="75" width="10" height="15" fill="#59c9ff" />
            <rect x="55" y="75" width="10" height="15" fill="#59c9ff" />
            <circle cx="50" cy="20" r="10" fill="#ffde59" />
            <rect x="45" y="10" width="10" height="5" fill="#ffde59" />
        </svg>
    `;
    
    // Add speech bubble with random tips
    const speechBubble = document.createElement('div');
    speechBubble.className = 'character-speech';
    
    const tips = [
        "Remember to keep your passwords safe! 🔒",
        "Don't share personal info with strangers online! 🕵️",
        "Ask a grown-up if you're not sure about something online! 👨‍👩‍👧‍👦",
        "Stay cyber safe and have fun! 🚀",
        "Think before you click! 🖱️"
    ];
    
    speechBubble.textContent = tips[Math.floor(Math.random() * tips.length)];
    
    characterContainer.appendChild(character);
    characterContainer.appendChild(speechBubble);
    footer.appendChild(characterContainer);
    
    // Make robot eyes follow cursor
    document.addEventListener('mousemove', function(e) {
        const eyes = document.querySelectorAll('.robot-eye');
        eyes.forEach(eye => {
            const rect = eye.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            
            const dx = e.clientX - centerX;
            const dy = e.clientY - centerY;
            const distance = Math.min(1, Math.sqrt(dx*dx + dy*dy) / 100);
            
            const angle = Math.atan2(dy, dx);
            const maxMove = 1.5;
            
            const moveX = Math.cos(angle) * distance * maxMove;
            const moveY = Math.sin(angle) * distance * maxMove;
            
            eye.style.transform = `translate(${moveX}px, ${moveY}px)`;
        });
    });
    
    // Change tip on character click
    character.addEventListener('click', function() {
        const newTip = tips[Math.floor(Math.random() * tips.length)];
        speechBubble.textContent = newTip;
        speechBubble.style.opacity = '1';
        speechBubble.style.transform = 'translateY(0)';
        
        // Play a pop sound
        playSound('pop');
        
        // Hide the speech bubble after 5 seconds
        setTimeout(() => {
            speechBubble.style.opacity = '0';
            speechBubble.style.transform = 'translateY(10px)';
        }, 5000);
    });
}

// Add sound effects on hover
function initializeHoverSounds() {
    // Sound effects for different elements
    const soundMap = {
        '.nav-link': 'boop',
        '.social-icon': 'pop',
        '.navbar-logo': 'boing'
    };
    
    Object.keys(soundMap).forEach(selector => {
        const elements = document.querySelectorAll(selector);
        elements.forEach(element => {
            element.addEventListener('mouseenter', () => {
                playSound(soundMap[selector]);
            });
        });
    });
}

// Play sound effects
function playSound(sound) {
    // Check if Web Audio API is supported
    if (window.AudioContext || window.webkitAudioContext) {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        
        // Create oscillator
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        // Set sound properties based on type
        switch(sound) {
            case 'boop':
                oscillator.type = 'sine';
                oscillator.frequency.setValueAtTime(440, audioContext.currentTime);
                oscillator.frequency.exponentialRampToValueAtTime(
                    880, audioContext.currentTime + 0.1
                );
                gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(
                    0.01, audioContext.currentTime + 0.2
                );
                oscillator.start();
                oscillator.stop(audioContext.currentTime + 0.2);
                break;
                
            case 'pop':
                oscillator.type = 'sine';
                oscillator.frequency.setValueAtTime(660, audioContext.currentTime);
                oscillator.frequency.exponentialRampToValueAtTime(
                    440, audioContext.currentTime + 0.05
                );
                gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(
                    0.01, audioContext.currentTime + 0.1
                );
                oscillator.start();
                oscillator.stop(audioContext.currentTime + 0.1);
                break;
                
            case 'boing':
                oscillator.type = 'triangle';
                oscillator.frequency.setValueAtTime(220, audioContext.currentTime);
                oscillator.frequency.exponentialRampToValueAtTime(
                    660, audioContext.currentTime + 0.1
                );
                oscillator.frequency.exponentialRampToValueAtTime(
                    220, audioContext.currentTime + 0.3
                );
                gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(
                    0.01, audioContext.currentTime + 0.3
                );
                oscillator.start();
                oscillator.stop(audioContext.currentTime + 0.3);
                break;
        }
    }
}

// Preload the common Web Audio sounds to avoid initial delay
function preloadSounds() {
    if (window.AudioContext || window.webkitAudioContext) {
        setTimeout(() => {
            ['boop', 'pop', 'boing'].forEach(sound => {
                playSound(sound);
            });
        }, 1000);
    }
} 