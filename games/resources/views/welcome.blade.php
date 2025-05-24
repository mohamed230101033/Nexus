<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mind Your Click - Cybersecurity Game for Kids</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                50: '#f0f9ff',
                                100: '#e0f2fe',
                                200: '#bae6fd',
                                300: '#7dd3fc',
                                400: '#38bdf8',
                                500: '#0ea5e9',
                                600: '#0284c7',
                                700: '#0369a1',
                                800: '#075985',
                                900: '#0c4a6e',
                                950: '#082f49',
                            },
                            secondary: {
                                50: '#fdf4ff',
                                100: '#fae8ff',
                                200: '#f5d0fe',
                                300: '#f0abfc',
                                400: '#e879f9',
                                500: '#d946ef',
                                600: '#c026d3',
                                700: '#a21caf',
                                800: '#86198f',
                                900: '#701a75',
                                950: '#4a044e',
                            },
                            danger: {
                                50: '#fef2f2',
                                100: '#fee2e2',
                                200: '#fecaca',
                                300: '#fca5a5',
                                400: '#f87171',
                                500: '#ef4444',
                                600: '#dc2626',
                                700: '#b91c1c',
                                800: '#991b1b',
                                900: '#7f1d1d',
                                950: '#450a0a',
                            },
                            success: {
                                50: '#f0fdf4',
                                100: '#dcfce7',
                                200: '#bbf7d0',
                                300: '#86efac',
                                400: '#4ade80',
                                500: '#22c55e',
                                600: '#16a34a',
                                700: '#15803d',
                                800: '#166534',
                                900: '#14532d',
                                950: '#052e16',
                            },
                        }
                    }
                }
            }
        </script>
        
        <style>
            /* Main Theme Colors */
            :root {
                --code-primary: #0f172a;
                --code-secondary: #1e293b;
                --code-accent: #10b981;
                --code-accent-alt: #38bdf8;
                --code-accent-purple: #a21caf;
                --code-accent-glow: rgba(16, 185, 129, 0.3);
                --code-text: #e2e8f0;
                --code-highlight: #f59e0b;
            }
            
            body {
                font-family: 'Nunito', sans-serif;
                background-color: var(--code-primary);
                color: var(--code-text);
                overflow-x: hidden;
            }
            
            /* Hero panel with code theme */
            .hero-panel {
                background: linear-gradient(135deg, var(--code-secondary) 0%, var(--code-primary) 100%);
                border-radius: 12px;
                border: 1px solid rgba(16, 185, 129, 0.2);
                box-shadow: 0 0 15px rgba(16, 185, 129, 0.3);
                position: relative;
                overflow: hidden;
                z-index: 10;
                transition: all 0.3s ease;
            }
            
            .hero-panel:hover {
                box-shadow: 0 0 20px rgba(16, 185, 129, 0.4), 0 0 40px rgba(56, 189, 248, 0.2);
            }
            
            .hero-panel::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--code-accent-alt), var(--code-accent-purple), var(--code-accent));
                background-size: 500% 500%;
                animation: navBorder 10s ease infinite;
                z-index: 5;
            }
            
            @keyframes navBorder {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            /* Digital world background elements */
            .digital-item {
                position: absolute;
                z-index: 1;
                filter: drop-shadow(0 0 8px rgba(16, 185, 129, 0.4));
                animation: float 6s ease-in-out infinite;
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(5deg); }
            }
            
            /* Typing animation cursor */
            .typing::after {
                content: '|';
                animation: cursor 1s infinite step-end;
            }
            
            @keyframes cursor {
                0%, 100% { opacity: 1; }
                50% { opacity: 0; }
            }
            
            /* Button styles */
            .hero-button {
                background: linear-gradient(to right, var(--code-accent), var(--code-accent-alt));
                color: white;
                font-weight: 600;
                padding: 0.75rem 1.5rem;
                border-radius: 8px;
                box-shadow: 0 8px 15px rgba(16, 185, 129, 0.3);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
                font-size: 1.1rem;
                transform-style: preserve-3d;
                transform: perspective(1000px);
            }
            
            .hero-button:hover {
                transform: translateY(-5px) scale(1.05);
                box-shadow: 0 12px 20px rgba(16, 185, 129, 0.4);
            }
            
            .hero-button:active {
                transform: translateY(2px);
            }
            
            .hero-button::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.2), transparent);
                transition: all 0.5s ease;
                z-index: -1;
            }
            
            .hero-button:hover::before {
                left: 100%;
            }
            
            /* Input field styling */
            .hero-input {
                background-color: rgba(15, 23, 42, 0.6);
                border: 2px solid rgba(16, 185, 129, 0.3);
                border-radius: 8px;
                padding: 0.75rem 1.5rem;
                font-size: 1.1rem;
                font-weight: 500;
                color: var(--code-text);
                transition: all 0.3s ease;
                width: 100%;
                text-align: center;
                box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            
            .hero-input:focus {
                outline: none;
                border-color: var(--code-accent);
                box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.3), inset 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            
            /* Animation classes reused from child-friendly-nav.css */
            .bounce {
                animation: bounce 2s ease infinite;
            }
            
            @keyframes bounce {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-15px); }
            }
            
            .wiggle {
                animation: wiggle 2.5s ease-in-out infinite;
            }
            
            @keyframes wiggle {
                0%, 100% { transform: rotate(0deg); }
                25% { transform: rotate(-5deg); }
                75% { transform: rotate(5deg); }
            }
            
            .spin-slow {
                animation: spin 8s linear infinite;
            }
            
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
            
            .pulse {
                animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }
            
            @keyframes pulse {
                0%, 100% { opacity: 1; transform: scale(1); }
                50% { opacity: 0.8; transform: scale(1.05); }
            }
            
            /* Loading animation */
            .loading-bar {
                height: 8px;
                border-radius: 4px;
                background: linear-gradient(90deg, var(--code-accent-alt), var(--code-accent-purple));
                width: 0%;
                animation: loadingAnim 2s ease-in-out forwards;
            }
            
            @keyframes loadingAnim {
                0% { width: 0%; }
                100% { width: 100%; }
            }
            
            /* Binary rain effect */
            .binary-rain {
                position: absolute;
                top: -20px;
                color: rgba(16, 185, 129, 0.1);
                font-family: monospace;
                font-size: 14px;
                animation: rain 10s linear infinite;
                z-index: -1;
            }
            
            @keyframes rain {
                0% { transform: translateY(-20px); }
                100% { transform: translateY(800px); }
            }
            
            /* Code scanner effect */
            .code-scanner::before {
                content: '';
                position: absolute;
                top: -100%;
                left: 0;
                width: 100%;
                height: 3px;
                background: linear-gradient(to right, transparent, var(--code-accent), transparent);
                animation: scan 3s ease-in-out infinite;
                box-shadow: 0 0 15px var(--code-accent-glow);
                z-index: 1;
            }
            
            @keyframes scan {
                0%, 100% { top: -10px; opacity: 0; }
                25%, 75% { opacity: 1; }
                50% { top: 100%; }
            }
            
            /* Matrix-like dots background */
            .matrix-dots {
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                overflow: hidden;
                z-index: -2;
            }
            
            .matrix-dot {
                position: absolute;
                width: 2px;
                height: 2px;
                background-color: rgba(16, 185, 129, 0.2);
                border-radius: 50%;
            }
        </style>
    </head>
    <body>
        <!-- Matrix-like dots background -->
        <div class="matrix-dots" id="matrix-dots"></div>
        
        <!-- Code rain canvas -->
        <canvas id="code-rain-canvas" class="fixed top-0 left-0 w-full h-full -z-10"></canvas>
        
        <!-- Digital world background elements with adjusted colors -->
        <div class="digital-item" style="top: 15%; left: 10%; animation-delay: 0s;">
            <img src="https://cdn-icons-png.flaticon.com/512/2313/2313448.png" alt="Shield" class="w-16 h-16 bounce">
        </div>
        <div class="digital-item" style="top: 70%; left: 80%; animation-delay: 1s;">
            <img src="https://cdn-icons-png.flaticon.com/512/2313/2313470.png" alt="Lock" class="w-24 h-24 wiggle">
        </div>
        <div class="digital-item" style="top: 20%; left: 85%; animation-delay: 2s;">
            <img src="https://cdn-icons-png.flaticon.com/512/2313/2313459.png" alt="Cloud" class="w-20 h-20 pulse">
        </div>
        <div class="digital-item" style="top: 75%; left: 15%; animation-delay: 1.5s;">
            <img src="https://cdn-icons-png.flaticon.com/512/2313/2313491.png" alt="Wifi" class="w-16 h-16 pulse">
        </div>
        <div class="digital-item" style="top: 40%; left: 5%; animation-delay: 0.5s;">
            <img src="https://cdn-icons-png.flaticon.com/512/2313/2313604.png" alt="Gear" class="w-14 h-14 spin-slow">
            </div>
            
        <!-- Binary rain with adjusted colors -->
        <div class="binary-rain" style="left: 10%;">10110101</div>
        <div class="binary-rain" style="left: 30%; animation-delay: 2s;">01001010</div>
        <div class="binary-rain" style="left: 60%; animation-delay: 4s;">11010010</div>
        <div class="binary-rain" style="left: 85%; animation-delay: 1s;">01101001</div>
        
        <!-- Main container -->
        <div class="min-h-screen flex items-center justify-center p-6">
            <div class="max-w-4xl w-full">
                <!-- Hero panel with code scanner effect -->
                <div class="hero-panel p-10 code-scanner">
                    <!-- Header with logo (keeping the original icon) -->
                    <div class="flex justify-center mb-8">
                <div class="relative">
                            <div class="bg-gradient-to-r from-primary-600 to-secondary-600 rounded-full w-24 h-24 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-14 h-14 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                            </div>
                            <div class="absolute -right-2 -top-2 bg-success-400 rounded-full w-10 h-10 flex items-center justify-center text-white text-xl font-bold pulse">
                                !
                            </div>
                        </div>
                    </div>
                    
                    <!-- Title with cyber code styling -->
                    <div class="text-center mb-8">
                        <h1 class="text-4xl md:text-5xl font-bold mb-2 font-game text-transparent bg-clip-text bg-gradient-to-r from-primary-400 via-secondary-400 to-success-400">
                            🛡️ Mind Your Click 🖥️
                        </h1>
                        <p class="text-xl text-cyan-100">Your First Mission Awaits!</p>
                    </div>
                    
                    <!-- Character and welcome message with code theme -->
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
                        <!-- Character -->
                        <div class="md:col-span-2 flex justify-center">
                            <div class="relative">
                                <img src="https://cdn-icons-png.flaticon.com/512/4616/4616099.png" alt="Cyber Mentor" class="w-40 h-40 wiggle">
                                <div id="speech-bubble" class="absolute -top-16 -right-8 bg-gray-900 border border-success-600 rounded-lg p-3 hidden text-success-400">
                                    <p class="text-sm font-medium">Great name! Let's go!</p>
                                    <div class="absolute bottom-0 right-6 transform translate-y-1/2 rotate-45 w-4 h-4 bg-gray-900 border-r border-b border-success-600"></div>
                    </div>
                </div>
            </div>
            
                        <!-- Welcome message with code styling -->
                        <div class="md:col-span-3">
                            <div class="bg-gray-900/50 rounded-lg p-6 border border-primary-500/30 relative">
                                <div class="absolute left-0 top-1/2 transform -translate-x-1/2 -translate-y-1/2 rotate-45 w-4 h-4 bg-gray-900/50 border-l border-b border-primary-500/30"></div>
                                <h2 id="typing-text" class="text-xl font-bold text-primary-400 typing mb-2"></h2>
                                <p id="subtitle" class="text-cyan-200"></p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Name input form with code theme -->
                    <form action="{{ route('start-game') }}" method="POST" class="space-y-6 max-w-md mx-auto">
                        @csrf
                        <div class="space-y-3">
                            <label class="block text-center text-xl font-semibold text-secondary-400">
                                🕶️ Your Secret Hero Alias:
                            </label>
                            <input type="text" name="player_name" required
                                class="hero-input"
                                placeholder="Enter your hero name..."
                                autocomplete="off">
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" id="start-button" class="hero-button">
                                🎯 Start Your First Mission! 🚀
                            </button>
                        </div>
                        
                        <!-- Loading bar (hidden initially) with code theme -->
                        <div id="loading-container" class="mt-4 hidden">
                            <p id="loading-text" class="text-sm text-center text-primary-400 mb-2">Encrypting fun...</p>
                            <div class="bg-gray-900 rounded-full overflow-hidden border border-primary-500/30">
                                <div class="loading-bar"></div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Footer note with code theme -->
                <p class="text-center text-sm text-primary-400 mt-4">
                    Protecting the internet, one click at a time! 🌐
                </p>
            </div>
        </div>
        
        <!-- Scripts -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Welcome typing animation
                const welcomeText = "👋 Hi there, young defender!";
                const subtitleText = "What's your Cyber Hero Name? We need your help to defend the internet from cyber villains!";
                const typingElement = document.getElementById('typing-text');
                const subtitleElement = document.getElementById('subtitle');
                
                // Loading messages
                const loadingMessages = [
                    "Encrypting fun...",
                    "Scanning for online villains...",
                    "Powering up shields...",
                    "Preparing cyber mission...",
                    "Activating hero powers..."
                ];
                
                // Function to simulate typing
                function typeText(element, text, i = 0, callback) {
                    if (i < text.length) {
                        element.innerHTML = text.substring(0, i + 1);
                        setTimeout(() => typeText(element, text, i + 1, callback), 50);
                    } else if (typeof callback === 'function') {
                        // Add a slight delay before starting the callback
                        setTimeout(callback, 300);
                    }
                }
                
                // Start typing the welcome text
                typeText(typingElement, welcomeText, 0, function() {
                    // When welcome text is done, type the subtitle
                    typeText(subtitleElement, subtitleText);
                    
                    // Remove the cursor from the welcome text
                    typingElement.classList.remove('typing');
                });
                
                // Focus on the input field after animation
                setTimeout(() => {
                    document.querySelector('input[name="player_name"]').focus();
                }, 2000);
                
                // Handle form submission with animation
                document.querySelector('form').addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const nameInput = document.querySelector('input[name="player_name"]');
                    
                    if (nameInput.value.trim() !== '') {
                        // Show speech bubble
                        document.getElementById('speech-bubble').classList.remove('hidden');
                        
                        // Show loading animation
                        document.getElementById('loading-container').classList.remove('hidden');
                        
                        // Cycle through loading messages
                        let messageIndex = 0;
                        const messageElement = document.getElementById('loading-text');
                        
                        const messageInterval = setInterval(() => {
                            messageIndex = (messageIndex + 1) % loadingMessages.length;
                            messageElement.textContent = loadingMessages[messageIndex];
                        }, 800);
                        
                        // Submit the form after a delay
                        setTimeout(() => {
                            clearInterval(messageInterval);
                            this.submit();
                        }, 3000);
                    }
                });
                
                // Add sound effect to button (if supported)
                const button = document.getElementById('start-button');
                
                button.addEventListener('click', function() {
                    if (window.AudioContext || window.webkitAudioContext) {
                        const AudioContext = window.AudioContext || window.webkitAudioContext;
                        const context = new AudioContext();
                        const oscillator = context.createOscillator();
                        const gainNode = context.createGain();
                        
                        oscillator.type = 'sine';
                        oscillator.frequency.value = 440;
                        gainNode.gain.setValueAtTime(0.1, context.currentTime);
                        gainNode.gain.exponentialRampToValueAtTime(0.001, context.currentTime + 0.5);
                        
                        oscillator.connect(gainNode);
                        gainNode.connect(context.destination);
                        
                        oscillator.start();
                        oscillator.stop(context.currentTime + 0.5);
                    }
                });
                
                // Create matrix-like dots
                const dotsContainer = document.getElementById('matrix-dots');
                const numDots = 100;
                
                for (let i = 0; i < numDots; i++) {
                    const dot = document.createElement('div');
                    dot.classList.add('matrix-dot');
                    dot.style.left = `${Math.random() * 100}%`;
                    dot.style.top = `${Math.random() * 100}%`;
                    dot.style.opacity = Math.random() * 0.5 + 0.1;
                    dotsContainer.appendChild(dot);
                }
                
                // Code rain animation similar to Secret Code page
                const codeRainCanvas = document.getElementById('code-rain-canvas');
                const ctx = codeRainCanvas.getContext('2d');
                
                // Set canvas dimensions
                function resizeCanvas() {
                    codeRainCanvas.width = window.innerWidth;
                    codeRainCanvas.height = window.innerHeight;
                }
                
                resizeCanvas();
                window.addEventListener('resize', resizeCanvas);
                
                // Matrix rain effect
                const fontSize = 14;
                const columns = Math.floor(codeRainCanvas.width / fontSize);
                const drops = [];
                
                // Initialize drops
                for (let i = 0; i < columns; i++) {
                    drops[i] = Math.floor(Math.random() * -100);
                }
                
                // Characters to display
                const chars = '01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲンабвгдеёжзийклмнопрстуфхцчшщъыьэюя';
                
                function draw() {
                    // Semi-transparent black to create fade effect
                    ctx.fillStyle = 'rgba(15, 23, 42, 0.05)';
                    ctx.fillRect(0, 0, codeRainCanvas.width, codeRainCanvas.height);
                    
                    // Set text color and font
                    ctx.font = `${fontSize}px monospace`;
                    
                    // Draw characters
                    for (let i = 0; i < drops.length; i++) {
                        // Random character
                        const text = chars[Math.floor(Math.random() * chars.length)];
                        
                        // Different shades of green/blue for matrix effect
                        const gradient = Math.random();
                        if (gradient < 0.33) {
                            ctx.fillStyle = 'rgba(16, 185, 129, 0.8)'; // Green
                        } else if (gradient < 0.66) {
                            ctx.fillStyle = 'rgba(56, 189, 248, 0.8)'; // Blue
                        } else {
                            ctx.fillStyle = 'rgba(162, 28, 175, 0.6)'; // Purple
                        }
                        
                        // Draw the character
                        ctx.fillText(text, i * fontSize, drops[i] * fontSize);
                        
                        // Move drops down and reset when off the screen
                        drops[i]++;
                        
                        // Random reset to create varied rain effect
                        if (drops[i] * fontSize > codeRainCanvas.height && Math.random() > 0.975) {
                            drops[i] = Math.floor(Math.random() * -20);
                        }
                    }
                }
                
                // Animation loop
                setInterval(draw, 50);
            });
        </script>
    </body>
</html>
