<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\AdminPostController;


Route::get('/', [pageController::class, 'welcome'])->name('welcome');
Route::get('/welcome', [pageController::class, 'welcome'])->name('welcome');


Route::get('/legals', [pageController::class, 'legals'])->name('legals');

Route::get('/about', [pageController::class, 'about'])->name('about');

Route::get('/dashboard/create', [AdminPostController::class, 'create'])->name('posts.create');

Route::post('/dashboard/create', [AdminPostController::class, 'store'])->name('posts.store');

Route::delete('dashboard/posts/{post}', AdminPostController::class .'@destroy')->name('posts.destroy');

Route::get('dashboard/posts/{post}/edit', AdminPostController::class .'@edit')->name('posts.edit');

Route::put('dashboard/posts/{post}', AdminPostController::class .'@update')->name('posts.update');
// deletes a post


// Route::get('/dashboard', [pageController::class, 'dashboard'])->name('dashboard');


Route::get('/dashboard', [AdminPostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
