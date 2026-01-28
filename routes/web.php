<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProjectController; // <--- 1. IMPORTANTE: AÑADE ESTO
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'es', 'fr'])) {
        Session::put('locale', $locale);
    }
    return back();
})->name('lang.switch');

Route::get('/', function () {
    return view('main');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);

    // 2. AÑADE ESTA LÍNEA:
    Route::resource('projects', ProjectController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
