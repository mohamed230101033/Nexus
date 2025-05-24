<?php

use App\Http\Controllers\GameController;
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

// Welcome and game start
Route::get('/', [GameController::class, 'welcome'])->name('welcome');
Route::post('/start-game', [GameController::class, 'startGame'])->name('start-game');

// Game routes
Route::prefix('game')->name('game.')->group(function () {
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

// Simple routes for the remaining pages in the app
Route::get('/home', [GameController::class, 'welcome'])->name('home');
