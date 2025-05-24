@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-primary-600 to-primary-900 min-h-screen py-8 text-white relative overflow-hidden">
    <!-- Animated background elements -->
    <div class="absolute inset-0 z-0">
        <div class="stars"></div>
        <div class="twinkling"></div>
        <div class="clouds"></div>
    </div>
    
    <!-- Floating bubbles -->
    <div class="bubble animate__animated animate__fadeIn" style="width: 80px; height: 80px; left: 10%; top: 10%; animation-delay: 0s;"></div>
    <div class="bubble animate__animated animate__fadeIn" style="width: 50px; height: 50px; left: 20%; top: 40%; animation-delay: 1s;"></div>
    <div class="bubble animate__animated animate__fadeIn" style="width: 70px; height: 70px; left: 80%; top: 15%; animation-delay: 2s;"></div>
    <div class="bubble animate__animated animate__fadeIn" style="width: 40px; height: 40px; left: 70%; top: 70%; animation-delay: 3s;"></div>
    <div class="bubble animate__animated animate__fadeIn" style="width: 60px; height: 60px; left: 30%; top: 80%; animation-delay: 4s;"></div>
    
    <div class="container mx-auto px-4 max-w-4xl relative z-10">
        <!-- Welcome banner -->
        <div class="text-center mb-8 animate__animated animate__bounceIn">
            <h1 class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-300 font-game">
                Welcome, {{ $player_name }}!
            </h1>
            <p class="text-xl text-white/80 mt-2">Your cybersecurity adventure is about to begin!</p>
        </div>
        
        <!-- Main content area -->
        <div class="game-card bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-xl mb-8">
            <!-- Character interaction area -->
            <div id="character-interaction" class="min-h-[400px] relative">
                <!-- Good Character (Circuit) - initially hidden below the screen -->
                <div id="good-character" class="absolute left-0 bottom-0 w-1/3 md:w-1/4 transform transition-all duration-1000 translate-y-full opacity-0">
                    <img src="{{ asset('images/circuit-robot.svg') }}" alt="Circuit - Good Robot" class="w-full h-auto drop-shadow-lg">
                </div>
                
                <!-- Evil Character (Captain Clickbait) - initially hidden -->
                <div id="evil-character" class="absolute right-0 bottom-0 w-1/3 md:w-1/4 transform transition-all duration-1000 translate-y-full opacity-0">
                    <img src="{{ asset('images/clickbait-robot.svg') }}" alt="Captain Clickbait - Evil Robot" class="w-full h-auto drop-shadow-lg">
                </div>
                
                <!-- Dialogue box -->
                <div id="dialogue-box" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-full md:w-3/4 bg-black/70 backdrop-blur-sm border border-white/20 p-4 rounded-xl shadow-lg">
                    <div class="flex items-start">
                        <div id="speaker-icon" class="flex-shrink-0 w-10 h-10 mr-3 bg-blue-500 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p id="speaker-name" class="text-lg font-game text-blue-300">Narrator</p>
                            <p id="dialogue-text" class="text-white">Welcome to your cybersecurity adventure! Let's meet your guide...</p>
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <button id="next-dialogue" class="px-4 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-full text-sm font-semibold transition-colors">
                            Next →
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Continue button (initially hidden) -->
        <div id="continue-button" class="text-center mt-8 opacity-0 pointer-events-none transition-all duration-500">
            <a href="{{ route('game.story') }}" class="inline-block px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-game text-xl rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 animate__animated animate__pulse animate__infinite animate__slow">
                <span class="flex items-center">
                    <span>Start Your Adventure</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                    </svg>
                </span>
            </a>
        </div>
    </div>
</div>

<!-- Audio elements for sound effects -->
<audio id="pop-sound" src="{{ asset('sounds/pop.mp3') }}" preload="auto"></audio>
<audio id="button-click" src="{{ asset('sounds/button-click.mp3') }}" preload="auto"></audio>
<audio id="background-music" src="{{ asset('sounds/background-music.mp3') }}" loop preload="auto"></audio>

