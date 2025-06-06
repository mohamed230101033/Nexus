<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\NexusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Nexus Project Routes - Main Website
Route::get('/', [NexusController::class, 'index'])->name('nexus.index');
Route::get('/first-semester', [NexusController::class, 'firstSemester'])->name('nexus.first-semester');
Route::get('/second-semester', [NexusController::class, 'secondSemester'])->name('nexus.second-semester');
Route::get('/second-semester-phase1', [NexusController::class, 'secondSemesterPhase1'])->name('nexus.second-semester-phase1');
Route::get('/second-semester-phase2', [NexusController::class, 'secondSemesterPhase2'])->name('nexus.second-semester-phase2');

// Phase 2 Malware Component Pages
Route::get('/ransomware-core', [NexusController::class, 'ransomwareCore'])->name('nexus.ransomware-core');
Route::get('/remote-access-trojans', [NexusController::class, 'remoteAccessTrojans'])->name('nexus.remote-access-trojans');
Route::get('/rat-net-nuker', [NexusController::class, 'ratNetNuker'])->name('nexus.rat-net-nuker');
Route::get('/zphishing', [NexusController::class, 'zphishing'])->name('nexus.zphishing');

// Sub-Module 2: Detection and Defence
Route::get('/edr-detection-defence', [NexusController::class, 'edrDetectionDefence'])->name('nexus.edr-detection-defence');

// Sub-Module 3: Analysis & Detection Statistics
Route::get('/analysis-detection-statistics', [NexusController::class, 'analysisDetectionStatistics'])->name('nexus.analysis-detection-statistics');

// Sub-Module 3: APK Analysis
Route::get('/analysis-detection-apk', [NexusController::class, 'analysisDetectionApk'])->name('nexus.analysis-detection-apk');

Route::get('/encryption', [NexusController::class, 'encryption'])->name('nexus.encryption');
Route::get('/myc-game', [NexusController::class, 'mycGame'])->name('nexus.myc-game');

// Second Semester Research Areas
Route::get('/core-ransomware', [NexusController::class, 'coreRansomware'])->name('nexus.core-ransomware');
Route::get('/rat-prototype', [NexusController::class, 'ratPrototype'])->name('nexus.rat-prototype');
Route::get('/evasion-stealth', [NexusController::class, 'evasionStealth'])->name('nexus.evasion-stealth');
Route::get('/delivery-methods', [NexusController::class, 'deliveryMethods'])->name('nexus.delivery-methods');
Route::get('/detection-response', [NexusController::class, 'detectionResponse'])->name('nexus.detection-response');

// NEXUS x MYC Routes (the actual game functionality)
Route::prefix('game')->name('game.')->group(function () {
    Route::get('/', [GameController::class, 'welcome'])->name('welcome');
    Route::post('/start-game', [GameController::class, 'startGame'])->name('start-game');
    Route::get('/intro', [GameController::class, 'intro'])->name('intro');
    Route::get('/story', [GameController::class, 'storyMode'])->name('story');
    Route::get('/mission/{id}', [GameController::class, 'mission'])->name('mission');
    Route::post('/mission/{id}', [GameController::class, 'submitMission'])->name('submit-mission');
    Route::get('/village', [GameController::class, 'village'])->name('village');
    Route::get('/truth-detective', [GameController::class, 'truthDetectiveHub'])->name('truth-detective');
    Route::get('/truth-detective/case/{caseId}', [GameController::class, 'startTruthDetectiveCase'])->name('truth-detective.case');
    Route::post('/truth-detective/case/{caseId}', [GameController::class, 'submitTruthDetectiveCase'])->name('truth-detective.submit');

    // Encryption Game Routes
    Route::get('/secret-code', [GameController::class, 'secretCode'])->name('secret-code');
    Route::post('/secret-code/decrypt', [GameController::class, 'submitDecryption'])->name('secret-code.decrypt');
    Route::get('/secret-code/level/{level}', [GameController::class, 'secretCodeLevel'])->name('secret-code.level');
    Route::post('/secret-code/level/{level}', [GameController::class, 'submitSecretCodeLevel'])->name('secret-code.submit-level');
    Route::get('/challenge', [GameController::class, 'challenge'])->name('challenge');
    Route::post('/challenge', [GameController::class, 'submitChallenge'])->name('submit-challenge');
    Route::get('/time-travel', [GameController::class, 'timeTravel'])->name('time-travel');
    Route::get('/time-travel/random', [GameController::class, 'randomTimeTravel'])->name('time-travel.random');
    Route::get('/time-travel/{attack}', [GameController::class, 'timeTravelAttack'])->name('time-travel.attack');
});
