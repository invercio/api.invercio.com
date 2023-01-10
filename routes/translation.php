<?php

use App\Http\Controllers\TranslationController;

Route::get('/translations', [TranslationController::class, 'index']);