<!-- Good Character (Circuit) Audio Files -->
<audio id="circuit-intro" src="{{ asset('Sounds1/good guy/Hello! I\'m Circuit, your friendly guide to the digital world! I\'m here to help you learn about cybersecurity and staying safe online..mp3') }}" preload="auto"></audio>
<audio id="circuit-explain-game" src="{{ asset('Sounds1/good guy/In this game, you\'ll learn how to spot fake emails, create strong passwords, and protect your personal information from digital tricksters..mp3') }}" preload="auto"></audio>
<audio id="circuit-badges" src="{{ asset('Sounds1/good guy/You\'ll earn badges and build your Cyber Shield as you master new skills through fun challenges and missions!.mp3') }}" preload="auto"></audio>
<audio id="circuit-warning" src="{{ asset('Sounds1/good guy/But wait! I should warn you about someone... There\'s a troublemaker who might try to trick you during your journey....mp3') }}" preload="auto"></audio>
<audio id="circuit-reassurance" src="{{ asset('Sounds1/good guy/Don\'t listen to him! Captain Clickbait tries to scare people, but with the right knowledge, you can easily defeat his tricks..mp3') }}" preload="auto"></audio>
<audio id="circuit-together" src="{{ asset('Sounds1/good guy/together we\'ll learn how to spot Captain Clickbait\'s tricks and keep your information safe.mp3') }}" preload="auto"></audio>
<audio id="circuit-adventure" src="{{ asset('Sounds1/good guy/Don\'t worry about him. Let\'s start our adventure and show Captain Clickbait that you can\'t be fooled! Click the button below to begin!.mp3') }}" preload="auto"></audio>

<!-- Narrator Audio Files -->
<audio id="narrator-welcome" src="{{ asset('Sounds1/good guy/Welcome to your cybersecurity adventure! Let\'s meet your guide....mp3') }}" preload="auto"></audio>
<audio id="narrator-circuit" src="{{ asset('Sounds1/good guy/Here comes Circuit, your friendly AI assistant!.mp3') }}" preload="auto"></audio>

<!-- Evil Character (Captain Clickbait) Audio Files -->
<audio id="clickbait-laugh" src="{{ asset('Sounds1/bad guy/Hahaha! Did someone mention me.mp3') }}" preload="auto"></audio>
<audio id="clickbait-victim" src="{{ asset('Sounds1/bad guy/Well, well, well! Look who\'s here! A new victim—I mean, VISITOR! Hahaha!.mp3') }}" preload="auto"></audio>
<audio id="clickbait-intro" src="{{ asset('Sounds1/bad guy/I am the GREAT Captain Clickbait! Master of trickery and king of cyber mischief!.mp3') }}" preload="auto"></audio>
<audio id="clickbait-hack" src="{{ asset('Sounds1/bad guy/I will hack you! I will trick you! I will make you click on ALL my fake links! Muahaha!.mp3') }}" preload="auto"></audio>
<audio id="clickbait-plans" src="{{ asset('Sounds1/bad guy/Oh please! This little human doesn\'t stand a chance against my super-duper evil plans! I\'ll steal all your passwords and send weird messages to your friends!.mp3') }}" preload="auto"></audio>
<audio id="clickbait-best" src="{{ asset('Sounds1/bad guy/Bah! You\'ll never beat me! I\'m the best trickster in the whole cyber world! I\'ll be watching you.mp3') }}" preload="auto"></audio>

