<?php

use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('landing');
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.iniprofil');
});

// Route logout dengan GET (opsional, kurang aman)
Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->middleware('auth');

require __DIR__.'/auth.php';

// dashboarduser edit
use App\Http\Controllers\User\UserReportController;

// Halaman buat laporan
Route::middleware(['auth'])->group(function () {

    Route::get('/report/create', [UserReportController::class, 'create'])
        ->name('report.create');

    Route::post('/report/store', [UserReportController::class, 'store'])
        ->name('report.store');

});

// profil
Route::get('/profil', function () {
    return view('editprofil');
})->middleware('auth')->name('profil');

// riwayat laporan
Route::get('/report', [UserReportController::class, 'index'])->name('report.index');



// ADMIN MIDDLEWARE
use App\Http\Controllers\Admin\AdminReportController;

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/', [AdminReportController::class, 'index'])->name('dashboard');

    // Daftar Laporan
    Route::get('/daftarlaporan', [AdminReportController::class, 'laporan'])->name('daftarlaporan');
    Route::put('/daftarlaporan/{id}/status', [AdminReportController::class, 'updateStatus'])->name('daftarlaporan.status');
    Route::delete('/daftarlaporan/{id}', [AdminReportController::class, 'delete'])->name('daftarlaporan.delete');

    // Daftar Pengguna
    Route::get('/daftarpengguna', [AdminReportController::class, 'pengguna'])->name('daftarpengguna');
    Route::put('/daftarpengguna/{id}/role', [AdminReportController::class, 'updateRole'])->name('daftarpengguna.role');
    Route::delete('/daftarpengguna/{id}', [AdminReportController::class, 'deleteUser'])->name('daftarpengguna.delete');

});

