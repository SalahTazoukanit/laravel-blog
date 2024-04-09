<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\AdminPostController;


Route::get('/', [pageController::class, 'welcome'])->name('welcome');
Route::get('/welcome', [pageController::class, 'welcome'])->name('welcome');


Route::get('/legals', [pageController::class, 'legals'])->name('legals');

Route::get('/about', [pageController::class, 'about'])->name('about');

// Route::get('/dashboard', [pageController::class, 'dashboard'])->name('dashboard');


Route::get('/dashboard', [pageController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
