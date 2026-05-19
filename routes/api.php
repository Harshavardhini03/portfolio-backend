<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Portfolio API Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['api.key'])->group(function () {
    Route::get('/about',      [AboutController::class,      'index']);
    Route::get('/skills',     [SkillController::class,      'index']);
    Route::get('/projects',   [ProjectController::class,    'index']);
    Route::get('/experience', [ExperienceController::class, 'index']);
    Route::get('/education',  [EducationController::class,  'index']);
});

// Contact form — rate limited to 5 requests per minute per IP
Route::middleware(['throttle:5,1', 'api.key'])->group(function () {
    Route::post('/contact', [ContactController::class, 'store']);
});

// Health check (no auth needed)
Route::get('/health', fn () => response()->json([
    'status'    => 'ok',
    'timestamp' => now(),
]));
