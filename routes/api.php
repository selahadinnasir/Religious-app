<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuslimProviderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::prefix('muslimProvider')->group(function () {
    Route::get('/posts', [MuslimProviderController::class, 'posts'])->name('muslimProvider.posts');
});


