<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    /**
     * Show the welcome page
     */
    public function welcome()
    {
        // Reset any existing game session if returning to welcome page
        Session::forget(['player_name', 'current_level', 'shield_level', 'badges', 'completed_missions', 'trust_points', 'completed_truth_cases', 'truth_detective_badges']);

        // Only reset session if explicitly requested
        if (request()->has('reset')) {
            Session::forget(['player_name', 'current_level', 'shield_level', 'badges', 'completed_missions']);
            return view('welcome')->with('success', 'Game progress reset!');
        }
        
        return view('welcome');
    }
    
    /**
     * Start the game with player name
     */
    public function startGame(Request $request)
    {
        $request->validate([
            'player_name' => 'required|string|max:20',
        ]);
        
        // Prevent overwriting existing game session
        if (Session::has('player_name')) {
            return redirect()->route('game.story')
                ->with('error', 'Game already in progress. To start a new game, reset from the welcome page.');
        }
        
        // Store player information in session
        Session::put('player_name', $request->player_name);
        Session::put('current_level', 1);
        Session::put('shield_level', 0); // General game shield
        Session::put('badges', []); // General game badges
        Session::put('completed_missions', []); // Story mode missions

        // Truth Detective specific session data
        Session::put('trust_points', 0);
        Session::put('completed_truth_cases', []);
        Session::put('truth_detective_badges', []); 
        
        return redirect()->route('game.intro');
    }
    
    /**
     * Show the game introduction
     */
    public function intro()
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        return view('game.intro', ['player_name' => $playerName]);
    }
    
    /**
     * Show the story mode hub
     */
    public function storyMode()
    {
        $playerName = Session::get('player_name');
        $currentLevel = Session::get('current_level', 1);
        $completedMissions = Session::get('completed_missions', []);
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        return view('game.story', [
            'player_name' => $playerName,
            'current_level' => $currentLevel,
            'completed_missions' => $completedMissions
        ]);
    }
    
    /**
     * Show a specific story mission
     */
    public function mission($id)
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        $missions = $this->getMissions();
        $mission = collect($missions)->firstWhere('id', (int)$id);
        
        if (!$mission) {
            return redirect()->route('game.story')->with('error', 'Mission not found!');
        }
        
        return view('game.mission', [
            'player_name' => $playerName,
            'mission' => $mission
        ]);
    }
    
    /**
     * Handle mission submissions
     */
    public function submitMission(Request $request, $id)
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        $missions = $this->getMissions();
        $mission = collect($missions)->firstWhere('id', (int)$id);
        
        if (!$mission) {
            return redirect()->route('game.story')->with('error', 'Mission not found!');
        }
        
        // Handle different mission submissions based on ID
        switch ((int)$id) {
            case 1: // The Mysterious Email
                if ($request->has('phishing_stage1_complete')) {
                    // Validate new phishing challenge inputs
                    $request->validate([
                        'phishing_stage1_complete' => 'boolean',
                        'phishing_stage2_complete' => 'boolean',
                        'phishing_stage3_complete' => 'boolean',
                        'phishing_stage4_complete' => 'boolean',
                        'total_phishing_score' => 'integer|min:0|max:23',
                    ]);
                    
                    $phishingStage1Complete = (bool) $request->input('phishing_stage1_complete', 0);
                    $phishingStage2Complete = (bool) $request->input('phishing_stage2_complete', 0);
                    $phishingStage3Complete = (bool) $request->input('phishing_stage3_complete', 0);
                    $phishingStage4Complete = (bool) $request->input('phishing_stage4_complete', 0);
                    $totalPhishingScore = (int) $request->input('total_phishing_score', 0);
                    
                    $stagesCompleted = ($phishingStage1Complete ? 1 : 0) + 
                                      ($phishingStage2Complete ? 1 : 0) + 
                                      ($phishingStage3Complete ? 1 : 0) + 
                                      ($phishingStage4Complete ? 1 : 0);
                    
                    $maxScore = 23;
                    $percentage = ($totalPhishingScore / $maxScore) * 100;
                    
                    $shieldLevel = Session::get('shield_level', 0);
                    $increase = 0;
                    $message = '';
                    $badge = null;
                    
                    if ($percentage >= 90 && $stagesCompleted >= 4) {
                        $increase = 5;
                        $message = "Outstanding! You're a phishing detection expert!";
                        if ($stagesCompleted >= 4 && !in_array('phishing_master', Session::get('badges', []))) {
                            $badge = 'phishing_master';
                        } elseif ($shieldLevel + 5 >= 5 && !in_array('phishing_expert', Session::get('badges', []))) {
                            $badge = 'phishing_expert';
                        }
                    } elseif ($percentage >= 75 && $stagesCompleted >= 3) {
                        $increase = 4;
                        $message = "Great job! You've mastered multiple types of phishing detection!";
                    } elseif ($percentage >= 60 && $stagesCompleted >= 2) {
                        $increase = 3;
                        $message = "Good work! You've learned to spot phishing!";
                    } elseif ($percentage >= 40 && $stagesCompleted >= 1) {
                        $increase = 2;
                        $message = "Nice effort! You're learning phishing detection.";
                    } else {
                        $increase = 1;
                        $message = "First steps in spotting phishing!";
                    }
                    
                    return $this->completeMission($id, $increase, $message, $badge);
                }
                
                // Legacy phishing challenge
                $request->validate([
                    'clues' => 'array',
                    'action' => 'required|string',
                ]);
                
                $clues = $request->input('clues', []);
                $action = $request->input('action');
                
                $correctClues = ['sender', 'urgency', 'spelling', 'prize', 'link'];
                $correctAction = 'report';
                
                $score = 0;
                foreach ($correctClues as $clue) {
                    if (in_array($clue, $clues)) {
                        $score++;
                    }
                }
                if ($action === $correctAction) {
                    $score += 5;
                }
                
                $maxScore = 10;
                $percentage = ($score / $maxScore) * 100;
                
                $shieldLevel = Session::get('shield_level', 0);
                $increase = 0;
                $message = '';
                $badge = null;
                
                if ($percentage >= 90) {
                    $increase = 3;
                    $message = "Excellent work! You spotted all phishing signs.";
                } elseif ($percentage >= 70) {
                    $increase = 2;
                    $message = "Good job! You caught most phishing clues.";
                } elseif ($percentage >= 50) {
                    $increase = 1;
                    $message = "Not bad, but you missed some phishing signs.";
                } else {
                    $increase = 0;
                    $message = "You need more practice spotting phishing.";
                }
                
                if ($shieldLevel + $increase >= 5 && !in_array('phishing_expert', Session::get('badges', []))) {
                    $badge = 'phishing_expert';
                }
                
                return $this->completeMission($id, $increase, $message, $badge);
                
            case 2: // Password Peril
                $request->validate([
                    'stage1_complete' => 'boolean',
                    'stage2_complete' => 'boolean',
                    'stage3_complete' => 'boolean',
                    'stage4_complete' => 'boolean',
                    'password_score' => 'integer|min:0|max:5',
                    'final_password' => 'string|nullable',
                ]);
                
                $stage1Complete = (bool) $request->input('stage1_complete', 0);
                $stage2Complete = (bool) $request->input('stage2_complete', 0);
                $stage3Complete = (bool) $request->input('stage3_complete', 0);
                $stage4Complete = (bool) $request->input('stage4_complete', 0);
                $passwordScore = (int) $request->input('password_score', 0);
                
                $score = 0;
                if ($stage1Complete) $score += 2;
                if ($stage2Complete) $score += 3;
                if ($stage3Complete) $score += 3;
                if ($stage4Complete) $score += 7;
                $score += min($passwordScore, 5);
                
                $maxScore = 20;
                $percentage = ($score / $maxScore) * 100;
                
                $shieldLevel = Session::get('shield_level', 0);
                $increase = 0;
                $message = '';
                $badge = null;
                
                if ($percentage >= 90) {
                    $increase = 4;
                    $message = "Outstanding! You're a password security master.";
                } elseif ($percentage >= 75) {
                    $increase = 3;
                    $message = "Great job! You've created a strong password.";
                } elseif ($percentage >= 60) {
                    $increase = 2;
                    $message = "Good work! Your password skills are improving.";
                } elseif ($percentage >= 40) {
                    $increase = 1;
                    $message = "Not bad, but practice creating stronger passwords.";
                } else {
                    $increase = 0;
                    $message = "Keep practicing strong password habits!";
                }
                
                if ($stage4Complete && !in_array('password_master', Session::get('badges', []))) {
                    $badge = 'password_master';
                }
                
                return $this->completeMission($id, $increase, $message, $badge);
                
            case 3: // Social Media Mayhem
                $request->validate([
                    'social_media_complete' => 'boolean',
                    'social_media_score' => 'integer|min:0|max:5',
                ]);
                
                if ($request->input('social_media_complete')) {
                    $socialMediaScore = (int) $request->input('social_media_score', 0);
                    
                    $shieldLevel = Session::get('shield_level', 0);
                    $increase = 0;
                    $message = '';
                    $badge = null;
                    
                    if ($socialMediaScore >= 5) {
                        $increase = 5;
                        $message = "Outstanding! You're a social media safety expert!";
                    } elseif ($socialMediaScore >= 4) {
                        $increase = 4;
                        $message = "Great job! You've mastered social media safety!";
                        if ($socialMediaScore >= 4 && !in_array('social_expert', Session::get('badges', []))) {
                            $badge = 'social_expert';
                        }
                    } elseif ($socialMediaScore >= 3) {
                        $increase = 3;
                        $message = "Good work! You're learning social media safety!";
                    } elseif ($socialMediaScore >= 2) {
                        $increase = 2;
                        $message = "Nice effort! You understand some social media dangers.";
                    } else {
                        $increase = 1;
                        $message = "First steps in social media safety!";
                    }
                    
                    return $this->completeMission($id, $increase, $message, $badge);
                }
                
                return redirect()->route('game.story')
                    ->with('error', 'Challenge not completed properly.');
                
            default:
                return redirect()->route('game.story')
                    ->with('success', 'Mission completed!');
        }
    }
    
    /**
     * Complete a mission and update session data
     */
    private function completeMission($missionId, $shieldIncrease, $message, $badge = null)
    {
        $shieldLevel = Session::get('shield_level', 0);
        Session::put('shield_level', $shieldLevel + $shieldIncrease);
        
        $completedMissions = Session::get('completed_missions', []);
        if (!in_array($missionId, $completedMissions)) {
            $completedMissions[] = $missionId;
            Session::put('completed_missions', $completedMissions);
        }
        
        $response = redirect()->route('game.story')
            ->with('success', $message . ' Shield level increased by ' . $shieldIncrease . '!');
        
        if ($badge && !in_array($badge, Session::get('badges', []))) {
            $badges = Session::get('badges', []);
            $badges[] = $badge;
            Session::put('badges', $badges);
            $response = $response->with('badge', $badge);
        }
        
        return $response;
    }
    
    /**
     * Show the village hub
     */
    public function village()
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        $locations = [
            [
                'id' => 'home',
                'name' => 'Cyber Home',
                'description' => 'Learn about basic online safety and protecting your digital home.',
                'icon' => 'home',
                'route' => 'game.secret-code'
            ],
            [
                'id' => 'school',
                'name' => 'Digital Academy',
                'description' => 'Master password security and safe browsing practices.',
                'icon' => 'academic-cap',
                'route' => 'game.secret-code'
            ],
            [
                'id' => 'game-shop',
                'name' => 'Game Center',
                'description' => 'Practice identifying online scams and phishing attempts.',
                'icon' => 'puzzle-piece',
                'route' => 'game.secret-code'
            ],
            [
                'id' => 'social-hub',
                'name' => 'Social Hub',
                'description' => 'Learn about social media safety and privacy.',
                'icon' => 'users',
                'route' => 'game.mission',
                'params' => ['id' => 3]
            ]
        ];
        
        return view('game.villageGame.village', [
            'player_name' => $playerName,
            'locations' => $locations
        ]);
    }
    
    /**
     * Show the Truth Detective Hub
     */
    public function truthDetectiveHub()
    {
        $playerName = Session::get('player_name');
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }

        $cases = $this->getTruthDetectiveCases();
        $completedCases = Session::get('completed_truth_cases', []);
        $trustPoints = Session::get('trust_points', 0);
        $earnedBadges = Session::get('truth_detective_badges', []);


        // Categorize cases
        $rookieCases = collect($cases)->where('difficulty_level', 1)->all();
        $agentCases = collect($cases)->where('difficulty_level', 2)->all();
        $investigatorCases = collect($cases)->where('difficulty_level', 3)->all();

        return view('game.truth-detective-hub', [
            'player_name' => $playerName,
            'rookieCases' => $rookieCases,
            'agentCases' => $agentCases,
            'investigatorCases' => $investigatorCases,
            'completedCases' => $completedCases,
            'trustPoints' => $trustPoints,
            'earnedBadges' => $earnedBadges,
        ]);
    }

    /**
     * Show a specific Truth Detective case
     */
    public function startTruthDetectiveCase($caseId)
    {
        $playerName = Session::get('player_name');
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        $case = collect($this->getTruthDetectiveCases())->firstWhere('id', (int)$caseId);

        if (!$case) {
            return redirect()->route('game.truth-detective')->with('error', 'Case not found!');
        }

        $challenges = $this->getChallenges();
        $challenge = $challenges[array_rand($challenges)];
        
        $completedCases = Session::get('completed_truth_cases', []);
        if(in_array($caseId, $completedCases)){
             // Optionally, allow replaying or show a "completed" status
            // For now, just show the case
        }

        return view('game.truth-detective-case', [
            'player_name' => $playerName,
            'case' => $case,
        ]);
    }
    
    /**
     * Handle Truth Detective case submission
     */
    public function submitTruthDetectiveCase(Request $request, $caseId)
    {
        $playerName = Session::get('player_name');
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }

        $request->validate([
            'decision' => 'required|string|in:real,fake', // 'real' or 'fake'
        ]);

        $allCases = $this->getTruthDetectiveCases();
        $case = collect($allCases)->firstWhere('id', (int)$caseId);

        if (!$case) {
            return redirect()->route('game.truth-detective')->with('error', 'Case not found!');
        }

        $isCorrect = $request->decision === $case['correct_answer'];
        $feedbackMessage = $isCorrect ? $case['feedback']['correct'] : $case['feedback']['incorrect'];
        $trustPointsEarned = 0;
        $newBadgeEarned = null;

        if ($isCorrect) {
            $trustPointsEarned = $case['points_reward'];
            $currentTrustPoints = Session::get('trust_points', 0);
            Session::put('trust_points', $currentTrustPoints + $trustPointsEarned);

            $completedCases = Session::get('completed_truth_cases', []);
            if (!in_array($caseId, $completedCases)) {
                $completedCases[] = $caseId;
                Session::put('completed_truth_cases', $completedCases);
            }

            if (!empty($case['badge_reward'])) {
                $currentBadges = Session::get('truth_detective_badges', []);
                if (!in_array($case['badge_reward'], $currentBadges)) {
                    $currentBadges[] = $case['badge_reward'];
                    Session::put('truth_detective_badges', $currentBadges);
                    $newBadgeEarned = $case['badge_reward'];
                    $feedbackMessage .= " You've earned the " . $case['badge_reward_name'] . " badge!";
                }
            }

            $shieldLevel = Session::get('shield_level', 0);
            Session::put('shield_level', $shieldLevel + 1);

            if (($shieldLevel + 1) % 5 === 0) {
                $badges = Session::get('badges', []);
                $badge = 'level_' . (($shieldLevel + 1) / 5);
                $badges[] = $badge;
                Session::put('badges', $badges);

                return redirect()->route('game.challenge')
                    ->with('success', 'Correct! You earned a new badge!')
                    ->with('badge', $badge);
            }

            return redirect()->route('game.truth-detective.case', ['caseId' => $caseId])
                ->with('success', $feedbackMessage)
                ->with('decision_made', true)
                ->with('is_correct', true);
        } else {
            return redirect()->route('game.truth-detective.case', ['caseId' => $caseId])
                ->with('error', $feedbackMessage)
                ->with('decision_made', true)
                ->with('is_correct', false);
        }
    }
    
    /**
     * Show the Cyber Time Travel page
     */
    public function timeTravel()
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        return view('game.time-travel', [
            'player_name' => $playerName,
            'cyberAttacks' => $this->getCyberAttacks()
        ]);
    }
    
    /**
     * Show details for a specific cyber attack
     */
    public function timeTravelAttack($attack)
    {
        $playerName = Session::get('player_name');
        
        if (!$playerName) {
            return redirect()->route('welcome')->with('error', 'Please enter your name first!');
        }
        
        $cyberAttacks = $this->getCyberAttacks();
        $attackDetails = collect($cyberAttacks)->firstWhere('id', $attack);
        
        if (!$attackDetails) {
            return redirect()->route('game.time-travel')->with('error', 'This cyber attack is not in our records.');
        }
        
        $attackOrder = ['morris-worm', 'i-love-you', 'stuxnet', 'wannacry', 'solarwinds'];
        $currentIndex = array_search($attack, $attackOrder);
        
        $previousAttack = ($currentIndex > 0) ? $attackOrder[$currentIndex - 1] : null;
        $nextAttack = ($currentIndex < count($attackOrder) - 1) ? $attackOrder[$currentIndex + 1] : null;
        
        return view('game.time-travel-attack', [
            'player_name' => $playerName,
            'attack' => $attackDetails,
            'previousAttack' => $previousAttack,
            'nextAttack' => $nextAttack
        ]);
    }
    
    /**
     * Random time travel to a cyber attack
     */
    public function randomTimeTravel()
    {
        $attackOrder = ['morris-worm', 'i-love-you', 'stuxnet', 'wannacry', 'solarwinds'];
        $randomAttack = $attackOrder[array_rand($attackOrder)];
        
        return redirect()->route('game.time-travel.attack', ['attack' => $randomAttack]);
    }
    
    /**
     * Get all missions data
     */
    private function getMissions()
    {
        return [
            [
                'id' => 1,
                'title' => 'The Mysterious Email',
                'villain' => 'Captain Clickbait',
                'description' => 'Captain Clickbait is sending strange emails with tempting offers. Can you spot the tricks?',
                'level' => 1,
                'difficulty' => 'Easy'
            ],
            [
                'id' => 2,
                'title' => 'Password Peril',
                'villain' => 'The Key Thief',
                'description' => 'The Key Thief wants to crack your passwords! Learn how to create strong passwords.',
                'level' => 1,
                'difficulty' => 'Easy'
            ],
            [
                'id' => 3,
                'title' => 'Social Media Mayhem',
                'villain' => 'Profile Phantom',
                'description' => 'Profile Phantom is creating fake accounts to trick kids. Can you spot the fakes?',
                'level' => 2,
                'difficulty' => 'Medium'
            ],
            [
                'id' => 4,
                'title' => 'The App Trap',
                'villain' => 'Data Gobbler',
                'description' => 'Data Gobbler creates apps that collect too much information. Learn what to watch out for!',
                'level' => 2,
                'difficulty' => 'Medium'
            ],
            [
                'id' => 5,
                'title' => 'Website Wonderland',
                'villain' => 'The URL Impersonator',
                'description' => 'The URL Impersonator creates fake websites that look real. Can you tell the difference?',
                'level' => 3,
                'difficulty' => 'Hard'
            ],
        ];
    }
    
    /**
     * Get Truth Detective Cases data
     * Get all challenges data
     */
    private function getTruthDetectiveCases()
    {
        return [
            [
                'id' => 1,
                'title' => 'The Suspicious Scholarship Email',
                'age_group' => '9-11', // Rookie
                'difficulty_level' => 1, // 1 for Rookie, 2 for Agent, 3 for Investigator
                'difficulty_name' => 'Rookie',
                'storyline' => "You've received an email about a 'FREE SCHOLARSHIP!' It sounds amazing, but is it too good to be true? Investigate the email carefully.",
                'image_to_investigate' => 'images/truth-detective/scholarship-email-fake.png', // Path to image
                'clues' => [
                    ['id' => 'clue1_1', 'text' => "Sender's email address looks unofficial: 'scholarship_free@mail-web.com'", 'area_coords' => '10,20,100,50'], // Example: top,left,bottom,right
                    ['id' => 'clue1_2', 'text' => "Generic greeting: 'Dear Student'", 'area_coords' => '60,20,80,150'],
                    ['id' => 'clue1_3', 'text' => "Urgent call to action: 'Click NOW to claim!'", 'area_coords' => '100,20,120,200'],
                    ['id' => 'clue1_4', 'text' => "Spelling mistakes: 'Congradulations!'", 'area_coords' => '130,20,150,180'],
                    ['id' => 'clue1_5', 'text' => "Asks for personal info too early: 'Send your full name, address, and parent's bank details.'", 'area_coords' => '160,20,200,300'],
                ],
                'correct_answer' => 'fake', // 'real' or 'fake'
                'feedback' => [
                    'correct' => "Excellent detective work! You correctly identified this as a SCAM email. It had many red flags like a suspicious sender, urgency, and asking for too much personal info.",
                    'incorrect' => "Not quite! This email was a fake. Real scholarship offers usually come from official school or organization emails and don't ask for bank details upfront. Look for clues like the sender's address and urgent language."
                ],
                'points_reward' => 100,
                'badge_reward' => 'phishing_spotter', // Badge ID
                'badge_reward_name' => 'Phishing Spotter',
            ],
            [
                'id' => 2,
                'title' => 'Is This News Site Real?',
                'age_group' => '12-14', // Field Agent
                'difficulty_level' => 2,
                'difficulty_name' => 'Field Agent',
                'storyline' => "You found an article online: 'ALIENS LAND IN LOCAL PARK - Confirmed by Mayor!'. The headline is shocking! But is the news source trustworthy?",
                'image_to_investigate' => 'images/truth-detective/fake-news-site.png', // Path to image of a fake news website
                'clues' => [
                    ['id' => 'clue2_1', 'text' => "Website URL is misspelled: 'www.truenews-reportz.com'", 'area_coords' => '10,20,40,250'],
                    ['id' => 'clue2_2', 'text' => "No 'About Us' or 'Contact' page found.", 'area_coords' => '50,300,80,400'],
                    ['id' => 'clue2_3', 'text' => "The article has many pop-up ads.", 'area_coords' => '0,0,400,400'], // General observation
                    ['id' => 'clue2_4', 'text' => "Other reputable news sites are not reporting this story.", 'area_coords' => '0,0,0,0'], // External check
                    ['id' => 'clue2_5', 'text' => "The author is listed as 'Anonymous الخبر الصحفي'", 'area_coords' => '300,20,330,200'],
                ],
                'correct_answer' => 'fake',
                'feedback' => [
                    'correct' => "Great investigation! You spotted that this news site was FAKE. Weird URLs, no contact info, and sensational headlines not found elsewhere are big red flags.",
                    'incorrect' => "Be careful! This news site was designed to look real but it's fake. Always check the website's URL, look for an 'About Us' page, and see if other trusted news sources are reporting the same story."
                ],
                'points_reward' => 150,
                'badge_reward' => 'misinfo_buster',
                'badge_reward_name' => 'Misinformation Buster',
            ],
            // Add more cases for different age groups and topics (e.g., fake social media profiles, scam online stores)
        ];
    }

    /**
     * Get cyber attacks data for time travel feature
     */
    private function getCyberAttacks()
    {
        return [
            'morris-worm' => [
                'id' => 'morris-worm',
                'name' => 'Morris Worm',
                'date' => 'November 2, 1988',
                'image' => 'images/cyber-attacks/morris-worm.jpg',
                'description' => '<p>The Morris Worm was one of the first recognized computer worms distributed via the Internet, and the first to gain significant attention. It was written by Robert Tappan Morris, a student at Cornell University.</p><p>The worm exploited vulnerabilities in UNIX sendmail, finger, and rsh/rexec, as well as weak passwords. It was originally designed to gauge the size of the internet by infecting UNIX systems and asking them to report back. However, a design flaw caused the worm to replicate uncontrollably, causing denial of service attacks.</p>',
                'impact' => '<p>The Morris Worm infected approximately 6,000 computers (about 10% of the internet at that time). It caused computers to slow down to the point of being unusable, effectively shutting down much of the internet for several days.</p><p>It is estimated to have caused between $100,000 and $10 million in damages due to lost access to the internet and the cost of eradicating the worm. The incident led to the formation of the Computer Emergency Response Team (CERT), which is still active today in coordinating responses to large-scale cyber threats.</p>',
                'protection' => '<p>To protect against similar attacks today:</p><ul><li>Keep systems up-to-date with security patches</li><li>Use strong passwords</li><li>Implement network segmentation</li><li>Deploy intrusion detection systems</li><li>Use firewalls to filter network traffic</li></ul>',
                'created_by' => 'Robert Tappan Morris, a Cornell University graduate student',
                'target' => 'UNIX systems connected to the early internet',
                'damage' => 'An estimated $100,000-$10 million in system downtime and cleanup',
                'method' => 'Exploited vulnerabilities in sendmail, finger, and rsh/rexec',
                'significance' => 'First major internet worm; led to creation of CERT',
                'threat_level' => 'High',
                'quiz' => [
                    'question' => 'What was unique about the Morris Worm compared to modern malware?',
                    'options' => [
                        'It was designed to steal financial information',
                        'It was not intended to cause damage but a flaw caused it to spread uncontrollably',
                        'It targeted military infrastructure specifically',
                        'It was created by a nation-state actor'
                    ],
                    'correct_answer' => 1
                ]
            ],
            'i-love-you' => [
                'id' => 'i-love-you',
                'name' => 'ILOVEYOU Virus',
                'date' => 'May 4, 2000',
                'image' => 'images/cyber-attacks/i-love-you.jpg',
                'description' => '<p>The ILOVEYOU virus, also known as the "Love Bug," was a computer worm that attacked tens of millions of Windows computers when it was first released. It started spreading as an email message with the subject line "ILOVEYOU" and an attachment named "LOVE-LETTER-FOR-YOU.TXT.vbs".</p><p>When the attachment was opened, the malicious VBScript code would send copies of itself to all contacts in the victim\'s Microsoft Outlook address book and make harmful changes to the victim\'s system, including overwriting image files.</p>',
                'impact' => '<p>The ILOVEYOU virus infected over 50 million computers worldwide in just 10 days. It caused an estimated $5.5-8.7 billion in damages. It essentially brought email systems around the world to a halt as companies and governments shut down their email to prevent infection.</p><p>Notable organizations affected included the British Parliament, the Pentagon, and even major corporations like Ford Motor Company. The incident highlighted how vulnerable systems were to social engineering attacks, as users readily opened the attachment thinking it was from someone they knew.</p>',
                'protection' => '<p>To protect against similar attacks today:</p><ul><li>Never open email attachments from unknown senders</li><li>Be suspicious of unexpected attachments, even from known senders</li><li>Use up-to-date antivirus software</li><li>Disable automatic script execution in email clients</li><li>Apply user awareness training to recognize phishing attempts</li></ul>',
                'created_by' => 'Onel de Guzman, a computer science student from the Philippines',
                'target' => 'Windows computers with Microsoft Outlook',
                'damage' => 'An estimated $5.5-8.7 billion in damages',
                'method' => 'Email attachment with malicious VBScript that self-replicated',
                'significance' => 'One of the most damaging and widespread computer viruses in history',
                'threat_level' => 'Severe',
                'quiz' => [
                    'question' => 'What file extension did the ILOVEYOU virus use to trick users?',
                    'options' => [
                        '.exe',
                        '.doc',
                        '.vbs',
                        '.zip'
                    ],
                    'correct_answer' => 2
                ]
            ],
            'stuxnet' => [
                'id' => 'stuxnet',
                'name' => 'Stuxnet',
                'date' => 'June 2010',
                'image' => 'images/cyber-attacks/stuxnet.jpg',
                'description' => '<p>Stuxnet was one of the first computer malware programs known to target industrial control systems, specifically those used in Iran\'s uranium enrichment facilities. It was a highly sophisticated computer worm believed to have been created by the United States and Israel.</p><p>The malware specifically targeted Siemens SCADA systems and programmable logic controllers (PLCs). It exploited multiple zero-day vulnerabilities and used stolen digital certificates to appear legitimate. Once Stuxnet infected a system, it would look for specific industrial control hardware connected to centrifuge motors.</p>',
                'impact' => '<p>Stuxnet is believed to have destroyed nearly one-fifth of Iran\'s nuclear centrifuges by causing them to spin out of control while displaying normal operational data to monitoring systems. This physical destruction of equipment by malware was unprecedented.</p><p>Beyond the immediate damage, Stuxnet marked a new era in cyber warfare. It demonstrated that cyber attacks could cause real-world physical damage to critical infrastructure. The code itself has since been studied and repurposed by other threat actors, increasing the risk to industrial systems worldwide.</p>',
                'protection' => '<p>To protect against similar attacks today:</p><ul><li>Implement air-gapped networks for critical systems</li><li>Use application whitelisting on industrial control systems</li><li>Deploy specialized industrial control system security monitoring</li><li>Regularly audit physical access to control systems</li><li>Establish robust change management procedures</li></ul>',
                'created_by' => 'Believed to be a joint effort between the United States and Israel',
                'target' => 'Iran\'s nuclear program, specifically uranium enrichment centrifuges',
                'damage' => 'Destroyed approximately 1,000 IR-1 centrifuges at Natanz nuclear facility',
                'method' => 'Zero-day exploits, stolen digital certificates, and targeting of PLCs',
                'significance' => 'First known malware to cause physical destruction; changed cyber warfare',
                'threat_level' => 'Critical',
                'quiz' => [
                    'question' => 'What made Stuxnet fundamentally different from previous malware?',
                    'options' => [
                        'It was the first malware to use encryption',
                        'It was designed to cause physical damage to equipment',
                        'It was the first malware to spread via email',
                        'It was the first malware to target Windows systems'
                    ],
                    'correct_answer' => 1
                ]
            ],
            'wannacry' => [
                'id' => 'wannacry',
                'name' => 'WannaCry Ransomware',
                'date' => 'May 12, 2017',
                'image' => 'images/cyber-attacks/wannacry.jpg',
                'description' => '<p>WannaCry was a worldwide ransomware attack that targeted computers running Microsoft Windows by encrypting data and demanding ransom payments in Bitcoin cryptocurrency. The attack began on May 12, 2017, and within a day had infected more than 230,000 computers in over 150 countries.</p><p>The ransomware exploited the EternalBlue vulnerability in Microsoft\'s Server Message Block (SMB) protocol. This exploit had been discovered and developed by the U.S. National Security Agency (NSA) but was leaked by a group called The Shadow Brokers a month before the attack.</p>',
                'impact' => '<p>WannaCry infected over 230,000 computers across 150 countries. Major organizations affected included the National Health Service (NHS) in the UK, FedEx, Telefónica, and many others. The estimated damages ranged from hundreds of millions to billions of dollars.</p><p>The attack was particularly impactful on healthcare systems, with the NHS having to cancel appointments and surgeries. It highlighted the critical importance of timely security patching, as Microsoft had released a patch for the EternalBlue vulnerability two months before the attack, but many organizations had not applied it.</p>',
                'protection' => '<p>To protect against similar attacks today:</p><ul><li>Keep operating systems and software up-to-date with security patches</li><li>Maintain regular, air-gapped backups of critical data</li><li>Implement network segmentation to prevent lateral movement</li><li>Deploy ransomware-specific protection tools</li><li>Conduct regular security awareness training for all staff</li></ul>',
                'created_by' => 'Lazarus Group, believed to be linked to North Korea',
                'target' => 'Windows systems vulnerable to the EternalBlue exploit',
                'damage' => 'Estimated damages of $4-8 billion globally',
                'method' => 'Exploitation of EternalBlue vulnerability in SMB protocol',
                'significance' => 'Largest ransomware attack at the time; changed how organizations view patching',
                'threat_level' => 'Critical',
                'quiz' => [
                    'question' => 'Which vulnerability did WannaCry exploit?',
                    'options' => [
                        'Heartbleed',
                        'EternalBlue',
                        'Shellshock',
                        'Meltdown'
                    ],
                    'correct_answer' => 1
                ]
            ],
            'solarwinds' => [
                'id' => 'solarwinds',
                'name' => 'SolarWinds Supply Chain Attack',
                'date' => 'December 2020',
                'image' => 'images/cyber-attacks/solarwinds.jpg',
                'description' => '<p>The SolarWinds attack was a sophisticated supply chain attack that inserted malicious code into SolarWinds\' Orion software system. The attackers gained access to SolarWinds\' build system and inserted malware (SUNBURST) into Orion software updates that were distributed to thousands of customers between March and June 2020.</p><p>When organizations installed these legitimate-seeming updates, they unknowingly installed a backdoor that allowed the attackers to access their systems. The attack was particularly sophisticated, using advanced evasion techniques and carefully targeting specific high-value victims for additional exploitation.</p>',
                'impact' => '<p>Around 18,000 organizations installed the compromised updates, including many U.S. government agencies such as the Treasury Department, Department of Homeland Security, and the Pentagon. Also affected were major companies like Microsoft, Cisco, and FireEye (which first discovered the breach).</p><p>The attack gave the perpetrators access to sensitive government and corporate networks for up to nine months before discovery. The full extent of data exfiltration may never be known, but the breach is considered one of the most significant cyber espionage campaigns ever conducted against the United States.</p>',
                'protection' => '<p>To protect against similar supply chain attacks today:</p><ul><li>Implement a zero-trust security model</li><li>Verify the integrity of software updates</li><li>Monitor network traffic for unusual patterns</li><li>Enforce principle of least privilege for all accounts</li><li>Conduct security assessments of third-party vendors</li></ul>',
                'created_by' => 'APT29 (Cozy Bear), believed to be Russian intelligence (SVR)',
                'target' => 'Government agencies and major corporations via SolarWinds Orion software',
                'damage' => 'Billions in remediation costs and untold intelligence value to attackers',
                'method' => 'Supply chain attack via trojanized software updates',
                'significance' => 'Demonstrated vulnerability of software supply chains; changed security practices',
                'threat_level' => 'Critical',
                'quiz' => [
                    'question' => 'What made the SolarWinds attack particularly dangerous?',
                    'options' => [
                        'It encrypted all victim data like ransomware',
                        'It was delivered through legitimate software updates from a trusted vendor',
                        'It targeted home users primarily',
                        'It spread automatically between networks without human intervention'
                    ],
                    'correct_answer' => 1
                ]
            ]
        ];
    }

