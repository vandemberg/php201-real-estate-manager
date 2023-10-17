<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties/{property}', [HomeController::class, 'show'])->name('property.index');
Route::post('/properties/{property}/leads', [HomeController::class, 'leads'])->name('property.leads');
Route::get('/brokers', [HomeController::class, 'brokers'])->name('brokers');

require __DIR__.'/auth.php';
