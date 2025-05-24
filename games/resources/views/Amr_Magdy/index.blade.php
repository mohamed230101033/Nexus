<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Time Travel - Enhanced</title>
    <!-- Include Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom CSS for starfield */
        body {
            overflow: hidden; /* Prevent scrollbars from space animation */
            height: 100vh; /* Ensure body takes full viewport height */
            margin: 0;
            background-color: #000; /* Base background color */
            font-family: sans-serif; /* Basic font */
            color: white; /* Default text color */
        }
        .space-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000 url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"><circle cx="10" cy="10" r="0.5" fill="white"/><circle cx="30" cy="70" r="0.7" fill="white"/><circle cx="80" cy="30" r="0.4" fill="white"/><circle cx="50" cy="50" r="0.6" fill="white"/><circle cx="90" cy="90" r="0.5" fill="white"/><circle cx="15" cy="85" r="0.8" fill="white"/><circle cx="70" cy="10" r="0.3" fill="white"/></svg>');
            background-size: 200px 200px;
            z-index: -1;
            animation: moveSpace 60s linear infinite;
            overflow: hidden; /* To contain fast moving objects */
        }

        @keyframes moveSpace {
            0% { background-position: 0 0; }
            100% { background-position: 0 2000px; }
        }

        .space-background.traveling {
            animation-duration: 3s;
            animation-timing-function: ease-in-out;
        }

        /* Helper class for hidden */
        .truly-hidden {
            display: none !important;
        }

        /* --- Celestial Objects --- */
        .celestial-object {
            position: absolute;
            will-change: transform, opacity; /* Performance hint */
        }

        /* Meteorite Styling */
        .meteorite {
            width: 8px;
            height: 8px;
            background: radial-gradient(circle, #b0a090, #706050); /* Rock colors */
            border-radius: 50%;
            box-shadow: -3px -3px 10px 2px rgba(255, 223, 186, 0.2); /* Dim tail */
        }
        .meteorite.m1 {
            top: 10%;
            animation: meteorite-fall-1 25s linear infinite;
            animation-delay: 0s;
        }
        .meteorite.m2 {
            top: 30%;
            width: 12px; /* Slightly larger */
            height: 12px;
            box-shadow: -5px -5px 15px 3px rgba(255, 223, 186, 0.25);
            animation: meteorite-fall-2 35s linear infinite;
            animation-delay: 5s; /* Stagger start */
        }
        .meteorite.m3 {
            top: 60%;
            width: 6px;
            height: 6px;
            box-shadow: -2px -2px 8px 1px rgba(255, 223, 186, 0.15);
            animation: meteorite-fall-1 45s linear infinite; /* Re-use animation but different duration */
            animation-delay: 12s;
        }

        @keyframes meteorite-fall-1 {
            0% { transform: translate(110vw, 0px) rotate(45deg); opacity: 0.7; } /* Start off-screen right, move towards bottom-left */
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translate(-20vw, 80vh) rotate(45deg); opacity: 0.7; } /* End off-screen bottom-left */
        }
        @keyframes meteorite-fall-2 {
            0% { transform: translate(120vw, -10vh) rotate(35deg); opacity: 0.7; } /* Start further off, different angle */
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translate(-30vw, 70vh) rotate(35deg); opacity: 0.7; }
        }

        /* Rocket Styling */
        .rocket {
            width: 10px;
            height: 30px;
            background-color: #c0c0c0; /* Silver */
            border-top-left-radius: 50%;
            border-top-right-radius: 50%;
        }
        .rocket::after { /* Flame */
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 12px solid #ffae42; /* Orange-yellow flame */
            filter: blur(2px); /* Soften flame */
        }

        .rocket.r1 {
            left: 30%;
            animation: rocket-fly-1 20s linear infinite;
            animation-delay: 2s;
        }
        .rocket.r2 {
            left: 70%;
            width: 8px; /* Smaller rocket */
            height: 22px;
            animation: rocket-fly-1 28s linear infinite; /* Slower base speed */
            animation-delay: 8s;
        }
        .rocket.r2::after { /* Adjust flame for smaller rocket */
            bottom: -10px;
            border-left-width: 4px;
            border-right-width: 4px;
            border-bottom-width: 10px;
        }


        @keyframes rocket-fly-1 {
            0% { transform: translateY(110vh); opacity: 0.8; } /* Start off-screen bottom */
            10% { opacity: 1;}
            90% { opacity: 1;}
            100% { transform: translateY(-20vh); opacity: 0.8; } /* End off-screen top */
        }

        /* Speed up celestial objects when traveling */
        .space-background.traveling .meteorite,
        .space-background.traveling .rocket {
            /* Reduce duration significantly. !important might be needed if base styles are too specific */
            animation-duration: 1.5s !important;
        }
        .space-background.traveling .meteorite.m2 { /* Example: some can be even faster */
            animation-duration: 1.2s !important;
        }
        .space-background.traveling .rocket.r2 {
             animation-duration: 1.8s !important;
        }

    </style>
