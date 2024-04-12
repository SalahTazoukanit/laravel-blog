<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\FormCategorieController;


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


//methode pour ajouter les categories dans la bdd;
Route::get('/dashboard/formCategorie', [FormCategorieController::class, 'form'])->name('form.categorie');

Route::post('/dashboard/formCategorie', [FormCategorieController::class, 'create'])->name('validate.categorie');

//pour les afficher;
Route::get('/dashboard/listeCategorie', [FormCategorieController::class, 'showCategorie'])->name('show.categorie');

//pour supprimer une categorie;
Route::delete('dashboard/listeCategories/{post}', FormCategorieController::class .'@destroyCategorie')->name('categories.destroy');

//pour rediriger vers listeCategorie
Route::get('dashboard/listeCategorie', [PageController::class, 'listeCat'])->name('listeCat');


// returns the form for editing a categorie
Route::get('dashboard/categories/{post}/editCategorie', FormCategorieController::class .'@editCat')->name('categorie.edit');
// updates a categorie
Route::put('dashboard/categories/{post}', FormCategorieController::class .'@updateCat')->name('categorie.update');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
