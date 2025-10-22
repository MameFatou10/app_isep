<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsClient;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\TransfertController;
use App\Http\Controllers\UserController;

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
Route::resource('contacts', ContactController::class)->middleware(IsAdmin::class);
Route::get('/comptes', [CustomController::class, 'afficherCompte'])->middleware(IsAdmin::class)->name('comptes.index');
Route::post('/comptes/{id}', [CustomController::class, 'activer_desactiver_compte'])->middleware(IsAdmin::class)->name('comptes.index_activer_desactiver');

require __DIR__.'/auth.php';

Route::middleware(IsAdmin::class)->group(function () {

    Route::resource('transferts', TransfertController::class);
});

Route::get('/users', [UserController::class, 'index'])->middleware(IsAdmin::class)->name('user.index');
