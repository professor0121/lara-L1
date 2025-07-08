<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\API\ProductController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');



Route::get('/demo', function () {
    return Inertia::render('demo');
})->name('demo');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