/**
 * Show the secret code game hub
 */
public function secretCode()
{
    $playerName = Session::get('player_name');
    
    if (!$playerName) {
        return redirect()->route('welcome')->with('error', 'Please enter your name first!');
    }

    $levels = [
        [
            'id' => 1,
            'name' => 'Reverse Code',
            'description' => 'Learn to decode messages by reading them backwards!',
            'difficulty' => 'Easy',
            'unlocked' => true
        ],
        [
            'id' => 2,
            'name' => 'Caesar\'s Secret',
            'description' => 'Shift the letters to reveal hidden messages',
            'difficulty' => 'Medium',
            'unlocked' => Session::get('completed_levels', []) ? in_array(1, Session::get('completed_levels', [])) : false
        ],
        [
            'id' => 3,
            'name' => 'Symbol Cipher',
            'description' => 'Replace symbols with letters to crack the code',
            'difficulty' => 'Hard',
            'unlocked' => Session::get('completed_levels', []) ? in_array(2, Session::get('completed_levels', [])) : false
        ]
    ];

    return view('game.secret-code.hub', ['player_name' => $playerName, 'levels' => $levels]);
}

/**
 * Show a specific secret code level
 */
public function secretCodeLevel($level)
{
    $playerName = Session::get('player_name');
    
    if (!$playerName) {
        return redirect()->route('welcome')->with('error', 'Please enter your name first!');
    }

    // Check if level is unlocked
    if ($level > 1) {
        $completedLevels = Session::get('completed_levels', []);
        if (!in_array($level - 1, $completedLevels)) {
            return redirect()->route('secret-code')->with('error', 'Complete the previous level first!');
        }
    }

    $scenario = $this->getSecretCodeScenario($level);

    return view('game.secret-code.level', compact('playerName', 'scenario', 'level'));
}

