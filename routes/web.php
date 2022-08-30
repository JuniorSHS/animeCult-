<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('categories/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'apercuCatPost']);
Route::get('categories/{category_slug}/{post_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);
//Affichier la liste des membres
Route::get('membres', [App\Http\Controllers\Frontend\FrontendController::class, 'members']);
//Affichier le profil d'un membre
Route::get('membres/{user_name}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewMembers']);
//affichier les animes à venir
Route::get('prochainement', [App\Http\Controllers\Frontend\FrontendController::class, 'ViewProchainement']);
Route::get('prochainement/{anime_name}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewAnimes']);



Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);
    //Ajouter une catégorie  
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    //Modifier une catégorie
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    //Supprimer une catégorie
    // Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::post('delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    //Ajouter un post
    Route::get('add-post', [App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('add-post', [App\Http\Controllers\Admin\PostController::class, 'store']);
    //Modifier un post
    Route::get('edit-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'edit']);
    Route::put('update-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'update']);
    //Supprimer un post
    // Route::get('delete-post/{post_id}', [App\Http\Controllers\Admin\PostController::class, 'destroy']);
    Route::post('delete-post', [App\Http\Controllers\Admin\PostController::class, 'destroy']);
    //Ajouter un utilisateur
    //Route::get('add-user', [App\Http\Controllers\Admin\UserController::class, 'create']);
    //Route::post('add-user', [App\Http\Controllers\Admin\UserController::class, 'store']);
    //affichier la liste des anime à venir
    Route::get('animes', [App\Http\Controllers\Admin\AnimeController::class, 'index']);
    //Ajouter un anime
    Route::get('add-anime', [App\Http\Controllers\Admin\AnimeController::class, 'create']);
    Route::post('add-anime', [App\Http\Controllers\Admin\AnimeController::class, 'store']);
    //modifier un anime
    Route::get('edit-anime/{anime_id}', [App\Http\Controllers\Admin\AnimeController::class, 'edit']);
    Route::put('update-anime/{anime_id}', [App\Http\Controllers\Admin\AnimeController::class, 'update']);
    //supprimer un anime
    Route::post('delete-anime', [App\Http\Controllers\Admin\AnimeController::class, 'destroy']);
    //Modifier un utilisateur
    Route::get('edit-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
    //Supprimer un utilisateur
    //Route::get('delete-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);
    //sauvegarder les réglages du site
    Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'savedata']);

});