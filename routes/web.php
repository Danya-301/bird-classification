<?php

use App\Http\Controllers\BirdClassificationController;

Route::get('/', [BirdClassificationController::class, 'showForm']);
Route::post('/classify-bird', [BirdClassificationController::class, 'classifyBird'])->name('classify-bird');