/**
 * Handle secret code level submission
 */
public function submitSecretCodeLevel(Request $request, $level)
{
    $request->validate([
        'answer' => 'required|string'
    ]);

    $scenario = $this->getSecretCodeScenario($level);
    $answer = strtolower(trim($request->answer));
    $correct = strtolower(trim($scenario['answer']));

    if ($answer === $correct) {
        $completedLevels = Session::get('completed_levels', []);
        if (!in_array($level, $completedLevels)) {
            $completedLevels[] = $level;
            Session::put('completed_levels', $completedLevels);
        }

        $message = 'Great job! You\'ve cracked the code!';
        $increase = 2; // Each level gives 2 shield points

        $this->completeMission('secret-code-' . $level, $increase, $message);
        return redirect()->route('game.secret-code')->with('success', $message);
    }

    return redirect()->back()->with('error', 'That\'s not quite right. Try again!');
}

/**
 * Get the scenario for a specific secret code level
 */
private function getSecretCodeScenario($level)
{
    switch ($level) {
        case 1:
            return [
                'title' => 'The Reverse Code',
                'description' => 'Agent, we need your help! Some messages are written backwards. Can you decode them?',
                'message' => '!terces ruoy peek ot rebmemer ,kcatta na tneverp oT',
                'hint' => 'Read the message from right to left',
                'answer' => 'To prevent an attack, remember to keep your secret!',
                'type' => 'reverse'
            ];

        case 2:
            return [
                'title' => 'Caesar\'s Secret',
                'description' => 'Each letter has been shifted 3 places forward in the alphabet!',
                'message' => 'Nhhs brxu sdvvzrug vdih dqg vhfuhw',
                'hint' => 'A becomes D, B becomes E, C becomes F...',
                'answer' => 'Keep your password safe and secret',
                'type' => 'caesar',
                'shift' => 3
            ];

        case 3:
            return [
                'title' => 'Symbol Cipher',
                'description' => 'Each letter has been replaced with a symbol. Use the key to decode the message!',
                'message' => '☆●●■ ▲◆ ☆●◇▼●●',
                'hint' => 'Here\'s part of the key: ☆=K, ●=E, ◇=A',
                'answer' => 'keep it secret',
                'type' => 'symbol',
                'key' => [
                    '☆' => 'K', '●' => 'E', '◇' => 'A', '▼' => 'C',
                    '▲' => 'I', '■' => 'P', '◆' => 'T', '♥' => 'H',
                    '♦' => 'L', '▪' => 'M', '▫' => 'N', '▶' => 'O',
                    '◈' => 'R', '◎' => 'S', '□' => 'U', '▬' => 'V',
                    '▮' => 'W', '▯' => 'X', '△' => 'Y', '▷' => 'Z'
                ]
            ];

        default:
            abort(404);
    }
}
}