<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties/{property}', [HomeController::class, 'show'])->name('property.index');
Route::get('/brokers', 'BrokerController@index')->middleware(['auth', 'verified'])->name('brokers');
Route::post('/leads', [LeadController::class, 'create'])->name('leads');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/lead', function() {
        return Inertia\Inertia::render('Leads/Show');
    })->name('leads.show');
});

require __DIR__.'/auth.php';
