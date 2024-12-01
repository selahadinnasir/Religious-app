<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\MuslimProviderController;
use App\Http\Controllers\MuslimUserController;
use App\Http\Controllers\ChristianProviderController;
use App\Http\Controllers\ChristianUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Route::middleware(['auth', 'redirect.account.type'])->group(function () {
    Route::middleware('auth')->group(function () {
    // Routes for Muslim providers
    Route::prefix('muslimProvider')->group(function () {
        Route::get('/dashboard', [MuslimProviderController::class, 'index'])->name('muslimProvider.dashboard');
        Route::get('/posts/create', [MuslimProviderController::class, 'create'])->name('posts.create');
        Route::post('/posts/store', [MuslimProviderController::class, 'store'])->name('posts.store');
        Route::get('/posts/{post}/edit', [MuslimProviderController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}/update', [MuslimProviderController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}/destroy', [MuslimProviderController::class, 'destroy'])->name('posts.destroy');
    });

    

    // Routes for Christian providers
    Route::prefix('christianProvider')->group(function () {
        Route::get('/dashboard', [ChristianProviderController::class, 'index'])->name('christianProvider.dashboard');
        Route::get('/posts/create', [MuslimProviderController::class, 'create'])->name('cposts.create');
        Route::post('/posts/store', [MuslimProviderController::class, 'store'])->name('cposts.store');
        Route::get('/posts/{post}/edit', [MuslimProviderController::class, 'edit'])->name('cposts.edit');
        Route::put('/posts/{post}/update', [MuslimProviderController::class, 'update'])->name('cposts.update');
        Route::delete('/posts/{post}/destroy', [MuslimProviderController::class, 'destroy'])->name('cposts.destroy');
    });

    // Routes for Muslim users
    Route::prefix('muslimUser')->group(function () {
        Route::get('/dashboard', [MuslimUserController::class, 'index'])->name('muslimUser.dashboard');

        Route::post('/bookmark/{post}', [MuslimUserController::class, 'bookmark'])->name('bookmark');
        Route::post('/unbookmark/{post}', [MuslimUserController::class, 'unbookmark'])->name('unbookmark');
        
    });

    // Routes for Christian users
    Route::prefix('christianUser')->group(function () {
        Route::get('/dashboard', [ChristianUserController::class, 'index'])->name('christianUser.dashboard');
    });
});





require __DIR__.'/auth.php';
