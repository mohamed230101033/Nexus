<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phishing Loop Animation</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #75baf7; /* Light blue, like water */
            margin: 0;
            overflow: hidden;
        }

        .scene {
            width: 400px;
            height: 300px;
            border: 2px solid #000; /* Black border for the scene */
            position: relative;
            background-color: #add8e6; /* Lighter blue water color */
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .fish {
            width: 60px;
            height: 35px;
            background-color: #000000; /* Black fish */
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
            position: absolute;
            /* Initial position set by animation, but good to define for no-script/initial state */
            left: 0; /* Will be controlled by translateX */
            bottom: 130px; /* Vertical position in the water */
            z-index: 10;
            opacity: 0; /* Start invisible, animation will show it */
            transform: translateX(-70px); /* Start off-screen */
            /* Animation properties */
            animation-name: fishLoop;
            animation-duration: 8s;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
        }

        .fish::before { /* Eye - subtle or remove if pure black is desired */
            content: '';
            width: 6px;
            height: 6px;
            background-color: #333; /* Very dark grey for a subtle eye */
            border-radius: 50%;
            position: absolute;
            top: 10px;
            right: 15px;
        }

        .fish::after { /* Tail */
            content: '';
            width: 0;
            height: 0;
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
            border-right: 20px solid #000000; /* Black tail */
            position: absolute;
            top: 2.5px;
            left: -15px;
            border-radius: 0 50% 50% 0;
        }

        .hook-assembly {
            position: absolute;
            top: 20px;
            right: 70px; /* Hook position from right */
            width: 20px;
            height: 150px;
            z-index: 5;
            opacity: 0; /* Start invisible */
            transform: translateY(0);
            /* Animation properties */
            animation-name: hookLoop;
            animation-duration: 8s;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
        }

        .fishing-line {
            width: 2px;
            height: 100px;
            background-color: #000000; /* Black line */
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .hook {
            width: 20px;
            height: 30px;
            border: 3px solid #000000; /* Black hook */
            border-top: none;
            border-right: none;
            border-radius: 0 0 0 15px;
            position: absolute;
            bottom: 0;
            left: calc(50% - 10px);
            transform-origin: top center;
            /* No worm for pure black theme */
        }

        /* Fish Animation Keyframes */
        @keyframes fishLoop {
            0% { /* Start off-screen, invisible */
                transform: translateX(-70px) translateY(0px) rotate(0deg);
                opacity: 0;
            }
            5% { /* Fade in at starting position */
                transform: translateX(-70px) translateY(0px) rotate(0deg);
                opacity: 1;
            }
            37.5% { /* Swim to hook (around 3s into 8s cycle) */
                /* Fish (width 60px) moves to hook (at right:70px).
                   Scene width 400px. Hook X pos from left = 400-70 = 330px.
                   Fish needs to move its left edge to roughly 330 - fish_width = 270px.
                   Or its center to 330 - hook_width/2.
                   Target translateX: 330 (hook line) - 60 (fish width) + 5 (to overlap slightly) = 275px.
                   Let's try translateX(260px) to align fish's front near hook.
                */
                transform: translateX(260px) translateY(5px) rotate(-5deg); /* Swims and slightly turns to hook */
                opacity: 1;
            }
            43.75% { /* "Bite" - stays at hook (around 3.5s) */
                transform: translateX(265px) translateY(0px) rotate(0deg); /* Adjust to align with hook center */
                opacity: 1;
            }
            68.75% { /* Pulled up with hook (around 5.5s) */
                transform: translateX(265px) translateY(-170px) rotate(15deg); /* Moves up and slightly rotates */
                opacity: 1;
            }
            69% { /* Start fading out as it's off-screen */
                transform: translateX(265px) translateY(-170px) rotate(15deg);
                opacity: 0;
            }
            100% { /* Reset: stays off-screen and invisible */
                transform: translateX(-70px) translateY(0px) rotate(0deg);
                opacity: 0;
            }
        }

        /* Hook Assembly Animation Keyframes */
        @keyframes hookLoop {
            0% { /* Start in position, invisible */
                transform: translateY(0px);
                opacity: 0;
            }
            5% { /* Fade in */
                transform: translateY(0px);
                opacity: 1;
            }
            /* Stays in place while fish swims to it */
            43.75% { /* Waiting for fish (until 3.5s) */
                transform: translateY(0px);
                opacity: 1;
            }
            68.75% { /* Pulled up (at 5.5s) */
                transform: translateY(-190px); /* Hook assembly original top:20px, so -170px makes it go off screen */
                opacity: 1;
            }
            69% { /* Start fading out as it's off-screen */
                transform: translateY(-190px);
                opacity: 0;
            }
            100% { /* Reset: stays in original Y position, invisible */
                transform: translateY(0px);
                opacity: 0;
            }
        }

    </style>
</head>
<body>

    <div class="scene">
        <div class="fish" id="phishingFish"></div>
        <div class="hook-assembly" id="hookAssembly">
            <div class="fishing-line"></div>
            <div class="hook">
                <!-- Worm removed for black theme -->
            </div>
        </div>
    </div>

    <!-- No JavaScript needed for this version as animations are pure CSS and looped -->

</body>
</html>