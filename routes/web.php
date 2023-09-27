<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return response()->redirectTo('/properties');
});

Route::get('/properties', function () {
    return Inertia::render('Properties')
        ->with('properties', auth()->user()->properties);
})->middleware(['auth', 'verified'])->name('properties');

Route::get('/brokers', function () {
    return Inertia::render('Broker');
})->middleware(['auth', 'verified'])->name('brokers');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