<!-- Add Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- Dialogue script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dialogues = [
            {
                speaker: "Narrator",
                speakerClass: "text-yellow-300",
                iconBg: "bg-yellow-500",
                text: "Welcome to your cybersecurity adventure! Let's meet your guide...",
                sound: "narrator-welcome"
            },
            {
                speaker: "Narrator",
                speakerClass: "text-yellow-300",
                iconBg: "bg-yellow-500",
                text: "Here comes Circuit, your friendly AI assistant!",
                action: "showGoodCharacter",
                sound: "narrator-circuit"
            },
            {
                speaker: "Circuit",
                speakerClass: "text-blue-300",
                iconBg: "bg-blue-500",
                text: "Hello {{ $player_name }}! I'm Circuit, your friendly guide to the digital world! I'm here to help you learn about cybersecurity and staying safe online.",
                sound: "circuit-intro"
            },
            {
                speaker: "Circuit",
                speakerClass: "text-blue-300",
                iconBg: "bg-blue-500",
                text: "In this game, you'll learn how to spot fake emails, create strong passwords, and protect your personal information from digital tricksters.",
                sound: "circuit-explain-game"
            },
            {
                speaker: "Circuit",
                speakerClass: "text-blue-300",
                iconBg: "bg-blue-500",
                text: "You'll earn badges and build your Cyber Shield as you master new skills through fun challenges and missions!",
                sound: "circuit-badges"
            },
            {
                speaker: "Circuit",
                speakerClass: "text-blue-300",
                iconBg: "bg-blue-500",
                text: "But wait! I should warn you about someone... There's a troublemaker who might try to trick you during your journey...",
                sound: "circuit-warning"
            },
            {
                speaker: "???",
                speakerClass: "text-red-300",
                iconBg: "bg-red-500",
                text: "Hahaha! Did someone mention me?",
                action: "showEvilCharacter",
                sound: "clickbait-laugh"
            },
            {
                speaker: "Captain Clickbait",
                speakerClass: "text-red-300",
                iconBg: "bg-red-500",
                text: "Well, well, well! Look who's here! A new victim—I mean, VISITOR! Hahaha!",
                sound: "clickbait-victim"
            },
            {
                speaker: "Captain Clickbait",
                speakerClass: "text-red-300",
                iconBg: "bg-red-500",
                text: "I am the GREAT Captain Clickbait! Master of trickery and king of cyber mischief!",
                sound: "clickbait-intro"
            },
            {
                speaker: "Captain Clickbait",
                speakerClass: "text-red-300",
                iconBg: "bg-red-500",
                text: "I will hack you! I will trick you! I will make you click on ALL my fake links! Muahaha!",
                sound: "clickbait-hack"
            },
            {
                speaker: "Circuit",
                speakerClass: "text-blue-300",
                iconBg: "bg-blue-500",
                text: "Don't listen to him, {{ $player_name }}! Captain Clickbait tries to scare people, but with the right knowledge, you can easily defeat his tricks.",
                sound: "circuit-reassurance"
            },
            {
                speaker: "Captain Clickbait",
                speakerClass: "text-red-300",
                iconBg: "bg-red-500",
                text: "Oh please! This little human doesn't stand a chance against my super-duper evil plans! I'll steal all your passwords and send weird messages to your friends!",
                sound: "clickbait-plans"
            },
            {
                speaker: "Circuit",
                speakerClass: "text-blue-300",
                iconBg: "bg-blue-500",
                text: "{{ $player_name }}, together we'll learn how to spot Captain Clickbait's tricks and keep your information safe. Are you ready to begin your training?",
                sound: "circuit-together"
            },
            {
                speaker: "Captain Clickbait",
                speakerClass: "text-red-300",
                iconBg: "bg-red-500",
                text: "Bah! You'll never beat me! I'm the best trickster in the whole cyber world! I'll be watching you, {{ $player_name }}!",
                sound: "clickbait-best"
            },
            {
                speaker: "Circuit",
                speakerClass: "text-blue-300",
                iconBg: "bg-blue-500",
                text: "Don't worry about him. Let's start our adventure and show Captain Clickbait that you can't be fooled! Click the button below to begin!",
                action: "showContinueButton",
                sound: "circuit-adventure"
            }
        ];
        
        let currentDialogue = 0;
        const speakerName = document.getElementById('speaker-name');
        const dialogueText = document.getElementById('dialogue-text');
        const speakerIcon = document.getElementById('speaker-icon');
        const nextButton = document.getElementById('next-dialogue');
        const goodCharacter = document.getElementById('good-character');
        const evilCharacter = document.getElementById('evil-character');
        const continueButton = document.getElementById('continue-button');
        
        // Audio elements
        const popSound = document.getElementById('pop-sound');
        const buttonClick = document.getElementById('button-click');
        const backgroundMusic = document.getElementById('background-music');
        
        // Variable to track if dialogue audio is currently playing
        let isDialogueAudioPlaying = false;
        
        // Function to check if an audio element is playing
        function isAudioPlaying(audioElement) {
            return audioElement && !audioElement.paused;
        }
        
        // Initial setup for first dialogue
        const firstDialogue = dialogues[0];
        speakerName.textContent = firstDialogue.speaker;
        speakerName.className = `text-lg font-game ${firstDialogue.speakerClass}`;
        dialogueText.textContent = firstDialogue.text;
        speakerIcon.className = `flex-shrink-0 w-10 h-10 mr-3 ${firstDialogue.iconBg} rounded-full flex items-center justify-center`;
        
        // Set a slight delay to play the first dialogue sound after the page loads
        setTimeout(() => {
            if (firstDialogue.sound) {
                const firstSound = document.getElementById(firstDialogue.sound);
                if (firstSound) {
                    firstSound.volume = 0.7;
                    isDialogueAudioPlaying = true;
                    firstSound.play().catch(e => console.log("Audio play failed:", e));
                    
                    // Optional: Auto-advance to next dialogue when audio ends
                    firstSound.onended = function() {
                        isDialogueAudioPlaying = false;
                        setTimeout(() => advanceDialogue(), 1000);
                    };
                }
            }
        }, 500);
        
        // Set up the dialogue system
        nextButton.addEventListener('click', function() {
            // Play button click sound
            buttonClick.volume = 0.5;
            buttonClick.play().catch(e => console.log("Audio play failed:", e));
            
            // Stop any currently playing character audio
            document.querySelectorAll('audio').forEach(audio => {
                if (audio.id !== 'background-music' && audio.id !== 'button-click') {
                    audio.pause();
                    audio.currentTime = 0;
                }
            });
            
            advanceDialogue();
        });
        
        // Start background music with low volume
        backgroundMusic.volume = 0.1;
        
        // Add click event listeners to characters for interactivity
        goodCharacter.addEventListener('click', function() {
            // Only respond to clicks if the character is visible and no dialogue audio is playing
            if (goodCharacter.style.opacity !== '0' && !isDialogueAudioPlaying) {
                goodCharacter.classList.add('animate__animated', 'animate__bounce');
                
                // Stop any character audio first
                document.querySelectorAll('audio').forEach(audio => {
                    if (audio.id !== 'background-music' && audio.id !== 'button-click') {
                        audio.pause();
                        audio.currentTime = 0;
                    }
                });
                
                // Determine which Circuit audio to play based on current dialogue
                let audioId;
                const currentSpeaker = dialogues[currentDialogue]?.speaker;
                
                if (currentSpeaker === "Circuit") {
                    audioId = dialogues[currentDialogue]?.sound;
                } else {
                    // Default audio if not at a Circuit dialogue
                    audioId = "circuit-intro";
                }
                
                const audioElement = document.getElementById(audioId);
                if (audioElement) {
                    audioElement.volume = 0.7;
                    isDialogueAudioPlaying = true;
                    
                    audioElement.play().catch(e => console.log("Audio play failed:", e));
                    
                    audioElement.onended = function() {
                        isDialogueAudioPlaying = false;
                    };
                }
                
                setTimeout(() => {
                    goodCharacter.classList.remove('animate__animated', 'animate__bounce');
                }, 1000);
            }
        });
        
        evilCharacter.addEventListener('click', function() {
            // Only respond to clicks if the character is visible and no dialogue audio is playing
            if (evilCharacter.style.opacity !== '0' && !isDialogueAudioPlaying) {
                evilCharacter.classList.add('animate__animated', 'animate__shakeX');
                
                // Stop any character audio first
                document.querySelectorAll('audio').forEach(audio => {
                    if (audio.id !== 'background-music' && audio.id !== 'button-click') {
                        audio.pause();
                        audio.currentTime = 0;
                    }
                });
                
                // Determine which Clickbait audio to play based on current dialogue
                let audioId;
                const currentSpeaker = dialogues[currentDialogue]?.speaker;
                
                if (currentSpeaker === "Captain Clickbait" || currentSpeaker === "???") {
                    audioId = dialogues[currentDialogue]?.sound;
                } else {
                    // Default audio if not at a Clickbait dialogue
                    audioId = "clickbait-laugh";
                }
                
                const audioElement = document.getElementById(audioId);
                if (audioElement) {
                    audioElement.volume = 0.7;
                    isDialogueAudioPlaying = true;
                    
                    audioElement.play().catch(e => console.log("Audio play failed:", e));
                    
                    audioElement.onended = function() {
                        isDialogueAudioPlaying = false;
                    };
                }
                
                setTimeout(() => {
                    evilCharacter.classList.remove('animate__animated', 'animate__shakeX');
                }, 1000);
            }
        });
        
        // Ask for permission to play audio
        document.body.addEventListener('click', function() {
            if (backgroundMusic.paused) {
                backgroundMusic.volume = 0.1; // Lower background music volume
                backgroundMusic.play().catch(e => console.log("Audio play failed:", e));
            }
        }, { once: true });
        
        function advanceDialogue() {
            currentDialogue++;
            
            if (currentDialogue >= dialogues.length) {
                // End of dialogue
                return;
            }
            
            const dialogue = dialogues[currentDialogue];
            
            // Update the dialogue box
            speakerName.textContent = dialogue.speaker;
            speakerName.className = `text-lg font-game ${dialogue.speakerClass}`;
            dialogueText.textContent = dialogue.text;
            speakerIcon.className = `flex-shrink-0 w-10 h-10 mr-3 ${dialogue.iconBg} rounded-full flex items-center justify-center`;
            
            // Play dialogue sound if specified
            if (dialogue.sound) {
                const sound = document.getElementById(dialogue.sound);
                if (sound) {
                    // Stop any currently playing character audio
                    document.querySelectorAll('audio').forEach(audio => {
                        if (audio.id !== 'background-music' && audio.id !== 'button-click') {
                            audio.pause();
                            audio.currentTime = 0;
                        }
                    });
                    
                    sound.volume = 0.7;
                    isDialogueAudioPlaying = true;
                    sound.play().catch(e => console.log("Audio play failed:", e));
                    
                    // Clear flag when audio ends
                    sound.onended = function() {
                        isDialogueAudioPlaying = false;
                        
                        // Only auto-advance if it's not the last dialogue that shows the continue button
                        if (!dialogue.action || dialogue.action !== "showContinueButton") {
                            setTimeout(() => {
                                // Auto-advance to next dialogue with a delay
                                nextButton.classList.add('animate__animated', 'animate__pulse');
                                setTimeout(() => {
                                    nextButton.classList.remove('animate__animated', 'animate__pulse');
                                    // Don't auto-advance at crucial character introductions
                                    const skipAutoAdvance = dialogue.action === "showGoodCharacter" || 
                                                           dialogue.action === "showEvilCharacter";
                                    if (!skipAutoAdvance) {
                                        advanceDialogue();
                                    }
                                }, 500);
                            }, 1500);
                        }
                    };
                }
            } else {
                // Play default pop sound
                popSound.volume = 0.3;
                popSound.play().catch(e => console.log("Audio play failed:", e));
            }
            
            // Handle any special actions
            if (dialogue.action === "showGoodCharacter") {
                showGoodCharacter();
            } else if (dialogue.action === "showEvilCharacter") {
                showEvilCharacter();
            } else if (dialogue.action === "showContinueButton") {
                showContinueButton();
            }
            
            // Animate the dialogue text
            dialogueText.classList.add('animate__animated', 'animate__fadeIn');
            setTimeout(() => {
                dialogueText.classList.remove('animate__animated', 'animate__fadeIn');
            }, 500);
        }
        
        function showGoodCharacter() {
            // Show the good character with animation from bottom
            goodCharacter.style.opacity = '1';
            goodCharacter.style.transform = 'translateY(0)';
            
            // Add additional animation class after transition
            setTimeout(() => {
                goodCharacter.classList.add('animate__animated', 'animate__bounce');
                
                setTimeout(() => {
                    goodCharacter.classList.remove('animate__animated', 'animate__bounce');
                }, 1000);
            }, 1000);
        }
        
        function showEvilCharacter() {
            // Move the good character to make room
            goodCharacter.style.left = '5%';
            
            // Show the evil character with animation from bottom
            evilCharacter.style.opacity = '1';
            evilCharacter.style.transform = 'translateY(0)';
            
            // Add additional animation after transition
            setTimeout(() => {
                evilCharacter.classList.add('animate__animated', 'animate__headShake');
                
                setTimeout(() => {
                    evilCharacter.classList.remove('animate__animated', 'animate__headShake');
                }, 1000);
            }, 1000);
        }
        
        function showContinueButton() {
            // Show the continue button
            continueButton.style.opacity = '1';
            continueButton.style.pointerEvents = 'auto';
            continueButton.classList.add('animate__animated', 'animate__fadeInUp');
            
            // Add a little wiggle to the evil character
            evilCharacter.classList.add('animate__animated', 'animate__shakeX');
            setTimeout(() => {
                evilCharacter.classList.remove('animate__animated', 'animate__shakeX');
            }, 1000);
        }
    });
