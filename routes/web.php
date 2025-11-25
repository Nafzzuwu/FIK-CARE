<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Welcome (tanpa auth)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk USER (hanya role 'user' yang bisa akses)
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboarduser');
    })->name('dashboarduser');
});

// Route untuk ADMIN (hanya role 'admin' yang bisa akses)
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
});

// Route Profile (bisa diakses oleh user dan admin)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.editprofil');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route logout dengan GET (opsional, kurang aman)
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->middleware('auth');

require __DIR__.'/auth.php';