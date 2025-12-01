<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// =======================
// IMPORT CONTROLLERS
// =======================
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserReportController;
use App\Http\Controllers\User\TrendingController;
use App\Http\Controllers\Admin\AdminReportController;


// =======================
// LANDING PAGE
// =======================
Route::get('/', function () {
    return view('landing');
});


// =======================
// USER DASHBOARD
// =======================
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboarduser');
    })->name('dashboarduser');

});


// =======================
// TRENDING LAPORAN (USER)
// =======================
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/trending', [TrendingController::class, 'index'])
        ->name('trending.index');

    Route::post('/trending/{id}/vote', [TrendingController::class, 'vote'])
        ->name('trending.vote');

});


// =======================
// USER REPORTING
// =======================
Route::middleware(['auth'])->group(function () {

    // Buat laporan
    Route::get('/report/create', [UserReportController::class, 'create'])
        ->name('report.create');

    Route::post('/report/store', [UserReportController::class, 'store'])
        ->name('report.store');

    // Riwayat laporan
    Route::get('/report', [UserReportController::class, 'index'])
        ->name('report.index');

});


// =======================
// PROFILE (USER & ADMIN)
// =======================
Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.iniprofil');

});


// =======================
// ADMIN ROUTES
// =======================
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard Admin
        Route::get('/', [AdminReportController::class, 'index'])
            ->name('dashboard');

        // ===================
        // DAFTAR LAPORAN
        // ===================
        Route::get('/daftarlaporan', [AdminReportController::class, 'laporan'])
            ->name('daftarlaporan');

        Route::put('/daftarlaporan/{id}/status', [AdminReportController::class, 'updateStatus'])
            ->name('daftarlaporan.status');

        Route::put('/daftarlaporan/{id}/feedback', [AdminReportController::class, 'saveFeedback'])
            ->name('daftarlaporan.feedback');

        Route::delete('/daftarlaporan/{id}', [AdminReportController::class, 'delete'])
            ->name('daftarlaporan.delete');

        // ===================
        // DAFTAR PENGGUNA
        // ===================
        Route::get('/daftarpengguna', [AdminReportController::class, 'pengguna'])
            ->name('daftarpengguna');

        Route::put('/daftarpengguna/{id}/role', [AdminReportController::class, 'updateRole'])
            ->name('daftarpengguna.role');

        Route::delete('/daftarpengguna/{id}', [AdminReportController::class, 'deleteUser'])
            ->name('daftarpengguna.delete');

});


// =======================
// PROFILE VIEW (STATIC)
// =======================
Route::get('/profil', function () {
    return view('editprofil');
})->middleware('auth')->name('profil');


// =======================
// LOGOUT
// =======================
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->middleware('auth');


// =======================
// AUTH ROUTE (DEFAULT)
// =======================
require __DIR__.'/auth.php';
