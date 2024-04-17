<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;


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
Route::get('/dashboard/formCategorie', [CategorieController::class, 'form'])->name('form.categorie');

Route::post('/dashboard/formCategorie', [CategorieController::class, 'create'])->name('validate.categorie');

//pour les afficher;
Route::get('/dashboard/listeCategorie', [CategorieController::class, 'showCategorie'])->name('show.categorie');

//pour supprimer une categorie;
Route::delete('dashboard/listeCategories/{post}', CategorieController::class .'@destroyCategorie')->name('categories.destroy');

//pour rediriger vers listeCategorie
Route::get('dashboard/listeCategorie', [PageController::class, 'listeCat'])->name('listeCat');


// returns the form for editing a categorie
Route::get('dashboard/categories/{post}/editCategorie', CategorieController::class .'@editCat')->name('categorie.edit');
// updates a categorie
Route::put('dashboard/categories/{post}', CategorieController::class .'@updateCat')->name('categorie.update');

//ROUTE admin pour creer / modifier un utilisateur
Route::middleware('auth')->group(function () {
    
    Route::prefix('dashboard')->group(function () {

        Route::get('user',[UserController::class,'index'])->name('user.index');

        Route::get('user/{id}/edit',[UserController::class,'edit'])->name('user.edit');
        Route::put('user/{id}/edit',[UserController::class,'update'])->name('user.update');

        Route::delete('user/{id}/edit',[UserController::class,'destroy'])->name('user.destroy');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
