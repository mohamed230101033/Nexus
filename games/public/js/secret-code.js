// Secret Code Game - Interactive Elements

document.addEventListener('DOMContentLoaded', function() {
    // Sound effects
    const hoverSound = new Audio('/sounds/button-click.mp3');
    const successSound = new Audio('/sounds/good-character.mp3');
    const errorSound = new Audio('/sounds/evil-character.mp3');
    const popSound = new Audio('/sounds/pop.mp3');
    
    // Adjust sound volumes
    hoverSound.volume = 0.2;
    successSound.volume = 0.3;
    errorSound.volume = 0.3;
    popSound.volume = 0.2;
    
    // Create a new hover sound effect
    const createHoverSound = () => {
        const oscillator = new (window.AudioContext || window.webkitAudioContext)();
        const osc = oscillator.createOscillator();
        const gain = oscillator.createGain();
        
        osc.connect(gain);
        gain.connect(oscillator.destination);
        
        osc.type = 'sine';
        osc.frequency.value = 440;
        gain.gain.value = 0.1;
        
        osc.start();
        setTimeout(() => {
            osc.stop();
        }, 100);
    };
    
    // Add sound effects to interactive elements
    function addSoundEffects() {
        // Add hover sound effects to all code cards
        document.querySelectorAll('.code-card, .code-button').forEach(element => {
            element.addEventListener('mouseenter', function() {
                hoverSound.currentTime = 0;
                hoverSound.play().catch(e => console.log('Audio play error:', e));
            });
        });
        
        // Add click sound effects to buttons
        document.querySelectorAll('.code-button').forEach(button => {
            button.addEventListener('click', function() {
                popSound.currentTime = 0;
                popSound.play().catch(e => console.log('Audio play error:', e));
            });
        });
        
        // Add hover sound effects to any element with the sound-hover class
        document.querySelectorAll('.sound-hover').forEach(element => {
            element.addEventListener('mouseenter', function() {
                hoverSound.currentTime = 0;
                hoverSound.play().catch(e => console.log('Audio play error:', e));
            });
        });
    }
    
    // Matrix text effect
    function setupMatrixEffect() {
        const matrixElements = document.querySelectorAll('.matrix-text');
        
        matrixElements.forEach(element => {
            const originalText = element.textContent;
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+{}:"<>?|[];\',./`~';
            
            element.addEventListener('mouseenter', function() {
                let iterations = 0;
                const interval = setInterval(() => {
                    element.textContent = originalText
                        .split('')
                        .map((letter, index) => {
                            if (index < iterations) {
                                return originalText[index];
                            }
                            return characters[Math.floor(Math.random() * characters.length)];
                        })
                        .join('');
                    
                    if (iterations >= originalText.length) {
                        clearInterval(interval);
                    }
                    
                    iterations += 1 / 3;
                }, 30);
            });
        });
    }
    
    // Typewriter effect
    function setupTypewriter() {
        const typeElements = document.querySelectorAll('.typewriter');
        
        typeElements.forEach(element => {
            const text = element.textContent;
            element.textContent = '';
            
            let i = 0;
            const typeInterval = setInterval(() => {
                if (i < text.length) {
                    element.textContent += text.charAt(i);
                    i++;
                } else {
                    clearInterval(typeInterval);
                    element.classList.add('code-cursor');
                }
            }, 50);
        });
    }
    
    // Cipher decoder effect
    function setupCipherDecoder() {
        const cipherElements = document.querySelectorAll('.cipher-text');
        
        cipherElements.forEach(element => {
            const originalText = element.textContent;
            const decodedText = element.getAttribute('data-decoded') || originalText;
            
            element.addEventListener('click', function() {
                const isDecoded = element.classList.contains('decoded');
                
                if (!isDecoded) {
                    // Decode animation
                    let iterations = 0;
                    const interval = setInterval(() => {
                        element.textContent = originalText
                            .split('')
                            .map((letter, index) => {
                                if (index < iterations) {
                                    return decodedText[index];
                                }
                                return String.fromCharCode(Math.floor(Math.random() * 93) + 33);
                            })
                            .join('');
                        
                        if (iterations >= originalText.length) {
                            clearInterval(interval);
                            element.textContent = decodedText;
                            element.classList.add('decoded');
                            successSound.currentTime = 0;
                            successSound.play().catch(e => console.log('Audio play error:', e));
                        }
                        
                        iterations += 1 / 3;
                    }, 30);
                } else {
                    // Encode animation
                    let iterations = 0;
                    const interval = setInterval(() => {
                        element.textContent = decodedText
                            .split('')
                            .map((letter, index) => {
                                if (index < iterations) {
                                    return originalText[index];
                                }
                                return String.fromCharCode(Math.floor(Math.random() * 93) + 33);
                            })
                            .join('');
                        
                        if (iterations >= decodedText.length) {
                            clearInterval(interval);
                            element.textContent = originalText;
                            element.classList.remove('decoded');
                            popSound.currentTime = 0;
                            popSound.play().catch(e => console.log('Audio play error:', e));
                        }
                        
                        iterations += 1 / 3;
                    }, 30);
                }
            });
        });
    }
    
    // Animated background code rain effect
    function setupCodeRain() {
        const codeRainCanvas = document.getElementById('code-rain-canvas');
        if (!codeRainCanvas) return;
        
        const ctx = codeRainCanvas.getContext('2d');
        codeRainCanvas.width = window.innerWidth;
        codeRainCanvas.height = window.innerHeight;
        
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+{}:"<>?|[];\',./`~';
        const fontSize = 14;
        const columns = codeRainCanvas.width / fontSize;
        
        const drops = [];
        for (let i = 0; i < columns; i++) {
            drops[i] = 1;
        }
        
        function draw() {
            ctx.fillStyle = 'rgba(15, 23, 42, 0.05)';
            ctx.fillRect(0, 0, codeRainCanvas.width, codeRainCanvas.height);
            
            ctx.fillStyle = '#10b981';
            ctx.font = fontSize + 'px monospace';
            
            for (let i = 0; i < drops.length; i++) {
                const text = characters.charAt(Math.floor(Math.random() * characters.length));
                ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                
                if (drops[i] * fontSize > codeRainCanvas.height && Math.random() > 0.975) {
                    drops[i] = 0;
                }
                
                drops[i]++;
            }
        }
        
        setInterval(draw, 33);
    }
    
    // Handle level completion animations
    function setupLevelCompletion() {
        const completeButton = document.getElementById('complete-level');
        if (!completeButton) return;
        
        completeButton.addEventListener('click', function() {
            const confetti = document.createElement('div');
            confetti.classList.add('confetti-container');
            document.body.appendChild(confetti);
            
            for (let i = 0; i < 100; i++) {
                const particle = document.createElement('div');
                particle.classList.add('confetti');
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.animationDuration = (Math.random() * 3 + 2) + 's';
                particle.style.backgroundColor = `hsl(${Math.random() * 360}, 100%, 50%)`;
                confetti.appendChild(particle);
            }
            
            successSound.currentTime = 0;
            successSound.play().catch(e => console.log('Audio play error:', e));
            
            setTimeout(() => {
                document.body.removeChild(confetti);
            }, 5000);
        });
    }
    
    // Initialize all interactive elements
    function init() {
        addSoundEffects();
        setupMatrixEffect();
        setupTypewriter();
        setupCipherDecoder();
        setupCodeRain();
        setupLevelCompletion();
    }
    
    // Start initialization
    init();
}); 