</script>

<style>
    /* Add custom styles for the dialogue system */
    .bubble {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 8s ease-in-out infinite;
        z-index: 1;
    }
    
    @keyframes float {
        0% { transform: translateY(0) rotate(0); }
        50% { transform: translateY(-20px) rotate(180deg); }
        100% { transform: translateY(0) rotate(360deg); }
    }
    
    /* Star background animation */
    .stars, .twinkling, .clouds {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        display: block;
    }

    .stars {
        background: #000 url('https://i.imgur.com/YKY28eT.png') repeat top center;
        z-index: 0;
    }

    .twinkling {
        background: transparent url('https://i.imgur.com/XYMF4ca.png') repeat top center;
        z-index: 1;
        animation: move-twink-back 200s linear infinite;
    }

    .clouds {
        background: transparent url('https://i.imgur.com/mHbScrQ.png') repeat top center;
        z-index: 2;
        opacity: .4;
        animation: move-clouds-back 150s linear infinite;
    }

    @keyframes move-twink-back {
        from {background-position: 0 0;}
        to {background-position: -10000px 5000px;}
    }

    @keyframes move-clouds-back {
        from {background-position: 0 0;}
        to {background-position: 10000px 0;}
    }
    
    /* Make characters interactive */
    #good-character, #evil-character {
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    #good-character:hover, #evil-character:hover {
        transform: translateY(-5px) scale(1.05);
    }
</style>
@endsection 
