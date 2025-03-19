<?php

use App\Http\Controllers\CsPehPotretController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\InfoJadwalController;
use App\Http\Controllers\JadwalPehpotretController;
use App\Http\Controllers\KategoriPaketController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PaketPehpotretController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimFotoController;
use App\Http\Controllers\TimVideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin', function () {
    return '<h1>Helo Admin</h1>';
})->middleware(['auth', 'verified', 'role:admin|superuser']);

Route::get('superuser', function () {
    return '<h1>Helo Pak Tiyo</h1>';
})->middleware(['auth', 'verified', 'role:superuser|freelance', 'permission:lihat-datautama']);

Route::get('utama', function () {
    return view('welcome');
})->middleware(['auth', 'verified', 'permission:lihat-datautama']);

// ==========================Route Tabel Utama==========================


Route::get('jadwal', function(){
    return view('jadwal');
});

require __DIR__ . '/auth.php';