</head>
<body>

    <div id="spaceBackground" class="space-background">
        <!-- Stars are the CSS background of this div -->

        <!-- Additional Celestial Objects -->
        <div class="celestial-object meteorite m1"></div>
        <div class="celestial-object meteorite m2"></div>
        <div class="celestial-object meteorite m3"></div>

        <div class="celestial-object rocket r1"></div>
        <div class="celestial-object rocket r2"></div>
    </div>

    <div id="initialScreen" class="min-h-screen flex flex-col items-center justify-center p-4 text-center">
        <h1 class="text-5xl font-bold mb-8 text-cyan-400 tracking-wider">Cyber Time Travel</h1>
        <p class="text-xl mb-12 text-gray-300">Click "Travel" to journey through significant cyber events.</p>
        <button id="travelButton" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-lg text-2xl shadow-lg transform hover:scale-105 transition-transform duration-150">
            Travel
        </button>
    </div>

    <div id="attackInfoScreen" class="min-h-screen flex-col items-center justify-center p-8 truly-hidden">
        <div class="bg-gray-900 bg-opacity-80 p-6 sm:p-8 rounded-lg shadow-2xl max-w-xl md:max-w-2xl lg:max-w-3xl w-full mx-auto">
            <h2 id="attackDate" class="text-2xl sm:text-3xl font-semibold mb-2 text-cyan-400"></h2>
            <h3 id="attackTitle" class="text-3xl sm:text-4xl font-bold mb-4 text-yellow-400"></h3>
            <p id="attackDescription" class="text-base sm:text-lg text-gray-200 mb-6"></p>
            <a id="attackLearnMore" href="#" target="_blank" rel="noopener noreferrer" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-colors text-sm sm:text-base">
                Learn More
            </a>
        </div>
        <div class="mt-8 text-center">
            <button id="prevAttack" class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded mr-2 sm:mr-4 transition-colors text-sm sm:text-base">Previous</button>
            <button id="nextAttack" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-4 rounded transition-colors text-sm sm:text-base">Next Event</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const travelButton = document.getElementById('travelButton');
            const initialScreen = document.getElementById('initialScreen');
            const attackInfoScreen = document.getElementById('attackInfoScreen');
            const spaceBackground = document.getElementById('spaceBackground');

            const attackDateEl = document.getElementById('attackDate');
            const attackTitleEl = document.getElementById('attackTitle');
            const attackDescriptionEl = document.getElementById('attackDescription');
            const attackLearnMoreEl = document.getElementById('attackLearnMore');
            const prevAttackButton = document.getElementById('prevAttack');
            const nextAttackButton = document.getElementById('nextAttack');

            // Cyber attack data directly in JavaScript
            const attacks = [
                {
                    date: 'March 1988',
                    title: 'Morris Worm',
                    description: 'One of the first computer worms distributed via the Internet. It was not intended to be malicious but a flaw made it so, causing significant disruption.',
                    learn_more_url: 'https://en.wikipedia.org/wiki/Morris_worm',
                },
                {
                    date: 'May 2000',
                    title: 'ILOVEYOU Worm',
                    description: 'A computer worm that infected over ten million Windows personal computers, spread via email with the subject line "ILOVEYOU".',
                    learn_more_url: 'https://en.wikipedia.org/wiki/ILOVEYOU',
                },
                {
                    date: 'July 2010',
                    title: 'Stuxnet',
                    description: 'A malicious computer worm believed to be a jointly built American/Israeli cyberweapon. It specifically targeted SCADA systems and was responsible for causing substantial damage to Iran\'s nuclear program.',
                    learn_more_url: 'https://en.wikipedia.org/wiki/Stuxnet',
                },
                {
                    date: 'May 2017',
                    title: 'WannaCry Ransomware Attack',
                    description: 'A worldwide cyberattack by the WannaCry ransomware cryptoworm, which targeted computers running Microsoft Windows by encrypting data and demanding ransom payments in Bitcoin.',
                    learn_more_url: 'https://en.wikipedia.org/wiki/WannaCry_ransomware_attack',
                },
                {
                    date: 'Ongoing',
                    title: 'Phishing & Social Engineering',
                    description: 'Persistent threats where attackers deceive individuals into revealing sensitive information or performing actions. Awareness and caution are key defenses.',
                    learn_more_url: 'https://www.cisa.gov/news-events/news/understanding-and-preventing-phishing-attacks',
                }
            ];
            let currentAttackIndex = 0;

            function displayAttack(index) {
                if (index >= 0 && index < attacks.length) {
                    const attack = attacks[index];
                    attackDateEl.textContent = attack.date;
                    attackTitleEl.textContent = attack.title;
                    attackDescriptionEl.textContent = attack.description;
                    if (attack.learn_more_url) {
                        attackLearnMoreEl.href = attack.learn_more_url;
                        attackLearnMoreEl.style.display = 'inline-block';
                    } else {
                        attackLearnMoreEl.style.display = 'none';
                    }

                    initialScreen.classList.add('truly-hidden');
                    attackInfoScreen.classList.remove('truly-hidden');
                    attackInfoScreen.classList.add('flex');

                    prevAttackButton.disabled = index === 0;
                    nextAttackButton.disabled = index === attacks.length - 1;

                    prevAttackButton.classList.toggle('opacity-50', index === 0);
                    prevAttackButton.classList.toggle('cursor-not-allowed', index === 0);
                    nextAttackButton.classList.toggle('opacity-50', index === attacks.length - 1);
                    nextAttackButton.classList.toggle('cursor-not-allowed', index === attacks.length - 1);
                }
            }

            travelButton.addEventListener('click', () => {
                spaceBackground.classList.add('traveling');
                initialScreen.classList.add('opacity-0', 'transition-opacity', 'duration-1000');
                setTimeout(() => {
                    initialScreen.classList.add('truly-hidden');
                    initialScreen.classList.remove('opacity-0');
                }, 1000);

                setTimeout(() => {
                    displayAttack(currentAttackIndex);
                    // Optional: If you want the space to slow down again after "arrival"
                    // but keep celestial objects fast for a bit longer or manage them separately:
                    // spaceBackground.classList.remove('traveling');
                    // You might need more complex JS/CSS to manage individual object speeds post-travel.
                }, 3500);
            });

            nextAttackButton.addEventListener('click', () => {
                if (currentAttackIndex < attacks.length - 1) {
                    currentAttackIndex++;
                    displayAttack(currentAttackIndex);
                }
            });

            prevAttackButton.addEventListener('click', () => {
                if (currentAttackIndex > 0) {
                    currentAttackIndex--;
                    displayAttack(currentAttackIndex);
                }
            });

            if (attacks.length > 0) {
                prevAttackButton.disabled = true;
                prevAttackButton.classList.add('opacity-50', 'cursor-not-allowed');
                if (attacks.length === 1) {
                    nextAttackButton.disabled = true;
                    nextAttackButton.classList.add('opacity-50', 'cursor-not-allowed');
                }
            } else {
                nextAttackButton.style.display = 'none';
                prevAttackButton.style.display = 'none';
                const attackDisplayArea = attackInfoScreen.querySelector('.bg-gray-900');
                if (attackDisplayArea) {
                    attackDisplayArea.innerHTML = '<p class="text-xl text-center text-gray-300">No cyber events loaded for this journey.</p>';
                }
                initialScreen.classList.add('truly-hidden');
                attackInfoScreen.classList.remove('truly-hidden');
                attackInfoScreen.classList.add('flex');
            }
        });
    </script>

</body>
</html>