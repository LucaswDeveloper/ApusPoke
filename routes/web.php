<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BookmarksController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {    
    Route::get('/search', [BackendController::class, 'search'])->name('search');
    Route::post('/search-post', [BackendController::class, 'searchPost']);

    Route::get('/favoritos', [BookmarksController::class, 'index'])->name('favoritos');
    Route::post('/favoritar', [BookmarksController::class, 'store']);
    Route::delete('/favoritar-destroy', [BookmarksController::class, 'destroy']);

    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
