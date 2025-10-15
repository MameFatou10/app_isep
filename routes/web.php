<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsClient;
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

Route::resource('contacts',ContactController::class)->middleware(IsAdmin::class);
Route::get('/contact/isep', [ContactController::class , 'message'])->middleware(IsClient::class);
Route::resource('contacts', ContactController::class)->middleware(IsClient::class);

require __DIR__.'/auth.php';
