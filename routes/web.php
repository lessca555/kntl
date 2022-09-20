<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PelanggaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('siswa-login');
    Route::get('/admin', [LoginController::class, 'admin'])->name('admin-login');
    Route::post('/', [LoginController::class, 'logsis'])->name('login-siswa');
    Route::post('/admin', [LoginController::class, 'logmin'])->name('login-admin');
});
Route::middleware('auth')->group(function () {
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/admin/dashboard', [LoginController::class, 'dashmin'])->name('dashmin');
        Route::get('/admin/kelas', [KelasController::class, 'index'])->name('kelas-admin');
        Route::get('/admin/tambah-kelas', [KelasController::class, 'create'])->name('tambah-kelas');
        Route::post('/admin/tambah-kelas', [KelasController::class, 'store'])->name('store-kelas');
        Route::get('/admin/kelas/edit/{kelas:nama}', [KelasController::class, 'edit']);
        Route::post('/admin/kelas/edit', [KelasController::class, 'update'])->name('update-kelas');
        Route::get('/admin/kelas/delete/{kelas:id}', [KelasController::class, 'destroy']);
        Route::get('/admin/data-siswa', [SiswaController::class, 'index'])->name('data-siswa');
        Route::get('/admin/data-siswa/tambah', [SiswaController::class, 'create'])->name('tambah-siswa');
        Route::post('/admin/data-siswa/tambah', [SiswaController::class, 'store'])->name('store-siswa');
        Route::get('/admin/siswa/edit/{lo:name}', [SiswaController::class, 'edit']);
        Route::post('/admin/siswa/edit/', [SiswaController::class, 'update'])->name('update-siswa');
        Route::get('/admin/siswa/delete/{data:id}', [SiswaController::class, 'destroy']);
        Route::get('/admin/siswa/export', [SiswaController::class, 'export_excel'])->name('export-siswa');
        Route::post('/admin/siswa/import', [SiswaController::class, 'import_excel'])->name('import-siswa');
        // pelanggaran
        Route::get('/admin/pelanggaran', [PelanggaranController::class, 'index'])->name('pelanggaran-siswa');
        Route::get('/admin/pelanggaran/tambah', [PelanggaranController::class, 'create'])->name('tambah-pelanggaran');
        Route::post('/admin/pelanggaran/tambah', [PelanggaranController::class, 'store'])->name('store-pelanggaran');
        Route::get('/admin/pelanggaran/edit/{pela:nama}', [PelanggaranController::class, 'edit']);
        Route::post('/admin/pelanggaran/edit', [PelanggaranController::class, 'update'])->name('update-pelanggaran');
        Route::get('/admin/pelanggaran/hapus/{pela:id}', [PelanggaranController::class, 'destroy']);
        Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');
    });
    // Route::get('/admin/dashboard', [LoginController::class, 'dashmin'])->name('dashmin');
    //     Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');
});
