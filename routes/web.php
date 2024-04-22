<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Middleware\isAdmin;

Route::prefix('/')->group(function () {

    Route::get('/', [pageController::class, 'welcome'])->name('welcome');

    Route::get('/legals', [pageController::class, 'legals'])->name('legals');

    Route::get('/about', [pageController::class, 'about'])->name('about');

});



Route::prefix('/dashboard')->group(function(){
    
    Route::get('/', [AdminPostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/create', [AdminPostController::class, 'create'])->name('posts.create');
    Route::post('/create', [AdminPostController::class, 'store'])->name('posts.store');

    Route::get('/posts/{post}/edit', AdminPostController::class .'@edit')->name('posts.edit');
    Route::put('/posts/{post}', AdminPostController::class .'@update')->name('posts.update');
  
    Route::delete('/posts/{post}', AdminPostController::class .'@destroy')->name('posts.destroy');
    
});

Route::group(['middleware'=> isAdmin::class] , function () {

    Route::prefix('dashboard')->group(function () {
    
        //methode pour ajouter les categories dans la bdd;
        Route::get('/formCategorie', [CategorieController::class, 'form'])->name('form.categorie');

        Route::post('/formCategorie', [CategorieController::class, 'create'])->name('validate.categorie');

        //pour les afficher;
        Route::get('/listeCategorie', [CategorieController::class, 'showCategorie'])->name('show.categorie');

        //pour supprimer une categorie;
        Route::delete('/listeCategories/{post}', CategorieController::class .'@destroyCategorie')->name('categories.destroy');

        //pour rediriger vers listeCategorie
        Route::get('/listeCategorie', [PageController::class, 'listeCat'])->name('listeCat');

        // returns the form for editing a categorie
        Route::get('/categories/{post}/editCategorie', CategorieController::class .'@editCat')->name('categorie.edit');
        // updates a categorie
        Route::put('/categories/{post}', CategorieController::class .'@updateCat')->name('categorie.update');
    });

});

//ROUTE admin pour creer / modifier un utilisateur
Route::group(['middleware'=> isAdmin::class] , function () {
    
    Route::prefix('dashboard')->group(function () {

        Route::get('user',[UserController::class,'index'])->name('user.index');

        Route::get('user/{id}/edit',[UserController::class,'edit'])->name('user.edit');
        Route::put('user/{id}/edit',[UserController::class,'update'])->name('user.update');
        
        Route::delete('user/{id}/edit',[UserController::class,'destroy'])->name('user.destroy');

    });

});

//route pour montrer un seul post à la fois dans une autre page avec le title du post;
Route::get('/dashboard/showpost/{post}',[AdminPostController::class,'show'])->name('post.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
