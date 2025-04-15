<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\PengajuanController;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/1', function() {
    return view('index');
});

Route::get('/2', function() {
    return view('admin.dashboard');
});

Route::get('/3', function() {
    return view('mahasiswa.dashboard');
});

Route::get('/4', function() {
    return view('kaprodi.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('/products', ProductController::class);

Route::resource('/pengajuan', PengajuanController::class);

Route::middleware(['auth'])->group(function () {

    // Admin dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Kaprodi dashboard
    Route::get('/kaprodi/dashboard', function () {
        return view('kaprodi.dashboard');
    })->name('kaprodi.dashboard');

    // Mahasiswa dashboard
    Route::get('/mahasiswa/dashboard', function () {
        return view('mahasiswa.dashboard');
    })->name('mahasiswa.dashboard');

});

Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware(['auth', 'role:kaprodi'])->get('/kaprodi/dashboard', function () {
    return view('kaprodi.dashboard');
})->name('kaprodi.dashboard');

Route::middleware(['auth', 'role:mahasiswa'])->get('/mahasiswa/dashboard', function () {
    return view('mahasiswa.dashboard');
})->name('mahasiswa.dashboard');



require __DIR__.'/auth.php';
