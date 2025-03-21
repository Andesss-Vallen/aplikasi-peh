<?php

use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\DetailJadwalController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimFotoController;
use App\Http\Controllers\TimVideoController;
use Illuminate\Support\Facades\Route;
use App\Models\DetailJadwal;
use App\Models\Jadwal;

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

// Route::get('utama', function () {
//     return view('welcome');
// })->middleware(['auth', 'verified', 'permission:lihat-datautama']);

// ==========================Route Tabel Utama==========================

Route::resource('customerservice', CustomerServiceController::class);
Route::resource('detailjadwal', DetailJadwalController::class);
Route::resource('jadwal', JadwalController::class);
Route::resource('paket', PaketController::class);
Route::resource('timfoto', TimFotoController::class);
Route::resource('timvideo', TimVideoController::class);

Route::get('/', function () {
    $dj = DetailJadwal::all();
    return view('utama/index', compact('dj'));
})->middleware('auth');

Route::get('/show', function () {
    $j = Jadwal::all();
    return view('utama/show', compact('j'));
});

Route::get('/detail', function () {
    $dj = DetailJadwal::all();
    return view('utama/detail', compact('dj'));
});

require __DIR__ . '/auth.php';
